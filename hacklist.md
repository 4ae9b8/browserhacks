# List of hacks

## CHROME 

### SELECTOR HACKS

	/* Chrome 24- and Safari 6- */
	::made-up-pseudo-element, .selector {}

### PROPERTY/VALUE HACKS

	/* Chrome 28-, Safari 6- */ 
	.selector { (;color: blue;); }
	.selector { [;color: blue;]; }

### MEDIA HACKS

	/* Chrome, Safari 3+ */
	@media screen and (-webkit-min-device-pixel-ratio:0) {}

### JAVASCRIPT HACKS

	/* Chrome */
	var isChrome = !!window.chrome;


## FIREFOX 

### SELECTOR HACKS

	/* Firefox 1.5 */
	body:empty .selector {}

	/* Firefox 2+ */
	.selector, x:-moz-any-link {}

	/* Firefox 3+ */
	.selector, x:-moz-any-link, x:default {}

	/* Firefox 3.5+ */
	body:not(:-moz-handler-blocked) .selector {}

### MEDIA HACKS

	/* Firefox 3.5+, IE 9/10, Opera */
	@media screen and (min-resolution: +72dpi) {}

	/* Firefox 3.6+ */
	@media screen and (-moz-images-in-menus:0) {}

	/* Firefox 4+ */
	@media screen and (min--moz-device-pixel-ratio:0) {}

### JAVASCRIPT HACKS

	/* Firefox */
	var isFF = !!window.sidebar;

	/* Firefox */
	var isFF = !!navigator.userAgent.match(/firefox/i);

	/* Firefox 2 - 13 */
	var isFF = !!window.globalStorage;

	/* Firefox 2/3 */
	var isFF = /a/[-1]=='a';

	/* Firefox 3 */
	var isFF = (function x(){})[-5]=='x';

### MISCELLANEOUS

	/* Firefox 3+ */
	@-moz-document url-prefix() {}


## INTERNET EXPLORER

### SELECTOR HACKS

	/* IE 6 and below */
	* html .selector  {} 
	.suckyie6.selector {} /* .suckyie6 can be any unused class */

	/* IE 7 and below */
	.selector, {}

	/* IE 7 */
	*:first-child+html .selector {} 
	.selector, x:-IE7 {} 
	*+html .selector {} 

	/* Everything but IE 6 */
	html > body .selector {}

	/* Everything but IE 6/7 */
	html > /**/ body .selector {}
	head ~ /* */ body .selector {}

	/* Everything but IE 6/7/8 */
	:root *> .selector {} 
	body:last-child .selector {} 
	body:nth-of-type(1) .selector {} 
	body:first-of-type .selector {}

