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

                <h1 class="page-title"><?php echo $title; ?></h1>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <!-- load profile nav -->
                    <?php $this->load->view("earnings/_earnings_tabs"); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                    <!-- include message block -->
                    <?php $this->load->view('product/_messages'); ?>
                <div class="row-custom">
                    <div class="earnings-boxes">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-6">
                                <div class="earnings-box">
                                    <p class="title"><?php echo trans("balance"); ?></p>
                                    <p class="price"><?php echo print_price($user->wallet, $this->payment_settings->default_product_currency); ?></p>
                                    <p class="description"><?php echo ("Total Credited Amount"); ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 m-b-sm-15">
                                <div class="earnings-box">
                                    <p class="title"><?php echo ("Credit Your Wallet"); ?></p>
                                    <p class="price"><button type="submit" id="b_click" class="btn btn-md btn-custom" style="border-radius: 6px;"><?php echo ("Credit Wallet"); ?></button></p>
                                    <p class="description"><?php echo ("For easier and faster Transactions."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                    <div class="col-12 col-md-7" id="credit"><br/><br/>
                        <div class="withdraw-money-container">
                            <h2 class="title"><?php echo ("Credit Your Wallet"); ?></h2>
                            <?php echo form_open('earnings_controller/credit_wallet', ['id' => 'form_validate_payout_1', 'class' => 'validate_price',]); ?>
                            <div class="form-group">
                                <label><?php echo ("Credit Amount (Min: ₦100)"); ?></label>
                                <?php $min_value = 0; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text-currency" id="basic-addon2"><?php echo get_currency($payment_settings->default_product_currency); ?></span>
                                        <input type="hidden" name="currency" value="<?php echo $payment_settings->default_product_currency; ?>">
                                    </div>
                                    <input type="text" name="amount" id="product_price_input" aria-describedby="basic-addon2" class="form-control form-input price-input validate-price-input " placeholder="<?php echo $this->input_initial_price; ?>" onpaste="return false;" maxlength="32" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-custom" style="border-radius: 6px;"><?php echo ("Credit Wallet"); ?></button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>






                <div class="row-custom table-earnings-container">
                    <h3 class="title"><?php echo 'Credits'; ?></h1>
                    <div class="table-responsive">
                        <table class="table table-orders table-striped">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo trans("order"); ?></th>
                                <th scope="col"><?php echo trans("price"); ?></th>
                                <th scope="col"><?php echo trans("commission_rate"); ?></th>
                                <th scope="col"><?php echo trans("shipping_cost"); ?></th>
                                <th scope="col"><?php echo trans("earned_amount"); ?></th>
                                <th scope="col"><?php echo trans("date"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($earnings as $earning): ?>
                                <tr>
                                    <td>#<?php echo $earning->order_number; ?></td>
                                    <td><?php echo print_price($earning->price, $earning->currency); ?></td>
                                    <td><?php echo $earning->commission_rate; ?>%</td>
                                    <td><?php echo print_price($earning->shipping_cost, $earning->currency); ?></td>
                                    <td><?php echo print_price($earning->earned_amount, $earning->currency); ?></td>
                                    <td><?php echo date("Y-m-d / h:i", strtotime($earning->created_at)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (empty($earnings)): ?>
                        <p class="text-center">
                            <?php echo trans("no_records_found"); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="row-custom m-t-15">
                    <div class="float-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Wrapper End-->

<script>
    $('#credit').hide();                               
    $(document).on('click', '#b_click', function () {
        $('#credit').show();
    });
</script>