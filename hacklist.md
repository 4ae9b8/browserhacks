# List of hacks

## SELECTORS HACKS

	/* IE 6 and below */
	* html .selector  { }
	.suckyie6.selector { } /* .suckyie6 can be any unused class */
	
	/* IE 7 and below */
	.selector, { } 
	//.selector { }
	 
	/* IE 7 */
	*:first-child+html .selector { } 
	.selector, x:-IE7 { } 
	*+html .selector { } 

	/* Opera 9.27 and below, Safari 2 */
	html:first-child .selector { }
	 
	/* Safari 2/3 */
	html[xmlns*=""] body:last-child .selector { }
	html[xmlns*=""]:root .selector  { }

	/* Safari 2/3.1, Opera 9.25 */
	*|html[xmlns*=""] .selector { }

	/* Safari 3+, Chrome, Opera 9+, Firefox 3.5+ */
	body:nth-of-type(1) .selector { }
	body:first-of-type .selector { }

	/* Safari (version?) and Chrome */
	::made-up-pseudo-element, .selector { }

	/* Opera 9.5+ credits */
	noindex:-o-prefocus, .selector { }

	/* Firefox 2 */
	.selector, x:-moz-any-link { }

	/* Firefox 3 Windows */
	.selector, x:-moz-any-link; x:default { }

	/* Firefox 3.5+ */
	body:not(:-moz-handler-blocked) .selector { }

	/* Everything but IE 6  */
	html > body .selector { }

	/* Everything but IE 6/7 */
	html>/**/body .selector { }

	/* Everything but IE 6/7/8 */
	:root *> .selector { }
	body:last-child { }


## PROPERTY / VALUE HACKS

	/* IE 6 - any combination of these characters _ - £ ¬ ¦ 
	.selector { _color: blue; }
	.selector { -color: blue; }
	.selector { £color: blue; }
	.selector { ¬color: blue; }
	.selector { ¦color: blue; }
	 
	/* IE 6/7 - any combination of these characters ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > | */
	.selector { !color: blue; }
	.selector { $color: blue; }
	.selector { &color: blue; }
	.selector { *color: blue; }
	.selector { (color: blue; }
	.selector { )color: blue; }
	.selector { =color: blue; }
	.selector { %color: blue; }
	.selector { +color: blue; }
	.selector { @color: blue; }
	.selector { ,color: blue; }
	.selector { .color: blue; }
	.selector { /color: blue; }
	.selector { `color: blue; }
	.selector { [color: blue; }
	.selector { ]color: blue; }
	.selector { #color: blue; }
	.selector { ~color: blue; }
	.selector { ?color: blue; }
	.selector { :color: blue; }
	.selector { <color: blue; }
	.selector { >color: blue; }
	.selector { |color: blue; }

	/* IE 6/7 - acts as an !important */
	.selector { color: blue !ie; } /* string after ! can be anything */
	 
	/* IE 6/7/8 but also IE9 in some cases */
	.selector { color: blue\9; }
	 
	/* IE 7/8 */
	.selector { color/*\**/: blue\9; }

	/* IE 8 - possibly matches IE 7 as well; to be verified */
	.selector { color/*\**/: blue\9 }
	  
	/* IE 8/9 */
	.selector { color: blue\0/; } /* must go at the END of all rules */

	/* Everything but IE 6 */
	.selector { color/**/: blue; }


## MEDIA HACKS

	/* IE 6/7 only (via Keith Clarke) */
	@media screen\9 { }
	 
	/* IE 6/7/8 (via Keith Clarke) */
	@media \0screen\,screen\9 { } 
	 
	/* IE 8 (via Keith Clarke) */
	@media \0screen { }
	 
	/* IE 8/9 */
	@media screen\0 { }

	/* IE 9/10 */
	@media screen and (min-width:0\0) { }

	/* IE 10+ */
	@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) { }

	/* Safari 3+, Chrome, Opera 9 */
	@media screen and (-webkit-min-device-pixel-ratio:0) { }

	/* Firefox 3.5 to Firefox 7 */
	@media screen and (min-resolution: +72dpi) { }

	/* Everything but IE 6/7/8 - not a hack */ 
@media screen and (min-width: 400px) { }


## MISCELLANEOUS

	/* Everything but IE 6/7 */
	@import "stylesheet.css" all;

	/* Firefox 3/4 (+?) */
	@-moz-document url-prefix() { }



## JAVASCRIPT HACKS

	/* Firefox 2 */
	FF2=(function x(){})[-6]=='x'

	//Firefox 3 */ 
	FF3=(function x(){})[-5]=='x'

	/* Firefox 2/3 (by DoctorDan) */
	FF=/a/[-1]=='a'

	/* Safari */
	Saf=/a/.__proto__=='//'

	/* Chrome */
	Chr=/source/.test((/a/.toString+''))

	/* Opera */
	Op=/^function \(/.test([].sort)

	/* Opera X credits */
	window.opera && window.opera.version() == X

	/* IE */
	IE='\v'=='v'

	/* IE 6 using conditionals */
	try {IE6=@cc_on @_jscript_version <= 5.7&&@_jscript_build<10000} catch(e){IE6=false;}

	/* IE 10 */
	/*@cc_on!@*/false && document.documentMode === 10

/* Transition on pseudo elements (or something like that) */
userAgent.toLowerCase().indexOf('firefox') > -1 || userAgent.toLowerCase().indexOf('chrome') > -1