<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<?php if ($user->role == "member"): ?>




<!-- Wrapper -->
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

            <div class="col-sm-12 col-md-9">
                <div class="profile-tab-content">
                    <?php foreach ($products as $product):
                        $this->load->view('product/_product_item_draft', ['product' => $product]);
                    endforeach; ?>
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




<?php else: ?>




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
                    <label class="row" style="width: 100%; background-color: #d78057 !important;margin: 0px; border-top-right-radius: 4px; border-top-left-radius: 4px; margin-bottom: 25px;"><p style="font-size: 16px; color: white; margin: 10px;">Drafts</p></label>
                    <?php foreach ($products as $product):
                        $this->load->view('product/_product_item_draft', ['product' => $product]);
                    endforeach; ?>
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


<?php endif; ?>
<?php $this->load->view("partials/_modal_send_message", ["subject" => null, "product_id" => null]); ?>

<?php $this->load->view("partials/_modal_review_shop"); ?>