<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box-header with-border">
	<div class="left">
		<h3 class="box-title"><?php echo ('Store Settings'); ?></h3>
	</div>
</div>
<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12">
		<!-- include message block -->
		<?php $this->load->view('admin/includes/_messages'); ?>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Retailer'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->retailer_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->retailer_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->retailer_color === "#222" ||
									$general_settings->retailer_color === "") ? "checked" : ""; ?>/>
								<label for="retailer_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->retailer_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="retailer_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="retailer_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->retailer_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="retailer_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="retailer_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="retailer_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="retailer_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="retailer_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="retailer_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="retailer_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="retailer_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="retailer_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->retailer_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="retailer_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="retailer_color">
				<input type="hidden" name="storage_text" value="retailer_storage">
				<button type="submit" name="submit" value="retailer_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>



<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Wholesaler'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->wholesaler_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->wholesaler_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->wholesaler_color === "#222" ||
									$general_settings->wholesaler_color === "") ? "checked" : ""; ?>/>
								<label for="wholesaler_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->wholesaler_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="wholesaler_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="wholesaler_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->wholesaler_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="wholesaler_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="wholesaler_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="wholesaler_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="wholesaler_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="wholesaler_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="wholesaler_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="wholesaler_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="wholesaler_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="wholesaler_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->wholesaler_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="wholesaler_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="wholesaler_color">
				<input type="hidden" name="storage_text" value="wholesaler_storage">
				<button type="submit" name="submit" value="wholesaler_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>



<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Manufacturer'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->manufacturer_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->manufacturer_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->manufacturer_color === "#222" ||
									$general_settings->manufacturer_color === "") ? "checked" : ""; ?>/>
								<label for="manufacturer_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->manufacturer_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="manufacturer_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="manufacturer_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->manufacturer_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="manufacturer_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="manufacturer_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="manufacturer_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="manufacturer_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="manufacturer_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="manufacturer_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="manufacturer_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="manufacturer_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="manufacturer_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->manufacturer_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="manufacturer_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="manufacturer_color">
				<input type="hidden" name="storage_text" value="manufacturer_storage">
				<button type="submit" name="submit" value="manufacturer_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>




	


<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Basic'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->basic_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->basic_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->basic_color === "#222" ||
									$general_settings->basic_color === "") ? "checked" : ""; ?>/>
								<label for="basic_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->basic_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="basic_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="basic_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->basic_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="basic_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="basic_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="basic_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="basic_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="basic_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="basic_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="basic_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="basic_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="basic_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->basic_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="basic_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="basic_color">
				<input type="hidden" name="storage_text" value="basic_storage">
				<button type="submit" name="submit" value="basic_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>





<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Premium'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->premium_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->premium_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->premium_color === "#222" ||
									$general_settings->premium_color === "") ? "checked" : ""; ?>/>
								<label for="premium_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->premium_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="premium_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="premium_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->premium_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="premium_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="premium_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="premium_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="premium_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="premium_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="premium_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="premium_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="premium_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="premium_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->premium_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="premium_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="premium_color">
				<input type="hidden" name="storage_text" value="premium_storage">
				<button type="submit" name="submit" value="premium_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>




	


<?php echo form_open_multipart('admin_controller/store_settings_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('Ultimate'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo ('Price Per Year'); ?></label>
                    <input type="text" name="price" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->ultimate_plan); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo ('Storage (GB)'); ?></label>
                    <input type="text" name="storage" class="form-control form-input price-input" value="<?php echo storage_format_input($general_settings->ultimate_storage); ?>" onpaste="return false;" maxlength="32" required>
                </div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Site Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color0" value="#222"
									   class="regular-checkbox" <?php echo ($general_settings->ultimate_color === "#222" ||
									$general_settings->ultimate_color === "") ? "checked" : ""; ?>/>
								<label for="ultimate_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($general_settings->ultimate_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="ultimate_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="ultimate_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($general_settings->ultimate_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="ultimate_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="ultimate_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="ultimate_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="ultimate_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="ultimate_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="ultimate_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="ultimate_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="ultimate_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="ultimate_color11" value="#2a41e8" class="regular-checkbox"
									<?php echo ($general_settings->ultimate_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="ultimate_color11" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="hidden" name="color_text" value="ultimate_color">
				<input type="hidden" name="storage_text" value="ultimate_storage">
				<button type="submit" name="submit" value="ultimate_plan" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>



</div>
<?php echo form_close(); ?>
<style>
	.form-group {
		margin-bottom: 30px !important;
	}
</style>
