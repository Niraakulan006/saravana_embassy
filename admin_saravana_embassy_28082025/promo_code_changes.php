<?php
	include("include_files.php");
	if(isset($_REQUEST['show_promo_code_id'])) { 
        $show_promo_code_id = $_REQUEST['show_promo_code_id'];
        $name = ""; $price = 0; $expiry_date = ""; $minimum_order_amount = 0; $discount_upto_value = 0;
        if(!empty($show_promo_code_id)) {
            $discount_code_list = array();
			$discount_code_list = $obj->getTableRecords($GLOBALS['promo_code_table'], 'discount_code_id', $show_promo_code_id);
            if(!empty($discount_code_list)) {
                foreach($discount_code_list as $data) {
                    if(!empty($data['name'])) {
                        $name = $obj->encode_decode('decrypt', $data['name']);
						$name = htmlentities($name);
					}
                    if(!empty($data['price'])) {
                        $price = $data['price'];
					}
                    if(!empty($data['expiry_date']) && $data['expiry_date'] != $GLOBALS['default_date']) {
                        $expiry_date = date("d-m-Y", strtotime($data['expiry_date']));
					}
                    if(!empty($data['minimum_order_amount'])) {
                        $minimum_order_amount = $data['minimum_order_amount'];
					}
                    if(!empty($data['discount_upto_value'])) {
                        $discount_upto_value = $data['discount_upto_value'];
					}
                }
            }
		} 

        ?>
        <form class="poppins pd-20" name="promo_code_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<?php if(empty($show_promo_code_id)){ ?>
    						<div class="h5">Add Promo Code</div>
                        <?php } else {?>
    						<div class="h5">Edit Promo Code</div>
                        <?php }?>                        
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('promo_code.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_promo_code_id)) { echo $show_promo_code_id; } ?>">
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="name" value="<?php if(!empty($name)) { echo $name; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',15,1);" placeholder="" required>
                            <label>Promo Code</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="price" value="<?php if(!empty($price)) { echo $price; } ?>" value="" class="form-control shadow-none">
                            <label>Price</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="expiry_date" value="<?php if(!empty($expiry_date)) { echo $expiry_date; } ?>" class="form-control shadow-none date_field" placeholder="" required="">
                            <label>Expiry Date</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="minimum_order_amount" value="<?php if(!empty($minimum_order_amount)) { echo $minimum_order_amount; } ?>" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'number',8,'');" required="">
                            <label>Min Order Amt</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-4 col-6 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="discount_upto_value" value="<?php if(!empty($discount_upto_value)) { echo $discount_upto_value; } ?>" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'number',8,'');" required="">
                            <label>Discount Up To</label>
                        </div>
                    </div> 
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button" onClick="Javascript:SaveModalContent('promo_code_form', 'promo_code_changes.php', 'promo_code.php');">
                        Submit
                    </button>
                </div>
            </div>
        </form>
            <script type="text/javascript" src="include/js/bootstrap-datepicker.min.js"></script>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    if(jQuery('.date_field').length > 0) {
                    jQuery('.date_field').datepicker({
                        format: "dd-mm-yyyy",
                        autoclose: true,
                        startDate: "today"
                    });
                    }
                });    
            </script>

		<?php
    } 
    if(isset($_POST['name'])) {	
		$name = ""; $name_error = ""; $price = 0; $price_error = ""; $expiry_date = ""; $expiry_date_error = ""; $minimum_order_amount = 0;
        $minimum_order_amount_error = ""; $discount_upto_value = 0; $discount_upto_value_error = "";

		$valid_discount_code = ""; $form_name = "promo_code_form";
	
        $name = $_POST['name'];
		$name = trim($name);
        if(empty($name)) {
            $name_error = "Enter the name";
        }
        if(empty($name_error)) {
            if(strpos($name, '"') !== false || strpos($name, "'") !== false) {
                $name_error = "Invalid promotion code";
            }
        }
		if(!empty($name_error)) {
			$valid_discount_code = $valid->error_display($form_name, "name", $name_error, 'text');			
		}

        $price = $_POST['price'];
        $price = trim($price);
        $check_price = $price;
        if(!empty($check_price)) {
            $check_price = str_replace("%", "", $check_price);
        }
		$price_error = $valid->valid_price($check_price, "Price", "1");
		if(!empty($price_error)) {
			if(!empty($valid_discount_code)) {
				$valid_discount_code = $valid_discount_code." ".$valid->error_display($form_name, "price", $price_error, 'text');
			}
			else {
				$valid_discount_code = $valid->error_display($form_name, "price", $price_error, 'text');
			}
		}

        $expiry_date = $_POST['expiry_date'];
        $expiry_date = trim($expiry_date);
		$expiry_date_error = $valid->valid_date($expiry_date, "expiry date", "1");
		if(!empty($expiry_date_error)) {
			if(!empty($valid_discount_code)) {
				$valid_discount_code = $valid_discount_code." ".$valid->error_display($form_name, "expiry_date", $expiry_date_error, 'text');
			}
			else {
				$valid_discount_code = $valid->error_display($form_name, "expiry_date", $expiry_date_error, 'text');
			}
		}

        $minimum_order_amount = $_POST['minimum_order_amount'];
        $minimum_order_amount = trim($minimum_order_amount);
		$minimum_order_amount_error = $valid->valid_price($minimum_order_amount, "Min.order amount", "1");
		if(!empty($minimum_order_amount_error)) {
			if(!empty($valid_discount_code)) {
				$valid_discount_code = $valid_discount_code." ".$valid->error_display($form_name, "minimum_order_amount", $minimum_order_amount_error, 'text');
			}
			else {
				$valid_discount_code = $valid->error_display($form_name, "minimum_order_amount", $minimum_order_amount_error, 'text');
			}
		}

        if(!empty($price)) {
            if(strpos($price, '%') !== false) {
                $discount_upto_value = $_POST['discount_upto_value'];
                $discount_upto_value = trim($discount_upto_value);
                $discount_upto_value_error = $valid->valid_price($discount_upto_value, "Discount upto value", "1");
                if(!empty($discount_upto_value_error)) {
                    if(!empty($valid_discount_code)) {
                        $valid_discount_code = $valid_discount_code." ".$valid->error_display($form_name, "discount_upto_value", $discount_upto_value_error, 'text');
                    }
                    else {
                        $valid_discount_code = $valid->error_display($form_name, "discount_upto_value", $discount_upto_value_error, 'text');
                    }
                }
            }
        }

		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}
        $access_error = "";
        if(!empty($login_staff_id)) {
			if(!empty($edit_id)) {
				$permission_module = $GLOBALS['promo_code_module'];
				$permission_action = $edit_action;
				include('permission_action.php');
			}
			else {    
				$permission_module = $GLOBALS['promo_code_module'];
				$permission_action = $add_action;
				include('permission_action.php');
			}
        }
		
		$result = "";
		
		if(empty($valid_discount_code) && empty($access_error)) {
			$check_user_id_ip_address = "";
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
				
                $lower_case_name = "";
				if(!empty($name)) {
                    $lower_case_name = $obj->encode_decode('encrypt', strtolower($name));
					$name = $obj->encode_decode('encrypt', $name);
				}

                if(!empty($expiry_date)) {
                    $expiry_date = date("Y-m-d", strtotime($expiry_date));
                }
                
				$prev_discount_code_id = ""; $discount_code_error = "";			
				if(!empty($lower_case_name)) {
                    $prev_discount_code_id = $obj->getTableColumnValue($GLOBALS['promo_code_table'], 'lower_case_name', $lower_case_name, 'discount_code_id');
                    if(!empty($prev_discount_code_id)) {
                        $discount_code_error = "This discount code already exist";
                    }
                }
				
				if(empty($edit_id)) {
					if(empty($prev_discount_code_id)) {
						$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
                        $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
						
						$action = "";
						if(!empty($name)) {
							$action = "New Promotion Code Created. Name - ".str_replace("$", '"', $obj->encode_decode('decrypt', $name));
						}

						$null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name', 'discount_code_id', 'name', 'lower_case_name', 'price', 'expiry_date', 'minimum_order_amount', 'discount_upto_value', 'deleted');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'", "'".$price."'", "'".$expiry_date."'", "'".$minimum_order_amount."'", "'".$discount_upto_value."'", "'0'");
						$discount_code_insert_id = $obj->InsertSQL($GLOBALS['promo_code_table'], $columns, $values,'discount_code_id','', $action);						
						if(preg_match("/^\d+$/", $discount_code_insert_id)) {
                            $result = array('number' => '1', 'msg' => 'Promotion Code Successfully Created');					
						}
						else {
							$result = array('number' => '2', 'msg' => $discount_code_insert_id);
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $discount_code_error);
					}
				}
				else {
					if(empty($prev_discount_code_id) || $prev_discount_code_id == $edit_id) {
						$getUniqueID = "";
						$getUniqueID = $obj->getTableColumnValue($GLOBALS['promo_code_table'], 'discount_code_id', $edit_id, 'id');
						if(preg_match("/^\d+$/", $getUniqueID)) {
							$action = "";
							if(!empty($name)) {
								$action = "Promotion Code Updated. Name - ".str_replace("$", '"', $obj->encode_decode('decrypt', $name));
							}
						
							$columns = array(); $values = array();						
							$columns = array('name', 'lower_case_name', 'price', 'expiry_date', 'minimum_order_amount', 'discount_upto_value');
							$values = array("'".$name."'", "'".$lower_case_name."'", "'".$price."'", "'".$expiry_date."'", "'".$minimum_order_amount."'", "'".$discount_upto_value."'");
							$discount_code_update_id = $obj->UpdateSQL($GLOBALS['promo_code_table'], $getUniqueID, $columns, $values, $action);
							if(preg_match("/^\d+$/", $discount_code_update_id)) {			
								$result = array('number' => '1', 'msg' => 'Updated Successfully');						
							}
							else {
								$result = array('number' => '2', 'msg' => $discount_code_update_id);
							}							
						}
					}
					else {
						$result = array('number' => '2', 'msg' => $discount_code_error);
					}
                }

			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
        else {
            if(!empty($valid_discount_code)) {
			    $result = array('number' => '3', 'msg' => $valid_discount_code);
            }
            else if(!empty($access_error)) {
			    $result = array('number' => '2', 'msg' => $access_error);
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
			$permission_module = $GLOBALS['promo_code_module'];
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
            $total_records_list = $obj->getTableRecords($GLOBALS['promo_code_table'], '', '');

            if(!empty($search_text)) {
                $search_text = strtolower($search_text);
                $list = array();
                if(!empty($total_records_list)) {
                    foreach($total_records_list as $val) {
                        if(strpos(strtolower($obj->encode_decode('decrypt', $val['name'])), $search_text) !== false) {
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
                foreach($total_records_list as $key => $val) {
                    if($key >= $page_start && $key < $page_end) {
                        $show_records_list[] = $val;
                    }
                }
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
                        <th>Promo Code</th>
                        <th>Price</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($show_records_list)) {
                            foreach($show_records_list as $key => $data) {
                                $discount_code_name = "";
                                if(!empty($data['name'])) {
                                    $discount_code_name = $obj->encode_decode('decrypt', $data['name']);
                                    $discount_code_name = str_replace("$", '"', $discount_code_name);
                                    $discount_code_name = trim($discount_code_name);
                                }

                                $current_date = date("Y-m-d"); $show_view_edit = 0;
                                if(!empty($data['expiry_date']) && $data['expiry_date'] != $GLOBALS['default_date']) {
                                    if(strtotime($current_date) <= strtotime($data['expiry_date'])) {
                                        $show_view_edit = 1;
                                    }
                                }
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td>
                            <div class="w-100">
                                <?php if(!empty($discount_code_name)) { echo $discount_code_name; } ?>
                            </div>
                            
                            <?php
                                if(!empty($data['creator_name'])) {
                                    $data['creator_name'] = $obj->encode_decode('decrypt', $data['creator_name']);
                            ?>
                                    <small><?php echo "creator : ".$data['creator_name']; ?></small>
                            <?php		
                                }
                            ?>
                        </td>
                        <td>
                            <?php if(!empty($data['price'])) { echo $data['price']; } ?>                            
                        </td>
                        <td>
                            <?php if(!empty($data['expiry_date']) && $data['expiry_date'] != $GLOBALS['default_date']) { echo date("d-m-Y", strtotime($data['expiry_date'])); } ?>
                        </td>
                        <td>
                            <?php if(!empty($show_view_edit) && $show_view_edit == 1) { ?>
                                <div class="dropdown">
                                    <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['discount_code_id'])) { echo $data['discount_code_id']; } ?>');"><i class="fa fa-pencil"></i> Edit</a></li>
                                    </ul>
                                </div> 
                            <?php } ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                        </td>
                    </tr>
                    <?php } 
                    }else {
                     ?>
                        <tr>
                            <td colspan="5" class="text-center">Sorry! No records found</td>
                        </tr>
                     <?php } ?>
                </tbody>
            </table>                 
		<?php	
        }
	}
    ?>