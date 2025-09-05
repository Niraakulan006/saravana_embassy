<?php
    include("include_files.php");
	include("user_validation.php");

    if(isset($_REQUEST['meta_file_name'])) {
        $meta_file_name = trim($_REQUEST['meta_file_name']);
        $meta_heading = "";
        $meta_heading = str_replace("_", " ", $meta_file_name);
        $meta_heading = ucwords($meta_heading);

        $meta_records_list = array();
        $meta_records_list = $obj->getTableRecords($GLOBALS['meta_tags_table'], 'meta_file_name', $meta_file_name);

        $meta_title = ""; $meta_keywords = ""; $meta_description = "";
        if(!empty($meta_records_list)) {
            foreach($meta_records_list as $data) {
                if(!empty($data['meta_title']) && $data['meta_title'] != $GLOBALS['null_value']) {
                    $meta_title = $obj->encode_decode('decrypt', $data['meta_title']);
                }
                if(!empty($data['meta_keywords']) && $data['meta_keywords'] != $GLOBALS['null_value']) {
                    $meta_keywords = $obj->encode_decode('decrypt', $data['meta_keywords']);
                }
                if(!empty($data['meta_description']) && $data['meta_description'] != $GLOBALS['null_value']) {
                    $meta_description = $obj->encode_decode('decrypt', $data['meta_description']);
                }
            }
        }
        ?>
        <form name="<?php echo $meta_file_name; ?>_form" class="redirection_form">
            <input type="hidden" name="meta_file_id" value="<?php echo $meta_file_name; ?>">
            <div class="row mx-0">
                <div class="col-12 py-2">
                    <h5 class="text-center fw-bold"><?php echo $meta_heading; ?></h5>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-lg-4 col-md-6 col-12 py-2">
                    <div class="form-group">
						<label class="form-control-label">Meta Title</label>
						<div class="w-100">
							<input type="text" class="form-control" name="meta_title" value="<?php if(!empty($meta_title)) { echo $meta_title; } ?>" placeholder="Meta Title">
						</div>
					</div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-2">
                    <div class="form-group">
						<label class="form-control-label">Meta Keywords</label>
						<div class="w-100">
							<input type="text" class="form-control" name="meta_keywords" value="<?php if(!empty($meta_keywords)) { echo $meta_keywords; } ?>" placeholder="Meta Keywords">
						</div>
					</div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-2">
                    <div class="form-group">
						<label class="form-control-label">Meta Description</label>
						<div style="float: right;"> <span class="meta_description_char_count"><?php if(!empty($meta_description)) { echo strlen($meta_description); } ?></span> /<span class="description_char_total_count"><?php if(!empty($max_description_length)) { echo $max_description_length; } ?></span> </div>
						<div class="w-100">
							<textarea type="text" class="form-control formheight" name="meta_description" rows="6" style="height: auto !important;" placeholder="Meta Description" onkeyup="Javascript:getCharCount(this, 'meta_description_char_count', 'description_char_total_count');"><?php if(!empty($meta_description)) { echo $meta_description; } ?></textarea>
						</div>
					</div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 mx-auto text-center py-2">
                    <button class="btn btn-success submit_button" type="button" onClick="Javascript:SaveModalContent('<?php echo $meta_file_name; ?>_form', 'meta_tags_changes.php', 'meta_tags.php');">Submit</button>
                </div>
            </div>
        </form>
        <?php
    }

    if(isset($_POST['meta_file_id'])) {
        $meta_file_name = trim($_POST['meta_file_id']);

        $meta_title = ""; $meta_title_error = ""; $meta_keywords = ""; $meta_keywords_error = ""; $meta_description = ""; $meta_description_error = "";
        $valid_meta_file = ""; $form_name = $meta_file_name.'_form';

        if(isset($_POST['meta_title'])) {
			$meta_title = $_POST['meta_title'];
			$meta_title = trim($meta_title);
			if(!empty($meta_title)) {
				$meta_title_error = $valid->common_validation($meta_title, "Meta title", "text");
				if(!empty($meta_title_error)) {
					if(!empty($valid_meta_file)) {
						$valid_meta_file = $valid_meta_file." ".$valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
					}
					else {
						$valid_meta_file = $valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
					}
				}
			}
		}
        if(isset($_POST['meta_keywords'])) {
			$meta_keywords = $_POST['meta_keywords'];
			$meta_keywords = trim($meta_keywords);
			if(!empty($meta_keywords)) {
				$meta_keywords_error = $valid->common_validation($meta_keywords, "Meta keywords", "text");
				if(!empty($meta_keywords_error)) {
					if(!empty($valid_meta_file)) {
						$valid_meta_file = $valid_meta_file." ".$valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
					}
					else {
						$valid_meta_file = $valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
					}
				}
			}
		}
        if(isset($_POST['meta_description'])) {
			$meta_description = $_POST['meta_description'];
			$meta_description = trim($meta_description);
			if(!empty($meta_description)) {
				$meta_description_error = $valid->common_validation($meta_description, "Meta Description", "text");
				if(!empty($meta_description_error)) {
					if(!empty($valid_meta_file)) {
						$valid_meta_file = $valid_meta_file." ".$valid->error_display($form_name, "meta_description", $meta_description_error, 'textarea');
					}
					else {
						$valid_meta_file = $valid->error_display($form_name, "meta_description", $meta_description_error, 'textarea');
					}
				}
			}
		}
        if(!empty($meta_description)) {
			if(strlen($meta_description) > $GLOBALS['max_description_length']) {
				$meta_description = substr($meta_description, 0, $GLOBALS['max_description_length']);
			}
		}
        $access_error = "";
        if(!empty($login_role_id)) {
			if(!empty($edit_id)) {
				$permission_module = $GLOBALS[$meta_file_name.'_module'];
				$permission_action = $edit_action;
				include('user_permission_action.php');
			}
			else {    
				$permission_module = $GLOBALS[$meta_file_name.'_module'];
				$permission_action = $add_action;
				include('user_permission_action.php');
			}
        }
        $result = "";
		
		if(empty($valid_meta_file) && empty($access_error)) {
			$check_user_id_ip_address = "";
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
                
				if(!empty($meta_title)) {
                    $meta_title = htmlentities($meta_title);
					$meta_title = $obj->encode_decode('encrypt', $meta_title);
				}
				else {
					$meta_title = $GLOBALS['null_value'];
				}
				if(!empty($meta_keywords)) {
                    $meta_keywords = htmlentities($meta_keywords);
					$meta_keywords = $obj->encode_decode('encrypt', $meta_keywords);
				}
				else {
					$meta_keywords = $GLOBALS['null_value'];
				}
				if(!empty($meta_description)) {
                    $meta_description = htmlentities($meta_description);
					$meta_description = $obj->encode_decode('encrypt', $meta_description);
				}
				else {
					$meta_description = $GLOBALS['null_value'];
				}

				$created_date_time = $GLOBALS['create_date_time_label']; 
				$updated_date_time = $GLOBALS['create_date_time_label']; 
                $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
				
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['meta_tags_table'], 'meta_file_name', $meta_file_name, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "";
                    if(!empty($meta_file_name)) {
                        $action = $meta_file_name." Updated";
                    }
                
                    $columns = array(); $values = array();						
                    $columns = array('creator_name', 'updated_date_time', 'meta_title', 'meta_keywords', 'meta_description');
                    $values = array("'".$creator_name."'", "'".$updated_date_time."'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'");
                    $meta_update_id = $obj->UpdateSQL($GLOBALS['meta_tags_table'], $getUniqueID, $columns, $values, $action);
                    if(preg_match("/^\d+$/", $meta_update_id)) {	
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $meta_update_id);
                    }							
                }
				else {					
                    $action = "";
                    if(!empty($meta_file_name)) {
                        $action = $meta_file_name." Created";
                    }

                    $null_value = $GLOBALS['null_value'];
                    $columns = array('created_date_time', 'updated_date_time', 'creator', 'creator_name', 'meta_file_name', 'meta_title', 'meta_keywords', 'meta_description', 'deleted');
                    $values = array("'".$created_date_time."'","'".$updated_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$meta_file_name."'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'", "'0'");
                    $meta_insert_id = $obj->InsertSQL($GLOBALS['meta_tags_table'], $columns, $values, '', '', $action);						
                    if(preg_match("/^\d+$/", $meta_insert_id)) {
                        $result = array('number' => '1', 'msg' => 'Successfully Created');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $meta_insert_id);
                    }
				}
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($valid_meta_file)) {
				$result = array('number' => '3', 'msg' => $valid_meta_file);
			}
			else if(!empty($access_error)) {
				$result = array('number' => '2', 'msg' => $access_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }
?>