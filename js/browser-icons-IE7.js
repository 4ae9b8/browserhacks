/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'Browser-icons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'browser-sa' : '&#xe000;',
			'browser-ch' : '&#xe001;',
			'browser-op' : '&#xe002;',
			'browser-ie' : '&#xe003;',
			'browser-fx' : '&#xe004;',
			'browser-android' : '&#xe005;',
			'browser-windows8' : '&#xe006;',
			'browser-apple' : '&#xe007;'
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
		c = c.match(/browser-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};