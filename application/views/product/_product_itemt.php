<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (empty($product->post_type)): ?>


	<div class="product-item" style="overflow: hidden; text-align: left;margin-bottom: 0px;">
		<div class="row-custom">
		<?php if ($product->for_sale != 1): ?>
			<a class="item-favorite-button item-favorite-enable <?php echo (is_product_in_favorites($product->id) == true) ? 'item-favorited' : ''; ?>"  data-product-id="<?php echo $product->id; ?> " style="margin-top: 90px; margin-right: 83px;"></a>
		<?php endif ?>
			<a href="<?php echo generate_product_url($product); ?>">
					<img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_product_image($product->id, 'image_small'); ?>" alt="<?php echo html_escape($product->title); ?>" style="padding-top: 6px;" class="lazyload img-fluid img-product" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
			</a>
			<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
				<span class="badge badge-dark badge-promoted"><?php echo trans("promoted"); ?></span>
			<?php endif; ?>
		</div>
		<div class="row-custom item-details" >
			<h3 class="product-title">
				<a href="<?php echo generate_product_url($product); ?>"><?php echo html_escape($product->title); ?></a>
			</h3>
			<?php if ($product->for_sale != 1): ?>
			<p class="product-user text-truncate">
				<a href="<?php echo lang_base_url() . "profile" . '/' . html_escape($product->user_slug); ?>">
					<?php echo get_shop_name_product($product); ?>
				</a>
			</p>

			
			<div class="item-meta">
				<!--stars-->
				<?php if ($general_settings->product_reviews == 1): ?>
			<?php $this->load->view('partials/_review_stars', ['review' => $product->rating]); ?>
					<span class="item-comments"><i class="icon-comment"></i>&nbsp;<?php echo get_product_comment_count($product->id); ?></span>
				<?php endif; ?>
				<span class="item-favorites"><i class="icon-heart-o"></i>&nbsp;<?php echo get_product_favorited_count($product->id); ?></span>
			</div>
			<?php else: ?>
				<p class="product-user text-truncate">
					<a href="<?php echo generate_product_url($product); ?>">
						<?php echo 'Product For Sale'; ?>
					</a>
				</p>
			<?php endif ?>
		</div>
	</div>


<?php else: ?>


	<div class="product-item" style="margin: 0px;">
		<a class="item-favorite-button item-favorite-enable <?php echo (is_product_in_favorites($product->id) == true) ? 'item-favorited' : ''; ?>"  data-product-id="<?php echo $product->id; ?> " style="margin-top: 90px; margin-right: 55px;"></a>
		<a class="image-popup lightbox item-view-button" href="<?php echo get_product_image($product->id, 'image_small'); ?>" data-effect="mfp-zoom-out" title="" style="margin-top: 85px; margin-right: 90px;"><i class="icon-eye"></i></a>
		<div class="grid-item">
	        <div class="image_card" style="height: 300px; margin-top: 15px;">
	            <div class="card_img_hover">
	                <div class="card_info">
	                    <svg class="card_clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
	                    </svg>
	                    <span class="card_date"><?php echo time_ago($product->created_at); ?></span>
	                </div>
	            </div>
	            <div class="card_img" style="background-image: url('<?php echo get_product_image($product->id, 'image_small'); ?>');height: 210px;"></div>
	            <a href="<?php echo generate_product_url($product); ?>" data-effect="mfp-zoom-out" title="">
	                <div class="card_img_hover_sec" style="background-image: url('<?php echo get_product_image($product->id, 'image_small'); ?>');height: 225px;"></div>
	            </a>
	            <div class="card__info" style="padding-top: 12px; padding-left: 5px; padding-right: 5px; text-align: center;">
	                <h3 class="card_title crd"><?php $num_len = strlen($product->title); if ($num_len > 15) { echo substr($product->title, 0, 14) . ".."; } else { echo $product->title;} ?></h3>
	                <span class="card_by">by&nbsp;</span><span class="card_by" style="padding-top: 0px;"><a href="<?php echo lang_base_url() . "profile" . '/' . html_escape($product->user_slug); ?>" class="card_author" title="author"><?php $num_len = strlen(get_shop_name_product($product)); if ($num_len > 12) { echo substr(get_shop_name_product($product), 0, 10) . ".."; } else { echo get_shop_name_product($product);} ?></a></span>
	            </div>
	        </div>
			<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
				<span class="badge badge-dark badge-promoted"><?php echo trans("promoted"); ?></span>
			<?php endif; ?>
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
	

	
    



<?php endif; ?>