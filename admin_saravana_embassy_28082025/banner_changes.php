<?php
    include("include_files.php");
    include("user_validation.php");

    if(isset($_POST['banner_position_name'])) {
        $banner_name = array(); $image_upload = 0; $banner_position_error = ""; $banner_position = array(); $image_position_upload = 0;
        $position_error = ""; $positions = array(); $banner_category_id = array(); $banner_category_id_error = ""; $image_category_upload = 0;
        $category_error = ""; $category_ids = array(); 

        $banner_position_name = trim($_POST['banner_position_name']);

        if(isset($_POST['banner_name'])) {
            $banner_name = $_POST['banner_name'];	
        }
        if(!empty($banner_name)) {
            for($i = 0; $i < count($banner_name); $i++) {
                $banner_name[$i] = trim($banner_name[$i]);
                if(!empty($banner_name[$i])) {
                    $image_upload = 1;
                }
                else {
                    $image_upload = 0;
                }
            }
        }
        if(empty($image_upload)) {
            $banner_position_error = "Upload Banner Image";
        }
        
        if(!empty($image_upload) && $image_upload == 1) {
            if(isset($_POST['banner_position'])) {
                $banner_position = $_POST['banner_position'];	
            }
            if(!empty($banner_position)) {
                for($i = 0; $i < count($banner_position); $i++) {
                    $banner_position[$i] = trim($banner_position[$i]);
                    if(!empty($banner_position[$i])) {
                        if(preg_match("/^\d+$/", $banner_position[$i]) && $banner_position[$i] <= count($banner_position)) {
                            if(!in_array($banner_position[$i], $positions)) {
                                $positions[] = $banner_position[$i];
                                $image_position_upload = 1;
                            }
                            else{
                                $position_error = "Repeated Banner Position";
                                $image_position_upload = 0;
                            }                            
                        }
                        else {
                            $position_error = "Invalid Banner Position";
                            $image_position_upload = 0;
                        }
                    }
                    else {
                        $position_error = "Empty Banner Position";
                        $image_position_upload = 0;
                    }
                }
            }
            if(empty($image_position_upload) && !empty($position_error)) {
                if(!empty($banner_position_error)) {
                    $banner_position_error = $banner_position_error."<br>".$position_error;
                }
                else {
                    $banner_position_error = $position_error;
                }
            }
        }
        if(!empty($image_upload) && $image_upload == 1) {
            if(isset($_POST['banner_category_id'])) {
                $banner_category_id = $_POST['banner_category_id'];	
            }
            
            if(!empty($banner_category_id)) {
                for($i = 0; $i < count($banner_category_id); $i++) {
                    $banner_category_id[$i] = trim($banner_category_id[$i]);
                    if(!empty($banner_category_id[$i])) {
                        if($banner_category_id[$i] == "all") {
                            $category_ids[] = $banner_category_id[$i];
                            $image_category_upload = 1;
                        }
                        else {
                            $category_unique_id = "";
                            $category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $banner_category_id[$i], 'id');
                            if(!preg_match("/^\d+$/", $category_unique_id)) {
                                $category_error = "Invalid Banner Category";
                                $image_category_upload = 0;
                            }
                            else {
                                $category_ids[] = $banner_category_id[$i];
                                $image_category_upload = 1;
                            }
                        }
                    }
                    // else {
                    //     $category_error = "Select Banner Category";
                    //     $image_category_upload = 0;
                    // }
                }
            }
            if(empty($image_category_upload) && !empty($category_error)) {
                if(!empty($banner_position_error)) {
                    $banner_position_error = $banner_position_error."<br>".$category_error;
                }
                else {
                    $banner_position_error = $banner_position_error;
                }
            }
        }

        $access_error = "";
        /*
        if(!empty($login_role_id)) {
            if(empty($banner_position_error)) {
                $banner_unique_id = "";
                $banner_unique_id = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'id');
                if(preg_match("/^\d+$/", $banner_unique_id)) {
                    $permission_module = $GLOBALS['banner_module'];
                    $permission_action = $edit_action;
                    include('user_permission_action.php');
                }
                else {    
                    $permission_module = $GLOBALS['banner_module'];
                    $permission_action = $add_action;
                    include('user_permission_action.php');
                }
                if(!empty($access_error)) {
                    $banner_position_error = $access_error;
                }
            }   
        }
        */

        $result = "";

        if(empty($banner_position_error)) {
            $image_copy = 0; $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
            
            $prev_banner_image = "";
            if(!empty($banner_position)) {		
                $prev_banner_image = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'banner_image');
                if(!empty($prev_banner_image)) {
                    $prev_banner_image = explode(",", $prev_banner_image);
                    if(!empty($banner_name) && !empty($prev_banner_image)) {
                        for($i = 0; $i < count($prev_banner_image); $i++) {
                            if(!empty($prev_banner_image[$i]) && !in_array($prev_banner_image[$i], $banner_name)) {
                                if(file_exists($target_dir.$prev_banner_image[$i])) {
                                    unlink($target_dir.$prev_banner_image[$i]);
                                }
                            }
                        }
                    }
                }
            }

            if(!empty($banner_name)) {
                $banner_name = implode(",", $banner_name);
            }
            else {
                $banner_name = $GLOBALS['null_value'];
            }
            if(!empty($banner_position)) {
                $banner_position = implode(",", $banner_position);   
            }
            else {
                $banner_position = $GLOBALS['null_value'];
            }
            if(!empty($banner_category_id)) {
                $banner_category_id = implode(",", $banner_category_id);   
            }
            else {
                $banner_category_id = $GLOBALS['null_value'];
            }

            if(!empty($banner_position_name)) {
                $created_date_time = $GLOBALS['create_date_time_label']; 
                $updated_date_time = $GLOBALS['create_date_time_label']; 
                $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "Home Banner Updated";

                    $columns = array(); $values = array();						
                    $columns = array('updated_date_time', 'creator_name', 'banner_image', 'banner_position', 'banner_category_id');
                    $values = array("'".$updated_date_time."'", "'".$creator_name."'", "'".$banner_name."'", "'".$banner_position."'", "'".$banner_category_id."'");
                    $banner_update_id = $obj->UpdateSQL($GLOBALS['home_banner_table'], $getUniqueID, $columns, $values, $action);
                    if(preg_match("/^\d+$/", $banner_update_id)) {	
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_update_id);
                    }
                }
                else {
                    $action = "New Home Banner Uploaded";
                    $columns = array('created_date_time', 'updated_date_time', 'creator', 'creator_name', 'position_name', 'banner_image', 'banner_position', 'banner_category_id', 'deleted');
                    $values = array("'".$created_date_time."'", "'".$updated_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$banner_position_name."'", "'".$banner_name."'", "'".$banner_position."'", "'".$banner_category_id."'", "'0'");
                    $banner_insert_id = $obj->InsertSQL($GLOBALS['home_banner_table'], $columns, $values, '', '', $action);						
                    if(preg_match("/^\d+$/", $banner_insert_id)) {
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Home Banner Successfully Uploaded');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_insert_id);
                    }
                }
            }

            if(!empty($image_copy) && $image_copy == 1) {
                if(!empty($banner_name) && $banner_name != $GLOBALS['null_value']) {
                    $banner_name = explode(",", $banner_name);
                    for($i = 0; $i < count($banner_name); $i++) {
                        if(!empty($banner_name[$i]) && file_exists($temp_dir.$banner_name[$i])) {
                            copy($temp_dir.$banner_name[$i], $target_dir.$banner_name[$i].$GLOBALS['image_format']);
                        }
                    }
                    $obj->clear_temp_image_directory();
                }
            }

        }
        else {
			if(!empty($banner_position_error)) {
				$result = array('number' => '2', 'msg' => $banner_position_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }
    if(isset($_REQUEST['delete_banner_image'])) {
        $delete_banner_name = trim($_REQUEST['delete_banner_image']);

        $banner_position_name = "";
        if(isset($_REQUEST['delete_position_name'])) {
            $banner_position_name = trim($_REQUEST['delete_position_name']);
            if($banner_position_name == "desktop_home_banner") {
                $banner_position_name = "Desktop";
            }
            else if($banner_position_name == "mobile_home_banner") {
                $banner_position_name = "Mobile";
            }
        }
        $target_dir = $obj->image_directory();

        $prev_banner_image = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'banner_image');
        $prev_banner_position = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'banner_position');
        $prev_banner_category_id = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'banner_category_id');
        $banner_names = array(); $banner_positions = array(); $banner_category_ids = array();
        if(!empty($prev_banner_image)) {
            $prev_banner_image = explode(",", $prev_banner_image);
            $prev_banner_position = explode(",", $prev_banner_position);
            $prev_banner_category_id = explode(",", $prev_banner_category_id);
            if(!empty($delete_banner_name) && !empty($prev_banner_image)) {
                for($i = 0; $i < count($prev_banner_image); $i++) {
                    if(!empty($prev_banner_image[$i]) && $prev_banner_image[$i] == $delete_banner_name) {
                        if(file_exists($target_dir.$prev_banner_image[$i])) {
                            unlink($target_dir.$prev_banner_image[$i]);
                        }
                    }
                    else {
                        $banner_names[] = $prev_banner_image[$i];
                        $banner_positions[] = $prev_banner_position[$i];
                        $banner_category_ids[] = $prev_banner_category_id[$i];
                    }
                }
            }
        }
        if(!empty($banner_names)) {
            $banner_names = implode(",", $banner_names);
        }
        else {
            $banner_names = $GLOBALS['null_value'];
        }
        if(!empty($banner_positions)) {
            $banner_positions = implode(",", $banner_positions);   
        }
        else {
            $banner_positions = $GLOBALS['null_value'];
        }
        if(!empty($banner_category_ids)) {
            $banner_category_ids = implode(",", $banner_category_ids);   
        }
        else {
            $banner_category_ids = $GLOBALS['null_value'];
        }
        if(!empty($banner_position_name)) {
            $created_date_time = $GLOBALS['create_date_time_label']; 
            $updated_date_time = $GLOBALS['create_date_time_label']; 
            $creator = $GLOBALS['creator'];
            $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
            
            $getUniqueID = "";
            $getUniqueID = $obj->getTableColumnValue($GLOBALS['home_banner_table'], 'position_name', $banner_position_name, 'id');
            if(preg_match("/^\d+$/", $getUniqueID)) {
                $action = "Home Banner Updated";

                $columns = array(); $values = array();						
                $columns = array('updated_date_time', 'creator_name', 'banner_image', 'banner_position', 'banner_category_id');
                $values = array("'".$updated_date_time."'", "'".$creator_name."'", "'".$banner_names."'", "'".$banner_positions."'", "'".$banner_category_ids."'");
                $banner_update_id = $obj->UpdateSQL($GLOBALS['home_banner_table'], $getUniqueID, $columns, $values, $action);
                if(preg_match("/^\d+$/", $banner_update_id)) {	
                    $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                }
            }
        }
        if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }
?>