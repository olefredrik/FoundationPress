var $           = require('gulp-load-plugins')();
var argv        = require('yargs').argv;
var	gulp	      = require('gulp');
var browserSync = require('browser-sync');
var merge       = require('merge-stream');
var sequence    = require('run-sequence');

// Enter URL of your local server here
// Example: 'http://localwebsite.dev'
var url = '';

// Check for --production flag
var isProduction = !!(argv.production);

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {
  sass: [
    'assets/components/foundation-sites/scss',
    'assets/components/motion-ui/src/'
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
    
    // Include your own custom scripts (located in the custom folder)
    'assets/javascript/custom/*.js'
  ]
};

// Browsersync task
gulp.task('browser-sync', function() {
  var files = [
          '**/*.php',
          'assets/images/*.{png,jpg,gif}'
        ];
  browserSync.init(files, {
    // Proxy address
    proxy: url,
    
    // Port # 
    // port: 8080,

    // Inject CSS changes
    injectChanges: true
  });
});

// Compile Sass into CSS
// In production, the CSS is compressed
gulp.task('sass', function() {  

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
    .pipe(browserSync.reload({stream:true}));
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
    .pipe(uglify)
    .pipe($.if(!isProduction, $.sourcemaps.write()))
    .pipe(gulp.dest('assets/javascript'));
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

// Build task
// Runs copy then runs sass & javascript in parallel
gulp.task('build', function(done) {
  sequence('copy',
          ['sass', 'javascript'],
          done);
});

// Default gulp task
// Run build task and watch for file changes
gulp.task('default', ['build', 'browser-sync'], function() {
  gulp.watch(['assets/scss/**/*.scss'], ['sass', browserSync.reload]);
  gulp.watch(['assets/javascript/**/*.js'], ['javascript', browserSync.reload]);
  // gulp.watch(['**/*.php'], [browserSync.reload]);
});
