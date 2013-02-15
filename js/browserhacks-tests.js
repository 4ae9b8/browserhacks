var testClass = 'js-succeed';

/* 
 * Chrome 
 */
var js_test_chrome_1 = Boolean(window.chrome);
if (js_test_chrome_1) $('.js-test-chrome-1').addClass(testClass);

/*
 * Firefox
 */
var js_test_ff_4 = !!navigator.userAgent.match(/firefox/i);
if (js_test_ff_4) $('.js-test-ff-4').addClass(testClass);

var js_test_ff_1 = Boolean(window.globalStorage);
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

// var js_test_ie_2; 
// try {js_test_ie_2 = "/*@cc_on @_jscript_version == 5.6 || (@_jscript_version == 5.7 && !window.XMLHttpRequest) @*/"} catch(e) {js_test_ie_2=false;}
// if (js_test_ie_2) $('.js-test-ie-2').addClass(testClass);

//var js_test_ie_3 = /*@cc_on!@*/false && document.documentMode === 10;
//if (js_test_ie_3) = $('.js-test-ie-3').addClass(testClass);

/*
 * Opera
 */
var js_test_op_1 = /^function \(/.test([].sort);
if (js_test_op_1) $('.js-test-op-1').addClass(testClass);

var js_test_op_2 = Boolean(window.opera);
if (js_test_op_2) $('.js-test-op-2').addClass(testClass);

/*
 * Safari
 */
var js_test_sa_1 = /a/.__proto__=='//';
if (js_test_sa_1) $('.js-test-sa-1').addClass(testClass);