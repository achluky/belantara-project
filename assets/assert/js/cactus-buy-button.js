;(function($){
	$(document).ready(function() {
		var $defaultMarginBottomBody = parseInt($('body').css('margin-bottom').replace('px',''));
		var $newMarginBottomWidgetActive = $defaultMarginBottomBody+$('.widget-fixed-buy-theme').height();	
		$('body').css({'margin-bottom':$newMarginBottomWidgetActive+'px'});	
		if($('.widget-fixed-buy-theme').length > 0) {
			function update(elem){
				if(elem.scrollTop()>=2 && !$('.widget-fixed-buy-theme').hasClass('active')) {
					$('.widget-fixed-buy-theme').addClass('active');
				}else if(elem.scrollTop()<2 && $('.widget-fixed-buy-theme').hasClass('active')){
					$('.widget-fixed-buy-theme').removeClass('active');
				};
			};
			$(window).scroll(function(){
				update($(this));
			});			
			update($(window));			
			$('.widget-fixed-buy-theme .widget-remove-buy').click(function(){
				$('.widget-fixed-buy-theme').hide();
				$('body').css({'margin-bottom':$defaultMarginBottomBody+'px'});	
			});
		};
	});
}(jQuery));