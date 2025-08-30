function ShowHideFrontend(obj, show_hide_id) {
    if(jQuery('#show_hide_toggle_'+show_hide_id).parent().parent().find('div.alert').length > 0) {
        jQuery('#show_hide_toggle_'+show_hide_id).parent().parent().find('div.alert').remove();
    }
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";	
    jQuery.ajax({url: post_url, success: function(check_login_session){
        if(check_login_session == 1) {	
			var page_title = ""; var post_send_file  = "";
            if(jQuery('input[name="page_title"]').length > 0) {
                page_title = jQuery('input[name="page_title"]').val();
                if(typeof page_title != "undefined" && page_title != "") {
                    page_title = page_title.replaceAll(" ", "_");
                    page_title = page_title.toLowerCase();
                    page_title = jQuery.trim(page_title);
                    post_send_file = page_title+"_changes.php";
                }
            }

            var show_frontend = 2;
            if(jQuery('#show_hide_toggle_'+show_hide_id).prop('checked') == true) {
                show_frontend = 1;
            }
            var post_url = post_send_file+"?show_hide_id="+show_hide_id+"&show_frontend="+show_frontend;
            jQuery.ajax({url: post_url, success: function(result){
				var intRegex = /^\d+$/;
				if(intRegex.test(result) == true) {
					jQuery('#show_hide_toggle_'+show_hide_id).parent().after('<span class="infos w-100 text-center mt-3" style="color: green;"> Updated Successfully </span>');
                    setTimeout(function(){ 
                        table_listing_records_filter();
                    }, 1000);
				}
                else {
                    jQuery('#show_hide_toggle_'+show_hide_id).parent().after('<span class="infos w-100 text-center m-3"> '+result+' </span>');
                }
            }}); 
        }
        else {
            window.location.reload();
        }
    }});
}
function OrderingRecords() {
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";	
    jQuery.ajax({url: post_url, success: function(check_login_session){
        if(check_login_session == 1) {	

            var page_title = ""; var post_send_file  = "";
            if(jQuery('input[name="page_title"]').length > 0) {
                page_title = jQuery('input[name="page_title"]').val();
                if(typeof page_title != "undefined" && page_title != "") {
                    page_title = page_title.replaceAll(" ", "_");
                    page_title = page_title.toLowerCase();
                    page_title = jQuery.trim(page_title);
                    post_send_file = page_title+"_changes.php";
                }
            }
            if (jQuery('#table_records_cover').length > 0) {
                jQuery('#table_records_cover').addClass('d-none');
            }
            if (jQuery('#add_update_form_content').length > 0) {
                jQuery('#add_update_form_content').removeClass('d-none');
            }
			var post_url = post_send_file+"?show_order=1";
            jQuery.ajax({url: post_url, success: function(result){
                if(jQuery('.add_update_form_content').length > 0) {
                    console.log('ca');
                    jQuery('.add_update_form_content').html("");
                    jQuery('.add_update_form_content').html(result);
                }
                jQuery('html, body').animate({
                    scrollTop: (jQuery('.add_update_form_content').parent().parent().offset().top)
                }, 500);                
            }});
        }
        else {
            window.location.reload();
        }
    }});
}

function getGeneralProductDetails(category_id) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {

			if (check_login_session == 1) {

				var product_count = jQuery('input[name="product_count"]').val();
				product_count = parseInt(product_count);
				// jQuery('input[name="product_count"]').val(product_count);

				var post_url = "product_table_changes.php?category_id="+category_id+"&product_count="+product_count;
				jQuery.ajax({
					url: post_url, success: function (result) {
						jQuery('.products_table_details').html(result);

					}
				});
				if (jQuery('input[name="category_id_hidden"]').length > 0) {
					jQuery('input[name="category_id_hidden"]').val(category_id);
				}
			}
			else {
				window.location.reload();
			}
        } 
    });	
}
function addGeneralTableDetails(category_id){

	if(jQuery('.add_button_remove').length > 0) {
		jQuery('.add_button_remove').addClass('d-none');
	}

	if(jQuery('.delete_button').length > 0) {
		jQuery('.delete_button').removeClass('d-none');
	}

	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				var product_count = jQuery('input[name="product_count"]').val();
				product_count = parseInt(product_count) + 1;

				var post_url = "product_table_changes.php?product_row_category_id="+category_id+"&product_count="+product_count;
				jQuery.ajax({
					url: post_url, success: function (result) {
						
						jQuery('input[name="product_count"]').val(product_count);
						if(jQuery('.append_product_details tbody').find('tr').length > 0) {
							jQuery('.append_product_details tbody').find('tr:first').before(result);
						}else{				
							jQuery('.products_table_details').append(result);							
						}	
						
						if(jQuery('select[name="category_id"]').length > 0) {
							jQuery('select[name="category_id"]').attr('disabled',true);
						}
						
						calTotal();
					}
				});
				
			}
			else {
				window.location.reload();
			}
	    }
	});
}

