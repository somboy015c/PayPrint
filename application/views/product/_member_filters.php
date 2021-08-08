<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $query_string = create_member_filters_query_string();  if (!empty($search_type)){ $drls = '&drls=' . $search_type; }else { $drls =''; }?>

<!--product filters-->
<div class="col-12 col-md-3 sidebar-products">
	<div id="collapseFilters" class="product-filters">
		<?php if ($type == 'Shops' || $type == 'Workshops'|| $search_type == 'Shop' || $search_type == 'Workshop'):
			if (!empty($category)): ?>
				<h4 class="title-all-categories">
					<a href="<?php echo lang_base_url() . "members" . $query_string; ?>"><i class="icon-angle-left"></i><?php echo trans("categories_all"); ?></a>
				</h4>
			<?php else: ?>
				<h4 class="title-all-categories">
					<a><?php echo trans("categories_all"); ?></a>
				</h4>
			<?php endif; ?>
			<div class="filter-item">
				<div class="filter-list-container">
					<ul class="filter-list filter-custom-scrollbar">
						<?php foreach ($categories as $item): if ($search_type == 'Workshops' || ($search_type != 'Workshops' && $item->id != 12)): ?>
							<li><button type="submit" class="btn btn-outline-gray" style="padding: 0px; border: 0px;"><li>
								<div class="left">
									<div class="custom-control custom-checkbox">
										<input type="radio" name="ytc" class="custom-control-input" id="cat_<?php echo $item->id; ?>" value="<?php echo $item->id; ?>" <?php echo (!empty($category) && $category->id == $item->id) ? 'checked' : ''; ?>>
										<label for="cat_<?php echo $item->id; ?>" class="custom-control-label" onclick="this.form.submit();"></label>
									</div>
								</div>
								<div class="rigt">
									<label style="text-align: left;" for="cat_<?php echo $item->id; ?>" class="checkbox-list-item-label" onclick="this.form.submit();"><?php echo html_escape(get_category_name_by_lang($item->id, $this->selected_lang->id)); ?></label>
								</div>
							</li></button></li>
						<?php endif; endforeach; ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>

		<?php 
			if ($this->form_settings->product_location == 1):
				$country_id = $this->input->get('country', true);
				$state_id = $this->input->get('state', true);
				$city_id = $this->input->get('city', true); ?>
				<div class="filter-item filter-location">
					<h4 class="title"><?php echo trans("location"); ?></h4>
					<div class="input-group input-group-location">
						<i class="icon-map-marker"></i>
						<input type="text" id="input_location" class="form-control form-input" value="<?php echo get_location_input($country_id, $state_id, $city_id); ?>" placeholder="<?php echo trans("enter_location") ?>" autocomplete="off">
					</div>
					<div class="search-results-ajax">
						<div class="search-results-location">
							<div id="response_search_location"></div>
						</div>
					</div>
				</div>
				<?php if (!empty($country_id)): ?>
				<input type="hidden" name="country" value="<?php echo $country_id; ?>" class="input-location-filter">
			<?php endif; ?>
				<?php if (!empty($state_id)): ?>
				<input type="hidden" name="state" value="<?php echo $state_id; ?>" class="input-location-filter">
			<?php endif; ?>
				<?php if (!empty($city_id)): ?>
				<input type="hidden" name="city" value="<?php echo $city_id; ?>" class="input-location-filter">
			<?php endif; ?>
			<?php endif; ?>
			
	</div>

	<div class="row-custom">
		<!--Include banner-->
		<?php $this->load->view("partials/_ad_spaces_sidebar", ["ad_space" => "products_sidebar", "class" => "m-b-15"]); ?>
	</div>
</div>