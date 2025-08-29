function addAttributeDetails() {
    var check_login_session = 1; var all_errors_check = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {
            if (check_login_session == 1) {
                if (jQuery('.infos').length > 0) {
                    jQuery('.infos').each(function () { jQuery(this).remove(); });
                }

                // if (jQuery('.add_details_buttton').length > 0) {
                // 	jQuery('.add_details_buttton').attr('disabled', true);
                // }

                var all_errors_check = 1;
                var regex = /^[a-zA-Z0-9 ]+$/;


                var category_id = "";
                if (jQuery('select[name="category_id"]').is(":visible")) {
                    if (jQuery('select[name="category_id"]').length > 0) {
                        category_id = jQuery('select[name="category_id"]').val();
                        // alert(category_id);
                        if (typeof category_id == "undefined" || category_id == "") {
                            all_errors_check = 0;
                        }

                    }
                }

                // var regex = /^(?!\d+$)[a-zA-Z0-9 ]+$/;
                var regex = /^[a-zA-Z0-9 ]+$/;

                var attribute_name = ""; var validation_check = 1;
                if (jQuery('input[name="attribute_name"]').is(":visible")) {
                    if (jQuery('input[name="attribute_name"]').length > 0) {
                        attribute_name = jQuery('input[name="attribute_name"]').val();
                        // if (typeof attribute_name == "undefined" || attribute_name == "") {
                        // 	all_errors_check = 0;
                        // }
                        if (typeof attribute_name != "undefined" && attribute_name != "") {
                            if (attribute_name.length > 50) {
                                jQuery('input[name="attribute_name"]').val('');

                            }

                            if (regex.test(attribute_name) == false) {
                                // jQuery('input[name="attribute_name"]').parent().after('<span class="infos">Invalid Category</span>');
                                validation_check = 0;
                            }
                            else {
                                jQuery('input[name="attribute_name"]').val(attribute_name);
                            }
                        } else {
                            all_errors_check = 0;
                        }

                    }
                }
                if (all_errors_check == 1) {
                    if (validation_check == 1) {

                        var add = 1;
                        if (attribute_name != "") {
                            if (jQuery('input[name="attribute_names[]"]').length > 0) {
                                // var $table = jQuery('.added_subcategory_table tbody');
                                // console.log($table);
                                jQuery('.added_attribute_table tbody').find('.attribute_row' + category_id).each(function () {

                                    var prev_attribute_name = jQuery(this).find('input[name="attribute_names[]"]').val();
                                    var lower_prev_attribute_name = prev_attribute_name.toLowerCase();
                                    var lower_prev_attribute_name = lower_prev_attribute_name.trim();

                                    var lower_attribute_name = attribute_name.toLowerCase();
                                    var lower_attribute_name = lower_attribute_name.trim();

                                    if (lower_prev_attribute_name == lower_attribute_name) {
                                        add = 0;
                                    }
                                });
                            }
                        }

                        if (add == 1) {
                            var category_count = jQuery('input[name="attribute_count"]').val();
                            category_count = parseInt(category_count) + 1;
                            jQuery('input[name="attribute_count"]').val(category_count);

                            var post_url = "attribute_changes.php?attribute_row_index=" + category_count + "&category_id=" + category_id + "&selected_attribute_name=" + encodeURIComponent(attribute_name);

                            jQuery.ajax({
                                url: post_url, success: function (result) {

                                    if (jQuery('.added_attribute_table tbody').find('tr').length > 0) {
                                        jQuery('.added_attribute_table tbody').find('tr:first').before(result);
                                    }
                                    else {
                                        jQuery('.added_attribute_table tbody').append(result);
                                    }
                                    SnoCalculation()
                                    if (jQuery('select[name="category_id"]').length > 0) {
                                        jQuery('select[name="category_id"]').val('').trigger("change");
                                        jQuery('select[name="category_id"]').select2('open')
                                    }

                                    if (jQuery('input[name="attribute_name"]').length > 0) {
                                        jQuery('input[name="attribute_name"]').val('');
                                    }

                                }
                            });
                        }
                        else {
                            jQuery('.added_attribute_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">This Attribute name already exists for this category</span>');

                            if (jQuery('.add_details_buttton').length > 0) {
                                jQuery('.add_details_buttton').attr('disabled', false);
                            }
                        }
                    } else {
                        jQuery('.added_attribute_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">Invalid Attribute</span>');
                        jQuery('input[name="attribute_value"]').val('');
                    }
                }
                else {
                    jQuery('.added_attribute_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">Please check all field values</span>');
                    if (jQuery('.add_details_buttton').length > 0) {
                        jQuery('.add_details_buttton').attr('disabled', false);
                    }
                }
            }
            else {
                window.location.reload();
            }
        }
    });
}

