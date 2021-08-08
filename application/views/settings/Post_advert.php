<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Ckeditor js -->
<script src="<?php echo base_url(); ?>assets/vendor/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/file-uploader/css/jquery.dm-uploader.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/file-uploader/css/styles.css"/>
<script src="<?php echo base_url(); ?>assets/vendor/file-uploader/js/jquery.dm-uploader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/file-uploader/js/demo-ui.js"></script>
<style>
    <?php $image_co = 0; foreach ($bg_images as $bg_image): $image_co++; ?>
        .text_place_<?php echo $image_co; ?>::-webkit-input-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?>:-moz-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?>::-moz-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?>:-ms-input-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?> ::placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?>:-ms-input-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}.text_place_<?php echo $image_co; ?>::-ms-input-placeholder{color: <?php echo $bg_image->font_color; ?> !important;opacity: 1;}
    <?php endforeach; ?>
</style>
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

                <h1 class="page-title"><?php echo trans("settings"); ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <!-- load profile nav -->
                    <?php $this->load->view("settings/_setting_tabs"); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="row-custom">
                    <div class="profile-tab-content">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo trans('ad_spaces'); ?></h3>
                        </div>
                        <!-- /.box-header -->























































                        <!-- include message block -->
                        <?php $this->load->view('partials/_messages'); ?>

                        <?php echo form_open_multipart('product_controller/post_advert_post'); ?>
                        <?php $target = trim($this->input->get('target', TRUE));?>
                                        <div class="form-box">
                                            <div class="form-box-body">
                                                <div class="form-group">
                                            <label class="control-label" style="padding-bottom: 8px;"><?php echo ("Select Ad Type"); ?></label>
                                                    <div class="row">
                                                            <div class="col-12 col-sm-6 col-option">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" name="ad_type" value="internal" id="product_type_1" class="custom-control-input" checked >
                                                                    <label for="product_type_1" class="custom-control-label"><?php echo ('Internal Ad'); ?></label>
                                                                    <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Post Advert of products and services available on this website'); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-option">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" name="ad_type" value="external" id="product_type_2" class="custom-control-input" >
                                                                    <label for="product_type_2" class="custom-control-label"><?php echo ('External Ad'); ?></label>
                                                                    <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Post Advert of products and services from other websites and applications'); ?></p>
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-box"id="nn">
                                            <div class="form-box-body">
                                                <div class="form-group">
                                                    <label class="control-label" style="padding-bottom: 8px;"><?php echo ("Ad Space"); ?></label>
                                                    <div class="row">
                                                            <div class="col-12 col-sm-6 col-option">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" name="adspace" value="middle" id="middle" class="custom-control-input" checked >
                                                                    <label for="middle" class="custom-control-label"><?php echo ('Middle Ad space'); ?></label>
                                                                    <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Display ad in the middle of pages'); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 col-option">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" name="adspace" value="sidebar" id="sidebar" class="custom-control-input" >
                                                                    <label for="sidebar" class="custom-control-label"><?php echo ('Sidebar Ad Space'); ?></label>
                                                                    <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Display ad in the side bar of pages'); ?></p>
                                                                </div>
                                                            </div>

                                                    </div>

                                                    <div class="row">
                                                            <div class="col-12 col-sm-12 col-option listing_sell_on_site" id="mm">
                                                            
                                                                <div class="row row-ad-space"  style="background-color: #fafafc;">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label"><?php echo trans('paste_ad_code'); ?></label>
                                                                        <textarea class="form-control text-area-adspace" name="ad_code"
                                                                                  placeholder="<?php echo trans('paste_ad_code'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>></textarea>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label"><?php echo ("Ad Category"); ?></label>
                                                                        <div class="selectdiv">
                                                                            <select id="categories" name="ad_category_id" class="form-control" onchange="get_subcategories(this.value, 0);" >
                                                                                <option value=""><?php echo trans('select_category'); ?></option>
                                                                                <?php if (!empty($parent_categories)):
                                                                                    foreach ($parent_categories as $item): ?>
                                                                                        <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape(get_category_name_by_lang($item->id, $this->selected_lang->id)); ?></option>
                                                                                    <?php endforeach;
                                                                                endif; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-12 col-sm-6 col-option listing_ordinary_listing" id="kk">
                                                                
                                                                        <label class="control-label"><?php echo ("Ad Target"); ?></label>
                                                                        <div class="selectdiv">
                                                                                <select id="categories" name="ad_target" class="form-control" onchange="get_subcategories(this.value, 0);" >
                                                                                    <?php if (!empty($target)): ?>
                                                                                        <?php if ($target == 'Shop' || $target == 'Work'): ?>
                                                                                            <option value="shop_link"><?php if(user()->role != "member"){echo "My Shop";}else{echo "My Workshop";}?></option>
                                                                                        <?php else: ?>
                                                                                            <option value="<?php echo html_escape($target); ?>"><?php foreach ($products as $product){ if ($product->id == $target){ echo html_escape($product->title); }} ?></option>
                                                                                        <?php endif; ?>
                                                                                    <?php else: ?>
                                                                                        <option value=""><?php echo ('Select what to advertise'); ?></option>
                                                                                            <?php if(user()->is_advert != 1 && user()->is_advert_request != 1): ?>
                                                                                            <option value="shop_link"><?php if(user()->role != "member"){echo "My Shop";}else{echo "My Workshop";}?></option>
                                                                                            <?php endif; ?>
                                                                                            <?php if (!empty($products)):
                                                                                                foreach ($products as $product): ?>
                                                                                                    <?php if($product->is_advert != 1 && $product->is_advert_request != 1): ?>
                                                                                                    <option value="<?php echo html_escape($product->id); ?>"><?php echo html_escape($product->title); ?></option>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach;
                                                                                            endif; ?>
                                                                                    <?php endif; ?>
                                                                                </select>
                                                                        </div>

                                                            </div>




                                                            <div class="col-12 col-sm-12">
                                                                <div class="form-group">
                                                                    






                                                                    <div class="form-box">
                                                                        <div class="form-box-body">
                                                                            <div class="form-group">
                                                                        <label class="control-label" style="padding-bottom: 8px;"><?php echo ("Select Ad file Type"); ?></label>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-4 col-option">
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" name="ad_file_type" value="text" id="product_type_a1" class="custom-control-input" checked >
                                                                                                <label for="product_type_a1" class="custom-control-label"><?php echo ('Text'); ?></label>
                                                                                                <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Advert containing texts'); ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-4 col-option">
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" name="ad_file_type" value="image" id="product_type_b1" class="custom-control-input" >
                                                                                                <label for="product_type_b1" class="custom-control-label"><?php echo ('Image'); ?></label>
                                                                                                <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Advert containing an image of file type (jpeg, jpg, png or gif)'); ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-4 col-option">
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" name="ad_file_type" value="slider" id="product_type_a2" class="custom-control-input" >
                                                                                                <label for="product_type_a2" class="custom-control-label"><?php echo ('Slider'); ?></label>
                                                                                                <p style="color: #9B9B9B;margin: 0;font-size: 13px;"><?php echo ('Advert containing multiple images of file type (jpeg, jpg, or png)'); ?></p>
                                                                                            </div>
                                                                                        </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>







                                                                    




                                                                    




                                                            <div class="col-12 col-sm-12 col-option " id="oo">
                                                            
                                                                <div class="form-group">
                                                                    <label class="control-label"><?php echo ("Edit and Format Text"); ?></label>






                                                                        <div class="card-body" style="padding: 0px; margin-bottom: 10px;">
                                                                            <div id="sl_mid" class="carousel slide slide_widget" data-ride="carousel" data-interval="0">
                                                                                <div class="carousel-inner">
                                                                                    <div class="carousel-item active">
                                                                                        <div class="col-12" style="padding: 0px;">
                                                                                                <!-- Nav tabs -->
                                                                                                <?php $image_count=0; $i_count=0; foreach ($bg_images as $bg_image): $image_count++;?>
                                                                                                    <?php if ($bg_image->adspace == 'middle'): $i_count++; ?>
                                                                                                        <?php if ($i_count <= 4): ?>
                                                                                                            <div class="col-md-3 biseller-column">
                                                                                                                <a class="nav-link" id="cg_<?php echo $image_count; ?>" style="padding: 1px;"><img src="<?php echo $bg_image->image; ?>" alt="works" class="img-fluid" style="border-radius: 6px; ">
                                                                                                                </a>
                                                                                                            </div>
                                                                                                <?php endif; endif; endforeach; ?>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="carousel-item">
                                                                                        <div class="col-12" style="padding: 0px;">
                                                                                                <!-- Nav tabs -->
                                                                                                <ul class="nav nav-tabs col-12">
                                                                                                <?php $image_count=0; $i_count=0; foreach ($bg_images as $bg_image): $image_count++;?>
                                                                                                    <?php if ($bg_image->adspace == 'middle'): $i_count++; ?>
                                                                                                        <?php if ($i_count > 4 && $i_count <= 8): ?>
                                                                                                            <li class="nav-item col-md-3 biseller-column">
                                                                                                                <a class="nav-link" id="cg_<?php echo $image_count; ?>" style="padding: 1px;"><img src="<?php echo $bg_image->image; ?>" alt="works" class="img-fluid" style="border-radius: 6px; ">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                <?php endif; endif; endforeach; ?>
                                                                                                </ul>
                                                                                            </div>
                                                                                    </div>
 
                                                                                </div>
                                                                                <a href="#sl_mid" role="button" data-slide="prev" class="non"><div class="nbs-flexisel-nav-left"></div></a><a href="#sl_mid" role="button" data-slide="next" class="non"><div class="nbs-flexisel-nav-right"></div></a>
                                                                            </div>
                                                                            <div id="sl_sid" class="carousel slide slide_widget" data-ride="carousel" data-interval="0">
                                                                                <div class="carousel-inner">
                                                                                    <div class="carousel-item active">
                                                                                        <div class="col-12" style="padding: 0px;">
                                                                                                <!-- Nav tabs -->
                                                                                                <ul class="nav nav-tabs col-12">
                                                                                                <?php $image_count=0; $i_count=0; foreach ($bg_images as $bg_image): $image_count++;?>
                                                                                                    <?php if ($bg_image->adspace == 'sidebar'): $i_count++; ?>
                                                                                                        <?php if ($i_count <= 6): ?>
                                                                                                            <li class="nav-item col-md-2">
                                                                                                                <a class="nav-link" id="cg_<?php echo $image_count; ?>" style="padding: 1px;"><img src="<?php echo $bg_image->image; ?>" alt="works" style="border-radius: 6px;">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                <?php endif; endif; endforeach; ?>
                                                                                                </ul>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="carousel-item">
                                                                                        <div class="col-12" style="padding: 0px;">
                                                                                                <!-- Nav tabs -->
                                                                                                <ul class="nav nav-tabs col-12">
                                                                                                <?php $image_count=0; $i_count=0; foreach ($bg_images as $bg_image): $image_count++;?>
                                                                                                    <?php if ($bg_image->adspace == 'sidebar'): $i_count++; ?>
                                                                                                        <?php if ($i_count > 6 && $i_count <= 12): ?>
                                                                                                            <li class="nav-item col-md-2">
                                                                                                                <a class="nav-link" id="cg_<?php echo $image_count; ?>" style="padding: 1px;"><img src="<?php echo $bg_image->image; ?>" alt="works" class="img-fluid" style="border-radius: 6px; ">
                                                                                                                </a>
                                                                                                            </li>
                                                                                                <?php endif; endif; endforeach; ?>
                                                                                                </ul>
                                                                                            </div>
                                                                                    </div>
 
                                                                                </div>
                                                                                <a href="#sl_sid" role="button" data-slide="prev" class="non"><div class="nbs-flexisel-nav-left"></div></a><a href="#sl_sid" role="button" data-slide="next" class="non"><div class="nbs-flexisel-nav-right"></div></a>
                                                                            </div>
                                                                        </div>




                                                                        




                                                                        <center>
                                                                        <div id="bg" class="col-9 nn nh" style=" background-image: url('<?php echo $bg_images[0]->image; ?>'); background-size: 100% 100%; background-position: center;border-radius: 4px; height: 250px; padding: 0px;">
                                                                            <textarea id="text" class="text_place_1 fs" style="font-style: bold; padding: 85px 10px 24px 10px; font-size: 23px; color: <?php echo $bg_images[0]->font_color; ?>; background-color: transparent; border: none; border-color: transparent; resize: none; text-align: center; height: 75% ; width: 100%; overflow: hidden;" maxlength="172" name="text" placeholder="Write on what to advertise" cols= "60" rows="5"></textarea>
                                                                        </div>
                                                                        </center>
                                                                                <input type="hidden" name="bg_h" value="<?php echo $bg_images[0]->image; ?>" id="bg_h"><input type="hidden" name="color_h" value="<?php echo $bg_images[0]->font_color; ?>" id="color_h"><input type="hidden" name="pad_t" id="pad_t"><input type="hidden" name="pad_lft" id="pad_lft">
                                                                        

                                            


                                                                        
                                                                    
                                                                </div>

                                                            </div>













                                                            <div class="col-12 col-sm-12 col-option "id="qq">
                                                                <label class="control-label"><?php echo ("Upload Slider Images"); ?></label>
                                                                <div class="dm-uploader-container" style=" background-color: white; padding: 20px;">
                                                                        <span id="middle_sm" class="images-exp"><i class="icon-exclamation-circle"></i><?php echo ('Upload slider images (max: 4 images) of size (1144 X 500), then Click on the button "main" on any of your uploaded image to set your front image , By default your front image will be the first image you upload.'); ?></span><span id="sidebar_sm" class="images-exp"><i class="icon-exclamation-circle"></i><?php echo ('Upload slider images (max: 4 images) of size (335 X 500), then Click on the button "main" on any of your uploaded image to set your front image , By default your front image will be the first image you upload.'); ?></span>
                                                                        
                                                                       <p id="middle_m" class="images-exp"></p>
                                                                        <ul class="dm-uploaded-files" id="files-image">
                                                                            <?php if (!empty($modesy_images)):  ?>
                                                                                <?php foreach ($modesy_images as $modesy_image):?>
                                                                                    <li class="media" id="uploaderFile<?php echo $modesy_image->file_id; ?>">
                                                                                        <img src="<?php echo base_url(); ?>uploads/temp/<?php echo $modesy_image->img_small; ?>" alt="Invalid image">
                                                                                        <a href="javascript:void(0)" class="btn-img-delete btn-delete-product-img-session" data-file-id="<?php echo $modesy_image->file_id; ?>">
                                                                                            <i class="icon-close"></i>
                                                                                        </a>
                                                                                        <?php if ($modesy_image->is_main == 1): ?>
                                                                                            <a href="javascript:void(0)" class="badge badge-success badge-is-image-main btn-set-image-main-session" required><?php echo trans("main"); ?></a>
                                                                                        <?php else: ?>
                                                                                            <a href="javascript:void(0)" class="badge badge-secondary badge-is-image-main btn-set-image-main-session" data-file-id="<?php echo $modesy_image->file_id; ?>"><?php echo trans("main"); ?></a>
                                                                                        <?php endif; ?>
                                                                                    </li>
                                                                                <?php endforeach;
                                                                            endif; ?>
                                                                        </ul>

                                                                        <div id="drag-and-drop-zone" class="dm-uploader text-center">
                                                                            <p class="dm-upload-icon">
                                                                                <i class="icon-upload"></i>
                                                                            </p>
                                                                            <p class="dm-upload-text"><?php echo trans("drag_drop_images_here"); ?>&nbsp;<span style="text-decoration: underline"><?php echo trans('browse_files'); ?></span></p>

                                                                            <a class='btn btn-md dm-btn-select-files'>
                                                                                <input type="file" name="file" size="40" multiple="multiple">
                                                                            </a>
                                                                            <div class="error-message error-message-img-upload">
                                                                                <p class="m-b-5 text-center">
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                                            <div class="col-12 col-sm-12 col-option " id="pp">
                                                            
                                                                <label class="control-label"><?php echo ('Upload Image'); ?></label>
                                                                <span id="middlem" style="color: black;font-size: 13px;">&nbsp; Image size (1144 X 500)</span><span id="sidebarm" style="color: black;font-size: 13px;">&nbsp; Image size (335 X 500)</span> 

                                                                <span style="display: block; font-weight: 400;line-height: 1.5;color: #879099;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; margin: 0px; padding: 0px;" class="col-12">


                                                                        <a class='col-4 btn bg-olive btn-sm btn-file-upload' style="background-color: #aaafb3; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                                                            <img src="<?php echo base_url(); ?>assets/img/image.png" style="width: 50%; height: 50%; margin-top: 25px;" alt="">
                                                                            <p style="color: white;">Select image</p>
                                                                            <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info1').html($(this).val());">
                                                                        </a>


                                                                <label class="col-6" style="vertical-align: middle; text-align: center;" id="upload-file-info1">No Image Selected</label> </span>

                                                            </div>



                                                        </div>
                                                    </div>

                                                            <div class="col-12 col-sm-6" style="margin: 15px;">
                                                            
                                                                <label class="control-label"><?php echo ('People who see this'); ?></label><p style="color: #9B9B9B;font-size: 13px;"><?php echo ('Select The categories of people who see your Ads'); ?></p>
                                                                <div class="selectdiv">
                                                                            <select id="countries" name="viewers" class="form-control" onchange="get_states(this.value);" required>
                                                                                <option value=""><?php echo ('Select people'); ?></option>
                                                                                <?php if(!empty($user->city_id)): ?>
                                                                                <option value="<?php echo $user->city_id . get_city($user->city_id)->name; ?>"><?php echo html_escape('People from ' . get_city($user->city_id)->name) .' L.G.A'; ?></option>
                                                                                <?php endif; ?>
                                                                                <?php if(!empty($user->state_id)): ?>
                                                                                <option value="<?php echo $user->state_id . get_state($user->state_id)->name; ?>"><?php echo html_escape('People from ' . get_state($user->state_id)->name) .' State'; ?></option>
                                                                                <?php endif; ?>
                                                                                <?php if(!empty($user->state_id)): ?>
                                                                                <option value="<?php echo $user->country_id . get_country($user->country_id)->name; ?>"><?php echo html_escape('People from ' . get_country($user->country_id)->name); ?></option>
                                                                                <?php endif; ?>
                                                                                <option value="<?php echo 'all'; ?>"><?php echo html_escape("Everyone"); ?></option>
                                                                            </select>
                                                                        </div>

                                                            </div>




                                                            <?php if (user()->role != "member"): ?>
                                                            <div class="col-12 col-sm-12">
                                                                <div class="form-group" style="padding-left: 15px;">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"   value="yes" class="custom-control-input" name="display_on_shop" id="checkbox_free_product">
                                                                        <label for="checkbox_free_product" class="custom-control-label"><?php echo ("Display this Ad on my shop"); ?></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-custom float-right" id="submit"><?php echo trans("save_and_continue"); ?></button>
                                                        </div>
                        <?php echo form_close(); ?>











                                        
































                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->







                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#nn').show();
                                                            $('#mm').hide();
                                                        });
                                                        $(document).on('click', '#product_type_1', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#nn').show();
                                                                $('#kk').show();
                                                                $('#mm').hide();
                                                            }
                                                        });
                                                        $(document).on('click', '#product_type_2', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#nn').show();
                                                                $('#kk').hide();
                                                                $('#mm').show();
                                                            }
                                                        });
                                                    </script>

                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#sidebarm').hide();
                                                            $('#middlem').show();
                                                            $('#sidebar_sm').hide();
                                                            $('#middle_sm').show();
                                                            $('#sl_mid').show();
                                                            $('#sl_sid').hide();



                                                                $('#text').on('keypress', function(event) {
                                                                    if ($('#middle').is(':checked')) {
                                                                        var textarea = $(this), text = textarea.val(), text_lenght = text.length, t_h = textarea.height(); textarea.height(0);
                                                                            var pp = textarea.get(0).scrollHeight, div_h = $('#bg').height()-100, pad = textarea.css('padding-top'), pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                            textarea.height(t_h);
                                                                                t_s.style.paddingTop = (div_h) - (scrolh) + 'px';
                                                                            if(scrolh == 162){textarea.height(t_h + 2);};
                                                                            if(scrolh > 162 || text_lenght > 172){
                                                                                $('#text').val(text.substring(0, text_lenght-1));
                                                                                return false;
                                                                            }
                                                                    }
                                                                });
                                                                $("#text").on("paste",  function(e){
                                                                    if ($('#middle').is(':checked')) {
                                                                        var textarea = $(this),t_h = textarea.height(), t_len = textarea.val().length; textarea.height(0);
                                                                        var pp = textarea.get(0).scrollHeight, pastedData = e.originalEvent.clipboardData.getData('text'),pad = textarea.css('padding-top'), div_h = $('#bg').height()-100, pasted_lent = pastedData.length, pasted_len = pasted_lent + t_len, pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                        textarea.height(t_h + 30);
                                                                        if (pasted_len > 172) {
                                                                            t_s.style.paddingTop = '40px';
                                                                        }else{
                                                                            if(pasted_len < 140){
                                                                                t_s.style.paddingTop = (div_h) - ((pasted_len/2) + 30) + 'px';
                                                                            }else{
                                                                                t_s.style.paddingTop = (div_h) - (pasted_len - 50) + 'px';
                                                                            }
                                                                        }
                                                                                
                                                                    /*var pastedData = e.target.value;*/
                                                                    }
                                                                });




                                                        });
                                                        $(document).on('click', '#middle', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#sidebarm').hide();
                                                                $('#middlem').show();
                                                                $('#sidebar_sm').hide();
                                                                $('#middle_sm').show();
                                                                $('#sl_mid').show();
                                                                $('#sl_sid').hide();
                                                                $('#bg').attr('class', 'col-9');
                                                                document.getElementById('bg').style.height = '250px';
                                                                $('#text').css('padding', '85px 10px 24px 10px');
                                                                <?php $image_count=0; $im_count=0; foreach ($bg_images as $bg_image): if ($bg_image->adspace == "middle"): $image_count++; if ($image_count == 1): ?>
                                                                $('#bg').css('background-image', 'url(<?php echo $bg_images[$im_count]->image; ?>)');
                                                                $('#text').attr('class', 'text_place_<?php echo $im_count+1; ?>');
                                                                $('#text').attr('maxlength', '172');
                                                                <?php endif; endif; $im_count++; endforeach; ?>
                                                                $('#text').val('');



                                                                $('#text').on('keypress', function(event) {
                                                                    if ($('#middle').is(':checked')) {
                                                                        var textarea = $(this), text = textarea.val(), text_lenght = text.length, t_h = textarea.height(); textarea.height(0);
                                                                            var pp = textarea.get(0).scrollHeight, div_h = $('#bg').height()-100, pad = textarea.css('padding-top'), pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                            textarea.height(t_h);
                                                                                t_s.style.paddingTop = (div_h) - (scrolh) + 'px';
                                                                            if(scrolh == 162){textarea.height(t_h + 2);}
                                                                            if(scrolh > 162 || text_lenght > 172){
                                                                                $('#text').val(text.substring(0, text_lenght-1));
                                                                                return false;
                                                                            }
                                                                    }
                                                                });
                                                                $("#text").on("paste",  function(e){
                                                                    if ($('#middle').is(':checked')) {
                                                                        var textarea = $(this),t_h = textarea.height(), t_len = textarea.val().length; textarea.height(0);
                                                                        var pp = textarea.get(0).scrollHeight, pastedData = e.originalEvent.clipboardData.getData('text'),pad = textarea.css('padding-top'), div_h = $('#bg').height()-100, pasted_lent = pastedData.length, pasted_len = pasted_lent + t_len, pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                        textarea.height(t_h + 30);
                                                                        if (pasted_len > 172) {
                                                                            t_s.style.paddingTop = '40px';
                                                                        }else{
                                                                            if(pasted_len < 140){
                                                                                t_s.style.paddingTop = (div_h) - ((pasted_len/2) + 30) + 'px';
                                                                            }else{
                                                                                t_s.style.paddingTop = (div_h) - (pasted_len - 50) + 'px';
                                                                            }
                                                                        }
                                                                                
                                                                    /*var pastedData = e.target.value;*/
                                                                    }
                                                                });



                                                            }
                                                        });
                                                        $(document).on('click', '#sidebar', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#sidebar_sm').show();
                                                                $('#middle_sm').hide();
                                                                $('#sidebarm').show();
                                                                $('#middlem').hide();
                                                                $('#sl_mid').hide();
                                                                $('#sl_sid').show();
                                                                $('#bg').attr('class', 'col-4');
                                                                document.getElementById('bg').style.height = '400px';
                                                                $('#text').css('padding', '150px 10px 24px 10px');
                                                                <?php $image_count=0; $im_count=0; foreach ($bg_images as $bg_image): if ($bg_image->adspace == "sidebar"): $image_count++; if ($image_count == 1): ?>
                                                                $('#bg').css('background-image', 'url(<?php echo $bg_images[$im_count]->image; ?>)');
                                                                $('#text').attr('maxlength', '119');
                                                                $('#text').attr('class', 'text_place_<?php echo $im_count+1; ?>');
                                                                <?php endif; endif; $im_count++; endforeach; ?>
                                                                $('#text').val('');
                                                                $('#text').height($('#bg').height()/3.1);


                                                                $('#text').on('keypress', function(event) {
                                                                    if ($('#sidebar').is(':checked')) {
                                                                        var textarea = $(this), text = textarea.val(), text_lenght = text.length, t_h = textarea.height(); textarea.height(0);
                                                                            var pp = textarea.get(0).scrollHeight, div_h = $('#bg').height()-220, pad = textarea.css('padding-top'), pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                            textarea.height(t_h);
                                                                                t_s.style.paddingTop = (div_h) - (scrolh/2) + 'px';
                                                                            if (scrolh == 162.017){textarea.height(t_h + 10);}
                                                                            if (scrolh == 231.3167){textarea.height(t_h + 35)}
                                                                            if (scrolh > 266.4167 || text_lenght > 172) {
                                                                                return false;
                                                                            }
                                                                    }
                                                                });
                                                                $("#text").on("paste",  function(e){
                                                                    if ($('#sidebar').is(':checked')) {
                                                                        var textarea = $(this),t_h = textarea.height(), t_len = textarea.val().length; textarea.height(0);
                                                                        var pp = textarea.get(0).scrollHeight, pastedData = e.originalEvent.clipboardData.getData('text'),pad = textarea.css('padding-top'), div_h = $('#bg').height()-220, pasted_lent = pastedData.length, pasted_len = pasted_lent + t_len, pad_t = pad.substring(0, pad.length - 2),scrolh= pp - pad_t, t_s =  document.getElementById('text');
                                                                        textarea.height(t_h + 60);
                                                                        if (pasted_len > 119) {
                                                                            t_s.style.paddingTop = '40px';
                                                                        }else{
                                                                            if (scrolh <= 196 || text_lenght > 172) {
                                                                                t_s.style.paddingTop = (div_h) - (pasted_len + 21) + 'px';
                                                                            }else{
                                                                                return false;
                                                                            }
                                                                            
                                                                        }
                                                                    }
                                                                });



                                                            }
                                                        });
                                                    </script>


                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#oo').show();
                                                            $('#pp').hide();
                                                            $('#qq').hide();
                                                        });
                                                        $(document).on('click', '#product_type_a1', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#oo').show();
                                                                $('#pp').hide();
                                                                $('#qq').hide();
                                                            }
                                                        });
                                                        $(document).on('click', '#product_type_b1', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#oo').hide();
                                                                $('#pp').show();
                                                                $('#qq').hide();
                                                            }
                                                        });
                                                        $(document).on('click', '#product_type_a2', function () {
                                                            if ($(this).is(':checked')) {
                                                                $('#pp').hide();
                                                                $('#oo').hide();
                                                                $('#qq').show();
                                                            }
                                                        });
                                                    </script>











