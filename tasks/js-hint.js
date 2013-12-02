var JSHINT = require( 'jshint' ).JSHINT;

module.exports = function(hack){
  if (hack.language === 'javascript' && !hack.safe){

    // Use hack.code because hack.test will be invalid.
    hack.safe = JSHINT(hack.code);

    hack.jshint = JSHINT.errors.filter(function (er) {
      // Filter for real errors
      return er && er.id === "(error)";
    }).map(function (er) {
      // Build Message + Chararacter string
      return er.raw + ' (char:'+er.character+')';
    });

  }
};