function DeleteAttributeRow(row_index) {
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {

            if (check_login_session == 1) {
                if (jQuery('#attribute_row' + row_index).length > 0) {
                    jQuery('#attribute_row' + row_index).remove();
                }
                SnoCalculation()
            }
            else {
                window.location.reload();
            }
        }
    });
}

function SnoCalculation() {
    if (jQuery('.sno').length > 0) {
        var row_count = 0;
        row_count = jQuery('.sno').length;
        if (typeof row_count != "undefined" && row_count != null && row_count != 0 && row_count != "") {
            var j = 1;
            var sno = document.getElementsByClassName('sno');
            for (var i = row_count - 1; i >= 0; i--) {
                sno[i].innerHTML = j;
                j = parseInt(j) + 1;
            }
        }
    }
}

function focusAttributeName() {
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {

            if (check_login_session == 1) {

                setTimeout(function () {
                    if (jQuery('input[name="attribute_name"]').length > 0) {
                        jQuery('input[name="attribute_name"]').focus();

                    }
                    if (jQuery('input[name="attribute_value"]').length > 0) {
                        jQuery('input[name="attribute_value"]').focus();

                    }
                }, 0);
            }
            else {
                window.location.reload();
            }
        }
    });
}


function addAttributeValueDetails() {
    var check_login_session = 1; var all_errors_check = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {
            if (check_login_session == 1) {
                if (jQuery('.infos').length > 0) {
                    jQuery('.infos').each(function () { jQuery(this).remove(); });
                }

                // if (jQuery('.add_details_buttton').length > 0) {
                // 	jQuery('.add_details_buttton').attr('disabled', true);
                // }

                var all_errors_check = 1;

                var category_id = "";
                if (jQuery('select[name="category_id"]').is(":visible")) {
                    if (jQuery('select[name="category_id"]').length > 0) {
                        category_id = jQuery('select[name="category_id"]').val();
                        // alert(category_id);
                        if (typeof category_id == "undefined" || category_id == "") {
                            all_errors_check = 0;
                        }

                    }
                }
                var attribute_id = "";
                if (jQuery('select[name="attribute_id"]').is(":visible")) {
                    if (jQuery('select[name="attribute_id"]').length > 0) {
                        attribute_id = jQuery('select[name="attribute_id"]').val();
                        // alert(attribute_id);
                        if (typeof attribute_id == "undefined" || attribute_id == "") {
                            all_errors_check = 0;
                        }

                    }
                }

                // var regex = /^(?!\d+$)[a-zA-Z0-9 ]+$/;
                var regex = /^[a-zA-Z0-9 ]+$/;



                var attribute_value = ""; var validation_check = 1;
                if (jQuery('input[name="attribute_value"]').is(":visible")) {
                    if (jQuery('input[name="attribute_value"]').length > 0) {
                        attribute_value = jQuery('input[name="attribute_value"]').val();
                        if (typeof attribute_value != "undefined" || attribute_value != "") {
                            if (regex.test(attribute_value) == false) {
                                // jQuery('input[name="attribute_value"]').parent().after('<span class="infos">Invalid Category</span>');
                                validation_check = 0;
                            }
                            else {
                                jQuery('input[name="attribute_value"]').val(attribute_value);
                            }
                        }

                    }
                }

                if (all_errors_check == 1) {
                    if (validation_check == 1) {

                        var add = 1;
                        if (attribute_value != "") {
                            if (jQuery('input[name="attribute_values[]"]').length > 0) {
                                // var $table = jQuery('.added_subcategory_table tbody');
                                // console.log($table);
                                jQuery('.added_attribute_value_table tbody').find('.attribute_value_row' + category_id).each(function () {

                                    var prev_attribute_value = jQuery(this).find('input[name="attribute_values[]"]').val();
                                    var prev_category_ids = jQuery(this).find('input[name="category_ids[]"]').val();
                                    var prev_attribute_ids = jQuery(this).find('input[name="attribute_ids[]"]').val();
                                    var lower_prev_attribute_value = prev_attribute_value.trim().toLowerCase();
                                    var lower_prev_category_ids = prev_category_ids.trim().toLowerCase();
                                    var lower_attribute_value = attribute_value.trim().toLowerCase();
                                    var lower_category_id = category_id.trim().toLowerCase();
                                    var lower_attribute_id = attribute_id.trim().toLowerCase();
                                    var lower_prev_attribute_ids = prev_attribute_ids.trim().toLowerCase();


                                    if (lower_prev_attribute_value == lower_attribute_value && lower_prev_category_ids == lower_category_id && lower_prev_attribute_ids == lower_attribute_id) {
                                        add = 0;
                                    }
                                });
                            }
                        }

                        if (add == 1) {
                            var attribute_value_count = jQuery('input[name="attribute_value_count"]').val();
                            attribute_value_count = parseInt(attribute_value_count) + 1;
                            jQuery('input[name="attribute_value_count"]').val(attribute_value_count);

                            var post_url = "attribute_value_changes.php?attribute_row_index=" + attribute_value_count + "&category_id=" + category_id + "&selected_attribute_id=" + attribute_id + "&selected_attribute_value=" + encodeURIComponent(attribute_value);

                            jQuery.ajax({
                                url: post_url, success: function (result) {

                                    if (jQuery('.added_attribute_value_table tbody').find('tr').length > 0) {
                                        jQuery('.added_attribute_value_table tbody').find('tr:first').before(result);
                                    }
                                    else {
                                        jQuery('.added_attribute_value_table tbody').append(result);
                                    }
                                    SnoCalculation();
                                    if (jQuery('select[name="category_id"]').length > 0) {
                                        jQuery('select[name="category_id"]').val('').trigger("change");
                                    }

                                    if (jQuery('input[name="attribute_value"]').length > 0) {
                                        jQuery('input[name="attribute_value"]').val('');
                                    }
                                    if (jQuery('select[name="attribute_id"]').length > 0) {
                                        jQuery('select[name="attribute_id"]').val('').trigger('change');
                                    }

                                }
                            });
                        }
                        else {
                            jQuery('.added_attribute_value_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">This Attribute name already exists for this Attribute Value</span>');

                            if (jQuery('.add_details_buttton').length > 0) {
                                jQuery('.add_details_buttton').attr('disabled', false);
                            }
                        }
                    } else {
                        jQuery('.added_attribute_value_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">Invalid Attribute Value</span>');
                        jQuery('input[name="attribute_value"]').val('');
                    }
                }
                else {
                    jQuery('.added_attribute_value_table').before('<span class="infos w-100 text-center mb-3" style="font-size: 15px;">Please check all field values</span>');
                    if (jQuery('.add_details_buttton').length > 0) {
                        jQuery('.add_details_buttton').attr('disabled', false);
                    }
                }
            }
            else {
                window.location.reload();
            }
        }
    });
}

