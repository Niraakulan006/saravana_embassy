<?php
    include("include_files.php");


if(isset($_REQUEST['category_id'])) {
    $category_id = $_REQUEST['category_id'];
    $product_count = $_REQUEST['product_count'];
    $attribute_list =array();
    $attribute_list =$obj->getTableRecords($GLOBALS['attribute_table'],'category_id',$category_id);
     ?>
    
        <table class="table nowrap cursor smallfnt w-100 append_product_details" id="general_table_body">
            <thead class="bg-dark table-bordered smallfnt">
                <tr style="vertical-align:middle;">
                    <th style="width:80px;">S.No</th>
                    <th style="width:80px;">Default</th>
                    <div>
                        <?php 
                        if(!empty($attribute_list)){
                            foreach($attribute_list as $data){  ?>
                                <th>
                                    <?php
                                        if(!empty($data['attribute_name'])){
                                            echo $obj->encode_decode("decrypt",$data['attribute_name']);
                                        }
                                    ?>
                                    <input type="hidden" name="attribute_id[]" value="<?php echo $data['attribute_id'];?>"> 
                                </th>
                                <?php 
                            }
                        } ?>
                    </div>
                    <th style="width:80px;">QTY</th>
                    <th style="width:80px;">Price</th>
                    <th style="width:80px;">Availability</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-bordered smallfnt product_row" id="product_row<?php if(!empty($product_count)) { echo $product_count; } ?>">
                    <input type="hidden" name="product_row_index[]" value="<?php if(!empty($product_count)) { echo $product_count; } ?>" >
                    <td class="sno"><?php if(!empty($product_count)) { echo $product_count; } ?>
                    </td>
                    <td>
                        <div class="w-100">
                            <input type="radio" name="default_button[]" id="default_button" value="<?php if(!empty($product_count)) { echo $product_count; } ?>">
                        </div>
                    </td>

                    <?php  
                        if(!empty($attribute_list)){
                            foreach($attribute_list as $data){ ?>
                                <?php                                                       
                                    $attribute_value_list= array(); 
                                    $attribute_value_list =$obj->getTableRecords($GLOBALS['attribute_value_table'],'attribute_id', $data['attribute_id']);
                                    // print_r($attribute_value_list); ?>
                                        <td class="<?php echo $obj->encode_decode("decrypt", $data['attribute_name'])?>">
                                            <div class="form-group mb-2">
                                                <div class="form-label-group in-border">
                                                    <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_attribute_value_id[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                        <option value="">Select</option>
                                                        <?php  if(!empty($attribute_value_list)){
                                                            foreach($attribute_value_list as $list){   ?>
                                                                <option value="<?php if(!empty($list['attribute_value_id'])){
                                                                        echo $list['attribute_value_id'];
                                                                    } ?>"> 
                                                                        <?php 
                                                                    if(!empty($list['attribute_value'])){
                                                                        echo $obj->encode_decode("decrypt",$list['attribute_value']);
                                                                    }
                                                                    ?>
                                                                </option>
                                                        
                                                        <?php }
                                                    } ?>                                                    
                                                    </select>
                                                    
                                                    <label style="width:100%;" class="text-center"><?php echo $obj->encode_decode("decrypt",$data['attribute_name']); ?></label>
                                                </div>
                                            </div>
                                        </td>
                                        
                                
                                <?php 
                            } 
                        }  ?>
                    <td>
                        <div class="form-group mb-2 w-auto">
                            <div class="form-label-group in-border">
                                <input type="text" id="" name="quantity[]" class="form-control shadow-none" placeholder="" maxlength="6">
                                <label>QTY</label>
                            </div>
                        </div>
                    </td> 
                    <td>
                        <div class="form-group mb-2 w-auto">
                            <div class="form-label-group in-border">
                                <input type="text" id="" name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_actual_price[]" class="form-control shadow-none" placeholder="">
                                <label>Price</label>
                            </div>
                        </div>
                    </td> 
                    <td>
                        <div class="form-group mb-2 w-auto">
                            <div class="form-label-group in-border">
                                <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_available[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">                                
                                    <option value="available">Available</option>
                                    <option value="not_available">Not Available</option>
                                </select>
                                <label>Availability</label>
                            </div>
                        </div>
                    </td>                     
                    <td>
                        <a class="pe-2 h5 add_button_remove" id="add_btn" onclick="Javascript:addGeneralTableDetails('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-plus text-success"></i></a>
                        <a class="pe-2 h5" id="copy_btn" onclick="Javascript:CloneGeneralTableRow('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>',this)"><i class="fa fa-files-o text-dark"></i></a>
                        <a class="pe-2 h5 delete_button d-none" id="dlt_btn" onclick="Javascript:DeleteGeneralTableRow('<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
     ?>
        <script type="text/javascript">
			jQuery(document).ready(function(){
                jQuery('.append_product_details').find('select').select2();
			});
		</script>
<?php 
}
if(isset($_REQUEST['product_row_category_id'])) {
    $product_row_category_id = $_REQUEST['product_row_category_id'];
    $product_count = $_REQUEST['product_count'];
    $attribute_list = array();
    $attribute_list = $obj->getTableRecords($GLOBALS['attribute_table'],'category_id',$product_row_category_id);
    ?>
           <tr class="table-bordered smallfnt product_row" id="product_row<?php if(!empty($product_count)) { echo $product_count; } ?>">
            <input type="hidden" name="product_row_index[]" value="<?php if(!empty($product_count)) { echo $product_count; } ?>" >
            <td class="sno"><?php if(!empty($product_count)) { echo $product_count; } ?>
            </td>
            <td>
                <div class="w-100">
                    <input type="radio" name="default_button[]" id="default_button" value="<?php if(!empty($product_count)) { echo $product_count; } ?>">
                </div>
            </td>
         

            <?php  
                if(!empty($attribute_list)){
                    foreach($attribute_list as $data){ ?>
                        <?php                                                       
                            $attribute_value_list= array(); 
                            $attribute_value_list =$obj->getTableRecords($GLOBALS['attribute_value_table'],'attribute_id', $data['attribute_id']);
                            // print_r($attribute_value_list); ?>
                                <td class="<?php echo $obj->encode_decode("decrypt", $data['attribute_name'])?>">
                                    <div class="form-group mb-2">
                                        <div class="form-label-group in-border">
                                            <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_attribute_value_id[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Select</option>
                                                <?php  if(!empty($attribute_value_list)){
                                                    foreach($attribute_value_list as $list){   ?>
                                                        <option value="<?php if(!empty($list['attribute_value_id'])){
                                                                echo $list['attribute_value_id'];
                                                            } ?>"> 
                                                                <?php 
                                                            if(!empty($list['attribute_value'])){
                                                                echo $obj->encode_decode("decrypt",$list['attribute_value']);
                                                            }
                                                            ?>
                                                        </option>
                                                
                                                <?php }
                                            } ?>                                                    
                                            </select>
                                            
                                            <label style="width: 145px;" class="text-center"><?php echo $obj->encode_decode("decrypt",$data['attribute_name']); ?></label>
                                        </div>
                                    </div>
                                </td>
                                
                        
                        <?php 
                    } 
                }  ?>
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <input type="text" id="" name="quantity[]" class="form-control shadow-none" placeholder="" maxlength="6">
                        <label>QTY</label>
                    </div>
                </div>
            </td> 
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <input type="text" id="" name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_actual_price[]" class="form-control shadow-none" placeholder="">
                        <label>Price</label>
                    </div>
                </div>
            </td> 
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_available[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">                                
                            <option value="available">Available</option>
                            <option value="not_available">Not Available</option>
                        </select>
                        <label>Availability</label>
                    </div>
                </div>
            </td> 
            <td>
                <a class="pe-2 h5 add_button_remove" id="add_btn" onclick="Javascript:addGeneralTableDetails('<?php if(!empty($product_row_category_id)){ echo $product_row_category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-plus text-success"></i></a>
                <a class="pe-2 h5" id="copy_btn" onclick="Javascript:CloneGeneralTableRow('<?php if(!empty($product_row_category_id)){ echo $product_row_category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>',this)"><i class="fa fa-files-o text-dark"></i></a>
                <a class="pe-2 h5 delete_button d-none" id="dlt_btn" onclick="Javascript:DeleteGeneralTableRow('<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-trash text-danger"></i></a>
            </td>
        </tr>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            // jQuery('select[name="attribute_select"]').select2();
                jQuery('.add_update_form_content').find('select').select2();

        });
    </script>
    <?php 
}
if(isset($_REQUEST['attribute_id']))
{
    $attribute_id = $_REQUEST['attribute_id'];
    $attribute_id = explode(",",$attribute_id);
    $category_id = $_REQUEST['colne_category_id'];
    $product_count = $_REQUEST['row_index'];
    $product_type = $_REQUEST['product_type'];
    $attribute_list =array();
    $attribute_list =$obj->getTableRecords($GLOBALS['attribute_table'],'category_id',$category_id);

        $quantity = $_REQUEST['quantity'];
        $availability = $_REQUEST['availability'];
        $actual_price = $_REQUEST['actual_price'];
        $a =0;
        ?>
        <tr class="table-bordered smallfnt product_row" id="product_row<?php if(!empty($product_count)) { echo $product_count; } ?>">
            <input type="hidden" name="product_row_index[]" value="<?php if(!empty($product_count)) { echo $product_count; } ?>" >
            <td class="sno"><?php if(!empty($product_count)) { echo $product_count; } ?>
            </td>
            <td>
                <div class="w-100">
                    <input type="radio" name="default_button[]" id="default_button" value="<?php if(!empty($product_count)) { echo $product_count; } ?>">
                </div>
            </td>
            <?php  
                if(!empty($attribute_list)){
                    foreach($attribute_list as $data){ ?>
                        <?php                                                       
                            $attribute_value_list= array(); 
                            $attribute_value_list =$obj->getTableRecords($GLOBALS['attribute_value_table'],'attribute_id', $data['attribute_id']);
                            // print_r($attribute_value_list); ?>
                                <td>
                                    <div class="form-group mb-2">
                                        <div class="form-label-group in-border">
                                            <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_attribute_value_id[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">Select</option>
                                                <?php  if(!empty($attribute_value_list)){
                                                    foreach($attribute_value_list as $list){   ?>
                                                        <option value="<?php if(!empty($list['attribute_value_id'])){
                                                                echo $list['attribute_value_id'];
                                                            } ?>" <?php if(!empty($attribute_id[$a]) && $list['attribute_value_id'] == $attribute_id[$a]) { ?> selected <?php } ?>> 
                                                                <?php 
                                                            if(!empty($list['attribute_value'])){
                                                                echo $obj->encode_decode("decrypt",$list['attribute_value']);
                                                            }
                                                            ?>
                                                        </option>
                                                
                                                <?php }
                                            } ?>                                                    
                                            </select>
                                            
                                            <label style="width: 145px;" class="text-center"><?php echo $obj->encode_decode("decrypt",$data['attribute_name']); ?></label>
                                        </div>
                                    </div>
                                </td>
                                
                        
                        <?php 
                        $a++;
                    } 
                }  ?>
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <input type="text" id="" name="quantity[]" class="form-control shadow-none" placeholder="" value="<?php if(!empty($quantity)){ echo $quantity; }?>" maxlength="6">
                        <label>QTY</label>
                    </div>
                </div>
            </td> 
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <input type="text" id="" name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_actual_price[]" class="form-control shadow-none" placeholder="" value="<?php if(!empty($actual_price)){ echo $actual_price; }?>">
                        <label>Price</label>
                    </div>
                </div>
            </td> 
            <td>
                <div class="form-group mb-2 w-auto">
                    <div class="form-label-group in-border">
                        <?php
                            $selected_available = "";$selected_notavailable = "";
                            if(!empty($availability)){
                                if($availability == "available"){
                                    $selected_available = "selected";
                                }
                                if($availability == "available"){
                                    $selected_notavailable = "selected";
                                }                                
                            }
                        ?>
                        <select name="<?php if(!empty($product_count)) { echo $product_count; } ?>_qty_available[]" class="select2 select2-danger smallfnt" data-dropdown-css-class="select2-danger" style="width: 100%;">                                
                            <option value="available" <?php echo $selected_available ?>>Available</option>
                            <option value="not_available" <?php echo $selected_available ?>>Not Available</option>
                        </select>
                        <label>Availability</label>
                    </div>
                </div>
            </td> 
            <td>
                <a class="pe-2 h5 add_button_remove" id="add_btn" onclick="Javascript:addGeneralTableDetails('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-plus text-success"></i></a>
                <a class="pe-2 h5" id="copy_btn" onclick="Javascript:CloneGeneralTableRow('<?php if(!empty($category_id)){ echo $category_id; } ?>','<?php if(!empty($product_count)){ echo $product_count; } ?>',this)"><i class="fa fa-files-o text-dark"></i></a>
                <a class="pe-2 h5 delete_button d-none" id="dlt_btn" onclick="Javascript:DeleteGeneralTableRow('<?php if(!empty($product_count)){ echo $product_count; } ?>')"><i class="fa fa-trash text-danger"></i></a>
            </td>
        </tr>
             <script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery('.add_update_form_content').find('select').select2();
                });
            </script>
        <?php
}