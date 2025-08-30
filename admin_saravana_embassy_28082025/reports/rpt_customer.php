<?php
    include("../include_files.php");

    $search_text = "";
    if(isset($_REQUEST['search_text'])) {
        $search_text = $_REQUEST['search_text'];
    }

    $customer_type = "";
    if(isset($_REQUEST['customer_type'])) {
        $customer_type = $_REQUEST['customer_type'];
    }

    $from = "";
    if(isset($_REQUEST['from'])) {
        $from = $_REQUEST['from'];
    }
    
   $total_records_list = array();
    $total_records_list = $obj->FilterCustomerList($customer_type);
      
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

    if($customer_type == 1) {
        $customer_type = "Direct Customer";
    } else if($customer_type == 2) {
        $customer_type = "Online Customer";
    } else if($customer_type == 3) {
        $customer_type = "Both Customer";
    } else {
        $customer_type = "";
    }   

    require_once('../fpdf/fpdf.php');
    $pdf = new FPDF('P','mm','A4');
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetTitle('Customer List');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetY(10);
    $pdf->SetX(10);
    $file_name="Customer List";
    include("rpt_header.php");
    if(!empty($customer_type)){
        $pdf->Cell(0,7,'customer Type - '.$customer_type,1,1,'C');
    }
    $pdf->SetFont('Arial','B',8);
    $pdf->SetX(10);
    $pdf->Cell(10,7,'S.No',1,0,'C');
    $pdf->SetX(20);
    $pdf->Cell(40,7,'Name',1,0,'C');
    $pdf->Cell(20,7,'Mobile No.',1,0,'C');
    $pdf->Cell(45,7,'Address',1,0,'C');
    $pdf->Cell(25,7,'State',1,0,'C');
    $pdf->Cell(25,7,'District',1,0,'C');
    $pdf->Cell(25,7,'City',1,1,'C');
    $pdf->SetFont('Arial','',8);
    $start_y = $pdf->GetY();

    if(!empty($total_records_list)) {
        foreach($total_records_list as $key => $list) {
            if($pdf->GetY() > 260) {
                $pdf->AddPage();
                $pdf->SetAutoPageBreak(false);
                $pdf->SetTitle('Customer List');
                $pdf->SetFont('Arial','B',12);
                $pdf->SetY(10);
                $pdf->SetX(10);
                $file_name="Customer List";
                include("rpt_header.php");
                if(!empty($customer_type)){
                    $pdf->Cell(0,7,'customer Type - '.$customer_type,1,1,'C');
                }
                $pdf->SetFont('Arial','B',8);
                $pdf->SetX(10);
                $pdf->Cell(10,7,'S.No',1,0,'C');
                $pdf->Cell(40,7,'Name',1,0,'C');
                $pdf->Cell(20,7,'Mobile No.',1,0,'C');
                $pdf->Cell(45,7,'Address',1,0,'C');
                $pdf->Cell(25,7,'State',1,0,'C');
                $pdf->Cell(25,7,'District',1,0,'C');
                $pdf->Cell(25,7,'City',1,1,'C');
                $pdf->SetFont('Arial','',8);
                $start_y = $pdf->GetY();
            }
            $key = $key + 1;

            $name_y = ""; $id_y = ""; $address_y = ""; $state_y = ""; $district_y = ""; $city_y = "";
            $y_array = array(); $max_y = "";

            $pdf->SetY($start_y);
            $pdf->SetX(10);
            $pdf->Cell(10,7,$key,0,0,'C');

            if(!empty($list['customer_name'])) {
                $list['customer_name'] = html_entity_decode($obj->encode_decode('decrypt',$list['customer_name']));
                $pdf->SetY($start_y);
                $pdf->SetX(20);
                $pdf->MultiCell(40,7,$list['customer_name'],0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(20);
                $pdf->MultiCell(40,7,'-',0,'C');
            }
            $name_y = $pdf->GetY() - $start_y;

            if(!empty($list['mobile_number']) && $list['mobile_number'] != $GLOBALS['null_value']) {
                $list['mobile_number'] = $obj->encode_decode('decrypt',$list['mobile_number']);
                $pdf->SetY($start_y);
                $pdf->SetX(60);
                $pdf->Cell(20,7,$list['mobile_number'],0,0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(60);
                $pdf->Cell(20,7,'-',0,0,'C');
            }

            
            $id_y = $pdf->GetY() - $start_y;

            if(!empty($list['address']) && $list['address'] != $GLOBALS['null_value']) {
                $list['address'] = html_entity_decode($obj->encode_decode('decrypt',$list['address']));
                $pdf->SetY($start_y);
                $pdf->SetX(80);
                $pdf->MultiCell(45,7,$list['address'],0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(80);
                $pdf->MultiCell(45,7,'-',0,'C');
            }
            $address_y = $pdf->GetY() - $start_y;

            if(!empty($list['state'])) {
                $list['state'] = $obj->encode_decode('decrypt',$list['state']);
                $pdf->SetY($start_y);
                $pdf->SetX(125);
                $pdf->MultiCell(25,7,$list['state'],0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(125);
                $pdf->MultiCell(25,7,'-',0,'C');
            }
            $state_y = $pdf->GetY() - $start_y;

            if(!empty($list['district']) && $list['district'] != $GLOBALS['null_value']) {
                $list['district'] = $obj->encode_decode('decrypt',$list['district']);
                $pdf->SetY($start_y);
                $pdf->SetX(150);
                $pdf->MultiCell(25,7,$list['district'],0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(150);
                $pdf->MultiCell(25,7,'-',0,'C');
            }
            $district_y = $pdf->GetY() - $start_y;

            if(!empty($list['city']) && $list['city'] != $GLOBALS['null_value']) {
                $list['city'] = $obj->encode_decode('decrypt',$list['city']);
                $pdf->SetY($start_y);
                $pdf->SetX(175);
                $pdf->MultiCell(25,7,$list['city'],0,'C');
            }
            else {
                $pdf->SetY($start_y);
                $pdf->SetX(175);
                $pdf->MultiCell(25,7,'-',0,'C');
            }
            $city_y = $pdf->GetY() - $start_y;

            $y_array = array($name_y, $id_y, $address_y, $state_y, $district_y, $city_y);
            $max_y = max($y_array);

            $pdf->SetY($start_y);
            $pdf->Cell(10,($max_y),'',1,0,'C');
            $pdf->Cell(40,($max_y),'',1,0,'C');
            $pdf->Cell(20,($max_y),'',1,0,'C');
            $pdf->Cell(45,($max_y),'',1,0,'C');
            $pdf->Cell(25,($max_y),'',1,0,'C');
            $pdf->Cell(25,($max_y),'',1,0,'C');
            $pdf->Cell(25,($max_y),'',1,1,'C');

            $start_y += $max_y;
        }
    }
    
    $pdf->Output($from,'Customer List.pdf');
?>