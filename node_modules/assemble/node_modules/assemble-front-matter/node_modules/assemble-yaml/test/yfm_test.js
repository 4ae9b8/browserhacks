/*global require:true */
var yfm = require('../lib'),
    expect = require('chai').expect;


describe('Reading From Files', function() {


  var simpleExpected = {
    context: {
      "foo": "bar"
    }
  };

  var complexExpected = {
    context: {
      "foo": "bar",
      "version": 2
    },
    originalContent: "---\nfoo: bar\nversion: 2\n---\n\n<span class=\"alert alert-info\">This is an alert</span>\n",
    content: "\n\n<span class=\"alert alert-info\">This is an alert</span>\n"
  };


  it("yaml file starts with --- no content", function(done) {
    var data = yfm.extract('./test/fixtures/pages/simple1.yml');
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("yaml file starts and ends with --- no content", function(done) {
    var data = yfm.extract('./test/fixtures/pages/simple2.yml');
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("yaml file starts and ends with --- has content", function(done) {
    var data = yfm.extract('./test/fixtures/pages/simple3.hbs');
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("hbs file with complex yaml data and content", function(done) {
    var data = yfm.extract("./test/fixtures/pages/complex.hbs");
    expect(data).to.deep.equal(complexExpected);
    done();
  });

});

describe('Reading From Strings', function() {

  var opts = { fromFile: false };

  var simple1 = "---\nfoo: bar\n";
  var simple2 = "---\nfoo: bar\n---";
  var simple3 = "---\nfoo: bar\n---\n\n<span class=\"alert alert-info\">This is an alert</span>\n";

  var simpleExpected = {
    context: {
      foo: 'bar'
    }
  };

  var complex = "---\nfoo: bar\nversion: 2\n---\n\n<span class=\"alert alert-info\">This is an alert</span>\n";

  var complexExpected = {
    context: {
      "foo": "bar",
      "version": 2
    },
    originalContent: "---\nfoo: bar\nversion: 2\n---\n\n<span class=\"alert alert-info\">This is an alert</span>\n",
    content: "\n\n<span class=\"alert alert-info\">This is an alert</span>\n"
  };

  it("yaml string starts with --- no content", function(done) {
    var data = yfm.extract(simple1, opts);
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("yaml string starts and ends with --- no content", function(done) {
    var data = yfm.extract(simple2, opts);
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("yaml string starts and ends with --- has content", function(done) {
    var data = yfm.extract(simple3, opts);
    expect(data.context).to.deep.equal(simpleExpected.context);
    done();
  });

  it("hbs string with complex yaml data and content", function(done) {
    var data = yfm.extract(complex, opts);
    expect(data).to.deep.equal(complexExpected);
    done();
  });

});
