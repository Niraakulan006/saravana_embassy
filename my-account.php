<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$meta_file_name = "login_page";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
?>
<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<?php include("style_script.php"); ?>
    <link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/select2-bootstrap4.min.css">
    <script src="js/select.js"></script>
	<script src="js/select2.min.js"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div class="container-fluid px-lg-5 pad">
    <div class="row">
        <div class="col-lg-3">
			<div class="sticky-top1">
				<div class="manrope fw-600 clr1 py-2 px-2 heading5" style="background: #eeeeee;"> My Account </div>
				<div class="bg-light px-3 py-3 ">
					<div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link mb-2 p-2 active" data-toggle="pill" href="#id1" role="tab">
							<span class="poppins smallfnt">My Profile</span>
						</a>
						<a class="nav-link mb-2 p-2" data-toggle="pill" href="#id2" role="tab">
							<span class="poppins smallfnt">Wallet</span>
						</a>
						<a class="nav-link mb-2 p-2" data-toggle="pill" href="#id3" role="tab">
							<span class="poppins smallfnt">My Orders</span>
						</a>
						<a class="nav-link mb-2 p-2" data-toggle="pill" href="#id4" role="tab">
							<span class="poppins smallfnt">Complaint History</span>
						</a>
						<a class="nav-link mb-2 p-2" data-toggle="pill" href="#id5" role="tab">
							<span class="poppins smallfnt">Report</span>
						</a>
					</div>
				</div>
			</div>
        </div>
        <div class="col-lg-9">
            <div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane shadow bg-white active p-3" id="id1" role="tabpanel">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pb-3">
								<div class="manrope clr1 fw-600 heading3">My Profile</div>
							</div>
                        </div>
                    </div>
					<div class="col-lg-12">
                        <form class="border p-lg-3 p-1" name="contact-form" method="POST">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Name</label>
                                        <input type="text" class="form-control poppins smallfnt" name="" placeholder="Enter Your Name *">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Mobile Number</label>
                                        <input type="text" class="form-control poppins smallfnt" name="" placeholder="Enter Your Mobile Number *">
                                    </div>
                                </div>	
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Email</label>
                                        <input type="text" class="form-control poppins smallfnt" name="" placeholder="Enter Your Email *">
                                    </div>
                                </div>	
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Address</label>
                                        <textarea class="form-control poppins smallfnt" name="" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Select State</label>
                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option>Select State</option>
                                            <option>State 1</option>
                                            <option>State 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Select District</label>
                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option>Select District</option>
                                            <option>District 1</option>
                                            <option>District 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Select City</label>
                                        <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                            <option>Select City</option>
                                            <option>City 1</option>
                                            <option>City 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12 pt-2">
                                    <div class="w-100">
                                        <label class="poppins smallfnt">Pincode</label>
                                        <input type="text" class="form-control poppins smallfnt" name="" placeholder="Pincode *">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 pt-2 pt-4 text-center">
                                    <button class="poppins text-center common_button"><a href="#" class="text-white">SUBMIT</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
				<div class="tab-pane shadow bg-white p-3" id="id2" role="tabpanel">
                  <div class="container">
                        <div class="row">
                            <div class="col-lg-12 pb-3">
								<div class="manrope clr1 fw-600 heading3">Wallet History</div>
							</div>
                            <div class="col-lg-12">
								<div class="table-responsive">
									<table class="table nowrap cursor bg-white table-bordered">
										<thead class="bg-light smallfnt poppins text-center">
											<tr class="wrdbrk">
                                                <th>#</th>
                                                <th>Bill No</th>
												<th>Percentage</th>
												<th>Amount</th>
												<th>Type</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="poppins smallfnt text-center">1</div></td>
												<td>
													<div class="poppins smallfnt text-center">SAR 001</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">2.5%</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center"><i class="bi bi-currency-rupee"></i>1999.00</div>
												</td>
                                                <td>
                                                    <div class="poppins smallfnt text-center">Credited</div>
                                                </td>
											</tr>
                                            <tr>
												<td><div class="poppins smallfnt text-center">1</div></td>
												<td>
													<div class="poppins smallfnt text-center">SAR 001</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">20%</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center"><i class="bi bi-currency-rupee"></i>1999.00</div>
												</td>
                                                <td>
                                                    <div class="poppins smallfnt text-center">Debited</div>
                                                </td>
											</tr>
										</tbody>
									</table>  
								</div>
							</div>
                        </div>
                    </div>
				</div>
				<div class="tab-pane shadow bg-white p-3" id="id3" role="tabpanel">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 pb-4">
								<div class="manrope clr1 fw-600 heading3">My Orders</div>
							</div>
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table nowrap cursor bg-white table-bordered">
										<thead class="bg-light smallfnt poppins text-center">
											<tr class="wrdbrk">
                                                <th>Date & Enquiry No</th>
                                                <th>Order No</th>
												<th>Product Information</th>
												<th>Quantity</th>
                                                <th>Total Value</th>
												<th>Purchase Status</th>
												<th>Installation Status</th>
												<th>Warranty</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="poppins smallfnt text-center">30-08-2025 ENQ 001</div></td>
												<td>
													<div class="poppins smallfnt text-center">ORD 0001</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV  </div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">2</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center"> <i class="bi bi-currency-rupee"></i>1999.00 </div>
												</td>
												<td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
                                                <td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
                                                <td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="" href="#" role="button" data-toggle="dropdown">
                                                            &ensp; <i class="bi bi-three-dots text-dark"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#supportmodal"><i class="bi bi-pencil"></i> &ensp; Support Request</a>
                                                        </div>
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
				<div class="tab-pane shadow bg-white p-3" id="id4" role="tabpanel">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 pb-4">
								<div class="manrope clr1 fw-600 heading4">Complaint History</div>
							</div>
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table nowrap cursor bg-white table-bordered">
										<thead class="bg-light smallfnt poppins text-center">
											<tr class="wrdbrk">
                                                <th>#</th>
                                                <th>Created Date</th>
												<th>Ticket Number</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="poppins smallfnt text-center">1</div></td>
												<td>
													<div class="poppins smallfnt text-center">30-08-2025</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">TCK 001</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">Completed</div>
												</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="" href="#" role="button" data-toggle="dropdown">
                                                            &ensp; <i class="bi bi-three-dots text-dark"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#"><i class="bi bi-eye"></i> &ensp; View & Update</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#servicemodal"><i class="bi bi-pencil"></i> &ensp; Service Feedback</a>
                                                        </div>
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
				<div class="tab-pane shadow bg-white p-3" id="id5" role="tabpanel">
                    <div class="container">
						<div class="row">
							<div class="col-lg-12 pb-4">
								<div class="manrope clr1 fw-600 heading4">Report</div>
							</div>
							<div class="col-lg-12">
								<div class="table-responsive">
									<table class="table nowrap cursor bg-white table-bordered">
										<thead class="bg-light smallfnt poppins text-center">
											<tr class="wrdbrk">
                                                <th>Date & Enquiry No</th>
                                                <th>Order No</th>
												<th>Product Information</th>
												<th>Quantity</th>
                                                <th>Total Value</th>
												<th>Purchase Status</th>
												<th>Installation Status</th>
												<th>Warranty</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><div class="poppins smallfnt text-center">30-08-2025 ENQ 001</div></td>
												<td>
													<div class="poppins smallfnt text-center">ORD 0001</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV  </div>
												</td>
												<td>
													<div class="poppins smallfnt text-center">2</div>
												</td>
												<td>
													<div class="poppins smallfnt text-center"> <i class="bi bi-currency-rupee"></i>1999.00 </div>
												</td>
												<td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
                                                <td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
                                                <td>
													<div class="poppins smallfnt text-center clr-gray"> 12-05-2025 </div>
												</td>
												<td>
													<div class="text-center">
														<a href="#" class="text-center text-dark"><i class="bi bi-cloud-arrow-down-fill"></i></a>
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
    </div>
