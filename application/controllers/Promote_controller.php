<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promote_controller extends Home_Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		//check auth
		if (!auth_check()) {
			redirect(lang_base_url());
		}
	}

	/**
	 * Pricing
	 */
	public function pricing($product_id)
	{
		if ($this->promoted_products_enabled != 1) {
			redirect(lang_base_url());
		}

		$data["bully"] = $this->input->get('bully');
		$data["type"] = $this->input->get('type');
		$data["req"] = $this->input->get('req');
		$data["tp"] = $this->input->get('tp');
		if ($data["type"] != 'store' && $data["type"] != 'u_advert' && $data["type"] != 'e_advert') {
			$data["product"] = $this->product_model->get_product_by_id($product_id);
			if (empty($data["product"])) {
				redirect(lang_base_url());
			}
			//check product user
			if ($data["product"]->user_id != user()->id) {
				redirect(lang_base_url());
			}
		}


		if ($data["type"] != "new" && $data["type"] != "exist" && $data["type"] != "p_advert" && $data["type"] != "u_advert" && $data["type"] != "store" && $data["type"] != "e_advert") {
			redirect($this->agent->referrer());
		} else {
			$this->session->set_userdata('mds_promote_product_type', $data["type"]);
		}
		if ($data["type"] == "new" || $data["type"] == "exist") {
			$data['title'] = trans("promote_your_product");
			$data['description'] = trans("promote_your_product") . " - " . $this->app_name;
			$data['keywords'] = trans("promote_your_product") . "," . $this->app_name;
		}
		if ($data["type"] == "p_advert" || $data["type"] == "u_advert" || $data["type"] == "e_advert"){
			$data['title'] = ("Advertisement Plans");
			$data['description'] = ("Advertisement Plans") . " - " . $this->app_name;
			$data['keywords'] = ("Advertisement Plans") . "," . $this->app_name;
		}
		if ($data["type"] == "store"){

			if (!empty($data["req"]) && $data["req"] != "workshop") {
				redirect($this->agent->referrer());
			}

			if (!empty($data["tp"]) && $data["tp"] != "renew") {
				redirect($this->agent->referrer());
			} else {
				if (($data["req"] == "workshop" && $data["tp"] == "renew" && user()->is_workshop != 1) || ($data["req"] != "workshop" && $data["tp"] == "renew" && user()->role == 'member')) {
					redirect(lang_base_url() . "promote-product/pricing/" . $product_id . "?type=store&req=" . $data["req"]);
				}
				if (($data["req"] == "workshop" && $data["tp"] != "renew" && user()->is_workshop == 1) || ($data["req"] != "workshop" && $data["tp"] != "renew" && user()->role != 'member')) {
					redirect(lang_base_url() . "promote-product/pricing/" . $product_id . "?type=store&req=" . $data["req"] . "&tp=renew");
				}
			}


			if ($data["req"] == 'workshop') {
				$data['title'] = ("Workshop Opening Plans");
				$data['description'] = ("Workshop Opening Plans") . " - " . $this->app_name;
				$data['keywords'] = ("Workshop Opening Plans") . "," . $this->app_name;
			} else {
				$data['title'] = ("Shop Opening Plans");
				$data['description'] = ("Shop Opening Plans") . " - " . $this->app_name;
				$data['keywords'] = ("Shop Opening Plans") . "," . $this->app_name;
			}
		}
		$completed = $this->input->get('completed');
		if ($completed == 1) {
			$this->cart_model->unset_sess_cart_payment_method();
		}

		$this->load->view('partials/_header', $data);
		$this->load->view('promote/pricing', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Pricing Post
	 */
	public function pricing_post()
	{
		$type = $this->input->post('type', true);
		$price_per_day = price_format_decimal($this->payment_settings->price_per_day);
		$price_per_month = price_format_decimal($this->payment_settings->price_per_month);

		$ad_price_per_day = price_format($this->payment_settings->ad_price_per_day);
		$ad_price_per_month = price_format($this->payment_settings->ad_price_per_month);
		$retailer_plan = price_format($this->payment_settings->retailer_plan);
		$wholesaler_plan = price_format($this->payment_settings->wholesaler_plan);
		$manufacturer_plan = price_format($this->payment_settings->manufacturer_plan);

		$day_count = $this->input->post('day_count', true);
		$month_count = $this->input->post('month_count', true);

		$ad_day_count = $this->input->post('ad_day_count', true);
		$ad_month_count = $this->input->post('ad_month_count', true);
		$retailer_count = $this->input->post('retailer_count', true);
		$wholesaler_count = $this->input->post('wholesaler_count', true);
		$retailer_count = $this->input->post('manufacturer_count', true);



		$total_amount = 0;
		if ($plan_type == "daily") {
			$total_amount = number_format($day_count * $price_per_day, 2, ".", "") * 100;
			$purchased_plan = trans("daily_plan") . " (" . $day_count . " " . trans("days") . ")";
		}
		if ($plan_type == "monthly") {
			$day_count = $month_count * 30;
			$total_amount = number_format($month_count * $price_per_month, 2, ".", "") * 100;
			$purchased_plan = trans("monthly_plan") . " (" . $day_count . " " . trans("days") . ")";
		}
		$data = new stdClass();
		$data->plan_type = $this->input->post('plan_type', true);
		$data->product_id = $this->input->post('product_id', true);
		$data->day_count = $day_count;
		$data->month_count = $month_count;
		$data->total_amount = $total_amount;
		$data->purchased_plan = $purchased_plan;

		if ($this->payment_settings->free_product_promotion == 1) {
			$this->promote_model->add_to_promoted_products($data);
			$product = get_product($data->product_id);
			if (!empty($product)) {
				redirect(lang_base_url() . $product->slug);
			} else {
				redirect(lang_base_url());
			}
		} else {
			$this->session->set_userdata('modesy_selected_promoted_plan', $data);
			redirect(lang_base_url() . "cart/payment-method?payment_type=promote");
		}
	}

	/**
	 * Free Product Promote
	 */
	public function free_product_promote()
	{
		$data['title'] = trans("msg_payment_completed");
		$data['description'] = trans("msg_payment_completed") . " - " . $this->app_name;
		$data['keywords'] = trans("payment") . "," . $this->app_name;
		$data['promoted_plan'] = $this->session->userdata('modesy_selected_promoted_plan');
		if (empty($data['promoted_plan'])) {
			redirect(lang_base_url());
		}

		$data["method"] = $this->input->get('method');
		$data["transaction_number"] = $this->input->get('transaction_number');

		$this->load->view('partials/_header', $data);
		$this->load->view('cart/promote_payment_completed', $data);
		$this->load->view('partials/_footer');
	}



	/**
	 * Advert Post
	 */
	public function advert_post()
	{
		$plan_type = $this->input->post('plan_type', true);
		$type = $this->input->post('type', true);

		$ad_price_per_day = price_format($this->payment_settings->ad_price_per_day);
		$ad_price_per_month = price_format($this->payment_settings->ad_price_per_month);


		$ad_day_count = $this->input->post('ad_day_count', true);
		$ad_month_count = $this->input->post('ad_month_count', true);

		$total_amount = 0;
		if ($plan_type == "daily") {
			$total_amount = number_format($ad_day_count * $ad_price_per_day, 2, ".", "") * 100;
			$purchased_plan = trans("daily_plan") . " (" . $ad_day_count . " " . trans("days") . ")";
		}
		if ($plan_type == "monthly") {
			$ad_day_count = $ad_month_count * 30;
			$total_amount = number_format($ad_day_count * $ad_price_per_day, 2, ".", "") * 100;
			$purchased_plan = trans("monthly_plan") . " (" . $ad_day_count . " " . trans("days") . ")";
		}

		
		$data = new stdClass();
		$data->ad_plan_type = $this->input->post('plan_type', true);
		$data->product_id = $this->input->post('product_id', true);
		$data->user_id = $this->input->post('user_id', true);
		$data->ad_day_count = $ad_day_count;
		$data->ad_month_count = $ad_month_count;
		$data->total_amount = $total_amount;
		$data->purchased_plan = $purchased_plan;
		if (!empty($data->product_id)) {
			$target = $data->product_id . 'p';
		} else {
			if ($type == "e_advert") {
				$target = $data->user_id . 'e';
			}else{
				$target = $data->user_id;
			}
		}

		$da->plan_type = $data->ad_plan_type;
		$da->product_id = $target;
		$da->day_count = $data->ad_day_count;
		$da->month_count = $data->ad_month_count;
		$da->total_amount = $data->total_amount;
		$da->purchased_plan = $data->purchased_plan;
			/*$this->promote_model->add_to_advertisement($data);*/
			/*$product = get_product($data->product_id);
			if (!empty($product)) {
				redirect(lang_base_url() . $product->slug);
			} elseif(!empty($data->user_id)) {
				redirect(lang_base_url());
			}*/
			$this->session->set_userdata('modesy_selected_promoted_plan', $da);
			redirect(lang_base_url() . "cart/payment-method?payment_type=advert");
			
	}





	/**
	 * Advert Post
	 */
	public function shop_opening_post()
	{
		$plan_type = $this->input->post('plan_type', true);
		$means = $this->input->post('means', true);

		$retailer_plan = price_format($this->payment_settings->retailer_plan);
		$wholesaler_plan = price_format($this->payment_settings->wholesaler_plan);
		$manufacturer_plan = price_format($this->payment_settings->manufacturer_plan);
		$basic_plan = price_format($this->payment_settings->basic_plan);
		$premium_plan = price_format($this->payment_settings->premium_plan);
		$ultimate_plan = price_format($this->payment_settings->ultimate_plan);



		$retailer_count = $this->input->post('retailer_count', true);
		$wholesaler_count = $this->input->post('wholesaler_count', true);
		$manufacturer_count = $this->input->post('manufacturer_count', true);
		$basic_count = $this->input->post('basic_count', true);
		$premium_count = $this->input->post('premium_count', true);
		$ultimate_count = $this->input->post('ultimate_count', true);

		$total_amount = 0;
		if ($plan_type == "retailer") {
			$retailer_days_count = $retailer_count * 365;
			$total_amount = number_format($retailer_count * $retailer_plan, 2, ".", "") * 100000;
			$purchased_plan = ("Retailer Plan") . " (" . $retailer_days_count . " " . trans("days") . ")";
			$shop_days_count = $retailer_days_count;
		} 
		if ($plan_type == "wholesaler") {
			$wholesaler_days_count = $wholesaler_count * 365;
			$total_amount = number_format($wholesaler_count * $wholesaler_plan, 2, ".", "") * 100000;
			$purchased_plan = ("Wholesaler Plan") . " (" . $wholesaler_days_count . " " . trans("days") . ")";
			$shop_days_count = $wholesaler_days_count;
		}
		if ($plan_type == "manufacturer") {
			$manufacturer_days_count = $manufacturer_count * 365;
			$total_amount = number_format($manufacturer_count * $manufacturer_plan, 2, ".", "") * 100000;
			$purchased_plan = ("Manufacturer Plan") . " (" . $manufacturer_days_count . " " . trans("days") . ")";
			$shop_days_count = $manufacturer_days_count;
		}
		if ($plan_type == "basic") {
			$basic_days_count = $basic_count * 365;
			$total_amount = number_format($basic_count * $basic_plan, 2, ".", "") * 100000;
			$purchased_plan = ("basic Plan") . " (" . $basic_days_count . " " . trans("days") . ")";
			$shop_days_count = $basic_days_count;
		}
		if ($plan_type == "premium") {
			$premium_days_count = $premium_count * 365;
			$total_amount = number_format($premium_count * $premium_plan, 2, ".", "") * 100000;
			$purchased_plan = ("premium Plan") . " (" . $premium_days_count . " " . trans("days") . ")";
			$shop_days_count = $premium_days_count;
		}
		if ($plan_type == "ultimate") {
			$ultimate_days_count = $ultimate_count * 365;
			$total_amount = number_format($ultimate_count * $ultimate_plan, 2, ".", "") * 100000;
			$purchased_plan = ("ultimate Plan") . " (" . $ultimate_days_count . " " . trans("days") . ")";
			$shop_days_count = $ultimate_days_count;
		}

		
		$data = new stdClass();
		$data->shop_plan_type = $plan_type;
		$data->shop_user_id = $this->input->post('user_id', true);
		$data->shop_days_count = $shop_days_count;/*
		$data->ad_month_count = $month_count;*/
		$data->total_amount = $total_amount;
		$data->purchased_plan = $purchased_plan;

		$da->plan_type = $data->shop_plan_type;
		$da->product_id = $data->shop_user_id;
		$da->day_count = $data->shop_days_count;/*
		$da->month_count = $data->ad_month_count;*/
		$da->total_amount = $data->total_amount;
		$da->purchased_plan = $data->purchased_plan;
			/*$this->promote_model->add_to_advertisement($data);*/
			/*$product = get_product($data->product_id);
			if (!empty($product)) {
				redirect(lang_base_url() . $product->slug);
			} elseif(!empty($data->user_id)) {
				redirect(lang_base_url());
			}*/
			$this->session->set_userdata('modesy_selected_promoted_plan', $da);
			redirect(lang_base_url() . "cart/payment-method?payment_type=store&means=" . $means);
			
	}



}


