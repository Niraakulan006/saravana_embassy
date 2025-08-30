<?php 
	$page_title = "Desktop Banner";
	include("include_user_check_and_files.php");
    $position_name = "Desktop";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php 
	include "link_style_script.php"; ?>
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
                            <div class="border card-box add_update_form_content" id="add_update_form_content">
                                <?php
                                    $target_dir = $obj->image_directory();
                                    $desktop_banner_name = array(); $desktop_banner_positions = array(); $desktop_banner_category_id = array(); 
                                    if(!empty($position_name)) {
                                        $desktop_banner_list = $obj->getTableRecords($GLOBALS['home_banner_table'], 'position_name', $position_name);
                                        if(!empty($desktop_banner_list)) {
                                            foreach($desktop_banner_list as $data) {
                                                if(!empty($data['banner_image']) && $data['banner_image'] != $GLOBALS['null_value']) {
                                                    $desktop_banner_name = explode(",", $data['banner_image']);
                                                }
                                                if(!empty($data['banner_position']) && $data['banner_position'] != $GLOBALS['null_value']) {
                                                    $desktop_banner_positions = explode(",", $data['banner_position']);
                                                }
                                                if(!empty($data['banner_category_id']) && $data['banner_category_id'] != $GLOBALS['null_value']) {
                                                    $desktop_banner_category_id = explode(",", $data['banner_category_id']);
                                                }
                                            }
                                        }
                                    }

                                    $category_list = array();
                                    $category_list = $obj->getTableRecords($GLOBALS['category_table'], '', '');
                                ?>
                                <form class="mt-5 poppins pd-20 redirection_form" name="desktop_banner_form" method="POST">
                                    <input type="hidden" name="banner_position_name" value="<?php echo $position_name; ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="desktop_home_banner_cover" class="form-group">
                                                <h5 class="w-100 text-center">Desktop Banner Size - 1500 x 500</h5> 
                                                <h6 class="w-100 text-center">Max.Upload Size - 2 MB</h6> 
                                                <div class="image-upload text-center">
                                                    <label for="desktop_home_banner">   
                                                        <div class="desktop_home_banner_list row">
                                                            <div class="col-12">
                                                                <div class="cover">
                                                                    <img id="desktop_home_banner_preview" src="include/images/upload_image.png" style="max-width: 150px;" />
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <input type="file" name="desktop_home_banner" id="desktop_home_banner" style="display: none;" accept="image/*" multiple />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row multiple_upload_image_list desktop_home_banner_cover mx-0 py-2">
                                        <?php
                                            if(!empty($desktop_banner_name)) {
                                                for($i=0; $i < count($desktop_banner_name); $i++) {
                                                    if(file_exists($target_dir.$desktop_banner_name[$i])) {
                                                        ?>
                                                        <div class="col-sm-6">
                                                            <div id="banner_div" class="form-group w-100 px-3 py-3">
                                                                <button type="button" onclick="Javascript:delete_banner_modal(this, 'desktop_home_banner');" class="btn btn-danger float-end"><i class="fa fa-close"></i></button>
                                                                <img id="desktop_home_banner_preview" src="<?php echo $target_dir.$desktop_banner_name[$i]; ?>" class="img-fluid">
                                                                <input type="hidden" name="banner_name[]" class="form-control" value="<?php echo $desktop_banner_name[$i]; ?>">
                                                                <div class="row banner_row mx-0 mt-2">
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="banner_position[]" class="form-control mx-auto" value="<?php echo $desktop_banner_positions[$i]; ?>" placeholder="Position" style="width: 100px;">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-group">
                                                                            <div class="w-100">
                                                                                <select class="form-control" name="banner_category_id[]">
                                                                                    <option value="">Select Category</option>
                                                                                    <option value="all" <?php if(!empty($desktop_banner_category_id[$i]) && $desktop_banner_category_id[$i] == 'all') { ?>selected<?php } ?>>All</option>
                                                                                    <?php
                                                                                        if(!empty($category_list)) {
                                                                                            foreach($category_list as $data) {
                                                                                                if(!empty($data['category_id']) && $data["name"] != $GLOBALS['null_value']) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($desktop_banner_category_id[$i]) && $desktop_banner_category_id[$i] == $data['category_id']) { ?>selected<?php } ?>>
                                                                                                        <?php
                                                                                                            echo $obj->encode_decode("decrypt", $data["name"]);
                                                                                                        ?>
                                                                                                    </option>
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="w-100 text-center">
                                        <button class="btn btn-primary btnwidth submit_button" type="button" onClick="Javascript:SaveModalContent('desktop_banner_form', 'banner_changes.php', 'desktop_banner.php');">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script type="text/javascript" src="include/js/image_upload.js"></script>
<script>
    $(document).ready(function(){
        $("#desktop_banner").addClass("active");
        table_listing_records_filter();
    });
</script>