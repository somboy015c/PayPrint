<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<footer id="footer" style="margin: 0px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="footer-top">
					<div class="row">
						<div class="col-12 col-md-3 footer-widget">
							<div class="row-custom">
								<div class="footer-logo">
									<a href="<?php echo lang_base_url(); ?>"><img src="<?php echo get_logo($general_settings); ?>" alt="logo"></a>
								</div>
							</div>
							<div class="row-custom">
								<div class="footer-about">
									<?php echo html_escape($settings->about_footer); ?>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3 footer-widget">
							<div class="nav-footer">
									
										<div class="row-custom">
											<h4 class="footer-title"><?php echo trans("location"); ?></h4>
										</div>
								
								<div class="row-custom">
									<ul>
										<?php $loc = $this->session->userdata('modesy_visitor_default_location'); if (!empty($loc)){ if ($loc['country_id'] == 161) { $slug = ' Local Government Area, ';} else { $slug = ' City, ';} echo get_city($loc['city_id'])->name . $slug . get_state($loc['state_id'])->name . ' State, ' . get_country($loc['country_id'])->name; } else { echo "Please set your default location";} ?>
									</ul>
									<button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#locationModal" style="margin-top: 10px; border-radius: 6px;"><i class="icon-map-marker"></i>Update Location</button>
								</div>


							</div>
						</div>
						<div class="col-12 col-md-3 footer-widget">
							<div class="nav-footer">
								<div class="row-custom">
									<h4 class="footer-title"><?php echo trans("footer_information"); ?></h4>
								</div>
								<div class="row-custom">
									<ul>
										<?php foreach ($footer_information_links as $item): ?>
											<li><a href="<?php echo lang_base_url() . $item->slug; ?>"><?php echo html_escape($item->title); ?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
								<div class="row-custom">
									<h4 class="footer-title"><?php echo trans("footer_quick_links"); ?></h4>
								</div>
								<div class="row-custom">
									<ul>
										<li><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
										<li><a href="<?php echo lang_base_url(); ?>blog"><?php echo trans("blog"); ?></a></li>
										<li><a href="<?php echo lang_base_url(); ?>contact"><?php echo trans("contact"); ?></a></li>
										<?php foreach ($footer_quick_links as $item): ?>
											<li><a href="<?php echo lang_base_url() . $item->slug; ?>"><?php echo html_escape($item->title); ?></a></li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-3 footer-widget">
							<div class="row">
								<div class="col-12">
									<h4 class="footer-title"><?php echo trans("follow_us"); ?></h4>
									<div class="footer-social-links">
										<!--include social links-->
										<?php $this->load->view('partials/_social_links', ['show_rss' => true]); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="newsletter">
										<h4 class="footer-title"><?php echo trans("newsletter"); ?></h4>
										<?php echo form_open('home_controller/add_to_subscribers', ['id' => 'form_validate_newsletter']); ?>
										<div class="row">
											<div class="col-12">
												<div class="newsletter-inner">
													<div class="d-table-cell">
														<input type="email" class="form-control" name="email" placeholder="<?php echo trans("enter_email"); ?>" required>
													</div>
													<div class="d-table-cell align-middle">
														<button class="btn btn-default"><?php echo trans("subscribe"); ?></button>
													</div>
												</div>
											</div>
										</div>
										<?php echo form_close(); ?>

										<div class="row">
											<div class="col-12">
												<div id="newsletter" class="m-t-5">
													<?php
													if ($this->session->flashdata('news_error')):
														echo '<span class="text-danger">' . $this->session->flashdata('news_error') . '</span>';
													endif;

													if ($this->session->flashdata('news_success')):
														echo '<span class="text-success">' . $this->session->flashdata('news_success') . '</span>';
													endif;
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>







							
							<div class="row row-region">
								<div class="col-12">
									<div class="region-right">
										<?php if ($general_settings->multilingual_system == 1 && count($languages) > 1): ?>
											<div class="row-custom">
												<div class="dropdown language-dropdown">
													<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
														<i class="icon-language"></i>
														<?php echo html_escape($selected_lang->name); ?>&nbsp;<span class="icon-arrow-down"></span>
													</button>
													<div class="dropdown-menu">
														<?php foreach ($languages as $language):
															$lang_url = base_url() . $language->short_form . "/";
															if ($language->id == $this->general_settings->site_lang) {
																$lang_url = base_url();
															} ?>
															<a href="<?php echo $lang_url; ?>" class="<?php echo ($language->id == $selected_lang->id) ? 'selected' : ''; ?> " class="dropdown-item">
																<?php echo $language->name; ?>
															</a>
														<?php endforeach; ?>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row" style="padding-bottom: 40px;">
			<div class="footer-bottom">
				<div class="container">
					<div class="copyright">
						<?php echo html_escape($settings->copyright); ?>
					</div>
					<div class="footer-payment-icons">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo base_url(); ?>assets/img/payment/visa.svg" alt="visa" class="lazyload">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo base_url(); ?>assets/img/payment/mastercard.svg" alt="mastercard" class="lazyload">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo base_url(); ?>assets/img/payment/maestro.svg" alt="maestro" class="lazyload">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo base_url(); ?>assets/img/payment/amex.svg" alt="amex" class="lazyload">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo base_url(); ?>assets/img/payment/discover.svg" alt="discover" class="lazyload">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-menu" style="padding: 0px; margin: 0px;">
		<div class="container-fluid" style="display: inline;position: fixed;bottom: 0px;right: 0px; z-index: 999999;border-top: 1px solid #dbdbdb;">
			<div class="row">
				<div class="footer-bottom" style="padding: 7px 1px 1px 1px;">
					<div class="container">
						<div class="row" style="font-size: 10px;">
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<a href="<?php echo lang_base_url(); ?>">
											<img src="<?php echo base_url(); ?>assets/img/home.png" style="width: 30px; height: 21px; margin-top: 3px; margin-bottom: 2px;"><br/><?php echo trans("home"); ?>
										</a>
									</li>
								</ul>
								</center>
							</div>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<a href="<?php echo lang_base_url(); ?>/blog">
											<img src="<?php echo base_url(); ?>assets/img/blog2.png" style="width: 30px; height: 24px; margin-top: 3px; margin-bottom: 0px;"><br/><?php echo trans("blog"); ?>
										</a>
									</li>
								</ul>
								</center>
							</div>
							<?php if (auth_check()): ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<li class="nav-item"><a href="<?php echo lang_base_url(); ?>sell-now?pt=forsale" class="btn btn-md btn-custom btn-sell-now" style="width: 46px; height: 46px; font-size: 10px; border-radius: 100%; padding: 8px 6px 6px 6px;"><img src="<?php echo base_url(); ?>assets/img/ridesharea.png" style="width: 86px;"></a></li>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
							<?php if (!auth_check()): ?>
							<div class="col-2" style="margin: 0px; padding: 0px;">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<li class="nav-item"><a href="<?php echo lang_base_url(); ?>sell-now" class="btn btn-md btn-custom btn-sell-now" style="width: 46px; height: 46px; font-size: 10px; border-radius: 100%; padding: 8px 6px 6px 6px;"><img src="<?php echo base_url(); ?>assets/img/ridesharea.png" style="width: 86px;"></a></li>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<?php if ($this->auth_check): ?>
										<li class="nav-item li-main-nav-right">
											<a href="<?php echo lang_base_url(); ?>favorites">
												<i class="icon-heart"></i><br/><?php echo ("favorites"); ?>
											</a>
										</li>
									<?php else: ?>
										<li class="nav-item li-main-nav-right">
											<a href="<?php echo lang_base_url(); ?>favorites">
												<i class="icon-heart"></i><br/><?php echo trans("favorites"); ?>
											</a>
										</li>
									<?php endif; ?>
								</ul>
								</center>
							</div>
							<?php if (auth_check()): ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<!--Check auth-->
											<?php if (auth_check()): ?>
												<li class="dropdown profile-dropdown">
													<a class="dropdown-toggle a-profile" data-toggle="dropdown" href="javascript:void(0)"
													   aria-expanded="false">
														<?php if ($unread_notifications_count > 0): ?>
															<span class="notification" style="left: 0px; top: auto;"><?php echo $unread_notifications_count; ?></span>
														<?php endif; ?>
														<img src="<?php echo get_user_avatar($this->auth_user); ?>" alt="<?php echo $this->auth_user->username; ?>" style="height: 45px; width: 45px;">
														<span class="icon-arrow-down"></span>
													</a>
													<ul class="dropdown-menu">
														<?php if ($this->auth_user->role == "admin"): ?>
															<li>
																<a href="<?php echo admin_url(); ?>">
																	<i class="icon-dashboard"></i>
																	<?php echo trans("admin_panel"); ?>
																</a>
															</li>
														<?php endif; ?>
														<li>
															<a href="<?php echo lang_base_url(); ?>profile/<?php echo $this->auth_user->slug; ?>">
																<?php if (user()->role == "member"): ?>
																	<i class="icon-user"></i><?php echo trans("view_profile"); ?>
																<?php else: ?>
																	<img src="<?php echo base_url(); ?>assets/img/station.png" style="height: 20px; width: 22px;"><?php echo (" &nbsp;Visit&nbsp;Station"); ?>
																<?php endif; ?>
															</a>
														</li>
														<?php if (is_sale_active()): ?>
															<li>
																<a href="<?php echo lang_base_url(); ?>orders">
																	<i class="icon-price-tag-o"></i>
																	<?php echo ("Bookings"); ?>
																</a>
															</li>
															<?php if (is_user_vendor()): ?>
																<li>
																	<a href="<?php echo lang_base_url(); ?>sales">
																		<i class="icon-check"></i>
																		<?php echo ("Completed&nbsp;Trips"); ?>
																		<?php if ($unread_sale_count > 0): ?>
																			<span class="span-message-count"><?php echo $unread_sale_count; ?></span>
																		<?php endif; ?>
																	</a>
																</li>
																<li>
																	<a href="<?php echo lang_base_url(); ?>earnings?type=wallet">
																		<i class="icon-wallet"></i>
																		<?php echo ("Financials"); ?>
																	</a>
																</li>
																<li>
																	<a href="<?php echo lang_base_url(); ?>earnings?type=forcasts">
																		<img src="<?php echo base_url(); ?>assets/img/analytics.png" style="height: 18px; width: 20px;">
																		<?php echo ("&nbsp;Analytics"); ?>
																		<?php if ($unread_forcast_count > 0): ?>
																			<span class="span-message-count"><?php echo $unread_forcast_count; ?></span>
																		<?php endif; ?>
																	</a>
																</li>
															<?php endif; ?>
															<?php if (is_bidding_system_active()): ?>
																<li>
																	<a href="<?php echo lang_base_url(); ?>quote-requests">
																		<img src="<?php echo base_url(); ?>assets/img/rideshare2.png" style="height: 17px; width: 20px;">
																		<?php echo ("&nbsp;Ride&nbsp;Shared"); ?>
																		<?php if ($unread_requests_count > 0): ?>
																			<span class="span-message-count"><?php echo $unread_requests_count; ?></span>
																		<?php endif; ?>
																	</a>
																</li>
															<?php endif; ?>
														<?php endif; ?>
														<li>
															<a href="<?php echo lang_base_url(); ?>messages">
																<i class="icon-mail"></i>
																<?php echo trans("messages"); ?>
																<?php if ($unread_message_count > 0): ?>
																	<span class="span-message-count"><?php echo $unread_message_count; ?></span>
																<?php endif; ?>
															</a>
														</li>
														<li>
															<a href="<?php echo lang_base_url(); ?>settings/update-profile">
																<i class="icon-settings"></i>
																<?php echo trans("settings"); ?>
															</a>
														</li>
														<li>
															<a href="<?php echo base_url(); ?>logout" class="logout">
																<i class="icon-logout"></i>
																<?php echo trans("logout"); ?>
															</a>
														</li>
													</ul>
												</li>
											<?php endif; ?>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
							<?php if (auth_check()): ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<!--Check auth-->
											<?php if (auth_check()): ?>
												<li class="dropdown profile-dropdown">
													<a class="dropdown-toggle a-profile" style="border-radius: 0px;" data-toggle="dropdown" href="javascript:void(0)"
													   aria-expanded="false">
														<img src="<?php echo base_url(); ?>assets/img/option.png" style="margin-top: 7px; margin-bottom: 0px;">
													</a>
													<ul class="dropdown-menu">
														<li>
															<a href="<?php echo lang_base_url(); ?>start-selling">
																<img src="<?php echo base_url(); ?>assets/img/add_station.png" style="height: 20px; width: 22px;">&nbsp;<?php echo ("Station&nbsp;Opening"); ?>
															</a>
														</li>
														<hr style="margin: 0px;">
														<li>
															<a href="<?php echo lang_base_url(); ?>pending-products">
																<img src="<?php echo base_url(); ?>assets/img/ads.png" style="height: 20px; width: 18px;">&nbsp;<?php echo ("&nbsp;Post Advert"); ?>
															</a>
														</li>
														<hr style="margin: 0px;">
														<li>
															<a href="<?php echo lang_base_url(); ?>start-selling">
																<i class="icon-plus"></i>&nbsp;<?php echo ("Add&nbsp;Services"); ?>
															</a>
														</li>
												</li>
											<?php endif; ?>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
							<?php if (!auth_check()): ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<li class="nav-item">
												<a href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">
													<i class="icon-user"></i><br/><?php echo trans("login"); ?>
												</a>
											</li>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
							<?php if (!auth_check()): ?>
							<div class="col-2">
								<center>
								<ul class="nav align-items-center">
									<li class="nav-item li-main-nav-right">
										<ul class="nav align-items-center">
											<!--Check auth-->
											<?php if (!auth_check()): ?>
												<li class="nav-item">
													<a href="<?php echo lang_base_url(); ?>register">
														<i class="icon-user-plus"></i><br/><?php echo trans("register"); ?>
													</a>
												</li>
											<?php endif; ?>
										</ul>
									</li>
								</ul>
								</center>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php if (!isset($_COOKIE["modesy_cookies_warning"]) && $settings->cookies_warning): ?>
	<div class="cookies-warning">
		<div class="text"><?php echo $this->settings->cookies_warning_text; ?></div>
		<a href="javascript:void(0)" onclick="hide_cookies_warning();" class="icon-cl"> <i class="icon-close"></i></a>
	</div>