### PROPERTY/VALUE HACKS

	/* IE 6 */
	.selector { _property: value; }
	.selector { -property: value; }
	.selector { £property: value; }
	.selector { ¬property: value; }
	.selector { ¦property: value; }

	/* IE 6/7 - any combination of these characters: ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : < > | */
	.selector { !property: value; }
	.selector { $property: value; }
	.selector { &property: value; }
	.selector { *property: value; }
	.selector { (property: value; }
	.selector { )property: value; }
	.selector { =property: value; }
	.selector { %property: value; }
	.selector { +property: value; }
	.selector { @property: value; }
	.selector { ,property: value; }
	.selector { .property: value; }
	.selector { /property: value; }
	.selector { `property: value; }
	.selector { [property: value; }
	.selector { ]property: value; }
	.selector { #property: value; }
	.selector { ~property: value; }
	.selector { ?property: value; }
	.selector { :property: value; }
	.selector { <property: value; }
	.selector { >property: value; }
	.selector { |property: value; }

	/* IE 6/7 - acts as an !important */
	.selector { color: blue !ie; } 
	/* string after ! can be anything */

	/* IE 8/9 */
	.selector { color: blue\0/; } 
	/* must go at the END of all rules */

	/* IE 9/10 */
	.selector:nth-of-type(1n) { color: blue\9; }

	/* IE 6/7/8/9/10 */
	.selector { color: blue\9; } 
	.selector { color/*\**/: blue\9; }

	/* Everything but IE 6 */
	.selector { color/**/: blue; }

### MEDIA HACKS

	/* IE 6/7 */
	@media screen\9 {}

	/* IE 6/7/8 */
	@media \0screen\,screen\9 {}

	/* IE 8 */
	@media \0screen {}

	/* IE 8/9/10, Opera */
	@media screen\0 {}

	/* IE 9/10, Firefox 3.5+, Opera */
	@media screen and (min-resolution: +72dpi) {}

	/* IE 9/10 */
	@media screen and (min-width:0\0) {}

	/* IE 10+ */
	@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {}

	/* Everything but IE 6/7/8 */
	@media screen and (min-width: 400px) {}

### JAVASCRIPT HACKS

	/* Check for IE version */
	var ieVersion = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;

	/* Check for IE version */
	var ieVersion = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return -1 } })();

	/* IE */
	var isIE = /*@cc_on!@*/false;

	/* IE 7- */
	var isIE = document.all && !document.querySelector;

	/* IE 8- */
	var isIE = !+'\v1';

	/* IE X (6, 7, 8, 9) */
	(checkIE = document.createElement("b")).innerHTML = "<!--[if IE X]><i></i><![endif]-->"; 
	var isIE = checkIE.getElementsByTagName("i").length == 1;

	/* IE 7 */
	var isIE = navigator.appVersion.indexOf("MSIE 7.")!=-1;

	/* IE 8 */
	var isIE = document.all && document.querySelector && !document.addEventListener;

	/* IE 10 */
	var isIE = eval("/*@cc_on!@*/false") && document.documentMode === 10;

	/* IE 10 */
	var isIE = document.body.style.msTouchAction != undefined;

	/* IE 10 */
	var isIE = window.navigator.msPointerEnabled;

### CONDITIONAL COMMENTS

	/* IE */
	<!--[if IE]> Internet Explorer <![endif]-->

	/* Not IE */
	<!--[if !IE]> Not Internet Explorer <![endif]-->

	/* IE X (6, 7, 8, 9) */
	<!--[if IE X]> Internet Explorer X <![endif]-->

	/* IE X- (6, 7, 8, 9) */
	<!--[if IE lte X]> Internet Explorer X or less <![endif]-->

	/* IE X+ (6, 7, 8, 9) */
	<!--[if IE gte X]> Internet Explorer X or greater <![endif]-->

	/* IE X or Y (6, 7, 8, 9) */
	<!--[if (IE X)|(IE Y)]> Internet Explorer X or Internet Explorer Y <![endif]-->

	/* IE X+ but Y- (6, 7, 8, 9) */
	<!--[if (gte IE X)&(lte IE Y)]> Internet Explorer between X and Y (included)<![endif]-->

	/* Conditional classes */
	<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
	<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
	<!--[if IE 8]>     <html class="ie ie8 lte9 lte8"> 		<![endif]-->
	<!--[if IE 9]>     <html class="ie ie9 lte9">			<![endif]-->
	<!--[if gt IE 9]>  <html> 								<![endif]--> 
	<!--[if !IE]><!--> <html>             					<!--<![endif]-->

## OPERA

### SELECTOR HACKS

	/* Opera 9.25, Safari 2/3.1 */
	*|html[xmlns*=""] .selector {}

	/* Opera 9.27 and below, Safari 2 */
	html:first-child .selector {}

	/* Opera 9.5+ */
	noindex:-o-prefocus, .selector {}

### MEDIA HACKS

	/* Opera 7 */
	@media all and (min-width: 0px){}

	/* Opera 12- */
	@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) {}

	/* Opera, Firefox 3.5+, IE 9/10 */
	@media screen and (min-resolution: +72dpi) {}

	/* Opera, IE 8/9/10 */
	@media screen {}

### JAVASCRIPT HACKS

	/* Opera 9.64- */
	var isOpera = /^function \(/.test([].sort);

	/* Opera 12- */
	var isOpera = !!window.opera;

	/* Opera X */
	var isOpera = window.opera && window.opera.version() == X

## SAFARI

### SELECTOR HACKS

	/* Safari 2/3 */
	html[xmlns*=""] body:last-child .selector {} 
	html[xmlns*=""]:root .selector  {}

	/* Safari 2/3.1, Opera 9.25 */
	*|html[xmlns*=""] .selector {}

	/* Safari 6-, Chrome 24- */
	::made-up-pseudo-element, .selector {}

### MEDIA HACKS

	/* Safari 3+, Chrome */
	@media screen and (-webkit-min-device-pixel-ratio:0) {}

### PROPERTY/VALUE HACKS

	/* Safari 6-, Chrome 28- */ 
	.selector { (;color: blue;); }
	.selector { [;color: blue;]; }

### JAVASCRIPT HACKS

	/* Safari 5- */
	var isSafari = /a/.__proto__=='//';

	/* Safari */
	var isSafari = /Constructor/.test(window.HTMLElement);