</div>
<?php include ("footer.php")?>
<div class="modal fade product_view" id="supportmodal" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="poppins">Support Request</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
                    <div class="col-lg-12 col-md-12 col-12 pt-2">
                        <div class="w-100">
                            <label class="poppins smallfnt">Complaint Details</label>
                            <textarea class="form-control poppins smallfnt" name="" placeholder="Enter Your Complaint Details"></textarea>
                        </div>
                    </div>
                </div>    
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-3 col-12 px-lg-1">
                        <img src="images/cloudupload.png" class="img-fluid w-50 mx-auto d-block" alt="Upload" title="Upload">
                        <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6 mt-3">
                        <img src="images/product1.webp" class="img-fluid" alt="Uploads" title="Uploads">
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 mt-3">
                        <img src="images/product2.webp" class="img-fluid" alt="Uploads" title="Uploads">
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 mt-3">
                        <img src="images/product3.webp" class="img-fluid" alt="Uploads" title="Uploads">
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 mt-3">
                        <img src="images/product4.webp" class="img-fluid" alt="Uploads" title="Uploads">
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
<div class="modal fade product_view" id="servicemodal" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="poppins">Service Feedback</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
                    <div class="col-lg-12 col-md-12 col-12 pt-2">
                        <div class="w-100">
                            <label class="poppins smallfnt">Feedback</label>
                            <textarea class="form-control poppins smallfnt" name="" placeholder="Enter Your Feedback"></textarea>
                        </div>
                    </div>
					<div class="col-lg-12 pt-3">
                        <div class="h6 pb-2">Ratings : 
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star-half"></i>
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
<script>
    new WOW().init();
</script>
</body>
</html>