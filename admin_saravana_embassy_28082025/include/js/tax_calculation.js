// Just Call function CalTotal().
// Tax type - Productwise/Overall
// Tax Option - Exclusive/Inclusive
var number_regex = /^\d+$/;
var price_regex = /^(\d*\.)?\d+$/;

function GetTaxType(gst_option) {
    if(parseInt(gst_option) == 1) {
        if(jQuery('#tax_type_div').length > 0) {
            jQuery('#tax_type_div').removeClass('d-none');
        }
        if(jQuery('#tax_option_div').length > 0) {
            jQuery('#tax_option_div').removeClass('d-none');
        }
        if(jQuery('select[name="tax_type"]').length > 0) {
            jQuery('select[name="tax_type"]').val('').trigger('change');
        }
        if(jQuery('select[name="tax_option"]').length > 0) {
            jQuery('select[name="tax_option"]').val('').trigger('change');
        }
        if(jQuery('select[name="overall_tax"]').length > 0) {
            jQuery('select[name="overall_tax"]').val('').trigger('change');
        }
    }
    else {
        if(jQuery('#tax_type_div').length > 0) {
            jQuery('#tax_type_div').addClass('d-none');
        }
        if(jQuery('#tax_option_div').length > 0) {
            jQuery('#tax_option_div').addClass('d-none');
        }
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').addClass('d-none');
        }
        if(jQuery('select[name="tax_type"]').length > 0) {
            jQuery('select[name="tax_type"]').val('').trigger('change');
        }
        if(jQuery('select[name="tax_option"]').length > 0) {
            jQuery('select[name="tax_option"]').val('').trigger('change');
        }
        if(jQuery('select[name="overall_tax"]').length > 0) {
            jQuery('select[name="overall_tax"]').val('').trigger('change');
        }
    }
    calTotal();
}

function GetTaxValue(tax_type) {
    if(parseInt(tax_type) == 1) {
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').removeClass('d-none');
        }
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').addClass('d-none');
        }
    }
    else if(parseInt(tax_type) == 2) {
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').addClass('d-none');
        }
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').removeClass('d-none');
        }
    }
    else {
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').addClass('d-none');
        }
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').addClass('d-none');
        }
    }
    calTotal();
}

