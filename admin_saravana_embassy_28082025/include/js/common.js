// JavaScript Document
function CheckPassword(field_name) {
	var password = "";
	if (jQuery('input[name="password"]').length > 0) {
		password = jQuery('input[name="password"]').val();
		//password = jQuery.trim(password);
	}

	if (jQuery('#password_cover').length > 0) {
		if (jQuery('#password_cover').find('label').length > 0) {
			jQuery('#password_cover').find('label').addClass('text-danger');
		}
		if (jQuery('#password_cover').find('input[name="length_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="length_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="letter_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="letter_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="number_symbol_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="number_symbol_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="space_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="space_check"]').prop('checked', false);
		}

		var upper_regex = /[A-Z]/; var lower_regex = /[a-z]/;
		var number_regex = /\d/; var symbol_regex = /[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\]/; var no_space_regex = /^\S+$/;

		if (typeof password != "undefined" && password != null && password != "") {
			var password_length = password.length;
			if (parseInt(password_length) >= 8 && parseInt(password_length) <= 20) {
				if (jQuery('#password_cover').find('input[name="length_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="length_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if ((upper_regex.test(password) == true) && (lower_regex.test(password) == true)) {
				if (jQuery('#password_cover').find('input[name="letter_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="letter_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if ((number_regex.test(password) == true) && (symbol_regex.test(password) == true)) {
				if (jQuery('#password_cover').find('input[name="number_symbol_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="number_symbol_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if (no_space_regex.test(password) == true) {
				if (jQuery('#password_cover').find('input[name="space_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="space_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
		}
	}
}
function CustomCheckboxToggle(obj, toggle_id) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				var toggle_value = 2;
				if (jQuery('#' + toggle_id).length > 0) {
					if (jQuery('#' + toggle_id).prop('checked') == true) {
						toggle_value = 1;
					}
					jQuery('#' + toggle_id).val(toggle_value);
				}

				if (jQuery('.gst_row').length > 0) {
					if (jQuery('.tax_type_cover').length > 0) {
						if (parseInt(toggle_value) == 1) {
							jQuery('.tax_type_cover').removeClass('d-none');
						}
						else {
							jQuery('.tax_type_cover').addClass('d-none');
						}
					}
					ShowHideGSTRows();
				}
				if (jQuery('.staff_access_table').length > 0) {
					toggle_id = toggle_id.replace('view', '');
					toggle_id = toggle_id.replace('add', '');
					toggle_id = toggle_id.replace('edit', '');
					toggle_id = toggle_id.replace('delete', '');
					toggle_id = jQuery.trim(toggle_id);
					var checkbox_cover = toggle_id + "cover";
					//console.log('checkbox_cover - '+checkbox_cover+', checbox count - '+jQuery('#'+checkbox_cover).find('input[type="checkbox"]').length);
					if (jQuery('#' + checkbox_cover).find('input[type="checkbox"]').length > 0) {

						var view_checkbox = toggle_id + "view"; var add_checkbox = toggle_id + "add"; var edit_checkbox = toggle_id + "edit";
						var delete_checkbox = toggle_id + "delete"; var select_count = 0; var select_all_checkbox = toggle_id + "select_all";
						//console.log('add_checkbox - '+add_checkbox+', edit_checkbox - '+edit_checkbox+', delete_checkbox - '+delete_checkbox+', select_all_checkbox - '+select_all_checkbox);
						if (jQuery('#' + view_checkbox).prop('checked') == true) {
							select_count = parseInt(select_count) + 1;
						}
						if (jQuery('#' + add_checkbox).prop('checked') == true) {
							select_count = parseInt(select_count) + 1;
						}
						if (jQuery('#' + edit_checkbox).prop('checked') == true) {
							select_count = parseInt(select_count) + 1;
						}
						if (jQuery('#' + delete_checkbox).prop('checked') == true) {
							select_count = parseInt(select_count) + 1;
						}

						if (parseInt(select_count) == 4) {
							jQuery('#' + select_all_checkbox).prop('checked', true);
						}
						else {
							jQuery('#' + select_all_checkbox).prop('checked', false);
						}
					}
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}
function SelectAllModuleActionToggle(obj, toggle_id) {

	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				var toggle_value = 2;
				if (jQuery('#' + toggle_id).length > 0) {
					if (jQuery('#' + toggle_id).prop('checked') == true) {
						toggle_value = 1;
					}
					jQuery('#' + toggle_id).val(toggle_value);
				}
				if (parseInt(toggle_value) == 1) {
					if (jQuery('#' + toggle_id).parent().parent().parent().parent().find('input[type="checkbox"]').length > 0) {
						jQuery('#' + toggle_id).parent().parent().parent().parent().find('input[type="checkbox"]').each(function () {
							jQuery(this).prop('checked', true);
							jQuery(this).val('1');
						});
					}
				}
				else {
					if (jQuery('#' + toggle_id).parent().parent().parent().parent().find('input[type="checkbox"]').length > 0) {
						jQuery('#' + toggle_id).parent().parent().parent().parent().find('input[type="checkbox"]').each(function () {
							jQuery(this).prop('checked', false);
							jQuery(this).val('2');
						});
					}
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}
function FormSubmit(event, form_name, submit_page, redirection_page) {
	event.preventDefault();

	if (jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger mb-5"> <button type="button" class="close" data-dismiss="alert">&times;</button> Processing </div>');

	if (jQuery('.submit_button').length > 0) {
		jQuery('.submit_button').attr('disabled', true);
	}
	jQuery.ajax({
		url: submit_page,
		type: "post",
		async: true,
		data: jQuery('form[name="' + form_name + '"]').serialize(),
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function (data) {
			//console.log(data);
			try {
				var x = JSON.parse(data);
			} catch (e) {
				return false;
			}
			//console.log(x);

			if (jQuery('span.infos').length > 0) {
				jQuery('span.infos').remove();
			}
			if (jQuery('.valid_error').length > 0) {
				jQuery('.valid_error').remove();
			}
			if (jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}

			if (typeof x.redirection_page != "undefined" && x.redirection_page != "") {
				redirection_page = x.redirection_page;
			}

			if (x.number == '1') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' + x.msg + ' </div>');
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
				setTimeout(function () {
					if (typeof redirection_page != "undefined" && redirection_page != "") {
						window.location = redirection_page;
					}
					else {
						window.location.reload();
					}
				}, 1000);
			}

			if (x.number == '2') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' + x.msg + ' </div>');
				if (jQuery('.submit_button').length > 0) {
					jQuery('.submit_button').attr('disabled', false);
				}
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
			}

			if (x.number == '3') {
				jQuery('form[name="' + form_name + '"]').append('<div class="valid_error"> <script type="text/javascript"> ' + x.msg + ' </script> </div>');
				if (jQuery('.submit_button').length > 0) {
					jQuery('.submit_button').attr('disabled', false);
				}
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}
function table_listing_records_filter() {
	if (jQuery('#table_listing_records').length > 0) {
		jQuery('#table_listing_records').html('<div class="alert alert-success mb-3 mx-3"> Loading... </div>');
	}

	var check_login_session = 1;
	// var post_url = "dashboard_changes.php?check_login_session=1";
	// jQuery.ajax({
	// 	url: post_url, success: function (check_login_session) {
	if (check_login_session == 1) {
		var page_title = ""; var post_send_file = "";
		if (jQuery('input[name="page_title"]').length > 0) {
			page_title = jQuery('input[name="page_title"]').val();
			if (typeof page_title != "undefined" && page_title != "") {
				page_title = page_title.replaceAll(" ", "_");
				page_title = page_title.toLowerCase();
				page_title = jQuery.trim(page_title);
				post_send_file = page_title + "_changes.php";
			}
		}
		jQuery.ajax({
			url: post_send_file,
			type: "post",
			async: true,
			data: jQuery('form[name="table_listing_form"]').serialize(),
			dataType: 'html',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			success: function (result) {
				if (jQuery('.alert').length > 0) {
					jQuery('.alert').remove();
				}
				if (jQuery('#table_listing_records').length > 0) {
					jQuery('#table_listing_records').html(result);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	else {
		window.location.reload();
	}
	// 	}
	// });
}

function ShowModalContent(page_title, add_edit_id_value) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	// jQuery.ajax({url: post_url, success: function(check_login_session){
	// 	if(check_login_session == 1) {
	var add_edit_id = ""; var post_send_file = ""; var heading = "";
	if (typeof page_title != "undefined" && page_title != "") {
		heading = page_title;
		page_title = page_title.replaceAll(" ", "_");
		page_title = page_title.toLowerCase();
		add_edit_id = "show_" + page_title + "_id";
		post_send_file = page_title + "_changes.php";
		page_title = page_title + " Details";
		if (jQuery('.edit_title').length > 0) {
			page_title = page_title.replaceAll("_", " ");
			page_title = page_title.toLowerCase().replace(/\b[a-z]/g, function (string) {
				return string.toUpperCase();
			});
			jQuery('.edit_title').html(page_title);
		}
		if (jQuery('#table_records_cover').length > 0) {
			jQuery('#table_records_cover').addClass('d-none');
		}
		if (jQuery('#add_update_form_content').length > 0) {
			jQuery('#add_update_form_content').removeClass('d-none');
		}
	}
	var post_url = post_send_file + "?" + add_edit_id + "=" + add_edit_id_value;
	jQuery.ajax({
		url: post_url, success: function (result) {
			if (jQuery('.add_update_form_content').length > 0) {
				jQuery('.add_update_form_content').html("");
				jQuery('.add_update_form_content').html(result);
			}
			jQuery('html, body').animate({
				scrollTop: (jQuery('.add_update_form_content').parent().parent().offset().top)
			}, 500);
		}
	});
	// }
	// else {
	// 	window.location.reload();
	// }
	// }});
}

function SaveModalContent(form_name, post_send_file, redirection_file) {
	if (jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger mb-3"> <button type="button" class="close" data-dismiss="alert">&times;</button> Processing </div>');
	if (jQuery('.submit_button').length > 0) {
		jQuery('.submit_button').attr('disabled', true);
	}
	if (form_name != "login_form") {
		if (form_name != "bill_company_form") {
			jQuery('html, body').animate({
				scrollTop: (jQuery('.add_update_form_content').parent().parent().offset().top)
			}, 500);
		}

		var check_login_session = 1;
		var post_url = "dashboard_changes.php?check_login_session=1";
		jQuery.ajax({
			url: post_url, success: function (check_login_session) {
				if (check_login_session == 1) {
					console.log('if');
					SendModalContent(form_name, post_send_file, redirection_file);
					// window.location.reload();
				}
				else {
					window.location.reload();
				}
			}
		});
	}
	else {
		jQuery('html, body').animate({
			scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
		}, 500);
		SendModalContent(form_name, post_send_file, redirection_file);
		// window.location.reload();
	}
}

function SendModalContent(form_name, post_send_file, redirection_file) {
	jQuery.ajax({
		url: post_send_file,
		type: "post",
		async: true,
		data: jQuery('form[name="' + form_name + '"]').serialize(),
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function (data) {
			console.log(data);
			try {
				var x = JSON.parse(data);
			} catch (e) {
				return false;
			}
			//console.log(x);

			if (jQuery('span.infos').length > 0) {
				jQuery('span.infos').remove();
			}
			if (jQuery('.valid_error').length > 0) {
				jQuery('.valid_error').remove();
			}
			if (jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}

			if (x.number == '1') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' + x.msg + ' </div>');
				setTimeout(function () {
					if (jQuery('.redirection_form').length > 0) {
						if (typeof x.redirection_page != "undefined" && x.redirection_page != "") {
							window.location = x.redirection_page;
						}
						else {
							window.location = redirection_file;
						}
					}
					else {

						if (jQuery('#StockUpdateModal').length > 0) {
							jQuery('#StockUpdateModal .modal-header .close').trigger("click");
						}

						if (jQuery('.add_update_form_content').length > 0) {
							jQuery('.add_update_form_content').html("");
						}
						if (jQuery('#AcknowledgementModal').length > 0) {
							jQuery('#AcknowledgementModal .modal-header .close').trigger("click");
						}
						if (jQuery('#clearancemodal').length > 0) {
							jQuery('#clearancemodal .modal-header .close').trigger("click");
						}
						/*if(typeof x.quotation_id != "undefined" && x.quotation_id != "") {
							window.location = "quotation_view.php?view_quotation_id="+x.quotation_id;
						}
						else*/
						// if(typeof x.estimate_id != "undefined" && x.estimate_id != "") {
						// 	window.open("reports/rpt_estimate_a4.php?view_estimate_id="+x.estimate_id,'_blank');
						// 	window.location.reload();
						// }
						/*else if(typeof x.invoice_id != "undefined" && x.invoice_id != "") {
							window.location = "invoice_view.php?view_invoice_id="+x.invoice_id;
						}*/
						// else {
						if (jQuery('#table_records_cover').hasClass('d-none')) {
							jQuery('#table_records_cover').removeClass('d-none');
						}
						if (form_name == 'bill_company_form') {
							setTimeout(function () {
								window.location.reload();
							}, 1500);
						}
						else {
							table_listing_records_filter();
						}
						// }
					}
				}, 1000);
			}

			if (x.number == '2') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' + x.msg + ' </div>');
				if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
					jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
				}
			}

			if (x.number == '3') {
				jQuery('form[name="' + form_name + '"]').append('<div class="valid_error"> <script type="text/javascript"> ' + x.msg + ' </script> </div>');
				if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
					jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
				}
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}

function DeleteModalContent(page_title, delete_content_id) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (typeof page_title != "undefined" && page_title != "") {
					jQuery('#DeleteModal .modal-header').find('h4').html("");
					jQuery('#DeleteModal .modal-header').find('h4').html("Delete " + page_title);
					page_title = page_title.toLowerCase();
				}
				jQuery('.delete_modal_button').trigger("click");
				$('#DeleteModal').modal('show');
				jQuery('#DeleteModal .modal-body').html('');
				if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
					jQuery('#DeleteModal .modal-body').html('Are you surely want to cancel this ' + page_title + '?');
				}
				else {
					jQuery('#DeleteModal .modal-body').html('Are you surely want to delete this ' + page_title + '?');
				}

				jQuery('#DeleteModal .modal-footer .yes').attr('id', delete_content_id);
				jQuery('#DeleteModal .modal-footer .no').attr('id', delete_content_id);
			}
			else {
				window.location.reload();
			}
		}
	});
}
function DeleteNumberModalContent(page_title, delete_content_id) {

	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (typeof page_title != "undefined" && page_title != "") {
					jQuery('#ReceiptDeleteModal .modal-header').find('h4').html("");
					jQuery('#ReceiptDeleteModal .modal-header').find('h4').html("Delete " + page_title);

					page_title = page_title.toLowerCase();
				}
				jQuery('.receipt_delete_modal_button').trigger("click");
				jQuery('#ReceiptDeleteModal .modal-body').html('');

				if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
					jQuery('#ReceiptDeleteModal .modal-body').html('Are you surely want to cancel this ' + page_title + '?');
				}
				else {
					jQuery('#ReceiptDeleteModal .modal-body').html('Are you surely want to delete this ' + page_title + '?');
				}

				jQuery('#ReceiptDeleteModal .modal-footer .yes').attr('id', delete_content_id);
				jQuery('#ReceiptDeleteModal .modal-footer .no').attr('id', delete_content_id);
			}
			else {
				window.location.reload();
			}
		}
	});
}

function confirm_delete_modal(obj) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {

				if (jQuery('#DeleteModal .modal-body').find('.infos').length > 0) {
					jQuery('#DeleteModal .modal-body').find('.infos').remove();
				}

				var page_title = ""; var post_send_file = "";
				if (jQuery('input[name="page_title"]').length > 0) {
					page_title = jQuery('input[name="page_title"]').val();
					if (typeof page_title != "undefined" && page_title != "") {
						page_title = page_title.replace(" ", "_");
						page_title = page_title.toLowerCase();
						page_title = jQuery.trim(page_title);
						post_send_file = page_title + "_changes.php";
					}
				}
				var delete_content_id = jQuery(obj).attr('id');
				if (page_title != 'receipt') {
					var post_url = post_send_file + "?delete_" + page_title + "_id=" + delete_content_id;
					jQuery.ajax({
						url: post_url, success: function (result) {
							jQuery('#DeleteModal .modal-content').animate({ scrollTop: 0 }, 500);

							var intRegex = /^\d+$/;
							if (intRegex.test(result) == true) {
								if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
									jQuery('#DeleteModal .modal-body').append('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> Successfully Cancel the ' + page_title.replace("_", " ") + ' </div>');
								}
								else {
									jQuery('#DeleteModal .modal-body').append('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> Successfully Delete the ' + page_title.replace("_", " ") + ' </div>');
								}
								setTimeout(function () {
									jQuery('#DeleteModal .modal-header .close').trigger("click");
									window.location.reload();
								}, 1000);

							}
							else {
								jQuery('#DeleteModal .modal-body').append('<span class="infos w-100 text-center" style="font-size: 15px; font-weight: bold;">' + result + '</span>');
							}
						}
					});
				}
				else {
					RemarksModalContent(delete_content_id, '')
				}

			}
			else {
				window.location.reload();
			}
		}
	});
}
function cancel_delete_modal(obj) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				$('#DeleteModal').modal('hide');
			}
			else {
				window.location.reload();
			}
		}
	});
}
function GetMetaTagsFile(file_value) {
	if(file_value != "") {
		var post_url = "meta_tags_changes.php?meta_file_name="+file_value;
		jQuery.ajax({
			url: post_url, success: function (result) {
				if(result == "invalid_user") {
					window.location.reload();
				}
				else {
					if(jQuery('.separate_row').length > 0) {
						jQuery('.separate_row').html('');
						jQuery('.separate_row').html(result);
					}
				}
			}
		});
	}
}

