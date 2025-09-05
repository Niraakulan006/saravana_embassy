<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$meta_file_name = "login_page";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
    if(isset($_POST['otp_number'])) {
        $otp_number = ""; $otp_number_error = ""; $send_otp_number = ""; $otp_unique_id = ""; $otp_receive_mobile_number = ""; $otp_receive_email = "";
        $login_after_page_url = "";
        $lower_case_name = ""; $customer_details = ""; $name_mobile_city = "";
        $form_name = "otp_form"; $valid_otp = ""; $otp_action = "";

        $send_otp_number = $_SESSION['otp_number'];
        $otp_number = $_POST['otp_number'];
        $otp_number = trim($otp_number);
        if(!empty($otp_number)) {
            if(strlen($otp_number) != 4) {
                $otp_number_error = "Invalid otp number";
            }
            else if(!empty($send_otp_number) && $send_otp_number != $otp_number) {
                $otp_number_error = "Invalid otp number";
            }
        }

        if(isset($_SESSION['temp_login_after_page_url'])) {
            $login_after_page_url = $_SESSION['temp_login_after_page_url'];
            $login_after_page_url = trim($login_after_page_url);
        }

        if(!empty($login_after_page_url)) {
            // $login_after_page_url = $obj->LoginAfterPageUrl($login_after_page_url, $main_path);
        }


        $register_details = ""; $customer_name = ""; $address = ""; $city = ""; $pincode = ""; $district = ""; $state = ""; $country = ""; $mobile_number = ""; 
        $email = ""; $password = "";

        if(!empty($_SESSION['temp_customer_name'])) {
            $customer_name = $_SESSION['temp_customer_name'];
            $lower_case_name = strtolower($customer_name);
            $name_mobile_city = $obj->encode_decode('decrypt',$customer_name);
            $customer_details = $obj->encode_decode('decrypt',$customer_name);
        }
        if(!empty($_SESSION['temp_address'])) {
            $address = $_SESSION['temp_address'];
            if(!empty($customer_details)) {
                $customer_details = $customer_details."<br>".str_replace("\r\n", "<br>", $obj->encode_decode('decrypt',$address));
            }
        }
        if(!empty($_SESSION['temp_city'])) {
            $city = $_SESSION['temp_city'];
            if(!empty($customer_details)) {
                $customer_details = $customer_details."<br>".$obj->encode_decode('decrypt',$city);
            }

        }
        if(!empty($_SESSION['temp_pincode'])) {
            $pincode = $_SESSION['temp_pincode'];
        }
        if(!empty($_SESSION['temp_district'])) {
            $district = $_SESSION['temp_district'];
            if(!empty($customer_details)) {
                $customer_details = $customer_details."<br>".$obj->encode_decode('decrypt',$district)." (Dist.)";
            }            
        }
        if(!empty($_SESSION['temp_state'])) {
            $state = $_SESSION['temp_state'];
            if(!empty($customer_details)) {
                $customer_details = $customer_details."<br>".$obj->encode_decode('decrypt',$state);
            }

        }
        if(!empty($_SESSION['temp_country'])) {
            $country = $_SESSION['temp_country'];
        }
        if(!empty($_SESSION['temp_mobile_number'])) {
            $mobile_number = $_SESSION['temp_mobile_number'];
            $otp_receive_mobile_number = $mobile_number;
            if(!empty($name_mobile_city)) {
                $name_mobile_city = $name_mobile_city." (".$obj->encode_decode('decrypt',$mobile_number).")";
                if(!empty($city)) {
                    $name_mobile_city = $name_mobile_city." - ".$obj->encode_decode('decrypt',$city);
                }
            }    
            if(!empty($customer_details)) {
                $customer_details = $customer_details."<br> Mobile : ".$obj->encode_decode('decrypt',$mobile_number);
            }
        }
        if(!empty($_SESSION['temp_email'])) {
            $email = $_SESSION['temp_email'];
            $otp_receive_email = $email;
        }
        if(!empty($_SESSION['temp_password'])) {
            $password = $_SESSION['temp_password'];
        }
        if(!empty($_SESSION['temp_action'])) {
            $otp_action = $_SESSION['temp_action'];
        }
        if(!empty($name_mobile_city)){
            $name_mobile_city = $obj->encode_decode('encrypt', $name_mobile_city);
        }
        if(!empty($customer_details)) {
            $customer_details = $obj->encode_decode('encrypt', $customer_details);
        }        
        $result = "";
        if(empty($otp_number_error)) {
            if($otp_action == "register") {
                if(empty($pincode)) { $pincode = 0; }else{
                    $_SESSION['temp_pincode'] = $pincode;
                }

                if(!empty($customer_name) && !empty($password)) {
                    $action = "";
                    if(!empty($customer_name)) {
                        $action = "New Customer Created. Name - ".$obj->encode_decode('decrypt', $customer_name);
                        if(!empty($otp_receive_mobile_number)) {
                            $action = $action.", Mobile Number - ".$obj->encode_decode('decrypt', $otp_receive_mobile_number);
                        }
                        else if(!empty($otp_receive_email)) {
                            $action = $action.", Email - ".$obj->encode_decode('decrypt', $otp_receive_email);
                        }
                    }

                    $created_date_time = $GLOBALS['create_date_time_label'];
                    $creator_name = "";
                    if(!empty($customer_name)) {
                        $creator_name = $customer_name;
                    }
                    $site_name = $bill_company_id = "";
                    $company_list = array();
                    $company_list = $obj->getTableRecords($GLOBALS['company_table'], '', '');
                    if(!empty($company_list)) {
                        foreach($company_list as $data) {
                            if(!empty($data['name'])) {
                                $site_name = $obj->encode_decode('decrypt', $data['name']);
                                $bill_company_id = $data['company_id'];
                            }
                        }
                    }            

                    $null_value = $GLOBALS['null_value']; $whatsapp = 0;
                    $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id' ,'customer_id', 'customer_name', 'address', 'city', 'pincode', 'district', 'state', 'country', 'mobile_number', 'email', 'password', 'deleted','customer_type','lower_case_name','customer_details','name_mobile_city','wallet');
                    $values = array("'".$created_date_time."'", "'".$null_value."'", "'".$customer_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$customer_name."'", "'".$address."'", "'".$city."'", "'".$pincode."'", "'".$district."'", "'".$state."'", "'".$country."'", "'".$mobile_number."'", "'".$email."'", "'".$password."'", "'0'","'3'","'".$lower_case_name."'", "'".$customer_details."'", "'".$name_mobile_city."'","'0'");
                    $customer_insert_id = $obj->InsertSQL($GLOBALS['customer_table'], $columns, $values,'customer_id','', $action);
                    if(preg_match("/^\d+$/", $customer_insert_id)) {
                        $customer_id = $obj->getTableColumnValue($GLOBALS['customer_table'], 'id', $customer_insert_id, 'customer_id');   
                        $customer_name = $obj->encode_decode('decrypt', $customer_name);
                        $mail_content = $obj->getTableColumnValue($GLOBALS['mail_template_table'], 'type', 'Registration_success', 'content');
                        $mail_content = str_replace('{COMPANY}', $site_name, $mail_content);                                                                                                                                        
                        $mail_content = str_replace('{USER_NAME}', $customer_name, $mail_content);                                                                                                                                                                                
                        $email_response = "";
                        $to_emails[] = $obj->encode_decode('decrypt',$email);
                        $email_response = $obj->send_email_details($to_emails, $mail_content, $site_name." Success");                                        

                        if(!empty($customer_id)) {
                            $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'] = $customer_id;
                            $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name'] =  $customer_name;
                            $_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'] = $otp_receive_mobile_number;
                            $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_types'] = "Customer";
                            if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
                                $create_date_time = $GLOBALS['create_date_time_label'];			
                                $ip_address = $_SERVER['REMOTE_ADDR'];
                                $browser = $_SERVER['HTTP_USER_AGENT'];
                                $os_detail = php_uname();
                                
                                $action = "";
                                if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name'])) {
                                    $action = "Customer Login. Customer Name - ".$_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name'];
                                }
                                if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'])) {
                                    $action = $action.", Mobile Number - ".$_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'];
                                }
                                $action = $action.", IP Address - ".$ip_address;
                                
                                $columns = array('login_date_time', 'logout_date_time', 'ip_address', 'browser', 'os_detail', 'type', 'user_id', 'deleted');
                                $values = array("'".$create_date_time."'", "'".$create_date_time."'", "'".$ip_address."'", "'".$browser."'", "'".$os_detail."'", "'".$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_types']."'", "'".$_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']."'", "'0'");						
                                $customer_login_record_id = $obj->InsertSQL($GLOBALS['login_table'], $columns, $values,'','', $action);						
                                if(preg_match("/^\d+$/", $customer_login_record_id)) {						
                                    $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id'] = $customer_login_record_id;
                                    $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address'] = $ip_address;
                                }
                            }        
                        }
                        unset($_SESSION['temp_login_after_page_url']);
                        unset($_SESSION['temp_customer_name']);
                        unset($_SESSION['temp_address']);
                        unset($_SESSION['temp_city']);
                        unset($_SESSION['temp_pincode']);
                        unset($_SESSION['temp_mobile_number']);
                        unset($_SESSION['temp_district']);
                        unset($_SESSION['temp_state']);
                        unset($_SESSION['temp_country']);
                        unset($_SESSION['temp_email']);
                        unset($_SESSION['temp_password']);

                        $last_view_page = "index";
                        // if(!empty($login_after_page_url)) {
                        //     $last_view_page = $login_after_page_url;
                        // }
                        $result = array('number' => '1', 'msg' => 'Customer Successfully Created', 'last_view_page' => $last_view_page);

                    }else {
                        $result = array('number' => '2', 'msg' => $customer_insert_id);
                    }
                }
                else {
                    $result = array('number' => '2', 'msg' => $customer_insert_id);
                }
            }
            else {
				$result = array('number' => '2', 'msg' => 'Invalid login details');
			}
        }
        else {
            if(!empty($otp_number_error)) {
                $result = array('number' => '2', 'msg' => $otp_number_error);
            }
        }
        if(!empty($result)) {
			$result = json_encode($result);
		}

        echo $result;
        exit;

    }
