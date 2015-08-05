var Events = {
	topMenu: function(){
		if($('.mobile-menu').is(':visible')) {
			$('.mobile-menu').click(function(e){
				$(this).toggleClass('active');
				$('.nav-top').toggleClass('active');
			});
		}

		$('.has-sub-nav').click(function(e){
			e.preventDefault();

			if($(this).parent('li').hasClass('active')) {
				$('.nav-top > li').removeClass('active');
			} else {
				$('.nav-top > li').removeClass('active');
				$(this).parent('li').addClass('active');
			}
		});
	}
}

var Menu = {
	init: function(){
		Events.topMenu();
	}
}

var Ui = {
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