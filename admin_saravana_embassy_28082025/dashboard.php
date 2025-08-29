<?php 
	$page_title = "Dashboard";
	include("include_user_check_and_files.php");
?>
<?php include "header.php"; ?>
<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-contnet-center mt-3">
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="form-group pb-1">
                        <div class="form-label-group in-border pb-1">
                            <input type="date" class="form-control shadow-none" placeholder="" required="">
                            <label>From Date</label>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <div class="form-group pb-1">
                        <div class="form-label-group in-border pb-1">
                            <input type="date" class="form-control shadow-none" placeholder="" required="">
                            <label>To Date</label>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="small-box bg-box1">
                        <div class="inner">
                            <h3 class="text-white">1245</h3>
                            <p class="text-white">Pending Installs</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">View Now <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>    
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="small-box bg-box3">
                        <div class="inner">
                            <h3 class="text-white">130</h3>
                            <p class="text-white">Open Complaints</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="small-box bg-box2">
                        <div class="inner">
                            <h3 class="text-white">250</h3>
                            <p class="text-white">Waranty Expirations</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fingerprint"></i>
                        </div>
                        <a href="#" class="small-box-footer">View Now<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header p-2">
                            <h4 class="card-title p-3">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart" class="chartjs-chart" data-colors='["--vz-primary-rgb, 0.2", "--vz-primary", "--vz-info-rgb, 0.2", "--vz-info"]'></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title p-3">Donut Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="doughnut" class="chartjs-chart" data-colors='["--vz-primary", "--vz-light"]'></canvas>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="small-box bg-box1">
                        <div class="inner">
                            <h3 class="text-white">1245</h3>
                            <p class="text-white">Completed Task</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">View Now <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>    
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="small-box bg-box3">
                        <div class="inner">
                            <h3 class="text-white">130</h3>
                            <p class="text-white">Pending Task</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->   
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#dashboard").addClass("active");
    });
</script>  