<?php endif; ?>
<!-- Scroll Up Link -->
<div class="main-menu">
	<a href="javascript:void(0)" class="scrollup"><i class="icon-arrow-up"></i></a>
</div>
<div class="mobile-menu">
	<a href="javascript:void(0)" class="scrollup" style="bottom: 60px;"><i class="icon-arrow-up"></i></a>
</div>

<?php if (!empty($this->session->userdata('mds_send_email_data'))): ?>
	<script>
        $(document).ready(function () {
            var data = JSON.parse(<?php echo json_encode($this->session->userdata("mds_send_email_data"));?>);
            if (data) {
                data[csfr_token_name] = $.cookie(csfr_cookie_name);
                data['lang_folder'] = lang_folder;
                data['form_lang_base_url'] = '<?php echo lang_base_url(); ?>';
                $.ajax({
                    type: "POST",
                    url: base_url + "ajax_controller/send_email",
                    data: data,
                    success: function (response) {
                    }
                });
            }
        });
	</script>
<?php endif;
$this->session->unset_userdata('mds_send_email_data'); ?>

<!-- Popper JS-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Owl-carousel -->
<script src="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
<!-- Plugins JS-->
<script src="<?php echo base_url(); ?>assets/js/plugins-1.5.js"></script>


<script>$('<input>').attr({type: 'hidden', name: 'form_lang_base_url', value: '<?php echo lang_base_url(); ?>'}).appendTo('form');</script>
<script>$('<input>').attr({type: 'hidden', name: 'lang_folder', value: '<?php echo $this->selected_lang->folder_name; ?>'}).appendTo('form');</script>
<script>

    var base_url = '<?php echo base_url(); ?>';var lang_base_url = '<?php echo lang_base_url(); ?>';var thousands_separator = '<?php echo $this->thousands_separator; ?>';var lang_folder = '<?php echo $this->selected_lang->folder_name; ?>';var fb_app_id = '<?php echo $this->general_settings->facebook_app_id; ?>';var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';var is_recaptcha_enabled = false;var txt_processing = '<?php echo trans("processing"); ?>';var sweetalert_ok = '<?php echo trans("ok"); ?>';var sweetalert_cancel = '<?php echo trans("cancel"); ?>';<?php if ($recaptcha_status == true): ?>is_recaptcha_enabled = true;<?php endif; ?>
	$("form").submit(function(){$("input[name='"+csfr_token_name+"']").val($.cookie(csfr_cookie_name))});$(document).ready(function(){$("#main-slider").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,lazyLoad:true,lazyLoadEager:true,slideSpeed:3000,paginationSpeed:1000,items:1,dots:true,nav:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],itemsDesktop:false,itemsDesktopSmall:false,itemsTablet:false,itemsMobile:false,});$("#product-slider").owlCarousel({items:1,autoplay:false,nav:true,loop:$(".owl-carousel > .item").length<=2?false:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],dotsContainer:".dots-container",});
		
		$("#blog-slider").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});

		$("#blog-sliderm").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});
		
		$("#blog-slider2").owlCarousel({loop:$(".owl-carousel2 > .item").length<=1?false:true,margin: 20});
		/*document.getElementByClass("image_card").style.display="none";*/
		$("#blog-slider3").owlCarousel({loop:$(".owl-carousel > .item").length<=1?false:true,margin: 20});
		/*document.getElementByClass("image_card").style.display="none";*/
		$("#blog-slider4").owlCarousel({loop:$(".owl-carousel > .item").length<=1?false:true,margin: 20});
		/*document.getElementByClass("image_card").style.display="none";*/

		$("#blog-slidertop").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-slidernear").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-slidermost").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-slidertrend").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-slidershop").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-sliderworkshop").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});


		$("#blog-slideryours").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});



		$("#blog-sliderban").owlCarousel({autoplay:true,loop:$(".owl-carousel > .item").length<=2?false:true,margin:20,nav:true,lazyLoad:true,navText:["<i class='icon-arrow-slider-left random-arrow-prev' aria-hidden='true'></i>","<i class='icon-arrow-slider-right random-arrow-next' aria-hidden='true'></i>"],responsive:{0:{items:1},600:{items:2},1000:{items:3}}});




		$(document).on("click",".rating-stars .label-star",function(){$("#user_rating").val($(this).attr("data-star"))});$(document).on("click",".btn-open-mobile-nav",function(){document.getElementById("navMobile").style.width="100%";$("html").addClass("disable-body-scroll");$("body").addClass("disable-body-scroll")});$(document).on("click",".btn-close-mobile-nav",function(){document.getElementById("navMobile").style.width="0";$("html").removeClass("disable-body-scroll");$("body").removeClass("disable-body-scroll")});$(document).on("click",".close-mobile-nav",function(){document.getElementById("navMobile").style.width="0"});$("#loginModal").on("hidden.bs.modal",function(){if($("body").hasClass("disable-body-scroll")){$("html").removeClass("disable-body-scroll");$("body").removeClass("disable-body-scroll")}})});$(function(){$(".filter-custom-scrollbar").overlayScrollbars({});$(".search-results-location").overlayScrollbars({});$(".slider-custom-scrollbar").overlayScrollbars({scrollbars:{visibility:"hidden"}});$(".messages-sidebar").overlayScrollbars({});if($("#message-custom-scrollbar").length>0){var a=OverlayScrollbars(document.getElementById("message-custom-scrollbar"),{});a.scroll({y:"100%"},0)}});$(document).ready(function(a){a(".image-popup").magnificPopup({type:"image",titleSrc:function(b){return b.el.attr("title")+"<small></small>"},image:{verticalFit:true,},gallery:{enabled:true,navigateByImgClick:true,preload:[0,1]},removalDelay:100,fixedContentPos:true,})});$(".mega-menu .nav-item").hover(function(){var a=$(this).attr("data-category-id");$("#mega_menu_content_"+a).show();$(".large-menu-item").removeClass("active");$(".large-menu-item-first").addClass("active");$(".large-menu-content-first").addClass("active")},function(){var a=$(this).attr("data-category-id");$("#mega_menu_content_"+a).hide()});$(".mega-menu .dropdown-menu").hover(function(){$(this).show()},function(){});$(".large-menu-item").hover(function(){var a=$(this).attr("data-subcategory-id");$(".large-menu-item").removeClass("active");$(this).addClass("active");$(".large-menu-content").removeClass("active");$("#large_menu_content_"+a).addClass("active")},function(){});$(window).scroll(function(){if($(this).scrollTop()>100){$(".scrollup").fadeIn()}else{$(".scrollup").fadeOut()}});$(".scrollup").click(function(){$("html, body").animate({scrollTop:0},700);return false});$(function(){$(".search-select a").click(function(){$(".search-select .btn").text($(this).text());$(".search-select .btn").val($(this).text());$(".search_type_input").val($(this).attr("data-value"))})});$(document).on("click",".quantity-select-product .dropdown-menu .dropdown-item",function(){$(".quantity-select-product .btn span").text($(this).text());$("input[name='product_quantity']").val($(this).text())});
	function set_default_location(b){var a={location_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"home_controller/set_default_location",data:a,success:function(c){location.reload()}})}
	function set_default_state(b){var a={location_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"home_controller/set_default_state",data:a,success:function(c){location.reload()}})}

	function set_icon(b){



		button = document.getElementById("button");
		if (b == 'product') { button.innerHTML = '<i class="icon-shopping-basket" style="padding-right: 8px;"></i>'; } else if (b == 'handwork') { button.innerHTML = '<i class="icon-shopping-bag" style="padding-right: 8px;"></i>'; } else if (b == 'store') { button.innerHTML = '<i class="icon-cart" style="padding-right: 8px;"></i>'; }
	    





	}

