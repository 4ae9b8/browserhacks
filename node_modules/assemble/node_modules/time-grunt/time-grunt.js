'use strict';
var chalk = require('chalk');
var ms = require('ms');
var table = require('text-table');

module.exports = function (grunt) {
	var startTime = Date.now();
	var prevTime = Date.now();
	var prevTaskName = '';
	var tableData = [];

	grunt.util.hooker.hook(grunt.log, 'header', function () {
		var name = grunt.task.current.nameArgs;
		var diff = Date.now() - prevTime;

		// hide tasks taking less than 20ms
		if (prevTaskName && prevTaskName !== name && diff > 20) {
			tableData.push([prevTaskName, ms(diff)]);
			prevTime = Date.now();
		}

		prevTaskName = name;
	});

	process.on('exit', function () {
		grunt.util.hooker.unhook(grunt.log, 'header');

		if (prevTaskName) {
			tableData.push([prevTaskName, ms(Date.now() - prevTime)]);
		}

		tableData.push(['Total', ms(Date.now() - startTime)]);

		grunt.log.header('Elapsed time');
		grunt.log.writeln(table(tableData).replace(/Total .+/, chalk.bold('$&')));
	});
};
