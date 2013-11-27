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
					data: ['./tmp/db/hacks.json', './src/db/browsers.json', './src/db/hackTypes.json', './src/db/quotes.json'],
					helpers : './assemble/helpers/helper-*.js',
					layout: 'main.hbs',
				},
				files: [
					{ expand: true, cwd: './assemble/templates/pages', src: ['*.hbs'], dest: './dist' }
				]
			}
		},


		htmlmin : {
			dist: {
				options: {
					collapseWhitespace: true
				},
				files: {
					'dist/index.html': 'dist/index.html',
				}
			}
		},

		compass: {
			dist: {
				options: {
					httpGeneratedImagesPath : '../img/',
					basePath : './src',
					outputStyle: 'compressed',
					sassDir:    'scss',
					imagesDir:  'img',

					cssDir: '../tmp/css'
				}
			}
		},

		uglify: {
			dist : {
				files: {
					'./tmp/js/main.min.js': [

						'./src/js/lib/jquery.min.js',
						'./src/js/lib/jquery.mousewheel.js',
						'./src/js/lib/underscore.min.js',
						'./src/js/lib/backbone.min.js',
						'./src/js/lib/prism.min.js',
						'./src/js/lib/select.min.js',
						'./src/js/lib/carbonads.min.js',
						'./src/js/main.js',

						// We can't uglify the browserhacks-test-page because some test would break (see concat js)
						//'./tmp/js/browserhacks-test-page.js'
					]
				}
			}
		},

		concat: {
			css: {
				src: ['./tmp/css/browserhacks.css', './tmp/css/browserhacks-test-page.css'],
				dest: 'dist/css/browserhacks.css'
			},

			/* Prevent the browserhacks-test-page.js to be minified. Just concat it*/
			js : {
				src : ['./tmp/js/main.min.js', './tmp/js/browserhacks-test-page.js'],
				dest: './dist/js/main.min.js'
			}
		},

		/* Copy remaining assets */
		copy: {
			iecss : {
				files : [
					{expand:true, cwd: './tmp/css', src: ['browserhacks-ie.css'], dest : './dist/css/'}
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
			},

			quotes : {
				files:[
					{expand:true, cwd: './src/db', src: ['quotes.json'], dest : './dist'}
				]
			},

			htaccess:{
				files:[
					{expand:true, cwd: './src', src: ['.htaccess'], dest : './dist'}
				]
			},

			cname : {
				files:[
					{expand:true,cwd: './', src:['CNAME'], dest :'./dist'}
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
					base: './dist',
					open : true
				}
			}
		},

		watch: {
			scss: {
				files: ['./src/scss/*.scss'],
				tasks: ['buildcss', 'copy:img']
			},
			db : {
				files : ['./src/db/*'],
				tasks: ['build']
			},
			html: {
				files: ['./assemble/templates/**/*.hbs', './assemble/helpers/*.js'],
				tasks: 'buildhtml'
			},
			js: {
				files: ['./src/js/**/*.js'],
				tasks: ['buildjs']
			},
			livereload: {
				options: {
					livereload: true
				},
				files: [
					'./dist/**/*.{html,js,css,png,svg,ico}',
				]
			}
		},


		'gh-pages' : {
				options: {
					clone : 'gh-pages-branch',
					base  : 'dist'
				},
				src: ['**/*']
		}

	});

	require('./tasks/db/grunt-browserhacks-db-task.js')(grunt);
	require('./tasks/test-page/grunt-generate-test-css-js.js')(grunt);


	grunt.registerTask('clean', function(){
		grunt.file.delete('./dist');
		grunt.file.delete('./tmp');
	});

	grunt.registerTask('buildhtml', ['assemble:browserhacks', 'htmlmin:dist']);

	grunt.registerTask('buildjs', [
																 'uglify:dist',     //  Uglify JS
																 'concat:js',       // Concat main.min.js with ./tmp/js/browserhacks-test-page.js
																]);

	grunt.registerTask('buildcss', [
																	'compass:dist',  // Compile sass using compass
																	'concat:css'     // Concat the Compiled Sass with the ./tmp/css/browserhacks-test-page.css
																]);

	grunt.registerTask('cleanbuild', ['clean', 'build']);

	grunt.registerTask('build', [
																'updateDatabase',    // Update ./src/db/hacks.json testing against csslint and adding a id to each test
																'generateTestCssJs', // Generating the CSS and JS needed for testing all the hacks

																'buildhtml',         // Build up the Browserhacks index.html
																'buildjs',           // Build up the main JS file
																'buildcss',          // Build up the main CSS file

																'copy'               // Copy fonts/images/iecss (Images could be done using imagemin)
															]);

	grunt.registerTask('publish', [
																	'clean',
																	'build',
																	'gh-pages'
																]);

	grunt.registerTask('dev', [
															'build',
															'connect',
															'watch'
														]);

};
