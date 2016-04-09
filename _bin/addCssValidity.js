var csslint = require('csslint').CSSLint;

module.exports = function (hack) {
  if (hack.language !== 'css') {
    return hack
  }

  for (var i = 0; i < hack.test.length; i += 1) {
    var lint = csslint.verify(hack.test[i])
    var errors = lint.messages.filter(function (message) {
      return message.type === 'error'
    })

    if (errors.length > 0) {
      return Object.assign({}, hack, { safe: true })
    } else {
      return Object.assign({}, hack, { safe: false })
    }
  }

  return hack;
};
