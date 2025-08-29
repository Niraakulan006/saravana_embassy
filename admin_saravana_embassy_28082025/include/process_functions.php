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
    }
?>