<?php
    class Process_Functions extends Basic_Functions {
        public function getOrderingNumber($table, $parent_id) {
			$ordering_number = 1; $select_query = "";

            if(!empty($table) && $table == $GLOBALS['category_table']) {
				if(!empty($parent_id) && $parent_id != $GLOBALS['null_value']) {
                	$select_query = "SELECT ordering FROM ".$table." WHERE type = '".$parent_id."' AND deleted = '0' ORDER BY ordering DESC LIMIT 1";
				}
				else {
					$select_query = "SELECT ordering FROM ".$table." WHERE type = '".$GLOBALS['null_value']."' AND deleted = '0' ORDER BY ordering DESC LIMIT 1";
				}
			}else if(!empty($table) && $table == $GLOBALS['product_table']) {
				if(!empty($parent_id) && $parent_id != $GLOBALS['null_value']) {
                	$select_query = "SELECT ordering FROM ".$table." WHERE category_id = '".$parent_id."' AND deleted = '0' ORDER BY ordering DESC LIMIT 1";
				}
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($table, $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['ordering'])) {
							$ordering_number = $data['ordering'] + 1;
						}
					}
				}
			}
			return $ordering_number;
		}
        public function DisplayCategoryByOrder($parent_category_id) {
			$list = array(); $select_query = "";
			if(!empty($parent_category_id)) {
				$select_query = "SELECT * FROM ".$GLOBALS['category_table']." WHERE type = '".$parent_category_id."' AND deleted = '0' ORDER BY ordering ASC";
			}
			else {
				$select_query = "SELECT * FROM ".$GLOBALS['category_table']." WHERE type = '".$GLOBALS['null_value']."' AND deleted = '0' ORDER BY ordering ASC";
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
			}
			return $list;
		}
        public function getCategoryWithNoSubCategory() {
			$list = array(); $select_query = ""; $category_list = array();
			$select_query = "SELECT c.*, (SELECT COUNT(a.id) FROM ".$GLOBALS['category_table']." as a WHERE a.type = c.category_id AND a.deleted = '0' GROUP BY a.type) as sub_category_count FROM ".$GLOBALS['category_table']." as c  
								WHERE c.deleted = '0' ORDER BY c.id DESC";
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['category_id']) && empty($data['sub_category_count'])) {
							$category_list[] = $data;
						}
					}
				}
			}
			return $category_list;
		}		
		public function getPrevCombinationId($product_id)
		{
			$select_query ="SELECT id,attribute_id_value,quantity FROM ".$GLOBALS['product_combination_table']." WHERE product_id = '".$product_id."' AND deleted = '0' ORDER BY id DESC";
			$combination_list = $this->getQueryRecords($GLOBALS['product_combination_table'],$select_query);
			return $combination_list;
		}	
		public function ProductVarietyUpdate($bill_company_id,$product_id,$category_id,$attribute_id,$attribute_id_value){
			$select_query = "";$list = array();$variety_unique_id = "";
			$select_query = "SELECT id FROM ".$GLOBALS['product_variety_table']." WHERE bill_company_id = '".$bill_company_id."' AND product_id = '".$product_id."' AND category_id = '".$category_id."' AND attribute_id = '".$attribute_id."' AND attribute_id_value = '".$attribute_id_value."' AND deleted = '0'";

			$list = $this->getQueryRecords("",$select_query);

			if(!empty($list)){
				foreach($list as $variety){
					if(!empty($variety['id'])){
						$variety_unique_id = $variety['id'];
					}
				}
			}
			$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
			$creator_name = $this->encode_decode('encrypt', $GLOBALS['creator_name']);
			$null_value = $GLOBALS['null_value'];

			if(empty($variety_unique_id)){
				$columns = array();$values = array();
				$action = "Product variety Succesfully Updated";
				$columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id','product_variety_id', 'product_id', 'category_id','attribute_id','attribute_id_value','deleted');
				$values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$product_id."'", "'".$category_id."'", "'".$attribute_id."'", "'".$attribute_id_value."'",'0');
				$product_variety_insert_id = $this->InsertSQL($GLOBALS['product_variety_table'], $columns, $values,'product_variety_id','', $action);						
				if(preg_match("/^\d+$/", $product_variety_insert_id)) {
					$result = array('number' => '1', 'msg' => 'Variety Successfully Created');					
				}
				else {
					$result = array('number' => '2', 'msg' => $product_variety_insert_id);
				}
			}else{
				
			}
		}			
		public function previous_variety_attributes($product_id,$category_id){
			$select_query = "";$list = array();$variety_unique_id = "";
			$select_query = "SELECT attribute_id_value,id FROM ".$GLOBALS['product_variety_table']." WHERE product_id = '".$product_id."' AND category_id = '".$category_id."' AND deleted = '0'";
			if(!empty($select_query)){
				$list = $this->getQueryRecords($GLOBALS['product_variety_table'],$select_query);
			}
			return $list;
		}		
		public function getCombinationId($product_id,$attribute_id,$attribute_value_id,$quantity) 
		{
			$id = "";
			$select_query ="SELECT id FROM ".$GLOBALS['product_combination_table']." WHERE product_id = '".$product_id."' AND attribute_id_value ='".$attribute_value_id."' AND quantity = '".$quantity."' AND deleted='0'";
			$price_list = $this->getQueryrecords("",$select_query);
			foreach($price_list as $data)
			{
				if(!empty($data['id']))
				{
					$id = $data['id'];
				}
			}
			return $id;
		}	
		public function getProductList($category_filter, $filter_product_type) {
			$list = array(); $select_query = ""; $where = "";

			// if(!empty($bill_company_id)) {
			// 	$where = "bill_company_id = '".$bill_company_id."'";
			// }
			
			if(!empty($category_filter)) {
				if(!empty($where)) {
					$where = $where." AND category_id = '".$category_filter."'";
				}
				else {
					$where = "category_id = '".$category_filter."'";
				}
			} 
			
			if(!empty($filter_product_type)) {
				if(!empty($where)) {
					$where = $where." AND product_type = '".$filter_product_type."'";
				}
				else {
					$where = "product_type = '".$filter_product_type."'";
				}
			} 

			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['product_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
			}else{
				$select_query = "SELECT * FROM ".$GLOBALS['product_table']." WHERE deleted = '0' ORDER BY id DESC";
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
			}
			return $list;
		}	
		public function getProductCombinationCount($product_id)
		{
			$select_query =""; $product_count =""; $product = array();
			$select_query = "SELECT DISTINCT(attribute_id_value) as attribute_id_value FROM ".$GLOBALS['product_combination_table']." WHERE product_id = '".$product_id."' AND deleted = '0'  ";
			$product_list = $this->getQueryRecords("",$select_query);
			foreach($product_list as $list)
			{
				if(!empty($list['attribute_id_value']))
				{
					$product[] = $list['attribute_id_value'];
				}
			}
			$product_count = count($product);
			return $product_count;
		}	
		public function getAttributeQuantity($product_id,$attribute_value_id,$quantity,$type)
		{
			$select_query =""; $price_list =array(); $price = 0;
			if($type == 'Actual_price')
			{
				$select_query ="SELECT actual_price FROM ".$GLOBALS['product_combination_table']." WHERE product_id = '".$product_id."' AND attribute_id_value ='".$attribute_value_id."' AND quantity = '".$quantity."' ";
				$price_list = $this->getQueryrecords("",$select_query);
				foreach($price_list as $data)
				{
					if(!empty($data['actual_price']))
					{
						$price = $data['actual_price'];
					}
				}
			}
			elseif($type == 'attribute_status')
			{
				$select_query ="SELECT attribute_status FROM ".$GLOBALS['product_combination_table']." WHERE product_id = '".$product_id."' AND attribute_id_value ='".$attribute_value_id."' AND quantity = '".$quantity."' ";
				$price_list = $this->getQueryrecords("",$select_query);
				foreach($price_list as $data)
				{
					if(!empty($data['attribute_status']))
					{
						$price = $data['attribute_status'];
					}
				}
			}

			return $price;
		}					
    }
?>