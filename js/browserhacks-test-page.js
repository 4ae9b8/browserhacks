var testClass = 'js-succeed';
/*  */
var test_js_ch_6 = !!window.chrome;
if (test_js_ch_6) $('.test_js_ch_6').addClass(testClass);
/*  */
var test_js_fx_16 = !!navigator.userAgent.match(/firefox/i);
if (test_js_fx_16) $('.test_js_fx_16').addClass(testClass);
/*  */
var test_js_fx_18 = !!window.sidebar;
if (test_js_fx_18) $('.test_js_fx_18').addClass(testClass);
/*  */
var test_js_fx_20 = (function x(){})[-6]=='x';
if (test_js_fx_20) $('.test_js_fx_20').addClass(testClass);
/*  */
var test_js_fx_22 = /a/[-1]=='a';
if (test_js_fx_22) $('.test_js_fx_22').addClass(testClass);
/*  */
var test_js_fx_24 = !!window.globalStorage;
if (test_js_fx_24) $('.test_js_fx_24').addClass(testClass);
/*  */
var test_js_fx_26 = (function x(){})[-5]=='x';
if (test_js_fx_26) $('.test_js_fx_26').addClass(testClass);
/*  */
var test_js_ie_53 = /*@cc_on!@*/false;
if (test_js_ie_53) $('.test_js_ie_53').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_55 = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
if (test_js_ie_55) $('.test_js_ie_55').addClass(testClass);
/*  */
var test_js_ie_57 = navigator.appVersion.indexOf("MSIE 7.")!=-1;
if (test_js_ie_57) $('.test_js_ie_57').addClass(testClass);
/*  */
var test_js_ie_59 = document.all && document.querySelector && !document.addEventListener;
if (test_js_ie_59) $('.test_js_ie_59').addClass(testClass);
/*  */
var test_js_ie_61 = document.body.style.msTouchAction != undefined;
if (test_js_ie_61) $('.test_js_ie_61').addClass(testClass);
/*  */
var test_js_ie_63 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (test_js_ie_63) $('.test_js_ie_63').addClass(testClass);
/*  */
var test_js_ie_65 = window.navigator.msPointerEnabled;
if (test_js_ie_65) $('.test_js_ie_65').addClass(testClass);
/* Check for Internet Explorer version */
var test_js_ie_67 = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;
if (test_js_ie_67) $('.test_js_ie_67').addClass(testClass);
/*  */
var test_js_ie_69 = document.all && !document.querySelector;
if (test_js_ie_69) $('.test_js_ie_69').addClass(testClass);
/*  */
var test_js_ie_71 = !+'\v1';
if (test_js_ie_71) $('.test_js_ie_71').addClass(testClass);
/*  */
var test_js_ie_73 = '\v'=='v';
if (test_js_ie_73) $('.test_js_ie_73').addClass(testClass);
/*  */
var test_js_op_86 = !!window.opera;
if (test_js_op_86) $('.test_js_op_86').addClass(testClass);
/* Opera X (12-) */
var test_js_op_88 = window.opera && window.opera.version() == X;
if (test_js_op_88) $('.test_js_op_88').addClass(testClass);
/*  */
var test_js_op_90 = /^function \(/.test([].sort);
if (test_js_op_90) $('.test_js_op_90').addClass(testClass);
/*  */
var test_js_ch_92 = !!window.chrome;
if (test_js_ch_92) $('.test_js_ch_92').addClass(testClass);
/*  */
var test_js_sa_101 = /Constructor/.test(window.HTMLElement);
if (test_js_sa_101) $('.test_js_sa_101').addClass(testClass);
/*  */
var test_js_sa_103 = /a/.__proto__=='//';
if (test_js_sa_103) $('.test_js_sa_103').addClass(testClass);
/*  */
var test_js_sa_105 = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== "undefined";
if (test_js_sa_105) $('.test_js_sa_105').addClass(testClass);
