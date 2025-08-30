<?php
	include("include_files.php");

    $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['customer_module'];
        }
    }

	if(isset($_REQUEST['show_customer_id'])) { 
        $show_customer_id = $_REQUEST['show_customer_id'];
        $show_customer_id = trim($show_customer_id);

        $add_custom_customer = "";
		if(isset($_REQUEST['add_custom_customer'])) {
			$add_custom_customer = $_REQUEST['add_custom_customer'];
			$add_custom_customer = trim($add_custom_customer);
		}

        $custom_customer_form = "";
		if(isset($_REQUEST['form_name'])) {
			$custom_customer_form = $_REQUEST['form_name'];
			$custom_customer_form = trim($custom_customer_form);
		}

        $country = "India";$state = "";$district = "";$city = "";$customer_name = "";$mobile_number = "";$address = "";$email = "";$pincode = "";$customer_type = "";$product_id="";$product_name="";$customer_type = ""; $opening_balance = "";$opening_balance_type = "";$pincode = ""; $state = "Tamil Nadu";$identification = "";$customer_type ="";$agent_id = "";$agent_name = ""; 
        
        if(!empty($show_customer_id)){
            $customer_list = array();
            $customer_list = $obj->getTableRecords($GLOBALS['customer_table'],'customer_id',$show_customer_id,'');
            if(!empty($customer_list)) {
                foreach($customer_list as $data){ 
                    if(!empty($data['customer_type'])){
                        $customer_type = $data['customer_type'];
                    }
                    if(!empty($data['customer_name']) && $data['customer_name'] != $GLOBALS['null_value']){
                        $customer_name = $obj->encode_decode("decrypt",$data['customer_name']);
                        $customer_name = html_entity_decode($customer_name);
                    }
                    if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']){
                        $mobile_number = $obj->encode_decode("decrypt",$data['mobile_number']);
                    }
                    if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']){
                        $email = $obj->encode_decode("decrypt",$data['email']);
                    }
                    if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']){
                        $pincode = $obj->encode_decode("decrypt",$data['pincode']);
                    }
                    if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']){
                        $state = $obj->encode_decode("decrypt",$data['state']);
                    }
                    if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']){
                        $district = $obj->encode_decode("decrypt",$data['district']);
                    }
                    if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']){
                        $city = $obj->encode_decode("decrypt",$data['city']);
                    }
                    if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']){
                        $address = $obj->encode_decode("decrypt",$data['address']);
                        $address = html_entity_decode($address);
                    }
                    if(!empty($data['wallet']) && $data['wallet'] != $GLOBALS['null_value']){
                        $wallet = $data['wallet'];
                    }                     
                    if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']){
                        $pincode = $obj->encode_decode("decrypt",$data['pincode']);
                    }                    
                }
            }
        }
        
        ?>
        <form class="poppins pd-20 redirection_form" name="customer_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(empty($show_customer_id)){ ?>
						    <div class="h5">Add Customer</div>
                        <?php } else { ?>
                            <div class="h5">Edit Customer</div>
                        <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('customer.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_customer_id)) { echo $show_customer_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="customer_name" name="customer_name" value="<?php if(!empty($customer_name)){echo $customer_name;} ?>"  class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                            <label>Customer Name</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="customer_type"  data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select Customer Type</option>
                                <option value="1" <?php if($customer_type == '1'){ ?>selected<?php } ?>>Direct</option>
                                <option value="2" <?php if($customer_type == '2'){ ?>selected<?php } ?>>Online</option>
                                <option value="3" <?php if($customer_type == '3'){ ?>selected<?php } ?>>Both</option>
                            </select>
                            <label>Select Customer Type</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="mobile_number" name="mobile_number" class="form-control shadow-none" value="<?php if(!empty($mobile_number)){echo $mobile_number;} ?>" onfocus="Javascript:KeyboardControls(this,'mobile_number',10,'1');" placeholder="" required>
                            <label>Contact Number</label>
                        </div>
                        <div class="new_smallfnt">Numbers Only (only 10 digits)</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="email" name="email" class="form-control shadow-none" value="<?php if(!empty($email)){echo $email;} ?>" onkeydown="Javascript:KeyboardControls(this,'email',25,1);" placeholder="" required>
                            <label>Email</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1');" placeholder="Enter Your Address"><?php if(!empty($address)){echo $address;} ?></textarea>
                            <label>Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <div class="w-100" style="display:none;">
                                <select class="select2 select2-danger" name="country" id="country" onchange="Javascript:getCountries('customer',this.value,'','','');" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option>India</option>
                                </select>
                            </div>
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="state" onchange="Javascript:getStates('customer',this.value,'','');">
                                <option>Select State</option>
                           </select>
                            <label>Select State</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="district" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getDistricts('customer',this.value,'');">
                                <option>Select District</option>
                            </select>
                            <label>Select District</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select name="city" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getCities('customer','',this.value);">
                                <option>Select City</option>
                                
                            </select>
                            <label>Select City</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 pb-3 d-none" id="others_city_cover">
                    <div class="form-group mb-1">
                        <div class="form-label-group in-border">
                            <input type="text" id="others_city" name="others_city" class="form-control shadow-none" value="<?php if(!empty($others_city)){echo $others_city;} ?>"onkeydown="Javascript:KeyboardControls(this,'text',30,1);">
                            <label>Others city <span class="text-danger">*</span></label>
                        </div>
                        <div class="new_smallfnt">Text Only(Max Char: 30)</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="pincode" value="<?php if(!empty($pincode)){echo $pincode;} ?>"  class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'mobile_number',6,'1');" placeholder="" required>
                            <label>Pincode</label>
                        </div>
                        <div class="new_smallfnt">Numbers Only (only 6 digits)</div>
                    </div>
                </div>
                
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger submit_button" type="button"  onClick="Javascript:SaveModalContent('customer_form', 'customer_changes.php', 'customer.php');">
                        Submit
                    </button>
                </div>
            </div>
             <script type="text/javascript">
                  <?php if(empty($add_custom_customer)) { ?>
                    getCountries('customer','<?php if(!empty($country)) { echo $country; } ?>', '<?php if(!empty($state)) { echo $state; } ?>', '<?php if(!empty($district)) { echo $district; } ?>', '<?php if(!empty($city)) { echo $city; } ?>');
                <?php } else { ?>
                    jQuery('#CustomcustomerModal').on('shown.bs.modal', function () {
                         getCountries('customer','<?php if(!empty($country)) { echo $country; } ?>', '<?php if(!empty($state)) { echo $state; } ?>', '<?php if(!empty($district)) { echo $district; } ?>', '<?php if(!empty($city)) { echo $city; } ?>', this);
                    });
                    jQuery('#UpdatecustomerModal').on('shown.bs.modal', function () {
                        getCountries('customer','<?php if(!empty($country)) { echo $country; } ?>', '<?php if(!empty($state)) { echo $state; } ?>', '<?php if(!empty($district)) { echo $district; } ?>', '<?php if(!empty($city)) { echo $city; } ?>', this);
                    });
               <?php } ?>
            </script>
             <script type="text/javascript">                
				jQuery(document).ready(function(){
					jQuery('select').select2();
				});
            </script>
           
            <script>
                <?php if(isset($add_custom_customer) && $add_custom_customer == '1') { ?>
                    jQuery('#CustomcustomerModal').on('shown.bs.modal', function () {
                        $(this).find('select').select2({
                            dropdownParent: $('#CustomcustomerModal') // important for select2 inside modal
                        });
                    });
                
                <?php } ?>
                <?php if(isset($add_custom_customer) && $add_custom_customer == '1') { ?>
                    jQuery('#updatecustomerModal').on('shown.bs.modal', function () {
                        $(this).find('select').select2({
                            dropdownParent: $('#updatecustomerModal') // important for select2 inside modal
                        });
                    });
                
                <?php } ?>                    
            </script>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
        </form>
		<?php
    } 
    if(isset($_POST['edit_id'])) {	
        $customer_type = ""; $customer_type_error = "";$customer_name = ""; $customer_name_error = "";  $mobile_number = ""; $mobile_number_error = "";$gst_number = "";$gst_number_error= "";$state = ""; $state_error = ""; $city = ""; $city_error = ""; $district = ""; $district_error = ""; $others_city = ""; $others_city_error = "";$address = ""; $address_error = "";$same_as_billing_address = ""; $same_as_billing_address_error = ""; $shipping_address = ""; $shipping_address_error = "";$email = ""; $email_error = "";$opening_balance = "";$opening_balance_error = "";$opening_balance_type = "";$opening_balance_type_error = ""; $customer_error="";
        $valid_customer = ""; $form_name = "customer_form"; $pincode =""; $pincode_error = "";
        
        $edit_id = "";
        if(isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
            $edit_id = trim($edit_id);
        }

        if(isset($_POST['customer_type'])){
            $customer_type = $_POST['customer_type'];
            // echo $customer_type."hi";
            if(empty($customer_type)){
                $customer_type_error = "Select customer type";
            } else {
                if($customer_type != (1 || 2 || 3)) {
                    $customer_type_error = "Invalid customer type";
                }
            }
            if(!empty($customer_type_error)){
                if(!empty($valid_customer)){
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name,'customer_type',$customer_type_error,'select');
                }
                else{
                    $valid_customer = $valid->error_display($form_name,'customer_type',$customer_type_error,'select');
                }
            }
        }
        
        if(isset($_POST['customer_name'])){
            $customer_name = $_POST['customer_name'];
            $customer_name = trim($customer_name);
            if(!empty($customer_name) && strlen($customer_name) > 25) {
                $customer_name_error = "Only 25 characters allowed";
            }else {
                $customer_name_error = $valid->valid_party_name($customer_name,'customer name','1','25');
            }
            if(!empty($customer_name_error)) {
                if(!empty($valid_customer)){
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name,'customer_name',$customer_name_error,'text');
                }
                else{
                    $valid_customer = $valid->error_display($form_name,'customer_name',$customer_name_error,'text');
                }			
            }
        }
        
        if(isset($_POST['mobile_number'])){
            $mobile_number = $_POST['mobile_number'];
            $mobile_number = trim($mobile_number);
            $mobile_number_error = $valid->valid_mobile_number($mobile_number, "mobile number", "1");
            if(!empty($mobile_number_error)) {
                if(!empty($valid_customer)) {
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
                else {
                    $valid_customer = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
            }
        }
        
            
        if(isset($_POST['state'])) {
            $state = $_POST['state'];
            $state = trim($state);
            // $state = "";
            $state_error = $valid->common_validation($state,'State','select');
            if(!empty($state_error)) {
                if(!empty($valid_customer)) {
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name, "state", $state_error, 'select');
                }
                else {
                    $valid_customer = $valid->error_display($form_name, "state", $state_error, 'select');
                }
            }
        }

        if(isset($_POST['district'])) {
            $district = $_POST['district'];
            $district = trim($district);
            if(!empty($district)){
                $district_error = $valid->common_validation($district,'District','select');
            }
            if(!empty($district_error)) {
                if(!empty($valid_customer)) {
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name, "district", $district_error, 'select');
                }
                else {
                    $valid_customer = $valid->error_display($form_name, "district", $district_error, 'select');
                }
            }
        }

        if(isset($_POST['city'])) {
            $city = $_POST['city'];
            $city = trim($city);
            if(!empty($city)){
             $city_error = $valid->common_validation($city,'City','select');
            }
            if(!empty($city_error)) {
                if(!empty($valid_customer)) {
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name, "city", $city_error, 'select');
                }
                else {
                    $valid_customer = $valid->error_display($form_name, "city", $city_error, 'select');
                }
            }
            else{
                if(isset($_POST['others_city']))
                {
                    $others_city = $_POST['others_city'];
                    $others_city = trim($others_city);
                    if(!empty($city) && $city == "Others") {
                        if(!empty($others_city) && strlen($others_city) > 30) {
                            $others_city_error = "Only 30 characters allowed";
                        }
                        else {
                            $others_city_error = $valid->valid_text($others_city,'City','0','30');
                        }
                        if(!empty($others_city_error)) {
                            if(!empty($valid_customer)) {
                                $valid_customer = $valid_customer." ".$valid->error_display($form_name, "others_city", $others_city_error, 'text');
                            }
                            else {
                                $valid_customer = $valid->error_display($form_name, "others_city", $others_city_error, 'text');
                            }
                        }
                        else {
                            $city = $others_city;
                            $city = trim($city);
                        }
                    }
                }
            }
        }

        if(!empty($edit_id)) {
            if($city != "Others" && (empty($others_city))){
                $others_city = $city;
            }
        }

        if(isset($_POST['address'])){
            $address = $_POST['address'];
            $address = trim($address);
            if(!empty($address)) {
                if(strlen($address) > 150) {
                    $address_error = "Only 150 characters allowed";
                }
                else {
                    $address_error = $valid->valid_address($address, "address", "0","150");   
                }
            }  
            if(!empty($address_error)) {
                if(!empty($valid_customer)) {
                    $valid_customer = $valid_customer." ".$valid->error_display($form_name, "address", $address_error, 'textarea');
                }
                else {
                    $valid_customer = $valid->error_display($form_name, "address", $address_error, 'textarea');
                }
            }  
        }
        

        if(isset($_POST['email'])){
			$email = $_POST['email'];
			if(!empty($email)) {
				$email_error = $valid->valid_email($email, "Email", "0");
				if(!empty($email_error)) {
					if(!empty($valid_customer)) {
						$valid_customer = $valid_customer." ".$valid->error_display($form_name, "email", $email_error, 'text');
					}
					else {
						$valid_customer = $valid->error_display($form_name, "email", $email_error, 'text');
					}
				}
			} 
		}

        if(isset($_POST['pincode'])){
			$pincode = $_POST['pincode'];
			if(!empty($pincode)) {
				$pincode_error = $valid->valid_pincode($pincode, "Pincode", "0");
				if(!empty($pincode_error)) {
					if(!empty($valid_customer)) {
						$valid_customer = $valid_customer." ".$valid->error_display($form_name, "pincode", $pincode_error, 'text');
					}
					else {
						$valid_customer = $valid->error_display($form_name, "pincode", $pincode_error, 'text');
					}
				}
			} 
		}

        
    
       
    
        $result = "";
        if(empty($valid_customer)) {
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();	
            if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
    
                $bill_company_id = $GLOBALS['bill_company_id'];
                $name_mobile_city = ""; $customer_details = ""; $lower_case_name=""; $product_name="";$agent_name = ""; 
                if(!empty($customer_name)) {
                    $customer_name = htmlentities($customer_name, ENT_QUOTES);
                    $lower_case_name = strtolower($customer_name);
                    $lower_case_name = htmlentities($lower_case_name, ENT_QUOTES);
                    $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
                }
                if(!empty($customer_name)) {
                    $name_mobile_city = $customer_name;
                    $customer_details = $customer_name;
                    $customer_name = $obj->encode_decode('encrypt', $customer_name);
                }

                
                if(!empty($email)) {
                    $email = $obj->encode_decode('encrypt', $email);
                } else {
                    $email = $GLOBALS['null_value'];
                }

                if(!empty($pincode)) {
                    $pincode = $obj->encode_decode('encrypt', $pincode);
                } else {
                    $pincode = $GLOBALS['null_value'];
                }

                if(!empty($address)) {
                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br>".str_replace("\r\n", "<br>", $address);
                    }
                    $address = $obj->encode_decode('encrypt', $address);
                }
                else {
                    $address = $GLOBALS['null_value'];
                }
                if(!empty($shipping_address)) {
                    $shipping_address = $obj->encode_decode('encrypt', $shipping_address);
                }
                else {
                    $shipping_address = $GLOBALS['null_value'];
                }
                if(!empty($city)) {
                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br>".$city;
                    }
                }
                if(!empty($district)) {
                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br>".$district."(Dist.)";
                    }
                }
                if(!empty($state)) {
                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br>".$state;
                    }
                    $state = $obj->encode_decode('encrypt', $state);
                }
                if(!empty($mobile_number)) {
                    $mobile_number = str_replace(" ", "", $mobile_number);

                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br> Mobile : ".$mobile_number;
                    }
                    if(!empty($name_mobile_city)) {
                        $name_mobile_city = $name_mobile_city." (".$mobile_number.")";
                        if(!empty($city)) {
                            $name_mobile_city = $name_mobile_city." - ".$city;
                        }
                       
                    }
                   
                    $mobile_number = $obj->encode_decode('encrypt', $mobile_number);
                }else {
                    $mobile_number = $GLOBALS['null_value'];
                }
                if(!empty($name_mobile_city)){
                    $name_mobile_city = $obj->encode_decode('encrypt', $name_mobile_city);
                }
                if(!empty($identification)) {
                    if(!empty($customer_details)) {
                        $customer_details = $customer_details."<br>".$identification;
                    }
                    $identification = $obj->encode_decode('encrypt', $identification);
                }
                else {
                    $identification = $GLOBALS['null_value'];
                }
                if(!empty($city)) {
                    $city = $obj->encode_decode('encrypt', $city);
                }
                else{
                    $city = $GLOBALS['null_value'];
                }
                if(!empty($district)) {
                    $district = $obj->encode_decode('encrypt', $district);
                }
                else{
                    $district = $GLOBALS['null_value'];
                }
                if(empty($customer_type)){
                    $customer_type = $GLOBALS['null_value'];
                }
                if(!empty($customer_details)) {
                    $customer_details = $obj->encode_decode('encrypt', $customer_details);
                }
                $prev_customer_id = ""; $customer_error = "";	$prev_customer_name ="";
                if(!empty($mobile_number)) {
                    $prev_customer_id = $obj->customerMobileExists($mobile_number);
                    if(!empty($prev_customer_id) && $prev_customer_id != $edit_id) {
                        $prev_customer_name = $obj->getTableColumnValue($GLOBALS['customer_table'],'customer_id',$prev_customer_id,'customer_name');
						$prev_customer_name = $obj->encode_decode("decrypt",$prev_customer_name);
                        $customer_error = "This mobile number is already exist in ".$prev_customer_name;
                        
                    }
                }
               
                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);                
                
                if(empty($edit_id)) {
                    if(empty($prev_customer_id)) {
                        $action = "";
                        if(!empty($name_mobile_city)) {
                            $action = "New customer Created. Details - ".$obj->encode_decode('decrypt', $name_mobile_city);
                        }
                        $null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name','bill_company_id','customer_type', 'customer_id', 'customer_name','lower_case_name', 'mobile_number', 'name_mobile_city','address','state', 'district', 'city', 'customer_details','email','others_city','deleted', 'wallet', 'pincode');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'","'".$bill_company_id."'", "'".$customer_type."'", "'".$null_value."'", "'".$customer_name."'","'".$lower_case_name."'", "'".$mobile_number."'", "'".$name_mobile_city."'", "'".$address."'","'".$state."'", "'".$district."'", "'".$city."'", "'".$customer_details."'","'".$email."'","'".$others_city."'","'0'", "'0'", "'".$pincode."'");
                        $customer_insert_id = $obj->InsertSQL($GLOBALS['customer_table'], $columns, $values, 'customer_id', '', $action);
                        if(preg_match("/^\d+$/", $customer_insert_id)) {	
                            // $balance = 1;
                            $customer_id = "";
                            $customer_id = $obj->getTableColumnValue($GLOBALS['customer_table'], 'id', $customer_insert_id, 'customer_id');	
                            $result = array('number' => '1', 'msg' => 'customer Successfully Created','customer_id' => $customer_id);
                            					
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $customer_insert_id);
                        }
                    
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $customer_error);
                    }
                }
                else {
                    if(empty($prev_customer_id) || $prev_customer_id == $edit_id) {
                        $getUniqueID = ""; 
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $edit_id, 'id');
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $action = "";
                            if(!empty($name_mobile_city)) {
                                $action = "customer Updated. Details - ".$obj->encode_decode('decrypt', $name_mobile_city);
                            }
                        
                            $columns = array(); $values = array();						
                            $columns = array('creator_name','customer_type', 'customer_name','lower_case_name', 'mobile_number', 'name_mobile_city', 'address', 'state',  'district', 'city', 'customer_details','others_city','email', 'wallet', 'pincode');
                            $values = array("'".$creator_name."'","'".$customer_type."'", "'".$customer_name."'", "'".$lower_case_name."'","'".$mobile_number."'", "'".$name_mobile_city."'",  "'".$address."'", "'".$state."'", "'".$district."'", "'".$city."'", "'".$customer_details."'","'".$others_city."'","'".$email."'", "'0'", "'".$pincode."'");
                            $user_update_id = $obj->UpdateSQL($GLOBALS['customer_table'], $getUniqueID, $columns, $values, $action);
                            if(preg_match("/^\d+$/", $user_update_id)) {	
                                $result = array('number' => '1', 'msg' => 'Updated Successfully','customer_id' => $edit_id);	
                                $customer_id = $edit_id;
                                // $balance = 1;
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $user_update_id);
                            }							
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $customer_error);
                    }
                }    
                if(!empty($balance) && $balance == 1) {
                    
                    $bill_id = $customer_id; 
                    $bill_date = date("Y-m-d");
                    $bill_number = $GLOBALS['null_value'];
                    $bill_type = "Opening Balance";
                        
                    $customer_id = $customer_id;
                    $customer_name = $name;
                    $customer_type = 'customer';
                    $payment_mode_id = $GLOBALS['null_value'];
                    $payment_mode_name = $GLOBALS['null_value'];
                    $bank_id = $GLOBALS['null_value'];
                    $bank_name = $GLOBALS['null_value'];
                    $imploded_amount = $GLOBALS['null_value'];
                    $credit  = 0; $debit = 0; 

                    if($opening_balance_type =='Credit'){
                        $credit  = $opening_balance; 
                    }else if($opening_balance_type =='Debit'){
                        $debit  = $opening_balance; 
                    }
                    if(empty($credit)){
                        $credit = 0;
                    }
                    if(empty($debit)){
                        $debit = 0;
                    }
                    if(empty($opening_balance)){
                        $opening_balance = 0;
                    }
                    if(empty($opening_balance_type)){
                        $opening_balance_type = $GLOBALS['null_value'];
                    }
                    if(!empty($opening_balance) && !empty($opening_balance_type)){

                        $update_balance ="";
                        $update_balance = $obj->UpdateBalance($bill_company_id,$bill_id,$bill_number,$bill_date,$bill_type,$customer_id,$name_mobile_city,$customer_type,$payment_mode_id,$payment_mode_name,$bank_id,$bank_name, $opening_balance,$opening_balance_type,'','','','');
                    }else{
                        $payment_unique_id = "";
                        $payment_unique_id = $obj->DeletePayment($bill_id);
                    }
                        
                } 
            }
            else {
                $result = array('number' => '2', 'msg' => 'Invalid IP');
            }
        }
        else {
            if(!empty($valid_customer)) {
                $result = array('number' => '3', 'msg' => $valid_customer);
            }
        }
        
        if(!empty($result)) {
            $result = json_encode($result);
        }
        echo $result; exit;
    }
