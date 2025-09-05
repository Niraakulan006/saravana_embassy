<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$meta_file_name = "register_page";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
    if(isset($_POST['customer_name'])) {	
		$customer_name = ""; $customer_name_error = ""; $address = ""; $address_error = ""; $city = ""; $city_error = ""; $pincode = ""; $pincode_error = ""; 
        $district = ""; $district_error = ""; $state = ""; $state_error = ""; $country = ""; $country_error = ""; $mobile_number = ""; $mobile_number_error = ""; 
        $email = ""; $email_error = ""; $password = ""; $password_error = ""; 

		$valid_customer = ""; $form_name = "customer_form";
	
        $customer_name = $_POST['customer_name'];
		$customer_name = trim($customer_name);
		$customer_name_error = $valid->common_validation($customer_name, "customer name", "1",'');
		if(!empty($customer_name_error)) {
			$valid_customer = $valid->error_display($form_name, "customer_name", $customer_name_error, 'text');
		}

        $address = $_POST['address'];
		$address = trim($address);
		$address_error = $valid->common_validation($address, "address", "text",'');
		if(!empty($address_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "address", $address_error, 'textarea');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "address", $address_error, 'textarea');
			}
		}

        $country = $_POST['country'];
		$country = trim($country);
		$country_error = $valid->common_validation($country, "country", "select",'');
		if(!empty($country_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "country", $country_error, 'select');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "country", $country_error, 'select');
			}
		}

		$state = $_POST['state'];
		$state = trim($state);
		if(!empty($country) && $country == "India") {
            $state_error = $valid->common_validation($state, "State", "select",'');
        }
		if(!empty($state_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "state", $state_error, 'select');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "state", $state_error, 'select');
			}
		}

        $district = $_POST['district'];
		$district = trim($district);
		if(!empty($country) && $country == "India") {
            $district_error = $valid->common_validation($district, "district", "select",'');
        }
		if(!empty($district_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "district", $district_error, 'select');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "district", $district_error, 'select');
			}
		}

        $city = $_POST['city'];
		$city = trim($city);
		if(!empty($country) && $country == "India") {
            if(!empty($state) && $state == "Tamil Nadu") {
                $city_error = $valid->common_validation($city, "city", "text",'');
            }
        }
		if(!empty($city_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "city", $city_error, 'text');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "city", $city_error, 'text');
			}
		}

        $pincode = $_POST['pincode'];
		$pincode = trim($pincode);
		if(!empty($country) && $country == "India") {
            $pincode_error = $valid->valid_number($pincode, "pincode", "1");
        }
		if(!empty($pincode_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "pincode", $pincode_error, 'text');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "pincode", $pincode_error, 'text');
			}
		}

        if(isset($_POST['mobile_number'])) {
            $mobile_number = $_POST['mobile_number'];
            $mobile_number = trim($mobile_number);
        }
        if(!empty($mobile_number)) {
            $mobile_number = str_replace(" ", "", $mobile_number);
        }
        if(isset($_POST['email'])) {
            $email = $_POST['email'];
            $email = trim($email);
        }

        if(!empty($country)) {
            if($country == "India") {
                $mobile_number_error = $valid->valid_mobile_number($mobile_number, "Mobile number", "1");
                if(!empty($mobile_number_error)) {
                    if(!empty($valid_customer)) {
                        $valid_customer = $valid_customer." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                    }
                    else {
                        $valid_customer = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                    }
                }
                if(!empty($email)) {
                    $email = strtolower($email);
                    $email_error = $valid->valid_email($email, "Email", "1");
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
            else {
                if(!empty($mobile_number)) {
                    $mobile_number_error = $valid->common_validation($mobile_number, "Mobile number", "text", '');
                }
                if(!empty($mobile_number_error)) {
                    if(!empty($valid_customer)) {
                        $valid_customer = $valid_customer." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                    }
                    else {
                        $valid_customer = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                    }
                }
                $email = strtolower($email);
                $email_error = $valid->valid_email($email, "Email", "1");
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

		$password = $_POST['password'];
		$password = trim($password);
		$password_error = $valid->common_validation($password, "Password", "text",'');
		if(!empty($password_error)) {
			if(!empty($valid_customer)) {
				$valid_customer = $valid_customer." ".$valid->error_display($form_name, "password", $password_error, 'input_group');
			}
			else {
				$valid_customer = $valid->error_display($form_name, "password", $password_error, 'input_group');
			}
		}

        $otp_number = "";
        $login_after_page_url = "";
        if(isset($_POST['login_after_page_url'])) {
            $login_after_page_url = $_POST['login_after_page_url'];
            $login_after_page_url = trim($login_after_page_url);
        }
        if(!empty($login_after_page_url)) {
            // $login_after_page_url = $obj->LoginAfterPageUrl($login_after_page_url, $main_path);
			$_SESSION['temp_login_after_page_url'] = $login_after_page_url;
        }
		
		$result = "";
		
		if(empty($valid_customer)) {

            $mobile_otp = 0; $email_otp = 0; $otp_receive_mobile_number = ""; $otp_receive_email = "";
            if(!empty($country)) {
                if($country == "India") {
                    $mobile_otp = 1;
                    // $otp_receive_mobile_number = $mobile_number;
                    $otp_receive_email = $email;					
                }
                else {
                    $email_otp = 1;
                    $otp_receive_email = $email;
                }
            }

            if(!empty($customer_name)) {
                $customer_name = $obj->encode_decode('encrypt', $customer_name);
				$_SESSION['temp_customer_name'] = $customer_name;
            }
            if(!empty($address)) {
                $address = $obj->encode_decode('encrypt', $address);
				$_SESSION['temp_address'] = $address;
            }
            if(!empty($city)) {
                $city = $obj->encode_decode('encrypt', $city);
				$_SESSION['temp_city'] = $city;
            }
            else {
                $city = $GLOBALS['null_value'];
            }
            if(empty($pincode)) { $pincode = 0; }else{
				$pincode = $obj->encode_decode('encrypt', $pincode);
				$_SESSION['temp_pincode'] = $pincode;
			}
            if(!empty($district)) {
                $district = $obj->encode_decode('encrypt', $district);
				$_SESSION['temp_district'] = $district;
            }
            else {
                $district = $GLOBALS['null_value'];
            }
            if(!empty($state)) {
                $state = $obj->encode_decode('encrypt', $state);
				$_SESSION['temp_state'] = $state;
            }
            else {
                $state = $GLOBALS['null_value'];
            }
            if(!empty($country)) {
                $country = $obj->encode_decode('encrypt', $country);
				$_SESSION['temp_country'] = $country;
            }
            if(!empty($mobile_number)) {
                $mobile_number = $obj->encode_decode('encrypt', $mobile_number);
				$_SESSION['temp_mobile_number'] = $mobile_number;
            }
            else {
                $mobile_number = $GLOBALS['null_value'];
            }
            if(!empty($email)) {
                $email = $obj->encode_decode('encrypt', $email);
				$_SESSION['temp_email'] = $email;
            }
            else {
                $email = $GLOBALS['null_value'];
            }
            if(!empty($password)) {
                $password = $obj->encode_decode('encrypt', $password);
				$_SESSION['temp_password'] = $password;
            }
            $_SESSION['temp_action'] = 'register';
            $prev_customer_id = ""; $customer_error = "";			
            if(!empty($mobile_number) && $mobile_number != $GLOBALS['null_value']) {
                $prev_customer_id = $obj->getTableColumnValue($GLOBALS['customer_table'], 'mobile_number', $mobile_number, 'customer_id');
                if(!empty($prev_customer_id)) {
                    $customer_error = "This mobile number is already exist";
                }
            }
            if( (!empty($email) && $email != $GLOBALS['null_value']) && empty($customer_error)) {
                $prev_customer_id = $obj->getTableColumnValue($GLOBALS['customer_table'], 'email', $email, 'customer_id');
                if(!empty($prev_customer_id)) {
                    $customer_error = "This email is already exist";
                }
            }
            if(empty($prev_customer_id)) {

                $otp_number = "";
                $otp_number = $obj->getOTPNumber();
				$_SESSION['otp_number'] = $otp_number;

                $site_name = "";
                $company_list = array();
                $company_list = $obj->getTableRecords($GLOBALS['company_table'], '', '');
                if(!empty($company_list)) {
                    foreach($company_list as $data) {
                        if(!empty($data['name'])) {
                            $site_name = $obj->encode_decode('decrypt', $data['name']);
                        }
                    }
                }

                if(!empty($otp_number)) {
					if(!empty($mobile_otp) && $mobile_otp == 1) {
						if(!empty($otp_receive_mobile_number)) {
							$otp_sms = ""; $sms_response = "";
							if(!empty($site_name)) {
								$otp_sms = $otp_number."|".$site_name;                        
								if(!empty($otp_sms)) {
									$email_response = "";
									$email_response = $obj->send_email_details($to_emails, $mail_content, $site_name." OTP");										
									// $sms_response = $obj->send_mobile_details($otp_receive_mobile_number, '131030', $otp_sms);
								}
							}
						}
					}
					else if(!empty($email_otp) && $email_otp == 1) {
						if(!empty($otp_receive_email)) {
							$to_emails = array();
							$to_emails[] = $otp_receive_email;
							if(!empty($site_name)) {
								$mail_content = $obj->getTableColumnValue($GLOBALS['mail_template_table'], 'type', 'Registration', 'content');
								$mail_content = str_replace('{OTP}', $otp_number, $mail_content);
								$mail_content = str_replace('{COMPANY}', $site_name, $mail_content);                                                                                                
								$email_response = "";
								// $email_response = $obj->send_email_details($to_emails, $mail_content, $site_name." OTP");
							}
						}
						
					}
					$result = array('number' => '1', 'msg' => 'Please verify with OTP number', 'otp_details' => 'otp');
                }  

            }
            else {
                $result = array('number' => '2', 'msg' => $customer_error);
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
    $login_after_page_url = "";
    if(isset($_REQUEST['login_after_page_url'])) {
        $login_after_page_url = $_REQUEST['login_after_page_url'];
        $login_after_page_url = trim($login_after_page_url);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<?php include("style_script.php"); ?>
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/action_changes.css">
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div class="container pad">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-12 d-none d-lg-block align-self-center">
			<img src="images/login.jpg" class="img-fluid" alt="Register" title="Register">
		</div>
		<div class="col-lg-6 col-md-12 col-12">
            <form class="" name="customer_form" method="POST">
				<div class="login-form">
					<div class="text-left">
						<div class="heading5 clr1 fw-500 poppins"><i class="bi bi-person"></i> Create an account </div>
						<div class="poppins smallfnt pb-3">Register here if you are a new customer</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-12 col-12 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Customer Name</label>
								<input type="text" id="customer_name" name="customer_name" class="form-control smallfnt poppins" placeholder="Enter Customer Name">
								<span class="icon bi bi-person"></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-12 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Mobile Number</label>
								<input type="text" id="mobile_number" name="mobile_number" class="form-control smallfnt1 poppins" placeholder="Enter Mobile Number">
								<span class="icon bi bi-phone"></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-12 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Email Address</label>
								<input type="text" id="email" name="email" class="form-control smallfnt poppins" placeholder="Enter Your Email">
								<span class="icon bi bi-envelope"></span>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-12 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Password</label>
								<div class="input-group" style="position:initial;">
									<input type="password" class="form-control shadow-none smallfnt poppins" id="password" name="password" placeholder="Password" required="">
									<div style="position: inherit; top: 0px;" class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
										<button class="btn btn-danger" type="button" id="passwordBtn" data-toggle="button" aria-pressed="false"><i class="bi bi-eye"></i></button>
									</div>
								</div>
								<span class="icon bi bi-lock"></span>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Address</label>
								<textarea class="form-control smallfnt poppins" id="address" name="address" placeholder="Enter Your Address"></textarea>
							</div>
						</div>
						<div class="col-lg-4 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Select Country</label>
								<select class="form-control smallfnt poppins" name="country" id="country" onChange="Javascript:getCountries(this.value, '', '', '');">
                                <option value="">Select</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Select State</label>
								<select class="form-control smallfnt poppins" name="state" id="state" onChange="Javascript:getStates(this.value, '');">
	                                <option value="">Select</option>
								</select>
							</div>
						</div>						
						<div class="col-lg-4 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Select District</label>
								<select class="form-control smallfnt poppins" name="district" id="district" onChange="Javascript:getCities(this.value, '');">
	                                <option value="">Select</option>
								</select>
							</div>
						</div>						
						<div class="col-lg-4 px-lg-1">
							<div class="form-group">
								<label class="poppins smallfnt clr3">Select City</label>
								<select class="form-control smallfnt poppins" name="city" id="city">
	                                <option value="">Select</option>
								</select>
							</div>
						</div>																		
						<div class="col-lg-4 px-lg-1">
							<div class="form-group normal">
								<label class="poppins smallfnt clr3">Enter Pincode</label>
								<input type="text" id="pincode" class="form-control smallfnt poppins " name="pincode" placeholder="Enter Your Pincode">
							</div>
						</div>
					</div>
					<div class="poppins pt-2">Already have an account? <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-danger poppins">Login</a> here </div>  
					<div class="text-center mt-3">
						<button class="login_button mx-auto poppins text-white submit_button" onClick="Javascript:SaveCustomerDetails(event, 'customer_form', 'register.php', '');">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include ("footer.php")?>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/customer.js"></script>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/countries.js"></script>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/district.js"></script>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/cities.js"></script>


<script>
    new WOW().init();
</script>
<script type="text/javascript">
    getCountries('India', 'Tamil Nadu', '', '');
</script>

<script>
$(function(){
$(".menu-container").jSideMenu({
    jSidePosition: "position-left", //possible options position-left or position-right
    jSideSticky: true, // menubar will be fixed on top, false to set static
    jSideSkin: "default-skin", // to apply custom skin, just put its name in this string
     });
}); 
</script>
<script>
	$(document).ready(function() {
    $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  
    const passBtn = $("#passwordBtn");
  
    passBtn.click(togglePassword);
  
    function togglePassword() {
      const passInput = $("#password");
      if (passInput.attr("type") === "password") {
        passInput.attr("type", "text");
      } else {
        passInput.attr("type", "password");
      }
    }
  	});
</script>
</body>
</html>