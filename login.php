<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$meta_file_name = "login_page";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
    $login_after_page_url = "";
    if(isset($_REQUEST['login_after_page_url'])) {
        $login_after_page_url = $_REQUEST['login_after_page_url'];
        $login_after_page_url = trim($login_after_page_url);
    }
    if(isset($_POST['username'])) {
		$username = ""; $username_error = ""; $password = ""; $password_error = "";	
		$valid_login = ""; $form_name = "login_form";

		$username = $_POST['username'];
		$username = trim($username);
        if(!empty($username)) {
            $username = str_replace(" ", "", $username);
            $username = strtolower($username);
        }
		$username_error = $valid->valid_username($username, "Mobile.No or Email", "1");
		if(!empty($username_error)) {
			$valid_login = $valid->error_display($form_name, "username", $username_error, 'text');
		}	
		
		$password = $_POST['password'];
		$password = trim($password);
		$password_error = $valid->valid_password($password, "Password", "1");
		if(!empty($password_error)) {
			if(!empty($valid_login)) {
				$valid_login = $valid_login." ".$valid->error_display($form_name, "password", $password_error, 'input_group');
			}
			else {
				$valid_login = $valid->error_display($form_name, "password", $password_error, 'input_group');
			}
		}

        $login_after_page_url = "";
        if(isset($_POST['login_after_page_url'])) {
            $login_after_page_url = $_POST['login_after_page_url'];
            $login_after_page_url = trim($login_after_page_url);
        }

        if(!empty($login_after_page_url)) {
            // $login_after_page_url = $obj->encode_decode('decrypt',$login_after_page_url);
        }
		$result = "";
		
		if(empty($valid_login)) {		
			$login_id = ""; $check_customers = array(); $check_password = ""; $mobile_number = "";
			if(!empty($username)) {
				$encrypted_username = $obj->encode_decode('encrypt', $username);	
				$check_customers = $obj->getTableRecords($GLOBALS['customer_table'], 'mobile_number', $encrypted_username);
				if(!empty($check_customers)) {
					foreach($check_customers as $data) {
						$login_id = $data['id'];
						$check_password = $data['password'];
                        $mobile_number = $data['mobile_number'];
					}
				}
                if(empty($login_id)) {
                    $check_customers = $obj->getTableRecords($GLOBALS['customer_table'], 'email', $encrypted_username);
                    if(!empty($check_customers)) {
                        foreach($check_customers as $data) {
                            $login_id = $data['id'];
                            $check_password = $data['password'];
                            $mobile_number = $data['mobile_number'];
                        }
                    }
                }
			}

			if(!empty($login_id)) {
				if($check_password == $obj->encode_decode('encrypt', $password)) {
                    if(!empty($login_id)) {
                        $check_customers = $obj->getTableRecords($GLOBALS['customer_table'], 'id', $login_id);
                        if(!empty($check_customers)) {
                            foreach($check_customers as $data) {
                                $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'] = $data['customer_id'];
                                $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name'] =  $obj->encode_decode('decrypt', $data['customer_name']);
                                if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
                                    $_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'] = $obj->encode_decode('decrypt', $data['mobile_number']);
                                }
                                $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_types'] = "Customer";
                            }
                        }
                    
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
                            $customer_login_record_id = $obj->InsertSQL($GLOBALS['login_table'], $columns, $values,'','',$action);						
                            if(preg_match("/^\d+$/", $customer_login_record_id)) {						
                                $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id'] = $customer_login_record_id;
                                $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address'] = $ip_address;						
                                if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address'])) {

                                    $last_view_page = "index";
                                    if(!empty($login_after_page_url)) {
                                        $last_view_page = $login_after_page_url;
                                    }
                                    
                                    $result = array('number' => '1', 'msg' => 'Login Successfully', 'last_view_page' => $last_view_page);
                                }
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $customer_login_record_id);
                            }
                        }
                    }

				}
				else {
					$result = array('number' => '2', 'msg' => 'Password not match');
				}				
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid login details');
			}	
		}
		else {
			$result = array('number' => '3', 'msg' => $valid_login);
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
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
		<div class="col-lg-6 col-md-12 col-12 d-none d-lg-block">
			<img src="images/login.jpg" class="img-fluid" alt="Login" title="Login">
		</div>
		<div class="col-lg-6 col-md-12 col-12">
			<form class="" name="login_form" method="POST">
				<div class="login-form">
					<div class="text-left">
						<div class="heading5 clr1 fw-500 poppins"> Login / Click Here To Register </div>
						<div class="poppins smallfnt pb-3">If You already register please Login</div>
					</div>
					<div class="form-group">
						<label class="poppins smallfnt clr3">Mobile Number Or Email Address</label>
						<input type="text" id="username" name="username" class="form-control smallfnt poppins" placeholder="Mobile Number / Email">
                        <input type="hidden" name="login_after_page_url" value="<?php if(!empty($login_after_page_url)) { echo $login_after_page_url; } ?>" class="form-control">
						<span class="icon bi bi-person"></span>
					</div>
					<div class="form-group">
						<label class="poppins smallfnt clr3">Password</label>
						<div class="input-group" style="position:initial;">
							<input type="password" class="form-control shadow-none smallfnt poppins" id="password" name="password" placeholder="Password" required="">
							<div style="position: inherit; top: 0px;" class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
								<button class="btn btn-dark" type="button" id="passwordBtn" data-toggle="button" aria-pressed="false"><i class="bi bi-eye"></i></button>
							</div>
						</div>
						<span class="icon bi bi-lock"></span>
					</div>
					<div class="text-right">
						<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>forgot_password" class="poppins text-danger">Forgot Password?</a>
					</div>
					<div class="text-center mt-3">
						<button class="login_button mx-auto poppins text-white" onClick="Javascript:SendModalContent(event, 'login_form', 'login.php', '');">Login</button>
					</div>
					<div class="poppins pt-2 text-center">Don’t have an account? <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>register" class="text-danger poppins">Sign Up</a> </div>  
				</div>
            </form>
		</div>
	</div>
</div>
<?php include ("footer.php")?>
<script type="text/javascript" src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/action_changes.js"></script>

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