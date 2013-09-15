'use strict';
var path = require('path');
var minimatch = require('minimatch');

module.exports = function (grunt, patterns, pkg) {
	var _ = grunt.util._;

	if (patterns === undefined) {
		patterns = 'grunt-*';
	}

	if (typeof patterns === 'string') {
		patterns = [patterns];
	}

	if (typeof pkg !== 'object') {
		pkg = require(path.resolve(process.cwd(), 'package.json'));
	}

	if (!pkg.devDependencies) {
		return;
	}

	var devDeps = Object.keys(pkg.devDependencies);

	var tasks = patterns.map(function (pattern) {
		return minimatch.match(devDeps, pattern, {});
	});

	_.unique(_.flatten(tasks)).forEach(grunt.loadNpmTasks);
};
