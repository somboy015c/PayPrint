<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $heading; ?></li>
                    </ol>
                </nav>

                <h1 class="page-title page-title-product" style="text-align: left;"><?php echo $heading; ?></h1>

                <div class="row">
                    <?php if (!empty($members)): ?>
                        <?php foreach ($members as $member): ?>
                            <div class="main-menu col-12 col-lg-6 col-md-6 col-sm-12">
                                <?php $this->load->view('partials/_members', ['member' => $member]); ?>
                            </div>
                            <div class="mobile-menu col-12 col-lg-6 col-md-6 col-sm-12">
                                <?php $this->load->view('partials/_members_home_mobile', ['member' => $member]); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="no-records-found">
                                <?php echo ("No&nbsp;Such&nbsp;Station&nbsp;Found&nbsp;in&nbsp;") . $default_state . '&nbsp;State'; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->