<div class="newsletter-bg">
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-lg-5 col-md-12 col-12">
				<div class="d-flex">
					<div class="w-15 text-right pr-3">
						<i class="bi bi-envelope h1 text-white"></i>
					</div>
					<div class="w-85">
						<div class="text-white text-uppercase manrope">Subscribe To Our Newsletter </div>
						<div class="poppins text-white smallfnt pb-0">Get all the latest information on Events, Sales and Offers. </div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-9 col-12 align-self-center pt-lg-0 pt-4">
				<div class="form-group mb-0">
					<input type="text" id="" class="form-control smallfnt poppins" style="height:45px;" placeholder="Your Email Address">
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-12 align-self-center text-md-left text-center pt-lg-0 pt-4">
				<button class="cnt-btn1 poppins">SUBSCRIBE <i class="bi bi-arrow-right"></i></button>
			</div>
		</div>
	</div>
</div>	
<!--Footer-->
<div class="footerbg pad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12 pt-4 brdr1 text-left">
				<a href="index.php">
					<img src="<?php if(!empty($main_path)) { echo $main_path.$target_dir; } ?><?php if(!empty($logo)) { echo $logo; } ?>" class="img-fluid footlogo" alt="Saravana Embassy" title="Saravana Embassy">
				</a>
				<p class="poppins smallfnt pt-4">we bring you the latest and most innovative electronic gadgets designed to make your life smarter, easier, and more connected</p>
				<div class="h6 text-dark manrope pb-1">Follow Us On</div>
				<div class="d-flex">
					<a href="#" class="social_icon"><i class="bi bi-facebook"></i></a>
					<a href="#" class="social_icon"><i class="bi bi-instagram"></i></a>
					<a href="#" class="social_icon"><i class="bi bi-youtube"></i></a>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-12 pt-4 brdr1">
				<div class="manrope fw-600 heading6">Quick Links</div>
				<div class="smallbrdr1"></div>
				<ul class="fullpad">
					<li class="poppins pt-4 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>" class="text-dark">Home</a></li>
					<li class="poppins pt-2 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>about" class="text-dark">About Us</a></li>
					<li class="poppins pt-2 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>blog" class="text-dark">Blog</a></li>
					<li class="poppins pt-2 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>contact" class="text-dark">Contact</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-3 col-12 pt-4 brdr1">
				<div class="manrope text-dark fw-600 heading6">Our Policies</div>
				<div class="smallbrdr1"></div>
				<ul class="fullpad">
					<li class="poppins pt-4 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>terms" class="text-dark">Terms & Conditions</a></li>
					<li class="poppins pt-2 smallfnt"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>privacy" class="text-dark">Privacy policy</a></li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-12 col-12 pt-4">
				<div class="manrope text-dark fw-600 heading6">Contact Information</div>
				<div class="smallbrdr1"></div>
				<li class="poppins pt-4">
                    <p><i class="bi bi-geo-alt clr3"></i></p>
					<div class="text1 smallfnt text-dark"><?php if(!empty($company_address)) { echo $company_address; } ?></div>
				</li>
				<li class="poppins pt-3">
                    <p><i class="bi bi-whatsapp clr3"></i></p>
					<div class="text1 smallfnt text-dark">+91 <?php if(!empty($company_mobile_number)) { echo $company_mobile_number; } ?></div>
				</li>
				<li class="poppins pt-3">
                    <p><i class="bi bi-phone clr3"></i></p>
					<div class="text1 smallfnt text-dark">+91 <?php if(!empty($company_mobile_number)) { echo $company_mobile_number; } ?></div>
				</li>
				<li class="poppins pt-3">
                    <p><i class="bi bi-envelope clr3"></i></p>
					<div class="text1 smallfnt text-dark"><?php if(!empty($company_email)) { echo $company_email; } ?></div>
				</li>
			</div>
			<div class="col-lg-12 text-center mt-4">
				<img src="images/payment.webp" class="img-fluid" alt="Payment" title="Payment">
			</div>
		</div>
	</div>
</div>
<div class="section-footer poppins fw-400">
	<div class="container py-1">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 text-center">
				<div class="smallfnt text-white">Copyright &copy; 2025 Saravana Embassy. All Rights Reserved. Developed By Srisoftwarez</div>
			</div>
		</div>
	</div>
</div>
<!--Footer End-->
<script>
$(function(){
$(".menu-container").jSideMenu({
    jSidePosition: "position-left", //possible options position-left or position-right
    jSideSticky: true, // menubar will be fixed on top, false to set static
    jSideSkin: "default-skin", // to apply custom skin, just put its name in this string
     });
}); 
</script>