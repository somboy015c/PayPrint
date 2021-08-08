<?php defined('BASEPATH') OR exit('No direct script access allowed'); if (!empty($product_id)) { $for_sale = get_product($product_id)->for_sale; } else { $for_sale = 0; $product_id = 0; } ?>
<!-- Send Message Modal -->
<?php if (auth_check()): ?>
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" style="z-index: 9999999">
        <div class="modal-dialog modal-dialog-centered login-modal modal-send-message" role="document" style="min-width: 0px;">

            <div class="modal-content">
                <!-- form start -->
                <form id="form_send_message" novalidate="novalidate">
                    <input type="hidden" name="sender_id" id="message_sender_id" value="<?php echo $this->auth_user->id; ?>">
                    <input type="hidden" name="receiver_id" id="message_receiver_id" value="<?php echo $user->id; ?>">
                    <input type="hidden" id="message_send_em" value="<?php echo $user->send_email_new_message; ?>">
                    <input type="hidden" name="for_sale" value="<?php echo $for_sale; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <div class="modal-header main-menu">
                        <h4 class="title" style="margin-bottom: 10px; font-size: 20px;"><?php echo trans("send_message"); ?></h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    </div>
                    <div class="modal-header mobile-menu">
                        <h4 class="title" style="margin-bottom: 0px; font-size: 18px;"><?php echo trans("send_message"); ?></h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="padding-top: 0px;">
                        <div class="row">
                            <div class="col-12">
                                <div id="send-message-result"></div>
                                <div class="form-group">
                                    <label class="control-label"><?php echo trans("subject"); ?></label>
                                    <input type="text" name="subject" id="message_subject" value="<?php echo (!empty($subject)) ? html_escape($subject) : ''; ?>" class="form-control form-input" placeholder="<?php echo trans("subject"); ?>" required>
                                </div>
                                <div class="form-group m-b-sm-0">
                                    <label class="control-label"><?php echo trans("message"); ?></label>
                                    <textarea name="message" id="message_text" class="form-control form-textarea" placeholder="<?php echo trans("write_a_message"); ?>" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-red" data-dismiss="modal"><i class="icon-times"></i>&nbsp;<?php echo trans("close"); ?></button>
                        <button type="submit" class="btn btn-md btn-custom"><i class="icon-send"></i>&nbsp;<?php echo trans("send"); ?></button>
                    </div>
                </form>
                <!-- form end -->
            </div>

        </div>
    </div>
<?php endif; ?>