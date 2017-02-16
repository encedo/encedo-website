/*!
 * CrossDeviceDesign Library v0.82
 * version for jQuery 1.7+
 * http://crossdevicedesign.com/
 *
 * by Maciej Kupisiewicz
 * https://github.com/kupisiewicz/
 *
 * Released under the MIT license
 * http://crossdevicedesign.com/license
 *
 * Date: 2014-08-20T20:00Z
 */
 
 ;(function( $, window, undefined ){

	var bd = $(document.body);
	bd.on('click', '.ns-close', function(ev){
		var box = $(this).parents('.ns-box');
		box.removeClass('ns-show');
		setTimeout( function() {
			box.addClass('ns-hide');
			box.on('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(ev){
				box.remove();
			});
		}, 25 );
	});

	var notify = function(messagetext, icon) {
		var obj = $('<div class="ns-box ns-bar ns-effect-slidetop ns-type-success ns-show"><div class="ns-box-inner"><span class="icon icon-'+(icon ? icon : 'lightbulb')+'"></span> <p>'+messagetext+'</p></div><span class="ns-close"><i class="icon icon-cancel"></i></span></div>');
		bd.append(obj);
		setTimeout( function() {
			obj.find('.ns-close').click();
		}, 8525 );	
		
		setTimeout( function() {
			obj.remove();
		}, 10525 );	
	}
	
	
	
	window.notify = notify;
})(jQuery, window); 

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
	var hashTagActive = "";
    
	// page size and viewport size
	var _body = jQuery(document.body)
		,_wdw = jQuery(window)
		,keeped = jQuery('.keepScreenSize')
		,watched = jQuery('.watched')
		,watchedT = []
		,watchedCount = watched.length
		,flag = true
		,flag2 = true
		,prefixesSimple = ["","-o-","-moz-","-webkit-","-ms-"]
		,prefixesFull = ['Moz', 'webkit', 'Webkit', 'Khtml', 'O', 'ms']
		,prefixesSimple = ["","-o-","-moz-","-webkit-","-ms-"];
		
	$('*[data-type="background"]').each(function(){
	
		var $bgobj = $(this); // assigning the object
		var $default = parseFloat($bgobj.data('defaultPosition')) || 0;
		$bgobj.css({ backgroundPosition: '50% '+ $default + '%' });
		
		_wdw.scroll(function() {
			if($bgobj.data('dir') && $bgobj.data('dir') == 'top') {
				var yPos = -(_wdw.scrollTop() / $bgobj.data('speed'));
			} else {
				var yPos = (_wdw.scrollTop() / $bgobj.data('speed'));
			}
			$bgobj.css({ backgroundPosition: '50% '+ (yPos+$default) + '%' });
		});
		
	});
		
	for(var i = 0; i < watchedCount; i++) {
		var el = $(watched[i]);
		var rel = ((el.attr('rel') != 'undefined' && $('#'+el.attr('rel')).length > 0) ? $('#'+el.attr('rel')) : el);
		watchedT.push([el, rel]);
	}
	
	x.isOnScreen = function(element){
		var viewport = {};
		viewport.top = _wdw.scrollTop();
		viewport.bottom = viewport.top + _wdw.height();
		var bounds = {};
		bounds.top = element.offset().top;
		bounds.bottom = bounds.top + element.outerHeight();
		return ((bounds.top <= viewport.bottom) && (bounds.bottom >= viewport.top));
	};
	
	var onScreen = function() {
		for(var i = 0; i < watchedCount; i++) {
			if(x.isOnScreen(watchedT[i][0])) {
				watchedT[i][1].addClass('onscreen');
				watchedT[i][1].removeClass('outscreen');
			} else {
				watchedT[i][1].addClass('outscreen');
				watchedT[i][1].removeClass('onscreen');
			}
		}
	}
	
	x.setFrame = function() {
		x.h = _wdw.height();
		x.w = _wdw.width();
		_body.removeClass(x.orientation); 
		x.orientation = (x.h > x.w ? 'portrait' : 'landscape');
		_body.addClass(x.orientation);
		keeped.css('height', x.h + 'px');
		onScreen();
	}
	
	x.css = function(element) {
		if(properties) for(var i = 0, j = properties.length; i < j; i++) {
			if(properties[i].group && properties[i].group.length > 0) {
				var now = x[properties[i].group];
			} else {
				var now = x;
			}
	
			if(now[properties[i].name]) {
				if(typeof now[properties[i].name] === 'boolean') {
					element.addClass(properties[i].name);
				} else {
					element.addClass(properties[i].handler);
				}
			} else {
				element.addClass('no' + properties[i].name);
			}
		}
	}
	
	x.goSmooth = function(event) {
		console.log(event)
	}
	
	_wdw
		.on('ready resize load', x.setFrame)
		.load(function() {
			_body.removeClass('loading');
			_body.addClass('loaded');
		}).unload(function() {
			_body.removeClass('portrait'); 
			_body.removeClass('landscape'); 
			_body.addClass('dead');
		}).scroll(function() {
			if(flag) {
				flag = false;
				setTimeout(function(){
					flag = true;
					onScreen();
				}, 300);
			}
		}).on('mousewheel', function(e, delta){

		});
		
	_body.on('click', '.smooth', function (event) {
		event.preventDefault();
		var dest = 0;
		if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
			dest = $(document).height() - $(window).height();
		} else {
			dest = $(this.hash).offset().top;
		}
		//go to destination
		flag = false;
		flag2 = false;
		_body.velocity('stop').velocity("scroll", { offset: dest, axis: "y", duration: 1900, easing: "easeOutExpo" });
		setTimeout(function(){
			flag = true;
			flag2 = true;
			onScreen();
		}, 1400);
		
		window.location.hash = this.hash;
	});
	
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
	
	
	var testForCSSPropertyBrute = function(properties) {
		jQuery.each(properties, function() {
			if(document.body.style[this] !== undefined) return true;
			return false;
		});
	}
	
	var testForCSSProperty = function(property) {
		var b = document.body || document.documentElement, s = b.style;
		if (s[property] && typeof s[property] == 'string') { return true; }
		// Tests for vendor specific prop
		var v = prefixesFull;
		property = property.charAt(0).toUpperCase() + property.substr(1);

		for (var i=0; i<v.length; i++) {
			if (typeof s[v[i] + property] == 'string') { return true; }
		}

		return false;
	}
	
	var _borderRadius = function() {
		return testForCSSProperty('borderRadius');
	}
	
	var _supportsCSSBorderBox = function() {
		return testForCSSProperty('boxSizing');
	}
	
	var _supportsCSSTransitions = function() {
		return testForCSSProperty('transition');
	}
	
	var _supportsCSSBoxShadow = function() {
		return testForCSSProperty('boxShadow');
	}
	
	var _supportsCSSTransforms = function() {
		return testForCSSProperty('transform');
	}
	
	var _supportsCSSAnimations = function() {
		return testForCSSProperty('animation');
	}
	
	var _supportsCSSColumns = function() {
		return testForCSSProperty('columnCount');
	}
	
	var _supportsCSSGradients = function() {
		//return testForCSSProperty('linearGradient');
		var mElem = document.createElement('modern'), mStyle = mElem.style;

		jQuery.each(prefixesSimple, function(it, el){
			mStyle.backgroundImage = el+"linear-gradient(top, #9f9, white)"; 
		});
		mStyle.backgroundImage = "-webkit-gradient(linear, top, bottom, from(#9f9), to(white))";

		if (mStyle.backgroundImage.indexOf("gradient") == -1) return false;
		return true;
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
	
	switch(_browser) {
	  case "safari":
		x.cssPrefix = "webkit";
		x.cssAnim = "WebkitAnimation";
		x.cssEvents = "webkitTransitionEnd";
		x.cssEventsEnd = "webkitAnimationEnd";
		break;
	  case "chrome":
		x.cssPrefix = "webkit";
		x.cssAnim = "animation";
		x.cssEvents = "transitionend";
		x.cssEventsEnd = "animationend";
		break;
	  case "firefox":
		x.cssPrefix = "moz";
		x.cssAnim = "OAnimation";
		x.cssEvents = "oTransitionEnd";
		x.cssEventsEnd = "oAnimationEnd";
		break;
	  case "opera":
		x.cssPrefix = "o";
		x.cssAnim = "animation";
		x.cssEvents = "transitionend";
		x.cssEventsEnd = "animationend";
		break;
	  case "ie":
		x.cssPrefix = "ms";
		x.cssAnim = "msAnimation";
		x.cssEvents = "MSTransitionEnd";
		x.cssEventsEnd = "MSAnimationEnd";
		break;
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
		{ 'name': 'platform', 'handler': _getPlatform() },
		{ 'name': 'browser', 'handler': _browser },
		{ 'name': 'version', 'handler': _browserVersion },
		{ 'name': 'orienttation', 'handler': x.orientation },
		
		{ 'group': 'html5', 'name': 'query', 'handler': !!(document.querySelector) },
		{ 'group': 'html5', 'name': 'storage', 'handler': ('localStorage' in window && window['localStorage'] !== null) },
		{ 'group': 'html5', 'name': 'history', 'handler': ((window.history && window.history.pushState) ? true : false) },
		{ 'group': 'html5', 'name': 'draganddrop', 'handler': 'draggable' in document.createElement('span') },
		{ 'group': 'html5', 'name': 'fileapi', 'handler': typeof FileReader != 'undefined' },
		{ 'group': 'html5', 'name': 'websocket', 'handler': !!window.WebSocket },
		{ 'group': 'html5', 'name': 'offlineapi', 'handler': !!window.applicationCache },
		
		{ 'group': 'media', 'name': 'air', 'handler': !!(document.runtime) },
		{ 'group': 'media', 'name': 'svg', 'handler': !!(document.createElementNS && document.createElementNS('http://www.w3.org/2000/svg', 'svg').createSVGRect) },
		{ 'group': 'media', 'name': 'fontface', 'handler': _isFontFaceSupported() },
		{ 'group': 'media', 'name': 'flash', 'handler': _isFlashSupported() },
		{ 'group': 'media', 'name': 'canvas', 'handler': !!document.createElement('canvas').getContext },
		{ 'group': 'media', 'name': 'webgl', 'handler': !!window.WebGLRenderingContext },
		
		{ 'group': 'css', 'name': 'borderRadius', 'handler': _borderRadius() },
		{ 'group': 'css', 'name': 'gradients', 'handler': _supportsCSSGradients() },
		{ 'group': 'css', 'name': 'rgba', 'handler': _supportsRGBA() },
		{ 'group': 'css', 'name': 'cssanimations', 'handler': _supportsCSSAnimations() },
		{ 'group': 'css', 'name': 'csscolumns', 'handler': _supportsCSSColumns() },
		{ 'group': 'css', 'name': 'csstransforms', 'handler': _supportsCSSTransforms() },
		{ 'group': 'css', 'name': 'csstransitions', 'handler': _supportsCSSTransitions() },
		{ 'group': 'css', 'name': 'fontface', 'handler': _isFontFaceSupported() },
		{ 'group': 'css', 'name': 'borderbox', 'handler': _supportsCSSBorderBox() },
		{ 'group': 'css', 'name': 'boxshadow', 'handler': _supportsCSSBoxShadow() },
		
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

String.prototype.replaceAll = function( token, newToken, ignoreCase ) {
    var _token;
    var str = this + "";
    var i = -1;

    if ( typeof token === "string" ) {

        if ( ignoreCase ) {

            _token = token.toLowerCase();

            while( (
                i = str.toLowerCase().indexOf(
                    token, i >= 0 ? i + newToken.length : 0
                ) ) !== -1
            ) {
                str = str.substring( 0, i ) +
                    newToken +
                    str.substring( i + token.length );
            }

        } else {
            return this.split( token ).join( newToken );
        }

    }
	return str;
}; 

/*!
 * by Maciej Kupisiewicz
 * https://github.com/kupisiewicz/
 *
 * Released under the MIT license
 * Date: 2014-09-02T21:47Z
 */

;(function( $, window, undefined ){

	// thanks to Tobias Cohen
	// http://stackoverflow.com/questions/1184624/convert-form-data-to-js-object-with-jquery
	if(!$.fn.serializeObject) $.fn.serializeObject = function() {
		var o = {};
		var regexps = {
			'base32': /^[ABCDEFGHIJKLMNOPQRSTUVWXYZ234567]+={0,6}$/,
			'base64': /^[a-zA-Z0-9+/]+={0,3}$/,
			'simple': /^[-a-zA-Z0-9_+/]*$/,
			'password': /^[-a-zA-Z0-9_+/]*$/,
			'simpletext': /^[-a-zA-Z0-9_\s]*$/,
			'email': /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/
		}
		var a = this.serializeArray();		
		$.each(a, function() {
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || false);
			} else {
				o[this.name] = this.value || false;
			}
		});
		var error = false;
		$.each(this.find(':input'), function() {
			if(!error) {
				var el = $(this);
				var parent = el.parent();
				var validation = el.data();
				validation['name'] = el.attr('name');
				
				var value = o[validation['name']];
				if(value) {
				
					var len = value.length;
					if(validation['minlength'] && len < parseInt(validation['minlength'])) {
						error = 'jest zbyt krótka!';
					}
					
					if(validation['maxlength'] && len > parseInt(validation['maxlength'])) {
						error = 'jest zbyt długa!';
					}
					
					if(validation['regexp'] && regexps[validation['regexp']] && !regexps[validation['regexp']].test(value)) {
						error = 'zawiera nieprawidłowe znaki!';
					} 
					
					if(validation['spacesafe'] && validation['spacesafe'] !== 'false') {
						o[validation['name']] =  value.replaceAll(" ", "|");
					}
					
				} else {	
					if(validation['nonempty'] && validation['nonempty'] !== 'false') {
						error = 'nie może być pusta. Wypełnij te pole.';
					}
				}
				
				if(error) {
					notify('Zawartość pola "' + el.attr('title') + '" ' + error, 'warning');
					parent.addClass('error');
					parent.removeClass('correct');
					el.focus();
				} else {
					parent.removeClass('error');
					parent.addClass('correct');
				}
			}
		});
		if(error) {
			return false;
		} 
		return o;
	}; 
	
	function ProgressBar(prot, settings) {
	
		var x = this;
		var startAt = prot.text() || 0;
		prot.text('');
		
		var pg = prot.addClass('progressbar clearfix');
		var pg_grid = $('<div/>').addClass('barGrid');
		var pg_wrap = $('<div/>').addClass('barWrapper').css({'width': settings.start + '%'});
		var bar = $('<span/>').addClass('bar');
		var title = $('<p/>').addClass('barTitle').text((settings.title || prot.attr('title')));
		var description = $('<span/>').addClass('description').text(settings.description);
		pg_wrap.append(bar, description);
		pg.append(title, pg_grid, pg_wrap);
		
		x.set = function(y, desc) {
			pg_wrap.css({'width': Math.min(parseFloat(y),100) + '%'});
			if(desc) description.text(desc);
		}
		
		x.animate = function(y, desc, duration) {
			pg_wrap.velocity("stop").velocity({ 'width': Math.min(parseFloat(y),100) + '%' }, 10).velocity({ 'width': '100%' }, (duration ? (duration*1000) : 1000));
			if(desc) description.text(desc);
		}
		
		x.set(parseInt(startAt), startAt + '%');
		
		return x;
	}
	
	function Collection(prot, settings) {
	
		var x = this;
		var collection = prot;
		collection.find('.element').removeClass('index');
		var collection_prototype = collection.html();
		
		collection.on('click', '.remove', function(ev){
			ev.preventDefault();
			if(x.remove) x.remove($(this));
		});
		
		x.add = function(element) {
			$.each(element, function(it, el) {
				x.create(el);
			});
		}
		
		x.create = function(obj) {
			if(obj) collection.append(Mustache.render(collection_prototype, obj));
		}

		if(settings && settings.remove) x.remove = settings.remove;
		
		x.change = function() {}

		x.empty = function(func) {
			collection.empty();
			if(func) func();
		}	
		
		collection.empty();
		
		return x;
	}
	
	$.fn.collection = function(settings) {
		if(settings) settings = $.extend({}, $.fn.collection.defaults, settings);
		else var settings = $.fn.progressBar.defaults;
		return new Collection($(this), settings);
    };
	
	$.fn.collection.defaults = {
		'perPage': 10
	}
	
	$.fn.progressBar = function(settings) {
		if(settings) settings = $.extend({}, $.fn.progressBar.defaults, settings);
		else var settings = $.fn.progressBar.defaults;
		return this.each(function(){
			new ProgressBar($(this), settings);
		});
    };
	
	$.fn.progressBar.defaults = {
		'start': 0
	}
	
	$('.progressbar').progressBar();


})( jQuery, window );

