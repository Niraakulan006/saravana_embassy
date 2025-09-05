		<?php
			if(!empty($product_attribute_value_id)) {
				$product_attribute_value_id = json_decode($product_attribute_value_id);
			}		
		?>
		<div class="col-lg-3 col-md-3 col-12">
			<div class="d-none d-lg-block prdt-sticky-top">
            	<div class="manrope fw-600 heading4 head-title">Filterss</div>
				<?php include("product_filter_desktop.php"); ?>
			</div>
			<!--Mobile Category-->
            <div class="d-block d-lg-none w-100 sticky-top1">
				<div class="row mb-4">
					<div class="col-lg-12">
						<a class="manrope filter-btn" data-toggle="collapse" data-target="#myNavbar1">
							<i class="bi bi-filter-left"></i> Filters
						</a>
						<?php include("product_filter_mobile.php"); ?>
					</div>
                </div>
            </div>
		</div>
