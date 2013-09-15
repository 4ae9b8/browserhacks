module.exports = function(grunt) {

  var path = require('path');

  grunt.registerTask('generateTestCssJs', 'Generate Test CSS/JS for every hack', function(){
    grunt.config.requires('generateTestCssJs.src');
    grunt.config.requires('generateTestCssJs.destCss');
    grunt.config.requires('generateTestCssJs.destJs');
    grunt.config.requires('generateTestCssJs.destname');

    var src      = grunt.config('generateTestCssJs.src'),
        destCss  = grunt.config('generateTestCssJs.destCss'),
        destJs   = grunt.config('generateTestCssJs.destJs'),
        destname = grunt.config('generateTestCssJs.destname');

    if (!grunt.file.isFile(src)){
      grunt.warn('Source file not found '+src);
    }
    if (!grunt.file.isDir(destCss) && !grunt.file.isFile(destCss)){
      grunt.file.mkdir(destCss);
    }
    if (!grunt.file.isDir(destJs) && !grunt.file.isFile(destJs)){
      grunt.file.mkdir(destJs);
    }

    var hacks       = grunt.file.readJSON(src),
        cssDump  = '';
        jsDump   = 'var testClass="js-succeed";function enable_test(){';

    for (var i in hacks){
      var hack = hacks[i];
      if(hack.language === 'css' || hack.language === 'javascript') {
        var lines = hack.test.split('\n');

        for(b= 0; b < lines.length; b++) {
          var name  = 'hack_' + hack.id + '_' + b; // Name the class

          if(hack.language === 'css') {
            cssDump += lines[b].replace(/\.selector/g, '.'+name);
          }else if(hack.language === 'javascript') {
            jsDump += "var " + name + "=" + hack.test;
            jsDump += "if(" + name + ") $('." + name + "').addClass(testClass);";
          }
        }
      }
    }

    jsDump += '}function disable_test(){$("."+testClass).removeClass(testClass);}function tests(state){if(state==true)enable_test();if(state==false)disable_test();}';

    grunt.file.write(path.join(destJs,  destname+'.js'),  jsDump);
    grunt.file.write(path.join(destCss, destname+'.css'), cssDump);

    return true;
  });
};