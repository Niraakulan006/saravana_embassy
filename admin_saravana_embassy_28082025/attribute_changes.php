<?php
	include("include_files.php");
     $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_page = $GLOBALS['attribute_module'];
        }
    }
     $show_attribute_id = "";
     
	if(isset($_REQUEST['show_attribute_id'])) {$show_attribute_id = "";
        $show_attribute_id = $_REQUEST['show_attribute_id'];
        // $site_modules = $GLOBALS['site_modules'];
        
        $attribute_name = ""; $attribute_id = "";
        if(!empty($show_attribute_id)) {
            $attribute_list = array();
			$attribute_list = $obj->getTableRecords($GLOBALS['attribute_table'], 'attribute_id', $show_attribute_id);
            // print_r($attribute_list);
            if(!empty($attribute_list)) {
                foreach($attribute_list as $data) {
                    if(!empty($data['attribute_name'])) {
                        $attribute_name = $obj->encode_decode('decrypt', $data['attribute_name']);
					}
                    if(!empty($data['attribute_id'])) {
                        $attribute_id = $obj->encode_decode('decrypt', $data['attribute_id']);
					}
                    if(!empty($data['category_id'])) {
                        $category_id = $data['category_id'];
					}
                }
            }
		}
        $category_list = array();
	    $category_list = $obj->getTableRecords($GLOBALS['category_table'], '', ''); 
        
        ?>
        <form class="poppins pd-20 redirection_form" name="attribute_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(empty($show_attribute_id)){ ?>
						    <div class="h5">Add Attribute</div>
                        <?php }  else { ?>
                            <div class="h5">Edit Attribute</div>
                        <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('attribute.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row justify-content-center p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_attribute_id)) { echo $show_attribute_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger add_click_enter" name="category_id" id="category"  onchange="Javascript:focusAttributeName();InputBoxColor(this,'select');" data-dropdown-css-class="select2-danger" data-placeholder="Select a Category" style="width: 100%;">
                                <option value="">Select Category</option>
                                <?php
                                    if(!empty($category_list)) {
                                        foreach($category_list as $data) { 
                                                /* if(!empty($data['attribute_check'])){ */ 
                                                ?>
                                                <option value="<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>" <?php if(!empty($category_id) && $data['category_id'] == $category_id) { ?> selected <?php } ?> >
                                                    <?php
                                                        if(!empty($data['name'])) {
                                                            $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                                            echo $data['name'];
                                                        }
                                                    ?>
                                                </option>
                                                <?php
                                            /* } */
                                        }
                                    }
                                ?>
                        
                            </select>
                            <label>Select Category <span class="text-danger">*</span></label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-6 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <div class="input-group">
                                <input type="text" id="name" name="attribute_name" class="form-control shadow-none add_click_enter" value="<?php if(!empty($attribute_name)) { echo $attribute_name; } ?>" placeholder="" onkeydown="Javascript:KeyboardControls(this,'',30);InputBoxColor(this,'text');">
                                <label>Attribute</label>
                                <?php if(empty($show_attribute_id)){ ?>
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="button" onClick="Javascript:addAttributeDetails();"><i class="fa fa-plus"></i></button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center p-3"> 
                <?php if(empty($show_attribute_id)){ ?>
                    <div class="col-lg-6">
                        <div class="table-responsive text-center">
                            <input type="hidden" name="attribute_count" value="<?php if(!empty($attribute_row_index)) { echo $attribute_row_index; } else { echo "0"; } ?>">
                            <table class="table nowrap cursor smallfnt w-100 table-bordered added_attribute_table">
                                <thead class="bg-dark smallfnt">
                                    <tr style="white-space:pre;">
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Attribute Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div> 
                <?php } ?>   
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger submit_button" type="button" onClick="Javascript:SaveModalContent('attribute_form', 'attribute_changes.php', 'attribute.php');">
                        Save Attribute
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript" src="include/js/attribute.js"></script>

            <script>
                $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })})
            </script>
             <script>
                $(document).ready(function() {
                    jQuery('.add_click_enter').on("keypress", function(e) {
                        if (e.keyCode == 13) {
                            addAttributeDetails();
                            return false; 
                        }
                    });
                });
            </script>
        </form>
		<?php
    } 
    if(isset($_POST['attribute_name'])){
        $attribute_name = array(); $category_ids = array(); $single_categpry_id= ""; $attribute_name_error = ""; $edit_id= ""; $single_lower_case_name =""; $category_id= ""; 
        $valid_attribute= ""; $form_name= "attribute_form"; $attribute_error= ""; $single_attribute_name ="";

            if(isset($_POST['edit_id'])) {
                $edit_id = $_POST['edit_id'];
            }
           
            if(!empty($edit_id)) {
                if(isset($_POST['category_id'])) {
                    $single_category_id = $_POST['category_id'];
                    // echo $single_category_id;
                }
                if(empty($single_category_id)) {
                    $category_id_error = "Choose the category";  
                } 
                if(!empty($category_id_error)) {
                    if(!empty($valid_attribute)) { 
                        $valid_attribute = $valid_attribute." ".$valid->error_display($form_name, "category_id", $category_id_error, 'select');
                    }
                    else {
                        $valid_attribute = $valid->error_display($form_name, "category_id", $category_id_error, 'select');
                    }
                }
                if(isset($_POST['attribute_name'])) {
                    $single_attribute_name = $_POST['attribute_name'];
                    // echo ($single_attribute_name);
                    // if(empty($single_attribute_name)) {
                    //     $attribute_name_error = "Enter Attribute Name";
                    //     if(!empty($attribute_name_error)) {
                    //         $valid_attribute = $valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');			
                    //     }
                    // }  
                    if(!empty($single_attribute_name)) {
                          $single_attribute_name =trim($single_attribute_name);

                        // if(!preg_match("/^(?!\d+$)[a-zA-Z0-9\s]+$/", $single_attribute_name)) {
                        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $single_attribute_name)) {

                             $attribute_error = "Invalid Attribute Name";
                        }
                        if(!empty($attribute_error)) {
                            if(!empty($valid_attribute)) { 
                                $valid_attribute = $valid_attribute." ".$valid->error_display($form_name, "attribute_name", $attribute_error, 'text');
                            }else{
                                $valid_attribute = $valid->error_display($form_name, "attribute_name", $attribute_error, 'text');   
                            }
                        }

                    }else{
                        $attribute_name_error = "Enter Attribute Name";
                        if(!empty($attribute_name_error)) {
                            if(!empty($valid_attribute)) { 
                                $valid_attribute = $valid_attribute." ".$valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');
                            }else{
                              $valid_attribute = $valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');        
                            }    
                        }
                    }
                    $single_lower_case_name = strtolower($single_attribute_name);
                    $single_attribute_name = $obj->encode_decode("encrypt", $single_attribute_name);
                    $single_lower_case_name = $obj->encode_decode("encrypt", $single_lower_case_name);

                    if(!empty($single_lower_case_name) && !empty($bill_company_id)) {
                        // echo "hello";
                        // echo $single_lower_case_name."/";
                        // echo $single_category_id;
                         $prev_attribute_id = $obj->CheckAttributeAlreadyExists($bill_company_id, $single_lower_case_name,$single_category_id);
                         $category_name="";
                        if(!empty($single_category_id)){
                            $category_name = $obj->getTableColumnValue($GLOBALS['category_table'],'category_id',$single_category_id,'name');
                           $category_name = $obj->encode_decode("decrypt", $category_name);

                        }
                        if(!empty($prev_attribute_id)) {
                            if($prev_attribute_id != $edit_id) {
                                $attribute_error = "Attribute name - ".$obj->encode_decode("decrypt", $single_lower_case_name)." is already exists in category -".$category_name;
                            }
                        }
                    }
                }
            }
    

            if(empty($edit_id)) {
                $inputbox_attribute_name ="";
                $inputbox_attribute_name = $_POST['attribute_name'];


                if(isset($_POST['category_ids'])) {
                    $category_ids = $_POST['category_ids'];
                }
                else {
                    $category_error = "Choose category";
                    
                    if(!empty($category_error)) {
                            $valid_attribute = $valid->error_display($form_name, "category_id", $category_error, 'select');	
                    }
                }
                if(isset($_POST['attribute_names'])) {
                    $attribute_name = $_POST['attribute_names'];
                    // print_r($category_name);
                }
                else {
                    $attribute_name_error = "Enter Attribute Name";
                    
                    if(!empty($attribute_name_error)) {
                        if(!empty($valid_attribute)) {
                            $valid_attribute = $valid_attribute." " .$valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');			
                        }
                        else{
                            $valid_attribute = $valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');			

                        }
                    }
                }

                
                if(!empty($attribute_name)) {
    
                    for($p = 0; $p < count($attribute_name); $p++) {  
                        $attribute_name[$p]= trim($attribute_name[$p]);  
                        // echo $attribute_name[$p];
                        if(!empty($attribute_name_error)) {
                            $valid_attribute = $valid_attribute." " . $valid->error_display($form_name, "attribute_name", $attribute_name_error, 'text');			
                        }
                    }
                }

                
                $selectbox_category_id =""; $selected_attr="";
                $selectbox_category_id = $_POST['category_id'];
                $selected_attr = $_POST['attribute_name'];

                if(!empty($selectbox_category_id) && !empty($selected_attr) && empty($category_ids)){
                    $attr_add_error = "Click Add Button to Append Attribute Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "attribute_name", $attr_add_error, 'text');
                    }
                } else if(!empty($selectbox_category_id) && empty($category_ids) && empty($selected_attr)){
                    $attr_add_error = "Enter Attribute Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "attribute_name", $attr_add_error, 'text');
                    }
                } else if(empty($selectbox_category_id) && empty($category_ids) && !empty($selected_attr)){
                    $attr_add_error = "Select Category Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "category_id", $attr_add_error, 'select');
                    }
                } else if(empty($selectbox_category_id) && !empty($category_ids) && !empty($selected_attr)){
                    $attr_add_error = "Select Category Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "category_id", $attr_add_error, 'select');
                    }
                } else if(!empty($selectbox_category_id) && !empty($category_ids) && empty($selected_attr)){
                    $attr_add_error = "Enter Attribute Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "attribute_name", $attr_add_error, 'text');
                    }
                } else if(!empty($selectbox_category_id) && !empty($selected_attr) && !empty($category_ids)){
                    $attr_add_error = "Click Add Button to Append Attribute Name";
                    if(!empty($attr_add_error)) {
                        $valid_attribute = $valid->error_display($form_name, "attribute_name", $attr_add_error, 'text');
                    }
                }
            
            }

		$result = "";
            if(empty($valid_attribute)){
                $bill_company_id = $GLOBALS['bill_company_id'];
                $check_user_id_ip_address = 0;
                $check_user_id_ip_address = $obj->check_user_id_ip_address();	
                if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
                    $lower_case_name = array();
                    for($p = 0; $p < count($attribute_name); $p++) {
                        if(!empty($attribute_name[$p])) {
                            $lower_case_name[$p] = strtolower($attribute_name[$p]);
                            $attribute_name[$p] = $obj->encode_decode('encrypt', $attribute_name[$p]);
                            $lower_case_name[$p] = $obj->encode_decode('encrypt', $lower_case_name[$p]);
                            $category_ids[$p] =  $category_ids[$p];
                            // echo "unit-".$attribute_name[$p];
                            // echo "lower-".$lower_case_name[$p];
                            $prev_attribute_id = ""; 
                            if(!empty($lower_case_name[$p]) && !empty($bill_company_id) && !empty($category_ids[$p])) {
                                // echo $lower_case_name[$p]."/";
                                $prev_attribute_id = $obj->CheckAttributeAlreadyExists($bill_company_id, $lower_case_name[$p],$category_ids[$p]);
                                    $category_name="";
                                if(!empty($category_ids[$p])){
                                    $category_name = $obj->getTableColumnValue($GLOBALS['category_table'],'category_id',$category_ids[$p],'name');
                                      $category_name = $obj->encode_decode("decrypt", $category_name);

                                }
                                if(!empty($prev_attribute_id)) {
                                    $attribute_error = "Attribute name - ".$obj->encode_decode("decrypt", $lower_case_name[$p])." is already exists in category - ".$category_name;
                                    break;
                                }
                            }
                        }
                    }
               
                    $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                    $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                    if(empty($edit_id)) { 
                        for($p = 0; $p < count($attribute_name); $p++) { 
                            if(empty($prev_attribute_id) && (empty($attribute_error))) {						
                                $action = array();
                                if(!empty($attribute_name[$p])) {
                                    $action = "New Attribute Created. Name - ".$obj->encode_decode('decrypt', $attribute_name[$p]);
                                }
    
                                $null_value = $GLOBALS['null_value'];
                                $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'attribute_id','category_id', 'attribute_name', 'lower_case_name', 'deleted');
                                $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'","'".$category_ids[$p]."'", "'".$attribute_name[$p]."'", "'".$lower_case_name[$p]."'", "'0'");
                                $attribute_insert_id = $obj->InsertSQL($GLOBALS['attribute_table'], $columns, $values,'attribute_id','', $action[$p]);						
                                if(preg_match("/^\d+$/", $attribute_insert_id)) {
                                    $attribute_id = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'id', $attribute_insert_id, 'attribute_id');
                                    $update_attribute_id = $attribute_id;	
                                    $result = array('number' => '1', 'msg' => 'Attribute Successfully Created');					
                                }
                                else {
                                    $result = array('number' => '2', 'msg' => $attribute_insert_id);
                                }
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $attribute_error);
                            }
                        }
                    } 
                    else if(!empty($edit_id) && (empty($attribute_error))) {
                        $getUniqueID = "";
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $edit_id, 'id');
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $action = "";
                            if(!empty($single_attribute_name)) {
                                $action = "Attribute Updated. Name - ".$obj->encode_decode('decrypt', $single_attribute_name);
                                
                            }
                            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                        
                            $columns = array(); $values = array();						
                            $columns = array('creator_name','category_id', 'attribute_name', 'lower_case_name');
                            $values = array("'".$creator_name."'","'".$single_category_id."'", "'".$single_attribute_name."'", "'".$single_lower_case_name."'");
                            $attribute_update_id = $obj->UpdateSQL($GLOBALS['attribute_table'], $getUniqueID, $columns, $values, $action);
                            if(preg_match("/^\d+$/", $attribute_update_id)) {
                                $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $attribute_update_id);
                            }							
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $attribute_error);
                    }
    
                }
                else {
                    $result = array('number' => '2', 'msg' => 'Invalid IP');
                }
            }
            else {
                if(!empty($valid_attribute)) {
                    $result = array('number' => '3', 'msg' => $valid_attribute);
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
        
        $search_text =""; $category_filter="";
        if(isset($_POST['search_text'])) {
            $search_text = $_POST['search_text'];
        }

            
        if(isset($_POST['category_filter'])){
            $category_filter = $_POST['category_filter'];
        }

    
        $total_records_list = array();
        if(!empty($GLOBALS['bill_company_id'])) {
            $total_records_list = $obj->getTableRecords($GLOBALS['attribute_table'], 'bill_company_id',$GLOBALS['bill_company_id']);
        }

        if(!empty($total_records_list) && !empty($category_filter)){
            $total_records_list = $obj->getTableRecords($GLOBALS['attribute_table'],'category_id',$category_filter); 
        }

        
        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if( (strpos(strtolower($obj->encode_decode('decrypt', $val['attribute_name'])), $search_text) !== false) ) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }
    
        $login_staff_id = "";
        if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
            $login_staff_id =  $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
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
        if($total_pages > $page_limit) { ?>
            <div class="pagination_cover mt-3"> 
                <?php
                    include("pagination.php");
                ?> 
            </div> 
        <?php } 
        $access_error = "";
        if(!empty($login_staff_id)) {
            $permission_module = $GLOBALS['attribute_module'];
            $permission_action = $view_action;
            include('user_permission_action.php');
        }
        if(empty($access_error)) { ?>
            <table class="table nowrap cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Attribute Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($show_records_list)) {
                        // $edit_action = $obj->encode_decode('encrypt', 'edit_action');
                        foreach($show_records_list as $key => $list) {
                            $index = $key + 1;
                            if(!empty($prefix)) { $index = $index + $prefix; }
                            ?>
                                <tr  class="bordered_row">
                                    <td><?php echo $index; ?></td>
                                    
                                    <td>
                                        <?php
                                        if(!empty($list['category_id'])) {
                                            $category_name = "";
                                            $category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $list['category_id'], 'name');
                                            // echo  $list['category_id'];
                                            if(!empty($category_name)) { 

                                            echo $obj->encode_decode("decrypt", $category_name);
                                            }
                                        
                                        }
                                        ?>
                                    </td>	
                                    <td><?php
                                        if(!empty($list['attribute_name'])) {
                                            $list['attribute_name'] = $obj->encode_decode('decrypt', $list['attribute_name']);
                                            echo $list['attribute_name'];
                                        }
                                    ?>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    <label for="FormSelectDefault" class="form-label text-muted"> </label>
                                                    <input class="form-check-input code-switcher" type="checkbox" id="FormSelectDefault">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <?php $edit_access_error = "";
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
                                    <?php if (empty($edit_access_error) || empty($delete_access_error)) { ?>
                                        <div class="dropdown">

                                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <?php if(empty($edit_access_error)) { 
                                                    ?>
                                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['attribute_id'])) { echo $list['attribute_id']; } ?>');"><i class="fa fa-pencil"></i> Edit</a></li>
                                                <?php } 
                                                if(empty($delete_access_error)) {
                                                    $linked_count = 0;
                                                    // $linked_count = $obj->GetLinkedCount($list['brand_id'], $GLOBALS['product_table'], 'brand_id');
                                                    if(!empty($linked_count)) { ?>
                                                        <li><a class="dropdown-item text-secondary"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                    <?php 
                                                    } else {  ?>
                                                        <li><a class="dropdown-item" onclick="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['attribute_id'])) { echo $list['attribute_id']; } ?>');"><i class="fa fa-trash"></i> Delete</a></li>
                                                    <?php } 
                                                } ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    </td>
                                </tr>
                        <?php }
                    }  else { ?>
                        <tr>
                            <td colspan="5" class="text-center">Sorry! No records found</td>
                        </tr>
                   <?php } ?>
                </tbody>
            </table>               
        <?php }
    } 

