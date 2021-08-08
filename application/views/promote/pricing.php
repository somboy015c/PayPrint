<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12">
				<nav class="nav-breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb">
					</ol>
				</nav>
				<div class="row justify-content-center">
					<div class="col-12 col-md-12 col-lg-10">
						<!-- include message block -->
						<?php $this->load->view('product/_messages'); ?>
					</div>
				</div>
				<h1 class="page-title page-title-product"><?php if ($type == "new" || $type == "exist") { if ($bully == 'work') { echo "Promote&nbsp;Your&nbsp;Service"; } else { echo "Promote&nbsp;Your&nbsp;Service"; } } if ($type == "e_advert" || $type == "u_advert" || $type == "p_advert"){ echo ("Advertisement Plans"); } if ($type == "store"){ if ($req == 'workshop') { if ($tp == 'renew') {  echo ("Workshop Renewal Plans"); } else { echo ("Workshop Opening Plans"); }} else { if ($tp == 'renew') {  echo ("Shop Renewal Plans"); } else { echo ("Shop Opening Plans"); }} } ?></h1>
				<p class="payment-wait"><?php echo trans("please_wait"); ?></p>
				<div class="form-add-product">
					<div class="row justify-content-center">
						<div class="col-12 col-md-12 col-lg-10">
							<div class="row justify-content-center">
								<?php if ($type == "new"): ?>
									<div class="col-12 col-sm-6 col-md-4 m-b-30">
										<div id="pricing_card_1" class="card pricing-card selected-card">
											<div class="card-header">
												<h3 class="title">
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span>0</span>
												</h3>
											</div>
											<div class="card-block">
												<h4 class="card-title">
													<?php echo trans("free_plan"); ?>
												</h4>
												<ul class="list-group">
													<li class="list-group-item"><?php echo trans("free_listing"); ?></li>
												</ul>
												<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_1"><?php echo trans("choose_plan"); ?></a>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($type == "new" || $type == "exist"): ?>
								<div class="col-12 col-sm-6 col-md-4 m-b-30">
									<div id="pricing_card_2" class="card pricing-card <?php echo ($type == "exist") ? 'selected-card' : ''; ?>">
										<div class="card-header">
											<h3 class="title">
												<?php if ($payment_settings->free_product_promotion == 1): ?>
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span>0</span><span class="period">/<?php echo trans("day"); ?></span>
												<?php else: ?>
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->price_per_day), 0, -3);  ?></span><span class="period">/<?php echo trans("day"); ?></span>
												<?php endif; ?>
											</h3>
										</div>
										<div class="card-block">
											<h4 class="card-title">
												<?php echo trans("daily_plan"); ?>
											</h4>
											<ul class="list-group">
												<li class="list-group-item"><?php echo trans("promoted_badge"); ?></li>
												<li class="list-group-item"><?php echo trans("appear_on_homepage"); ?></li>
												<li class="list-group-item"><?php echo trans("show_first_search_lists"); ?></li>
											</ul>
											<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_2"><?php echo trans("choose_plan"); ?></a>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-4 m-b-30">
									<div id="pricing_card_3" class="card pricing-card">
										<div class="card-header">
											<h3 class="title">
												<?php if ($payment_settings->free_product_promotion == 1): ?>
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span>0</span><span class="period">/<?php echo trans("month"); ?></span>
												<?php else: ?>
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->price_per_month), 0, -3);  ?></span><span class="period">/<?php echo trans("month"); ?></span>
												<?php endif; ?>
											</h3>
										</div>
										<div class="card-block">
											<h4 class="card-title">
												<?php echo trans("monthly_plan"); ?>
											</h4>
											<ul class="list-group">
												<li class="list-group-item"><?php echo trans("promoted_badge"); ?></li>
												<li class="list-group-item"><?php echo trans("appear_on_homepage"); ?></li>
												<li class="list-group-item"><?php echo trans("show_first_search_lists"); ?></li>
											</ul>
											<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_3"><?php echo trans("choose_plan"); ?></a>
										</div>
									</div>
								</div>
								<?php endif; ?>





















								<?php if ($type == "p_advert" || $type == "u_advert" || $type == "e_advert"): ?>
								<div class="col-12 col-sm-6 col-md-4 m-b-30">
									<div id="pricing_card_4" class="card pricing-card <?php echo ($type == "u_advert" || $type == "p_advert" || $type == "e_advert") ? 'selected-card' : ''; ?>">
										<div class="card-header">
											<h3 class="title">
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->ad_price_per_day), 0, -3);  ?></span><span class="period">/<?php echo trans("day"); ?></span>
											</h3>
										</div>
										<div class="card-block">
											<h4 class="card-title">
												<?php echo trans("daily_plan"); ?>
											</h4>
											<ul class="list-group">
												<li class="list-group-item"><?php echo ("Daily Advertisement Display"); ?></li>
												<li class="list-group-item"><?php echo ("Advertisement Badge"); ?></li>
												<li class="list-group-item"><?php echo ("Sorted On Pages"); ?></li>
											</ul>
											<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_4"><?php echo trans("choose_plan"); ?></a>
										</div>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-4 m-b-30">
									<div id="pricing_card_5" class="card pricing-card">
										<div class="card-header">
											<h3 class="title">
													<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->ad_price_per_month), 0, -3);  ?></span><span class="period">/<?php echo trans("month"); ?></span>
											</h3>
										</div>
										<div class="card-block">
											<h4 class="card-title">
												<?php echo trans("monthly_plan"); ?>
											</h4>
											<ul class="list-group">
												<li class="list-group-item"><?php echo ("Monthly Advertisement Display"); ?></li>
												<li class="list-group-item"><?php echo ("Advertisement Badge"); ?></li>
												<li class="list-group-item"><?php echo ("Sorted On Pages"); ?></li>
											</ul>
											<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_5"><?php echo trans("choose_plan"); ?></a>
										</div>
									</div>
								</div>
								<?php endif; ?>


























								<?php if ($type == "store"): ?>
									<?php if ($req == "workshop"): ?>

										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_9" class="card pricing-card <?php echo ($req == "workshop") ? 'selected-card' : ''; ?>">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->basic_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Basic Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of Handworks"); ?></li>
														<li class="list-group-item"><?php echo ("Posts of Basic Handworks"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->basic_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_9"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_10" class="card pricing-card">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->premium_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Premium Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of Handworks"); ?></li>
														<li class="list-group-item"><?php echo ("Posts of Premium Handworks"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->premium_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_10"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_11" class="card pricing-card">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->ultimate_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Ultimate Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of Handworks"); ?></li>
														<li class="list-group-item"><?php echo ("Posts of Ultimate Handworks"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->ultimate_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_11"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>

									<?php else: ?>

										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_6" class="card pricing-card <?php echo ($type == "store") ? 'selected-card' : ''; ?>">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->retailer_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Retailer Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of products"); ?></li>
														<li class="list-group-item"><?php echo ("0% Discount On Sale"); ?></li>
														<li class="list-group-item"><?php echo ("Sales in Retail Quantity And Price"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->retailer_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_6"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_7" class="card pricing-card">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->wholesaler_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Wholesaler Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of products"); ?></li>
														<li class="list-group-item"><?php echo ("0% Discount On Sale"); ?></li>
														<li class="list-group-item"><?php echo ("Sales in Whole Quantity And Price"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->wholesaler_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_7"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-4 m-b-30">
											<div id="pricing_card_8" class="card pricing-card">
												<div class="card-header">
													<h3 class="title">
															<span class="currency"><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?></span><span><?php echo substr(price_format($payment_settings->manufacturer_plan), 0, -3);  ?></span><span class="period">/<?php echo ("year"); ?></span>
													</h3>
												</div>
												<div class="card-block">
													<h4 class="card-title">
														<?php echo ("Manufacturer Plan"); ?>
													</h4>
													<ul class="list-group">
														<li class="list-group-item"><?php echo ("Unlimited Post of products"); ?></li>
														<li class="list-group-item"><?php echo ("0% Discount On Sale"); ?></li>
														<li class="list-group-item"><?php echo ("Sales in Production Quantity And Price"); ?></li>
														<li class="list-group-item"><?php echo ($general_settings->manufacturer_storage/1000 . "GB Storage Space"); ?></li>
														<li class="list-group-item"><?php echo ("Advanced Protection"); ?></li>
													</ul>
													<a href="javascript:void(0)" class="btn btn-pricing-button" data-pricing-card="pricing_card_8"><?php echo trans("choose_plan"); ?></a>
												</div>
											</div>
										</div>

									<?php endif; ?>
								<?php endif; ?>



















							</div>

							<?php
							$price_per_day = price_format($payment_settings->price_per_day);
							$price_per_month = price_format($payment_settings->price_per_month);
							$ad_price_per_day = price_format($payment_settings->ad_price_per_day);
							$ad_price_per_month = price_format($payment_settings->ad_price_per_month);
							$retailer_plan = price_format($payment_settings->retailer_plan);
							$wholesaler_plan = price_format($payment_settings->wholesaler_plan);
							$manufacturer_plan = price_format($payment_settings->manufacturer_plan);
							$basic_plan = price_format($payment_settings->basic_plan);
							$premium_plan = price_format($payment_settings->premium_plan);
							$ultimate_plan = price_format($payment_settings->ultimate_plan);
							?>
							<input type="hidden" id="price_per_day" value="<?php echo $price_per_day; ?>">
							<input type="hidden" id="price_per_month" value="<?php echo $price_per_month; ?>">
							<input type="hidden" id="ad_price_per_day" value="<?php echo $ad_price_per_day; ?>">
							<input type="hidden" id="ad_price_per_month" value="<?php echo $ad_price_per_month; ?>">
							<input type="hidden" id="retailer_plan" value="<?php echo $retailer_plan; ?>">
							<input type="hidden" id="wholesaler_plan" value="<?php echo $wholesaler_plan; ?>">
							<input type="hidden" id="basic_plan" value="<?php echo $basic_plan; ?>">
							<input type="hidden" id="premium_plan" value="<?php echo $premium_plan; ?>">
							<input type="hidden" id="ultimate_plan" value="<?php echo $ultimate_plan; ?>">

							<div class="container-pricing-card" id="container_pricing_card_1" <?php echo ($type != "new") ? 'style="display:none;"' : ''; ?>>
								<div class="row">
									<div class="col-12">
										<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
										<input type="hidden" name="plan_type" value="free">
										<a href="<?php echo lang_base_url() . $product->slug; ?>" class="btn btn-lg btn-custom float-right m-r-10"><?php echo trans("submit"); ?></a>
									</div>
								</div>
							</div>

							<div class="container-pricing-card" id="container_pricing_card_2" <?php echo ($type == "exist") ? 'style="display:block;"' : ''; ?>>
								<?php echo form_open('promote_controller/pricing_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
								<input type="hidden" name="plan_type" value="daily">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo trans("day_count"); ?></label>
											<input type="number" id="pricing_day_count" name="day_count" class="form-control form-input price-input" min="1" value="1" maxlength="5" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-daily"><?php echo $price_per_day; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-daily"><?php echo $price_per_day; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>
								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>

							<div class="container-pricing-card" id="container_pricing_card_3">
								<?php echo form_open('promote_controller/pricing_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
								<input type="hidden" name="plan_type" value="monthly">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo trans("month_count"); ?></label>
											<input type="number" id="pricing_month_count" name="month_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-monthly"><?php echo $price_per_month; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-monthly"><?php echo $price_per_month; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>















							<div class="container-pricing-card" id="container_pricing_card_4" <?php echo ($type == "p_advert" || $type == "u_advert" || $type == "e_advert") ? 'style="display:block;"' : ''; ?>>
								<?php echo form_open('promote_controller/advert_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="daily">
								<input type="hidden" name="type" value="<?php echo $type; ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo trans("day_count"); ?></label>
											<input type="number" id="ad_pricing_day_count" name="ad_day_count" class="form-control form-input price-input" min="1" value="1" maxlength="5" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-ad_daily"><?php echo $ad_price_per_day; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-ad_daily"><?php echo $ad_price_per_day; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>
								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>

							<div class="container-pricing-card" id="container_pricing_card_5">
								<?php echo form_open('promote_controller/advert_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="type" value="<?php echo $type; ?>">
								<input type="hidden" name="plan_type" value="monthly">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo trans("month_count"); ?></label>
											<input type="number" id="ad_pricing_month_count" name="ad_month_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-ad_monthly"><?php echo $ad_price_per_month; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-ad_monthly"><?php echo $ad_price_per_month; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>










							<div class="container-pricing-card" id="container_pricing_card_6" <?php echo ($type == "store" && $req != "workshop") ? 'style="display:block;"' : ''; ?>>
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="retailer">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rs';}else{echo 's';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="retailer_plan_count" name="retailer_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-retailer"><?php echo $retailer_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-retailer"><?php echo $retailer_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>
							<div class="container-pricing-card" id="container_pricing_card_7">
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="wholesaler">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rs';}else{echo 's';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="wholesaler_plan_count" name="wholesaler_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-wholesaler"><?php echo $wholesaler_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-wholesaler"><?php echo $wholesaler_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>
							<div class="container-pricing-card" id="container_pricing_card_8">
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="manufacturer">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rs';}else{echo 's';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="manufacturer_plan_count" name="manufacturer_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<?php if ($payment_settings->free_product_promotion != 1): ?>
										<div class="col-12 text-right">
											<?php if ($payment_settings->currency_symbol_format == "left"): ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-manufacturer"><?php echo $manufacturer_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php else: ?>
												<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-manufacturer"><?php echo $manufacturer_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
											<?php endif; ?>
										</div>
										<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
										</div>
									<?php else: ?>
										<div class="col-12">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
										</div>
									<?php endif; ?>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>

							<div class="container-pricing-card" id="container_pricing_card_9" <?php echo ($type == "store" && $req == "workshop") ? 'style="display:block;"' : ''; ?>>
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="basic">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rws';}else{echo 'ws';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="basic_plan_count" name="basic_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<div class="col-12 text-right">
										<?php if ($payment_settings->currency_symbol_format == "left"): ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-basic"><?php echo $basic_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php else: ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-basic"><?php echo $basic_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php endif; ?>
									</div>
									<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
									</div>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>


							<div class="container-pricing-card" id="container_pricing_card_10">
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="premium">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rws';}else{echo 'ws';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="premium_plan_count" name="premium_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<div class="col-12 text-right">
										<?php if ($payment_settings->currency_symbol_format == "left"): ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-premium"><?php echo $premium_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php else: ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-premium"><?php echo $premium_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php endif; ?>
									</div>
									<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
									</div>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>


							<div class="container-pricing-card" id="container_pricing_card_11">
								<?php echo form_open('promote_controller/shop_opening_post', ['onkeypress' => "return event.keyCode != 13;"]); ?>
								<input type="hidden" name="user_id" value="<?php echo user()->id; ?>">
								<input type="hidden" name="plan_type" value="ultimate">
								<input type="hidden" name="means" value="<?php if ($tp == 'renew'){echo 'rws';}else{echo 'ws';} ?>">
								<div class="row">
									<div class="col-12 col-sm-6 m-b-15"></div>
									<div class="col-12 col-sm-6 m-b-15">
										<div class="form-group">
											<label class="control-label"><?php echo ("Number of Years"); ?></label>
											<input type="number" id="ultimate_plan_count" name="ultimate_count" class="form-control form-input price-input" min="1" value="1" required>
										</div>
									</div>
									<div class="col-12 text-right">
										<?php if ($payment_settings->currency_symbol_format == "left"): ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<?php echo get_currency($payment_settings->promoted_products_payment_currency); ?><span class="span-price-total-ultimate"><?php echo $ultimate_plan; ?></span>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php else: ?>
											<strong class="price-total"><?php echo trans("total_amount"); ?>&nbsp;<span class="span-price-total-ultimate"><?php echo $ultimate_plan; ?></span><?php echo get_currency($payment_settings->promoted_products_payment_currency); ?>&nbsp;<?php echo $payment_settings->promoted_products_payment_currency; ?></strong>
										<?php endif; ?>
									</div>
									<div class="col-12 m-t-30">
											<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("continue_to_checkout"); ?></button>
									</div>

								</div>
								<?php echo form_close(); ?><!-- form end -->
							</div>









						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Wrapper End-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-number/jquery.number.min.js"></script>

<script>
    $(document).on('click', '.btn-pricing-button', function () {
        var pricing_card = $(this).attr("data-pricing-card");
        $('.pricing-card').removeClass('selected-card');
        $('#' + pricing_card).addClass('selected-card');
        $('.container-pricing-card').hide();
        $('#container_' + pricing_card).show();
    });

    $("#pricing_day_count").on("input keypress paste change", function () {
        var day_count = $("#pricing_day_count").val();
        if (day_count > 1440) {
            day_count = 1440;
            $("#pricing_day_count").val('1440');
        }
        var price_per_day = '<?php echo price_format_decimal($payment_settings->price_per_day); ?>';
        var calculated = day_count * price_per_day;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-daily").text(calculated_formatted);
    });

    $("#pricing_month_count").on("input keypress paste change", function () {
        var month_count = $("#pricing_month_count").val();
        if (month_count > 48) {
            month_count = 48;
            $("#pricing_month_count").val('48');
        }
        var price_per_month = '<?php echo price_format_decimal($payment_settings->price_per_month); ?>';
        var calculated = month_count * price_per_month;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-monthly").text(calculated_formatted);
    });


    $("#ad_pricing_day_count").on("input keypress paste change", function () {
        var day_count = $("#ad_pricing_day_count").val();
        if (day_count > 1440) {
            day_count = 1440;
            $("#ad_pricing_day_count").val('1440');
        }
        var ad_price_per_day = '<?php echo price_format_decimal($payment_settings->ad_price_per_day); ?>';
        var calculated = day_count * ad_price_per_day;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-ad_daily").text(calculated_formatted);
    });

    $("#ad_pricing_month_count").on("input keypress paste change", function () {
        var month_count = $("#ad_pricing_month_count").val();
        if (month_count > 48) {
            month_count = 48;
            $("#ad_pricing_month_count").val('48');
        }
        var ad_price_per_month = '<?php echo price_format_decimal($payment_settings->ad_price_per_month); ?>';
        var calculated = month_count * ad_price_per_month;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-ad_monthly").text(calculated_formatted);
    });








    $("#retailer_plan_count").on("input keypress paste change", function () {
        var year_count = $("#retailer_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#retailer_plan_count").val('10');
        }
        var retailer_plan = '<?php echo price_format_decimal($payment_settings->retailer_plan); ?>';
        var calculated = year_count * retailer_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-retailer").text(calculated_formatted);
    });

    $("#wholesaler_plan_count").on("input keypress paste change", function () {
        var year_count = $("#wholesaler_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#wholesaler_plan_count").val('10');
        }
        var wholesaler_plan = '<?php echo price_format_decimal($payment_settings->wholesaler_plan); ?>';
        var calculated = year_count * wholesaler_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-wholesaler").text(calculated_formatted);
    });
    $("#manufacturer_plan_count").on("input keypress paste change", function () {
        var year_count = $("#manufacturer_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#manufacturer_plan_count").val('10');
        }
        var manufacturer_plan = '<?php echo price_format_decimal($payment_settings->manufacturer_plan); ?>';
        var calculated = year_count * manufacturer_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-manufacturer").text(calculated_formatted);
    });


    $("#basic_plan_count").on("input keypress paste change", function () {
        var year_count = $("#basic_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#basic_plan_count").val('10');
        }
        var retailer_plan = '<?php echo price_format_decimal($payment_settings->basic_plan); ?>';
        var calculated = year_count * retailer_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-basic").text(calculated_formatted);
    });
    $("#premium_plan_count").on("input keypress paste change", function () {
        var year_count = $("#premium_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#premium_plan_count").val('10');
        }
        var retailer_plan = '<?php echo price_format_decimal($payment_settings->premium_plan); ?>';
        var calculated = year_count * retailer_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-premium").text(calculated_formatted);
    });
    $("#ultimate_plan_count").on("input keypress paste change", function () {
        var year_count = $("#ultimate_plan_count").val();
        if (year_count > 10) {
            year_count = 10;
            $("#ultimate_plan_count").val('10');
        }
        var retailer_plan = '<?php echo price_format_decimal($payment_settings->ultimate_plan); ?>';
        var calculated = year_count * retailer_plan;
        if (!Number.isInteger(calculated)) {
            calculated = calculated.toFixed(2);
        }
		<?php if($this->thousands_separator == ','): ?>
        var calculated_formatted = $.number(calculated, 2, ',', '.');
		<?php else: ?>
        var calculated_formatted = $.number(calculated, 2, '.', ',');
		<?php endif; ?>
        $(".span-price-total-ultimate").text(calculated_formatted);
    });


</script>
