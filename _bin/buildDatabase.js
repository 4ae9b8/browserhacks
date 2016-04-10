#!/usr/bin/env node

var fs = require('fs')
var path = require('path')

var addId = require('./addId')
var addVersion = require('./addVersion')
var addLegacyFlag = require('./addLegacyFlag')
// var addCssValidity = require('./addCssValidity')
// var addJsValidity = require('./addJsValidity')

var FILE = path.resolve(__dirname, '..', '_data/hacks.json')
var hacks = require(FILE).map((hack) => {
  hack = addId(hack)
  hack = addVersion(hack)
  hack = addLegacyFlag(hack)
  // hack = addCssValidity(hack)
  // hack = addJsValidity(hack)

  return hack
})

fs.writeFileSync(FILE, JSON.stringify(hacks, null, 2))
