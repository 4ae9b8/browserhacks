import Search from './Search'

(function (global) {


  $('document').ready(function () {
    $('.hacks-wrapper').each(function (index, wrapper) {
      var $wrapper = $(wrapper)
      if ($('.hack', wrapper).length === 0) $wrapper.hide()
    })

    $('#show-test').on('click', function () {
      $('body').toggleClass('run-test')
    })

    $('#show-legacy').on('click', function () {
      var state = $(this).attr('checked') ? 'block' : 'none';
      var legacyHacks = $('[data-legacy=true]')
      $('[data-legacy=true]').css('display', state)
    }).trigger('click').trigger('click')

    Prism && Prism.highlightAll(false)
    
    $('.js-code').each(function (index, code) {
      var $code = $(code)
      var lines = $code.html().split('\n')
      var id = $code.closest('.js-hack').attr('id').split('-')[1]

      var dump = lines.map(function (line, index) {
        var hackClass = 'hack_' + id + '_' + index
        if (lines !== '') {
          return '<span class="line  ' + hackClass + '">' + line + '</span>'
        } 
      }).join('')

      $code.html(dump)
    })

    $('.search').show()
    var search = new Search($('.search__input'), $('.hack-wrapper'))
  })
}())
