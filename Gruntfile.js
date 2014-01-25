'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    sass: {
      dist: {
        files: {
          'style.css' : 'style.scss'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/bootstrap/transition.js',
            'assets/js/bootstrap/alert.js',
            'assets/js/bootstrap/button.js',
            'assets/js/bootstrap/carousel.js',
            'assets/js/bootstrap/collapse.js',
            'assets/js/bootstrap/dropdown.js',
            'assets/js/bootstrap/modal.js',
            'assets/js/bootstrap/tooltip.js',
            'assets/js/bootstrap/popover.js',
            'assets/js/bootstrap/scrollspy.js',
            'assets/js/bootstrap/tab.js',
            'assets/js/bootstrap/affix.js',
            'assets/js/*.js',
            'assets/js/_*.js'
          ]
        }
      }
    },
    watch: {
      css: {
        files: 'style.scss',
        tasks: ['sass']
      },
      // js: {
      //   files: [
      //     '<%= jshint.all %>'
      //   ],
      //   tasks: ['jshint', 'uglify', 'version']
      // },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/css/main.min.css',
          'assets/js/scripts.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/main.min.css',
        'assets/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-wp-version');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'sass',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};