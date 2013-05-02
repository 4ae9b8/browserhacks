var testClass = 'js-succeed';

/* 
 * Chrome 
 */
var js_test_chrome_1 = !!window.chrome;
if (js_test_chrome_1) $('.js-test-chrome-1').addClass(testClass);

/*
 * Firefox
 */
var js_test_ff_4 = !!navigator.userAgent.match(/firefox/i);
if (js_test_ff_4) $('.js-test-ff-4').addClass(testClass);

var js_test_ff_1 = !!window.globalStorage;
if (js_test_ff_1) $('.js-test-ff-1').addClass(testClass);

var js_test_ff_3 = /a/[-1]=='a';
if (js_test_ff_3) $('.js-test-ff-3').addClass(testClass);

var js_test_ff_2 = (function x(){})[-5]=='x';
if (js_test_ff_2) $('.js-test-ff-2').addClass(testClass);

/*
 * Internet Explorer
 */
var js_test_ie_1 = '\v'=='v';
if (js_test_ie_1) $('.js-test-ie-1').addClass(testClass);

(checkIE = document.createElement("b")).innerHTML = "<!--[if IE 6]><i></i><![endif]-->";
var js_test_ie_2 = checkIE.getElementsByTagName("i").length == 1;
if (js_test_ie_2) $('.js-test-ie-2').addClass(testClass);

(checkIE = document.createElement("b")).innerHTML = "<!--[if IE 7]><i></i><![endif]-->";
var js_test_ie_3 = checkIE.getElementsByTagName("i").length == 1;
if (js_test_ie_3) $('.js-test-ie-3').addClass(testClass);

(checkIE = document.createElement("b")).innerHTML = "<!--[if IE 8]><i></i><![endif]-->";
var js_test_ie_4 = checkIE.getElementsByTagName("i").length == 1;
if (js_test_ie_4) $('.js-test-ie-4').addClass(testClass);

(checkIE = document.createElement("b")).innerHTML = "<!--[if IE 9]><i></i><![endif]-->";
var js_test_ie_5 = checkIE.getElementsByTagName("i").length == 1;
if (js_test_ie_5) $('.js-test-ie-5').addClass(testClass);

var js_test_ie_6 = eval("/*@cc_on!@*/false") && document.documentMode === 10;
if (js_test_ie_6) $('.js-test-ie-6').addClass(testClass);

var js_test_ie_7 = document.body.style.msTouchAction != undefined;
if (js_test_ie_7) $('.js-test-ie-7').addClass(testClass);

var js_test_ie_8 = navigator.appVersion.indexOf("MSIE 7.")!=-1;
if (js_test_ie_8) $('.js-test-ie-8').addClass(testClass);

var js_test_ie_9 = !+'\v1';
if (js_test_ie_9) $('.js-test-ie-9').addClass(testClass);

var js_test_ie_10 = /*@cc_on!@*/false;
if (js_test_ie_10) $('.js-test-ie-10').addClass(testClass);

/*
 * Opera
 */
var js_test_op_1 = /^function \(/.test([].sort);
if (js_test_op_1) $('.js-test-op-1').addClass(testClass);

var js_test_op_2 = !!window.opera;
if (js_test_op_2) $('.js-test-op-2').addClass(testClass);

/*
 * Safari
 */
var js_test_sa_1 = /a/.__proto__=='//';
if (js_test_sa_1) $('.js-test-sa-1').addClass(testClass);

var js_test_sa_2 = /Constructor/.test(window.HTMLElement);
if (js_test_sa_2) $('.js-test-sa-2').addClass(testClass);