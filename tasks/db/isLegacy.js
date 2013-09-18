var isLegacy = function(version, limit){
  // If version is *
  if(version == "*")
    return false;

  // If last character of version is +
  if(version[version.length-1] === '+')
    return false;

  // If version contains |, we break it down to have the last int
  if(version.indexOf('|') > 0) {
    version =  version.substr(version.lastIndexOf('|'));
  }

  // If version contains - but not at the end
  if(version.indexOf('-') > 0 && version[version.length-1] !== '-') {
    version = version.substr(version.lastIndexOf('-'));
  }

  // If the version is less than or equals to $limit
  if(parseFloat(version) <= limit){
    return true;
  }


  // Else
  return false;
};


module.exports = function(hack, allBrowsers){

  for (var i in hack.browsers){
    var humanVersion  = hack.browsers[i].humanVersion,
        limit         = parseFloat(allBrowsers[i].legacy, 10);

    hack.browsers[i].legacy = isLegacy(humanVersion, limit);

  }

};