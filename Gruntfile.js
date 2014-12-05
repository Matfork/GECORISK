module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // 2. Configuration for tasks files goes here.
         concat: {
            options: {
              separator: ';',
            },
            dist: {
              //src: ['./public/assets/js/origin/**/*.js', './public/assets/bower_components/**/*.js'],
              src: ['./public/assets/js/origin/**/*.js'],
              dest: './public/assets/js/build/main.js',
            },
         },

        // Grunt task Uglify
        uglify: {
            options: {
                banner: ''
            },
            target_1: {
                // Source file
                src: ['./public/assets/js/build/main.js'],
                // Minified new file
                dest: './public/assets/js/build/main.min.js'
            }
        },

        // Configuration for the Sass task
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                     './public/assets/cdss/build/styles.min.css': './public/assets/css/sass/main.scss'
                }
            }
         },

        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: './public/assets/img/origin/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: './public/assets/img/build/'
                }]
            }
        },

         // Grunt task watch
        watch: {
            concat: {
                files: ['./public/assets/js/origin/**/*.js', './public/assets/bower_components/**/*.js'],
                tasks: ['concat']            
            },           
            uglify: {
                files: ['./public/assets/js/build/main.js'],
                tasks: ['uglify']
            },
             sass: {
                files: ['./public/assets/css/sass/**/*.scss'],
                tasks: ['sass'],
            },
            //not working
            imagemin:{
                files: ['./public/assets/img/origin/**/*.{png,jpg,gif}'],
                tasks: ['imagemin']
            },

            //no tested

            // livereload: {
            //     options: {
            //         livereload: true
            //     },
            //     files: [
            //         './app/views/**/*.php', './public/assets/css/sass/**/*.scss'
            //     ]
            // },
        }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat','sass','uglify','imagemin']);
    grunt.registerTask('js', ['concat','uglify']);


};