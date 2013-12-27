module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['assets/magnific.js', 'assets/jquery-vimeothumb.js'],
        dest: 'magnific_popup/blocks/magnific_popup/magnific/magnific-combined-1.0.0.js'
      }
    },
    uglify: {
      options: {
        // the banner is inserted at the top of the output
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'magnific_popup/blocks/magnific_popup/magnific/magnific-combined-1.0.0.min.js': ['<%= concat.dist.dest %>']
        }
      }
    },
  });


  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');


  grunt.registerTask('default', ['concat', 'uglify']);

};