function calTotal() {
    SnoCalcPlus();
    if(jQuery('.sub_total').length > 0) {
        jQuery('.sub_total').html('');
    }
    if(jQuery('.discounted_total').length > 0) {
        jQuery('.discounted_total').html('');
    }
    if(jQuery('.extra_charges_total').length > 0) {
        jQuery('.extra_charges_total').html('');
    }
    if(jQuery('.cgst_value').length > 0) {
        jQuery('.cgst_value').html('');
    }
    if(jQuery('.sgst_value').length > 0) {
        jQuery('.sgst_value').html('');
    }
    if(jQuery('.igst_value').length > 0) {
        jQuery('.igst_value').html('');
    }
    if(jQuery('.total_tax_value').length > 0) {
        jQuery('.total_tax_value').html('');
    }
    if(jQuery('.round_off').length > 0) {
        jQuery('.round_off').html('');
    }
    if(jQuery('.overall_total').length > 0) {
        jQuery('.overall_total').html('');
    }
    var gst_option = 0;
    if(jQuery('input[name="gst_option"]').length > 0) {
        gst_option = jQuery('input[name="gst_option"]').val().trim();
    }

    var tax_type = 0;
    if(jQuery('select[name="tax_type"]').length > 0) {
        tax_type = jQuery('select[name="tax_type"]').val().trim();
    }
    else {
        tax_type = 1; // Default Productwise Tax
    }

    var tax_option = 0;
    if(jQuery('select[name="tax_option"]').length > 0) {
        tax_option = jQuery('select[name="tax_option"]').val().trim();
    }
    if(parseFloat(gst_option) == 1 && parseFloat(tax_option) == 2) {
        if(jQuery('.final_price_element').length > 0) {
            jQuery('.final_price_element').removeClass('d-none');
        }
    }
    else {
        if(jQuery('.final_price_element').length > 0) {
            jQuery('.final_price_element').addClass('d-none');
        }
    }

    var overall_tax = "";
    if(jQuery('select[name="overall_tax"]').length > 0) {
        overall_tax = jQuery('select[name="overall_tax"]').val().trim();
    }
	var amount_total = 0; 
	if(jQuery('.product_row').length > 0) {
		jQuery('.product_row').each(function(){
            var product_quantity = 0; var product_price = 0; var product_tax = ""; var final_price = 0; var product_amount = 0;
            if(jQuery(this).find('input[name="product_quantity[]"]').length > 0) {
                product_quantity = jQuery(this).find('input[name="product_quantity[]"]').val().trim();
            }
            if(jQuery(this).find('input[name="product_price[]"]').length > 0) {
                product_price = jQuery(this).find('input[name="product_price[]"]').val().trim();
            }
            if(jQuery(this).find('input[name="product_tax[]"]').length > 0) {
                product_tax = jQuery(this).find('input[name="product_tax[]"]').val().trim();
            }
            if(product_price !="" && product_price != 0 && typeof product_price != "undefined" && price_regex.test(product_price) == true && parseFloat(product_price) <= 9999999.99) {
                final_price = product_price;
                if(parseInt(gst_option) == 1) {
                    if(parseInt(tax_option) == 2) {
                        if(parseInt(tax_type) == 1) {
                            if(product_tax != 0 && product_tax != "" && typeof product_tax != "undefined") {
                                product_tax = product_tax.replace('%', '').trim();
                                final_price = (parseFloat(product_price) * 100) / (100 + parseFloat(product_tax));
                                final_price = final_price.toFixed(2);
                            }
                        }
                        else if(parseInt(tax_type) == 2) {
                            if(overall_tax != 0 && overall_tax != "" && typeof overall_tax != "undefined") {
                                overall_tax = overall_tax.replace('%', '').trim();
                                final_price = (parseFloat(product_price) * 100) / (100 + parseFloat(overall_tax));
                                final_price = final_price.toFixed(2);
                            }
                        }
                    }
                }
                
                if(jQuery(this).find('.final_price').length > 0) {
                    jQuery(this).find('.final_price').html(final_price);
                }
                if(product_quantity !="" && product_quantity != 0 && typeof product_quantity != "undefined" && price_regex.test(product_quantity) == true && parseInt(product_quantity) <= 99999) {
                    product_amount = parseInt(product_quantity) * parseFloat(final_price);
                    product_amount = product_amount.toFixed(2);
                    if(jQuery(this).find('.product_amount').length > 0) {
                        jQuery(this).find('.product_amount').html(product_amount);
                    }
                }
            }
			
			if (typeof product_amount != "undefined" && product_amount != "" && product_amount != 0 && price_regex.test(product_amount) == true) {
                amount_total = parseFloat(amount_total) + parseFloat(product_amount);
			}
		});
		if (typeof amount_total != "undefined" && amount_total != "" && amount_total != 0 && price_regex.test(amount_total) == true) {
            amount_total = amount_total.toFixed(2);
			if(jQuery('.sub_total').length > 0) {
                jQuery('.sub_total').html(amount_total);
            }
            if(jQuery('.discounted_total').length > 0) {
                jQuery('.discounted_total').html(amount_total);
            }
            if(jQuery('.extra_charges_total').length > 0) {
                jQuery('.extra_charges_total').html(amount_total);
            }
            if(jQuery('.overall_total').length > 0) {
                jQuery('.overall_total').html(amount_total);
            }
		}
	}
	checkDiscount();
}

