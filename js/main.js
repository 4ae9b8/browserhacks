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
  App.Models.Browser = Backbone.Model.extend({
  });


  /***************************************************
   *
   * Collections 
   */
  App.Collections.Browser = Backbone.Collection.extend({
    model : App.Models.Browser
  });


  /***************************************************
   *
   * Views 
   */

  /* A single browser */
  App.Views.Browser = Backbone.View.extend({
    el : 'article[data-high="3"]',

    initialize : function() {
      console.log(this.model.get('browser'));
    }
  });

  /* All browser */
  App.Views.Master = Backbone.View.extend({
    initialize : function() {
      this.collection.each(function(browser) {
        new App.Views.Browser({model: browser});
      }, this);
    }
  });


  /*--------------------------------------------------
   *
   * Start the app
   */

  // A collection of browsers
  var collection_browser = new App.Collections.Browser([
    {'browser' : 'ch'}, 
    {'browser' : 'fx'},
    {'browser' : 'ie'},
    {'browser' : 'sa'},
    {'browser' : 'op'}
  ]);

  // All 
  var view_master = new App.Views.Master({collection : collection_browser});


  // @TODO: [TimPietrusky] - Find a better place for this
  var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

  setInterval(function() {
    var i = Math.round((Math.random()) * tips.length);
    if (i == tips.length) --i;
    $(".catch-phrase__anim").html(tips[i]);
  }, 400);
})();