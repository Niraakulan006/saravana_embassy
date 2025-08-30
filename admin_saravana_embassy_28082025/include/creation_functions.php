<?php 
    class Creation_functions extends Basic_Functions {
          
        public function CheckBrandAlreadyExists($company_id, $brand_name) {
			$list = array(); $select_query = ""; $brand_id = ""; $where = "";
			if(!empty($company_id)) {
				$where = " bill_company_id = '".$company_id."' AND ";
			}
			if(!empty($brand_name)) {
				$select_query = "SELECT brand_id FROM ".$GLOBALS['brand_table']." WHERE ".$where." lower_case_name = '".$brand_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['brand_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['brand_id'])) {
							$brand_id = $data['brand_id'];
						}
					}
				}
			}
			return $brand_id;
		}   
		
		public function CheckAttributeAlreadyExists($bill_company_id, $attribute_name, $category_id) {
			$list = array(); $select_query = ""; $attribute_id = "";
			if(!empty($bill_company_id) && !empty($attribute_name) && !empty($category_id)) {
				$select_query = "SELECT attribute_id FROM ".$GLOBALS['attribute_table']." WHERE lower_case_name = '".$attribute_name."' AND category_id = '".$category_id."' AND deleted = '0'";	
			}
			// echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['attribute_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['attribute_id'])) {
							$attribute_id = $data['attribute_id'];
						}
					}
				}
			}
			return $attribute_id;
		}

		public function CheckAttrValueAlreadyExists($bill_company_id, $attribute_name, $category_id,$attribute_id) {
			$list = array(); $select_query = ""; $attribute_value_id = "";
			if(!empty($bill_company_id) && !empty($attribute_name) && !empty($category_id)) {
				$select_query = "SELECT attribute_value_id FROM ".$GLOBALS['attribute_value_table']." WHERE lower_case_name = '".$attribute_name."' AND category_id = '".$category_id."'AND attribute_id = '".$attribute_id."' AND deleted = '0'";	
			}
			// echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['attribute_value_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['attribute_value_id'])) {
							$attribute_value_id = $data['attribute_value_id'];
						}
					}
				}
			}
			return $attribute_value_id;
		}

		public function getAttrValueRecords( $bill_company_id,$filter_category_id, $filter_attribute_id) {
			$list = array(); $select_query = ""; $where = "";

			if(!empty($bill_company_id)) {
				$where = "bill_company_id = '".$bill_company_id."'";
			}
			
			if(!empty($filter_category_id)) {
				if(!empty($where)) {
					$where = $where." AND category_id = '".$filter_category_id."'";
				}
				else {
					$where = "category_id = '".$filter_category_id."'";
				}
			} 
			
			if(!empty($filter_attribute_id)) {
				if(!empty($where)) {
					$where = $where." AND attribute_id = '".$filter_attribute_id."'";
				}
				else {
					$where = "attribute_id = '".$filter_attribute_id."'";
				}
			} 

			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['attribute_value_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
			}else{
				 $select_query = "SELECT * FROM ".$GLOBALS['attribute_value_table']." WHERE deleted = '0' ORDER BY id DESC";
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['attribute_value_table'], $select_query);
			}
			return $list;
		}	
		public function customerMobileExists($mobile_number) {
			$list = array(); $select_query = ""; $customer_id = ""; $where = "";
			
			if(!empty($mobile_number)) {
				$select_query = "SELECT customer_id FROM ".$GLOBALS['customer_table']." WHERE mobile_number = '".$mobile_number."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['customer_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['customer_id'])) {
							$customer_id = $data['customer_id'];
						}
					}
				}
			}
			return $customer_id;
		}

		public function FilterCustomerList($customer_type){
			$where = "";
			if(!empty($customer_type)) {
				$where = " customer_type = '".$customer_type."'";
			}

			if(!empty($where)) {
                $select_query = "SELECT * FROM ".$GLOBALS['customer_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
            } 
            else {
                $select_query = "SELECT * FROM ".$GLOBALS['customer_table']." WHERE deleted = '0' ORDER BY id DESC";
            }
            if(!empty($select_query)) {
                $list = $this->getQueryRecords($GLOBALS['customer_table'], $select_query);
            }
            return $list;
		}	
		public function CheckUserIDAlreadyExists($user_id) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($user_id)) {
				$where = "lower_case_name = '".$user_id."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}

		public function CheckUserNoAlreadyExists($mobile_number) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($mobile_number)) {
				$where = "mobile_number = '".$mobile_number."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}			
    }


	