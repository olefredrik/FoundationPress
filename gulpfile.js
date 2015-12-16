/*jslint node: true */
"use strict";

var $           = require('gulp-load-plugins')();
var argv        = require('yargs').argv;
var	gulp	    = require('gulp');
var browserSync = require('browser-sync').create();
var merge       = require('merge-stream');
var sequence    = require('run-sequence');
var colors      = require('colors');
var phpcs       = require('gulp-phpcs');
var phpcbf      = require('gulp-phpcbf');
var gutil       = require('gulp-util');

// Enter URL of your local server here
// Example: 'http://localwebsite.dev'
var URL = '';

// Check for --production flag
var isProduction = !!(argv.production);

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {
  sass: [
    'assets/components/foundation-sites/scss',
    'assets/components/motion-ui/src',
    'assets/components/fontawesome/scss'
  ],
  javascript: [
    'assets/components/jquery/dist/jquery.js',
    'assets/components/what-input/what-input.js',
    'assets/components/foundation-sites/js/foundation.core.js',
    'assets/components/foundation-sites/js/foundation.util.*.js',

    // Paths to individual JS components defined below
    'assets/components/foundation-sites/js/foundation.abide.js',
    'assets/components/foundation-sites/js/foundation.accordion.js',
    'assets/components/foundation-sites/js/foundation.accordionMenu.js',
    'assets/components/foundation-sites/js/foundation.drilldown.js',
    'assets/components/foundation-sites/js/foundation.dropdown.js',
    'assets/components/foundation-sites/js/foundation.dropdownMenu.js',
    'assets/components/foundation-sites/js/foundation.equalizer.js',
    'assets/components/foundation-sites/js/foundation.interchange.js',
    'assets/components/foundation-sites/js/foundation.magellan.js',
    'assets/components/foundation-sites/js/foundation.offcanvas.js',
    'assets/components/foundation-sites/js/foundation.orbit.js',
    'assets/components/foundation-sites/js/foundation.responsiveMenu.js',
    'assets/components/foundation-sites/js/foundation.responsiveToggle.js',
    'assets/components/foundation-sites/js/foundation.reveal.js',
    'assets/components/foundation-sites/js/foundation.slider.js',
    'assets/components/foundation-sites/js/foundation.sticky.js',
    'assets/components/foundation-sites/js/foundation.tabs.js',
    'assets/components/foundation-sites/js/foundation.toggler.js',
    'assets/components/foundation-sites/js/foundation.tooltip.js',

    // Motion UI
    'assets/components/motion-ui/motion-ui.js',

    // What-input
    'assets/components/what-input/what-input.js',

    // Include your own custom scripts (located in the custom folder)
    'assets/javascript/custom/*.js'
  ],
  pkg: [
    '**/*',
    '!**/node_modules/**',
    '!**/components/**',
    '!**/scss/**',
    '!**/bower.json',
    '!**/Gruntfile.js',
    '!**/package.json',
    '!**/composer.json',
    '!**/composer.lock',
    '!**/codesniffer.ruleset.xml',
    '!**/packaged/*'
  ]
};

// Browsersync task
gulp.task('browser-sync', ['build'], function() {

  var files = [
            '**/*.php',
            'assets/images/**/*.{png,jpg,gif}'
          ];

  browserSync.init(files, {
    // Proxy address
    proxy: URL,

    // Port #
    // port: PORT
  });
});

// Compile Sass into CSS
// In production, the CSS is compressed
gulp.task('sass', function() {
  // Minify CSS if run wtih --production flag
  var minifycss = $.if(isProduction, $.minifyCss());

  return gulp.src('assets/scss/foundation.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    .pipe(minifycss)
    .pipe($.if(!isProduction, $.sourcemaps.write('.')))
    .pipe(gulp.dest('assets/stylesheets'))
    .pipe(browserSync.stream({match: '**/*.css'}));
});

// Combine JavaScript into one file
// In production, the file is minified
gulp.task('javascript', function() {

  var uglify = $.uglify()
    .on('error', function (e) {
      console.log(e);
    });

  return gulp.src(PATHS.javascript)
    .pipe($.sourcemaps.init())
    .pipe($.concat('foundation.js'))
    .pipe($.if(isProduction, uglify))
    .pipe($.if(!isProduction, $.sourcemaps.write()))
    .pipe(gulp.dest('assets/javascript'))
    .pipe(browserSync.stream());
});

// Copy task
gulp.task('copy', function() {
  // Motion UI
  var motionUi = gulp.src('assets/components/motion-ui/**/*.*')
    .pipe($.flatten())
    .pipe(gulp.dest('assets/javascript/vendor/motion-ui'));

  // What Input
  var whatInput = gulp.src('assets/components/what-input/**/*.*')
      .pipe($.flatten())
      .pipe(gulp.dest('assets/javascript/vendor/what-input'));

  // Font Awesome
  var fontAwesome = gulp.src('assets/components/fontawesome/fonts/**/*.*')
      .pipe(gulp.dest('assets/fonts'));

  return merge(motionUi, whatInput, fontAwesome);
});

// Package task
gulp.task('package', ['build'], function() {
  var fs = require('fs');
  var pkg = JSON.parse(fs.readFileSync('./package.json'));
  var time = $.util.date(new Date(), '_yyyy-mm-dd_HH-MM');
  var title = pkg.name + time + '.zip';

  return gulp.src(PATHS.pkg)
    .pipe($.zip(title))
    .pipe(gulp.dest('packaged'));
});

// Build task
// Runs copy then runs sass & javascript in parallel
gulp.task('build', function(done) {
  sequence('copy',
          ['sass', 'javascript'],
          done);
});

gulp.task('phpcs', function() {
  return gulp.src(['*.php'])
    .pipe(phpcs({
      bin: 'wpcs/vendor/bin/phpcs',
      standard: './codesniffer.ruleset.xml',
      showSniffCode: true,
    }))
    .pipe(phpcs.reporter('log'));
});

gulp.task('phpcbf', function () {
  return gulp.src(['*.php'])
  .pipe(phpcbf({
    bin: 'wpcs/vendor/bin/phpcbf',
    standard: './codesniffer.ruleset.xml',
    warningSeverity: 0
  }))
  .on('error', gutil.log)
  .pipe(gulp.dest('.'));
});

// Default gulp task
// Run build task and watch for file changes
gulp.task('default', ['build', 'browser-sync'], function() {
  // Log file changes to console
  function logFileChange(event) {
    var fileName = require('path').relative(__dirname, event.path);
    console.log('[' + 'WATCH'.green + '] ' + fileName.magenta + ' was ' + event.type + ', running tasks...');
  }

  // Sass Watch
  gulp.watch(['assets/scss/**/*.scss'], ['sass'])
    .on('change', function(event) {
      logFileChange(event);
    });

  // JS Watch
  gulp.watch(['assets/javascript/custom/**/*.js'], ['javascript'])
    .on('change', function(event) {
      logFileChange(event);
    });
});
