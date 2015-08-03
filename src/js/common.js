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