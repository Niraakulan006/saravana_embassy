<?php
	include("include.php");
    $customer_id = "";
    if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])) {
        $customer_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'];
    }
	$desktop_banner_image = $desktop_banner_link = $desktop_banner_position = "";
	$mobile_banner_image = $mobile_banner_link = $mobile_banner_position = "";
	$meta_file_name = "home";
	$page_meta_title = $page_meta_keywords = $page_meta_description = "";
	$banner_records = array();
	$banner_records = $obj->getTableRecords($GLOBALS['home_banner_table'], '', '');
	if(!empty($banner_records)) {
		foreach($banner_records as $banner) {
			if($banner['position_name'] == 'Desktop') {
				$desktop_banner_image = $banner['banner_image'];
				$desktop_banner_link = $banner['banner_category_id'];
				$desktop_banner_position = $banner['banner_position'];
			}
			if($banner['position_name'] == 'Mobile') {
				$mobile_banner_image = $banner['banner_image'];
				$mobile_banner_link = $banner['banner_category_id'];
				$mobile_banner_position = $banner['banner_position'];
			}
		}
	}
	$brand_list = array();
	$brand_list = $obj->getTableRecords($GLOBALS['brand_table'], '', '');
    $category_list = array();
    $category_list = $obj->getCategoryWithNoSubCategoryFront();

?>
<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<?php include("style_script.php"); ?>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div id="carouselExampleControls" class="carousel slide d-none d-lg-block" data-ride="carousel">
  	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/banner1.webp" class="d-block w-100" alt="Banner" title="Banner">
		</div>
		<div class="carousel-item">
			<img src="images/banner2.webp" class="d-block w-100" alt="Banner" title="Banner">
		</div>
  	</div>
	<a class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div id="carouselExampleControls1" class="carousel slide d-block d-lg-none" data-ride="carousel">
  	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="images/mobile_banner01.jpg" class="d-block w-100" alt="Banner" title="Banner">
		</div>
		<div class="carousel-item">
			<img src="images/mobile_banner02.jpg" class="d-block w-100" alt="Banner" title="Banner">
		</div>
  	</div>
	<a class="carousel-control-prev" type="button" data-target="#carouselExampleControls1" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" type="button" data-target="#carouselExampleControls1" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<div class="patternbg">
	<div class="container-fluid px-lg-5 py-5">
		<div class="row">
			<div class="col-lg-12 text-center pb-5">
				<div class="manrope heading2 fw-600">Browse By Category</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php
				if(!empty($category_list)) {
					foreach($category_list as $category) {
						$image_file = $category['cover_image'];
						$image_location = $target_dir.$category['cover_image'];
						$category_url = $obj->encode_decode('decrypt', $category['category_url']);
						$category_name = $obj->encode_decode('decrypt', $category['name']);
						if(!empty($image_file) && file_exists($image_location) ) { ?>
							<div class="col-lg-2 col-md-3 col-6 text-center pt-4">
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>category/<?php echo $category_url; ?>" class="category-img">
									<img src="<?php if(!empty($main_path)) { echo $main_path; } ?><?php echo $image_location; ?>" class="img-fluid rounded-circle" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>">
									<div class="poppins smallfnt text-dark pt-3 fw-600"><?php echo $category_name; ?></div>
								</a>
							</div>
						<?php
						}
					}
				}
			?>
		</div>
	</div>
