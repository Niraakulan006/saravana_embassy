<?php 
	$page_title = "Meta Tags";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
    $file_names = array('Login Page', 'Register Page', 'Home', 'About', 'Contact Us', 'Terms & Conditions', 'Privacy Policy', 'Product');
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
                                <div class="row mx-0 justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-12 py-3">
                                        <div class="form-group in-border">
                                            <div class="form-label-group">
                                                <select name="meta_tags_file" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:GetMetaTagsFile(this.value);">
                                                    <?php
                                                        if(!empty($file_names)) {
                                                            for($i=0; $i < count($file_names); $i++) {
                                                                $file_value = "";
                                                                $file_value = strtolower($file_names[$i]);
                                                                $file_value = str_replace(" ", "_", $file_value);
                                                                ?>
                                                                <option value="<?php echo $file_value; ?>">
                                                                    <?php
                                                                        echo $file_names[$i];
                                                                    ?>
                                                                </option>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row separate_row mx-0 justify-content-center"></div>
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
        $("#meta_tags").addClass("active");
        // table_listing_records_filter();
        GetMetaTagsFile('login_page');
    });
</script>