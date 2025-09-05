<!DOCTYPE html>
<html lang="en">
<head itemscope itemtype="http://www.schema.org/website">
	<title>Saravana Embassy</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:title" content="">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="https://.com">
	<meta property="og:image" content="https://.com/images/android-icon-192x192.png">
	<meta name="keywords" content="">
	<meta property="og:description" name="description" content="">
	<meta name="robots" content="all">
	<meta name="revisit-after" content="10 Days">
	<meta name="copyright" content="">
	<meta name="language" content="English">
	<meta name="distribution" content="Global">
	<meta name="web_author" content="srisoftwarez.com">
	<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
	<link rel="icon" sizes="192x192"  href="images/android-icon-192x192.png">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/jside-menu.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/select2-bootstrap4.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.jside.menu.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/select.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/wow.js"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<img src="images/contact_banner.webp" class="img-fluid" alt="Contact Us" title="Contact Us">
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 col-md-12 col-12 pt-3">
			<h1 class="poppins heading2 h-red">Get In Touch</h1>
            <form class="brdr contact-form" name="contact-form" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 pt-4">
                        <div class="w-100">
                            <input type="text" class="form-control poppins" name="enquiry_name" placeholder="Name *">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 pt-4">
                        <div class="w-100">
                            <input type="text" class="form-control poppins" name="enquiry_mobile_number" placeholder="Your Phone Number * ">
                        </div>
                    </div>	
                    <div class="col-lg-12 col-md-12 col-12 pt-4">
                        <div class="w-100">
                            <input type="email" class="form-control poppins" name="enquiry_email" placeholder="Your Email *">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 pt-4">
                        <div class="w-100">
                            <textarea class="form-control formheight poppins" name="enquiry_message" placeholder="Your Message Here"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-8 pt-4">
                        <button type="button" class="poppins cnt-btn w-100 enquiry_button" onclick="Javascript:SendEnquiry(event, 'contact-form', 'enquiry_button', 'contact.php');">SUBMIT</button>
                    </div>
                </div>
            </form>
		</div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 col-md-12 col-12 pt-3">
			<p class="pt-3"><i class="bi bi-house heading2 clr1"></i></p>
            <div class="text3">
                <h1 class="poppins heading4">Address</h1>
                <div class="poppins smallfnt">39, Sivan Sannathi Street, Near Sivan Temple, Sivakasi – 626123, Tamilnadu </div>
            </div>
			<p class="pt-3"><i class="bi bi-phone heading2 clr1"></i></p>
            <div class="text3">
                <h1 class="poppins heading4">Contact</h1>
                <div class="poppins smallfnt">+91 95007 79988</div>
                <div class="poppins smallfnt">+91 95007 79988</div>
            </li></div>	
			<p class="pt-3"><i class="bi bi-envelope heading2 clr1"></i></p>
            <div class="text3">
                <h1 class="poppins heading4">Mail Us</h1>
                <div class="poppins smallfnt">saravanaembassy@gmail.com</div>
            </div>	
		</div>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62969.99610817933!2d77.75142273388849!3d9.45426426776399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b06cee43d812d0d%3A0x8ce12e9dcdaa2a2c!2sSivakasi%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1750504175714!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<div class="section-header poppins fw-400">
	<div class="container py-1">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="smallfnt text-white">Copyright &copy; 2025 Saravana Embassy. All Rights Reserved. Developed By Srisoftwarez</div>
			</div>
		</div>
	</div>
</div>
<script>
    new WOW().init();
</script>
<script>
$(function(){
$(".menu-container").jSideMenu({
    jSidePosition: "position-left", //possible options position-left or position-right
    jSideSticky: true, // menubar will be fixed on top, false to set static
    jSideSkin: "default-skin", // to apply custom skin, just put its name in this string
     });
}); 
</script>
</body>
</html>