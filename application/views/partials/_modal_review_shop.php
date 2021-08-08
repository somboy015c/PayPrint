
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Send Message Modal -->
<?php
    $show_review_input = true;
    $show_no_review_message = false;
    if (auth_check() && ($user->id == user()->id)) {
        $show_review_input = false;
        $show_no_review_message = true;
    }

    $reviews = $this->user_review_model->get_reviews($user->id);
    $review_count = $this->user_review_model->get_review_count($user->id);
    $reviews = $this->user_review_model->get_limited_reviews($user->id, 5);
    $review_limit = 5;
?>
<?php if (auth_check()): ?>
    <div class="modal fade" id="reviewModal" tabindex="-2" role="dialog" style="top: 15px;z-index: 999999">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document" style="min-width: unset;">

            <div class="modal-content" style="padding: 20px 20px 0px 20px; ">
                        <h4 class="title" style="font-size: 18px; text-align: center; padding-bottom: 10px;"><?php echo ("Rate&nbsp;Store"); ?></h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <!-- form start -->
                <div id="user-review-result" class="user-reviews">
                <?php if ($show_review_input == true): ?>
                    <input type="hidden" value="<?php echo $review_limit; ?>" id="user_review_limit">
                    <div class="row m-b-15">
                        <div class="col-12">
                            <div class="row-custom">
                                <div class="rating-bar">
                                    <span><?php echo trans("your_rating"); ?></span>
                                    <div class="rating-stars">
                                        <input type="radio" id="star5m" name="rating-star" value="5"/><label class="label-star" data-star="5" for="star5m"></label>
                                        <input type="radio" id="star4m" name="rating-star" value="4"/><label class="label-star" data-star="4" for="star4m"></label>
                                        <input type="radio" id="star3m" name="rating-star" value="3"/><label class="label-star" data-star="3" for="star3m"></label>
                                        <input type="radio" id="star2m" name="rating-star" value="2"/><label class="label-star" data-star="2" for="star2m"></label>
                                        <input type="radio" id="star1m" name="rating-star" value="1"/><label class="label-star" data-star="1" for="star1m"></label>
                                        <input type="hidden" name="rating" id="user_rating">
                                        <?php if (auth_check()): ?>
                                            <input type="hidden" name="seller_id" id="review_seller_id" value="<?php echo $user->id; ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="review" id="user_review" class="form-control form-input form-textarea" placeholder="<?php echo trans("write_review"); ?>" required></textarea>
                            </div>
                            <button type="button" class="btn btn-md btn-red" data-dismiss="modal"><i class="icon-times"></i>&nbsp;<?php echo trans("close"); ?></button>
                            <button type="submit" id="submit_user_review" class="btn btn-md btn-custom float-right"><?php echo trans("submit"); ?></button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (get_user_review_count($user->id) > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="row-custom error-reviewed">
                                <p><?php echo trans("review_error"); ?></p>
                            </div>
                            <div class="reviews">
                                <ul class="review-list" style="margin-top: 0px;">
                                    <?php foreach ($reviews as $review): if ($review->user_id == user()->id): ?>
                                        <li>
                                            <div class="left">
                                                <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($review->user_slug); ?>">
                                                    <img src="<?php echo get_user_avatar_by_id($review->user_id); ?>" alt="<?php echo get_shop_name_by_user_id($review->user_id); ?>">
                                                </a>
                                            </div>
                                            <div class="right">
                                                <div class="row-custom">
                                                    <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($review->user_slug); ?>">
                                                        <span class="username"><?php echo get_shop_name_by_user_id($review->user_id); ?></span>
                                                    </a>
                                                    <!--stars-->
                                                    <?php $this->load->view('partials/_review_stars', ['review' => $review->rating]); ?>
                                                </div>
                                                <div class="row-custom comment">
                                                    <?php echo html_escape($review->review); ?>
                                                </div>
                                                <div class="row-custom">
                                                    <span class="date"><?php echo time_ago($review->created_at); ?></span>
                                                    <?php if (auth_check()):
                                                        if ($review->user_id == user()->id): ?>
                                                            <a href="javascript:void(0)" class="btn-delete-comment" onclick="delete_user_review('<?php echo $review->id; ?>','<?php echo trans("confirm_review"); ?>');">&nbsp;<i class="icon-trash"></i>&nbsp;<?php echo trans("delete"); ?></a>
                                                        <?php endif;
                                                    endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <!-- form end -->
            </div>

        </div>
    </div>
<?php else: ?>
    <div class="modal fade" id="reviewModal" tabindex="-2" role="dialog" style="top: 15px;">
        <div class="modal-dialog modal-dialog-centered login-modal" role="document" style="min-width: unset;">
            <div class="modal-content" style="padding: 20px 20px 0px 20px; ">
                        <h4 class="title" style="font-size: 18px; text-align: center; padding-bottom: 10px;"><?php echo ("Rate&nbsp;Store"); ?></h4>
                        <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <!-- form start -->
                <div id="user-review-result" class="user-reviews">
                <?php if ($show_review_input == true): ?>
                    <input type="hidden" value="<?php echo $review_limit; ?>" id="user_review_limit">
                    <div class="row m-b-15">
                        <div class="col-12">
                            <div class="row-custom">
                                <div class="rating-bar">
                                    <span><?php echo trans("your_rating"); ?></span>
                                    <div class="rating-stars">
                                        <input type="radio" id="star5m2" name="rating-star" value="5"/><label class="label-star" data-star="5" for="star5m2"></label>
                                        <input type="radio" id="star4m2" name="rating-star" value="4"/><label class="label-star" data-star="4" for="star4m2"></label>
                                        <input type="radio" id="star3m2" name="rating-star" value="3"/><label class="label-star" data-star="3" for="star3m2"></label>
                                        <input type="radio" id="star2m2" name="rating-star" value="2"/><label class="label-star" data-star="2" for="star2m2"></label>
                                        <input type="radio" id="star1m2" name="rating-star" value="1"/><label class="label-star" data-star="1" for="star1m2"></label>
                                        <input type="hidden" name="rating" id="user_rating">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="review" id="user_review" class="form-control form-input form-textarea" placeholder="<?php echo trans("write_review"); ?>" required></textarea>
                            </div>
                            <button type="button" class="btn btn-md btn-red" data-dismiss="modal"><i class="icon-times"></i>&nbsp;<?php echo trans("close"); ?></button>
                            <button type="button" class="btn btn-md btn-custom float-right" data-toggle="modal" data-target="#loginModal" data-dismiss="modal"><?php echo trans("submit"); ?></button>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <!-- form end -->
            </div>

        </div>
    </div>
<?php endif; ?>
