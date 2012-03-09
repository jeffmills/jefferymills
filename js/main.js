jQuery(document).ready(function(){
	if(jQuery('#banner img').length > 0){
		var imgChange = function(){
			jQuery.ajax({
				url: 'http://jefferymills.com/wp-content/themes/jmills/includes/banner_img_grab.php',
				dataType: 'json',
				success: function(data){
					jQuery('#faces img').slice(2,jQuery('#faces img').length).remove();
					var img = '<img src="http://jefferymills.com/wp-content/themes/jmills/images/faces/' + data + '" />';
					jQuery('#faces').prepend(img);
					if(jQuery('#faces img').length > 2){
					jQuery('#faces img:last-child').fadeOut('slow',function(){
						jQuery(this).remove();
					});
					}
				}
			});
		}

		setInterval(imgChange, 5000);
	}
});