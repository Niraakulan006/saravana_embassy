<?php
    include("include_files.php");
    include("user_validation.php");

    if(isset($_REQUEST['add_new_row']) && $_REQUEST['add_new_row'] == '1') {
        $product_row_index = "";
        if(isset($_REQUEST['product_row_index'])) {
            $product_row_index = trim($_REQUEST['product_row_index']);
        }
        $product_list = array();
        $product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '');
        ?>
        <tr class="product_row" id="product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>">
            <th class="text-center px-2 py-2 sno">
                <?php if(!empty($product_row_index)) { echo $product_row_index; } ?>
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
                <a class="pe-2 h5 delete_button" style="cursor:pointer;" onclick="Javascript:DeleteEstimateProductRow('product_row', '<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>');"><i class="fa fa-trash text-danger"></i></a>
            </th>
            <script type="text/javascript">
                if(jQuery('#product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>').find('select').length > 0) {
                    jQuery('#product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>').find('select').select2();
                }
            </script>
        </tr>
        <?php
    }
    if(isset($_REQUEST['copy_row']) && $_REQUEST['copy_row'] == '1') {
        $product_row_index = "";
        if(isset($_REQUEST['copy_product_row_index'])) {
            $product_row_index = trim($_REQUEST['copy_product_row_index']);
        }
        $product_id = "";
        if(isset($_REQUEST['selected_product_id'])) {
            $product_id = trim($_REQUEST['selected_product_id']);
        }
        $attribute_ids = array();
        if(isset($_REQUEST['selected_attribute_id'])) {
            $attribute_ids = explode(",", $_REQUEST['selected_attribute_id']);
        }
        $attribute_value_ids = array();
        if(isset($_REQUEST['selected_attribute_value_id'])) {
            $attribute_value_ids = explode(",", $_REQUEST['selected_attribute_value_id']);
        }
        $product_quantity = "";
        if(isset($_REQUEST['selected_quantity'])) {
            $product_quantity = trim($_REQUEST['selected_quantity']);
        }
        $product_price = "";
        if(isset($_REQUEST['selected_price'])) {
            $product_price = trim($_REQUEST['selected_price']);
        }
        $product_tax = "";
        if(isset($_REQUEST['selected_tax'])) {
            $product_tax = trim($_REQUEST['selected_tax']);
        }
        $final_price = "";
        if(isset($_REQUEST['selected_final_price'])) {
            $final_price = trim($_REQUEST['selected_final_price']);
        }
        $product_amount = "";
        if(isset($_REQUEST['selected_amount'])) {
            $product_amount = trim($_REQUEST['selected_amount']);
        }
        $product_list = array();
        $product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '');

        $attribute_list = array();
        if(!empty($product_id)) {
            $attribute_list = $obj->getProductAttribute($product_id);
        }
        ?>
        <tr class="product_row" id="product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>">
            <th class="text-center px-2 py-2 sno">
                <?php if(!empty($product_row_index)) { echo $product_row_index; } ?>
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
                                            <option value="<?php echo $data['product_id']; ?>" <?php if(!empty($product_id) && $product_id == $data['product_id']) { ?>selected<?php } ?>>
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
                <?php 
                    if(!empty($product_id)) { 
                        if(!empty($attribute_list)) {
                            foreach($attribute_list as $data) {
                                if(!empty($data['attribute_id']) && $data['attribute_id'] != $GLOBALS['null_value']) {
                                    $attribute_value_list = array();
                                    $attribute_value_list = $obj->getProductAttributeValue($product_id, $data['attribute_id']);
                                    ?>
                                    <div class="row mx-0 attribute_row">
                                        <div class="col-5" style="align-content:center;">
                                            <div class="form-group">
                                                <?php
                                                    $attribute_name = "";
                                                    $attribute_name = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $data['attribute_id'], 'attribute_name');
                                                    if(!empty($attribute_name) && $attribute_name != $GLOBALS['null_value']) {
                                                        echo $obj->encode_decode('decrypt', $attribute_name).' : ';
                                                    } 
                                                ?>
                                            </div>
                                            <input type="hidden" name="attribute_id_<?php echo $product_id; ?>[]" value="<?php echo $data['attribute_id']; ?>">
                                        </div>
                                        <div class="col-7" style="align-content:center;">
                                            <div class="form-group in-border">
                                                <div class="form-label-group">
                                                    <select name="attribute_value_id_<?php echo $product_id; ?>[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getProductCombinationRate(this);">
                                                        <option value="">Select Value</option>
                                                        <?php
                                                            if(!empty($attribute_value_list)) {
                                                                foreach($attribute_value_list as $row) {
                                                                    if(!empty($row['attribute_id_value']) && $row['attribute_id_value'] != $GLOBALS['null_value']) {
                                                                        ?>
                                                                        <option value="<?php echo $row['attribute_id_value']; ?>" <?php if(!empty($attribute_value_ids) && in_array($row['attribute_id_value'], $attribute_value_ids)) { ?>selected<?php } ?>>
                                                                            <?php
                                                                                $attribute_value_name = "";
                                                                                $attribute_value_name = $obj->getTableColumnValue($GLOBALS['attribute_value_table'], 'attribute_value_id', $row['attribute_id_value'], 'attribute_value');
                                                                                if(!empty($attribute_value_name) && $attribute_value_name != $GLOBALS['null_value']) {
                                                                                    echo $obj->encode_decode('decrypt', $attribute_value_name);
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
                                        </div>
                                    </div>
                                    <?php 
                                }
                            }
                        }
                    } 
                    else { 
                        ?>
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
                <?php } ?>
            </th>
            <th class="text-center px-2 py-2 qty_element">
                <div class="form-group">
                    <div class="in-border">
                        <input type="text" name="product_quantity[]" class="form-control shadow-none mx-auto" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'number',5,1);" placeholder="QTY" value="<?php if(!empty($product_quantity)) { echo $product_quantity; } ?>" onkeyup="Javascript:EstimateProductRowCheck(this);">
                    </div>
                </div>
            </th>
            <th class="text-center px-2 py-2 price_element">
                <div class="form-group">
                    <div class="in-border">
                        <input type="text" name="product_price[]" class="form-control shadow-none mx-auto" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'number',10,1);" placeholder="Rate" value="<?php if(!empty($product_price)) { echo $product_price; } ?>" onkeyup="Javascript:EstimateProductRowCheck(this);">
                    </div>
                </div>
            </th>
            <th class="text-center px-2 py-2 tax_element" style="vertical-align:middle !important;">
                <div class="form-group product_tax">
                    <?php if(!empty($product_tax)) { echo $product_tax; } else { echo '0%'; } ?>
                </div>
                <input type="hidden" name="product_tax[]" value="<?php if(!empty($product_tax)) { echo $product_tax; } else { echo '0%'; } ?>">
            </th>
            <th class="text-center px-2 py-2 final_price_element d-none" style="vertical-align:middle !important;">
                <div class="form-group pe-2 text-end final_price">
                    <?php if(!empty($final_price)) { echo $final_price; } else { echo '0.00'; } ?>
                </div>
            </th>
            <th class="text-center px-2 py-2 amount_element" style="vertical-align:middle !important;">
                <div class="form-group pe-2 text-end product_amount">
                    <?php if(!empty($product_amount)) { echo $product_amount; } else { echo '0.00'; } ?>
                </div>
            </th>
            <th class="text-center px-2 py-2 action_element" style="vertical-align:middle !important;">
                <a class="pe-2 h5 copy_button" style="cursor:pointer;" onclick="Javascript:CopyEstimateProductRow(this);"><i class="fa fa-files-o text-danger"></i></a>
                <a class="pe-2 h5 delete_button" style="cursor:pointer;" onclick="Javascript:DeleteEstimateProductRow('product_row', '<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>');"><i class="fa fa-trash text-danger"></i></a>
            </th>
            <script type="text/javascript">
                if(jQuery('#product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>').find('select').length > 0) {
                    jQuery('#product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>').find('select').select2();
                }
            </script>
        </tr>
        <?php
    }
    if(isset($_REQUEST['get_product_attribute'])) {
        $product_id = trim($_REQUEST['get_product_attribute']);

        $attribute_list = array(); $default_attribute_value_ids = array(); $default_price = ""; $product_tax = "";
        if(!empty($product_id)) {
            $attribute_list = $obj->getProductAttribute($product_id);
            $default_attribute_value_ids = $obj->getDefaultAttributeValue($product_id);
            $default_attribute_value_ids = explode(",", $default_attribute_value_ids);
            $default_price = $obj->getDefaultCombinationPrice($product_id);
            $product_tax = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_id, 'product_tax');
        }
        if(!empty($product_id)) { 
            if(!empty($attribute_list)) {
                foreach($attribute_list as $data) {
                    if(!empty($data['attribute_id']) && $data['attribute_id'] != $GLOBALS['null_value']) {
                        $attribute_value_list = array();
                        $attribute_value_list = $obj->getProductAttributeValue($product_id, $data['attribute_id']);
                        ?>
                        <div class="row mx-0 attribute_row">
                            <div class="col-5" style="align-content:center;">
                                <div class="form-group">
                                    <?php
                                        $attribute_name = "";
                                        $attribute_name = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $data['attribute_id'], 'attribute_name');
                                        if(!empty($attribute_name) && $attribute_name != $GLOBALS['null_value']) {
                                            echo $obj->encode_decode('decrypt', $attribute_name).' : ';
                                        } 
                                    ?>
                                </div>
                                <input type="hidden" name="attribute_id_<?php echo $product_id; ?>[]" value="<?php echo $data['attribute_id']; ?>">
                            </div>
                            <div class="col-7" style="align-content:center;">
                                <div class="form-group in-border">
                                    <div class="form-label-group">
                                        <select name="attribute_value_id_<?php echo $product_id; ?>[]" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getProductCombinationRate(this);">
                                            <option value="">Select Value</option>
                                            <?php
                                                if(!empty($attribute_value_list)) {
                                                    foreach($attribute_value_list as $row) {
                                                        if(!empty($row['attribute_id_value']) && $row['attribute_id_value'] != $GLOBALS['null_value']) {
                                                            ?>
                                                            <option value="<?php echo $row['attribute_id_value']; ?>" <?php if(!empty($default_attribute_value_ids) && in_array($row['attribute_id_value'], $default_attribute_value_ids)) { ?>selected<?php } ?>>
                                                                <?php
                                                                    $attribute_value_name = "";
                                                                    $attribute_value_name = $obj->getTableColumnValue($GLOBALS['attribute_value_table'], 'attribute_value_id', $row['attribute_id_value'], 'attribute_value');
                                                                    if(!empty($attribute_value_name) && $attribute_value_name != $GLOBALS['null_value']) {
                                                                        echo $obj->encode_decode('decrypt', $attribute_value_name);
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
                            </div>
                            <script type="text/javascript">
                                if(jQuery('.attribute_row').find('select').length > 0) {
                                    jQuery('.attribute_row').find('select').select2();
                                }
                            </script>
                        </div>
                        <?php 
                    }
                }
            }
        } 
        else { 
            ?>
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
                <script type="text/javascript">
                    if(jQuery('.attribute_row').find('select').length > 0) {
                        jQuery('.attribute_row').find('select').select2();
                    }
                </script>
            </div>
            <?php 
        } 
        echo '$$$'.$default_price."$$$".$product_tax;
    }
    if(isset($_REQUEST['get_product_combination_rate'])) {
        $product_id = trim($_REQUEST['get_product_combination_rate']);

        $attribute_ids = array();
        if(isset($_REQUEST['attribute_id_rate'])) {
            $attribute_ids = trim($_REQUEST['attribute_id_rate']);
        }

        $attribute_value_ids = array();
        if(isset($_REQUEST['attribute_value_id_rate'])) {
            $attribute_value_ids = trim($_REQUEST['attribute_value_id_rate']);
        }
        $product_rate = 0;
        $product_rate = $obj->getProductCombinationRate($product_id, $attribute_ids, $attribute_value_ids);
        echo $product_rate;
    }
    if(isset($_REQUEST['get_customer_state'])) {
        $customer_id = trim($_REQUEST['get_customer_state']);

        $customer_state = "";
        if(!empty($customer_id)) {
            $customer_state = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $customer_id, 'state');
        }
        echo $customer_state;
    }
    if(isset($_REQUEST['open_queries_modal'])) {
        $estimate_id = trim($_REQUEST['open_queries_modal']);

        $estimate_list = array();
        $estimate_list = $obj->getTableRecords($GLOBALS['estimate_table'], 'estimate_id', $estimate_id);

        $customer_name = ""; $customer_mobile_number = ""; $customer_state = ""; $customer_district = ""; $customer_city = "";
        $estimate_number = ""; $customer_pincode = ""; $product_names = array(); $attribute_names = array(); $attribute_value_names = array();
        $product_quantity = array(); $product_amount = array(); $bill_total = 0;
        if(!empty($estimate_list)) {
            foreach($estimate_list as $data) {
                if(!empty($data['customer_name']) && $data['customer_name'] != $GLOBALS['null_value']) {
                    $customer_name = $obj->encode_decode('decrypt', $data['customer_name']);
                }
                if(!empty($data['customer_mobile_number']) && $data['customer_mobile_number'] != $GLOBALS['null_value']) {
                    $customer_mobile_number = $obj->encode_decode('decrypt', $data['customer_mobile_number']);
                }
                if(!empty($data['party_state']) && $data['party_state'] != $GLOBALS['null_value']) {
                    $customer_state = $obj->encode_decode('decrypt', $data['party_state']);
                }
                if(!empty($data['customer_district']) && $data['customer_district'] != $GLOBALS['null_value']) {
                    $customer_district = $obj->encode_decode('decrypt', $data['customer_district']);
                }
                if(!empty($data['customer_id']) && $data['customer_id'] != $GLOBALS['null_value']) {
                    $customer_city = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $data['customer_id'], 'city');
                    if(!empty($customer_city) && $customer_city != $GLOBALS['null_value']) {
                        $customer_city = $obj->encode_decode('decrypt', $customer_city);
                    }
                    $customer_pincode = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $data['customer_id'], 'pincode');
                    if(!empty($customer_pincode) && $customer_pincode != $GLOBALS['null_value']) {
                        $customer_pincode = $obj->encode_decode('decrypt', $customer_pincode);
                    }
                }
                if(!empty($data['estimate_number']) && $data['estimate_number'] != $GLOBALS['null_value']) {
                    $estimate_number = $data['estimate_number'];
                }
                if(!empty($data['product_name']) && $data['product_name'] != $GLOBALS['null_value']) {
                    $product_names = explode(',', $data['product_name']);
                }
                if(!empty($data['attribute_name']) && $data['attribute_name'] != $GLOBALS['null_value']) {
                    $attribute_names = explode(',', $data['attribute_name']);
                }
                if(!empty($data['attribute_value_name']) && $data['attribute_value_name'] != $GLOBALS['null_value']) {
                    $attribute_value_names = explode(',', $data['attribute_value_name']);
                }
                if(!empty($data['product_quantity']) && $data['product_quantity'] != $GLOBALS['null_value']) {
                    $product_quantity = explode(',', $data['product_quantity']);
                }
                if(!empty($data['product_amount']) && $data['product_amount'] != $GLOBALS['null_value']) {
                    $product_amount = explode(',', $data['product_amount']);
                }
                if(!empty($data['bill_total']) && $data['bill_total'] != $GLOBALS['null_value']) {
                    $bill_total = $data['bill_total'];
                }
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="h4">Queries</div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="table-responsive text-center">
                    <table class="table nowrap cursor smallfnt w-100 table-bordered">
                        <thead class="bg-dark smallfnt">
                            <tr style="white-space:pre;">
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>State</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Estimate No</th>
                                <th>Pincode</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    1
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_name)) {
                                            echo $customer_name;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_mobile_number)) {
                                            echo $customer_mobile_number;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_state)) {
                                            echo $customer_state;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_district)) {
                                            echo $customer_district;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_city)) {
                                            echo $customer_city;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($estimate_number)) {
                                            echo $estimate_number;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                                <th class="text-center px-2 py-2" style="vertical-align:middle;">
                                    <?php
                                        if(!empty($customer_pincode)) {
                                            echo $customer_pincode;
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </th>
                            </tr>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="h4">Products</div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="table-responsive text-center">
                    <table class="table nowrap cursor smallfnt w-100 table-bordered">
                        <thead class="bg-dark smallfnt">
                            <tr style="white-space:pre;">
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Attribute & Values</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($product_names)) {
                                    for($i=0; $i < count($product_names); $i++) {
                                        $attribute_name_array = array(); $attribute_value_name_array = array();
                                        $attribute_name_array = explode("$$$", $attribute_names[$i]);
                                        $attribute_value_name_array = explode("$$$", $attribute_value_names[$i]);
                                        ?>
                                        <tr>
                                            <th class="text-center px-2 py-2"><?php echo $i+1; ?></th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                    if(!empty($product_names[$i])) {
                                                        echo $obj->encode_decode('decrypt', $product_names[$i]);
                                                    }
                                                ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                    if(!empty($attribute_name_array) && !empty($attribute_value_name_array)) {
                                                        for($j=0; $j < count($attribute_name_array); $j++) {
                                                            ?>
                                                            <div class="row mx-0">
                                                                <div class="col-6">
                                                                    <?php
                                                                        if(!empty($attribute_name_array[$j])) {
                                                                            echo $obj->encode_decode('decrypt', $attribute_name_array[$j]);
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="col-6">
                                                                    <?php
                                                                        if(!empty($attribute_value_name_array[$j])) {
                                                                            echo $obj->encode_decode('decrypt', $attribute_value_name_array[$j]);
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                    if(!empty($product_quantity[$i])) {
                                                        echo $product_quantity[$i];
                                                    }
                                                ?>
                                            </th>
                                            <th class="text-center px-2 py-2">
                                                <?php
                                                    if(!empty($product_amount[$i])) {
                                                        echo $product_amount[$i];
                                                    }
                                                ?>
                                            </th>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <th class="text-end px-2 py-2" colspan="4">Bill Total</th>
                                        <th class="text-center px-2 py-2">
                                            <?php
                                                if(!empty($bill_total)) {
                                                    echo $bill_total;
                                                }
                                            ?>
                                        </th>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="h4">Queries</div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 mt-3">
                <div class="heading5">Queries For Question ?</div>   
            </div>
            <div class="col-lg-6 col-md-12 col-12 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                        <label>Answer</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="date" class="form-control shadow-none" placeholder="" required>
                        <label>Waranty Start Date</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <div class="input-group">
                            <input type="text" id="opening_balance" name="opening_balance" value="" class="form-control shadow-none">
                            <label>Waranty Type</label>
                            <div class="input-group-append" style="width:40%!important;">
                                <select name="opening_balance_type" class="select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option value="1" data-select2-id="14">Days</option>
                                    <option value="2">Month</option>
                                    <option value="2">Year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="date" class="form-control shadow-none" placeholder="" required>
                        <label>Waranty End Date</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="h4">Assign Technician</div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option>Select Installation Type</option>    
                            <option>Agent </option>
                            <option>Company Technician</option>
                            <option>Cancel</option>
                        </select>
                        <label>Installation Type</label>
                    </div>
                </div> 
            </div>
            <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="date" class="form-control shadow-none" placeholder="" required>
                        <label>Installation Date</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option>Select Installation Person</option>    
                            <option>Person 1 </option>
                            <option>Person 2</option>
                        </select>
                        <label>Installation Person</label>
                    </div>
                </div> 
            </div>
            <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option>Select Payment Mode</option>    
                            <option>Online</option>
                            <option>Cash</option>
                        </select>
                        <label>Payment mode</label>
                    </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                        <label>Remarks</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <input type="text" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);"  placeholder="" required="">
                        <label>Agent Details</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pt-3 text-center">
                <button class="btn btn-danger" type="button">
                    Submit
                </button>
            </div>
        </div>
        <?php
    }
?>