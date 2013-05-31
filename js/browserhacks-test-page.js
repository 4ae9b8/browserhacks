var testClass = 'js-succeed';
var test_js_ch_6 = !!window.chrome;
if (test_js_ch_6) $('.test_js_ch_6').addClass(testClass);
var test_js_fx_16 = !!navigator.userAgent.match(/firefox/i);
if (test_js_fx_16) $('.test_js_fx_16').addClass(testClass);
var test_js_fx_18 = !!window.sidebar;
if (test_js_fx_18) $('.test_js_fx_18').addClass(testClass);
var test_js_fx_20 = (function x(){})[-6]=='x';
if (test_js_fx_20) $('.test_js_fx_20').addClass(testClass);
var test_js_fx_22 = /a/[-1]=='a';
if (test_js_fx_22) $('.test_js_fx_22').addClass(testClass);
var test_js_fx_24 = !!window.globalStorage;
if (test_js_fx_24) $('.test_js_fx_24').addClass(testClass);
var test_js_fx_26 = (function x(){})[-5]=='x';
if (test_js_fx_26) $('.test_js_fx_26').addClass(testClass);
var test_js_ie_54 = /*@cc_on!@*/false;
if (test_js_ie_54) $('.test_js_ie_54').addClass(testClass);
var test_js_ie_56 = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
if (test_js_ie_56) $('.test_js_ie_56').addClass(testClass);
var test_js_ie_58 = navigator.appVersion.indexOf("MSIE 7.")!=-1;
if (test_js_ie_58) $('.test_js_ie_58').addClass(testClass);
var test_js_ie_60 = document.all && document.querySelector && !document.addEventListener;
if (test_js_ie_60) $('.test_js_ie_60').addClass(testClass);
var test_js_ie_62 = document.body.style.msTouchAction != undefined;
if (test_js_ie_62) $('.test_js_ie_62').addClass(testClass);
var test_js_ie_64 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (test_js_ie_64) $('.test_js_ie_64').addClass(testClass);
var test_js_ie_66 = window.navigator.msPointerEnabled;
if (test_js_ie_66) $('.test_js_ie_66').addClass(testClass);
var test_js_ie_68 = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;
if (test_js_ie_68) $('.test_js_ie_68').addClass(testClass);
var test_js_ie_70 = document.all && !document.querySelector;
if (test_js_ie_70) $('.test_js_ie_70').addClass(testClass);
var test_js_ie_72 = !+'\v1';
if (test_js_ie_72) $('.test_js_ie_72').addClass(testClass);
var test_js_ie_74 = '\v'=='v';
if (test_js_ie_74) $('.test_js_ie_74').addClass(testClass);
var test_js_op_87 = !!window.opera;
if (test_js_op_87) $('.test_js_op_87').addClass(testClass);
var test_js_op_89 = window.opera && window.opera.version() == X;
if (test_js_op_89) $('.test_js_op_89').addClass(testClass);
var test_js_op_91 = /^function \(/.test([].sort);
if (test_js_op_91) $('.test_js_op_91').addClass(testClass);
var test_js_ch_93 = !!window.chrome;
if (test_js_ch_93) $('.test_js_ch_93').addClass(testClass);
var test_js_sa_102 = /Constructor/.test(window.HTMLElement);
if (test_js_sa_102) $('.test_js_sa_102').addClass(testClass);
var test_js_sa_104 = /a/.__proto__=='//';
if (test_js_sa_104) $('.test_js_sa_104').addClass(testClass);
var test_js_sa_106 = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== "undefined";
if (test_js_sa_106) $('.test_js_sa_106').addClass(testClass);
