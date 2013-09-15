# time-grunt [![Build Status](https://secure.travis-ci.org/sindresorhus/time-grunt.png?branch=master)](http://travis-ci.org/sindresorhus/time-grunt)

> Displays the elapsed execution time of [grunt](http://gruntjs.com) tasks

![screenshot](screenshot.png)


## Install

Install with [npm](https://npmjs.org/package/time-grunt): `npm install --save time-grunt`


## Example

```js
// Gruntfile.js
module.exports = function (grunt) {
	// require it at the top and pass in the grunt instance
	require('time-grunt')(grunt);

	grunt.initConfig();
	grunt.registerTask('default', []);
}
```


## License

MIT License • © [Sindre Sorhus](http://sindresorhus.com)
