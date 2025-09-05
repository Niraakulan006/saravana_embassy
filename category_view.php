<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$meta_file_name = "login_page";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
    $category_list = array(); $category_description = ""; $category_cover_image = ""; $category_mobile_cover_image = ""; $category_name = ""; $category_link = "";
    $sub_category_list = array(); $total_products = 0; $show_product_listing = 0; $show_product_view = 0;
    $show_category_id = $_GET['url'];
    if(!empty($show_category_id)) {       
        $show_category_id = $obj->encode_decode('encrypt',$show_category_id); 
		$category_list = $obj->getTableRecords($GLOBALS['category_table'], 'category_url', $show_category_id);
        if(!empty($category_list)) {
            foreach($category_list as $data) {
                $show_category_id = $data['category_id'];
                if(!empty($data['name'])) {
                    $category_name = $obj->encode_decode('decrypt', $data['name']);
                }
                if(!empty($data['lower_case_name'])) {
                    $category_link = $obj->encode_decode('decrypt', $data['lower_case_name']);
                    $category_link = str_replace(" ", "-", $category_link);
                }
                if(!empty($data['description'])) {
                    $category_description = $obj->encode_decode('decrypt', $data['description']);
                    $category_description = str_replace("\r\n", "<br>", $category_description);
                }
                if(!empty($data['cover_image']) && $data['cover_image'] != $GLOBALS['null_value']) {
                    $category_cover_image = $data['cover_image'];
                }
                if(!empty($data['mobile_cover_image']) && $data['mobile_cover_image'] != $GLOBALS['null_value']) {
                    $category_mobile_cover_image = $data['mobile_cover_image'];
                }
                if(!empty($data['meta_title']) && $data['meta_title'] != $GLOBALS['null_value']) {
                    $meta_title = $obj->encode_decode('decrypt', $data['meta_title']);
                }
                if(!empty($data['meta_keywords']) && $data['meta_keywords'] != $GLOBALS['null_value']) {
                    $meta_keywords = $obj->encode_decode('decrypt', $data['meta_keywords']);
                }
                if(!empty($data['meta_description']) && $data['meta_description'] != $GLOBALS['null_value']) {
                    $meta_description = $obj->encode_decode('decrypt', $data['meta_description']);
                    if(!empty($meta_description)) {
                        $meta_description = str_replace("\r\n", "<br>", $meta_description);
                    }
                }
            }
        }
        $default_sort_option = $GLOBALS['product_sort_position'];
        $products_sort_by = $obj->encode_decode('encrypt', $default_sort_option);        
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<?php include("style_script.php"); ?>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div class="container py-5">
	<div class="row">
		<div class="col-lg-12">
			<ul class="breadcrumb fullpad manrope smallfnt">
				<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>">Home</a></li>
				<li class="split_line"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>category">Category</a></li>
				<li class="split_line"><a><?php if(!empty($category_name)) { echo $category_name; } ?></a></li>

            </ul>
		</div>
	</div>
</div>
<div class="container-fluid pb-5 px-lg-5">
    <?php
        include("products/product_listing.php");
    ?>	    
</div>
<?php include ("footer.php")?>
<script>
    new WOW().init();

	const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});

</script>
</body>
</html>