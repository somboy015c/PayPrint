<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($ad_space != 'user_advert' && $ad_space != 'advert_transactions'): ?>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo trans('ad_spaces'); ?></h3>
			</div>
			<!-- /.box-header -->

			<div class="box-body">
				<!-- include message block -->
				<?php if (empty($this->session->flashdata("mes_adsense"))):
					$this->load->view('admin/includes/_messages');
				endif;?>

				<div class="form-group">
					<label><?php echo trans('select_ad_space'); ?></label>
					<select class="form-control custom-select" name="parent_id" onchange="window.location.href = '<?php echo admin_url(); ?>'+'ad-spaces?ad_space='+this.value;">
						<?php foreach ($array_ad_spaces as $key => $value): ?>
							<option value="<?php echo $key; ?>" <?php echo ($key == $ad_codes->ad_space) ? 'selected' : ''; ?>><?php echo $value; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<?php echo form_open_multipart('admin_controller/ad_spaces_post'); ?>

				<input type="hidden" name="ad_space" value="<?php echo $ad_codes->ad_space; ?>">

				<?php if ($ad_codes->ad_space == "product_sidebar" || $ad_codes->ad_space == "products_sidebar" || $ad_codes->ad_space == "blog_post_details_sidebar" || $ad_codes->ad_space == "profile_sidebar"): ?>
					<div class="form-group">
						<?php if (!empty($array_ad_spaces[$ad_codes->ad_space])): ?>
							<h4><?php echo trans($ad_codes->ad_space . "_ad_space"); ?></h4>
						<?php endif; ?>
						<?php if ($ad_codes->ad_space == "products_sidebar" || $ad_codes->ad_space == "blog_post_details_sidebar" || $ad_codes->ad_space == "profile_sidebar"): ?>
							<p>
								<label class="label label-primary">160x600 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
								<small>(This ad will be shown on screens larger than 768px)</small>
							</p>
						<?php else: ?>
							<p>
								<label class="label label-primary">300x250 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
								<small>(This ad will be shown on screens larger than 768px)</small>
							</p>
						<?php endif; ?>
						<div class="row row-ad-space">
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
								<textarea class="form-control text-area-adspace" name="ad_code_300"
										  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_300; ?></textarea>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
								<input type="text" class="form-control" name="url_ad_code_300" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
								<div class="row m-t-15">
									<div class="col-sm-12">
										<a class='btn bg-olive btn-sm btn-file-upload'>
											<?php echo trans('select_image'); ?>
											<input type="file" name="file_ad_code_300" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info2').html($(this).val());">
										</a>
									</div>
								</div>

								<span class='label label-info' id="upload-file-info2"></span>
							</div>
						</div>

						<p>
							<label class="label label-primary">250x250 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
							<small>(This ad will be shown on screens smaller than 768px)</small>
						</p>
						<div class="row row-ad-space">
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
								<textarea class="form-control text-area-adspace" name="ad_code_250"
										  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_250; ?></textarea>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
								<input type="text" class="form-control" name="url_ad_code_250" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
								<div class="row m-t-15">
									<div class="col-sm-12">
										<a class='btn bg-olive btn-sm btn-file-upload'>
											<?php echo trans('select_image'); ?>
											<input type="file" name="file_ad_code_250" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info3').html($(this).val());">
										</a>
									</div>
								</div>

								<span class='label label-info' id="upload-file-info3"></span>
							</div>
						</div>
						<div class="row row-ad-space row-button">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
							</div>
						</div>

					</div>
				<?php else: ?>
					<div class="form-group">
						<?php if (!empty($array_ad_spaces[$ad_codes->ad_space])): ?>
							<h4><?php echo trans($ad_codes->ad_space . "_ad_space"); ?></h4>
						<?php endif; ?>

						<p>
							<label class="label label-primary">728x90 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
							<small>(This ad will be shown on screens larger than 1200px)</small>
						</p>
						<div class="row row-ad-space">
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
								<textarea class="form-control text-area-adspace" name="ad_code_728"
										  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_728; ?></textarea>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
								<input type="text" class="form-control" name="url_ad_code_728" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
								<div class="row m-t-15">
									<div class="col-sm-12">
										<a class='btn bg-olive btn-sm btn-file-upload'>
											<?php echo trans('select_image'); ?>
											<input type="file" name="file_ad_code_728" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info1').html($(this).val());">
										</a>
									</div>
								</div>

								<span class='label label-info' id="upload-file-info1"></span>
							</div>
						</div>

						<p>
							<label class="label label-primary">468x60 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
							<small>(This ad will be shown on screens larger than 576px and smaller than 1200px)</small>
						</p>
						<div class="row row-ad-space">
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
								<textarea class="form-control text-area-adspace" name="ad_code_468"
										  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_468; ?></textarea>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
								<input type="text" class="form-control" name="url_ad_code_468" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
								<div class="row m-t-15">
									<div class="col-sm-12">
										<a class='btn bg-olive btn-sm btn-file-upload'>
											<?php echo trans('select_image'); ?>
											<input type="file" name="file_ad_code_468" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info2').html($(this).val());">
										</a>
									</div>
								</div>

								<span class='label label-info' id="upload-file-info2"></span>
							</div>
						</div>

						<p><label class="label label-primary">250x250 <?php echo trans('banner'); ?></label>&nbsp;&nbsp;
							<small>(This ad will be shown on screens smaller than 576px)</small>
						</p>
						<div class="row row-ad-space">
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
								<textarea class="form-control text-area-adspace" name="ad_code_250"
										  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>><?php echo $ad_codes->ad_code_250; ?></textarea>
							</div>
							<div class="col-sm-6">
								<label class="control-label"><?php echo trans('upload_your_banner'); ?></label>
								<input type="text" class="form-control" name="url_ad_code_250" placeholder="<?php echo trans('paste_ad_url'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
								<div class="row m-t-15">
									<div class="col-sm-12">
										<a class='btn bg-olive btn-sm btn-file-upload'>
											<?php echo trans('select_image'); ?>
											<input type="file" name="file_ad_code_250" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info3').html($(this).val());">
										</a>
									</div>
								</div>

								<span class='label label-info' id="upload-file-info3"></span>
							</div>
						</div>
						<div class="row row-ad-space row-button">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
							</div>
						</div>

					</div>
				<?php endif; ?>

				<?php echo form_close(); ?>

			</div>
		</div>
		<!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo trans('google_adsense_code'); ?></h3>
			</div>
			<!-- /.box-header -->

			<!-- form start -->
			<?php echo form_open('admin_controller/google_adsense_code_post'); ?>
			<div class="box-body">
				<!-- include message block -->
				<?php if (!empty($this->session->flashdata("mes_adsense"))):
					$this->load->view('admin/includes/_messages');
				endif; ?>
				<div class="form-group">
					<textarea name="google_adsense_code" class="form-control" placeholder="<?php echo trans('google_adsense_code'); ?>" style="min-height: 140px;"><?php echo $general_settings->google_adsense_code; ?></textarea>
				</div>
			</div>

			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
			</div>
			<!-- /.box-footer -->
			<!-- /.box -->
			<?php echo form_close(); ?><!-- form end -->
		</div>
	</div>
