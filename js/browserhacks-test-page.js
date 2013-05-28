var testClass = 'js-succeed';
/* Chrome, Opera 14+ */
var test_js_ch_5 = !!window.chrome;
if (test_js_ch_5) $('.test_js_ch_5').addClass(testClass);
/* Firefox */
var test_js_fx_15 = !!navigator.userAgent.match(/firefox/i);
if (test_js_fx_15) $('.test_js_fx_15').addClass(testClass);
/* Firefox */
var test_js_fx_17 = !!window.sidebar;
if (test_js_fx_17) $('.test_js_fx_17').addClass(testClass);
/* Firefox 2/3 */
var test_js_fx_19 = /a/[-1]=='a';
if (test_js_fx_19) $('.test_js_fx_19').addClass(testClass);
/* Firefox 2-13 */
var test_js_fx_21 = !!window.globalStorage;
if (test_js_fx_21) $('.test_js_fx_21').addClass(testClass);
/* Firefox 3 */
var test_js_fx_23 = (function x(){})[-5]=='x';
if (test_js_fx_23) $('.test_js_fx_23').addClass(testClass);
/* Internet Explorer */
var test_js_ie_50 = /*@cc_on!@*/false;
if (test_js_ie_50) $('.test_js_ie_50').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_52 = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
if (test_js_ie_52) $('.test_js_ie_52').addClass(testClass);
/* Internet Explorer 7 */
var test_js_ie_54 = navigator.appVersion.indexOf("MSIE 7.")!=-1;
if (test_js_ie_54) $('.test_js_ie_54').addClass(testClass);
/* Internet Explorer 8 */
var test_js_ie_56 = document.all && document.querySelector && !document.addEventListener;
if (test_js_ie_56) $('.test_js_ie_56').addClass(testClass);
/* Internet Explorer 10 */
var test_js_ie_58 = document.body.style.msTouchAction != undefined;
if (test_js_ie_58) $('.test_js_ie_58').addClass(testClass);
/* Internet Explorer 10 */
var test_js_ie_60 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (test_js_ie_60) $('.test_js_ie_60').addClass(testClass);
/* Internet Explorer 10 */
var test_js_ie_62 = window.navigator.msPointerEnabled;
if (test_js_ie_62) $('.test_js_ie_62').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_64 = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;
if (test_js_ie_64) $('.test_js_ie_64').addClass(testClass);
/* Internet Explorer 7- */
var test_js_ie_66 = document.all && !document.querySelector;
if (test_js_ie_66) $('.test_js_ie_66').addClass(testClass);
/* Internet Explorer 8- */
var test_js_ie_68 = !+'\v1';
if (test_js_ie_68) $('.test_js_ie_68').addClass(testClass);
/* Internet Explorer 8- */
var test_js_ie_70 = '\v'=='v';
if (test_js_ie_70) $('.test_js_ie_70').addClass(testClass);
/* Safari */
var test_js_sa_79 = /Constructor/.test(window.HTMLElement);
if (test_js_sa_79) $('.test_js_sa_79').addClass(testClass);
/* Safari 5- */
var test_js_sa_81 = /a/.__proto__=='//';
if (test_js_sa_81) $('.test_js_sa_81').addClass(testClass);
/* Safari 6 */
var test_js_sa_83 = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== "undefined";
if (test_js_sa_83) $('.test_js_sa_83').addClass(testClass);
/* Opera 12- */
var test_js_op_96 = !!window.opera;
if (test_js_op_96) $('.test_js_op_96').addClass(testClass);
/* Opera X (12-) */
var test_js_op_98 = window.opera && window.opera.version() == X;
if (test_js_op_98) $('.test_js_op_98').addClass(testClass);
/* Opera 9.64- */
var test_js_op_100 = /^function \(/.test([].sort);
if (test_js_op_100) $('.test_js_op_100').addClass(testClass);
/* Chrome, Opera 14+ */
var test_js_ch_102 = !!window.chrome;
if (test_js_ch_102) $('.test_js_ch_102').addClass(testClass);
