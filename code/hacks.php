<?php

  /**
   * Type of hacks.
   */
  $hack_types = array (
    'selector' => array (
      'title' => 'Selector Hacks', 
      'icon' => 'fontawesome-link'
    ),
    'media' => array (
      'title' => 'Media Query Hacks',
      'icon' => 'fontawesome-resize-small'
    ),
    'javascript' => array (
      'title' => 'JavaScript Hacks',
      'icon' => 'fontawesome-fire'
    ),
    'propertyValue' => array (
      'title' => 'Property/Value Hacks',
      'icon' => 'fontawesome-paper-clip'
    ),
    'misc' => array (
      'title' => 'Miscellaneous',
      'icon' => 'fontawesome-beaker'
    )
  ); 

  /**
   * A list of all browser/hacks.
   */
  $hacks = array (
    /**
     * Chrome
     */
    'ch' => array (
      'name' => 'Chrome',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Chrome and Safari (version?)',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Chrome, Safari 3+',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}"
          ),
        ),
        'javascript' => array(
          array (
            'version' => 'Chrome',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "var isChrome = Boolean(window.chrome);"
          ),
        )
      )
    ),

    /**
     * Firefox
     */
    'fx' => array (
      'name' => 'Firefox',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Firefox 1.5',
            'data-version' => '1.5',
            'language' => 'language-css',
            'code' => "body:empty .selector {}"
          ),
          array (
            'version' => 'Firefox 2+',
            'data-version' => '2+',
            'language' => 'language-css',
            'code' => ".selector, x:-moz-any-link {}"
          ),
          array (
            'version' => 'Firefox 3+ (Windows ?)',
            'data-version' => '3+',
            'language' => 'language-css',
            'code' => ".selector, x:-moz-any-link; x:default {}"
          ),
          array (
            'version' => 'Firefox 3.5+',
            'data-version' => '3.5+',
            'language' => 'language-css',
            'code' => "body:not(:-moz-handler-blocked) .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Firefox 3.5+, IE 9/10, Opera',
            'data-version' => '3.5+',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'Firefox 3.6+',
            'data-version' => '3.6+',
            'language' => 'language-css',
            'code' => "@media screen and (-moz-images-in-menus:0) {}"
          ),
          array (
            'version' => 'Firefox 4+',
            'data-version' => '4+',
            'language' => 'language-css',
            'code' => "@media screen and (min--moz-device-pixel-ratio:0) {}"
          )
        ),
        'javascript' => array(
          array (
            'version' => 'Firefox',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "var isFF = !!navigator.userAgent.match(/firefox/i);"
          ),
          array (
            'version' => 'Firefox 2 - 13',
            'data-version' => '2|3|4|5|6|7|8|9|10|11|12|13',
            'language' => 'language-javascript',
            'code' => "var isFF = Boolean(window.globalStorage);"
          ),
          array (
            'version' => 'Firefox 2/3',
            'data-version' => '2|3',
            'language' => 'language-javascript',
            'code' => "var isFF = /a/[-1]=='a';"
          ),
          array (
            'version' => 'Firefox 3',
            'data-version' => '3',
            'language' => 'language-javascript',
            'code' => "var isFF = (function x(){})[-5]=='x';"
          )
        ),
        'misc' => array(
          array (
            'version' => 'Firefox 3+',
            'data-version' => '3+',
            'language' => 'language-css',
            'code' => "@-moz-document url-prefix() {}"
          )
        )
      )
    ),

    /**
     * Internet Explorer
     */
    'ie' => array (
      'name' => 'Internet Explorer',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'IE 6 and below',
            'data-version' => '6',
            'language' => 'language-css',
            'code' => "* html .selector  {} \n.suckyie6.selector {} /* .suckyie6 can be any unused class */"
          ),
          array (
            'version' => 'IE 7 and below',
            'data-version' => '7',
            'language' => 'language-css',
            'code' => ".selector, {}"
          ),
          array (
            'version' => 'IE 7',
            'data-version' => '7',
            'language' => 'language-css',
            'code' => "*:first-child+html .selector {} \n.selector, x:-IE7 {} \n*+html .selector {} "
          ),
          array (
            'version' => 'Everything but IE 6',
            'data-version' => '6',
            'language' => 'language-css',
            'code' => "html > body .selector {}"
          ),
          array (
            'version' => 'Everything but IE 6/7',
            'data-version' => '6|7',
            'language' => 'language-css',
            'code' => "html > /**/ body .selector {}"
          ),
          array (
            'version' => 'Everything but IE 6/7/8',
            'data-version' => '6|7|8',
            'language' => 'language-css',
            'code' => ":root *> .selector {} \nbody:last-child .selector {} \nbody:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          )
        ),
        'propertyValue' => array(
          array (
            'version' => "IE 6 - any combination of these characters: \n_ - £ ¬ ¦",
            'data-version' => '6',
            'language' => 'language-css',
            'code' => ".selector { _color: blue; } \n.selector { -color: blue; } \n.selector { £color: blue; } \n.selector { ¬color: blue; } \n.selector { ¦color: blue; }"
          ),
          array (
            'version' => "IE 6/7 - any combination of these characters: \n ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > |",
            'data-version' => '6|7',
            'language' => 'language-css',
            'code' => ".selector { !color: blue; } \n.selector { \$color: blue; } \n.selector { &color: blue; } \n.selector { *color: blue; } \n/* ... */"
              /*.selector { )color: blue; } \n.selector { =color: blue; } \n.selector { %color: blue; } \n.selector { +color: blue; } \n.selector { @color: blue; } \n.selector { ,color: blue; } \n.selector { .color: blue; } \n.selector { /color: blue; } \n.selector { `color: blue; } \n.selector { [color: blue; } \n.selector { ]color: blue; } \n.selector { #color: blue; } \n.selector { ~color: blue; } \n.selector { ?color: blue; } \n.selector { :color: blue; } \n.selector { <color: blue; } \n.selector { >color: blue; } \n.selector { |color: blue; }*/
          ),
          array (
            'version' => 'IE 6/7 - acts as an !important',
            'data-version' => '6|7',
            'language' => 'language-css',
            'code' => ".selector { color: blue !ie; } \n/* string after ! can be anything */"
          ),
          array (
            'version' => 'IE 8/9',
            'data-version' => '8|9',
            'language' => 'language-css',
            'code' => ".selector { color: blue\\0/; } \n/* must go at the END of all rules */"
          ),
          array (
            'version' => 'IE 9/10',
            'data-version' => '9|10',
            'language' => 'language-css',
            'code' => ".selector:nth-of-type(1n) { color: blue\9; }"
          ),
          array (
            'version' => 'IE 7/8/9/10',
            'data-version' => '7|8|9|10',
            'language' => 'language-css',
            'code' => ".selector { color/*\**/: blue\9; }"
          ),
          array (
            'version' => 'IE 6/7/8/9/10',
            'data-version' => '6|7|8|9|10',
            'language' => 'language-css',
            'code' => ".selector { color: blue\9; }"
          ),
          array (
            'version' => 'Everything but IE 6',
            'data-version' => '6',
            'language' => 'language-css',
            'code' => ".selector { color/**/: blue; }"
          )
        ),
        "media" => array(
          array (
            'version' => 'IE 6/7',
            'data-version' => '6|7',
            'language' => 'language-css',
            'code' => "@media screen\9 {}"
          ),
          array (
            'version' => 'IE 6/7/8',
            'data-version' => '6|7|8',
            'language' => 'language-css',
            'code' => "@media \\0screen\,screen\9 {}"
          ),
          array (
            'version' => 'IE 8',
            'data-version' => '8',
            'language' => 'language-css',
            'code' => "@media \\0screen {}"
          ),
          array (
            'version' => 'IE 8/9/10 & Opera',
            'data-version' => '8|9|10',
            'language' => 'language-css',
            'code' => "@media screen\\0 {}"
          ),
          array (
            'version' => 'IE 9/10, Firefox 3.5+, Opera',
            'data-version' => '9|10',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'IE 9/10',
            'data-version' => '9|10',
            'language' => 'language-css',
            'code' => "@media screen and (min-width:0\\0) {}"
          ),
          array (
            'version' => 'IE 10',
            'data-version' => '10',
            'language' => 'language-css',
            'code' => "@media screen and (-ms-transform-3d) {} \n/* To be tested */"
          ),
          array (
            'version' => 'IE 10+',
            'data-version' => '10+',
            'language' => 'language-css',
            'code' => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {}"
          ),
          array (
            'version' => 'Everything but IE 6/7/8',
            'data-version' => '6|7|8',
            'language' => 'language-css',
            'code' => "@media screen and (min-width: 400px) {}"
          )
        ),
        "javascript" => array(
          array (
            'version' => 'IE',
            'data-version' => '6|7|8|9|10',
            'language' => 'language-javascript',
            'code' => "IE='\v'=='v'"
          ),
          array (
            'version' => 'IE 6 - using conditional comments',
            'data-version' => '6',
            'language' => 'language-javascript',
            'code' => "try {IE6=@cc_on @_jscript_version <= 5.7&&@_jscript_build<10000} catch(e){IE6=false;}"
          ),
          array (
            'version' => 'IE 10',
            'data-version' => '10',
            'language' => 'language-javascript',
            'code' => "/*@cc_on!@*/false && document.documentMode === 10"
          )
        ),
        "misc" => array(
          array (
            'version' => 'Everything but IE 6/7',
            'data-version' => '6|7',
            'language' => 'language-javascript',
            'code' => "@import \"stylesheet.css\" all; \n/* To be tested */"
          )
        )
      )
    ),

    /**
     * Safari
     */
    'sa' => array (
      'name' => 'Safari',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Safari 2/3',
            'data-version' => '2|3',
            'language' => 'language-css',
            'code' => "html[xmlns*=\"\"] body:last-child .selector {} \nhtml[xmlns*=\"\"]:root .selector  {}"
          ),
          array (
            'version' => 'Safari 2/3.1, Opera 9.25',
            'data-version' => '2|3.1',
            'language' => 'language-css',
            'code' => "*|html[xmlns*=\"\"] .selector {}"
          ),
          array (
            'version' => 'Safari (version?) and Chrome',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        ),
        "media" => array(
          array (
            'version' => 'Safari 3+, Chrome',
            'data-version' => '3+',
            'language' => 'language-css',
            'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}"
          )
        ),
        "javascript" => array(
          array (
            'version' => 'Safari',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "Saf=/a/.__proto__=='//'"
          )
        )
      )
    ),

    /**
     * Opera
     */
    'op' => array (
      'name' => 'Opera',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Opera 9.25, Safari 2/3.1',
            'data-version' => '9.25',
            'language' => 'language-css',
            'code' => "*|html[xmlns*=\"\"] .selector {}"
          ),
          array (
            'version' => 'Opera 9.27 and below, Safari 2',
            'data-version' => '9.27',
            'language' => 'language-css',
            'code' => "html:first-child .selector {}"
          ),
          array (
            'version' => 'Opera 9.5+',
            'data-version' => '9.5+',
            'language' => 'language-css',
            'code' => "noindex:-o-prefocus, .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Opera 7',
            'data-version' => '7',
            'language' => 'language-css',
            'code' => "@media all and (min-width: 0px){}"
          ),
          array (
            'version' => 'Opera 12-',
            'data-version' => '12',
            'language' => 'language-css',
            'code' => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}"
          ),
          array (
            'version' => 'Opera, Firefox 3.5+, IE 9/10',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'Opera, IE 8/9/10',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "@media screen\0 {}"
          )
        ),
        'javascript' => array(
          array (
            'version' => 'Opera',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "Op=/^function \(/.test([].sort) \n/* or */ \nwindow.opera && window.opera.version() == X"
          )
        )
      )
    )
  );
