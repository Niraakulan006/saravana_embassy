<?php 
	$page_title = "Estimate";
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
                    <div class="card">
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
                                    <div class="col-lg-4 col-md-6 col-12 text-end">
                                        <button class="btn btn-dark" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-print"></i> Show Inactive bills </button>
                                        <button class="btn btn-success" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-download"></i> Export </button>
                                        <button class="btn btn-danger" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>   
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
                            <div id="table_listing_records" class="table-responsive"></div>
                        </div>
                    </div>   
                </div>
            </div>  
        </div>
    </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
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
                    <div class="col-lg-12">
                        <div class="h4">Queries</div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="table-responsive text-center">
                            <table class="table nowrap cursor smallfnt w-100 table-bordered">
                                <thead class="bg-dark smallfnt">
                                    <tr style="white-space:pre;">
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>City</th>
                                        <th>Estimate No</th>
                                        <th>Pincode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Mahesh</td>
                                        <td>9876786756</td>
                                        <td>Tamilnadu</td>
                                        <td>Virudhunagar</td>
                                        <td>Sivakasi</td>
                                        <td>EST 001</td>
                                        <td>626130</td>
                                    </tr>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-lg-12">
                        <div class="h4">Products</div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="table-responsive text-center">
                            <table class="table nowrap cursor smallfnt w-100 table-bordered">
                                <thead class="bg-dark smallfnt">
                                    <tr style="white-space:pre;">
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Attribute</th>
                                        <th>Attribute Value</th>
                                        <th>Qty</th>
                                        <th>Amount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Product 01</td>
                                        <td>Attribute 1</td>
                                        <td>Attribute Value 01</td>
                                        <td>50</td>
                                        <td>20000</td>
                                        <td>200000</td>
                                    </tr>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-lg-12">
                        <div class="h4">Queries</div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-3">
                        <div class="heading5">Queries For Question ?</div>   
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                <label>Answer</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <input type="date" class="form-control shadow-none" placeholder="" required>
                                <label>Waranty Start Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <div class="input-group">
                                    <input type="text" id="opening_balance" name="opening_balance" value="" class="form-control shadow-none">
                                    <label>Waranty Type</label>
                                    <div class="input-group-append" style="width:40%!important;">
                                        <select name="opening_balance_type" class="select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option value="1" data-select2-id="14">Days</option>
                                            <option value="2">Month</option>
                                            <option value="2">Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <input type="date" class="form-control shadow-none" placeholder="" required>
                                <label>Waranty End Date</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-lg-12">
                        <div class="h4">Assign Technician</div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option>Select Installation Type</option>    
                                    <option>Agent </option>
                                    <option>Company Technician</option>
                                    <option>Cancel</option>
                                </select>
                                <label>Installation Type</label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <input type="date" class="form-control shadow-none" placeholder="" required>
                                <label>Installation Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option>Select Installation Person</option>    
                                    <option>Person 1 </option>
                                    <option>Person 2</option>
                                </select>
                                <label>Installation Person</label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option>Select Payment Mode</option>    
                                    <option>Online</option>
                                    <option>Cash</option>
                                </select>
                                <label>Payment mode</label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                <label>Remarks</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-lg-1 mt-3">
                        <div class="form-group">
                            <div class="form-label-group in-border">
                                <input type="text" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);"  placeholder="" required="">
                                <label>Agent Details</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
<!-- Modal End-->
<!-- Modal -->
<div class="modal fade" id="trackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-3">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Product Queries</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        EST - 0001
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Estimate Date : 25-08-2025</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Estimate Number : EST001</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Amount : 25,000.00</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="h6">Question : Question 1</div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="h6">Answer : Answer 01</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Waranty Date : 25-08-2025</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Waranty End Date : EST001</div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="h6">Status : Completed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Installation - 0001
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 pt-2">
                                <div class="h6">Installation Date : 25-08-2025</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 pt-2">
                                <div class="h6">Technician Name : Raj Kumar</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 pt-2">
                                <div class="h6">Technician Number : 9876765456</div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 pt-2 text-end">
                                <div class="h6">Status : Completed</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Service - 0001
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table nowrap cursor text-center smallfnt table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Ticket Created Date</th>
                                            <th>Ticket Accepted Date</th>
                                            <th>Technician Details</th>
                                            <th>Technician Visited Date & Time</th>
                                            <th>Technician Ticket Closed Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>25-08-2025</td>
                                            <td>25-08-2025</td>
                                            <td>Mahesh - 9876545678</td>
                                            <td>25-08-2025 13:34</td>
                                            <td>25-08-2025 13:34</td>
                                        </tr>
                                    </tbody>
                                </table>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 pt-2 text-end">
                                    <div class="h6">Status : Completed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
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
<!-- Modal End-->
<script>
    $(document).ready(function(){
        $("#estimate").addClass("active");
        table_listing_records_filter();
    });
</script>