function checkDiscount() {
	var sub_total = 0; var discounted_total = 0;
	var discount = ""; var discount_value = 0;
    if(jQuery('input[name="discount"]').length > 0) {
        discount = jQuery('input[name="discount"]').val().trim();
    }
    if(jQuery('.sub_total').length > 0) {
        sub_total = jQuery('.sub_total').html();
        sub_total = sub_total.replace(/ /g,'').trim();
    }
    if(discount != "" && discount != 0 && typeof discount != "undefined") {
        if(discount.indexOf('%') != -1) {
            discount = discount.replace('%', '').trim();
            if ((price_regex.test(discount) == false) || (parseFloat(discount) < 0) || (parseFloat(discount) >= 100)) {
                if(jQuery('.discount_value').length > 0) {
                    jQuery('.discount_value').html('<span class="text-danger">Invalid</span>');
                }
            }
            else {
                discount_value = (parseFloat(sub_total) * parseFloat(discount)) / 100;
                discount_value = discount_value.toFixed(2);
            }
        }
        else {
            if ((price_regex.test(discount) == false) || (parseFloat(discount) < 0) || (parseFloat(discount) >= parseFloat(sub_total))) {
                if(jQuery('.discount_value').length > 0) {
                    jQuery('.discount_value').html('<span class="text-danger">Invalid</span>');
                }
            }
            else {
                discount_value = parseFloat(discount);
                discount_value = discount_value.toFixed(2);
            }
        }
        if(discount_value != "" && discount_value != 0 && typeof discount_value != "undefined" && price_regex.test(discount_value) == true) {
            if(jQuery('.discount_value').length > 0) {
                jQuery('.discount_value').html(discount_value);
            }
            discounted_total = parseFloat(sub_total) - parseFloat(discount_value);
            discounted_total = discounted_total.toFixed(2);
            if (typeof discounted_total != "undefined" && discounted_total != "" && discounted_total != 0 && price_regex.test(discounted_total) == true) {
                if(jQuery('.discounted_total').length > 0) {
                    jQuery('.discounted_total').html(discounted_total);
                }
                if(jQuery('.extra_charges_total').length > 0) {
                    jQuery('.extra_charges_total').html(discounted_total);
                }
                if(jQuery('.overall_total').length > 0) {
                    jQuery('.overall_total').html(discounted_total);
                }
            }
        }
        else {
            if(jQuery('.discounted_total').length > 0) {
                jQuery('.discounted_total').html('');
            }
            if(jQuery('.extra_charges_total').length > 0) {
                jQuery('.extra_charges_total').html('');
            }
            if(jQuery('.cgst_value').length > 0) {
                jQuery('.cgst_value').html('');
            }
            if(jQuery('.sgst_value').length > 0) {
                jQuery('.sgst_value').html('');
            }
            if(jQuery('.igst_value').length > 0) {
                jQuery('.igst_value').html('');
            }
            if(jQuery('.total_tax_value').length > 0) {
                jQuery('.total_tax_value').html('');
            }
            if(jQuery('.round_off').length > 0) {
                jQuery('.round_off').html('');
            }
            if(jQuery('.overall_total').length > 0) {
                jQuery('.overall_total').html('');
            }
        }
    }
    else {
        if(jQuery('.discount_value').length > 0) {
            jQuery('.discount_value').html('');
        }
    }
	checkCharges();
}

