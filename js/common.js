// Easing
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    easeInQuad: function (x, t, b, c, d) {
        return c * (t /= d) * t + b;
    },
    easeOutQuad: function (x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b;
    }
});

// https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/Array/indexOf?redirectlocale=en-US&redirectslug=Core_JavaScript_1.5_Reference%2FGlobal_Objects%2FArray%2FindexOf
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function (searchElement /*, fromIndex */) {
        "use strict";
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    }
}

// https://gist.github.com/500145
jQuery.fn.quickEach = (function(){
    
    var jq = jQuery([1]);
    return function(c) {
	
        var i = -1, el, len = this.length;
        
        try {
            while (
                 ++i < len &&
                 (el = jq[0] = this[i]) &&
                 c.call(jq, i, el) !== false
            );
            
        } catch(e){
            delete jq[0];
            throw e;
        }
        delete jq[0];
        return this;
    };
}());

var Globals = {
	navHideAnimate: false,
	lastWindowHeight: $(window).height(),
	lastWindowWidth: $(window).width()
};

var Ajax = {
	countryAutocomplete: function(){
		$.ajax({
			type: "GET",
			url: "countries.xml",
			dataType: "xml",
			success: function(xml){
				Ui.contactForm.autocomplete(xml);
			}
		});
	},
	contactFormOptions: {
		target: 'div#return',
		url: 'mailer.php',
		script: true,
		success: function(){
			$('#contact_form').slideUp(250,	function(){$('div#return').slideDown()});
			//pageTracker._trackPageview('/contactFormSubmitted');
		}
	}
}

var Events = {
	menu: function(){
		$('#nav > li > div').hide();
	
		if($('#mobile-menu').is(':visible')){
			$('#nav > li > div').show();
			
			Ui.menu.initIsotope();
		
			$('#mobile-menu').click(function(e){
				Ui.menu.toggle();
			});
		}
		
		FastClick.attach(document.body);
	},
	setCookie: function(){
		$('body').on('click', '#cookie-set a', function(e){
			e.preventDefault();
			Cookies.set($(this).attr('id'));
			Cookies.showContent();
			Ui.closeCookieSet();
		});
	},
	closeCookieOverlay: function() {
		$('body').on('click', '.close-cookie-overlay', function(e){
			e.preventDefault();
			Ui.closeCookieSet();
		});
	},
	contactForm: {
		init: function(){
			$('#contact_form select').change(function() {
				val = $(this).val();
				if(val != 'z') {
					$('li.option div:not(div#autocomplete-container)').hide();
					$('li.option').find(':input').each(function() {
						switch(this.type) {
							case 'text':
							case 'textarea':
								$(this).val('');
								break;
						}
					});
					$('li.message').show();
					switch(val) {
						case 'a':
							$('li.option div.a').show();
							break;
						case 'b':
							$('li.option div.b').show();
							break;
						case 'c':
							$('li.option div.c').show();
							break;
					}
				}
			});
			
			$('#autocomplete').on('mouseenter', 'span', function(){
				$(this).css('background-color','#f2f2f2');
			});
			
			$('#autocomplete').on('mouseleave', 'span', function(){
				$(this).css('background-color','transparent');
			});
				
			$('#autocomplete').on('click', 'span', function(){
				$('#form-country').val($(this).text());
				$('#autocomplete').slideUp(100);
			});
		},
		validate: function(val){
			$('#contact_form').validate({
				rules: {
					control: {
						required: true,
						digits: true,
						range: [val, val]
					}
				},
				messages: {
					control: {
						required: ' ',
						digits: ' ',
						range: ' '
					}
				},
				highlight: function(element){
					if($(element).hasClass('math')){
						$('.temp').hide();
					}
				},
				unhighlight: function(element){
					if($(element).hasClass('math')){
						$('.temp').hide();
					}
				},
				success: 'valid',
				submitHandler: function(form) {
					$(form).ajaxSubmit(Ajax.contactFormOptions);
				}
			});
		}
	},
	openCookieOverlay: function(){
		$('.show-set-industry').click(function(e){
			e.preventDefault();
			Ui.showCookieSet();
		});
	}
}

var Ui = {
	menu: {
		initIsotope: function() {
			$('#nav').isotope({
				masonryHorizontal: {},
				itemSelector: '#nav > li'
			});
		},
		toggle: function() {
			$('#nav').toggleClass('visible');
			if(Globals.navHideAnimate) {
				$('#nav').toggleClass('hidden');
			} else {
				Globals.navHideAnimate = true;
			}
			$('#mobile-menu').toggleClass('close');
		}
	},
	twitter: function(){
		$('.twitter').tweet({
			modpath: 'twitter/',
			username: 'bbcsport',
			count: 1,
			loading_text: 'loading twitter feed...',
		});
	},
	contactForm: { 
		init: function(val){
			$('li.option div:not(div#autocomplete-container)').hide();
			$('li.message').hide();
			
			Events.contactForm.init();
			Events.contactForm.validate(val);
		},
		autocomplete: function(xml){
			var cArray = [];
			
			$(xml).find('country').each(function(){
				cArray.push($(this).text());
			});
			
			$("#form-country").keyup(function(){
				var tempInput = $(this).val();
				$('#autocomplete').hide();
				$('#autocomplete').html('');				
				if(tempInput != ''){
					$('#autocomplete').show();
					
					for(var i = 0; i < cArray.length; i++){
						var tempCountry = cArray[i];
						
						if(tempCountry.toLowerCase().indexOf(tempInput.toLowerCase()) == 0){
							$('#autocomplete').append('<span>'+cArray[i]+'</span>');
						}
					}
					
					var span = $('#autocomplete span');

					if($('#autocomplete span').index(span) == -1 ){
						$('#autocomplete').append('<p>No results found for <strong>'+tempInput+'</strong></p>');
					}
				}
			});
		}
	},
	showCookieSet: function(){
		var content = '\
		<a href="#" class="close-cookie-overlay">x</a>\
		<p id="cookie-set">set your cookie:&nbsp;&nbsp;<a href="#" id="cookie1">cookie 1</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="#" id="cookie2">cookie 2</a></p>'
		
		$('body').prepend('<div id="industry-select-container">'+content+'</div><div id="fade"></div>');
		
		Events.setCookie();
		Events.closeCookieOverlay();
	},
	closeCookieSet: function(){
		$('#fade').fadeOut(500);
		$('#industry-select-container').fadeOut(500, function(){
			$('#fade, #industry-select-container').remove();
		});
	}
}

