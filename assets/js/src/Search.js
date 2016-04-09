var Search = function (input, nodes) {
  this.$input = input
  this.$nodes = nodes
  this.isSearching = false
  this.browsers = [
    { name: 'an', aliases: ['android', 'an'] },
    { name: 'ch', aliases: ['chrome', 'ch'] },
    { name: 'fx', aliases: ['firefox', 'mozilla firefox', 'ff'] },
    { name: 'ie', aliases: ['internet explorer', 'ie'] },
    { name: 'sa', aliases: ['safari', 'apple safari'] },
    { name: 'op', aliases: ['opera', 'op'] },
    { name: 'om', aliases: ['opera mini', 'opera', 'om', 'op', 'mini'] }
  ]

  this.bindEvents()
}

Search.prototype.getValue = function (input) {
  console.log(input)
  return input.val().toLowerCase().trim()
}

Search.prototype.bindEvents = function () {
  this.$input.on('keyup', $.proxy(function (event) {
    var $input = $(event.target)
    var value = this.getValue($input)
    var data = this.parse(value)
    this.search(data.browser, data.version)
  }, this))
}

Search.prototype.findBrowser = function (browser) {
  for (var i = 0; i < this.browsers.length; i += 1) {
    if (this.browsers[i].aliases.indexOf(browser)) {
      return this.browsers[i].name
    }
  }

  return null
}

Search.prototype.findNodesMatchingVersion = function (version) {
  return this.browser
    .find(this.$nodes)
    .filter('[data-version*="' + version + '"]')
    .filter(function (item) {
      var versions = item.getAttribute('data-version').split('|')

      for (var i = 0; i < versions.length; i += 1) {
        if (versions[i].indexOf(version) === 0) return true
      }

      return false
    })
    .add(this.$nodes.filter('[data-version="*"]'))
}

Search.prototype.search = function (browser, version) {
  if (browser) {
    this.browser = $('#' + browser)
    var browserWrapper = this.browser
      .show()
      .siblings()
      .hide()
    
    var nodes = this.findNodesMatchingVersion(version)

    this.$nodes.css('display', 'none')
    nodes.css('display', 'block')
  } else {
    this.$nodes.css('display', 'block')
  }
}

Search.prototype.parse = function (value) {
  var chunks = value.split(/\s+/g)
  var browser = this.findBrowser(chunks[1])

  return {
    browser: this.findBrowser(chunks[0]),
    version: chunks.length > 1 ? chunks[1] : null
  }
};

export default Search
