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
	<script src="js/popper.min.js"></script>
	<script src="js/jquery.jside.menu.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/select.js"></script>
	<script src="js/select2.min.js"></script>
	<script src="js/wow.js"></script>
</head>
<body itemscope itemtype="http://schema.org/WebPage">
<?php include ("header.php")?>
<div class="container pad">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-12 d-none d-lg-block">
			<img src="images/login.jpg" class="img-fluid" alt="Login" title="Login">
		</div>
		<div class="col-lg-6 col-md-12 col-12">
			<div class="login-form">
                <div class="text-left">
                    <div class="heading5 clr1 fw-500 poppins">Forgot Password </div>
                </div>
                <form>
                    <div class="form-group">
                        <label class="poppins smallfnt clr3">Mobile Or Email Address</label>
                        <input type="text" id="" class="form-control smallfnt poppins" placeholder="Username / Email">
                        <span class="icon bi bi-person"></span>
                    </div>
                    <div class="form-group">
                        <label class="poppins smallfnt clr3">New Password</label>
                        <div class="input-group" style="position:initial;">
                            <input type="password" class="form-control shadow-none smallfnt poppins" id="password" name="password" placeholder="Password" required="">
                            <div style="position: inherit; top: 0px;" class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
                                <button class="btn btn-dark" type="button" id="passwordBtn" data-toggle="button" aria-pressed="false"><i class="bi bi-eye"></i></button>
                            </div>
                        </div>
                        <span class="icon bi bi-lock"></span>
                    </div>
                    <div class="form-group">
                        <label class="poppins smallfnt clr3">Confirm Password</label>
                        <div class="input-group" style="position:initial;">
                            <input type="password" class="form-control shadow-none smallfnt poppins" id="password" name="password" placeholder="Password" required="">
                            <div style="position: inherit; top: 0px;" class="input-group-append" data-toggle="tooltip" data-placement="right" title="Show Password">
                                <button class="btn btn-dark" type="button" id="passwordBtn" data-toggle="button" aria-pressed="false"><i class="bi bi-eye"></i></button>
                            </div>
                        </div>
                        <span class="icon bi bi-lock"></span>
                    </div>
					<div class="poppins pt-2">Already have an account? <a href="login.php" class="text-danger poppins">Login</a> here </div>  
                    <div class="text-center mt-3">
                        <button class="login_button mx-auto poppins text-white">Submit</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>
<?php include ("footer.php")?>
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
<script>
	$(document).ready(function() {
    $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  
    const passBtn = $("#passwordBtn");
  
    passBtn.click(togglePassword);
  
    function togglePassword() {
      const passInput = $("#password");
      if (passInput.attr("type") === "password") {
        passInput.attr("type", "text");
      } else {
        passInput.attr("type", "password");
      }
    }
  	});
</script>
</body>
</html>