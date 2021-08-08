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

        <?php if (empty($url_data)): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" role="grid">
                        <?php $this->load->view('admin/promoted/_filter_transactions'); ?>
                        <thead>
                        <tr role="row">
                            <th><?php echo trans('id'); ?></th>
                            <th><?php echo trans('payment_method'); ?></th>
                            <th><?php echo trans('user'); ?></th>
                            <th><?php echo trans('payment_amount'); ?></th>
                            <th><?php echo trans('payment_status'); ?></th>
                            <th><?php echo trans('date'); ?></th>
                            <th class="max-width-120"><?php echo trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($transactions as $item): ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td>
                                    <?php
                                    if ($item->payment_method == "Bank Transfer") {
                                        echo trans("bank_transfer");
                                    } else {
                                        echo $item->payment_method;
                                    } ?>
                                </td>
                                <td>
                                    <?php $user = get_user($item->user_id);
                                    if (!empty($user)):?>
                                        <div class="table-orders-user">
                                            <a href="<?php echo base_url(); ?>profile/<?php echo $user->slug; ?>" target="_blank">
                                                <?php echo html_escape($user->username); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $item->payment_amount; ?></td>
                                <td style="<?php if ($item->payment_status == 'awaiting_payment'){echo "color: red";} ?>"><?php echo $item->payment_status; ?></td>
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
                                                <a href="<?php echo admin_url() . "promoted-products-transactions?gp_data=" . $user->id . '&data2=' . $item->created_at; ?>"><i class="fa fa-check option-icon"></i><?php echo ('View Details'); ?></a>
                                            </li>
                                            <?php $product = get_product($item->product_id);
                                            if (!empty($product)):
                                                if ($product->is_promoted != 1): ?>
                                                    <li>
                                                        <a href="javascript:void(0)" onclick="$('#day_count_product_id').val('<?php echo html_escape($item->product_id); ?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus option-icon"></i><?php echo trans('add_product_to_promoted'); ?></a>
                                                    </li>
                                                <?php endif;
                                            endif;
                                            ?>
                                            <li>
                                                <a href="javascript:void(0)" onclick="delete_item('product_admin_controller/delete_promoted_transaction_post','<?php echo $item->id; ?>','<?php echo trans("confirm_delete"); ?>');"><i class="fa fa-trash option-icon"></i><?php echo trans('delete'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <?php if (empty($transactions)): ?>
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







        <?php else: ?>






        




                

                <div class="box-header with-border">
                    <div class="left">
                        <h3 class="box-title"><?php echo (get_user($url_data)->slug); ?></h3>
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        

                            <?php foreach ($transactions as $item): if ($item->user_id == $url_data && $item->created_at == $data2): ?>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('id'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo html_escape($item->id); ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('product_id'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->product_id; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('user_id'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;">
                                        <?php $user = get_user($item->user_id);
                                        if (!empty($user)):?>
                                            <a href="<?php echo base_url(); ?>profile/<?php echo $user->slug; ?>" target="_blank">
                                                <?php echo html_escape($user->username); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('purchased_plan'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->purchased_plan; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_amount'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->payment_amount; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_id'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->payment_id; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_method'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php
                                    if ($item->payment_method == "Bank Transfer") {
                                        echo trans("bank_transfer");
                                    } else {
                                        echo $item->payment_method;
                                    } ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('payment_status'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->payment_status; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('currency'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->currency; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('date'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->created_at; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('ip_address'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;"><?php echo $item->ip_address; ?></div>
                                </div>
                                <div class="row" style="margin: 10px;">
                                    <div class="col-sm-3"style="font-size: 16px;"><?php echo trans('options'); ?></div>
                                    <div class="col-sm-9"style="font-size: 14px;">
                                        <?php echo form_open('product_admin_controller/set_promoted_transaction_paid'); ?>
                                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                        <?php if ($item->payment_status != 'payment_completed') : ?>
                                            <div class="dropdown">
                                                <button class="btn bg-purple dropdown-toggle btn-select-option" type="submit" name="submit"  value="3" >
                                                    <?php echo ('Confirm Payment'); ?>
                                                </button>
                                            </div>
                                        <?php else: ?>
                                            <?php echo ('Payment Completed'); ?>
                                        <?php endif; ?>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            <?php endif; endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="box-header with-border" style="margin-top: 30px;">
                <div class="left">
                    <a href="<?php echo admin_url(); ?>promoted-products-transactions" class="btn btn-success btn-add-new">
                        <?php echo ('Payment Transactions'); ?>
                    </a>
                </div>
            </div>



        <?php endif; ?>










    </div><!-- /.box-body -->
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <?php echo form_open('product_admin_controller/add_remove_promoted_products'); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo trans('add_to_promoted'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label><?php echo trans('day_count'); ?></label>
                    <input type="hidden" class="form-control" name="product_id" id="day_count_product_id" value="">
                    <input type="hidden" class="form-control" name="is_ajax" value="0">
                    <input type="number" class="form-control" name="day_count" placeholder="<?php echo trans('day_count'); ?>" value="1" min="1" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><?php echo trans("submit"); ?></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo trans("close"); ?></button>
            </div>
            <?php echo form_close(); ?><!-- form end -->
        </div>

    </div>
</div>
