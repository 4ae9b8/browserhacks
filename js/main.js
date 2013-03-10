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

  window.$.fn._show = function() {
    this.show();
  }

  window.$.fn._hide = function() {
    this.hide();
  }

  /***************************************************
   *
   * Models 
   */
  App.Models.Browser = Backbone.Model.extend({
    defaults : {
      'hackTypes' : []
    }
  });

  App.Models.Author = Backbone.Model.extend({
    defaults : {
      'position' : 0
    }
  });


  /***************************************************
   *
   * Collections 
   */
  App.Collections.Browser = Backbone.Collection.extend({
    model : App.Models.Browser
  });

  App.Collections.Quote = Backbone.Collection.extend({
    model : App.Models.Author,
    url : 'code/quotes.php',

    initialize : function() {
    }
  });


  /***************************************************
   *
   * Views 
   */

  /* 
   * All browser 
   */
  App.Views.Master = Backbone.View.extend({
    initialize : function() {
      // Create all browser views
      this.collection.each(function(browser) {
        new App.Views.Browser({model: browser});
      }, this);
    }
  });


  /* 
   * A single browser 
   */
  App.Views.Browser = Backbone.View.extend({
    hackChilds : null,

    initialize : function() {
      // The browser 
      this.$el = $('#' + this.model.get('browser'));

      /*
       * @TODO [TimPietrusky] - This code is SHIT. Please prettify it.
       */
      var type = '',
          hackParents,
          hackTypes = [];

      // Type of hacks (e.g. selector, javascript)
      hackParents = this.$el.find('[data-type*="-parent"]');

      // Create an array of hack types
      _.each(hackParents, function(item, index) {
        hackTypes.push($(item).attr('data-type').split('-')[0]);
      }, this);

      // Save the hack types into the model
      this.model.set('hackTypes', hackTypes);

      // The specific hacks
      this.hackChilds = this.$el.find('pre');

      // Listen to events
      vent.bind("search", this.handleSearch, this);
      vent.bind("searchCancelled", this.searchCancelled, this);
      vent.bind("searchNumber", this.searchNumber, this);
    },

    /*
     * Show or hide the browser after the search was triggered
     */
    handleSearch : function(data) {
      var names = this.model.get('names'),
          matched = false;
      
      // Match the browser
      _.each(names, function(browser) {
        if (browser.indexOf(data.browser) == 0 && !matched) {
          this.show(data);
          matched = true;
        }
      }, this);

      // Could not match browser
      if (!matched) {
        this.hide(data);
      }
    },

    /*
     * Show browser + filter versions.
     */
    show : function(data) {
      this.$el.show();
      this.$el.addClass('active');

      // Filter version
      if (data.version != null) {
        // data.version = ~~data.version;

        // Hide all childs
        this.hackChilds.hide();

        // Find only matched childs
        var matched = this.$el.find('pre[data-version*="'+data.version+'"]');

        // Filter the matched childs
        _.each(matched, function(item) {
          _item = $(item);

          // Get all versions
          versions = _item.attr('data-version').split('|');
          
          _.each(versions, function(version) {

            // Show version which starts with value
            if (version.indexOf(data.version) == 0) {
              _item.show();
            }
          }, this);
        }, this);

        // Find +
        _.each(this.$el.find('pre[data-version*="+"]'), function(item) {
          _item = $(item);
          version_plus = _item.attr('data-version').split('+');
          if (version_plus.length == 2) {
            version_plus = parseFloat(version_plus[0]);

            if (version_plus <= data.version) {
              _item.show();
            }
          }
        }, this);

        // Find -
        _.each(this.$el.find('pre[data-version*="-"]'), function(item) {
          _item = $(item);
          version_minus = _item.attr('data-version').split('-');
          if (version_minus.length == 2) {
            version_minus = parseFloat(version_minus[0]);

            if (version_minus >= data.version) {
              _item.show();
            }
          }
        }, this);

        // Change the style of filtered elements
        this.$el.addClass('filtered');

        // Hide empty hack types
        _.each(this.model.get('hackTypes'), function(type) {
          // Get the amount of visible hacks
          count = this.$el.find('[data-type="'+type+'-childs"] pre:visible').length;
          
          // Hide title if no hacks are visible
          if (count == 0) {
            this.$el.find('[data-type="'+type+'-parent"] h3').hide();
          }
        }, this);

      // Show all versions
      } else {
        this.hackChilds.show();
        this.$el.removeClass('filtered');
        this.$el.find('[data-type*="-parent"] h3').show();
      }
    },

    /*
     * Hide browser
     */
    hide : function(data) {
      this.$el.hide();
      this.$el.removeClass('active');
    },

    /*
     * Show browser + childs because the search was canceled.
     */
    searchCancelled : function() {
      this.$el.show();
      this.$el.removeClass('filtered');
      this.$el.removeClass('active');
      this.hackChilds.show();
      this.$el.find('[data-type*="-parent"] h3').show();
    },

    /*
     * Hide browser when just a number was entered into the search. 
     */
    searchNumber : function(data) {
      this.hide();
    }
  });


  /* 
   * Search 
   */
  App.Views.Search = Backbone.View.extend({
    el : 'input#search',
    el_parent : null,
    el_description : null,
    el_buttons : null,

    events : {
      'keyup' : 'keyup',
      'focus' : 'focus',
      'blur' : 'blur'
    },

    isSearching : false,
    regex_split : null,
    value : null,
    split : null,
    browser : null,
    version : null,
    timeoutId : null,

    initialize : function() {
      this.regex_split = new RegExp("([a-z\\s]+)", "gm");

      // Get elements
      this.el_parent = $();
      this.el_description = $('article[data-type="description"]');
      this.el_buttons = $('div[data-type="top-buttons"]');
    },

    /*
     * There was some interaction with the search field. 
     */
    keyup : function(e) {
      this.value = this.$el.val().toLowerCase().trim();

      // Something was entered
      if (this.value != '') {
        this.isSearching = true;

        // Split Browser from version
        this.split = this.value.split(this.regex_split);

        // Searched for a browser not a number
        if (this.split.length > 1) {
          // Get the browser
          this.browser = this.split[1].trim();

          // Get the version
          if (this.split[2] != "") {
            this.version = this.split[2].trim();
          } else {
            this.version = null;
          }

          vent.trigger("search", {'browser' : this.browser, 'version' : this.version});

        // Searched for a number
        } else {
          this.version = this.split;
          vent.trigger("searchNumber", {'version' : this.version});
        }

        // Hide description
        this.el_description.hide();

      // Field is empty
      } else {
        this.isSearching = false;

        // Show all browser
        vent.trigger("searchCancelled");

        // Show description
        this.el_description.show();
      }
    },

    /*
     * Handle focus obtained.
     */
    focus : function(e) {
      // Hide buttons
      this.el_buttons.hide();
      clearTimeout(this.timeoutId);

      // Hide description
      this.el_description.hide();

      // Search active
      $('div[data-type="search"]').addClass('active');
    },

    /*
     * Handle focus lost.
     */
    blur : function(e) {
      // Search inactive
      $('div[data-type="search"]').removeClass('active');

      // Show buttons & description
      this.timeoutId = setTimeout(_.bind(function() {
        this.el_buttons.show();

        if (!this.isSearching) {
          this.el_description.show();
        }
      }, this), 175); 
    }
  });

  /* 
   * Quote 
   */
  App.Views.Quote = Backbone.View.extend({
    el : $('.quotes'),
    el_authors : null,
    el_quote : null,
    template : template('template_quote'),

    current : -1,
    authors : [],
    authors_size : 0,

    interval_move : null,

    initialize : function() {
      this.el_authors = this.$el.find('.quote-authors');
      this.el_quote = this.$el.find('.quote');

      // Set position of every author
      this.collection.each(function(author, i) {
        author.set('position', i);
      }, this);

      // Listen to click on author
      vent.bind("click_author", this.handleClick, this);

      // Mousewheel in author list
      this.el_authors.mousewheel(function(e, delta) {
        this.el_authors.scrollLeft(this.el_authors.scrollLeft() - (delta * 80));
        e.preventDefault();
      }.bind(this));

      // Rotate the authors
      this.interval_move = setInterval(function() {
        this.moveActive();
      }.bind(this), this.options.speed);
    },

    render : function() {
      this.collection.each(this.addOne, this);
      this.authors_size = this.authors.length;
      this.updateText();
      return this;
    },

    addOne : function(author) {
      var view_author = new App.Views.Author({model : author});
      this.el_authors.append(view_author.render().el);
      this.authors.push(view_author);
    },

    handleClick : function(id) {
      if (this.interval_move != null) {
        clearInterval(this.interval_move);
        this.interval_move = null;
      }

      this.updateText(id);
    },

    /*
     * Update the quotes content and activates/deactivates authors in the list
     */
    updateText : function(id) {
      var id = typeof id != 'undefined' ? id : 0;

      // Is loaded or at the end of
      if (this.current != -1) {
        // Deactivate current
        this.authors[this.current].setActive(false);

        // Activate another one
        this.authors[id].setActive(true);
        this.current = id;
      } else {
        // Deactivete the last author
        this.authors[this.authors.length - 1].setActive(false);
        this.current = id;

        // Active first author
        this.authors[this.current].setActive(true);
      }

      // Set content of quote
      var template = this.template(this.collection.toJSON()[this.current]);
      this.el_quote.html(template);
    },

    /*
     * Move through the list of authors
     */
    moveActive : function() {
      var frameWidth = this.el_quote.width();

      // Jump to first element at the end
      if ((this.current + 1) % this.authors_size === 0) {
        this.current = -1;
        this.el_authors.scrollLeft(0);
      }

      // Update active and quote text
      this.updateText(this.current + 1);

      var width = this.authors[this.current].$el.width(),
          left = this.authors[this.current].$el.position().left;

      // Scroll the list because the active element is out of the view width
      if ((left + width) >= frameWidth) {
        this.el_authors.scrollLeft(width * this.current);
      }
    }
  });

  /* 
   * Author 
   */
  App.Views.Author = Backbone.View.extend({
    tagName : 'li',
    template : template('template_author'),

    events : {
      'click' : 'clicked'
    },

    initialize : function() {
      // First element in the list get activated
      if (this.model.get('position') == 0) {
        this.setActive(true);
      }
    },

    clicked : function(e) {
      e.preventDefault();
      vent.trigger("click_author", this.model.get('position'));
    },

    render : function() {
      var template = this.template(this.model.toJSON());

      this.$el.attr('data-quote', this.model.get('quote'));
      this.$el.attr('data-author', this.model.get('author'));
      this.$el.attr('data-link', this.model.get('from'));

      this.$el.html(template);
      return this;
    },

    activate : function() {
      this.$el.parent().find('li.active').removeClass('active');
      this.$el.addClass('active');
    },

    setActive : function(active) {
      if (active) {
        this.$el.addClass('active');
      } else {
        this.$el.removeClass('active');        
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
    {'browser' : 'fx', 'names' : ['firefox', 'mozilla firefox', 'ff']},
    {'browser' : 'ie', 'names' : ['internet explorer', 'ie']},
    {'browser' : 'sa', 'names' : ['safari', 'apple safari']},
    {'browser' : 'op', 'names' : ['opera', 'op']}
  ]);

  // Holds all browser
  var view_master = new App.Views.Master({collection : collection_browser});

  // Handles the search
  var view_search = new App.Views.Search();

  // Handles the quote
  var quote_collection = new App.Collections.Quote();
  quote_collection.fetch().then(function() {
    var view_quote = new App.Views.Quote({ collection : quote_collection, 'speed' : 4000});
    view_quote.render();
  });

  /*--------------------------------------------------
   *
   * Fallback JS animation for the CSS rotating catch-phrase
   */
  if (!Modernizr.cssanimations){
    var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

    setInterval(function() {
      var i = Math.round((Math.random()) * tips.length);
      if (i == tips.length) --i;
      $(".catch-phrase__anim").html(tips[i]);
    }, 400);
  }
})();