<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<?php if ($user->role != 'member'): ?>
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
                <!-- include message block -->
                <?php $this->load->view('partials/_messages'); ?>
                <div class="profile-tab-content">
                    <div id="user-review-result" class="user-reviews">
                        <!-- form start -->
                        <?php echo form_open('home_controller/send_report'); ?>
                            <?php if (auth_check()): ?>
                                <input type="hidden" name="sender_id" id="message_sender_id" value="<?php echo $this->auth_user->id; ?>">
                                <input type="hidden" name="receiver_id" id="message_receiver_id" value="<?php echo $user->id; ?>">
                                <input type="hidden" id="message_send_em" value="<?php echo $user->send_email_new_message; ?>">
                            <?php endif; ?>
                            <div class="modal-header">
                                <h4 class="title"><?php echo ("Report Store"); ?></h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo trans("subject"); ?></label>
                                            <input type="text" name="subject" id="message_subject" value="<?php echo 'Report ' . get_shop_name($user); ?>" class="form-control form-input" placeholder="<?php echo trans("subject"); ?>" required>
                                        </div>
                                        <div class="form-group m-b-sm-0">
                                            <label class="control-label"><?php echo ("Report"); ?></label>
                                            <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="<?php echo ("Write a report"); ?>" required></textarea>
                                        </div>
                                        <?php if (auth_check()): ?>
                                        <button type="submit" class="btn btn-md btn-custom"><i class="icon-send"></i>&nbsp;<?php echo trans("send"); ?></button>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                            <a class="btn btn-md btn-custom" href="javascript:void(0)" data-toggle="modal" data-target="#loginModal"><i class="icon-send"></i>&nbsp;<?php echo trans("send"); ?></a>
                                        <?php endif; ?>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- form end -->
                    </div>

                    <div class="row-custom">
                        <!--Include banner-->
                        <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "profile", "class" => "m-t-30"]); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Wrapper End-->
<?php else: ?>
    <div id="wrapper">
    <div class="container" style="width: auto;">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo ("Report Shop"); ?></li>
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
                <!-- include message block -->
                <?php $this->load->view('partials/_messages'); ?>
                <div class="profile-tab-content">
                    <div id="user-review-result" class="user-reviews">
                        <!-- form start -->
                        <?php echo form_open('home_controller/send_report'); ?>
                            <?php if (auth_check()): ?>
                                <input type="hidden" name="sender_id" id="message_sender_id" value="<?php echo $this->auth_user->id; ?>">
                                <input type="hidden" name="receiver_id" id="message_receiver_id" value="<?php echo $user->id; ?>">
                                <input type="hidden" id="message_send_em" value="<?php echo $user->send_email_new_message; ?>">
                            <?php endif; ?>
                            <div class="modal-header">
                                <h4 class="title"><?php echo ("Report Store"); ?></h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo trans("subject"); ?></label>
                                            <input type="text" name="subject" id="message_subject" value="<?php echo 'Report ' . get_shop_name($user); ?>" class="form-control form-input" placeholder="<?php echo trans("subject"); ?>" required>
                                        </div>
                                        <div class="form-group m-b-sm-0">
                                            <label class="control-label"><?php echo ("Report"); ?></label>
                                            <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="<?php echo ("Write a report"); ?>" required></textarea>
                                        </div>
                                        <?php if (auth_check()): ?>
                                        <button type="submit" class="btn btn-md btn-custom"><i class="icon-send"></i>&nbsp;<?php echo trans("send"); ?></button>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                            <a class="btn btn-md btn-custom" href="javascript:void(0)" data-toggle="modal" data-target="#loginModal"><i class="icon-send"></i>&nbsp;<?php echo trans("send"); ?></a>
                                        <?php endif; ?>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- form end -->
                    </div>

                    <div class="row-custom">
                        <!--Include banner-->
                        <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "profile", "class" => "m-t-30"]); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php endif ?>
<!-- include send message modal -->
<?php $this->load->view("partials/_modal_send_message", ["subject" => null, "product_id" => null]); ?>

<?php $this->load->view("partials/_modal_review_shop"); ?>

