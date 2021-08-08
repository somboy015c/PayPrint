<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($user->role == "member" && !empty($product->post_type)):?>



    <div class="widget-seller">
        <h4 class="sidebar-title"><?php echo ("Work Shop"); ?></h4>

        <div class="widget-content">
            <div class="left">
                <div class="user-avatar">
                    <a href="<?php echo lang_base_url() . 'profile/' . $product->user_slug; ?>">
                        <img src="<?php echo get_user_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>">
                    </a>
                </div>
            </div>
            <div class="right">
                <p>
                    <a href="<?php echo lang_base_url() . 'profile/' . $product->user_slug; ?>">
                        <span class="user"><?php echo get_shop_name($user) ?></span>
                    </a>
                </p>
                <p>
                    <span class="last-seen"> &nbsp;<?php $num_len = strlen(html_escape($user->about_me)); if ($num_len > 45) {echo substr(html_escape($user->about_me), 0, 45) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($user->about_me); } ?></span>
                </p>
                <?php if (!empty($user->phone_number) && $user->show_phone == 1): ?>
                    <p>
                    <span class="info"><i class="icon-phone"></i>
                        <a href="javascript:void(0)" id="show_phone_number"><?php echo trans("show"); ?></a>
                        <a href="tel:<?php echo html_escape($user->phone_number); ?>" id="phone_number" class="display-none"><?php echo html_escape($user->phone_number); ?></a>
                    </span>
                    </p>
                <?php elseif (!empty($user->email) && $user->show_email == 1): ?>
                    <p>
                        <span class="info"><i class="icon-envelope"></i><?php echo html_escape($user->email); ?></span>
                    </p>
                <?php endif; ?>

                <?php if (auth_check()): ?>
                    <?php if (user()->id != $user->id): ?>
                        <!--form follow-->
                        <?php echo form_open('profile_controller/follow_unfollow_user', ['class' => 'form-inline']); ?>
                        <input type="hidden" name="following_id" value="<?php echo $user->id; ?>">
                        <input type="hidden" name="follower_id" value="<?php echo user()->id; ?>">
                        <?php if (is_user_follows($user->id, user()->id)): ?>
                            <p class="m-t-5">
                                <button class="btn btn-md btn-outline-gray"><i class="icon-user-minus"></i>&nbsp;<?php echo trans("unfollow"); ?></button>
                            </p>
                        <?php else: ?>
                            <p class="m-t-5">
                                <button class="btn btn-md btn-outline-gray"><i class="icon-user-plus"></i>&nbsp;<?php echo trans("follow"); ?></button>
                            </p>
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="m-t-15">
                        <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i>&nbsp;<?php echo trans("follow"); ?></button>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($user_products)): ?>
            <div class="main-menu">
                <div class="more-from-seller">
                    <span class="title"> <?php echo ("More Works By"); ?>&nbsp;<?php echo get_shop_name($user); ?></span>
                    <div class="row">
                        <?php foreach ($user_products as $item): ?>
                            <div class="col-md-3 mb-4 col-sm-4 grid-item" style="padding: 5px;">
                                <div class="image_card">
                                    <div class="card_img_hover">
                                        <div class="card_info">
                                            <span class="card_date"><?php echo html_escape($item->title); ?></span>
                                        </div>

                                    </div>
                                    <div class="card_img" style="background-image: url('<?php echo get_product_image($item->id, 'image_small'); ?>');height: 150px;"></div>
                                    <a href="<?php echo generate_product_url($item); ?>">
                                        <div class="card_img_hover_sec" style="background-image: url('<?php echo get_product_image($item->id, 'image_small'); ?>');height: 150px;"></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="mobile-menu">
                <div class="more-from-seller">
                    <span class="title"> <?php echo ("More Works By"); ?>&nbsp;<?php echo get_shop_name($user); ?></span>
                    <div class="row">
                        <?php foreach ($user_products as $item): ?>
                            <div class="col-3" style="padding: 5px;">
                                <div class="image_card">
                                    <div class="card_img_hover">
                                        <div class="card_info">
                                            <span class="card_date"><?php echo html_escape($item->title); ?></span>
                                        </div>

                                    </div>
                                    <div class="card_img" style="background-image: url('<?php echo get_product_image($item->id, 'image_small'); ?>');height: 120px;"></div>
                                    <a href="<?php echo generate_product_url($item); ?>">
                                        <div class="card_img_hover_sec" style="background-image: url('<?php echo get_product_image($item->id, 'image_small'); ?>');height: 150px;"></div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>




