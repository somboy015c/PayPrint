<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper" style="background-color: #dee1e4; padding-top: 5px;">
    <div class="container" style="width: auto;">
        <div class="row"style="background-color: white; border-top-left-radius: 6px;border-top-right-radius: 6px; border: 4px solid #ffffff;  ">
            <div class="col-12"style="padding: 0px; margin: 0px">
                <div class="profile-page-top"style="padding: 0px; margin: 0px">
                    <!-- load profile details -->
                    <?php $this->load->view("profile/_profile_user_info"); ?>
                </div>
            </div>
        </div>

        <div class="row"style="background-color: #f8f9fa; border-bottom-left-radius: 6px;border-bottom-right-radius: 6px; border: 4px solid #ffffff;">
            <div class="col-sm-12 col-md-3"style="background-color: white;">
                <!-- load profile nav -->
                <?php $this->load->view("profile/_profile_tabs"); ?>
            </div>

            <div class="col-sm-12 col-md-9"style=" padding-top: 20px; border-radius: 6px;">
                <div class="profile-tab-content">
                    <label class="row" style="width: 100%; background-color: #d78057 !important;margin: 0px; border-top-right-radius: 4px; border-top-left-radius: 4px; margin-bottom: 25px;"><p style="font-size: 16px; color: white; margin: 10px;">Hidden products</p></label>
                    <?php if (auth_check() && user()->id == $user->id):
                        foreach ($products as $product):
                            $this->load->view('product/_product_item_profile', ['product' => $product, 'promoted_badge' => true]);
                        endforeach;
                    else: ?>
                        <div class="row row-product-items">
                            <!--print products-->
                            <?php foreach ($products as $product): ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                                    <?php $this->load->view('product/_product_item', ['product' => $product, 'promoted_badge' => true]); ?>
                                </div>
                            <?php endforeach; ?>
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
    </div>
</div>
<!-- Wrapper End-->

<!-- include send message modal -->
<?php $this->load->view("partials/_modal_send_message", ["subject" => null, "product_id" => null]); ?>

<?php $this->load->view("partials/_modal_review_shop"); ?>


