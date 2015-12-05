var $        = require('gulp-load-plugins')();
var argv     = require('yargs').argv;
var	gulp	 = require('gulp');
var browser  = require('browser-sync');
var sequence = require('run-sequence');

// Check for --production flag
var isProduction = !!(argv.production);

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {
  assets: [
    'src/assets/**/*',
    '!src/assets/{!img,js,scss}/**/*'
  ],
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
    // 'src/assets/js/app.js'
  ]
};

// Compile Sass into CSS
// In production, the CSS is compressed
gulp.task('sass', function() {
  
  // var uncss = $.if(isProduction, $.uncss({
  //   html: ['src/**/*.html'],
  //   ignore: [
  //     new RegExp('^meta\..*'),
  //     new RegExp('^\.is-.*')
  //   ]
  // }));

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
    //.pipe(uncss)
    .pipe(minifycss)
    //.pipe($.if(!isProduction, $.sourcemaps.write()))
    .pipe($.if(!isProduction, $.sourcemaps.write('.')))
    .pipe(gulp.dest('assets/stylesheets'));
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

// Build the Sass & JS 
gulp.task('build', ['sass', 'javascript'], function() {
	// nothing to do
});

// Default Gulp Task
// Run build task and watch for file changes
gulp.task('default', ['build'], function() {
  gulp.watch(['assets/scss/**/*.scss'], ['sass', browser.reload]);
  gulp.watch(['assets/javascript/**/*.js'], ['javascript', browser.reload]);
});
