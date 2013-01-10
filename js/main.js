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
  App.Models.Font = Backbone.Model.extend({
    initialize : function() {

    },

    /**
     * Update and extend the data of the model. 
     */
    update : function() {
      var normal_name = this.get('name').split('-');
      normal_name = normal_name.slice(1, (normal_name.length)).join('-');

      // The name without the font-prefix
      this.set('normal-name', normal_name);
    }
  });

  App.Models.Creator = Backbone.Model.extend({
  });


  /***************************************************
   *
   * Collections 
   */
  App.Collections.Fonts = Backbone.Collection.extend({
    model : App.Models.Font
  });

  App.Collections.Creator = Backbone.Collection.extend({
    model : App.Models.Creator,

    search : function(letters) {
      if (letters == "") return this;

      return _(this.filter(function(data) {
          return letters == data.get("data");
      }));
    }
  });


  /***************************************************
   *
   * Views 
   */

  /**
   * Some icons in a list.
   */
  App.Views.Fonts = Backbone.View.extend({
    tagName : 'div',

    initialize : function() {
      this.collection.on('add', this.addOne, this);
    },

    render : function() {
      this.collection.each(this.addOne, this);
      return this;
    },

    addOne : function(font) {
      var fontView = new App.Views.Font({model : font});
      this.$el.append(fontView.render().el);
    }
  });

  /**
   * An icon.
   */
  App.Views.Font = Backbone.View.extend({
    tagName : 'article',
    template : template('fontTemplate'),

    events : {
      'click button' : 'clicked'
    },

    clicked : function(e) {
      vent.trigger("addClicked", $(e.currentTarget));
    },

    render : function() {
      // Formant family name for output
      this.model.set('family', this.model.get('name').replace(/\-/g, ' '));

      // Render the template
      var template = this.template(this.model.toJSON());

      // Change attributes of $el
      this.$el.attr('id', this.model.get('name'));
      this.$el.attr('data-high', '2');

      // Add generated html to $el
      this.$el.html(template);
      return this;
    }
  }); 

  /**
   * Your collections. 
   */
  App.Views.Navigation = Backbone.View.extend({
    tagName : 'nav',
    selected : 0,

    template : template('creatorTemplate'),
    preview : '',

    initialize : function() {
      vent.bind("addClicked", this.addClicked, this);
    },

    events : {
      'click a' : 'scrollTo',
      'keyup input' : 'updateText'
    },

    updateText : function(e) {
      var value = $(e.currentTarget).val();

      // Prevent XSS
      value = value.replace(/</g, "&lt;");
      value = value.replace(/>/g, "&gt;");

      $('textarea').html(value);
    },

    /**
     *
     */
    addClicked : function(el) {
      var data = el.attr('data-collection'),
          collection = this.collection.search(data),
          nav = $('nav'),
          animation_duration = 200;
      
      // Add
      if (collection._wrapped.length == 0) {
        // Animation
        nav.addClass('add');
        setTimeout(function() {
          nav.removeClass('add');
        }, animation_duration);

        // Logic
        this.collection.models.push(new App.Models.Creator({'data' : ''}));
        this.collection.models[this.collection.models.length - 1].set('data', data); 

        // Button
        el.html('remove');
        el.attr('data-high', '3');

      // Remove
      } else {
        // Animation
        nav.addClass('remove');
        setTimeout(function() {
          nav.removeClass('remove');
        }, animation_duration);

        // Logic
        _(this.collection.models).each(function(font, i) {
          if (font.get('data') == data) {
            this.collection.models.splice(i, 1);
          }
        }, this);

        // Button
        el.html('add');
        el.attr('data-high', '2');
      }

      // Event: Something has changed
      vent.trigger("collectionChanged", this.collection);
      this.updateCounter(); 




      return this;
    },

    updateCounter : function() {
      $('.counter').html(this.collection.models.length);
    },

    /**
     * Scroll to a element because the default
     * href="#" + id doesn't work on mobile browsers.
     */
    scrollTo : function(e) {
      var jump = $(e.currentTarget).attr('href');

      if (jump != '#') {
        var new_position = $(jump).offset();
        window.scrollTo(new_position.left, new_position.top);
        return false;
      }
    },

    /**
     * Toggle between full & minimal view for the icons. 
     */
    toggleView : function(e) {
      e.preventDefault();

      var icon_lists = $('section[data-name="preview"]'),
          el = $(e.currentTarget);

      // Full view
      if (icon_lists.hasClass('minimal')) {
        icon_lists.removeClass('minimal');
        el.removeClass('entypo-plus-squared');
        el.addClass('entypo-minus-squared');

      // Minimal view
      } else {
        icon_lists.addClass('minimal');
        el.removeClass('entypo-minus-squared');
        el.addClass('entypo-plus-squared');
      }
    },

    render : function() {
      var template = this.template();
      this.$el.html(template);

      this.updateCounter();

      return this;
    }
  });

  /**
   * Output
   */
  App.Views.Output = Backbone.View.extend({
    tagName : 'pre',
    template : template('outputTemplate'),

    initialize : function() {
      vent.bind("collectionChanged", this.create, this);
    },

    create : function(collection) {

      var url = "",
          url_start = '\n&lt;script src="<span class="url">http://use.edgefonts.net/',
          url_end = ".js</span>\">&lt;/script>",
          content = "";

      url = '<span>// JavaScript to include the font(s)</span>' + url;
      content = '<hr><span>/* CSS to set the font-family(s) */</span>' + content;
      content += '\nh1 {\n';

      collection.each(function(model, i) {
        var data = model.get('data');

        // URL
        url += url_start + data + url_end;
        // Separator
        // if (collection.models.length > 1 && (collection.models.length - 1) > i) {
        //   url += ';';
        // }

        // CONTENT
        content += "  <span class=\"css\">font-family: '"+data+"', serif;</span>\n";

      }, this);

      content += "}\n\n";

      // No fonts in collection
      if (collection.models.length == 0) {
        this.$el.html("Add fonts to your collection!\n\n");

      // One or more fonts in collection
      } else {
        this.$el.html(url + content);
      }
    },

    render : function() {
      var template = this.template();
      this.$el.html(template);
      return this;
    }
  });


  var fontsCollection = new App.Collections.Fonts([
    {name : 'abril-fatface'},
    {name : 'acme'},
    {name : 'alegreya-sc'},
    {name : 'alegreya'},
    {name : 'alexa-std'},
    {name : 'amaranth'},
    {name : 'andika'},
    {name : 'anonymous-pro'},
    {name : 'arvo'},
    {name : 'asap'},
    {name : 'berkshire-swash'},
    {name : 'bree-serif'},
    {name : 'brush-script-std'},
    {name : 'chunk'},
    {name : 'cousine'},
    {name : 'crete-round'},
    {name : 'droid-sans-mono'},
    {name : 'droid-sans'},
    {name : 'droid-serif'},
    {name : 'ewert'},
    {name : 'fusaka-std'},
    {name : 'gentium-basic'},
    {name : 'gentium-book-basic'},
    {name : 'giddyup-std'},
    {name : 'gravitas-one'},
    {name : 'hobo-std'},
    {name : 'holtwood-one-sc'},
    {name : 'imprima'},
    {name : 'inconsolata'},
    {name : 'inika'},
    {name : 'istok-web'},
    {name : 'jim-nightshade'},
    {name : 'josefin-slab'},
    {name : 'kameron'},
    {name : 'kaushan-script'},
    {name : 'kotta-one'},
    {name : 'krona-one'},
    {name : 'la-belle-aurore'},
    {name : 'lato'},
    {name : 'league-gothic'},
    {name : 'lekton'},
    {name : 'linden-hill'},
    {name : 'lobster-two'},
    {name : 'lobster'},
    {name : 'lusitana'},
    {name : 'm-1c'},
    {name : 'm-1m'},
    {name : 'marck-script'},
    {name : 'marvel'},
    {name : 'maven-pro'},
    {name : 'merienda-one'},
    {name : 'merriweather'},
    {name : 'mr-bedfort'},
    {name : 'mr-de-haviland'},
    {name : 'mrs-saint-delafield'}
  ]);

  var fontsView = new App.Views.Fonts({collection : fontsCollection});
  $('.fonts').append(fontsView.render().el);

  var allFontsCollection = new App.Collections.Creator([]);

  var navigationView = new App.Views.Navigation({ collection: allFontsCollection });
  $('body').append(navigationView.render().el);

  var outputView = new App.Views.Output({ collection : allFontsCollection });
  $('section[data-name="output"] div').append(outputView.render().el);

})();