/*!
 * StyleWatcher Plugin v0.92
 * version for jQuery 1.7+
 * http://crossdevicedesign.com/
 *
 * by Maciej Kupisiewicz
 * https://github.com/kupisiewicz/
 *
 * Released under the MIT license
 * http://crossdevicedesign.com/license
 *
 * Date: 2014-05-22T21:17Z
 */

;(function( $ ){

	// stack for elements changing when size change
	var _cssStack = [];
	
	// page size and viewport size
	var _body = jQuery(document.body);
	var _wdw = jQuery(window);
	
	var _setFrame = function() {
	
		// we are going to use it as a cache
		var sizes = [];

		for(var i = 0, j = _cssStack.length; i < j; i++) {
			var now = _cssStack[i];
			var element = now.element;
			var where = element.attr('id');
			if(!sizes[where]) {
				sizes[where] = [element.height(), element.width()];
			} 
			if(sizes[where][0] >= now.heightmin && sizes[where][0] <= now.heightmax && sizes[where][1] >= now.widthmin && sizes[where][1] <= now.widthmax) {
				now.element.addClass(now.className);
			} else {
				now.element.removeClass(now.className);
			}
		}
		
	}
	_wdw.on('ready resize load', _setFrame);

    $.fn.styleWatcher = function(className, settings) {
        _cssStack.push({ 
			'element': this, 
			'className': className, 
			'widthmin': (settings.width && settings.width[0] ? settings.width[0] : 0), 
			'widthmax': (settings.width && settings.width[1] ? settings.width[1] : 9999), 
			'heightmin': (settings.height && settings.height[0] ? settings.height[0] : 0), 
			'heightmax': (settings.height && settings.height[1] ? settings.height[1] : 9999)
		});
    };


})( jQuery );