</div>

<?php elseif ($ad_space == 'user_advert'): ?>
	












<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo ('User Adverts'); ?></h3>
	</div>
	<div class="box-body">
        <div class="row">
            <!-- include message block -->
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" role="grid">
                        <?php $this->load->view('admin/earnings/_filter_user_adverts'); ?>
                        <thead>
                        <tr role="row">
                            <th width="20"><?php echo trans('id'); ?></th>
                            <th><?php echo trans('user'); ?></th>
                            <th><?php echo trans('date'); ?></th>
                            <th><?php echo trans('payment_method'); ?></th>
                            <th><?php echo trans('payment_status'); ?></th>
                            <th><?php echo ('Days Left'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        	
                        	<?php foreach ($user_adverts as $user_advert): ?>
                            <tr>
                                <td><?php echo html_escape($user_advert->id); ?></td>
                                <td><?php echo (get_user($user_advert->user_id)->slug); ?></td>
                                <td><?php echo html_escape($user_advert->created_at); ?></td>
                                <td><?php echo html_escape($user_advert->payment_method); ?></td>
                                <td><?php echo html_escape($user_advert->payment_status); ?></td>
                                <td><?php $end_date = date_difference($user_advert->advert_end_date, date('Y-m-d H:i:s')); if (!empty($user_advert->advert_end_date)) { if ($end_date < 1) {echo "completed"; } else {echo $end_date;}  } ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu options-dropdown">
                                            <li>
                                                <a href="<?php echo admin_url(); ?>ad-spaces?ad_space=advert_transactions&data=<?php echo html_escape($user_advert->id); ?>"><i class="fa fa-info option-icon"></i><?php echo trans('view_details'); ?></a>
                                            </li>
                                			<?php echo form_open_multipart('admin_controller/ad_spaces_post'); ?>
                                			<input type="hidden" name="id" value="<?php echo $user_advert->id; ?>">
                                			<input type="hidden" name="ad_days" value="<?php echo $user_advert->day_count; ?>">
                                			<input type="hidden" name="ad_target" value="<?php echo $user_advert->advert_target; ?>">
                                			<input type="hidden" name="ad_plan" value="<?php echo $user_advert->purchased_plan; ?>">
                                			<input type="hidden" name="target_id" value="<?php echo $user_advert->target_id; ?>">
                                			<?php if (empty($user_advert->advert_end_date)): ?>
	                                            <li>
	                                                <button class="btn" type="submit" name="submit"  value="3" >
														<i class="fa fa-plus option-icon"></i><?php echo ('Add To Advertisement'); ?>
													</button>
	                                            </li>
                                        	<?php endif; ?>
											<?php echo form_close(); ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        

                        </tbody>
                    </table>

                    <?php if (empty($user_adverts)): ?>
                        <p class="text-center">
                            <?php echo trans("no_records_found"); ?>
                        </p>
                    <?php endif; ?>
                    <div class="col-sm-12 table-ft">
                        <div class="row">
                            <div class="pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                            <?php if (count($user_adverts) > 0): ?>
                                <div class="pull-left">
                                    <button class="btn btn-sm btn-danger btn-table-delete" onclick="delete_selected_products('<?php echo trans("confirm_products"); ?>');"><?php echo trans('delete'); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>











<?php elseif ($ad_space == 'advert_transactions'): ?>
	<div class="box-header with-border">
		<div class="left">
			<h3 class="box-title"><?php echo ('Transaction Detetails'); ?></h3>
		</div>
		<div class="right">
			<a href="<?php echo admin_url(); ?>ad-spaces?ad_space=user_advert" class="btn btn-success btn-add-new">
				<?php echo ('User Adverts'); ?>
			</a>
		</div>
	</div>
	<div class="box">
		<div class="box-body">
	        <div class="row">
				<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						


							<?php foreach ($advert as $ad): ?>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('id'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->id); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('purchased_plan'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->purchased_plan); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('user'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo get_user($ad->user_id)->slug; ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo ('Advert Target'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->advert_target); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo ('Target ID'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->target_id); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_amount'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->payment_amount); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_id'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->payment_id); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_method'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->payment_method); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_status'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->payment_status); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('currency'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->currency); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo ('Days Left'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php $end_date = date_difference($ad->advert_end_date, date('Y-m-d H:i:s')); if (!empty($ad->advert_end_date)) { if ($end_date < 1) {echo "completed"; } else {echo $end_date;}  } ?></div>
								</div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('date'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $ad->created_at; ?></div>
                                </div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('ip_address'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($ad->ip_address); ?></div>
								</div>
								<div class="row" style="margin: 10px;">
									<div class="col-sm-3"style="font-size: 16px;"><?php echo trans('options'); ?></div>
									<div class="col-sm-9"style="font-size: 14px;">
										<?php echo form_open_multipart('admin_controller/ad_spaces_post'); ?>
										<input type="hidden" name="id" value="<?php echo $ad->id; ?>">
										<?php if ($ad->payment_status != 'payment_completed') : ?>
											<div class="dropdown">
												<button class="btn bg-purple dropdown-toggle btn-select-option" type="submit" name="submit"  value="2" >
													<?php echo ('Confirm Payment'); ?>
												</button>
											</div>
										<?php else: ?>
											<?php echo ('Payment Completed'); ?>
										<?php endif; ?>
										<?php echo form_close(); ?>
									</div>
								</div>
							<?php endforeach; ?>

					</div>
				</div>
			</div>



	        </div>
	    </div>
	</div>
<?php endif; ?>

















<style>
	h4 {
		color: #0d6aad;
		text-align: left;
		font-weight: 600;
		margin-bottom: 15px;
		margin-top: 30px;
	}

	.row-ad-space {
		padding: 15px 0;
		background-color: #f7f7f7;
		margin-bottom: 45px;
	}

	.row-button {
		background-color: transparent !important;
		min-height: 60px;
	}

	textarea {
		height: 78px !important;
		resize: none;
	}

	.label-primary {
		font-size: 12px;
	}

	small {
		color: #333 !important;
	}
</style>

<?php if ($site_lang->text_direction == "rtl"): ?>

	<style>
		h4 {
			text-align: right;
		}
	</style>
<?php endif; ?>
