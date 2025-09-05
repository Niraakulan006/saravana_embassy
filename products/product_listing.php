	<?php
		$category_filter_list = $obj->getCategoryFilters($show_category_id, '1');
		if(empty($products_sort_by)) {
			if(!empty($default_sort_option)) {
				$products_sort_by = $obj->encode_decode('encrypt', $default_sort_option);
			}
		}    
	?>	
	<div class="row">
        <?php            
            $product_attribute_value_id = '';
            if(isset($_GET['product_filters'])){
                $product_attribute_value_id = $_GET['product_filters'];
                $product_attribute_value_id = json_encode($product_attribute_value_id,true);
            }
        ?>		
         <?php include("product_filter.php"); ?>
		<!--Mobile Category End-->
        <div class="col-lg-9 col-md-9 col-12">	
			<?php
				$product_attribute_value_id = json_encode($product_attribute_value_id,true);
				$default_limit = 12;
				$limit = isset($_GET['per_page']) && in_array($_GET['per_page'], [12, 24, 48]) ? intval($_GET['per_page']) : $default_limit;
				$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
				$offset = ($page - 1) * $limit;

				$total_products = $obj->getProductCount($GLOBALS['product_table'], $show_category_id,$product_attribute_value_id);
				$total_pages = ceil($total_products / $limit);
				$start = $offset + 1;
				$end = min($offset + $limit, $total_products);

				$per_page = isset($_GET['per_page']) ? $_GET['per_page'] : $default_limit;
				$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';
				$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 1000;
				$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 100000;
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			?>        			
			<div class="row bg-light py-2 mb-3">
				<div class="col-lg-4 col-md-4 col-12 align-self-center pb-lg-0 pb-3">
					<div class="poppins smallfnt">Showing <span><?= $start; ?>–<?= $end; ?> of <?= $total_products; ?> </span> Results</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12 pb-lg-0 pb-3">
					<div class="form-group">
						<form method="get" id="perPageForm">
							<input type="hidden" name="sort_by" value="<?= htmlspecialchars($sort_by) ?>">
							<input type="hidden" name="page" value="1">
							<select name="per_page" class="form-control" onchange="document.getElementById('perPageForm').submit();">
								<?php
								$options = [12, 24, 48];
								foreach ($options as $opt) {
									$selected = ($limit == $opt) ? 'selected' : '';
									echo "<option value='$opt' $selected>$opt items per page</option>";
								}
								?>
							</select>
						</form>
                    </div> 
				</div>
				<div class="col-lg-4 col-md-4 col-12 pb-lg-0 pb-3">
					<?php
						if(!empty($default_sort_option)) {
							$default_sort_option = $obj->encode_decode('encrypt', $default_sort_option);
						}
						$listing_option = "";
						if(!empty($products_sort_by)) {
							$listing_option = $products_sort_by;
						}
						else {
							$listing_option = $default_sort_option;
						}
					?>
					<form method="get" id="sortForm">
						<input type="hidden" name="per_page" value="<?= htmlspecialchars($per_page) ?>">
						<input type="hidden" name="page" value="1">                    
						<select name="sort_by" class="form-control" onchange="document.getElementById('sortForm').submit();">
							<?php
								if(!empty($product_sort_by_options)) {
									foreach($product_sort_by_options as $sort_option) {
										if(!empty($sort_option)) {
											$sort_option_encrypted = "";
											$sort_option_encrypted = $obj->encode_decode('encrypt', $sort_option);
											$selected = (!empty($sort_by) && $sort_by == $sort_option) ? 'selected' : '';
							?>
											<option value="<?php if(!empty($sort_option)) { echo $sort_option; } ?>" <?php echo $selected ?> >
												<?php if(!empty($sort_option)) { echo $sort_option; } ?>
											</option>
							<?php                
										}
									}
								}
							?>
						</select>
					</form>
				</div>
			</div>
			<div class="row">
                <?php 
					$product_list = $obj->getProductRecords($GLOBALS['product_table'],$show_category_id,$offset,$limit,$product_attribute_value_id,$sort_by);
					foreach($product_list as $data) {
						$listing_cover = "category_products_cover";
						include("product_card.php"); 
					}
                ?>
			</div>
        </div>
		<div class="col-lg-12 text-center pt-4">
            <?php if ($total_pages > 1): ?>			
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center text-dark">
					<?php
						$filter_query = '';
						if (!empty($_GET['product_filters'])) {
							foreach ($_GET['product_filters'] as $filter_val) {
								$filter_query .= '&product_filters[]=' . urlencode($filter_val);
							}
						}                
						$queryString = 'per_page=' . $per_page . '&sort_by=' . urlencode($sort_by) . $filter_query;                                    
						// $queryString = http_build_query([
						//     'per_page' => $per_page,
						//     'sort_by' => $sort_by
						// ]);
					?>
					<li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
						<a class="page-link text-dark" href="?<?= $queryString ?>&page=<?= max(1, $page - 1); ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo; Prev</span>
						</a>
					</li>

					<?php for ($i = 1; $i <= $total_pages; $i++): ?>
						<li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
							<a class="page-link text-dark" href="?<?= $queryString ?>&page=<?= $i; ?>"><?= $i; ?></a>
						</li>
					<?php endfor; ?>

					<li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
						<a class="page-link text-dark" href="?<?= $queryString ?>&page=<?= min($total_pages, $page + 1); ?>" aria-label="Next">
							<span aria-hidden="true">Next &raquo;</span>
						</a>
					</li>
					<!-- <li class="page-item"><a class="page-link text-dark" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
					<li class="page-item"><a class="page-link text-dark" href="#">Next</a></li>					 -->
				</ul>
			</nav>
			<?php endif; ?>
		</div>
	</div>
