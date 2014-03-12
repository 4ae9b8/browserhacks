var csslint = require('csslint').CSSLint;

module.exports = function(hack){
  if (hack.language === 'css' && !hack.safe){
    var result = [],
        filterdMessages = [];
    for(var i = 0; i < hack.test.length; i++) {
      result[i] = csslint.verify(hack.test[i]);
      /*if(result[i].messages.filter === 'error') {
        filterdMessages[i] = result[i];
      }*/
    }
      /*
    filterdMessages = result.messages.filter(function(v){ // filter for real errors!
      return v.type === 'error';
    });
*/

    if (filterdMessages.length > 0){
      hack.safe = false;
  //    hack.csslint = filterdMessages[0].message;
    } else {
      hack.safe = true;
    }
  }
};