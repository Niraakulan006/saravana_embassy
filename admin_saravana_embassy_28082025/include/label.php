<?php
	/*require 'mailin_sms/sms_api.php';
	$GLOBALS['mailin_sms_api_key'] = "zaG0R7cJBhkUbf54";*/

	date_default_timezone_set('Asia/Calcutta');
	$GLOBALS['create_date_time_label'] = date('Y-m-d H:i:s');
	$GLOBALS['site_name_user_prefix'] = "smt_".date("d-m-Y"); $GLOBALS['user_id'] = ""; $GLOBALS['creator'] = "";
	$GLOBALS['creator_name'] = ""; $GLOBALS['bill_company_id'] = ""; $GLOBALS['null_value'] = "NULL";

	$GLOBALS['page_number'] = 1; $GLOBALS['page_limit'] = 10; $GLOBALS['page_limit_list'] = array("10", "25", "50", "100");

	$GLOBALS['backup_folder_name'] = 'backup';
	$GLOBALS['log_backup_file'] = $GLOBALS['backup_folder_name']."/logs/".date("Y").".csv"; 

	$GLOBALS['max_company_count'] = 2;$GLOBALS['default_date'] = "1947-01-01";
	
	// Tables
	$GLOBALS['user_table'] = ""; $GLOBALS['company_table'] = "company";
	$GLOBALS['image_format'] = ".webp";
	$GLOBALS['max_description_length'] = 150; 
    $GLOBALS['max_user_count'] = 5;

	$GLOBALS['Reset_to_one'] = "Reset To 1"; $GLOBALS['continue_last_number'] = "Continue from last number"; $GLOBALS['custom_number'] = "Custom Number";
	
	$GLOBALS['admin_user_type'] = "Super Admin"; $GLOBALS['staff_user_type'] = "Staff";

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
		$GLOBALS['creator'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
	}

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_username']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_username'])) {
		$GLOBALS['creator_name'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_username'];
	}

	if(!empty($_SESSION['bill_company_id']) && isset($_SESSION['bill_company_id'])) {
		$GLOBALS['bill_company_id'] = $_SESSION['bill_company_id'];
	}
	$table_prefix = 'saravana_embassy_';
	$GLOBALS['table_prefix']=$table_prefix;

	$GLOBALS['company_table'] = $table_prefix.'company';
	$GLOBALS['role_table'] = $table_prefix.'role';
	$GLOBALS['user_table'] = $table_prefix.'user'; 
	$GLOBALS['login_table'] = $table_prefix.'login';
	$GLOBALS['category_table'] = $table_prefix.'category';
	$GLOBALS['product_table'] = $table_prefix.'product';
	$GLOBALS['agent_table'] = $table_prefix.'agent';
	$GLOBALS['promo_code_table'] = $table_prefix.'promo_code';
	$GLOBALS['brand_table'] = $table_prefix.'brand';
	$GLOBALS['attribute_table'] = $table_prefix.'attribute';
	$GLOBALS['attribute_value_table'] = $table_prefix.'attribute_value';
	$GLOBALS['customer_table'] = $table_prefix.'customer';
	$GLOBALS['product_combination_table'] = $table_prefix.'product_combination';
	$GLOBALS['product_variety_table'] = $table_prefix.'product_variety';	
	$GLOBALS['home_banner_table'] = $table_prefix.'home_banner';
	$GLOBALS['meta_tags_table'] = $table_prefix.'meta_tags';	
	$GLOBALS['role_permission_table'] = $table_prefix."role_permission";

	$GLOBALS['company_module'] = 'Company';	
	$GLOBALS['category_module'] = 'Category';	
	$GLOBALS['product_module'] = 'Product';		
	$GLOBALS['agent_module'] = 'Agent';			
	$GLOBALS['promo_code_module'] = 'PromoCode';	
	$GLOBALS['brand_module'] = 'Brand';
	$GLOBALS['attribute_module'] = 'Attribute';
	$GLOBALS['attribute_value_module'] = 'Attribute value';
	$GLOBALS['customer_module'] = 'Customer';	

	$user_access_pages_list = array();
	$user_access_pages_list[] = $GLOBALS['company_module'];
	$user_access_pages_list[] = $GLOBALS['category_module'];
	$user_access_pages_list[] = $GLOBALS['product_module'];
	$user_access_pages_list[] = $GLOBALS['agent_module'];	
	$user_access_pages_list[] = $GLOBALS['promo_code_module'];
	$user_access_pages_list[] = $GLOBALS['brand_module'];
	$user_access_pages_list[] = $GLOBALS['attribute_module'];
	$user_access_pages_list[] = $GLOBALS['attribute_value_module'];
	$user_access_pages_list[] = $GLOBALS['customer_module'];	

?>