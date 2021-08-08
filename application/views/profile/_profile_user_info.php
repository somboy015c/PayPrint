<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--user profile info-->
<?php if ($user->role == 'vendor' || $user->role == 'admin'): ?>











<div class="main-menu">
    <div class="row-custom">
         <div class="row-custom" style="border-bottom: 5px solid #dee1e4; padding-bottom: 5px;">
                    <img src="<?php echo get_shop_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>" style="max-height: 410px;max-width: 100%; border-radius: 6px">
         </div>
        <div class="profile-details" style="padding: 15px;">
            <div class="row-custom">
                <div class="right">
                <div class="row-custom row-profile-username">
                    <h1 class="username"><?php echo get_shop_name($user); ?></h1>
                    <?php if ($user->role == 'vendor' || $user->role == 'admin'): ?>
                        <i class="icon-verified icon-verified-member"></i>
                    <?php endif; ?>
                </div>
                </div>
                <div class="right" style="padding-left: 20px ">
                    <div class="profile-rating">
                            <!--stars-->
                            <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($user->id)]); ?>
                    </div>
                </div>
                <div class="row-custom user-contact" style="margin-bottom: 0px; padding: 0px;">
                    <span class="info"><?php echo trans("member_since"); ?>&nbsp;<?php echo helper_date_format($user->created_at); ?></span>
                    <?php if (!empty($user->phone_number) && $user->show_phone == 1): ?>
                        <span class="info"><i class="icon-phone"></i>
                            <a href="javascript:void(0)" id="show_phone_number"><?php echo trans("show"); ?></a>
                            <a href="tel:<?php echo html_escape($user->phone_number); ?>" id="phone_number" class="display-none"><?php echo html_escape($user->phone_number); ?></a>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($user->email) && $user->show_email == 1): ?>
                        <span class="info"><i class="icon-envelope"></i><?php echo html_escape($user->email); ?></span>
                    <?php endif; ?>
                    <?php if (!empty(get_location($user)) && $user->show_location == 1): ?>
                        <span class="info"><i class="icon-map-marker"></i><?php echo get_location($user) ?></span>
                    <?php endif; ?>
                </div>
                <div class="row-custom user-contact" style="margin: 0px; padding: 0px;">
                        <?php if (auth_check()): ?>
                            <?php if (user()->id != $user->id): ?>
                                <?php if ($user->role != "member"): ?>
                                <!--form follow-->
                                <?php echo form_open('profile_controller/follow_unfollow_user', ['class' => 'form-inline']); ?>
                                <input type="hidden" name="following_id" value="<?php echo $user->id; ?>">
                                <input type="hidden" name="follower_id" value="<?php echo user()->id; ?>">
                                <?php if (is_user_follows($user->id, user()->id)): ?>
                                    <button class="btn btn-md btn-outline-gray" style="margin-right: 5px; border-radius: 6px;"><i class="icon-user-minus"></i><?php echo trans("unfollow"); ?></button>
                                <?php else: ?>
                                    <button class="btn btn-md btn-outline-gray" style="margin-right: 5px; border-radius: 6px;"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php echo form_close(); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal" style="margin-right: 5px; border-radius: 6px;"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                        <?php endif; ?>
                    <label class="btn btn-sm btn-outline-gray btn-profile-option" style="border-radius: 6px; border: 0px; margin-top: 10px;"><?php echo trans("followers"); ?> <span class="count">(<?php echo get_followers_count($user->id); ?>)</span></label>
                    
                    <?php if (!auth_check() || (auth_check() && user()->id != $user->id)): ?>
                        <button class="btn btn-sm btn-outline-gray btn-profile-option" style="border-radius: 6px;" data-toggle="modal" data-target="#reviewModal"><i class="icon-star"></i><?php echo ("Rate Store"); ?></button>
                    <?php endif; ?>
                </div>


                <div class="right" style="margin: 0px; padding: 0px;">
                <div class="row-custom profile-buttons" style="margin: 0px; padding: 0px;">
                    <div class="buttons">
                        <?php if (auth_check()): ?>
                            <?php if (user()->id != $user->id): ?>
                                <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#messageModal"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                                <a class="btn btn-md btn-outline-gray"  href="<?php echo lang_base_url() . "reviews/" . $user->slug . '?vrw=report'; ?>"><i class="icon-logout"></i><?php echo 'Report Store'; ?></a>
                                <?php endif; ?>
                        <?php else: ?>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-logout"></i><?php echo 'Report Store'; ?></button>
                        <?php endif; ?>
                    </div>

                    <div class="social">
                        <ul>
                            <?php if (auth_check() && user()->id == $user->id): if (!$user->is_advert): ?>
                                <?php if ($user->is_advert_request == 1): ?>
                                    <label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i>&nbsp;<?php echo "Processing Advertisement "; ?></label>
                                <?php else: ?>
                                    <a href="<?php if ($user->role == 'member'){ $li = 'pending-products'; $ul = 'Work';}else{ $li = 'start-selling'; $ul = 'Shop';} echo lang_base_url() . $li . "?target=" . $ul; ?>" class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-plus"></i>&nbsp;<?php echo "Advertise " . $ul; ?></a>
                                <?php endif ?>
                            <?php else: ?>
                                <label class="btn btn-sm btn-outline-gray btn-profile-option"><i class="icon-circle"></i><?php echo ("Advertised"); ?>&nbsp;&nbsp;&nbsp;(<?php echo date_difference($user->advert_end_date, date('Y-m-d H:i:s')) . " " . trans("days_left"); ?>)</label>
                            <?php endif; endif; ?>
                            <?php if (!empty($user->facebook_url)): ?>
                                <li><a href="<?php echo $user->facebook_url; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->twitter_url)): ?>
                                <li><a href="<?php echo $user->twitter_url; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->instagram_url)): ?>
                                <li><a href="<?php echo $user->instagram_url; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->pinterest_url)): ?>
                                <li><a href="<?php echo $user->pinterest_url; ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->linkedin_url)): ?>
                                <li><a href="<?php echo $user->linkedin_url; ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->vk_url)): ?>
                                <li><a href="<?php echo $user->vk_url; ?>" target="_blank"><i class="icon-vk"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->youtube_url)): ?>
                                <li><a href="<?php echo $user->youtube_url; ?>" target="_blank"><i class="icon-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if ($this->general_settings->rss_system == 1 && $user->show_rss_feeds == 1 && get_user_products_count($user->slug) > 0): ?>
                                <li><a href="<?php echo lang_base_url() . "rss/seller/" . $user->slug; ?>" target="_blank"><i class="icon-rss"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                </div>

            <?php if (auth_check()): if ($user->id == user()->id && $user->role != 'admin'): ?>
            <div class="row">
                <?php if (date_difference($user->shop_end_date, date('Y-m-d H:i:s')) < 100): ?>
                    <div class="col-12 buttons" style="margin-top: 35px; padding-left: 0px;">
                        <?php if ($user->is_workshop == 1) {$req='workshop';} else {$req='';} echo form_open('product_controller/renew_shop'); ?>
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            <input type="hidden" name="req" value="<?php echo $req; ?>">
                            <button type="post" class="btn btn-sm btn-outline-red btn-profile-option" style="border-radius: 6px; margin-left: 30px;"><b><?php if ($user->role == 'member') { $d_l = date_difference($user->workshop_end_date, date('Y-m-d H:i:s')); $d_a = 'Payment due ' . time_ago($user->workshop_end_date); if ($d_l >= 1) { echo $d_l . " " . trans("days_left") . ", ";} else { echo $d_a  . ", ";} } else { $d_l = date_difference($user->shop_end_date, date('Y-m-d H:i:s')); $d_a = 'Payment due ' . time_ago($user->shop_end_date); if ($d_l >= 1) { echo $d_l . " " . trans("days_left") . ", ";} else { echo $d_a  . ", ";} } ?>Renew Payment</b></button>
                        <?php echo form_close(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; endif; ?>

            </div>

            <div class="right" style="vertical-align: middle;">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#shareModal"><img src="<?php echo base_url(); ?>assets/img/Shares.png" alt="share" style="width: 20%; height: 20%; "></a>
            </div>

        </div>
    </div>
</div>

















<div class="mobile-menu" style="padding-top: 0px;">
    <div class="row-custom">
         <div class="row-custom">
            <img src="<?php echo get_shop_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>" style="max-height: 410px;max-width: 100%; border-radius: 6px">
         </div>
        <div class="profile-details" style="padding: 10px 5px 0px 5px;">
            <div class="row-custom">


                <div class="col-sm-12 col-md-12" style="margin: 0px; padding: 0px;">
                    <div class="row-custom row-profile-username" style="margin-top: 0px;">
                        <h1 class="username" style="font-size: 16px; <?php if ($user->role != 'vendor' && $user->role != 'admin'){echo 'padding-right: 15px;';} ?>"><?php echo get_shop_name($user); ?></h1>
                        <?php if ($user->role == 'vendor' || $user->role == 'admin'): ?>
                            <i class="icon-verified icon-verified-member" style="padding-right: 15px;"></i>
                        <?php endif; ?>
                       
                        <div class="username btn profile-rating" style="padding: 0px 0px 4px 0px;">
                            <!--stars-->
                            <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($user->id)]); ?>
                        </div>


                        <?php if (!auth_check() || (auth_check() && user()->id != $user->id)): ?>
                            <button class="username btn btn-sm btn-outline-gray btn-profile-option" style="border-radius: 6px; font-size: 11px;line-height: 20px; padding: 3px 6px 3px 6px;" data-toggle="modal" data-target="#reviewModal"><i class="icon-star"></i><?php echo ("Rate Store"); ?></button>
                        <?php endif; ?>


                    </div>
                </div>

                <div class="col-sm-12 col-md-12" style="margin: 0px; padding: 0px;">
                    <div class="row-custom row-profile-username" style="margin-top: 0px; color: #666; font-size: 12px;">
                        <span class="info" style="padding-right: 10px;"><?php echo trans("member_since"); ?>&nbsp;<?php echo helper_date_format($user->created_at); ?></span>
                        <?php if (!empty($user->phone_number) && $user->show_phone == 1): ?>
                            <span class="info" style="padding-right: 10px;"><i class="icon-phone"></i>&nbsp;
                                <a href="javascript:void(0)" id="show_phone_number2"><?php echo trans("show"); ?></a>
                                <a href="tel:<?php echo html_escape($user->phone_number); ?>" id="phone_number2" class="display-none"><?php echo html_escape($user->phone_number); ?></a>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($user->email) && $user->show_email == 1): ?>
                            <span class="info" style="padding-right: 10px;"><i class="icon-envelope"></i> &nbsp;<?php echo html_escape($user->email); ?></span>
                        <?php endif; ?>
                        <?php if (!empty(get_location($user)) && $user->show_location == 1): ?>
                            <span class="info" style="padding-right: 10px;"><i class="icon-map-marker"></i> &nbsp;<?php echo get_location($user) ?></span>
                        <?php endif; ?>
                    </div>
                </div>








                <div class="row-custom user-contact" style="margin: 0px; padding: 0px;">
                    <label class="btn btn-sm btn-outline-gray btn-profile-option" style="border-radius: 6px; border: 0px; margin-right: 5px; margin-bottom: 0px;font-size: 11px; padding: 3px 6px 3px 0px;"><?php echo trans("followers"); ?> <span class="count">(<?php echo get_followers_count($user->id); ?>)</span></label>
                    
                    
                    <?php if (auth_check()): ?>
                        <?php if (user()->id != $user->id): ?>
                            <?php if ($user->role != "member"): ?>
                            <!--form follow-->
                            <?php echo form_open('profile_controller/follow_unfollow_user', ['class' => 'form-inline']); ?>
                            <input type="hidden" name="following_id" value="<?php echo $user->id; ?>">
                            <input type="hidden" name="follower_id" value="<?php echo user()->id; ?>">
                            <?php if (is_user_follows($user->id, user()->id)): ?>
                                <button class="btn btn-md btn-outline-gray" style="margin-right: 5px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-user-minus"></i><?php echo trans("unfollow"); ?></button>
                            <?php else: ?>
                                <button class="btn btn-md btn-outline-gray" style="margin-right: 5px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php echo form_close(); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal" style="margin-right: 5px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                    <?php endif; ?>

                    <?php if (auth_check()): ?>
                        <?php if (user()->id != $user->id): ?>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#messageModal" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                            <a class="btn btn-md btn-outline-gray"  href="<?php echo lang_base_url() . "reviews/" . $user->slug . '?vrw=report'; ?>" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-logout"></i><?php echo 'Report Store'; ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                        <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-logout"></i><?php echo 'Report Store'; ?></button>
                    <?php endif; ?>

                    <?php if (auth_check() && user()->id == $user->id): if (!$user->is_advert): ?>
                        <?php if ($user->is_advert_request == 1): ?>
                            <label class="btn btn-sm btn-outline-gray btn-profile-option" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-circle"></i>&nbsp;<?php echo "Processing Advertisement "; ?></label>
                        <?php else: ?>
                            <a href="<?php if ($user->role == 'member'){ $li = 'pending-products'; $ul = 'Work';}else{ $li = 'start-selling'; $ul = 'Shop';} echo lang_base_url() . $li . "?target=" . $ul; ?>" class="btn btn-sm btn-outline-gray btn-profile-option" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-plus"></i>&nbsp;<?php echo "Advertise " . $ul; ?></a>
                        <?php endif ?>
                    <?php else: ?>
                        <label class="btn btn-sm btn-outline-gray btn-profile-option" style="margin-right: 10px; border-radius: 6px; font-size: 10px; padding: 3px 6px 3px 6px;"><i class="icon-circle"></i><?php echo ("Advertised"); ?>&nbsp;&nbsp;&nbsp;(<?php echo date_difference($user->advert_end_date, date('Y-m-d H:i:s')) . " " . trans("days_left"); ?>)</label>
                    <?php endif; endif; ?>

                    <a href="javascript:void(0)" data-toggle="modal" data-target="#shareModal"><img src="<?php echo base_url(); ?>assets/img/Shares.png" alt="share" style="width: 37px; height: 30px; padding-left: 10px;"></a>
                </div>


                <div class="right" style="margin: 0px; padding: 0px;">
                <div class="row-custom profile-buttons" style="margin: 0px; padding: 0px;">
                    <div class="social" style="margin-top: 8px;">
                        <ul >
                            <?php if (!empty($user->facebook_url)): ?>
                                <li><a href="<?php echo $user->facebook_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->twitter_url)): ?>
                                <li><a href="<?php echo $user->twitter_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->instagram_url)): ?>
                                <li><a href="<?php echo $user->instagram_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->pinterest_url)): ?>
                                <li><a href="<?php echo $user->pinterest_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->linkedin_url)): ?>
                                <li><a href="<?php echo $user->linkedin_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->vk_url)): ?>
                                <li><a href="<?php echo $user->vk_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-vk"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->youtube_url)): ?>
                                <li><a href="<?php echo $user->youtube_url; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if ($this->general_settings->rss_system == 1 && $user->show_rss_feeds == 1 && get_user_products_count($user->slug) > 0): ?>
                                <li><a href="<?php echo lang_base_url() . "rss/seller/" . $user->slug; ?>" target="_blank" style="width: 32px; height: 32px; font-size: 13px; line-height: 32px;"><i class="icon-rss"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                </div>

            <?php if (auth_check()): if ($user->id == user()->id && $user->role != 'admin'): ?>




            <div class="row"style="border: 0px solid #ffffff; padding: 10px 10px 10px 15px; font-size: 11px;">
                <div class="col-sm-12 col-md-6" style="background-color: #f8f9fa; border-bottom-left-radius: 6px;border-bottom-right-radius: 6px; padding-bottom: 5px;">
                    <div class="slide_progress">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="control-label" style="font-size: 12px;font-weight: 600; padding: 3px 30px 4px 0px; margin-bottom: 0px;"><?php echo "Shop&nbsp;Storage"; ?></label> 
                            <p class="mb-0 text-muted"><?php echo get_used_storage_percentage($user) . '%&nbsp;(' . get_used_storage($user->id) . ')&nbsp;of&nbsp;' . get_storage_space($user) . 'GB&nbsp;Used'; ?></p>
                        </div>
                        <div class="progress progress-md">
                            <div class="progress-bar bg-secondary" role="progressbar"style="width: <?php echo get_used_storage_percentage($user); ?>%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted"><?php echo get_left_storage_percentage($user) . '%&nbsp;(' . get_storage_left($user) .')&nbsp;Available'; ?></small>
                    </div>
                </div>

                <?php if (date_difference($user->shop_end_date, date('Y-m-d H:i:s')) < 100): ?>
                <div class="col-sm-12 col-md-6" style="margin-top: 25px;">
                    <?php if ($user->is_workshop == 1) {$req='workshop';} else {$req='';} echo form_open('product_controller/renew_shop'); ?>
                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                        <input type="hidden" name="req" value="<?php echo $req; ?>">
                        <button type="post" class="btn btn-sm btn-outline-red btn-profile-option" style="border-radius: 6px; margin-left: 0px;"><b style="font-size: 12px;"><?php if ($user->role == 'member') { $d_l = date_difference($user->workshop_end_date, date('Y-m-d H:i:s')); $d_a = 'Payment due ' . time_ago($user->workshop_end_date); if ($d_l >= 1) { echo $d_l . " " . trans("days_left") . ", ";} else { echo $d_a  . ", ";} } else { $d_l = date_difference($user->shop_end_date, date('Y-m-d H:i:s')); $d_a = 'Payment due ' . time_ago($user->shop_end_date); if ($d_l >= 1) { echo $d_l . " " . trans("days_left") . ", ";} else { echo $d_a  . ", ";} } ?>Renew Payment</b></button>
                    <?php echo form_close(); ?>
                </div>
                <?php endif; ?>
            </div>









            <?php endif; endif; ?>

            </div>


        </div>
    </div>
