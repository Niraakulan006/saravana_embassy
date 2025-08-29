<?php
	include("basic_functions.php");
	include("process_functions.php");
	include("creation_functions.php");

	class billing extends Basic_Functions {
		public function getProjectTitle() {
			$string = parent::getProjectTitle();
			return $string;
		}
		
		public function encode_decode($action, $string) {
			$string = parent::encode_decode($action, $string);
			return $string;
		}		
		public function InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action) {
			$last_insert_id = "";		
			$last_insert_id = parent::InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action);
			return $last_insert_id;
		}	
		public function UpdateSQL($table, $update_id, $columns, $values, $action) {
			$msg = "";		
			$msg = parent::UpdateSQL($table, $update_id, $columns, $values, $action);
			return $msg;
		}
		public function UpdateClient($main_client_id, $merge_client_id) {
			$msg = "";		
			$msg = parent::UpdateClient($main_client_id, $merge_client_id);
			return $msg;
		}
		public function getTableColumnValue($table, $column, $value, $return_value) {
			$result = "";
			$result = parent::getTableColumnValue($table, $column, $value, $return_value);
			return $result;
		}
		public function getTableColumnValue1($table, $column1, $value1, $column2, $value2, $return_value) {
			$result = "";
			$result = parent::getTableColumnValue1($table, $column1, $value1, $column2, $value2, $return_value);
			return $result;
		}
		public function getTableRecords($table, $column, $value) {
			$result = "";		
			$result = parent::getTableRecords($table, $column, $value);
			return $result;
		}

		public function daily_db_backup() {
			$result = "";		
			$result = parent::daily_db_backup();
			return $result;
		}
		public function image_directory() {
			$target_dir = "";		
			$target_dir = parent::image_directory();
			return $target_dir;
		}
		public function temp_image_directory() {
			$temp_dir = "";		
			$temp_dir = parent::temp_image_directory();
			return $temp_dir;
		}
		public function clear_temp_image_directory() {
			$res = "";		
			$res = parent::clear_temp_image_directory();
			return $res;
		}
		
		public function check_user_id_ip_address() {
			$check_login_id = "";			
			$check_login_id = parent::check_user_id_ip_address();			
			return $check_login_id;	
		}
		public function checkUser() {
			$login_user_id = "";			
			$login_user_id = parent::checkUser();			
			return $login_user_id;	
		}
		public function getDailyReport($from_date, $to_date) {
			$list = array();
			$list = parent::getDailyReport($from_date, $to_date);
			return $list;
		}
		
		public function send_mobile_details($phone_number, $msg) {
			$res = "";
			$res = parent::send_mobile_details($phone_number, $msg);
			return true;
		}		
		public function automate_number($table, $column) {
			$next_number = "";
			$next_number = parent::automate_number($table, $column);
			return $next_number;
		}	
		
		public function billing_function_object() {
			$billobj = "";		
			$billobj = new Billing_Functions();
			return $billobj;
		}
		public function process_functions_object() {
			$process_obj = "";		
			$process_obj = new Process_Functions();
			return $process_obj;
		}		
		public function getOrderingNumber($table, $parent_id) {
			$process_obj = "";
			$process_obj = $this->process_functions_object();

			$ordering_number = "";
			$ordering_number = $process_obj->getOrderingNumber($table, $parent_id);
			return $ordering_number;
		}		
        public function DisplayCategoryByOrder($parent_category_id) {
			$process_obj = "";
			$process_obj = $this->process_functions_object();

			$list = array();
			$list = $process_obj->DisplayCategoryByOrder($parent_category_id);
			return $list;
		}		
		public function creation_function_object() {
			$create_obj = "";		
			$create_obj = new Creation_functions();
			return $create_obj;
		}

		public function CheckbrandAlreadyExists($company_id, $brand_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckbrandAlreadyExists($company_id, $brand_name);
			return $result;
		}


		public function CheckAttributeAlreadyExists($bill_company_id, $attribute_name, $category_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$attribute_id = "";
			$attribute_id = $create_obj->CheckAttributeAlreadyExists($bill_company_id, $attribute_name,$category_id);
			return $attribute_id;
		}

		public function CheckAttrValueAlreadyExists($bill_company_id, $attribute_name, $category_id,$attribute_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$attribute_value_id = "";
			$attribute_value_id = $create_obj->CheckAttrValueAlreadyExists($bill_company_id, $attribute_name,$category_id,$attribute_id);
			return $attribute_value_id;
		}

		public function getAttrValueRecords( $bill_company_id, $category_id, $subcategory_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getAttrValueRecords($bill_company_id, $category_id, $subcategory_id);
			return $list;
		}

	}
?>