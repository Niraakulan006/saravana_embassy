<?php 
	$page_title = "Estimate";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];

    $add_access_error = ""; $view_access_error = "";

    $from_date = date('Y-m-d', strtotime('-30 days')); $to_date = date('Y-m-d');
    $customer_list = array();
    $customer_list = $obj->getTableRecords($GLOBALS['customer_table'], '', '');
    $customer_count = 0;
    if(!empty($customer_list)) {
        $customer_count = count($customer_list);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php include "link_style_script.php"; ?>
    <script type="text/javascript" src="include/js/estimate.js"></script>
    <script type="text/javascript" src="include/js/tax_calculation.js"></script>
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
                                <div class="row p-2">   
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="form-group mb-0">
                                            <div class="form-label-group in-border pb-2">
                                                <input type="date" name="filter_from_date" class="form-control shadow-none" value="<?php if(!empty($from_date)) { echo $from_date; } ?>" onchange="Javascript:checkDateCheck();" placeholder="">
                                                <label>From Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-6">
                                        <div class="form-group mb-0">
                                            <div class="form-label-group in-border pb-2">
                                                <input type="date" name="filter_to_date" class="form-control shadow-none" value="<?php if(!empty($to_date)) { echo $to_date; } ?>" onchange="Javascript:checkDateCheck();" placeholder="">
                                                <label>To Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <div class="form-group mb-0">
                                            <div class="form-label-group in-border pb-2">
                                                <select name="filter_customer_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option value="">Select Customer</option>
                                                    <?php
                                                        if(!empty($customer_list)) {
                                                            foreach($customer_list as $data) {
                                                                if(!empty($data['customer_id']) && $data['customer_id'] != $GLOBALS['null_value']) {
                                                                    ?>
                                                                    <option value="<?php echo $data['customer_id']; ?>" <?php if($customer_count == '1') { ?>selected<?php } ?>>
                                                                        <?php
                                                                            if(!empty($data['name_mobile_city']) && $data['name_mobile_city'] != $GLOBALS['null_value']) {
                                                                                echo $obj->encode_decode('decrypt', $data['name_mobile_city']);
                                                                            }
                                                                        ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label>Customer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <div class="form-group mb-0">
                                            <div class="form-label-group in-border pb-2">
                                                <select name="filter_state_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option value="">Select State</option>
                                                </select>
                                                <label>State</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-12">
                                        <div class="form-group mb-0">
                                            <div class="form-label-group in-border pb-2">
                                                <select name="filter_district_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option value="">Select District</option>
                                                </select>
                                                <label>District</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_text" id="search_text" style="height:34px;" placeholder="Search By Bill No." aria-label="Search" aria-describedby="basic-addon2">
                                            <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>
                                    <?php if(empty($add_access_error)) { ?>
                                        <div class="col-lg-2 col-md-2 col-4 ms-auto">
                                            <button class="btn btn-danger float-end" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div id="table_listing_records">
                                <?php if(empty($view_access_error)) { ?>
                                    <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                    <div class="new">
                                        <ul class="new nav nav-pills my-3 justify-content-center" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-active-tab" data-bs-toggle="pill" data-bs-target="#pills-active" type="button" role="tab" aria-controls="pills-active" aria-selected="true">Active Bill</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-invoiced-tab" data-bs-toggle="pill" data-bs-target="#pills-invoiced" type="button" role="tab" aria-controls="pills-invoiced" aria-selected="false">Invoiced Bill</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill" data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel" aria-selected="false">Cancelled Bill</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-active" role="tabpanel" aria-labelledby="pills-active-tab" tabindex="0">
                                                <?php 
                                                    $cancelled = 0; $is_invoiced = 0;
                                                    $id = "table-active";
                                                    include("estimate_table.php"); 
                                                ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-invoiced" role="tabpanel" aria-labelledby="pills-invoiced-tab" tabindex="0">
                                                <?php 
                                                    $cancelled = 0; $is_invoiced = 1;
                                                    $id = "table-invoiced";
                                                    include("estimate_table.php"); 
                                                ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab" tabindex="0">
                                                <?php 
                                                    $cancelled = 1; $is_invoiced = 0;
                                                    $id = "table-cancel";
                                                    include("estimate_table.php"); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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
    jQuery(document).ready(function(){
        jQuery("#estimate").addClass("active");
    });
</script>
<script>
    function initializeDataTableIfNeeded(tableId) {
        if (jQuery.fn.DataTable.isDataTable('#' + tableId)) {
            jQuery('#' + tableId).DataTable().destroy();
        }
        if (!jQuery.fn.DataTable.isDataTable('#' + tableId)) {
            jQuery('#' + tableId).DataTable({
                "processing": true,
                "serverSide": true,
                "ordering" : true,
                "searching" : false,
                "columnDefs": [
                    { "orderable": false, "targets": [0,8] }
                ],
                "ajax": {
                    "url": "estimate_changes.php",
                    "type": "POST",
                    "data": function(d) {
                        if(jQuery('input[name="show_cancel_'+tableId+'"]').length > 0) {
                            d.cancel = jQuery('input[name="show_cancel_'+tableId+'"]').val();
                        }
                        if(jQuery('input[name="show_invoiced_'+tableId+'"]').length > 0) {
                            d.invoiced = jQuery('input[name="show_invoiced_'+tableId+'"]').val();
                        }
                        if(jQuery('#search_text').length > 0) {
                            d.search_text = jQuery('#search_text').val();
                        }
                        if(jQuery('input[name="filter_from_date"]').length > 0) {
                            d.filter_from_date = jQuery('input[name="filter_from_date"]').val();
                        }
                        if(jQuery('input[name="filter_to_date"]').length > 0) {
                            d.filter_to_date = jQuery('input[name="filter_to_date"]').val();
                        }
                        if(jQuery('select[name="filter_customer_id"]').length > 0) {
                            d.filter_customer_id = jQuery('select[name="filter_customer_id"]').val();
                        }
                        if(jQuery('select[name="filter_state_id"]').length > 0) {
                            d.filter_state_id = jQuery('select[name="filter_state_id"]').val();
                        }
                        if(jQuery('select[name="filter_district_id"]').length > 0) {
                            d.filter_district_id = jQuery('select[name="filter_district_id"]').val();
                        }
                    }
                },
                "columns": [
                    { "data": "sno", "className": "text-center" },
                    { "data": "estimate_date", "className": "text-center" },
                    { "data": "estimate_number", "className": "text-center" },
                    { "data": "customer_name", "className": "text-center" },
                    { "data": "customer_mobile_number", "className": "text-center" },
                    { "data": "customer_district", "className": "text-center" },
                    { "data": "customer_state", "className": "text-center" },
                    { "data": "bill_total", "className": "text-center" },
                    { "data": "action", "className": "text-center" }
                ]
            });
        }
    }

    // Initial load for active tab
    jQuery(document).ready(function() {
        if(jQuery('.tab-pane.active .datatable').length > 0) {
            var initialTableId = jQuery('.tab-pane.active .datatable').attr('id');
            initializeDataTableIfNeeded(initialTableId);
        }
        // On tab change
        if(jQuery('button[data-bs-toggle="pill"]').length > 0) {
            jQuery('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
                var targetPaneId = jQuery(e.target).attr('data-bs-target'); // e.g., "#pills-draft"
                var tableId = jQuery(targetPaneId).find('.datatable').attr('id');
                initializeDataTableIfNeeded(tableId);
            });
        }

        if(jQuery('#search_text').length > 0) {
            jQuery('#search_text').on('keyup', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
        if(jQuery('input[name="filter_from_date"]').length > 0) {
            jQuery('input[name="filter_from_date"]').on('change', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
        if(jQuery('input[name="filter_to_date"]').length > 0) {
            jQuery('input[name="filter_to_date"]').on('change', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
        if(jQuery('select[name="filter_customer_id"]').length > 0) {
            jQuery('select[name="filter_customer_id"]').on('change', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
        if(jQuery('select[name="filter_state_id"]').length > 0) {
            jQuery('select[name="filter_state_id"]').on('change', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
        if(jQuery('select[name="filter_district_id"]').length > 0) {
            jQuery('select[name="filter_district_id"]').on('change', function() {
                if(jQuery('.tab-pane.active .datatable').length > 0) {
                    jQuery('.tab-pane.active .datatable').DataTable().ajax.reload();
                }
            });
        }
    });
</script>