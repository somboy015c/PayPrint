<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--featured categories-->
<div class="col-12">
    <div class="row featured-categories">
        <div class="col-3" style="padding-right: 2px; padding-left: 2px;">
            <?php $f_cat_1 = get_featured_category(1); ?>
            <?php if (!empty($f_cat_1)): ?>
                <div class="featured-category">
                    <div class="inner" style=" border-radius: 6px;">
                        <a href="<?php echo generate_category_url($f_cat_1) . '?drls=cat'; ?>">
                            <img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_category_image_url($f_cat_1, 'image_1') . '?drls=cat'; ?>" alt="<?php echo html_escape($f_cat_1->name); ?>" class="lazyload img-fluid" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
                            <div class="caption text-truncate" style="padding: 0px 10px; position: relative;">
                                <span><?php echo html_escape($f_cat_1->name); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>



        <div class="col-3" style="padding-right: 2px; padding-left: 2px;">
            <?php $f_cat_2 = get_featured_category(2); ?>
            <?php if (!empty($f_cat_2)): ?>
                <div class="featured-category">
                    <div class="inner" style=" border-radius: 6px;">
                        <a href="<?php echo generate_category_url($f_cat_2) . '?drls=cat'; ?>">
                            <img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_category_image_url($f_cat_2, 'image_1') . '?drls=cat'; ?>" alt="<?php echo html_escape($f_cat_2->name); ?>" class="lazyload img-fluid" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
                            <div class="caption text-truncate" style="padding: 0px 10px; position: relative;">
                                <span><?php echo html_escape($f_cat_2->name); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        

        <div class="col-3" style="padding-right: 2px; padding-left: 2px;">
            <?php $f_cat_3 = get_featured_category(3); ?>
            <?php if (!empty($f_cat_3)): ?>
                <div class="featured-category">
                    <div class="inner" style=" border-radius: 6px;">
                        <a href="<?php echo generate_category_url($f_cat_3) . '?drls=cat'; ?>">
                            <img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_category_image_url($f_cat_3, 'image_1') . '?drls=cat'; ?>" alt="<?php echo html_escape($f_cat_3->name); ?>" class="lazyload img-fluid" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
                            <div class="caption text-truncate" style="padding: 0px 10px; position: relative;">
                                <span><?php echo html_escape($f_cat_3->name); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        

        <div class="col-3" style="padding-right: 2px; padding-left: 2px;">
            <?php $f_cat_4 = get_featured_category(4); ?>
            <?php if (!empty($f_cat_4)): ?>
                <div class="featured-category">
                    <div class="inner" style=" border-radius: 6px;">
                        <a href="<?php echo generate_category_url($f_cat_4) . '?drls=cat'; ?>">
                            <img src="<?php echo $img_bg_product_small; ?>" data-src="<?php echo get_category_image_url($f_cat_4, 'image_1') . '?drls=cat'; ?>" alt="<?php echo html_escape($f_cat_4->name); ?>" class="lazyload img-fluid" onerror="this.src='<?php echo $img_bg_product_small; ?>'">
                            <div class="caption text-truncate" style="padding: 0px 10px; position: relative;">
                                <span><?php echo html_escape($f_cat_4->name); ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>



            


    </div>
</div>