?>


<?php 
  // Browser
  foreach($hacks as $name => $browser): 
?>

  <article data-high="3" class="<?php echo $name; ?>" id="<?php echo $name ?>">
    <section data-cols="1">
        <h2 class="th"><?php echo $browser['name']; ?></h2>
    </section>
  
    <?php 
      // Type of hack
      foreach($browser['hacks'] as $type => $hack): 
    ?>
    
      <section data-cols="1" data-type="<?php echo $type; ?>-parent">
        <h3><span class="<?php echo $hack_types[$type]['icon']; ?>"></span><?php echo $hack_types[$type]['title']; ?></h3>
      </section>
  
      <section data-cols="2" data-type="<?php echo $type; ?>-childs">
        <?php 
          // Single hack
          for($i = 0; $i < count($hack); $i++): 
        ?>
          <div>
            <?php 
              // Version of a hack
              if (isset($hack[$i]['data-version'])):
            ?>
              <pre class="<?php echo $hack[$i]['language'];?>" data-version="<?php echo $hack[$i]['data-version'];?>"><code><?php echo "/* " . $hack[$i]['version'] . " */\n";
              echo $hack[$i]['code']; ?></code></pre>
            <?php 
              else:
            ?>
              <pre class="<?php echo $hack[$i]['language']; ?>"><code><?php echo "/* " . $hack[$i]['version'] . " */\n";
              echo $hack[$i]['code']; ?></code></pre>
            <?php endif; ?>
          </div>
        <?php endfor; ?>
      </section>
  
    <?php endforeach; ?>
  
    </article>
  
<?php endforeach; ?>