if(isset($_REQUEST['attribute_row_index'])) {
    $attribute_row_index = $_REQUEST['attribute_row_index'];
    $selected_category_id = $_REQUEST['category_id'];
    // echo "dfcs". "". $selected_category_id;
    $selected_attribute_name = $_REQUEST['selected_attribute_name']; 
    ?>
    
    <tr class="attribute_row<?php if (!empty($selected_category_id)) { echo $selected_category_id; } ?>" id="attribute_row<?php if (!empty($attribute_row_index)) { echo $attribute_row_index; } ?>">


        <td class="text-center sno"><?php if(!empty($attribute_row_index)) { echo $attribute_row_index; }?></td>

        <td class="text-center product_pad">
                <?php
                    if(!empty($selected_category_id)){
                            $category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id',$selected_category_id, 'name');
                                if(!empty($category_name)) {
                                    $category_name = $obj->encode_decode('decrypt', $category_name);
                                    echo $category_name;
                                    
                                }
                    }
                    ?>
                        <input type="hidden" name="category_ids[]" value="<?php if(!empty($selected_category_id)) { echo $selected_category_id; } ?>">
        </td>

        <td class="text-center">
            <?php
                if(!empty($selected_attribute_name)) { 
                    echo $selected_attribute_name; ?>                    
                <input type="hidden" name="attribute_names[]" value="<?php if(!empty($selected_attribute_name)) { echo $selected_attribute_name; } ?>">
            <?php }	?>	
        </td>		
        <td class="text-center product_pad">
            <button class="btn btn-danger align-self-center px-2 py-1" type="button" onclick="Javascript:DeleteAttributeRow('<?php if(!empty($attribute_row_index)) { echo $attribute_row_index; } ?>');"> <i class="fa fa-trash" aria-hidden="true"></i></button>
        </td>   
    </tr>
    <?php
}