//delete banner
function delete_banner(user_id, message) {swal({text: message, icon: "warning", buttons: [sweetalert_cancel, sweetalert_ok], dangerMode: true, }).then(function (willDelete) {if (willDelete) {var data = {"user_id": user_id, }; data[csfr_token_name] = $.cookie(csfr_cookie_name); $.ajax({method: "POST", url: base_url + "profile_controller/delete_banner", data: data }) .done(function (response) {location.reload(); }) } }); } function delete_mark(user_id, message) {swal({text: message, icon: "warning", buttons: [sweetalert_cancel, sweetalert_ok], dangerMode: true, }).then(function (willDelete) {if (willDelete) {var data = {"user_id": user_id, }; data[csfr_token_name] = $.cookie(csfr_cookie_name); $.ajax({method: "POST", url: base_url + "profile_controller/delete_mark", data: data }) .done(function (response) {location.reload(); }) } }); }

	$(document).on("click","#show_phone_number",function(){$(this).hide();$("#phone_number").show()});$(document).on("click","#show_phone_number2",function(){$(this).hide();$("#phone_number2").show()});
	$(document).ready(function(){$("#form_login").submit(function(a){var b=$(this);if(b[0].checkValidity()===false){a.preventDefault();a.stopPropagation()}else{a.preventDefault();var c=b.find("input, select, button, textarea");var d=b.serializeArray();d.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});$.ajax({url:base_url+"auth_controller/login_post",type:"post",data:d,success:function(f){var e=JSON.parse(f);if(e.result==1){location.reload()}else{if(e.result==0){document.getElementById("result-login").innerHTML=e.error_message}}}})}b[0].classList.add("was-validated")})});function send_activation_email(b,c){$("#result-login").empty();$(".spinner-activation-login").show();var a={id:b,token:c,type:"login"};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#submit_review").prop("disabled",true);$.ajax({type:"POST",url:base_url+"auth_controller/send_activation_email_post",data:a,success:function(e){var d=JSON.parse(e);if(d.result==1){$(".spinner-activation-login").hide();document.getElementById("result-login").innerHTML=d.success_message}else{location.reload()}}})}function send_activation_email_register(b,c){$("#result-register").empty();$(".spinner-activation-register").show();var a={id:b,token:c,type:"register"};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#submit_review").prop("disabled",true);$.ajax({type:"POST",url:base_url+"auth_controller/send_activation_email_post",data:a,success:function(e){var d=JSON.parse(e);if(d.result==1){$(".spinner-activation-register").hide();document.getElementById("result-register").innerHTML=d.success_message}else{location.reload()}}})}$(document).on("click","#submit_review",function(){var d=$.trim($("#user_rating").val());var e=$.trim($("#user_review").val());var c=$.trim($("#review_product_id").val());var b=parseInt($("#product_review_limit").val());if(!d){$(".rating-stars").addClass("invalid-rating");return false}else{$(".rating-stars").removeClass("invalid-rating")}var a={review:e,rating:d,product_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#submit_review").prop("disabled",true);$.ajax({type:"POST",url:base_url+"product_controller/make_review",data:a,success:function(f){$("#submit_review").prop("disabled",false);if(f=="voted_error"){$(".error-reviewed").show()}else{if(f=="error_own_product"){$(".error-own-product").show()}else{document.getElementById("review-result").innerHTML=f}}}})});function load_more_review(c){var b=parseInt($("#product_review_limit").val());var a={product_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#load_review_spinner").show();$.ajax({method:"POST",url:base_url+"product_controller/load_more_review",data:a}).done(function(d){setTimeout(function(){$("#load_review_spinner").hide();document.getElementById("review-result").innerHTML=d},1000)})}function delete_review(c,b,d,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(g){if(g){var f=parseInt($("#product_review_limit").val());var e={id:c,product_id:b,user_id:d,limit:f,lang_folder:lang_folder};e[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"product_controller/delete_review",data:e}).done(function(h){document.getElementById("review-result").innerHTML=h})}})}$(document).on("click","#submit_user_review",function(){var d=$.trim($("#user_rating").val());var e=$.trim($("#user_review").val());var c=$.trim($("#review_seller_id").val());var b=parseInt($("#user_review_limit").val());if(!d){$(".rating-stars").addClass("invalid-rating");return false}else{$(".rating-stars").removeClass("invalid-rating")}var a={review:e,rating:d,seller_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#submit_user_review").prop("disabled",true);$.ajax({type:"POST",url:base_url+"ajax_controller/add_user_review",data:a,success:function(f){$("#submit_user_review").prop("disabled",false);if(f=="voted_error"){$(".error-reviewed").show()}else{location.reload()}}})});function load_more_user_review(c){var b=parseInt($("#user_review_limit").val());var a={seller_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#load_review_spinner").show();$.ajax({method:"POST",url:base_url+"ajax_controller/load_more_user_review",data:a}).done(function(d){setTimeout(function(){$("#load_review_spinner").hide();document.getElementById("user-review-result").innerHTML=d},1000)})}function delete_user_review(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={review_id:b,lang_folder:lang_folder};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"ajax_controller/delete_user_review",data:c}).done(function(e){location.reload()})}})}$(document).ready(function(){var a;$("#make_blog_comment_registered").submit(function(e){e.preventDefault();var d=$.trim($("#comment_text").val());if(d.length<1){$("#comment_text").addClass("is-invalid");return false}else{$("#comment_text").removeClass("is-invalid")}if(a){a.abort()}var b=$(this);var c=b.find("input, select, button, textarea");var f=parseInt($("#blog_comment_limit").val());var g=b.serializeArray();g.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});g.push({name:"lang_folder",value:lang_folder});g.push({name:"limit",value:f});c.prop("disabled",true);a=$.ajax({url:base_url+"home_controller/add_comment_post",type:"post",data:g,});a.done(function(h){c.prop("disabled",false);document.getElementById("comment-result").innerHTML=h;$("#make_blog_comment_registered")[0].reset()})});$("#make_blog_comment").submit(function(g){g.preventDefault();var e=$.trim($("#comment_name").val());var d=$.trim($("#comment_email").val());var f=$.trim($("#comment_text").val());if(e.length<1){$("#comment_name").addClass("is-invalid");return false}else{$("#comment_name").removeClass("is-invalid")}if(d.length<1){$("#comment_email").addClass("is-invalid");return false}else{$("#comment_email").removeClass("is-invalid")}if(f.length<1){$("#comment_text").addClass("is-invalid");return false}else{$("#comment_text").removeClass("is-invalid")}if(a){a.abort()}var b=$(this);var c=b.find("input, select, button, textarea");var h=parseInt($("#blog_comment_limit").val());var j=b.serializeArray();j.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});j.push({name:"limit",value:h});j.push({name:"lang_folder",value:lang_folder});var i=true;if(is_recaptcha_enabled==true){$(j).each(function(l,k){if(k.name=="g-recaptcha-response"){if(k.value==""){$(".g-recaptcha").addClass("is-recaptcha-invalid");i=false}}})}if(i==true){$(".g-recaptcha").removeClass("is-recaptcha-invalid");c.prop("disabled",true);a=$.ajax({url:base_url+"home_controller/add_comment_post",type:"post",data:j,});a.done(function(k){c.prop("disabled",false);if(is_recaptcha_enabled==true){grecaptcha.reset()}document.getElementById("comment-result").innerHTML=k;$("#make_blog_comment")[0].reset()})}})});function load_more_blog_comment(c){var b=parseInt($("#blog_comment_limit").val());var a={post_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#load_comment_spinner").show();$.ajax({method:"POST",url:base_url+"home_controller/load_more_comment",data:a}).done(function(d){setTimeout(function(){$("#load_comment_spinner").hide();document.getElementById("comment-result").innerHTML=d},1000)})}function delete_blog_comment(a,c,b){swal({text:b,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(f){if(f){var e=parseInt($("#blog_comment_limit").val());var d={comment_id:a,post_id:c,limit:e,lang_folder:lang_folder};d[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"home_controller/delete_comment_post",data:d}).done(function(g){document.getElementById("comment-result").innerHTML=g})}})}$(document).ready(function(){var a;$("#make_comment_registered").submit(function(e){e.preventDefault();var d=$.trim($("#comment_text").val());if(d.length<1){$("#comment_text").addClass("is-invalid");return false}else{$("#comment_text").removeClass("is-invalid")}if(a){a.abort()}var b=$(this);var c=b.find("input, select, button, textarea");var f=parseInt($("#product_comment_limit").val());var g=b.serializeArray();g.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});g.push({name:"lang_folder",value:lang_folder});g.push({name:"limit",value:f});c.prop("disabled",true);a=$.ajax({url:base_url+"product_controller/make_comment",type:"post",data:g,});a.done(function(h){c.prop("disabled",false);document.getElementById("comment-result").innerHTML=h;$("#make_comment_registered")[0].reset()})});$("#make_comment").submit(function(g){g.preventDefault();var e=$.trim($("#comment_name").val());var d=$.trim($("#comment_email").val());var f=$.trim($("#comment_text").val());if(e.length<1){$("#comment_name").addClass("is-invalid");return false}else{$("#comment_name").removeClass("is-invalid")}if(d.length<1){$("#comment_email").addClass("is-invalid");return false}else{$("#comment_email").removeClass("is-invalid")}if(f.length<1){$("#comment_text").addClass("is-invalid");return false}else{$("#comment_text").removeClass("is-invalid")}if(a){a.abort()}var b=$(this);var c=b.find("input, select, button, textarea");var h=parseInt($("#product_comment_limit").val());var j=b.serializeArray();j.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});j.push({name:"lang_folder",value:lang_folder});j.push({name:"limit",value:h});var i=true;if(is_recaptcha_enabled==true){$(j).each(function(l,k){if(k.name=="g-recaptcha-response"){if(k.value==""){$(".g-recaptcha").addClass("is-recaptcha-invalid");i=false}}})}if(i==true){$(".g-recaptcha").removeClass("is-recaptcha-invalid");c.prop("disabled",true);a=$.ajax({url:base_url+"product_controller/make_comment",type:"post",data:j,});a.done(function(k){c.prop("disabled",false);if(is_recaptcha_enabled==true){grecaptcha.reset()}document.getElementById("comment-result").innerHTML=k;$("#make_comment")[0].reset()})}})});$(document).on("click",".btn-subcomment-registered",function(){var a=$(this).attr("data-comment-id");var b={lang_folder:lang_folder};b[csfr_token_name]=$.cookie(csfr_cookie_name);$("#make_subcomment_registered_"+a).ajaxSubmit({beforeSubmit:function(){var d=$("#make_subcomment_registered_"+a).serializeArray();var c=$.trim(d[0].value);if(c.length<1){$(".form-comment-text").addClass("is-invalid");return false}else{$(".form-comment-text").removeClass("is-invalid")}},type:"POST",url:base_url+"product_controller/make_comment",data:b,success:function(c){document.getElementById("comment-result").innerHTML=c}})});$(document).on("click",".btn-subcomment",function(){var a=$(this).attr("data-comment-id");var b={lang_folder:lang_folder};b[csfr_token_name]=$.cookie(csfr_cookie_name);$("#make_subcomment_"+a).ajaxSubmit({beforeSubmit:function(){var e=$("#make_subcomment_"+a).serializeArray();var f=$.trim(e[0].value);var d=$.trim(e[1].value);var c=$.trim(e[2].value);if(is_recaptcha_enabled==true){var g=$.trim(e[3].value)}if(f.length<1){$(".form-comment-name").addClass("is-invalid");return false}else{$(".form-comment-name").removeClass("is-invalid")}if(d.length<1){$(".form-comment-email").addClass("is-invalid");return false}else{$(".form-comment-email").removeClass("is-invalid")}if(c.length<1){$(".form-comment-text").addClass("is-invalid");return false}else{$(".form-comment-text").removeClass("is-invalid")}if(is_recaptcha_enabled==true){if(g==""){$("#make_subcomment_"+a+" .g-recaptcha").addClass("is-recaptcha-invalid");return false}else{$("#make_subcomment_"+a+" .g-recaptcha").removeClass("is-recaptcha-invalid")}}},type:"POST",url:base_url+"product_controller/make_comment",data:b,success:function(c){if(is_recaptcha_enabled==true){grecaptcha.reset()}document.getElementById("comment-result").innerHTML=c}})});function load_more_comment(c){var b=parseInt($("#product_comment_limit").val());var a={product_id:c,limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$("#load_comment_spinner").show();$.ajax({method:"POST",url:base_url+"product_controller/load_more_comment",data:a}).done(function(d){setTimeout(function(){$("#load_comment_spinner").hide();document.getElementById("comment-result").innerHTML=d},1000)})}function delete_comment(a,c,b){swal({text:b,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(f){if(f){var e=parseInt($("#product_comment_limit").val());var d={id:a,product_id:c,limit:e,lang_folder:lang_folder};d[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"product_controller/delete_comment",data:d}).done(function(g){document.getElementById("comment-result").innerHTML=g})}})}function show_comment_box(a){$(".visible-sub-comment").empty();var c=parseInt($("#product_comment_limit").val());var b={comment_id:a,limit:c,lang_folder:lang_folder};b[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/load_subcomment_box",data:b,success:function(d){$("#sub_comment_form_"+a).append(d)}})}function delete_conversation(a,b){swal({text:b,icon:"warning",buttons:true,buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={conversation_id:a,lang_folder:lang_folder};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"message_controller/delete_conversation",data:c}).done(function(e){window.location.href=base_url+"messages"})}})}function remove_from_cart(a){var b={cart_item_id:a,lang_folder:lang_folder};b[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"cart_controller/remove_from_cart",data:b,success:function(c){location.reload()}})}$(document).on("click",".btn-cart-product-quantity-item",function(){var c=$(this).val();var b=$(this).attr("data-product-id");var a={product_id:b,quantity:c,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"cart_controller/update_cart_product_quantity",data:a,success:function(d){location.reload()}})});$(document).ready(function(){$("#use_same_address_for_billing").change(function(){if($(this).is(":checked")){$(".cart-form-billing-address").hide()}else{$(".cart-form-billing-address").show()}})});function approve_order_product(a,b){swal({text:b,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(c){if(c){var d={order_product_id:a,lang_folder:lang_folder};d[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"order_controller/approve_order_product_post",data:d,success:function(e){location.reload()}})}})}$(document).on("input paste focus","#input_search",function(){var c=$(".search_type_input").val();var b=$(this).val();if(b.length<2){$("#response_search_results").hide();return false}var a={search_type:c,input_value:b,lang_base_url:lang_base_url};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"ajax_controller/ajax_search",data:a,success:function(e){var d=JSON.parse(e);if(d.result==1){document.getElementById("response_search_results").innerHTML=d.response;$("#response_search_results").show()}$("#response_search_results ul li a").wrapInTag({words:[b]})}})});$(document).on("click",function(a){if($(a.target).closest(".top-search-bar").length===0){$("#response_search_results").hide()}});$(document).on("input paste focus","#input_location",function(){var b=$(this).val();if(b.length<2){$("#response_search_location").hide();return false}var a={input_value:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"ajax_controller/search_location",data:a,success:function(d){var c=JSON.parse(d);if(c.result==1){document.getElementById("response_search_location").innerHTML=c.response;$("#response_search_location").show()}$("#response_search_location ul li a").wrapInTag({words:[b]})}})});$.fn.wrapInTag=function(b){function a(g){return g.textContent?g.textContent:g.innerText}var e=b.tag||"strong",f=b.words||[],c=RegExp(f.join("|"),"gi"),d="<"+e+">$&</"+e+">";$(this).contents().each(function(){if(this.nodeType===3){$(this).replaceWith(a(this).replace(c,d))}else{if(!b.ignoreChildNodes){$(this).wrapInTag(b)}}})};$(document).on("click","#response_search_location ul li a",function(){var b=$(this).attr("data-country");var c=$(this).attr("data-state");var a=$(this).attr("data-city");$(".input-location-filter").remove();if(b!=null&&b!=0){$(".filter-location").append("<input type='hidden' value='"+b+"' name='country' class='input-location-filter'>")}if(c!=null&&c!=0){$(".filter-location").append("<input type='hidden' value='"+c+"' name='state' class='input-location-filter'>")}if(a!=null&&a!=0){$(".filter-location").append("<input type='hidden' value='"+a+"' name='city' class='input-location-filter'>")}$("#form-product-filters").submit()});$(document).on("click",function(a){if($(a.target).closest(".filter-location").length===0){$("#response_search_location").hide()}});function set_site_language(b){var a={lang_id:b,};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"home_controller/set_site_language",data:a}).done(function(c){location.reload()})}$(document).on("click","#btn_load_more_promoted",function(){$("#load_promoted_spinner").show();var b=$("#input_promoted_products_limit").val();var d=$("#input_promoted_products_per_page").val();var e=$("#input_promoted_products_count").val();var c=parseInt(b)+parseInt(d);var a={limit:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"home_controller/load_more_promoted_products",data:a,success:function(f){$("#input_promoted_products_limit").val(c);setTimeout(function(){$("#load_promoted_spinner").hide();$("#row_promoted_products").append(f);if(c>=e){$("#btn_load_more_promoted").hide()}},700)}})});function delete_product(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={id:b,};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"product_controller/delete_product",data:c}).done(function(e){location.reload()})}})}function delete_draft(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={id:b,};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"product_controller/delete_draft",data:c}).done(function(e){location.reload()})}})}function set_product_as_sold(b){var a={product_id:b,};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({method:"POST",url:base_url+"product_controller/set_product_as_sold",data:a}).done(function(c){location.reload()})}function delete_product_digital_file(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={product_id:b,};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({url:base_url+"file_controller/delete_digital_file",type:"post",data:c,success:function(e){document.getElementById("digital_files_upload_result").innerHTML=e}})}})}function delete_product_video_preview(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={product_id:b,};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({url:base_url+"file_controller/delete_video",type:"post",data:c,success:function(e){document.getElementById("video_upload_result").innerHTML=e}})}})}function delete_product_audio_preview(b,a){swal({text:a,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={product_id:b,};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({url:base_url+"file_controller/delete_audio",type:"post",data:c,success:function(e){document.getElementById("audio_upload_result").innerHTML=e}})}})}$("#form_send_message").submit(function(c){c.preventDefault();var g=$("#message_subject").val();var h=$("#message_text").val();var f=$("#message_sender_id").val();var d=$("#message_receiver_id").val();var e=$("#message_send_em").val();if(g.length<1){$("#message_subject").addClass("is-invalid");return false}else{$("#message_subject").removeClass("is-invalid")}if(h.length<1){$("#message_text").addClass("is-invalid");return false}else{$("#message_text").removeClass("is-invalid")}var a=$(this);var b=a.find("input, select, button, textarea");var i=a.serializeArray();i.push({name:csfr_token_name,value:$.cookie(csfr_cookie_name)});i.push({name:"lang_folder",value:lang_folder});b.prop("disabled",true);$.ajax({url:base_url+"message_controller/add_conversation",type:"post",data:i,success:function(j){b.prop("disabled",false);document.getElementById("send-message-result").innerHTML=j;$("#form_send_message")[0].reset();if(e){send_message_as_email(f,d,g,h)}}})});function send_message_as_email(c,b,d,e){var a={email_type:"new_message",sender_id:c,receiver_id:b,message_subject:d,message_text:e,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"ajax_controller/send_email",data:a,success:function(f){}})} function get_states(b){var a={country_id:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/get_states",data:a,success:function(c){$("#states").children("option:not(:first)").remove();$("#cities").children("option:not(:first)").remove();$("#states").append(c);update_product_map()}})}function get_cities(b){var a={state_id:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/get_cities",data:a,success:function(c){$("#cities").children("option:not(:first)").remove();$("#cities").append(c);update_product_map()}})} function get_states_m(b){var a={country_id:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/get_states",data:a,success:function(c){$("#states_m").children("option:not(:first)").remove();$("#cities_m").children("option:not(:first)").remove();$("#states_m").append(c);update_product_map()}})}function get_cities_m(b){var a={state_id:b,lang_folder:lang_folder};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/get_cities",data:a,success:function(c){$("#cities_m").children("option:not(:first)").remove();$("#cities_m").append(c);update_product_map()}})} function update_product_map(){var b=$("#countries").find("option:selected").text();var c=$("#countries").find("option:selected").val();var e=$("#states").find("option:selected").text();var f=$("#states").find("option:selected").val();var a=$("#address_input").val();var g=$("#zip_code_input").val();var d={country_text:b,country_val:c,state_text:e,state_val:f,address:a,zip_code:g,lang_folder:lang_folder};d[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/show_address_on_map",data:d,success:function(h){document.getElementById("map-result").innerHTML=h}})}$(document).on("change","#address_input",function(){update_product_map()});$(document).on("change","#zip_code_input",function(){update_product_map()});$(document).on("click",".item-favorite-button",function(){var b=$(this).attr("data-product-id");if($(this).hasClass("item-favorite-enable")){if($(this).hasClass("item-favorited")){$(this).removeClass("item-favorited")}else{$(this).addClass("item-favorited")}var a={product_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/add_remove_favorite_ajax",data:a,success:function(c){}})}});$(document).on("click",".btn-set-image-main-session",function(){var b=$(this).attr("data-file-id");var a={file_id:b};$(".badge-is-image-main").removeClass("badge-success");$(".badge-is-image-main").addClass("badge-secondary");$(this).removeClass("badge-secondary");$(this).addClass("badge-success");a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"file_controller/set_image_main_session",data:a,success:function(c){}})});$(document).on("click",".btn-set-image-main",function(){var b=$(this).attr("data-image-id");var c=$(this).attr("data-product-id");var a={image_id:b,product_id:c};$(".badge-is-image-main").removeClass("badge-success");$(".badge-is-image-main").addClass("badge-secondary");$(this).removeClass("badge-secondary");$(this).addClass("badge-success");a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"file_controller/set_image_main",data:a,success:function(d){}})});$(document).on("click",".btn-delete-product-img-session",function(){var b=$(this).attr("data-file-id");var a={file_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"file_controller/delete_image_session",data:a,success:function(){$("#uploaderFile"+b).remove()}})});$(document).on("click",".btn-delete-product-img",function(){var b=$(this).attr("data-file-id");var a={file_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"file_controller/delete_image",data:a,success:function(c){location.reload()}})});$("#form_validate").submit(function(){$(".custom-control-validate-input").removeClass("custom-control-validate-error");setTimeout(function(){$(".custom-control-validate-input .error").each(function(){var a=$(this).attr("name");if($(this).is(":visible")){a=a.replace("[]","");$(".label_validate_"+a).addClass("custom-control-validate-error")}})},100)});$(".custom-control-validate-input input").click(function(){var a=$(this).attr("name");a=a.replace("[]","");$(".label_validate_"+a).removeClass("custom-control-validate-error")});function hide_cookies_warning(){$(".cookies-warning").hide();var a={};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"home_controller/cookies_warning",data:a,success:function(b){}})}$("#form_validate").validate();$("#form_validate_search").validate();$("#form_validate_search_mobile").validate();$("#form_validate_payout_1").validate();$("#form_validate_payout_2").validate();$("#form_validate_payout_3").validate();$("#form_validate_newsletter").validate();$("#form_add_cart").validate();$("#form_add_cart_mobile").validate();$("#form_validate_checkout").validate();$("#form_add_cart").submit(function(){$("#form_add_cart .custom-control-variation input").each(function(){if($(this).hasClass("error")){var a=$(this).attr("id");$("#form_add_cart .custom-control-variation label").each(function(){if($(this).attr("for")==a){$(this).addClass("is-invalid")}})}else{var a=$(this).attr("id");$("#form_add_cart .custom-control-variation label").each(function(){if($(this).attr("for")==a){$(this).removeClass("is-invalid")}})}})});$("#form_add_cart_mobile").submit(function(){$("#form_add_cart_mobile .custom-control-variation input").each(function(){if($(this).hasClass("error")){var a=$(this).attr("id");$("#form_add_cart_mobile .custom-control-variation label").each(function(){if($(this).attr("for")==a){$(this).addClass("is-invalid")}})}else{var a=$(this).attr("id");$("#form_add_cart_mobile .custom-control-variation label").each(function(){if($(this).attr("for")==a){$(this).removeClass("is-invalid")}})}})});$(document).on("click",".custom-control-variation input",function(){var a=$(this).attr("name");$(".custom-control-variation label").each(function(){if($(this).attr("data-input-name")==a){$(this).removeClass("is-invalid")}})});$(document).ready(function(){$(".validate_terms").submit(function(a){if(!$(".custom-control-validate-input input").is(":checked")){a.preventDefault();$(".custom-control-validate-input").addClass("custom-control-validate-error")}else{$(".custom-control-validate-input").removeClass("custom-control-validate-error")}})});$(document).on("input keyup paste change",".validate_price .price-input",function(){var a=$(this).val();a=a.replace(",",".");if($.isNumeric(a)&&a!=0){$(this).removeClass("is-invalid")}else{$(this).addClass("is-invalid")}});$("input[type=radio][name=product_type]").change(function(){if(this.value=="digital"){$(".listing_ordinary_listing").hide();$(".listing_take_offers").hide();$(".listing_sell_on_site input").prop("checked",true)}else{$(".listing_ordinary_listing").show();$(".listing_take_offers").show()}});$(document).ready(function(){$(".validate_price").submit(function(a){$(".validate_price .validate-price-input").each(function(){var b=$(this).val();if(b!=""){b=b.replace(",",".");if($.isNumeric(b)&&b!=0){$(this).removeClass("is-invalid")}else{a.preventDefault();$(this).addClass("is-invalid");$(this).focus()}}})})});$(".price-input").keypress(function(b){if(typeof thousands_separator=="undefined"){thousands_separator="."}if(thousands_separator=="."){var a=$(this);if((b.which!=46||a.val().indexOf(".")!=-1)&&((b.which<48||b.which>57)&&(b.which!=0&&b.which!=8))){b.preventDefault()}var c=$(this).val();if((c.indexOf(".")!=-1)&&(c.substring(c.indexOf(".")).length>2)&&(b.which!=0&&b.which!=8)&&($(this)[0].selectionStart>=c.length-2)){b.preventDefault()}}else{var a=$(this);if((b.which!=44||a.val().indexOf(",")!=-1)&&((b.which<48||b.which>57)&&(b.which!=0&&b.which!=8))){b.preventDefault()}var c=$(this).val();if((c.indexOf(",")!=-1)&&(c.substring(c.indexOf(",")).length>2)&&(b.which!=0&&b.which!=8)&&($(this)[0].selectionStart>=c.length-2)){b.preventDefault()}}});$(document).ready(function(){$("iframe").attr("allowfullscreen","")});function delete_quote_request(a,b){swal({text:b,icon:"warning",buttons:[sweetalert_cancel,sweetalert_ok],dangerMode:true,}).then(function(d){if(d){var c={id:a};c[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"bidding_controller/delete_quote_request",data:c,success:function(e){location.reload()}})}})}function add_license_keys(b){var a={product_id:b,license_keys:$("#textarea_license_keys").val(),allow_dublicate:$("input[name='allow_dublicate_license_keys']:checked").val()};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/add_license_keys",data:a,success:function(d){var c=JSON.parse(d);if(c.result==1){document.getElementById("result-add-license-keys").innerHTML=c.success_message;$("#textarea_license_keys").val("")}}})}function delete_license_key(b,c){var a={id:b,product_id:c};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/delete_license_key",data:a,success:function(d){$("#tr_license_key_"+b).remove()}})}$("#viewLicenseKeysModal").on("show.bs.modal",function(){var b=$("#license_key_list_product_id").val();var a={product_id:b};a[csfr_token_name]=$.cookie(csfr_cookie_name);$.ajax({type:"POST",url:base_url+"product_controller/refresh_license_keys_list",data:a,success:function(c){document.getElementById("response_license_key").innerHTML=c}})});$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip()});$(document).on("change","#ckMultifileupload",function(){var d=document.getElementById("ckMultifileupload");if(typeof(FileReader)!="undefined"){var c=document.getElementById("ckMultidvPreview");c.innerHTML="";var f=/^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;for(var b=0;b<d.files.length;b++){var a=d.files[b];var e=new FileReader();e.onload=function(g){var h=document.createElement("IMG");h.src=g.target.result;h.id="Multifileupload_image";c.appendChild(h);$("#Multifileupload_button").show()};e.readAsDataURL(a)}}else{alert("This browser does not support HTML5 FileReader.")}});
	$('#form-product-filters input[name=form_lang_base_url]').remove();
    $('#form-product-filters input[name=lang_folder]').remove();
</script>
<script>
	

		
  var baseurl = '<?php echo lang_base_url(); ?>';
//add remove user favorites
function add_remove_user_favorites(user_id) {
    var data = {
        user_id: user_id
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);
    $.ajax({
        type: "POST",
        url: base_url + "product_controller/add_remove_user_favorites",
        data: data,
        success: function (response) {
            var cls = document.getElementById("favorite").className, count = document.getElementById("cnt");
            <?php $like = get_user_favorited_count($user->id); if (is_user_in_favorites($user->id) == true){ $p_like = 1; $p_lik = 0; }else{ $p_like = (0); $p_lik = (-1); } ?>
            if (cls == 'icon-heart') {
                $('#favorite').attr('class', 'icon-heart-o');
                count.innerHTML = 'Likes (<?php echo $like - $p_like; ?>)';
                $('#cnt').css('color', '#666;');
            }else{
                $('#favorite').attr('class', 'icon-heart');
                count.innerHTML = 'Likes (<?php echo $like - $p_lik; ?>)';
                $('#cnt').css('color', '#f86923;');
                var unliked = document.getElementById("unfavorite").getAttribute("src");
                if (unliked == baseurl + 'assets/img/dislike2.png'){ add_remove_user_unfavorites('<?php echo $user->id; ?>'); }
            }
        }
    });
}


//add remove user unfavorites
function add_remove_user_unfavorites(user_id) {
    var data = {
        user_id: user_id
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);
    $.ajax({
        type: "POST",
        url: base_url + "product_controller/add_remove_user_unfavorites",
        data: data,
        success: function (response) {
            var uncls = document.getElementById("unfavorite").getAttribute("src"), uncount = document.getElementById("uncnt");
            <?php $unlike = get_user_unfavorited_count($user->id); if (is_user_in_unfavorites($user->id) == true){ $p_unlike = 1; $p_unlik = 0; }else{ $p_unlike = (0); $p_unlik = (-1); } ?>
            if (uncls == baseurl + 'assets/img/dislike2.png') {
                $('#unfavorite').attr('src', baseurl + 'assets/img/dislikes.png');
                uncount.innerHTML = 'Dislikes (<?php echo $unlike - $p_unlike; ?>)';
                $('#uncnt').css('color', '#666;');
            }else{
                $('#unfavorite').attr('src', baseurl + 'assets/img/dislike2.png');
                uncount.innerHTML = 'Dislikes (<?php echo $unlike - $p_unlik; ?>)';
                $('#uncnt').css('color', '#f86923;');
                var liked =  document.getElementById("favorite").className;
                if (liked == 'icon-heart'){ add_remove_user_favorites('<?php echo $user->id; ?>'); }
            }
        }
    });
}





//add remove user favorites
function add_remove_user_favorites2(user_id) {
    var data = {
        user_id: user_id
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);
    $.ajax({
        type: "POST",
        url: base_url + "product_controller/add_remove_user_favorites",
        data: data,
        success: function (response) {
            var cls = document.getElementById("favorite2").className, count = document.getElementById("cnt2");
            <?php $like = get_user_favorited_count($user->id); if (is_user_in_favorites($user->id) == true){ $p_like = 1; $p_lik = 0; }else{ $p_like = (0); $p_lik = (-1); } ?>
            if (cls == 'icon-heart') {
                $('#favorite2').attr('class', 'icon-heart-o');
                count.innerHTML = 'Likes (<?php echo $like - $p_like; ?>)';
                $('#cnt2').css('color', '#666;');
            }else{
                $('#favorite2').attr('class', 'icon-heart');
                count.innerHTML = 'Likes (<?php echo $like - $p_lik; ?>)';
                $('#cnt2').css('color', '#f86923;');
                var unliked = document.getElementById("unfavorite2").getAttribute("src");
                if (unliked == baseurl + 'assets/img/dislike2.png'){ add_remove_user_unfavorites2('<?php echo $user->id; ?>'); }
            }
        }
    });
}


//add remove user unfavorites
function add_remove_user_unfavorites2(user_id) {
    var data = {
        user_id: user_id
    };
    data[csfr_token_name] = $.cookie(csfr_cookie_name);
    $.ajax({
        type: "POST",
        url: base_url + "product_controller/add_remove_user_unfavorites",
        data: data,
        success: function (response) {
            var uncls = document.getElementById("unfavorite2").getAttribute("src"), uncount = document.getElementById("uncnt2");
            <?php $unlike = get_user_unfavorited_count($user->id); if (is_user_in_unfavorites($user->id) == true){ $p_unlike = 1; $p_unlik = 0; }else{ $p_unlike = (0); $p_unlik = (-1); } ?>
            if (uncls == baseurl + 'assets/img/dislike2.png') {
                $('#unfavorite2').attr('src', baseurl + 'assets/img/dislikes.png');
                uncount.innerHTML = 'Dislikes (<?php echo $unlike - $p_unlike; ?>)';
                $('#uncnt2').css('color', '#666;');
            }else{
                $('#unfavorite2').attr('src', baseurl + 'assets/img/dislike2.png');
                uncount.innerHTML = 'Dislikes (<?php echo $unlike - $p_unlik; ?>)';
                $('#uncnt2').css('color', '#f86923;');
                var liked =  document.getElementById("favorite2").className;
                if (liked == 'icon-heart'){ add_remove_user_favorites2('<?php echo $user->id; ?>'); }
            }
        }
    });
}





</script>
<?php echo $general_settings->google_adsense_code; ?>
<?php echo $general_settings->google_analytics; ?>
</body>
</html>