<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-sm-12 col-lg-5 order-summary-container">
	<h2 class="cart-section-title"><?php echo trans("order_summary"); ?> (1)</h2>
	<div class="right">
		<?php if (!empty($store_plan)):
			$user = get_user($store_plan->product_id);
				if (!empty($user)):?>
					<div class="cart-order-details">
						<div class="item">
							<div class="item-left">
								<div class="img-cart-product">
									<a href="<?php echo generate_profile_url($user); ?>">
										<?php if ($user->role == 'member'): ?>
											<img src="<?php echo get_user_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>" class="lazyload img-fluid img-product">
										<?php else: ?>
											<img src="<?php echo get_shop_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>" class="lazyload img-fluid img-product">
										<?php endif; ?>
									</a>
								</div>
							</div>
							<div class="item-right">
								<div class="list-item">
									<a href="<?php echo generate_profile_url($user); ?>">
										<?php echo get_shop_name($user); ?>
									</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="item-right">
								<div class="list-item m-t-15">
									<label><?php if ($means == "rws") { echo ("Workshop Renewal Plan"); } elseif ($means == "ws") { echo ("Workshop Opening Plan"); } elseif ($means == "rs") { echo ("Shop Renewal Plan"); } elseif ($means == "s") { echo ("Shop Opening Plan"); } ?>:</label>
									<strong class="lbl-price"><?php echo $store_plan->purchased_plan; ?></strong>
								</div>
								<div class="list-item">
									<label><?php echo trans("price"); ?>:</label>
									<strong class="lbl-price"><?php echo print_price($store_plan->total_amount, $payment_settings->promoted_products_payment_currency); ?></strong>
								</div>
							</div>
						</div>
					</div>
					<p class="m-t-30">
						<strong><?php echo trans("subtotal"); ?><span class="float-right"><?php echo print_price($store_plan->total_amount, $payment_settings->promoted_products_payment_currency); ?></span></strong>
					</p>
					<p class="line-seperator"></p>
					<p>
						<strong><?php echo trans("total"); ?><span class="float-right"><?php echo print_price($store_plan->total_amount, $payment_settings->promoted_products_payment_currency); ?></span></strong>
					</p>
				<?php endif;
		endif; ?>
	</div>
</div>




