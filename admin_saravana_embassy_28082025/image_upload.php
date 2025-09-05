<?php
	include("include_files.php");

	ini_set("extension", "php_gd2.dll");
	
	$msg = ""; $image_name = ""; $field_name = ""; $image_data = ""; $extension = ""; $preview_name = "";
	$temp_dir = ""; $temp_dir = $obj->temp_image_directory();
	
	if(isset($_POST['image_url'])) {
		$image_url = $_POST['image_url'];
		$image_type = $_POST['image_type'];
		$preview_name = $_POST['field'];
		if(!empty($preview_name)) {
			$field_name = $preview_name;
			$image_name = $preview_name."_".date("d_m_Y_h_i_s");
		}

		if ( !is_dir( $temp_dir ) ) {
			mkdir($temp_dir, 0777, true);
		}
		
		if(!empty($image_name)) {
			$display_page = $field_name;
			if(!empty($image_url)) {
				$image_upload = 0;
				switch ($image_type) {
					case 'image/jpeg': $extension = "jpeg"; $image_upload = 1; break;
					case 'image/jpg': $extension = "jpg"; $image_upload = 1; break;
					case 'image/png': $extension = "png"; $image_upload = 1; break;
					case 'image/gif': $extension = "gif"; $image_upload = 1; break;
					case 'image/webp': $extension = "webp"; $image_upload = 1; break;
				}
			}
			// $image_name = $image_name.'.'.$extension;
			if($image_upload == 1) {
				
				if(file_exists($temp_dir.$image_name)) {
					unlink($temp_dir.$image_name);
				}
				
				if(strpos($image_url, ',') !== false) {
					$image_data = explode(',', $image_url);
					
					$image_value = "";
					$image_value = base64_decode($image_data[1]);
					$destination = $temp_dir.$image_name;
					file_put_contents($destination, $image_value);    
					$success = 1;
					if(!empty($success)) {
						$webp_image = "";
						if(!empty($image_name) && file_exists($temp_dir.$image_name)) {
							$folder_image = $temp_dir.$image_name;
							$extension_list = array('jpg','jpeg','png','webp'); $resolution = 42;
							if (in_array($extension, $extension_list)) {
								// if(!empty($image_name) && !empty($extension) && $extension != "webp") {
								if(!empty($image_name) && !empty($extension)) {								
									$webp_image = str_replace(".".$extension, "", $image_name);
									$im = ""; $webp_image = $webp_image.$GLOBALS['image_format'];
									if(!file_exists($temp_dir.$webp_image)) {
										if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "webp") {

											if(!empty($preview_name)) {
												$convert_webp_image = $webp_image;
												//$convert_image_size = 500;

												list($width_orig, $height_orig) = getimagesize($folder_image);
												if($extension == "png") {
													$original_image = imagecreatefrompng($folder_image);
												}
												else if($extension == "jpg" || $extension == "jpeg") {
													$original_image = imagecreatefromjpeg($folder_image);
												}
												else if($extension == "webp") {
													$original_image = imagecreatefromwebp($folder_image);
												}
												$width = 500; $height = 500;
												if($preview_name == "desktop_home_banner") {
													$width = 1500; $height = 500;
												}
												else if($preview_name == "mobile_home_banner") {
													$width = 630; $height = 700;
												}												
												$ratio_orig = $width_orig/$height_orig;

												if ($width/$height > $ratio_orig) {
													$width = $height*$ratio_orig;
												} else {
													$height = $width/$ratio_orig;
												}

												// Resampling the image 
												$image_p = imagecreatetruecolor($width, $height);
												$bg = imagecolorallocate ( $image_p, 255, 255, 255 );
												imagefill($image_p, 0, 0, $bg);
												
												imagecopyresampled($image_p, $original_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);	
												imagewebp($image_p, $temp_dir.$convert_webp_image, $resolution);
												imagedestroy($image_p);
											}

										}	
									}
								}
							}
						}
						if(!empty($webp_image) && file_exists($temp_dir.$webp_image)) {
						// echo $temp_dir.$image_name.' - test';
							$image_size = filesize($temp_dir.$image_name);
							if(!empty($image_size) && $image_size < 2000000) {

								$date_time = date("dmyhis");
								if(!empty($preview_name) && $preview_name == "multiple_image") {
									$msg = '<div class="col-lg-3 col-md-3 col-6 pt-4"><button type="button" onclick="Javascript:delete_multiple_files(this);" class="btn btn-danger"><i class="fa fa-close"></i></button>
											<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" class="img-fluid w-75 mx-auto d-block">
											<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'">
											</div>';
								}else if($preview_name == "desktop_home_banner" || $preview_name == "mobile_home_banner") {
										$category_list = array();
										$category_list = $obj->getTableRecords($GLOBALS['category_table'], '', '');
										
										$msg = "";
										$msg .= '<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".');" class="btn btn-danger float-end"><i class="fa fa-close"></i></button>
												<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" class="img-fluid">
												<input type="hidden" name="banner_name[]" class="form-control" value="'.$image_name.'">
												<div class="row banner_row mx-0 mt-2">
													<div class="col-sm-3">
														<input type="text" name="banner_position[]" class="form-control mx-auto" value="" placeholder="Position" style="width: 100px;">
													</div>
													<div class="col-sm-9">
														<div class="form-group">
															<div class="w-100">
																<select class="form-control" name="banner_category_id[]">
																	<option value="">Select Category</option>
																	<option value="all">All</option>';
										if(!empty($category_list)) {
											foreach($category_list as $data) {
												if(!empty($data['category_id']) && $data["name"] != $GLOBALS['null_value']) {
													$msg .= '<option value="'.$data["category_id"].'">'.$obj->encode_decode("decrypt", $data["name"]).'</option>';
												}
											}
										}
										$msg .= '				</select>
															</div>
														</div>
													</div>
													<script type="text/javascript">
														if(jQuery(".banner_row").find("select").length > 0) {
															jQuery(".banner_row").find("select").select2();
														}
													</script>
												</div>
												';
									}
								else {
									$msg = '<button type="button" onclick="Javascript:delete_upload_image_before_save(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger"><i class="fa fa-close"></i></button>
											<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" class="img-fluid">
											<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'">
											';
								}	
							}
							else {
								$msg = "Image size is biggger than 2 MB";
							}
						}					
					}						
				}				
			}
			else {
				$msg = "Please upload only images.";
			}
		}
		else {
			$msg = "Image name is empty";
		}
		
		echo $msg;
		exit;
	}
?>