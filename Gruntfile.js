module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.css': 'scss/app.scss'
        }        
      }
    },

    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.js',
        dest: 'js'
      },

      maps: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.map',
        dest: 'js'
      }
    },

    uglify: {
      dist: {
        files: {
          'js/modernizr/modernizr.min.js': ['js/modernizr/modernizr.js']
        }
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: [
          '../bower_components/foundation/js/foundation/foundation.abide.js',
          '../bower_components/foundation/js/foundation/foundation.accordion.js',
          '../bower_components/foundation/js/foundation/foundation.alert.js',
          '../bower_components/foundation/js/foundation/foundation.clearing.js',
          '../bower_components/foundation/js/foundation/foundation.dropdown.js',
          '../bower_components/foundation/js/foundation/foundation.equalizer.js',
          '../bower_components/foundation/js/foundation/foundation.interchange.js',
          '../bower_components/foundation/js/foundation/foundation.joyride.js',
          '../bower_components/foundation/js/foundation/foundation.js',
          '../bower_components/foundation/js/foundation/foundation.magellan.js',
          '../bower_components/foundation/js/foundation/foundation.offcanvas.js',
          '../bower_components/foundation/js/foundation/foundation.orbit.js',
          '../bower_components/foundation/js/foundation/foundation.reveal.js',
          '../bower_components/foundation/js/foundation/foundation.slider.js',
          '../bower_components/foundation/js/foundation/foundation.tab.js',
          '../bower_components/foundation/js/foundation/foundation.tooltip.js',
          '../bower_components/foundation/js/foundation/foundation.topbar.js',
          'js/custom/*.js' // including all scripts located in the custom js folder
        ],

        dest: 'js/foundation.js'
      }

    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass', 'copy', 'uglify', 'concat']);
  grunt.registerTask('default', ['watch']);
}