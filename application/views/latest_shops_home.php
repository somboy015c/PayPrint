 <?php if (!empty($my_location_id)): ?>
 <?php $memb_count = 0; foreach ($members as $member) { if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ) {$memb_count++;} } if ($memb_count > 0): ?>
                <div class="col-12 section section-promoted"style="background-color: #f8f9fa; border-radius: 6px; border: 4px solid #ffffff; padding: 0px;">


                    <label class="row" style="width: 100%; background-color: #dee1e4;margin: 0px; margin-bottom: 15px; border-top-right-radius: 4px; border-top-left-radius: 4px;"><h3 style="padding-top: 8px;">
                    <h3 class="col" style="margin: 6px;">&nbsp; <?php echo ("Latest shops"); ?></h3>
                    <span class="col" style="text-align: center; margin-bottom: 30px;color:#999;font-size: 15px;font-style: italic;font-family: 'Libre Baskerville',serif;margin: 10px;"><?php echo ("Top Rated Shops"); ?></span>
                    <div class="col text-right" style="margin: 10px;">
                        <a href="<?php echo lang_base_url() . "members"; ?>" class="link-see-more"><span><?php echo trans("see_more"); ?>&nbsp;</span><i class="icon-arrow-right"></i> &nbsp;   </a>
                    </div>
                    </label>
                    <div class="agile-trend-ads">
          
                                <div class="card-body">
                                    <div id="stats_slidert0" class="carousel slide slide_widget" data-ride="carousel" data-interval="0">
                                        
                                           
                                        <div class="carousel-inner">






                  <?php $memb_count = 0;  foreach ($members as $member) { if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ) {$memb_count++;} }  ?> 




                            <?php if ($memb_count >= 1) {?>
                            <div class="carousel-item active">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ):  $i++;?>
                                    <?php if ($i <= 3): ?>
                                        <div class="col-md-4 biseller-column">
                                        


        














                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>

















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>





                            <?php if ($memb_count >= 4) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ):  $i++;?>
                                    <?php if ($i <= 6 && $i > 3): ?>
                                        <div class="col-md-4 biseller-column">
                                        


















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>

















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>





                            <?php if ($memb_count >= 7) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ):  $i++;?>
                                    <?php if ($i <= 9 && $i > 7): ?>
                                        <div class="col-md-4 biseller-column">
                                        



















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>


















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>






                            <?php if ($memb_count >= 10) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ( ($member->role == "vendor") && ($my_location_id  == $member->country_id && get_country($my_location_id)->name ==  get_country($member->country_id)->name || $my_location_id == $member->state_id && get_state($my_location_id)->name == get_state($member->state_id)->name) ):  $i++;?>
                                    <?php if ($i <= 12 && $i > 10): ?>
                                        <div class="col-md-4 biseller-column">
                                        



















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>


















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>








                            
                                


















                                        </div>
                                        <a href="#stats_slidert0" role="button" data-slide="prev"><div class="nbs-flexisel-nav-left" style="top: 168.5px;"></div></a><a href="#stats_slidert0" role="button" data-slide="next"><div class="nbs-flexisel-nav-right" style="top: 168.5px;"></div></a>
                                    </div>
                                </div>
          </div>

                    <!-- promoted products -->

                    
                </div>




                <div class="col-12"style="background-color: #ffffff; border-radius: 6px; border: 4px solid #ffffff; padding: 0px;">
                <div class="row-custom row-bn" style="background-color: white;">
                    <!--Include banner-->
                    <div class="col-md-6"style="padding-left: 0px; padding-right: 3px;">
                    <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_1", "class" => ""]); ?>
                    </div>
                    <div class="col-md-6"style="padding-left: 3px; padding-right: 0px;">
                    <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_2", "class" => ""]); ?>
                    </div>
                </div>
            </div>




