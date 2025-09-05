                <form method="get" id="filterForm">					
                    <div class="accordion mt-4 hts" id="accordionExample">
                        <?php
                            foreach($category_filter_list as $filter_key => $filter) {
                                if(!empty($filter['attribute_id'])) {
                        ?>
                                    <div class="card">
                                        <div class="card-header highlight" id="<?php echo "filter_".$filter['attribute_id']; ?>">
                                            <h2 class="clearfix mb-0">
                                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo "filter_".$filter['attribute_id']; ?>" aria-expanded="true"> 
                                                <?php
                                                    if(!empty($filter['attribute_name'])) {
                                                        $filter['attribute_name'] = $obj->encode_decode('decrypt', $filter['attribute_name']);
                                                        echo $filter['attribute_name'];
                                                    }
                                                ?> <span class="material-icons">expand_more</span></a>									
                                            </h2>
                                        </div>
                                        <div id="collapse<?php echo "filter_".$filter['attribute_id']; ?>" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
                                            <div class="card-body poppins">
                                                <?php
                                                    foreach($filter['filter_value_list'] as $value) {
                                                        if(!empty($value['attribute_value_id'])) {
                                                            $filter_selected = 0;
                                                            if(!empty($product_attribute_value_id) && in_array($value['attribute_value_id'], $product_attribute_value_id)) {
                                                                $filter_selected = 1;
                                                            }
                                                ?>
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" class="form-check-input"  name="product_filters[]" <?php if(!empty($filter_selected) && $filter_selected == 1) { ?>checked="checked"<?php } ?> id="<?php if(!empty($value['attribute_value_id'])) { echo "filter_value_".$value['attribute_value_id']; } ?>" value="<?php echo $value['attribute_value_id']; ?>"  onChange="Javascript:CheckFilters(this);">
                                                        <label class="form-check-label" for="<?php if(!empty($value['attribute_value_id'])) { echo "filter_value_".$value['attribute_value_id']; } ?>">
                                                            <?php
                                                                if(!empty($value['attribute_value'])) {
                                                                    $value['attribute_value'] = $obj->encode_decode('decrypt', $value['attribute_value']);
                                                                    echo $value['attribute_value'];
                                                                }
                                                            ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>	
                        <?php
                                }
                            }	
                        ?>
                    </div>
                    <div class="d-flex">
                        <div class="wrapper">
                            <div class="poppins heading5 clr3 pt-2">Price Range</div>
                            <div class="price-input">
                                <div class="field">
                                    <span class="poppins">Min<?= $min_price ?></span>
                                    <input type="number" name="min_price" class="input-min" value="<?= $min_price ?>">
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <span class="poppins">Max<?= $max_price ?></span>
                                    <input type="number" name="max_price" class="input-max" value="<?= $max_price ?>">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="<?= $max_price ?>" value="<?= $min_price ?>" step="100">
                                <input type="range" class="range-max" min="0" max="<?= $max_price ?>" value="<?= $max_price ?>" step="100">
                            </div>
                        </div> 
                    </div>	
                    <button class="cnt-btn1 poppins mt-4">Submit Query</button> 
                </form>