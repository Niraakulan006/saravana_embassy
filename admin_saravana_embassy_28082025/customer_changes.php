<?php
	include("include_files.php");
	if(isset($_REQUEST['show_customer_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Customer</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('customer.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                            <label>Customer Name</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Customer Type</option>
                                <option>Direct</option>
                                <option>Online</option>
                            </select>
                            <label>Select Customer Type</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'mobile_number',10,'1');" placeholder="" required>
                            <label>Contact Number</label>
                        </div>
                        <div class="new_smallfnt">Numbers Only (only 10 digits)</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'email',25,1);" placeholder="" required>
                            <label>Email</label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1');" placeholder="Enter Your Address"></textarea>
                            <label>Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
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
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
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
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select City</option>
                                <option>City 1</option>
                                <option>City 2</option>
                            </select>
                            <label>Select City</label>
                        </div>
                    </div>        
                </div>
                <div class="col-lg-3 col-md-4 col-12 px-lg-1 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onfocus="Javascript:KeyboardControls(this,'mobile_number',6,'1');" placeholder="" required>
                            <label>Pincode</label>
                        </div>
                        <div class="new_smallfnt">Numbers Only (only 6 digits)</div>
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
                <th>Customer Name</th>
                <th>Type</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>Mahesh Prabhu</td>
                <td>Direct</td>
                <td>9876543456</td>
                <td>
                    <div class="dropdown">
                        <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>                  
<?php } ?>