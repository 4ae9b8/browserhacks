

var frontMatter = {
	extract: function(src, opts) {
		var options = opts || { lang: 'yaml' };

		var lang = options.lang || 'yaml';
		var extractor;
		try {
			extractor = require('assemble-' + lang);
		} catch (ex) {
			console.log('Extractor for ' + lang + ' not found.');
			console.log(ex);
			console.log('Trying running `npm i assemble-' + lang + ' --save`');
			console.log('Using default assemble-yaml');
			extractor = require('assemble-yaml');
		}

		return extractor.extract(src, options);
	}
};

module.exports = exports = frontMatter;