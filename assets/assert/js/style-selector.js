(function($){	
	$(document).ready(function(){		
		/* Color changer */
		$('#style-selector-colors .color').click(function(){
			$('#style-selector-colors .color').removeClass('active');
			$(this).addClass('active');
			var plugin_url = $(this).data('plugin-url');
			var color1 = $(this).data('color1');
			var color2 = $(this).data('color2');
			jQuery('.demo-css-file').append('<link rel="stylesheet" href="'+plugin_url+'/style-visual-switcher/custom.css.php?color1='+color1+'&color2='+color2+'" type="text/css" />');
			
		});
		
		/* Close button */
		$("#ct-style-close").click(function(){
			if($("#ct-style-switcher").hasClass("closed")){
				$("#ct-style-switcher").removeClass("closed");
			} else {
				$("#ct-style-switcher").addClass("closed");
			}
		});
	});
})(jQuery);