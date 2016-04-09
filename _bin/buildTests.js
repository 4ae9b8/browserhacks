#!/usr/bin/env node

var path = require('path')
var fs = require('fs')

var FILE = path.resolve(__dirname, '..', '_data/hacks.json')
var hacks = require(FILE)
var TEST_CLASS = 'js-succeed'
var TESTED_TYPES = ['css', 'javascript', 'markup']

function getCSSForTest (test, name) {
  return test
    .replace(/\.selector/g, '.run-test .' + name)
    + '\n'
}

function getJavaScriptForHTMLTest (test, name) {
  return `
    testWidget.settings.testNode.innerHTML = '${test}';
    if (testWidget.settings.testNode.getElementsByTagName('i').length > 0) {
      node = document.getElementById('${name}')
      if (node) {
        $(node).addClass(testWidget.settings.testClass);
      }
    }
  `
}

function getJavaScriptForJavaScriptTest (test, name) {
  return `
    var ${name} = ${test};
    if (${name}) {
      node = document.getElementById('${name}')
      if (node) {
        $(node).addClass(testWidget.settings.testClass);
      }
    }
  `
}

var cssDump = ''
var jsDump = `
(function () {
  var testWidget = {
    settings: {
      testClass: '${TEST_CLASS}',
      testNode: document.createElement('div')
    },
    init: function () {
      this.runTests();
    },
    runTests: function () {
      var node;`

hacks.forEach(function (hack) {
  if (TESTED_TYPES.indexOf(hack.language.toLowerCase()) === -1) {
    return false
  }

  hack.test.forEach(function (test, index) {
    var name = 'hack_' + hack.id + '_' + index

    if (hack.language === 'css') {
      cssDump += getCSSForTest(test, name)
    } else if (hack.language === 'javascript') {
      jsDump += getJavaScriptForJavaScriptTest(test, name)
    } else if (hack.language === 'markup') {
      jsDump += getJavaScriptForHTMLTest(test, name)
    }
  })
})

jsDump += `
    }
  };

  testWidget.init();
})`;

var CSS_OUTPUT_PATH = path.resolve(__dirname, '..', 'assets/css/tests.css')
var JS_OUTPUT_PATH = path.resolve(__dirname, '..', 'assets/js/tests.js')

fs.writeFileSync(CSS_OUTPUT_PATH, cssDump)
fs.writeFileSync(JS_OUTPUT_PATH, jsDump)
