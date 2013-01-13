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


  // var fontsCollection = new App.Collections.Fonts([
  //   {name : 'abril-fatface'}
  // ]);

  // var fontsView = new App.Views.Fonts({collection : fontsCollection});
  // $('.fonts').append(fontsView.render().el);

  // var allFontsCollection = new App.Collections.Creator([]);

  // var navigationView = new App.Views.Navigation({ collection: allFontsCollection });
  // $('body').append(navigationView.render().el);

  // var outputView = new App.Views.Output({ collection : allFontsCollection });
  // $('section[data-name="output"] div').append(outputView.render().el);


  // @TODO: [TimPietrusky] - Find a better place for this
  var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

  setInterval(function() {
    var i = Math.round((Math.random()) * tips.length);
    if (i == tips.length) --i;
    $(".catch-phrase__anim").html(tips[i]);
  }, 400);
})();