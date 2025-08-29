<?php
	include("include_files.php");
	if(isset($_REQUEST['show_role_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Edit Roles</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('role.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-4 col-md-6 col-12 py-2">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',50,1);" placeholder="" required>
                            <label>Enter Role</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="table-responsive poppins">
                        <table class="table nowrap table-bordered smallfnt">
                            <thead class="bg-light">
                                <tr>
                                    <th>Module</th>
                                    <th>Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-dark text-white text-center">
                                    <td colspan="2">Creation</td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Select All
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label fw-400 checkbox" for="defaultCheck1">
                                                    View
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Add
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Edit
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Delete
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Staff</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Select All
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label fw-400 checkbox" for="defaultCheck1">
                                                    View
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Add
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Edit
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="checkbox" name="length_check" value="" id="defaultCheck1">
                                                <label class="form-check-label checkbox" for="defaultCheck1">
                                                    Delete
                                                </label>
                                            </div>
                                        </div>
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
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Manager</td>
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
                <tr>
                    <td>02</td>
                    <td>Branch Staff</td>
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
		<?php	
	}
    ?>