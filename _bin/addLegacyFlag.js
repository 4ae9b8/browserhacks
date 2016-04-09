var path = require('path')
var BROWSERS_FILE = path.resolve(__dirname, '..', '_data/browsers.json')
var browsers = require(BROWSERS_FILE)

module.exports = function(hack) {
  var _hack = Object.assign({}, hack)

  for (var browser in _hack.browsers) {
    var humanVersion = hack.browsers[browser].version
    var limit = parseFloat(browsers[browser].legacy, 10)

    _hack.browsers[browser].legacy = isLegacy(humanVersion, limit)
  }

  return _hack
}

function isLegacy (version, limit) {
  var lastChar = version[version.length - 1]

  // If version is * or last character of version is +
  if (version === "*" || lastChar === '+') {
    return false
  }

  // If version contains |, we break it down to have the last int
  if (version.indexOf('|') > 0) {
    version =  version.substr(version.lastIndexOf('|'))
  }

  // If version contains - but not at the end
  if (version.indexOf('-') > 0 && lastChar !== '-') {
    version = version.substr(version.lastIndexOf('-'))
  }

  // If the version is less than or equals to $limit
  if (parseFloat(version, 10) <= limit){
    return true
  }

  // Else
  return false
}
