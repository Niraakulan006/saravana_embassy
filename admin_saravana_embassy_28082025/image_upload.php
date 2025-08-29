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
							$extension_list = array('jpg','jpeg','png'); $resolution = 42;
							if (in_array($extension, $extension_list)) {
								if(!empty($image_name) && !empty($extension) && $extension != "webp") {
									$webp_image = str_replace(".".$extension, "", $image_name);
									$im = ""; $webp_image = $webp_image.'.webp';
									if(!file_exists($temp_dir.$webp_image)) {
										if($extension == "png" || $extension == "jpg" || $extension == "jpeg") {

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

												$width = 500; $height = 500;
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
								if(!empty($preview_name) && $preview_name == "product_image") {
									$msg = '<button type="button" onclick="Javascript:delete_multiple_files(this);" class="btn btn-danger"><i class="fa fa-close"></i></button>
											<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" class="img-fluid">
											<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'">
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