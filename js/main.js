(function() {
  window.App = {
    Models : {},
    Collections : {},
    Views : {}
  };

  window.template = function(id) {
    return _.template($('#' + id).html());
  };

  window.vent = _.extend({}, Backbone.Events);

  /***************************************************
   *
   * Models 
   */


  /***************************************************
   *
   * Collections 
   */


  /***************************************************
   *
   * Views 
   */




  // @TODO: [TimPietrusky] - Find a better place for this
  var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

  setInterval(function() {
    var i = Math.round((Math.random()) * tips.length);
    if (i == tips.length) --i;
    $(".catch-phrase__anim").html(tips[i]);
  }, 400);
})();