<?php
    session_start();
    include("admin_saravana_embassy_28082025/include/label.php");
    include("admin_saravana_embassy_28082025/include/functions.php");
    include("admin_saravana_embassy_28082025/include/validation.php");

    $obj = new billing();
    $valid = new validation();

    $project_title = "";
    $project_title = $obj->getProjectTitle();

    $temp_dir = $obj->temp_image_directory();
    if(!empty($temp_dir)) {
        $temp_dir = trim(str_replace("../", "", $temp_dir));
    }

    $target_dir = $obj->image_directory();
    if(!empty($target_dir)) {
        $target_dir = trim(str_replace("../", "", $target_dir));
    }

    $cart_product_count = 0; $cart_page = 0;
    if(isset($_SESSION['cart_product_nm']) && !empty($_SESSION['cart_product_nm'])) {
        $cart_product_count = count($_SESSION['cart_product_nm']);  
    }

    $main_path = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $main_path = $main_path . "/";
    $page_title = ""; $meta_title = ""; $meta_keywords = ""; $meta_description = "";

    $max_otp_count = 2;  $otp_send_count_error = "Please try again later";
?>