function checkCharges() {
	var discounted_total = 0; var extra_charges_total = 0;
	var extra_charges = ""; var extra_charges_value = 0;

    if(jQuery('input[name="extra_charges"]').length > 0) {
        extra_charges = jQuery('input[name="extra_charges"]').val().trim();
    }
    if(jQuery('.discounted_total').length > 0) {
        discounted_total = jQuery('.discounted_total').html();
        discounted_total = discounted_total.replace(/ /g,'').trim();
    }
    if(jQuery('.extra_charges_total').length > 0) {
        extra_charges_total = jQuery('.extra_charges_total').html();
        extra_charges_total = extra_charges_total.replace(/ /g,'').trim();
    }
    if(extra_charges != "" && extra_charges != 0 && typeof extra_charges != "undefined") {
        if(extra_charges.indexOf('%') != -1) {
            extra_charges = extra_charges.replace('%', '').trim();
            if ((price_regex.test(extra_charges) == false) || (parseFloat(extra_charges) < 0) || (parseFloat(extra_charges) >= 100)) {
                if(jQuery('.extra_charges_value').length > 0) {
                    jQuery('.extra_charges_value').html('<span class="text-danger">Invalid</span>');
                }
            }
            else {
                extra_charges_value = (parseFloat(discounted_total) * parseFloat(extra_charges)) / 100;
                extra_charges_value = extra_charges_value.toFixed(2);
            }
        }
        else {
            if ((price_regex.test(extra_charges) == false) || (parseFloat(extra_charges) < 0) || (parseFloat(extra_charges) > parseFloat(discounted_total))) {
                if(jQuery('.extra_charges_value').length > 0) {
                    jQuery('.extra_charges_value').html('<span class="text-danger">Invalid</span>');
                }
            }
            else {
                extra_charges_value = parseFloat(extra_charges);
                extra_charges_value = extra_charges_value.toFixed(2);
            }
        }
        if(extra_charges_value != "" && extra_charges_value != 0 && typeof extra_charges_value != "undefined" && price_regex.test(extra_charges_value) == true) {
            if(jQuery('.extra_charges_value').length > 0) {
                jQuery('.extra_charges_value').html(extra_charges_value);
            }
            extra_charges_total = parseFloat(discounted_total) + parseFloat(extra_charges_value);
            extra_charges_total = extra_charges_total.toFixed(2);
            if (typeof extra_charges_total != "undefined" && extra_charges_total != "" && extra_charges_total != 0 && price_regex.test(extra_charges_total) == true) {
                if(jQuery('.extra_charges_total').length > 0) {
                    jQuery('.extra_charges_total').html(extra_charges_total);
                }
                if(jQuery('.overall_total').length > 0) {
                    jQuery('.overall_total').html(extra_charges_total);
                }
            }
        }
        else {
            if(jQuery('.extra_charges_total').length > 0) {
                jQuery('.extra_charges_total').html('');
            }
            if(jQuery('.cgst_value').length > 0) {
                jQuery('.cgst_value').html('');
            }
            if(jQuery('.sgst_value').length > 0) {
                jQuery('.sgst_value').html('');
            }
            if(jQuery('.igst_value').length > 0) {
                jQuery('.igst_value').html('');
            }
            if(jQuery('.total_tax_value').length > 0) {
                jQuery('.total_tax_value').html('');
            }
            if(jQuery('.round_off').length > 0) {
                jQuery('.round_off').html('');
            }
            if(jQuery('.overall_total').length > 0) {
                jQuery('.overall_total').html('');
            }
        }
    }
    else {
        if(jQuery('.extra_charges_value').length > 0) {
            jQuery('.extra_charges_value').html('');
        }
    }
    getGST();
}

