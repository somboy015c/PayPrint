<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo form_open_multipart('admin_controller/advert_settings_post'); ?>
<div class="box-header with-border">
	<div class="left">
		<h3 class="box-title"><?php echo ('Advert Settings'); ?></h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12">
		<!-- include message block -->
		<?php $this->load->view('admin/includes/_messages'); ?>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
		<div class="box-header with-border">
			<div class="left">
				<h3 class="box-title"><?php echo ('AD Pricing'); ?></h3>
			</div>
		</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
                    <label class="control-label"><?php echo trans('price_per_day'); ?></label>
                    <input type="text" name="ad_price_per_day" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->ad_price_per_day); ?>" onpaste="return false;" maxlength="32" required>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo trans('price_per_month'); ?></label>
                    <input type="text" name="ad_price_per_month" class="form-control form-input price-input" value="<?php echo price_format_input($payment_settings->ad_price_per_month); ?>" onpaste="return false;" maxlength="32" required>
                </div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>



<?php echo form_open_multipart('admin_controller/advert_settings_bg_post'); ?>
	<div class="col-sm-12 col-xs-12 col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('AD Background Image'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<label><?php echo ('AD Type'); ?></label>
						</div>
						<div class="col-sm-6 col-xs-12 col-option">
							<input type="radio" name="ad_type" value="middle" id="middle" class="square-purple" checked>
							<label for="middle" class="option-label"><?php echo 'Middle Space'; ?></label>
						</div>
						<div class="col-sm-6 col-xs-12 col-option">
							<input type="radio" name="ad_type" value="sidebar" id="sidebar" class="square-purple">
							<label for="sidebar" class="option-label"><?php echo 'Sidebar Space'; ?></label>
						</div>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label"><?php echo ('Add Image'); ?></label>
					<div class="display-block">
						<a class='btn btn-success btn-sm btn-file-upload'>
							<?php echo trans('select_image'); ?>
							<input type="file" name="bg" size="40" accept=".png, .jpg, .jpeg" onchange="$('#upload-file-info3').html($(this).val());">
						</a>
						(.png, .jpg, .jpeg)
					</div>
					<span class='label label-info' id="upload-file-info3"></span>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Image Text Color'); ?></label>
					<div class="col-sm-12">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color0" value="#222" class="regular-checkbox" checked="">
								<label for="color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color1" value="#09b1ba" class="regular-checkbox">
								<label for="color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color2" value="#6770B7" class="regular-checkbox">
								<label for="color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color3" value="#1abc9c" class="regular-checkbox">
								<label for="color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color4" value="#1da7da" class="regular-checkbox">
								<label for="color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color5" value="#e91e63" class="regular-checkbox">
								<label for="color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color6" value="#e74c3c" class="regular-checkbox">
								<label for="color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color7" value="#f86923" class="regular-checkbox">
								<label for="color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color8" value="#ffbb02" class="regular-checkbox">
								<label for="color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color9" value="#495d7f" class="regular-checkbox">
								<label for="color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color10" value="#95a5a6" class="regular-checkbox">
								<label for="color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color11" value="#fff" class="regular-checkbox">
								<label for="color11" style="background-color:  #fff;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="color12" value="#2a41e8" class="regular-checkbox">
								<label for="color12" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right"><?php echo ('Add'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
		</div>
		<!-- /.box -->
	</div>
<?php echo form_close(); ?>












	<div class="col-sm-12 col-xs-12 col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="left">
					<h3 class="box-title"><?php echo ('AD Background Images'); ?></h3>
				</div>
			</div><!-- /.box-header -->

			<!-- form start -->

			<div class="box-body">
			<?php foreach ($background_images as $key => $image): ?>
				<?php echo form_open_multipart('admin_controller/update_advert_settings_bg'); ?>
				<div class="form-group">
					<div class="col-sm-6">
						<div class="row">
							<img src="<?php echo lang_base_url() . $image->image; ?>" alt="favicon" class="col-sm-12" <?php if ($image->adspace == 'sidebar'){ echo 'style="width: 50%; height: 50%;"'; } ?>>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label"><?php echo ('Image Text Color: ') . $image->font_color; ?></label>
					<div class="col-sm-6">
						<div class="row">
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color0" value="#222"
									   class="regular-checkbox" <?php echo ($image->font_color === "#222" ||
									$image->font_color === "") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color0" style="background-color: #222;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color1" value="#09b1ba"
									   class="regular-checkbox" <?php echo ($image->font_color === "#09b1ba") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color1" style="background-color: #09b1ba;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color2" value="#6770B7" class="regular-checkbox"
									<?php echo ($image->font_color === "#6770B7") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color2" style="background-color:  #6770B7;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color3" value="#1abc9c"
									   class="regular-checkbox" <?php echo ($image->font_color === "#1abc9c") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color3" style="background-color: #1abc9c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color4" value="#1da7da"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#1da7da") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color4" style="background-color:  #1da7da;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color5" value="#e91e63"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#e91e63") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color5" style="background-color:  #e91e63;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color6" value="#e74c3c"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#e74c3c") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color6" style="background-color:  #e74c3c;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color7" value="#f86923"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#f86923") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color7" style="background-color:  #f86923;"></label>
							</div>

							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color8" value="#ffbb02"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#ffbb02") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color8" style="background-color:  #ffbb02;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color9" value="#495d7f"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#495d7f") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color9" style="background-color:  #495d7f;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color10" value="#95a5a6"
									   class="regular-checkbox"
									<?php echo ($image->font_color === "#95a5a6") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color10" style="background-color:  #95a5a6;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color11" value="#fff" class="regular-checkbox"
									<?php echo ($image->font_color === "#fff") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color11" style="background-color:  #fff;"></label>
							</div>
							<div class="custom-checkbox">
								<input type="radio" name="site_color" id="<?php echo $key; ?>_color12" value="#2a41e8" class="regular-checkbox"
									<?php echo ($image->font_color === "#2a41e8") ? "checked" : ""; ?>/>
								<label for="<?php echo $key; ?>_color12" style="background-color:  #2a41e8;"></label>
							</div>
						</div>
					</div>
				</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<div class="dropdown">
					<input type="hidden" name="id" value="<?php echo $image->id; ?>">
					<input type="hidden" name="image" value="<?php echo $image->image; ?>">
                    <button class="btn bg-purple dropdown-toggle btn-select-option pull-right" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                           	<span class="caret"></span>
                       	</button>
                       	<ul class="dropdown-menu options-dropdown pull-right" style="position: relative;">
                           	<li>
                               	<button type="submit" name="submit" value="edit" class="btn pull-right"><i class="fa fa-edit option-icon"></i><?php echo trans('save_changes'); ?></button>
                           	</li>
                           	<li>
                           		<button type="submit" name="submit" value="delete" class="btn pull-right"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></button>
                           	</li>
                       	</ul>
                   	</div>
			</div>
			<!-- /.box-footer -->
			<!-- form end -->
			<?php echo form_close(); ?>
			<?php endforeach; ?>
			</div>
		</div>
		<!-- /.box -->
	</div>







<style>
	.form-group {
		margin-bottom: 30px !important;
	}
</style>
