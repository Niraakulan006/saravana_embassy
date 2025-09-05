<input type="hidden" name="show_cancel_<?php echo $id; ?>" value="<?php echo $cancelled; ?>">
<input type="hidden" name="show_invoiced_<?php echo $id; ?>" value="<?php echo $is_invoiced; ?>">
<div class="table-responsive" style="height:800px; overflow-y:scroll!important;">
    <table id="<?php echo $id; ?>" class="datatable table nowrap border cursor text-center smallfnt table-bordered">
        <thead class="bg-light">
            <tr>
                <th style="min-width:50px;">S.No</th>
                <th style="min-width:100px;">Date</th>
                <th style="min-width:100px;">Estimate No</th>
                <th style="min-width:100px;">Customer Name</th>
                <th style="min-width:100px;">Mobile</th>
                <th style="min-width:100px;">District</th>
                <th style="min-width:100px;">State</th>
                <th style="min-width:100px;">Amount</th>
                <th style="min-width:50px;">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
