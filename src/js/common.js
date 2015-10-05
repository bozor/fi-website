// jquery.tweet.js - See http://tweet.seaofclouds.com/ or https://github.com/seaofclouds/tweet for more info
// Copyright (c) 2008-2012 Todd Matthews & Steve Purcell
// Modified by Stan Scates for https://github.com/StanScates/Tweet.js-Mod
(function(factory){if(typeof define==='function'&&define.amd)define(['jquery'],factory);else factory(jQuery)}(function($){$.fn.tweet=function(o){var s=$.extend({modpath:"/twitter/",username:null,list_id:null,list:null,favorites:false,query:null,avatar_size:null,count:3,fetch:null,page:1,retweets:true,intro_text:null,outro_text:null,join_text:null,auto_join_text_default:"i said,",auto_join_text_ed:"i",auto_join_text_ing:"i am",auto_join_text_reply:"i replied to",auto_join_text_url:"i was looking at",loading_text:null,refresh_interval:null,twitter_url:"twitter.com",twitter_api_url:"api.twitter.com",twitter_search_url:"api.twitter.com",template:"{avatar}{time}{join}{text}",comparator:function(tweet1,tweet2){return tweet2["tweet_time"]-tweet1["tweet_time"]},filter:function(tweet){return true}},o);var url_regexp=/\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/gi;function t(template,info){if(typeof template==="string"){var result=template;for(var key in info){var val=info[key];result=result.replace(new RegExp('{'+key+'}','g'),val===null?'':val)}return result}else return template(info)}$.extend({tweet:{t:t}});function replacer(regex,replacement){return function(){var returning=[];this.each(function(){returning.push(this.replace(regex,replacement))});return $(returning)}}function escapeHTML(s){return s.replace(/</g,"&lt;").replace(/>/g,"^&gt;")}$.fn.extend({linkUser:replacer(/(^|[\W])@(\w+)/gi,"$1<span class=\"at\">@</span><a href=\"http://"+s.twitter_url+"/$2\">$2</a>"),linkHash:replacer(/(?:^| )[\#]+([\w\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff\u0600-\u06ff]+)/gi,' <a href="http://'+s.twitter_search_url+'/search?q=&tag=$1&lang=all'+((s.username&&s.username.length==1&&!s.list)?'&from='+s.username.join("%2BOR%2B"):'')+'" class="tweet_hashtag">#$1</a>'),makeHeart:replacer(/(&lt;)+[3]/gi,"<tt class='heart'>&#x2665;</tt>")});function linkURLs(text,entities){return text.replace(url_regexp,function(match){var url=(/^[a-z]+:/i).test(match)?match:"http://"+match;var text=match;for(var i=0;i<entities.length;++i){var entity=entities[i];if(entity.url==url&&entity.expanded_url){url=entity.expanded_url;text=entity.display_url;break}}return"<a href=\""+escapeHTML(url)+"\">"+escapeHTML(text)+"</a>"})}function parse_date(date_str){return Date.parse(date_str.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i,'$1,$2$4$3'))}function relative_time(date){var relative_to=(arguments.length>1)?arguments[1]:new Date();var delta=parseInt((relative_to.getTime()-date)/1000,10);var r='';if(delta<1){r='just now'}else if(delta<60){r=delta+' seconds ago'}else if(delta<120){r='about a minute ago'}else if(delta<(45*60)){r='about '+(parseInt(delta/60,10)).toString()+' minutes ago'}else if(delta<(2*60*60)){r='about an hour ago'}else if(delta<(24*60*60)){r='about '+(parseInt(delta/3600,10)).toString()+' hours ago'}else if(delta<(48*60*60)){r='about a day ago'}else{r='about '+(parseInt(delta/86400,10)).toString()+' days ago'}return r}function build_auto_join_text(text){if(text.match(/^(@([A-Za-z0-9-_]+)) .*/i)){return s.auto_join_text_reply}else if(text.match(url_regexp)){return s.auto_join_text_url}else if(text.match(/^((\w+ed)|just) .*/im)){return s.auto_join_text_ed}else if(text.match(/^(\w*ing) .*/i)){return s.auto_join_text_ing}else{return s.auto_join_text_default}}function build_api_request(){var modpath=s.modpath,count=(s.fetch===null)?s.count:s.fetch,defaults={include_entities:1};if(s.list){return{host:s.twitter_api_url,url:"/1.1/lists/statuses.json",parameters:$.extend({},defaults,{list_id:s.list_id,slug:s.list,owner_screen_name:s.username,page:s.page,count:count,include_rts:(s.retweets?1:0)})}}else if(s.favorites){return{host:s.twitter_api_url,url:"/1.1/favorites/list.json",parameters:$.extend({},defaults,{list_id:s.list_id,screen_name:s.username,page:s.page,count:count})}}else if(s.query===null&&s.username.length===1){return{host:s.twitter_api_url,url:"/1.1/statuses/user_timeline.json",parameters:$.extend({},defaults,{screen_name:s.username,page:s.page,count:count,include_rts:(s.retweets?1:0)})}}else{var query=(s.query||'from:'+s.username.join(' OR from:'));return{host:s.twitter_search_url,url:"/1.1/search/tweets.json",parameters:$.extend({},defaults,{q:query,rpp:count})}}}function extract_avatar_url(item,secure){if(secure){return('user'in item)?item.user.profile_image_url_https:extract_avatar_url(item,false).replace(/^http:\/\/[a-z0-9]{1,3}\.twimg\.com\//,"https://s3.amazonaws.com/twitter_production/")}else{return item.profile_image_url||item.user.profile_image_url}}function extract_template_data(item){var o={};o.item=item;o.source=item.source;o.name=item.from_user_name||item.user.name;o.screen_name=item.from_user||item.user.screen_name;o.avatar_size=s.avatar_size;o.avatar_url=extract_avatar_url(item,(document.location.protocol==='https:'));o.retweet=typeof(item.retweeted_status)!='undefined';o.tweet_time=parse_date(item.created_at);o.join_text=s.join_text=="auto"?build_auto_join_text(item.text):s.join_text;o.tweet_id=item.id_str;o.twitter_base="http://"+s.twitter_url+"/";o.user_url=o.twitter_base+o.screen_name;o.tweet_url=o.user_url+"/status/"+o.tweet_id;o.reply_url=o.twitter_base+"intent/tweet?in_reply_to="+o.tweet_id;o.retweet_url=o.twitter_base+"intent/retweet?tweet_id="+o.tweet_id;o.favorite_url=o.twitter_base+"intent/favorite?tweet_id="+o.tweet_id;o.retweeted_screen_name=o.retweet&&item.retweeted_status.user.screen_name;o.tweet_relative_time=relative_time(o.tweet_time);o.entities=item.entities?(item.entities.urls||[]).concat(item.entities.media||[]):[];o.tweet_raw_text=o.retweet?('RT @'+o.retweeted_screen_name+' '+item.retweeted_status.text):item.text;o.tweet_text=$([linkURLs(o.tweet_raw_text,o.entities)]).linkUser().linkHash()[0];o.tweet_text_fancy=$([o.tweet_text]).makeHeart()[0];o.user=t('<a class="tweet_user" href="{user_url}">{screen_name}</a>',o);o.join=s.join_text?t(' <span class="tweet_join">{join_text}</span> ',o):' ';o.avatar=o.avatar_size?t('<a class="tweet_avatar" href="{user_url}"><img src="{avatar_url}" height="{avatar_size}" width="{avatar_size}" alt="{screen_name}\'s avatar" title="{screen_name}\'s avatar" border="0"/></a>',o):'';o.time=t('<span class="tweet_time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>',o);o.text=t('<span class="tweet_text">{tweet_text_fancy}</span>',o);o.reply_action=t('<a class="tweet_action tweet_reply" href="{reply_url}">reply</a>',o);o.retweet_action=t('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>',o);o.favorite_action=t('<a class="tweet_action tweet_favorite" href="{favorite_url}">favorite</a>',o);return o}return this.each(function(i,widget){var list=$('<ul class="tweet_list">');var intro='<p class="tweet_intro">'+s.intro_text+'</p>';var outro='<p class="tweet_outro">'+s.outro_text+'</p>';var loading=$('<p class="loading">'+s.loading_text+'</p>');if(s.username&&typeof(s.username)=="string"){s.username=[s.username]}$(widget).unbind("tweet:load").bind("tweet:load",function(){if(s.loading_text)$(widget).empty().append(loading);$.ajax({dataType:"json",type:"post",async:false,url:s.modpath||"/twitter/",data:{request:build_api_request()},success:function(data,status){if(data.message){console.log(data.message)}var response=data.response;$(widget).empty().append(list);if(s.intro_text)list.before(intro);list.empty();if(response.statuses!==undefined){resp=response.statuses}else if(response.results!==undefined){resp=response.results}else{resp=response}var tweets=$.map(resp,extract_template_data);tweets=$.grep(tweets,s.filter).sort(s.comparator).slice(0,s.count);list.append($.map(tweets,function(o){return"<li>"+t(s.template,o)+"</li>"}).join('')).children('li:first').addClass('tweet_first').end().children('li:odd').addClass('tweet_even').end().children('li:even').addClass('tweet_odd');if(s.outro_text)list.after(outro);$(widget).trigger("loaded").trigger((tweets?"empty":"full"));if(s.refresh_interval){window.setTimeout(function(){$(widget).trigger("tweet:load")},1000*s.refresh_interval)}}})}).trigger("tweet:load")})}}));

// App

var App = App || {};

App.Events = {
	topMenu: function(){
		$('.mobile-menu').click(function(e){
			$(this).toggleClass('active');
			$('.nav-top').toggleClass('active');
		});

		$('.has-sub-nav').click(function(e){
			e.preventDefault();

			if($(this).parent('li').hasClass('active')) {
				$('.nav-top > li').removeClass('active');
			} else {
				$('.nav-top > li').removeClass('active');
				$(this).parent('li').addClass('active');
			}
		});
	},
	enquire: {
		map: function(){
			enquire.register('screen and (max-width:480px)', function(){
				App.Map.defaultZoom = 0;
			});

			enquire.register('screen and (max-width:767px)', function(){
				App.Map.defaultZoom = 1;
			});

			enquire.register('screen and (max-width:1024px)', function(){
				App.Map.defaultZoom = 2;
			});
			
			enquire.register('screen and (max-width:800px) and (-webkit-min-device-pixel-ratio: 1.5)', function(){
				App.Map.defaultZoom = 1;
			});
			
			App.Map.view.setZoom(App.Map.defaultZoom);
		}
	}
}

App.Menu = {
	init: function(){
		App.Events.topMenu();
	}
}

App.Map = {
	isLoaded: false,
	view: null,
	center: null,
	locations: null,
	counter: 0,
	layer: "toner",
	defaultZoom: 2,
	init: function(){
		App.Map.setLocations();
        App.Map.setCenter();

		var mapOptions = {
			//draggable: false,
			zoom: App.Map.defaultZoom,
			center: App.Map.center,
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
		
        App.Map.view = new google.maps.Map(document.getElementById("map"), mapOptions);
		//Map.view.mapTypes.set(Map.layer, new google.maps.StamenMapType(Map.layer));
		
		App.Events.enquire.map();
		
		App.Map.showMarkers();
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
		
		var markerData = App.Map.locations[App.Map.counter];
		
		var marker = new google.maps.Marker({
			position: markerData.position,
			map: App.Map.view,
			draggable: false,
			icon: image,
			shadow: shadow,
			title: markerData.title,
			zIndex: markerData.zIndex,
			animation: google.maps.Animation.DROP,
			optimized: false
		});
	
		google.maps.event.addListener(marker, 'click', App.Map.onMarkerClick);
		
		App.Map.counter++;
	},
	setCenter: function(){
		App.Map.center = new google.maps.LatLng(42.0525, 0.14365);
	},
	setLocations: function(){
		App.Map.locations = 
		[
			{'title': 'US West', 'position': new google.maps.LatLng(44.050826, -123.092073), 'zIndex': 2}, 
			{'title': 'US East', 'position': new google.maps.LatLng(42.582317, -70.831395), 'zIndex': 3}, 
			{'title': 'UK', 'position': new google.maps.LatLng(50.856136, -1.328015), 'zIndex': 1}, 
			{'title': 'Hong Kong', 'position': new google.maps.LatLng(22.280519, 114.156924), 'zIndex': 4}, 
			{'title': 'China', 'position': new google.maps.LatLng(31.541060, 120.270474), 'zIndex': 5}
		]
	},
	showMarkers: function() {
		for (var i = 0; i < App.Map.locations.length; i++) {
			setTimeout(function() {
				App.Map.addMarker();
			}, (i+1) * 200);
		}
	},
	showLocation: function(coords, zoomLevel) {
		App.Map.view.setCenter(coords);
		App.Map.view.setZoom(zoomLevel);
	},
	onMarkerClick: function() {
		if(App.Map.view.getZoom() == 7){
			App.Map.showLocation(App.Map.center, App.Map.defaultZoom);
			//$('ul a').removeClass('active');
		} else {
			App.Map.showLocation(this.position, 7);
			//$('ul li:eq('+ (this.zIndex-1) +') a').addClass('active');
		}
	}
}

App.Ui = {
	contactForm: {
		init: function(){
			App.Events.contactForm.init();
		},
		showFormSection: function(){
			$('select[name=form-option').change(function(e){
				var val = $(this).val();

				$('.form-option').hide();
				$('.form-' + val).show();
				console.log(val);

			});
		},
		showCountryList: function(xml) {			
			$(xml).find('country').each(function(){
				$('.form-country').append('<option>'+$(this).text()+'</option>');
			});			
		}
	},
    twitter: function(){
		$('.twitter').tweet({
			modpath: 'twitter/',
			username: 'fianiumltd',
			count: 1,
			loading_text: 'loading twitter feed...',
            template: '{text}{time}'
		});
	}
}

App.Ajax = {
	getCountryList: function(){
		$.ajax({
			type: "GET",
			url: "countries.xml",
			dataType: "xml",
			success: function(xml){
				App.Ui.contactForm.showCountryList(xml);
			}
		});
	},
	formSubmit: function(){
		$('form').submit(function(e){
			e.preventDefault();

			$('.output').html('');

			$(this).ajaxSubmit({
				target: $('.output'),
				type: 'POST',
				url: 'mailer.php'
			});
		});
	}
}