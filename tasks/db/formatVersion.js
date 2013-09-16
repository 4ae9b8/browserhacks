var formatVersion = function(humanVersion){
  var version = humanVersion.split('|'),
      result  = humanVersion;

  if (version.length > 1){
    var continuous = true;

    for (var i=0;i< version.length-1;i++){
      var thisV = parseFloat(version[i], 10),
          nextV = parseFloat(version[i+1],10);

      if (thisV+1 !== nextV){
        continuous = false;
        break;
      }

    }

    if (continuous)
      result = version[0] + "-" + version[version.length-1];
  }

  result = result.replace(/\|/g, "/");

  return result;
};


module.exports = function(hack){

  for (var i in hack.browsers){

    hack.browsers[i] = {
            version      : hack.browsers[i],
            humanVersion : formatVersion(hack.browsers[i])
    };

  }
};