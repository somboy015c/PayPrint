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
                            <label class="control-label"><?php echo ("Business&nbsp;Name"); ?></label><span style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo "&nbsp;(a&nbsp;short&nbsp;and&nbsp;precise&nbsp;name)"; ?></span>
                            <input type="text" name="shop_name" class="form-control form-input" value="<?php echo html_escape($user->shop_name); ?>" placeholder="<?php echo trans("shop_name"); ?>" maxlength="<?php echo $this->username_maxlength; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo ("Business&nbsp;Description"); ?></label>
                            <textarea name="about_me" class="form-control form-textarea" placeholder="<?php echo ("Business&nbsp;Description"); ?>"><?php echo html_escape($user->about_me); ?></textarea>
                        </div>

                        
                        <div class="form-group">
                            <label class="control-label"><?php echo ("Business&nbsp;Banner"); ?></label>
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
                                    <label class="control-label"><?php echo ('Send&nbsp;an&nbsp;email&nbsp;when&nbsp;a&nbsp;booking&nbsp;is&nbsp;completed'); ?></label>
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

















                        <div class="form-group"><br/>
                            <label class="control-label"><?php echo ('Business&nbsp;Branches:'); ?></label><br/><br/>
                            <?php if (count($stations) > 0): ?>
                                    <?php foreach ($stations as $station): ?> 
                                    <label style="background-color: #dee1e4; border-radius: 6px; margin-right: 10px; height: 25px; padding-left: 10px; padding-right: 5px;">
                                    <button type="button" class="close" data-toggle="modal" data-target="#delete_skills_Modal<?php echo $station->id; ?>" style="padding-right: 4px; padding-left: 4px;">×</button><i style=" vertical-align: middle; padding-right: 4px;"><?php echo $station->branch; ?></i></label>
                                            <div class="modal fade" id="delete_skills_Modal<?php echo $station->id; ?>" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered login-modal" role="document">
                                                    <div class="modal-content">
                                                        <?php echo form_open_multipart("profile_controller/delete_station"); ?>
                                                        <center><div class="auth-box">
                                                            <!-- form start -->
                                                            <img src="<?php echo base_url(); ?>assets/img/warning.jpg"><br/>
                                                            <span style="color: rgba(0,0,0,.64);">Are you sure you want to remove this branch?</span><br/>
                                                            <input type="hidden" name="delete_station" value="<?php echo $station->id; ?>">
                                                            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal" style="border-radius: 6px;6px; background-color: #efefef; margin-top: 10px; margin-right: 120px"><?php echo ('Cancel'); ?></button>
                                                            <button type="submit" class="btn btn-primary pull-right" style="border-radius: 6px; background-color: #17a2b8 !important; margin-top: 10px;"><?php echo ('Delete'); ?></button>
                                                            <!-- form end -->
                                                        </div></center>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach; ?>
                                <?php else:   ?>
                                    <label style=" color: #879099;"><?php echo ('You&nbsp;dont&nbsp;have&nbsp;a&nbsp;branch&nbsp;yet.!'); ?></label>
                                <?php endif; ?><br/><br/>

                                         <?php echo form_open_multipart("profile_controller/advertise_yourself_skills"); ?>

                                        <div class="form-box">
                                            <div class="form-box-head">
                                                <h4 class="title"><?php echo ('Add&nbsp;Branch'); ?></h4>
                                            </div>
                                            <div class="form-box-body">
                                                <div class="form-group">
                                                	<p class="images-exp" style="padding-bottom: 15px;"><i class="icon-exclamation-circle"></i>&nbsp;<?php echo "Note: The branch name will be the display location of your transportation service"; ?></p>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <input type="text" name="branch_name" class="form-control form-input" placeholder="<?php echo ("Branch&nbsp;Name"); ?>" maxlength="25" required>
                                                        </div>
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <div class="selectdiv">
                                                                    <select id="countries" name="country_id" class="form-control" onchange="get_states(this.value);" <?php echo ($form_settings->product_location_required == 1) ? 'required' : ''; ?>required>
                                                                        <option value=""><?php echo ('Branch&nbsp;Country'); ?></option>
                                                                        <?php foreach ($countries as $item): ?>
                                                                            <option value="<?php echo $item->id; ?>"<?php echo ($item->id == $country_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <div class="selectdiv">
                                                                <select id="states" name="state_id" class="form-control" onchange="get_cities(this.value);" <?php echo ($form_settings->product_location_required == 1) ? 'required' : ''; ?>required>
                                                                    <option value=""><?php echo ('Branch&nbsp;State'); ?></option>
                                                                    <?php
                                                                    if (!empty($states)):
                                                                        foreach ($states as $item): ?>
                                                                            <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $state_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                                                        <?php endforeach;
                                                                    endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <div class="selectdiv">
                                                                <select id="cities" name="city_id" class="form-control" onchange="update_product_map();"required>
                                                                    <option value=""><?php echo ('Branch&nbsp;City/L.G.A'); ?></option>
                                                                    <?php
                                                                    if (!empty($cities)):
                                                                        foreach ($cities as $item): ?>
                                                                            <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $city_id) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                                                        <?php endforeach;
                                                                    endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <input type="text" name="address" id="address_input" class="form-control form-input" value="<?php echo html_escape($address); ?>" placeholder="<?php echo ("Branch&nbsp;Address") ?>"required>
                                                        </div>

                                                        <div class="col-12 col-sm-4 m-b-15">
                                                            <input type="text" name="zip_code" id="zip_code_input" class="form-control form-input" value="<?php echo html_escape($zip_code); ?>" placeholder="<?php echo ("Branch&nbsp;Zip&nbsp;Code") ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="col-12 col-sm-4 m-b-15">
                                                           <button type="submit" class="btn btn-primary" style="text-align: center; border-radius: 6px;"><?php echo ('Add&nbsp;Branch'); ?></button>
                                                        </div>
                                            </div>
                                        </div>
                                <?php echo form_close(); ?>

                        </div>









                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->

