module.exports = function(grunt) {

  var path = require('path');

  grunt.registerTask('buildTests', 'Generate CSS/JS tests for every hack', function(){
    grunt.config.requires('buildTests.src');
    grunt.config.requires('buildTests.destCss');
    grunt.config.requires('buildTests.destJs');
    grunt.config.requires('buildTests.destname');

    var src      = grunt.config('buildTests.src'),
        destCss  = grunt.config('buildTests.destCss'),
        destJs   = grunt.config('buildTests.destJs'),
        destname = grunt.config('buildTests.destname');

    if (!grunt.file.isFile(src)){
      grunt.warn('Source file not found '+src);
    }
    if (!grunt.file.isDir(destCss) && !grunt.file.isFile(destCss)){
      grunt.file.mkdir(destCss);
    }
    if (!grunt.file.isDir(destJs) && !grunt.file.isFile(destJs)){
      grunt.file.mkdir(destJs);
    }

    var hacks    = grunt.file.readJSON(src),
        cssDump  = "";
        jsDump   = "var testWidgetSettings,testWidget={settings:{testClass:'js-succeed'},init:function(){testWidgetSettings=this.settings;this.runTests();},runTests:function(){";

    for (var i in hacks){
      var hack = hacks[i];
      if(hack.language === 'css' || hack.language === 'javascript') {
        var lines = hack.test.split('\n');

        for(b= 0; b < lines.length; b++) {
          var name  = 'hack_' + hack.id + '_' + b; // Name the class

          if(hack.language === 'css') {
            cssDump += lines[b].replace(/\.selector/g, '.run-test .'+name);
          } else if(hack.language === 'javascript') {
            jsDump += "var " + name + "=" + hack.test + ';';
            jsDump += "if(" + name + ") $('." + name + "').addClass(testWidgetSettings.testClass);";
          }
        }
      }
    }

    jsDump += "}};";

    grunt.file.write(path.join(destJs,  destname+'.js'),  jsDump);
    grunt.file.write(path.join(destCss, destname+'.css'), cssDump);

    return true;
  });
};