<?php 
	$page_title = "Sales Tax Report";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
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
                        <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                        <div class="border card-box" id="table_records_cover">
                            <div class="card-header align-items-center">
                                <div class="row justify-content-end p-2">   
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="form-group mb-2">
                                            <div class="form-label-group in-border">
                                                <input type="date" id="name" name="name" class="form-control shadow-none" placeholder="" required>
                                                <label>From Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="form-group mb-2">
                                            <div class="form-label-group in-border">
                                                <input type="date" id="name" name="name" class="form-control shadow-none" placeholder="" required>
                                                <label>To Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="form-group mb-2">
                                            <div class="form-label-group in-border mb-0">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select Party</option>    
                                                    <option>Mahesh</option>
                                                    <option>Prabhu</option>
                                                </select>
                                                <label>Select Party</label>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3 col-6 text-end">
                                        <button class="btn btn-success m-1" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-print"></i> Print </button>
                                        <button class="btn btn-danger m-1" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-download"></i> Export </button>  
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
                                    <table class="table table-bordered nowrap text-center smallfnt wrd-brk">
                                            <thead class="smallfnt wrd-brk">
                                            <tr>
                                                <th class="text-center px-2 py-2" style="vertical-align:middle;" rowspan="3">S.No</th>
                                                <th class="text-center px-2 py-2" style="vertical-align:middle;"  rowspan="3">Inv.No & Date</th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  rowspan="3">Party Name & GST</th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  colspan="10">Tax Details</th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  colspan="3">Tax Value</th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  rowspan="3"> Tax Amount </th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  rowspan="3">Total Amount</th>
                                                
                                            </tr>
                                            <tr>
                                                <th class="text-center px-2 py-2"  colspan="2"> 0% </th>
                                                <th class="text-center px-2 py-2"  colspan="2"> 5% </th>
                                                <th class="text-center px-2 py-2"  colspan="2"> 12% </th>
                                                <th class="text-center px-2 py-2"  colspan="2"> 18% </th>
                                                <th class="text-center px-2 py-2"  colspan="2"> 28% </th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  rowspan="2"> CGST </th>
                                                <th class="text-center px-2 py-2"  style="vertical-align:middle;"  rowspan="2"> SGST </th>
                                                <th class="text-center px-2 py-2" style="vertical-align:middle;"   rowspan="2"> IGST </th>
                                            </tr>
                                            <tr style="border-top:0;">
                                                <th>HSN & <br> Quantity</th>
                                                <th>Value</th>
                                                <th>HSN & <br> Quantity</th>
                                                <th>Value</th>
                                                <th>HSN & <br> Quantity</th>
                                                <th>Value</th>
                                                <th>HSN & <br> Quantity</th>
                                                <th>Value</th>
                                                <th>HSN & <br> Quantity</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>14-06-2024</td>
                                                    <td>Ram Kumar Swamy</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
                                                    <td>01</td>
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
<script>
    $(document).ready(function(){
        $("#salestaxreport").addClass("active");
        table_listing_records_filter();
    });
</script>