?>
<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<?php include("style_script.php"); ?>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div class="container pad">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-12 d-none d-lg-block">
			<img src="images/login.jpg" class="img-fluid" alt="Login" title="Login">
		</div>
		<div class="col-lg-6 col-md-12 col-12">
            <form class="" name="otp_form" method="POST">
                <div class="login-form">
                    <div class="text-left">
                        <div class="heading5 clr1 fw-500 poppins"> Enter OTP <?php echo $_SESSION['otp_number'] ?></div>
                    </div>
                    <div class="form-group">
                        <label class="poppins smallfnt clr3">OTP</label>
                        <input type="text" id="otp_number" name="otp_number" class="form-control smallfnt poppins" placeholder="Enter OTP">
                        <span class="icon bi bi-person"></span>
                    </div>
                    <div class="text-center mt-3">
                        <button class="login_button mx-auto poppins text-white submit_button" type="button" onClick="Javascript:SaveCustomerDetails(event, 'otp_form', 'otp_verify.php', '');">Verify OTP</button>
                    </div>
                    <div class="poppins pt-2 text-center">Already have an account? <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-danger poppins">Login</a> here </div>  
                </div>
            </form>
		</div>
	</div>
</div>
<?php include ("footer.php")?>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/customer.js"></script>

<script>
    new WOW().init();
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