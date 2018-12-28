(function($){
	if($('#loftloader-wrapper').length){
		$(window).load(function(){ $('body').addClass('loaded'); });
	}
})(jQuery);