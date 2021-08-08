<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- Location Modal -->
    <div class="modal fade" id="locationModal" role="dialog" style="z-index: 999999">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document">
            <div class="modal-content">
                <div class="auth-box">
                    <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                    <h4 class="title" style="font-size: 17px;"><?php echo ("Your Default Location"); ?></h4>
                    <!-- form start -->
                    <?php $loc = $this->session->userdata('modesy_visitor_default_location');  echo form_open('home_controller/set_visitor_default_location'); ?>
                    <div class="col-12 col-sm-12 m-b-15">
                        <div class="selectdiv">
                            <select id="countries" name="country_id" class="form-control" onchange="get_states(this.value);" required>
                                <option value=""><?php echo trans('country'); ?></option>
                                <?php foreach ($countries as $item): ?>
                                    <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $loc['country_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 m-b-15">
                        <div class="selectdiv">
                            <select id="states" name="state_id" class="form-control" onchange="get_cities(this.value);" required>
                                <option value=""><?php echo trans('state'); ?></option>
                                <?php
                                if (!empty($states)):
                                    foreach ($states as $item): ?>
                                        <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $loc['state_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                    <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 m-b-15">
                        <div class="selectdiv">
                            <select id="cities" name="city_id" class="form-control" required>
                                <option value=""><?php echo ('City / L.G.A'); ?></option>
                                <?php
                                if (!empty($cities)):
                                    foreach ($cities as $item): ?>
                                        <option value="<?php echo $item->id; ?>" <?php echo ($item->id == $loc['city_id']) ? 'selected' : ''; ?>><?php echo html_escape($item->name); ?></option>
                                    <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 m-b-15">
                        <button type="submit" class="btn btn-md btn-custom btn-block" style="border-radius: 4px;">Save And Continue</button>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- form end -->
                </div>
            </div>
        </div>
    </div>


