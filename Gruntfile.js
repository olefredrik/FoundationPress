module.exports = function (grunt) {
  // time
  require('time-grunt')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

        // Compress and zip only the files required for deployment to the server. Exclude all dev dependencies.
        compress: {
          main: {
            options: {
              archive: 'packaged/<%= pkg.name %>' + grunt.template.today('_yyyy-mm-dd_HH-MM') + '.zip',
              mode: 'zip'
            },
            expand: true,
            cwd: '.',
            src: [
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
            ],
            dest: '<%= pkg.name %>'
          },
        },
    sass: {

      options: {
        // If you can't get source maps to work, run the following command in your terminal:
        // $ sass scss/foundation.scss:css/foundation.css --sourcemap
        // (see this link for details: http://thesassway.com/intermediate/using-source-maps-with-sass )
        sourceMap: true
      },

      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'assets/stylesheets/foundation.css': 'assets/scss/foundation.scss'
        }
      }

    },

    copy: {

      motionUi: {
        expand: true,
        cwd: 'assets/components/motion-ui/',
        src: '**',
        flatten: 'true',
        dest: 'assets/javascript/vendor/motion-ui/'
      },

      whatInput: {
        expand: true,
        cwd: 'assets/components/what-input/',
        src: '**',
        flatten: 'true',
        dest: 'assets/javascript/vendor/what-input/'
      },

      iconfonts: {
        expand: true,
        cwd: 'assets/components/fontawesome/fonts',
        src: ['**'],
        dest: 'assets/fonts/'
      }

    },

    concat: {

      options: {
        separator: ';'
      },

      dist: {

        src: [

          // Foundation core
          'assets/components/foundation-sites/js/foundation.core.js',

          // Foundation utils
          'assets/components/foundation-sites/js/foundation.util.box.js',
          'assets/components/foundation-sites/js/foundation.util.keyboard.js',
          'assets/components/foundation-sites/js/foundation.util.mediaQuery.js',
          'assets/components/foundation-sites/js/foundation.util.motion.js',
          'assets/components/foundation-sites/js/foundation.util.nest.js',
          'assets/components/foundation-sites/js/foundation.util.timerAndImageLoader.js',
          'assets/components/foundation-sites/js/foundation.util.touch.js',
          'assets/components/foundation-sites/js/foundation.util.triggers.js',

          // Foundation components -> Comment out the components you don't need in your project
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

        // Finally, concatenate all the files above into one single file
        dest: 'assets/javascript/foundation.js'

      }

    },

    uglify: {

      dist: {
        files: {
          // Shrink the file size by removing spaces
          'assets/javascript/foundation.js': ['assets/javascript/foundation.js']
        }
      }

    },

    watch: {
      grunt: {files: ['Gruntfile.js']},

      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: true
        }
      },

      js: {
        files: 'assets/javascript/custom/**/*.js',
        tasks: ['concat', 'uglify'],
        options: {
          livereload: true
        }
      },

      all: {
        files: '**/*.php',
        options: {
          livereload: true
        }
      }

    },

    postcss: {
      options: {
        map: true,
        processors: [
          require('pixrem')(), // add fallbacks for rem units
          require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
          require('cssnano')() // minify the result
        ]
      },
      dist: {
        src: 'assets/stylesheets/foundation.css'
      }
    },

    browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        'assets/stylesheets/*.css',
                        '**/*.php',
                        'assets/javascript/**/*.js'
                    ]
                },
                options: {
                    watchTask: true,
                    // fill in proxy address of local WP server
                    proxy: ""
                }
            }
        }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-string-replace');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-browser-sync');

  grunt.registerTask('package', ['compress:main']);
  grunt.registerTask('build', ['copy', 'sass', 'postcss', 'concat', 'uglify']);
  grunt.registerTask('browser-sync', ['browserSync', 'watch']);
  grunt.registerTask('default', ['watch']);
};
