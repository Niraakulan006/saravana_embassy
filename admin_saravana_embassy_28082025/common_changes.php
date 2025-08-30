<?php
	include("include_files.php");

	if(isset($_REQUEST['get_city'])) {
		$district = $_REQUEST['get_district'];

		if(!empty($district))
		{
			$district = $obj->encode_decode("encrypt",$district);
		}

		$city = ""; $list = array();

		$list = $obj->getOtherCityList($district);
		foreach($list as $data) {
			if(!empty($data['city'])) {
				$data['city'] = $obj->encode_decode("decrypt",$data['city']);
				if(!empty($city)) {
					$city = $city.",".trim($data['city']);
				}
				else {
					$city = $data['city'];
				}
			}	
		}
		if(!empty($city)) {
			echo trim($city);
		}
		exit;
	}
	
	if(isset($_REQUEST['others_city'])) {
		$other_city = $_REQUEST['others_city'];
		$selected_district_index = $_REQUEST['selected_district'];
		$form_name = $_REQUEST['form_name'];

		if($other_city == '1')
		{ 
			?>
			<div class="form-group">
				<div class="form-label-group in-border">
					<input type="text" id="others_city" name="others_city" class="form-control shadow-none" value="" onkeydown="Javascript:KeyboardControls(this,'text',30,1);">
					<label>Others city <span class="text-danger">*</span></label>
				</div>
				<div class="new_smallfnt">Text Only (Max Char : 30)</div>
			</div>
			<?php 
		}
	}
    
	if(isset($_REQUEST['view_party_details'])) {
        $type_id = $_REQUEST['view_party_details'];
        $type_id = trim($type_id);
        $type = $_REQUEST['details_type'];
        $type = trim($type);
        $details_list = array();
        if(!empty($type)) {
            $details_list = $obj->getTableRecords($GLOBALS[$type.'_table'], $type.'_id', $type_id, '');
			if(!empty($details_list)) {
				foreach($details_list as $data) {
					if(!empty($data[$type.'_name']) && $data[$type.'_name'] != $GLOBALS['null_value']) {
						$name = $obj->encode_decode('decrypt', $data[$type.'_name']);
					}
					if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
						$address = $obj->encode_decode('decrypt', $data['address']);
					}
					if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
						$city = $obj->encode_decode('decrypt', $data['city']);
					}
					if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
						$district = $obj->encode_decode('decrypt', $data['district']);
					}
					if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
						$state = $obj->encode_decode('decrypt', $data['state']);
					}
					if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
						$pincode = $obj->encode_decode('decrypt', $data['pincode']);
					}
					if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
						$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
					}
					if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
						$email = $obj->encode_decode('decrypt', $data['email']);
					}
					if(!empty($data['identification']) && $data['identification'] != $GLOBALS['null_value']) {
						$identification = $obj->encode_decode('decrypt', $data['identification']);
					}
				}	
			}

			?>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>Name </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($name)){ echo ": " .$name; }?> </div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>Phone Number </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($mobile_number)){ echo ": " .$mobile_number; }?> </div>
				</div>
			</div>
			<?php if(!empty($email) && ($email != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Email </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($email)){ echo ": " .$email; }?> </div>
					</div>
				</div> <?php
			} ?>
			<?php if(!empty($address) && ($address != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Address </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($address)){ echo ": " .$address; }?> </div>
					</div>
				</div> <?php
			} 
			if(!empty($city) && ($city != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>City </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($city)){ echo ": " .$city; }?> </div>
					</div>
				</div> <?php
			} ?>
			<?php if(!empty($district) && ($district != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>District </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($district)){ echo ": " .$district; }?> </div>
					</div>
				</div> <?php
			} ?>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-lg-12 col-xl-12 d-flex">
					<div class="col-lg-4 col-xl-4 col-sm-6"><b>State </b></div>
					<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($state)){ echo ": " .$state; }?> </div>
				</div>
			</div>
			<?php if(!empty($identification) && ($identification != 'NULL')){ ?>
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-lg-12 col-xl-12 d-flex">
						<div class="col-lg-4 col-xl-4 col-sm-6"><b>Identification </b></div>
						<div class="col-lg-8 col-xl-8 col-sm-6" style="margin: 0 -35px;"><?php if(!empty($identification)){ echo ": " .$identification; }?> </div>
					</div>
				</div> <?php
			}  
		
        }
    }
	// if(isset($_REQUEST['view_details'])) {
	// 	$view_details = $_REQUEST['view_details'];
	// 	$type = $_REQUEST['type']; 
	
	// 	$party_details = [];
	
	// 	if (!empty($view_details) && !empty($type)) {
			
	// 		$party_list = $obj->getTableRecords($GLOBALS['party_table'], 'party_id', $view_details,'');
	// 		$name ="";$mobile_number ="";$email = "";$address = "";$state ="";$city = "";$identification ="";
	// 		if (!empty($party_list)) {
	// 			foreach ($party_list as $data) {
				   
	// 				if (($type == '1' && $data['party_type'] == 1 || $data['party_type'] == 3 ) || ($type == '2' && $data['party_type'] == 2) || $data['party_type'] == 3) {
						
	// 					if(!empty($data['party_name']) && $data['party_name'] !=$GLOBALS['null_value']) {
	// 					    $name = $obj->encode_decode('decrypt', $data['party_name']);
	// 					}
	// 					if(!empty($data['mobile_number']) && $data['mobile_number'] !=$GLOBALS['null_value']) {
	// 					$mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
	// 					}
	// 					if(!empty($data['email']) && $data['email'] !=$GLOBALS['null_value']) {

	// 					$email = $obj->encode_decode('decrypt', $data['email']);
	// 					}
	// 					if(!empty($data['address']) && $data['address'] !=$GLOBALS['null_value']) {

	// 					$address = $obj->encode_decode('decrypt', $data['address']);
	// 					}
	// 					if(!empty($data['state']) && $data['state'] !=$GLOBALS['null_value']) {

	// 					$state = $obj->encode_decode('decrypt', $data['state']);
	// 					}
	// 					if(!empty($data['city']) && $data['city'] !=$GLOBALS['null_value']) {

	// 					$city = $obj->encode_decode('decrypt', $data['city']);
	// 					}
	// 					if(!empty($data['identification']) && $data['identification'] !=$GLOBALS['null_value']) {

	// 					$identification = $obj->encode_decode('decrypt', $data['identification']);
	// 					}
	
	// 				   $party_details = [
	// 						'name' => $name,
	// 						'mobile_number' => $mobile_number,
	// 						'email' => $email,
	// 						'address' => $address,
	// 						'city' => $city,
	// 						'state' => $state,
	// 						'identification' => $identification
	// 					];
						
	// 					break; 
	// 				}
	// 			}
	// 		}
	// 	}
	
	   
	// 	if (!empty($party_details)) {
	// 		echo json_encode($party_details);
	// 	}
	// 	exit;
	// }

	if(isset($_REQUEST['view_details'])) {
        $type_id = $_REQUEST['view_details'];
        $type_id = trim($type_id);
        $type = $_REQUEST['type'];
        $type = trim($type);
        $details_list = array();
        if(!empty($type)) {
            $details_list = $obj->getTableRecords($GLOBALS['party_table'],'party_id', $type_id, '');
			if(!empty($details_list)) {
				?>
				<div class="col-12 table-responsive">
					<table class="table table-bordered table-striped nowrap cursor text-center smallfnt" style="font-size:15px;">
						<tbody>
							<?php
								foreach($details_list as $data) {
									if(!empty($data[$type.'_name']) && $data[$type.'_name'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Name</td>
											<td class="text-center px-2 py-2">
												<?php echo html_entity_decode($obj->encode_decode('decrypt', $data[$type.'_name'])); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Address</td>
											<td class="text-center px-2 py-2">
												<?php echo html_entity_decode($obj->encode_decode('decrypt', $data['address'])); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">City</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['city']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">District</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['district']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">State</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['state']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Pincode</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['pincode']); ?>
											</td>
										</tr>
										<?php
									}
									if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Mobile No.</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['mobile_number']); ?>
											</td>
										</tr>
										<?php
									}
									if($type != "suspense_party") {
										if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
											?>
											<tr>
												<td class="text-center px-2 py-2">Email</td>
												<td class="text-center px-2 py-2">
													<?php echo $obj->encode_decode('decrypt', $data['email']); ?>
												</td>
											</tr>
											<?php
										}
									}
									if($type != "suspense_party") {
										if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
											?>
											<tr>
												<td class="text-center px-2 py-2">GST No.</td>
												<td class="text-center px-2 py-2">
													<?php echo $obj->encode_decode('decrypt', $data['gst_number']); ?>
												</td>
											</tr>
											<?php
										}
									}
									if(!empty($data['identification']) && $data['identification'] != $GLOBALS['null_value']) {
										?>
										<tr>
											<td class="text-center px-2 py-2">Identification</td>
											<td class="text-center px-2 py-2">
												<?php echo $obj->encode_decode('decrypt', $data['identification']); ?>
											</td>
										</tr>
										<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
				<?php
			}
        }
    }
	
	if(isset($_REQUEST['get_agent_party_id'])){
		$agent_id = $_REQUEST['get_agent_party_id'];

		if(!empty($agent_id) && $agent_id !=$GLOBALS['null_value']){
			// $agent_party_list = $obj->getAgentPartyList($agent_id,'1');

			?><option value="">Select</option><?php
			if(!empty($agent_party_list))
			{
				foreach($agent_party_list as $data)
				{
					?>
						<option value="<?php if(!empty($data['party_id'])){ echo $data['party_id']; }?>"><?php if(!empty($data['name_mobile_city'])){ echo $obj->encode_decode("decrypt",$data['name_mobile_city']); }?></option>
					<?php
				}
			}
		}else{
			$agent_party_list = $obj->getPartyList('Purchase');
			?>
			<option value="">Select</option><?php
			if(!empty($agent_party_list))
			{
				foreach($agent_party_list as $data)
				{
					?>
						<option value="<?php if(!empty($data['party_id'])){ echo $data['party_id']; }?>"><?php if(!empty($data['name_mobile_city'])){ echo $obj->encode_decode("decrypt",$data['name_mobile_city']); }?></option>
					<?php
				}
			}
		}
	}

	if(isset($_REQUEST['change_party'])) {
		$form_name = $_REQUEST['form_name'];
		if($form_name !='purchase_invoice_form' && $form_name != 'purchase_order_form' && $form_name != 'undefined'){
			$party_list = array();
			$party_list = $obj->getPartyList('Sales'); ?>

            <option value="">Select Party</option>
			<?php
				if(!empty($party_list)) {
					foreach($party_list as $data) {
					?>
						<option value="<?php if(!empty($data['party_id'])) { echo $data['party_id']; } ?>" <?php if(!empty($party_id) && $data['party_id'] == $party_id) { ?> selected <?php } ?> >
							<?php
								if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
									echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
								}
							?>
						</option>
					<?php
					}
				}
			?>

		<?php }else{
			$party_list = array();
			$party_list = $obj->getPartyList('Purchase'); ?>

			<option value="">Select Party</option>
			<?php
				if(!empty($party_list)) {
					foreach($party_list as $data) {
			?>
						<option value="<?php if(!empty($data['party_id'])) { echo $data['party_id']; } ?>" <?php if(!empty($party_id) && $data['party_id'] == $party_id) { ?> selected <?php } ?> >
							<?php
								if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
									echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
								}
							?>
						</option>
			<?php
					}
				}
			
		}
	}
	if(isset($_REQUEST['change_product'])) {
		$product_list = array();
		$product_list = $obj->getTableRecords($GLOBALS['item_table'], 'bill_company_id', $GLOBALS['bill_company_id'],'');
		
		?>
		<option value="">Select</option>
		<?php
		if(!empty($product_list)) {
			foreach($product_list as $data) {
				if(!empty($data['item_id']) && $data['item_id'] != $GLOBALS['null_value']) {
					?>
					<option value="<?php echo $data['item_id']; ?>">
						<?php
							if(!empty($data['item_name']) && $data['item_name'] != $GLOBALS['null_value']) {
								echo $obj->encode_decode('decrypt', $data['item_name'])." - ".$data['product_code'];
							}
						?>
					</option>
					<?php
				}
			}
		}
	}

	if(isset($_REQUEST['same_as_party_address'])) {
        $party_id = $_REQUEST['same_as_party_address'];
        $party_id = trim($party_id);

        $address = ""; $city = ""; $pincode = ""; $district = ""; $state = ""; $delivery_address = "";
        $party_list = array();
        $party_list = $obj->getTableRecords($GLOBALS['party_table'], 'party_id', $party_id, '');
        if(!empty($party_list)) {
            foreach($party_list as $data) {
                if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
                    $address = $obj->encode_decode('decrypt', $data['address']);
                    $delivery_address = $address;
                }
                if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
                    $city = $obj->encode_decode('decrypt', $data['city']);
                    if(!empty($delivery_address)) {
                        $delivery_address = $delivery_address."\n".$city;
                    }
                    else {
                        $delivery_address = $city;
                    }
                }
                if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
                    $pincode = $obj->encode_decode('decrypt', $data['pincode']);
                    if(!empty($delivery_address) && !empty($city)) {
                        $delivery_address = $delivery_address." - ".$pincode;
                    }
                }
                if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
                    $district = $obj->encode_decode('decrypt', $data['district']);
                    if(!empty($delivery_address)) {
                        $delivery_address = $delivery_address."\n".$district." (Dist.)";
                    }
                    else {
                        $delivery_address = $district;
                    }
                }
                if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
                    $state = $obj->encode_decode('decrypt', $data['state']);
                    if(!empty($delivery_address)) {
                        $delivery_address = $delivery_address."\n".$state;
                    }
                    else {
                        $delivery_address = $state;
                    }
                }
            }
        }
        echo $delivery_address;
    }

	if(isset($_REQUEST['unit_id'])){
		$unit_id = "";
		$unit_id = $_REQUEST['unit_id'];

		$unit_list = array();
        $unit_list = $obj->getTableRecords($GLOBALS['unit_table'], '','','');
       
		if(!empty($unit_list)){ ?>
			<option value="">Select</option>
			<?php 
			foreach($unit_list as $data){
				if($data['unit_id'] != $unit_id){
					 ?>

					<option value="<?php if(!empty($data['unit_id'])) { echo $data['unit_id']; } ?>">
						<?php
							if(!empty($data['unit_name'])) {
								$data['unit_name'] = $obj->encode_decode('decrypt', $data['unit_name']);
								echo $data['unit_name'];
							}
						?>
					</option>

				<?php }
				
			} ?>
			<?php 
		}
	}  


	if(isset($_REQUEST['get_filter_category']))
    {
        $get_filter_category = $_REQUEST['get_filter_category'];
        $category_id = $_REQUEST['filter_category_id'];
        
        $subcategory_list =array();
        $subcategory_list = $obj->getTableRecords($GLOBALS['subcategory_table'],'category_id',$category_id,'');
        if(!empty($subcategory_list)){ ?>
            <option value="">Select Sub Category</option>
            <?php
            if (!empty($subcategory_list)) {
                foreach ($subcategory_list as $data) {
                    if (!empty($data['subcategory_id'])) {
                        ?>
                        <option value="<?php echo $data['subcategory_id']; ?>" <?php if (!empty($subcategory_id) && $data['subcategory_id'] == $subcategory_id) { ?>selected<?php } ?>>
                            <?php
                            if (!empty($data['subcategory_name'])) {
                                $data['subcategory_name'] = $obj->encode_decode('decrypt', $data['subcategory_name']);
                                echo $data['subcategory_name'];
                            }
                            ?>

                        </option>
                        <?php
                    }
                }
            }
            ?>
        <?php } else { ?>
            <option value="">Select Sub Category</option>
        <?php }
    }
	if(isset($_REQUEST['chartdata'])){
        $from_date = $_POST['from_date'] ?? '';
        $to_date = $_POST['to_date'] ?? '';
        $party_id = $_POST['party_id'] ?? '';

        $chart_data = $obj->getChartDetails($from_date, $to_date, $party_id);

        $bill_count = [];
        $bill_type = [];
        $bill_value = [];

        foreach ($chart_data as $data) {
            $bill_type[] = $data['bill_type'];
            $bill_count[] = $data['bill_count'];
            $bill_value[] = $data['bill_value'];
        }

        echo json_encode([
            'labels' => $bill_type,
            'data' => $bill_count,
            'values' => $bill_value
        ]);  
    }
    if(isset($_REQUEST['Linechartdata']))
    {
        $from_date = $_POST['from_date'] ?? '';
        $to_date = $_POST['to_date'] ?? '';
        $party_id = $_POST['party_id'] ?? '';

        $chart_list = $obj->getLineChartDetails($from_date, $to_date, $party_id);

        // $bill_count = [];
        // $bill_type = [];
        // $bill_value = [];

        // foreach ($chart_data as $data) {
        //     $bill_type[] = $data['bill_type'];
        //     $bill_count[] = $data['bill_count'];
        //     $bill_value[] = $data['bill_value'];
        // }

		$bill_party_id =array(); $bill_party_name=array(); $pending_value =array();
		foreach($chart_list as $data)
		{
			// echo $data['credit']."hello".$data['debit'];
			// if($data['credit'] < $data['debit'])
			// {
				$balance= $data['credit'] - $data['debit'];
				// $balance=str_replace("-","",)
				if(!empty($data['party_id']))
				{
					$bill_party_id[] = $data['party_id'];
				}
				if(!empty($data['party_name']) && $data['party_name'] != $GLOBALS['null_value'])
				{
					$bill_party_name[] = $obj->encode_decode("decrypt",$data['party_name']);
				}
				$pending_value[] = $balance;
			// }
		}
		
        echo json_encode([
            'labels' => $bill_party_name,
            'data' => $pending_value,
            'values' => $bill_party_name,
        ]);  
    }

	// if (isset($_GET['get_sales_chart'])) {
    //     $from_date = $_GET['from_date'] ?? '';
    //     $to_date = $_GET['to_date'] ?? '';		
	// 	$bill_values = [];
	// 	$chart_data = $obj->getSalesChartDetails($from_date,$to_date);
	// 	 $data = [['Dates', 'Total Bills', 'Total Value']];
	// 	foreach ($chart_data as $row) {
	// 		$data[] = [
	// 			$row['bill_day'],
	// 			(int)$row['bill_count'],
	// 			(float)$row['bill_value']
	// 		];
	// 	}

	// 	echo json_encode(['success' => true, 'data' => $data]);
	// 	exit;
	// }
	// if(isset($_GET['get_product_chart'])){
	// 	$from_date = $_GET['from_date'] ?? '';
	// 	$to_date = $_GET['to_date'] ?? '';
	// 	$product_id = $_GET['product_id'] ?? '';

	// 	if (empty($product_id)) {
	// 		echo json_encode(['success' => false, 'message' => 'No product selected']);
	// 		exit;
	// 	}		

	// 	$chart_data = $obj->getProductsChartDetails($from_date, $to_date, $product_id);
	// 	$data = [['Date', 'Sales Count']];

	// 	foreach ($chart_data as $row) {
	// 		if ($row['product_date'] != $GLOBALS['null_value']) {
	// 			$date_parts = explode('-', $row['product_date']);
	// 			$year = (int)$date_parts[0];
	// 			$month = (int)$date_parts[1] - 1;
	// 			$day = (int)$date_parts[2];
	// 			$data[] = [ ["Date($year, $month, $day)"], (int)$row['product_count'] ];
	// 		}
	// 	}

	// 	echo json_encode(['success' => true, 'data' => $data]);
	// 	exit;
	// }

	
