var testClass = 'js-succeed';
/* Chrome */
var test_js_ch_1 = !!window.chrome;
if (test_js_ch_1) $('.test_js_ch_1').addClass(testClass);
/* Firefox */
var test_js_fx_7 = !!navigator.userAgent.match(/firefox/i);
if (test_js_fx_7) $('.test_js_fx_7').addClass(testClass);
/* Firefox */
var test_js_fx_9 = !!window.sidebar;
if (test_js_fx_9) $('.test_js_fx_9').addClass(testClass);
/* Firefox 2-13 */
var test_js_fx_11 = !!window.globalStorage;
if (test_js_fx_11) $('.test_js_fx_11').addClass(testClass);
/* Firefox 2/3 */
var test_js_fx_13 = /a/[-1]=='a';
if (test_js_fx_13) $('.test_js_fx_13').addClass(testClass);
/* Firefox 3 */
var test_js_fx_15 = (function x(){})[-5]=='x';
if (test_js_fx_15) $('.test_js_fx_15').addClass(testClass);
/* Internet explorer 8- */
var test_js_ie_25 = !+'\v1';
if (test_js_ie_25) $('.test_js_ie_25').addClass(testClass);
/* Internet explorer 8- */
var test_js_ie_27 = '\v'=='v';
if (test_js_ie_27) $('.test_js_ie_27').addClass(testClass);
/* Internet explorer 8 */
var test_js_ie_29 = document.all && document.querySelector && !document.addEventListener;
if (test_js_ie_29) $('.test_js_ie_29').addClass(testClass);
/* Internet explorer 10 */
var test_js_ie_31 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (test_js_ie_31) $('.test_js_ie_31').addClass(testClass);
/* Internet explorer 10 */
var test_js_ie_33 = document.body.style.msTouchAction != undefined;
if (test_js_ie_33) $('.test_js_ie_33').addClass(testClass);
/* Internet explorer 7 */
var test_js_ie_35 = navigator.appVersion.indexOf("MSIE 7.")!=-1;
if (test_js_ie_35) $('.test_js_ie_35').addClass(testClass);
/* Internet explorer */
var test_js_ie_37 = /*@cc_on!@*/false;
if (test_js_ie_37) $('.test_js_ie_37').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_39 = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;
if (test_js_ie_39) $('.test_js_ie_39').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_41 = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
if (test_js_ie_41) $('.test_js_ie_41').addClass(testClass);
/* Internet explorer 7- */
var test_js_ie_43 = document.all && !document.querySelector;
if (test_js_ie_43) $('.test_js_ie_43').addClass(testClass);
/* Internet explorer 10 */
var test_js_ie_45 = window.navigator.msPointerEnabled;
if (test_js_ie_45) $('.test_js_ie_45').addClass(testClass);
/* Safari */
var test_js_sa_72 = /Constructor/.test(window.HTMLElement);
if (test_js_sa_72) $('.test_js_sa_72').addClass(testClass);
/* Safari 5- */
var test_js_sa_74 = /a/.__proto__=='//';
if (test_js_sa_74) $('.test_js_sa_74').addClass(testClass);
/* Opera 9.64- */
var test_js_op_83 = /^function \(/.test([].sort);
if (test_js_op_83) $('.test_js_op_83').addClass(testClass);
/* Opera X */
var test_js_op_85 = window.opera && window.opera.version() == X;
if (test_js_op_85) $('.test_js_op_85').addClass(testClass);
/* Opera 12- */
var test_js_op_87 = !!window.opera;
if (test_js_op_87) $('.test_js_op_87').addClass(testClass);
