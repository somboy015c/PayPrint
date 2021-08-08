<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $title; ?></h3>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <!-- include message block -->
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" role="grid">
                        <?php $this->load->view('admin/earnings/_filter_credit_request'); ?>
                        <thead>
                        <tr role="row">
                            <th><?php echo trans('id'); ?></th>
                            <th><?php echo trans('user'); ?></th>
                            <th><?php echo ('Payment Amount'); ?></th>
                            <th><?php echo ('Payment Method'); ?></th>
                            <th><?php echo ('Payment Id'); ?></th>
                            <th><?php echo ('Payment Status'); ?></th>
                            <th><?php echo trans('ip_address'); ?></th>
                            <th><?php echo ('Created At'); ?></th>
                            <th class="th-options"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($requests as $item): ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td>
                                    <?php if (!empty($item)): ?>
                                        <div class="table-orders-user">
                                            <a href="<?php echo base_url(); ?>profile/<?php echo get_user($item->user_id)->slug; ?>" target="_blank">
                                                <div style="width: 50px; height: 50px; overflow: hidden; float: left; margin-right: 10px;">
                                                    <img src="<?php echo get_user_avatar($item->user_id); ?>" alt="" class="img-responsive" style="height: 50px;">
                                                </div>
                                                <?php echo html_escape(get_user($item->user_id)->username); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo print_price($item->payment_amount * 100, $payment_settings->default_product_currency); ?></td>
                                <td><?php echo trans($item->payment_method); ?></td>
                                <td><?php echo $item->payment_id; ?></td>
                                <td><?php if (!empty(trans($item->payment_status))) { echo trans($item->payment_status); } else { echo "Payment Completed"; } ?></td>
                                <td><?php echo $item->ip_address; ?></td>
                                <td><?php echo $item->created_at; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <?php if ($item->payment_status == 'awaiting_payment'): ?>
                                            <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown"><?php echo trans('select_option'); ?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu options-dropdown">
                                                <?php echo form_open('earnings_admin_controller/approve_credit'); ?>
                                                <input type="hidden" name="user_id" value="<?php echo $item->user_id; ?>">
                                                <input type="hidden" name="amount" value="<?php echo $item->payment_amount; ?>">
                                                <input type="hidden" name="method" value="<?php echo $item->payment_method; ?>">
                                                <li>
                                                    <button class="btn dropdown-toggle" type="submit"><i class="fa fa-plus option-icon"></i><?php echo ('Approve'); ?>
                                                    </button>
                                                </li>
                                                <?php echo form_close(); ?>
                                            </ul>
                                        <?php else: ?>
                                            <button class="btn dropdown-toggle" type="button"><i class="fa fa-check option-icon"></i><?php echo ('Approved'); ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <?php if (empty($requests)): ?>
                        <p class="text-center">
                            <?php echo trans("no_records_found"); ?>
                        </p>
                    <?php endif; ?>
                    <div class="col-sm-12 table-ft">
                        <div class="row">
                            <div class="pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<style>
    .font-600{
        font-weight: 600;
    }
</style>