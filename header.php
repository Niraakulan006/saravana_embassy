<div class="d-none d-md-none d-lg-block">
	<div class="section-header poppins fw-400">
		<div class="container-fluid py-2 px-lg-4">
			<div class="row">
				<div class="col-lg-8">
					<ul class="d-flex text-white fullpad smallfnt">
						<li>Welcome to Saravana Embassy!!.</li>
						<!-- <li class="navline"><a href="#" class="text-white"><i class="bi bi-truck"></i> Track Your Order</a></li> -->
						<li class="navline"><a href="mailto:<?php if(!empty($company_email)) { echo $company_email; } ?>" class="text-white"><i class="bi bi-envelope"></i><?php if(!empty($company_email)) { echo $company_email; } ?></a></li>
					</ul>
				</div>
				<div class="col-lg-4 text-right">
					<ul class="d-flex text-white justify-content-end fullpad smallfnt">
						<?php
							if(!isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
						?>
							<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-white">Login</a></li>
							<li class="navline"><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>register" class="text-white">Register</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid px-lg-4 py-4">
		<div class="row">
			<div class="col-lg-3 align-self-center">
				<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>">
					<img src="<?php if(!empty($main_path)) { echo $main_path.$target_dir; } ?><?php if(!empty($logo)) { echo $logo; } ?>" class="img-fluid logo" alt="Saravana Embassy" title="Saravana Embassy">
				</a>
			</div>
			<div class="col-lg-5 align-self-center">
				<form class="search-form poppins fw-500" id="mainSearchForms">
					<div class="input-group search-input-group">
						<!-- Category Dropdown -->
						<div class="input-group-prepend">
							<select class="form-control search-select" id="categorySelects1">
								<option value="all">All Categories</option>
								<option value="products">Products</option>
								<option value="services">Services</option>
								<option value="articles">Articles</option>
								<option value="people">People</option>
								<option value="places">Places</option>
								<option value="events">Events</option>
							</select>
						</div>
						<!-- Search Input -->
						<input type="text" class="form-control search-input" id="searchInputs" placeholder="What are you looking for?" autocomplete="off">
						<!-- Search Button -->
						<div class="input-group-append">
							<button class="btn search-btn" type="submit">
								<i class="bi bi-search text-white"></i>
							</button>
						</div>
					</div>
           		</form>
			</div>
			<div class="col-lg-4 align-self-center poppins fw-400">
				<ul class="d-flex justify-content-end fullpad">
					<li class="text-center smallfnt pr-3">
						<div class="dropdown login-menu">
							<?php
								if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
							?>
							<a href="#" data-toggle="dropdown" class="text-dark">
								<i class="bi bi-person heading4"></i> <br> My Account
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">	
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>my-account" class="smallfnt helvetica dropdown-item"><i class="bi bi-people pr-1"></i>Profile</a>								    
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>logout" class="helvetica smallfnt dropdown-item" ><i class="bi bi-lock pr-1"></i>Logout</a>
							</div>
							<?php }else{
								?>
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-dark">
									<i class="bi bi-person heading4"></i> <br> My Account
								</a>
								<?php
							}
							?>
						</div>	
					</li>
					<li class="text-center smallfnt pr-3">
							<?php
								if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
							?>						
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>wishlist" class="text-dark"><i class="bi bi-heart heading4"></i> <br> Wish List </a>
								<div class="badges badgescntr">0</div>
							<?php }else{
								?>
									<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-dark"><i class="bi bi-heart heading4"></i> <br> Wish List </a>
									<div class="badges badgescntr">0</div>
								<?php
								}
							?>
					</li>
					<li class="text-center smallfnt pr-3">
							<?php
								if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
							?>						
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>cart" class="text-dark"><i class="bi bi-cart heading4"></i> <br> My Cart</a>
								<div class="badges1 badgescntr">0</div>
							<?php }else{
								?>
								<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="text-dark"><i class="bi bi-cart heading4"></i> <br> My Cart</a>
								<div class="badges1 badgescntr"></div>
								<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="gi-header-cat poppins fw-400">
		<div class="container-fluid px-lg-4 position-relative">
			<div class="gi-nav-bar">
				<div id="gi-main-menu-desk" class="sticky-nav">
					<div class="nav-desk">
						<div class="row">
							<div class="col-md-12 align-self-center">
								<div class="gi-main-menu outfit">
									<ul>
										<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>">Home</a></li>
										<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>about">About Us</a></li>
										<li class="dropdown drop-list position-static">
											<a href="#" class="dropdown-arrow">Products<i class="bi bi-caret-down"></i></a>
											<ul class="mega-menu d-block">
												<li class="d-flex">
													<span class="bg"></span>
													<ul class="d-block mega-block">
														<li class="menu_title"><a href="#">Classic</a></li>
														<li><a href="products.php">Left sidebar 3 column</a></li>
														<li><a href="products.php">Left sidebar 4 column</a></li>
														<li><a href="products.php">Right sidebar 3column</a>
														</li>
														<li><a href="products.php">Right sidebar 4column</a>
														</li>
														<li><a href="products.php">Full width 4 column</a>
														</li>
													</ul>
													<ul class="d-block mega-block">
														<li class="menu_title"><a href="#">Banner</a></li>
														<li><a href="products.php">left
																sidebar 3
																column</a></li>
														<li><a href="products.php">left
																sidebar 4
																column</a></li>
														<li><a href="products.php">right
																sidebar
																3 column</a></li>
														<li><a href="products.php">right
																sidebar
																4 column</a></li>
														<li><a href="products.php">Full width 4
																column</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="dropdown drop-list">
											<a href="#" class="dropdown-arrow">Products<i class="bi bi-caret-down"></i></a>
											<ul class="sub-menu">
												<li class="dropdown position-static">
													<a href="#">Product page<i class="bi bi-caret-right"></i></a>
													<ul class="sub-menu sub-menu-child">
														<li><a href="products.php">Product left sidebar</a></li>
														<li><a href="products.php">Product right sidebar</a></li>
													</ul>
												</li>
												<li class="dropdown position-static">
													<a href="#">Product Accordion<i class="bi bi-caret-right"></i></a>
													<ul class="sub-menu sub-menu-child">
														<li><a href="products.php">leftsidebar</a></li>
														<li><a href="products.php">rightsidebar</a></li>
													</ul>
												</li>
												<li><a href="products.php">Product full width</a></li>
												<li><a href="products.php">accordion full width</a></li>
											</ul>
										</li>
										<li class="dropdown drop-list">
											<a href="#" class="dropdown-arrow">Special Product<i class="bi bi-caret-down"></i></a>
											<ul class="sub-menu">
												<li><a href="products.php">left sidebar</a></li>
												<li><a href="products.php">right sidebar</a></li>
												<li><a href="products.php">Full Width</a></li>
												<li><a href="products.php">Detail left sidebar</a></li>
												<li><a href="products.php">Detail rightsidebar</a></li>
												<li><a href="products.php">Detail Full Width</a></li>
											</ul>
										</li>
										<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>blog">Blog</a></li>
										<li><a href="<?php if(!empty($main_path)) { echo $main_path; } ?>contact">Contact</a></li>
									</ul>
									<div class="d-flex justify-content-end align-self-center ml-auto wallet_brdr">
										<li><i class="bi bi-wallet2 heading5 clr1"></i> 1925.00</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-block d-md-block d-lg-none">
	<div class="section-header poppins fw-400">
		<div class="container-fluid py-2 px-lg-4">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="smallfnt1 text-white">Welcome to Saravana Embassy! Where Fashion Meets Elegance.</div>
				</div>
			</div>
		</div>
	</div>
	 <div class="container-fluid py-2">
        <div class="row">
            <div class="col-2">
				<div class="menubar">
					<button class="menu-trigger"> <i class="bi bi-list heading5"></i> </button>
				</div>
				<div class="menu-body visibility">
					<div class="menu-head">
						<span class="layer">
							<div class="col">
								<div class="row">
									<div class="profile-pic">     
										<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>">
											<img src="<?php if(!empty($main_path)) { echo $main_path.$target_dir; } ?><?php if(!empty($logo)) { echo $logo; } ?>" class="img-fluid logo_size" alt="Saravana Embassy" title="Saravana Embassy">
										</a> 
									</div>
								</div>
							</div> 
						</span>
					</div>
					<nav class="menu-container">
						<ul class="menu-items fullpad">
							<li> <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>"> HOME </a></li> 
							<li> <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>about"> ABOUT US </a></li> 
							<li class="has-sub"> <span class="dropdown-heading"> PRODUCTS </span> 
								<ul class="fullpad"> 
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 1</div>
										</a>
									</li>
									<li class="sidemenu">
										<div class="accordion" id="accordionExample">
											<div class="card">
												<div class="card-header highlight" id="heading1">
													<h2 class="clearfix mb-0">
														<a class="btn btn-link pl-2" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"> 
															Categories <i class="material-icons">expand_more</i></a>									
													</h2>
												</div>
												<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
													<div class="card-body medium">
														<a href="product_listing.php"><div class="helvetica pl-2">Product 1</div></a>
														<a href="product_listing.php"><div class="helvetica pl-2">Product 2</div></a>
														<a href="product_listing.php"><div class="helvetica pl-2">Product 3</div></a>
													</div>
												</div>
											</div>	
											<div class="card">
												<div class="card-header highlight" id="heading2">
													<h2 class="clearfix mb-0">
														<a class="btn btn-link pl-2" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"> 
															Categories <i class="material-icons">expand_more</i></a>									
													</h2>
												</div>
												<div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
													<div class="card-body medium">
														<a href="product_listing.php"><div class="helvetica pl-2">Product 1</div></a>
														<a href="product_listing.php"><div class="helvetica pl-2">Product 2</div></a>
														<a href="product_listing.php"><div class="helvetica pl-2">Product 3</div></a>
													</div>
												</div>
											</div>	
										</div>
									</li>
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 1</div>
										</a>
									</li>
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 2</div>
										</a>
									</li>
								</ul> 
							</li>
							<li class="has-sub"> <span class="dropdown-heading"> SPECIAL PRODUCTS </span> 
								<ul class="fullpad"> 
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 1</div>
										</a>
									</li>
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 2</div>
										</a>
									</li>
									<li>
										<a href="product_listing.php" class="pl-2">
											<div class="helvetica">Product 3</div>
										</a>
									</li>
								</ul> 
							</li>
							<li> <a href="<?php if(!empty($main_path)) { echo $main_path; } ?>contact"> CONTACT US </a></li> 
						</ul>
						<div class="px-1 pt-2">
							<div class="bg-light p-2 px-3 rounded">
								<div class="wallet_check">
									<a href="#"><i class="bi bi-wallet2 heading5 pr-2 clr1"></i><span class="helvetica pf2 text-dark">1925.00</span></a>
								</div>
							</div>
						</div>
					</nav>
				</div>
            </div>
            <div class="col-8 align-self-center fullpad">
				<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>">
					<img src="<?php if(!empty($main_path)) { echo $main_path.$target_dir; } ?><?php if(!empty($logo)) { echo $logo; } ?>" class="img-fluid logo mx-auto d-block" alt="Shopping Card" title="Shopping Card">
				</a>
			</div>
            <div class="col-2 align-self-center pl-0 pt-4">
                <ul class="d-flex float-right mb-0 fullpad">
                    <li class="text-center smallfnt">
						<?php
							if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
						?>						
							<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>my-account" class="pr-1" title="login">
								<i class="bi bi-person-circle heading5 clr2 font-weight-bold"></i>
							</a>
						<?php }else{
							?>
							<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="pr-1" title="login">
								<i class="bi bi-person-circle heading5 clr2 font-weight-bold"></i>
							</a>							
							<?php } ?>
                    </li>
					<li class="text-center smallfnt pr-1">
						<a href="wishlist.php" class="text-dark"><i class="bi bi-heart heading5"></i> </a>
						<div class="badges badgescntr">4</div>
					</li>
                    <li>
						<?php
							if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_customer_id'])){
						?>						
							<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>cart" class="pr-1" title="Cart">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
								<i class="bi bi-cart heading5 clr2 font-weight-bold"></i>
								<div class="badges badgescntr cart_product_count">0</div>
							</a>
						<?php }else{ ?>
							<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>login" class="pr-1" title="Cart">
								<i class="bi bi-cart heading5 clr2 font-weight-bold"></i>
							</a>
						<?php } ?>
                    </li>
                </ul>
            </div>
            <div class="col-12 mt-1">
                <form class="search-form poppins fw-500" id="mainSearchForm">
					<div class="input-group search-input-group">
						<!-- Category Dropdown -->
						<div class="input-group-prepend">
							<select class="form-control search-select" id="categorySelect">
								<option value="all"> All Categories</option>
								<option value="products">Products</option>
								<option value="services">Services</option>
								<option value="articles">Articles</option>
								<option value="people">People</option>
								<option value="places">Places</option>
								<option value="events">Events</option>
							</select>
						</div>
						<!-- Search Input -->
						<input type="text" class="form-control search-input" id="searchInput" placeholder="What are you looking for?" autocomplete="off">
						<!-- Search Button -->
						<div class="input-group-append">
							<button class="btn search-btn" type="submit">
								<i class="bi bi-search text-white"></i>
								
							</button>
						</div>
					</div>
           		</form>
            </div>
        </div>
    </div>
</div>