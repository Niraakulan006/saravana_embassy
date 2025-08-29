<?php 
	$page_title = "Completed Task";
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
                                        <div class="input-group">
                                            <input type="text" class="form-control" style="height:34px;" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                            <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-4 col-12 text-end">
                                        <button class="btn btn-success" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-print"></i> Print </button>
                                        <button class="btn btn-danger" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-download"></i> Excel</button>   
                                    </div> -->
                                    <form name="table_listing_form" method="post">
                                        <div class="col-sm-6 col-xl-8">
                                            <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                            <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                            <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                        </div>	
                                    </form>
                                </div>
                            </div>
                            <div id="table_listing_records" class="table-responsive">
                                <table class="table nowrap cursor text-center smallfnt">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Date</th>
                                            <th>Ticket No</th>
                                            <th>Technician Name</th>
                                            <th>Mobile</th>
                                            <th>Customer Name</th>
                                            <th>Mobile</th>
                                            <th>Location</th>
                                            <th>Task</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>25-08-2025</td>
                                            <td>ES 001</td>
                                            <td>Mahesh</td>
                                            <td>9087678987</td>
                                            <td>Prabhu</td>
                                            <td>9087678987</td>
                                            <td>Virudhunagar</td>
                                            <td>Installation</td>
                                            <td>1500.00</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye"></i> View</a></li>
                                                    </ul>
                                                </div>
                                            </td>
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
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-3">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-9 pt-lg-0 pt-3">
                        <div class="h5 text-danger">Customer Feedback</div>
                        <div class="h6 pb-2">This Product is very good</div>
                    </div>
                    <div class="col-lg-3 pt-lg-0 pt-3">
                        <div class="h6 pb-2">Ratings : 
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End-->
<script>
    $(document).ready(function(){
        $("#completedtask").addClass("active");
        // table_listing_records_filter();
    });
</script>