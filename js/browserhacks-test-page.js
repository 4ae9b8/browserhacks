var testClass = 'js-succeed';
var test_js_ch_6 = !!window.chrome && !!window.chrome.webstore;
if (test_js_ch_6) $('.test_js_ch_6').addClass(testClass);
var test_js_ch_8 = !!window.chrome;
if (test_js_ch_8) $('.test_js_ch_8').addClass(testClass);
var test_js_fx_19 = !!navigator.userAgent.match(/firefox/i);
if (test_js_fx_19) $('.test_js_fx_19').addClass(testClass);
var test_js_fx_21 = !!window.sidebar;
if (test_js_fx_21) $('.test_js_fx_21').addClass(testClass);
var test_js_fx_23 = typeof InstallTrigger !== 'undefined';
if (test_js_fx_23) $('.test_js_fx_23').addClass(testClass);
var test_js_fx_25 = (function x(){})[-6]=='x';
if (test_js_fx_25) $('.test_js_fx_25').addClass(testClass);
var test_js_fx_27 = /a/[-1]=='a';
if (test_js_fx_27) $('.test_js_fx_27').addClass(testClass);
var test_js_fx_29 = !!window.globalStorage;
if (test_js_fx_29) $('.test_js_fx_29').addClass(testClass);
var test_js_fx_31 = (function x(){})[-5]=='x';
if (test_js_fx_31) $('.test_js_fx_31').addClass(testClass);
var test_js_ie_61 = (function() { if (new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null) { return parseFloat( RegExp.$1 ); } else { return false; } })();
if (test_js_ie_61) $('.test_js_ie_61').addClass(testClass);
var test_js_ie_63 = 'behavior' in document.documentElement.style && '-ms-user-select' in document.documentElement.style;
if (test_js_ie_63) $('.test_js_ie_63').addClass(testClass);
var test_js_ie_65 = document.all && window.atob;
if (test_js_ie_65) $('.test_js_ie_65').addClass(testClass);
var test_js_ie_67 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (test_js_ie_67) $('.test_js_ie_67').addClass(testClass);
var test_js_ie_69 = document.body.style.msTouchAction !== undefined;
if (test_js_ie_69) $('.test_js_ie_69').addClass(testClass);
var test_js_ie_71 = window.navigator.msPointerEnabled;
if (test_js_ie_71) $('.test_js_ie_71').addClass(testClass);
var test_js_ie_73 = /*@cc_on!@*/false;
if (test_js_ie_73) $('.test_js_ie_73').addClass(testClass);
var test_js_ie_75 = '-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style;
if (test_js_ie_75) $('.test_js_ie_75').addClass(testClass);
var test_js_ie_77 = /*@cc_on (function() {switch(@_jscript_version) {case 1.0: return 3; case 3.0: return 4; case 5.0: return 5; case 5.1: return 5; case 5.5: return 5.5; case 5.6: return 6; case 5.7: return 7; case 5.8: return 8; case 9: return 9; case 10: return 10;}})() || @*/ 0;
if (test_js_ie_77) $('.test_js_ie_77').addClass(testClass);
var test_js_ie_79 = document.all && !window.XMLHttpRequest;
if (test_js_ie_79) $('.test_js_ie_79').addClass(testClass);
var test_js_ie_81 = document.all && document.compatMode;
if (test_js_ie_81) $('.test_js_ie_81').addClass(testClass);
var test_js_ie_83 = document.all && window.XMLHttpRequest && !document.addEventListener;
if (test_js_ie_83) $('.test_js_ie_83').addClass(testClass);
var test_js_ie_85 = navigator.appVersion.indexOf("MSIE 7.") !== -1;
if (test_js_ie_85) $('.test_js_ie_85').addClass(testClass);
var test_js_ie_87 = document.all && !document.querySelector;
if (test_js_ie_87) $('.test_js_ie_87').addClass(testClass);
var test_js_ie_89 = document.all && window.XMLHttpRequest;
if (test_js_ie_89) $('.test_js_ie_89').addClass(testClass);
var test_js_ie_91 = document.all && document.querySelector && !document.addEventListener;
if (test_js_ie_91) $('.test_js_ie_91').addClass(testClass);
var test_js_ie_93 = !+'\v1';
if (test_js_ie_93) $('.test_js_ie_93').addClass(testClass);
var test_js_ie_95 = '\v'=='v';
if (test_js_ie_95) $('.test_js_ie_95').addClass(testClass);
var test_js_ie_97 = document.all && !document.addEventListener;
if (test_js_ie_97) $('.test_js_ie_97').addClass(testClass);
var test_js_ie_99 = document.all && document.querySelector;
if (test_js_ie_99) $('.test_js_ie_99').addClass(testClass);
var test_js_ie_101 = document.all && document.addEventListener && !window.atob;
if (test_js_ie_101) $('.test_js_ie_101').addClass(testClass);
var test_js_ie_103 = document.all && !window.atob;
if (test_js_ie_103) $('.test_js_ie_103').addClass(testClass);
var test_js_ie_105 = document.all && document.addEventListener;
if (test_js_ie_105) $('.test_js_ie_105').addClass(testClass);
var test_js_op_118 = !!window.opera;
if (test_js_op_118) $('.test_js_op_118').addClass(testClass);
var test_js_op_120 = window.opera && window.opera.version() == X;
if (test_js_op_120) $('.test_js_op_120').addClass(testClass);
var test_js_op_122 = /^function \(/.test([].sort);
if (test_js_op_122) $('.test_js_op_122').addClass(testClass);
var test_js_ch_124 = !!window.chrome;
if (test_js_ch_124) $('.test_js_ch_124').addClass(testClass);
var test_js_sa_134 = /Constructor/.test(window.HTMLElement);
if (test_js_sa_134) $('.test_js_sa_134').addClass(testClass);
var test_js_sa_136 = /a/.__proto__=='//';
if (test_js_sa_136) $('.test_js_sa_136').addClass(testClass);
var test_js_sa_138 = !!navigator.userAgent.match(/safari/i) && !navigator.userAgent.match(/chrome/i) && typeof document.body.style.webkitFilter !== "undefined";
if (test_js_sa_138) $('.test_js_sa_138').addClass(testClass);
var test_js_ch_143 = !!window.chrome;
if (test_js_ch_143) $('.test_js_ch_143').addClass(testClass);
