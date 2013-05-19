var root_path = $("#default_stylesheet").attr("href");
root_path = root_path.substr(0, root_path.lastIndexOf("style.css"));
var img_html = "<img class='preloader' src='" + root_path + "images/loading.gif'>";

jQuery(document).ready(function($){
	$('form#contact-form').submit(function() {
		$('form#contact-form .contact-error').remove();
		var hasError = false;
		$('form#contact-form .requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
            	var labelText = $(this).prev('label').text();
            	$(this).parent().append('<span class="contact-error">Required</span>');
            	$(this).addClass('inputError');
            	hasError = true;
            } else if($(this).hasClass('email')) {
            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            	if(!emailReg.test(jQuery.trim($(this).val()))) {
            		var labelText = $(this).prev('label').text();
            		$(this).parent().append('<span class="contact-error">Invalid</span>');
            		$(this).addClass('inputError');
            		hasError = true;
            	}
            }
		});
		if(!hasError) {
			var formInput = $(this).serialize();
			$("li.submit-button").remove();
			//$("#contact-form").prepend(img_html);
			$("form#contact-form").append('<div class="contact-success"><strong>THANK YOU!</strong><p>Your email was successfully sent. We will contact you as soon as possible.</p></div>');
			
			$.post($(this).attr('action'),formInput);
		}


		return false;

	});
});


jQuery(document).ready(function($){
	$('form#comment-form').submit(function() {
		$('form#comment-form .contact-error').remove();
		var hasError = false;
		$('form#comment-form .requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
            	var labelText = $(this).prev('label').text();
            	$(this).parent().append('<span class="contact-error">Required</span>');
            	$(this).addClass('inputError');
            	hasError = true;
            } else if($(this).hasClass('email')) {
            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            	if(!emailReg.test(jQuery.trim($(this).val()))) {
            		var labelText = $(this).prev('label').text();
            		$(this).parent().append('<span class="contact-error">Invalid</span>');
            		$(this).addClass('inputError');
            		hasError = true;
            	}
            }
		});
		if(!hasError) {
			var formInput = $(this).serialize();
			$(".comment-form-wrapper").prepend(img_html);
			$.post($(this).attr('action'),formInput, function(data){
													  
				$(".preloader").remove();											  
				$("form#comment-form").before('<div class="contact-success"><strong>THANK YOU!</strong><p>Your comment was successfully sent.</p></div>');
				$(".cancel-comment-reply").slideUp();
				$("#comment-form").slideUp();
				$(".post-widget:last").slideUp();
			});
		}


		return false;

	});
});