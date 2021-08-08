<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>

                <h1 class="page-title"><?php echo trans("settings"); ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <!-- load profile nav -->
                    <?php $this->load->view("settings/_setting_tabs"); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="row-custom">
                    <div class="profile-tab-content">
                        <!-- include message block -->
                        <?php $this->load->view('partials/_messages'); ?>

                        <?php echo form_open_multipart("profile_controller/shop_settings_post"); ?>
                        <div class="form-group">
                            <label class="control-label"><?php echo trans("shop_name"); ?></label>
                            <input type="text" name="shop_name" class="form-control form-input" value="<?php echo html_escape($user->shop_name); ?>" placeholder="<?php echo trans("shop_name"); ?>" maxlength="<?php echo $this->username_maxlength; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo trans("shop_description"); ?></label>
                            <textarea name="about_me" class="form-control form-textarea" placeholder="<?php echo trans("shop_description"); ?>"><?php echo html_escape($user->about_me); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo ("Business Mark"); ?></label>
                            <p>
                                 <a class='btn btn-success btn-sm btn-file-upload'>
                                    <?php echo trans('select_image'); ?>
                                    <input type="file" name="watermark_image" size="40" accept=".png" onchange="$('#upload-file-info4').html($(this).val().replace(/.*[\/\\]/, ''));">
                                </a>
                                <b>unique image type (.png) </b> - <i style="padding-right: 10px;"> This mark will be stamped on all your products</i>
                                <span class='label label-info' id="upload-file-info4"></span>
                            </p>
                            <p>
                                <img src="<?php echo base_url() . $user->watermark_image_large; ?>" alt=""  style="max-width: 300px; max-height: 300px; background-color: #ccc;padding: 5px;">
                            </p>
                            <?php if (!empty($user->watermark_image_large)): ?>
                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-profile-option" onclick="delete_mark(<?php echo $user->id; ?>,'<?php echo ("Are you sure you want to remove this mark?"); ?>');"><i class="icon-trash"></i>&nbsp;<?php echo ("Remove Mark"); ?></a>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo ("Shop Banner"); ?></label>
                            <p>
                                <a class='btn btn-md btn-secondary btn-file-upload'>
                                    <?php echo ('Upload Banner'); ?>
                                    <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info').html($(this).val().replace(/.*[\/\\]/, ''));">
                                </a>
                                <b>Upload Your Business Banner</b> - <i style="padding-right: 10px;"> banner size (1200 x 410)</i>
                                <span class='badge badge-info' id="upload-file-info"></span>
                            </p>
                            <p>
                                <img src="<?php echo get_shop_avatar($user); ?>" alt="<?php echo $user->username; ?>" class="form-avatar" style="width: 100%; height: 100%">
                            </p>
                            <?php if (!empty($user->banner)): ?>
                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-profile-option" onclick="delete_banner(<?php echo $user->id; ?>,'<?php echo ("Are you sure you want to delete this banner?"); ?>');"><i class="icon-trash"></i>&nbsp;<?php echo ("Remove Banner"); ?></a>
                            <?php endif;?>
                        </div>

                        <?php if ($this->general_settings->rss_system == 1): ?>
                            <div class="form-group m-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="control-label"><?php echo trans('rss_feeds'); ?></label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12 col-option">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="show_rss_feeds" value="1" id="rss_system_1" class="custom-control-input" <?php echo ($user->show_rss_feeds == 1) ? 'checked' : ''; ?>>
                                            <label for="rss_system_1" class="custom-control-label"><?php echo trans("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12 col-option">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="show_rss_feeds" value="0" id="rss_system_2" class="custom-control-input" <?php echo ($user->show_rss_feeds != 1) ? 'checked' : ''; ?>>
                                            <label for="rss_system_2" class="custom-control-label"><?php echo trans("disable"); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="show_rss_feeds" value="<?php echo $user->show_rss_feeds; ?>">
                        <?php endif; ?>

                        <div class="form-group m-t-10">
                            <div class="row">
                                <div class="col-12">
                                    <label class="control-label"><?php echo trans('send_email_item_sold'); ?></label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-12 col-option">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="send_email_when_item_sold" value="1" id="send_email_when_item_sold_1" class="custom-control-input" <?php echo ($user->send_email_when_item_sold == 1) ? 'checked' : ''; ?>>
                                        <label for="send_email_when_item_sold_1" class="custom-control-label"><?php echo trans("enable"); ?></label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-12 col-option">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="send_email_when_item_sold" value="0" id="send_email_when_item_sold_2" class="custom-control-input" <?php echo ($user->send_email_when_item_sold != 1) ? 'checked' : ''; ?>>
                                        <label for="send_email_when_item_sold_2" class="custom-control-label"><?php echo trans("disable"); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" value="update" class="btn btn-md btn-custom"><?php echo trans("save_changes") ?></button>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->

