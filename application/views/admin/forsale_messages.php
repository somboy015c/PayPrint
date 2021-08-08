<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?php echo ('Forsale Messages'); ?></h3>
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
                            <th><?php echo ('Sender'); ?></th>
                            <th ><?php echo ('Reciever'); ?></th>
                            <th><?php echo trans('message'); ?></th>
                            <th><?php echo trans('date'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($messages as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape(get_user($item->sender_id)->username); ?></td>
                                <td><?php echo html_escape(get_user($item->receiver_id)->username); ?></td>
                                <td class="break-word"><?php echo html_escape($item->message); ?></td>
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
                                                <a href="<?php echo admin_url(); ?>add-administrator?data=<?php echo $item->id; ?>"><i class="fa fa-info option-icon"></i><?php echo ('View Details'); ?></a>
                                            </li>
                                            <li>
                                                <?php echo form_open('admin_controller/approve_forsale_message'); ?>
                                                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                                <button type="submit"><i class="fa fa-check option-icon"></i><?php echo ('Approve'); ?></button>
                                                <?php echo form_close(); ?>
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