<?php endif; else: ?>
     <?php $memb_count = 0; foreach ($members as $member) {if ($member->role == 'vendor') {$memb_count++;} } if ($memb_count > 0): ?>
                <div class="col-12 section section-promoted"style="background-color: #f8f9fa; border-radius: 6px; border: 4px solid #ffffff; padding: 0px;">


                    <label class="row" style="width: 100%; background-color: #dee1e4;margin: 0px; margin-bottom: 15px; border-top-right-radius: 4px; border-top-left-radius: 4px;"><h3 style="padding-top: 8px;">
                    <h3 class="col" style="margin: 6px;">&nbsp; <?php echo ("Latest shops"); ?></h3>
                    <span class="col" style="text-align: center; margin-bottom: 30px;color:#999;font-size: 15px;font-style: italic;font-family: 'Libre Baskerville',serif;margin: 10px;"><?php echo ("Top Rated Shops"); ?></span>
                    <div class="col text-right" style="margin: 10px;">
                        <a href="<?php echo lang_base_url() . "members"; ?>" class="link-see-more"><span><?php echo trans("see_more"); ?>&nbsp;</span><i class="icon-arrow-right"></i> &nbsp;   </a>
                    </div>
                    </label>
                    <div class="agile-trend-ads">
          
                                <div class="card-body">
                                    <div id="stats_slidert0" class="carousel slide slide_widget" data-ride="carousel" data-interval="0">
                                        
                                           
                                        <div class="carousel-inner">






                  <?php $memb_count = 0;  foreach ($members as $member) {if ($member->role == 'vendor') {$memb_count++;} }  ?> 



                            <?php if ($memb_count >= 1) {?>
                            <div class="carousel-item active">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ($member->role == 'vendor'): $i++;?>
                                    <?php if ($i <= 3): ?>
                                        <div class="col-md-4 biseller-column">
                                        


        













                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>


















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>





                            <?php if ($memb_count >= 4) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ($member->role == 'vendor'):  $i++;?>
                                    <?php if ($i <= 6 && $i > 3): ?>
                                        <div class="col-md-4 biseller-column">
                                        



















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>

















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>





                            <?php if ($memb_count >= 7) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ($member->role == 'vendor'):  $i++;?>
                                    <?php if ($i <= 9 && $i > 6): ?>
                                        <div class="col-md-4 biseller-column">
                                        



















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>


















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>






                            <?php if ($memb_count >= 10) {?>
                            <div class="carousel-item">
                                <?php rsort($members); $i =0; foreach ($members as $member): ?>
                                <?php if ($member->role == 'vendor'):  $i++;?>
                                    <?php if ($i <= 12 && $i > 10): ?>
                                        <div class="col-md-4 biseller-column">
                                        



















                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; height: 100px; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom" style="padding-left: 10px;">
                                            <label class="right" style="font-size: 18px;"><p class="username"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 26) {
                                            echo substr(get_shop_name($member), 0, 25) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                            </p></label>                                            <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                       <label class="right" style="height: 2px; "> <i class="icon-verified icon-verified-member"></i></label>
                                                    <?php endif; ?>
                                                    <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>

                                                    <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($shop_cat); if ($num_len > 45) {
                                            echo substr(html_escape($shop_cat), 0, 45) . "..";}else { echo html_escape($shop_cat); } ?></p>
                                        <div class="row-custom" style="padding-bottom: 10px;">
                                            <div class="left">
                                                <label  style=" font-size: 13px;margin-top: 5px;"><?php $num_len = strlen(html_escape($member->about_me)); if ($num_len > 16) {
                                                echo substr(html_escape($member->about_me), 0, 16) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($member->about_me); } ?></label>
                                            </div>
                                            <div class="right">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>


















                                        

                                    </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php }  ?>








                            
                                


















                                        </div>
                                        <a href="#stats_slidert0" role="button" data-slide="prev"><div class="nbs-flexisel-nav-left" style="top: 168.5px;"></div></a><a href="#stats_slidert0" role="button" data-slide="next"><div class="nbs-flexisel-nav-right" style="top: 168.5px;"></div></a>
                                    </div>
                                </div>
          </div>

                    <!-- promoted products -->

                    
                </div>





                <div class="col-12"style="background-color: #ffffff; border-radius: 6px; border: 4px solid #ffffff; padding: 0px;">
                <div class="row-custom row-bn" style="background-color: white;">
                    <!--Include banner-->
                    <div class="col-md-6"style="padding-left: 0px; padding-right: 3px;">
                    <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_1", "class" => ""]); ?>
                    </div>
                    <div class="col-md-6"style="padding-left: 3px; padding-right: 0px;">
                    <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "index_2", "class" => ""]); ?>
                    </div>
                </div>
            </div>




                
<?php endif;  endif; ?>