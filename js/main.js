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
    initialize : function() {
      this.$el = $('#' + this.model.get('browser'));

      vent.bind("search", this.handleSearch, this);
      vent.bind("searchCancelled", this.searchCancelled, this);
    },

    handleSearch : function(data) {
      var names = this.model.get('names');

      // Match
      if (names[0].indexOf(data.value) == 0 || names[1].indexOf(data.value) == 0) {
        this.$el.show();
      } else {
        this.$el.hide();
      }
    },

    searchCancelled : function() {
      this.$el.show();
    },

    toggleView : function() {

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

  /* Search */
  App.Views.Search = Backbone.View.extend({
    el : 'input#search',

    events : {
      'keyup' : 'keyup'
    },

    keyup : function(e) {
      var value = this.$el.val();

      if (value != '') {
        value = value.toLowerCase().trim();
        vent.trigger("search", {'value' : value});

        // Hide description
        $('article[data-type="description"]').hide();
      } else {
        // Show all browser
        vent.trigger("searchCancelled");

        // Show description
        $('article[data-type="description"]').show();
      }
    }
  });


  /*--------------------------------------------------
   *
   * Start the app
   */

  // A collection of browsers
  var collection_browser = new App.Collections.Browser([
    {'browser' : 'ch', 'names' : ['chrome', 'ch']}, 
    {'browser' : 'fx', 'names' : ['firefox', 'mozilla firefox']},
    {'browser' : 'ie', 'names' : ['internet explorer', 'ie']},
    {'browser' : 'sa', 'names' : ['safari', 'apple safari']},
    {'browser' : 'op', 'names' : ['opera', 'op']}
  ]);

  // Holds all browser
  var view_master = new App.Views.Master({collection : collection_browser});

  // Handles the search
  var view_search = new App.Views.Search();


  // @TODO: [TimPietrusky] - Find a better place for this
  var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

  setInterval(function() {
    var i = Math.round((Math.random()) * tips.length);
    if (i == tips.length) --i;
    $(".catch-phrase__anim").html(tips[i]);
  }, 400);
})();