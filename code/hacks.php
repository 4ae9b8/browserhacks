<?php

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
    'property/value' => array (
      'title' => 'Property/Value Hacks',
      'icon' => 'fontawesome-paper-clip'
    ),
    'misc' => array (
      'title' => 'Miscellaneous',
      'icon' => 'fontawesome-beaker'
    )
  ); 

  $hacks = array (
    'ch' => array (
      'name' => 'Chrome',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Chrome, Safari 3+, Opera 9+, Firefox 3.5+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Chrome and Safari (version?)',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Chrome, Safari 3+, Opera 9',
            'language' => 'language-css',
            'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}"
          ),
        ),
        'javascript' => array(
          array (
            'version' => 'Chrome',
            'language' => 'language-javascript',
            'code' => "Chr=/source/.test((/a/.toString+''))"
          ),
        )
      )
    ),
    'fx' => array (
      'name' => 'Firefox',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Firefox 1.5',
            'language' => 'language-css',
            'code' => "body:empty .selector {}"
          ),
          array (
            'version' => 'Firefox 2',
            'language' => 'language-css',
            'code' => ".selector, x:-moz-any-link {}"
          ),
          array (
            'version' => 'Firefox 3 Windows',
            'language' => 'language-css',
            'code' => ".selector, x:-moz-any-link; x:default {}"
          ),
          array (
            'version' => 'Firefox 3.5+',
            'language' => 'language-css',
            'code' => "body:not(:-moz-handler-blocked) .selector {}"
          ),
          array (
            'version' => 'Firefox 3.5+, Chrome, Safari 3+, Opera 9+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Firefox 3.5 to Firefox 7',
            'language' => 'language-css',
            'code' => "@media screen and (min-resolution: +72dpi) {}"
          ),
          array (
            'version' => 'Firefox 3.6+',
            'language' => 'language-css',
            'code' => "@media screen and (-moz-images-in-menus:0) {}"
          ),
          array (
            'version' => 'Firefox 4+',
            'language' => 'language-css',
            'code' => "@media screen and (min--moz-device-pixel-ratio:0) {}"
          )
        ),
        'javascript' => array(
          array (
            'version' => 'Firefox 2',
            'language' => 'language-javascript',
            'code' => "FF2=(function x(){})[-6]=='x'"
          ),
          array (
            'version' => 'Firefox 3',
            'language' => 'language-javascript',
            'code' => "FF3=(function x(){})[-5]=='x'"
          ),
          array (
            'version' => 'Firefox 2/3',
            'language' => 'language-javascript',
            'code' => "FF=/a/[-1]=='a'"
          )
        ),
        'misc' => array(
          array (
            'version' => 'Firefox 3/4 (+?)',
            'language' => 'language-css',
            'code' => "@-moz-document url-prefix() {}"
          )
        )
      )
    ),
    'ie' => array (
      'name' => 'Internet Explorer',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'IE 6 and below',
            'language' => 'language-css',
            'code' => "* html .selector  {} \n.suckyie6.selector {} /* .suckyie6 can be any unused class */"
          ),
          array (
            'version' => 'IE 7 and below',
            'language' => 'language-css',
            'code' => ".selector, {}"
          ),
          array (
            'version' => 'IE 7',
            'language' => 'language-css',
            'code' => "*:first-child+html .selector {} \n.selector, x:-IE7 {} \n*+html .selector {} "
          ),
          array (
            'version' => 'Everything but IE 6',
            'language' => 'language-css',
            'code' => "html > body .selector {}"
          ),
          array (
            'version' => 'Everything but IE 6/7',
            'language' => 'language-css',
            'code' => "html > /**/ body .selector {}"
          ),
          array (
            'version' => 'Everything but IE 6/7/8',
            'language' => 'language-css',
            'code' => ":root *> .selector {} \nbody:last-child {}"
          )
        ),
        'property/value' => array(
          array (
            'version' => "IE 6 - any combination of these characters: \n_ - £ ¬ ¦",
            'language' => 'language-css',
            'code' => ".selector { _color: blue; } \n.selector { -color: blue; } \n.selector { £color: blue; } \n.selector { ¬color: blue; } \n.selector { ¦color: blue; }"
          ),
          array (
            'version' => "IE 6/7 - any combination of these characters: \n ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > |",
            'language' => 'language-css',
            'code' => ".selector { !color: blue; } \n.selector { \$color: blue; } \n.selector { &color: blue; } \n.selector { *color: blue; } \n/* ... */"
              /*.selector { )color: blue; } \n.selector { =color: blue; } \n.selector { %color: blue; } \n.selector { +color: blue; } \n.selector { @color: blue; } \n.selector { ,color: blue; } \n.selector { .color: blue; } \n.selector { /color: blue; } \n.selector { `color: blue; } \n.selector { [color: blue; } \n.selector { ]color: blue; } \n.selector { #color: blue; } \n.selector { ~color: blue; } \n.selector { ?color: blue; } \n.selector { :color: blue; } \n.selector { <color: blue; } \n.selector { >color: blue; } \n.selector { |color: blue; }*/
          ),
          array (
            'version' => 'IE 6/7 - acts as an !important',
            'language' => 'language-css',
            'code' => ".selector { color: blue !ie; } \n/* string after ! can be anything */"
          ),
          array (
            'version' => 'IE 7/8',
            'language' => 'language-css',
            'code' => ".selector { color/*\**/: blue\9; }"
          ),
          array (
            'version' => 'IE 8/9',
            'language' => 'language-css',
            'code' => ".selector { color: blue\0/; } \n/* must go at the END of all rules */"
          ),
          array (
            'version' => 'IE 9/10',
            'language' => 'language-css',
            'code' => ".selector:nth-of-type(1n) { color: blue\9; }"
          ),
          array (
            'version' => 'IE 6/7/8/9/10',
            'language' => 'language-css',
            'code' => ".selector { color: blue\9; }"
          ),
          array (
            'version' => 'Everything but IE 6',
            'language' => 'language-css',
            'code' => ".selector { color/**/: blue; }"
          )
        ),
        "media" => array(
          array (
            'version' => 'IE 6/7',
            'language' => 'language-css',
            'code' => "@media screen\9 {}"
          ),
          array (
            'version' => 'IE 6/7/8',
            'language' => 'language-css',
            'code' => "@media \0screen\,screen\9 {}"
          ),
          array (
            'version' => 'IE 8',
            'language' => 'language-css',
            'code' => "@media \0screen {}"
          ),
          array (
            'version' => 'IE 8/9',
            'language' => 'language-css',
            'code' => "@media screen\0 {}"
          ),
          array (
            'version' => 'IE 9/10',
            'language' => 'language-css',
            'code' => "@media screen and (min-width:0\0) {}"
          ),
          array (
            'version' => 'IE 10',
            'language' => 'language-css',
            'code' => "@media screen and (-ms-transform-3d) {} \n/* To be tested */"
          ),
          array (
            'version' => 'IE 10+',
            'language' => 'language-css',
            'code' => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {}"
          ),
          array (
            'version' => 'Everything but IE6/7/8 - not a hack',
            'language' => 'language-css',
            'code' => "@media screen and (min-width: 400px) {}"
          )
        ),
        "javascript" => array(
          array (
            'version' => 'IE',
            'language' => 'language-javascript',
            'code' => "IE='\v'=='v'"
          ),
          array (
            'version' => 'IE 6 - using conditional comments',
            'language' => 'language-javascript',
            'code' => "try {IE6=@cc_on @_jscript_version <= 5.7&&@_jscript_build<10000} catch(e){IE6=false;}"
          ),
          array (
            'version' => 'IE 10',
            'language' => 'language-javascript',
            'code' => "/*@cc_on!@*/false && document.documentMode === 10"
          )
        ),
        "misc" => array(
          array (
            'version' => 'Everything but IE 6/7',
            'language' => 'language-javascript',
            'code' => "@import \"stylesheet.css\" all; \n/* To be tested */"
          )
        )
      )
    ),
    'sa' => array (
      'name' => 'Safari',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Safari 2/3',
            'language' => 'language-css',
            'code' => "html[xmlns*=\"\"] body:last-child .selector {} \nhtml[xmlns*=\"\"]:root .selector  {}"
          ),
          array (
            'version' => 'Safari 2/3.1, Opera 9.25',
            'language' => 'language-css',
            'code' => "*|html[xmlns*=\"\"] .selector {}"
          ),
          array (
            'version' => 'Safari 3+, Firefox 3.5+, Chrome, Opera 9+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Safari (version?) and Chrome',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        ),
        "media" => array(
          array (
            'version' => 'Safari 3+, Chrome, Opera 9',
            'language' => 'language-css',
            'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}"
          )
        ),
        "javascript" => array(
          array (
            'version' => 'Safari',
            'language' => 'language-javascript',
            'code' => "Saf=/a/.__proto__=='//'"
          )
        )
      )
    ),
    'op' => array (
      'name' => 'Opera',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Opera 9+, Safari 3+, Firefox 3.5+, Chrome',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Opera 9.25, Safari 2/3.1',
            'language' => 'language-css',
            'code' => "*|html[xmlns*=\"\"] .selector {}"
          ),
          array (
            'version' => 'Opera 9.27 and below, Safari 2',
            'language' => 'language-css',
            'code' => "html:first-child .selector {}"
          ),
          array (
            'version' => 'Opera 9.5+',
            'language' => 'language-css',
            'code' => "noindex:-o-prefocus, .selector {}"
          )
        ),
        'media' => array(
          array (
            'version' => 'Opera 7',
            'language' => 'language-css',
            'code' => "@media all and (min-width: 0px){}"
          ),
          array (
            'version' => 'Opera 9, Safari 3+, Chrome',
            'language' => 'language-css',
            'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}"
          ),
          array (
            'version' => 'Opera 12-',
            'language' => 'language-css',
            'code' => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}"
          )  
        ),
        'javascript' => array(
          array (
            'version' => 'Opera',
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

  <article data-high="3" data-text="" class="<?php echo $name; ?>">
    <section data-cols="1">
        <h2 class="th"><?php echo $browser['name']; ?></h2>
    </section>
  
    <?php 
      // Type of hack
      foreach($browser['hacks'] as $type => $hack): 
    ?>
    
      <section data-cols="1">
        <h3><span class="<?php echo $hack_types[$type]['icon']; ?>"></span><?php echo $hack_types[$type]['title']; ?></h3>
      </section>
  
      <section data-cols="2">
        <?php 
          // Single hack
          for($i = 0; $i < count($hack); $i++): 
        ?>
          <div>
            <pre class="<?php echo $hack[$i]['language']; ?>"><code><?php echo "/* " . $hack[$i]['version'] . " */\n";
            echo $hack[$i]['code']; ?></code></pre>
          </div>
        <?php endfor; ?>
      </section>
  
    <?php endforeach; ?>
  
    </article>
  
<?php endforeach; ?>