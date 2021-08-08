<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<div class="product-item main-menu" style="overflow: hidden; text-align: center; background-color: #dee1e4;border-radius: 6px; border: 4px solid #dee1e4;color: #676b6d;transition: box-shadow 0.25s ease;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
		
		<div class="row-custom" style="width: 100%; margin-bottom: 10px; margin-top: 5px;">
                                        
            <a href="<?php echo generate_product_url($product); ?>"><i class="icon-map-marker"></i><?php echo html_escape(get_state($product->service_branch_id)->name);?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo 'To' ?> &nbsp;&nbsp;&nbsp;&nbsp; <i class="icon-map-marker"></i> <?php echo html_escape(get_state($product->service_destination_id)->name); ?></a>
       	</div>

		<div class="row-custom"style=" min-height: 138px;display: table;width: 100%; padding: 0px; box-sizing: border-box;border: 1px solid rgba(182, 180, 180, .25);background: #fff;transition: box-shadow 0.25s ease;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
			<div class="col-sm-12" style=" padding: 0px; ">
				<?php if ($product->for_sale != 1): ?>
					<a class="item-favorite-button item-favorite-enable <?php echo (is_product_in_favorites($product->id) == true) ? 'item-favorited' : ''; ?>"  data-product-id="<?php echo $product->id; ?> " style="margin-top: 0px; margin-right: 43px; padding: 0px; "></a>
				<?php endif ?>
					
						<div class="col-12" style=" padding: 0px; ">
	                                    <div class="row-custom" style=" padding: 0px; ">
	                                    	<div class="col-sm-6" style="margin-bottom: 10px; margin-top: 10px;">
	                                    		<?php if ($product->category_id == 1) { $img = 'shutw'; } elseif ($product->category_id == 2) { $img = 'luxw'; } elseif ($product->category_id == 5) { $img = 'taxw'; } elseif ($product->category_id == 7) { $img = 'brtw'; } ?>
	                                    		<img src="<?php echo base_url() . 'assets/img/' . $img . '.png'; ?>" style="height: 210px;">
	                                    	</div>
	                                    	<div class="col-sm-6">
	                                    		<div class="row-custom item-details">
								






	                                    			<h3 class="product-title">
									<a href="<?php echo generate_product_url($product); ?>"><?php echo html_escape(get_category_name_by_lang($product->category_id, $this->selected_lang->id)) . '&nbsp;'; ?><?php echo html_escape($product->title); ?></a>
								</h3>
								<?php if ($product->for_sale != 1): ?>
									<p class="product-user text-truncate">
										<a href="<?php echo lang_base_url() . "profile" . '/' . html_escape($product->user_slug); ?>">
											<?php echo get_shop_name_product($product); ?>
										</a>
									</p>
									<!--stars-->
									<?php $this->load->view('partials/_review_stars', ['review' => $product->rating]); ?>
								<?php endif ?>
								<div class="item-meta">
									<div class="price-product-item-horizontal">
										<?php $this->load->view('product/_price_product_item', ['product' => $product]); ?>
									</div>
									<?php if ($product->for_sale != 1): ?>
										<?php if ($general_settings->product_reviews == 1): ?>
											<span class="item-comments"><i class="icon-comment"></i>&nbsp;<?php echo get_product_comment_count($product->id); ?></span>
										<?php endif; ?>
										<span class="item-favorites"><i class="icon-heart-o"></i>&nbsp;<?php echo get_product_favorited_count($product->id); ?></span>
									<?php endif ?>
								</div>
							</div>
							<div class="row-custom m-t-10">
								<?php if (!$product->is_promoted && $promoted_products_enabled == 1): if ($product->is_promotion_request == 1): ?>
									<label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i>&nbsp;<?php echo ("Processing promotion"); ?></label>
								<?php else: ?>
									<a href="<?php echo lang_base_url() . "promote-product/pricing/" . $product->id; ?>?type=exist" class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-plus"></i>&nbsp;<?php echo trans("promote"); ?></a>
								<?php endif; endif; ?>
									<?php if ($product->status == 1): ?>
									<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
										 <label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i><?php echo trans("promoted"); ?>&nbsp;&nbsp;&nbsp;(<?php echo date_difference($product->promote_end_date, date('Y-m-d H:i:s')) . " " . trans("days_left"); ?>)</label>
									<?php endif; ?>
									<?php if (!$product->is_advert): ?>
										<?php if ($product->is_advert_request == 1): ?>
					                        <label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i>&nbsp;<?php echo "Processing Advertisement "; ?></label>
					                    <?php else: ?>
					                        <a href="<?php if ($user->role == 'member'){ $li = 'pending-products';}else{ $li = 'start-selling';} echo lang_base_url() . $li . "?target=" . $product->id; ?>" class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-plus"></i>&nbsp;<?php echo ("Advertise"); ?></a>
					                    <?php endif ?>
					                <?php else: ?>
					                    <label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i><?php echo ("Advertised"); ?>&nbsp;&nbsp;&nbsp;(<?php echo date_difference($product->advert_end_date, date('Y-m-d H:i:s')) . " " . trans("days_left"); ?>)</label>
									<?php endif; ?>
								<?php endif; ?>
								<a href="<?php if (!empty($product->post_type)){$tt='?bully=work';} else {$tt='';} echo lang_base_url() . "sell-now/edit-product/" . $product->id . $tt; ?>" class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-edit"></i>&nbsp;<?php echo trans("edit"); ?></a>
								<a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-profile-option" onclick="delete_product(<?php echo $product->id; ?>,'<?php echo ("Are you sure you want to remove this service?"); ?>');"><i class="icon-trash"></i>&nbsp;<?php echo trans("delete"); ?></a>
							</div>











											</div>
										</div>






		                </div>
				<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
					<span class="badge badge-dark badge-promoted"><?php echo trans("promoted"); ?></span>
				<?php endif; ?>
			</div>
		</div>
	</div>



















