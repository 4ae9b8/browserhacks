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
    ),
    'html' => array (
      'title' => 'Conditional comments',
      'icon' => 'fontawesome-th-large'
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
            'version' => 'Chrome 24-, Safari 6-, IE 7',
            'data-version' => '24-',
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
        'propertyValue' => array(
          array (
            'version' => 'Chrome 28-, Safari 6-',
            'data-version' => '28-',
            'language' => 'language-css',
            'code' => '.selector { (;color: blue;); }\n .selector { [;color: blue;]; }'
          )
        ),
        'javascript' => array(
          array (
            'version' => 'Chrome',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "var isChrome = !!window.chrome;"
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
            'version' => 'Firefox 3+, IE 7',
            'data-version' => '3+',
            'language' => 'language-css',
            'code' => ".selector, x:-moz-any-link, x:default {}"
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
            'version' => 'Firefox 3.5+, IE 9+, Opera',
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
            'code' => "var isFF = !!window.sidebar"
          ),
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
            'code' => "var isFF = !!window.globalStorage;"
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
            'version' => 'IE 6-',
            'data-version' => '6',
            'language' => 'language-css',
            'code' => "* html .selector  {} \n.suckyie6.selector {} /* .suckyie6 can be any unused class */"
          ),
          array (
            'version' => 'IE 7-',
            'data-version' => '7',
            'language' => 'language-css',
            'code' => ".selector, {}"
          ),
          array (
            'version' => 'IE 7',
            'data-version' => '7',
            'language' => 'language-css',
            'code' => "*:first-child+html .selector {} \n.selector, x:-IE7 {} \n*+html .selector {} \nbody*.selector {} \n.selector\ {}"
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
            'code' => "html > /**/ body .selector {}\nhead ~ /**/ body .selector {}"
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
            'version' => "IE 6",
            'data-version' => '6',
            'language' => 'language-css',
            'code' => ".selector { _color: blue; } \n.selector { -color: blue; }"
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
            'version' => 'IE 8+',
            'data-version' => '8+',
            'language' => 'language-css',
            'code' => ".selector { color: blue\\0/; } \n/* must go at the END of all rules */"
          ),
          array (
            'version' => 'IE 9+',
            'data-version' => '9+',
            'language' => 'language-css',
            'code' => ".selector:nth-of-type(1n) { color: blue\9; }"
          ),
          array (
            'version' => 'IE 6+',
            'data-version' => '6+',
            'language' => 'language-css',
            'code' => ".selector { color: blue\9; } \n.selector { color/*\**/: blue\9; }"
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
            'version' => 'IE 8+, Opera',
            'data-version' => '8+',
            'language' => 'language-css',
            'code' => "@media screen\\0 {}"
          ),
          array (
            'version' => 'IE 9+, Firefox 3.5+, Opera',
            'data-version' => '9+',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'IE 9+',
            'data-version' => '9+',
            'language' => 'language-css',
            'code' => "@media screen and (min-width:0\\0) {}"
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
            "version" => "Check for IE version",
            "data-version" => "3|4|5|6|7|8|9|10",
            "language" => "language-javascript",
            "code" => "var ieVersion = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;"
          ),
          array (
            "version" => "Check for IE version",
            "data-version" => "",
            "language" => "language-javascript",
            "code" => "var ieVersion = (function() { if (new RegExp(\"MSIE ([0-9]{1,}[\.0-9]{0,})\").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return -1; } })();"
          ),
          array (
            'version' => 'IE 7-',
            'data-version' => '6|7',
            'language' => 'language-javascript',
            'code' => 'var isIE = document.all && !document.querySelector;'
          ),
          array (
            'version' => 'IE 8-',
            'data-version' => '6|7|8',
            'language' => 'language-javascript',
            'code' => "var isIE = !+'\\v1';"
          ),
          array (
            'version' => 'IE X (6, 7, 8, 9)',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => "(checkIE = document.createElement(\"b\")).innerHTML = \"&lt;!--[if IE X]>&lt;i>&lt;/i>&lt;![endif]-->\"; \nvar isIE = checkIE.getElementsByTagName(\"i\").length == 1;"
          ),
          array (
            'version' => 'IE 7',
            'data-version' => '7',
            'language' => 'language-javascript',
            'code' => "var isIE = navigator.appVersion.indexOf(\"MSIE 7.\")!=-1;"
          ),
          array (
            'version' => 'IE 8',
            'data-version' => '8',
            'language' => 'language-javascript',
            'code' => 'var isIE = document.all && document.querySelector && !document.addEventListener;'
          ),
          array (
            'version' => 'IE 10',
            'data-version' => '10',
            'language' => 'language-javascript',
            'code' => "var isIE = eval(\"/*@cc_on!@*/false\") && document.documentMode === 10;"
          ),
          array (
            'version' => 'IE 10',
            'data-version' => '10',
            'language' => 'language-javascript',
            'code' => "var isIE = document.body.style.msTouchAction != undefined;"
          ),
          array (
            'version' => 'IE 10',
            'data-version' => '10',
            'language' => 'language-javascript',
            'code' => 'var isIE = window.navigator.msPointerEnabled;'
          )
        ),
        'html' => array (
          array (
            'version' => 'IE',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if IE]> Internet Explorer &lt;![endif]-->'
          ),
          array (
            'version' => 'Not IE',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if !IE]> Not Internet Explorer &lt;![endif]-->'
          ),
          array (
            'version' => 'IE X (6, 7, 8, 9)',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if IE X]> Internet Explorer X &lt;![endif]-->'
          ),
          array (
            'version' => 'IE X- (6, 7, 8, 9)',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if IE lte X]> Internet Explorer X or less &lt;![endif]-->'
          ),
          array (
            'version' => 'IE X+ (6, 7, 8, 9)',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if IE gte X]> Internet Explorer X or greater &lt;![endif]-->'
          ),
          array (
            'version' => 'IE X or Y (6, 7, 8, 9)',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if (IE X)|(IE Y)]> Internet Explorer X or Internet Explorer Y &lt;![endif]-->'
          ),
          array (
            'version' => 'IE X+ but Y- (6, 7, 8, 9)',
            'data-version' => '6|7|8',
            'language' => 'language-markup',
            'code' => '&lt;!--[if (gte IE X)&(lte IE Y)]> Internet Explorer between X and Y (included)&lt;![endif]-->'
          ),
          array (
            'version' => 'Conditional classes',
            'data-version' => '',
            'language' => 'language-markup',
            'code' => '&lt;!--[if lt IE 7]&gt;  &lt;html class="ie ie6 lte9 lte8 lte7"&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 7]&gt;     &lt;html class="ie ie7 lte9 lte8 lte7"&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 8]&gt;     &lt;html class="ie ie8 lte9 lte8"&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 9]&gt;     &lt;html class="ie ie9 lte9"&gt; &lt;![endif]--&gt; \n&lt;!--[if gt IE 9]&gt;  &lt;html&gt; &lt;![endif]--&gt; \n&lt;!--[if !IE]&gt;&lt;!--&gt; &lt;html&gt;             &lt;!--&lt;![endif]--&gt;'
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
            'version' => 'Opera 9.27-, Safari 2',
            'data-version' => '9.27',
            'language' => 'language-css',
            'code' => "html:first-child .selector {}"
          ),
          array (
            'version' => 'Opera 9.5+, IE 7',
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
            'data-version' => '12-',
            'language' => 'language-css',
            'code' => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}"
          ),
          array (
            'version' => 'Opera, Firefox 3.5+, IE 9+',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'Opera, IE 8+',
            'data-version' => '',
            'language' => 'language-css',
            'code' => "@media screen\0 {}"
          )
        ),
        'javascript' => array(
          array (
            'version' => 'Opera 9.64-',
            'data-version' => '9.64-',
            'language' => 'language-javascript',
            'code' => "var isOpera = /^function \(/.test([].sort);"
          ),
          array (
            'version' => 'Opera 12-',
            'data-version' => '12.11-',
            'language' => 'language-javascript',
            'code' => "var isOpera = !!window.opera;"
          ),
          array (
            'version' => 'Opera X',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => 'var isOpera = window.opera && window.opera.version() == X;'
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
            'version' => 'Safari 6- and Chrome 24-',
            'data-version' => '6-',
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
        'propertyValue' => array(
          array (
            'version' => 'Safari 6-, Chrome 28-',
            'data-version' => '28-',
            'language' => 'language-css',
            'code' => '.selector { (;color: blue;); }\n .selector { [;color: blue;]; }'
          )
        ),
        "javascript" => array(
          array (
            'version' => 'Safari 5-',
            'data-version' => '2|3|4|5',
            'language' => 'language-javascript',
            'code' => "var isSafari = /a/.__proto__=='//';"
          ),
          array(
            'version' => 'Safari',
            'data-version' => '',
            'language' => 'language-javascript',
            'code' => 'var isSafari = /Constructor/.test(window.HTMLElement);'
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
        <h2 class="th"><a href="#<?php echo $name ?>"><?php echo $browser['name']; ?></a></h2>
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
