/*!
 * CrossDeviceDesign Library v0.12
 * version for jQuery 1.7+
 * http://crossdevicedesign.com/
 *
 * by Maciej Kupisiewicz
 * https://github.com/kupisiewicz/
 *
 * Released under the MIT license
 * http://crossdevicedesign.com/license
 *
 * Date: 2014-05-20T20:00Z
 */

;var CDD;
(function(x){

	x.version = '0.12.1';

	// creating elements to use for feature detection
	var _soundEl = document.createElement('audio');
	var _videoEl = document.createElement( "video" );
	var _navigator = (navigator.userAgent ? navigator.userAgent.toLowerCase() : '');
	var _ua = _navigator.match(/(opera|ie|firefox|chrome|trident|crios|version)[\s\/:]([\w\d\.]+)?.*?(safari|(?:rv[\s\/:]|version[\s\/:])([\w\d\.]+)|$)/) || [null, 'unknown', 0];
	if (_ua[1] == 'trident') { _ua[1] = 'ie'; if (_ua[4]) _ua[2] = _ua[4]; } else if (_ua[1] == 'crios') {	_ua[1] = 'chrome'; }
	var _browser = (_ua[1] == 'version') ? _ua[3] : _ua[1];
	var _browserVersion = parseFloat((_ua[1] == 'opera' && _ua[4]) ? _ua[4] : _ua[2]);
	
	// page size and viewport size
	var _body = jQuery(document.body);
	var _wdw = jQuery(window);
	
	x.setFrame = function() {
		x.h = _wdw.height();
		x.w = _wdw.width();
		_body.removeClass(x.orientation); 
		x.orientation = (x.h > x.w ? 'portrait' : 'landscape');
		_body.addClass(x.orientation);
	}
	
	x.css = function(element) {
		for(var i = 0, j = properties.length; i < j; i++) {
			if(properties[i].group && properties[i].group.length > 0) {
				var now = x[properties[i].group];
			} else {
				var now = x;
			}
	
			if(now[properties[i].name]) element.addClass(properties[i].name);
			else element.addClass('no' + properties[i].name);
		}
	}
	
	_wdw.on('ready resize load', x.setFrame)
		.load(function() {
			_body.removeClass('loading');
			_body.addClass('loaded');
		}).unload(function() {
			_body.removeClass('portrait'); 
			_body.removeClass('landscape'); 
			_body.addClass('dead');
		}
	);
	
	var _getPlatform = function() {
		var _platform = (navigator.platform ? navigator.platform.toLowerCase() : '');
		_platform = _navigator.match(/ip(?:ad|od|hone)/) ? 'ios' : (_navigator.match(/(?:webos|android)/) || _platform.match(/mac|win|linux/) || ['other'])[0];
		if (_platform == 'win') _platform = 'windows';
		return _platform;
	}
		
	var _isFlashSupported = function() {
		var isFlash = false;
		try {
		  var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
		  if (fo) {
			isFlash = true;
		  }
		} catch (e) {
		  if (navigator.mimeTypes
				&& navigator.mimeTypes['application/x-shockwave-flash'] != undefined
				&& navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
			isFlash = true;
		  }
		}
		return isFlash;
	}
	
	var _isFontFaceSupported = function(){
		var isNoSupport = false ||
			(('MozOpacity' in document.body.style)&&(!document.body.children)) ||
			((window.opera)&&(!document.querySelector)) ||
			(((/source/.test(/a/.toString+''))||(window.chrome))&&(!window.openDatabase)) ||
			((/a/.__proto__=='//')&&(!document.querySelector));
		return !isNoSupport;
	}
	
	var _isMotionSupported = function() {
		var isMotion = false;
		if (window.DeviceOrientationEvent) {
			window.ondevicemotion = function(event) {
				if(event.accelerationIncludingGravity.x) {
					isMotion = true;
				}
			}
		} else if (window.DeviceMotionEvent) {
			window.devicemotion = function(event) {
				if(event.accelerationIncludingGravity.x) {
					isMotion = true;
				}
			}
		}
		return isMotion;
	}
	
	var _borderRadius = function() {
		jQuery.each(['BorderRadius','MozBorderRadius','WebkitBorderRadius','OBorderRadius','KhtmlBorderRadius'], function() {
			if(document.body.style[this] !== undefined) jQuery.support.borderRadius = true;
			return (!jQuery.support.borderRadius);
		});
	}

	
	// http://lea.verou.me/2009/03/check-whether-the-browser-supports-rgba-and-other-css3-values/
	// thanks Lea!
	function _supportsRGBA() {
		if(!('result' in arguments.callee)) {
			var scriptElement = document.getElementsByTagName('script')[0];
			var prevColor = scriptElement.style.color;
			var testColor = 'rgba(0, 0, 0, 0.5)';
			if(prevColor == testColor) {
				arguments.callee.result = true;
			} else {
				try {
					scriptElement.style.color = testColor;
				} catch(e) {}
				arguments.callee.result = scriptElement.style.color != prevColor;
				scriptElement.style.color = prevColor;
			}
		}
		return arguments.callee.result;
	}
	
	// from http://davidwalsh.name/vendor-prefix
	// thanks David!
	var _getVendorPrefix = function() {
		var styles = window.getComputedStyle(document.documentElement, ''),
		pre = (Array.prototype.slice.call(styles).join('').match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o']))[1],
		dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
		return { name: dom, lowercase: pre,vcss: '-' + pre + '-', js: pre[0].toUpperCase() + pre.substr(1) };
	}
	
	var properties = [
		{ 'name': 'lang', 'handler': navigator.language },
		{ 'name': 'cookie', 'handler': navigator.cookieEnabled },
		{ 'name': 'json', 'handler': (window.JSON && typeof window.JSON.parse === 'function') },
		{ 'name': 'xpath', 'handler': !!(document.evaluate) },
		{ 'name': 'online', 'handler': !!(navigator.onLine) },
		{ 'name': 'geo', 'handler': 'geolocation' in navigator },
		{ 'name': 'mouse', 'handler': 'MouseEvent' in window },
		{ 'name': 'touch', 'handler': 'ontouchstart' in window },
		{ 'name': 'touchmp', 'handler': navigator.maxTouchPoints },
		{ 'name': 'motion', 'handler': _isMotionSupported() },
		{ 'name': 'prefix', 'handler': _getVendorPrefix() },
		{ 'name': 'platform', 'handler': _getPlatform() },
		{ 'name': 'browser', 'handler': _browser },
		{ 'name': 'version', 'handler': _browserVersion },
		{ 'name': 'orienttation', 'handler': x.orientation },
		
		{ 'group': 'html5', 'name': 'query', 'handler': !!(document.querySelector) },
		{ 'group': 'html5', 'name': 'storage', 'handler': ('localStorage' in window && window['localStorage'] !== null) },
		{ 'group': 'html5', 'name': 'history', 'handler': ((window.history && window.history.pushState) ? true : false) },
		{ 'group': 'html5', 'name': 'draganddrop', 'handler': 'draggable' in document.createElement('span') },
		{ 'group': 'html5', 'name': 'fileapi', 'handler': typeof FileReader != 'undefined' },
		{ 'group': 'html5', 'name': 'websocet', 'handler': !!window.WebSocket },
		{ 'group': 'html5', 'name': 'offlineapi', 'handler': !!window.applicationCache },
		
		{ 'group': 'media', 'name': 'air', 'handler': !!(document.runtime) },
		{ 'group': 'media', 'name': 'svg', 'handler': !!(document.createElementNS && document.createElementNS('http://www.w3.org/2000/svg', 'svg').createSVGRect) },
		{ 'group': 'media', 'name': 'fontface', 'handler': _isFontFaceSupported() },
		{ 'group': 'media', 'name': 'flash', 'handler': _isFlashSupported() },
		{ 'group': 'media', 'name': 'canvas', 'handler': !!document.createElement('canvas').getContext },
		{ 'group': 'media', 'name': 'webgl', 'handler': !!window.WebGLRenderingContext },
		
		{ 'group': 'css', 'name': 'borderRadius', 'handler': _borderRadius() },
		{ 'group': 'css', 'name': 'gradients', 'handler': false },
		{ 'group': 'css', 'name': 'rgba', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'animations', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'columns', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'transforms', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'transitions', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'fontface', 'handler': _isFontFaceSupported() },
		
		{ 'group': 'sound', 'name': 'sound', 'handler': false },
		{ 'group': 'sound', 'name': 'mp3', 'handler': !!_soundEl.canPlayType && "" != _soundEl.canPlayType('audio/mpeg') },
		{ 'group': 'sound', 'name': 'ogg', 'handler': !!_soundEl.canPlayType && "" != _soundEl.canPlayType('audio/ogg; codecs="vorbis"') },
		{ 'group': 'sound', 'name': 'wav', 'handler': !!(_soundEl.canPlayType && _soundEl.canPlayType('audio/wav; codecs="1"').replace(/no/, '')) },
		{ 'group': 'sound', 'name': 'aac', 'handler': !!(_soundEl.canPlayType && _soundEl.canPlayType('audio/mp4; codecs="mp4a.40.2"').replace(/no/, '')) },
		
		{ 'group': 'video', 'name': 'video', 'handler': false },
		{ 'group': 'video', 'name': 'mpeg4', 'handler': !!_videoEl.canPlayType && "" !== _videoEl.canPlayType('video/mp4; codecs="mp4v.20.8"') },
		{ 'group': 'video', 'name': 'h264', 'handler': !!_videoEl.canPlayType && "" !== (_videoEl.canPlayType('video/mp4; codecs="avc1.42E01E"') || _videoEl.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"')) },
		{ 'group': 'video', 'name': 'vogg', 'handler': !!_videoEl.canPlayType && "" !== _videoEl.canPlayType('video/ogg; codecs="theora"') },
		{ 'group': 'video', 'name': 'webm', 'handler': !!_videoEl.canPlayType && "" !== _videoEl.canPlayType('video/webm; codecs="vp8, vorbis"') },
	];
	
	// creating proper variables and methods to handle  
	for(var i = 0, j = properties.length; i < j; i++) {
		if(properties[i].group && properties[i].group.length > 0) {
			if(!(x[properties[i].group])) x[properties[i].group] = {};
			var now = x[properties[i].group];
		} else {
			var now = x;
		}
		now[properties[i].name] = properties[i].handler;
	}
	
	// defining last parameters
	if(x.sound.mp3 || x.sound.ogg || x.sound.wav || x.sound.aac) x.sound.sound = true;
	if(x.video.mpeg4 || x.video.h264 || x.video.vogg || x.video.webm) x.video.video = true;
	
	// special behavior
	if(x.platform == 'ios') {
		function hideAddressBar() {
			if(!window.location.hash) {
				if(document.height < window.outerHeight) {
					document.body.style.height = (window.outerHeight + 50) + 'px';
				}
				setTimeout( function(){ window.scrollTo(0, 1); }, 50 );
			}
		}
		window.addEventListener("load", function(){ if(!window.pageYOffset){ hideAddressBar(); } } );
		window.addEventListener("orientationchange", hideAddressBar );
	}
	
	x.setFrame();	
	

}(this.CDD = this.x || {}));


/*
(function($) {

	function supportsTransitions() {
		var b = document.body || document.documentElement;
		var s = b.style;
		var p = 'transition';
		if(typeof s[p] == 'string') {return true; }

		// Tests for vendor specific prop
		v = ['Moz', 'webkit', 'Webkit', 'Khtml', 'O', 'ms'],
		p = p.charAt(0).toUpperCase() + p.substr(1);
		for(var i=0; i<v.length; i++) {
		  if(typeof s[v[i] + p] == 'string') { return true; }
		}
		return false;
	}
	var _csstransitions = supportsTransitions();
	var _cssPrefix = false;
	var _cssEvents = false;
	switch(_browser) {
	  case "safari":
		_cssPrefix = "webkit";
		_cssEvents = "webkitTransitionEnd";
		break;
	  case "chrome":
		_cssPrefix = "webkit";
		_cssEvents = "transitionend";
		break;
	  case "firefox":
		_cssPrefix = "moz";
		_cssEvents = "oTransitionEnd";
		break;
	  case "opera":
		_cssPrefix = "o";
		_cssEvents = "transitionend";
		break;
	  case "ie":
		_cssPrefix = "ms";
		_cssEvents = "MSTransitionEnd";
		break;
	}



}(jQuery));
*/