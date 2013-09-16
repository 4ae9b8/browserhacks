# resolve-dep [![NPM version](https://badge.fury.io/js/resolve-dep.png)](http://badge.fury.io/js/resolve-dep)

> Return an array of resolved filepaths for specified npm module dependencies. Minimatch patterns can be used.

Use in node projects (`var load = require('resolve-dep').load('*')`), or load directly into your project's Grunt config data using [templates](http://gruntjs.com/api/grunt.template) (`<%= _.load("foo") %>`).



## Getting started

Install the module with: `npm install resolve-dep --save`

```js
var load = require('resolve-dep').load(pattern, config);
console.log(load);
```


## Examples

```js
// Resolve filepaths to all dependencies from package.json
require('resolve-dep').load('*');

// Resolve filepaths to all devDependencies
require('resolve-dep').loadDev('*');

// Resolve filepaths to both dependencies and devDependencies
require('resolve-dep').loadAll('*'));

// Resolve the filepath to a specific module
require('resolve-dep').path('specific-module-to-resolve');
```

[More examples →](EXAMPLES.md)



### Lo-dash templates

Mixin methods from resolve-dep, so they can be used in Lo-Dash templates:

```js
module.exports = function (grunt) {
  // start by adding this line of JavaScript to your Gruntfile
  grunt.util._.mixin(require('resolve-dep'));
  ...
};
```

Once the methods are mixed in, you may use them inside templates in your Grunt config:

```js
grunt.initConfig({
  less: {
    // load normalize.css from node_modules, along with local files
    src: ['<%= _.path("normalize.css") %>', 'src/theme.less'],
    dest: 'dist/'
  }
});
```

Any specified template strings (`<%= %>`) will be processed when config data is retrieved.


### Templates Warning!

When using templates as in the previous example, Grunt calls `toString` on the results, so you should only specify one file per template (otherwise, an array like `["a.js", "b.js", "c.js"]` will be converted to `a,b,c`). This is a bummer, but currently it's a limitation that we'll have to deal with, because there is no easy or obvious way to resolve it.

So, if want to use templates to include resolved paths to modules in the `src` file patterns of a task, like this for example:

* `node_modules/foo/lib/foo.js`, and
* `node_modules/bar/lib/bar.js`


#### Do this

```js
src: ['<%= _.path("foo") %>', '<%= _.path("bar") %>']
// => ["node_modules/foo/lib/foo.js", "node_modules/bar/lib/bar.js"]
```

#### Not this

```js
src: ['<%= _.loadAll("*") %>']
// => ["node_modules/foo/lib/foo.js,node_modules/bar/lib/bar.js"]
```

[More examples →](EXAMPLES.md)



## Usage

```js
// Resolve filepaths for dependencies
load(pattern, config)
// Resolve filepaths for devDependencies
loadDev(pattern, config)
// Resolve filepaths for all dependencies
loadAll(pattern, config)
// Resolve filepath for a specific module
filepath(pattern, config)
```


## Contributing
In lieu of a formal styleguide, take care to maintain the existing coding style. Add unit tests for any new or changed functionality.


## Related projects

+ [assemble/assemble](https://assemble.io)
+ [assemble/handlebars-helpers](http://gruntjs.com/assemble/handlebars-helpers)
+ [assemble/assemble-less](http://gruntjs.com/assemble/assemble-less)


## Author

**Jon Schlinkert**

+ [http://github.com/jonschlinkert](http://gruntjs.com/jonschlinkert)
+ [http://twitter.com/jonschlinkert](http://twitter.com/jonschlinkert)

Also, thank you to [@tkellen](http://github.com/tkellen) for the excellent [matchdep](http://github.com/tkellen/node-matchdep), which is used for filtering dependencies.


## Release History
* 2013-09-07    v0.1.0    First commit.


## License
Copyright (c) 2013 Jon Schlinkert, contributors.
Licensed under the MIT license.