function getCharCount(obj, chat_count_class, chat_total_count_class) {
	var char_total_count = 0;
	if(jQuery('.'+chat_total_count_class).length > 0) {
		char_total_count = jQuery('.'+chat_total_count_class).html();
		char_total_count = char_total_count.trim();
		if(char_total_count != 0 && char_total_count != "" && typeof char_total_count != "undefined") {
			var char_value = jQuery(obj).val();
			char_value = char_value.trim();
			if(char_value != '' && typeof char_value != "undefined") {
				var char_count = char_value.length;
				if(jQuery('.'+chat_count_class).length > 0) {
					if(parseInt(char_count) <= parseInt(char_total_count)) {
						jQuery('.'+chat_count_class).html(char_count);
					}
					else {
						jQuery('.'+chat_count_class).html(char_total_count);
						char_value = char_value.subString(0, char_total_count); 
						jQuery(obj).val(char_value);
					}
				}
			}
			else {
				jQuery('.'+chat_count_class).html('');
			}
		}
		else {
			jQuery('.'+chat_count_class).html('');
		}
	}	
}
function delete_banner_modal(obj, field) {
	if(jQuery('#DeleteBannerModal').length > 0) {
		var banner_name = "";
		if(jQuery(obj).parent().find('input[name="banner_name[]"]').length > 0) {
			banner_name = jQuery(obj).parent().find('input[name="banner_name[]"]').val().trim();
		}
		if(jQuery('.delete_banner_modal_button').length > 0) {
			jQuery('.delete_banner_modal_button').trigger('click');
		}
		if(jQuery('input[name="position_name"]').length > 0) {
			jQuery('input[name="position_name"]').val(field);
		}
		jQuery('#DeleteBannerModal .modal-footer .yes').attr('id', banner_name);
	}
}
function delete_banner_image(obj) {
	var banner_name = "";
	banner_name = jQuery(obj).attr('id');
	var position_name = "";
	if(jQuery(obj).parent().find('input[name="position_name"]').length > 0) {
		position_name = jQuery(obj).parent().find('input[name="position_name"]').val().trim();
	}
	var form_name = "";
	if(position_name == "desktop_home_banner") {
		form_name = "desktop_banner_form";
	}
	else if(position_name == "mobile_home_banner") {
		form_name = "mobile_banner_form";
	}
	var post_url = "banner_changes.php?delete_banner_image="+banner_name+"&delete_position_name="+position_name;
	jQuery.ajax({
		url: post_url, success: function (data) {
			if(data == "invalid_user") {
				window.location.reload();
			}
			else if(data != "") {
				if(jQuery('#DeleteBannerModal').find('.btn-close').length > 0) {
					jQuery('#DeleteBannerModal').find('.btn-close').trigger('click');
				}
				try {
					var x = JSON.parse(data);
				} catch (e) {
					return false;
				}
				if (x.number == '1') {
					jQuery('form[name="'+form_name+'"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">&times;</button> ' + x.msg + ' </div>');
					setTimeout(function () {
						if (jQuery('.redirection_form').length > 0) {
							if(position_name == "Desktop") {
								window.location = "desktop_banner.php";
							}
							else if(position_name == "Mobile") {
								window.location = "mobile_banner.php";
							}
							window.location.reload();
						}
					}, 1000);
				}
			}
		}
	});
}
function checkisTechnician() {
	var is_technician = 1;
	if (jQuery('input[name="is_technician"]').prop('checked') == false) {
		is_technician = 2;
	}

	if (jQuery('input[name="is_technician"]').length > 0) {
		jQuery('input[name="is_technician"]').val(is_technician);
	}
}
function OnOffButton(field_name){
    var checkbox_button = document.getElementById(field_name).checked;
    
    if(checkbox_button == true){
        document.getElementById(field_name).value = 1;
		if(field_name == 'gst_option') {
			GetTaxType('1');
		}
    }
    else if(checkbox_button == false){
        document.getElementById(field_name).value = 0;
		if(field_name == 'gst_option') {
			GetTaxType('0');
		}
    }
}