if(isset($_REQUEST['delete_attribute_id'])) {
        $delete_attribute_id = $_REQUEST['delete_attribute_id'];
        $msg = "";
        if(!empty($delete_attribute_id)) {	
            $attribute_unique_id = "";
            $attribute_unique_id = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $delete_attribute_id, 'id');
            if(preg_match("/^\d+$/", $attribute_unique_id)) {
                $attribute_name = "";
                $attribute_name = $obj->getTableColumnValue($GLOBALS['attribute_table'], 'attribute_id', $delete_attribute_id, 'attribute_name');
            
                $action = "";
                if(!empty($attribute_name)) {
                    $action = "Attribute Deleted. Name - ".$obj->encode_decode('decrypt', $attribute_name);
                }

                $attribute_list = array();
				// $attribute_list = $obj->checkattribute($delete_attribute_id);

				$delete = 1;
				foreach($attribute_list as $data){
					if($data['id_count'] > 0){
						$delete = 0;
					}
				}
            
                if($delete == 1){
                    $columns = array(); $values = array();						
                    $columns = array('deleted');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['attribute_table'], $attribute_unique_id, $columns, $values, $action);
                }
                else{
                    $msg = "This attribute is linked in attribute value and products.So it can't be deleted.";
                }
            }
        }
        echo $msg;
        exit;	
    }

?>