<?php else: ?>





    <div class="widget-seller">
        <h4 class="sidebar-title"><?php echo ("Product Shop"); ?></h4>

        <div class="widget-content">
            <div class="left">
                <div class="user-avatar">
                    <a href="<?php echo lang_base_url() . 'profile/' . $product->user_slug; ?>">
                        <img src="<?php echo get_user_avatar($user); ?>" alt="<?php echo get_shop_name($user); ?>">
                    </a>
                </div>
            </div>
            <div class="right">
                <p>
                    <a href="<?php echo lang_base_url() . 'profile/' . $product->user_slug; ?>">
                        <span class="user"><?php echo get_shop_name($user) ?></span>
                    </a>
                </p>
                <p>
                    <span class="last-seen"> &nbsp;<?php $num_len = strlen(html_escape($user->about_me)); if ($num_len > 45) {echo substr(html_escape($user->about_me), 0, 45) . "..";} elseif ($num_len == 0) { echo "just opened.!";} else { echo html_escape($user->about_me); } ?></span>
                </p>
                <?php if (!empty($user->phone_number) && $user->show_phone == 1): ?>
                    <p>
                    <span class="info"><i class="icon-phone"></i>
                        <a href="javascript:void(0)" id="show_phone_number"><?php echo trans("show"); ?></a>
                        <a href="tel:<?php echo html_escape($user->phone_number); ?>" id="phone_number" class="display-none"><?php echo html_escape($user->phone_number); ?></a>
                    </span>
                    </p>
                <?php elseif (!empty($user->email) && $user->show_email == 1): ?>
                    <p>
                        <span class="info"><i class="icon-envelope"></i><?php echo html_escape($user->email); ?></span>
                    </p>
                <?php endif; ?>

                <?php if (auth_check()): ?>
                    <?php if (user()->id != $user->id): ?>
                        <!--form follow-->
                        <?php echo form_open('profile_controller/follow_unfollow_user', ['class' => 'form-inline']); ?>
                        <input type="hidden" name="following_id" value="<?php echo $user->id; ?>">
                        <input type="hidden" name="follower_id" value="<?php echo user()->id; ?>">
                        <?php if (is_user_follows($user->id, user()->id)): ?>
                            <p class="m-t-5">
                                <button class="btn btn-md btn-outline-gray"><i class="icon-user-minus"></i>&nbsp;<?php echo trans("unfollow"); ?></button>
                            </p>
                        <?php else: ?>
                            <p class="m-t-5">
                                <button class="btn btn-md btn-outline-gray"><i class="icon-user-plus"></i>&nbsp;<?php echo trans("follow"); ?></button>
                            </p>
                        <?php endif; ?>
                        <?php echo form_close(); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="m-t-15">
                        <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i>&nbsp;<?php echo trans("follow"); ?></button>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($user_products)): ?>
            <div class="more-from-seller">
                <span class="title"> <?php echo trans("more_products_by"); ?>&nbsp;<?php echo get_shop_name($user); ?></span>
                <div class="row">
                    <?php foreach ($user_products as $item): ?>
                        <div class="col-4 col-user-product">
                            <div class="user-product">
                                <a href="<?php echo generate_product_url($item); ?>">
                                    <img src="<?php echo get_product_image($item->id, 'image_small'); ?>" alt="<?php echo html_escape($item->title); ?>" class="img-fluid img-product">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>




<?php endif; ?>