function selectedCategoryList(category_id) {
    if (jQuery('select[name="attribute_id"]').length > 0) {
        jQuery('select[name="attribute_id"]').val('');
    }
    // alert(category_id);
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {
            if (check_login_session == 1) {

                var post_url = "attribute_value_changes.php?selected_category_id=" + category_id;
                jQuery.ajax({
                    url: post_url, success: function (result) {
                        if (result) {
                            if (jQuery('select[name="attribute_id"]').length > 0) {
                                jQuery('select[name="attribute_id"]').html(result);
                            } else {
                                if (jQuery('select[name="attribute_filter"]').length > 0) {
                                    jQuery('select[name="attribute_filter"]').html(result);
                                }
                            }
                        } else {
                            if (jQuery('select[name="attribute_id"]').length > 0) {
                                jQuery('select[name="attribute_id"]').val('').trigger('change');
                            } else {
                                if (jQuery('select[name="attribute_filter"]').length > 0) {
                                    jQuery('select[name="attribute_filter"]').val('').trigger('change');
                                }
                            }
                        }
                    }
                });

            }
            else {
                window.location.reload();
            }
        }
    });

}


function DeleteAttrValueRow(row_index) {
    var check_login_session = 1;
    var post_url = "dashboard_changes.php?check_login_session=1";
    jQuery.ajax({
        url: post_url, success: function (check_login_session) {

            if (check_login_session == 1) {
                if (jQuery('#attribute_value_row' + row_index).length > 0) {
                    jQuery('#attribute_value_row' + row_index).remove();
                }
                SnoCalculation();
            }
            else {
                window.location.reload();
            }
        }
    });
}