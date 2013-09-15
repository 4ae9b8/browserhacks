(function() {
  module.exports.register = function(Handlebars, options) {

    var inObj = function(obj, key, options) {
      if(!!obj[key]) {
        return options.fn(this);
      }
      return options.inverse(this);
    },
    fromObj = function(obj, /*keys ...*/ options){
        var result = obj;
        for (var i=1;i<arguments.length;i++){
            var key = arguments[i];
            if (!(typeof key == 'string' || key instanceof String)) break;
            result = result[arguments[i]];
        }
        return result;
    },
    setValue = function(key, value, option) {
      this[key] = value;
    },

    formatVersion = function(obj, /*keys ...*/ options){
      var result = fromObj.apply(this, arguments),
         version = result.split('|');

      if (version.length > 1){
        var continuous = true;

        for (var i=0;i< version.length-1;i++){
          var thisV = parseInt(version[i], 10),
              nextV = parseInt(version[i+1],10);
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
    },

    eachFilteredBrowser = function(obj, filter, options){
      var result = '', lasttype = '';
      for (var i in obj){
        var newctx = obj[i];
        if (!!newctx.browsers[filter]){
          newctx['@key']      = i;
          newctx['lasttype'] = lasttype;
          result += options.fn(newctx);

          lasttype = newctx.type;
        }
      }
      return result;
    };


    Handlebars.registerHelper('inObj',               inObj);
    Handlebars.registerHelper('fromObj',             fromObj);
    Handlebars.registerHelper('setValue',            setValue);
    Handlebars.registerHelper('formatVersion',       formatVersion);
    Handlebars.registerHelper('eachFilteredBrowser', eachFilteredBrowser);

  };
}).call(this);