<?php
	include("include_files.php");
	if(isset($_REQUEST['show_category_id'])) { 
         $show_category_id = $_REQUEST['show_category_id'];
            $name = ""; $type = ""; $description = ""; $category_cover_image = ""; $category_mobile_cover_image = ""; $meta_title = "";
            $meta_keywords = ""; $meta_description = "";$url = "";
            $target_dir = $obj->image_directory();
            if(!empty($show_category_id)) {
                $category_list = array();
                $category_list = $obj->getTableRecords($GLOBALS['category_table'], 'category_id', $show_category_id);
                if(!empty($category_list)) {
                    foreach($category_list as $data) {
                        if(!empty($data['name'])) {
                            $name = $obj->encode_decode('decrypt', $data['name']);
                            $name = htmlentities($name);
                        }
                        if(!empty($data['type']) && $data['type'] != $GLOBALS['null_value']) {
                            $type = $data['type'];
                        }
                        if(!empty($data['description'])) {
                            $description = $obj->encode_decode('decrypt', $data['description']);
                            $description = htmlentities($description);
                        }
                        if(!empty($data['cover_image']) && $data['cover_image'] != $GLOBALS['null_value']) {
                            $category_cover_image = $data['cover_image'];
                        }
                        if(!empty($data['mobile_cover_image']) && $data['mobile_cover_image'] != $GLOBALS['null_value']) {
                            $category_mobile_cover_image = $data['mobile_cover_image'];
                        }
                        if(!empty($data['meta_title']) && $data['meta_title'] != $GLOBALS['null_value']) {
                            $meta_title = $obj->encode_decode('decrypt', $data['meta_title']);
                            $meta_title = htmlentities($meta_title);
                        }
                        if(!empty($data['meta_keywords']) && $data['meta_keywords'] != $GLOBALS['null_value']) {
                            $meta_keywords = $obj->encode_decode('decrypt', $data['meta_keywords']);
                            $meta_keywords = htmlentities($meta_keywords);
                        }
                        if(!empty($data['meta_description']) && $data['meta_description'] != $GLOBALS['null_value']) {
                            $meta_description = $obj->encode_decode('decrypt', $data['meta_description']);
                            $meta_description = htmlentities($meta_description);
                        }
                        if (!empty($data['category_url']) && $data['category_url'] != $GLOBALS['null_value']) {
                            $url = $obj->encode_decode('decrypt', $data['category_url']);
                            $url = htmlentities($url);
                        }
                    }
                }
            }
            $category_list = array();
            $category_list = $obj->getTableRecords($GLOBALS['category_table'], '', '');            
        ?>
        <form class="poppins pd-20" name="category_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<?php if(empty($show_category_id)){ ?>
    						<div class="h5">Add Category</div>
                        <?php } else {?>
    						<div class="h5">Edit Category</div>
                        <?php }?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('category.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row justify-content-center p-3">
    			<input type="hidden" name="edit_id" value="<?php if(!empty($show_category_id)) { echo $show_category_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" value="<?php if(!empty($name)) { echo $name; } ?>" onkeyup="generateurl(this.value)" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                            <label>Category Name</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="type">
								<option value="">Separate One</option>
								<?php
									if(!empty($category_list)) {
										foreach($category_list as $data) {
											if(!empty($data['category_id'])) {
								?>
												<option value="<?php echo $data['category_id']; ?>" <?php if(!empty($type) && $type == $data['category_id']) { ?> selected="selected" <?php } ?> >
													<?php
														if(!empty($data['name'])) {
															$data['name'] = $obj->encode_decode('decrypt', $data['name']);
															echo $data['name'];
														}
													?>
												</option>
								<?php				
											}
										}
									}
								?>

                            </select>
                            <label>Select Category Type</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="category_url" name="category_url"  class="form-control shadow-none" value="<?php if(!empty($url)) { echo $url; } ?>" readonly>
                            <label>Category URL</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="meta_title" value="<?php if(!empty($meta_title)) { echo $meta_title; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                            <label>Meta Title</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <textarea class="form-control" name="meta_keywords" value="<?php if(!empty($meta_keywords)) { echo $meta_keywords; } ?>" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                            <label>Meta Keyword</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <textarea class="form-control" id="meta_description" name="meta_description" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"><?php if(!empty($meta_description)) { echo $meta_description; } ?></textarea>
                            <label>Meta Description</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 px-lg-1">
					<div id="category_cover_image_cover" class="form-group">
                        <h5 class="w-100 text-center">Cover Image Size - 800 x 345</h5> 
                        <h6 class="w-100 text-center">Max.Upload Size - 2 MB</h6> 
                        <div class="image-upload text-center">
                            <label for="category_cover_image">   
                                <div class="category_cover_image_list row">
                                    <div class="col-12">
                                        <div class="cover">
                                            <?php if(!empty($category_cover_image) && file_exists($target_dir.$category_cover_image)) { ?>
                                                <button type="button" onclick="Javascript:delete_upload_image_before_save(this, 'category_cover_image', '<?php if(!empty($category_cover_image)) { echo $category_cover_image; } ?>');" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                <img id="category_cover_image_preview" src="<?php echo $target_dir.$category_cover_image; ?>" style="max-width: 100%; max-height: 800px;" />
                                                <input type="hidden" name="category_cover_image_name[]" value="<?php if(!empty($category_cover_image)) { echo $category_cover_image; } ?>">
                                            <?php } else { ?>
                                                <img id="category_cover_image_preview" src="images/cloudupload.png" style="max-width: 150px;" />
                                            <?php } ?>
                                        </div>
                                    </div>        
                                </div>
                                <input type="file" name="category_cover_image" id="category_cover_image" style="display: none;" accept="image/*" />
                            </label>
                        </div>
                    </div>
                </div> 
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button" onClick="Javascirpt:SaveModalContent('category_form', 'category_changes.php', 'category.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript" src="include/js/image_upload.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery('form[name="category_form"]').find('select').select2();
				}); 
			</script>
			<script>
				function generateurl(val){
						console.log("Input event triggered");
						let name =val;
						let slug = name.toLowerCase()
									.replace(/[^a-z0-9\s]/g, '') // Remove special characters
									.replace(/\s+/g, '-')        // Replace spaces with hyphen
									.replace(/-+/g, '-')         // Remove multiple hyphens
									.replace(/^-|-$/g, '');      // Trim starting/ending hyphens

						$('#category_url').val(slug);
				}
			</script>			
        </form>
		<?php
    } 
    if(isset($_POST['name'])) {	
		$name = ""; $name_error = "";  $type = ""; $description = ""; $description_error = ""; $category_cover_image_name = array(); $category_cover_image = "";
		$category_mobile_cover_image_name = array(); $category_mobile_cover_image = ""; $meta_title = ""; $meta_title_error = ""; $meta_keywords = "";
		$meta_keywords_error = ""; $meta_description = ""; $meta_description_error = ""; $url = "";

		$valid_category = ""; $form_name = "category_form";
	
        $name = $_POST['name'];
		$name = trim($name);
		$name_error = $valid->common_validation($name, "name", "text");
		if(!empty($name) && empty($name_error)) {
			if(strpos($name, '/') !== false) {
				$name_error = "Avoid (/) in category name";
			}
		}
		if(!empty($name_error)) {
			$valid_category = $valid->error_display($form_name, "name", $name_error, 'text');
		}
		if(isset($_POST['category_url'])){
			if(!empty($_POST['category_url'])){
				$url = $_POST['category_url'];
			}
		}
		if(isset($_POST['type'])) {
			$type = $_POST['type'];
			$type = trim($type);
		}

		if(isset($_POST['meta_title'])) {
			$meta_title = $_POST['meta_title'];
			$meta_title = trim($meta_title);
			if(!empty($meta_title)) {
				$meta_title_error = $valid->common_validation($meta_title, "Meta title", "text");
				if(!empty($meta_title_error)) {
					if(!empty($valid_category)) {
						$valid_category = $valid_category." ".$valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
					}
					else {
						$valid_category = $valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
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
					if(!empty($valid_category)) {
						$valid_category = $valid_category." ".$valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
					}
					else {
						$valid_category = $valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
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
					if(!empty($valid_category)) {
						$valid_category = $valid_category." ".$valid->error_display($form_name, "meta_description", $meta_description_error, 'text');
					}
					else {
						$valid_category = $valid->error_display($form_name, "meta_description", $meta_description_error, 'text');
					}
				}
			}
		}
		// if(!empty($meta_description)) {
		// 	if(strlen($meta_description) > $GLOBALS['max_description_length']) {
		// 		$meta_description = substr($meta_description, 0, $GLOBALS['max_description_length']);
		// 	}
		// }

		$temp_dir = $obj->temp_image_directory(); $target_dir = $obj->image_directory();
		if(isset($_POST['category_cover_image_name'])) {
			$category_cover_image_name = $_REQUEST['category_cover_image_name'];
			if(!empty($category_cover_image_name)) {
				foreach($category_cover_image_name as $desktop_cover) {
					$desktop_cover = trim($desktop_cover);
					if(!empty($desktop_cover)) {
						$category_cover_image = $desktop_cover;
					}
				}
			}
		}
		if(isset($_POST['category_mobile_cover_image_name'])) {
			$category_mobile_cover_image_name = $_REQUEST['category_mobile_cover_image_name'];
			if(!empty($category_mobile_cover_image_name)) {
				foreach($category_mobile_cover_image_name as $mobile_cover) {
					$mobile_cover = trim($mobile_cover);
					if(!empty($mobile_cover)) {
						$category_mobile_cover_image = $mobile_cover;
					}
				}
			}
		}

		if(empty($category_cover_image)) {
			$category_cover_image = $GLOBALS['null_value'];
		}
		if(empty($category_mobile_cover_image)) {
			$category_mobile_cover_image = $GLOBALS['null_value'];
		}
		
		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}

		$access_error = "";
        if(!empty($login_staff_id)) {
			if(!empty($edit_id)) {
				$permission_module = $GLOBALS['category_module'];
				$permission_action = $edit_action;
				include('permission_action.php');
			}
			else {    
				$permission_module = $GLOBALS['category_module'];
				$permission_action = $add_action;
				include('permission_action.php');
			}
			if(!empty($access_error) && empty($position_error)) {
				$position_error = $access_error;
			}
        }
		
		$result = "";
		
		if(empty($valid_category) && empty($position_error)) {
			$check_user_id_ip_address = "";
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
				
				$lower_case_name = "";
				if(!empty($name)) {
					$lower_case_name = strtolower($name);
					$lower_case_name = preg_replace('/[^a-zA-Z0-9_ -]/s','',$lower_case_name);
					/*$lower_case_name = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $lower_case_name);
					$lower_case_name = str_replace('*', ' ', $lower_case_name);*/
					$lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
					$name = $obj->encode_decode('encrypt', $name);
				}
				if(empty($type)) {
					$type = $GLOBALS['null_value'];
				}
				if(!empty($description)) {
					$description = $obj->encode_decode('encrypt', $description);
				}
				if(!empty($meta_title)) {
					$meta_title = $obj->encode_decode('encrypt', $meta_title);
				}
				else {
					$meta_title = $GLOBALS['null_value'];
				}
				if(!empty($meta_keywords)) {
					$meta_keywords = $obj->encode_decode('encrypt', $meta_keywords);
				}
				else {
					$meta_keywords = $GLOBALS['null_value'];
				}
				if(!empty($meta_description)) {
					$meta_description = $obj->encode_decode('encrypt', $meta_description);
				}
				else {
					$meta_description = $GLOBALS['null_value'];
				}

				$image_copy = 0; $prev_category_cover_image = ""; $prev_category_mobile_cover_image = "";
                if(!empty($edit_id)) {		
					$prev_category_cover_image = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $edit_id, 'cover_image');
					$prev_category_mobile_cover_image = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $edit_id, 'mobile_cover_image');
                }

				$prev_category_id = ""; $category_error = "";			
				$url = $obj->encode_decode('encrypt',$url);
				if(!empty($name)) {
					$prev_category_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_url', $url, 'category_id');
					if(!empty($prev_category_id)) {
                        $category_error = "This category url is already exist";
                    }
                }
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $bill_company_id = $GLOBALS['bill_company_id'];
				$update_category_id = "";
				if(empty($edit_id)) {
					if(empty($prev_category_id)) {						
						$action = "";
						if(!empty($name)) {
							$action = "New Category Created. Name - ".$obj->encode_decode('decrypt', $name);
						}

						$ordering_number = "";
						$ordering_number = $obj->getOrderingNumber($GLOBALS['category_table'], $type);

						$null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name','bill_company_id', 'category_id', 'name', 'lower_case_name', 'type', 'description', 'cover_image', 'mobile_cover_image', 'category_status', 'meta_title', 'meta_keywords', 'meta_description', 'ordering', 'deleted','category_url');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'","'".$bill_company_id."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'", "'".$type."'", "'".$description."'", "'".$category_cover_image.$GLOBALS['image_format']."'", "'".$category_mobile_cover_image."'", "'1'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'", "'".$ordering_number."'", "'0'","'".$url."'");
                        $category_insert_id = $obj->InsertSQL($GLOBALS['category_table'], $columns, $values,'category_id','', $action);						
						if(preg_match("/^\d+$/", $category_insert_id)) {
                            $image_copy = 1;
                            $result = array('number' => '1', 'msg' => 'Category Successfully Created');					
						}
						else {
							$result = array('number' => '2', 'msg' => $category_insert_id);
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $category_error);
					}
				}
				else {
					if(empty($prev_category_id) || $prev_category_id == $edit_id) {
						$getUniqueID = "";
						$getUniqueID = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $edit_id, 'id');
						if(preg_match("/^\d+$/", $getUniqueID)) {
							$action = "";
							if(!empty($name)) {
								$action = "Category Updated. Name - ".$obj->encode_decode('decrypt', $name);
							}
						
							$columns = array(); $values = array();						
							$columns = array('creator_name', 'name', 'lower_case_name', 'type', 'description', 'cover_image', 'mobile_cover_image', 'meta_title', 'meta_keywords', 'meta_description','category_url');
							$values = array("'".$creator_name."'", "'".$name."'", "'".$lower_case_name."'", "'".$type."'", "'".$description."'", "'".$category_cover_image.$GLOBALS['image_format']."'", "'".$category_mobile_cover_image."'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'","'".$url."'");
							$category_update_id = $obj->UpdateSQL($GLOBALS['category_table'], $getUniqueID, $columns, $values, $action);
							if(preg_match("/^\d+$/", $category_update_id)) {
								$image_copy = 1;								
								$update_category_id = $edit_id;
								$result = array('number' => '1', 'msg' => 'Updated Successfully');						
							}
							else {
								$result = array('number' => '2', 'msg' => $category_update_id);
							}							
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $category_error);
					}
                }

				if(!empty($image_copy) && $image_copy == 1) {
					$target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
					if(!empty($category_cover_image)) {				
						if(file_exists($temp_dir.$category_cover_image)) {   
							if(!empty($prev_category_cover_image)) {		
								if(file_exists($target_dir.$prev_category_cover_image)) {   
									unlink($target_dir.$prev_category_cover_image);
								}
							}
							copy($temp_dir.$category_cover_image, $target_dir.$category_cover_image.$GLOBALS['image_format']);
						}
						else {
							if($category_cover_image == $GLOBALS['null_value']) {
								if(!empty($prev_category_cover_image) && file_exists($target_dir.$prev_category_cover_image)) {   
									unlink($target_dir.$prev_category_cover_image);
								}
							}
						}
					}
					if(!empty($category_mobile_cover_image)) {				
						if(file_exists($temp_dir.$category_mobile_cover_image)) {   
							if(!empty($prev_category_mobile_cover_image)) {		
								if(file_exists($target_dir.$prev_category_mobile_cover_image)) {   
									unlink($target_dir.$prev_category_mobile_cover_image);
								}
							}
							copy($temp_dir.$category_mobile_cover_image, $target_dir.$category_mobile_cover_image.$GLOBALS['image_format']);
						}
						else {
							if($category_mobile_cover_image == $GLOBALS['null_value']) {
								if(!empty($prev_category_mobile_cover_image) && file_exists($target_dir.$prev_category_mobile_cover_image)) {   
									unlink($target_dir.$prev_category_mobile_cover_image);
								}
							}
						}
					}
					$obj->clear_temp_image_directory();
				}
				// $showroom_update = 0;
				// $showroom_update = $obj->UpdateCategoryToShowroom($update_category_id);

				// $master_update = 0;
				// $master_update = $obj->UpdateCategoryToMaster($update_category_id);

			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($valid_category)) {
				$result = array('number' => '3', 'msg' => $valid_category);
			}
			else if(!empty($position_error)) {
				$result = array('number' => '2', 'msg' => $position_error);
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

		$access_error = "";
		if(!empty($login_staff_id)) {
			$permission_module = $GLOBALS['product_module'];
			$permission_action = $view_action;
			include('permission_action.php');
		}
		if(!empty($access_error)) {
			?>
			<div class="w-100 text-center">
				<?php echo $access_error; ?>
			</div>
		<?php
		}
		else {

			$total_records_list = array();
			$total_records_list = $obj->getTableRecords($GLOBALS['category_table'], '', '');

			if(!empty($search_text)) {
				$search_text = strtolower($search_text);
				$list = array();
				if(!empty($total_records_list)) {
					foreach($total_records_list as $val) {
						if( (strpos(strtolower($obj->encode_decode('decrypt', $val['lower_case_name'])), $search_text) !== false) ) {
							$list[] = $val;
						}
					}
				}
				$total_records_list = $list;
			}
			
			$total_pages = 0;
			if(!empty($total_records_list)) {
				$total_pages = count($total_records_list);
			}
		
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
				$show_records_list = array_slice($total_records_list, $page_start, $page_limit);
			}
				?>
        
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($show_records_list)) {
                            foreach($show_records_list as $key => $data) {
                                $index = $key + 1;
                                if(!empty($page_number) && $page_number > 1) {
                                    $prefix = 0;
                                    $prefix = ($page_number * $page_limit) - $page_limit;
                                    if(!empty($prefix)) {
                                        $index = $prefix + $index;
                                    }
                                }
                    ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td>
                            <div class="w-100">
                                <?php
                                    if(!empty($data['name'])) {
                                        $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                        echo $data['name'];
                                    }
                                ?>
                            </div>
                            
                            <?php
                                if(!empty($data['creator_name'])) {
                                    $data['creator_name'] = $obj->encode_decode('decrypt', $data['creator_name']);
                            ?>
                                    <small><?php echo "Last Opened : ".$data['creator_name']; ?></small>
                            <?php		
                                }
                            ?>
                        </td>
                        <td>
                            <div class="form-group mb-1">
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <label for="FormSelectDefault" class="form-label text-muted"> </label>
    									<input type="checkbox" name="status" class="form-check-input code-switcher" id="show_hide_toggle_<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>" value="<?php if(!empty($data['category_status'])) { echo $data['category_status']; } ?>" <?php if(!empty($data['category_status']) && $data['category_status'] == 1) { ?> checked="checked" <?php } ?> onChange="Javascript:ShowHideFrontend(this, '<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>');">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>');"><i class="fa fa-pencil"></i> Edit</a></li>
                                    <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>');"><i class="fa fa-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        else {
                    ?>
                            <tr>
                                <td colspan="4" class="text-center">Sorry! No records found</td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>    
            <?php
        }
            ?>
        <?php 
    }
	if(isset($_REQUEST['show_order'])) {
		$show_order = $_REQUEST['show_order'];

		$parent_category_id = "";
		if(isset($_REQUEST['parent_category_id'])) {
			$parent_category_id = $_REQUEST['parent_category_id'];
		}

		if(!empty($show_order) && $show_order == 1) {
			$category_list = array();
			$category_list = $obj->DisplayCategoryByOrder($parent_category_id);
                ?>
			<form class="py-4 poppins pd-20 col-xl-8 mx-auto" name="ordering_form" method="POST">
				<div class="row">
					<div class="form-group col-12">
						<table class="table nowrap" style="margin: auto;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                </tr>
								<?php
									if(!empty($category_list)) {
										foreach($category_list as $key => $data) {
											if(!empty($data['category_id'])) {
								?>
												<tr>
													<td><?php echo $key + 1; ?></td>
													<td>
														<?php
															if(!empty($data['name'])) {
																$data['name'] = $obj->encode_decode('decrypt', $data['name']);
																echo $data['name'];
															}
														?>
														<input type="hidden" name="ordering_id[]" class="form-control" value="<?php echo $data['category_id']; ?>">
													</td>
													<td>
														<input type="text" name="ordering_position[]" class="form-control" style="width:100px;" value="<?php if(!empty($data['ordering'])) { echo $data['ordering']; } ?>">
													</td>
												</tr>
								<?php				
											}
										}
									}
									else {
								?>
									<tr>
										<td colspan="3" class="text-center">Sorry! No records found</td>
									</tr>
								<?php } ?>
                            </thead>
						</table>	
					</div>
					<div class="col-md-12 pt-3 text-center">
						<button class="btn btn-primary btnwidth submit_button" type="button" onClick="Javascript:SaveModalContent('ordering_form', 'category_changes.php', 'category.php');">Update</button>
					</div>
				</div>
			</form>
            <?php			
		}
	}    
	if(isset($_POST['ordering_id'])) {
		$ordering_id = array(); $ordering_position = array(); $ordering_error = ""; $ordering_positions = array();
		$ordering_id = $_POST['ordering_id'];
		$ordering_position = $_POST['ordering_position'];
		if(!empty($ordering_id) && !empty($ordering_position)) {
			for($i = 0; $i < count($ordering_id); $i++) {
				if(!empty($ordering_id[$i])) {
					if(!empty($ordering_position[$i])) {
						if(preg_match("/^\d+$/", $ordering_position[$i])) {
							if(!in_array($ordering_position[$i], $ordering_positions)) {
								$ordering_positions[] = $ordering_position[$i];
							}
							else {
								$ordering_error = "Repeating Positions";
							}
						}
						else {
							$ordering_error = "Invalid Position";
						}
					}
					else {
						$ordering_error = "Empty position";
					}
				}
				else {
					$ordering_error = "Cateogry ID is missing";
				}
			}
			$result = "";
			if(empty($ordering_error)) {
				if(!empty($ordering_id) && !empty($ordering_position)) {
					$success = 0;
					for($i = 0; $i < count($ordering_id); $i++) {
						$category_id = ""; $position = "";
						if(!empty($ordering_id[$i])) {
							$category_id = $ordering_id[$i];
						}
						if(!empty($ordering_position[$i])) {
							$position = $ordering_position[$i];
						}
						if(!empty($category_id) && !empty($position)) {
							$getUniqueID = "";
							$getUniqueID = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $category_id, 'id');
							if(preg_match("/^\d+$/", $getUniqueID)) {
								$name = "";
								$name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $category_id, 'name');

								$action = "";
								if(!empty($name)) {
									$action = "Category Position Updated. Name - ".$obj->encode_decode('decrypt', $name);
								}
							
								$position_update_id = ""; $columns = array(); $values = array();						
								$columns = array('ordering');
								$values = array("'".$position."'");
								$position_update_id = $obj->UpdateSQL($GLOBALS['category_table'], $getUniqueID, $columns, $values, $action);
								if(preg_match("/^\d+$/", $position_update_id)) {
									$success++;					
								}						
							}
						}
					}
					if(!empty($success) && $success == count($ordering_id)) {
						$result = array('number' => '1', 'msg' => 'Updated Successfully');
					}
					else {
						$result = array('number' => '2', 'msg' => 'Some positions are not updated');
					}
				}		
			}
			else {
				$result = array('number' => '2', 'msg' => $ordering_error);
			}
			if(!empty($result)) {
				$result = json_encode($result);
			}
			echo $result; exit;
		}
	}    
	if(isset($_REQUEST['show_hide_id'])) {
		$show_hide_id = $_REQUEST['show_hide_id'];
		$show_frontend = $_REQUEST['show_frontend'];
		$msg = "";
		if(!empty($show_hide_id)) {
			$show_hide_unique_id = "";
			$show_hide_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $show_hide_id, 'id');
            if(preg_match("/^\d+$/", $show_hide_unique_id)) {
                $name = "";
                $name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $show_hide_id, 'name');
            
                $action = "";
                if(!empty($name)) {
					if(!empty($show_frontend)) {
						$action = "Category Show in Frontend. Change to OFF. Name - ".$obj->encode_decode('decrypt', $name);
					}
                    else {
						$action = "Category Show in Frontend. Change to ON. Name - ".$obj->encode_decode('decrypt', $name);
					}
                }
            
                $columns = array(); $values = array();						
                $columns = array('category_status');
                $values = array("'".$show_frontend."'");
                $msg = $obj->UpdateSQL($GLOBALS['category_table'], $show_hide_unique_id, $columns, $values, $action);
            }
		}
		echo $msg;
		exit;
	}
	if(isset($_REQUEST['delete_category_id'])) {
		$delete_category_id = $_REQUEST['delete_category_id'];
		$msg = "";
		if(!empty($delete_category_id)) {	

			$product_rows = 0; $product_list = array();
			// $product_list = $obj->getTableRecords($GLOBALS['product_table'], 'category_id', $delete_category_id);
			// if(!empty($product_list)) {
			// 	$product_rows = count($product_list);
			// }

			if(empty($product_rows)) {
				$category_unique_id = "";
				$category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $delete_category_id, 'id');
				if(preg_match("/^\d+$/", $category_unique_id)) {
					$name = "";
					$name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $delete_category_id, 'name');
				
					$action = "";
					if(!empty($name)) {
						$action = "Category Deleted. Name - ".$obj->encode_decode('decrypt', $name);
					}
				
					$columns = array(); $values = array();						
					$columns = array('deleted');
					$values = array("'1'");
					$msg = $obj->UpdateSQL($GLOBALS['category_table'], $category_unique_id, $columns, $values, $action);
				}
			}
			else {
				$msg = "Unable to Delete";
			}
		}
		echo $msg;
		exit;	
	}    