if(isset($_REQUEST['get_party_id'])) {
    $party_id = $_REQUEST['get_party_id'];
    $party_id = trim($party_id);

    $list = array();
    $list = $obj->getPendingList($party_id);

    $party_name = ""; $opening_balance = 0; $opening_balance_type = "";
   
	$party_name = $obj->getTableColumnValue($GLOBALS['party_table'], 'party_id', $party_id, 'name_mobile_city');
	$party_name = $obj->encode_decode('decrypt', $party_name);
	$opening_balance = $obj->getTableColumnValue($GLOBALS['party_table'], 'party_id', $party_id, 'opening_balance');
	$opening_balance_type = $obj->getTableColumnValue($GLOBALS['party_table'], 'party_id', $party_id, 'opening_balance_type');
    
    $current_balance = 0; $current_type = "";
    ?>
    <div class="col-12">
        <table class="table table-bordered nowrap cursor text-center smallfnt table-striped" style="font-size:15px; margin-bottom: 20px;">
            <thead class="fs-15 fw-bold" style="background-color: #279cf2">
                <tr>
                    <th>#</th>
                    <th>Bill No<br>Date</th>
                    <th>Bill Type</th>
                    <th>Particulars</th>
                    <th>Credit</th>
                    <th>Debit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $total_credit = 0; $total_debit = 0;
                    if(!empty($opening_balance) && $opening_balance != $GLOBALS['null_value']) {
                        ?>
                        <tr>
                            <td colspan="4" class="text-end text-primary" style="font-weight:bold;">
                                Opening Balance
                            </td>
                            <td class="text-end text-success">
                                <?php
                                    if($opening_balance_type == 'Credit') {
                                        $total_credit += $opening_balance;
                                        echo $obj->numberFormat($opening_balance,2).'&nbsp';
                                    }
                                    else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            <td class="text-end text-danger">
                                <?php
                                    if($opening_balance_type == 'Debit') {
                                        $total_debit += $opening_balance;
                                        echo $obj->numberFormat($opening_balance,2).'&nbsp';
                                    }
                                    else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    
                    $s_no = 1;
                    if(!empty($list)){
                        $prev_bill_number = "";
                        foreach($list as $data){ ?>
                            <tr>
                                <td class="text-center px-2 py-2">
                                    <?php echo $s_no; ?>
                                </td>
                                <td class="text-center px-2 py-2">
                                    <?php
                                        if(!empty($data['bill_number']) && $data['bill_number'] != $GLOBALS['null_value']){
                                            $bill_number = $data['bill_number'];
                                            echo $bill_number;
                                        } else {
                                            echo " - ";
                                        }
                                        
                                        if(!empty($data['bill_date']) && $data['bill_date'] != $GLOBALS['null_value']){
                                            echo "<br>";
                                            echo date('d-m-Y', strtotime($data['bill_date']));
                                        } else {
                                            echo " - ";
                                        }
                                        
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if(!empty($data['bill_type']) && $data['bill_date'] != $GLOBALS['null_value']){
                                            echo $data['bill_type']."<br>";?>

											<span style="font-size:12px;cursor:pointer;" onclick="Javascript:PaymentModalContent('<?php if(!empty($data['bill_id']) && $data['bill_id'] != $GLOBALS['null_value']) { echo $data['bill_id']; } ?>', '<?php if(!empty($data['bill_type']) && $data['bill_type'] != $GLOBALS['null_value']) { echo $data['bill_type']; } ?>')">
												<i class="bi bi-info-circle" title="print preview"></i>
											</span>
                                        <?php }  else {
                                            echo " - ";
                                        }
									?>
                                </td>
                                <td>
                                    <?php
                                        $detail = "";
                                        if (!empty($data['payment_mode_name']) && $data['payment_mode_name'] != $GLOBALS['null_value']) {
                                            $detail .= $obj->encode_decode('decrypt', $data['payment_mode_name']);
                                        }
                                        if (!empty($data['bank_name']) && $data['bank_name'] != 'NULL') {
                                            $detail .= " - (" . $obj->encode_decode('decrypt', $data['bank_name']) . ")";
                                        }

                                        echo $detail;
                                    ?>
                                </td>
                                <td class="text-end text-success">
                                    <?php
                                        if(!empty($data['credit']) && $data['credit'] != $GLOBALS['null_value']) {
                                            $total_credit += $data['credit'];
                                            echo $obj->numberFormat($data['credit'],2).'&nbsp';
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td class="text-end text-danger">
                                    <?php
                                        if(!empty($data['debit'] && $data['debit'] != $GLOBALS['null_value'])) {
                                            $total_debit += $data['debit'];
                                            echo $obj->numberFormat($data['debit'],2).'&nbsp';
                                        }
                                        else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            if($prev_bill_number != $data['bill_number']){
                                $s_no++;
                            }
                            
                            $prev_bill_number = $data['bill_number'];
                        }
                        
                    }
                    else { ?>
                        <tr>
                            <td colspan="6" class="text-center">Sorry! No records found</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <?php
                            if($total_credit > $total_debit) {
                                $current_balance = $total_credit - $total_debit;
                                $current_type = " Cr";
                            }
                            else if($total_credit < $total_debit) {
                                $current_balance = $total_debit - $total_credit;
                                $current_type = " Dr";
                            }
                        ?>
                        <?php if(!empty($total_credit) || (!empty($total_debit))){ ?>
							
							<?php if($current_type ==' Cr'){ ?>
								<td class="text-success" colspan="6" style="font-weight:bold;">
									Current Balance : 
									<?php
										echo $obj->numberFormat($current_balance,2).$current_type;
									?>
								</td>
							<?php }else{ ?>
								<td class="text-danger" colspan="6" style="font-weight:bold;">
									Current Balance : 
									<?php
										echo $obj->numberFormat($current_balance,2).$current_type;
									?>
								</td>
                        <?php }
						} ?>
                    </tr>
            </tbody>
        </table>
		<script>
		   function PaymentModalContent(bill_id, type) {
			var url = "";
			bill_id = bill_id.trim();
			type = type.trim();

			if (type == 'Receipt') {
				url = "reports/rpt_receipt_a5.php?view_receipt_id=" + bill_id;
			} else if (type == 'Voucher') {
				url = "reports/rpt_voucher_a5.php?view_voucher_id=" + bill_id;
			} else if (type == 'Sales Invoice') {
				url = "reports/rpt_sales_invoice_a4.php?view_sales_invoice_id=" + bill_id;
			} else if (type == 'Debit Invoice') {
				url = "reports/rpt_debit_invoice_a4.php?view_debit_invoice_id=" + bill_id;
			} else if (type == 'Purchase Invoice Return') {
				url = "reports/rpt_debit_note_a4.php?view_debit_note_id=" + bill_id;
			} else if (type == 'Purchase Invoice') {
				url = "reports/rpt_purchase_invoice_a4.php?view_purchase_invoice_id=" + bill_id;
			}

			window.open(url, '_blank');
		}

		</script>
    </div>
    <?php
    echo "$$$".$party_name." <span class='text-center text-danger'>(Balance : ".($obj->numberFormat($current_balance,2).$current_type).")</span>"; 
}

    if(isset($_REQUEST['update_party'])) {
		$party_id = $_REQUEST['update_party'];
		$form_name = $_REQUEST['form_names'];
		if($form_name !='purchase_invoice_form' && $form_name != 'purchase_order_form' && $form_name != 'undefined'){
			$party_list = array();
			$party_list = $obj->getPartyList('Sales'); ?>

            <option value="">Select Party</option>
			<?php
				if(!empty($party_list)) {
					foreach($party_list as $data) {
					?>
						<option value="<?php if(!empty($data['party_id'])) { echo $data['party_id']; } ?>" <?php if(!empty($party_id) && $data['party_id'] == $party_id) { ?> selected <?php } ?> >
							<?php
								if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
									echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
								}
							?>
						</option>
					<?php
					}
				}
			?>

		<?php }else{
			$party_list = array();
			$party_list = $obj->getPartyList('Purchase'); ?>

			<option value="">Select Party</option>
			<?php
				if(!empty($party_list)) {
					foreach($party_list as $data) {
			?>
						<option value="<?php if(!empty($data['party_id'])) { echo $data['party_id']; } ?>" <?php if(!empty($party_id) && $data['party_id'] == $party_id) { ?> selected <?php } ?> >
							<?php
								if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
									echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
								}
							?>
						</option>
			<?php
					}
				}
			
		}
	}

	if (isset($_GET['get_sales_chart'])) {
        $from_date = $_GET['from_date'] ?? '';
        $to_date = $_GET['to_date'] ?? '';		
		$bill_values = [];
		$chart_data = $obj->getSalesChartDetails($from_date,$to_date);
		 $data = [['Dates', 'Total Bills', 'Total Value']];
		foreach ($chart_data as $row) {
			$data[] = [
				$row['bill_day'],
				(int)$row['bill_count'],
				(float)$row['bill_value']
			];
		}

		echo json_encode(['success' => true, 'data' => $data]);
		exit;
	}
	
	if(isset($_GET['get_product_chart'])){
		$from_date = $_GET['from_date'] ?? '';
		$to_date = $_GET['to_date'] ?? '';
		$product_id = $_GET['product_id'] ?? '';

		if (empty($product_id)) {
			echo json_encode(['success' => false, 'message' => 'No product selected']);
			exit;
		}		

		$chart_data = $obj->getProductsChartDetails($from_date, $to_date, $product_id);
		$data = [['Date', 'Sales Count']];

		// foreach ($chart_data as $row) {
		// 	if ($row['product_date'] != $GLOBALS['null_value']) {
		// 		$date_parts = explode('-', $row['product_date']);
		// 		$year = (int)$date_parts[0];
		// 		$month = (int)$date_parts[1] - 1;
		// 		$day = (int)$date_parts[2];
		// 		$data[] = [ ["Date($year, $month, $day)"], (int)$row['product_count'] ];
		// 	}
		// }
		$start = strtotime($from_date);
		$end = strtotime($to_date);

		for ($d = $start; $d <= $end; $d = strtotime("+1 day", $d)) {
			$dayKey = date("Y-m-d", $d);
			$labels[] = date("d-M", $d);

			$chart_data = $obj->getProductsChartDetails($dayKey, '', $product_id);
			if (!empty($chart_data)) {
				if ($chart_data[0]['product_date'] != $GLOBALS['null_value']) {
					$date_parts = explode('-', $chart_data[0]['product_date']);
					$year = (int)$date_parts[0];
					$month = (int)$date_parts[1] - 1;
					$day = (int)$date_parts[2];
					$data[] = [ ["Date($year, $month, $day)"], (int)$chart_data[0]['product_count'] ];
				}
			} else {
				$date_parts = explode('-', $dayKey);
				$year = (int)$date_parts[0];
				$month = (int)$date_parts[1] - 1;
				$day = (int)$date_parts[2];
				$data[] = [ ["Date($year, $month, $day)"], 0];
			}
		}
		echo json_encode(['success' => true, 'data' => $data]);
		exit;
	}

	if(isset($_GET['get_top_product_chart'])){
		$from_date = $_GET['from_date'] ?? '';
		$to_date = $_GET['to_date'] ?? '';

		$chart_data = $obj->getTopProductList($from_date,$to_date);
		$data = array();
		
		foreach ($chart_data as $row) {
			if ($row['product_id'] != $GLOBALS['null_value']) {
				$product_name = $obj->getTableColumnValue($GLOBALS['item_table'],'item_id',$row['product_id'],'item_name');
				if(!empty($product_name))
				{
					$product_name = $obj->encode_decode("decrypt",$product_name);
				}
				$data[] = [$product_name, $row['outward_unit'] ];
			}
		} 
		echo json_encode(['success' => true, 'data' => $data]);
		exit;
	}

	if(isset($_GET['get_sales_expenses_chart'])){
		$from_date = $_GET['from_date'] ?? '';
		$to_date = $_GET['to_date'] ?? '';

		$labels = [];
		$sales = [];
		$expenses = [];

		$start = strtotime($from_date);
		$end = strtotime($to_date);

		for ($d = $start; $d <= $end; $d = strtotime("+1 day", $d)) {
			$dayKey = date("Y-m-d", $d);
			$labels[] = date("d-M", $d);

			$chart_data = $obj->getSalesExpenseList($dayKey,'');
			if (!empty($chart_data)) {
				$sales[] = $chart_data[0]['credit'];
				$expenses[] = $chart_data[0]['debit'];
			} else {
				$sales[] = 0;
				$expenses[] = 0;
			}
		}

		echo json_encode([
			'success' => true,
			'data' => [
				'labels' => $labels,
				'sales' => $sales,
				'expenses' => $expenses
			]
		]);
		exit;
	}

	if(isset($_GET['get_purchase_sales_chart_data'])){
		$from_date = $_GET['from_date'] ?? '';
		$to_date = $_GET['to_date'] ?? '';

		$labels = [];
		$sales = [];
		$purchase = [];
		$pos = [];

		$start = strtotime($from_date);
		$end = strtotime($to_date);

		for ($d = $start; $d <= $end; $d = strtotime("+1 day", $d)) {
			$dayKey = date("Y-m-d", $d);
			$labels[] = date("d-M", $d);

			$chart_data = $obj->getPurchaseSalesList($dayKey,'');
			if (!empty($chart_data)) {
				$sales[] = $chart_data['sales'];
				$purchase[] = $chart_data['purchase'];
				$pos[] = $chart_data['pos'];
			} else {
				$sales[] = 0;
				$purchase[] = 0;
				$pos[] = 0;
			}
		}

		echo json_encode([
			'success' => true,
			'data' => [
				'labels' => $labels,
				'sales' => $sales,
				'purchase' => $purchase,
				'pos' => $pos
			]
		]);
		exit;
	}

?>