<?php $this->load->view("product/_file_manager_ckeditor"); ?>

<!-- Ckeditor -->
<script>
    var ckEditor = document.getElementById('ckEditor');
    if (ckEditor != undefined && ckEditor != null) {
        CKEDITOR.replace('ckEditor', {
            language: '<?php echo $this->selected_lang->ckeditor_lang; ?>',
            filebrowserBrowseUrl: 'path',
            removeButtons: 'Save',
            allowedContent: true,
            extraPlugins: 'videoembed,oembed'
        });
    }

    function selectFile(fileUrl) {
        window.opener.CKEDITOR.tools.callFunction(1, fileUrl);
    }

    CKEDITOR.on('dialogDefinition', function (ev) {
        var editor = ev.editor;
        var dialogDefinition = ev.data.definition;

        // This function will be called when the user will pick a file in file manager
        var cleanUpFuncRef = CKEDITOR.tools.addFunction(function (a) {
            $('#ckFileManagerModal').modal('hide');
            CKEDITOR.tools.callFunction(1, a, "");
        });
        var tabCount = dialogDefinition.contents.length;
        for (var i = 0; i < tabCount; i++) {
            var browseButton = dialogDefinition.contents[i].get('browse');
            if (browseButton !== null) {
                browseButton.onClick = function (dialog, i) {
                    editor._.filebrowserSe = this;
                    var iframe = $('#ckFileManagerModal').find('iframe').attr({
                        src: editor.config.filebrowserBrowseUrl + '&CKEditor=body&CKEditorFuncNum=' + cleanUpFuncRef + '&langCode=en'
                    });
                    $('#ckFileManagerModal').appendTo('body').modal('show');
                }
            }
        }
    });

    CKEDITOR.on('instanceReady', function (evt) {
        $(document).on('click', '.btn_ck_add_image', function () {
            if (evt.editor.name != undefined) {
                evt.editor.execCommand('image');
            }
        });
        $(document).on('click', '.btn_ck_add_video', function () {
            if (evt.editor.name != undefined) {
                evt.editor.execCommand('videoembed');
            }
        });
        $(document).on('click', '.btn_ck_add_iframe', function () {
            if (evt.editor.name != undefined) {
                evt.editor.execCommand('iframe');
            }
        });
    });
