<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo ('Send Email'); ?></h3>
            </div>
            <!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open('admin_controller/send_one_email_subscribers_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                <div class="form-group">
                    <label><?php echo ('Receiver'); ?></label>
                    <input type="text" name="receiver" class="form-control" value="<?php echo $mail; ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>
                <div class="form-group">
                    <label><?php echo trans('subject'); ?></label>
                    <input type="text" name="subject" class="form-control" value="<?php echo 'Reply To: ' .  $message; ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> required>
                </div>
                <div class="form-group">
                    <label><?php echo trans('content'); ?></label>
					<div class="row">
						<div class="col-sm-12 m-b-10">
							<button type="button" class="btn btn-sm bg-purple color-white btn_ck_add_image"><i class="icon-image"></i><?php echo trans("add_image"); ?></button>
						</div>
					</div>
                    <textarea id="ckEditor" name="message" class="form-control textarea-exp" required></textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('send_email'); ?></button>
                <button type="button" id="btn_email_preview" class="btn btn-warning pull-right m-r-10"><?php echo trans('preview'); ?></button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->

        </div>
        <!-- /.box -->
    </div>
</div>
