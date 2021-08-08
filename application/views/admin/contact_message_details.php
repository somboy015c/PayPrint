<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo ('Contact Message'); ?></h3>
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
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo 'Sender: ' . $item->name; ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-order-status">
                            <div class="form-group">
                                <label class="control-label"><?php echo 'Sender Mail: ' . $item->email; ?></label>
                                <p style="margin-top: 10px; margin-left: 10px;"><?php echo 'message: ' . $item->message; ?></p>
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
                                    <a href="<?php echo admin_url(); ?>send-email-subscribers?type=dual&data1=<?php echo $item->email; ?>&data2=<?php echo $item->message; ?>"><i class="fa fa-reply option-icon"></i><?php echo ('Reply'); ?></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="delete_item('admin_controller/delete_contact_message_post','<?php echo $item->id; ?>','<?php echo trans("confirm_message"); ?>');"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php $this->contact_model->set_contact_message_read($item->id); ?>
                <?php endforeach; ?>
                <div class="right" style="text-align: right;">
                    <a href="<?php echo admin_url(); ?>contact-messages" class="btn btn-success btn-add-new"><?php echo  trans('contact_messages'); ?></a>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>

