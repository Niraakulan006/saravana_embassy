<?php
	include("include.php");

	$backup = "";
	$backup = $obj->daily_db_backup();

	$ip_address = $_SERVER['REMOTE_ADDR'];

	$action = "";
	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'])) {
		$action = "Customer Logout. Customer Name - ".$_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name'].", Mobile Number - ".$_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number'].", IP Address - ".$ip_address;
	}

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address'])) {
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address']);
	}
	
	$msg = "";
	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id'])) {
		$create_date_time = $GLOBALS['create_date_time_label'];		
		if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id'])) {
			$columns = array('logout_date_time');
			$values = array("'".$create_date_time."'");
			$msg = $obj->UpdateSQL($GLOBALS['login_table'], $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id'], $columns, $values, $action);
		}		
		// session_destroy();	
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_types']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address']);
		unset($_SESSION['cart_product_nm']);
		header("Location:index");
		exit;
	}
	else {
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_name']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_mobile_number']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_types']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_login_record_id']);
		unset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_ip_address']);
		unset($_SESSION['cart_product_nm']);		
		// session_destroy();	
		header("Location:index");
		exit;
	}
?>