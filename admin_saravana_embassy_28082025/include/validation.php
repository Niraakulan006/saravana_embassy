<?php
	
	class validation {	

		public function clean_value($field_value) {
			if(!empty($field_value)) {
				//$field_value = strip_tags($field_value);
				$field_value = trim($field_value);
			}
			return $field_value;
		}

		public function common_validation($field_value, $field_name, $field_type) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				if(preg_match("/[\"\'\>\<]/", $field_value)) {
					$result = "(&lsquo; &ldquo; > <) not allowed";
				}
			}
			else {
				if($field_type == "select") {
					$result = "Select the ".$field_name;
				}
				else {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_name($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[a-zA-Z\s .]+$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_mobile_number($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match('/^[0-9]{10}$/', $field_value) && !preg_match('/^[0-9]{5}(\s)[0-9]{5}$/', $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_email($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_username($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(!empty($result)) {
					if(!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/", $field_value) && !preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}
		
		public function PasswordRequirements($post_name) {
			$count = 0; $result = 0; $success = 0;
			if(preg_match("/\d/", $post_name)) {
				$count++;
			}
			if(preg_match("/[A-Z]/", $post_name)) {
				$count++;
			}
			if(preg_match("/[a-z]/", $post_name)) {
				$count++;
			}
			// This is where I need help
			if(preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $post_name)) {
				$count++;
			}
			if($count == 4) {
				$success = 1;
			}
			return $success;
		}

		public function valid_password($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(strlen($field_value) < 8) {
						$result = $field_name." must be min.8 characters";
					}
					else {
						$result = $this->PasswordRequirements($field_value);
						if($result != 1) {
							$result = "Invalid ".$field_name;
						}
						else { $result = ""; }
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_gst_number($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_text($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[a-zA-Z\s]+$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_number($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[0-9]*$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_text_number($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[a-zA-Z0-9 ]+$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_price($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[0-9]+(\\.[0-9]+)?$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}

		public function valid_percentage($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					$field_value = str_replace("%", "", $field_value);
					if(!preg_match("/^[0-9]+(\\.[0-9]+)?$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}
		
		public function error_display($form_name, $field, $error, $type) {
			$result = "";
			if(!empty($error)) {
				if($type == "text") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "radio") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().after('<span class=".'"infos w-100"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "textarea") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] textarea[name=".'"'.$field.'"'."]').parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] textarea[name=".'"'.$field.'"'."]').parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "input_group") {
					if($field == "pincode") {
						$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}
								else {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
					}
					else {
						$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
					}			
				}
				if($type == "input_group_array") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().append('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "select") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] select[name=".'"'.$field.'"'."]').parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] select[name=".'"'.$field.'"'."]').parent().parent().append('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "custom_radio") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] input[name=".'"'.$field.'"'."]').parent().parent().parent().parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "upload_modal_button") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] button[name=".'"'.$field.'"'."]').parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] button[name=".'"'.$field.'"'."]').parent().after('<span class=".'"w-100 infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
				if($type == "on_off_checkbox") {
					$result = "if(jQuery('form[name=".'"'.$form_name.'"'."] checkbox[name=".'"'.$field.'"'."]').parent().parent().parent().find('span.infos').length == 0) {
									jQuery('form[name=".'"'.$form_name.'"'."] checkbox[name=".'"'.$field.'"'."]').parent().parent().after('<span class=".'"infos"'."> <i class=".'"fa fa-exclamation-circle"'."></i>".$error."</span>');
								}";
				}
			}
			
			return $result;
		}
		public function valid_company_name($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[a-zA-Z][a-zA-Z@()&' \s\.]+$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}
		public function valid_address($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^(?!\d+$)[\w]*[\w\:\-\s \/\.\,\#\@\&\[\]\(\)]*$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}	
		public function valid_party_name($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(!preg_match("/^[a-zA-Z]+[a-zA-Z\s \.]*$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}					
		public function valid_pincode($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				// Perform common validation (if any)
				$result = $this->common_validation($field_value, $field_name, '');
				
				// If common validation passes, perform specific pincode validation
				if(empty($result)) {
					// Validate pincode format
					if(!preg_match("/^\d{6}$/", $field_value)) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				// Check if pincode is required
				if($required == 1) {
					$result = "Enter the ".$field_name;
				}
			}
			return $result;
		}		
		public function valid_date($field_value, $field_name, $required) {
			$result = "";
			$field_value = trim($field_value);
			if(!empty($field_value)) {
				$result = $this->common_validation($field_value, $field_name, '');
				if(empty($result)) {
					if(date('d-m-Y', strtotime($field_value)) != $field_value) {
						$result = "Invalid ".$field_name;
					}
				}
			}
			else {
				if($required == 1) {
					$result = "Select the ".$field_name;
				}
			}
			return $result;
		} 						
	}

?>
