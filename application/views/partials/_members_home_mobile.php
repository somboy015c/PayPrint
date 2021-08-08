<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php if ($member->role != 'member'): ?>


                            <a href="<?php echo lang_base_url(); ?>profile/<?php echo $member->slug; ?>">
                                <div class="member-list-item" style="min-height: 138px;display: table;width: 100%;padding: 5px 5px 5px;box-sizing: border-box;color: #676b6d;font-size: 14px;line-height: 19px;border: 1px solid rgba(182, 180, 180, .25);background: #fff;color: #676b6d;transition: box-shadow 0.25s ease;margin-bottom: 18px;box-shadow: 0px 1px 5px 0px rgba(210, 200, 200, .5); border-radius: 6px;">
                                    
                                    <div class="row-custom" style="width: 100%; margin-bottom: 10px;">
                                        
                                            <img src="<?php echo get_shop_avatar($member); ?>" alt="<?php echo get_shop_name($member); ?>"style=" border-top-left-radius: 6px; border-top-right-radius: 6px; vertical-align: middle;width: 100%; height: 100%;">
                                        
                                    </div>
                                    <div class="row-custom pdp" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="row-custom">
                                            <label class="" style="font-size: 18px; margin: 0px;"><p class="username" style=" margin: 0px; color: black;"><?php $num_len = strlen(get_shop_name($member)); if ($num_len > 19) {
                                            echo substr(get_shop_name($member), 0, 18) . "..";
                                            } else { echo get_shop_name($member);} ?>
                                                    <?php if ($member->role == 'vendor' || $member->role == 'admin'): ?>
                                                        <i class="icon-verified icon-verified-member" style="margin-left: 0px; float: none;"></i>
                                                    <?php endif; ?>
                                            </p></label>
                                        </div>
                                        <div class="row-custom">
                                            <div class="" style="float: left;margin-top: 4px;">
                                                <?php if ($general_settings->user_reviews == 1): ?>
                                                    <div class="right profile-rating">
                                                        <?php $rew_count = get_user_review_count($member->id);
                                                        if ($rew_count >= 0):?>
                                                          <!--stars-->
                                                          <?php $this->load->view('partials/_review_stars_mobile', ['review' => get_user_rating($member->id)]); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="" style="float: right;">
                                               <p  style=" font-size: 13px;margin-bottom: 3px;margin-top: 6px;"><span class="info"><i class="icon-map-marker"></i>&nbsp;<?php $num_len = strlen(get_location($member)); if ($num_len > 20) {
                                            echo substr(get_location($member), 0, 15) . "..";}else { echo get_location($member); } ?></span></p>
                                            </div>
                                        </div>
                                            

                                        <div class="row-custom">
                                            <?php $shop_cat = $this->category_model->get_category_by_slug(get_category($member->shop_category_id)->slug)->name . ' Store'; ?>
                                            <p  style=" font-size: 13px;margin-bottom: 7px;margin-top: 5px;"><?php $num_len = strlen($member->about_me); if ($num_len > 30) {
                                            echo substr(html_escape($member->about_me), 0, 29) . "..";}else { echo html_escape($member->about_me); } ?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>

<?php endif; ?>