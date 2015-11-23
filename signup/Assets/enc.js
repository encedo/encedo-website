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
 * EncedoKey Application v0.47
 * version for jQuery 1.7+
 *
 * by Maciej Kupisiewicz
 * https://github.com/kupisiewicz/
 *
 * Released under the MIT license
 * Date: 2014-06-02T21:47Z
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
				if(this.value) o[this.name].push(this.value);
			} else {
				if(this.value) o[this.name] = this.value;
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
						error = 'is too short!';
					}
					
					if(validation['maxlength'] && len > parseInt(validation['maxlength'])) {
						error = 'is too long!';
					}
					
					if(validation['regexp'] && regexps[validation['regexp']] && !regexps[validation['regexp']].test(value)) {
						error = 'contains invalid character(s)!';
					} 
					
					if(validation['spacesafe'] && validation['spacesafe'] !== 'false') {
						o[validation['name']] =  value.replaceAll(" ", "|");
					}
				} else {	
					if(validation['nonempty'] && validation['nonempty'] !== 'false') {
						error = 'cannot be empty!';
					}
				}
				
				if(error) {
					notify(el.attr('title') + ' ' + error, 'warning');
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

	function _startTime(destination) {
		var today = new Date();
		destination.html( 
			+ today.getFullYear() 
			+ "/" 
			+ _format01 ( today.getMonth( ) ) 
			+ "/" 
			+ _format01 ( today.getDate( ) ) 
			+ ' ' 
			+ today.getHours() 
			+ ":" 
			+ _format01 ( today.getMinutes( ) ) 
			+ ":" 
			+ _format01 ( today.getSeconds( ) ) 
		);
		setTimeout(function(){ _startTime(destination) },1000);
	}

	function _format01(i) {
		return (i < 10 ? '0' + i : i);
	}
	
	function _applyDOM(prot) {
		return prot;
	}
	
	function ProgressBar(prot, settings) {
		var x = this;
		var pg = prot.addClass('progressbar clearfix');
		var pg_grid = $('<div/>').addClass('barGrid');
		var pg_wrap = $('<div/>').addClass('barWrapper').css({'width': settings.start + '%'});
		var bar = $('<span/>').addClass('bar');
		var description = $('<span/>').addClass('description').text(settings.description);
		pg_wrap.append(bar, description);
		pg.append(pg_grid, pg_wrap);
		
		x.set = function(y, desc) {
			pg_wrap.css({'width': Math.min(parseFloat(y),100) + '%'});
			if(desc) description.text(desc);
		}
		
		x.animate = function(y, desc, duration) {
			pg_wrap.velocity("stop").velocity({ 'width': Math.min(parseFloat(y),100) + '%' }, 10).velocity({ 'width': '100%' }, (duration ? (duration*1000) : 1000));
			if(desc) description.text(desc);
		}
		
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

	function EncedoApp(prot, settings) {
	
		// creating our new application
		var app = this;
		
		app.timenow = '02.06.2014 20:00:00';
		app.version = '';
		app.status = 'offline';
		app.location = settings.location;
		app.encedoInfo = false;
		app.args = false;
		
		if(app.location.indexOf('encedo.com') != -1) {
			app.location = '//encedokey.com';
		}
		
		var args = document.location.href.split('?');
		var actualURL = args[0].split('#');
		if(actualURL && actualURL.length > 1) var last = actualURL[1];
		app.url = actualURL[0];
		
		if(args && args.length > 1) {
			var tmp = args[1];
			app.args = {  };
			tmp = tmp.split('&');	
			for(var i = 0, j = tmp.length; i < j; i++) {
				var now = tmp[i].split('=');
				app.args[""+now[0]+""] = decodeURIComponent(now[1]);
			}
		}
		
		window.addEventListener('popstate', function(event) {
			if(event && event.state && event.state.page) app.page(event.state.page);
		});
		
		var middleware = false;
		var sll = false;
		var nowActivity = false;
		var waitFor = false;
		
		// local variables
		var prot = prot;
		var content = prot.find('div#APPcontent');
		var anchorsDOM = prot.find('.openActivity');
		var actionsDOM = prot.find('.makeAction');
		var openDOM = prot.find('.openIfChecked');
		var menuDOM = prot.find('div#APPmenu');
		menuDOM.on('click', 'a', function(ev){
			menuDOM.addClass('hide');
		});
		var menuClose = prot.find('a#APPmenuHide');
		prot.find('form').on("reset", function(event){
			$.each($(this).find(':input'), function() {
				$(this).parent().removeClass('correct').removeClass('error');
			});
		});
		prot.find('form.async').on("submit", function(event){
			event.preventDefault();
			$(this).find('.submit').trigger('click');
		});
		
		var ownerDOM = prot.find('div.owner');
		var timenowDOM = prot.find('div.datenow');
		var statusDOM = prot.find('div.status');
		var versionDOM = prot.find('div.version');
		
		var tools = prot.find('div#APPtools');
		var buttonRefresh = tools.find('a.refresh');
		var buttonSetup = tools.find('a.setup');
		var buttonMenu = tools.find('a.menu');
		
		// application action and handling
		var actions = [];
		
		// let's use simple register function
		app.register = function(name, func) {
			actions[name] = func;
		}
		
		// shortcut for invoking activities' actions
		app.action = function(name) {
			if(actions[name]) actions[name]();
		}
		
		// getting activities from structure
		var activities = [];
		var activitiesContainer = prot.find('div#APPactivities');	
		$.each(prot.find('div.activity'), function(it, el) {
			activities[$(el).attr('id')] = el;
		});
		
		app.setStatus = function(status) {
			app.status = status;
			statusDOM.html(status);
		}
		
		app.api = function(url, func, method, givenObj, timeoutA) {
		
			if(app.location == 'localhost') var t = 'localhost.encedo.com';
			else t = app.location;
		
			if(url.substr(0,4) !== 'http') {
				url = (sll ? 'https' : 'http') + '://'+t+':' + '/' + url;
			}
			
			$.ajax({
				type: (method ? method : 'GET'),
				url: url,
				dataType: 'jsonp',
				crossDomain: true,
				contentType: 'application/json; charset=utf-8',
				data: JSON.stringify(givenObj),
				
				success: function (res) {	
					func('success', res);
				}, 
				
				error: function(x, t, m) {
					if(t==="timeout") console.log("got timeout");
					func(false, x);
				},
				timeout: (timeoutA ? timeoutA : 1800)
			});
			
		}
		
		function setPoint(status, middle, issll, func) {
			app.setStatus(status);
			middleware = middle;
			sll = issll;
		}
		
		app.time = function() {
			app.api('api/time', function(status, res){
			
			});
		}
		
		// forcing disconnecting with device
		app.disconnect = function() {  }
		
		// page refreshing
		// it is just a re-invoking starting 
		// function connected with actual activity
		app.refresh = function() {
			if(actions[nowActivity + '__']) app.action(nowActivity + '__');
			app.page('refreshingEncedo');
			app.connectMiddleware(function(){
				app.action(nowActivity);
			});
		}
		
		// shortcut method for setup page opening
		app.setup = function() { 
			app.page(settings.setupPage);
		}
		
		app.menu = function() { 
			menuDOM.toggleClass('hide');
		}

		app.page = function(activity) {
		
			// if there is an activity and it is not the previous one
			// if page should be loaded from scratch it should be done by refresh metod
			if(activities[activity]) {
				
				var pageNow = $(activities[activity]);
				
				//$(document.body).addClass('loading');
				
				// running closing action
				if(actions[nowActivity + '__']) app.action(nowActivity + '__');
			
				// we have to check is this activity require connection to encedo
				// we keep data-encedo- to keep activity settings on html side
				var pageNowMeta = pageNow.data();
				if(pageNowMeta.encedoOnly && app.status != 'online with encedo') {
					waitFor = (activity != 'loadingEncedo' ? activity : 'start');
					app.page('loadingEncedo');
					return false;
				}
				
				// changing activity in special way
				// we remove opened class from the last activity
				var children = content.children().removeClass('opened');
				
				
				// nice and simple workaround for delaying class adding
				// we want to add class 'opened' after element is append and not in the same time
				setTimeout( function() { 
					activitiesContainer.append(children); 
				} , 140);
				
				setTimeout( function() { 
				
					// it is a great idea to store name of previous activity
					// we are going to use it in few places
					nowActivity = activity;
					content.append(pageNow);
					
					// creating history elements and changing page URL
					if ("pushState" in history) {
						var title = $(activities[activity]).attr('title');
						history.pushState( { 'page': activity } , (title ? title : null), app.url + '#' + activity);
					} 
					var adrD = document.location.href.split('#');
					document.location.href = app.url + '#' + activity;
					
					// opening default action connected to this activity
					// if there is one
					if(actions[activity]) app.action(activity);
				} , 150);
				
				setTimeout( function() { 
					pageNow.addClass('opened'); 
					//$(document.body).removeClass('loading');
				} , 250);
				
			} else {
				app.page('error_404');
			}
		}
		
		app.info = function(property) {
			if(!property) {
				if(!encedoInfo) return { 'error': 'EncedoKey not connected.', 'version': app.version, 'status': app.status };
			} else {	
				if(!encedoInfo) return app.encedoInfo[property];
			}
		}		
		
		// adding event handlers to elements		
		prot.on('click', '.openActivity', function(ev){
			ev.preventDefault();
			app.page($(this).attr('rel'));
		}).on('click', '.makeAction', function(ev){ // adding event handlers to elements	
			ev.preventDefault();
			app.action($(this).attr('rel'));
		}).on('click', '.selectOnClick', function(ev){
			var $this = $(this);
			$this.select();
			$this.mouseup(function() {
				$this.unbind('mouseup');
				return false;
			});
		}).on('change', '.openIfChecked', function(ev){
			var el = $(this);
			if(el.is(':checked')) {
				$('#' + el.attr('rel')).removeClass('index');
			} else {
				$('#' + el.attr('rel')).addClass('index');
			}
		}).on('change', '.openIfNotChecked', function(ev){
			var el = $(this);
			if(!el.is(':checked')) {
				$('#' + el.attr('rel')).removeClass('index');
			} else {
				$('#' + el.attr('rel')).addClass('index');
			}
		}).on('click', '.openIfClicked', function(ev){
			ev.preventDefault();
			$('#' + $(this).attr('rel')).toggleClass('index');
		});
		
		
		
		buttonRefresh.click( function(ev) {  ev.preventDefault( ); app.refresh( ) } );
		buttonSetup.click( function( ) { app.setup( ) } );
		buttonMenu.click( function( ) { app.menu( ) } );
		menuClose.click( function(ev) { ev.preventDefault( ); menuDOM.addClass('hide'); } );
		
		// creating UI running elements
		versionDOM.html(app.version);
		
		// opening default page at start
		setTimeout( function() { 
			app.page((last ? last : settings.start));
		}, 300);
		
		// starting clock ticking
		_startTime(timenowDOM);
		
		return app;
		
	}

    $.fn.encedoApp = function(settings) {
		var opts = $.extend({}, $.fn.encedoApp.defaults, settings);
		return new EncedoApp($(this), opts);
    };
	
	$.fn.encedoApp.defaults = {
		'start': 'start',
		'setupPage': 'setup',
		'location': 'encedokey.com'
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
		return new ProgressBar($(this), settings);
    };
	
	$.fn.progressBar.defaults = {
		'start': 0
	}


})( jQuery, window );