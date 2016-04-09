var JSHINT = require( 'jshint' ).JSHINT;

module.exports = function (hack) {
  if (hack.language !== 'javascript') {
    return hack
  }

  // Use hack.code because hack.test will be invalid.
  // That’s not ideal.
  hack.safe = JSHINT(hack.code);
  hack.jshint = JSHINT.errors.filter(function (error) {
    // Filter for real errors
    return error && error.id === '(error)';
  }).map(function (error) {
      // Build Message + Chararacter string
      return error.raw + ' (col ' + error.character + ')';
  }).toString();

  return hack
};
