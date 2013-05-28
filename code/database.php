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

$browsers = array(
  'ch' => array(
    'name' => 'chrome',
  ),
  'fx' => array(
    'name' => 'firefox',
  ),
  'ie' => array(
    'name' => 'Internet Explorer',
  ),
  'sa' => array(
    'name' => 'safari',
  ),
  'op' => array(
    'name' => 'opera',
  )
);

$hacks = array(
  array(
    'type' => 'selector',
    'browser' => array('ch','sa','ie'),
    'data-version' => array('24-','6','7'),
    'label' => '',
    'language' => 'css',
    'code' => "::made-up-pseudo-element, .selector {}",
    'test' => "::made-up-pseudo-element, .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ch','sa', 'op'),
    'data-version' => array('*','3+', '9.26-|14+'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (-webkit-min-device-pixel-ratio:0) {}",
    'test' => "@media screen and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ch','sa', 'op'),
    'data-version' => array('28-','6-', '14+'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector { (;background: lightgreen;); } \n.selector { [;background: lightgreen;]; }",
    'test' => ".selector { (;background: lightgreen;); } \n.selector { [;background: lightgreen;]; }"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ch', 'op'),
    'data-version' => array('*', '14+'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isChrome = !!window.chrome;",
    'test' => "!!window.chrome;"
  ),
  array(
    'type' => 'selector',
    'browser' => array('fx'),
    'data-version' => array('1.5|2'),
    'label' => '',
    'language' => 'css',
    'code' => "body:empty .selector {}",
    'test' => "body:empty .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('fx','ie'),
    'data-version' => array('2+','7'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector, x:-moz-any-link {}",
    'test' => ".selector, x:-moz-any-link { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('fx','ie'),
    'data-version' => array('3+','7'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector, x:-moz-any-link, x:default {}",
    'test' => ".selector, x:-moz-any-link, x:default { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('fx'),
    'data-version' => array('3.5+'),
    'label' => '',
    'language' => 'css',
    'code' => "body:not(:-moz-handler-blocked) .selector {}",
    'test' => "body:not(:-moz-handler-blocked) .selector { background: lightgreen; }"
  ), 
  array(
    'type' => 'media',
    'browser' => array('fx','ie','op', 'ch'),
    'data-version' => array('3.5+','9+','12-','29+'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (min-resolution: +72dpi) {}",
    'test' => "@media screen and (min-resolution: +72dpi) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('fx'),
    'data-version' => array('3.6+'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (-moz-images-in-menus:0) {}",
    'test' => "@media screen and (-moz-images-in-menus:0) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('fx'),
    'data-version' => array('4+'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (min--moz-device-pixel-ratio:0) {}",
    'test' => "@media screen and (min--moz-device-pixel-ratio:0) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('*'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = !!window.sidebar",
    'test' => "!!window.sidebar;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('*'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = !!navigator.userAgent.match(/firefox/i);",
    'test' => "!!navigator.userAgent.match(/firefox/i);"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('2|3|4|5|6|7|8|9|10|11|12|13'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = !!window.globalStorage;",
    'test' => "!!window.globalStorage;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('2|3'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = /a/[-1]=='a';",
    'test' => "/a/[-1]=='a';"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('2'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = (function x(){})[-6]=='x';",
    'test' => "(function x(){})[-6]=='x';"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('fx'),
    'data-version' => array('3'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isFF = (function x(){})[-5]=='x';",
    'test' => "(function x(){})[-5]=='x';"
  ),
  array(
    'type' => 'misc',
    'browser' => array('fx'),
    'data-version' => array('3+'),
    'label' => '',
    'language' => 'css',
    'code' => "@-moz-document url-prefix() {}",
    'test' => "@-moz-document url-prefix() { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('6-'),
    'label' => '.unused-class can be any unused class',
    'language' => 'css',
    'code' => "* html .selector  {} \n.unused-class.selector {}",
    'test' => "* html .selector  { background: lightgreen; } \n.unused-class.selector { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector, {}",
    'test' => ".selector, { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('7'),
    'label' => '',
    'language' => 'css',
    'code' => "*:first-child+html .selector {} \n.selector, x:-IE7 {} \n*+html .selector {} \nbody*.selector {} \n.selector\ {}",
    'test' => "*:first-child+html .selector { background: lightgreen; } \n.selector, x:-IE7 { background: lightgreen; } \n*+html .selector { background: lightgreen; } \nbody*.selector { background: lightgreen; } \n.selector\ { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('6'),
    'label' => 'Everything but Internet Explorer 6',
    'language' => 'css',
    'code' => "html > body .selector {}",
    'test' => "html > body .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => 'Everything but Internet Explorer 7-',
    'language' => 'css',
    'code' => "html > /**/ body .selector {}\nhead ~ /**/ body .selector {}",
    'test' => "html > /**/ body .selector { background: lightgreen; }\nhead ~ /**/ body .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('ie'),
    'data-version' => array('8-'),
    'label' => 'Everything but Internet Explorer 8-',
    'language' => 'css',
    'code' => ":root *> .selector {} \nbody:last-child .selector {} \nbody:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}\n.selector:not([attr*='']) {}",
    'test' => ":root *> .selector { background: lightgreen; } \nbody:last-child .selector { background: lightgreen; } \nbody:nth-of-type(1) .selector { background: lightgreen; } \nbody:first-of-type .selector { background: lightgreen; }\n.selector:not([attr*='']) { background: lightgreen; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('6'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector { _property: value; } \n.selector { -property: value; }",
    'test' => ".selector { _background: lightgreen;  } \n.selector { -background: lightgreen;  }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => "Any combination of these characters: \n ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > |",
    'language' => 'css',
    'code' => ".selector { !property: value; } \n.selector { \$property: value; } \n.selector { &property: value; } \n.selector { *property: value; } \n/* ... */",
    'test' => ".selector { !background: lightgreen; } \n.selector { \$background: lightgreen; } \n.selector { &background: lightgreen; } \n.selector { *background: lightgreen; } \n.selector { )background: lightgreen; } \n.selector { =background: lightgreen; } \n.selector { %background: lightgreen; } \n.selector { +background: lightgreen; } \n.selector { @background: lightgreen; } \n.selector { ,background: lightgreen; } \n.selector { .background: lightgreen; } \n.selector { /background: lightgreen; } \n.selector { `background: lightgreen; } \n.selector { [background: lightgreen; } \n.selector { ]background: lightgreen; } \n.selector { #background: lightgreen; } \n.selector { ~background: lightgreen; } \n.selector { ?background: lightgreen; } \n.selector { :background: lightgreen; } \n.selector { |background: lightgreen; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => 'Acts as an !important; string after ! can be anything',
    'language' => 'css',
    'code' => ".selector { property: value !ie; }",
    'test' => ".selector { background: lightgreen !ie; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('6+'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector { property: value\9; } \n.selector { property/*\**/: value\9; }",
    'test' => ".selector { background: lightgreen\9; } \n.selector { background/*\**/: lightgreen\9; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie','op'),
    'data-version' => array('8|9','10'),
    'label' => 'Must go at the END of all rules',
    'language' => 'css',
    'code' => ".selector { property: value\\0/; }",
    'test' => ".selector { background: lightgreen\\0/; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('9+'),
    'label' => '',
    'language' => 'css',
    'code' => ".selector:nth-of-type(1n) { property: value\9; }",
    'test' => ".selector:nth-of-type(1n) { background: lightgreen\9; }"
  ),
  array(
    'type' => 'propertyValue',
    'browser' => array('ie'),
    'data-version' => array('6'),
    'label' => 'Everything but Internet Explorer 6',
    'language' => 'css',
    'code' => ".selector { property/**/: value; }",
    'test' => ".selector { background/**/: lightgreen; }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen\\9 {}",
    'test' => "@media screen\\9 { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie'),
    'data-version' => array('8-'),
    'label' => '',
    'language' => 'css',
    'code' => "@media \\0screen\,screen\9 {}",
    'test' => "@media \\0screen\,screen\9 { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie'),
    'data-version' => array('8'),
    'label' => '',
    'language' => 'css',
    'code' => "@media \\0screen {}",
    'test' => "@media \\0screen { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie','op'),
    'data-version' => array('8+','12-'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen\\0 {}",
    'test' => "@media screen\\0 { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie','sa'),
    'data-version' => array('9+','4'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (min-width:0\\0) {}",
    'test' => "@media screen and (min-width:0\\0) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie'),
    'data-version' => array('10+'),
    'label' => '',
    'language' => 'css',
    'code' => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {}",
    'test' => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'media',
    'browser' => array('ie'),
    'data-version' => array('8-'),
    'label' => 'Everything but Internet Explorer 8-',
    'language' => 'css',
    'code' => "@media screen and (min-width: 400px) {}",
    'test' => "@media screen and (min-width: 400px) { .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    "data-version" => array('*'),
    'label' => "",
    "language" => "javascript",
    "code" => "var isIE = /*@cc_on!@*/false;",
    "test" => "/*@cc_on!@*/false;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    "data-version" => array("3|4|5|6|7|8|9|10"),
    'label' => "Check for Internet Explorer version",
    "language" => "javascript",
    "code" => "var ieVersion = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;",
    "test" => "/*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    "data-version" => array('*'),
    'label' => "Check for Internet Explorer version",
    "language" => "javascript",
    "code" => "var ieVersion = (function() { if (new RegExp(\"MSIE ([0-9]{1,}[\.0-9]{0,})\").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();",
    "test" => "(function() { if (new RegExp(\"MSIE ([0-9]{1,}[\.0-9]{0,})\").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('7-'),
    'label' => '',
    'language' => 'javascript',
    'code' => 'var isIE = document.all && !document.querySelector;',
    'test' => 'document.all && !document.querySelector;'
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'IE X (6, 7, 8, 9)',
    'language' => 'javascript',
    'code' => "(checkIE = document.createElement(\"b\")).innerHTML = \"&lt;!--[if IE X]>&lt;i>&lt;/i>&lt;![endif]-->\"; \nvar isIE = checkIE.getElementsByTagName(\"i\").length == 1;",
    'test' => ""
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('7'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isIE = navigator.appVersion.indexOf(\"MSIE 7.\")!=-1;",
    'test' => "navigator.appVersion.indexOf(\"MSIE 7.\")!=-1;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('8-'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isIE = '\\v'=='v';",
    'test' => "'\\v'=='v';"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('8-'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isIE = !+'\\v1';",
    'test' => "!+'\\v1';"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('8'),
    'label' => '',
    'language' => 'javascript',
    'code' => 'var isIE = document.all && document.querySelector && !document.addEventListener;',
    'test' => 'document.all && document.querySelector && !document.addEventListener;'
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('10'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isIE = eval(\"/*@cc_on!@*/false\") && document.documentMode === 10;",
    'test' => "eval(\"/*@cc_on!@*/false\") && document.documentMode === 10;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('10'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isIE = document.body.style.msTouchAction != undefined;",
    'test' => "document.body.style.msTouchAction != undefined;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('ie'),
    'data-version' => array('10'),
    'label' => '',
    'language' => 'javascript',
    'code' => 'var isIE = window.navigator.msPointerEnabled;',
    'test' => 'window.navigator.msPointerEnabled;'
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('*'),
    'label' => '',
    'language' => 'markup',
    'code' => '&lt;!--[if IE]> Internet Explorer &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('*'),
    'label' => 'Not Internet Explorer',
    'language' => 'markup',
    'code' => '&lt;!--[if !IE]> Not Internet Explorer &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Internet Explorer X (6, 7, 8, 9)',
    'language' => 'markup',
    'code' => '&lt;!--[if IE X]> Internet Explorer X &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Internet Explorer X- (6, 7, 8, 9)',
    'language' => 'markup',
    'code' => '&lt;!--[if IE lte X]> Internet Explorer X or less &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Internet Explorer X+ (6, 7, 8, 9)',
    'language' => 'markup',
    'code' => '&lt;!--[if IE gte X]> Internet Explorer X or greater &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Internet Explorer X or Y (6, 7, 8, 9)',
    'language' => 'markup',
    'code' => '&lt;!--[if (IE X)|(IE Y)]> Internet Explorer X or Internet Explorer Y &lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Internet Explorer X+ but Y- (6, 7, 8, 9)',
    'language' => 'markup',
    'code' => '&lt;!--[if (gte IE X)&(lte IE Y)]> Internet Explorer between X and Y (included)&lt;![endif]-->',
    'test' => ''
  ),
  array(
    'type' => 'html',
    'browser' => array('ie'),
    'data-version' => array('6|7|8|9'),
    'label' => 'Conditional classes',
    'language' => 'markup',
    'code' => "&lt;!--[if lt IE 7]&gt;  &lt;html class='ie ie6 lte9 lte8 lte7'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 7]&gt;     &lt;html class='ie ie7 lte9 lte8 lte7'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 8]&gt;     &lt;html class='ie ie8 lte9 lte8'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 9]&gt;     &lt;html class='ie ie9 lte9'&gt; &lt;![endif]--&gt; \n&lt;!--[if gt IE 9]&gt;  &lt;html&gt; &lt;![endif]--&gt; \n&lt;!--[if !IE]&gt;&lt;!--&gt; &lt;html&gt;             &lt;!--&lt;![endif]--&gt;",
    'test' => ""
  ),
  array(
    'type' => 'selector',
    'browser' => array('op'),
    'data-version' => array('7|15'),
    'label' => '',
    'language' => 'css',
    'code' => "@media all and (min-width: 0px) {}",
    'test' => "@media all and (min-width: 0px){ .selector { background: lightgreen; } }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('op','sa'),
    'data-version' => array('9.27-','2'),
    'label' => '',
    'language' => 'css',
    'code' => "html:first-child .selector {}",
    'test' => "html:first-child .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('op'),
    'data-version' => array('9.64-'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isOpera = /^function \(/.test([].sort);",
    'test' => "/^function \(/.test([].sort);"
  ),
  array(
    'type' => 'selector',
    'browser' => array('op','ie'),
    'data-version' => array('9.5|10|11|12','7'),
    'label' => '',
    'language' => 'css',
    'code' => "_:-o-prefocus, .selector {}",
    'test' => "_:-o-prefocus, .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('op'),
    'data-version' => array('11-'),
    'label' => '',
    'language' => 'css',
    'code' => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}",
    'test' => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }"
  ),

  array(
    'type' => 'javascript',
    'browser' => array('op'),
    'data-version' => array('12-'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isOpera = !!window.opera;",
    'test' => "!!window.opera;"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('op'),
    'data-version' => array('12-'),
    'label' => 'Opera X (12-)',
    'language' => 'javascript',
    'code' => 'var isOpera = window.opera && window.opera.version() == X;',
    'test' => 'window.opera && window.opera.version() == X;'
  ),
  array(
    'type' => 'media',
    'browser' => array('op'),
    'data-version' => array('12'),
    'label' => '',
    'language' => 'css',
    'code' => '@media (min-resolution: .001dpcm) { _:-o-prefocus, .selector {} }',
    'test' => '@media (min-resolution: .001dpcm) { _:-o-prefocus, .selector { background: lightgreen; } }'
  ),
  array(
    'type' => 'selector',
    'browser' => array('sa'),
    'data-version' => array('2|3'),
    'label' => '',
    'language' => 'css',
    'code' => "html[xmlns*=\"\"] body:last-child .selector {} \nhtml[xmlns*=\"\"]:root .selector  {}",
    'test' => "html[xmlns*=\"\"] body:last-child .selector { background: lightgreen; } \nhtml[xmlns*=\"\"]:root .selector  { background: lightgreen; }"
  ),
  array(
    'type' => 'selector',
    'browser' => array('sa','op'),
    'data-version' => array('2|3.1','9.25'),
    'label' => '',
    'language' => 'css',
    'code' => "*|html[xmlns*=\"\"] .selector {}",
    'test' => "*|html[xmlns*=\"\"] .selector { background: lightgreen; }"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('sa'),
    'data-version' => array('5-'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isSafari = /a/.__proto__=='//';",
    'test' => "/a/.__proto__=='//';"
  ),
  array(
    'type' => 'javascript',
    'browser' => array('sa'), 
    'data-version' => array('*'),
    'label' => '',
    'language' => 'javascript',
    'code' => 'var isSafari = /Constructor/.test(window.HTMLElement);',
    'test' => '/Constructor/.test(window.HTMLElement);'
  ),
  array(
    'type' => 'javascript',
    'browser' => array('sa'),
    'data-version' => array('6'),
    'label' => '',
    'language' => 'javascript',
    'code' => "var isSafari = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== \"undefined\";",
    'test' => "!!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== \"undefined\";"
  )
);

?>


