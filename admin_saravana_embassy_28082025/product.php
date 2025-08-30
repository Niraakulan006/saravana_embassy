<?php 
    include("include_user_check_and_files.php");
	$page_title = "Product";

    $category_list = array();
    $category_list = $obj->getCategoryWithNoSubCategory();
    
    $login_staff_id = ""; $access_error ="";

	if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
        if($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'] == $GLOBALS['staff_user_type']) {
            $permission_module = $GLOBALS['product_module'];
        }
    }

	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php include "link_style_script.php"; ?>
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
                                                    <select class="select2 select2-danger" name="category_filter" id="category_filter" onchange="Javascript:table_listing_records_filter();" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                        <option value="">Select Category</option>    
                                                        <?php  
                                                                    if(!empty($category_list)){
                                                                        foreach($category_list as $data){ ?>
                                                                            <option value="<?php if(!empty($data['category_id'])){echo $data['category_id'];} ?>">
                                                                                <?php
                                                                                    if(!empty($data['name'])){
                                                                                        echo $obj->encode_decode("decrypt",$data['name']);
                                                                                    }
                                                                                ?>
                                                                            </option>
                                                                            <?php
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
                                                    <select class="select2 select2-danger" name="filter_product_type" data-dropdown-css-class="select2-danger" style="width: 100%;" onChange="Javascript:table_listing_records_filter();">   
                                                        <option value="">Select Product Type</option>   
                                                        <option value="1">Online</option>
                                                        <option value="2">Billing</option>
                                                        <option value="3">Online & Billing</option>                                                        
                                                    </select>
                                                    <label>Select Product Type</label>
                                                </div>
                                            </div>        
                                        </div>                                        
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" style="height:34px;" name="search_text" placeholder="Search" aria-label="Search" onKeyUp="Javascript:table_listing_records_filter();"  aria-describedby="basic-addon2">
                                                <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12 text-end">
                                            <button class="btn btn-dark" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-print"></i> Print </button>
                                            <button class="btn btn-success" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-download"></i> Export </button>
                                            <?php
                                                $access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_module = $GLOBALS['product_module'];
                                                    $permission_action = $add_action;
                                                    include('user_permission_action.php');
                                                }
                                                if(empty($access_error)) {
                                            ?>
                                               <button class="btn btn-danger" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>   
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-6 col-xl-8">
                                            <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                            <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                            <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                        </div>	                                        
                                    </div>
                                </form>
                            </div>
                            <div id="table_listing_records" class="table-responsive"></div>
                        </div>
                    </div>   
                </div>
            </div>  
        </div>
    </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script type="text/javascript" src="include/js/image_upload.js"></script>
<script type="text/javascript" src="include/js/action_changes.js"></script>            

<!-- Modal -->
<div class="modal fade" id="queriesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-bottom pb-3">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Queries</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <div class="input-group">
                            <input type="text" id="" name="" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required="">
                            <label>Product Question</label>
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="table-responsive text-center">
                    <table class="table nowrap cursor smallfnt w-100 table-bordered">
                        <thead class="bg-dark smallfnt">
                            <tr style="white-space:pre;">
                                <th>#</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Question 01</td>
                                <td><a class="pe-2" href="#"><i class="fa fa-trash text-danger"></i></a></td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
            </div>
            <div class="col-md-12 pt-3 text-center">
                <button class="btn btn-danger" type="button">
                    Submit
                </button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#product").addClass("active");
        table_listing_records_filter();
    });
</script>