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
  App.Models.Hack = Backbone.Model.extend({
  });


  /***************************************************
   *
   * Collections 
   */
  App.Collections.Hack = Backbone.Collection.extend({
    model : App.Models.Hack
  });


  /***************************************************
   *
   * Views 
   */
  App.Views.Hack = Backbone.View.extend({
    tagName : 'article[data-high="3"] div',

    initialize : function() {
      console.log('test');
    },

    // render : function() {
    //   this.collection.each(this.addOne, this);
    //   return this;
    // },

    // addOne : function(font) {
    //   var fontView = new App.Views.Font({model : font});
    //   this.$el.append(fontView.render().el);
    // }
  });

  // var hackView = new App.Views.Hack();


  // @TODO: [TimPietrusky] - Find a better place for this
  var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

  setInterval(function() {
    var i = Math.round((Math.random()) * tips.length);
    if (i == tips.length) --i;
    $(".catch-phrase__anim").html(tips[i]);
  }, 400);
})();