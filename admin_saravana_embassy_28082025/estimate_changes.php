<?php
	include("include_files.php");
	if(isset($_REQUEST['show_estimate_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Estimate</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('estimate.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group mb-1">
                        <div class="form-label-group in-border pb-2">
                            <input type="date" class="form-control shadow-none" placeholder="" required>
                            <label>Date</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border chargesaction">
                            <div class="input-group">
                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" data-placeholder="Select a State" style="width: 100%">
                                    <option>Select Customer</option>
                                    <option>Customer 1</option>
                                    <option>Customer 2</option>
                                </select>
                                <label>Select Customer</label>
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color:#f06548!important; cursor:pointer; height:100%;"><i class="fa fa-plus text-white"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Type</option>    
                                <option>Credit Bill </option>
                                <option>Counter Sales</option>
                            </select>
                            <label>Estimate Type</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Tax Type</option>    
                                <option>Inclusive </option>
                                <option>Exclusive</option>
                            </select>
                            <label>Select Tax Type</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center p-3">
                <div class="col-lg-12">
                    <div class="table-responsive text-center">
                        <table class="table nowrap cursor smallfnt w-100 table-bordered text-center">
                            <thead class="bg-dark smallfnt">
                                <tr style="white-space:pre;">
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Attribute</th>
                                    <th>Attribute Value</th>
                                    <th style="width:80px;">QTY</th>
                                    <th style="width:80px;">Rate</th>
                                    <th style="width:80px;">Amount</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select Product</option>
                                                    <option>Product 01</option>
                                                    <option>Product 02</option>
                                                </select>
                                                <label>Select Product</label>
                                            </div>
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select Attribute</option>
                                                    <option>Attribute 01</option>
                                                    <option>Attribute 02</option>
                                                </select>
                                                <label>Select Attribute</label>
                                            </div>
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Select Attribute Value</option>
                                                    <option>Attribute Value 01</option>
                                                    <option>Attribute Value 02</option>
                                                </select>
                                                <label>Select Attribute Value</label>
                                            </div>
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="name" name="name" class="form-control shadow-none" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                                                <label>QTY</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="name" name="name" class="form-control shadow-none" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                                                <label>Price</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1200.00</td>
                                    <td>
                                        <a class="pe-2 h5" href="#"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2" class="text-right">
                                        <input type="text" style="width:200px; float:right;" name="" class="form-control" placeholder="Extra Chargers Name">
                                    </td>
                                    <td colspan="4" class="text-right">
                                        <input style="width:200px;" type="text" name="discount" class="form-control" placeholder="Extra Charges">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-right">Total Amount : </td>
                                    <td colspan="2" class="text-left">5929.00</td>
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
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
        </form>
		<?php
    } 
    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; ?>
        
		<table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Date</th>
                    <th>Estimate No</th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>District</th>
                    <th>State</th>
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
                    <td>Virudhunagar</td>
                    <td>Tamilnadu</td>
                    <td>1500.00</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-print"></i> Print</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#queriesModal"><i class="fa fa-pencil-square-o"></i> Queries</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-arrow-circle-o-right"></i> Convert To Invoice</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trackModal"><i class="fa fa-eye"></i> Track</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>               
		<?php	
	}
    ?>