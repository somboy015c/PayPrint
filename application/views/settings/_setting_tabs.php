<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>




<div class="main-menu">

    <div class="profile-tabs">
    <ul class="nav">
        <li class="nav-item <?php echo ($active_tab == 'update_profile') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings">
                <span><?php echo trans("update_profile"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'contact_informations') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/contact-informations">
                <span><?php echo trans("contact_informations"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'shipping_address') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shipping-address">
                <span><?php echo trans("shipping_address"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'payout settings') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>set-payout-account">
                <span><?php echo ("Payout Settings"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'social_media') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/social-media">
                <span><?php echo trans("social_media"); ?></span>
            </a>
        </li>

    <?php if ($user->role == 'member'): ?>
        <?php if ($user->is_workshop != 1): ?>
        <li class="nav-item <?php echo ($active_tab == 'own a shop') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling">
                <span><?php echo ("Open a shop"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling?req=workshop">
                <span><?php echo ("Open a Workshop"); ?></span>
            </a>
        </li>
        <?php else:?>
            <?php if ($user->is_workshop == 1 && $user->workshop_due != 1): ?>
                <li class="nav-item <?php echo ($active_tab == 'Advertise_yourself') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shop-settings">
                        <span><?php echo ("Workshop Settings"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'upload_works') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now?bully=work">
                        <span><?php echo ("Upload Works"); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($user->is_workshop == 1 && $user->workshop_due == 1): ?>
                <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
                    <?php echo form_open('product_controller/renew_shop'); ?>
                        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                        <input type="hidden" name="req" value="workshop">
                        <button type="post" class="btn nav-link btn-profile-option" style="width: 100%; text-align: left"><?php echo ("Renew Workshop Payment"); ?></button>
                    <?php echo form_close(); ?>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <li class="nav-item <?php echo ($active_tab == 'sell_now') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now">
                <span><?php echo trans("sell_now"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>pending-products">
                <span><?php echo ("Post advert"); ?></span>
            </a>
        </li>
    <?php else:?>
        <li class="nav-item <?php echo ($active_tab == 'Post product') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now">
                <span><?php if ($user->shop_due == 1){ echo trans("sell_now"); } else { echo ("Post product"); } ?></span>
            </a>
        </li>
        <?php if ($user->shop_due != 1): ?>
            <li class="nav-item <?php echo ($active_tab == 'fs_product') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now?pt=forsale">
                    <span><?php echo trans("sell_now"); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($active_tab == 'shop_settings') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shop-settings">
                    <span><?php echo trans("shop_settings"); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($user->shop_due == 1): ?>
            <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
                <?php echo form_open('product_controller/renew_shop'); ?>
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                    <input type="hidden" name="req" value="">
                    <button type="post" class="btn nav-link btn-profile-option" style="width: 100%; text-align: left"><?php echo ("Renew Shop Payment"); ?></button>
                <?php echo form_close(); ?>
            </li>
        <?php endif; ?>
        <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling">
                <span><?php echo ("Post advert"); ?></span>
            </a>
        </li>
    <?php endif; ?>
        <li class="nav-item <?php echo ($active_tab == 'verify') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/change-password?gv=verify">
                <span><?php echo ("Get Verified"); ?></span>
            </a>
        </li>
        <li class="nav-item <?php echo ($active_tab == 'change_password') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/change-password">
                <span><?php echo trans("change_password"); ?></span>
            </a>
        </li>
    </ul>
</div>
</div>




<div class="mobile-menu" style="padding: 0px;">
    <div class="span-sort-by product-sort-by" style=" float: none; ">

        <div class="profile-tabs">
            <ul class="nav">
                <li class="nav-item <?php echo ($active_tab == 'update_profile') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings">
                        <span><?php echo trans("update_profile"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'contact_informations') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/contact-informations">
                        <span><?php echo trans("contact_informations"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'shipping_address') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shipping-address">
                        <span><?php echo trans("shipping_address"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'payout settings') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>set-payout-account">
                        <span><?php echo ("Payout Settings"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'social_media') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/social-media">
                        <span><?php echo trans("social_media"); ?></span>
                    </a>
                </li>

            <?php if ($user->role == 'member'): ?>
                <?php if ($user->is_workshop != 1): ?>
                <li class="nav-item <?php echo ($active_tab == 'own a shop') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling">
                        <span><?php echo ("Open a shop"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling?req=workshop">
                        <span><?php echo ("Open a Workshop"); ?></span>
                    </a>
                </li>
                <?php else:?>
                    <?php if ($user->is_workshop == 1 && $user->workshop_due != 1): ?>
                        <li class="nav-item <?php echo ($active_tab == 'Advertise_yourself') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shop-settings">
                                <span><?php echo ("Workshop Settings"); ?></span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo ($active_tab == 'upload_works') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now?bully=work">
                                <span><?php echo ("Upload Works"); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($user->is_workshop == 1 && $user->workshop_due == 1): ?>
                        <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
                            <?php echo form_open('product_controller/renew_shop'); ?>
                                <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                <input type="hidden" name="req" value="workshop">
                                <button type="post" class="btn nav-link btn-profile-option" style="width: 100%; text-align: left"><?php echo ("Renew Workshop Payment"); ?></button>
                            <?php echo form_close(); ?>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item <?php echo ($active_tab == 'sell_now') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now">
                        <span><?php echo trans("sell_now"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>pending-products">
                        <span><?php echo ("Post advert"); ?></span>
                    </a>
                </li>
            <?php else:?>
                <li class="nav-item <?php echo ($active_tab == 'Post product') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now">
                        <span><?php if ($user->shop_due == 1){ echo trans("sell_now"); } else { echo ("Post product"); } ?></span>
                    </a>
                </li>
                <?php if ($user->shop_due != 1): ?>
                    <li class="nav-item <?php echo ($active_tab == 'fs_product') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo lang_base_url(); ?>sell-now?pt=forsale">
                            <span><?php echo trans("sell_now"); ?></span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($active_tab == 'shop_settings') ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/shop-settings">
                            <span><?php echo trans("shop_settings"); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($user->shop_due == 1): ?>
                    <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>">
                        <?php echo form_open('product_controller/renew_shop'); ?>
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            <input type="hidden" name="req" value="">
                            <button type="post" class="btn nav-link btn-profile-option" style="width: 100%; text-align: left"><?php echo ("Renew Shop Payment"); ?></button>
                        <?php echo form_close(); ?>
                    </li>
                <?php endif; ?>
                <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>start-selling">
                        <span><?php echo ("Post advert"); ?></span>
                    </a>
                </li>
            <?php endif; ?>
                <li class="nav-item <?php echo ($active_tab == 'verify') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/change-password?gv=verify">
                        <span><?php echo ("Get Verified"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'change_password') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>settings/change-password">
                        <span><?php echo trans("change_password"); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>



    <div class="btn-filter-products-mobile" style="background-color: transparent !important; float: none; border: 0px; margin-left: 0px;">







        <div class="col-12" style="padding: 0px;">
            <div class="nav-mobile-inner">
                <ul class="nav">
                    <div class="col-12"style="padding: 0px; margin: 0px;">
                        <div class="row-custom"style="padding: 0px; margin: 0px;">
                            <div id="blog-slider4" class="owl-carousel blog-slider" style="max-height: 40px; font-size: 12px; padding-top: 5px; overflow: hidden;">
                                        <!--print blog slider posts-->
                                        

















                                <li class="nav-item <?php echo ($active_tab == 'update_profile') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings" style="<?php if ($active_tab == 'update_profile') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Update&nbsp;Profile"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'contact_informations') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/contact-informations" style="<?php if ($active_tab == 'contact_informations') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Contact&nbsp;info."); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'shipping_address') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/shipping-address" style="<?php if ($active_tab == 'shipping_address') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("shipping&nbsp;add.."); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'payout settings') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>set-payout-account" style="<?php if ($active_tab == 'payout settings') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Payout&nbsp;Settings"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'social_media') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/social-media" style="<?php if ($active_tab == 'social_media') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Social&nbsp;Media"); ?></span>
                                    </a>
                                </li>

                            <?php if ($user->role == 'member'): ?>
                                <?php if ($user->is_workshop != 1): ?>
                                <li class="nav-item <?php echo ($active_tab == 'own a shop') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>start-selling" style="<?php if ($active_tab == 'own a shop') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Open&nbsp;a&nbsp;shop"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>start-selling?req=workshop" style="<?php if ($active_tab == 'Open a Workshop') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px; padding-left: 7px;">
                                        <span><?php echo ("Open&nbsp;a&nbsp;Workshop"); ?></span>
                                    </a>
                                </li>
                                <?php else:?>
                                    <?php if ($user->is_workshop == 1 && $user->workshop_due != 1): ?>
                                        <li class="nav-item <?php echo ($active_tab == 'Advertise_yourself') ? 'active' : ''; ?>" style="overflow: hidden;">
                                            <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/shop-settings" style="<?php if ($active_tab == 'Advertise_yourself') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                                <span><?php echo ("Workshop&nbsp;Sett.."); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item <?php echo ($active_tab == 'upload_works') ? 'active' : ''; ?>" style="overflow: hidden;">
                                            <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>sell-now?bully=work" style="<?php if ($active_tab == 'upload_works') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                                <span><?php echo ("Upload&nbsp;Works"); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($user->is_workshop == 1 && $user->workshop_due == 1): ?>
                                        <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>" style="overflow: hidden;">
                                            <?php echo form_open('product_controller/renew_shop'); ?>
                                                <input type="hidden" name="id" value="<?php echo $user->id; ?>" style="overflow: hidden;">
                                                <input type="hidden" name="req" value="workshop">
                                                <button type="post" class="nav-link btn btn-md btn-outline-gray" style="width: 100%; font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px; padding-left: 7px; text-align: left"><?php echo ("Renew&nbsp;Workshop"); ?></button>
                                            <?php echo form_close(); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <li class="nav-item <?php echo ($active_tab == 'sell_now') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>sell-now" style="<?php if ($active_tab == 'sell_now') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo trans("sell_now"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>pending-products" style="<?php if ($active_tab == 'Post_advert') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Post&nbsp;advert"); ?></span>
                                    </a>
                                </li>
                            <?php else:?>
                                <li class="nav-item <?php echo ($active_tab == 'Post product') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>sell-now" style="<?php if ($active_tab == 'Post product') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php if ($user->shop_due == 1){ echo trans("sell_now"); } else { echo ("Post&nbsp;product"); } ?></span>
                                    </a>
                                </li>
                                <?php if ($user->shop_due != 1): ?>
                                    <li class="nav-item <?php echo ($active_tab == 'fs_product') ? 'active' : ''; ?>" style="overflow: hidden;">
                                        <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>sell-now?pt=forsale" style="<?php if ($active_tab == 'fs_product') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                            <span><?php echo trans("sell_now"); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($active_tab == 'shop_settings') ? 'active' : ''; ?>" style="overflow: hidden;">
                                        <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/shop-settings" style="<?php if ($active_tab == 'shop_settings') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                            <span><?php echo ("Shop&nbsp;Settings"); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($user->shop_due == 1): ?>
                                    <li class="nav-item <?php echo ($active_tab == 'Open a Workshop') ? 'active' : ''; ?>" style="overflow: hidden;">
                                        <?php echo form_open('product_controller/renew_shop'); ?>
                                            <input type="hidden" name="id" value="<?php echo $user->id; ?>" style="overflow: hidden;">
                                            <input type="hidden" name="req" value="">
                                            <button type="post"  class="nav-link btn btn-md btn-outline-gray" style="width: 100%; font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px; text-align: left"><?php echo ("Renew&nbsp;Shop"); ?></button>
                                        <?php echo form_close(); ?>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item <?php echo ($active_tab == 'Post_advert') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>start-selling" style="<?php if ($active_tab == 'Post_advert') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Post&nbsp;advert"); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                                <li class="nav-item <?php echo ($active_tab == 'verify') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/change-password?gv=verify" style="<?php if ($active_tab == 'verify') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Get&nbsp;Verified"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'change_password') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>settings/change-password" style="<?php if ($active_tab == 'change_password') {echo 'border-bottom-color: red;';} ?> font-size: 10px; height: 31px; vertical-align: middle; padding-top: 7px;">
                                        <span><?php echo ("Change&nbsp;Pass.."); ?></span>
                                    </a>
                                </li>














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