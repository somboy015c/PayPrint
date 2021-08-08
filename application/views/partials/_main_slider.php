<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="main-slider" class="owl-carousel main-slider">
	<?php foreach ($slider_items as $item):
		$img_slider_mobile = $item->image_small;
		if (empty($img_slider_mobile)) {
			$img_slider_mobile = $item->image;
		} ?>
		<div class="item">
			<a href="<?php echo $item->link; ?>">
				<img data-src="<?php echo base_url() . $item->image; ?>" class="owl-lazy owl-image img-main-slider" alt="slider" style="border-top-right-radius: 6px; border-top-left-radius: 6px;">
				<img data-src="<?php echo base_url() . $img_slider_mobile; ?>" class="owl-lazy owl-image img-main-slider-mobile" alt="slider" style="border-top-right-radius: 6px; border-top-left-radius: 6px;">
			</a>
		</div>
	<?php endforeach; ?>
</div>

