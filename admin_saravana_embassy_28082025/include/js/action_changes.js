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