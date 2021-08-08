<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
<?php if (!empty($general_settings->facebook_app_id)): ?>
	<div class="col-7" style="padding-right: 10px;">
    <a href="<?php echo base_url(); ?>connect-with-facebook" class="btn btn-social btn-social-facebook" style="border-radius: 6px; text-align: center;" >
        <i class="icon-facebook" style="margin-right: 10px;"></i><?php echo ("Facebook"); ?>
    </a>
	</div>
<?php endif; ?>
<?php if (!empty($general_settings->google_client_id)): ?>
	<div class="col-5" style="padding-left: 0px;">
    <a href="<?php echo base_url(); ?>connect-with-google" class="btn btn-social btn-social-google" style="border-radius: 6px; text-align: center;">
        <i class="icon-google" style="margin-right: 5px;"></i><?php echo ("Google"); ?>
    </a>
	</div>
<?php endif; ?>
</div>