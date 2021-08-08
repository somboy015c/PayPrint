<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--print banner-->
<?php if (!empty($ad_space)):
    $ad_codes = get_ad_codes($ad_space);
    if (!empty($ad_codes)):
        if (trim($ad_codes->ad_code_728) != '') : ?>
            <div class="bn-lg <?php echo(isset($class) ? $class : ''); ?>"style="border-radius: 6px; box-shadow: 0 2px 5px 0 rgba(0,0,0,0.05);background-color: transparent;  max-height: 250px;border-radius: 4px;">
                <div class="col-md-12">
                    <div class="row">
                        <!--Include banner-->
                        <div class="col-6"style="padding-left: 0px; padding-right: 3px;">
                            <?php echo $ad_codes->ad_code_728; ?>
                        </div>
                        <div class="col-6"style="padding-left: 3px; padding-right: 0px;">
                            <?php echo $ad_codes->ad_code_728; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
        if (trim($ad_codes->ad_code_468) != ''): ?>
            <div class="bn-md <?php echo(isset($class) ? $class : ''); ?>">
                <div class="col-md-12">
                    <div class="row">
                        <!--Include banner-->
                        <div class="col-6"style="padding-left: 0px; padding-right: 3px;">
                            <?php echo $ad_codes->ad_code_468; ?>
                        </div>
                        <div class="col-6"style="padding-left: 3px; padding-right: 0px;">
                            <?php echo $ad_codes->ad_code_468; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
        if (trim($ad_codes->ad_code_250) != ''): ?>
            <div class="bn-sm <?php echo(isset($class) ? $class : ''); ?>" style="min-height: 50px;">
                <?php echo $ad_codes->ad_code_250; ?>
            </div>
        <?php endif;
    endif;
endif; ?>


