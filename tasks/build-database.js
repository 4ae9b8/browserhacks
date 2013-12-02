var addId      = require('./add-id'),
    cssLint    = require('./css-lint'),
    jsHint     = require('./js-hint'),
    addVersion = require('./format-version'),
    addLegacy  = require('./is-legacy');

module.exports = function(grunt) {
  grunt.registerTask('buildDB', 'Update the database.', function() {
    grunt.config.requires('buildDB.src');
    grunt.config.requires('buildDB.dest');

    var src  = grunt.config('buildDB.src'),
        dest = grunt.config('buildDB.dest');

    if (!grunt.file.isFile(src)){
      grunt.warn('File not found '+src);
    }

    var hacks       = grunt.file.readJSON(src),
        browsers    = grunt.file.readJSON('./src/db/browsers.json'), // @TODO Make this customizable in Gruntfile.js
        typeArrays  = {};

    hacks.forEach(function(hack) {
      addId(hack);
      addVersion(hack, browsers);
      addLegacy(hack, browsers);
      cssLint(hack);
      jsHint(hack);

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