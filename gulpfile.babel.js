'use strict';

import plugins       from 'gulp-load-plugins';
import gutil         from 'gulp-util';
import yargs         from 'yargs';
import browser       from 'browser-sync';
import gulp          from 'gulp';
import rimraf        from 'rimraf';
import yaml          from 'js-yaml';
import fs            from 'fs';
import webpackStream from 'webpack-stream';
import webpack2      from 'webpack';
import named         from 'vinyl-named';

// Load all Gulp plugins into one variable
const $ = plugins();

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Check for --development flag unminified with sourcemaps
const DEV = !!(yargs.argv.dev);

// Load settings from settings.yml
const { BROWSERSYNC, COMPATIBILITY, REVISIONING, PATHS } = loadConfig();

// Check if file exists synchronously
function checkFileExists(filepath) {
  let flag = true;
  try {
    fs.accessSync(filepath, fs.F_OK);
  } catch(e) {
    flag = false;
  }
  return flag;
}

// Load default or custom YML config file
function loadConfig() {
  gutil.log('Loading config file...');

  if (checkFileExists('config.yml')) {
    // config.yml exists, load it
    gutil.log(gutil.colors.cyan('config.yml'), 'exists, loading', gutil.colors.cyan('config.yml'));
    let ymlFile = fs.readFileSync('config.yml', 'utf8');
    return yaml.load(ymlFile);

  } else if(checkFileExists('config-default.yml')) {
    // config-default.yml exists, load it
    gutil.log(gutil.colors.cyan('config.yml'), 'does not exist, loading', gutil.colors.cyan('config-default.yml'));
    let ymlFile = fs.readFileSync('config-default.yml', 'utf8');
    return yaml.load(ymlFile);

  } else {
    // Exit if config.yml & config-default.yml do not exist
    gutil.log('Exiting process, no config file exists.');
    gutil.log('Error Code:', err.code);
    process.exit(1);
  }
}

// Build the "dist" folder by running all of the below tasks
gulp.task('build',
 gulp.series(clean, sass, javascript, images, copy));

// Build the site, run the server, and watch for file changes
gulp.task('default',
  gulp.series('build', server, watch));

// Delete the "dist" folder
// This happens every time a build starts
function clean(done) {
  rimraf(PATHS.dist, done);
}

// Copy files out of the assets folder
// This task skips over the "img", "js", and "scss" folders, which are parsed separately
function copy() {
  return gulp.src(PATHS.assets)
    .pipe(gulp.dest(PATHS.dist + '/assets'));
}

// Compile Sass into CSS
// In production, the CSS is compressed
function sass() {
  return gulp.src('src/assets/scss/app.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))

    .pipe($.if(PRODUCTION, $.cleanCss({ compatibility: 'ie9' })))
    .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
    .pipe($.if(REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev()))
    .pipe(gulp.dest(PATHS.dist + '/assets/css'))
    .pipe($.if(REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev.manifest()))
    .pipe(gulp.dest(PATHS.dist + '/assets/css'))
    .pipe(browser.reload({ stream: true }));
}

let webpackConfig = {
  module: {
    rules: [
      {
        test: /.js$/,
        use: [
          {
            loader: 'babel-loader'
          }
        ]
      }
    ]
  },
  externals: {
    jquery: 'jQuery'
  }
}
// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
  return gulp.src(PATHS.entries)
    .pipe(named())
    .pipe($.sourcemaps.init())
    .pipe(webpackStream(webpackConfig, webpack2))
    .pipe($.if(PRODUCTION, $.uglify()
      .on('error', e => { console.log(e); })
    ))
    .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
    .pipe($.if(REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev()))
    .pipe(gulp.dest(PATHS.dist + '/assets/js'))
    .pipe($.if(REVISIONING && PRODUCTION || REVISIONING && DEV, $.rev.manifest()))
    .pipe(gulp.dest(PATHS.dist + '/assets/js'));
}

// Copy images to the "dist" folder
// In production, the images are compressed
function images() {
  return gulp.src('src/assets/img/**/*')
    .pipe($.if(PRODUCTION, $.imagemin({
      progressive: true
    })))
    .pipe(gulp.dest(PATHS.dist + '/assets/img'));
}

// Start BrowserSync to preview the site in
function server(done) {
  browser.init({
    proxy: BROWSERSYNC.url,

    ui: {
      port: 8080
    },

  });
  done();
}

// Reload the browser with BrowserSync
function reload(done) {
  browser.reload();
  done();
}

// Watch for changes to static assets, pages, Sass, and JavaScript
function watch() {
  gulp.watch(PATHS.assets, copy);
  gulp.watch('src/assets/scss/**/*.scss').on('all', sass);
  gulp.watch('**/*.php').on('all', browser.reload);
  gulp.watch('src/assets/js/**/*.js').on('all', gulp.series(javascript, browser.reload));
  gulp.watch('src/assets/img/**/*').on('all', gulp.series(images, browser.reload));
}
