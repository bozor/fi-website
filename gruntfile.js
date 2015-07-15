module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        php: {
            dev: {
                options: {
                    hostname: 'fianium',
                    port: 5000,
                    base: 'public_html'
                }
            }
        },
        
        watch: {
            /*markup: {
                files: ['public_html/**'],
                options: {
                    livereload: true
                }
            },*/
            stylesheets: {
                files: 'src/scss/**',
                tasks: 'sass:dev'
            }
        },
                     
        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    sourcemap: 'auto',
                    loadPath: require('node-bourbon').includePaths,
                    loadPath: require('node-neat').includePaths
                },
                files: {
                    'public_html/css/all.css' : 'src/scss/all.scss'
                }
            }
        },
            
        clean: {
            stylesheets: 'public_html/css/*.css'
        }

    });
    
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    
    grunt.registerTask('stylesheets:dev', ['clean:stylesheets', 'sass:dev']);

    grunt.registerTask('dev', ['stylesheets:dev']);

    grunt.registerTask('default', ['dev', 'php', 'watch']);
};