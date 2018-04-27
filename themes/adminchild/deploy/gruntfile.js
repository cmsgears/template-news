module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCss' );
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );

    grunt.initConfig({
        pkg: grunt.file.readJSON( 'package.json' ),

		sass: {
			dist: {
				options: {
					style: 'expanded',
					loadPath: '/office/development/projects-vc/php/cmgtools/cmt-ui/src/scss'
				},
				files: {
					'/office/development/projects-clients/php/newstheme/backend/web/styles/pubazxrs-20170722-src.css': '/office/development/projects-clients/php/newstheme/themes/admin/resources/styles/scss/public.scss',
					'/office/development/projects-clients/php/newstheme/backend/web/styles/prvazxrs-20170722-src.css': '/office/development/projects-clients/php/newstheme/themes/admin/resources/styles/scss/private.scss'
				}
			}
		},
        concatCss: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					'/office/development/projects-clients/php/newstheme/vendor/bower/fontawesome/css/font-awesome.min.css',
					'/office/development/projects-clients/php/newstheme/vendor/bower/cmt-iconlib/dist/css/cmti.min.css'
				],
        		dest: '/office/development/projects-clients/php/newstheme/backend/web/styles/cmnazxrs-20170722-src.css'
      		}
    	},
        concat: {
      		options: {
        		separator: '\n\n'
      		},
      		dist: {
        		src: [
					//'/office/development/projects-clients/php/newstheme/vendor/bower/jquery/dist/jquery.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/jquery-ui/jquery-ui.min.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/imagesloaded/imagesloaded.pkgd.min.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/handlebars/handlebars.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/chart.js/dist/Chart.min.js',
					'/office/development/projects-clients/php/newstheme/vendor/bower/cmt-js/dist/cmgtools.js',
					'/office/development/projects-clients/php/newstheme/vendor/foxslider/cmg-plugin/widgets/resources/scripts/foxslider-core.js',
					'/office/development/projects-clients/php/newstheme/vendor/cmsgears/widget-form-ajax/resources/scripts/apps/form.js',

					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/templates/public.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/templates/private.js',

					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/main.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/search.js',

					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apix/public.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apix/private.js',

					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apps/public.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apps/private.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apps/user.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apps/location.js',
					'/office/development/projects-clients/php/newstheme/themes/admin/resources/scripts/apps/notification.js',

					'/office/development/projects-clients/php/newstheme/themes/adminchild/resources/scripts/main.js',
				],
        		dest: '/office/development/projects-clients/php/newstheme/backend/web/scripts/cmnazxrs-20170722-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'/office/development/projects-clients/php/newstheme/backend/web/styles/cmnazxrs-20170722.css': [ '/office/development/projects-clients/php/newstheme/backend/web/styles/cmnazxrs-20170722-src.css' ],
	          		'/office/development/projects-clients/php/newstheme/backend/web/styles/pubazxrs-20170722.css': [ '/office/development/projects-clients/php/newstheme/backend/web/styles/pubazxrs-20170722-src.css' ],
					'/office/development/projects-clients/php/newstheme/backend/web/styles/prvazxrs-20170722.css': [ '/office/development/projects-clients/php/newstheme/backend/web/styles/prvazxrs-20170722-src.css' ],
					'/office/development/projects-clients/php/newstheme/backend/web/styles/manazxrs-20170722.css': [ '/office/development/projects-clients/php/newstheme/themes/adminchild/resources/styles/main.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'/office/development/projects-clients/php/newstheme/backend/web/scripts/cmnazxrs-20170722.js': [ '/office/development/projects-clients/php/newstheme/backend/web/scripts/cmnazxrs-20170722-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/admin/resources/fonts/clearsans/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/fonts/clearsans/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/admin/resources/fonts/opensans/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/fonts/opensans/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/vendor/bower/cmt-iconlib/dist/fonts/cmgtools/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/fonts/cmgtools/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/vendor/bower/fontawesome/fonts/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/fonts/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/images/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/images/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/images/icons/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/backend/web/images/icons/', filter: 'isFile' }
				]
			}
		}
    });

    grunt.registerTask( 'default', [ 'sass', 'concatCss', 'concat', 'cssmin', 'uglify', 'copy' ] );
};