</div>
            
            





























<?php else: ?>










        <div class="row-custom">
        <div class="profile-details">
            <div class="left">
                <img src="<?php echo get_user_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>" class="img-profile">
            </div>
            <div class="right">
                <div class="row-custom row-profile-username">
                    <h1 class="username"><?php echo get_shop_name($user); ?></h1>
                    <?php if ($user->role == 'vendor' || $user->role == 'admin'): ?>
                        <i class="icon-verified icon-verified-member"></i>
                    <?php endif; ?>
                </div>
                <div class="row-custom">
                    <p class="p-last-seen">
                        <span class="last-seen <?php echo (is_user_online($user->last_seen)) ? 'last-seen-online' : ''; ?>"> <i class="icon-circle"></i> <?php echo trans("last_seen"); ?>&nbsp;<?php echo time_ago($user->last_seen); ?></span>
                    </p>
                </div>
                <?php if ($user->role == 'admin' || $user->role == 'vendor'): ?>
                    <div class="row-custom">
                        <p class="description">
                            <?php echo html_escape($user->about_me); ?>
                        </p>
                    </div>
                <?php endif; ?>
                 <label class="btn btn-sm btn-outline-gray btn-profile-option" style="border-radius: 6px;vertical-align: middle; border: 0px; margin-top: 10px;"><?php echo ("Visitors "); ?><span class="count">(<?php echo $user->hit; ?>)</span></label>
                <div class="profile-rating">

                            <!--stars-->
                            <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($user->id)]); ?></span>
                    </div>
                <div class="row-custom user-contact">
                    <span class="info"><?php echo trans("member_since"); ?>&nbsp;<?php echo helper_date_format($user->created_at); ?></span>
                    <?php if (!empty($user->phone_number) && $user->show_phone == 1): ?>
                        <span class="info"><i class="icon-phone"></i>
                            <a href="javascript:void(0)" id="show_phone_number"><?php echo trans("show"); ?></a>
                            <a href="tel:<?php echo html_escape($user->phone_number); ?>" id="phone_number" class="display-none"><?php echo html_escape($user->phone_number); ?></a>
                        </span>
                    <?php endif; ?>
                    <?php if (!empty($user->email) && $user->show_email == 1): ?>
                        <span class="info"><i class="icon-envelope"></i><?php echo html_escape($user->email); ?></span>
                    <?php endif; ?>
                    <?php if (!empty(get_location($user)) && $user->show_location == 1): ?>
                        <span class="info"><i class="icon-map-marker"></i><?php echo get_location($user) ?></span>
                    <?php endif; ?>
                </div>

                <div class="row-custom profile-buttons">
                    <div class="buttons">
                        <?php if (auth_check()): ?>
                            <?php if (user()->id != $user->id): ?>
                                <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#messageModal"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                                <!--form follow-->
                                <?php echo form_open('profile_controller/follow_unfollow_user', ['class' => 'form-inline']); ?>
                                <input type="hidden" name="following_id" value="<?php echo $user->id; ?>">
                                <input type="hidden" name="follower_id" value="<?php echo user()->id; ?>">
                                <?php if (is_user_follows($user->id, user()->id)): ?>
                                    <button class="btn btn-md btn-outline-gray"><i class="icon-user-minus"></i><?php echo trans("unfollow"); ?></button>
                                <?php else: ?>
                                    <button class="btn btn-md btn-outline-gray"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php echo form_close(); ?>
                        <?php else: ?>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-envelope"></i><?php echo trans("ask_question") ?></button>
                            <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i><?php echo trans("follow"); ?></button>
                        <?php endif; ?>
                    </div>

                    <div class="social">
                        <ul style="margin-right: 30px;">
                            <?php if (!empty($user->facebook_url)): ?>
                                <li><a href="<?php echo $user->facebook_url; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->twitter_url)): ?>
                                <li><a href="<?php echo $user->twitter_url; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->instagram_url)): ?>
                                <li><a href="<?php echo $user->instagram_url; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->pinterest_url)): ?>
                                <li><a href="<?php echo $user->pinterest_url; ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->linkedin_url)): ?>
                                <li><a href="<?php echo $user->linkedin_url; ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->vk_url)): ?>
                                <li><a href="<?php echo $user->vk_url; ?>" target="_blank"><i class="icon-vk"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($user->youtube_url)): ?>
                                <li><a href="<?php echo $user->youtube_url; ?>" target="_blank"><i class="icon-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if ($this->general_settings->rss_system == 1 && $user->show_rss_feeds == 1 && get_user_products_count($user->slug) > 0): ?>
                                <li><a href="<?php echo lang_base_url() . "rss/seller/" . $user->slug; ?>" target="_blank"><i class="icon-rss"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>











<?php endif ?>



<div class="modal fade" id="shareModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document">
            <div class="modal-content">
                <div class="auth-box">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    <h6 class="title" style="font-size: 15px;"><?php echo ("Share This Shop"); ?></h6>
                    <!-- form start -->
                    <div class="row-custom profile-buttons" style="margin-bottom: 25px;">
                        <div class="social">
                        <ul>
                            <li>
                                <a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo generate_profile_url($user); ?>', 'Share This Shop', 'width=640,height=450');return false">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="window.open('https://twitter.com/share?url=<?php echo generate_profile_url($user); ?>&amp;text=<?php echo html_escape(get_shop_name($user)); ?>', 'Share This Shop', 'width=640,height=450');return false">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?text=<?php echo html_escape(get_shop_name($user)); ?> - <?php echo generate_profile_url($user); ?>" target="_blank">
                                    <i class="icon-whatsapp"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo generate_profile_url($user); ?>&amp;media=<?php echo get_product_image($user->id, 'image_default'); ?>', 'Share This Shop', 'width=640,height=450');return false">
                                    <i class="icon-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo generate_profile_url($user); ?>', 'Share This Shop', 'width=640,height=450');return false">
                                    <i class="icon-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div></div>

                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>