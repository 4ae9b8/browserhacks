#!/usr/bin/env node

var crypto = require('crypto')

module.exports = function (hack) {
  var string = hack.code.join('')
  var id = crypto.createHash('md5').update(string).digest('hex')
  
  return Object.assign({}, hack, { id: id })
}
