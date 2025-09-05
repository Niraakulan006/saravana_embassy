<?php
	include("include_files.php");

	if(isset($_REQUEST['show_estimate_id'])) { 
        $show_estimate_id = trim($_REQUEST['show_estimate_id']);

        $estimate_date = date('Y-m-d'); $customer_id = ""; $estimate_type = ""; $gst_option = 1; $tax_option = ""; $product_count = 1;
        $party_state = ""; $company_state = "";
        $company_state = $obj->getTableColumnValue($GLOBALS['company_table'], 'primary_company', '1', 'state');

        $customer_list = array();
        $customer_list = $obj->getTableRecords($GLOBALS['customer_table'], '', '');
        $customer_count = 0;
        if(!empty($customer_list)) {
            $customer_count = count($customer_list);
        }
        $product_list = array();
        $product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '');
        ?>
        <form class="poppins pd-20" name="estimate_form" method="POST">
            <style>
                td {
                    vertical-align : middle !important;
                }
            </style>
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(!empty($show_estimate_id)) { ?>
                            <div class="h5">Edit Estimate</div>
                        <?php } else { ?>
                            <div class="h5">Add Estimate</div>
                        <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('estimate.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row mx-0 py-1">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_estimate_id)) { echo $show_estimate_id; } ?>">
                <div class="col-lg-2 col-md-3 col-6 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="date" name="estimate_date" class="form-control shadow-none" placeholder="" value="<?php if(!empty($estimate_date)) { echo $estimate_date; } ?>">
                            <label>Date <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border chargesaction">
                            <div class="input-group">
                                <select name="customer_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getCustomerState(this.value);">
                                    <option value="">Select Customer</option>
                                    <?php
                                        if(!empty($customer_list)) {
                                            foreach($customer_list as $data) {
                                                if(!empty($data['customer_id']) && $data['customer_id'] != $GLOBALS['null_value']) {
                                                    ?>
                                                    <option value="<?php echo $data['customer_id']; ?>" <?php if($customer_count == '1' || (!empty($customer_id) && $customer_id == $data['customer_id'])) { ?>selected<?php } ?>>
                                                        <?php
                                                            if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
                                                                echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
                                                            }
                                                        ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                                <label>Customer <span class="text-danger">*</span></label>
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color:#f06548!important; cursor:pointer; height:100%;"><i class="fa fa-plus text-white"></i></span>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <script type="text/javascript">
                    <?php if($customer_count == '1') { ?>
                        if(jQuery('select[name="customer_id"]').length > 0) {
                            jQuery('select[name="customer_id"]').trigger('change');
                        }
                    <?php } ?>
                </script>
                <div class="col-lg-3 col-md-6 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select name="estimate_type" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select Type</option>
                                <option value="1" <?php if($estimate_type == '1') { ?>selected<?php } ?>>Credit Bill</option>
                                <option value="2" <?php if($estimate_type == '2') { ?>selected<?php } ?>>Counter Sales</option>
                            </select>
                            <label>Estimate Type <span class="text-danger">*</span></label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-1 col-md-3 col-6 py-1 d-none">
                    <div class="form-group" style="width:100px !important;">
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <label for="gst_option" class="form-label text-success fw-bold">GST</label>
                                <input name="gst_option" id="gst_option" class="form-check-input code-switcher" onchange="Javascript:OnOffButton('gst_option');" type="checkbox" value="<?php if($gst_option == '1'){echo '1';} else {echo '0';} ?>" <?php if($gst_option == '1'){ ?>checked="checked"<?php } ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 py-2" id="tax_option_div">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select name="tax_option" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:calTotal();">
                                <option value="">Select Tax Option</option>
                                <option value="1" <?php if($tax_option == '1') { ?>selected<?php } ?>>Exclusive</option>
                                <option value="2" <?php if($tax_option == '2') { ?>selected<?php } ?>>Inclusive</option>
                            </select>
                            <label>Tax Option <span class="text-danger">*</span></label>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row mx-0 py-1">
                <div class="col-lg-2 col-md-4 col-6 text-end ms-auto">
                    <div class="form-group">
                        <button class="btn btn-success py-2 add_product_button" style="font-size:11px; width:120px;" type="button" onclick="Javascript:AddEstimateProductRow();"><i class="bi bi-plus-circle"></i>&nbsp; Add New Row</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mx-0 py-1">
                <div class="col-lg-12">
                    <div class="table-responsive text-center">
                        <input type="hidden" name="product_count" value="<?php echo $product_count; ?>">
                        <input type="hidden" name="company_state" value="<?php echo $company_state; ?>">
                        <input type="hidden" name="party_state" value="<?php echo $party_state; ?>">
                        <table class="table nowrap cursor smallfnt w-100 table-bordered text-center product_table">
                            <thead class="bg-dark smallfnt">
                                <tr style="white-space:pre;">
                                    <th style="min-width:50px;">#</th>
                                    <th style="min-width:300px;">Product Name</th>
                                    <th style="min-width:300px;">Attribute & Value</th>
                                    <th style="min-width:80px;">QTY</th>
                                    <th style="min-width:80px;">Rate</th>
                                    <th style="min-width:80px;" class="tax_element">Tax</th>
                                    <th style="min-width:80px;" class="final_price_element d-none">Final Rate</th>
                                    <th style="min-width:80px;">Amount</th>
                                    <th style="min-width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="product_row" id="product_row1">
                                    <th class="text-center px-2 py-2 sno">
                                        1
                                    </th>
                                    <th class="text-center px-2 py-2 product_element">
                                        <div class="form-group in-border">
                                            <div class="form-label-group">
                                                <select name="product_id[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:GetProductAttribute(this);">
                                                    <option value="">Select Product</option>
                                                    <?php
                                                        if(!empty($product_list)) {
                                                            foreach($product_list as $data) {
                                                                if(!empty($data['product_id']) && $data['product_id'] != $GLOBALS['null_value']) {
                                                                    ?>
                                                                    <option value="<?php echo $data['product_id']; ?>">
                                                                        <?php
                                                                            if(!empty($data['name']) && $data['name'] != $GLOBALS['null_value']) {
                                                                                echo $obj->encode_decode('decrypt', $data['name']);
                                                                            }
                                                                        ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="text-center px-2 py-2 attribute_element">
                                        <div class="row mx-0 attribute_row">
                                            <div class="col-5" style="align-content:center;">
                                                <div class="form-group">
                                                    Attribute :
                                                </div>
                                                <input type="hidden" name="attribute_id[]" value="">
                                            </div>
                                            <div class="col-7" style="align-content:center;">
                                                <div class="form-group in-border">
                                                    <div class="form-label-group">
                                                        <select name="attribute_value_id[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                            <option value="">Select Value</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="text-center px-2 py-2 qty_element">
                                        <div class="form-group">
                                            <div class="in-border">
                                                <input type="text" name="product_quantity[]" class="form-control shadow-none mx-auto" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'number',5,1);" placeholder="QTY" onkeyup="Javascript:EstimateProductRowCheck(this);">
                                            </div>
                                        </div>
                                    </th>
                                    <th class="text-center px-2 py-2 price_element">
                                        <div class="form-group">
                                            <div class="in-border">
                                                <input type="text" name="product_price[]" class="form-control shadow-none mx-auto" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'number',10,1);" placeholder="Rate" onkeyup="Javascript:EstimateProductRowCheck(this);">
                                            </div>
                                        </div>
                                    </th>
                                    <th class="text-center px-2 py-2 tax_element" style="vertical-align:middle !important;">
                                        <div class="form-group product_tax">
                                            0%
                                        </div>
                                        <input type="hidden" name="product_tax[]" value="0%">
                                    </th>
                                    <th class="text-center px-2 py-2 final_price_element d-none" style="vertical-align:middle !important;">
                                        <div class="form-group pe-2 text-end final_price">0.00</div>
                                    </th>
                                    <th class="text-center px-2 py-2 amount_element" style="vertical-align:middle !important;">
                                        <div class="form-group pe-2 text-end product_amount">0.00</div>
                                    </th>
                                    <th class="text-center px-2 py-2 action_element" style="vertical-align:middle !important;">
                                        <a class="pe-2 h5 copy_button" style="cursor:pointer;" onclick="Javascript:CopyEstimateProductRow(this);"><i class="fa fa-files-o text-danger"></i></a>
                                        <a class="pe-2 h5 delete_button" onclick="Javascript:DeleteEstimateProductRow('product_row', '1');" style="cursor:pointer;"><i class="fa fa-trash text-danger"></i></a>
                                    </th>
                                </tr>
                                <tr class="subtotal_row">
                                    <td colspan="5" class="text-end fw-bold">Subtotal : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold sub_total">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="discount_row">
                                    <td colspan="3" class="text-right">
                                        <input type="text" style="width:200px; float:right;" name="discount_name" class="form-control" placeholder="Discount Name" value="Extra Discount">
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <input style="width:200px;" type="text" name="discount" class="form-control" placeholder="Discount Value" onkeyup="Javascript:calTotal();">
                                    </td>
                                    <td colspan="2" class="text-end pe-2 fw-bold discount_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="discounted_total_row">
                                    <td colspan="5" class="text-end fw-bold">Discounted Total : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold discounted_total">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="charges_row">
                                    <td colspan="3" class="text-right">
                                        <input type="text" style="width:200px; float:right;" name="extra_charges_name" class="form-control" placeholder="Extra Charges Name" value="Extra Charges">
                                    </td>
                                    <td colspan="2" class="text-right">
                                        <input style="width:200px;" type="text" name="extra_charges" class="form-control" placeholder="Charges Value" onkeyup="Javascript:calTotal();">
                                    </td>
                                    <td colspan="2" class="text-end pe-2 fw-bold extra_charges_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="extra_charges_total_row">
                                    <td colspan="5" class="text-end fw-bold">Total : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold extra_charges_total">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="cgst_value_row d-none">
                                    <td colspan="5" class="text-end fw-bold">CGST : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold cgst_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="sgst_value_row d-none">
                                    <td colspan="5" class="text-end fw-bold">SGST : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold sgst_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="igst_value_row d-none">
                                    <td colspan="5" class="text-end fw-bold">IGST : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold igst_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="total_tax_value_row d-none">
                                    <td colspan="5" class="text-end fw-bold">Total Tax : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold total_tax_value">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="round_off_row">
                                    <td colspan="5" class="text-end fw-bold">Round Off : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold round_off">0.00</td>
                                    <td></td>
                                </tr>
                                <tr class="bill_total_row">
                                    <td colspan="5" class="text-end fw-bold">Bill Amount : &nbsp;</td>
                                    <td colspan="2" class="text-end pe-2 fw-bold overall_total">0.00</td>
                                    <td></td>
                                </tr>
                            </tbody> 
                        </table>
                    </div>
                </div>    
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button" onclick="Javascript:SaveModalContent('estimate_form', 'estimate_changes.php', 'estimate.php');">
                        Submit
                    </button>
                </div>
            </div>    
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
        </form>
		<?php
    } 
    if(isset($_POST['edit_id'])) {
        $estimate_date = ""; $estimate_date_error = ""; $customer_id = ""; $customer_id_error = ""; $estimate_type = ""; $estimate_type_error = ""; $tax_option = ""; $tax_option_error = ""; $gst_option = ""; $product_ids = array(); $product_names = array(); $attribute_ids = array(); $attribute_names = array(); $attribute_value_ids = array(); $attribute_value_names = array(); $product_quantity = array();
        $product_price = array(); $product_tax = array(); $final_price = array(); $product_amount = array(); $sub_total = 0;
        $discount_name = ""; $discount_name_error = ""; $discount = ""; $discount_error = ""; $discount_value = 0; $discounted_total = 0; $extra_charges_name = ""; $extra_charges_name_error = ""; $extra_charges = ""; $extra_charges_error = ""; $extra_charges_value = ""; $extra_charges_total = 0; $taxable_value = 0; $company_state = ""; $party_state = ""; $cgst_value = 0; $sgst_value = 0; $igst_value = 0; $round_off = ""; $total_tax_value = 0; $bill_total = 0; $total_quantity = 0; $total_amount = 0;

        $valid_estimate = ""; $form_name = "estimate_form"; $edit_id = ""; $estimate_error = "";

        $company_state = $obj->getTableColumnValue($GLOBALS['company_table'], 'primary_company', '1', 'state');

        if(isset($_POST['edit_id'])) {
            $edit_id = trim($_POST['edit_id']);
        }
        if(isset($_POST['estimate_date'])) {
            $estimate_date = trim($_POST['estimate_date']);
            $estimate_date_error = $valid->valid_date(date('d-m-Y', strtotime($estimate_date)), 'Bill Date', '1');
            if(!empty($estimate_date_error)) {
                if(!empty($valid_estimate)) {
                    $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'estimate_date', $estimate_date_error, 'text');
                }
                else {
                    $valid_estimate = $valid->error_display($form_name, 'estimate_date', $estimate_date_error, 'text');
                }
            }
        }
        if(isset($_POST['customer_id'])) {
            $customer_id = trim($_POST['customer_id']);
            $customer_id_error = $valid->common_validation($customer_id, 'Customer', 'select');
            if(!empty($customer_id_error)) {
                if(!empty($valid_estimate)) {
                    $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'customer_id', $customer_id_error, 'select');
                }
                else {
                    $valid_estimate = $valid->error_display($form_name, 'customer_id', $customer_id_error, 'select');
                }
            }
            else {
                $party_state = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'state');
            }
        }
        if(isset($_POST['estimate_type'])) {
            $estimate_type = trim($_POST['estimate_type']);
            $estimate_type_error = $valid->common_validation($estimate_type, 'Estimate Type', 'select');
            if(!empty($estimate_type_error)) {
                if(!empty($valid_estimate)) {
                    $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'estimate_type', $estimate_type_error, 'select');
                }
                else {
                    $valid_estimate = $valid->error_display($form_name, 'estimate_type', $estimate_type_error, 'select');
                }
            }
        }
        if(isset($_POST['gst_option'])) {
            $gst_option = trim($_POST['gst_option']);
        }
        if($gst_option == '1') {
            if(isset($_POST['tax_option'])) {
                $tax_option = trim($_POST['tax_option']);
                $tax_option_error = $valid->common_validation($tax_option, 'Tax Option', 'select');
                if(!empty($tax_option_error)) {
                    if(!empty($valid_estimate)) {
                        $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'tax_option', $tax_option_error, 'select');
                    }
                    else {
                        $valid_estimate = $valid->error_display($form_name, 'tax_option', $tax_option_error, 'select');
                    }
                }
            }
        }
        if(isset($_POST['product_id'])) {
            $product_ids = $_POST['product_id'];
        }
        if(isset($_POST['product_quantity'])) {
            $product_quantity = $_POST['product_quantity'];
        }
        if(isset($_POST['product_price'])) {
            $product_price = $_POST['product_price'];
        }
        if(isset($_POST['product_tax'])) {
            $product_tax = $_POST['product_tax'];
        }
        if(!empty($product_ids)) {
            for($i=0; $i < count($product_ids); $i++) {
                $product_ids[$i] = trim($product_ids[$i]);

                $attribute_id_array = array(); $attribute_value_id_array = array(); $attribute_name_array = array(); $attribute_value_name_array = array();
                if(isset($_POST['attribute_id_'.$product_ids[$i]])) {
                    $attribute_id_array = $_POST['attribute_id_'.$product_ids[$i]];
                }
                if(isset($_POST['attribute_value_id_'.$product_ids[$i]])) {
                    $attribute_value_id_array = $_POST['attribute_value_id_'.$product_ids[$i]];
                }
                if(!empty($attribute_id_array)) {
                    for($j=0; $j < count($attribute_id_array); $j++) {
                        $attribute_id_array[$j] = trim($attribute_id_array[$j]);
                        $attribute_value_id_array[$j] = trim($attribute_value_id_array[$j]);
                        if(isset($attribute_value_id_array[$j])) {
                            $attribute_value_id_error = "";
                            $attribute_value_id_error = $valid->common_validation($attribute_value_id_array[$j], 'Attribute Value', 'select');
                            if(!empty($attribute_value_id_error)) {
                                if(!empty($valid_estimate)) {
                                    $valid_estimate = $valid_estimate." ".$valid->attribute_error_display($form_name, 'attribute_value_id_'.$product_ids[$i].'[]', $attribute_value_id_error, 'select', $product_ids[$i], $attribute_id_array[$j], ($i+1));
                                }
                                else {
                                    $valid_estimate = $valid->attribute_error_display($form_name, 'attribute_value_id_'.$product_ids[$i].'[]', $attribute_value_id_error, 'select', $product_ids[$i], $attribute_id_array[$j], ($i+1));
                                }
                            }
                            else {
                                $attribute_name_array[$j] = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $attribute_id_array[$j], 'attribute_name');
                                $attribute_value_name_array[$j] = $obj->getTableColumnValue($GLOBALS['attribute_value_table'], 'attribute_value_id', $attribute_value_id_array[$j], 'attribute_value');
                            }
                        }
                    }
                }
                $product_quantity[$i] = trim($product_quantity[$i]);
                if(isset($product_quantity[$i])) {
                    $quantity_error = "";
                    $quantity_error = $valid->valid_number($product_quantity[$i], 'Qty', '1');
                    if(empty($quantity_error) && $product_quantity[$i] > 99999) {
                        $quantity_error = "Max Value : 99999";
                    }
                    if(!empty($quantity_error)) {
                        if(!empty($valid_estimate)) {
                            $valid_estimate = $valid_estimate." ".$valid->row_error_display($form_name, 'product_quantity[]', $quantity_error, 'text', 'product_row', ($i+1));
                        }
                        else {
                            $valid_estimate = $valid->row_error_display($form_name, 'product_quantity[]', $quantity_error, 'text', 'product_row', ($i+1));
                        }
                    }
                }
                $product_price[$i] = trim($product_price[$i]);
                if(isset($product_price[$i])) {
                    $price_error = "";
                    $price_error = $valid->valid_price($product_price[$i], 'Rate', '1');
                    if(empty($price_error) && $product_price[$i] > 9999999.99) {
                        $price_error = "Max Value : 9999999.99";
                    }
                    if(!empty($price_error)) {
                        if(!empty($valid_estimate)) {
                            $valid_estimate = $valid_estimate." ".$valid->row_error_display($form_name, 'product_price[]', $price_error, 'text', 'product_row', ($i+1));
                        }
                        else {
                            $valid_estimate = $valid->row_error_display($form_name, 'product_price[]', $price_error, 'text', 'product_row', ($i+1));
                        }
                    }
                }
                if($gst_option == '1') {
                    $product_tax[$i] = trim($product_tax[$i]);
                    if(isset($product_tax[$i])) {
                        $tax_error = "";
                        $tax_error = $valid->common_validation($product_tax[$i], 'Tax', 'text');
                        if(empty($tax_error) && ($product_tax[$i] != "0%" && $product_tax[$i] != "5%" && $product_tax[$i] != "12%" && $product_tax[$i] != "18%" && $product_tax[$i] != "28%")) {
                            $tax_error = "Invalid Tax";
                        }
                        if(!empty($tax_error)) {
                            if(!empty($valid_estimate)) {
                                $valid_estimate = $valid_estimate." ".$valid->row_error_display($form_name, 'product_tax[]', $tax_error, 'text', 'product_row', ($i+1));
                            }
                            else {
                                $valid_estimate = $valid->row_error_display($form_name, 'product_tax[]', $tax_error, 'text', 'product_row', ($i+1));
                            }
                        }
                    }
                }
                if(empty($valid_estimate)) {
                    if(!empty($attribute_id_array)) {
                        $attribute_id_array = implode("$$$", $attribute_id_array);
                    }
                    if(!empty($attribute_value_id_array)) {
                        $attribute_value_id_array = implode("$$$", $attribute_value_id_array);
                    }
                    if(!empty($attribute_name_array)) {
                        $attribute_name_array = implode("$$$", $attribute_name_array);
                    }
                    if(!empty($attribute_value_name_array)) {
                        $attribute_value_name_array = implode("$$$", $attribute_value_name_array);
                    }
                    $attribute_ids[$i] = $attribute_id_array;
                    $attribute_names[$i] = $attribute_name_array;
                    $attribute_value_ids[$i] = $attribute_value_id_array;
                    $attribute_value_names[$i] = $attribute_value_name_array;

                    $product_name = "";
                    $product_name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_ids[$i], 'name');
                    $product_names[$i] = $product_name;

                    $total_quantity += $product_quantity[$i];
                    $final_price[$i] = $product_price[$i];
                    if($gst_option == '1') {
                        if($tax_option == '2') {
                            $tax = 0;
                            $tax = str_replace("%", "", $product_tax[$i]);
                            $tax = trim($tax);
                            $final_price[$i] = ($product_price[$i] * 100) / (100 + $tax);
                            $final_price[$i] = number_format($final_price[$i], 2);
                            $final_price[$i] = str_replace(",", "", $final_price[$i]);
                        }
                    }
                    $product_amount[$i] = $product_quantity[$i] * $final_price[$i];
                    $product_amount[$i] = number_format($product_amount[$i], 2);
                    $product_amount[$i] = str_replace(",", "", $product_amount[$i]);

                    $sub_total += $product_amount[$i];
                }
            }
        }
        else {
            $estimate_error = "Select Products";
        }
        $total_amount = $sub_total;
        if(isset($_POST['discount'])) {
            $discount = trim($_POST['discount']);
        }
        if(isset($_POST['discount_name'])) {
            $discount_name = trim($_POST['discount_name']);
            if(!empty($discount)) {
                $discount_name_error = $valid->valid_company_name($discount_name, 'Discount Name', 1);
            }
        }
        if(!empty($discount_name_error)) {
            if(!empty($valid_estimate)) {
                $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'discount_name', $discount_name_error, 'text');
            }
            else {
                $valid_estimate = $valid->error_display($form_name, 'discount_name', $discount_name_error, 'text');
            }
        }
        if(!empty($discount)) {
            if(strpos($discount, '%') !== false) {
                $discount_percent = str_replace('%', '', $discount);
                $discount_percent = trim($discount_percent);
                if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $discount_percent) && ($discount_percent > 0) && ($discount_percent < 100)){
                    $discount_value = ($discount_percent * $sub_total) / 100;
                }
                else {
                    $discount_error = "Invalid Discount";
                }
            }
            else {
                if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $discount) && ($discount > 0) && ($discount <= $sub_total)){
                    $discount_value = $discount;
                }
                else {
                    $discount_error = "Invalid Discount";
                }
            }
            if(!empty($discount_value)) {
                $discount_value = number_format($discount_value, 2);
                $discount_value = str_replace(",", "", $discount_value);
                $total_amount = $total_amount - $discount_value;
            }
        }
        if(!empty($discount_error)) {
            if(!empty($valid_estimate)) {
                $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'discount', $discount_error, 'text');
            }
            else {
                $valid_estimate = $valid->error_display($form_name, 'discount', $discount_error, 'text');
            }
        }
        $discounted_total = $total_amount;

        if(isset($_POST['extra_charges'])) {
            $extra_charges = trim($_POST['extra_charges']);
        }
        if(isset($_POST['extra_charges_name'])) {
            $extra_charges_name = trim($_POST['extra_charges_name']);
            if(!empty($extra_charges)) {
                $extra_charges_name_error = $valid->valid_company_name($extra_charges_name, 'Charges Name', 1);
            }
        }
        if(!empty($extra_charges_name_error)) {
            if(!empty($valid_estimate)) {
                $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'extra_charges_name', $extra_charges_name_error, 'text');
            }
            else {
                $valid_estimate = $valid->error_display($form_name, 'extra_charges_name', $extra_charges_name_error, 'text');
            }
        }
        if(!empty($extra_charges)) {
            if(strpos($extra_charges, '%') !== false) {
                $extra_charges_percent = str_replace('%', '', $extra_charges);
                $extra_charges_percent = trim($extra_charges_percent);
                if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $extra_charges_percent) && ($extra_charges_percent > 0) && ($extra_charges_percent < 100)){
                    $extra_charges_value = ($extra_charges_percent * $discounted_total) / 100;
                }
                else {
                    $extra_charges_error = "Invalid extra charges";
                }
            }
            else {
                if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $extra_charges) && ($extra_charges > 0) && ($extra_charges <= $discounted_total)){
                    $extra_charges_value = $extra_charges;
                }
                else {
                    $extra_charges_error = "Invalid extra charges";
                }
            }
            if(!empty($extra_charges_value)) {
                $extra_charges_value = number_format($extra_charges_value, 2);
                $extra_charges_value = str_replace(",", "", $extra_charges_value);
                $total_amount = $total_amount + $extra_charges_value;
            }
        }
        if(!empty($extra_charges_error)) {
            if(!empty($valid_estimate)) {
                $valid_estimate = $valid_estimate." ".$valid->error_display($form_name, 'extra_charges', $extra_charges_error, 'text');
            }
            else {
                $valid_estimate = $valid->error_display($form_name, 'extra_charges', $extra_charges_error, 'text');
            }
        }
        $extra_charges_total = $total_amount;

        $greater_tax = ""; $str_tax = ""; $extra_charges_tax = 0;
        if($gst_option == '1' && empty($estimate_error) && empty($valid_estimate)) {
            $taxable_value = $total_amount;
            if(!empty($product_ids)) {
                for($j=0; $j < count($product_ids); $j++) {
                    $discounted_product_amount = 0; $tax_value = 0;
                    if(!empty($product_amount[$j])) {
                        $discounted_product_amount = $product_amount[$j];
                        if(!empty($discount)) {
                            $discount_percent = 0;
                            if(strpos($discount, '%') !== false) {
                                $discount_percent = str_replace("%", "", $discount);
                                $discount_percent = trim($discount_percent);
                                $discounted_product_amount = $product_amount[$j] - (($product_amount[$j] * $discount_percent) / 100);
                            }
                            else {
                                $discount_percent = ($discount / $sub_total) * 100;
                                $discounted_product_amount = $product_amount[$j] - (($product_amount[$j] * $discount_percent) / 100);
                            }
                        }
                        $tax = "";
                        if(!empty($product_tax[$j])) {
                            $tax = str_replace("%", "", $product_tax[$j]);
                            $tax = trim($tax);
                            $tax_value = ($discounted_product_amount * $tax) / 100;
                            $total_tax_value += $tax_value;
                        }
                        if ($tax > $str_tax) {
                            $greater_tax = $tax;
                        } 
                        else {
                            $greater_tax = $str_tax;
                        }
                        $str_tax = $greater_tax;
                    }
                }
                if(!empty($extra_charges_value)) {
                    $extra_charges_tax = ($extra_charges_value * $greater_tax) / 100;
                    if(!empty($extra_charges_tax)) {
                        $total_tax_value += $extra_charges_tax;
                    }
                }
            }
            if(!empty($total_tax_value)) {
                $total_tax_value = number_format($total_tax_value, 2);
                $total_tax_value = str_replace(",", "", $total_tax_value);
                if($company_state == $party_state) {
                    $cgst_value = $total_tax_value / 2;
                    $cgst_value = number_format($cgst_value, 2);
                    $cgst_value = str_replace(",", "", $cgst_value);
                    $sgst_value = $total_tax_value / 2;
                    $sgst_value = number_format($sgst_value, 2);
                    $sgst_value = str_replace(",", "", $sgst_value);
                }
                else {
                    $igst_value = $total_tax_value;
                    $igst_value = number_format($igst_value, 2);
                    $igst_value = str_replace(",", "", $igst_value);
                }
                $total_amount = $total_amount + $total_tax_value;
            }
        }
        $total_amount = number_format((float)$total_amount, 2, '.', '');

		$round_off = 0;
		if(!empty($total_amount)) {	
			if (strpos( $total_amount, "." ) !== false) {
				$pos = strpos($total_amount, ".");
				$decimal = substr($total_amount, ($pos + 1), strlen($total_amount));
				if($decimal != "00") {
					if(strlen($decimal) == 1) {
						$decimal = $decimal."0";
					}
					if($decimal >= 50) {				
						$round_off = 100 - $decimal;
						if($round_off < 10) {
							$round_off = "0.0".$round_off;
						}
						else {
							$round_off = "0.".$round_off;
						}
						
						$total_amount = $total_amount + $round_off;
					}
					else {
						$decimal = "0.".$decimal;
						$round_off = "-".$decimal;
						$total_amount = $total_amount - $decimal;
					}
				}
			}
		}
        $bill_total = $total_amount;
        if(empty($estimate_error) && empty($bill_total)) {
            $estimate_error = "Bill value cannot be 0";
        }
        $result = "";
        if(empty($valid_estimate) && empty($estimate_error)) {
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();	
            if(preg_match("/^\d+$/", $check_user_id_ip_address)) { 
                if(!empty($estimate_date)) {
                    $estimate_date = date('Y-m-d', strtotime($estimate_date));
                }
                $customer_name = ""; $customer_mobile_number = ""; $customer_district = ""; $customer_name_mobile_city = ""; $customer_details = "";
                if(!empty($customer_id)) {
                    $customer_name = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'customer_name');
                    $customer_mobile_number = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'mobile_number');
                    $customer_district = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'district');
                    $customer_name_mobile_city = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'name_mobile_city');
                    $customer_details = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'customer_details');
                }
                else {
                    $customer_id = $GLOBALS['null_value'];
                    $customer_name = $GLOBALS['null_value'];
                    $customer_mobile_number = $GLOBALS['null_value'];
                    $customer_district = $GLOBALS['null_value'];
                    $customer_name_mobile_city = $GLOBALS['null_value'];
                    $customer_details = $GLOBALS['null_value'];
                }
                if(empty($estimate_type)) {
                    $estimate_type = $GLOBALS['null_value'];
                }
                if(empty($tax_option)) {
                    $tax_option = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_ids, fn($value) => $value !== ""))) {
                    $product_ids = implode(",", $product_ids);
                }
                else {
                    $product_ids = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_names, fn($value) => $value !== ""))) {
                    $product_names = implode(",", $product_names);
                }
                else {
                    $product_names = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($attribute_ids, fn($value) => $value !== ""))) {
                    $attribute_ids = implode(",", $attribute_ids);
                }
                else {
                    $attribute_ids = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($attribute_names, fn($value) => $value !== ""))) {
                    $attribute_names = implode(",", $attribute_names);
                }
                else {
                    $attribute_names = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($attribute_value_ids, fn($value) => $value !== ""))) {
                    $attribute_value_ids = implode(",", $attribute_value_ids);
                }
                else {
                    $attribute_value_ids = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($attribute_value_names, fn($value) => $value !== ""))) {
                    $attribute_value_names = implode(",", $attribute_value_names);
                }
                else {
                    $attribute_value_names = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_quantity, fn($value) => $value !== ""))) {
                    $product_quantity = implode(",", $product_quantity);
                }
                else {
                    $product_quantity = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_price, fn($value) => $value !== ""))) {
                    $product_price = implode(",", $product_price);
                }
                else {
                    $product_price = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($final_price, fn($value) => $value !== ""))) {
                    $final_price = implode(",", $final_price);
                }
                else {
                    $final_price = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_tax, fn($value) => $value !== ""))) {
                    $product_tax = implode(",", $product_tax);
                }
                else {
                    $product_tax = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($product_amount, fn($value) => $value !== ""))) {
                    $product_amount = implode(",", $product_amount);
                }
                else {
                    $product_amount = $GLOBALS['null_value'];
                }
                if(empty($discount_value)) {
                    $discount_value = $GLOBALS['null_value'];
                    $discount_name = $GLOBALS['null_value'];
                    $discount = $GLOBALS['null_value'];
                }
                else {
                    if(!empty($discount_name)) {
                        $discount_name = htmlentities($discount_name, ENT_QUOTES);
                        $discount_name = $obj->encode_decode('encrypt', $discount_name);
                    }
                    else {
                        $discount_name = $obj->encode_decode('encrypt', 'Extra Discount');
                    }
                }
                if(empty($extra_charges_value)) {
                    $extra_charges_value = $GLOBALS['null_value'];
                    $extra_charges_name = $GLOBALS['null_value'];
                    $extra_charges = $GLOBALS['null_value'];
                }
                else {
                    if(!empty($extra_charges_name)) {
                        $extra_charges_name = htmlentities($extra_charges_name, ENT_QUOTES);
                        $extra_charges_name = $obj->encode_decode('encrypt', $extra_charges_name);
                    }
                    else {
                        $extra_charges_name = $obj->encode_decode('encrypt', 'Extra Charges');
                    }
                }
                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $updated_date_time = $GLOBALS['create_date_time_label'];

                $bill_company_id = $GLOBALS['bill_company_id'];
                $bill_company_name = ""; $bill_company_details = "";
                if(!empty($bill_company_id)) {
                    $bill_company_name = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $bill_company_id, 'name');
                    // $bill_company_details = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $bill_company_id, 'company_details');
                }
                else {
                    $bill_company_id = $GLOBALS['null_value'];
                    $bill_company_name = $GLOBALS['null_value'];
                    // $bill_company_details = $GLOBALS['null_value'];
                }
                $update = 0; $estimate_id = ""; $estimate_number = "";
                if(empty($edit_id)) {
                    $action = "";
                    if(!empty($customer_name_mobile_city) && $customer_name_mobile_city != $GLOBALS['null_value']) {
                        $action = "New Estimate Created. Customer Name. - ".($obj->encode_decode('decrypt', $customer_name_mobile_city));
                    }
                    $null_value = $GLOBALS['null_value'];
                    $columns = array(); $values = array();
                    $columns = array('created_date_time', 'updated_date_time', 'creator', 'creator_name', 'bill_company_id', 'bill_company_name', 'bill_company_details', 'estimate_id', 'estimate_number', 'estimate_date', 'customer_id', 'customer_name', 'customer_mobile_number', 'customer_district', 'customer_name_mobile_city', 'customer_details', 'estimate_type', 'gst_option', 'tax_option', 'product_id', 'product_name', 'attribute_id', 'attribute_name', 'attribute_value_id', 'attribute_value_name', 'product_quantity', 'product_price', 'final_price', 'product_tax', 'product_amount', 'sub_total', 'discount', 'discount_name', 'discount_value', 'discounted_total', 'extra_charges', 'extra_charges_name', 'extra_charges_value', 'extra_charges_total', 'extra_charges_tax', 'company_state', 'party_state', 'taxable_value', 'cgst_value', 'sgst_value', 'igst_value', 'total_tax_value', 'total_amount', 'round_off', 'bill_total', 'total_quantity', 'is_invoiced', 'invoice_id', 'invoice_number', 'cancelled', 'deleted');
                    $values = array("'".$created_date_time."'", "'".$updated_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$bill_company_name."'", "'".$bill_company_details."'", "'".$null_value."'", "'".$null_value."'", "'".$estimate_date."'", "'".$customer_id."'", "'".$customer_name."'", "'".$customer_mobile_number."'", "'".$customer_district."'", "'".$customer_name_mobile_city."'", "'".$customer_details."'", "'".$estimate_type."'", "'".$gst_option."'", "'".$tax_option."'", "'".$product_ids."'", "'".$product_names."'", "'".$attribute_ids."'", "'".$attribute_names."'", "'".$attribute_value_ids."'", "'".$attribute_value_names."'", "'".$product_quantity."'", "'".$product_price."'", "'".$final_price."'", "'".$product_tax."'", "'".$product_amount."'", "'".$sub_total."'", "'".$discount."'", "'".$discount_name."'", "'".$discount_value."'", "'".$discounted_total."'", "'".$extra_charges."'", "'".$extra_charges_name."'", "'".$extra_charges_value."'", "'".$extra_charges_total."'", "'".$extra_charges_tax."'", "'".$company_state."'", "'".$party_state."'", "'".$taxable_value."'", "'".$cgst_value."'", "'".$sgst_value."'", "'".$igst_value."'", "'".$total_tax_value."'", "'".$total_amount."'", "'".$round_off."'", "'".$bill_total."'", "'".$total_quantity."'", "'0'", "'".$null_value."'", "'".$null_value."'", "'0'", "'0'");

                    $estimate_insert_id = $obj->InsertSQL($GLOBALS['estimate_table'], $columns, $values, 'estimate_id', 'estimate_number', $action);

                    if(preg_match("/^\d+$/", $estimate_insert_id)) {
                        $estimate_id = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'id', $estimate_insert_id, 'estimate_id');
                        $estimate_number = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'id', $estimate_insert_id, 'estimate_number');
                        $result = array('number' => '1', 'msg' => 'Estimate Successfully Created');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $estimate_insert_id);
                    }
                }
                else {
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'estimate_id', $edit_id, 'id');
                    if(preg_match("/^\d+$/", $getUniqueID)) {
                        $action = "";
                        if(!empty($customer_name_mobile_city) && $customer_name_mobile_city != $GLOBALS['null_value']) {
                            $action = "Estimate Updated. Client Name. - ".($obj->encode_decode('decrypt', $customer_name_mobile_city));
                        }

                        $columns = array(); $values = array();		
                        $columns = array('updated_date_time', 'creator_name', 'bill_company_name', 'bill_company_details', 'estimate_date', 'customer_id', 'customer_name', 'customer_mobile_number', 'customer_district', 'customer_name_mobile_city', 'customer_details', 'estimate_type', 'gst_option', 'tax_option', 'product_id', 'product_name', 'attribute_id', 'attribute_name', 'attribute_value_id', 'attribute_value_name', 'product_quantity', 'product_price', 'final_price', 'product_tax', 'product_amount', 'sub_total', 'discount', 'discount_name', 'discount_value', 'discounted_total', 'extra_charges', 'extra_charges_name', 'extra_charges_value', 'extra_charges_total', 'extra_charges_tax', 'company_state', 'party_state', 'taxable_value', 'cgst_value', 'sgst_value', 'igst_value', 'total_tax_value', 'total_amount', 'round_off', 'bill_total', 'total_quantity');
                        $values = array("'".$updated_date_time."'", "'".$creator_name."'", "'".$bill_company_name."'", "'".$bill_company_details."'", "'".$estimate_date."'", "'".$customer_id."'", "'".$customer_name."'", "'".$customer_mobile_number."'", "'".$customer_district."'", "'".$customer_name_mobile_city."'", "'".$customer_details."'", "'".$estimate_type."'", "'".$gst_option."'", "'".$tax_option."'", "'".$product_ids."'", "'".$product_names."'", "'".$attribute_ids."'", "'".$attribute_names."'", "'".$attribute_value_ids."'", "'".$attribute_value_names."'", "'".$product_quantity."'", "'".$product_price."'", "'".$final_price."'", "'".$product_tax."'", "'".$product_amount."'", "'".$sub_total."'", "'".$discount."'", "'".$discount_name."'", "'".$discount_value."'", "'".$discounted_total."'", "'".$extra_charges."'", "'".$extra_charges_name."'", "'".$extra_charges_value."'", "'".$extra_charges_total."'", "'".$extra_charges_tax."'", "'".$company_state."'", "'".$party_state."'", "'".$taxable_value."'", "'".$cgst_value."'", "'".$sgst_value."'", "'".$igst_value."'", "'".$total_tax_value."'", "'".$total_amount."'", "'".$round_off."'", "'".$bill_total."'", "'".$total_quantity."'");

                        $estimate_update_id = $obj->UpdateSQL($GLOBALS['estimate_table'], $getUniqueID, $columns, $values, $action);

                        if(preg_match("/^\d+$/", $estimate_update_id)) {
                            $update = 1;
                            $estimate_id = $edit_id;
                            $estimate_number = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'estimate_id', $estimate_id, 'estimate_number');
                            $result = array('number' => '1', 'msg' => 'Updated Successfully');
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $estimate_update_id);
                        }							
                    }
                }
            }
            else {
                $result = array('number' => '2', 'msg' => 'Invalid IP');
            }
        }
        else {
            if(!empty($valid_estimate)) {
                $result = array('number' => '3', 'msg' => $valid_estimate);
            }
            if(!empty($estimate_error)) {
                $result = array('number' => '2', 'msg' => $estimate_error);
            }
        }
        
        if(!empty($result)) {
            $result = json_encode($result);
        }
        echo $result; exit;
    }
    if(isset($_POST['draw'])){
        $draw = trim($_POST['draw']);

        $searchValue = ""; $filter_from_date = ""; $filter_to_date = ""; $filter_customer_id = ""; $filter_state_id = "";
        $filter_district_id = ""; $cancelled = 0; $is_invoiced = 0;
        if(isset($_POST['start'])) {
            $row = trim($_POST['start']);
        }
        if(isset($_POST['length'])) {
            $rowperpage = trim($_POST['length']);
        }
        if(isset($_POST['search_text'])) {
            $searchValue = trim($_POST['search_text']);
        }
        if(isset($_POST['filter_from_date'])) {
            $filter_from_date = trim($_POST['filter_from_date']);
        }
        if(isset($_POST['filter_to_date'])) {
            $filter_to_date = trim($_POST['filter_to_date']);
        }
        if(isset($_POST['filter_customer_id'])) {
            $filter_customer_id = trim($_POST['filter_customer_id']);
        }
        if(isset($_POST['filter_state_id'])) {
            $filter_state_id = trim($_POST['filter_state_id']);
        }
        if(isset($_POST['filter_district_id'])) {
            $filter_district_id = trim($_POST['filter_district_id']);
        }
        if(isset($_POST['cancel'])) {
            $cancelled = trim($_POST['cancel']);
        }
        if(isset($_POST['invoiced'])) {
            $is_invoiced = trim($_POST['invoiced']);
        }
        $page_title = "Estimate";
        $order_column = "";
        $order_column_index = "";
        $order_direction = "";

        if(isset($_POST['order'][0]['column'])) {
            $order_column_index = intval($_POST['order'][0]['column']);
        }
        if(isset($_POST['order'][0]['dir'])) {
            $order_direction = $_POST['order'][0]['dir'] === 'desc' ? 'DESC' : 'ASC';
        }
        $columns = [
            0 => '',
            1 => 'estimate_date',
            2 => 'estimate_number',
            3 => 'customer_name',
            4 => 'customer_mobile_number',
            5 => 'customer_district',
            6 => 'party_state',
            7 => 'bill_total',
            8 => '',
        ];
        if(!empty($order_column_index) && isset($columns[$order_column_index])) {
            $order_column = $columns[$order_column_index];
        }

        $totalRecords = 0;
        $totalRecords = count($obj->getEstimateList($row, $rowperpage, $searchValue, $filter_from_date, $filter_to_date, $filter_customer_id, $filter_state_id, $filter_district_id, $cancelled, $is_invoiced, $order_column, $order_direction));
        $filteredRecords = count($obj->getEstimateList('', '', $searchValue, $filter_from_date, $filter_to_date, $filter_customer_id, $filter_state_id, $filter_district_id, $cancelled, $is_invoiced, $order_column, $order_direction));

        $data = [];

        $EstimateList = $obj->getEstimateList($row, $rowperpage, $searchValue, $filter_from_date, $filter_to_date, $filter_customer_id, $filter_state_id, $filter_district_id, $cancelled, $is_invoiced, $order_column, $order_direction);
        
        $sno = $row + 1;
        foreach ($EstimateList as $val) {
            $estimate_date = ""; $estimate_number = ""; $customer_name = ""; $customer_mobile_number = ""; $customer_district = ""; $party_state = ""; $bill_total = 0;
            if(!empty($val['estimate_date']) && $val['estimate_date'] != "0000-00-00") {
                $estimate_date = date('d-m-Y', strtotime($val['estimate_date']));
            }
            if(!empty($val['estimate_number']) && $val['estimate_number'] != $GLOBALS['null_value']) {
                $estimate_number = $val['estimate_number'];
            }
            if(!empty($val['customer_name']) && $val['customer_name'] != $GLOBALS['null_value']){
                $customer_name = $obj->encode_decode('decrypt', $val['customer_name']);
            }
            if(!empty($val['customer_mobile_number']) && $val['customer_mobile_number'] != $GLOBALS['null_value']){
                $customer_mobile_number = $obj->encode_decode('decrypt', $val['customer_mobile_number']);
            }
            if(!empty($val['customer_district']) && $val['customer_district'] != $GLOBALS['null_value']){
                $customer_district = $obj->encode_decode('decrypt', $val['customer_district']);
            }
            if(!empty($val['party_state']) && $val['party_state'] != $GLOBALS['null_value']){
                $party_state = $obj->encode_decode('decrypt', $val['party_state']);
            }
            if(!empty($val['bill_total']) && $val['bill_total'] != $GLOBALS['null_value']){
                $bill_total = $val['bill_total'];
            }

            $action = ""; $queries_option = ""; $convert_option = ""; $track_option = ""; $edit_option = ""; $delete_option = ""; $print_option = ""; $edit_access_error = ""; $delete_access_error = "";
            if(empty($edit_access_error) && empty($val['cancelled']) && empty($val['is_invoiced'])) {
                $edit_option = '<li><a class="dropdown-item" href="Javascript:ShowModalContent('.'\''.$page_title.'\''.', '.'\''.$val['estimate_id'].'\''.');"><i class="fa fa-pencil"></i>&nbsp; Edit</a></li>';
            }
            if(empty($delete_access_error) && empty($val['cancelled']) && empty($val['is_invoiced'])) {
                $delete_option = '<li><a class="dropdown-item" href="Javascript:DeleteModalContent('.'\''.$page_title.'\''.', '.'\''.$val['estimate_id'].'\''.');"><i class="fa fa-ban"></i>&nbsp; Cancel</a></li>';
            }
            $print_option = '<li><a class="dropdown-item" target="_blank" href="reports/rpt_estimate_a4.php?view_estimate_id='.$val['estimate_id'].'"><i class="fa fa-print"></i>&nbsp; Print</a></li>';
            $queries_option = '<li><a class="dropdown-item" onclick="Javascript:OpenQueries('.'\''.$val['estimate_id'].'\''.');"><i class="fa fa-pencil-square-o"></i> Queries</a></li>';
            $convert_option = '<li><a class="dropdown-item"><i class="fa fa-arrow-circle-o-right"></i> Convert To Invoice</a></li>';
            $track_option = '<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trackModal"><i class="fa fa-eye"></i> Track</a></li>';
            
            $action = '<div class="dropdown">
                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink'.$val['estimate_id'].'" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink'.$val['estimate_id'].'">
                                '.$print_option.$queries_option.$convert_option.$track_option.$edit_option.$delete_option.'
                            </ul>
                        </div>';
            $data[] = [
                "sno" => $sno++,
                "estimate_date" => $estimate_date,
                "estimate_number" => $estimate_number,
                "customer_name" => $customer_name,
                "customer_mobile_number" => $customer_mobile_number,
                "customer_district" => $customer_district,
                "customer_state" => $party_state,
                "bill_total" => $bill_total,
                "action" => $action
            ];
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data
        ];

        echo json_encode($response);
    }
    /*
    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; ?>
        
		<table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Date</th>
                    <th>Estimate No</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>25-08-2025</td>
                    <td>ES 001</td>
                    <td>Mahesh</td>
                    <td>9087678987</td>
                    <td>Virudhunagar</td>
                    <td>Tamilnadu</td>
                    <td>1500.00</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-print"></i> Print</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#queriesModal"><i class="fa fa-pencil-square-o"></i> Queries</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-arrow-circle-o-right"></i> Convert To estimate</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trackModal"><i class="fa fa-eye"></i> Track</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>               
		<?php	
	}
    */
    if(isset($_REQUEST['delete_estimate_id'])) {
        $delete_estimate_id = trim($_REQUEST['delete_estimate_id']);
        $msg = "";
        if(!empty($delete_estimate_id)) {	
            $estimate_unique_id = "";
            $estimate_unique_id = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'estimate_id', $delete_estimate_id, 'id');
        
            if(preg_match("/^\d+$/", $estimate_unique_id)) {
                $estimate_number = "";
                $estimate_number = $obj->getTableColumnValue($GLOBALS['estimate_table'], 'estimate_id', $delete_estimate_id, 'estimate_number');
            
                $action = "";
                if(!empty($estimate_number)) {
                    $action = "Estimate Cancelled. Bill No. - ".$estimate_number;
                }
                $delete_access_error = "";
                if(empty($delete_access_error)) {
                    $columns = array(); $values = array();
                    $columns = array('cancelled');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['estimate_table'], $estimate_unique_id, $columns, $values, $action);
                }
                else {
                    $msg = $delete_access_error;
                }
            }
            else {
                $msg = "Invalid Estimate";
            }
        }
        else {
            $msg = "Empty Estimate";
        }
        echo $msg;
        exit;	
    }
?>