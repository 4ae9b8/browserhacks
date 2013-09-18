var md5 = require('MD5');

module.exports = function(hack){
  hack.id = md5(hack.code);
};