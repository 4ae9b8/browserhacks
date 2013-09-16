/**
 * resolve-dep
 * https://github.com/jonschlinkert/resolve-dep
 *
 * Copyright (c) 2013 Jon Schlinkert, contributors.
 * Licensed under the MIT license.
 */

'use strict';

var path = require('path');
var matchdep = require('matchdep');
var _ = require('lodash');

// Export this module.
var resolve = module.exports = {};

// Resolve path to a specific file
resolve.path = function (filepath) {
  return path.relative(process.cwd(), require.resolve(filepath)).replace(/\\/g, '/');
};

// Resolve paths to dependencies
resolve.load = function (patterns, config) {
  return matchdep.filter(patterns, config).map(function (pattern) {
    return resolve.path(pattern);
  });
};

// Resolve paths to devDependencies
resolve.loadDev = function (patterns, config) {
  return matchdep.filterDev(patterns, config).map(function (pattern) {
    return resolve.path(pattern);
  });
};

// Resolve paths to both dependencies and devDependencies
resolve.loadAll = function (patterns, config) {
  return matchdep.filterAll(patterns, config).map(function (pattern) {
    return resolve.path(pattern);
  });
};