<?php if ($product->category_id == 1) { $img = 'shutwm'; } elseif ($product->category_id == 2) { $img = 'luxwm'; } elseif ($product->category_id == 5) { $img = 'taxwm'; } elseif ($product->category_id == 7) { $img = 'brtwm'; } ?>
	<div class="mobile-menu" style="margin: 0px; overflow: hidden; text-align: center; background-color: #dee1e4;border-radius: 6px; border: 4px solid #dee1e4;color: #676b6d;transition: box-shadow 0.25s ease;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
		<div class="product-item" style="padding: 0px; margin: 0px;">
			<div class="row-custom" style="width: 100%; margin-bottom: 10px; margin-top: 5px;">
	                                        
	            <a href="<?php echo generate_product_url($product); ?>"><i class="icon-map-marker"></i><?php echo html_escape(get_state($product->service_branch_id)->name);?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo 'To' ?> &nbsp;&nbsp;&nbsp;&nbsp; <i class="icon-map-marker"></i> <?php echo html_escape(get_state($product->service_destination_id)->name); ?></a>
	       	</div>
			<div class="row-custom" style="background-color: white; border-top-right-radius: 6px; border-top-left-radius: 6px; padding: 10px;">
				<?php if ($product->for_sale != 1): ?>
					<a class="item-favorite-button item-favorite-enable <?php echo (is_product_in_favorites($product->id) == true) ? 'item-favorited' : ''; ?>"  data-product-id="<?php echo $product->id; ?> " style="margin-top: 0px; margin-right: 10px;"></a>
				<?php endif ?>
				<a href="<?php echo generate_product_url($product); ?>" style="overflow: hidden;">
						<img src="<?php echo base_url() . 'assets/img/' . $img . '.png'; ?>" data-src="<?php echo base_url() . 'assets/img/' . $img . '.png'; ?>" alt="<?php echo html_escape($product->title); ?>" class="lazyload img-fluid img-product" onerror="this.src='<?php echo base_url() . 'assets/img/' . $img . '.png'; ?>'">
				</a>
				<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
					<span class="badge badge-dark badge-promoted"><?php echo trans("promoted"); ?></span>
				<?php endif; ?>
			</div>
			<div class="row-custom item-details" style="background-color: white; border-bottom-right-radius: 6px; border-bottom-left-radius: 6px; padding: 0px 10px 0px 10px;">
				<p class="product-user text-truncate" style="margin-bottom: 5px;">
					<?php echo html_escape(get_category_name_by_lang($product->category_id, $this->selected_lang->id)) . '&nbsp;'; ?><?php echo html_escape($product->title); ?></a>
				</p>
				<a href="<?php echo lang_base_url() . "profile" . '/' . html_escape($product->user_slug); ?>"><p class="product-user text-truncate" style="font-size: 18px; color: #1da7da !important;">
					<?php echo 'BY:&nbsp;' . get_shop_name_product($product); ?>
				</p></a>
				<div class="item-meta">
					<!--stars-->
					<?php if ($general_settings->product_reviews == 1): ?>
				<?php $this->load->view('partials/_review_stars', ['review' => $product->rating]); ?>
						<span class="item-comments"><i class="icon-comment"></i>&nbsp;<?php echo get_product_comment_count($product->id); ?></span>
					<?php endif; ?>
					<span class="item-favorites"><i class="icon-heart-o"></i>&nbsp;<?php echo get_product_favorited_count($product->id); ?></span>
				</div>
			</div>
		</div>
	</div>