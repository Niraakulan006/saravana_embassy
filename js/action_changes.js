function SendModalContent(event, form_name, post_send_file, redirection_file) {
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

	var form_content = "";
    form_content = jQuery('form[name="'+form_name+'"]').serialize();

	jQuery.ajax({
		url: post_send_file,
		type: "post",
		async: true,
		data: form_content,
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function(data) {
			//console.log(data);
			if(typeof data == "undefined" || data == "" || data == null) {
                if(form_name != "checkout_form") {
                    if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
                        jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
                    }
                }
                else {
                    if(jQuery('.confirm_order_button').length > 0) {
                        jQuery('.confirm_order_button').attr('disabled', false);
                    }
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
                if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
                    jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
                }
                jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> '+x.msg+' </div>');
                setTimeout(function(){
                    if(typeof x.last_view_page != "undefined" && x.last_view_page != null && x.last_view_page != "") {
                        window.location = x.last_view_page;
                    }
                    else if(typeof x.redirection_page != "undefined" && x.redirection_page != null && x.redirection_page != "") {
                        window.location = x.redirection_page;
                    }
                    else {
                        window.location = redirection_file;
                    }
                }, 1000);
			}
			
			if(x.number == '2') {
				jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> '+x.msg+' </div>');
				if(form_name != "checkout_form") {
                    if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
                        jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
                    }
                    if(jQuery('#UpdateProductCartModal').find('.modal-header').find('button.close').length > 0) {
                        jQuery('#UpdateProductCartModal').find('.modal-header').find('button.close').trigger('click');
                    }
                }
                else {
                    if(jQuery('.confirm_order_button').length > 0) {
                        jQuery('.confirm_order_button').attr('disabled', false);
                    }
                }
			}
			
			if(x.number == '3') {
				jQuery('form[name="'+form_name+'"]').append('<div class="valid_error"> <script type="text/javascript"> '+x.msg+' </script> </div>');
				if(form_name != "checkout_form") {
                    if(jQuery('form[name="'+form_name+'"]').find('.submit_button').length > 0) {
                        jQuery('form[name="'+form_name+'"]').find('.submit_button').attr('disabled', false);
                    }
                    if(jQuery('#UpdateProductCartModal').find('.modal-header').find('button.close').length > 0) {
                        jQuery('#UpdateProductCartModal').find('.modal-header').find('button.close').trigger('click');
                    }
                }
                else {
                    if(jQuery('.confirm_order_button').length > 0) {
                        jQuery('.confirm_order_button').attr('disabled', false);
                    }
                }
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}
