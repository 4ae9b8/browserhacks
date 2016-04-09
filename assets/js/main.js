(function () {

  window.App = {
    Views: {},
    Models: {},
    Collections: {}
  }

  window.template = function (id) {
    return _.template($('#' + id).html())
  }

  window.vent = _.extend({}, Backbone.Events)

  window.$.fn._show = function () {
    this.show()
  }

  window.$.fn._hide = function () {
    this.hide()
  }

  App.Models.Browser = Backbone.Model.extend({
    defaults: {
      hackTypes: []
    }
  })

  App.Models.Author = Backbone.Model.extend({
    defaults: {
      position: 0
    }
  })

  App.Collections.Browser = Backbone.Collection.extend({
    model: App.Models.Browser
  })

  App.Collections.Quote = Backbone.Collection.extend({
    model: App.Models.Author
  })

  App.Views.Master = Backbone.View.extend({
    count: {
      browserMatched: 0
    },

    initialize: function () {
      this.collection.each(function (browser) {
        new App.Views.Browser({ model: browser })
      }, this)

      new App.Views.Keys()
      new App.Views.Legacy()
      new App.Views.Tests()

      vent.bind('browserMatched', this.browserMatched, this)
      vent.bind('browserNotFound', this.browserNotFound, this)
      vent.bind('searchCancelled', this.removeMessage, this)
    },

    browserMatched: function () {
      this.count.browserMatched = this.count.browserMatched - 1

      if (0 < this.count.browserMatched) {
        this.count.browserMatched = 1
      }

      this.removeMessage()
    },

    browserNotFound: function () {
      this.count.browserMatched = this.count.browserMatched + 1

      if (this.count.browserMatched > this.collection.length) {
        this.count.browserMatched = 0

        if ($('.nothing').length === 0) {
          $('#content').append('<div class="nothing  centered"><p>We couldn’t find anything matching your search!</p></div>')
        }
      }
    },

    removeMessage: function () {
      $('.nothing').remove()
    }
  })

  App.Views.Browser = Backbone.View.extend({
    hackChilds: null,

    initialize: function () {
      this.$el = $('#' + this.model.get('browser'))

      var type = ''
      var hackParents = this.$el.find('[data-type*="-parent"]')
      var hackTypes = _.map(hackParents, function (item, index) {
        return $(item).attr('data-type').split('-')[0]
      }, this)

      // Save the hack types into the model
      this.model.set('hackTypes', hackTypes)

      // The specific hacks
      this.hackChilds = this.$el.find('.hack-wrapper')

      // Listen to events
      vent.bind('search', this.handleSearch, this)
      vent.bind('searchCancelled', this.searchCancelled, this)
      vent.bind('searchNumber', this.searchNumber, this)
    },

    /**
     * Show or hide the browser after the search was triggered
     */
    handleSearch: function (data) {
      var names = this.model.get('names')
      var matched = false

      // Match the browser
      _.each(names, function (browser) {
        if (browser.indexOf(data.browser) === 0 && !matched) {
          this.show(data)
          matched = true
          vent.trigger('browserMatched', this)
        }
      }, this)

      // Could not match browser
      if (!matched) {
        this.hide(data)
        vent.trigger('browserNotFound', this)
      }
    },

    /*
     * Show browser + filter versions.
     */
    show: function (data) {
      this.$el.show()
      this.$el.addClass('active')

      // Filter version
      if (data.version !== null) {
        // data.version = ~~data.version
        // Hide all childs
        this.hackChilds.hide()

        // Find only matched childs
        var matched = this.$el.find(
          '.hack-wrapper[data-version*="' + data.version + '"], ' +
          '.hack-wrapper[data-version="*"]'
        )

        // Filter the matched childs
        _.each(matched, function (item) {
          _item = $(item)

          // Get all versions
          versions = _item.attr('data-version').split('|')

          _.each(versions, function (version) {
            // Show version which starts with value
            if (version.indexOf(data.version) === 0) _item.show()

            // Show item which matches all versions (*)
            if (version == '*') _item.show()
          }, this)
        }, this)

        // Find +
        _.each(this.$el.find('.hack-wrapper[data-version*="+"]'), function (item) {
          _item = $(item)
          version_plus = _item.attr('data-version').split('+')

          if (version_plus.length == 2) {
            version_plus = parseFloat(version_plus[0], 10)

            if (version_plus <= data.version) _item.show()
          }
        }, this)

        // Find -
        _.each(this.$el.find('.hack-wrapper[data-version*="-"]'), function (item) {
          _item = $(item)
          version_minus = _item.attr('data-version').split('-')

          if (version_minus.length === 2) {
            version_minus = parseFloat(version_minus[0], 10)

            if (version_minus >= data.version) _item.show()
          }
        }, this)

        // Change the style of filtered elements
        this.$el.addClass('filtered')

        // Hide empty hack types
        _.each(this.model.get('hackTypes'), function(type) {
          // Get the amount of visible hacks
          count = this.$el.find('[data-type="' + type + '-childs"] .hack-wrapper:visible').length

          // Hide title if no hacks are visible
          if (count === 0) {
            this.$el.find('[data-type="' + type + '-parent"] h3').hide()
          }
        }, this)

        // Show all versions
      } else {
        this.hackChilds.show()
        this.$el.removeClass('filtered')
        this.$el.find('[data-type*="-parent"] h3').show()
      }
    },

    /**
     * Hide browser
     */
    hide: function (data) {
      this.$el.hide()
      this.$el.removeClass('active')
    },

    /**
     * Show browser + childs because the search was canceled.
     */
    searchCancelled: function () {
      this.$el.show()
      this.$el.removeClass('filtered')
      this.$el.removeClass('active')
      this.hackChilds.show()
      this.$el.find('[data-type*="-parent"] h3').show()
    },

    /**
     * Hide browser when just a number was entered into the search.
     */
    searchNumber: function (data) {
      this.hide()
    }
  })


  /**
   * Search
   */
  App.Views.Search = Backbone.View.extend({
    el: 'input#search',
    elParent: null,
    events: { keyup: 'keyup' },
    isSearching: false,
    regexSplit: null,
    value: null,
    split: null,
    browser: null,
    version: null,
    timeoutId: null,

    initialize: function () {
      this.regexSplit = new RegExp('([a-z\\s]+)', 'gm')

      // Get elements
      this.elParent = $()
    },

    /**
     * There was some interaction with the search field.
     */
    keyup: function (event) {
      this.value = this.$el.val().toLowerCase().trim()

      // Something was entered
      if (this.value !== '') {
        this.isSearching = true

        // Split Browser from version
        this.split = this.value.split(this.regexSplit)

        // Searched for a browser not a number
        if (this.split.length > 1) {
          // Get the browser
          this.browser = this.split[1].trim()

          // Get the version
          if (this.split[2] !== '') {
            this.version = this.split[2].trim()
          } else {
            this.version = null
          }

          vent.trigger('search', {
            browser: this.browser,
            version: this.version
          })

          // Searched for a number
        } else {
          this.version = this.split
          vent.trigger('searchNumber', { version: this.version })
        }

      // Field is empty
      } else {
        this.isSearching = false
        vent.trigger('searchCancelled')
      }
    }
  })

  /**
   * Special action of keys pressed.
   */
  App.Views.Keys = Backbone.View.extend({
    initialize: function () {
      this.el = $(document)

      // Listener is active by default
      this.addListener()

      vent.bind('search_focus', this.removeListener, this)
      vent.bind('search_blur', this.addListener, this)
    },

    removeListener: function() {
      this.el.off('keydown')
    },

    addListener: function() {
      this.el.on('keydown', this.jumpToBrowser)
    },

    // Listen to keydown to jump to a specific browser
    // @TODO Tim: generate this from browsers.json
    jumpToBrowser: function(e) {
      var el, specialKey = e.metaKey || e.ctrlKey

      if(e.which == 65 && !specialKey) el = document.getElementById('an')
      if(e.which == 67 && !specialKey) el = document.getElementById('ch')
      if(e.which == 83 && !specialKey) el = document.getElementById('sa')
      if(e.which == 79 && !specialKey) el = document.getElementById('op')
      if(e.which == 70 && !specialKey) el = document.getElementById('fx')
      if(e.which == 73 && !specialKey) el = document.getElementById('ie')

      if (typeof el !== 'undefined') el.scrollIntoView(true)
    }
  })

  /**
   * Show / hide lecacy browsers.
   */
  App.Views.Legacy = Backbone.View.extend({
    el: $('#show-legacy'),

    childs: {
      legacy: $('[data-legacy=true]')
    },

    initialize: function () {
      this.$el.on('click', $.proxy(function () {
        var state = this.$el.attr('checked') ? 'block': 'none'
        this.childs.legacy.css('display', state)
      }, this))
    }
  })

  /**
   * Show / hide tests.
   */
  App.Views.Tests = Backbone.View.extend({
    el: $('#show-test'),
    body: $('body'),

    initialize: function () {
      this.$el.on('click', $.proxy(function () {
        this.body.toggleClass('run-test')
      }, this))
    }
  })

  /**
   * Quotes
   */
  App.Views.Quote = Backbone.View.extend({
    el: $('.quotes'),
    elAuthors: null,
    elQuote: null,
    current: -1,
    template : template('template_quote'),
    authors: [],
    authorsSize: 0,
    intervalMove: null,

    initialize: function () {
      this.elAuthors = this.$el.find('.quote-authors')
      this.elQuote = this.$el.find('.quote')

      // Set position of every author
      this.collection.each(function (author, index) {
        author.set('position', index)
      }, this)

      // Listen to click on author
      vent.bind('click_author', this.handleClick, this)

      // Rotate the authors
      this.intervalMove = setInterval(function () {
        this.moveActive()
      }.bind(this), this.options.speed)
    },

    render: function () {
      this.collection.each(this.addOne, this)
      this.authorsSize = this.authors.length
      this.updateText()
      return this
    },

    addOne: function (author) {
      var viewAuthor = new App.Views.Author({ model: author })
      this.elAuthors.append(viewAuthor.render().el)
      this.authors.push(viewAuthor)
    },

    handleClick: function (id) {
      if (this.intervalMove !== null) {
        clearInterval(this.intervalMove)
        this.intervalMove = null
      }

      this.updateText(id)
    },

    /*
     * Update the quotes content and activates/deactivates authors in the list
     */
    updateText: function (id) {
      id = typeof id !== 'undefined' ? id : 0

      // Is loaded or at the end of
      if (this.current !== -1) {
        // Deactivate current
        this.authors[this.current].setActive(false)

        // Activate another one
        this.authors[id].setActive(true)
        this.current = id
      } else {
        // Deactivate the last author
        this.authors[this.authors.length - 1].setActive(false)
        this.current = id

        // Active first author
        this.authors[this.current].setActive(true)
      }

      // Set content of quote
      var template = this.template(this.collection.toJSON()[this.current])
      this.elQuote.html(template)
    },

    /*
     * Move through the list of authors
     */
    moveActive: function () {
      var frameWidth = this.elQuote.width()

      // Jump to first element at the end
      if ((this.current + 1) % this.authorsSize === 0) {
        this.current = -1
        this.elAuthors.scrollLeft(0)
      }

      // Update active and quote text
      this.updateText(this.current + 1)

      var width = this.authors[this.current].$el.width(),
          left  = this.authors[this.current].$el.position().left

      // Scroll the list because the active element is out of the view width
      if ((left + width) >= frameWidth) {
        this.elAuthors.scrollLeft(width * this.current)
      }
    }
  })

  /**
   * Author
   */
  App.Views.Author = Backbone.View.extend({
    tagName: 'li',
    template: template('template_author'),
    events: { click: 'clicked' },

    clicked: function (e) {
      e.preventDefault()
      vent.trigger('click_author', this.model.get('position'))
    },

    render: function () {
      var template = this.template(this.model.toJSON())

      this.$el.attr('data-quote', this.model.get('quote'))
      this.$el.attr('data-author', this.model.get('author'))
      this.$el.attr('data-link', this.model.get('from'))
      this.$el.html(template)

      return this
    },

    setActive: function (active) {
      if (active) {
        this.$el.addClass('active')
      } else {
        this.$el.removeClass('active')
      }
    }
  })


  /*--------------------------------------------------
   *
   * Start the app
   */

  // A collection of browsers @TODO Read the browsers.json
  var collectionBrowser = new App.Collections.Browser([
    { browser: 'an', names: ['android', 'an'] },
    { browser: 'ch', names: ['chrome', 'ch'] },
    { browser: 'fx', names: ['firefox', 'mozilla firefox', 'ff'] },
    { browser: 'ie', names: ['internet explorer', 'ie'] },
    { browser: 'sa', names: ['safari', 'apple safari'] },
    { browser: 'op', names: ['opera', 'op'] },
    { browser: 'om', names: ['opera mini', 'opera', 'om', 'op', 'mini'] }
  ])

  // Holds all browser
  var viewMaster = new App.Views.Master({
    collection: collectionBrowser
  })

  // Handles the search
  var viewSearch = new App.Views.Search()

  // Handles the quote
  var dataQuotes
  
  try {
    dataQuotes = JSON.parse($('#quotes').attr('data-quotes-data'))
  } catch (e) {
    dataQuotes = {}
  }

  var collectionQuotes = new App.Collections.Quote(dataQuotes)
  var viewQuote = new App.Views.Quote({
    collection: collectionQuotes,
    speed: 4000
  })
  viewQuote.render()

  // #78: Order by browser version
  $('.hacks-wrapper').each(function () {
    var $wrapper = $(this)

    $wrapper
      .find('.hack-wrapper')
      .sort(function (a, b) {
        return +parseFloat(a.getAttribute('data-version'), 10) - +parseFloat(b.getAttribute('data-version'), 10)
      })
      .appendTo($wrapper)
  })

  // ------------
  // Execute JS tests
  // @TODO Tim: move wherever it belongs
  // ------------

  // We run Prism once and only once
  Prism && Prism.highlightAll(false)

  // We add .line spans for each hack in every code block
  $('.js-code')
    .each(function() {
      var $code = $(this)
      var id = $code.closest('.js-hack').attr('id').split('-')[1]
      var dump = $code
        .html()
        .split('\n')
        .filter(function (line) {
          return line !== ''
        })
        .map(function (line, index) {
          var hackClass = 'hack_' + id + '_' + index
          return '<span class="line ' + hackClass + '">' + line + '</span>'
        })
        .join('')

      $code.html(dump)
    })
    .on('click', '.line', function () {
      _select(this)
    })

  // Sticky search
  var $content = $('#content'),
      $search  = $('.search'),
      $window  = $(window),
      offset   = $search.offset().top + 8,  // + height of coloured bar at top of page
      height   = $search.outerHeight()

  if ($search.css('position') !== 'sticky' && $window.width() >= 767) {
    $window
      .on('scroll', function (e) {
        var scrollDistance = $window.scrollTop()

        if (offset <= scrollDistance) {
          $search.addClass('fixed')
          $content.css('padding-top', height)
        } else {
          $search.removeClass('fixed')
          $content.css('padding-top', 0)
        }
      })
      .trigger('scroll')
  }

})();
