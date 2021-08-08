<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ad_model extends CI_Model
{
	public function input_values()
	{
		$data = array(
			'ad_code_728' => $this->input->post('ad_code_728', false),
			'ad_code_468' => $this->input->post('ad_code_468', false),
			'ad_code_250' => $this->input->post('ad_code_250', false),
		);

		return $data;
	}

	public function input_url_values()
	{
		$data = array(
			'url_ad_code_728' => $this->input->post('url_ad_code_728', false),
			'url_ad_code_468' => $this->input->post('url_ad_code_468', false),
			'url_ad_code_250' => $this->input->post('url_ad_code_250', false),
		);

		return $data;
	}

	public function update_ad_spaces($ad_space)
	{
		$data = $this->input_values();
		$data_url = $this->input_url_values();

		if ($ad_space == "product_sidebar" || $ad_space == "products_sidebar" || $ad_space == "blog_post_details_sidebar" || $ad_space == "profile_sidebar") {

			$data["ad_code_300"] = $this->input->post('ad_code_300', false);
			$url_ad_code_300 = $this->input->post('url_ad_code_300', false);

			$this->load->model('upload_model');
			$file_path = $this->upload_model->ad_upload('file_ad_code_300');
			if (!empty($file_path)) {
				$data["ad_code_300"] = $this->create_ad_code($url_ad_code_300, $file_path);
			}
		} else {

			$this->load->model('upload_model');
			$file_path = $this->upload_model->ad_upload('file_ad_code_728');
			if (!empty($file_path)) {
				$data["ad_code_728"] = $this->create_ad_code($data_url["url_ad_code_728"], $file_path);
			}
			$file_path = $this->upload_model->ad_upload('file_ad_code_468');
			if (!empty($file_path)) {
				$data["ad_code_468"] = $this->create_ad_code($data_url["url_ad_code_468"], $file_path);
			}
		}

		$this->load->model('upload_model');
		$file_path = $this->upload_model->ad_upload('file_ad_code_250');
		if (!empty($file_path)) {
			$data["ad_code_250"] = $this->create_ad_code($data_url["url_ad_code_250"], $file_path);
		}

		$this->db->where('ad_space', $ad_space);
		return $this->db->update('ad_spaces', $data);
	}

	//get ads
	public function get_ads()
	{
		$query = $this->db->get('ad_spaces');
		return $query->result();
	}

	//get user ads
	public function get_user_ad($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('user_advert');
		return $query->result();
	}

	//get user ad
	public function get_users_ads_count()
	{
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $this->db->join('users', 'user_advert.user_id = users.id');
            $this->db->select('user_advert.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
            $this->db->where('users.username', $data['q']);
        }
		$query = $this->db->get('user_advert');
		return $query->num_rows();
	}


	//get user ad
	public function get_paginated_users_ads($per_page, $offset)
	{
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $this->db->join('users', 'user_advert.user_id = users.id');
            $this->db->select('user_advert.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
            $this->db->where('users.username', $data['q']);
        }
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($per_page, $offset);
		$query = $this->db->get('user_advert');
		return $query->result();
	}

	//set user ads payment
	public function set_advert_payment_status($ad_id)
	{
		$ad_id = clean_number($ad_id);
		$data['payment_status'] = 'payment_completed';
		$this->db->where('id', $ad_id);
		return $this->db->update('user_advert', $data);
	}


	//get ad codes
	public function get_ad_codes($ad_space)
	{
		$this->db->where('ad_space', "$ad_space");
		$query = $this->db->get('ad_spaces');
		return $query->row();
	}

	//create ad code
	public function create_ad_code($url, $image_path)
	{
		return '<a href="' . $url . '"><img src="' . base_url() . $image_path . '" alt="" style="border-radius: 6px; top: 0;left: 0;border-style: none;box-sizing: border-box;"></a>';
	}

	//update google adsense code
	public function update_google_adsense_code()
	{
		$data = array(
			'google_adsense_code' => $this->input->post('google_adsense_code', false)
		);
		$this->db->where('id', 1);
		return $this->db->update('general_settings', $data);
	}

}
