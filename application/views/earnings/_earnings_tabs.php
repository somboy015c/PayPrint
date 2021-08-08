<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>




<div class="main-menu">
    <div class="profile-tabs">
        <ul class="nav">
            <li class="nav-item <?php echo ($active_tab == 'forcasts') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings?type=forcasts">
                    <span><?php echo ("Business Analysis"); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($active_tab == 'wallet') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings?type=wallet">
                    <span><?php echo ("C - Wallet"); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($active_tab == 'earnings') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings">
                    <span><?php echo trans("earnings"); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($active_tab == 'payouts') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>payouts">
                    <span><?php echo trans("payouts"); ?></span>
                </a>
            </li>
            <li class="nav-item <?php echo ($active_tab == 'set_payout_account') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo lang_base_url(); ?>set-payout-account">
                    <span><?php echo trans("set_payout_account"); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>




<div class="mobile-menu" style="padding: 0px;">
    <div class="span-sort-by product-sort-by" style=" float: none; ">
        <div class="profile-tabs">
            <ul class="nav">
                <li class="nav-item <?php echo ($active_tab == 'forcasts') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings?type=forcasts">
                        <span><?php echo ("Business Analysis"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'wallet') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings?type=wallet">
                        <span><?php echo ("C - Wallet"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'earnings') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>earnings">
                        <span><?php echo trans("earnings"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'payouts') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>payouts">
                        <span><?php echo trans("payouts"); ?></span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($active_tab == 'set_payout_account') ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo lang_base_url(); ?>set-payout-account">
                        <span><?php echo trans("set_payout_account"); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>



    <div class="btn-filter-products-mobile" style="background-color: transparent !important; float: none; border: 0px; margin-left: 0px;">


        <div class="col-12" style="padding: 0px;">
            <div class="nav-mobile-inner">
                <ul class="nav">
                    <div class="col-12"style="padding: 0px; margin: 0px;">
                        <div class="row-custom"style="padding: 0px; margin: 0px;">
                            <div id="blog-slider4" class="owl-carousel blog-slider" style="max-height: 40px; font-size: 12px; padding-top: 5px; overflow: hidden;">
                                        <!--print blog slider posts-->
                                        


                                <li class="nav-item <?php echo ($active_tab == 'forcasts') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>earnings?type=forcasts" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
                                        <span><?php echo ("Business&nbsp;Analysis"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'wallet') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>earnings?type=wallet" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
                                        <span><?php echo ("C&nbsp;-&nbsp;Wallet"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'earnings') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>earnings" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
                                        <span><?php echo trans("earnings"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'payouts') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>payouts" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
                                        <span><?php echo trans("payouts"); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo ($active_tab == 'set_payout_account') ? 'active' : ''; ?>" style="overflow: hidden;">
                                    <a class="nav-link btn btn-md btn-outline-gray" href="<?php echo lang_base_url(); ?>set-payout-account" style="<?php if ($active_tab == 'products') {echo 'border-bottom-color: red;';} ?> font-size: 10px; padding-left: 3px">
                                        <span><?php echo ("Set&nbsp;Payout&nbsp;Account"); ?></span>
                                    </a>
                                </li>



                                        <li></li>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <hr style="margin: 0px; padding: 0px;">
        </div>






    </div>


</div>










