<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--profile page tabs-->







<div class="main-menu">

	<?php if ($user->role == 'member'): ?>
	<div class="profile-tabs">
	<?php else: ?>
		<div class="profile-tabs"style="margin-top: 20px;">
	<?php endif ?>
		<ul class="nav">
			<?php if (is_multi_vendor_active()): ?>
				<?php if ($user->role == 'admin' || $user->role == 'vendor'): ?>
					<li class="nav-item <?php echo ($active_tab == 'products') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug; ?>">
							<span><?php echo trans("products"); ?></span>
							<span class="count">(<?php echo get_user_products_count($user->slug); ?>)</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor')): ?>
					<li class="nav-item <?php echo ($active_tab == 'pending_products') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>pending-products">
							<span><?php echo trans("pending_products"); ?></span>
							<span class="count">(<?php echo get_user_pending_products_count($user->id); ?>)</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor')): ?>
					<li class="nav-item <?php echo ($active_tab == 'hidden_products') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products">
							<span><?php echo trans("hidden_products"); ?></span>
							<span class="count">(<?php echo get_user_hidden_products_count($user->id); ?>)</span>
						</a>
					</li>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ($user->role == 'member' && $user->is_workshop == 1): ?>
			<li class="nav-item <?php echo ($active_tab == 'cv') ? 'active' : ''; ?>">
				<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>">
					<span><?php echo ("Hand Works"); ?></span>
					<span class="count">(<?php echo get_user_works_count($user->slug); ?>)</span>
				</a>
			</li>
			<li class="nav-item <?php echo ($active_tab == 'wp') ? 'active' : ''; ?>">
				<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>?reach=wp">
					<span><?php echo ("Workshop Profile"); ?></span>
				</a>
			</li>
			<?php endif; ?>
			<?php if (is_multi_vendor_active()): ?>
				<?php if ($this->auth_check && $this->auth_user->id == $user->id && is_sale_active() && $general_settings->digital_products_system == 1): ?>
					<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_forsale_count($user->slug) > 0)): ?>
					<li class="nav-item <?php echo ($active_tab == 'forsales') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products?fs=shpsl">
							<span><?php echo ("For Sales"); ?></span>
							<span class="count">(<?php echo get_user_forsale_count($user->slug); ?>)</span>
						</a>
					</li>
					<?php endif; ?>
					<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_pending_forsales_count($user->id) > 0)): ?>
					<li class="nav-item <?php echo ($active_tab == 'pending') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products?pnd=mlt&fs=shpsl">
							<span><?php echo ("Pending For Sales"); ?></span>
							<span class="count">(<?php echo get_user_pending_forsales_count($user->id); ?>)</span>
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item <?php echo ($active_tab == 'favorites') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url() . "favorites/" . $user->slug; ?>">
							<span><?php echo trans("favorites"); ?></span>
							<span class="count">(<?php echo get_user_favorited_products_count($user->id); ?>)</span>
						</a>
					</li>
					<?php if ($user->role != 'member'): ?>
					<li class="nav-item <?php echo ($active_tab == 'downloads') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>downloads">
							<span><?php echo trans("downloads"); ?></span>
							<span class="count">(<?php echo get_user_downloads_count($user->id); ?>)</span>
						</a>
					</li>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<li class="nav-item <?php echo ($active_tab == 'followers') ? 'active' : ''; ?>">
				<a class="nav-link" href="<?php echo lang_base_url() . "followers/" . $user->slug; ?>">
					<span><?php echo trans("followers"); ?></span>
					<span class="count">(<?php echo get_followers_count($user->id); ?>)</span>
				</a>
			</li>
			<li class="nav-item <?php echo ($active_tab == 'following') ? 'active' : ''; ?>">
				<a class="nav-link" href="<?php echo lang_base_url() . "following/" . $user->slug; ?>">
					<span><?php echo trans("following"); ?></span>
					<span class="count">(<?php echo get_following_users_count($user->id); ?>)</span>
				</a>
			</li>

			<?php if (($general_settings->user_reviews == 1) && ($user->role == 'admin' || $user->is_member == 1) && is_multi_vendor_active()): ?>
				<li class="nav-item <?php echo ($active_tab == 'reviews') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "reviews/" . $user->slug; ?>">
						<span><?php echo trans("reviews"); ?></span>
						<span class="count">(<?php echo get_user_review_count($user->id); ?>)</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if ($this->auth_check && $this->auth_user->id == $user->id): ?>
				<li class="nav-item <?php echo ($active_tab == 'drafts') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url(); ?>drafts">
						<span><?php echo trans("drafts"); ?></span>
						<span class="count">(<?php echo get_user_drafts_count($user->id); ?>)</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (!$this->auth_check || ($this->auth_check && $this->auth_user->id != $user->id && ($user->role == 'admin' || $user->is_member == 1))): ?>
				<li class="nav-item <?php echo ($active_tab == 'report') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "reviews/" . $user->slug . '?vrw=report'; ?>">
						<span><?php echo ("Report Shop"); ?></span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<?php if ($user->role == 'vendor'): ?>
	<div class="row-custom">
		<!--Include banner-->
		<?php $this->load->view("partials/_ad_spaces_sidebar", ["ad_space" => "profile_sidebar", "class" => "m-t-30"]); ?>
	</div>
	<?php endif; ?>
