module.exports = function(grunt){

  require('load-grunt-tasks')(grunt, ['grunt-*', 'assemble']);


  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    assemble: {
      options: {
         layoutdir: './assemble/templates/layouts'
      },
      browserhacks: {
        options : {
          data: ['./tmp/db/hacks.json', './src/db/browsers.json', './src/db/hackTypes.json'],
          helpers : './assemble/helpers/helper-*.js',
          layout: 'main.hbs',
        },
        files: [
          { expand: true, cwd: './assemble/templates/pages', src: ['*.hbs'], dest: './dist' }
        ]
      }
    },

    compass: {
      dist: {
        options: {
          outputStyle: 'compressed',
          sassDir:    './src/scss',
          imagesDir:  './src/img',

          cssDir: './tmp/css'
        }
      }
    },

    uglify: {
      dist : {
       files: {
         'dist/js/main.min.js': [

            './src/js/lib/jquery.min.js',
            './src/js/lib/underscore.min.js',
            './src/js/lib/backbone.min.js',
            './src/js/lib/prism.min.js',
            './src/js/lib/select.min.js',
            './src/js/lib/carbonads.min.js',
            './src/js/main.js',

            //'./tmp/js/browserhacks-test-page.js'
          ]
       }
      }
    },

    concat: {
      distCss: {
        src: ['./tmp/css/browserhacks.css', './tmp/css/browserhacks-test-page.css'],
        dest: 'dist/css/browserhacks.css'
      }
    },

    /* Copy remaining assets */
    copy: {
      iecss : {
        files : [
          {expand:true, cwd: './tmp/css', src: ['browserhacks-ie.css'], dest : './dist/css/'}
        ]
      },

      /* Prevent the JS tests to be minified */
      js : {
        files : [
          {expand:true, cwd: './tmp/js', src: ['browserhacks-test-page.js'], dest: './dist/js'}
        ]
      },

      fonts : {
        files:[
          {expand:true, cwd: './src/fonts', src: ['*'], dest : './dist/fonts'}
        ]
      },

      img : {
        files:[
          {expand:true, cwd: './src/img', src: ['*'], dest : './dist/img'}
        ]
      }
    },

    updateDatabase : {
      src  : './src/db/hacks.json',
      dest : './tmp/db/hacks.json'
    },

    /* This must run after updateDatabase */
    generateTestCssJs : {
      src : '<%= updateDatabase.dest %>',

      destCss : './tmp/css',
      destJs  : './tmp/js',
      destname : 'browserhacks-test-page'
    },


    connect: {
      server: {
        options: {
          port: 8000,
          base: './dist'
        }
      }
    },

    watch: {
      scss: {
        files: ['./src/scss/**/*.scss'],
        tasks: ['compass:dist', 'concat']
      },
      db : {
        files : ['./src/db/*.json'],
        tasks: ['build']
      },
      html: {
        files: ['./assemble/tempaltes/**/*.hbs', './assemble/helpers/*.js'],
        tasks: 'assemble:browserhacks'
      },
      js: {
        files: ['./src/js/**/*.js'],
        tasks: 'uglify:dist'
      },
      livereload: {
        options: {
          livereload: true
        },
        files: [
          './dist/**/*.{html,js,css,png,svg,ico}',
        ]
      }
    }

  });

  require('./tasks/db/grunt-browserhacks-db-task.js')(grunt);
  require('./tasks/test-page/grunt-generate-test-css-js.js')(grunt);

  grunt.registerTask('build', [
                                'updateDatabase',    // Update ./src/db/hacks.json testing against csslint and adding a id to each test
                                'generateTestCssJs', // Generating the CSS and JS needed for testing all the hacks

                                'assemble:browserhacks', // Build up the browserhacks index.html

                                'compass:dist',    // Compile sass using compass
                                'concat',       // Concat the Compiled Sass with the ./tmp/css/browserhacks-test-page.css

                                'uglify:dist',  //  Uglify JS including the ./tmp/js/browserhakcs-test-page.js


                                'copy'          // Copy fonts/images (Images could be done using imagemin)
                              ]);

  grunt.registerTask('dev', ['build', 'connect', 'watch']);

};