if(isset($_POST['page_number'])) {
    $page_number = $_POST['page_number'];
    $page_limit = $_POST['page_limit'];
    $page_title = $_POST['page_title']; 
    $search_text = "";
    if(isset($_POST['search_text'])) {
        $search_text = $_POST['search_text'];
    }

    $customer_type = "";
    if(isset($_POST['customer_type'])) {
        $customer_type = $_POST['customer_type'];
    }

    $total_records_list = array();
    $total_records_list = $obj->FilterCustomerList($customer_type);
    // $total_records_list = $obj->getTableRecords($GLOBALS['customer_table'], '', '');


    if(!empty($search_text)) {
        $search_text = strtolower($search_text);
        $list = array();
        if(!empty($total_records_list)) {
            foreach($total_records_list as $val) {
                if(strpos(strtolower($obj->encode_decode('decrypt', $val['name_mobile_city'])), $search_text) !== false) {
                    $list[] = $val;
                }
            }
        }
        $total_records_list = $list;
    }
    
    $total_pages = 0;	
    $total_pages = count($total_records_list);
    
    $page_start = 0; $page_end = 0;
    if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
        if($total_pages > $page_limit) {
            if($page_number) {
                $page_start = ($page_number - 1) * $page_limit;
                $page_end = $page_start + $page_limit;
            }
        }
        else {
            $page_start = 0;
            $page_end = $page_limit;
        }
    }

    $show_records_list = array();
    if(!empty($total_records_list)) {
        foreach($total_records_list as $key => $val) {
            if($key >= $page_start && $key < $page_end) {
                $show_records_list[] = $val;
            }
        }
    }
    
    $prefix = 0;
    if(!empty($page_number) && !empty($page_limit)) {
        $prefix = ($page_number * $page_limit) - $page_limit;
    } 

    if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] == $GLOBALS['staff_user_type']) {
        $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
    }

    
        if($total_pages > $page_limit) { ?>
        <div class="pagination_cover mt-3"> 
            <?php include("pagination.php"); ?> 
        </div> 
    <?php } ?>
    <?php
        $view_access_error = "";
        if(!empty($login_staff_id)) {
            $permission_action = $view_action;
            include('permission_action.php');
        }
        if(empty($view_access_error)) {  ?>
            <table class="table nowrap cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Customer Type</th>
                        <th>Customer Name</th>
                        <th>Wallet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($show_records_list)) { 
                        foreach($show_records_list as $key => $data) {
                            $index = $key + 1;
                            if(!empty($prefix)) { $index = $index + $prefix; } ?>
                            <tr>
                                <td class="ribbon-header" style="cursor:default;">   
                                    <?php  echo $index; ?>
                                </td>
                                <td>
                                <?php
                                    if(!empty($data['customer_type']) && $data['customer_type'] != $GLOBALS['null_value']) {
                                        if($data['customer_type'] == '1'){
                                            echo "Direct Customer";
                                        }else  if($data['customer_type'] == '2'){
                                            echo "Online Customer";
                                        }else  if($data['customer_type'] == '3'){
                                            echo "Online and Direct Customer";
                                        }
                                    } else{
                                        echo "-";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(!empty($data['name_mobile_city'])) {
                                            $data['name_mobile_city'] = $obj->encode_decode('decrypt', $data['name_mobile_city']);
                                            echo $data['name_mobile_city'];
                                        }
                                    ?>
                                    <div class="w-100 py-2">
                                        Creator :
                                        <?php
                                            if(!empty($data['creator_name'])) {
                                                $data['creator_name'] = $obj->encode_decode('decrypt', $data['creator_name']);
                                                echo $data['creator_name'];
                                            }
                                        ?>                                        
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        echo "-";
                                    ?>
                                </td>
                                
                                <?php 
                                    $edit_access_error = "";
                                    if(!empty($login_staff_id)) {
                                        
                                        $permission_action = $edit_action;
                                        
                                        include('permission_action.php');
                                    }

                                    $delete_access_error = "";
                                    if(!empty($login_staff_id)) {
                                        $permission_action = $delete_action;
                                        include('permission_action.php');
                                    }

                                    
                                ?>
                                <?php if(empty($edit_access_error) || empty($delete_access_error)){ ?>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" role="button" class="btn btn-dark show-button poppins" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <?php 
                                                $edit_access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_action = $edit_action;
                                                    include('permission_action.php');
                                                }
                                                if(empty($edit_access_error)) {
                                            ?> 
                                            <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['customer_id'])) { echo $data['customer_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp;Edit</a></li>
                                            <?php } ?>
                                                <?php 
                                                    $delete_access_error = "";
                                                    if(!empty($login_staff_id)) {
                                                        $permission_action = $delete_action;
                                                        include('permission_action.php');
                                                    }
                                                    if(empty($delete_access_error)) {
                                                        $linked_count = 0;
                                                        // $linked_count = $obj->GetcustomerLinkedCount($data['customer_id']); 
                                                        if($linked_count > 0) {
                                                ?>                             
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                            <?php 
                                                }
                                                else {
                                            ?>
                                            <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['customer_id'])) { echo $data['customer_id']; } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                        
                                            <?php 
                                                    }
                                                } 
                                            ?>
                                        </ul>
                                    </div> 
                                    
                                </td>
                                <?php } ?>
                            </tr>
                <?php 
                        } 
                    }  
                    else {
                ?>
                        <tr>
                            <td colspan="4" class="text-center">Sorry! No records found</td>
                        </tr>
                <?php 
                    } 
                ?>
                </tbody>
            </table> 
            <?php	
        }                 
} 

 
    if(isset($_REQUEST['delete_customer_id'])) {
        $delete_customer_id = $_REQUEST['delete_customer_id'];
        $delete_customer_id = trim($delete_customer_id);
        $msg = "";
        if(!empty($delete_customer_id)) {	
            $customer_unique_id = "";
            $customer_unique_id = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $delete_customer_id, 'id');
            if(preg_match("/^\d+$/", $customer_unique_id)) {
                $name_mobile_city = "";
                $name_mobile_city = $obj->getTableColumnValue($GLOBALS['customer_table'], 'customer_id', $delete_customer_id, 'name_mobile_city');
            
                $action = "";
                if(!empty($name_mobile_city)) {
                    $action = "customer Deleted. Details - ".$obj->encode_decode('decrypt', $name_mobile_city);
                }
                $linked_count = 0;
                // $linked_count = $obj->GetcustomerLinkedCount($delete_customer_id); 
                if(empty($linked_count)) {	
                    $columns = array(); $values = array();			
                    $columns = array('deleted');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['customer_table'], $customer_unique_id, $columns, $values, $action);
                }
                else {
                    $msg = "This customer is associated with other screens";
                }
            }
            else {
                $msg = "Invalid customer";
            }
        }
        else {
            $msg = "Empty customer";
        }
        echo $msg;
        exit;	
    }

?>