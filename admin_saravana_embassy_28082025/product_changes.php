<?php
	include("include_files.php");
	if(isset($_REQUEST['show_product_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Add Product</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('product.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>Product Name</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>Product Url</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Category</option>
                                <option>Category 01</option>
                                <option>Category 02</option>
                            </select>
                            <label>Select Category</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Brand</option>
                                <option>Brand 01</option>
                                <option>Brand 02</option>
                            </select>
                            <label>Select Brand</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Product Display</option>
                                <option>Online</option>
                                <option>Billing</option>
                                <option>Online &amp; Billing</option>
                            </select>
                            <label>Select Product Display</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>HSN Code</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option>Select Tax</option>
                                <option>0%</option>
                                <option>5%</option>
                                <option>12%</option>
                                <option>18%</option>
                                <option>28%</option>
                            </select>
                            <label>Select Tax</label>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-4 col-6 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>Video URL</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                    <label>Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                    <label>Meta Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                    <label>Meta Keyword</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <textarea class="form-control" id="address" name="address" onkeydown="Javascript:KeyboardControls(this,'',150,'1')"; placeholder="Enter Your Address"></textarea>
                                    <label>Meta Description</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12">
                            <img src="images/cloudupload.png" class="img-fluid w-25 mx-auto d-block" alt="Upload" title="Upload">
                            <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                            <div class="text-center smallfnt">(Image Size 800 x 900)</div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pt-4">
                            <a href="#" data-toggle="modal" data-target="#deletemodal">
                                <img src="images/avatar-1.jpg" class="img-fluid w-75 mx-auto d-block" alt="image" title="image">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pt-4">
                            <a href="#" data-toggle="modal" data-target="#deletemodal">
                                <img src="images/avatar-1.jpg" class="img-fluid w-75 mx-auto d-block" alt="image" title="image">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pt-4">
                            <a href="#" data-toggle="modal" data-target="#deletemodal">
                                <img src="images/avatar-1.jpg" class="img-fluid w-75 mx-auto d-block" alt="image" title="image">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-6 pt-4">
                            <a href="#" data-toggle="modal" data-target="#deletemodal">
                                <img src="images/avatar-1.jpg" class="img-fluid w-75 mx-auto d-block" alt="image" title="image">
                            </a>
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
                                    <th>Default</th>
                                    <th>Attribute</th>
                                    <th style="width:80px;">QTY</th>
                                    <th style="width:80px;">Price</th>
                                    <th style="width:80px;">Stock</th>
                                    <th>Availability</th>
                                    <th style="width:100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td class="d-flex m-auto">
                                        <div class="form-check d-flex m-auto">
                                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                                            
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
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="name" name="name" class="form-control shadow-none" style="width:80px;" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                                                <label>Stock</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-label-group in-border">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option>Stock Availability</option>
                                                    <option>Available</option>
                                                    <option>Not Available</option>
                                                </select>
                                                <label>Stock Availability</label>
                                            </div>
                                        </div>  
                                    </td>
                                    <td>
                                        <a class="pe-2 h5" href="#"><i class="fa fa-plus text-success"></i></a>
                                        <a class="pe-2 h5" href="#"><i class="fa fa-files-o text-dark"></i></a>
                                        <a class="pe-2 h5" href="#"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
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
                    <th>Product Name</th>
                    <th>HSN Code</th>
                    <th>Tax</th>
                    <th>Status</th>
                    <th>Stock Available</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Product 01</td>
                    <td>HSN 001</td>
                    <td>5%</td>
                    <td>
                        <div class="form-group mb-1">
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <label for="FormSelectDefault" class="form-label text-muted"> </label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="FormSelectDefault">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>50</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#queriesModal"><i class="fa fa-eye"></i> Queries</a></li>
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