</div>
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-lg-12 pb-3">
			<h2 class="sectionheading text-center poppins">Our Featured Products</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="owl-carousel owl-theme pt-3" id="owl-demo1">
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product2.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">Apple iPhone 13 (128 GB ,Blue) (IP13128GBBLUE)</div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
								<!-- <div class="d-flex">
									<i class="bi bi-star-fill clr-yellow smallfnt pr-1"></i>
									<i class="bi bi-star-fill clr-yellow smallfnt pr-1"></i>
									<i class="bi bi-star-fill clr-yellow smallfnt pr-1"></i>
									<i class="bi bi-star-fill clr-yellow smallfnt pr-1"></i>
									<i class="bi bi-star-fill clr-yellow smallfnt pr-1"></i>
								</div>
								<div class="d-flex mt-3">
									<li class="poppins d-none d-lg-block">
										<a class="cart-button" href="#">  
											<i class="bi bi-cart"></i><span class="smallfnt1"> Add to cart</span>
										</a>
									</li>
									<li class="poppins d-block d-lg-none">
										<a class="cart-button1" href="#">  
											<i class="bi bi-cart"></i>
										</a>
									</li>
									<li class="poppins">
										<a class="cart-button2" href="#">  
											<i class="bi bi-heart"></i>                                              
										</a>
									</li>
									<li class="poppins">
										<a class="cart-button2" href="#">  
											<i class="bi bi-eye"></i>                                                  
										</a>
									</li>
								</div> -->
							</div>
						</a>
					</div>
				</div>
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product1.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">LG 242L Double Door 2 Star Fridge with Humidity Co</div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product3.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV </div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product4.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV </div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<img src="images/ac_banner.webp" class="img-fluid w-100" alt="Banner" title="Banner">
<div class="bg-light">
	<div class="container py-5">
		<div class="row justify-contnet-center">
			<div class="col-lg-12 col-md-12 col-12 align-self-center text-center">
				<div class="poppins fw-600 heading2 clr1 pb-3">Our Brands</div>
				<p class="poppins smallfnt"></p>
			</div>
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme pt-3" id="owl-demo3">
					<?php
						if(!empty($brand_list)) {
							foreach($brand_list as $brand) {
								$image_file = $brand['brand_image'];
								$image_location = $target_dir.$brand['brand_image'].$GLOBALS['image_format'];
								$brand_name = $obj->encode_decode('decrypt', $brand['brand_name']);
								if(!empty($image_file) && file_exists($image_location) ) { ?>
									<div class="item mb-3">
										<img src="<?php if(!empty($main_path)) { echo $main_path; } ?><?php echo $image_location; ?>" class="img-fluid" alt="<?php echo $brand_name; ?>" title="<?php echo $brand_name; ?>">
									</div>
								<?php
								}
							}
						}
					?>
				</div>
			</div>			
		</div>
	</div>
</div>
<div class="container-fluid py-5">
	<div class="row">
		<div class="col-lg-12 pb-3">
			<h2 class="sectionheading text-center poppins">Trending Products</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="owl-carousel owl-theme pt-3" id="owl-demo2">
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product1.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV </div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
				<div class="item mb-3">
					<div class="border shadow">
						<a href="product_view.php">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="#">
										<img class="product-items-img product-primary-img" src="images/product2.webp" alt="Collection" title="Collection">
									</div>
									<div class="product-badge">
										<span class="product-badge-items poppins">Sale</span>
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">Lloyd 190.5 cm (75 inch) QLED 4K LED Google TV </div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> 65000.00</div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<?php include ("footer.php")?>
<script>
    new WOW().init();
</script>
<script>
	$(document).ready(function(){
	var owl = $("#owl-demo1");
	owl.owlCarousel({
	   loop:true,
	   margin:20,
	   nav:true,
	   autoplay:true,
	   autoplayTimeout:3000,
	   autoplayHoverPause:true,
		  responsive:{
			 0:{
				items:1
			 },
			 600:{
				items:2
			 },
			 1000:{
				items:5	
			 }
	   }
	});
 });

	$(document).ready(function(){
	var owl = $("#owl-demo2");
	owl.owlCarousel({
	   loop:true,
	   margin:20,
	   nav:true,
	   autoplay:true,
	   autoplayTimeout:3000,
	   autoplayHoverPause:true,
		  responsive:{
			 0:{
				items:1
			 },
			 600:{
				items:2
			 },
			 1000:{
				items:5	
			 }
	   }
	});
 }); 

	$(document).ready(function(){
	var owl = $("#owl-demo3");
	owl.owlCarousel({
	   loop:true,
	   margin:20,
	   nav:true,
	   autoplay:true,
	   autoplayTimeout:3000,
	   autoplayHoverPause:true,
		  responsive:{
			 0:{
				items:3
			 },
			 600:{
				items:6
			 },
			 1000:{
				items:7
			 }
	   }
	});
 });  
</script>
</body>
</html>