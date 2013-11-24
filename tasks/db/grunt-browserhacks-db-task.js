var addId      = require('./addid'),
    cssLint    = require('./csslint'),
    addVersion = require('./formatVersion.js'),
    addLegacy  = require('./isLegacy');
    
module.exports = function(grunt) {
  grunt.registerTask('updateDatabase', 'Update the database used by Browserhacks.', function(){
    grunt.config.requires('updateDatabase.src');
    grunt.config.requires('updateDatabase.dest');

    var src  = grunt.config('updateDatabase.src'),
        dest = grunt.config('updateDatabase.dest');

    if (!grunt.file.isFile(src)){
      grunt.warn('File not found '+src);
    }

    var hacks       = grunt.file.readJSON(src),
        browsers    = grunt.file.readJSON('./src/db/browsers.json'), // @TODO Make this customizable in Gruntfile.js
        typeArrays  = {};

    hacks.forEach(function(hack){
      addId(hack);

      addVersion(hack, browsers);


      addLegacy(hack, browsers);
      cssLint(hack);

      // Run test then sort.
      typeArr = typeArrays[hack.type] || [];

      typeArr.push(hack);

      typeArrays[hack.type] = typeArr;

    });

    var sorted = [];

    for (var key in typeArrays){
      sorted = sorted.concat(typeArrays[key]);
    }

    grunt.file.write(dest, JSON.stringify(sorted, null, 2));

    return true;
  });
};