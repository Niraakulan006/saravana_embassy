var number_regex = /^\d+$/;
var price_regex = /^(\d*\.)?\d+$/;

function AddEstimateProductRow() {
    if(jQuery('.add_product_button').length > 0) {
        jQuery('.add_product_button').attr('disabled', true);
    }
    var product_count = 0;
    if(jQuery('input[name="product_count"]').length > 0) {
        product_count = jQuery('input[name="product_count"]').val().trim();
        product_count = parseInt(product_count) + 1;
    }
    var post_url = "estimate_action_changes.php?add_new_row=1&product_row_index="+product_count;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                if(jQuery('.product_table tbody').find('tr.no_data_row').length > 0) {
                    jQuery('.product_table tbody').find('tr.no_data_row').remove();
                }
                if (jQuery('.product_table tbody').find('tr.product_row').length > 0) {
                    jQuery('.product_table tbody').find('tr.product_row:last').after(result);
                }
                else {
                    if (jQuery('.product_table tbody').find('tr.subtotal_row').length > 0) {
                        jQuery('.product_table tbody').find('tr.subtotal_row:first').before(result);
                    }
                }
                if(jQuery('input[name="product_count"]').length > 0) {
                    jQuery('input[name="product_count"]').val(product_count);
                }
                if(jQuery('.add_product_button').length > 0) {
                    jQuery('.add_product_button').attr('disabled', false);
                }
                SnoCalcPlus();
                calTotal();
            }
        }
    });
}
function CopyEstimateProductRow(obj) {
    if(jQuery(obj).closest('tr.product_row').find('.copy_button').length > 0) {
        jQuery(obj).closest('tr.product_row').find('.copy_button').attr('disabled', true);
    }
    var product_count = 0;
    if(jQuery('input[name="product_count"]').length > 0) {
        product_count = jQuery('input[name="product_count"]').val().trim();
        product_count = parseInt(product_count) + 1;
    }
    var selected_product_id = "";
    if(jQuery(obj).closest('tr.product_row').find('select[name="product_id[]"]').length > 0) {
        selected_product_id = jQuery(obj).closest('tr.product_row').find('select[name="product_id[]"]').val().trim();
    }
    var selected_attribute_id = new Array(); var selected_attribute_value_id = new Array();
    if(selected_product_id != "" && selected_product_id != null && typeof selected_product_id != "undefined") {
        if(jQuery(obj).closest('tr.product_row').find('input[name="attribute_id_'+selected_product_id+'[]"]').length > 0) {
            jQuery(obj).closest('tr.product_row').find('input[name="attribute_id_'+selected_product_id+'[]"]').each(function(){
                var attribute_id = jQuery(this).val().trim();
                selected_attribute_id.push(attribute_id);
            });
        }
        if(jQuery(obj).closest('tr.product_row').find('select[name="attribute_value_id_'+selected_product_id+'[]"]').length > 0) {
            jQuery(obj).closest('tr.product_row').find('select[name="attribute_value_id_'+selected_product_id+'[]"]').each(function(){
                var attribute_value_id = jQuery(this).val().trim();
                selected_attribute_value_id.push(attribute_value_id);
            });
        }
    }
    var selected_quantity = "";
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').length > 0) {
        selected_quantity = jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').val().trim();
    }
    var selected_price = "";
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
        selected_price = jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').val().trim();
    }
    var selected_tax = "";
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').length > 0) {
        selected_tax = jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').val().trim();
    }
    var selected_amount = "";
    if(jQuery(obj).closest('tr.product_row').find('.product_amount').length > 0) {
        selected_amount = jQuery(obj).closest('tr.product_row').find('.product_amount').html().trim();
    }

    var post_url = "estimate_action_changes.php?copy_row=1&copy_product_row_index="+product_count+"&selected_product_id="+selected_product_id+"&selected_attribute_id="+selected_attribute_id+"&selected_attribute_value_id="+selected_attribute_value_id+"&selected_quantity="+selected_quantity+"&selected_price="+selected_price+"&selected_tax="+selected_tax+"&selected_amount="+selected_amount;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                if(jQuery('.product_table tbody').find('tr.no_data_row').length > 0) {
                    jQuery('.product_table tbody').find('tr.no_data_row').remove();
                }
                if (jQuery('.product_table tbody').find('tr.product_row').length > 0) {
                    jQuery('.product_table tbody').find('tr.product_row:last').after(result);
                }
                else {
                    if (jQuery('.product_table tbody').find('tr.subtotal_row').length > 0) {
                        jQuery('.product_table tbody').find('tr.subtotal_row:first').before(result);
                    }
                }
                if(jQuery('input[name="product_count"]').length > 0) {
                    jQuery('input[name="product_count"]').val(product_count);
                }
                if(jQuery('.add_product_button').length > 0) {
                    jQuery('.add_product_button').attr('disabled', false);
                }
                SnoCalcPlus();
                calTotal();
            }
        }
    });
}
function SnoCalcPlus() {
    var snoElements = document.getElementsByClassName('sno');
    if (snoElements.length > 0) {
        for (var i = 0; i < snoElements.length; i++) {
            snoElements[i].innerHTML = i + 1;
        }
    }
}
function DeleteEstimateProductRow(id_name, row_index) {
    if (jQuery('#'+id_name+row_index).length > 0) {
        jQuery('#'+id_name+row_index).remove();
    }
    if(jQuery('.'+id_name).length == 0) {
        if (jQuery('.product_table tbody').find('tr.subtotal_row').length > 0) {
            jQuery('.product_table tbody').find('tr.subtotal_row:first').before('<tr class="no_data_row"><th colspan="10" class="text-center px-2 py-2">No Data Found!</th></tr>');
        }
    }
    SnoCalcPlus();
    calTotal();
}
function GetProductAttribute(obj) {
    var product_id = "";
    product_id = jQuery(obj).val().trim();

    var post_url = "estimate_action_changes.php?get_product_attribute="+product_id;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                result = result.split('$$$');
                if(jQuery(obj).closest('tr.product_row').find('.attribute_element').length > 0) {
                    jQuery(obj).closest('tr.product_row').find('.attribute_element').html(result[0]);
                }
                if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
                    jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').val(result[1]);
                }
                if(jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').length > 0) {
                    jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').val(result[2]);
                }
                if(jQuery(obj).closest('tr.product_row').find('.product_tax').length > 0) {
                    jQuery(obj).closest('tr.product_row').find('.product_tax').html(result[2]);
                }
                EstimateProductRowCheck(obj);
            }
        }
    });
}
function getProductCombinationRate(obj) {
    var product_id = ""; var attribute_id = new Array(); var attribute_value_id = new Array();
    if(jQuery(obj).closest('tr.product_row').find('select[name="product_id[]"]').length > 0) {
        product_id = jQuery(obj).closest('tr.product_row').find('select[name="product_id[]"]').val().trim();
    }

    if(jQuery(obj).closest('.attribute_row').length > 0) {
        jQuery(obj).closest('.attribute_row').each(function() {
            var attribute = "";
            if(jQuery(this).find('input[name="attribute_id_'+product_id+'[]"]').length > 0) {
                attribute = jQuery(this).find('input[name="attribute_id_'+product_id+'[]"]').val().trim();
            }
            attribute_id.push(attribute);
            var attribute_value = "";
            if(jQuery(this).find('select[name="attribute_value_id_'+product_id+'[]"]').length > 0) {
                attribute_value = jQuery(this).find('select[name="attribute_value_id_'+product_id+'[]"]').val().trim();
            }
            attribute_value_id.push(attribute_value);
        });
    }

    var post_url = "estimate_action_changes.php?get_product_combination_rate="+product_id+"&attribute_id_rate="+attribute_id+"&attribute_value_id_rate="+attribute_value_id;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                result = result.trim();
                if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
                    jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').val(result);
                }
                EstimateProductRowCheck(obj);
            }
        }
    });
}
function getCustomerState(customer_id) {
    var post_url = "estimate_action_changes.php?get_customer_state="+customer_id;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                result = result.trim();
                if(jQuery('input[name="party_state"]').length > 0) {
                    jQuery('input[name="party_state"]').val(result);
                }
                calTotal();
            }
        }
    });
}

