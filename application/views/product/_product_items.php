

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
			<?php $this->load->view('product/_price_product_item', ['product' => $product]); ?>
<div class="product-item">
	<div class="row-custom">
		<a href="<?php echo generate_product_url($product); ?>">
				<img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_product_image($product->id, 'image_small'); ?>" alt="<?php echo html_escape($product->title); ?>" style="width: 217px; height: 220px;" class="lazyload img-fluid img-product" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
		</a>
		<?php if ($product->is_promoted && $promoted_products_enabled == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
			<span class="badge badge-dark badge-promoted"><?php echo trans("promoted"); ?></span>
		<?php endif; ?>
	</div>
	<div class="row-custom item-details" >
		<h3 class="product-title">
			<a href="<?php echo generate_product_url($product); ?>"><?php echo html_escape($product->title); ?></a>
		</h3>
	</div>
</div>
