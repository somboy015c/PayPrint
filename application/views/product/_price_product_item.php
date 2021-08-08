<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($product->is_free_product == 1): ?>
	<span class="price"style="background: rgb(34, 225, 204);"><?php echo trans("free"); ?></span>
<?php else: ?>
	<?php if ($product->listing_type == 'bidding'): ?>
		<a href="<?php echo generate_product_url($product); ?>" class="a-meta-request-quote" style="margin: 0px; padding: 0px;"><?php echo trans("request_a_quote") ?></a>
	<?php else:
		if (!empty($product->price)):?>
			<span class="price"><?php echo print_price($product->price, $product->currency); ?>
				<?php if ($product->is_sold == 1): ?>
					<span>(<?php echo trans("sold"); ?>)</span>
				<?php endif; ?>
			</span>
		<?php endif;
	endif; ?>
<?php endif; ?>
