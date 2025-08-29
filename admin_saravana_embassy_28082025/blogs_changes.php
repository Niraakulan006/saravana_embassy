<?php
	include("include_files.php");
	if(isset($_REQUEST['show_blogs_id'])) { ?>
        <form class="poppins pd-20" name="organization_form" method="POST">
			<div class="card-header ">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Edit Blogs</div>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('blogs.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3 justify-content-center">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_user_id)) { echo $show_user_id; } ?>">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                                    <label>Blog Title</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                                    <label>Blog URL</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-4 col-12 py-2 px-lg-1">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <input type="text" id="name" name="name" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required>
                                    <label>Meta Title</label>
                                </div>
                            </div>
                        </div>
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
                <div class="col-lg-3 col-md-3 col-12 px-lg-1">
                    <img src="images/cloudupload.png" class="img-fluid w-50 mx-auto d-block" alt="Upload" title="Upload">
                    <div class="text-center smallfnt">(Product Desktop)</div>
                    <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                    <img src="images/cloudupload.png" class="img-fluid w-50 mx-auto d-block" alt="Upload" title="Upload">
                    <div class="text-center smallfnt">(Product Mobile Size)</div>
                    <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
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
                    <th>Blog Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>25-08-2025</td>
                    <td>Blog Title 01</td>
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
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" class="btn btn-dark py-1 px-2" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Update</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Cancel</a></li>
                            </ul>
                        </div> 
                    </td>
                </tr>
            </tbody>
        </table>               
		<?php	
	}
    ?>