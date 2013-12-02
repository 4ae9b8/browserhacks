/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
    function addIcon(el, entity) {
        var html = el.innerHTML;
        el.innerHTML = '<span style="font-family: \'Browserhacks-Icons\'">' + entity + '</span> ' + html;
    }

    var icons = {
        'browserhacks-an' : '&#xe000;',
        'browserhacks-ch' : '&#xe001;',
        'browserhacks-sa' : '&#xe002;',
        'browserhacks-ie' : '&#xe003;',
        'browserhacks-op' : '&#xe004;',
        'browserhacks-om' : '&#xe004;',
        'browserhacks-windows8' : '&#xe005;',
        'browserhacks-windows' : '&#xe006;',
        'browserhacks-fx' : '&#xe007;',
        'browserhacks-magic' : '&#xe008;',
        'browserhacks-twitter' : '&#xe009;',
        'browserhacks-github' : '&#xe00c;',
        'browserhacks-arrow-up' : '&#xe00a;',
        'browserhacks-apple' : '&#xe00b;',
        'browserhacks-valid' : '&#xe00d;',
        'browserhacks-invalid' : '&#xe00e;',
        'browserhacks-css3' : '&#xe00f;',
        'browserhacks-file-css' : '&#xe010;',
        'browserhacks-file-xml' : '&#xe011;',
        'browserhacks-html5' : '&#xe012;'
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