function EstimateProductRowCheck(obj) {
    if(jQuery(obj).closest('tr.product_row').find('span.infos').length > 0) {
        jQuery(obj).closest('tr.product_row').find('span.infos').remove();
    }
    var quantity_check = 1; var quantity_error = 1; var price_check = 1; var price_error = 1;
    
    var gst_option = 0;
    if(jQuery('input[name="gst_option"]').length > 0) {
        gst_option = jQuery('input[name="gst_option"]').val().trim();
    }
    var tax_type = 0;
    if(jQuery('select[name="tax_type"]').length > 0) {
        tax_type = jQuery('select[name="tax_type"]').val().trim();
    }
    else {
        tax_type = 1;
    }
    var tax_option = 0;
    if(jQuery('select[name="tax_option"]').length > 0) {
        tax_option = jQuery('select[name="tax_option"]').val().trim();
    }
    var overall_tax = "";
    if(jQuery('select[name="overall_tax"]').length > 0) {
        overall_tax = jQuery('select[name="overall_tax"]').val().trim();
    }
    var product_tax = "";
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').length > 0) {
        product_tax = jQuery(obj).closest('tr.product_row').find('input[name="product_tax[]"]').val().trim();
    }

    var selected_quantity = "";
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').length > 0) {
        selected_quantity = jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').val().trim();
        if(typeof selected_quantity == "undefined" || selected_quantity == "" || selected_quantity == null) {
            quantity_check = 0;
        }
        else if(number_regex.test(selected_quantity) == false) {
            quantity_error = 0;
            if(jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').length > 0) {
                jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').parent().after('<span class="infos">Invalid Qty</span>');
            }
        }
        else if(parseInt(selected_quantity) > 99999) {
            quantity_error = 0;
            if(jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').length > 0) {
                jQuery(obj).closest('tr.product_row').find('input[name="product_quantity[]"]').parent().after('<span class="infos">Max Value : 99999</span>');
            }
        }
    }

    var selected_price = ""; var final_price = 0;
    if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
        selected_price = jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').val().trim();
        if(typeof selected_price == "undefined" || selected_price == "" || selected_price == null) {
            price_check = 0;
        }
        else if(price_regex.test(selected_price) == false) {
            price_error = 0;
            if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
                jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').parent().after('<span class="infos">Only numbers</span>');
            }
        }
        else if(parseFloat(selected_price) > 9999999.99) {
            price_error = 0;
            if(jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').length > 0) {
                jQuery(obj).closest('tr.product_row').find('input[name="product_price[]"]').parent().after('<span class="infos">Max Value : 9999999.99</span>');
            }
        }
        else {
            final_price = selected_price;
        }
    }
    
    if(parseInt(price_error) == 1) {
        if(parseInt(gst_option) == 1 && parseInt(price_check) == 1) {
            if(parseInt(tax_option) == 2) {
                if(parseInt(tax_type) == 1) {
                    if(product_tax != 0 && product_tax != "" && typeof product_tax != "undefined") {
                        product_tax = product_tax.replace('%', '');
                        product_tax = product_tax.trim();
                        final_price = (parseFloat(selected_price) * 100) / (100 + parseFloat(product_tax));
                        final_price = final_price.toFixed(2);
                    }
                }
                else if(parseInt(tax_type) == 2) {
                    if(overall_tax != 0 && overall_tax != "" && typeof overall_tax != "undefined") {
                        overall_tax = overall_tax.replace('%', '');
                        overall_tax = overall_tax.trim();
                        final_price = (parseFloat(selected_price) * 100) / (100 + parseFloat(overall_tax));
                        final_price = final_price.toFixed(2);
                    }
                }
            }
        }
        if(jQuery(obj).closest('tr.product_row').find('.final_price').length > 0) {
            jQuery(obj).closest('tr.product_row').find('.final_price').html(final_price);
        }
    }
    var selected_amount = 0;
    if(parseFloat(quantity_check) == 1 && parseFloat(quantity_error) == 1 && parseFloat(price_check) == 1 && parseFloat(price_error) == 1) {
        selected_amount = parseFloat(selected_quantity) * parseFloat(final_price);
        if(selected_amount != "" && selected_amount != 0 && typeof selected_amount != "undefined") {
            if(jQuery(obj).closest('tr.product_row').find('.product_amount').length > 0) {
                selected_amount = selected_amount.toFixed(2);
                jQuery(obj).closest('tr.product_row').find('.product_amount').html(selected_amount);
            }
        }
        else {
            if(jQuery(obj).closest('tr.product_row').find('.product_amount').length > 0) {
                jQuery(obj).closest('tr.product_row').find('.product_amount').html('');
            }
        }
    }
    else {
        if(jQuery(obj).closest('tr.product_row').find('.product_amount').length > 0) {
            jQuery(obj).closest('tr.product_row').find('.product_amount').html('');
        }
    }
    calTotal();
}
function OpenQueries(estimate_id) {
    var post_url = "estimate_action_changes.php?open_queries_modal="+estimate_id;
    jQuery.ajax({
        url: post_url, success: function (result) {
            if(result == "invalid_user") {
                window.location.reload();
            }
            else {
                result = result.trim();
                if(jQuery('#EstimateQueriesModal').find('modal-body').length > 0) {
                    jQuery('#EstimateQueriesModal').find('modal-body').html(result);
                }
                if(jQuery('.queries_modal_button').length > 0) {
                    jQuery('.queries_modal_button').trigger('click');
                }
            }
        }
    });
}