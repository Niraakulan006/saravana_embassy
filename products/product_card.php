    <?php        
            if(!empty($data['product_id'])) {
                $product_unique_id = ""; $category_ids = ""; $product_name = ""; $product_main_image = ""; $product_rates = "";
                $product_brand_id = ""; $product_url = "";
                
                if(!empty($data['category_id'])) {
                    $category_ids = $data['category_id'];
                }
                if(!empty($data['url'])){
                    $product_url = $data['url'];
                    $product_url = $obj->encode_decode('decrypt',$product_url);
                }

                if(!empty($data['filter_price_product_id'])) {
                    $product_unique_id = $data['filter_price_product_id'];
                }
                if(!empty($data['name'])) {
                    $product_name = $obj->encode_decode('decrypt', $data['name']);
                }
                $lower_case_name = "";
                if(!empty($data['lower_case_name'])) {
                    $lower_case_name = $obj->encode_decode('decrypt', $data['lower_case_name']);
                }
                $url = "";
                if(!empty($data['url'])) {
                    $url = $data['url'];
                    $url = $obj->encode_decode('decrypt', $url);
                }
                if(!empty($data['multiple_images']) && $data['multiple_images'] != $GLOBALS['null_value']) {
                    $product_main_image = $data['multiple_images'];
                }
                if(!empty($data['actual_price'])) {
                    $product_rates = $data['actual_price'];
                }
                
                if(!empty($data['brand_id'])) {
                    $product_brand_id = $data['brand_id'];
                    $brand_name = $obj->getTableColumnValue($GLOBALS['brand_table'], 'brand_id', $product_brand_id, 'brand_name');
                    $brand_name = $obj->encode_decode('decrypt', $brand_name);
                }

                $product_category_id = ""; $product_category_name = "";
                if(!empty($show_category_id)) {
                    $product_category_id = $show_category_id;
                    if(!empty($product_category_id)) {
                        $product_category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $product_category_id, 'name');
                    }
                }
                $parent_category_name = "";
                if(!empty($product_category_id)) {
                    $parent_category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $product_category_id, 'lower_case_name');
                }
                if(!empty($parent_category_name)) {
                    $parent_category_name = $obj->encode_decode('decrypt', $parent_category_name);
                }
                if(!empty($product_category_name)) {
                    $product_category_name = $obj->encode_decode('decrypt', $product_category_name);
                }

                $redirection_page = "";
                if(!empty($url)) { 
                    $redirection_page = "products/".$url; 
                }

                $default_product_main_image = "product_default_image.jpg";

                $cart_product_id = "";
                if(!empty($data['product_id'])) {
                    $cart_product_id = $data['product_id'];
                }
                ?>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="border shadow" id="product_card_box_<?php if(!empty($cart_product_id)) { echo $cart_product_id; } ?>">
						<a href="<?php if(!empty($main_path)) { echo $main_path; } ?>products/<?php if(!empty($product_url)) { echo $product_url; } ?>">
							<div class="product-items">
								<div class="product-items-thumbnail">
									<div class="product-items-link" href="<?php if(!empty($main_path)) { echo $main_path; } ?>products/<?php if(!empty($product_url)) { echo $product_url; } ?>">
                                        <?php if(!empty($product_main_image) && file_exists($target_dir.$product_main_image.$GLOBALS['image_format'])) { ?>
                                            <img src="<?php if(!empty($main_path)) { echo $main_path; } ?><?php echo $target_dir.$product_main_image.$GLOBALS['image_format']; ?>" class="product-items-img product-primary-img" alt="<?php if(!empty($product_name)) { echo htmlentities($product_name); } ?>" title="<?php if(!empty($product_name)) { echo htmlentities($product_name); } ?>">
                                        <?php }else{ ?>
                                            <img src="<?php if(!empty($main_path)) { echo $main_path; } ?><?php echo $target_dir.$default_product_main_image; ?>" class="product-items-img product-primary-img" alt="<?php if(!empty($product_name)) { echo htmlentities($product_name); } ?>" title="<?php if(!empty($product_name)) { echo htmlentities($product_name); } ?>">
                                        <?php } ?>
									</div>
									<div class="product-badge">
                                        <?php if(!empty($brand_name)) { ?>
                                        <div class="product-badge-items poppins"><?php echo $brand_name; ?></div>
                                        <?php } ?>                                            
									</div>
								</div>
							</div>
							<div class="p-3">
								<div class="poppins fw-500 smallfnt pb-2 text-center text-dark">
                                    <?php echo strtoupper($product_name); ?>                                    
                                </div>
								<div class="d-flex">
									<div class="poppins fw-600 pr-2 text-dark"><i class="bi bi-currency-rupee"></i> <?php echo number_format($product_rates, 2); ?></div>
									<div class="poppins fw-500 strike"><i class="bi bi-currency-rupee"></i> 75000.00 </div>
								</div>	
							</div>	
						</a>
					</div>
				</div>
                <?php
            }
        ?>