function CloneGeneralTableRow(category_id, row_index,obj) {

	var row_count ="";
	
	if(jQuery('.append_product_details tbody').find('tr').length > 0) {
		row_count = jQuery('.append_product_details tbody').find('tr').length;
		row_count = parseInt(row_count)+1;
	}
	
	var attribute_id = [];	var attribute_id_name =row_index+"_attribute_value_id[]";
	
	$('select[name="'+attribute_id_name+'"]').each(function(){

		values = $(this).val();
		if (values) {
			attribute_id = attribute_id.concat(values);
		}
	});
	if(attribute_id == '')
	{
		$('input[name="'+attribute_id_name+'"]').each(function(){

			values = $(this).val();
			if (values) {
				attribute_id = attribute_id.concat(values);
			}
		});
	}
    	var product_type ="";
		var quantity ="";
		if($(obj).closest('tr').find('input[name="quantity[]"]').length >0)
		{
			quantity =$(obj).closest('tr').find('input[name="quantity[]"]').val();
		}
		var actual_price =""; var actual_price_name =""; 
		actual_price_100_name =row_index+"_qty_actual_price[]";
		if(jQuery('input[name="'+actual_price_100_name+'"]').length >0)
		{
			actual_price = jQuery('input[name="'+actual_price_100_name+'"]').val();
		}
	
		var availability =""; var agent_price_name =""; 
		agent_price_100_name =row_index+"_qty_available[]";
		if(jQuery('input[name="'+agent_price_100_name+'"]').length >0)
		{
			availability = jQuery('input[name="'+agent_price_100_name+'"]').val();
		}


	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
    			var post_url = "product_table_changes.php?attribute_id="+attribute_id+"&colne_category_id="+category_id+"&row_index="+row_count+"&product_type="+product_type+"&quantity="+quantity+"&actual_price="+actual_price+"&availability="+availability;			
				jQuery.ajax({
					url: post_url, success: function (result) {
						if(jQuery('.append_product_details tbody').find('tr').length > 0) {
							jQuery('.append_product_details tbody').find('tr:first').before(result);
						}
						row_count = parseInt(row_count);
						$('#general_table_body tbody tr td').find('#add_btn').each(function () {
							$(this).attr("onclick","addGeneralTableDetails('"+category_id+"','"+row_count+"')");
						});
						
						// if($('input[name="product_row_index[]"]').length > 0)
						// {
						// 	$('input[name="product_row_index[]"]').val(row_count);
						// }
						// if($('input[name="default_button[]"]').length > 0)
						// {
						// 	$('input[name="default_button[]"]').val(row_count);
						// }
						if($('input[name="product_count"]').length > 0)
						{
							$('input[name="product_count"]').val(row_count);
						}
						
						if(jQuery('.add_button_remove').length > 0) {
							jQuery('.add_button_remove').addClass('d-none');
						}
					
						if(jQuery('.delete_button').length > 0) {
							jQuery('.delete_button').removeClass('d-none');
						}

						jQuery('.append_product_details tbody').find('tr:first').find('.add_button_remove').removeClass('d-none');
						
						if(jQuery('.append_product_details tbody').find('tr').length > 1 )
							{
								jQuery('.append_product_details tbody').find('tr:first').find('.delete_button').removeClass('d-none');
							}
					}
				});

			}
			else {
				window.location.reload();
			}
		}
	});
    calTotal();
}

function DeleteGeneralTableRow(row_index){
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";	
	jQuery.ajax({url: post_url, success: function(check_login_session){
		if(check_login_session == 1) {
			if(jQuery('#product_row'+row_index).length > 0) {
				jQuery('#product_row'+row_index).remove();
			}
			calTotal();
			if(jQuery('.append_product_details tbody').find('.sno').length == 1){
				
				if(jQuery('.add_button_remove').length > 0) {
					jQuery('.add_button_remove').removeClass('d-none');
				}
			
				if(jQuery('.delete_button').length > 0) {
					jQuery('.delete_button').addClass('d-none');
			}
			
		}
		}
		else {
			window.location.reload();
		}
	}});
}
function calTotal() {
	if (jQuery('.sno').length > 0) {
		var row_count = 0;
		row_count = jQuery('.sno').length;
		jQuery('.append_product_details tbody').find('tr:first').find('.add_button_remove').removeClass('d-none');

		if (typeof row_count != "undefined" && row_count != null && row_count != 0 && row_count != "") {
			var j = 1;
			var sno = document.getElementsByClassName('sno');
			for (var i = row_count - 1; i >= 0; i--) {
				// if(jQuery('.bill_products_table tbody').find('tr:nth-child('+i+')').length > 0) {
				// 	jQuery('.bill_products_table tbody').find('tr:nth-child('+i+')').find('.sno').html(j);
				// 	j = parseInt(j) + 1;
				// }
				sno[i].innerHTML = j;

				j = parseInt(j) + 1;
			}
		}
	}
}