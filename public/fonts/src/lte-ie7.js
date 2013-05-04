/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-image' : '&#xe000;',
			'icon-camera' : '&#xe001;',
			'icon-pencil' : '&#xe002;',
			'icon-home' : '&#xe004;',
			'icon-play' : '&#xe003;',
			'icon-connection' : '&#xe005;',
			'icon-file' : '&#xe006;',
			'icon-tags' : '&#xe007;',
			'icon-cart' : '&#xe008;',
			'icon-phone' : '&#xe009;',
			'icon-location' : '&#xe00a;',
			'icon-map' : '&#xe00b;',
			'icon-clock' : '&#xe00c;',
			'icon-download' : '&#xe00d;',
			'icon-upload' : '&#xe00e;',
			'icon-undo' : '&#xe00f;',
			'icon-redo' : '&#xe010;',
			'icon-bubble' : '&#xe011;',
			'icon-bubbles' : '&#xe012;',
			'icon-user' : '&#xe013;',
			'icon-users' : '&#xe014;',
			'icon-busy' : '&#xe015;',
			'icon-search' : '&#xe016;',
			'icon-zoom-in' : '&#xe017;',
			'icon-zoom-out' : '&#xe018;',
			'icon-expand' : '&#xe019;',
			'icon-contract' : '&#xe01a;',
			'icon-lock' : '&#xe01b;',
			'icon-cog' : '&#xe01c;',
			'icon-fire' : '&#xe01d;',
			'icon-switch' : '&#xe01e;',
			'icon-link' : '&#xe01f;',
			'icon-star' : '&#xe020;',
			'icon-close' : '&#xe021;',
			'icon-checkmark' : '&#xe022;',
			'icon-play-2' : '&#xe023;',
			'icon-pause' : '&#xe024;',
			'icon-stop' : '&#xe025;',
			'icon-backward' : '&#xe026;',
			'icon-forward' : '&#xe027;',
			'icon-first' : '&#xe028;',
			'icon-last' : '&#xe029;',
			'icon-previous' : '&#xe02a;',
			'icon-next' : '&#xe02b;',
			'icon-eject' : '&#xe02c;',
			'icon-volume-mute' : '&#xe02f;',
			'icon-volume-increase' : '&#xe030;',
			'icon-volume-decrease' : '&#xe031;',
			'icon-arrow-up-left' : '&#xe02d;',
			'icon-arrow-up' : '&#xe02e;',
			'icon-arrow-up-right' : '&#xe032;',
			'icon-arrow-right' : '&#xe033;',
			'icon-arrow-down-right' : '&#xe034;',
			'icon-arrow-down' : '&#xe035;',
			'icon-arrow-down-left' : '&#xe036;',
			'icon-arrow-left' : '&#xe037;',
			'icon-checkbox-unchecked' : '&#xe038;',
			'icon-checkbox-checked' : '&#xe039;',
			'icon-github' : '&#xe03a;',
			'icon-feed' : '&#xe03b;',
			'icon-twitter' : '&#xe03c;',
			'icon-thumbs-up' : '&#xe03d;',
			'icon-thumbs-up-2' : '&#xe03e;',
			'icon-heart' : '&#xe03f;',
			'icon-minus' : '&#xe040;',
			'icon-plus' : '&#xe041;'
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
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};