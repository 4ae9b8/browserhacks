/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Browserhacks-Icons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'browserhacks-android' : '&#xe000;',
			'browserhacks-windows8' : '&#xe001;',
			'browserhacks-apple' : '&#xe002;',
			'browserhacks-chrome' : '&#xe003;',
			'browserhacks-firefox' : '&#xe004;',
			'browserhacks-IE' : '&#xe005;',
			'browserhacks-opera' : '&#xe006;',
			'browserhacks-safari' : '&#xe007;',
			'browserhacks-github' : '&#xe008;',
			'browserhacks-wand' : '&#xe009;',
			'browserhacks-twitter' : '&#xe00a;',
			'browserhacks-arrow-up' : '&#xe00b;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/browserhacks-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};