var md5 = require('./md5.js');
var assert = require('assert');

describe('MD5', function () {
  it('should return the expected MD5 hash for "message"', function () {
    assert.equal('78e731027d8fd50ed642340b7c9a63b3', md5('message'));
  });

  it('should not return the same hash for random numbers twice', function () {
    var msg1 = Math.floor((Math.random() * 100000) + 1) + (new Date).getTime();
    var msg2 = Math.floor((Math.random() * 100000) + 1) + (new Date).getTime();

    if (msg1 !== msg2)
      assert.notEqual(md5(msg1), md5(msg2));
    else
      assert.equal(md5(msg1), md5(msg1));
  });

  it('should support Node.js Buffers', function() {
    var buffer = new Buffer('message áßäöü', 'utf8');

    assert.equal(md5(buffer), md5('message áßäöü'));
  })
});
