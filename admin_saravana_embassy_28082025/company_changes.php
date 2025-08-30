<?php
	include("include_files.php");

	if(isset($_REQUEST['show_company_id'])) { 
        $show_company_id = $_REQUEST['show_company_id'];
        
        $name = "";  $address = ""; $state = ""; $district = ""; $gst_number = ""; $pincode = ""; $city = ""; $email = ""; $mobile_number = ""; $outsource_party_check = "";$short_form = ""; $country = "India"; $logo = "";
        if(!empty($show_company_id)) {
            $company_list = array();
            $company_list = $obj->getTableRecords($GLOBALS['company_table'], 'company_id', $show_company_id);

			if(!empty($company_list)) {
				foreach($company_list as $data) {
					if(!empty($data['name']) && $data['name'] != $GLOBALS['null_value']) {
						$name = html_entity_decode($obj->encode_decode('decrypt', $data['name']));
					}
                    if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
						$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
					}
					if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
						$address = html_entity_decode($obj->encode_decode('decrypt', $data['address']));
					}
					if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
						$state = $obj->encode_decode('decrypt', $data['state']);
					}                     
					if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
						$gst_number = $obj->encode_decode('decrypt', $data['gst_number']);
					}
					if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
						$email = html_entity_decode($obj->encode_decode('decrypt', $data['email']));
					}
					if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
						$district = $obj->encode_decode('decrypt', $data['district']);
					} 
                    if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
						$city = $obj->encode_decode('decrypt', $data['city']);
					} 
                    if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
						$pincode = $obj->encode_decode('decrypt', $data['pincode']);
					}   
                    if(!empty($data['logo']) && $data['logo'] != $GLOBALS['null_value']) {
                        $logo = $data['logo'];
					}
				}
            }
        } 

        $target_dir = $obj->image_directory();?>

        <form class="poppins pd-20 redirection_form" name="company_form" method="POST">
			<div class="card-header ">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<?php if(empty($show_company_id)){ ?>
    						<div class="h5">Add Company</div>
                        <?php } else {?>
    						<div class="h5">Edit Company</div>
                        <?php }?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('company.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3 justify-content-center">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_company_id)) { echo $show_company_id; } ?>">
                    <div class="col-lg-9">
                        <div class="row">
                            <input type="hidden" name="edit_id" value="<?php if(!empty($show_company_id)) { echo $show_company_id; } ?>">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="name" name="name" class="form-control shadow-none" value="<?php if(!empty($name)) { echo $name; } ?>"  placeholder="" onkeydown="Javascript:KeyboardControls(this,'text',50);InputBoxColor(this,'text');">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="new_smallfnt">Contains Text, Symbols  &amp;@()'. Max-character : 50.</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" class="form-control shadow-none"  id="mobile_number" name="mobile_number" maxlength="10" value="<?php if(!empty($mobile_number)) { echo $mobile_number; } ?>" placeholder="" onfocus="Javascript:KeyboardControls(this,'mobile_number',10);" onkeyup="Javascript:InputBoxColor(this,'text');">
                                        <label>Mobile Number <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="new_smallfnt">Numbers Only (only 10 digits)</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="email" name="email" class="form-control shadow-none" value="<?php if(!empty($email)) { echo $email; } ?>" placeholder="" onkeydown="Javascript:KeyboardControls(this,'email',30);" onkeyup="Javascript:InputBoxColor(this,'text');ToLower(this);">
                                        <label>Email</label>
                                    </div>
                                    <div class="new_smallfnt">Email Format-Max-character : 30</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <textarea  id="address" name="address" class="form-control" placeholder="" onkeydown="Javascript:KeyboardControls(this,'',150);InputBoxColor(this,'text');"><?php if(!empty($address)) { echo $address; } ?></textarea>
                                        <label>Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="new_smallfnt">Contains Text,Numbers,Symbols(Except <>?{}!*^%$).Max-character : 150</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border select2_cover">
                                        <div class="w-100" style="display:none;">
                                            <select class="select2 select2-danger" name="country" id="country" onchange="Javascript:getCountries('company',this.value,'','','');" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option>India</option>
                                            </select>
                                        </div>
                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger"  style="width: 100%;" name="state" onchange="Javascript:getStates('company',this.value,'','');">
                                            <option value="">Select State</option>
                                        </select>
                                        <label>State <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <select name="district" class="select2 select2-danger" data-dropdown-css-class="select2-danger"  style="width: 100%;" onchange="Javascript:getDistricts('company',this.value,'');">
                                            <option value="">Select District</option>
                                        </select>
                                        <label>District</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <select name="city" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:getCities('company','',this.value);">
                                            <option>Select City</option>
                                        </select>
                                        <label>City</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 d-none"  id="others_city_cover">
                                <div class="form-group mb-1">
                                    <div class="form-label-group in-border pb-2">
                                        <input type="text" id="others_city" name="others_city" class="form-control shadow-none" value="" onkeydown="Javascript:KeyboardControls(this,'text',30,1);">
                                        <label>Others city <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="new_smallfnt">Contains Text Only.Max-character : 30.</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="pincode" name="pincode" class="form-control shadow-none"  value="<?php if(!empty($pincode)) { echo $pincode; } ?>"  placeholder="" onfocus="Javascript:KeyboardControls(this,'number',6);" onkeyup="Javascript:InputBoxColor(this,'text');">
                                        <label>Pincode</label>
                                    </div>
                                    <div class="new_smallfnt">Numbers Only (only 6 digits)</div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" class="form-control shadow-none" name="upi_id" placeholder="" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" required>
                                        <label>UPI ID</label>
                                    </div>
                                </div>
                            </div>                         -->
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="gst_number" name="gst_number" class="form-control shadow-none" value="<?php if(!empty($gst_number)) { echo $gst_number; } ?>" placeholder="" onkeydown="Javascript:KeyboardControls(this,'',16);InputBoxColor(this,'text');">
                                        <label>GST No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="new_smallfnt"> Only GST Format</div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-3 text-center">
                                <button class="btn btn-danger submit_button" type="button" onClick="Javascript:SaveModalContent('company_form', 'company_changes.php', 'company.php');">
                                    Save Company Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-4 col-12">
                                <div id="logo_cover" class="form-group">
                                <div class="image-upload text-center">
                                    <label for="logo">   
                                        <div class="logo_list row">
                                            <div class="col-12">
                                                <div class="cover">
                                                    <?php if(!empty($logo) && file_exists($target_dir.$logo)) { ?>
                                                        <button type="button" onclick="Javascript:delete_upload_image_before_save(this, 'logo', '<?php if(!empty($logo)) { echo $logo; } ?>');" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                        <img id="logo_preview" src="<?php echo $target_dir.$logo; ?>" style="max-width: 100%; max-height: 150px;" />
                                                        <input type="hidden" name="logo_name[]" value="<?php if(!empty($logo)) { echo $logo; } ?>">
                                                    <?php } else { ?>
                                                        <img id="logo_preview" src="images/cloudupload.png" style="max-width: 150px;" />
                                                    <?php } ?>
                                                </div>
                                            </div>    
                                            <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                                        </div>
                                        <input type="file" name="logo" id="logo" style="display: none;" accept="image/*" />
                                    </label>
                                </div>
                                <div class="logo_container" style="display: none;">
                                    <canvas id="logo_canvas"></canvas>
                                </div>
                            </div>
                            
                        </div>
                    </div>                    

            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript">                
                jQuery(document).ready(function(){
					jQuery('.add_update_form_content').find('select').select2();
				}); 
            </script>
			<script>
				getCountries('company','<?php if(!empty($country)) { echo $country; } ?>', '<?php if(!empty($state)) { echo $state; } ?>', '<?php if(!empty($district)) { echo $district; } ?>', '<?php if(!empty($city)) { echo $city; } ?>');
			</script>			
            <script type="text/javascript" src="include/js/image_upload.js"></script>
        </form>
		<?php
    } 
    if(isset($_POST['name'])) {	
        $name = ""; $name_error = "";
        $address = ""; $address_error = "";
        $gst_number = ""; $gst_number_error = ""; 
        $city = ""; $city_error = "";
        $district = ""; $district_error = "";
        $email = ""; $email_error = ""; 
        $state = ""; $state_error = ""; 
        $pincode_error = ""; $pincode = "";
        $mobile_number = ""; $mobile_number_error = "";
        $others_city ="";$others_city_error = "";
        $logo_name = array(); $logo = "";
        $valid_company = ""; $form_name = "company_form";
        
        $name = $_POST['name'];
        if(strlen($name) > 50){
            $name_error = "Only 50 characters allowed";
        }
        else{
            $name_error = $valid->valid_company_name($name,'name','1');
        }
        if(!empty($name_error)) {
            if(!empty($valid_company)){
                $valid_company = $valid_company." ".$valid->error_display($form_name, "name", $name_error, 'text');
            }
            else{
                $valid_company = $valid->error_display($form_name, "name", $name_error, 'text');
            }
        }

        if(isset($_POST['address'])) {
            $address = $_POST['address'];
            if(strlen($address) > 150){
                $address_error = "Only 150 characters allowed";
            }
            else{
                $address_error = $valid->valid_address($address,'address','1','');
            }
            if(!empty($address_error)){
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "address", $address_error, 'textarea');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "address", $address_error, 'textarea');
                }
            }
        }

        if(isset($_POST['state'])) {
            $state = $_POST['state'];
            $state = $valid->clean_value($state);
            if(empty($state)){
                $state_error = "Select the state";
            }
            if(!empty($state_error)){
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "state", $state_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "state", $state_error, 'select');
                }
            }
        }

        if(isset($_POST['mobile_number'])){
            $mobile_number = $_POST['mobile_number'];
            $mobile_number = $valid->clean_value($mobile_number);
            $mobile_number_error = $valid->valid_mobile_number($mobile_number, "Mobile Number", "1");
                
            if(!empty($mobile_number_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
            }
        }

        if(isset($_POST['gst_number'])){
            $gst_number = $_POST['gst_number'];
            $gst_number = $valid->clean_value($gst_number);
            $gst_number_error = $valid->valid_gst_number($gst_number, "GST Number", "1");

            if(!empty($gst_number_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "gst_number", $gst_number_error, 'text');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "gst_number", $gst_number_error, 'text');
                }
            }
        }

        if(isset($_POST['city'])) {
            $city = $_POST['city'];
            $city = trim($city);
            if(!empty($city_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "city", $city_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "city", $city_error, 'select');
                }
            }
        }

        if(isset($_POST['district'])) {
            $district = $_POST['district'];
            $district = trim($district);
            
            if(!empty($district_error)) {
                if(!empty($valid_company)) {
                    $valid_company = $valid_company." ".$valid->error_display($form_name, "district", $district_error, 'select');
                }
                else {
                    $valid_company = $valid->error_display($form_name, "district", $district_error, 'select');
                }
            }
        }
        

        if(isset($_POST['pincode'])){
            $pincode = $_POST['pincode'];
            $pincode = $valid->clean_value($pincode);
            if(!empty($pincode)) {
                $pincode_error = $valid->valid_pincode($pincode, "Pincode", "1");
                if(!empty($pincode_error)) {
                    if(!empty($valid_company)) {
                        $valid_company = $valid_company." ".$valid->error_display($form_name, "pincode", $pincode_error, 'text');
                    }
                    else {
                        $valid_company = $valid->error_display($form_name, "pincode", $pincode_error, 'text');
                    }
                }
            }
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $email = $valid->clean_value($email);
            
            if(!empty($email)) {
                if(strlen($email) > 30){
                    $email_error = "Only 30 characters allowed";
                }
                else{
                    $email_error = $valid->valid_email($email, "email", "0");
                }
                
                if(!empty($email_error)) {
                    if(!empty($valid_company)) {
                        $valid_company = $valid_company." ".$valid->error_display($form_name, "email", $email_error, 'text');
                    }
                    else {
                        $valid_company = $valid->error_display($form_name, "email", $email_error, 'text');
                    }
                }
            } 
        }

        if(isset($_POST['others_city'])){
            $others_city = $_POST['others_city'];
            if($city == "Others"){
                $others_city_error = $valid->valid_text($others_city,'City','1');
                if(!empty($others_city_error)){
                    if(!empty($valid_company)) {
                        $valid_company = $valid_company." ".$valid->error_display($form_name, "others_city", $others_city_error, 'text');
                    }
                    else {
                        $valid_company = $valid->error_display($form_name, "others_city", $others_city_error, 'text');
                    }
                }
                else{
                    $city = $others_city;
                    $city = $valid->clean_value($city);
                }
            }
        }

        if(isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
        }
        if(!empty($edit_id)) {
            if($city != "Others" && (empty($others_city))){
                $others_city = $city;
            }
        }
        if(isset($_POST['logo_name'])) {
            $logo_name = $_POST['logo_name'];	
        }
        $result = ""; $lower_case_name = "";
        
        if(empty($valid_company)) {
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();	
            if(preg_match("/^\d+$/", $check_user_id_ip_address)) {

                if(!empty($name)) {
                    $name_array = "";
                    $name_array = explode(" ", $name);
                    if(is_array($name_array)) {
                        for($n = 0; $n < count($name_array); $n++) {
                            if(!empty($name_array[$n])) {
                                $name_array[$n] = trim($name_array[$n]);
                                // $name_array[$n] = strtolower($name_array[$n]);
                                // $name_array[$n] = ucfirst($name_array[$n]);
                            }
                            else {
                                unset($name_array[$n]);
                            }
                        }
                        $name = implode(" ", $name_array); 
                    }  
                    $name = htmlentities($name,ENT_QUOTES);
                    $lower_case_name = strtolower($name);   
                    $name = $obj->encode_decode('encrypt', $name);
                    $lower_case_name = htmlentities($lower_case_name,ENT_QUOTES);
                    $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
                }

                if(!empty($logo_name) && is_array($logo_name)) {
                    $logo = implode("$$$", $logo_name);
                }
                else if(!empty($logo_name)) {
                    $logo = $logo_name;
                }
                
                if(empty($logo)) {
                    $logo = $GLOBALS['null_value'];
                }
                if(!empty($address)) {
                    $address = htmlentities($address,ENT_QUOTES);
                    $address = $obj->encode_decode('encrypt', $address);
                }
                else{
                    $address = $GLOBALS['null_value'];
                }

                if(!empty($city)) {
                    $city = $obj->encode_decode('encrypt', $city);
                }
                if(!empty($district)) {
                    $district = $obj->encode_decode('encrypt', $district);
                }
                
                if(!empty($state)) {
                    $state = $obj->encode_decode('encrypt', $state);
                }

                if(!empty($mobile_number)) {
                    $mobile_number = $obj->encode_decode('encrypt', $mobile_number);
                }
            
                if(!empty($gst_number)) {
                    $gst_number = $obj->encode_decode('encrypt', $gst_number);
                }
                else {
                    $gst_number = $GLOBALS['null_value'];
                } 

                if(!empty($email)) {
                    $email = htmlentities($email,ENT_QUOTES);
                    $email = $obj->encode_decode('encrypt', $email);
                }
                else {
                    $email = $GLOBALS['null_value'];
                } 

                if(!empty($pincode)) {
                    $pincode = $obj->encode_decode('encrypt', $pincode);
                }
                else{
                    $pincode = $GLOBALS['null_value'];
                }

                $prev_company_id = ""; $columns = array(); $values = array(); $check_companys = array(); $company_error = "";	$prev_mobile_id = ""; $mobile_error = "";
                // if(!empty($lower_case_name)) {
                //     $prev_company_id = $obj->getTableColumnValue($GLOBALS['company_table'], 'lower_case_name', $lower_case_name, 'company_id');
                //     if(!empty($prev_company_id)) {
                //         $company_error = "This company name is already exist";
                //     }
                // }	
                $error_mobile_no = "";
                // if(!empty($mobile_number)) {
                //     $prev_mobile_id = $obj->getTableColumnValue($GLOBALS['company_table'], 'mobile_number', $mobile_number, 'company_id');
                //     if(!empty($prev_mobile_id)) {
                //         $error_mobile_no = $obj->getTableColumnValue($GLOBALS['company_table'],'company_id',$prev_mobile_id, 'name');
                //         if(!empty($error_mobile_no)){
                //             $error_mobile_no = html_entity_decode($obj->encode_decode("decrypt",$error_mobile_no));
                //         }
                //         $mobile_error = "This Mobile Number is already exist in ".$error_mobile_no;
                //     } 
                // }

                $image_copy = 0; $prev_logo = "";
                if(!empty($edit_id)) {		
                    $prev_logo = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $edit_id, 'logo');
                }

                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);

                if(empty($edit_id)) {
                    if(empty($prev_company_id)) {
                        if(empty($prev_mobile_id)){
                            $action = "";
                            if(!empty($name)) {
                                $action = "New Company Created. Name - ".html_entity_decode($obj->encode_decode('decrypt', $name));
                            }

                            $check_companies = array(); $company_count = 0;
                            $check_companies = $obj->getTableRecords($GLOBALS['company_table'], '', '');
                            if(!empty($check_companies)) {
                                $company_count = count($check_companies);
                            }

                            $primary_company = 0;
                            if(empty($company_count)) {
                                $primary_company = 1;
                            }

                            $null_value = $GLOBALS['null_value'];
                            $columns = array('created_date_time', 'creator', 'creator_name', 'company_id', 'name', 'lower_case_name','email', 'gst_number', 'mobile_number','address', 'state','district','city', 'pincode','others_city','primary_company', 'logo','deleted');
                            $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'","'".$email."'","'".$gst_number."'","'".$mobile_number."'",  "'".$address."'", "'".$state."'", "'".$district."'", "'".$city."'", "'".$pincode."'","'".$others_city."'","'".$primary_company."'", "'".$logo.$GLOBALS['image_format']."'", "'0'");
                            $company_insert_id = $obj->InsertSQL($GLOBALS['company_table'], $columns, $values,'company_id', '', $action);	               
                            if(preg_match("/^\d+$/", $company_insert_id)) {
                                $image_copy = 1;
                                $company_id = $obj->getTableColumnValue($GLOBALS['company_table'], 'id', $company_insert_id, 'company_id');
                                if(empty($company_count) && !empty($company_id)) {
                                    $_SESSION['bill_company_id'] = $company_id;
                                }
                                $result = array('number' => '1', 'msg' => 'Company Successfully Created');
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $company_insert_id);
                            }
                            
                        }
                        else{
                            if(!empty($mobile_error)){
                                $result = array('number' => '2', 'msg' => $mobile_error);
                            }
                        }
                    }
                    else {
                        if(!empty($company_error)) {
                            $result = array('number' => '2', 'msg' => $company_error);
                        } 
                    }	
                }
                else {
                    if(empty($prev_company_id) || $prev_company_id == $edit_id) {
                        if(empty($prev_mobile_id) || $prev_mobile_id == $edit_id){
                            $getUniqueID = "";
                            $getUniqueID = $obj->getTableColumnValue($GLOBALS['company_table'], 'company_id', $edit_id, 'id');
                            if(preg_match("/^\d+$/", $getUniqueID)) {
                                $action = "";
                                if(!empty($name)) {
                                    $action = "Company Updated. Name - ".$obj->encode_decode('decrypt', $name);
                                }

                                $columns = array(); $values = array();						
                                $columns = array('creator_name', 'name', 'lower_case_name','email','gst_number','mobile_number','address', 'city', 'district', 'state', 'pincode','others_city','logo');
                                $values = array("'".$creator_name."'", "'".$name."'", "'".$lower_case_name."'","'".$email."'","'".$gst_number."'","'".$mobile_number."'","'".$address."'", "'".$city."'", "'".$district."'", "'".$state."'", "'".$pincode."'","'".$others_city."'","'".$logo.$GLOBALS['image_format']."'");
                                $company_update_id = $obj->UpdateSQL($GLOBALS['company_table'], $getUniqueID, $columns, $values, $action);
                                if(preg_match("/^\d+$/", $company_update_id)) {
                                    $image_copy = 1;
                                    $result = array('number' => '1', 'msg' => 'Updated Successfully');					
                                }
                                else {
                                    $result = array('number' => '2', 'msg' => $company_update_id);
                                }							
                            }
                            
                        }
                        else{
                            $result = array('number' => '2', 'msg' => $mobile_error);
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $company_error);
                    }
                }
                if(!empty($image_copy) && $image_copy == 1) {
                    $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
                    if(!empty($logo)) {				
                        if(file_exists($temp_dir.$logo)) {   
                            if(!empty($prev_logo)) {		
                                if(file_exists($target_dir.$prev_logo)) {   
                                    unlink($target_dir.$prev_logo);
                                }
                            }
                            copy($temp_dir.$logo, $target_dir.$logo.$GLOBALS['image_format']);
                        }
                        else {
                            if($logo == $GLOBALS['null_value']) {
                                if(!empty($prev_logo) && file_exists($target_dir.$prev_logo)) {   
                                    unlink($target_dir.$prev_logo);
                                }
                            }
                        }
                    }
                    $obj->clear_temp_image_directory();
                }	
            }
            else {
                $result = array('number' => '2', 'msg' => 'Invalid IP');
            }
        }
        else {
            if(!empty($valid_company)) {
                $result = array('number' => '3', 'msg' => $valid_company);
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

        $login_staff_id = "";
        if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
            $login_staff_id =  $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
        }
        
        $total_records_list = array();

        $total_records_list=$obj->getTableRecords($GLOBALS['company_table'],'',''); 

        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if( (strpos(strtolower(html_entity_decode($obj->encode_decode('decrypt', $val['name']))), $search_text) !== false) || (strpos(strtolower($obj->encode_decode('decrypt', $val['mobile_number'])), $search_text) !== false) ) {
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
        } ?>
        
        <?php if($total_pages > $page_limit) { ?>
            <div class="pagination_cover mt-3"> 
                <?php
                    include("pagination.php");
                ?> 
            </div>
        <?php } ?>
        
		<table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Created Date</th>
                    <th>Company Name</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!empty($show_records_list)) {
                    // $edit_action = $obj->encode_decode('encrypt', 'edit_action');
                    foreach($show_records_list as $key => $list) {
                        $index = $key + 1;
                        if(!empty($prefix)) { $index = $index + $prefix; } ?>
                        <tr class="bordered_row">

                            <td style="cursor:default;" onclick="ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');"><?php echo $index; ?></td>
                            <td onclick="ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');">
                                <?php
                                    if (!empty($list['created_date_time'])) {
                                        echo date("d-m-Y", strtotime($list['created_date_time']));
                                    }  
                                ?>
                            </td>
                            <td onclick="ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');">
                                <?php
                                    if(!empty($list['name'])) {
                                        $list['name'] = $obj->encode_decode('decrypt', $list['name']);
                                        echo html_entity_decode($list['name']);
                                    }
                                ?>
                            </td>
                            <td onclick="ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');">
                                <?php
                                    if(!empty($list['mobile_number'])) {
                                        $list['mobile_number'] = $obj->encode_decode('decrypt', $list['mobile_number']);
                                        echo($list['mobile_number']);
                                    }
                                ?>
                            </td>
                            <td>
                                    <a class="pr-2" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['company_id'])) { echo $list['company_id']; } ?>');"><i class="fa fa-pencil text-dark"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else {
                    ?>
                    <tr>
                        <td colspan="5" class="text-center">Sorry! No records found</td>
                    </tr>
            <?php }  ?>
            </tbody>

        </table>  
                      
		<?php	
	}
    ?>