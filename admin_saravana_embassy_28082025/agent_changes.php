<?php
	include("include_files.php");
	if(isset($_REQUEST['show_agent_id'])) { 
         $show_agent_id = $_REQUEST['show_agent_id'];
            $name = ""; $mobile_number = ""; 
            if(!empty($show_agent_id)) {
                $agent_list = array();
                $agent_list = $obj->getTableRecords($GLOBALS['agent_table'], 'agent_id', $show_agent_id);
                if(!empty($agent_list)) {
                    foreach($agent_list as $data) {
                        if(!empty($data['name'])) {
                            $name = $obj->encode_decode('decrypt', $data['name']);
                            $name = htmlentities($name);
                        }
                        if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
                            $mobile_number = $data['mobile_number'];
                        }
                    }
                }
            }        
        ?>
        <form class="poppins pd-20" name="agent_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<?php if(empty($show_agent_id)){ ?>
    						<div class="h5">Add Agent</div>
                        <?php } else {?>
    						<div class="h5">Edit Agent</div>
                        <?php }?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('agent.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_agent_id)) { echo $show_agent_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" value="<?php if(!empty($name)) { echo $name; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',15,1);" placeholder="" required>
                            <label>Agent Name</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="mobile_number" name="mobile_number" value="<?php if(!empty($mobile_number)) { echo $mobile_number; } ?>" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'mobile_number',10,'1');"  placeholder="" required>
                            <label>Contact Number</label>
                        </div>
                        <div class="new_smallfnt">Numbers Only (only 10 digits)</div>
                    </div>
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button" onClick="Javascirpt:SaveModalContent('agent_form', 'agent_changes.php', 'agent.php');">
                        Submit
                    </button>
                </div>
            </div>
        </form>
		<?php
    } 
    if(isset($_POST['name'])) {	
		$name = ""; $name_error = "";  $mobile_number = ""; $mobile_number_error = "";

		$valid_agent = ""; $form_name = "agent_form";
	
        $name = $_POST['name'];
		$name = trim($name);
		$name_error = $valid->common_validation($name, "name", "text");
		if(!empty($name_error)) {
			$valid_agent = $valid->error_display($form_name, "name", $name_error, 'text');
		}
		if(isset($_POST['mobile_number'])) {
			$mobile_number = $_POST['mobile_number'];
			$mobile_number = trim($mobile_number);
    		$mobile_number_error = $valid->common_validation($mobile_number, "Mobile Numner", "text");
            if(!empty($mobile_number_error)) {
                if(!empty($valid_agent)) {
                    $valid_agent = $valid_agent." ".$valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
                else {
                    $valid_agent = $valid->error_display($form_name, "mobile_number", $mobile_number_error, 'text');
                }
            }
		}		
		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}

		$access_error = "";
        if(!empty($login_staff_id)) {
			if(!empty($edit_id)) {
				$permission_module = $GLOBALS['agent_module'];
				$permission_action = $edit_action;
				include('permission_action.php');
			}
			else {    
				$permission_module = $GLOBALS['agent_module'];
				$permission_action = $add_action;
				include('permission_action.php');
			}
			if(!empty($access_error) && empty($position_error)) {
				$position_error = $access_error;
			}
        }
		
		$result = "";
		
		if(empty($valid_agent) && empty($position_error)) {
			$check_user_id_ip_address = "";
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
				
				$lower_case_name = "";
				if(!empty($name)) {
					$lower_case_name = strtolower($name);
					$lower_case_name = preg_replace('/[^a-zA-Z0-9_ -]/s','',$lower_case_name);
					/*$lower_case_name = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $lower_case_name);
					$lower_case_name = str_replace('*', ' ', $lower_case_name);*/
					$lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
					$name = $obj->encode_decode('encrypt', $name);
				}
				if(empty($mobile_number)) {
					$mobile_number = $GLOBALS['null_value'];
				}

				$prev_agent_id = ""; $agent_error = "";			
				if(!empty($mobile_number)) {
					$prev_agent_id = $obj->getTableColumnValue($GLOBALS['agent_table'], 'mobile_number', $mobile_number, 'agent_id');
					if(!empty($prev_agent_id)) {
                        $agent_error = "This agent Mobile Number already exist";
                    }
                }
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $bill_company_id = $GLOBALS['bill_company_id'];
				if(empty($edit_id)) {
					if(empty($prev_agent_id)) {						
						$action = "";
						if(!empty($name)) {
							$action = "New Agent Created. Name - ".$obj->encode_decode('decrypt', $name);
						}

						$null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name','bill_company_id', 'agent_id', 'name', 'lower_case_name', 'mobile_number', 'deleted');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'","'".$bill_company_id."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'", "'".$mobile_number."'", "'0'");
                        $agent_insert_id = $obj->InsertSQL($GLOBALS['agent_table'], $columns, $values,'agent_id','', $action);						
						if(preg_match("/^\d+$/", $agent_insert_id)) {
                            $result = array('number' => '1', 'msg' => 'Agent Successfully Created');					
						}
						else {
							$result = array('number' => '2', 'msg' => $agent_insert_id);
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $agent_error);
					}
				}
				else {
					if(empty($prev_agent_id) || $prev_agent_id == $edit_id) {
						$getUniqueID = "";
						$getUniqueID = $obj->getTableColumnValue($GLOBALS['agent_table'], 'agent_id', $edit_id, 'id');
						if(preg_match("/^\d+$/", $getUniqueID)) {
							$action = "";
							if(!empty($name)) {
								$action = "Agent Updated. Name - ".$obj->encode_decode('decrypt', $name);
							}
						
							$columns = array(); $values = array();						
							$columns = array('creator_name', 'name', 'lower_case_name', 'mobile_number');
							$values = array("'".$creator_name."'", "'".$name."'", "'".$lower_case_name."'", "'".$mobile_number."'");
							$agent_update_id = $obj->UpdateSQL($GLOBALS['agent_table'], $getUniqueID, $columns, $values, $action);
							if(preg_match("/^\d+$/", $agent_update_id)) {
								$result = array('number' => '1', 'msg' => 'Updated Successfully');						
							}
							else {
								$result = array('number' => '2', 'msg' => $agent_update_id);
							}							
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $agent_error);
					}
                }
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($valid_agent)) {
				$result = array('number' => '3', 'msg' => $valid_agent);
			}
			else if(!empty($position_error)) {
				$result = array('number' => '2', 'msg' => $position_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
	}        
    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title'];

		$search_text = "";
		if(isset($_POST['search_text'])) {
			$search_text = $_POST['search_text'];
		}

		$access_error = "";
		if(!empty($login_staff_id)) {
			$permission_module = $GLOBALS['agent_module'];
			$permission_action = $view_action;
			include('permission_action.php');
		}
		if(!empty($access_error)) {
			?>
			<div class="w-100 text-center">
				<?php echo $access_error; ?>
			</div>
		<?php
		}
		else {

			$total_records_list = array();
			$total_records_list = $obj->getTableRecords($GLOBALS['agent_table'], '', '');

			if(!empty($search_text)) {
				$search_text = strtolower($search_text);
				$list = array();
				if(!empty($total_records_list)) {
					foreach($total_records_list as $val) {
						if( (strpos(strtolower($obj->encode_decode('decrypt', $val['lower_case_name'])), $search_text) !== false) ) {
							$list[] = $val;
						}
						if( (strpos($val['mobile_number'], $search_text) !== false) ) {
							$list[] = $val;
						}                        
					}
				}
				$total_records_list = $list;
			}
			
			$total_pages = 0;
			if(!empty($total_records_list)) {
				$total_pages = count($total_records_list);
			}
		
			$page_start = 0; $page_end = 0;
			if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
				if($total_pages > $page_limit) {
					if($page_number) {
						$page_start = ($page_number - 1) * $page_limit;
						$page_end = $page_start + $page_limit;
					}
				}
				else {
					$page_start = 0;
					$page_end = $page_limit;
				}
			}

			$show_records_list = array();
			if(!empty($total_records_list)) {
				$show_records_list = array_slice($total_records_list, $page_start, $page_limit);
			}
				?>
        
			<?php if($total_pages > $page_limit) { ?>
				<div class="pagination_cover mt-3"> 
					<?php
						include("pagination.php");
					?> 
				</div> 
			<?php } ?>
        
            <table class="table cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Agent Name</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($show_records_list)) {
                            foreach($show_records_list as $key => $data) {
                                $index = $key + 1;
                                if(!empty($page_number) && $page_number > 1) {
                                    $prefix = 0;
                                    $prefix = ($page_number * $page_limit) - $page_limit;
                                    if(!empty($prefix)) {
                                        $index = $prefix + $index;
                                    }
                                }
                    ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td>
                            <?php
                                if(!empty($data['name'])) {
                                    $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                    echo $data['name'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if(!empty($data['mobile_number'])) {
                                    echo $data['mobile_number'];
                                }
                            ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['agent_id'])) { echo $data['agent_id']; } ?>');"><i class="fa fa-pencil"></i> Edit</a></li>
                                <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['agent_id'])) { echo $data['agent_id']; } ?>');"><i class="fa fa-trash"></i> Delete</a></li>
                                </ul>
                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        else {
                    ?>
                            <tr>
                                <td colspan="4" class="text-center">Sorry! No records found</td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>   
                      
		<?php	
        }
	}
	if(isset($_REQUEST['delete_agent_id'])) {
		$delete_agent_id = $_REQUEST['delete_agent_id'];
		$msg = "";
		if(!empty($delete_agent_id)) {	

			$product_rows = 0; $product_list = array();
			// $product_list = $obj->getTableRecords($GLOBALS['product_table'], 'category_id', $delete_agent_id);
			// if(!empty($product_list)) {
			// 	$product_rows = count($product_list);
			// }

			if(empty($product_rows)) {
				$category_unique_id = "";
				$category_unique_id = $obj->getTableColumnValue($GLOBALS['agent_table'], 'agent_id', $delete_agent_id, 'id');
				if(preg_match("/^\d+$/", $category_unique_id)) {
					$name = "";
					$name = $obj->getTableColumnValue($GLOBALS['agent_table'], 'agent_id', $delete_agent_id, 'name');
				
					$action = "";
					if(!empty($name)) {
						$action = "Agent Deleted. Name - ".$obj->encode_decode('decrypt', $name);
					}
				
					$columns = array(); $values = array();						
					$columns = array('deleted');
					$values = array("'1'");
					$msg = $obj->UpdateSQL($GLOBALS['agent_table'], $category_unique_id, $columns, $values, $action);
				}
			}
			else {
				$msg = "Unable to Delete";
			}
		}
		echo $msg;
		exit;	
	}        
    ?>