var Map = {
	isLoaded: false,
	view: null,
	center: new google.maps.LatLng(42.0525, 0.14365),
	locations: [
		{'title': 'US West', 'position': new google.maps.LatLng(44.050826, -123.092073), 'zIndex': 2}, 
		{'title': 'US East', 'position': new google.maps.LatLng(42.582317, -70.831395), 'zIndex': 3}, 
		{'title': 'UK', 'position': new google.maps.LatLng(50.856136, -1.328015), 'zIndex': 1}, 
		{'title': 'Hong Kong', 'position': new google.maps.LatLng(22.280519, 114.156924), 'zIndex': 4}, 
		{'title': 'China', 'position': new google.maps.LatLng(31.541060, 120.270474), 'zIndex': 5}
	],
	counter: 0,
	layer: "toner",
	defaultZoom: 2,
	init: function(){
		var mapOptions = {
			//draggable: false,
			zoom: Map.defaultZoom,
			center: Map.center,
			mapTypeControl: false,
			//mapTypeId: Map.layer,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			streetViewControl: false,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL,
				position: google.maps.ControlPosition.TOP_RIGHT
			}
        };
		
        Map.view = new google.maps.Map(document.getElementById("map"), mapOptions);
		//Map.view.mapTypes.set(Map.layer, new google.maps.StamenMapType(Map.layer));

		Map.showMarkers();
	},
	addMarker: function() {
		var image = new google.maps.MarkerImage('images/marker.png',
			new google.maps.Size(12, 20),
			new google.maps.Point(0,0),
			new google.maps.Point(6, 20)
		);
		  
		var shadow = new google.maps.MarkerImage('images/marker-shadow.png',
			new google.maps.Size(22, 20),
			new google.maps.Point(0,0),
			new google.maps.Point(5, 20)
		);
		
		var shape = {
			coord: [1, 1, 1, 20, 18, 20, 18 , 1],
			type: 'poly'
		};
		
		var markerData = Map.locations[Map.counter];
		
		var marker = new google.maps.Marker({
			position: markerData.position,
			map: Map.view,
			draggable: false,
			icon: image,
			shadow: shadow,
			title: markerData.title,
			zIndex: markerData.zIndex,
			animation: google.maps.Animation.DROP,
			optimized: false
		});
	
		google.maps.event.addListener(marker, 'click', Map.onMarkerClick);
		
		Map.counter++;
	},
	showMarkers: function() {
		for (var i = 0; i < Map.locations.length; i++) {
			setTimeout(function() {
				Map.addMarker();
			}, (i+1) * 200);
		}
	},
	showLocation: function(coords, zoomLevel) {
		Map.view.setCenter(coords);
		Map.view.setZoom(zoomLevel);
	},
	onMarkerClick: function() {
		if(Map.view.getZoom() == 7){
			Map.showLocation(Map.center, Map.defaultZoom);
			//$('ul a').removeClass('active');
		} else {
			Map.showLocation(this.position, 7);
			//$('ul li:eq('+ (this.zIndex-1) +') a').addClass('active');
		}
	}
}

var Cookies = {
	set: function(value){
		var cookieVal = null;
		
		switch(value){
			case 'cookie1':
				cookieVal = '1';
				break;
			case 'cookie2':
				cookieVal = '2';
				break;
		}
		
		$.cookie('f_site_cookie_content', cookieVal, { expires: 365, path: '/' });
	},
	/*initialSet: function(){
		Ui.showCookieSet();
	},*/
	showContent: function(){
		$('body').removeAttr('class');
		switch($.cookie('f_site_cookie_content')){
			// one
			case '1':
				$('body').addClass('content1');
				//$('#cookie-value').text('cookie1');
				break;
			// two
			case '2':
				$('body').addClass('content2');
				//$('#cookie-value').text('cookie2');
				break;
			// initial
			default:
				//Cookies.initialSet();
				Ui.showCookieSet();
				$('#cookie-value').text('no cookie');
				break;
		}
	}
}

var resizeHandler = function () {
	if($(window).height() != Globals.lastWindowHeight || $(window).width() != Globals.lastWindowWidth){
		Globals.lastWindowHeight = $(window).height();
        Globals.lastWindowWidth = $(window).width();
		
		if(Map.isLoaded){
			// center the map on resize
			//Map.view.setCenter(Map.center);
		}
	}
}

$(function (){
	Cookies.showContent();
	Events.openCookieOverlay();
	
	if ('ontouchstart' in window) {
		Events.menu();
		Map.defaultZoom = 1;
	} else {
		Map.defaultZoom = 2;
	}
	
	$('#back-to-top').click(function(e){
		$.scrollTo(0, 250);
	});
	
    // Window resize handler
    $(window).on('resize', resizeHandler);
});