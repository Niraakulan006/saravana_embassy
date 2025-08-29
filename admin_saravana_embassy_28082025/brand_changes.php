<?php
	include("include_files.php");
    $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['brand_module'];
        }
    }
	if(isset($_REQUEST['show_brand_id'])) { 
        $show_brand_id = "";
        $show_brand_id = $_REQUEST['show_brand_id'];
    
        $brand_name = "";
        if(!empty($show_brand_id)) {
            $brand_list = array();
            $brand_list = $obj->getTableRecords($GLOBALS['brand_table'], 'brand_id', $show_brand_id);
            if(!empty($brand_list)) {
                foreach ($brand_list as $data) {
                    if(!empty($data['brand_name'])) {
                        $brand_name = $obj->encode_decode('decrypt', $data['brand_name']);
                    }                    
                    if(!empty($data['brand_image'])) {
                       $brand_image = $data['brand_image'];
                    }
                }
            }
        }  
        $target_dir = $obj->image_directory();?>
        <form class="poppins pd-20 redirection_form" name="brand_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(empty($show_brand_id)) { ?>
						    <div class="h5">Add Brand</div>
                        <?php } else { ?>
                            <div class="h5">Edit Brand</div>
                        <?php } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('brand.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row justify-content-center p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_brand_id)) { echo $show_brand_id; } ?>">
                <div class="col-lg-3 col-md-6 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="brand_name" name="brand_name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" value="<?php if(!empty($brand_name)) { echo $brand_name; } ?>" placeholder="" required="">
                            <label>Brand Name</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
            </div>    
            <div class="row justify-content-center p-3">    
                <div class="col-lg-3 col-md-6 col-12 px-lg-1">
                    <div id="brand_image_cover" class="form-group">
                        <div class="image-upload text-center">
                            <label for="brand_image">  
                                <div class="brand_image_list row">
                                    <div class="cover">
                                        <?php if(!empty($brand_image) && file_exists($target_dir.$brand_image.'.webp') ) { ?>
                                            <button type="button" onclick="Javascript:delete_upload_image_before_save(this, 'brand_image', '<?php if(!empty($brand_image)) { echo $brand_image; } ?>');" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                            <img id="brand_image_preview" src="<?php echo $target_dir.$brand_image.'.webp'; ?>" style="max-width: 100%; max-height: 150px;" />
                                            <input type="hidden" name="brand_image_name[]" value="<?php if(!empty($brand_image)) { echo $brand_image; } ?>">
                                        <?php } else { ?>
                                            <img id="brand_image_preview" src="images/cloudupload.png" style="max-width: 150px;" />
                                        <?php } ?>
                                    </div>
                                    <div class="text-center smallfnt">(Brand Image Size 1000 x 1000)</div>
                                    <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                                </div>
                                <input type="file" name="brand_image" id="brand_image" style="display: none;" accept="image/*" />
                            </label>
                        </div>
                    </div>
                </div> 
                <div class="col-md-12 py-3 text-center">
                    <button class="btn btn-danger submit_button" type="button" onClick="Javascript:SaveModalContent('brand_form', 'brand_changes.php', 'brand.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript" src="include/js/image_upload.js"></script>
        </form>
		<?php
    } 

    if(isset($_POST['edit_id'])) {
        $brand_name = array(); $brand_name_error = ""; $single_lower_case_name = "";
        $valid_brand = ""; $form_name = "brand_form"; $brand_error = ""; $brand_image = ""; $brand_image_error= "";
        $single_brand_name = ""; $prev_brand_id = ""; $lower_case_name = array(); $brand_image_name = array(); 
    
        $edit_id = "";
        if(isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
            $edit_id = trim($edit_id);
        }

        $brand_name = $_POST['brand_name'];
        if(strlen($brand_name) > 25){
            $brand_name_error = "Only 25 characters allowed";
        }
        else{
            $brand_name_error = $valid->valid_text($brand_name,'Brand Name','1');
        }
        if(!empty($brand_name_error)) {
            if(!empty($valid_brand)){
                $valid_brand = $valid_brand." ".$valid->error_display($form_name, "brand_name", $brand_name_error, 'text');
            }
            else{
                $valid_brand = $valid->error_display($form_name, "brand_name", $brand_name_error, 'text');
            }
        }

        if(isset($_POST['brand_image_name'])) {
            $brand_image_name = $_POST['brand_image_name'];	
        }
        
        $result = "";
        if(empty($valid_brand)) {
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();
            $bill_company_id = $GLOBALS['bill_company_id'];
            
            if(preg_match("/^\d+$/", $check_user_id_ip_address)) {

                $brand_name = htmlentities($brand_name,ENT_QUOTES);
                $lower_case_brand_name = strtolower($brand_name);   
                $brand_name = $obj->encode_decode('encrypt', $brand_name);
                $lower_case_brand_name = htmlentities($lower_case_brand_name,ENT_QUOTES);
                $lower_case_brand_name = $obj->encode_decode('encrypt', $lower_case_brand_name);

                if(!empty($lower_case_brand_name)) {
                    $prev_brand_id = $obj->CheckbrandAlreadyExists($bill_company_id, $lower_case_brand_name);
                    if(!empty($prev_brand_id) && ($prev_brand_id != $edit_id)) {
                        $brand_error = "This Brand name - " . $obj->encode_decode("decrypt", $lower_case_brand_name) . " is already exist";
                    }
                } 
                
                if(!empty($brand_image_name) && is_array($brand_image_name)) {
                    $brand_image = implode("$$$", $brand_image_name);
                }
                else if(!empty($brand_image_name)) {
                    $brand_image = $brand_image_name;
                }
                
                if(empty($brand_image)) {
                    $brand_image = $GLOBALS['null_value'];
                }

                $prev_brand_iamge = ""; $image_copy = 0;
                if(!empty($edit_id)) {		
                    $prev_brand_iamge = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $edit_id, 'brand_image');
                }

                $created_date_time = $GLOBALS['create_date_time_label'];
                $creator = $GLOBALS['creator'];
                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
    
                if(empty($brand_error)) {
                    if(empty($edit_id)) {
                        $action = array();                         
                        if(empty($prev_brand_id)) {
                            if(!empty($brand_name)) {
                                $action = "New Brand Created. Name - " . $obj->encode_decode('decrypt', $brand_name);
                            }

                            $null_value = $GLOBALS['null_value'];
                            $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'brand_id', 'brand_name', 'lower_case_name', 'brand_image','deleted');
                            $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$brand_name."'", "'".$lower_case_brand_name."'", "'".$brand_image."'", "'0'");

                            $brand_insert_id = $obj->InsertSQL($GLOBALS['brand_table'], $columns, $values, 'brand_id', '', $action);		
                            if(preg_match("/^\d+$/", $brand_insert_id)) {								
                                $image_copy = 1;
                                $result = array('number' => '1', 'msg' => 'Brand Successfully Created');						
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $brand_insert_id);
                            }
                        } 
                        else {
                            $result = array('number' => '2', 'msg' => $brand_error);
                        }
                    } 
                    else if(!empty($edit_id)) {
                        $getUniqueID = "";
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $edit_id, 'id');
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $action = "";
                            if(!empty($brand_name)) {
                                $action = "Brand Updated. Name - " . $obj->encode_decode('decrypt', $brand_name);
                            }
    
                            $columns = array(); $values = array();
                            $columns = array('creator_name', 'brand_name', 'lower_case_name', 'brand_image');
                            $values = array("'".$creator_name."'", "'".$brand_name."'", "'".$lower_case_brand_name."'", "'".$brand_image."'");
                            $brand_update_id = $obj->UpdateSQL($GLOBALS['brand_table'], $getUniqueID, $columns, $values, $action);
                            if(preg_match("/^\d+$/", $brand_update_id)) {
                                $image_copy = 1;
                                $result = array('number' => '1', 'msg' => 'Updated Successfully');
                            } 
                            else {
                                $result = array('number' => '2', 'msg' => $brand_update_id);
                            }
                        }
                    }
                } 
                else {
                    $result = array('number' => '2', 'msg' => $brand_error);
                }

                if(!empty($image_copy) && $image_copy == 1) {
                    $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
                    if(!empty($brand_image)) {				
                        if(file_exists($temp_dir.$brand_image)) {   
                            if(!empty($prev_brand_image)) {		
                                if(file_exists($target_dir.$prev_brand_image)) {   
                                    unlink($target_dir.$prev_brand_image);
                                }
                            }
                            copy($temp_dir.$brand_image, $target_dir.$brand_image.'.webp');
                        }
                        else {
                            if($brand_image == $GLOBALS['null_value']) {
                                if(!empty($prev_brand_image) && file_exists($target_dir.$prev_brand_image)) {   
                                    unlink($target_dir.$prev_brand_image);
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
            if(!empty($valid_brand)) {
                $result = array('number' => '3', 'msg' => $valid_brand);
            }
        }
    
        if(!empty($result)) {
            $result = json_encode($result);
        }
        echo $result;
        exit;
    } 

    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; 
        
        $search_text = "";

        if(isset($_POST['search_text'])) {
            $search_text = $_POST['search_text'];
            $search_text = trim($search_text);
        }
    
        $total_records_list = array();
        $total_records_list = $obj->getTableRecords($GLOBALS['brand_table'], '', '');
    
        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach ($total_records_list as $val) {
                    if((strpos(strtolower(html_entity_decode($obj->encode_decode('decrypt', $val['brand_name']))), $search_text) !== false)) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }
    
        $total_pages = 0;
        $total_pages = count($total_records_list);
    
        $page_start = 0;
        $page_end = 0;
        if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
            if($total_pages > $page_limit) {
                if($page_number) {
                    $page_start = ($page_number - 1) * $page_limit;
                    $page_end = $page_start + $page_limit;
                }
            } else {
                $page_start = 0;
                $page_end = $page_limit;
            }
        }
    
        $show_records_list = array();
        if(!empty($total_records_list)) {
            foreach ($total_records_list as $key => $val) {
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
            <?php 
        } 
        $access_error = "";
        if(!empty($login_staff_id)) {
            $permission_action = $view_action;
            include('permission_action.php');
        }
        if(empty($access_error)) { 
        ?>
        
            <table class="table nowrap cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($show_records_list)) {
                            $count_brand = 0;
                            foreach ($show_records_list as $key => $list) {
                                $index = $key + 1;
    
                                if(!empty($prefix)) {
                                    $index = $index + $prefix;
                                } 
                                ?>
                                <tr style="cursor:default;">
                                    <td><?php echo $index; ?></td>
    
                                    <td class="text-center">
                                        <?php
                                            $brand_name = "";
                                            if(!empty($list['brand_name'])) {
                                                $brand_name = $list['brand_name'];
                                                $brand_name = $obj->encode_decode('decrypt', $brand_name);
                                                echo $brand_name;
                                            }
                                        ?>
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
                                <a href="#" role="button" id="dropdownMenuLink1" class="btn btn-dark show-button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <?php if(empty($edit_access_error)) { 
                                        ?>
                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['brand_id'])) { echo $list['brand_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                    <?php } 
                                    
                                    if(empty($delete_access_error)) {
                                        $linked_count = 0;
                                        // $linked_count = $obj->GetLinkedCount($list['brand_id'], $GLOBALS['product_table'], 'brand_id');
                                        if(!empty($linked_count)) { ?>
                                            <li><a class="dropdown-item text-secondary"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                        <?php 
                                        } else {  ?>
                                            <li><a class="dropdown-item" onclick="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title;} ?>', '<?php if(!empty($list['brand_id'])) { echo $list['brand_id']; } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                        <?php } 
                                            } ?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } 
                        else {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">Sorry! No records found</td>
                            </tr>
                            <?php 
                        }  
                    ?>
                </tbody>
            </table>               
		<?php	
	    }
    }
    if(isset($_REQUEST['delete_brand_id'])) {
        $delete_brand_id = $_REQUEST['delete_brand_id'];
        $msg = "";
        if(!empty($delete_brand_id)) {
            $brand_unique_id = "";
            $brand_unique_id = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $delete_brand_id, 'id');
            if(preg_match("/^\d+$/", $brand_unique_id)) {
                $brand_name = "";
                $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $delete_brand_id, 'brand_name');
    
                $action = "";
                if(!empty($brand_name)) {
                    $action = "Brand Deleted. Name - " . $obj->encode_decode('decrypt', $brand_name);
                }
                $linked_count = 0;
                // $linked_count = $obj->GetbrandLinkedCount($delete_brand_id);
                if(empty($linked_count)) {
                    $columns = array();
                    $values = array();
                    $columns = array('deleted');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['brand_table'], $brand_unique_id, $columns, $values, $action);
                }
                else {
                    $msg = "This brand is associated with other screens";
                }
            }
        }
        echo $msg;
        exit;
    } 
    ?>