function getGST() {
    var gst_option = ""; var tax_option = ""; var tax_type = ""; var bill_type = "";
	if(jQuery('input[name="gst_option"]').length > 0) {
        gst_option = jQuery('input[name="gst_option"]').val().trim();
    }
    if(jQuery('select[name="tax_type"]').length > 0) {
        tax_type = jQuery('select[name="tax_type"]').val().trim();
    }
    else {
        tax_type = 1; // Default Productwise Tax.
    }
    if(jQuery('select[name="tax_option"]').length > 0) {
        tax_option = jQuery('select[name="tax_option"]').val().trim();
    }
    if(jQuery('input[name="bill_type"]').length > 0) {
        bill_type = jQuery('input[name="bill_type"]').val();
    }
    var company_state = "";
    if(jQuery('input[name="company_state"]').length > 0) {
        company_state = jQuery('input[name="company_state"]').val().trim();
    }
    var party_state = "";
    if(jQuery('input[name="party_state"]').length > 0) {
        party_state = jQuery('input[name="party_state"]').val().trim();
    }
    if(parseInt(tax_type) == 1) {
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').removeClass('d-none');
        }
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').addClass('d-none');
        }
    }
    else if(parseInt(tax_type) == 2) {
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').addClass('d-none');
        }
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').removeClass('d-none');
        }
    }
    else {
        if(jQuery('#overall_tax_div').length > 0) {
            jQuery('#overall_tax_div').addClass('d-none');
        }
        if(jQuery('.tax_element').length > 0) {
            jQuery('.tax_element').addClass('d-none');
        }
    }
    if(parseInt(gst_option) == 1) {
        if(company_state == party_state) {
            if(jQuery('.cgst_value').length > 0) {
                jQuery('.cgst_value').closest('tr').removeClass('d-none');
            }
            if(jQuery('.sgst_value').length > 0) {
                jQuery('.sgst_value').closest('tr').removeClass('d-none');
            }
            if(jQuery('.igst_value').length > 0) {
                jQuery('.igst_value').closest('tr').addClass('d-none');
            }
        }
        else {
            if(jQuery('.cgst_value').length > 0) {
                jQuery('.cgst_value').closest('tr').addClass('d-none');
            }
            if(jQuery('.sgst_value').length > 0) {
                jQuery('.sgst_value').closest('tr').addClass('d-none');
            }
            if(jQuery('.igst_value').length > 0) {
                jQuery('.igst_value').closest('tr').removeClass('d-none');
            }
        }
        if(jQuery('.total_tax_value').length > 0) {
            jQuery('.total_tax_value').closest('tr').removeClass('d-none');
        }
    }
    else {
        if(jQuery('.cgst_value').length > 0) {
            jQuery('.cgst_value').closest('tr').addClass('d-none');
        }
        if(jQuery('.sgst_value').length > 0) {
            jQuery('.sgst_value').closest('tr').addClass('d-none');
        }
        if(jQuery('.igst_value').length > 0) {
            jQuery('.igst_value').closest('tr').addClass('d-none');
        }
        if(jQuery('.total_tax_value').length > 0) {
            jQuery('.total_tax_value').closest('tr').addClass('d-none');
        }
    }
    // Change Colspan Here.
    var colspan1 = ""; var colspan2 = "";
    // if(bill_type == "Purchase Bill" || bill_type == "Debit Note" || bill_type == "Debit Invoice") {
        colspan1 = 5; colspan2 = 3;
        if(parseInt(gst_option) == 1) {
            if(parseInt(tax_type) == 1) {
                if(parseInt(tax_option) == 2) {
                    colspan1 = 6; colspan2 = 4;
                }
                else {
                    colspan1 = 5; colspan2 = 3;
                }
            }
            else if(parseInt(tax_type) == 2) {
                if(parseInt(tax_option) == 2) {
                    colspan1 = 5; colspan2 = 3;
                }
            }
        } 
    // }

    if(jQuery('.sub_total').length > 0) {
        jQuery('.sub_total').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.discount_value').length > 0) {
        jQuery('.discount_value').closest('tr').find('td:first').attr('colspan',colspan2);
    }
    if(jQuery('.discounted_total').length > 0) {
        jQuery('.discounted_total').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.extra_charges_value').length > 0) {
        jQuery('.extra_charges_value').closest('tr').find('td:first').attr('colspan',colspan2);
    }
    if(jQuery('.extra_charges_total').length > 0) {
        jQuery('.extra_charges_total').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.cgst_value').length > 0) {
        jQuery('.cgst_value').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.sgst_value').length > 0) {
        jQuery('.sgst_value').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.igst_value').length > 0) {
        jQuery('.igst_value').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.total_tax_value').length > 0) {
        jQuery('.total_tax_value').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.round_off').length > 0) {
        jQuery('.round_off').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    if(jQuery('.overall_total').length > 0) {
        jQuery('.overall_total').closest('tr').find('td:first').attr('colspan',colspan1);
    }
    checkGST();
}

