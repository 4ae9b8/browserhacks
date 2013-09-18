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
    Handlebars.registerHelper('eachFilteredBrowser', eachFilteredBrowser);

  };
}).call(this);