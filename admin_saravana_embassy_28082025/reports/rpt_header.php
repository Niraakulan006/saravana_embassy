<?php
    $pdf->SetTitle($file_name);
 
    $pdf->SetFont('Arial','B',9);
    
    $company_logo = "";
    // $company_logo = $obj->getTableColumnValue($GLOBALS['company_table'],'primary_company','1','logo');
    
    $company_list = array(); $company_details = "";
    // $company_list = $obj->getTableColumnValue($GLOBALS['company_table'], 'primary_company', '1', 'company_details');
    // if(!empty($company_list)){
    //     $company_details =html_entity_decode($obj->encode_decode('decrypt',$company_list));
    //     $company_details = html_entity_decode($company_details);
    //     $company_details = explode("$$$", $company_details);
    // }

    if(empty($company_details)) {
        $check_company = array();
        $check_company = $obj->getTableRecords($GLOBALS['company_table'], 'company_id', $GLOBALS['bill_company_id'],'');
        if(!empty($check_company)) {
            foreach($check_company as $data) {
                
                if(!empty($data['name'])) {
                    $bill_company_details = $obj->encode_decode('decrypt', $data['name']);
                }
                if(!empty($data['address1'])) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['address1']);
                }
                if(!empty($data['state'])) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['state']);
                }
                if(!empty($data['district'])) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['district']);
                }
                if(!empty($data['city'])) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['city']);
                }
                if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['mobile_number']);
                }
                else {
                    $bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
                }
                if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
                    $bill_company_details = $bill_company_details."$$$".$obj->encode_decode('decrypt', $data['email']);
                }
                else {
                    $bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
                }
                if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
                    $bill_company_details = $bill_company_details."$$$"."GST : ".$obj->encode_decode('decrypt', $data['gst_number']);
                }
                else {
                    $bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
                }
                // if(!empty($data['logo']) && $data['logo'] != $GLOBALS['null_value']) {
                //     $company_logo = $data['logo'];
                // }
                
            }
        }
        if(!empty($bill_company_details)) {
            $company_details = explode("$$$", $bill_company_details);
        }
    }

    $bill_company_id = $GLOBALS['bill_company_id'];
    
    $pdf->SetY(10);
    $pdf->SetX(10);
    $pdf->SetFont('Arial','B',10);


    $pdf->Cell(190,7,$file_name,1,1,'C',0);
    $y = $pdf->GetY(); 
    $pdf->SetFont('Arial','B',8);
    
    $pdf->SetY($y);
    $pdf->SetX(50);

    if (!empty($company_details)) {
        for ($i = 0; $i < count($company_details); $i++) {
            $company_details[$i] = trim($company_details[$i]);
            if (!empty($company_details[$i]) && $company_details[$i] != $GLOBALS['null_value']) {
                
                $company_details[$i] = str_replace("<br>"," ",$company_details[$i]);
                if ($i === 0) {  // Corrected comparison
                    $pdf->SetFont('Arial', 'B', 11);
                    $pdf->MultiCell(110, 7, html_entity_decode($company_details[$i]), 0, 'C');
                    $rt = $pdf->gety();
                } elseif (strpos($company_details[$i], "GST") !== false) {
                    $pdf->sety($y);
                    $pdf->setx(164);
                    $pdf->SetFont('Arial', 'B', 8);
                    $pdf->Cell(35, 5, html_entity_decode($company_details[$i]), 0, 1, 'R', 0);
                } else {
                    $pdf->SetFont('Arial', '', 8);
                    // $pdf->sety($rt);
                    $pdf->SetX(50);
                    $pdf->MultiCell(110, 4, html_entity_decode($company_details[$i]), 0, 'C');
                    $end_y =$pdf->GetY();
                }
            }
        }
    }

    // echo $company_logo;

    if(!empty($company_logo)) {
        if(file_exists('../../images/upload/'.$company_logo)){
            $pdf->Image('../../images/upload/'.$company_logo,15,20,40,15);
        }
    }

    $pdf->SetY(10);
    $pdf->SetX(10);
    $pdf->Cell(190,($end_y - 10),'',1,1,'C');
    $header_end = $pdf->GetY();

    $pdf->SetY($header_end);

         

?>