;(function( $, window, undefined ){

	/*
	$('.specialUL').each(function(i, el){
		var containerA = $(this);
		var containerAH = containerA.height();
		var containerAW = containerA.width();
		var elemes = containerA.find('li');
		var cnt = elemes.length;
		
		if(cnt> 0) {
			var clockRadius = $(elemes[0]).width()+50;
			centeredAD = {'top': Math.round((containerAH-$(elemes[0]).height())/2), 'left': Math.round((containerAW-$(elemes[0]).width())/2)-50};
			//var rota = Math.random()*Math.random()*Math.random()*47832479832%360+1;
			var rota = 1;
			elemes.each(function(it, el){
				var el = $(el);
				var theta = rota + (it - 1) * (Math.PI * 2) / cnt;
				var x = clockRadius * 0.7 * Math.cos(theta)*1.5 + centeredAD.left*1.2;
				var y = clockRadius * 0.7 * Math.sin(theta) + centeredAD.top;
				el.css({'position': 'absolute', 'top': y, 'left': x});
			});
		}
		
	});
	*/
	
})( jQuery, window );

/*
<script type="text/javascript">
var containerA = false;
var centeredAD = false;
window.addEvent('domready',function() {

	// wrzucamy wszystkie elementy do �rodka
	containerA = $('APPwartosci');
	var containerAH = containerA.getHeight();
	var containerAW = containerA.getWidth();
	var elemes = $$('#APPwartosci .elem');
	var cnt = elemes.length;
	
	if(cnt> 0) {
		var size = elemes[0].getSize();
		var clockRadius = size.x+60;
		centeredAD = {'top': Math.round((containerAH-size.y)/2), 'left': Math.round((containerAW-size.x)/2)-50}
		elemes.each(function(el, it){
			el.set('morph', {duration: 1200, transition: 'quart:out'});
			el.morph({'position': 'absolute', 'top': centeredAD.top, 'left': centeredAD.left});
			
			el.addEvent('click', function(ev){
				if(ev) ev.stop();
				var rota = Math.random()*Math.random()*Math.random()*47832479832%360+1;
				elemes.each(function(el, it){
					el.set('morph', {duration: 1200, transition: 'quart:out'});
					var theta = rota + (it - 5) * (Math.PI * 2) / cnt;
					var x = clockRadius * 0.7 * Math.cos(theta) + centeredAD.left;
					var y = clockRadius * 0.7 * Math.sin(theta) + centeredAD.top;
					el.morph({'position': 'absolute', 'top': y, 'left': x});
				});
			});
			
			el.makeDraggable({
				onStart: function(el){
					//var pos = el.getCoordinates(containerA);
					//el.store('topA', pos.top-20);
					//el.store('leftA', pos.left-20);
				},
				onComplete: function(el){
					el.set('morph', {duration: 2200, transition: Fx.Transitions.Elastic.easeOut});
					//el.morph({'top': el.retrieve('topA'), 'left': el.retrieve('leftA')});
					
					(function(){
					
						var rota = Math.random()*Math.random()*Math.random()*47832479832%360+1;
						elemes.each(function(el, it){
							el.set('morph', {duration: 1200, transition: 'quart:out'});
							var theta = rota + (it - 5) * (Math.PI * 2) / cnt;
							var x = clockRadius * 0.7 * Math.cos(theta) + centeredAD.left;
							var y = clockRadius * 0.7 * Math.sin(theta) + centeredAD.top;
							el.morph({'position': 'absolute', 'top': y, 'left': x});
						});
						
					}).delay(50);
				}
			});
		});
	}

	containerA.store('visibilityWatcher', new VisibilityWatcher(containerA, {
		'enteredscreen': function(){ 
			var rota = Math.random()*Math.random()*Math.random()*47832479832%360+1;
			elemes.each(function(el, it){
				el.set('morph', {duration: 1200, transition: 'quart:out'});
				var theta = rota + (it - 5) * (Math.PI * 2) / cnt;
				var x = clockRadius * 0.7 * Math.cos(theta) + centeredAD.left;
				var y = clockRadius * 0.7 * Math.sin(theta) + centeredAD.top;
				el.morph({'position': 'absolute', 'top': y, 'left': x});
			});
			
		}, 'leftscreen': function(){ 
			elemes.each(function(el, it){
				el.morph({'position': 'absolute', 'top': centeredAD.top, 'left': centeredAD.left});
			});
		}
	}), { method: 'event', delta_px: 100 });

});
window.addEvent('resize',function() {

	containerA = $('APPwartosci');
	var containerAH = containerA.getHeight();
	var containerAW = containerA.getWidth();
	var elemes = $$('#APPwartosci .elem');
	var cnt = elemes.length;
	
	if(cnt> 0) {
		var size = elemes[0].getSize();
		var clockRadius = size.x+60;
		centeredAD = {'top': Math.round((containerAH-size.y)/2), 'left': Math.round((containerAW-size.x)/2)-50};
		var rota = Math.random()*Math.random()*Math.random()*47832479832%360+1;
		elemes.each(function(el, it){
			el.set('morph', {duration: 1200, transition: 'quart:out'});
			var theta = rota + (it - 5) * (Math.PI * 2) / cnt;
			var x = clockRadius * 0.7 * Math.cos(theta) + centeredAD.left;
			var y = clockRadius * 0.7 * Math.sin(theta) + centeredAD.top;
			el.morph({'position': 'absolute', 'top': y, 'left': x});
		});
	}
	
});
*/