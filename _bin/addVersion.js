module.exports = function (hack) {
  var _hack = Object.assign({}, hack)

  for (var browser in _hack.browsers) {
    var currentVersion = hack.browsers[browser].version || hack.browsers[browser]

    _hack.browsers[browser] = {
      version: currentVersion,
      humanVersion: addVersion(currentVersion)
    }
  }

  return _hack
};

function addVersion (currentVersion) {
  var version = currentVersion.split('|')
  var result  = currentVersion

  if (version.length > 1) {
    var continuous = true

    for (var i = 0; i < version.length - 1; i++) {
      var thisV = parseFloat(version[i], 10)
      var nextV = parseFloat(version[i + 1], 10)

      if (thisV + 1 !== nextV) {
        continuous = false
        break
      }
    }

    if (continuous) {
      result = version[0] + '-' + version[version.length - 1]
    }
  }

  result = result.replace(/\|/g, '/')

  if (result[result.length - 1] === '+') {
    result = '≥ ' + result.substring(0, result.length - 1)
  }

  else if (result[result.length - 1] === '-') {
    result = '≤ ' + result.substring(0, result.length - 1)
  }

  return result
}
