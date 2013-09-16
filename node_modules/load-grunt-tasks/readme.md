# load-grunt-tasks [![Build Status](https://secure.travis-ci.org/sindresorhus/load-grunt-tasks.png?branch=master)](http://travis-ci.org/sindresorhus/load-grunt-tasks)

> Load multiple grunt tasks using globbing patterns

Usually you would have to load each task one by one, which is unnecessary cumbersome.

This module will read the `devDependencies` in your package.json and load the tasks that matches your patterns.


#### Before

```js
grunt.loadNpmTasks('grunt-shell');
grunt.loadNpmTasks('grunt-sass');
grunt.loadNpmTasks('grunt-recess');
grunt.loadNpmTasks('grunt-sizediff');
grunt.loadNpmTasks('grunt-svgmin');
grunt.loadNpmTasks('grunt-styl');
grunt.loadNpmTasks('grunt-php');
grunt.loadNpmTasks('grunt-eslint');
grunt.loadNpmTasks('grunt-concurrent');
grunt.loadNpmTasks('grunt-bower-requirejs');
```

#### After

```js
require('load-grunt-tasks')(grunt);
```


## Install

Install with [npm](https://npmjs.org/package/load-grunt-tasks): `npm install --save load-grunt-tasks`


## Example

```js
// Gruntfile.js
module.exports = function (grunt) {
	// load all grunt tasks matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	grunt.initConfig();
	grunt.registerTask('default', []);
}
```

By default `grunt-*` will be used as the [globbing pattern](https://github.com/isaacs/minimatch).

You can optionally specify a pattern or an array of patterns:

```js
require('load-grunt-tasks')(grunt, 'grunt-shell');
```

```js
require('load-grunt-tasks')(grunt, 'grunt-contrib-*');
```

```js
require('load-grunt-tasks')(grunt, ['grunt-contrib-*', 'grunt-shell']);
```

You also have the option to specify the package.json as an object if it's not in the same folder as your Gruntfile:

```js
require('load-grunt-tasks')(grunt, 'grunt-shell', require('../package'));
```


## License

MIT License • © [Sindre Sorhus](http://sindresorhus.com)
