<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo ('Forsale message'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php foreach ($message as $item): ?>
                    <?php $conversation = $this->message_model->get_message_conversation($item->conversation_id); ?>
                    <div class="modal-header">
                    <?php foreach ($conversation as $conv): ?>
                        <h4 class="modal-title"><?php echo 'Conversation: ' . html_escape($conv->subject); ?></h4>
                    <?php endforeach; ?>
                    </div>
                    <h4 class="modal-title" style="padding-left: 15px; padding-top: 12px;"><?php echo 'Message: ' . $item->message; ?></h4>
                    <div class="modal-body">
                        <div class="table-order-status">
                            <div class="form-group">
                                <label class="control-label"><?php echo 'Sender: ' . get_user($item->sender_id)->username; ?></label><br/>
                                <label class="control-label"><?php echo 'Receiver: ' . get_user($item->receiver_id)->username; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer left" style="text-align: left;">
                        <div class="dropdown">
                            <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu options-dropdown">
                                <li>
                                    <?php echo form_open('admin_controller/approve_forsale_message'); ?>
                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                    <button type="submit"><i class="fa fa-check option-icon"></i><?php echo ('Approve'); ?></button>
                                    <?php echo form_close(); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php $this->contact_model->set_report_read($item->id); ?>
                <?php endforeach; ?>
                <div class="right" style="text-align: right;">
                    <a href="<?php echo admin_url(); ?>contact-messages?type=fs" class="btn btn-success btn-add-new"><?php echo ('Forsale Messages'); ?></a>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>