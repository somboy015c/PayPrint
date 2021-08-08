<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
	<div class="container">
		<div class="row">
			<div id="content" class="col-12">
				<nav class="nav-breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb"></ol>
				</nav>
				<h1 class="page-title page-title-product m-b-15"><?php echo ("Open Shop"); ?></h1>
				<div class="form-add-product">
					<div class="row justify-content-center">
						<div class="col-12 col-md-12 col-lg-10">
							<div class="row">
								<div class="col-12">
									<p class="start-selling-description"><?php echo ("In order to own a shop, you must be a verified member. fill in the bellow form carefully and wait for admin aproval."); ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<!-- include message block -->
									<?php $this->load->view('product/_messages'); ?>
								</div>
							</div>

							<?php if ($this->auth_user->is_active_workshop_request == 1): ?>
								<div class="row">
									<div class="col-12">
										<div class="alert alert-secondary" role="alert">
											<?php echo ("You have an active Workshop Opening request on processing.!"); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($this->auth_check):
								if ($this->auth_user->is_active_shop_request == 1):?>
									<div class="row">
										<div class="col-12">
											<div class="alert alert-info" role="alert">
												<?php echo ("Your request to open a workshop is under evaluation! "); ?>
											</div>
										</div>
									</div>
								<?php elseif ($this->auth_user->is_active_shop_request == 2): ?>
									<div class="row">
										<div class="col-12">
											<div class="alert alert-secondary" role="alert">
												<?php echo ("Your request to open a workshop has been declined.!"); ?>
											</div>
										</div>
									</div>
								<?php  elseif ($this->auth_user->is_active_shop_request != 1 && $this->auth_user->is_active_shop_request != 2 && $this->auth_user->is_active_workshop_request != 1): ?>
									<div class="row">
										<div class="col-12">
											<?php echo form_open('product_controller/start_selling_post', ['id' => 'form_validate', 'class' => 'validate_terms', 'onkeypress' => "return event.keyCode != 13;"]); ?>
											<input type="hidden" name="id" value="<?php echo $this->auth_user->id; ?>">

											<div class="form-box m-b-15">
												<div class="form-box-head text-center">
													<h4 class="title title-start-selling-box"><?php echo trans('tell_us_about_shop'); ?></h4>
												</div>
												<div class="form-box-body">

													<div class="form-group">
														<div class="row">
															<div class="col-12 col-sm-6 m-b-15">
																<label class="control-label"><?php echo trans("shop_name"); ?></label>
																<input type="text" name="shop_name" class="form-control form-input" value="<?php echo $this->auth_user->username; ?>" placeholder="<?php echo trans("shop_name"); ?>" maxlength="<?php echo $this->username_maxlength; ?>" required>
															</div>
															<div class="col-12 col-sm-6 m-b-15">
																<label class="control-label"><?php echo ("Shop Category"); ?></label>
																<div class="selectdiv">
																	<select id="categories" name="shop_category_id" class="form-control" onchange="get_subcategories(this.value, 0);" required>
																		<option value=""><?php echo trans('select_category'); ?></option>
																		<?php if (!empty($parent_categories)):
																			foreach ($parent_categories as $item): ?>
																				<option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape(get_category_name_by_lang($item->id, $this->selected_lang->id)) . ' Store'; ?></option>
																			<?php endforeach;
																		endif; ?>
																	</select>
																</div>
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<div class="col-12 col-sm-4 m-b-15">
																<label class="control-label"><?php echo trans('country'); ?></label>
																<div class="selectdiv">
																	<select id="countries" name="country_id" class="form-control" onchange="get_states(this.value);" required>
																		<option value=""><?php echo ('Select your bussiness location'); ?></option>
																		<?php foreach ($countries as $item): ?>
																			<option value="<?php echo $item->id; ?>" <?php echo ($item->id == $this->auth_user->country_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>

															<div class="col-12 col-sm-4 m-b-15">
																<label class="control-label"><?php echo trans('state'); ?></label>
																<div class="selectdiv">
																	<select id="states" name="state_id" class="form-control" onchange="get_cities(this.value);" required>
																		<option value=""><?php echo ('select your nearest institiution'); ?></option>
																		<?php
																		if (!empty($this->auth_user->country_id)) {
																			$states = get_states_by_country($this->auth_user->country_id);
																		}
																		if (!empty($states)):
																			foreach ($states as $item): ?>
																				<option value="<?php echo $item->id; ?>" <?php echo ($item->id == $this->auth_user->state_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
																			<?php endforeach;
																		endif; ?>
																	</select>
																</div>
															</div>

															<div class="col-12 col-sm-4 m-b-15">
																<label class="control-label"><?php echo trans("phone_number"); ?></label>
																<input type="text" name="phone_number" class="form-control form-input" value="<?php echo html_escape($this->auth_user->phone_number); ?>" placeholder="<?php echo trans("phone_number"); ?>" required>
															</div>
														</div>
													</div>


													<div class="form-group">
														<label class="control-label"><?php echo trans("shop_description"); ?></label>
														<textarea name="about_me" class="form-control form-textarea" placeholder="<?php echo trans("shop_description"); ?>" required><?php echo old('about_me'); ?></textarea>
													</div>
												</div>
											</div>

											<div class="form-group m-t-15">
												<div class="custom-control custom-checkbox custom-control-validate-input">
													<input type="checkbox" class="custom-control-input" name="terms_conditions" id="terms_conditions" value="1" required>
													<label for="terms_conditions" class="custom-control-label"><?php echo trans("terms_conditions_exp"); ?>&nbsp;<a href="<?php echo lang_base_url(); ?>terms-conditions" class="link-terms" target="_blank"><strong><?php echo trans("terms_conditions"); ?></strong></a></label>
												</div>
											</div>

											<div class="form-group">
												<button type="submit" class="btn btn-lg btn-custom float-right"><?php echo trans("submit"); ?></button>
											</div>

											<?php echo form_close(); ?>

										</div>
									</div>
								<?php endif;
							endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Wrapper End-->
