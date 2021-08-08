<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo ('Shop Reports'); ?></h3>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20"><?php echo trans('id'); ?></th>
                            <th><?php echo ('Reporter'); ?></th>
                            <th><?php echo ('Reported Shop'); ?></th>
                            <th><?php echo ('Subject'); ?></th>
                            <th><?php echo ('Report'); ?></th>
                            <th><?php echo trans('date'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($messages as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape(get_user($item->reporter_id)->username); ?></td>
                                <td><?php echo html_escape(get_user($item->reported_shop_id)->username); ?></td>
                                <td class="break-word"><?php echo html_escape($item->subject); ?></td>
                                <td class="break-word"><?php echo html_escape($item->report); ?></td>
                                <td><?php echo $item->created_at; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu options-dropdown">
                                            <li>
                                                <a href="<?php echo admin_url(); ?>members?data=<?php echo $item->id; ?>"><i class="fa fa-info option-icon"></i><?php echo ('View Details'); ?></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#messageModal_<?php echo $item->id; ?>"><i class="fa fa-reply option-icon"></i><?php echo ('Reply'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>


<?php foreach ($messages as $item): ?>
    <!-- Modal -->
    <div id="messageModal_<?php echo $item->id; ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('message_controller/add_conversation'); ?>
                <!-- form start -->
                <input type="hidden" name="sender_id" id="message_sender_id" value="<?php echo $this->auth_user->id; ?>">
                <input type="hidden" id="message_send_em" value="<?php echo user()->send_email_new_message; ?>">
                <input type="hidden" name="for_sale" value="0">
                <input type="hidden" name="product_id" value="0">
                <input type="hidden" name="redirect" value="1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="title"><?php echo trans("send_message"); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="table-order-status">
                        <div class="form-group">
                            <label class="control-label"><?php echo ("Receiver"); ?></label>
                            <select name="receiver_id" class="form-control">
                                <option name="receiver_id" value="<?php echo $item->reporter_id; ?>"><?php echo ("Reporter"); ?></option>
                                <option name="receiver_id" value="<?php echo $item->reported_shop_id; ?>"><?php echo ("Shop Reported"); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><?php echo trans("subject"); ?></label>
                            <input type="text" name="subject" id="message_subject" value="<?php echo 'Reply To: ' . $item->subject; ?>" class="form-control form-input" placeholder="<?php echo trans("subject"); ?>" required>
                        </div>
                        <div class="form-group m-b-sm-0">
                            <label class="control-label"><?php echo trans("message"); ?></label>
                            <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="<?php echo trans("write_a_message"); ?>" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><?php echo trans("close"); ?></button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-paper-plane"></i> &nbsp;<?php echo trans("send"); ?></button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>