</script>







<!-- File item template -->
<script type="text/html" id="files-template-image">
    <li class="media">
        <img class="preview-img" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="bg">
        <div class="media-body">
            <div class="progress">
                <div class="dm-progress-waiting"><?php echo trans("waiting"); ?></div>
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </li>
</script>

<script>
    $(function () {
        $('#drag-and-drop-zone').dmUploader({
            url: '<?php echo base_url(); ?>file_controller/upload_image_session',
            maxFileSize: <?php echo $this->general_settings->max_file_size_image; ?>,
            queue: true,
            allowedTypes: 'image/*',
            extFilter: ["jpg", "jpeg", "png", "gif"],
            extraData: function (id) {
                return {
                    "file_id": id
                };
            },
            onDragEnter: function () {
                this.addClass('active');
            },
            onDragLeave: function () {
                this.removeClass('active');
            },
            onInit: function () {
            },
            onComplete: function (id) {
            },
            onNewFile: function (id, file) {
                ui_multi_add_file(id, file, "image");
                if (typeof FileReader !== "undefined") {
                    var reader = new FileReader();
                    var img = $('#uploaderFile' + id).find('img');

                    reader.onload = function (e) {
                        img.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            },
            onBeforeUpload: function (id) {
                $('#uploaderFile' + id + ' .dm-progress-waiting').hide();
                ui_multi_update_file_progress(id, 0, '', true);
                ui_multi_update_file_status(id, 'uploading', 'Uploading...');
            },
            onUploadProgress: function (id, percent) {
                ui_multi_update_file_progress(id, percent);
            },
            onUploadSuccess: function (id, data) {
                var data = {
                    "file_id": id,
                };
                data[csfr_token_name] = $.cookie(csfr_cookie_name);
                $.ajax({
                    type: "POST",
                    url: base_url + "file_controller/get_sess_uploaded_image",
                    data: data,
                    success: function (response) {
                        document.getElementById("uploaderFile" + id).innerHTML = response;
                    }
                });
                ui_multi_update_file_status(id, 'success', 'Upload Complete');
                ui_multi_update_file_progress(id, 100, 'success', false);
            },
            onUploadError: function (id, xhr, status, message) {
                if (message == "Not Acceptable") {
                    $("#uploaderFile" + id).remove();
                    $(".error-message-img-upload").show();
                    $(".error-message-img-upload p").html("You can upload 5 files.");
                    setTimeout(function () {
                        $(".error-message-img-upload").fadeOut("slow");
                    }, 4000)
                }
            },
            onFallbackMode: function () {
            },
            onFileSizeError: function (file) {
                $(".error-message-img-upload").show();
                $(".error-message-img-upload p").html("<?php echo trans('file_too_large') . ' ' . formatSizeUnits($this->general_settings->max_file_size_image); ?>");
                setTimeout(function () {
                    $(".error-message-img-upload").fadeOut("slow");
                }, 4000)
            },
            onFileTypeError: function (file) {
            },
            onFileExtError: function (file) {
            },
        });
    });
</script>

<script>
    <?php $image_count=0; foreach ($bg_images as $bg_image): $image_count++;?>
        $('#cg_<?php echo $image_count; ?>').on('click', function() {
            if ($('#middle').is(':checked')) {
                <?php if ($bg_image->adspace == "middle"): ?>
                    $('#bg').css('background-image', 'url(<?php echo $bg_image->image; ?>)');
                    $('#text').css('color', '<?php echo $bg_image->font_color; ?>');
                    $('#bg_h').val('<?php echo $bg_image->image; ?>');
                    $('#color_h').val('<?php echo $bg_image->font_color; ?>');
                    $('#text').attr('class', 'text_place_<?php echo $image_count; ?>');
                <?php endif; ?>
            }else if ($('#sidebar').is(':checked')){
                <?php if ($bg_image->adspace == "sidebar"): ?>
                    $('#bg').css('background-image', 'url(<?php echo $bg_image->image; ?>)');
                    $('#text').css('color', '<?php echo $bg_image->font_color; ?>');
                    $('#bg_h').val('<?php echo $bg_image->image; ?>');
                    $('#color_h').val('<?php echo $bg_image->font_color; ?>');
                    $('#text').attr('class', 'text_place_<?php echo $image_count; ?>');
                <?php endif; ?>
            }
        });
    <?php endforeach; ?>
    $(document).on('click', '#submit', function () {
            var t_s =  $("#text"), pad_t = t_s.css('padding-top'), pad_lft = t_s.css('padding-left');
            $('#pad_t').val(pad_t);
            $('#pad_lft').val(pad_lft);
    });
</script>