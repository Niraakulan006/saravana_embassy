<?php
	$page_title = "index";
	include("include_user_check_and_files.php");

	$check_users = array(); $user_count = 0;
	$check_users = $obj->getTableRecords($GLOBALS['user_table'], '', '');
	if(!empty($check_users)) {
		$user_count = count($check_users);
	}

	if(isset($_POST['name'])) {	
		$name = ""; $name_error = "";  $mobile_number = ""; $mobile_number_error = ""; 	$username = ""; $username_error = "";
		$password = ""; $password_error = ""; $admin = 1; $type = $GLOBALS['admin_user_type'];

		$create_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
		$valid_user = ""; $form_name = "user_form";
	
        $name = $_POST['name'];
        $name = $valid->clean_value($name);
		if(empty($name)) {
			$name_error = "Enter the name";
		}
		if(!empty($name_error)) {
			$valid_user = $valid->error_display($form_name, "name", $name_error, 'text');			
		}

		$mobile_number = $_POST['mobile_number'];
		$mobile_number = $valid->clean_value($mobile_number);
        $mobile_number_error = $valid->valid_mobile_number($mobile_number, "Mobile number", "1");
		if(!empty($mobile_number_error)) {
			if(!empty($valid_user)) {
				$valid_user = $valid_user." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
			}
			else {
				$valid_user = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
			}
		}

		$username = $_POST['username'];
        $username = $valid->clean_value($username);
		if(empty($username)) {
			$username_error = "Enter the user id";
		}
		if(!empty($username_error)) {
			if(!empty($valid_user)) {
				$valid_user = $valid_user." ".$valid->error_display($form_name, "username", $username_error, 'text');
			}
			else {
				$valid_user = $valid->error_display($form_name, "username", $username_error, 'text');
			}
		}

		$password = $_POST['password'];
		$password = $valid->clean_value($password);
        $password_error = $valid->valid_password($password, "Password", "1");
		if(!empty($password_error)) {
			if(!empty($valid_user)) {
				$valid_user = $valid_user." ".$valid->error_display($form_name, "password", $password_error, 'input_group');
			}
			else {
				$valid_user = $valid->error_display($form_name, "password", $password_error, 'input_group');
			}
		}
		
		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}
		
		$result = "";
		
		if(empty($valid_user)) {
			if(!empty($name)) {
				$name_array = "";
				$name_array = explode(" ", $name);
				if(is_array($name_array)) {
					for($n = 0; $n < count($name_array); $n++) {
						if(!empty($name_array[$n])) {
							$name_array[$n] = trim($name_array[$n]);
							$name_array[$n] = strtolower($name_array[$n]);
							$name_array[$n] = ucfirst($name_array[$n]);
						}
						else {
							unset($name_array[$n]);
						}
					}
					$name = implode(" ", $name_array);
				}    
				$name = $obj->encode_decode('encrypt', $name);
			}
			if(!empty($mobile_number)) {
				$mobile_number = $obj->encode_decode('encrypt', $mobile_number);
			}
			if(!empty($type)) {
				$type = $obj->encode_decode('encrypt', $type);
			}
			if(!empty($username)) {
				$username = $obj->encode_decode('encrypt', $username);
			}
			if(!empty($password)) {
				$password = $obj->encode_decode('encrypt', $password);
			}
				
			if(empty($edit_id)) {
				$created_date_time = $GLOBALS['create_date_time_label'];
				$creator_name = $name;
				
				$action = "";
				if(!empty($name)) {
					$action = "New User Created. Name - ".$obj->encode_decode('decrypt', $name);
				}

				$null_value = $GLOBALS['null_value'];

				$columns = array('created_date_time', 'creator', 'creator_name', 'user_id', 'name', 'mobile_number', 'type', 'username', 'password', 'admin', 'deleted');
				$values = array("'".$created_date_time."'", "'".$null_value."'", "'".$creator_name."'", "'".$null_value."'", "'".$name."'", "'".$mobile_number."'", "'".$type."'", "'".$username."'", "'".$password."'", "'".$admin."'", "'0'");
				$user_insert_id = $obj->InsertSQL($GLOBALS['user_table'], $columns, $values,'user_id', '', $action);	               
				if(preg_match("/^\d+$/", $user_insert_id)) {
					$image_copy = 1;
					$user_id = $obj->getTableColumnValue($GLOBALS['user_table'], 'id', $user_insert_id, 'user_id');
				
					$result = array('number' => '1', 'msg' => 'User Successfully Created');
				}
				else {
					$result = array('number' => '2', 'msg' => $user_insert_id);
				}
			}
		}
		else {
			if(!empty($valid_user)) {
				$result = array('number' => '3', 'msg' => $valid_user);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
	}

	if(isset($_POST['username'])) {
		$username = ""; $username_error = ""; $password = ""; $password_error = "";	
		$valid_login = ""; $form_name = "login_form";
		$username = $_POST['username'];
		$username = $valid->clean_value($username);
		// if(empty($username)) {
		// 	$valid_login = "Unable to Login";			
		// }	
		
		$password = $_POST['password'];
		$password = $valid->clean_value($password);
		// if(empty($password)) {
		// 	$valid_login = "Unable to Login";	
		// }

		if(empty($username) && empty($password)){
			$valid_login = "Enter Username & Password";
		}
		else if(empty($username) && !empty($password)) {
			$valid_login = "Enter Username";			
		}	
		else if(!empty($username) && empty($password)) {
			$valid_login = "Enter Password";	
		}
		
		$result = "";
		
		if(empty($valid_login)) {		
			$login_id = ""; $check_users = array(); $check_password = ""; $admin_user = 0; $staff_user = 0;	$check_staff = array();	
			if(!empty($username)) {
				$encrypted_username = $obj->encode_decode('encrypt', $username);	
				$check_users = $obj->getTableRecords($GLOBALS['user_table'], 'username', $encrypted_username);
				if(!empty($check_users)) {
					foreach($check_users as $data) {
						$login_id = $data['id'];
						$check_password = $data['password'];
						if($data['admin'] == 1){
							$admin_user = 1;
						}
						if($data['admin'] == 0){
							$staff_user = 1;
							$id = $data['id'];
						}
					}
				}
				// 	foreach($check_users as $data) {
				// 		$login_id = $data['id'];
				// 		$check_password = $data['password'];
				// 		$admin_user = 1;
				// 	}
				// }

				// if(empty($login_id)) {					
				// 	$check_staff = $obj->getTableRecords($GLOBALS['staff_table'], 'username', $encrypted_username);
				// 	if(!empty($check_staff)) {
				// 		foreach($check_staff as $data) {
				// 			$login_id = $data['id'];
				// 			$check_password = $data['password'];
				// 			$staff_user = 1;
				// 		}
				// 	}
				// }
			}
			
			if(!empty($login_id)) {			
					
				if($check_password == $obj->encode_decode('encrypt', $password)) {
					if(!empty($admin_user) && $admin_user == 1) {
						$check_users = $obj->getTableRecords($GLOBALS['user_table'], 'id', $login_id);
						if(!empty($check_users)) {
							foreach($check_users as $data) {
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'] = $data['user_id'];
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_username'] = $obj->encode_decode('decrypt', $data['name']);
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] =  $GLOBALS['admin_user_type'];
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_mobile_number'] =  $obj->encode_decode('decrypt', $data['mobile_number']);
							}
						}
					}
					else if(!empty($staff_user) && $staff_user == 1) {
						$check_staff = $obj->getTableRecords($GLOBALS['user_table'], 'id', $login_id);
						if(!empty($check_staff)) {
							foreach($check_staff as $data) {
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'] = $data['user_id'];
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_username'] = $obj->encode_decode('decrypt', $data['name']);
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] =  $GLOBALS['staff_user_type'];
								$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_mobile_number'] =  $obj->encode_decode('decrypt', $data['mobile_number']);
							}
						}
					}
					
					if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
						$create_date_time = $GLOBALS['create_date_time_label'];			
						$ip_address = $_SERVER['REMOTE_ADDR'];
						$browser = $_SERVER['HTTP_USER_AGENT'];
						$os_detail = php_uname();

						$action = "";
						if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
							$action = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']." User Login. IP Address - ".$ip_address." at ".date("d-m-Y h:is A", strtotime($create_date_time));
						}

						$columns = array('login_date_time', 'logout_date_time', 'ip_address', 'browser', 'os_detail', 'type', 'user_id');
						$values = array("'".$create_date_time."'", "'0000-00-00 00:00:00'", "'".$ip_address."'", "'".$browser."'", "'".$os_detail."'", "'".$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']."'", "'".$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']."'");						
						
						$user_login_record_id = $obj->InsertSQL($GLOBALS['login_table'], $columns, $values,'', '', $action);	               
                              				
						if(preg_match("/^\d+$/", $user_login_record_id)) {												
							$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_login_record_id'] = $user_login_record_id;
							$_SESSION[$GLOBALS['site_name_user_prefix'].'_user_ip_address'] = $ip_address;						
							if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_ip_address']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_ip_address'])) {

											// $redirection_page = "user.php";
								$billcompany_id = ""; $redirection_page = "";
								// $bill_company_id = $obj->getTableColumnValue($GLOBALS['user_table'], 'user_id', $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'], 'bill_company_id');
								// if(!empty($bill_company_id)) {
								// 	$_SESSION['bill_company_id'] = $bill_company_id;
								// 	$redirection_page = "dashboard.php";
								// }
								// else {
									$billcompany_id = $obj->getTableColumnValue($GLOBALS['company_table'], 'primary_company', '1', 'company_id');
									if(!empty($billcompany_id)) {
										$_SESSION['bill_company_id'] = $billcompany_id;
										$redirection_page = "dashboard.php";
									}
								// }

								$result = array('number' => '1', 'msg' => 'Login Successfully', 'redirection_page' => $redirection_page);
							}
						}
						else {
							$result = array('number' => '2', 'msg' => $user_login_record_id);
						}
					}	
				}
				else {
					$result = array('number' => '2', 'msg' => 'Password not match');
				}				
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid User Name');
			}	
		}
		else {
			$result = array('number' => '2', 'msg' => $valid_login);
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Layout config Js -->
    <script src="js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- App Css-->
    <link rel="stylesheet" href="css/app.min.css">
    <link rel="stylesheet" href="css/form.css">
    <!-- custom Css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="auth-page-wrapper">
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-4 text-white-50">
                        <a href="index.php" class="d-inline-block auth-logo">
                           <img src="images/logo2.webp" class="img-fluid w-50" alt="Saravana Embassy" title="Saravana Embassy">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-3">
                            <div class="text-center mt-2">
                                <h5 class="text-danger">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Saravana Embassy.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form name="login_form" action="login.php" method="POST">
                                    <div class="row">                                    
                                        <div class="mb-3">
                                            <div class="form-group mb-1">
                                                <div class="form-label-group in-border">
                                                    <input type="text" id="username" name="username" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                                                    <label>User Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control shadow-none" id="password" name="password" value="" onfocus="Javascript:KeyboardControls(this,'password',20,'1');" placeholder="Password">
                                                        <label for="password">Password(*)</label>
                                                        <div style="position: inherit; top: 0px;" class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
                                                            <button class="btn btn-danger" type="button" id="passwordBtn" data-toggle="button" aria-pressed="false"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="text-center">
                                            <a onClick="Javascript:FormSubmit(event, 'login_form', 'index.php', 'dashboard.php');" class="btn btn-danger">Log In</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">Copyright &copy; All Rights Reserved Developed By Srisoftwarez</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/waves.min.js"></script>
<script src="js/feather.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/dashboard-ecommerce.init.js"></script>
<script src="js/app.js"></script>
<script src="js/fonticons.js"></script>
<script src="js/particles.js"></script>
<script src="js/particles.app.js"></script>
<script src="include/js/keyboard_control.js"></script>
<script src="include/js/common.js"></script>
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
        } 
        else {
            passInput.attr("type", "password");
        }
  }
});
</script>
</body>
</html>          