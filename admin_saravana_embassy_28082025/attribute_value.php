<?php 
	$page_title = "Attribute Value";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
    $login_staff_id = ""; $access_error ="";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
        if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
            $login_staff_id =  $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['attribute_value_module'];
            include("user_permission_check.php");
        }
    }

    
    $category_list = array();
    $category_list = $obj->getTableRecords($GLOBALS['category_table'], '', '');

     
    $attribute_list = array();
    $attribute_list = $obj->getTableRecords($GLOBALS['attribute_table'], '', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php include "link_style_script.php"; ?>
     <script type="text/javascript" src="include/js/attribute.js"></script>
</head>	
<body>
<?php include "header.php"; ?>
<!--Right Content-->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                            <div class="border card-box" id="table_records_cover">
                                <div class="card-header align-items-center">
                                    <form name="table_listing_form" method="post">
                                        <div class="row justify-content-end p-2">
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-group">
                                                    <div class="form-label-group in-border">
                                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" name="category_filter" id="category_filter"  onchange="Javascript:selectedCategoryList(this.value);table_listing_records_filter();" style="width: 100%;">
                                                            <option value="">Select Category</option>    
                                                        <?php
                                                            if(!empty($category_list)) {
                                                                foreach($category_list as $data) {
                                                                    /* if(!empty($data['attribute_check'])){ */ 
                                                                        ?>
                                                                        <option value="<?php if(!empty($data['category_id'])) { echo $data['category_id']; } ?>" <?php if(!empty($category_id) && $data['category_id'] == $category_id) { ?> selected <?php } ?>>
                                                                            <?php
                                                                                if(!empty($data['name'])) {
                                                                                    $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                                                                    echo $data['name'];
                                                                                }
                                                                            ?>
                                                                        </option>
                                                                        <?php
                                                                    /* } */
                                                                }
                                                            }
                                                        ?>
                                                        </select>
                                                        <label>Select Category</label>
                                                    </div>
                                                </div>        
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-group">
                                                    <div class="form-label-group in-border">
                                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" name="attribute_filter" id="attribute_filter" onchange="Javascript:table_listing_records_filter();" style="width: 100%;">
                                                            <option value="">Select Attribute</option>   
                                                        <?php 
                                                            if(!empty($attribute_list)) {
                                                                foreach($attribute_list as $data) {
                                                                ?>
                                                                    <option value="<?php if(!empty($data['attribute_id'])) { echo $data['attribute_id']; } ?>" <?php if(!empty($attribute_id) && $data['attribute_id'] == $attribute_id) { ?> selected <?php } ?>>
                                                                        <?php
                                                                            if(!empty($data['attribute_name'])) {
                                                                                $data['attribute_name'] = $obj->encode_decode('decrypt', $data['attribute_name']);
                                                                                echo $data['attribute_name'];
                                                                            }
                                                                        ?>
                                                                    </option>
                                                        <?php
                                                                }
                                                            }
                                                        ?> 
                                                    </select>
                                                        <label>Select Attribute</label>
                                                    </div>
                                                </div>        
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-8">
                                                <div class="input-group">
                                                    <input type="text" name="search_text" class="form-control" style="height:34px;" onkeyup="Javascript:table_listing_records_filter();" placeholder="Search By Attribute Value" aria-label="Search" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                                </div>
                                            </div>
                                            <?php
                                            $access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_module = $GLOBALS['attribute_value_module'];
                                                    $permission_action = $add_action;
                                                    include('user_permission_action.php');
                                                }
                                                if(empty($access_error)) {
                                            ?>
                                                <div class="col-lg-2 col-md-6 col-4 text-end">
                                                    <button class="btn btn-danger" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>
                                                </div>   
                                            <?php } ?>                                         
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                                <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                            </div>                                             
                                        </div>
                                    </form> 
                                </div>
                                <div id="table_listing_records"></div>
                            </div>
                        </div>   
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#attributevalue").addClass("active");
        table_listing_records_filter();
    });
</script>