</div>




<div class="mobile-menu" style="padding: 0px;">
	<div class="span-sort-by product-sort-by" style=" float: none; ">

		<?php if ($user->role == 'member'): ?>
		<div class="profile-tabs">
		<?php else: ?>
			<div class="profile-tabs"style="margin-top: 20px;">
		<?php endif ?>
			<ul class="nav">
				<?php if (is_multi_vendor_active()): ?>
					<?php if ($user->role == 'admin' || $user->role == 'vendor'): ?>
						<li class="nav-item <?php echo ($active_tab == 'products') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug; ?>">
								<span><?php echo trans("products"); ?></span>
								<span class="count">(<?php echo get_user_products_count($user->slug); ?>)</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor')): ?>
						<li class="nav-item <?php echo ($active_tab == 'pending_products') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url(); ?>pending-products">
								<span><?php echo trans("pending_products"); ?></span>
								<span class="count">(<?php echo get_user_pending_products_count($user->id); ?>)</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor')): ?>
						<li class="nav-item <?php echo ($active_tab == 'hidden_products') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products">
								<span><?php echo trans("hidden_products"); ?></span>
								<span class="count">(<?php echo get_user_hidden_products_count($user->id); ?>)</span>
							</a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($user->role == 'member' && $user->is_workshop == 1): ?>
				<li class="nav-item <?php echo ($active_tab == 'cv') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>">
						<span><?php echo ("Hand Works"); ?></span>
						<span class="count">(<?php echo get_user_works_count($user->slug); ?>)</span>
					</a>
				</li>
				<li class="nav-item <?php echo ($active_tab == 'wp') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>?reach=wp">
						<span><?php echo ("Workshop Profile"); ?></span>
					</a>
				</li>
				<?php endif; ?>
				<?php if (is_multi_vendor_active()): ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && is_sale_active() && $general_settings->digital_products_system == 1): ?>
						<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_forsale_count($user->slug) > 0)): ?>
						<li class="nav-item <?php echo ($active_tab == 'forsales') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products?fs=shpsl">
								<span><?php echo ("For Sales"); ?></span>
								<span class="count">(<?php echo get_user_forsale_count($user->slug); ?>)</span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_pending_forsales_count($user->id) > 0)): ?>
						<li class="nav-item <?php echo ($active_tab == 'pending') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url(); ?>hidden-products?pnd=mlt&fs=shpsl">
								<span><?php echo ("Pending For Sales"); ?></span>
								<span class="count">(<?php echo get_user_pending_forsales_count($user->id); ?>)</span>
							</a>
						</li>
						<?php endif; ?>
						<li class="nav-item <?php echo ($active_tab == 'favorites') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url() . "favorites/" . $user->slug; ?>">
								<span><?php echo trans("favorites"); ?></span>
								<span class="count">(<?php echo get_user_favorited_products_count($user->id); ?>)</span>
							</a>
						</li>
						<?php if ($user->role != 'member'): ?>
						<li class="nav-item <?php echo ($active_tab == 'downloads') ? 'active' : ''; ?>">
							<a class="nav-link" href="<?php echo lang_base_url(); ?>downloads">
								<span><?php echo trans("downloads"); ?></span>
								<span class="count">(<?php echo get_user_downloads_count($user->id); ?>)</span>
							</a>
						</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<li class="nav-item <?php echo ($active_tab == 'followers') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "followers/" . $user->slug; ?>">
						<span><?php echo trans("followers"); ?></span>
						<span class="count">(<?php echo get_followers_count($user->id); ?>)</span>
					</a>
				</li>
				<li class="nav-item <?php echo ($active_tab == 'following') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?php echo lang_base_url() . "following/" . $user->slug; ?>">
						<span><?php echo trans("following"); ?></span>
						<span class="count">(<?php echo get_following_users_count($user->id); ?>)</span>
					</a>
				</li>

				<?php if (($general_settings->user_reviews == 1) && ($user->role == 'admin' || $user->is_member == 1) && is_multi_vendor_active()): ?>
					<li class="nav-item <?php echo ($active_tab == 'reviews') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url() . "reviews/" . $user->slug; ?>">
							<span><?php echo trans("reviews"); ?></span>
							<span class="count">(<?php echo get_user_review_count($user->id); ?>)</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->auth_check && $this->auth_user->id == $user->id): ?>
					<li class="nav-item <?php echo ($active_tab == 'drafts') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url(); ?>drafts">
							<span><?php echo trans("drafts"); ?></span>
							<span class="count">(<?php echo get_user_drafts_count($user->id); ?>)</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if (!$this->auth_check || ($this->auth_check && $this->auth_user->id != $user->id && ($user->role == 'admin' || $user->is_member == 1))): ?>
					<li class="nav-item <?php echo ($active_tab == 'report') ? 'active' : ''; ?>">
						<a class="nav-link" href="<?php echo lang_base_url() . "reviews/" . $user->slug . '?vrw=report'; ?>">
							<span><?php echo ("Report Shop"); ?></span>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php if ($user->role == 'vendor'): ?>
		<div class="row-custom">
			<!--Include banner-->
			<?php $this->load->view("partials/_ad_spaces_sidebar", ["ad_space" => "profile_sidebar", "class" => "m-t-30"]); ?>
		</div>
		<?php endif; ?>
	</div>



	<div class="btn-filter-products-mobile" style="background-color: transparent !important; float: none; border: 0px; margin-left: 0px;">







		<div class="col-12" style="padding: 0px;">
			<div class="nav-mobile-inner">
				<ul class="nav">
					<div class="col-12"style="padding: 0px; margin: 0px;">
						<div class="row-custom"style="padding: 0px; margin: 0px;">
							<div id="blog-slider4" class="owl-carousel blog-slider" style="max-height: 40px; font-size: 12px; padding-top: 5px; overflow: hidden;">
										<!--print blog slider posts-->
										


















										<?php if (is_multi_vendor_active()): ?>
					<?php if ($user->role == 'admin' || $user->role == 'vendor'): ?>
						<li class="nav-item <?php echo ($active_tab == 'products') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "profile/" . $user->slug; ?>" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo trans("products") . "&nbsp;(" . get_user_products_count($user->slug) . ")"; ?></span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor')): ?>
						<li class="nav-item <?php echo ($active_tab == 'pending_products') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>pending-products" style="<?php if ($active_tab == 'pending_products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo ("Pendings+") . "&nbsp;(" . get_user_pending_products_count($user->id) . ")"; ?></span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && ($user->role == 'admin' || $user->role == 'vendor') && get_user_hidden_products_count($user->id) > 0): ?>
						<li class="nav-item <?php echo ($active_tab == 'hidden_products') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>hidden-products" style="<?php if ($active_tab == 'hidden_products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo ("Hiddens") . "&nbsp;(" . get_user_hidden_products_count($user->id) . ")"; ?></span>
							</a>
						</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($user->role == 'member' && $user->is_workshop == 1): ?>
				<li class="nav-item <?php echo ($active_tab == 'cv') ? 'active' : ''; ?>" style="overflow: hidden;">
					<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>" style="<?php if ($active_tab == 'cv') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
						<span><?php echo ("Hand&nbsp;Works") . "&nbsp;(" . get_user_works_count($user->slug) . ")"; ?></span>
					</a>
				</li>
				<li class="nav-item <?php echo ($active_tab == 'wp') ? 'active' : ''; ?>" style="overflow: hidden;">
					<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "profile/" . $user->slug;?>?reach=wp" style="<?php if ($active_tab == 'wp') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
						<span><?php echo ("Workshop&nbsp;Profile"); ?></span>
					</a>
				</li>
				<?php endif; ?>
				<?php if (is_multi_vendor_active()): ?>
					<?php if ($this->auth_check && $this->auth_user->id == $user->id && is_sale_active() && $general_settings->digital_products_system == 1): ?>
						<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_forsale_count($user->slug) > 0)): ?>
						<li class="nav-item <?php echo ($active_tab == 'forsales') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>hidden-products?fs=shpsl" style="<?php if ($active_tab == 'forsales') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo ("For&nbsp;Sales") . "&nbsp;(" . get_user_forsale_count($user->slug) . ")"; ?></span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ($user->role == 'member' || ($user->role != 'member' && get_user_pending_forsales_count($user->id) > 0)): ?>
						<li class="nav-item <?php echo ($active_tab == 'pending') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>hidden-products?pnd=mlt&fs=shpsl" style="<?php if ($active_tab == 'pending') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo ("Pendings") . "&nbsp;(" . get_user_pending_forsales_count($user->id) . ")"; ?></span>
							</a>
						</li>
						<?php endif; ?>
						<li class="nav-item <?php echo ($active_tab == 'favorites') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "favorites/" . $user->slug; ?>" style="<?php if ($active_tab == 'favorites') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo trans("favorites") . "&nbsp;(" . get_user_favorited_products_count($user->id) . ")"; ?></span>
							</a>
						</li>
						<?php if ($user->role != 'member'): ?>
						<li class="nav-item <?php echo ($active_tab == 'downloads') ? 'active' : ''; ?>" style="overflow: hidden;">
							<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>downloads" style="<?php if ($active_tab == 'downloads') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
								<span><?php echo trans("downloads") . "&nbsp;(" . get_user_downloads_count($user->id) . ")"; ?></span>
							</a>
						</li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<li class="nav-item <?php echo ($active_tab == 'followers') ? 'active' : ''; ?>" style="overflow: hidden;">
					<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "followers/" . $user->slug; ?>" style="<?php if ($active_tab == 'followers') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
						<span><?php echo trans("followers") . "&nbsp;(" . get_followers_count($user->id) . ")"; ?></span>
					</a>
				</li>
				<li class="nav-item <?php echo ($active_tab == 'following') ? 'active' : ''; ?>" style="overflow: hidden;">
					<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "following/" . $user->slug; ?>" style="<?php if ($active_tab == 'following') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
						<span><?php echo trans("following") . "&nbsp;(" . get_following_users_count($user->id) . ")"; ?></span>
					</a>
				</li>

				<?php if (($general_settings->user_reviews == 1) && ($user->role == 'admin' || $user->is_member == 1) && is_multi_vendor_active()): ?>
					<li class="nav-item <?php echo ($active_tab == 'reviews') ? 'active' : ''; ?>" style="overflow: hidden;">
						<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "reviews/" . $user->slug; ?>" style="<?php if ($active_tab == 'reviews') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
							<span><?php echo trans("reviews") . "&nbsp;(" . get_user_review_count($user->id) . ")"; ?></span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->auth_check && $this->auth_user->id == $user->id): ?>
					<li class="nav-item <?php echo ($active_tab == 'drafts') ? 'active' : ''; ?>" style="overflow: hidden;">
						<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>drafts" style="<?php if ($active_tab == 'drafts') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
							<span><?php echo trans("drafts") . "&nbsp;(" . get_user_drafts_count($user->id) . ")"; ?></span>
						</a>
					</li>
				<?php endif; ?>
				<?php if (!$this->auth_check || ($this->auth_check && $this->auth_user->id != $user->id && ($user->role == 'admin' || $user->is_member == 1))): ?>
					<li class="nav-item <?php echo ($active_tab == 'report') ? 'active' : ''; ?>" style="overflow: hidden;">
						<a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url() . "reviews/" . $user->slug . '?vrw=report'; ?>" style="<?php if ($active_tab == 'report') {echo 'border-bottom-color: red';} ?> font-size: 10px; padding-left: 3px">
							<span><?php echo ("Report&nbsp;Shop"); ?></span>
						</a>
					</li>
				<?php endif; ?>
















										<li></li>
							</div>
						</div>
					</div>
				</ul>
			</div>
			<hr style="margin: 0px; padding: 0px;">
		</div>






	</div>


</div>