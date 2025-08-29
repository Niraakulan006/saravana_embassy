<?php 
	$page_title = "Invoice Report";
	include("include_user_check_and_files.php");
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
                        <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                        <div class="border card-box" id="table_records_cover">
                            <div class="card-header align-items-center">
                                <div class="row justify-content-end p-3">  
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="form-group pb-1">
                                            <div class="form-label-group in-border pb-1">
                                                <input type="date" class="form-control shadow-none" placeholder="" required="">
                                                <label>From Date</label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="form-group pb-1">
                                            <div class="form-label-group in-border pb-1">
                                                <input type="date" class="form-control shadow-none" placeholder="" required="">
                                                <label>To Date</label>
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select CUstomer</option>
                                                    <option>Customer 1</option>
                                                    <option>Customer 2</option>
                                                </select>
                                                <label>Select Customer</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select State</option>
                                                    <option>State 1</option>
                                                    <option>State 2</option>
                                                </select>
                                                <label>Select State</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select District</option>
                                                    <option>District 1</option>
                                                    <option>District 2</option>
                                                </select>
                                                <label>Select District</label>
                                            </div>
                                        </div>        
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-6 px-lg-1">
                                        <div class="input-group">
                                            <input type="text" class="form-control" style="height:34px;" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                            <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-12 text-end">
                                        <button class="btn btn-success" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-download"></i> Export </button>  
                                    </div>
                                    <form name="table_listing_form" method="post">
                                        <div class="col-sm-6 col-xl-8">
                                            <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                            <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                            <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                        </div>	
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table nowrap cursor text-center smallfnt">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Customer Name</th>
                                                <th>Mobile</th>
                                                <th>District</th>
                                                <th>State</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>25-08-2025</td>
                                                <td>INV 001</td>
                                                <td>Mahesh</td>
                                                <td>9087678987</td>
                                                <td>Virudhunagar</td>
                                                <td>Tamilnadu</td>
                                                <td>1500.00</td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script src="include/select2/js/select2.min.js"></script>
<script src="include/select2/js/select.js"></script>
<script>
    $(document).ready(function(){
        $("#invoicereport").addClass("active");
        table_listing_records_filter();
    });
</script>