<?php
	include("include_files.php");
	if(isset($_REQUEST['show_product_id'])) { 
        $show_product_id = $_REQUEST['show_product_id'];
        $name = $lower_case_name = $url = $category_id = $brand_id = $category_ids = $product_display = $hsn_code = $tax = $video_url = $meta_title = $meta_keywords = $meta_description = "";
        $multiple_image = "";

        if(!empty($show_product_id)) {
            $product_list = array();
			$product_list = $obj->getTableRecords($GLOBALS['product_table'], 'product_id', $show_product_id);
            if(!empty($product_list)) {
                foreach($product_list as $data) {
                    if(!empty($data['name'])) {
                        $name = $obj->encode_decode('decrypt', $data['name']);
					}
                    if(!empty($data['lower_case_name'])) {
                        $lower_case_name = $obj->encode_decode('decrypt', $data['lower_case_name']);
                    }
                    if(!empty($data['url']) && $data['url'] != $GLOBALS['null_value']) {
                        $url = $data['url'];
                        $url = $obj->encode_decode('decrypt',$url);
                    }				
					if(!empty($data['category_id'])) {
                        $category_id = $data['category_id'];
					}
					if(!empty($data['brand_id'])) {
                        $brand_id = $data['brand_id'];
					}                    
                    if(!empty($data['product_type'])) {
                        $product_display = $data['product_type'];
					}
                    if(!empty($data['hsn_code'])) {
                        $hsn_code = $obj->encode_decode('decrypt', $data['hsn_code']);
					}
                    if(!empty($data['video_url']) && $data['video_url'] != $GLOBALS['null_value']) {
                        $video_url = $obj->encode_decode('decrypt', $data['video_url']);
					}
					if(!empty($data['product_tax'])) {
                        $tax = $data['product_tax'];
					}
                    if(!empty($data['multiple_images']) && $data['multiple_images'] != $GLOBALS['null_value']) {
						$multiple_image = $data['multiple_images'];
					}
                    if(!empty($data['description']) && $data['description'] != $GLOBALS['null_value']) {
                        $description = $obj->encode_decode('decrypt', $data['description']);
                    }
                    if(!empty($data['meta_title']) && $data['meta_title'] != $GLOBALS['null_value']) {
                        $meta_title = $obj->encode_decode('decrypt', $data['meta_title']);
                        $meta_title = html_entity_decode($meta_title);
                    }
                    if(!empty($data['meta_keywords']) && $data['meta_keywords'] != $GLOBALS['null_value']) {
                        $meta_keywords = $obj->encode_decode('decrypt', $data['meta_keywords']);
                        $meta_keywords = html_entity_decode($meta_keywords);
                    }
                    if(!empty($data['meta_description']) && $data['meta_description'] != $GLOBALS['null_value']) {
                        $meta_description = $obj->encode_decode('decrypt', $data['meta_description']);
                        $meta_description = html_entity_decode($meta_description);
                    }

                    $product_count = $obj->getProductCombinationCount($show_product_id);
                }
            }
		}

        if(!empty($show_product_id)){
            $attribute_list =array();
            $attribute_list = $obj->getTableRecords($GLOBALS['product_combination_table'],'product_id',$show_product_id);
            $product_count =count($attribute_list);
        }        

		$category_list = array();
		$category_list = $obj->getCategoryWithNoSubCategory();

        $brand_list = array();
        $brand_list = $obj->getTableRecords($GLOBALS['brand_table'], '', '');
        $target_dir = $obj->image_directory();
        ?>
        <form class="poppins pd-20" name="product_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Product</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('product.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_product_id)) { echo $show_product_id; } ?>">
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" id="product_name" name="name" value="<?php if(!empty($name)) { echo $name; } ?>" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" onkeyup="generateurl(this.value)" required>
                            <label>Product Name</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="product_url" name="product_url" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" value="<?php if(!empty($url)) { echo $url; } ?>" readonly required>
                            <label>Product Url</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="category_id" onchange="Javascript:getGeneralProductDetails(this.value);" data-dropdown-css-class="select2-danger" style="width: 100%;" <?php if(!empty($show_product_id)){ ?>disabled<?php } ?>>
                                <option value="">Select</option>
                                <?php
                                    if(!empty($category_list)) {
                                        foreach($category_list as $data) {
                                            if(!empty($data['category_id'])) {
                                                $category_selected = 0;
                                                if(!empty($category_id) && $data['category_id'] == $category_id) {
                                                    $category_selected = 1;
                                                }
                                ?>
                                                <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($category_selected) && $category_selected == 1) { ?> selected="selected" <?php } ?> >
                                                    <?php
                                                        if(!empty($data['name'])) {
                                                            $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                                            echo $data['name'];
                                                        }
                                                    ?>
                                                </option>
                                <?php				
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <input type="hidden" name="category_id_hidden" value="<?php if(!empty($category_id)){echo $category_id;} ?>">                            
                            <label>Select Category</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="brand_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select</option>
                                <?php
                                    if(!empty($brand_list)) {
                                        foreach($brand_list as $data) {
                                            if(!empty($data['brand_id'])) {
                                ?>
                                                <option value="<?php echo $data['brand_id']; ?>" <?php if(!empty($brand_id) && $data['brand_id'] == $brand_id) { ?> selected="selected" <?php } ?> >
                                                    <?php
                                                        if(!empty($data['brand_name'])) {
                                                            $data['brand_name'] = $obj->encode_decode('decrypt', $data['brand_name']);
                                                            echo $data['brand_name'];
                                                        }
                                                    ?>
                                                </option>
                                <?php				
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <label>Select Brand</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="product_type" id="product_type" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select</option>
                                <option value="1" <?php if(!empty($product_display) && $product_display == 1) { ?> selected="selected" <?php } ?> >
                                    Online
                                </option>
                                <option value="2" <?php if(!empty($product_display) && $product_display == 2) { ?> selected="selected" <?php } ?> >
                                    Billing
                                </option>
                                <option value="3" <?php if(!empty($product_display) && $product_display == 3) { ?> selected="selected" <?php } ?> >
                                    Online & Billing
                                </option>
                            </select>
                            <label>Select Product Display</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" name="hsn_code" value="<?php if(!empty($hsn_code)) { echo $hsn_code; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>HSN Code</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" name="product_tax" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select Tax</option>
                                <option value="0%" <?php if(!empty($tax) && $tax == "0%") { ?> selected <?php } ?> >0%</option>
                                <option value="5%" <?php if(!empty($tax) && ($tax == "5%" || $tax == "5") ) { ?> selected <?php } ?> >5%</option>
                                <option value="12%" <?php if(!empty($tax) && ($tax == "12%" || $tax == "12")) { ?> selected <?php } ?> >12%</option>
                                <option value="18%" <?php if(!empty($tax) && ($tax == "18%" || $tax == "18")) { ?> selected <?php } ?><?php if(empty($tax)){ ?> selected <?php } ?>>18%</option>
                                <option value="28%" <?php if(!empty($tax) && ($tax == "28%" || $tax == "28")) { ?> selected <?php } ?>>28%</option>
                            </select>
                            <label>Select Tax</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="video_url" name="video_url" value="<?php if(!empty($video_url)) { echo $video_url; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>Video URL</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
    								<input type="hidden" name="description_content" value="" class="form-control shadow-none">
                                    <div class="w-100 description">
                                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                    </div>
                                    <!-- <textarea class="form-control" name="description" id="description" placeholder="Enter Your Address"></textarea> -->
                                    <label>Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" name="meta_title" onkeydown="Javascript:KeyboardControls(this,'',25,'1')"; placeholder="Enter Your Address"><?php if(!empty($meta_title)) { echo $meta_title; } ?></textarea>
                                    <label>Meta Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control"name="meta_keywords" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"><?php if(!empty($meta_keywords)) { echo $meta_keywords; } ?></textarea>
                                    <label>Meta Keyword</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" name="meta_description" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"><?php if(!empty($meta_description)) { echo $meta_description; } ?></textarea>
                                    <label>Meta Description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div id="multiple_image_cover" class="form-group">
                                <div class="image-upload text-center">
                                    <label for="multiple_image"> 
                                        <div class="multiple_image_list">
                                            <div class="col-12">
                                                <div class="cover">                                                    
                                                    <img  id="multiple_image_preview" src="images/cloudupload.png" class="img-fluid w-25 mx-auto d-block" alt="Upload" title="Upload">
                                                    <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                                                    <div class="text-center smallfnt">(Image Size 800 x 800)</div>
                                                    <div class="text-center smallfnt">(Max 4 images)</div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="file" name="multiple_image" id="multiple_image" style="display: none;" accept="image/*" />
                                    </label>
                                </div>
                            </div>
                            <div class="logo_container" style="display: none;">
                                <canvas id="logo_canvas"></canvas>
                            </div>
                        </div>
                        <div class="row" id="multiple_image_view">
                        <?php 
                            if(!empty($multiple_image)){
                                $multiple_images = array();
                                $multiple_images = explode("$$$", $multiple_image);    
                                for($p = 0; $p < count($multiple_images); $p++) { ?>
                                        <?php  
                                        $split_img = explode(".", $multiple_images[$p]);
                                        ?>
                                        <div class="col-lg-3 col-md-3 col-6 pt-4">
                                            <button type="button" onclick="Javascript:delete_multiple_files(this, 'multiple_image_preview', '<?php if(!empty($multiple_images[$p]) && file_exists($target_dir.$multiple_images[$p])) { echo $multiple_images[$p]; } ?>');" src="include/images/upload_image.png"><i class="fa fa-close"></i></button>
                                            <img id="multiple_image_preview"src="<?php echo $target_dir.$multiple_images[$p].$GLOBALS['image_format']; ?>" class="img-fluid w-75 mx-auto d-block" onclick="Javascript:delete_image_modal('this','<?php echo $multiple_images[$p]; ?>');">
                                            <input type="hidden" name="multiple_image_name[]" class="form-control"  value="<?php if(!empty($multiple_images[$p])) { echo $multiple_images[$p]; } ?>">
                                        </div>                                                                  
                                <?php 
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center p-3">
                <div class="col-lg-12">
                    <input type="hidden" name="product_count" value="<?php if(!empty($product_count)) { echo $product_count; } else { echo "1"; } ?>">
                    <div class="table-responsive text-center products_table_details">
                        <?php if(!empty($show_product_id)){
                            $attribute_ids = $obj->getTableColumnValue($GLOBALS['product_combination_table'],'product_id',$show_product_id,'attribute_id');
                            $attribute_ids = explode(",",$attribute_ids);
                            $attribute_ids = array_reverse($attribute_ids); ?>
                                <table class="table nowrap cursor smallfnt w-100 append_product_details">
                                    <thead class="bg-dark table-bordered smallfnt">
                                        <tr style="vertical-align:middle;">
                                            <th>S.No</th>
                                            <th style="width:80px;">Default</th>
                                            <div style="width:80px;">
                                                <?php 
                                                if(!empty($attribute_list)){
                                                    for($i=0;$i < count($attribute_ids);$i++){ 
                                                        $attribute_name = $obj->getTableColumnValue($GLOBALS['attribute_table'],'attribute_id',$attribute_ids[$i],'attribute_name'); ?>
                                                        <th class="" style="width:80px;">
                                                            <?php
                                                                if(!empty($attribute_name)){
                                                                    echo $obj->encode_decode("decrypt",$attribute_name);
                                                                }
                                                            ?>
                                                        </th>
                                                        <input type="hidden" name="attribute_id[]" value="<?php echo $attribute_ids[$i];?>"> 
                                                        <?php 
                                                    }
                                                } ?>
                                            </div>
                                            <th style="width:80px;">QTY</th>
                                            <th style="width:80px;">Price</th>
                                            <th style="width:80px;">Availability</th>
                                            <th style="width:80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $attribute_list = array();
                                        $attribute_list = $obj->getTableRecords($GLOBALS['product_combination_table'],'product_id',$show_product_id);
                                        $product_row_index = count($attribute_list);
                                        foreach($attribute_list as $data)
                                        {                                          
                                            ?>
                                            <tr class="table-bordered smallfnt product_row" id="product_row<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>">
                                                <input type="hidden" name="product_row_index[]" value="<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>" >
                                                <td class="sno" style="width:80px;"><?php if(!empty($product_row_index)) { echo $product_row_index; } ?></td>
                                                <td>
                                                    <input type="radio" name="default_button[]" id="default_button" <?php if(!empty($data['is_default']) && $data['is_default'] == '1'){ ?>checked<?php } ?> value="<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>">
                                                </td>
                                                <?php
                                                    $attribute_id_value = explode(",",$data['attribute_id_value']);
                                        
                                                        $attribute_name = "";
                                                        if(!empty($data['attribute_id'])){
                                                            $attribute_id = explode(",",$data['attribute_id']);
                                                            $attribute_id = array_reverse($attribute_id);
                                                        }
                                                        if(!empty($attribute_id_value)){
                                                            for($p=0;$p<count($attribute_id_value);$p++){
                                                                $attribute_name = "";
                                                                    $attribute_name = $obj->getTableColumnValue($GLOBALS['attribute_table'],'attribute_id',$attribute_id[$p],'attribute_name');
                                                                ?>
                                                                <?php                                                       
                                                                    $attribute_value_list= array(); 
                                                                    $attribute_value_list =$obj->getTableRecords($GLOBALS['attribute_value_table'],'attribute_id', $attribute_id[$p]);
                                                    
                                                                    ?>
                                                                        <td>
                                                                            <div class="form-group mb-2">
                                                                                <div class="form-label-group in-border">
                                                                                    <select name="<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>_attribute_value_id[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;" >
                                                                                        <option value="">Select</option>
                                                                                        <?php  if(!empty($attribute_value_list)){
                                                                                            foreach($attribute_value_list as $list){   ?>
                                                                                                <option value="<?php if(!empty($list['attribute_value_id'])){
                                                                                                        echo $list['attribute_value_id'];
                                                                                                    } ?>" <?php  if(!empty($attribute_id_value[$p] && $attribute_id_value[$p] == $list['attribute_value_id'])) { ?>Selected <?php } ?>> 
                                                                                                        <?php 
                                                                                                    if(!empty($list['attribute_value'])){
                                                                                                        echo $obj->encode_decode("decrypt",$list['attribute_value']);
                                                                                                    }
                                                                                                    ?>
                                                                                                </option>
                                                                                        
                                                                                        <?php }
                                                                                    } ?>                                                    
                                                                                    </select>
                                                                                    
                                                                                    <label style="width: 145px;" class="text-center"><?php echo $obj->encode_decode("decrypt",$attribute_name); ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                
                                                                <?php 
                                                            } 
                                                        } 
                                                        
                                                ?>
                                                    <td>
                                                        <div class="form-group mb-2 w-auto">
                                                            <div class="form-label-group in-border">
                                                                <input type="text" id="" name="quantity[]" value="<?php echo $data['quantity']; ?>" class="form-control shadow-none" placeholder="" maxlength="6">
                                                                <label>QTY</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php $actual_price = $obj->getAttributeQuantity($show_product_id,$data['attribute_id_value'],$data['quantity'],'Actual_price'); ?>
                                                        <div class="form-group mb-2 w-auto">
                                                            <div class="form-label-group in-border">
                                                                <input type="text" id="" name="<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>_qty_actual_price[]" class="form-control shadow-none" placeholder="" value="<?php echo $actual_price;?>">
                                                                <label>Price</label>
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <?php $attribute_status = $obj->getAttributeQuantity($show_product_id,$data['attribute_id_value'],$data['quantity'],'attribute_status'); ?>
                                                        <div class="form-group mb-2 w-auto">
                                                            <div class="form-label-group in-border">
                                                                <select name="<?php if(!empty($product_row_index)) { echo $product_row_index; } ?>_qty_available[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">                                
                                                                    <option value="available" <?php if($attribute_status == "available"){ echo "selected";} ?>>Available</option>
                                                                    <option value="not_available" <?php if($attribute_status == "not_available"){ echo "selected";} ?>>Not Available</option>
                                                                </select>
                                                                <label>Availability</label>
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <a class="pe-2 h5 add_button_remove <?php if($product_row_index != count($attribute_list)){ ?>d-none<?php } ?>" id="add_btn" onclick="Javascript:addGeneralTableDetails('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_row_index)){ echo $product_row_index; } ?>')"><i class="fa fa-plus text-success"></i></a>
                                                        <a class="pe-2 h5" id="copy_btn" onclick="Javascript:CloneGeneralTableRow('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_row_index)){ echo $product_row_index; } ?>',this)"><i class="fa fa-files-o text-dark"></i></a>
                                                        <a class="pe-2 h5 delete_button <?php if(count($attribute_list) == 1){ ?>d-none<?php } ?>" id="dlt_btn" onclick="Javascript:DeleteGeneralTableRow('<?php if(!empty($product_row_index)){ echo $product_row_index; } ?>')"><i class="fa fa-trash text-danger"></i></a>
                                                    </td>
                                                <?php
                                                $product_row_index--;
                                            }
                                                ?>
                                            </tr>
                                    </tbody>
                                </table>
                        <?php } ?>
                    </div>
                </div>    
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger submit_button" type="button">
                        Submit
                    </button>
                </div>
            </div>    
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript" src="include/js/image_upload.js"></script>
			<script src="include/wysiwyg_editor/editor.js"></script>
			<script type="text/javascript" defer="defer">
				$(document).ready(function() {
					if($("#description").length > 0) {
						$("#description").Editor();
					}
				});
			</script>
			<link href="include/wysiwyg_editor/editor.css" type="text/css" rel="stylesheet"/>

			<?php 
                if(!empty($description)) {                     
                    $description = str_replace(array("\r", "\n"), '<br>', $description);
            ?>
			<script type="text/javascript" defer="defer">
				setTimeout(function(){ 
						if($(".description").find('.fa-code').length > 0) {
							$(".description").find('.fa-code').parent('a').trigger('click');
							$(".description").find(".Editor-editor").find('pre').html('<?php echo $description; ?>');
							$(".description").find('.fa-code').parent('a').trigger('click');
						}
				}, 1000);
			</script>
			<?php } ?>          
            <script>
				jQuery('.submit_button').click(function(){
					var description = jQuery(".description").find(".Editor-editor").html();
					if(typeof description != "undefined" && description != null && description != "") {
						if(jQuery('input[name="description_content"]').length > 0) {
							jQuery('input[name="description_content"]').val(description);
						}
					}
					//console.log(description);
					SaveModalContent('product_form', 'product_changes.php', 'product.php');
				});
            </script>
        </form>
        <script>
            function generateurl(val){
                    console.log("Input event triggered");
                    let name =val;
                    
                    // Generate slug:
                    let slug = name.toLowerCase()
                                .replace(/[^a-z0-9\s]/g, '') // Remove special characters
                                .replace(/\s+/g, '-')        // Replace spaces with hyphen
                                .replace(/-+/g, '-')         // Remove multiple hyphens
                                .replace(/^-|-$/g, '');      // Trim starting/ending hyphens

                    $('#product_url').val(slug);
            }
        </script>			
		<?php
    } 
    if(isset($_POST['edit_id'])) {
        $name = ""; $name_error = "";$category_id = ""; $category_id_error = ""; $description = ""; $description_error = ""; $meta_title = ""; $meta_title_error = ""; $meta_keywords = ""; 
		$meta_keywords_error = ""; $meta_description = ""; $meta_description_error = "";
        $category_ids = array(); 

        $video_url=""; $url_error = ""; 
        $product_error=""; $attribute_ids = array(); $attribute_id_value =array(); $quantity_values =array(); $multiple_image_name =array();

        $valid_product = ""; $form_name = "product_form";
        $url =  $brand_id = $product_type = $hsn_code = $product_tax = "";
        $brand_id_error = $product_type_error = $hsn_code_error = $product_tax_error = "";

		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}

		$product_id = "";
		if(!empty($edit_id)) {
			$product_id = $edit_id;
		}
        
		$name = $_POST['name'];
        $name = trim($name);
		$name_error = $valid->common_validation($name, "Name", "text",'');
		if(!empty($name_error)) {
			$valid_product = $valid->error_display($form_name, "name", $name_error, 'text');
		}

		if(isset($_POST['product_url'])){
			if(!empty($_POST['product_url'])){
				$url = $_POST['product_url'];
			}
		}

        if(isset($_POST['category_id']))
        {
            $category_id = $_POST['category_id'];
        }
        if(isset($_POST['category_id_hidden']))
        {
            $category_id = $_POST['category_id_hidden'];            
        }

		$category_id = $valid->clean_value($category_id);
		if(empty($category_id)) {
			$category_id_error = "Select the Category";
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "category_id", $category_id_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "category_id", $category_id_error, 'select');
			}
		}

        if(isset($_POST['brand_id']))
        {
            $brand_id = $_POST['brand_id'];
        }

		$brand_id = $valid->clean_value($brand_id);
		if(empty($brand_id)) {
			$brand_id_error = "Select the Brand";
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "brand_id", $brand_id_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "brand_id", $brand_id_error, 'select');
			}
		}

		if(isset($_POST['description_content'])) {
			$description = $_POST['description_content'];
			$description = trim($description);
		}
		if(!empty($description_error)) {
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "description", $description_error, 'textarea');
			}
			else {
				$valid_product = $valid->error_display($form_name, "description", $description_error, 'textarea');
			}
		}
        
        if(isset($_POST['product_tax'])) {

			$product_tax = $_POST['product_tax'];
        }

		$product_tax = $valid->clean_value($product_tax);
		if(empty($product_tax)) {
			$product_tax_error = "Select the Product Tax";
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "product_tax", $product_tax_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "product_tax", $product_tax_error, 'select');
			}
		}
        if(isset($_POST['product_type'])){
			$product_type = $_POST['product_type'];
		}
		if(empty($product_type)) {
			$product_type_error = "Select the Product Type";
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "product_type", $product_type_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "product_type", $product_type_error, 'select');
			}
		}
		if(isset($_POST['hsn_code'])){
			$hsn_code =$_POST['hsn_code'];
             $hsn_code_error = $valid->valid_number($hsn_code, "HSN code", "1");
            if(!empty($hsn_code_error)) {
                if(!empty($valid_product)) {
                    $valid_product = $valid_product." ".$valid->error_display($form_name, "hsn_code", $hsn_code_error, 'text');
                }
                else {
                    $valid_product = $valid->error_display($form_name, "hsn_code", $hsn_code_error, 'text');
                }
            }
		}

        if(isset($_POST['video_url'])) {
			$video_url = $_POST['video_url'];
			$video_url = $valid->clean_value($video_url);
		}
		if(!empty($video_url)) {
            if(!filter_var($video_url, FILTER_VALIDATE_URL))
            $url_error = "Invalid URL";
		}
		
        if(!empty($valid_product)) {
            $valid_product = $valid_product." ".$valid->error_display($form_name, "video_url", $url_error, 'text');
        }
        else {
            $valid_product = $valid->error_display($form_name, "video_url", $url_error, 'text');
        }

        if(isset($_POST['multiple_image_name'])) {
            $multiple_image_name = $_POST['multiple_image_name'];
        }    
        if(isset($_POST['attribute_id'])) {
			$attribute_ids = $_POST['attribute_id'];
			if(!empty($attribute_ids)) {
				$attribute_ids = array_reverse($attribute_ids);
			}
		}
		if(isset($_POST['meta_title'])) {
			$meta_title = $_POST['meta_title'];
			$meta_title = trim($meta_title);
			if(!empty($meta_title)) {
				$meta_title_error = $valid->common_validation($meta_title, "Meta title", "text",'');
				if(!empty($meta_title_error)) {
					if(!empty($valid_product)) {
						$valid_product = $valid_product." ".$valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
					}
					else {
						$valid_product = $valid->error_display($form_name, "meta_title", $meta_title_error, 'text');
					}
				}
			}
		}
		if(isset($_POST['meta_keywords'])) {
			$meta_keywords = $_POST['meta_keywords'];
			$meta_keywords = trim($meta_keywords);
			if(!empty($meta_keywords)) {
				$meta_keywords_error = $valid->common_validation($meta_keywords, "Meta keywords", "text","");
				if(!empty($meta_keywords_error)) {
					if(!empty($valid_product)) {
						$valid_product = $valid_product." ".$valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
					}
					else {
						$valid_product = $valid->error_display($form_name, "meta_keywords", $meta_keywords_error, 'text');
					}
				}
			}
		}
		if(isset($_POST['meta_description'])) {
			$meta_description = $_POST['meta_description'];
			$meta_description = trim($meta_description);
			if(!empty($meta_description)) {
				$meta_description_error = $valid->common_validation($meta_description, "Meta Description", "text","");
				if(!empty($meta_description_error)) {
					if(!empty($valid_product)) {
						$valid_product = $valid_product." ".$valid->error_display($form_name, "meta_description", $meta_description_error, 'text');
					}
					else {
						$valid_product = $valid->error_display($form_name, "meta_description", $meta_description_error, 'text');
					}
				}
			}
		}

        $product_row_index = array();
        if(isset($_POST['product_row_index']))
        {
            $product_row_index = $_POST['product_row_index'];
            $product_row_index = array_reverse($product_row_index);

        }
        $product_error = "";
        if(empty($valid_product)){
            if(!empty($category_id)){
                if(!empty($attribute_ids)){
                        if(!empty($product_row_index)) {
                            for($p = 0; $p < count($product_row_index); $p++) {
                                $attr_id = $product_row_index[$p]."_attribute_value_id";
                                $actual_price_value = $product_row_index[$p]."_qty_actual_price";
                                $attribute_available = $product_row_index[$p]."_qty_available";
                                    if(isset($_POST['quantity'])){
                                        $quantity = $_POST['quantity'];
                                        $quantity =array_reverse($quantity);
                                    }
                                    if(isset($_POST[$attr_id]))
                                    {
                                        $attribute_id_value[$p] = $_POST[$attr_id];
                                        $attribute_value = $_POST[$attr_id];
                                            if(!empty($attribute_value))
                                            {
                                                for($a=0;$a<count($attribute_value);$a++)
                                                {
                                                    if(empty($attribute_value[$a]))
                                                    {
                                                        $product_error ="Empty attribute value";
                                                    }
                                                }
                                            }
                                            else
                                            {
                                                $product_error = "Select attribute value";
                                            }
                                            // if(!empty($attribute_value))
                                            // {
                                            //     for($a=0;$a<count($attribute_value);$a++)
                                            //     {
                                            //         if(empty($attribute_value[$a]))
                                            //         {
                                            //             $valid_product = $valid_product.$valid->row_error_display($form_name, $product_row_index[$p]."_attribute_value_id", 'Empty attribute value', 'select', 'product_row', ($p+1));                                                                        
                                            //         }
                                            //     }
                                            // }
                                            // else
                                            // {
                                            //     $valid_product = $valid_product.$valid->row_error_display($form_name, $product_row_index[$p]."_attribute_value_id", 'Select attribute value', 'select', 'product_row', ($p+1));                                                                        
                                            // }                                            
                                    }
                                    $actual_price = 0; $attribute_avail ="";
                                    if(empty($product_error)){

                                        if(isset($_POST[$actual_price_value]))
                                        {
                                            $actual_price = $_POST[$actual_price_value];
                                            if(!empty($actual_price)){
                                                for($a=0;$a<count($actual_price);$a++)
                                                {
                                                    if(empty($actual_price[$a]))
                                                    {
                                                        $product_error ="Empty Actual Price";
                                                    }else{
                                                        if (!preg_match("/^[0-9]+(\\.[0-9]+)?$/", $actual_price[$a])) {
                                                                $product_error ="Invalid Actual Price";
                                                        }

                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if(empty($product_error)){
                                        if(isset($_POST[$attribute_available]))
                                        {
                                            $attribute_avail = $_POST[$attribute_available];
                                            if(!empty($attribute_avail)){
                                                for($a=0;$a<count($attribute_avail);$a++)
                                                {
                                                    if(empty($attribute_avail[$a]))
                                                    {
                                                        $product_error ="Select attribute availability";
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    $attribute_id_value[$p] = implode(",",$attribute_id_value[$p]);
                            
                            }
                            if(empty($product_error))
                            {

                                if(!empty($attribute_id_value))
                                {

                                    for($i=0;$i <count($attribute_id_value);$i++)
                                    {
                                        if(!empty($quantity[$i])){
                                            if(preg_match("/^[0-9]*$/", $quantity[$i])) {
                
                                                for($j=$i+1;$j<count($attribute_id_value);$j++)
                                                {
                
                                                    if($attribute_id_value[$i]==$attribute_id_value[$j] && $quantity[$i] == $quantity[$j])
                                                    {
                                                        $attribute_name =array();
                                                        $attribute_value = $attribute_id_value[$i];
                                                        $attribute_value = explode(",",$attribute_id_value[$i]);
                                                        for($a=0;$a<count($attribute_value);$a++)
                                                        {
                                                            $attribute_name[$a] = $obj->getTableColumnValue($GLOBALS['attribute_value_table'],'attribute_value_id',$attribute_value[$a],'attribute_value');
                                                            if(!empty($attribute_name[$a]))
                                                            {
                                                                $attribute_name[$a] = $obj->encode_decode("decrypt",$attribute_name[$a]);
                                                            }
                                                        }
                                                        $attribute_name = implode(" ",$attribute_name);
                                                        $product_error = $attribute_name." ".$quantity[$i]." already exist";
                                                    }
                                                }
                                            }else{
                                                $product_error = "Invalid quantity";
                                            }
                                        }else{
                                            $product_error = "Empty quantity";
                                        }
                                    }
                                }
                                else
                                {
                                    $product_error = "Select attribute";
                                }
                            }
                        }
                
                }else{
                    $category_name ="";
                    $category_name =$obj->getTableColumnValue($GLOBALS['category_table'],'category_id',$category_id,'name');
                    $category_name=$obj->encode_decode('decrypt',$category_name);
                    $product_error = "Attribute is not set for this category - ".$category_name;
                }
            }
            else{
                $product_error = "Select Category";
            }
        }
        $default_button = array();
        if(isset($_POST['default_button'])){
            $default_button = $_POST['default_button'];
        }
        if(empty($product_error)){
            if(empty($_POST['default_button'])){
                $product_error = "Choose Default Combination";
            }
         }

		$result = "";
		if(empty($valid_product) && empty($product_error)) {
			$check_user_id_ip_address = 0;
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
				$lower_case_name = "";
				if(!empty($name)) {					
					$lower_case_name = strtolower($name);
					$lower_case_name = preg_replace('/[^a-zA-Z0-9 ]/s','',$lower_case_name);
					/*$lower_case_name = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $lower_case_name);
					$lower_case_name = str_replace('*', ' ', $lower_case_name);*/
					$lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
					$name = $obj->encode_decode('encrypt', $name);
				}
				if(!empty($hsn_code)){
					$hsn_code = $obj->encode_decode("encrypt",$hsn_code);
				}
                 
				if(!empty($video_url)){
					$video_url = $obj->encode_decode("encrypt",$video_url);
				}else {
                    $video_url = $GLOBALS['null_value'];
                }

                if(!empty($multiple_image_name) && is_array($multiple_image_name)) {
                    $multiple_image = implode("$$$", $multiple_image_name);
                }
                else {
                    $multiple_image = $GLOBALS['null_value'];
                }

				if(!empty($description)) {
					$description = htmlentities($description, ENT_QUOTES);
					$description = $obj->encode_decode('encrypt', $description);
				}

				if(!empty($meta_title)) {
					$meta_title = $obj->encode_decode('encrypt', $meta_title);
				}
				else {
					$meta_title = $GLOBALS['null_value'];
				}

				if(!empty($meta_keywords)) {
					$meta_keywords = $obj->encode_decode('encrypt', $meta_keywords);
				}
				else {
					$meta_keywords = $GLOBALS['null_value'];
				}

				if(!empty($meta_description)) {
					$meta_description = $obj->encode_decode('encrypt', $meta_description);
				}
				else {
					$meta_description = $GLOBALS['null_value'];
				}
				$prev_product_id = ""; $product_url_error = "";			
				$url = $obj->encode_decode('encrypt',$url);
				if(!empty($name)) {
					$prev_product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'url', $url, 'product_id');
					if(!empty($prev_product_id)) {
                        $product_url_error = "This product url is already exist";
                    }
                }
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $bill_company_id = $GLOBALS['bill_company_id'];
                $image_copy = 0;
				if(empty($edit_id)) {
                    if(empty($prev_product_id)) {
                        $ordering_number = "";
                        $ordering_number = $obj->getOrderingNumber($GLOBALS['product_table'], $category_id);
                        $action = "New Product Created. Name - ".$obj->encode_decode('decrypt', $name);
                        $null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id', 'product_id', 'name','lower_case_name', 'url','brand_id','product_type','multiple_images','deleted','category_id','hsn_code','product_tax','video_url', 'description', 'meta_title', 'meta_keywords', 'meta_description','ordering','product_status');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'", "'".$null_value."'", "'".$name."'", "'".$lower_case_name."'","'".$url."'","'".$brand_id."'","'".$product_type."'","'".$multiple_image."'","'0'","'".$category_id."'","'".$hsn_code."'","'".$product_tax."'","'".$video_url."'", "'".$description."'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'","'".$ordering_number."'","'1'");                       
                        $product_insert_id = $obj->InsertSQL($GLOBALS['product_table'], $columns, $values,'product_id','', $action);						
                        if(preg_match("/^\d+$/", $product_insert_id)) {
                            $product_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'id', $product_insert_id, 'product_id');
                            $image_copy = 1;
                            $result = array('number' => '1', 'msg' => 'Product Successfully Created');					
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $product_insert_id);
                        }

                    }
                    else {
                        $result = array('number' => '2', 'msg' => $product_url_error);
                    }
                }
				else {
                    $product_id = $edit_id;
                    if(empty($prev_product_id) || $prev_product_id == $edit_id) {
                        $getUniqueID = "";
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $edit_id, 'id');
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $image_copy = 1;
                            $action = "Product Updated. Name - ".$obj->encode_decode('decrypt', $name);
                            $columns = array(); $values = array();						
                            $columns = array('creator_name','name', 'lower_case_name','url','brand_id','product_type','multiple_images','hsn_code','product_tax','video_url', 'description', 'meta_title', 'meta_keywords', 'meta_description');
                            $values = array("'".$creator_name."'", "'".$name."'", "'".$lower_case_name."'","'".$url."'","'".$brand_id."'", "'".$product_type."'", "'".$multiple_image."'","'".$hsn_code."'","'".$product_tax."'","'".$video_url."'", "'".$description."'", "'".$meta_title."'", "'".$meta_keywords."'", "'".$meta_description."'");

                            $product_update_id = $obj->UpdateSQL($GLOBALS['product_table'], $getUniqueID, $columns, $values, $action);
                            if(preg_match("/^\d+$/", $product_update_id)) {
                                $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $product_update_id);
                            }							
                        }
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $product_url_error);
                    }
                }
                if((empty($prev_product_id) || $prev_product_id == $edit_id)){
                    $attribute_ids = implode(",",$attribute_ids); 
                    if(!empty($edit_id))
                    {
                            $product_details =array();
                            for($p = 0; $p < count($product_row_index); $p++) {
                                
                                $attr_id = $product_row_index[$p]."_attribute_value_id";
                                if(isset($_POST[$attr_id]))
                                {
                                    $attribute_id_value[$p] = $_POST[$attr_id];
                                }
                                $attribute_id_value[$p] = implode(",",$attribute_id_value[$p]);

                                if(isset($_POST['quantity'])){
                                    $quantity = $_POST['quantity'];
                                    $quantity =array_reverse($quantity);
                                }
                            }
                            $prev_combination_id =array();
                            $prev_combination_id = $obj->getPrevCombinationId($product_id);

                            $db_attribute_id_value = ""; $db_quantity = "";
                            if(!empty($prev_combination_id)){
                                foreach($prev_combination_id as $combination)
                                {
                                    if(!empty($combination['attribute_id_value'])){
                                        $db_attribute_id_value = $combination['attribute_id_value'];
                                    }
                                    if(!empty($combination['quantity'])){
                                        $db_quantity = $combination['quantity'];
                                    }
                                        
                                        $exist = "";
                                        for($m =0; $m < count($attribute_id_value); $m++){
                                            if($db_attribute_id_value == $attribute_id_value[$m] && $db_quantity == $quantity[$m]){
                                                $exist = 1;
                                            }
                                        }
                                        if($exist != "1"){
                                            $columns = array("deleted");
                                            $values = array("'1'");
                                            $edit_update_id = $obj->UpdateSQL($GLOBALS['product_combination_table'], $combination ['id'], $columns, $values, '');
                                        } 
                                }
                            }
                            
                    }
                    $attr_array=array(); $previous_variety_attributes=array(); $stock_update_id ="";
                    if(!empty($attribute_ids) && !empty($product_id)){
                        $attribute_ids = explode(",",$attribute_ids);
                        // $attribute_id_value = explode(",",$attribute_id_value);
                        for($g=0;$g < count($attribute_ids);$g++){
                            for($h=0;$h < count($attribute_id_value);$h++){
                                $attribute_id_value_array = explode(",",$attribute_id_value[$h]);
                                // $attribute_id_value_array =array_reverse($attribute_id_value_array);
                                $attribute_values_original = $obj->getAttrValueRecords($bill_company_id,$category_id,$attribute_ids[$g]);

                                if(!empty($attribute_id_value_array)){
                                    for($d=0;$d < count($attribute_id_value_array);$d++){

                                        if(!in_array($attribute_id_value_array[$d],$attr_array)){
                                            $attr_array[] = $attribute_id_value_array[$d];
                                        }
                                 
                                        // echo "fkj";
                                        if(!empty($attribute_values_original)){
                                            foreach($attribute_values_original as $at_value){
                                                if(!empty($at_value['attribute_value_id']) && $at_value['attribute_value_id'] != $GLOBALS['null_value'] && $at_value['attribute_value_id'] == $attribute_id_value_array[$d]){
                                                    $product_variety_update = $obj->ProductVarietyUpdate($bill_company_id,$product_id,$category_id,$attribute_ids[$g],$attribute_id_value_array[$d]);
                                                }
                                            }
                                        }
                                       
                                    }
                                }
                            }
                        }
                        if(!empty($edit_id))
                        {
                            $previous_variety_attributes = $obj->previous_variety_attributes($product_id,$category_id);
                            if(!empty($previous_variety_attributes)){
                                foreach($previous_variety_attributes as $variety){
                                    
                                    if(!in_array($variety ['attribute_id_value'],$attr_array))
                                    {
                                        $columns = array("deleted");
                                        $values = array("'1'");
                                        $stock_update_id = $obj->UpdateSQL($GLOBALS['product_variety_table'], $variety ['id'], $columns, $values, '');
                                    }
                                }
                            }
                        }
                        // print_r($attr_array);

                        $attribute_ids = implode(",",$attribute_ids);
                    }
                    
                    $attribute_id_value = array(); $price_error="";
                    // print_r($product_row_index);
                    if(!empty($product_row_index)) {
                        for($p = 0; $p < count($product_row_index); $p++) {
                            
                            $attr_id = $product_row_index[$p]."_attribute_value_id";
                            $actual_price_value = $product_row_index[$p]."_qty_actual_price";
                            $agent_price_value = $product_row_index[$p]."_qty_available";
                            if(isset($_POST['quantity'])){
                                $quantity = $_POST['quantity'];
                                $quantity =array_reverse($quantity);
                            }
                            if(isset($_POST[$attr_id]))
                            {
                                $attribute_id_value[$p] = $_POST[$attr_id];
                            }
                            if(isset($_POST[$actual_price_value]))
                            {
                                $actual_price_value = $_POST[$actual_price_value];
                                
                            }
                            if(isset($_POST[$agent_price_value]))
                            {
                                $agent_price_value = $_POST[$agent_price_value];
                            }
                            if($default_button[0] == $product_row_index[$p]){
                                $is_default = 1;
                            }
                            else{
                                $is_default = 0;
                            }
                            $attribute_id_value[$p] = implode(",",$attribute_id_value[$p]);
                          
                                $actual_price = 0; $agent_price ="";
                                if(!empty($actual_price_value[0]))
                                {
                                    if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $actual_price_value[0])) 
                                    {
                                        $actual_price = $actual_price_value[0];
                                    }
                                    else
                                    {
                                        $price_error = "Invalid Actual price";
                                    }
            
                                }else{
                                    $price_error = "Empty Actual Price";
                                }
                                if(!empty($agent_price_value[0]))
                                {
                                    $agent_price = $agent_price_value[0];
                                    // if(preg_match("/^[0-9]+(\\.[0-9]+)?$/", $agent_price_value[0])) 
                                    // {
                                    //     $agent_price = $agent_price_value[0];
                                    // }
                                    // else
                                    // {
                                    //     $price_error = "Invalid Agent price";
                                    // }
            
                                }else{
                                    $price_error = "Empty attribute availability";
                                }

                                $getUniqueID ="";
                                $getUniqueID = $obj->getCombinationId($product_id,$attribute_ids,$attribute_id_value[$p],$quantity[$p]); 
                                if(!empty($actual_price))
                                {
                                    
                                    if(empty($getUniqueID))
                                    {
                                        // echo $attribute_ids."helli";
                                        // echo $attribute_id_value[$p]."hai";
                                        // echo $actual_price."haai ";
                                        // echo $quantity[$p]." ";
                                        $null_value = $GLOBALS['null_value'];
                                        $columns = array('created_date_time', 'creator', 'creator_name', 'bill_company_id','product_combination_id','product_id','category_id','attribute_id','attribute_id_value','quantity','actual_price','attribute_status','is_default', 'deleted');
                                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$bill_company_id."'","'".$null_value."'",'"'.$product_id.'"',"'".$category_id."'","'".$attribute_ids."'","'".$attribute_id_value[$p]."'","'".$quantity[$p]."'","'".$actual_price."'","'".$agent_price."'","'".$is_default."'","'0'");
                                        $product_combination_insert_id = $obj->InsertSQL($GLOBALS['product_combination_table'], $columns, $values,'','', $action);						
                                        if(preg_match("/^\d+$/", $product_combination_insert_id)) {

                                        }
                                    }
                                    else
                                    {
                                        $action = "";                                    
                                        $columns = array(); $values = array();						
                                        $columns = array( 'creator_name', 'bill_company_id','product_id','category_id','attribute_id','attribute_id_value','quantity','actual_price','attribute_status','is_default');
                                        $values = array( "'".$creator_name."'", "'".$bill_company_id."'",'"'.$product_id.'"',"'".$category_id."'","'".$attribute_ids."'","'".$attribute_id_value[$p]."'","'".$quantity[$p]."'","'".$actual_price."'","'".$agent_price."'","'".$is_default."'");
                                        $attribute_update_id = $obj->UpdateSQL($GLOBALS['product_combination_table'], $getUniqueID, $columns, $values, $action);
                                        if(preg_match("/^\d+$/", $attribute_update_id)) {
                                            $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                                        }
                                        else {
                                            $result = array('number' => '2', 'msg' => $attribute_update_id);
                                        }	
                                    }
                                }
                            // }
                        
                        }
                    }
            
                    if(!empty($image_copy) && $image_copy == 1) {


                        if(!empty($multiple_image)){
                            $multiple_images=  explode("$$$", $multiple_image);
                            // print_r($multiple_images);
                            $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
                            for($i=0; $i<count($multiple_images); $i++) {
                                if(!empty($multiple_images[$i]) && file_exists($temp_dir.$multiple_images[$i])) {  
                                    copy($temp_dir.$multiple_images[$i], $target_dir.$multiple_images[$i].$GLOBALS['image_format']);
                                }	
                            }	
                            $obj->clear_temp_image_directory();

                        }	
                    }	
                }
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($valid_product)) {
				$result = array('number' => '3', 'msg' => $valid_product);
			}
            if(!empty($product_error)) {
				$result = array('number' => '2', 'msg' => $product_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }
	if(isset($_REQUEST['show_hide_id'])) {
		$show_hide_id = $_REQUEST['show_hide_id'];
		$show_frontend = $_REQUEST['show_frontend'];
		$msg = "";
		if(!empty($show_hide_id)) {
			$show_hide_unique_id = "";
			$show_hide_unique_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $show_hide_id, 'id');
            if(preg_match("/^\d+$/", $show_hide_unique_id)) {
                $name = "";
                $name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $show_hide_id, 'name');
            
                $action = "";
                if(!empty($name)) {
					if(!empty($show_frontend)) {
						$action = "Product Show in Frontend. Change to OFF. Name - ".$obj->encode_decode('decrypt', $name);
					}
                    else {
						$action = "Product Show in Frontend. Change to ON. Name - ".$obj->encode_decode('decrypt', $name);
					}
                }
            
                $columns = array(); $values = array();						
                $columns = array('product_status');
                $values = array("'".$show_frontend."'");
                $msg = $obj->UpdateSQL($GLOBALS['product_table'], $show_hide_unique_id, $columns, $values, $action);
            }
		}
		echo $msg;
		exit;
	}
    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; 
        $search_text =""; $category_filter=$filter_product_type="";
        if(isset($_POST['search_text'])) {
            $search_text = $_POST['search_text'];
        }
        
                  
        if(isset($_POST['filter_product_type'])){
            $filter_product_type = $_POST['filter_product_type'];
        } 
        if(isset($_POST['category_filter'])){
             $category_filter = $_POST['category_filter'];
        }
        $login_staff_id = "";
		if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
			$login_staff_id =  $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
		}
    
        $total_records_list = array();
        $total_records_list = $obj->getProductList($category_filter,$filter_product_type);
    
        // if(!empty($total_records_list) && !empty($category_filter)){
        //     $total_records_list = $obj->getTableRecords($GLOBALS['product_table'],'category_id',$category_filter); 
        // }
        
        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if( (strpos(strtolower($obj->encode_decode('decrypt', $val['name'])), $search_text) !== false) ) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }
    
        
        $total_pages = 0;	
        $total_pages = count($total_records_list);
        
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
        
        $prefix = 0;
        if(!empty($page_number) && !empty($page_limit)) {
            $prefix = ($page_number * $page_limit) - $page_limit;
        }
        if($total_pages > $page_limit) { ?>
            <div class="pagination_cover mt-3"> 
                <?php
                    include("pagination.php");
                ?> 
            </div> 
        <?php } 
        $access_error = "";
        if(!empty($login_staff_id)) {
            $permission_module = $GLOBALS['product_module'];

            $permission_action = $view_action;
            include('user_permission_action.php');
        }
        if(empty($access_error)) { ?>        
            <table class="table nowrap cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>HSN Code</th>
                        <th>Tax</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($show_records_list)) {
                        foreach($show_records_list as $key => $list) {
                            $index = $key + 1;
                            if(!empty($prefix)) { $index = $index + $prefix; }

                            $delete = 1;
                            $product_exist_list=array();
                            // $product_exist_list = $obj->checkProduct($list['product_id']);
                            foreach($product_exist_list as $data){
                                if($data['id_count'] > 0){
                                    $delete = 0;
                                }
                            }
                    ?>
                    <tr>
                        <td><?php echo $index; ?></td>
                        <td>
                            <?php
                                if(!empty($list['name'])) {
                                    $list['name'] = $obj->encode_decode('decrypt', $list['name']);
                                    echo $list['name'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(!empty($list['category_id'])) {
                                $category_name = "";
                                $category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $list['category_id'], 'name');
                                // echo  $list['category_id'];
                                if(!empty($category_name)) { 

                                echo $obj->encode_decode("decrypt", $category_name);
                                }
                            
                            }
                            ?>
                        </td>	
                        <td>
                            <?php
                            if(!empty($list['brand_id'])) {
                                $brand_name = "";
                                $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $list['brand_id'], 'brand_name');
                                // echo  $list['category_id'];
                                if(!empty($brand_name)) { 

                                echo $obj->encode_decode("decrypt", $brand_name);
                                }
                            
                            }
                            ?>
                        </td>	
                        <td>
                            <?php
                                if(!empty($list['hsn_code'])) {
                                    $list['hsn_code'] = $obj->encode_decode('decrypt', $list['hsn_code']);
                                    echo $list['hsn_code'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if(!empty($list['product_tax'])) {
                                    echo $list['product_tax'];
                                }
                            ?>

                        </td>
                        <td>
                            <div class="form-group mb-1">
                                <div class="flex-shrink-0">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <label for="FormSelectDefault" class="form-label text-muted"> </label>
    									<input type="checkbox" name="status" class="form-check-input code-switcher" id="show_hide_toggle_<?php if(!empty($list['product_id'])) { echo $list['product_id']; } ?>" value="<?php if(!empty($list['product_status'])) { echo $list['product_status']; } ?>" <?php if(!empty($list['product_status']) && $list['product_status'] == 1) { ?> checked="checked" <?php } ?> onChange="Javascript:ShowHideFrontend(this, '<?php if(!empty($list['product_id'])) { echo $list['product_id']; } ?>');">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <?php 
                                $access_error = "";
                                if(!empty($login_staff_id)) {
                                        $permission_module = $GLOBALS['product_module'];
                                    $permission_action = $edit_action;
                                    include('user_permission_action.php');
                                }
                                if(empty($access_error)) { ?>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#queriesModal"><i class="fa fa-eye"></i> Queries</a></li>
                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['product_id'])) { echo $list['product_id']; } ?>');"><i class="fa fa-pencil"></i> Edit</a></li>

                                <?php }  
                    
                                    $access_error = "";
                                    if(!empty($login_staff_id)) {
                                        $permission_module = $GLOBALS['product_module'];
                                        $permission_action = $delete_action;
                                        include('user_permission_action.php');
                                    }
                                    if(empty($access_error)){ 
                                        if(!empty($delete)){ 
                                            ?>
                                            <li><a class="dropdown-item"onclick="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['product_id'])) { echo $list['product_id']; } ?>');"><i class="fa fa-trash"></i> Delete</a></li>
                                            <?php 
                                        } else{ ?>
                                            <span title="This Product is linked in Other Screen.So it can't be deleted">
                                                <li><a class="dropdown-item"onclick="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['product_id'])) { echo $list['product_id']; } ?>');" <?php if($delete == 0){ ?>style="pointer-events: none; cursor: default;"<?php } ?>><i class="fa fa-trash"></i> Delete</a></li>
                                            </span>
                                            <?php
                                        }
                                    } ?>

                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>               
		<?php	
                    }
        }
	}
    ?>