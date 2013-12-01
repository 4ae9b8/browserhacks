var isLegacy = function(version, limit){
  var v = version;

  // If version is * or last character of version is +
  if(v == "*" || v[v.length-1] === '+')
    return false;

  // If version contains |, we break it down to have the last int
  if(v.indexOf('|') > 0) {
    v =  v.substr(v.lastIndexOf('|'));
  }

  // If version contains - but not at the end
  if(v.indexOf('-') > 0 && v[v.length-1] !== '-') {
    v = v.substr(v.lastIndexOf('-'));
  }

  // If the version is less than or equals to $limit
  if(parseFloat(v) <= limit){
    return true;
  }

  // Else
  return false;
};


module.exports = function(hack, allBrowsers){

  for (var i in hack.browsers){
    var humanVersion  = hack.browsers[i].version,
        limit         = parseFloat(allBrowsers[i].legacy, 10);

    hack.browsers[i].legacy = isLegacy(humanVersion, limit);

  }

};