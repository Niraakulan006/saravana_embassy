<?php
include("include_files.php");
?>

<script type="text/javascript" src="include/js/xlsx.full.min.js"></script>
<table id="tbl_customer_list" class="data-table table nowrap tablefont"
    style="margin: auto; width: 900px;display:none;">
    <thead class="thead-dark">
        <tr>
            <th>S.No</th>
            <th>customer Type</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Wallet</th>
        </tr>
    </thead>

    <tbody>
        <?php
        if(isset($_REQUEST['search_text'])) {
            $search_text = $_REQUEST['search_text'];
        }

        $customer_type = "";
        if(isset($_REQUEST['filter_customer_type'])) {
            $customer_type = $_REQUEST['filter_customer_type'];
        }

        $total_records_list = array();
        $total_records_list = $obj->FilterCustomerList($customer_type);
        // $total_records_list = $obj->getTableRecords($GLOBALS['customer_table'], '', '');


        if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if(strpos(strtolower($obj->encode_decode('decrypt', $val['name_mobile_city'])), $search_text) !== false) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }

        if (!empty($total_records_list)) {
            foreach ($total_records_list as $key => $data) {
                $index = $key + 1; ?>
                <tr>
                    <td class="ribbon-header" style="cursor:default;"> <?php
                        echo $index; ?>
                    </td>
                    <td> <?php 
                        if(!empty($data['customer_type']) && $data['customer_type']!=$GLOBALS['null_value']) {
                            if($data['customer_type'] == '1') {
                                echo "Direct Customer";
                            } elseif($data['customer_type'] == '2') {
                                echo "Online Customer";
                            } elseif($data['customer_type'] == '3') {
                                echo "Both Customer";
                            }
                        } ?>
                    </td>
                    <td> <?php
                        if(!empty($data['customer_name']) && $data['customer_name']!=$GLOBALS['null_value']) {
                            $data['customer_name'] = $obj->encode_decode('decrypt', $data['customer_name']);
                            echo $data['customer_name'];
                        } ?>
                    </td>
                    <td> <?php
                        if(!empty($data['mobile_number']) && $data['mobile_number']!=$GLOBALS['null_value']) {
                            $data['mobile_number'] = $obj->encode_decode('decrypt', $data['mobile_number']);
                            echo $data['mobile_number'];
                        } ?>
                    </td>
                    <td> <?php 
                        if(!empty($data['state']) && $data['state']!=$GLOBALS['null_value']) {
                            $data['state'] = $obj->encode_decode('decrypt', $data['state']);
                            echo $data['state'];
                        } ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </tbody>
</table>

<script>
    ExportToExcel();
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('tbl_customer_list');
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        if (dl) {
            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' });
        } else {
            XLSX.writeFile(wb, fn || ('customer_list.' + (type || 'xlsx')));
        }
        window.open("customer.php", "_self");
    }
</script>