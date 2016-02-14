jQuery(document).ready( function($) {

	$(document).on('click','.ajax_token', function(e){

		e.preventDefault();
		var catSlug = $(this).attr('data-token');
		var data = {
				action: 'test_response',
	            post_var: catSlug
			};

		$.post(
			the_ajax_script.ajaxurl, 
			data, 
			function(response) {
				$('.posts-template').html(response);
	 	});

		return false;
	});

});