var csslint = require('csslint').CSSLint;

module.exports = function(hack){
  if (hack.language === 'css' && !hack.safe){
    var result = csslint.verify(hack.test);

    var filterdMessages = result.messages.filter(function(v){ // filter for real errors!
      return v.type === 'error';
    });

    if (filterdMessages.length > 0){
      hack.safe = false;
      hack.csslint = filterdMessages[0].message;
    } else {
      hack.safe = true;
    }
  }
};