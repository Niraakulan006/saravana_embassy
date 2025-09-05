function SaveCustomerDetails(event, form_name, post_send_file, redirection_file) {
    event.preventDefault();
	if(jQuery('div.alert').length > 0) {
        jQuery('div.alert').remove();
    }
    jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-danger mb-3"> <button type="button" class="close" data-dismiss="alert">&times;</button> Processing </div>');
	if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
		jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', true);
	}
	jQuery('html, body').animate({
		scrollTop: (jQuery('form[name="'+form_name+'"]').offset().top)
	}, 500);

	jQuery.ajax({
		url: post_send_file,
		type: "post",
		async: true,
		data: jQuery('form[name="'+form_name+'"]').serialize(),
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function(data) {
			//console.log(data);
			if(typeof data == "undefined" || data == "" || data == null) {
				if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
					jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
				}
				if(jQuery('div.alert').length > 0) {
					jQuery('div.alert').remove();
				}
			}

			try {
				var x = JSON.parse(data);
			} catch (e) {
				return false;
			}
			//console.log(x);
			
			if(jQuery('span.infos').length > 0) {
				jQuery('span.infos').remove();
			}
			if(jQuery('.valid_error').length > 0) {
				jQuery('.valid_error').remove();
			}
			if(jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			
			if(x.number == '1') {
				jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> '+x.msg+' </div>');
				setTimeout(function(){
                    var post_url = ""; var update_password = "";
                    if(typeof x.otp_details !== "undefined" && x.otp_details !== null && x.otp_details !== "") {
                        window.location = 'otp_verify';
                    }
                    else if(typeof x.password_updater_id !== "undefined" && x.password_updater_id !== null && x.password_updater_id !== "") {                        
                        if(jQuery('input[name="update_password"]').length > 0) {
                            update_password = jQuery('input[name="update_password"]').val();
                            update_password = jQuery.trim(update_password);
                        }
                        post_url = update_password+"?password_updater_id="+x.password_updater_id;
                        window.location = post_url;
                    }
                    else if(typeof x.last_view_page !== "undefined" && x.last_view_page !== null && x.last_view_page !== "") {
                        window.location = x.last_view_page;
                    }
					else {
						window.location = redirection_file;
					}
				}, 1000);
			}
			
			if(x.number == '2') {
				jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> '+x.msg+' </div>');
				if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
					jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
				}
                setTimeout(function(){
                    if(typeof x.msg !== "undefined" && x.msg !== null && x.msg !== "") {
                        if(x.msg == "Please try again later") {
                            window.location = "login.php";
                        }
                    }
                }, 1000);
			}
			
			if(x.number == '3') {
				jQuery('form[name="'+form_name+'"]').append('<div class="valid_error"> <script type="text/javascript"> '+x.msg+' </script> </div>');
				if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
					jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
				}
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}