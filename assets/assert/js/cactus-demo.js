;(function($){
	$(document).ready(function() {
		if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
			$('.cactus-content-scroll').css({'overflow-y':'auto'});
		}else{
			$('.cactus-content-scroll').mCustomScrollbar({
				theme:'light-2',
				autoHideScrollbar:true,
			});	
		};		
		$('.cactus-widget-demo').each(function(index, element) {
			var $this = $(this);
			$('.cactus-button-open', $this).on('click', function(){
				if($this.hasClass('active')) {
					$this.removeClass('active');					
				}else{
					$this.addClass('active');
					$this.trigger('mouseenter');
				};
			});
		});
	});	
}(jQuery));