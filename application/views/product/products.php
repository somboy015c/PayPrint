<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Wrapper -->
<div id="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="nav-breadcrumb" aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-products">
						<li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
						<?php if (!empty($category)):
							$breadcrumb = get_parent_categories_array($category->id);
							if (!empty($breadcrumb)):
								foreach ($breadcrumb as $item_breadcrumb):
									$item_category = get_category_joined($item_breadcrumb->id);
									if (!empty($item_category)):?>
										<li class="breadcrumb-item"><a href="<?php echo generate_category_url($item_category); ?>"><?php echo html_escape($item_category->name); ?></a></li>
									<?php endif;
								endforeach;
							endif;
						else: ?>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $heading; ?></li>
						<?php endif; ?>
					</ol>
				</nav>
			</div>
		</div>
		<!-- form start -->
		<?php echo form_open(current_url(), ['id' => 'form-product-filters', 'method' => 'get']);
		if (!empty($search)):?>
			<input type="hidden" name="search" value="<?php echo html_escape($search); ?>">
		<?php endif; ?>
		<?php if (!empty($search_type)):?>
			<input type="hidden" name="drls" value="<?php echo html_escape($search_type); ?>">
		<?php endif; ?>
		<?php if (!empty($type)):?>
			<input type="hidden" name="type" value="<?php echo html_escape($type); ?>">
		<?php endif; ?>
		<?php if (!empty($sort)):?>
			<input type="hidden" name="sort" value="<?php echo html_escape($sort); ?>">
		<?php endif; ?>
		<!-- sort by location -->
		<?php if (!empty($country)): ?>
			<input type="hidden" name="country" value="<?php echo $country; ?>" class="input-location-filter">
		<?php endif; ?>
		<?php if (!empty($state)): ?>
			<input type="hidden" name="state" value="<?php echo $state; ?>" class="input-location-filter">
		<?php endif; ?>
		<?php if (!empty($city)): ?>
			<input type="hidden" name="city" value="<?php echo $city; ?>" class="input-location-filter">
		<?php endif; ?>
		<!-- end sort by location -->
		<?php if (!empty($condition)): ?>
			<input type="hidden" name="condition" value="<?php echo $condition; ?>" class="input-location-filter">
		<?php endif; ?>
		<div class="bn-lg <?php echo(isset($class) ? $class : ''); ?>" style="min-width: 0px; min-height: 0px; float: none; text-align: left">
			<div class="row">
				<div class="col-12 product-list-header">
					<?php if (!empty($category)): ?>
						<h1 class="page-title product-list-title"><?php echo html_escape($category->name); ?></h1>
					<?php else: ?>
						<h1 class="page-title product-list-title"><?php echo $heading; ?></h1>
					<?php endif; ?>
					<div class="product-sort-by">
						<span class="span-sort-by"><?php echo trans("sort_by"); ?></span>
						<div class="dropdown sort-select">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
								<?php $filter_sort = get_filter_query_string_key_value('sort');
								if ($filter_sort == 'most_recent' || $filter_sort == 'lowest_price' || $filter_sort == 'highest_price') {
									echo trans($filter_sort);
								} elseif ($filter_sort == 'Trending' || $filter_sort == 'Top Rated'){
									echo $filter_sort;
								} else {
									echo trans('most_recent');
								} ?>
							</button>
							<div class="dropdown-menu">
								<button type="submit" name="sort" value="most_recent" class="dropdown-item"><?php echo trans("most_recent"); ?></button>
								<button type="submit" name="sort" value="Top Rated" class="dropdown-item"><?php echo("Top Rated"); ?></button>
								<button type="submit" name="sort" value="Trending" class="dropdown-item"><?php echo("Trending"); ?></button>
								<?php if ((empty($category) && $search_type != 'Handwork') || (!empty($category) && ($category->name != 'Services' && $category->parent_id != 12))): ?>
									<button type="submit" name="sort" value="lowest_price" class="dropdown-item"><?php echo trans("lowest_price"); ?></button>
									<button type="submit" name="sort" value="highest_price" class="dropdown-item"><?php echo trans("highest_price"); ?></button>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<button class="btn btn-filter-products-mobile" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
						<?php echo trans("categories"); ?>
					</button>
				</div>
			</div>
		</div>
		<div class="bn-md <?php echo(isset($class) ? $class : ''); ?>" style="min-width: 0px; min-height: 0px; float: none; text-align: left;">
			<div class="row">
				<div class="col-12 product-list-header">
					<?php if (!empty($category)): ?>
						<h1 class="page-title product-list-title"><?php echo html_escape($category->name); ?></h1>
					<?php else: ?>
						<h1 class="page-title product-list-title"><?php echo $heading; ?></h1>
					<?php endif; ?>
					<div class="span-sort-by product-sort-by">
						<div class="dropdown sort-select">
							<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
								<?php $filter_sort = get_filter_query_string_key_value('sort');
								if ($filter_sort == 'most_recent' || $filter_sort == 'lowest_price' || $filter_sort == 'highest_price') {
									echo trans($filter_sort);
								} elseif ($filter_sort == 'Trending' || $filter_sort == 'Top Rated'){
									echo $filter_sort;
								} else {
									echo trans('most_recent');
								} ?>
							</button>
							<div class="dropdown-menu">
								<button type="submit" name="sort" value="most_recent" class="dropdown-item"><?php echo trans("most_recent"); ?></button>
								<button type="submit" name="sort" value="Top Rated" class="dropdown-item"><?php echo("Top Rated"); ?></button>
								<?php if ((empty($category) && $search_type != 'Handwork') || (!empty($category) && ($category->name != 'Services' && $category->parent_id != 12))): ?>
									<button type="submit" name="sort" value="lowest_price" class="dropdown-item"><?php echo trans("lowest_price"); ?></button>
									<button type="submit" name="sort" value="highest_price" class="dropdown-item"><?php echo trans("highest_price"); ?></button>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="btn-filter-products-mobile" style="background-color: transparent !important; float: unset; border: 0px;">
						<div class="row">
							<div class="col-3" style="padding: 0px 8px 0px 8px;">
								<?php $num_len = strlen($default_state); if ($general_settings->default_product_location == 0): ?>
									<div class="region-left">
										<div class="product-sort-by">
											<span class="span-sort-by"><?php echo trans("sort_by"); ?></span>
											<div class="dropdown sort-select">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="min-width: unset; width: 140px;">
													<?php $filter_sort = get_filter_query_string_key_value('sort');
													if ($filter_sort == 'most_recent' || $filter_sort == 'lowest_price' || $filter_sort == 'highest_price') {
														echo trans($filter_sort);
													} elseif ($filter_sort == 'Trending' || $filter_sort == 'Top Rated'){
														echo $filter_sort;
													} else {
														echo trans('most_recent');
													} ?>
												</button>
												<div class="dropdown-menu" style=" font-size: 11px;">
													<button type="submit" name="sort" value="most_recent" class="dropdown-item"><?php echo trans("most_recent"); ?></button>
													<button type="submit" name="sort" value="Top Rated" class="dropdown-item"><?php echo("Top&nbsp;Rated"); ?></button>
													<?php if ((empty($category) && $search_type != 'Handwork') || (!empty($category) && ($category->name != 'Services' && $category->parent_id != 12))): ?>
														<button type="submit" name="sort" value="lowest_price" class="dropdown-item"><?php echo trans("lowest_price"); ?></button>
														<button type="submit" name="sort" value="highest_price" class="dropdown-item"><?php echo trans("highest_price"); ?></button>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-9">
								<div class="nav-mobile-inner">
									<ul class="navbar-nav">
										<div class="col-12"style="padding: 0px; margin: 0px;">
											<div class="row-custom"style="padding: 0px; margin: 0px;">
												<div id="blog-slider4" class="owl-carousel blog-slider" style="max-height: 40px;">
											    <!--print blog slider posts-->
													<li class="nav-item">
														<button class="btn btn-md btn-outline-red" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" style="border-radius: 6px; margin-left: 5px;">
															<?php echo trans("categories"); ?>
														</button>
													</li>
												</div>
											</div>
										</div>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bn-sm <?php echo(isset($class) ? $class : ''); ?>" style="min-width: 0px; min-height: 0px; float: none; text-align: left;">
			<div class="navbar-light navbar-expand" style="padding: 0px; margin: 0px;">
				<?php if (!empty($category)): ?>
					<h1 class="page-title product-list-title"><?php echo html_escape($category->name); ?></h1>
				<?php else: ?>
					<h1 class="page-title product-list-title"><?php echo $heading; ?></h1>
				<?php endif; ?>
				<div class="row">
					<div class="col-3" style="padding: 0px 8px 0px 8px;">
						<?php $num_len = strlen($default_state); if ($general_settings->default_product_location == 0): ?>
							<div class="region-left">
								<div class="product-sort-by">
									<span class="span-sort-by"><?php echo trans("sort_by"); ?></span>
									<div class="dropdown sort-select">
										<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="min-width: 0px; font-size: 11px; padding: 6px;">
											<?php $filter_sort = get_filter_query_string_key_value('sort');
											if ($filter_sort == 'most_recent' || $filter_sort == 'lowest_price' || $filter_sort == 'highest_price') {
												echo trans($filter_sort);
											} elseif ($filter_sort == 'Trending' || $filter_sort == 'Top Rated'){
												echo $filter_sort;
											} else {
												echo trans('most_recent');
											} ?>
										</button>
										<div class="dropdown-menu" style=" font-size: 11px;">
											<button type="submit" name="sort" value="most_recent" class="dropdown-item"><?php echo trans("most_recent"); ?></button>
											<button type="submit" name="sort" value="Top Rated" class="dropdown-item"><?php echo("Top&nbsp;Rated"); ?></button>
											<?php if ((empty($category) && $search_type != 'Handwork') || (!empty($category) && ($category->name != 'Services' && $category->parent_id != 12))): ?>
												<button type="submit" name="sort" value="lowest_price" class="dropdown-item"><?php echo trans("lowest_price"); ?></button>
												<button type="submit" name="sort" value="highest_price" class="dropdown-item"><?php echo trans("highest_price"); ?></button>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-9" style="padding: 0px 0px 0px 5px;">
						<div class="nav-mobile-inner">
							<ul class="navbar-nav">
								<div class="col-12"style="padding: 0px; margin: 0px;">
									<div class="row-custom"style="padding: 0px; margin: 0px;">
										<div id="blog-slider3" class="owl-carousel blog-slider" style="max-height: 40px;">
									    <!--print blog slider posts-->
													<li class="nav-item">
														<button class="btn btn-md btn-outline-red" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" style="border-radius: 6px; font-size: 11px; padding: 5px; margin-left: 5px;">
															<?php echo trans("categories"); ?>
														</button>
													</li>
													<p></p>
												</div>
											</div>
										</div>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
		<div class="row">
			<?php $this->load->view('product/_product_filters'); ?>

			<div class="col-12 col-md-9">
				<div class="filter-reset-tag-container">
					<?php $filters = get_filters_query_string_array();
					if (!empty($filters)):
						foreach ($filters as $key => $value):
							if (!empty($value) && $key != 'sort' && $key != 'condition' && $key != 'country' && $key != 'state' && $key != 'city' && $key != 'p_min' && $key != 'p_max' && $key != 'page' && $key != 'search' && $key != 'drls'):?>
								<div class="filter-reset-tag">
									<div class="left">
										<a href="<?php echo remove_filter_from_query_string($key); ?>"><i class="icon-close"></i></a>
									</div>
									<div class="right">
										<span class="reset-tag-title"><?php echo get_filter_name_by_key($key); ?></span>
										<span><?php echo html_escape($value); ?></span>
									</div>
								</div>
							<?php endif;
						endforeach;
					endif;

					$filter_condition = get_filter_query_string_key_value('condition');
					if (!empty($filter_condition)):
						$product_condition = get_product_condition_by_key($filter_condition, $selected_lang->id);
						if (!empty($product_condition)):?>
							<div class="filter-reset-tag">
								<div class="left">
									<a href="<?php echo remove_filter_from_query_string('condition'); ?>"><i class="icon-close"></i></a>
								</div>
								<div class="right">
									<span class="reset-tag-title"><?php echo trans("condition"); ?></span>
									<span><?php echo html_escape($product_condition->option_label); ?></span>
								</div>
							</div>
						<?php endif;
					endif;

					$filter_p_max = @(float)get_filter_query_string_key_value('p_max');
					$filter_p_min = @(float)get_filter_query_string_key_value('p_min');
					if (!empty($filter_p_max) || !empty($filter_p_min)): ?>
						<div class="filter-reset-tag">
							<div class="left">
								<a href="<?php echo remove_filter_from_query_string('price'); ?>"><i class="icon-close"></i></a>
							</div>
							<div class="right">
								<span class="reset-tag-title"><?php echo trans('price') . '(' . get_currency($this->payment_settings->default_product_currency) . ')'; ?></span>
								<span>
                                <?php if ($filter_p_min != 0):
									echo trans('min') . ': ' . $filter_p_min;
								endif; ?>&nbsp;&nbsp;
                                <?php if ($filter_p_max != 0):
									echo trans('max') . ': ' . $filter_p_max;
								endif; ?>
                            </span>
							</div>
						</div>
					<?php endif;

					$country_id = $this->input->get('country', true);
					$state_id = $this->input->get('state', true);
					$city_id = $this->input->get('city', true);
					$filter_location = get_location_input($country_id, $state_id, $city_id);
					if (!empty($filter_location)): ?>
						<div class="filter-reset-tag">
							<div class="left">
								<a href="<?php echo remove_filter_from_query_string('location'); ?>"><i class="icon-close"></i></a>
							</div>
							<div class="right">
								<span class="reset-tag-title"><?php echo trans("location"); ?></span>
								<span><?php echo $filter_location; ?></span>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="product-list-content">
					<div class="row row-product">
							<!--print products-->
							<?php foreach ($products as $product): ?>
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-product">
									<?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => true]); ?>
								</div>
							<?php endforeach; ?>
							<?php if (empty($products)): ?>
								<div class="col-12">
									<p class="no-records-found"><?php echo ("No&nbsp;Transportaion&nbsp;Service&nbsp;found&nbsp;in&nbsp;") . $default_state . '&nbsp;State'; ?></p>
								</div>
							<?php endif; ?>
						</div>
				</div>

				<div class="product-list-pagination" style="margin-top: 0px;">
					<div class="float-right">
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>

				<div class="col-12">
					<!--Include banner-->
					<?php $this->load->view("partials/_ad_spaces", ["ad_space" => "products", "class" => "m-t-15"]); ?>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
		<!-- form end -->
	</div>
</div>
<!-- Wrapper End-->
