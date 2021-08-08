<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($cart_payment_method->payment_option == "wallet"): ?>
	<!--PROMOTE SALES-->
	<?php if ($mds_payment_type == 'promote' || $mds_payment_type == 'advert' || $mds_payment_type == 'store'): ?>
		<?php if ($cart_payment_method->payment_option == "wallet"): ?>
			<?php echo form_open('cart_controller/direct_payment_post'); ?>
			<input type="hidden" name="mds_payment_type" value="<?php echo $mds_payment_type; ?>">
			<input type="hidden" name="payment_id" value="<?php echo $transaction_number; ?>">
			<input type="hidden" name="payment_method" value="wallet">
            <div class="col-sm-12 col-md-12">
                <div class="row-custom">
                    <div class="earnings-boxes">
                    	 <center><p class="title"><?php echo ("C ~ Wallet"); ?></p></center>
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12">
                                <div class="earnings-box">
                                    <p class="title"><?php echo trans("balance"); ?></p>
                                    <p class="price"><?php echo print_price(user()->wallet, $this->payment_settings->default_product_currency); ?></p>
                                    <?php if (user()->wallet >= $total_amount): ?>
                                    <p class="description"><?php echo ("This order price will be withdrawn from your wallet"); ?></p>
                                    <?php else: ?>
                                    	<p class="description" style="color: red;"><?php echo ("Sorry you do not have enough balance on your wallet for this transaction.!"); ?></p>
                                    <?php endif; ?>
                                </div>
                                    <?php if (user()->wallet >= $total_amount): ?>
                                    <button style="margin-top: 20px;" type="submit" name="submit" value="update" class="btn btn-lg btn-custom float-right"><?php echo trans("place_order") ?></button>
                                    <?php else: ?>
                                    	<a href="<?php echo lang_base_url(); ?>cart/shipping"><label style="margin-top: 20px;" class="btn btn-lg btn-custom float-right"><?php echo ("Credit wallet") ?></label></a>
                                    <?php endif; ?>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php echo form_close(); ?>
		<?php endif; ?>
	<?php else: ?>
		<!--PRODUCT SALES-->
		<div class="row">
			<div class="col-12">
				<?php $this->load->view('product/_messages'); ?>
			</div>
		</div>
		<?php echo form_open('cart_controller/direct_payment_post'); ?>
		<input type="hidden" name="mds_payment_type" value="<?php echo $mds_payment_type; ?>">
		<input type="hidden" name="payment_method" value="wallet">
		<div id="payment-button-container" class=paypal-button-cnt">
			
			<div class="col-sm-12 col-md-12">
                <div class="row-custom">
                    <div class="earnings-boxes">
                    	 <center><p class="title"><?php echo ("C ~ Wallet"); ?></p></center>
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-12">
                                <div class="earnings-box">
                                    <p class="title"><?php echo trans("balance"); ?></p>
                                    <p class="price"><?php echo print_price(user()->wallet, $this->payment_settings->default_product_currency); ?></p>
                                    <?php if (user()->wallet >= $total_amount): ?>
                                    <p class="description"><?php echo ("This order price will be withdrawn from your wallet"); ?></p>
                                    <?php else: ?>
                                    	<p class="description" style="color: red;"><?php echo ("Sorry you do not have enough balance on your wallet for this transaction.!"); ?></p>
                                    <?php endif; ?>
                                </div>
                                    <?php if (user()->wallet >= $total_amount): ?>
                                    <button style="margin-top: 20px;" type="submit" name="submit" value="update" class="btn btn-lg btn-custom float-right"><?php echo trans("place_order") ?></button>
                                    <?php else: ?>
                                    	<a href="<?php echo lang_base_url(); ?>cart/shipping"><label style="margin-top: 20px;" class="btn btn-lg btn-custom float-right"><?php echo ("Credit wallet") ?></label></a>
                                    <?php endif; ?>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<?php echo form_close(); ?>
	<?php endif; ?>
<?php endif; ?>



