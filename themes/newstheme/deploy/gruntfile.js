module.exports = function( grunt ) {

	grunt.loadNpmTasks( 'grunt-contrib-sass' );
 	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.renameTask( 'concat', 'concatCss' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
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
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/ladbzxrs-20171119-src.css': '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/styles/scss/landing.scss',
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/pubbzxrs-20171119-src.css': '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/styles/scss/public.scss',
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/blgbzxrs-20171119-src.css': '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/styles/scss/blog.scss',
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/prvbzxrs-20171119-src.css': '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/styles/scss/private.scss'
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
					'/office/development/projects-clients/php/newstheme/vendor/bower/cmt-iconlib/dist/css/cmti.min.css',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/styles/vendor/animate.css'
				],
        		dest: '/office/development/projects-clients/php/newstheme/frontend/web/styles/cmnbzxrs-20171119-src.css'
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

					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/vendor/conditionizr.min.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/conditionizr/detects/ie7-ie8-ie9.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/vendor/nouislider.min.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/vendor/timepicki.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/vendor/jquery.cookie.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/vendor/jquery-payment.js',

					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/templates/public.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/templates/private.js',

					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/main.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/sliders.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/maps.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/search.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/reports.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/analytics.js',

					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apix/public.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apix/private.js',

					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/public.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/private.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/listing.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/event.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/coupon.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/offer.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/location.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/autoload.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/ganalytics.js',
					'/office/development/projects-clients/php/newstheme/themes/newstheme/resources/scripts/apps/community.js'
				],
        		dest: '/office/development/projects-clients/php/newstheme/frontend/web/scripts/cmnbzxrs-20171119-src.js'
      		}
    	},
    	cssmin: {
			options: {

			},
      		target: {
	        	files: {
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/cmnbzxrs-20171119.css': [ '/office/development/projects-clients/php/newstheme/frontend/web/styles/cmnbzxrs-20171119-src.css' ],
	          		'/office/development/projects-clients/php/newstheme/frontend/web/styles/ladbzxrs-20171119.css': [ '/office/development/projects-clients/php/newstheme/frontend/web/styles/ladbzxrs-20171119-src.css' ],
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/pubbzxrs-20171119.css': [ '/office/development/projects-clients/php/newstheme/frontend/web/styles/pubbzxrs-20171119-src.css' ],
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/blgbzxrs-20171119.css': [ '/office/development/projects-clients/php/newstheme/frontend/web/styles/blgbzxrs-20171119-src.css' ],
					'/office/development/projects-clients/php/newstheme/frontend/web/styles/prvbzxrs-20171119.css': [ '/office/development/projects-clients/php/newstheme/frontend/web/styles/prvbzxrs-20171119-src.css' ]
	        	}
      		}
    	},
    	uglify: {
			options: {

			},
      		main_target: {
	        	files: {
	          		'/office/development/projects-clients/php/newstheme/frontend/web/scripts/cmnbzxrs-20171119.js': [ '/office/development/projects-clients/php/newstheme/frontend/web/scripts/cmnbzxrs-20171119-src.js' ]
	        	}
      		}
    	},
		copy: {
			main: {
				files: [
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/fonts/bebasneue/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/fonts/bebasneue/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/fonts/lato/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/fonts/lato/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/vendor/bower/cmt-iconlib/dist/fonts/cmgtools/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/fonts/cmgtools/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/vendor/bower/fontawesome/fonts/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/fonts/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/images/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/images/', filter: 'isFile' },
					{ expand: true, cwd: '/office/development/projects-clients/php/newstheme/themes/newstheme/resources/images/icons/', src: ['**'], dest: '/office/development/projects-clients/php/newstheme/frontend/web/images/icons/', filter: 'isFile' }
				]
			}
		}
    });

    grunt.registerTask( 'default', [ 'sass', 'concatCss', 'concat', 'cssmin', 'uglify', 'copy' ] );
};