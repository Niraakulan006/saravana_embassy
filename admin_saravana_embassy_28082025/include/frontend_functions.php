<?php
    class Frontend_Functions extends Creation_functions {
        public function getCategoryWithNoSubCategoryFront() {
			$list = array(); $select_query = ""; $category_list = array();
			$select_query = "SELECT c.*, (SELECT COUNT(a.id) FROM ".$GLOBALS['category_table']." as a WHERE a.type = c.category_id AND a.deleted = '0' GROUP BY a.type) as sub_category_count FROM ".$GLOBALS['category_table']." as c  
								WHERE c.deleted = '0' AND c.category_status = '1' ORDER BY c.id DESC";
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
        public function getOTPNumber() {
			$otp_number = mt_rand(1000, 9999);
			return $otp_number;
		}        	
        public function getCategoryFilters($category_id, $frontend) {
			$select_query = ""; $list = array(); $category_filter_values_list = array();
			if(!empty($category_id)) {
				if(!empty($frontend) && $frontend == 1) {
					$select_query = "SELECT * FROM ".$GLOBALS['attribute_table']." WHERE category_id = '".$category_id."' AND deleted = '0' ORDER BY id ASC";
				}
				else {
					$select_query = "SELECT * FROM ".$GLOBALS['attribute_table']." WHERE category_id = '".$category_id."' AND deleted = '0' ORDER BY id ASC";
				}
				$list = $this->getQueryRecords($GLOBALS['attribute_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $row) {
						if(!empty($row['attribute_id'])) {
							$select_filter_value_query = ""; $filter_value_list = array();
							if(!empty($frontend) && $frontend == 1) {
								$select_filter_value_query = "SELECT * FROM ".$GLOBALS['attribute_value_table']." WHERE attribute_id = '".$row['attribute_id']."' 
								 AND deleted = '0' ORDER BY id ASC";
							}
							else {
								$select_filter_value_query = "SELECT * FROM ".$GLOBALS['attribute_value_table']." WHERE attribute_id = '".$row['attribute_id']."' AND deleted = '0' ORDER BY id ASC";
							}
							$filter_value_list = $this->getQueryRecords($GLOBALS['attribute_value_table'], $select_filter_value_query);
							
							if(!empty($frontend) && $frontend == 1) {
								if(!empty($filter_value_list)) {
									$row['filter_value_list'] = $filter_value_list;
									$category_filter_values_list[] = $row;
								}
							}
							else {
								if(!empty($filter_value_list)) {
									$row['filter_value_list'] = $filter_value_list;
								}
								$category_filter_values_list[] = $row;
							}
							
						}							
					}
				}
			}
			return $category_filter_values_list;
		}	
        public function getProductCount($table,$category_id,$product_attribute_value_id) {
            $where = "";
            if (!empty($category_id)) {
                $where .= " AND p.category_id = '".$category_id."'";
            }            
            $filter_where = "";
            if(!empty($product_attribute_value_id)) {
                $attribute_value_ids = array();
                $attribute_value_ids = json_decode($product_attribute_value_id);
                if(!empty($attribute_value_ids)) {
                    $attribute_ids = array(); $filter_list = array();
                    foreach($attribute_value_ids as $attribute_value_id) {
                        if(!empty($attribute_value_id)) {
                            $attribute_id = "";
                            $attribute_id = $this->getTableColumnValue($GLOBALS['attribute_value_table'], 'attribute_value_id', $attribute_value_id, 'attribute_id');
                            if(!empty($attribute_id) && !in_array($attribute_id, $attribute_ids)) {
                                $filter_list[] = array('attribute_id' => $attribute_id, 'attribute_value_id' => $attribute_value_id);
                            }
                        }
                    }
                    if(!empty($filter_list)) {
                        foreach($filter_list as $key => $item) {
                            if(array_key_exists('attribute_id', $item)) {
                                $filter_list[$item['attribute_id']][$key] = $item;
                            }
                        }
                        foreach($filter_list as $key => $filters) {
                            foreach($filters as $data) {
                                if(!empty($data['attribute_id']) && !empty($data['attribute_value_id'])) {
                                    if(!empty($attribute_value_id)) {
                                        if(!empty($filter_where)) {
                                            $filter_where = $filter_where." OR FIND_IN_SET('".$data['attribute_value_id']."', pav.attribute_id_value)";
                                        }   
                                        else {
                                            $filter_where = "FIND_IN_SET('".$data['attribute_value_id']."', pav.attribute_id_value)";
                                        }
                                    }
                                }
                            }
                        }
                        
                    }
                }
            }            
            if(!empty($filter_where)) {
                $select_query = "SELECT COUNT(DISTINCT p.product_id) as total_records from ".$GLOBALS['product_table']." p 
                                INNER JOIN ".$GLOBALS['product_combination_table']." pav on p.product_id = pav.product_id AND pav.deleted = '0' AND pav.attribute_status = 'available'

                                INNER JOIN ".$GLOBALS['category_table']." c on c.category_id = p.category_id AND c.deleted = '0' AND c.category_status = '1'
                                WHERE p.deleted = '0' AND (p.product_type = '1' OR p.product_type = '3') ".$where." AND ".$filter_where." AND 
                                p.product_status = '1' GROUP BY p.product_id 
                                ORDER BY  p.id DESC";                
            }else{
                $select_query = "SELECT COUNT(DISTINCT p.product_id) as total_records from ".$GLOBALS['product_table']." p 
                                INNER JOIN ".$GLOBALS['product_combination_table']." pav on p.product_id = pav.product_id AND pav.deleted = '0' AND pav.attribute_status = 'available'
                                INNER JOIN ".$GLOBALS['category_table']." c on c.category_id = p.category_id AND c.deleted = '0' AND c.category_status = '1' 
                                WHERE p.deleted = '0' AND (p.product_type = '1' OR p.product_type = '3') ".$where." AND
                                p.product_status = '1' GROUP BY p.product_id 
                                ORDER BY p.id DESC";
            }          
			$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
            $total_products = 0;
            if (!empty($list)) {
                foreach ($list as $row) {
                    if (isset($row['total_records'])) {
                        $total_products = $total_products + $row['total_records'];
                    }
                }
            }
            return $total_products;
        }			
        public function getProductRecords($table, $category_id, $offset, $limit,$product_attribute_value_id,$sort_by)
        {
            $list = array();
            $where = "";$orderby = "";
            if (!empty($category_id)) {
                $where .= " AND p.category_id = '".$category_id."'";
            }
            if(!empty($sort_by)){
                    if($sort_by == $GLOBALS['product_sort_position']) {
                        $orderby = "ORDER BY p.id ASC";
                    }
                    else if($sort_by == $GLOBALS['product_sort_date_new_to_old']) {
                        $orderby = "ORDER BY p.id DESC";
                    }
                    else if($sort_by == $GLOBALS['product_sort_date_old_to_new']) {
                        $orderby = "ORDER BY p.id ASC";
                    }
                    else if($sort_by == $GLOBALS['product_sort_price_low_to_high']) {
                        $orderby = "ORDER BY pav.actual_price ASC";
                    }
                    else if($sort_by == $GLOBALS['product_sort_price_high_to_low']) {
                        $orderby = "ORDER BY pav.actual_price DESC";
                    }
            }
            $filter_where = "";
            if(!empty($product_attribute_value_id)) {
                $attribute_value_ids = array();
                $attribute_value_ids = json_decode($product_attribute_value_id);
                if(!empty($attribute_value_ids)) {
                    $attribute_ids = array(); $filter_list = array();
                    foreach($attribute_value_ids as $attribute_value_id) {
                        if(!empty($attribute_value_id)) {
                            $attribute_id = "";
                            $attribute_id = $this->getTableColumnValue($GLOBALS['attribute_value_table'], 'attribute_value_id', $attribute_value_id, 'attribute_id');
                            if(!empty($attribute_id) && !in_array($attribute_id, $attribute_ids)) {
                                $filter_list[] = array('attribute_id' => $attribute_id, 'attribute_value_id' => $attribute_value_id);
                            }
                        }
                    }
                    if(!empty($filter_list)) {
                        foreach($filter_list as $key => $item) {
                            if(array_key_exists('attribute_id', $item)) {
                                $filter_list[$item['attribute_id']][$key] = $item;
                            }
                        }
                        foreach($filter_list as $key => $filters) {
                            foreach($filters as $data) {
                                if(!empty($data['attribute_id']) && !empty($data['attribute_value_id'])) {
                                    if(!empty($attribute_value_id)) {
                                        if(!empty($filter_where)) {
                                            $filter_where = $filter_where." OR FIND_IN_SET('".$data['attribute_value_id']."', pav.attribute_id_value)";
                                        }   
                                        else {
                                            $filter_where = "FIND_IN_SET('".$data['attribute_value_id']."', pav.attribute_id_value)";
                                        }
                                    }
                                }
                            }
                        }
                        
                    }
                }
            }            

            if(!empty($filter_where)) {
                $select_query = "SELECT p.*, '' as default_price, pav.actual_price as actual_price,
                                pav.id as filter_price_product_id, c.name as category_name from ".$GLOBALS['product_table']." p 
                                INNER JOIN ".$GLOBALS['product_combination_table']." pav on p.product_id = pav.product_id AND pav.deleted = '0' AND pav.attribute_status = 'available'
                                INNER JOIN ".$GLOBALS['category_table']." c on c.category_id = p.category_id AND c.deleted = '0' AND c.category_status = '1'
                                WHERE p.deleted = '0' AND (p.product_type = '1' OR p.product_type = '3') ".$where." AND ".$filter_where." AND 
                                p.product_status = '1' GROUP BY p.product_id 
                                ".$orderby." LIMIT ".$offset.", ".$limit;
            }else{
                $select_query = "SELECT p.*, '' as default_price, pav.actual_price as actual_price,
                                pav.id as filter_price_product_id, c.name as category_name from ".$GLOBALS['product_table']." p 
                                INNER JOIN ".$GLOBALS['product_combination_table']." pav on p.product_id = pav.product_id AND pav.deleted = '0' AND pav.attribute_status = 'available'
                                INNER JOIN ".$GLOBALS['category_table']." c on c.category_id = p.category_id AND c.deleted = '0' AND c.category_status = '1'
                                WHERE p.deleted = '0' AND (p.product_type = '1' OR p.product_type = '3') ".$where." AND
                                p.product_status = '1' GROUP BY p.product_id 
                                ".$orderby." LIMIT ".$offset.", ".$limit;
            }
            $list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
            return $list;
        }		
    }
	