function checkGST() {
    var gst_option = ""; var tax_type = ""; var tax_option = ""; var cgst_value = 0; var sgst_value = 0; var igst_value = 0; 
    var total_tax_value = 0; var greater_tax = 0; var str_tax = 0; var overall_tax_value = 0; var total_value = 0;
    if(jQuery('.cgst_value').length > 0) {
        jQuery('.cgst_value').html('');
    }
    if(jQuery('.sgst_value').length > 0) {
        jQuery('.sgst_value').html('');
    }
    if(jQuery('.igst_value').length > 0) {
        jQuery('.igst_value').html('');
    }
    if(jQuery('.total_tax_value').length > 0) {
        jQuery('.total_tax_value').html('');
    }
    if(jQuery('.round_off').length > 0) {
        jQuery('.round_off').html('');
    }
    if(jQuery('.overall_total').length > 0) {
        jQuery('.overall_total').html('');
    }
    if(jQuery('input[name="gst_option"]').length > 0) {
        gst_option = jQuery('input[name="gst_option"]').val().trim();
    }
    if(jQuery('select[name="tax_type"]').length > 0) {
        tax_type = jQuery('select[name="tax_type"]').val().trim();
    }
    else {
        tax_type = 1; // Default Productwise Tax.
    }
    if(jQuery('select[name="tax_option"]').length > 0) {
        tax_option = jQuery('select[name="tax_option"]').val().trim();
    }
    var sub_total = 0;
    if(jQuery('.sub_total').length > 0) {
        sub_total = jQuery('.sub_total').html().trim();
    }
    var extra_charges_value = 0;
    if(jQuery('.extra_charges_value').length > 0) {
        extra_charges_value = jQuery('.extra_charges_value').html().trim();
    }
    var extra_charges_total = 0;
    if(jQuery('.extra_charges_total').length > 0) {
        extra_charges_total = jQuery('.extra_charges_total').html().trim();
    }
    var company_state = "";
    if(jQuery('input[name="company_state"]').length > 0) {
        company_state = jQuery('input[name="company_state"]').val().trim();
    }
    var party_state = "";
    if(jQuery('input[name="party_state"]').length > 0) {
        party_state = jQuery('input[name="party_state"]').val().trim();
    }
    if(parseInt(gst_option) == 1) {
        if(parseInt(tax_type) == 1) {
            if(jQuery('.product_row').length > 0) {
                jQuery('.product_row').each(function() {
                    var product_amount = 0; var discount = ""; var discounted_amount = 0; var tax_percentage = ""; var tax = "";
                    var tax_value = 0;
                    product_amount = jQuery(this).find('.product_amount').html();
                    product_amount = product_amount.replace(/ /g,'').trim();
                    if(jQuery(this).find('input[name="product_tax[]"]').length > 0) {
                        tax_percentage = jQuery(this).find('input[name="product_tax[]"]').val().trim();
                        tax = tax_percentage.replace('%', '');
                        tax = tax.trim();
                    }
                    if (parseFloat(tax) > parseFloat(str_tax)) {
                        greater_tax = tax;
                    } 
                    else {
                        greater_tax = str_tax;
                    }
                    str_tax = greater_tax;
                    if(product_amount != "" && product_amount != 0 && typeof product_amount != "undefined" && price_regex.test(product_amount) == true) {
                        if(jQuery('input[name="discount"]').length > 0) {
                            discount = jQuery('input[name="discount"]').val().trim();
                        }
                        if(discount != "" && discount != 0 && typeof discount != "undefined") {
                            if(discount.indexOf('%') != -1) {
                                discount = discount.replace('%', '').trim();
                                if ((price_regex.test(discount) == true) && (parseFloat(discount) > 0) && (parseFloat(discount) <= 100)) {
                                    discounted_amount = product_amount - ((parseFloat(product_amount) * parseFloat(discount)) / 100);
                                    discounted_amount = discounted_amount.toFixed(2);
                                }
                            }
                            else {
                                if ((price_regex.test(discount) == true) && (parseFloat(discount) > 0) && (parseFloat(discount) <= parseFloat(sub_total))) {
                                    var discount_percent = "";
                                    discount_percent = (discount / sub_total) * 100;
                                    discounted_amount = product_amount - ((parseFloat(product_amount) * parseFloat(discount_percent)) / 100);
                                    discounted_amount = discounted_amount.toFixed(2);
                                }
                            }
                        }
                        else {
                            discounted_amount = product_amount;
                        }
                        if(discounted_amount != "" && discounted_amount != 0 && typeof discounted_amount != "undefined" && price_regex.test(discounted_amount) == true) {
                            tax_value = (parseFloat(discounted_amount) * parseFloat(tax)) / 100;
                            total_tax_value = parseFloat(total_tax_value) + parseFloat(tax_value);
                        }
                    }
                });
                var extra_charges_tax = 0;
                if(extra_charges_value != "" && extra_charges_value != 0 && typeof extra_charges_value != "undefined" && price_regex.test(extra_charges_value) == true && greater_tax != "" && greater_tax != 0) {
                    extra_charges_tax = (parseFloat(extra_charges_value) * parseFloat(greater_tax)) / 100;
                    total_tax_value = parseFloat(total_tax_value) + parseFloat(extra_charges_tax);
                }
                overall_tax_value = total_tax_value;
                overall_tax_value = overall_tax_value.toFixed(2);
                if(overall_tax_value != "" && typeof overall_tax_value != "undefined" && price_regex.test(overall_tax_value) == true) {
                    if(company_state == party_state) {
                        cgst_value = parseFloat(overall_tax_value) / 2;
                        cgst_value = cgst_value.toFixed(2);
                        sgst_value = parseFloat(overall_tax_value) / 2;
                        sgst_value = sgst_value.toFixed(2);
                        if(jQuery('.cgst_value').length > 0) {
                            jQuery('.cgst_value').html(cgst_value);
                        }
                        if(jQuery('.sgst_value').length > 0) {
                            jQuery('.sgst_value').html(sgst_value);
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').html(overall_tax_value);
                        }
                        if(jQuery('.cgst_value').length > 0) {
                            jQuery('.cgst_value').closest('tr').find('td:first').html('CGST :');
                        }
                        if(jQuery('.sgst_value').length > 0) {
                            jQuery('.sgst_value').closest('tr').find('td:first').html('SGST :');
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').closest('tr').find('td:first').html('Total Tax :');
                        }
                    }
                    else {
                        igst_value = overall_tax_value;
                        if(jQuery('.igst_value').length > 0) {
                            jQuery('.igst_value').html(igst_value);
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').html(overall_tax_value);
                        }
                        if(jQuery('.igst_value').length > 0) {
                            jQuery('.igst_value').closest('tr').find('td:first').html('IGST :');
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').closest('tr').find('td:first').html('Total Tax :');
                        }
                    }
                }
            }
        }
        else {
            var overall_tax = ""; var tax_percentage = "";
            if(jQuery('select[name="overall_tax"]').length > 0) {
                overall_tax = jQuery('select[name="overall_tax"]').val().trim();
            }
            if(overall_tax != 0 && overall_tax != "" && typeof overall_tax != "undefined") {
                overall_tax = overall_tax.trim();
                tax_percentage = overall_tax;
                overall_tax = overall_tax.replace('%', '').trim();
                if(extra_charges_total != "" && extra_charges_total != 0 && typeof extra_charges_total != "undefined" && price_regex.test(extra_charges_total) == true) {
                    overall_tax_value = (parseFloat(extra_charges_total) * parseFloat(overall_tax)) / 100;
                    overall_tax_value = overall_tax_value.toFixed(2);
                }
                if(overall_tax_value != "" && typeof overall_tax_value != "undefined" && price_regex.test(overall_tax_value) == true) {
                    if(company_state == party_state) {
                        overall_tax = parseFloat(overall_tax) / 2;
                        cgst_value = parseFloat(overall_tax_value) / 2;
                        cgst_value = cgst_value.toFixed(2);
                        sgst_value = parseFloat(overall_tax_value) / 2;
                        sgst_value = sgst_value.toFixed(2);
                        if(jQuery('.cgst_value').length > 0) {
                            jQuery('.cgst_value').html(cgst_value);
                        }
                        if(jQuery('.sgst_value').length > 0) {
                            jQuery('.sgst_value').html(sgst_value);
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').html(overall_tax_value);
                        }
                        if(jQuery('.cgst_value').length > 0) {
                            jQuery('.cgst_value').closest('tr').find('td:first').html('CGST('+overall_tax+'%) :');
                        }
                        if(jQuery('.sgst_value').length > 0) {
                            jQuery('.sgst_value').closest('tr').find('td:first').html('SGST('+overall_tax+'%) :');
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').closest('tr').find('td:first').html('Total Tax('+tax_percentage+') :');
                        }
                    }
                    else {
                        igst_value = overall_tax_value;
                        if(jQuery('.igst_value').length > 0) {
                            jQuery('.igst_value').html(igst_value);
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').html(overall_tax_value);
                        }
                        if(jQuery('.igst_value').length > 0) {
                            jQuery('.igst_value').closest('tr').find('td:first').html('IGST('+tax_percentage+') :');
                        }
                        if(jQuery('.total_tax_value').length > 0) {
                            jQuery('.total_tax_value').closest('tr').find('td:first').html('Total Tax('+tax_percentage+') :');
                        }
                    }
                }
            }
        }
        if(overall_tax_value != "" && overall_tax_value != 0 && typeof overall_tax_value != "undefined" && price_regex.test(overall_tax_value) == true) {
            if(extra_charges_total != "" && extra_charges_total != 0 && typeof extra_charges_total != "undefined" && price_regex.test(extra_charges_total) == true) {
                total_value = parseFloat(extra_charges_total) + parseFloat(overall_tax_value);
                total_value = total_value.toFixed(2);
                if(jQuery('.overall_total').length > 0) {
                    jQuery('.overall_total').html(total_value);
                }
            }
        }
        else {
            if(extra_charges_total != "" && extra_charges_total != 0 && typeof extra_charges_total != "undefined" && price_regex.test(extra_charges_total) == true) {
                if(jQuery('.overall_total').length > 0) {
                    jQuery('.overall_total').html(extra_charges_total);
                }
            }
        }
    }
    else {
        if(extra_charges_total != "" && extra_charges_total != 0 && typeof extra_charges_total != "undefined" && price_regex.test(extra_charges_total) == true) {
            if(jQuery('.overall_total').length > 0) {
                jQuery('.overall_total').html(extra_charges_total);
            }
        }
    }
    checkOverallAmount();
}

