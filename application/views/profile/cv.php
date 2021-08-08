<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">
    <div class="container" style="width: auto;">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo trans("profile"); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="profile-page-top" style="padding: 0px; margin: 0px">
                    <!-- load profile details -->
                    <?php $this->load->view("profile/_profile_user_info"); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <!-- load profile nav -->
                <?php $this->load->view("profile/_profile_tabs"); ?>
            </div>
            <?php if (empty($reach)): ?>

            <div class="col-sm-12 col-md-9">
                <div class="profile-tab-content">
                    <?php if (auth_check() && user()->id == $user->id):
                        foreach ($products as $product): if (!empty($product->post_type)): 
                            $this->load->view('product/_product_item_profile', ['product' => $product, 'promoted_badge' => true]);
                        endif; endforeach;
                    else: ?>
                        <div class="row row-product-items row-product">
                            <!--print products-->
                            <?php foreach ($products as $product): if (!empty($product->post_type)): ?>
                                <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                                    <?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => true]); ?>
                                </div>
                            <?php endif; endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="product-list-pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                    <div class="row-custom">
                        <!--Include banner-->
                        <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "profile", "class" => "m-t-30"]); ?>
                    </div>
                </div>
            </div>

            <?php else: ?>

                <div class="col-sm-12 col-md-9" id="about" style="padding: 0px;">

                                <!-- include reviews -->
                                <div id="review-result">
                                   


                                    <div class="main-menu">
                                        <ul class="products" style="width: 100%; height: 45px; padding-left: 15px; margin-top: 10px; background-color: #dee1e4; margin-bottom: 0px; border-radius: 4px;"><div class="title-outer"><h3 class="entry-title-main" style=" font-size: 18px; padding-top: 11px;">About Workshop</h3></ul>

                                        <?php if (!empty($user->cv_about)): ?>
                                        <p style="padding: 10px 15px 0px 15px; text-align: justify; font-size: 15px;">
                                               <?php  echo html_escape($user->cv_about); ?>
                                        </p>
                                        <?php else: ?>
                                            <center><label style="padding-top: 40px; color: #879099;"><?php echo ('Nothing to display.!'); ?></label></center>
                                        <?php endif; ?>

                                        <h3 class="entry-title-main" style=" font-size: 18px; padding: 10px 15px 30px 15px;">Achievements:</h3>

                                        <div class="col-12">
                                            <div class="row" style="padding: 0px 15px 0px 15px;">
                                                <!--print blog slider posts-->
                                                
                                                <?php if (count($works) > 0):   ?>
                                                <?php foreach ($works as $work): ?> 
                                                    <div class="col-6 col-sm-6 col-md-3 col-lg-4">
                                                        <div class="product-image-preview">
                                                            <a class="image-popup lightbox" href="<?php echo base_url() . $work->work; ?>" data-effect="mfp-zoom-out" title="">
                                                                <img src="<?php echo base_url() . $work->work; ?>" alt="works" class="img-fluid" style="border-radius: 6px; height: 128px;" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobile-menu">
                                        <ul class="products" style="width: 100%; height: 40px; padding-left: 15px; margin-top: 8px; background-color: #dee1e4; margin-bottom: 0px; border-radius: 4px;"><div class="title-outer"><h3 class="entry-title-main" style=" font-size: 15px; padding-top: 9px;">About Workshop</h3></ul>

                                        <?php if (!empty($user->cv_about)): ?>
                                        <p style="padding: 10px 15px 0px 15px; text-align: justify; font-size: 13px;">
                                               <?php  echo html_escape($user->cv_about); ?>
                                        </p>
                                        <?php else: ?>
                                            <center><label style="padding-top: 30px; color: #879099;"><?php echo ('Nothing to display.!'); ?></label></center>
                                        <?php endif; ?>

                                        <h3 class="entry-title-main" style=" font-size: 15px; padding: 10px 15px 30px 15px;">Achievements:</h3>

                                        <div class="col-12">
                                            <div class="row" style="padding: 0px 15px 0px 15px;">
                                                <!--print blog slider posts-->
                                                
                                                <?php if (count($works) > 0):   ?>
                                                <?php foreach ($works as $work): ?> 
                                                    <div class="col-6 col-sm-6 col-md-3 col-lg-4">
                                                        <div class="product-image-preview">
                                                            <a class="image-popup lightbox" href="<?php echo base_url() . $work->work; ?>" data-effect="mfp-zoom-out" title="">
                                                                <img src="<?php echo base_url() . $work->work; ?>" alt="works" class="img-fluid" style="border-radius: 6px; height: 78px;" >
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>


                                 </div>
                            </div>

            <?php endif; ?>
    </div>
</div>

<?php $this->load->view("partials/_modal_send_message", ["subject" => null, "product_id" => null]); ?>

<?php $this->load->view("partials/_modal_review_shop"); ?>