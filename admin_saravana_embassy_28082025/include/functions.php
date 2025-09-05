<?php
	include("basic_functions.php");
	include("process_functions.php");
	include("creation_functions.php");
	include("frontend_functions.php");
	include("user_functions.php");
	
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
        public function getCategoryWithNoSubCategory() {
			$process_obj = "";
			$process_obj = $this->process_functions_object();

			$list = array();
			$list = $process_obj->getCategoryWithNoSubCategory();
			return $list;
		}		
		public function getPrevCombinationId($product_id)
		{
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$list = array();
			$list = $process_obj->getPrevCombinationId($product_id);
			return $list;
		}						
		public function ProductVarietyUpdate($bill_company_id,$product_id,$category_id,$attribute_id,$attribute_id_value)
		{
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$list = array();
			$list = $process_obj->ProductVarietyUpdate($bill_company_id,$product_id,$category_id,$attribute_id,$attribute_id_value);
			return $list;
		}		
		public function previous_variety_attributes($product_id,$category_id){
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$result = "";
			$result = $process_obj->previous_variety_attributes($product_id,$category_id);
			return $result;
		}		
		public function getCombinationId($product_id,$attribute_id,$attribute_value_id,$quantity) 
		{
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$list = array();
			$list = $process_obj->getCombinationId($product_id,$attribute_id,$attribute_value_id,$quantity);
			return $list;
		}		
		public function getProductList($category_filter, $filter_product_type) {
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$result = "";
			$result = $process_obj->getProductList($category_filter,$filter_product_type);
			return $result;
		}		
		public function getProductCombinationCount($product_id)
		{
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$list = array();
			$list = $process_obj->getProductCombinationCount($product_id);
			return $list;
		}		
		public function getAttributeQuantity($product_id,$attribute_value_id,$quantity,$type) {
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$list = array();
			$list = $process_obj->getAttributeQuantity($product_id,$attribute_value_id,$quantity,$type);
			return $list;
		}		
		public function CheckQueryAlreadyExists($bill_company_id, $question, $product_id) {
			$process_obj = "";
			$process_obj = $this->process_functions_object();
			$attribute_id = "";
			$attribute_id = $process_obj->CheckQueryAlreadyExists($bill_company_id, $question,$product_id);
			return $attribute_id;
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
		public function getOtherCityList($district) {
			$list = array();
			$list = parent::getOtherCityList($district);
			return $list;
		}

		public function customerMobileExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->customerMobileExists($mobile_number);
			return $result;
		}

		public function FilterCustomerList($type) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->FilterCustomerList($type);
			return $result;
		}

		public function CheckUserIDAlreadyExists($user_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserIDAlreadyExists($user_id);
			return $list;
		}
		public function CheckUserNoAlreadyExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserNoAlreadyExists($mobile_number);
			return $list;
		}
		public function getProductAttribute($product_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getProductAttribute($product_id);
			return $list;
		}
		public function getProductAttributeValue($product_id, $attribute_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getProductAttributeValue($product_id, $attribute_id);
			return $list;
		}
		public function getDefaultAttributeValue($product_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getDefaultAttributeValue($product_id);
			return $list;
		}
		public function getDefaultCombinationPrice($product_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getDefaultCombinationPrice($product_id);
			return $list;
		}
		public function getProductCombinationRate($product_id, $attribute_id, $attribute_value_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getProductCombinationRate($product_id, $attribute_id, $attribute_value_id);
			return $list;
		}
		public function getEstimateList($row, $rowperpage, $searchValue, $from_date, $to_date, $customer_id, $state_id, $district_id, $cancelled, $is_invoiced, $order_column, $order_direction) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getEstimateList($row, $rowperpage, $searchValue, $from_date, $to_date, $customer_id, $state_id, $district_id, $cancelled, $is_invoiced, $order_column, $order_direction);
			return $list;
		}

		public function getUserList() {
			$list = array();
			$list = parent::getUserList();
			return $list;
		}

		public function CompanyCount() {
			$list = 0;
			$list = parent::CompanyCount();
			return $list;
		}		
		public function frontend_functions_object() {
			$frontend_obj = "";		
			$frontend_obj = new Frontend_Functions();
			return $frontend_obj;
		}		
        public function getCategoryWithNoSubCategoryFront() {
			$frontend_obj = "";
			$frontend_obj = $this->frontend_functions_object();

			$list = array();
			$list = $frontend_obj->getCategoryWithNoSubCategoryFront();
			return $list;
		}	
		public function getOTPNumber() {
			$frontend_obj = "";
			$frontend_obj = $this->frontend_functions_object();

			$otp_number = "";
			$otp_number = $frontend_obj->getOTPNumber();
			return $otp_number;
		}		
        public function getCategoryFilters($category_id, $frontend) {
			$frontend_obj = "";
			$frontend_obj = $this->frontend_functions_object();

			$list = array();
			$list = $frontend_obj->getCategoryFilters($category_id, $frontend);
			return $list;
		}		
		public function getProductCount($table,$where,$product_attribute_value_id) {
			$frontend_obj = "";
			$frontend_obj = $this->frontend_functions_object();
			$count = 0;
			$count = $frontend_obj->getProductCount($table,$where,$product_attribute_value_id);
			return $count;
		}		
		public function getProductRecords($table,$category_id,$offset,$limit,$product_attribute_value_id,$sort_by) {
			$frontend_obj = "";
			$frontend_obj = $this->frontend_functions_object();

			$list = array();
			$list = $frontend_obj->getProductRecords($table,$category_id,$offset,$limit,$product_attribute_value_id,$sort_by);
			return $list;
		}		
		public function user_functions_object() {
			$user_obj = "";		
			$user_obj = new User_Functions();
			return $user_obj;
		}		
		public function send_email_details($to_emails, $detail, $title) {
			$user_obj = "";
			$user_obj = $this->user_functions_object();

			$res = "";
			$res = $user_obj->send_email_details($to_emails, $detail, $title);
			return $res;
		}			
		
	}
?>