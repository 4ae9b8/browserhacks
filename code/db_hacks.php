<?php

$hacks = array(
  array(
    'type'     => 'selector',
    'browsers' => array('ch'=>'24-','sa'=>'6','ie'=>'7','an'=>'4.1+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "::made-up-pseudo-element, .selector {}",
    'test'     => "::made-up-pseudo-element, .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('ch'=>'*','sa'=>'3+','op'=>'9.26-|14+','an'=>'2.3+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen and (-webkit-min-device-pixel-ratio:0) {}",
    'test'     => "@media screen and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ch'=>'28-','sa'=>'6-','op'=>'14+'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector { (;background: lightgreen;); } \n.selector { [;background: lightgreen;]; }",
    'test'     => ".selector { (;background: lightgreen;); } \n.selector { [;background: lightgreen;]; }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ch'=>'*','op'=>'14+','an'=>'4.0.4'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isChromium = !!window.chrome;",
    'test'     => "!!window.chrome;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ch'=>'*','sa'=>'3+','op'=>'14+'),
    'label'    => "Webkit",
    'language' => 'javascript',
    'code'     => "var isWebkit = 'WebkitAppearance' in document.documentElement.style;",
    'test'     => "'WebkitAppearance' in document.documentElement.style;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ch'=>'14+'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isChrome = !!window.chrome && !!window.chrome.webstore;",
    'test'     => "!!window.chrome && !!window.chrome.webstore;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('fx'=>'1.5|2'),
    'label'    => '',
    'language' => 'css',
    'code'     => "body:empty .selector {}",
    'test'     => "body:empty .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('fx'=>'2+','ie'=>'7'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector, x:-moz-any-link {}",
    'test'     => ".selector, x:-moz-any-link { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('fx'=>'3+','ie'=>'7'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector, x:-moz-any-link, x:default {}",
    'test'     => ".selector, x:-moz-any-link, x:default { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('fx'=>'3.5+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "body:not(:-moz-handler-blocked) .selector {}",
    'test'     => "body:not(:-moz-handler-blocked) .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('fx'=>'3.6+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen and (-moz-images-in-menus:0) {}",
    'test'     => "@media screen and (-moz-images-in-menus:0) { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('fx'=>'4+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen and (min--moz-device-pixel-ratio:0) {}",
    'test'     => "@media screen and (min--moz-device-pixel-ratio:0) { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'*'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = !!window.sidebar;",
    'test'     => "!!window.sidebar;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'*'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = 'MozAppearance' in document.documentElement.style;",
    'test'     => "'MozAppearance' in document.documentElement.style;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'*'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = !!navigator.userAgent.match(/firefox/i);",
    'test'     => "!!navigator.userAgent.match(/firefox/i);",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'2|3|4|5|6|7|8|9|10|11|12|13'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = !!window.globalStorage;",
    'test'     => "!!window.globalStorage;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'1.5+'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = typeof InstallTrigger !== 'undefined';",
    'test'     => "typeof InstallTrigger !== 'undefined';",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'2|3'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = /a/[-1]=='a';",
    'test'     => "/a/[-1]=='a';",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'2'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = (function x(){})[-6]=='x';",
    'test'     => "(function x(){})[-6]=='x';",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('fx'=>'3'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isFF = (function x(){})[-5]=='x';",
    'test'     => "(function x(){})[-5]=='x';",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'misc',
    'browsers' => array('fx'=>'3+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@-moz-document url-prefix() {}",
    'test'     => "@-moz-document url-prefix() { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'6-'),
    'label'    => '.unused-class can be any unused class',
    'language' => 'css',
    'code'     => "* html .selector  {} \n.unused-class.selector {}",
    'test'     => "* html .selector  { background: lightgreen; } \n.unused-class.selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'7-'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector, {}",
    'test'     => ".selector, { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'7'),
    'label'    => '',
    'language' => 'css',
    'code'     => "*:first-child+html .selector {} \n.selector, x:-IE7 {} \n*+html .selector {} \nbody*.selector {} \n.selector\ {}",
    'test'     => "*:first-child+html .selector { background: lightgreen; } \n.selector, x:-IE7 { background: lightgreen; } \n*+html .selector { background: lightgreen; } \nbody*.selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'7'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector\ {}",
    'test'     => ".selector\ { background: lightgreen; }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'6'),
    'label'    => 'Everything but Internet Explorer 6',
    'language' => 'css',
    'code'     => "html > body .selector {}",
    'test'     => "html > body .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'7-'),
    'label'    => 'Everything but Internet Explorer 7-',
    'language' => 'css',
    'code'     => "html > /**/ body .selector {}\nhead ~ /**/ body .selector {}",
    'test'     => "html > /**/ body .selector { background: lightgreen; }\nhead ~ /**/ body .selector { background: lightgreen; }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'8-'),
    'label'    => 'Everything but Internet Explorer 8-',
    'language' => 'css',
    'code'     => ":root * > .selector {} \nbody:last-child .selector {} \nbody:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}\n.selector:not([attr*='']) {}",
    'test'     => ":root * > .selector { background: lightgreen; } \nbody:last-child .selector { background: lightgreen; } \nbody:nth-of-type(1) .selector { background: lightgreen; } \nbody:first-of-type .selector { background: lightgreen; }\n.selector:not([attr*='']) { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),/* Target 5 browsers... No point in keeping this 
  array(
    'type'     => 'selector',
    'browsers' => array('ie'=>'10+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "_::-ms-reveal, .selector {}",
    'test'     => "_::-ms-reveal, .selector { background: lightgreen; }"
  ),*/
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'6'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector { _property: value; } \n.selector { -property: value; }",
    'test'     => ".selector { _background: lightgreen;  } \n.selector { -background: lightgreen;  }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'7-'),
    'label'    => "Any combination of these characters: \n ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > |",
    'language' => 'css',
    'code'     => ".selector { !property: value; } \n.selector { \$property: value; } \n.selector { &property: value; } \n.selector { *property: value; } \n/* ... */",
    'test'     => ".selector { !background: lightgreen; } \n.selector { \$background: lightgreen; } \n.selector { &background: lightgreen; } \n.selector { *background: lightgreen; } \n.selector { )background: lightgreen; } \n.selector { =background: lightgreen; } \n.selector { %background: lightgreen; } \n.selector { +background: lightgreen; } \n.selector { @background: lightgreen; } \n.selector { ,background: lightgreen; } \n.selector { .background: lightgreen; } \n.selector { /background: lightgreen; } \n.selector { `background: lightgreen; } \n.selector { [background: lightgreen; } \n.selector { ]background: lightgreen; } \n.selector { #background: lightgreen; } \n.selector { ~background: lightgreen; } \n.selector { ?background: lightgreen; } \n.selector { :background: lightgreen; } \n.selector { |background: lightgreen; }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'7-'),
    'label'    => 'Acts as an !important; string after ! can be anything',
    'language' => 'css',
    'code'     => ".selector { property: value !ie; }",
    'test'     => ".selector { background: lightgreen !ie; }",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'6+'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector { property: value\9; } \n.selector { property/*\**/: value\9; }",
    'test'     => ".selector { background: lightgreen\9; } \n.selector { background/*\**/: lightgreen\9; }",
    'process'  => false,
    'validator'=> false
  ),/* Doesn't seem to work
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'8|9','op'=>'10'),
    'label'    => 'Must go at the END of all rules',
    'language' => 'css',
    'code'     => ".selector { property: value\\0/; }",
    'test'     => ".selector { background: lightgreen\\0/; }"
  ),*//* Doesn't seem to work
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'9|10'),
    'label'    => '',
    'language' => 'css',
    'code'     => ".selector:nth-of-type(1n) { property: value\9; }",
    'test'     => ".selector:nth-of-type(1n) { background: lightgreen\9; }"
  ),*//* Dpesn't work on IE 6...
  array(
    'type'     => 'propertyValue',
    'browsers' => array('ie'=>'6'),
    'label'    => 'Everything but Internet Explorer 6',
    'language' => 'css',
    'code'     => ".selector { property/**\/: value; }",
    'test'     => ".selector { background/**\/: lightgreen; }"
  ),*/
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'7-'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen\\9 {}",
    'test'     => "@media screen\\9 { .selector { background: lightgreen; } }",
    'process'  => false, // Sass => OK, LESS => KO
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'8-'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media \\0screen\\,screen\\9 {}",
    'test'     => "@media \\0screen\\,screen\\9 { .selector { background: lightgreen; } }",
    'process'  => false, // Sass => OK, LESS => KO
    'validator'=> false
  ),/* Not a hack 
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'8-'),
    'label'    => 'Everything but Internet Explorer 8-',
    'language' => 'css',
    'code'     => "@media screen and (min-width: 400px) {}",
    'test'     => "@media screen and (min-width: 400px) { .selector { background: lightgreen; } }"
  ),*/
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'8'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media \\0screen {}",
    'test'     => "@media \\0screen { .selector { background: lightgreen; } }",
    'process'  => false, // Sass => OK, LESS => KO
    'validator'=> false
  ),/* Issue with versioning
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'op'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen\\0 {}",
    'test'     => "@media screen\\0 { .selector { background: lightgreen; } }"
  ),*/
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'10+','sa'=>'4','an'=>'2.3+'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen and (min-width:0\\0) {}",
    'test'     => "@media screen and (min-width:0\\0) { .selector { background: lightgreen; } }",
    'process'  => false, // Sass => OK, LESS => KO
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'10'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {}",
    'test'     => "@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('ie'=>'*','sa'=>'*'),
    'label'    => "Everything but Internet Explorer and Safari",
    'language' => "css",
    'code'     => "@media screen { @media (min-width: 0px) {} }",
    'test'     => "@media screen { @media (min-width: 0px) { .selector { background: lightgreen; } } }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'6-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && !window.XMLHttpRequest;',
    'test'     => 'document.all && !window.XMLHttpRequest;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'6|7|8|9|10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && document.compatMode;',
    'test'     => 'document.all && document.compatMode;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'7-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && !document.querySelector;',
    'test'     => 'document.all && !document.querySelector;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'7'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && window.XMLHttpRequest && !document.querySelector;',
    'test'     => 'document.all && window.XMLHttpRequest && !document.addEventListener;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'7|8|9|10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && window.XMLHttpRequest;',
    'test'     => 'document.all && window.XMLHttpRequest;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'8|9|10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && document.querySelector;',
    'test'     => 'document.all && document.querySelector;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'8-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && !document.addEventListener;',
    'test'     => 'document.all && !document.addEventListener;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'8'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && document.querySelector && !document.addEventListener;',
    'test'     => 'document.all && document.querySelector && !document.addEventListener;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'9-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && !window.atob;',
    'test'     => 'document.all && !window.atob;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'9'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && document.addEventListener && !window.atob;',
    'test'     => 'document.all && document.addEventListener && !window.atob;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'9|10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && document.addEventListener;',
    'test'     => 'document.all && document.addEventListener;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = document.all && window.atob;',
    'test'     => 'document.all && window.atob;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10-'),
    'label'    => "",
    'language' => "javascript",
    'code'     => "var isIE = /*@cc_on!@*/false;",
    'test'     => "/*@cc_on!@*/false;",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'3|4|5|6|7|8|9|10'),
    'label'    => "Check for Internet Explorer version",
    'language' => "javascript",
    'code'     => "var ieVersion = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;",
    'test'     => "/*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'*'),
    'label'    => "Check for Internet Explorer version",
    'language' => "javascript",
    'code'     => "var ieVersion = (function() { if (new RegExp(\"MSIE ([0-9]{1,}[\.0-9]{0,})\").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();",
    'test'     => "(function() { if (new RegExp(\"MSIE ([0-9]{1,}[\.0-9]{0,})\").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "(checkIE = document.createElement(\"b\")).innerHTML = \"&lt;!--[if IE X]>&lt;i>&lt;/i>&lt;![endif]-->\"; \nvar isIE = checkIE.getElementsByTagName(\"i\").length == 1;",
    'test'     => "",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'7'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = navigator.appVersion.indexOf(\"MSIE 7.\") !== -1;",
    'test'     => "navigator.appVersion.indexOf(\"MSIE 7.\") !== -1;",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'8-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = '\\v'=='v';",
    'test'     => "'\\v'=='v';",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'8-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = !+'\\v1';",
    'test'     => "!+'\\v1';",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = eval(\"/*@cc_on!@*/false\") && document.documentMode === 10;",
    'test'     => "eval(\"/*@cc_on!@*/false\") && document.documentMode === 10;",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10+'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = document.body.style.msTouchAction !== undefined;",
    'test'     => "document.body.style.msTouchAction !== undefined;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10+'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isIE = window.navigator.msPointerEnabled;',
    'test'     => 'window.navigator.msPointerEnabled;',
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'10+'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = 'behavior' in document.documentElement.style && '-ms-user-select' in document.documentElement.style;",
    'test'     => "'behavior' in document.documentElement.style && '-ms-user-select' in document.documentElement.style;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('ie'=>'11'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isIE = '-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style;",
    'test'     => "'-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'*'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if IE]> Internet Explorer &lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'*'),
    'label'    => 'Not Internet Explorer',
    'language' => 'markup',
    'code'     => '&lt;![if !IE]> Not Internet Explorer &lt;![endif]>',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if IE X]> Internet Explorer X &lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if lte IE X]> Internet Explorer X or less &lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if gte IE X]> Internet Explorer X or greater &lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if (IE X)|(IE Y)]> Internet Explorer X or Internet Explorer Y &lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => '',
    'language' => 'markup',
    'code'     => '&lt;!--[if (gte IE X)&(lte IE Y)]> Internet Explorer between X and Y (included)&lt;![endif]-->',
    'test'     => '',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'html',
    'browsers' => array('ie'=>'6|7|8|9'),
    'label'    => 'Conditional classes',
    'language' => 'markup',
    'code'     => "&lt;!--[if lt IE 7]&gt;  &lt;html class='ie ie6 lte9 lte8 lte7'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 7]&gt;     &lt;html class='ie ie7 lte9 lte8 lte7'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 8]&gt;     &lt;html class='ie ie8 lte9 lte8'&gt; &lt;![endif]--&gt; \n&lt;!--[if IE 9]&gt;     &lt;html class='ie ie9 lte9'&gt; &lt;![endif]--&gt; \n&lt;!--[if gt IE 9]&gt;  &lt;html&gt; &lt;![endif]--&gt; \n&lt;!--[if !IE]&gt;&lt;!--&gt; &lt;html&gt;             &lt;!--&lt;![endif]--&gt;",
    'test'     => "",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('op'=>'9.27-','sa'=>'2'),
    'label'    => '',
    'language' => 'css',
    'code'     => "html:first-child .selector {}",
    'test'     => "html:first-child .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('op'=>'9.64-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isOpera = /^function \(/.test([].sort);",
    'test'     => "/^function \(/.test([].sort);",
    'process'  => false,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('op'=>'9.5|10|11|12','ie'=>'7'),
    'label'    => '',
    'language' => 'css',
    'code'     => "_:-o-prefocus, .selector {}",
    'test'     => "_:-o-prefocus, .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('op'=>'11-'),
    'label'    => '',
    'language' => 'css',
    'code'     => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}",
    'test'     => "@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }",
    'process'  => true,
    'validator'=> false
  ),

  array(
    'type'     => 'javascript',
    'browsers' => array('op'=>'12.16-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isOpera = !!window.opera;",
    'test'     => "!!window.opera;",
    'process'  => true,
    'validator'=> true
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('op'=>'12-'),
    'label'    => 'Replace X by the version',
    'language' => 'javascript',
    'code'     => 'var isOpera = window.opera && window.opera.version() == X;',
    'test'     => 'window.opera && window.opera.version() == X;',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'media',
    'browsers' => array('op'=>'12'),
    'label'    => '',
    'language' => 'css',
    'code'     => '@media (min-resolution: .001dpcm) { _:-o-prefocus, .selector {} }',
    'test'     => '@media (min-resolution: .001dpcm) { _:-o-prefocus, .selector { background: lightgreen; } }',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('sa'=>'2|3'),
    'label'    => '',
    'language' => 'css',
    'code'     => "html[xmlns*=\"\"] body:last-child .selector {} \nhtml[xmlns*=\"\"]:root .selector  {}",
    'test'     => "html[xmlns*=\"\"] body:last-child .selector { background: lightgreen; } \nhtml[xmlns*=\"\"]:root .selector  { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'selector',
    'browsers' => array('sa'=>'2|3.1','op'=>'9.25'),
    'label'    => '',
    'language' => 'css',
    'code'     => "*|html[xmlns*=\"\"] .selector {}",
    'test'     => "*|html[xmlns*=\"\"] .selector { background: lightgreen; }",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('sa'=>'5-'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isSafari = /a/.__proto__=='//';",
    'test'     => "/a/.__proto__=='//';",
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('sa'=>'*'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => 'var isSafari = /Constructor/.test(window.HTMLElement);',
    'test'     => '/Constructor/.test(window.HTMLElement);',
    'process'  => true,
    'validator'=> false
  ),
  array(
    'type'     => 'javascript',
    'browsers' => array('sa'=>'6'),
    'label'    => '',
    'language' => 'javascript',
    'code'     => "var isSafari = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== \"undefined\";",
    'test'     => "!!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== \"undefined\";",
    'process'  => true,
    'validator'=> false
  )
);

// Adding a unique ID to each hack
for($i = 0; $i < count($hacks); $i++) {
    $hacks[$i]['id'] = $i;
}
