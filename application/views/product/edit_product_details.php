<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$back_url = lang_base_url() . "sell-now/edit-product/" . $product->id;
if ($product->is_draft == 1) {
	$back_url = lang_base_url() . "sell-now/" . $product->id;
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/file-uploader/css/jquery.dm-uploader.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/file-uploader/css/styles.css"/>
<script src="<?php echo base_url(); ?>assets/vendor/file-uploader/js/jquery.dm-uploader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/file-uploader/js/demo-ui.js"></script>
<script type="text/javascript">
	history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
	window.addEventListener('popstate', function (event) {
		window.location.assign('<?php echo $back_url; ?>');
	});
</script>




<!-- Wrapper -->
<div id="wrapper">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12">
				<nav class="nav-breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb"></ol>
				</nav>
				<?php if ($product->is_draft == 1): ?>
					<h1 class="page-title page-title-product"><?php echo ("Add&nbsp;Service"); ?></h1>
				<?php else: ?>
					<h1 class="page-title page-title-product"><?php echo ("Edit&nbsp;Service"); ?></h1>
				<?php endif; ?>
				<div class="form-add-product">
					<div class="row justify-content-center">
						<div class="col-12 col-md-12 col-lg-11">
							<div class="row">
								<div class="col-12">
									<!-- include message block -->
									<?php $this->load->view('product/_messages'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-12">

									<!-- form start -->
									<?php echo form_open('product_controller/edit_product_details_post', ['id' => 'form_validate', 'class' => 'validate_price', 'class' => 'validate_terms', 'onkeypress' => "return event.keyCode != 13;"]); ?>
									<input type="hidden" name="id" value="<?php echo $product->id; ?>">

									
										<?php if ($form_settings->price == 1): ?>
											<div class="form-box">
												<div class="form-box-head">
													<h4 class="title"><?php echo ('Service&nbsp;Cost'); ?></h4>
												</div>
												<div class="form-box-body">
													<div class="form-group">
														<div class="row">
															<?php if ($this->payment_settings->allow_all_currencies_for_classied == 1): ?>
																<div class="col-12 col-sm-4 m-b-sm-15">
																	<div class="selectdiv">
																		<select name="currency" class="form-control" required>
																			<?php $currencies = get_currencies();
																			if (!empty($currencies)):
																				foreach ($currencies as $key => $value):
																					if ($key == $product->currency):?>
																						<option value="<?php echo $key; ?>" selected><?php echo $value["name"] . " (" . $value["hex"] . ")"; ?></option>
																					<?php else: ?>
																						<option value="<?php echo $key; ?>"><?php echo $value["name"] . " (" . $value["hex"] . ")"; ?></option>
																					<?php endif; ?>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</select>
																	</div>
																</div>
																<div class="col-12 col-sm-4 m-b-sm-15">
																	<input type="text" name="price" class="form-control form-input price-input validate-price-input" value="<?php echo ($product->price != 0) ? price_format_input($product->price) : ''; ?>" placeholder="<?php echo $this->input_initial_price; ?>" onpaste="return false;" maxlength="32" <?php echo ($form_settings->price_required == 1) ? 'required' : ''; ?>>
																</div>
															<?php else: ?>
																<div class="col-12 col-sm-6 m-b-sm-15">
																	<div class="input-group">
																		<div class="input-group-prepend">
																			<span class="input-group-text input-group-text-currency" id="basic-addon2"><?php echo get_currency($payment_settings->default_product_currency); ?></span>
																			<input type="hidden" name="currency" value="<?php echo $payment_settings->default_product_currency; ?>">
																		</div>
																		<input type="text" name="price" id="product_price_input" aria-describedby="basic-addon2" class="form-control form-input price-input validate-price-input" value="<?php echo ($product->price != 0) ? price_format_input($product->price) : ''; ?>" placeholder="<?php echo $this->input_initial_price; ?>" onpaste="return false;" maxlength="32" <?php echo ($form_settings->price_required == 1) ? 'required' : ''; ?>>
																	</div>
																</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>

									
									<div class="row-custom">
										<div class="row">
											<?php if ($product->for_sale != 1): ?>
											<?php if (($product->product_type == 'physical' && $form_settings->physical_video_preview == 1) || ($product->product_type == 'digital' && $form_settings->digital_video_preview == 1)): ?>
												<div class="col-12 col-sm-6 m-b-30">
													<label class="control-label font-600"><?php echo trans("video_preview"); ?></label>
													<small>(<?php echo trans("video_preview_exp"); ?>)</small>
													<?php $this->load->view("product/_video_upload_box"); ?>
												</div>
											<?php endif; ?>
											<?php if (($product->product_type == 'physical' && $form_settings->physical_audio_preview == 1) || ($product->product_type == 'digital' && $form_settings->digital_audio_preview == 1)): ?>
												<div class="col-12 col-sm-6 m-b-30">
													<label class="control-label font-600"><?php echo trans("audio_preview"); ?></label>
													<small>(<?php echo trans("audio_preview_exp"); ?>)</small>
													<?php
													$audio = $this->file_model->get_product_audio($product->id);
													$this->load->view("product/_audio_upload_box", ['audio' => $audio]); ?>
												</div>
											<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>
									<?php if ($product->listing_type == 'ordinary_listing'): ?>
										<?php if ($form_settings->external_link == 1): ?>
											<div class="form-box">
												<div class="form-box-head">
													<h4 class="title"><?php echo trans('external_link'); ?></h4>
													<small><?php echo ("You&nbsp;can&nbsp;add&nbsp;an&nbsp;external&nbsp;service&nbsp;link.&nbsp;(i.e.&nbsp;https://domain.com/product)"); ?></small>
												</div>
												<div class="form-box-body">
													<div class="form-group">
														<input type="text" name="external_link" class="form-control form-input" value="<?php echo html_escape($product->external_link); ?>" placeholder="<?php echo trans("external_link"); ?>">
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php endif; ?>

									<?php if ($form_settings->variations == 1 && $product->product_type != 'digital' && $product->listing_type != 'ordinary_listing' && $product->for_sale != 1): ?>
										<div class="form-box">
											<div class="form-box-head">
												<h4 class="title"><?php echo trans('variations'); ?></h4>
												<small><?php echo trans('variations_exp'); ?></small>
											</div>
											<div class="form-box-body">
												<div class="form-group">
													<div class="row">
														<div id="response_product_variations" class="col-12 m-b-30">
															<?php $this->load->view("product/variation/_response_variations", ["product_variations" => $product_variations]); ?>
														</div>
														<div class="col-12">
															<button type="button" class="btn btn-sm btn-secondary btn-variation" data-toggle="modal" data-target="#addVariationModal">
																<?php echo trans("add_variation"); ?>
															</button>
															<button type="button" class="btn btn-sm btn-secondary btn-variation" data-toggle="modal" data-target="#variationModalSelect">
																<?php echo trans("select_existing_variation"); ?>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>


									

									<?php if ($form_settings->product_location == 1 && $product->product_type == 'physical'):
											$country_id = $station_country_id;
											$state_id = $station_state_id;
											$city_id = $station_city_id;
											$address = $station_address;
											$zip_code = $station_zip_code;
										?>
										<div class="form-box" style="display: none;">
											<div class="form-box-head">
												<h4 class="title"><?php echo trans('location'); ?></h4>
											</div>
											<div class="form-box-body">
												<div class="form-group">
													<div class="row">
														<div class="col-12 col-sm-4 m-b-15">
															<?php if ($general_settings->default_product_location == 0): ?>
																<div class="selectdiv">
																	<select id="countries" name="country_id" class="form-control" onchange="get_states(this.value);" <?php echo ($form_settings->product_location_required == 1) ? 'required' : ''; ?>>
																		<option value=""><?php echo trans('country'); ?></option>
																		<?php foreach ($countries as $item): ?>
																			<option value="<?php echo $item->id; ?>" <?php echo ($item->id == $country_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															<?php else: ?>
																<div class="selectdiv">
																	<select id="countries" name="country_id" class="form-control" required>
																		<?php foreach ($countries as $item): ?>
																			<?php if ($item->id == $general_settings->default_product_location): ?>
																				<option value="<?php echo $item->id; ?>" selected><?php echo html_escape($item->name); ?></option>
																			<?php endif; ?>
																		<?php endforeach; ?>
																	</select>
																</div>
															<?php endif; ?>
														</div>
														<div class="col-12 col-sm-4 m-b-15">
															<div class="selectdiv">
																<select id="states" name="state_id" class="form-control" onchange="get_cities(this.value);" <?php echo ($form_settings->product_location_required == 1) ? 'required' : ''; ?>>
																	<option value=""><?php echo trans('state'); ?></option>
																	<?php
																	if (!empty($states)):
																		foreach ($states as $item): ?>
																			<option value="<?php echo $item->id; ?>" <?php echo ($item->id == $state_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
																		<?php endforeach;
																	endif; ?>
																</select>
															</div>
														</div>
														<div class="col-12 col-sm-4 m-b-15">
															<div class="selectdiv">
																<select id="cities" name="city_id" class="form-control" onchange="update_product_map();">
																	<option value=""><?php echo trans('city'); ?></option>
																	<?php
																	if (!empty($cities)):
																		foreach ($cities as $item): ?>
																			<option value="<?php echo $item->id; ?>" <?php echo ($item->id == $city_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
																		<?php endforeach;
																	endif; ?>
																</select>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-12 col-sm-6 m-b-sm-15">
															<input type="text" name="address" id="address_input" class="form-control form-input" value="<?php echo html_escape($address); ?>" placeholder="<?php echo trans("address") ?>">
														</div>

														<div class="col-12 col-sm-3">
															<input type="text" name="zip_code" id="zip_code_input" class="form-control form-input" value="<?php echo html_escape($zip_code); ?>" placeholder="<?php echo trans("zip_code") ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>

									<div class="form-group m-t-15">
										<div class="custom-control custom-checkbox custom-control-validate-input">
											<?php if ($product->is_draft == 1): ?>
												<input type="checkbox" class="custom-control-input" name="terms_conditions" id="terms_conditions" value="1" required>
											<?php else: ?>
												<input type="checkbox" class="custom-control-input" name="terms_conditions" id="terms_conditions" value="1" checked>
											<?php endif; ?>
											<label for="terms_conditions" class="custom-control-label"><?php echo trans("terms_conditions_exp"); ?>&nbsp;<a href="<?php echo lang_base_url(); ?>terms-conditions" class="link-terms" target="_blank"><strong><?php echo trans("terms_conditions"); ?></strong></a></label>
										</div>
									</div>

									<div class="form-group m-t-15">
										<?php if ($product->is_draft == 1): ?>
											<a href="<?php echo lang_base_url(); ?>sell-now/<?php echo $product->id; ?>" class="btn btn-lg btn-custom float-left"><?php echo trans("back"); ?></a>
											<button type="submit" name="submit" value="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
											<button type="submit" name="submit" value="save_as_draft" class="btn btn-lg btn-secondary color-white float-right m-r-10"><?php echo trans("save_as_draft"); ?></button>
										<?php else: ?>
											<a href="<?php echo lang_base_url(); ?>sell-now/edit-product/<?php echo $product->id; ?>" id="btn_tab_product_images" class="btn btn-lg btn-custom float-left"><?php echo trans("back"); ?></a>
											<button type="submit" name="submit" value="save_changes" class="btn btn-lg btn-custom float-right"><?php echo trans("save_changes"); ?></button>
										<?php endif; ?>
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
</div>
<!-- Wrapper End-->




<?php $this->load->view("product/variation/_form_variations"); ?>

<!-- Datepicker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datepicker/css/bootstrap-datepicker.standalone.css">
<script src="<?php echo base_url(); ?>assets/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Plyr JS-->
<script src="<?php echo base_url(); ?>assets/vendor/plyr/plyr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/plyr/plyr.polyfilled.min.js"></script>
<script>
	const player = new Plyr('#player');
	$(document).ajaxStop(function () {
		const player = new Plyr('#player');
	});
	const audio_player = new Plyr('#audio_player');
	$(document).ajaxStop(function () {
		const player = new Plyr('#audio_player');
	});


	$(document).ready(function () {
		var is_audio = "<?php echo $is_audio; ?>", btn2 = document.getElementById("addition_type_2");
		var is_video = "<?php echo $is_video; ?>", btn1 = document.getElementById("addition_type_1");
		if (is_audio == 'yes' && is_video == 'no') {
			btn1.checked = true;
			btn2.checked = false;
	        $('#pp').show();
	        $('#qq').hide();
		} else if (is_audio == 'no' && is_video == 'yes') {
			btn1.checked = false;
			btn2.checked = true;
	        $('#pp').hide();
	        $('#qq').show();
		} else {
			<?php if (strpos($user->workshop_plan, 'ltimate') != false ){$tt = 'ult';}else{$tt = 'pre';} ?>
			var t = '<?php echo $tt; ?>';
			if (t == 'ult') {
				btn1.checked = true;
				btn2.checked = false;
		        $('#pp').show();
		        $('#qq').hide();
			}else{
				btn1.checked = false;
				btn2.checked = true;
		        $('#pp').hide();
		        $('#qq').show();
			}
		}
    });
    $(document).on('click', '#addition_type_1', function () {
        if ($(this).is(':checked')) {
            $('#pp').show();
            $('#qq').hide();
	    }
    });
    $(document).on('click', '#addition_type_2', function () {
        if ($(this).is(':checked')) {
            $('#pp').hide();
            $('#qq').show();
        }
    });
</script>

<?php if ($product->listing_type == 'sell_on_site'): ?>
	<script>
		//calculate product earned value
		var thousands_separator = '<?php echo $this->thousands_separator; ?>';
		var commission_rate = '<?php echo $this->general_settings->commission_rate; ?>';
		$(document).on("input keyup paste change", "#product_price_input", function () {
			var input_val = $(this).val();
			input_val = input_val.replace(',', '.');
			var price = parseFloat(input_val);
			commission_rate = parseInt(commission_rate);
			//calculate
			if (!Number.isNaN(price)) {
				var earned_price = price - ((price * commission_rate) / 100);
				earned_price = earned_price.toFixed(2);
				if (thousands_separator == ',') {
					earned_price = earned_price.replace('.', ',');
				}
			} else {
				earned_price = '0' + thousands_separator + '00';
			}
			$("#earned_price").html(earned_price);
		});
	</script>
<?php endif; ?>

<script>
	$.fn.datepicker.dates['en'] = {
		days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
		daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
		daysMin: ['<?php echo substr(trans("monday"), 0, 3); ?>',
			'<?php echo substr(trans("tuesday"), 0, 3); ?>',
			'<?php echo substr(trans("wednesday"), 0, 3); ?>',
			'<?php echo substr(trans("thursday"), 0, 3); ?>',
			'<?php echo substr(trans("friday"), 0, 3); ?>',
			'<?php echo substr(trans("saturday"), 0, 3); ?>',
			'<?php echo substr(trans("sunday"), 0, 3); ?>'],
		months: ['<?php echo trans("january"); ?>',
			'<?php echo trans("february"); ?>',
			'<?php echo trans("march"); ?>',
			'<?php echo trans("april"); ?>',
			'<?php echo trans("may"); ?>',
			'<?php echo trans("june"); ?>',
			'<?php echo trans("july"); ?>',
			'<?php echo trans("august"); ?>',
			'<?php echo trans("september"); ?>',
			'<?php echo trans("october"); ?>',
			'<?php echo trans("november"); ?>',
			'<?php echo trans("december"); ?>'],
		monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		today: "Today",
		clear: "Clear",
		format: "mm/dd/yyyy",
		titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
		weekStart: 0
	};

	$('.datepicker').datepicker({
		language: 'en'
	});




</script>