function checkOverallAmount() {
	var overall_total = 0; var total = 0;
	if(jQuery('.overall_total').length > 0) {
        overall_total = jQuery('.overall_total').html();
		overall_total = overall_total.replace(/ /g,'').trim();

		if (typeof overall_total != "undefined" && overall_total != "" && overall_total != 0) {
            if(price_regex.test(overall_total) == true) {
				total = parseFloat(total) + parseFloat(overall_total);
				var decimal = ""; var round_off = '';
				var numbers = total.toString().split('.');							
				if( typeof numbers[1] != 'undefined') {
					decimal = numbers[1];
				}
				if(decimal != "" && parseInt(decimal) != 0) {					
					if(decimal.length == 1) {
						decimal = decimal+'0';
					}
					if(parseFloat(decimal) >= 50) {
						var round_off = 0;
						round_off = 100 - parseFloat(decimal);
						
						if( typeof round_off != 'undefined' && round_off != '' && round_off != 0) {
							if(round_off.toString().length == 1) {
								round_off = "0.0"+round_off;
							}
							else {
								round_off = "0."+round_off;
							}
							jQuery('.round_off').html(round_off);
							total = parseFloat(total) + parseFloat(round_off);
						}
					}
					else {
						decimal = "0."+decimal;
						jQuery('.round_off').html('- '+decimal);
						total = parseFloat(total) - parseFloat(decimal);
					}				
					total = total.toFixed(2);
				}
				else {
                    total = total.toFixed(2);
					jQuery('.round_off').html('0.00');
				}
			}
		}
	}	
	if (typeof total != "undefined" && total != "" && total != 0 && price_regex.test(total) == true) {
		if(jQuery('.overall_total').length > 0) {
			jQuery('.overall_total').html(total);
		}
	}
}
