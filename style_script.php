    <?php
        $meta_data = array();
        $meta_data = $obj->getTableRecords($GLOBALS['meta_tags_table'], 'meta_file_name', $meta_file_name);
        foreach($meta_data as $meta) {
            if(!empty($meta['meta_title'])) {
                $page_meta_title = $meta['meta_title'];
                $page_meta_title = $obj->encode_decode('decrypt', $page_meta_title);
            }
            if(!empty($meta['meta_keywords'])) {
                $page_meta_keywords = $meta['meta_keywords'];
                $page_meta_keywords = $obj->encode_decode('decrypt', $page_meta_keywords);
            }
            if(!empty($meta['meta_description'])) {
                $page_meta_description = $meta['meta_description'];
                $page_meta_description = $obj->encode_decode('decrypt', $page_meta_description);
            }
        }
        $company_name = "";  $company_address = ""; $company_state = ""; $company_district = ""; $company_gst_number = ""; $company_pincode = ""; $company_city = ""; $company_email = ""; $company_mobile_number = ""; $country = "India"; $logo = "";
        $company_list = array();
        $company_list = $obj->getTableRecords($GLOBALS['company_table'], '', '');

        if(!empty($company_list)) {
            foreach($company_list as $data) {
                if(!empty($data['name']) && $data['name'] != $GLOBALS['null_value']) {
                    $company_name = html_entity_decode($obj->encode_decode('decrypt', $data['name']));
                }
                if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
                    $company_mobile_number = $obj->encode_decode('decrypt', $data['mobile_number']);
                }
                if(!empty($data['address']) && $data['address'] != $GLOBALS['null_value']) {
                    $company_address = html_entity_decode($obj->encode_decode('decrypt', $data['address']));
                }
                if(!empty($data['state']) && $data['state'] != $GLOBALS['null_value']) {
                    $company_state = $obj->encode_decode('decrypt', $data['state']);
                }                     
                if(!empty($data['gst_number']) && $data['gst_number'] != $GLOBALS['null_value']) {
                    $company_gst_number = $obj->encode_decode('decrypt', $data['gst_number']);
                }
                if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
                    $company_email = html_entity_decode($obj->encode_decode('decrypt', $data['email']));
                }
                if(!empty($data['district']) && $data['district'] != $GLOBALS['null_value']) {
                    $company_district = $obj->encode_decode('decrypt', $data['district']);
                } 
                if(!empty($data['city']) && $data['city'] != $GLOBALS['null_value']) {
                    $company_city = $obj->encode_decode('decrypt', $data['city']);
                } 
                if(!empty($data['pincode']) && $data['pincode'] != $GLOBALS['null_value']) {
                    $company_pincode = $obj->encode_decode('decrypt', $data['pincode']);
                }   
                if(!empty($data['logo']) && $data['logo'] != $GLOBALS['null_value']) {
                    $logo = $data['logo'];
                }
            }
        }
    ?>
    
    <title><?php if(!empty($page_meta_title)) { echo $page_meta_title; } ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:title" content="<?php echo $page_meta_title; ?>">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="https://.com">
	<meta property="og:image" content="https://.com/images/android-icon-192x192.png">
	<meta name="keywords" content="<?php echo $page_meta_keywords; ?>">
	<meta property="og:description" name="description" content="<?php echo $page_meta_description; ?>">
	<meta name="robots" content="all">
	<meta name="revisit-after" content="10 Days">
	<meta name="copyright" content="">
	<meta name="language" content="English">
	<meta name="distribution" content="Global">
	<meta name="web_author" content="srisoftwarez.com">
	<meta name="msapplication-TileImage" content="<?php if(!empty($main_path)) { echo $main_path; } ?>images/ms-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php if(!empty($main_path)) { echo $main_path; } ?>images/favicon-96x96.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php if(!empty($main_path)) { echo $main_path; } ?>images/apple-icon-72x72.png">
	<link rel="icon" sizes="192x192"  href="<?php if(!empty($main_path)) { echo $main_path; } ?>images/android-icon-192x192.png">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/animate.css">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/jside-menu.css">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/select2.min.css">
	<link rel="stylesheet" href="<?php if(!empty($main_path)) { echo $main_path; } ?>css/select2-bootstrap4.min.css">
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/jquery.min.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/popper.min.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/jquery.jside.menu.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/bootstrap.min.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/owl.carousel.min.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/wow.js"></script>
    <script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/select.js"></script>
	<script src="<?php if(!empty($main_path)) { echo $main_path; } ?>js/select2.min.js"></script>

