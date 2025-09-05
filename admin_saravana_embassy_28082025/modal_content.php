<button type="button" data-bs-toggle="modal" data-bs-target="#DeleteModal" class="d-none delete_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5">Delete</h1>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success no" onClick="Javascript:cancel_delete_modal(this);" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger yes" onClick="Javascript:confirm_delete_modal(this);" >Delete</button>
            </div>
        </div>
    </div>
</div>
<button type="button" data-toggle="modal" data-target="#AcknowledgementModal" class="d-none acknowledgement_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="AcknowledgementModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Invocie Acknowledgement</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>
        </div>
    </div>
</div>
<button type="button" data-toggle="modal" data-target="#clearancemodal" class="d-none clearance_modal_button"></button>
<div class="modal fade" id="clearancemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5">Parcel Receiving Person Details</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark btnwidth submit_button" type="button" onClick="Javascript:SaveModalContent('clearance_form', 'clearance_entry_changes.php', 'clearance_entry.php');">Submit</button>
            </div>
        </div>
    </div>
</div>
<button type="button" data-toggle="modal" data-target="#ReceiptDeleteModal" class="d-none receipt_delete_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="ReceiptDeleteModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close d-none" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            Modal body..
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-success yes" onClick="Javascript:confirm_receipt_delete_modal(this);">Yes</button>
            <button type="button" class="btn btn-danger no" onClick="Javascript:cancel_delete_modal(this);">No</button>
        </div>
        </div>
    </div>
</div>
<button type="button" data-toggle="modal" data-target="#PreviewUpdateModal" class="d-none preview_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="PreviewUpdateModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Preview Receipt</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>
        </div>
    </div>
</div>
<button type="button" data-toggle="modal" data-target="#RemarksUpdateModal" class="d-none remarks_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="RemarksUpdateModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Receipt</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success yes" onClick="Javascript:confirm_delete_receipt_modal(this);">Submit</button>
            </div>
        </div>
    </div>
</div>
<button type="button" data-bs-toggle="modal" data-bs-target="#DeleteBannerModal" class="d-none delete_banner_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="DeleteBannerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5">Delete</h1>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this Banner Image?
            </div>
            <div class="modal-footer">
                <input type="hidden" name="position_name" value="">
                <button type="button" class="btn btn-danger yes" onClick="Javascript:delete_banner_image(this);">Yes</button>
                <button type="button" class="btn btn-success no" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="queriesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-bottom pb-3">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Queries</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="form-label-group in-border">
                        <div class="input-group">
                            <input type="text" id="" name="" class="form-control shadow-none d-none" onkeydown="Javascript:KeyboardControls(this,'text',25,1);" placeholder="" required="">
                            <input type="hidden" name="query_product_id" id="query_product_id">
                            <label>Product Question</label>
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" onclick="ShowQueriesPage()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-3">
                <div class="table-responsive text-center">
                    <table class="table nowrap cursor smallfnt w-100 table-bordered list_query_table">
                        <thead class="bg-dark smallfnt">
                            <tr style="white-space:pre;">
                                <th>#</th>
                                <th>Question</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product_queries">
                            <tr class="d-none">
                                <td>01</td>
                                <td>Question 01</td>
                                <td><a class="pe-2" href="#"><i class="fa fa-trash text-danger"></i></a></td>
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
<button type="button" data-bs-toggle="modal" data-bs-target="#DeleteModalQuery" class="d-none delete_query_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="DeleteModalQuery" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5">Delete</h1>
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success no" onClick="Javascript:cancel_delete_modal(this);" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger yes" onClick="Javascript:confirm_delete_query_modal(this);" >Delete</button>
            </div>
        </div>
    </div>
</div>

<button type="button" data-bs-toggle="modal" data-bs-target="#EstimateQueriesModal" class="d-none queries_modal_button"></button>
<!-- The Modal -->
<div class="modal fade" id="EstimateQueriesModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom pb-3">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Product Queries</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>