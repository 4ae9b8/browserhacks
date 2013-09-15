# MD5

[![build status](https://secure.travis-ci.org/pvorb/node-md5.png)](http://travis-ci.org/pvorb/node-md5)

a JavaScript function for hashing messages with MD5.

**Warning:** This is the source repository for the npm package
[MD5](http://search.npmjs.org/#/MD5), not [md5](http://search.npmjs.org/#/md5).

## Installation

You can use this package on the server side as well as the client side.

### [Node.js](http://nodejs.org/):

```
npm install MD5
```

### [Ender](http://ender.no.de/):

```
ender build MD5
```

## Usage

```javascript
var md5 = require('MD5');

md5("message");
```

This will return the following string

```javascript
"78e731027d8fd50ed642340b7c9a63b3"
```

## Bugs and Issues

If you encounter any bugs or issues, feel free to open an issue at
[github](https://github.com/pvorb/node-md5/issues).

## Credits

This package is based on the work of Jeff Mott, who did a pure JS implementation
of the MD5 algorithm that was published by Ronald L. Rivest in 1991. I needed a
npm package of the algorithm, so I used Jeff’s implementation for this package.
The original implementation can be found in the
[CryptoJS](http://code.google.com/p/crypto-js/) project.

## License

~~~
Copyright © 2011-2012, Paul Vorbach.
Copyright © 2009, Jeff Mott.

All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this
  list of conditions and the following disclaimer in the documentation and/or
  other materials provided with the distribution.
* Neither the name Crypto-JS nor the names of its contributors may be used to
  endorse or promote products derived from this software without specific prior
  written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
~~~
