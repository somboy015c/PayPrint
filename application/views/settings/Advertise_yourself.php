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










                        <h4 class="box-title" style="padding-bottom: 10px;"><?php echo 'Workshop settings'; ?></h4>






                        <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
                        <!-- include message block -->
                        <?php $this->load->view('partials/_messages'); ?>

            <!-- /.box-header -->

            <div class="box-body">


                        <div class="form-group">
                            <div class="col-sm-12" style="padding: 10px 30px 50px 30px;">
                                <?php echo form_open_multipart("profile_controller/advertise_yourself_about"); ?>
                                <div class="form-group">
                                    <label class="control-label"><?php echo ("Business&nbsp;Name"); ?></label><span style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo "&nbsp;(a&nbsp;short&nbsp;and&nbsp;precise&nbsp;name)"; ?></span>
                                    <input type="text" name="shop_name" class="form-control form-input" value="<?php echo html_escape($user->shop_name); ?>" placeholder="<?php echo trans("shop_name"); ?>" maxlength="<?php echo $this->username_maxlength; ?>">
                                </div>
                                <label class="control-label"><?php echo ('About Workshop'); ?></label>
                                <textarea class="form-control text-area-adspace" name="about_yourself" placeholder="<?php echo ('Write about your workshop'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> maxlength="1000"><?php echo html_escape($user->cv_about); ?></textarea>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                       <button type="submit" class="btn btn-warning pull-right" style="border-radius: 6px;"><?php echo ('Update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-sm-12" style="padding: 10px 30px 50px 30px;">
                                <label class="control-label"><?php echo ('Specialisations (Skills):'); ?></label><br/>
                                
                                <?php if (count($skills) > 0): ?>
                                <?php foreach ($skills as $skill): ?> 
                                <label style="background-color: white; border-radius: 6px; margin-right: 10px; height: 25px; padding-left: 10px; padding-right: 5px;">
                                <button type="button" class="close" data-toggle="modal" data-target="#delete_skills_Modal<?php echo $skill->id; ?>" style="padding-right: 4px; padding-left: 4px;">×</button><i style=" vertical-align: middle; padding-right: 4px;"><?php echo $skill->skill; ?></i></label>
                                        <div class="modal fade" id="delete_skills_Modal<?php echo $skill->id; ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered login-modal" role="document">
                                                <div class="modal-content">
                                                    <?php echo form_open_multipart("profile_controller/delete_skill"); ?>
                                                    <center><div class="auth-box">
                                                        <!-- form start -->
                                                        <img src="<?php echo base_url(); ?>assets/img/warning.jpg"><br/>
                                                        <span style="color: rgba(0,0,0,.64);">Are you sure you want to remove this skill?</span><br/>
                                                        <input type="hidden" name="delete_skill" value="<?php echo $skill->id; ?>">
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
                                    <label style=" color: #879099;"><?php echo ('You dont have a skill yet.!'); ?></label>
                                <?php endif; ?>
                                <br/><br/>
                                <?php echo form_open_multipart("profile_controller/advertise_yourself_skills"); ?>
                                <label class="control-label"><?php echo ('Add Skill'); ?></label>
                                <input type="text" class="form-control" name="add_skiil" placeholder="insert your aquired skill" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>required>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                       <button type="submit" class="btn btn-primary pull-right" style="border-radius: 6px;"><?php echo ('Add'); ?></button>
                                    </div>
                                </div>

                                <span class='label label-info' id="upload-file-info3"></span>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-sm-12" style="padding: 10px 30px 5px 30px;">
                                <?php echo form_open_multipart("profile_controller/advertise_yourself_watermark"); ?>
                                <div class="form-group">
                                    <label class="control-label"><?php echo ("Business Mark"); ?></label>
                                    <p>
                                         <a class='btn btn-success btn-sm btn-file-upload'>
                                            <?php echo trans('select_image'); ?>
                                            <input type="file" name="watermark_image" size="40" accept=".png" onchange="$('#upload-file-info4').html($(this).val().replace(/.*[\/\\]/, ''));">
                                        </a>
                                        <b>unique image type (.png) </b> - <i style="padding-right: 10px;"> This mark will be stamped on all your Works</i>
                                        <span class='label label-info' id="upload-file-info4"></span>
                                    </p>
                                    <p>
                                        <img src="<?php echo base_url() . $user->watermark_image_large; ?>" alt=""  style="max-width: 300px; max-height: 300px; background-color: #ccc;padding: 5px;">
                                    </p>
                                    <?php if (!empty($user->watermark_image_large)): ?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-profile-option" onclick="delete_mark(<?php echo $user->id; ?>,'<?php echo ("Are you sure you want to remove this mark?"); ?>');"><i class="icon-trash"></i>&nbsp;<?php echo ("Remove Mark"); ?></a>
                                    <?php endif;?>
                                </div>
                                <button type="submit" name="submit" value="update" class="btn btn-md btn-custom" style="border-radius: 6px; margin-bottom: 50px;"><?php echo ("Upload") ?></button>
                                <?php echo form_close(); ?>
                                <?php echo form_open_multipart("profile_controller/advertise_yourself_banner"); ?>
                                <div class="form-group">
                                    <label class="control-label"><?php echo ("Workshop Banner"); ?></label>
                                    <p>
                                        <a class='btn btn-md btn-secondary btn-file-upload'>
                                            <?php echo ('Upload Banner'); ?>
                                            <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info').html($(this).val().replace(/.*[\/\\]/, ''));">
                                        </a>
                                        <b>Upload Your Business Banner</b> - <i style="padding-right: 10px;"> banner size (1200 x 410)</i>
                                        <span class='badge badge-info' id="upload-file-info"></span>
                                    </p>
                                    <p>
                                        <img src="<?php echo get_wshop_avatar($user); ?>" alt="<?php echo $user->username; ?>" class="form-avatar" style="width: 100%; height: 100%">
                                    </p>
                                    <?php if (!empty($user->w_banner)): ?>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline-gray btn-profile-option" onclick="delete_banner(<?php echo $user->id; ?>,'<?php echo ("Are you sure you want to delete this banner?"); ?>');"><i class="icon-trash"></i>&nbsp;<?php echo ("Remove Banner"); ?></a>
                                    <?php endif;?>
                                </div>
                                <button type="submit" name="submit" value="update" class="btn btn-md btn-custom" style="border-radius: 6px;"><?php echo ("Upload") ?></button>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col-md-12" style="padding: 10px 30px 5px 30px;">
                                <label class="control-label"style="padding-top: 20px;"><?php echo ('Achievements:'); ?></label>
                                <div class="row">
                                <!--print blog slider posts-->
                                <?php if (count($works) > 0):   ?>
                                <?php foreach ($works as $work): ?>
                                <div class="col-md-3">
                                    <div class="product-image-preview">
                                        <button type="button" class="close" data-toggle="modal" data-target="#delete_work_Modal<?php echo $work->id; ?>">×</button>
                                            <img src="<?php echo base_url() . $work->work; ?>" alt="works" class="img-fluid" style="border-radius: 6px; height: 100px;" >
                                    </div>
                                </div>
                                        <div class="modal fade" id="delete_work_Modal<?php echo $work->id; ?>" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered login-modal" role="document">
                                                <div class="modal-content">
                                                    <?php echo form_open_multipart("profile_controller/delete_work"); ?>
                                                    <center><div class="auth-box">
                                                        <!-- form start -->
                                                        <img src="<?php echo base_url(); ?>assets/img/warning.jpg"><br/>
                                                        <span style="color: rgba(0,0,0,.64);">Are you sure you want to remove this work?</span><br/>
                                                        <input type="hidden" name="delete_work" value="<?php echo $work->id; ?>">
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
                                    <label style="padding-top: 40px;padding-left: 60px; color: #879099;"><?php echo ('You dont have any Achievement yet.!'); ?></label>
                                <?php endif; ?>
                            </div>
                            </div>
                            <div class="col-sm-12" style="padding: 10px 30px 5px 30px;">
                                <?php echo form_open_multipart("profile_controller/advertise_yourself_works"); ?>
                                <label class="control-label"style="padding-top: 57px;"><?php echo ('Upload Picture File of Your Achievements (Certs)'); ?></label>
                                <span style="display: block;width: 100%;font-size: 0.92rem;font-weight: 400;line-height: 1.5;color: #879099;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">


                                        <a class='btn bg-olive btn-sm btn-file-upload' style="background-color: red; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                            <?php echo ('Select image'); ?>
                                            <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info1').html($(this).val());"required>
                                        </a>


                                <textarea maxlength="0" style="height: 25px !important; width: 65% !important; border: hidden; vertical-align: middle;" id="upload-file-info1">Upload Image</textarea> </span>
                                <div class="row m-t-15">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-warning pull-right" style="border-radius: 6px;"><?php echo ('Upload'); ?></button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                            </div>
                            

                        </div>

                        

        </div>
        <!-- /.box -->
    </div>
</div>
<style>
    h4 {
        color: #0d6aad;
        text-align: left;
        font-weight: 600;
        margin-bottom: 15px;
        margin-top: 30px;
    }

    .row-ad-space {
        padding: 15px 0;
        background-color: #f7f7f7;
        margin-bottom: 45px;
    }

    .row-button {
        background-color: transparent !important;
        min-height: 60px;
    }

    textarea {
        height: 78px !important;
        resize: none;
    }

    .label-primary {
        font-size: 12px; color: red;
    }

    small {
        color: #333 !important;
    }
</style>

<?php if ($site_lang->text_direction == "rtl"): ?>

    <style>
        h4 {
            text-align: right;
        }
    </style>
<?php endif; ?>


                        <?php echo form_close(); ?>















                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->













