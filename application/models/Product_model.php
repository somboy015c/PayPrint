<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends Core_Model
{
	public function get_countries()
    {
        $this->db->order_by('countries.id');
        $query = $this->db->get('countries');
        return $query->result();
    }



    
	public function __construct()
	{
		parent::__construct();
		//default location
		$this->default_location_id = 0;
		if (!empty($this->session->userdata('modesy_default_location'))) {
			$this->default_location_id = $this->session->userdata('modesy_default_location');
		}
		//default state
		$this->default_state_id = 0;
		if (!empty($this->session->userdata('modesy_default_state'))) {
			$this->default_state_id = $this->session->userdata('modesy_default_state');
		}
	}

	public function ff()
	{
		$countr = $this->get_countries();
		$ff=0;
				foreach ($countr as $cou) {$ff++;
					
				}
				return $ff;
	}

	//add product
	public function add_product()
	{
		$bully = $this->input->post('bully', true);
		$forsale = $this->input->post('forsale', true);
		$data = array(
			'title' => $this->input->post('title', true),
			'product_type' => $this->input->post('product_type', true),
			'listing_type' => $this->input->post('listing_type', true),
			'service_branch_id' => $this->input->post('branch', true),
			'service_destination_id' => $this->input->post('destination', true),
			'price' => 0,
			'currency' => "",
			'description' => $this->input->post('description', false),
			'product_condition' => "",
			'country_id' => 0,
			'state_id' => 0,
			'city_id' => 0,
			'address' => "",
			'zip_code' => "",
			'user_id' => user()->id,
			'status' => 0,
			'is_promoted' => 0,
			'promote_start_date' => date('Y-m-d H:i:s'),
			'promote_end_date' => date('Y-m-d H:i:s'),
			'promote_plan' => "none",
			'promote_day' => 0,
			'visibility' => 1,
			'rating' => 0,
			'hit' => 0,
			'demo_url' => "",
			'external_link' => "",
			'files_included' => "",
			'quantity' => 1,
			'shipping_time' => "",
			'shipping_cost_type' => "",
			'shipping_cost' => 0,
			'is_sold' => 0,
			'is_deleted' => 0,
			'is_draft' => 1,
			'is_free_product' => 0,
			'for_sale' => $forsale,
			'post_type' => $this->input->post('bully', true),
			'qty_scale' => $this->input->post('qty_scale', true),
			'created_at' => date('Y-m-d H:i:s')
		);

		$data["slug"] = str_slug($data["title"]);
		//set category id
		$data['category_id'] = 0;
		$post_inputs = $this->input->post();
		foreach ($post_inputs as $key => $value) {
			if (strpos($key, 'category_id_') !== false) {
				$data['category_id'] = $value;
			}
		}

		if (empty($data["country_id"])) {
			$data["country_id"] = 0;
		}

		return $this->db->insert('products', $data);
	}
	//post advert
	public function post_advert()
	{
		if (auth_check()) {
			$user_id = user()->id;
		}else{
			$user_id = 0;
		}
		$ad_type = $this->input->post('ad_type', true);

		if ($ad_type == "internal") {
			$ad_target = $this->input->post('ad_target', true);
			if (!empty($ad_target)) {
				$prod = $this->get_product_by_id($ad_target);
				if ($ad_target == "shop_link") {
					$ad_link = generate_profile_url(user());
					$ad_category_id = user()->shop_category_id;
				}else{
					$ad_link = generate_product_url($prod);
					$ad_category_id = $prod->category_id;
				}
			}
			else{
				$this->session->set_flashdata('error', ("Please select your Ad Target.!"));
	                redirect($this->agent->referrer());
			}
			
			
		}
		if ($ad_type == "external"){
			$ad_link = $this->input->post('ad_code', true);
			$ad_category_id = $this->input->post('ad_category_id', true);
			if (empty($ad_link)) {
				$this->session->set_flashdata('error', ("Please Paste your Ad Code.!"));
	            redirect($this->agent->referrer());
			}elseif (empty($ad_category_id)){
				$this->session->set_flashdata('error', ("Please select your Ad category.!"));
	            redirect($this->agent->referrer());
			}
		}
		$ad_space = $this->input->post('adspace', true);
		if (empty($ad_space)) {
			$this->session->set_flashdata('error', ("Please select your Ad space"));
	            redirect($this->agent->referrer());
		}

		$ad_file_type = $this->input->post('ad_file_type', true);
		if ($ad_file_type == "text") {
			$ad_text = $this->input->post('text', true);
			$bg_image = "'".$this->input->post('bg_h', true)."'";
			$color = $this->input->post('color_h', true);
			$pad_top = clean_number($this->input->post('pad_t', true)) + 5 . "px ";
			$pad_left = clean_number($this->input->post('pad_lft', true)) + 5 . "px ";
			if (empty($ad_text)) {
				$this->session->set_flashdata('error', ("Please Edit and Format your Ad Text.!"));
	            redirect($this->agent->referrer());
			}else{
				$ad_code = '<center><a href="'. $ad_link .'"><div  style="background-image: url('. $bg_image .'); background-size: 100% 100%; background-position: center;border-radius: 4px; height: 250px;"><label style="font-style: bold;padding: '. $pad_top . $pad_left . $pad_top . $pad_left .'; font-size: 23px; font-color: black; color: '. $color .'; background-color: transparent; border: 0px; resize: none; text-align: justify;" name="text" >'. $ad_text .'</label></div></a></center>';
			}
		}
		if($ad_file_type == "image"){

			$this->load->model('upload_model');
	        $temp_path = $this->upload_model->upload_temp_image('file');
	        if ($ad_space == "middle") {
	        	$fileinfo = @getimagesize($_FILES["file"]["tmp_name"]);
		        $width = $fileinfo[0];
		        $height = $fileinfo[1];
		        if ($width == 1144 && $height == 500) {
		        	if (!empty($temp_path)) {
			            $ad_image = $this->upload_model->user_ad_upload($temp_path);
			            $this->upload_model->delete_temp_image($temp_path);
			        } else {
			                $this->session->set_flashdata('error', ("Please select an image.!"));
			                redirect($this->agent->referrer());
			        }
		        }else{
		        	$this->session->set_flashdata('error', ("image size should be 1144 X 500 for middle space Ad.!"));
			        redirect($this->agent->referrer());
		        }
			}
	        elseif ($ad_space == "sidebar"){
	        	$fileinfo = @getimagesize($_FILES["file"]["tmp_name"]);
		        $width = $fileinfo[0];
		        $height = $fileinfo[1];
		        if ($width == 335 && $height == 500) {
		        	if (!empty($temp_path)) {
			            $ad_image = $this->upload_model->user_ad_upload($temp_path);
			            $this->upload_model->delete_temp_image($temp_path);
			        } else {
			                $this->session->set_flashdata('error', ("Please select an image.!"));
			                redirect($this->agent->referrer());
			        }
		        }else{
		        	$this->session->set_flashdata('error', ("image size should be 335 X 500 for sidebar space Ad.!"));
			        redirect($this->agent->referrer());
		        }
	        }


	        
				$ad_code = '<center><a href="'. $ad_link .'"><img src="' . base_url() . $ad_image .'" alt="advertisment" style="border-radius: 6px; top: 0;left: 0;border-style: none;box-sizing: border-box; max-height: 250px;"></a></center>';
		}
		if ($ad_file_type == "slider"){
				$this->load->model('file_model');
		        $temp_images = $this->file_model->get_sess_product_images_array();


	        	if (!empty($temp_images)) {

	        		if (count($temp_images) < 2) {
	        			$this->session->set_flashdata('error', ('Slider images must be more than one or select "image" to upload an image.!'));
	                	redirect($this->agent->referrer());
	        		}elseif(count($temp_images) > 4){
	        			$this->session->set_flashdata('error', ('Slider images must not be more than four.!'));
	                	redirect($this->agent->referrer());
	        		}else{
	        			$img_count = 0; $img = array(); $count_img = 0; $err_msg = ''; $size_count = 4; $size_co =4; $img_co =0; $opp_count =0;
	        					foreach ($temp_images as $temp_image) {
									if (!empty($temp_image)) {
										$fileinfo = getimagesize(base_url() . "uploads/temp/" . $temp_image->img_default);
										$width = $fileinfo[0];
			        					$height = $fileinfo[1];

			        					if ($ad_space == "middle") {
			        						if ($width == 1144 && $height == 500) {
												$size_count++; $opp_count++;
											}else{
												delete_file_from_server("uploads/temp/" . $temp_image->img_default);
												delete_file_from_server("uploads/temp/" . $temp_image->img_big);
												delete_file_from_server("uploads/temp/" . $temp_image->img_small);
												$this->file_model->delete_image_session($temp_image->file_id);
												$size_count--; $img_co++;
											}
											if ($img_co == 1) {
												$err_msg = 'An invalid image was removed, all images size must be 1144 X 500 for middle slider space Ad.!';
											}elseif ($opp_count == 0){
												$err_msg = 'All images size must be 335 X 500 for middle slider space Ad.!';
											}
											else{
												$err_msg = $img_co . ' invalid images was removed, all images size must be 1144 X 500 for middle slider space Ad.!';
											}
			        					}
			        					if ($ad_space == "sidebar") {
			        						if ($width == 335 && $height == 500) {
												$size_count++; $opp_count++;
											}else{
												delete_file_from_server("uploads/temp/" . $temp_image->img_default);
												delete_file_from_server("uploads/temp/" . $temp_image->img_big);
												delete_file_from_server("uploads/temp/" . $temp_image->img_small);
												$this->file_model->delete_image_session($temp_image->file_id);
												$size_count--; $img_co++;
											}
											if ($img_co == 1) {
												$err_msg = 'An invalid image was removed, all images size must be 335 X 500 for sidebar slider space Ad.!';
											}elseif ($opp_count == 0){
												$err_msg = 'All images size must be 335 X 500 for sidebar slider space Ad.!';
											}
											else{
												$err_msg = $img_co . ' invalid images was removed, all images size must be 335 X 500 for sidebar slider space Ad.!';
											}
			        					} 
			        					$size_co++;
									}
								}
								foreach ($temp_images as $temp_image) {
									if (!empty($temp_image)) {
										if ($size_count == $size_co) {
											copy(FCPATH . "uploads/temp/" . $temp_image->img_default, FCPATH . "uploads/ad/" . $temp_image->img_default);
											delete_file_from_server("uploads/temp/" . $temp_image->img_default);
											delete_file_from_server("uploads/temp/" . $temp_image->img_big);
											delete_file_from_server("uploads/temp/" . $temp_image->img_small);
											if ($temp_image->is_main == 1 ) {
												$img_main = '<div class="carousel-item active"><img src="' . base_url() . "uploads/ad/" . $temp_image->img_default . '" alt="advertisement" style="border-radius: 6px; top: 0;left: 0;border-style: none;box-sizing: border-box; max-height: 250px;"></div>';
											}else{ $img_count++;
												$imgs[$img_count] = '<div class="carousel-item"><img src="' . base_url() . "uploads/ad/" . $temp_image->img_default . '" alt="advertisement" style="border-radius: 6px; top: 0;left: 0;border-style: none;box-sizing: border-box; max-height: 250px;"></div>';
											}										
										}else{
											$this->session->set_flashdata('error', ($err_msg . $size_count . $size_co));
					        				redirect($this->agent->referrer());

										}
										


							        }
							    }
								

				    			if (!empty($img_main)) {
				    				$ad_code1 = '<center><a href="'. $ad_link .'"><div id="stats_sliderzz" class="carousel slide slide_widget" data-ride="carousel" data-interval="2000"> <div class="carousel-inner" style="border-radius: 6px;">' . $img_main; 
					                foreach ($imgs as $img) {
					                $ad_code2 .= $img;
					                }
				    			}else{
				    				$ad_code1 = '<center><a href="'. $ad_link .'"><div id="stats_sliderzz" class="carousel slide slide_widget" data-ride="carousel" data-interval="2000"> <div class="carousel-inner" style="border-radius: 6px;"><div class="carousel-item active"><img src="' . base_url() . "uploads/ad/" . $temp_images[0]->img_default . '" alt="advertisement" style="border-radius: 6px; top: 0;left: 0;border-style: none;box-sizing: border-box; max-height: 250px;"></div>';
					                foreach ($imgs as $img) {
					                	if ($count_img > 0) {
					                		$ad_code2 .= $img;
					                	}
					                	$count_img++;
					                }
				    			}

					            $ad_code3 =	'</div> </div></a></center>'; 

					            $ad_code = $ad_code1 . $ad_code2 . $ad_code3;
					            $this->file_model->unset_sess_product_images_array();
	        		}	

				}else{
					$this->session->set_flashdata('error', ("Please upload slider images.!"));
	                redirect($this->agent->referrer());
				}
							
		}else{
			$this->load->model('file_model');
		    $temp_images = $this->file_model->get_sess_product_images_array();
			if (!empty($temp_images)) {
				foreach ($temp_images as $temp_image) {
					delete_file_from_server("uploads/temp/" . $temp_image->img_default);
					delete_file_from_server("uploads/temp/" . $temp_image->img_big);
					delete_file_from_server("uploads/temp/" . $temp_image->img_small);
				}
				$this->file_model->unset_sess_product_images_array();
			}
		}

		$viewers = $this->input->post('viewers', true);
		if (empty($viewers)) {
			$this->session->set_flashdata('error', ("Please select People who see this Ad.!"));
	        redirect($this->agent->referrer());
		}
		$display_on_shop = $this->input->post('display_on_shop', true);
		if ($display_on_shop == "yes") {
			$display_status = 1;
		}else{
			$display_status = 0;
		}



		$data = array(
			'user_id' => $user_id,
			'ad_category_id' => $ad_category_id,
			'ad_code' => $ad_code,
			'viewers' => $viewers,
			'adspace' => $ad_space,
			'display_on_shop' => $display_status,
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->set_advert_cache($user_id, $data['created_at']);
		return $this->db->insert('user_advert', $data);
	}

	//set user advert time
	public function set_advert_cache($user_id, $cache)
	{
		$data['advert_cache'] = $cache;
		$this->db->where('id', $user_id);
		return $this->db->update('users', $data);
	}

	//edit product details
	public function edit_product_details($id)
	{
		$id = clean_number($id);
		$product = $this->get_product_by_id($id);
		$data = array(
			'price' => $this->input->post('price', true),
			'currency' => $this->input->post('currency', true),
			'product_condition' => $this->input->post('product_condition', true),
			'country_id' => $this->input->post('country_id', true),
			'state_id' => $this->input->post('state_id', true),
			'city_id' => $this->input->post('city_id', true),
			'address' => $this->input->post('address', true),
			'zip_code' => $this->input->post('zip_code', true),
			'demo_url' => trim($this->input->post('demo_url', true)),
			'external_link' => trim($this->input->post('external_link', true)),
			'files_included' => trim($this->input->post('files_included', true)),
			'quantity' => $this->input->post('quantity', true),
			'bulk_quantity' => $this->input->post('bulk_quantity', true),
			'shipping_time' => $this->input->post('shipping_time', true),
			'shipping_cost_type' => $this->input->post('shipping_cost_type', true),
			'shipping_range' => $this->input->post('range', true),
			'is_free_product' => $this->input->post('is_free_product', true),
			'post_type' => $this->input->post('post_type', true),
			'is_draft' => 0
		);

		$data["price"] = price_database_format($data["price"]);
		if (empty($data["price"])) {
			$data["price"] = 0;
		}
		if (empty($data["product_condition"])) {
			$data["product_condition"] = "";
		}
		if (empty($data["country_id"])) {
			$data["country_id"] = 0;
		}
		if (empty($data["state_id"])) {
			$data["state_id"] = 0;
		}
		if (empty($data["city_id"])) {
			$data["city_id"] = 0;
		}
		if (empty($data["address"])) {
			$data["address"] = "";
		}
		if (empty($data["zip_code"])) {
			$data["zip_code"] = "";
		}
		if (empty($data["external_link"])) {
			$data["external_link"] = "";
		}
		if (empty($data["quantity"])) {
			$data["quantity"] = 1;
		}
		if (!empty($data["is_free_product"])) {
			$data["is_free_product"] = 1;
		} else {
			$data["is_free_product"] = 0;
		}

		//unset price if bidding system selected
		if ($this->general_settings->bidding_system == 1) {
			$array['price'] = 0;
		}

		if ($this->settings_model->is_shipping_option_require_cost($data["shipping_cost_type"]) == 1) {
			$data["shipping_cost"] = $this->input->post('shipping_cost', true);
			$data["shipping_cost"] = price_database_format($data["shipping_cost"]);
		} else {
			$data["shipping_cost"] = 0;
		}

		if ($this->input->post('submit', true) == 'save_as_draft') {
			$data["is_draft"] = 1;
		} else {
			if ($this->general_settings->approve_before_publishing == 0 || $this->auth_user->role == 'admin' || $product->for_sale == 0) {
				$data["status"] = 1;
			}
		}

		$this->db->where('id', $id);
		return $this->db->update('products', $data);
	}

	//edit product
	public function edit_product($product)
	{
		$data = array(
			'title' => $this->input->post('title', true),
			'product_type' => $this->input->post('product_type', true),
			'listing_type' => $this->input->post('listing_type', true),
			'description' => $this->input->post('description', false),
			'service_branch_id' => $this->input->post('branch', true),
			'service_destination_id' => $this->input->post('destination', true),
		);
		$data["slug"] = str_slug($data["title"]);

		//set category id
		$data['category_id'] = 0;
		$post_inputs = $this->input->post();
		foreach ($post_inputs as $key => $value) {
			if (strpos($key, 'category_id_') !== false) {
				$data['category_id'] = $value;
			}
		}

		if ($product->is_draft != 1) {
			$is_sold = $this->input->post('status_sold', true);
			if ($is_sold == "active") {
				$data["is_sold"] = 0;
			} elseif ($is_sold == "sold") {
				$data["is_sold"] = 1;
			}
			if (is_admin()) {
				$data["visibility"] = $this->input->post('visibility', true);
			}
		}

		$this->db->where('id', $product->id);
		return $this->db->update('products', $data);
	}

	//update custom fields
	public function update_product_custom_fields($product_id)
	{
		$product_id = clean_number($product_id);
		$product = $this->get_product_by_id($product_id);
		if (!empty($product)) {
			$custom_fields = $this->field_model->generate_custom_fields_array($product->category_id, null);
			if (!empty($custom_fields)) {
				//delete previous custom field values
				$this->field_model->delete_field_product_values_by_product_id($product_id);

				foreach ($custom_fields as $custom_field) {
					$input_value = $this->input->post('field_' . $custom_field->id, true);
					//add custom field values
					if (!empty($input_value)) {
						if ($custom_field->field_type == 'checkbox') {
							foreach ($input_value as $key => $value) {
								$data = array(
									'field_id' => $custom_field->id,
									'product_id' => $product_id,
									'product_filter_key' => $custom_field->product_filter_key
								);
								$data['field_value'] = '';
								$data['selected_option_common_id'] = $value;
								$this->db->insert('custom_fields_product', $data);
							}
						} else {
							$data = array(
								'field_id' => $custom_field->id,
								'product_id' => $product_id,
								'product_filter_key' => $custom_field->product_filter_key,
							);
							if ($custom_field->field_type == 'radio_button' || $custom_field->field_type == 'dropdown') {
								$data['field_value'] = '';
								$data['selected_option_common_id'] = $input_value;
							} else {
								$data['field_value'] = $input_value;
								$data['selected_option_common_id'] = '';
							}
							$this->db->insert('custom_fields_product', $data);
						}
					}
				}
			}
		}
	}

	//update slug
	public function update_slug($id)
	{
		$id = clean_number($id);
		$product = $this->get_product_by_id($id);

		if (empty($product->slug) || $product->slug == "-") {
			$data = array(
				'slug' => $product->id,
			);
		} else {
			if ($this->general_settings->product_link_structure == "id-slug") {
				$data = array(
					'slug' => $product->id . "-" . $product->slug,
				);
			} else {
				$data = array(
					'slug' => $product->slug . "-" . $product->id,
				);
			}
		}


		$product_stattion = $this->product_model->get_product_station($product->service_branch_id);

		foreach ($product_stattion as $product_station) {
			$data['country_id'] = $product_station->branch_country_id;
			$data['state_id'] = $product_station->branch_state_id;
			$data['city_id'] = $product_station->branch_city_id;
			$data['address'] = $product_station->branch_address;
			$data['zip_code'] = $product_station->branch_zip;
		}



		if (!empty($this->page_model->check_page_slug_for_product($data["slug"]))) {
			$data["slug"] .= uniqid();
		}

		$this->db->where('id', $id);
		return $this->db->update('products', $data);
	}

    //get states
    public function get_states()
    {
        $country_id = $this->input->post('country_id', true);
        $states = $this->location_model->get_states_by_country($country_id);
        foreach ($states as $item) {
            echo '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
    }

	//build query
	public function build_query()
	{
		$countr = $this->get_countries();
        $states = $this->location_model->get_states();
        $ff=0;
        if ($this->default_state_id == 0) {
            foreach ($countr as $cou) {
                if ($cou->id == $this->default_location_id) {
                    $ff++;
                }
            }
        } else {
            foreach ($states as $state) {
                if ($state->id == $this->default_state_id) {
                    $ff++;
                }
            }
        }
        
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.status', 1);
		$this->db->where('products.visibility', 1);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_sold', 0);
		$this->db->where('products.is_deleted', 0);

		

		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
			

        //default location
            if ($this->default_location_id != 0) {
                if ($this->default_state_id == 0) {
                    if ($ff > 0) {
                        $this->db->where('products.country_id', $this->default_location_id);
                    }else{
                        $this->db->where('products.state_id', $this->default_location_id);
                    }
                } else {
                    if ($ff > 0) {
                        $this->db->where('products.state_id', $this->default_state_id);
                    }else{
                        $this->db->where('products.country_id', $this->default_state_id);
                    }
                }
                
            }






	}

	//build query unlocated
	public function build_query_unlocated_forstorage()
	{
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.is_deleted', 0);
	}


	//build query unlocated
	public function build_query_unlocated()
	{
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.status', 1);
		$this->db->where('products.visibility', 1);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);

		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
	}

	//filter products
	public function filter_products($category_id)
	{
		$category_id = clean_number($category_id);
		$country = clean_number($this->input->get("country", true));
		$state = clean_number($this->input->get("state", true));
		$city = clean_number($this->input->get("city", true));
		$condition = remove_special_characters($this->input->get("condition", true));
		$p_min = remove_special_characters($this->input->get("p_min", true));
		$p_max = remove_special_characters($this->input->get("p_max", true));
		$sort = remove_special_characters($this->input->get("sort", true));
		$search = remove_special_characters(trim($this->input->get('search', true)));
		$type = remove_special_characters(trim($this->input->get('type', true)));
		$search_type = remove_special_characters(trim($this->input->get('drls', true)));

		//check if custom filters selected
		$custom_filters = array();
		$session_custom_filters = get_sess_product_filters();
		$query_string_filters = get_filters_query_string_array();
		$array_queries = array();
		if (!empty($session_custom_filters)) {
			foreach ($session_custom_filters as $filter) {
				if (isset($query_string_filters[$filter->product_filter_key])) {
					$item = new stdClass();
					$item->product_filter_key = $filter->product_filter_key;
					$item->product_filter_value = @$query_string_filters[$filter->product_filter_key];
					array_push($custom_filters, $item);
				}
			}
		}

		if (!empty($custom_filters)) {
			foreach ($custom_filters as $filter) {
				if (!empty($filter)) {
					$filter->product_filter_key = remove_special_characters($filter->product_filter_key);
					$filter->product_filter_value = remove_special_characters($filter->product_filter_value);
					$this->db->join('custom_fields_options', 'custom_fields_options.common_id = custom_fields_product.selected_option_common_id');
					$this->db->select('product_id');
					$this->db->where('custom_fields_product.product_filter_key', $filter->product_filter_key);
					$this->db->where('custom_fields_options.field_option', $filter->product_filter_value);
					$this->db->from('custom_fields_product');
					$array_queries[] = $this->db->get_compiled_select();
					$this->db->reset_query();
				}
			}
			$this->build_query();
			foreach ($array_queries as $query) {
				$this->db->where("products.id IN ($query)", NULL, FALSE);
			}
		} else {
			$this->build_query();
		}

		//add protuct filter options
		if (!empty($category_id)) {
			$category_tree_ids = $this->category_model->get_category_tree_ids_string($category_id);
			if (!empty($category_tree_ids)) {
				$this->db->where("products.category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
				$this->db->order_by('products.is_promoted', 'DESC');
			}
		}
		if (!empty($country)) {
			$this->db->where('products.country_id', $country);
		}
		if (!empty($state)) {
			$this->db->where('products.state_id', $state);
		}
		if (!empty($city)) {
			$this->db->where('products.city_id', $city);
		}
		if (!empty($condition)) {
			$this->db->where('products.product_condition', $condition);
		}
		if ($p_min != "") {
			$this->db->where('products.price >=', intval($p_min * 100));
		}
		if ($p_max != "") {
			$this->db->where('products.price <=', intval($p_max * 100));
		}
		if ($search_type == 'Tc') {
			$this->db->group_start();
			$this->db->like('products.title', $search);
			$this->db->or_like('products.description', $search);
			$this->db->group_end();
			$this->db->order_by('products.is_promoted', 'DESC');
		} elseif ($search_type == 'cat' || $search_type == 'alltc') {
			$this->db->order_by('products.is_promoted', 'DESC');
		} else {
			$this->db->where('products.service_destination_id', $search);
			$this->db->order_by('products.is_promoted', 'DESC');
		}
		//sort products
		if (!empty($sort) && $sort == "lowest_price") {
			$this->db->order_by('products.price');
		} elseif (!empty($sort) && $sort == "highest_price") {
			$this->db->order_by('products.price', 'DESC');
		} elseif (!empty($sort) && $sort == "Trending") {
			$this->db->order_by('products.weekly_trend', 'DESC');
		} elseif (!empty($sort) && $sort == "Top Rated") {
			$this->db->order_by('products.rated', 'DESC');
			$this->db->order_by('products.rating', 'DESC');
		} else {
			$this->db->order_by('products.created_at', 'DESC');
		}

		// products type
		if (!empty($type) && $type == "Store Products") {
			$this->db->where('products.for_sale', 0);
			$this->db->order_by('products.is_promoted');
		} elseif (!empty($type) && $type == "Products For Sale") {
			$this->db->where('products.for_sale', 1);
			$this->db->order_by('products.is_promoted', 'DESC');
		} else {
			$this->db->order_by('products.is_promoted', 'DESC');
		}
	}

	//search products (AJAX search)
	public function search_products($search)
	{
		$search = remove_special_characters($search);
		$this->build_query();
		$this->db->like('products.title', $search);
		$this->db->where('products.post_type', '');
		$this->db->order_by('products.is_promoted', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get('products');
		return $query->result();
	}


	//search works (AJAX search)
	public function search_works($search)
	{
		$search = remove_special_characters($search);
		$this->build_query();
		$this->db->like('products.title', $search);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.is_promoted', 'DESC');
		$this->db->limit(8);
		$query = $this->db->get('products');
		return $query->result();
	}

	//user stations
	public function user_stations($user_id)
	{
		$user_id = remove_special_characters($user_id);
		$this->db->where('comp_id', $user_id);
		$query = $this->db->get('stattions');
		return $query->result();
	}

	//get products
	public function get_products()
	{
		$this->build_query();
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}




	//get products
	public function get_product_station($station_id)
	{
		$station_id = remove_special_characters($station_id);
		$this->db->where('id', $station_id);
		$query = $this->db->get('stattions');
		return $query->result();
	}



	//get products
	public function modesy_products()
	{
		$this->db->order_by('products.id', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}


	//is hit
	public function get_targets_traffic($target, $target_id, $type)
	{
		if ($type == 'traffic') {
			$this->db->where('target', $target);
			$this->db->where('target_id', $target_id);
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get('traffics');
		} elseif ($type == 'likes') {
			if ($target == 'product') {
				$this->db->where('product_id', $target_id);
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('favorites');
			} else {
				$this->db->where('shop_id', $target_id);
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('user_favorites');
			}
		} elseif ($type == 'dislikes') {
			$this->db->where('shop_id', $target_id);
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get('user_unfavorites');
		} elseif ($type == 'follower') {
			$this->db->where('following_id', $target_id);
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get('followers');
		} elseif ($type == 'order') {
			if ($target == 'product') {
				$this->db->where('product_id', $target_id);
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('order_products');
			} else {
				$this->db->where('seller_id', $target_id);
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('order_products');
			}
		}
		return $query->result();
	}

	//is hit
	public function set_targets_weekly_trend_data($target, $target_id, $type)
	{
		$trend_datas = $this->get_targets_traffic($target, $target_id, $type);
		$tfr = array(); $count = 0;
		foreach ($trend_datas as $trend_data) {
			$time = date_difference(date('Y-m-d H:i:s'), $trend_data->created_at);
			if ($time > 0 && $time < 8) {
				$tfr[$count] = $trend_data; $count++;
			}
		}
		return $tfr;
	}




	//is hit
	public function set_targets_weekly_trends($target, $target_id)
	{
		$weekly_traffics = $this->set_targets_weekly_trend_data($target, $target_id, 'traffic');
		$target_weekly_traffic = count($weekly_traffics);

		$weekly_likes = $this->set_targets_weekly_trend_data($target, $target_id, 'likes');
		$target_weekly_like = count($weekly_likes);

		if ($target == 'user') {
			$weekly_followers = $this->set_targets_weekly_trend_data($target, $target_id, 'follower');
			$target_weekly_follower = count($weekly_followers);

			$weekly_dislikes = $this->set_targets_weekly_trend_data($target, $target_id, 'dislikes');
			$target_weekly_dislike = count($weekly_dislikes);
			$count = 4;
		} else {
			$target_weekly_follower = 0;
			$target_weekly_dislike = 0;
			$count = 3;
		}

		$weekly_orders = $this->set_targets_weekly_trend_data($target, $target_id, 'order');
		$target_weekly_order = count($weekly_orders);

		$weekly_trend = ($target_weekly_traffic + $target_weekly_like + $target_weekly_follower + $target_weekly_order - $target_weekly_dislike) / $count;
		$data = array(
			'weekly_trend' => $weekly_trend
		);


		$this->db->where('id', $target_id);
		if ($target == 'product') {
			$this->db->update('products', $data);
		} else {
			$this->db->update('users', $data);
		}
	}




	//get limited products
	public function get_products_limited($limit)
	{
		$limit = clean_number($limit);
		$this->build_query();
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('products');
		return $query->result();
	}

	//get promoted products
	public function get_promoted_products()
	{
		$key = "promoted_products";
		if ($this->default_location_id != 0) {
			$key = "promoted_products_location_" . $this->default_location_id;
		}
		$promoted_products = get_cached_data($key);
		if (empty($promoted_products)) {
			$this->build_query();
			$this->db->where('products.is_promoted', 1);
			$this->db->order_by('products.created_at', 'DESC');
			$query = $this->db->get('products');
			$promoted_products = $query->result();
			set_cache_data($key, $promoted_products);
		}
		return $promoted_products;
	}


	//get promoted products
	public function get_promoted_products_home()
	{
		$key = "promoted_products";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "promoted_products_location_" . $this->default_location_id;
			} else {
				$key = "promoted_products_location_" . $this->default_state_id;
			}
		}
		$promoted_products = get_cached_data($key);
		if (empty($promoted_products)) {
			$this->build_query();
			$this->db->where('products.post_type', '');
			$this->db->where('products.is_promoted', 1);
			$this->db->order_by('products.created_at', 'DESC');
			$query = $this->db->get('products');
			$promoted_products = $query->result();
			set_cache_data($key, $promoted_products);
		}
		return $promoted_products;
	}


	//get promoted works
	public function get_promoted_works()
	{
		$key = "promoted_works";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "promoted_works_location_" . $this->default_location_id;
			} else {
				$key = "promoted_works_location_" . $this->default_state_id;
			}
		}
		$promoted_works = get_cached_data($key);
		if (empty($promoted_works)) {
			$this->build_query();
			$this->db->where('products.is_promoted', 1);
			$this->db->where('products.post_type !=', '');
			$this->db->order_by('products.created_at', 'DESC');
			$query = $this->db->get('products');
			$promoted_works = $query->result();
			set_cache_data($key, $promoted_works);
		}
		return $promoted_works;
	}



	//get promoted products forsale
	public function get_products_forsale()
	{
		$key = "products_forsale";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "products_forsale_location_" . $this->default_location_id;
			} else {
				$key = "products_forsale_location_" . $this->default_state_id;
			}
		}
		$products_forsale = get_cached_data($key);
		if (empty($products_forsale)) {
			$this->build_query();
			$this->db->where('products.for_sale', 1);
			$this->db->where('products.post_type', '');
			$this->db->order_by('products.created_at', 'DESC');
			$query = $this->db->get('products');
			$products_forsale = $query->result();
			set_cache_data($key, $products_forsale);
		}
		return $products_forsale;
	}





	//get top works
	public function get_top_works()
	{
		$key = "top_products";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "top_products_location_" . $this->default_location_id;
			} else {
				$key = "top_products_location_" . $this->default_state_id;
			}
		}
		$top_products = get_cached_data($key);
		if (empty($top_products)) {
			$this->build_query();
			$this->db->where('products.for_sale', 0);
			$this->db->where('products.post_type !=', '');
			$this->db->where('products.rating >', 2);
			$this->db->order_by('products.rated', 'DESC');
			$query = $this->db->get('products');
			$top_products = $query->result();
			set_cache_data($key, $top_products);
		}
		return $top_products;
	}

	//get top products
	public function get_top_products()
	{
		$key = "top_products";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "top_products_location_" . $this->default_location_id;
			} else {
				$key = "top_products_location_" . $this->default_state_id;
			}
		}
		$top_products = get_cached_data($key);
		if (empty($top_products)) {
			$this->build_query();
			$this->db->where('products.for_sale', 0);
			$this->db->where('products.post_type', '');
			$this->db->where('products.rating >', 2);
			$this->db->order_by('products.rated', 'DESC');
			$query = $this->db->get('products');
			$top_products = $query->result();
			set_cache_data($key, $top_products);
		}
		return $top_products;
	}


	




	//get trending products
	public function get_trending_works()
	{
		$key = "trending_works";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "trending_works_location_" . $this->default_location_id;
			} else {
				$key = "trending_works_location_" . $this->default_state_id;
			}
		}
		$trending_works = get_cached_data($key);
		if (empty($trending_works)) {
			$this->build_query();
			$this->db->where('products.post_type !=', '');
			$this->db->where('products.weekly_trend !=', 0);
			$this->db->order_by('products.weekly_trend', 'DESC');
			$query = $this->db->get('products');
			$trending_works = $query->result();
			set_cache_data($key, $trending_works);
		}
		return $trending_works;
	}



	//get trending products
	public function get_latest_works()
	{
		$this->build_query();
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit(16);
		$query = $this->db->get('products');
		return $query->result();
	}


	//get trending products
	public function get_trending_products()
	{
		$key = "trending_products";
		if ($this->default_location_id != 0) {
			if ($this->default_state_id == 0) {
				$key = "trending_products_location_" . $this->default_location_id;
			} else {
				$key = "trending_products_location_" . $this->default_state_id;
			}
		}
		$trending_products = get_cached_data($key);
		if (empty($trending_products)) {
			$this->build_query();
			$this->db->where('products.for_sale', 0);
			$this->db->where('products.post_type', '');
			$this->db->where('products.weekly_trend !=', 0);
			$this->db->order_by('products.weekly_trend', 'DESC');
			$query = $this->db->get('products');
			$trending_products = $query->result();
			set_cache_data($key, $trending_products);
		}
		return $trending_products;
	}



	//get promoted products limited
	public function get_promoted_products_limited($limit)
	{
		$limit = clean_number($limit);
		$this->build_query();
		$this->db->where('products.is_promoted', 1);
		$this->db->limit($limit);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get promoted products count
	public function get_promoted_products_count()
	{
		$products = $this->get_promoted_products();
		if (!empty($products)) {
			return count($products);
		}
		return 0;
	}

	//check promoted products
	public function check_promoted_products()
	{
		$products = $this->get_promoted_products();
		if (!empty($products)) {
			foreach ($products as $item) {
				if (date_difference($item->promote_end_date, date('Y-m-d H:i:s')) < 1) {
					$data = array(
						'is_promoted' => 0,
					);
					$this->db->where('id', $item->id);
					$this->db->update('products', $data);
				}
			}
		}
	}


	//check active product advert
	public function check_active_product_advert()
	{
		$products = $this->get_products();
		if (!empty($products)) {
			foreach ($products as $item) {
				if (date_difference($item->advert_end_date, date('Y-m-d H:i:s')) < 1) {
					$data = array(
						'is_advert' => 0,
					);
					$this->db->where('id', $item->id);
					$this->db->update('products', $data);
				}
			}
		}
	}

	//get paginated filtered products
	public function get_paginated_filtered_products($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}


	//get paginated filtered works
	public function get_paginated_filtered_works($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}










	//get paginated filtered works
	public function get_paginated_filtered_promoted_works($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.is_promoted', 1);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered works
	public function get_paginated_filtered_top_works($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type !=', '');
		$this->db->where('products.rating >', 2);
		$this->db->order_by('products.rated', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered works
	public function get_paginated_filtered_trending_works($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$this->db->where('products.weekly_trend !=', 0);
		$this->db->order_by('products.weekly_trend', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered works
	public function get_paginated_filtered_latest_works($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}


	//get paginated filtered products
	public function get_paginated_filtered_promoted_products($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.is_promoted', 1);
		$this->db->where('products.post_type', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered products
	public function get_paginated_filtered_top_products($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type', '');
		$this->db->where('products.rating >', 2);
		$this->db->order_by('products.rated', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered forsales
	public function get_paginated_filtered_forsales($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 1);
		$this->db->where('products.post_type', '');
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered products
	public function get_paginated_filtered_trending_products($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type', '');
		$this->db->where('products.weekly_trend >', 0);
		$this->db->order_by('products.weekly_trend', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated filtered products
	public function get_paginated_filtered_latest_products($category_id, $per_page, $offset)
	{
		$this->filter_products($category_id);
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}
	//get filtered latest products
	public function get_filtered_latest_products($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->where('products.post_type', '');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get filtered latest works
	public function get_filtered_latest_works($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}
















	//get paginated filtered products count
	public function get_paginated_filtered_products_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}














	//get paginated filtered promoted products count
	public function get_paginated_filtered_promoted_products_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.is_promoted', 1);
		$this->db->where('products.post_type', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered products forsale count
	public function get_paginated_filtered_products_forsale_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 1);
		$this->db->where('products.post_type', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered top products count
	public function get_paginated_filtered_top_products_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type', '');
		$this->db->where('products.rating >', 2);
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered trending products count
	public function get_paginated_filtered_trending_products_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type', '');
		$this->db->where('products.weekly_trend !=', 0);
		$this->db->order_by('products.weekly_trend', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered latest products count
	public function get_paginated_filtered_latest_products_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type', '');
		$this->db->where('products.for_sale', 0);
		$query = $this->db->get('products');
		return $query->num_rows();
	}



	//get paginated filtered promoted works count
	public function get_paginated_filtered_promoted_works_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.is_promoted', 1);
		$this->db->where('products.post_type !=', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered top works count
	public function get_paginated_filtered_top_works_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.for_sale', 0);
		$this->db->where('products.post_type !=', '');
		$this->db->where('products.rating >', 2);
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered trending works count
	public function get_paginated_filtered_trending_works_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$this->db->where('products.weekly_trend !=', 0);
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get paginated filtered latest works count
	public function get_paginated_filtered_latest_works_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get paginated filtered works count
	public function get_paginated_filtered_works_count($category_id)
	{
		$this->filter_products($category_id);
		$this->db->where('products.post_type !=', '');
		$query = $this->db->get('products');
		return $query->num_rows();
	}











	//get products count by category
	public function get_products_count_by_category($category_id)
	{
		$category_id = clean_number($category_id);
		return $category_id;
		$this->db->where('products.category_id', $category_id);
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get related products
	public function get_related_products($product)
	{
		$rows_2 = array();
		$this->build_query();
		$this->db->where('products.category_id', $product->category_id);
		$this->db->where('products.id !=', $product->id);
		$this->db->where('products.for_sale', 0);
		$this->db->limit(6);
		$this->db->order_by('rand()');
		$query = $this->db->get('products');
		$rows = $query->result_array();
		if (count($rows) < 6) {
			$category = get_category($product->category_id);
			if (empty($category)) {
				return $rows;
			}
			if ($category->parent_id != 0) {
				$category = get_category($category->parent_id);
			}
			if (empty($category)) {
				return $rows;
			}
			$category_tree_ids = $this->category_model->get_category_tree_ids_string($category->id);
			if (!empty($category_tree_ids)) {
				$this->build_query();
				$this->db->where("products.category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
				$this->db->where('products.id !=', $product->id);
				$this->db->where('products.for_sale', 0);
				$this->db->where('products.category_id !=', $product->category_id);
				$this->db->limit(6);
				$this->db->order_by('rand()');
				$query = $this->db->get('products');
				$rows_2 = $query->result_array();
				if (!empty($rows_2)) {
					return array_merge($rows, $rows_2);
				}
			}
		}
		return $rows;
	}





	//get related sales
	public function get_related_sales($product)
	{
		$rows_2 = array();
		$this->build_query();
		$this->db->where('products.category_id', $product->category_id);
		$this->db->where('products.id !=', $product->id);
		$this->db->where('products.for_sale !=', 0);
		$this->db->limit(6);
		$this->db->order_by('rand()');
		$query = $this->db->get('products');
		$rows = $query->result_array();
		if (count($rows) < 6) {
			$category = get_category($product->category_id);
			if (empty($category)) {
				return $rows;
			}
			if ($category->parent_id != 0) {
				$category = get_category($category->parent_id);
			}
			if (empty($category)) {
				return $rows;
			}
			$category_tree_ids = $this->category_model->get_category_tree_ids_string($category->id);
			if (!empty($category_tree_ids)) {
				$this->build_query();
				$this->db->where("products.category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
				$this->db->where('products.id !=', $product->id);
				$this->db->where('products.for_sale !=', 0);
				$this->db->where('products.category_id !=', $product->category_id);
				$this->db->limit(6);
				$this->db->order_by('rand()');
				$query = $this->db->get('products');
				$rows_2 = $query->result_array();
				if (!empty($rows_2)) {
					return array_merge($rows, $rows_2);
				}
			}
		}
		return $rows;
	}





	//get related works
	public function get_related_works($product)
	{
		$rows_2 = array();
		$this->build_query();
		$this->db->where('products.category_id', $product->category_id);
		$this->db->where('products.id !=', $product->id);
		$this->db->where('products.post_type !=', '');
		$this->db->limit(6);
		$this->db->order_by('rand()');
		$query = $this->db->get('products');
		$rows = $query->result_array();
		if (count($rows) < 6) {
			$category = get_category($product->category_id);
			if (empty($category)) {
				return $rows;
			}
			if ($category->parent_id != 0) {
				$category = get_category($category->parent_id);
			}
			if (empty($category)) {
				return $rows;
			}
			$category_tree_ids = $this->category_model->get_category_tree_ids_string($category->id);
			if (!empty($category_tree_ids)) {
				$this->build_query();
				$this->db->where("products.category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
				$this->db->where('products.id !=', $product->id);
				$this->db->where('products.post_type !=', '');
				$this->db->where('products.category_id !=', $product->category_id);
				$this->db->limit(6);
				$this->db->order_by('rand()');
				$query = $this->db->get('products');
				$rows_2 = $query->result_array();
				if (!empty($rows_2)) {
					return array_merge($rows, $rows_2);
				}
			}
		}
		return $rows;
	}

	//get user products
	public function get_user_products($user_slug, $limit, $product_id)
	{
		$limit = clean_number($limit);
		$product_id = clean_number($product_id);
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.id !=', $product_id);
		$this->db->where('products.for_sale', 0);
		$this->db->limit($limit);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}


	//get user products
	public function get_user_advert_products($user_id)
	{
		$this->build_query_unlocated();
		$this->db->where('user_id', $user_id);
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}



	//get user storage
	public function get_used_storage_products($user_id)
	{
		$user = get_user($user_id);
		$this->build_query_unlocated_forstorage();
		$this->db->where('users.id', $user_id);
		$this->db->where('products.for_sale', 0);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}




	//get user storage
	public function get_used_storage($user_id)
	{
		$products = $this->get_used_storage_products($user_id); $used_storag = 0;
        foreach ($products as $product) {
            $image = $this->file_model->get_product_images($product->id);
            $audio = $this->file_model->get_product_audio($product->id);
            $video = $this->file_model->get_product_video($product->id);
            $img_size = 0; $used_storage = 0;
            

            if (!empty($image) || !empty($audio) || !empty($video)) {
                if (!empty($image)) { 
                    foreach ($image as $img) {
                    	if (!empty($img)) {
	                        $img_default_size = get_headers(base_url() . "uploads/images/" . $img->image_default, 1);
	                        $img_default_size = $img_default_size["Content-Length"];
	                        $img_size += $img_default_size;
                    	}
                    } } else { $img_size = 0; }
                if (!empty($audio)) { $aud_size = get_headers(base_url() . "uploads/audios/" . $audio->file_name, 1); 
                    $aud_size = $aud_size["Content-Length"]; } else { $aud_size = 0; }
                if (!empty($video)) { $vid_size = get_headers(base_url() . "uploads/videos/" . $video->file_name, 1); 
                    $vid_size = $vid_size["Content-Length"]; } else { $vid_size = 0; }
                $used_storage = $img_size + $aud_size + $vid_size;
            }
            $used_storag += $used_storage;
        }/*
        $num_len = strlen(html_escape($used_storag)); if ($num_len > 4) { $used_storag = substr(html_escape($used_storag), 0, 4);}*/
		return $used_storag;
	}


	//get user works
	public function get_user_pworks($user_slug, $limit, $product_id)
	{
		$limit = clean_number($limit);
		$product_id = clean_number($product_id);
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.id !=', $product_id);
		$this->db->where('products.post_type !=', '');
		$this->db->limit($limit);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get paginated user products
	public function get_paginated_user_products($user_slug, $per_page, $offset)
	{
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type', '');
		$this->db->where('products.for_sale', 0);
		$this->db->limit($per_page, $offset);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}



	//get paginated user works
	public function get_paginated_user_works($user_slug, $per_page, $offset)
	{
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type !=', '');
		$this->db->where('products.for_sale', 0);
		$this->db->limit($per_page, $offset);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}


	//get paginated user forsale
	public function get_paginated_user_forsale($user_slug, $per_page, $offset)
	{
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type', '');
		$this->db->where('products.for_sale', 1);
		$this->db->limit($per_page, $offset);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get user products count
	public function get_user_products_count($user_slug)
	{
		$user = $this->auth_model->get_user_by_slug($user_slug);
		if (empty($user)) {
			return 0;
		}
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type', '');
		$this->db->where('products.for_sale', 0);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}



	//get user forsale count
	public function get_user_forsale_count($user_slug)
	{
		$user = $this->auth_model->get_user_by_slug($user_slug);
		if (empty($user)) {
			return 0;
		}
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type', '');
		$this->db->where('products.for_sale', 1);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get user works count
	public function get_user_works_count($user_slug)
	{
		$user = $this->auth_model->get_user_by_slug($user_slug);
		if (empty($user)) {
			return 0;
		}
		$this->build_query_unlocated();
		$this->db->where('users.slug', $user_slug);
		$this->db->where('products.post_type !=', '');
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get paginated user pending products
	public function get_paginated_user_pending_products($user_id, $per_page, $offset)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.status', 0);
		$this->db->where('products.for_sale', 0);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}


	//get paginated user pending forsales
	public function get_paginated_user_pending_forsales($user_id, $per_page, $offset)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.status', 0);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.for_sale', 1);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}

	//get user pending products count
	public function get_user_pending_products_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.status', 0);
		$this->db->where('products.for_sale', 0);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$query = $this->db->get('products');
		return $query->num_rows();
	}


	//get user pending forsales count
	public function get_user_pending_forsales_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.status', 0);
		$this->db->where('products.for_sale', 1);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get user drafts count
	public function get_user_drafts_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.id', $user_id);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->where('products.is_draft', 1);
		$this->db->where('products.is_deleted', 0);
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get paginated drafts
	public function get_paginated_user_drafts($user_id, $per_page, $offset)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 1);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}

	//get user hidden products count
	public function get_user_hidden_products_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.visibility', 0);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get paginated user hidden products
	public function get_paginated_user_hidden_products($user_id, $per_page, $offset)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('products.visibility', 0);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('products');
		return $query->result();
	}

	//get user favorited products
	public function get_user_favorited_products($user_id)
	{
		$user_id = clean_number($user_id);
		$this->build_query_unlocated();
		$this->db->join('favorites', 'products.id = favorites.product_id');
		$this->db->select('products.*');
		$this->db->where('favorites.user_id', $user_id);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get user favorited products count
	public function get_user_favorited_products_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->build_query_unlocated();
		$this->db->join('favorites', 'products.id = favorites.product_id');
		$this->db->select('products.*');
		$this->db->where('favorites.user_id', $user_id);
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->num_rows();
	}

	//get user downloads count
	public function get_user_downloads_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->where('buyer_id', $user_id);
		$query = $this->db->get('digital_sales');
		return $query->num_rows();
	}

	//get background image
	public function get_bg_images()
    {
        $this->db->order_by('id');
        $query = $this->db->get('bg_images');
        return $query->result();
    }

	//get paginated downloads
	public function get_paginated_user_downloads($user_id, $per_page, $offset)
	{
		$user_id = clean_number($user_id);
		$this->db->where('buyer_id', $user_id);
		$this->db->order_by('purchase_date', 'DESC');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get('digital_sales');
		return $query->result();
	}

	//get digital sale
	public function get_digital_sale($sale_id)
	{
		$sale_id = clean_number($sale_id);
		$this->db->where('id', $sale_id);
		$query = $this->db->get('digital_sales');
		return $query->row();
	}

	//get digital sale by buyer id
	public function get_digital_sale_by_buyer_id($buyer_id, $product_id)
	{
		$buyer_id = clean_number($buyer_id);
		$product_id = clean_number($product_id);
		$this->db->where('buyer_id', $buyer_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('digital_sales');
		return $query->row();
	}

	//get digital sale by order id
	public function get_digital_sale_by_order_id($buyer_id, $product_id, $order_id)
	{
		$buyer_id = clean_number($buyer_id);
		$product_id = clean_number($product_id);
		$order_id = clean_number($order_id);
		$this->db->where('buyer_id', $buyer_id);
		$this->db->where('product_id', $product_id);
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('digital_sales');
		return $query->row();
	}

	//get product by id
	public function get_product_by_id($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('products');
		return $query->row();
	}

	//get available product
	public function get_available_product($id)
	{
		$id = clean_number($id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.status', 1);
		$this->db->where('products.visibility', 1);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_sold', 0);
		$this->db->where('products.is_deleted', 0);
		$this->db->where('products.id', $id);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$query = $this->db->get('products');
		return $query->row();
	}

	//get product by slug
	public function get_product_by_slug($slug)
	{
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.slug', $slug);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->row();
	}

	//is product favorited
	public function is_product_in_favorites($product_id)
	{
		$product_id = clean_number($product_id);

		$favorites = $this->session->userdata('mds_guest_favorites');
		if (!empty($favorites)) {
			foreach ($favorites as $favorite) {
				if ($favorite == $product_id) {
					return true;
				}
			}
		}
		return false;
	}

	//get product favorited count
	public function get_product_favorited_count($product_id)
	{
		$product_id = clean_number($product_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('favorites');
		return $query->num_rows();
	}

	//add remove favorites
	public function add_remove_favorites($product_id)
	{
		$product_id = clean_number($product_id);
		$date = date('Y-m-d H:i:s');
		if ($this->is_product_in_favorites($product_id)) {
			$favorites = array(); $favorites_cache = array();
			if (!empty($this->session->userdata('mds_guest_favorites'))) {
				$favorites = $this->session->userdata('mds_guest_favorites');
			}
			if (!empty($this->session->userdata('mds_guest_favorites_cache'))) {
				$favorites_cache = $this->session->userdata('mds_guest_favorites_cache');
			}
			$new = array(); $c_data = array();
			if (!empty($favorites)) {
				foreach ($favorites as $favorite) {
					if ($favorite != $product_id) {
						array_push($new, $favorite);
					}
				}
			}
			$this->session->set_userdata('mds_guest_favorites', $new);
			if (!empty($favorites_cache)) {
				foreach ($favorites_cache as $cache) {
					if ($cache['product_id'] == $product_id) {
	                    $c_data['product_id'] = $cache['product_id'];
	                    $c_data['created_at'] = $cache['created_at'];
					}
				}
			}
			$this->db->where('created_at', $c_data['created_at']);
			$this->db->where('product_id', $c_data['product_id']);
			$this->db->delete('favorites');

		} else {
			$favorites = array(); $favorites_cache = array(); $cache_data = array( 'product_id' => $product_id, 'created_at' => $date);
			if (!empty($this->session->userdata('mds_guest_favorites'))) {
				$favorites = $this->session->userdata('mds_guest_favorites');
			}
			if (!empty($this->session->userdata('mds_guest_favorites_cache'))) {
				$favorites_cache = $this->session->userdata('mds_guest_favorites_cache');
			}
			array_push($favorites_cache, $cache_data);  array_push($favorites, $product_id);
			$this->session->set_userdata('mds_guest_favorites', $favorites);
			$this->session->set_userdata('mds_guest_favorites_cache', $favorites_cache);

			if ($this->auth_check) { $visitor_id = $this->auth_user->id; } else { $visitor_id = 0; }
			$data = array(
				'created_at' => $date,
				'user_id' => $visitor_id,
				'product_id' => $product_id
			);
			$this->db->insert('favorites', $data);
		}
	}





	//is user favorited
	public function is_user_in_favorites($user_id)
	{
		$user_id = clean_number($user_id);
		$favorites = $this->session->userdata('mds_guest_user_favorites');
		if (!empty($favorites)) {
			foreach ($favorites as $favorite) {
				if ($favorite == $user_id) {
					return true;
				}
			}
		}
		return false;
	}

	//get user favorited count
	public function get_user_favorited_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->where('shop_id', $user_id);
		$query = $this->db->get('user_favorites');
		return $query->num_rows();
	}

	//add remove favorites
	public function add_remove_user_favorites($user_id)
	{
		$user_id = clean_number($user_id);
		$date = date('Y-m-d H:i:s');
		if ($this->is_user_in_favorites($user_id)) {
			$favorites = array(); $favorites_cache = array();
			if (!empty($this->session->userdata('mds_guest_user_favorites'))) {
				$favorites = $this->session->userdata('mds_guest_user_favorites');
			}
			if (!empty($this->session->userdata('mds_guest_user_favorites_cache'))) {
				$favorites_cache = $this->session->userdata('mds_guest_user_favorites_cache');
			}
			$new = array(); $c_data = array();
			if (!empty($favorites)) {
				foreach ($favorites as $favorite) {
					if ($favorite != $user_id) {
						array_push($new, $favorite);
					}
				}
			}
			$this->session->set_userdata('mds_guest_user_favorites', $new);
			if (!empty($favorites_cache)) {
				foreach ($favorites_cache as $cache) {
					if ($cache['shop_id'] == $user_id) {
	                    $c_data['shop_id'] = $cache['shop_id'];
	                    $c_data['created_at'] = $cache['created_at'];
					}
				}
			}
			$this->db->where('created_at', $c_data['created_at']);
			$this->db->where('shop_id', $c_data['shop_id']);
			$this->db->delete('user_favorites');

		} else {
			$favorites = array(); $favorites_cache = array(); $cache_data = array( 'shop_id' => $user_id, 'created_at' => $date);
			if (!empty($this->session->userdata('mds_guest_user_favorites'))) {
				$favorites = $this->session->userdata('mds_guest_user_favorites');
			}
			if (!empty($this->session->userdata('mds_guest_user_favorites_cache'))) {
				$favorites_cache = $this->session->userdata('mds_guest_user_favorites_cache');
			}
			array_push($favorites_cache, $cache_data);  array_push($favorites, $user_id);
			$this->session->set_userdata('mds_guest_user_favorites', $favorites);
			$this->session->set_userdata('mds_guest_user_favorites_cache', $favorites_cache);

			if ($this->auth_check) { $visitor_id = $this->auth_user->id; } else { $visitor_id = 0; }
			$data = array(
				'created_at' => $date,
				'user_id' => $visitor_id,
				'shop_id' => $user_id
			);
			$this->db->insert('user_favorites', $data);
		}
	}

	//is user unfavorited
	public function is_user_in_unfavorites($user_id)
	{
		$user_id = clean_number($user_id);
		
		$favorites = $this->session->userdata('mds_guest_user_unfavorites');
		if (!empty($favorites)) {
			foreach ($favorites as $favorite) {
				if ($favorite == $user_id) {
					return true;
				}
			}
		}
		return false;
	}

	//get user unfavorited count
	public function get_user_unfavorited_count($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->where('shop_id', $user_id);
		$query = $this->db->get('user_unfavorites');
		return $query->num_rows();
	}

	//add remove favorites
	public function add_remove_user_unfavorites($user_id)
	{
		$user_id = clean_number($user_id);
		$date = date('Y-m-d H:i:s');
		if ($this->is_user_in_unfavorites($user_id)) {
			$unfavorites = array(); $unfavorites_cache = array();
			if (!empty($this->session->userdata('mds_guest_user_unfavorites'))) {
				$unfavorites = $this->session->userdata('mds_guest_user_unfavorites');
			}
			if (!empty($this->session->userdata('mds_guest_user_unfavorites_cache'))) {
				$unfavorites_cache = $this->session->userdata('mds_guest_user_unfavorites_cache');
			}
			$new = array(); $c_data = array();
			if (!empty($unfavorites)) {
				foreach ($unfavorites as $unfavorite) {
					if ($unfavorite != $user_id) {
						array_push($new, $unfavorite);
					}
				}
			}
			$this->session->set_userdata('mds_guest_user_unfavorites', $new);
			if (!empty($unfavorites_cache)) {
				foreach ($unfavorites_cache as $cache) {
					if ($cache['shop_id'] == $user_id) {
	                    $c_data['shop_id'] = $cache['shop_id'];
	                    $c_data['created_at'] = $cache['created_at'];
					}
				}
			}
			$this->db->where('created_at', $c_data['created_at']);
			$this->db->where('shop_id', $c_data['shop_id']);
			$this->db->delete('user_unfavorites');

		} else {
			$unfavorites = array(); $unfavorites_cache = array(); $cache_data = array( 'shop_id' => $user_id, 'created_at' => $date);
			if (!empty($this->session->userdata('mds_guest_user_unfavorites'))) {
				$unfavorites = $this->session->userdata('mds_guest_user_unfavorites');
			}
			if (!empty($this->session->userdata('mds_guest_user_unfavorites_cache'))) {
				$unfavorites_cache = $this->session->userdata('mds_guest_user_unfavorites_cache');
			}
			array_push($unfavorites_cache, $cache_data);  array_push($unfavorites, $user_id);
			$this->session->set_userdata('mds_guest_user_unfavorites', $unfavorites);
			$this->session->set_userdata('mds_guest_user_unfavorites_cache', $unfavorites_cache);

			if ($this->auth_check) { $visitor_id = $this->auth_user->id; } else { $visitor_id = 0; }
			$data = array(
				'created_at' => $date,
				'user_id' => $visitor_id,
				'shop_id' => $user_id
			);
			$this->db->insert('user_unfavorites', $data);
		}
	}







	//is visitor in  product
	public function is_visitor_in_product($product_id)
	{
		$product_id = clean_number($product_id);
		
		$visitors = $this->session->userdata('mds_product_visitors');
		if (!empty($visitors)) {
			foreach ($visitors as $visitor) {
				if ($visitor == $product_id) {
					return true;
				}
			}
		}
		return false;
	}



	//increase product hit
	public function increase_product_hit($product)
	{
		if (!empty($product) && (!auth_check() || (auth_check() && $product->user_id != user()->id))):
			if (auth_check()) {
				$user_id = user()->id;
			} else {
				$user_id = 0;
			}
			$date = date('Y-m-d H:i:s');
			$dat = array(
				'target' => 'product',
				'target_id' => $product->id,
				'user_id' => $user_id,
				'created_at' => $date
			);
			$data = array(
				'hit' => $product->hit + 1
			);


			if (!$this->is_visitor_in_product($product->id)) {
				$visitors = array();
				if (!empty($this->session->userdata('mds_product_visitors'))) {
					$visitors = $this->session->userdata('mds_product_visitors');
				}
				array_push($visitors, $product->id);
				$this->session->set_userdata('mds_product_visitors', $visitors);
				$this->db->where('id', $product->id);
				$this->db->update('products', $data);
				$this->db->insert('viewers', $dat);
			}

			if (!isset($_COOKIE['modesy_product_traffic_' . $product->id])) :
				//increase hit per day
				setcookie("modesy_product_traffic_" . $product->id, '1', time() + (86400), "/");

				$this->db->insert('traffics', $dat);
			endif;




		endif;
	}








	//is visitor in  user
	public function is_visitor_in_user($user_id)
	{
		$user_id = clean_number($user_id);
		
		$visitors = $this->session->userdata('mds_user_visitors');
		if (!empty($visitors)) {
			foreach ($visitors as $visitor) {
				if ($visitor == $user_id) {
					return true;
				}
			}
		}
		return false;
	}


	//is visitor in  user
	public function is_traffic_in_user($user_id)
	{
		$user_id = clean_number($user_id);
		$v = 0;
		$traffics = $this->session->userdata('mds_visitor_traffics');
		if (!empty($traffics)) {
			foreach ($traffics as $traffic) {
				if ($traffic['shop_id'] == $user_id) {
					$v = $traffic['traffics'];
				}
			}
		}
		if ($v != 0) {
			return $v;
		} else {
			return false;
		}
	}







	//increase user hit
	public function increase_user_hit($user)
	{
		if (!empty($user) && (!auth_check() || (auth_check() && $user->id != user()->id))):

			if (auth_check()) {
				$user_id = user()->id;
			} else {
				$user_id = 0;
			}

			$date = date('Y-m-d H:i:s');
			$dat = array(
				'target' => 'user',
				'target_id' => $user->id,
				'user_id' => $user_id,
				'created_at' => $date
			);
			$data = array(
				'hit' => $user->hit + 1
			);

			if (!$this->is_visitor_in_user($user->id)) {
				$visitors = array();
				if (!empty($this->session->userdata('mds_user_visitors'))) {
					$visitors = $this->session->userdata('mds_user_visitors');
				}
				array_push($visitors, $user->id);
				$this->session->set_userdata('mds_user_visitors', $visitors);
				$this->db->where('id', $user->id);
				$this->db->update('users', $data);
				$this->db->insert('viewers', $dat);
			}

			if (!isset($_COOKIE['modesy_user_traffic_' . $user->id])) :
				//increase hit per day
				setcookie("modesy_user_traffic_" . $user->id, '1', time() + (86400), "/");

				$this->db->insert('traffics', $dat);

				//increase traffic per day
				if (!$this->is_traffic_in_user($user->id)) {
					$visitor_traffic = array(); $shop = array( 'shop_id' => $user->id, 'traffics' => 1);
					if (!empty($this->session->userdata('mds_visitor_traffics'))) {
						$visitor_traffic = $this->session->userdata('mds_visitor_traffics');
					}
					array_push($visitor_traffic, $shop);
					$this->session->set_userdata('mds_visitor_traffics', $visitor_traffic);
				} else {
					$traffic_count = $this->is_traffic_in_user($user->id);
					$visitor_traffic = array(); $shop = array( 'shop_id' => $user->id, 'traffics' => $traffic_count + 1);
					if (!empty($this->session->userdata('mds_visitor_traffics'))) {
						$visitor_traffic = $this->session->userdata('mds_visitor_traffics');
					}
					array_push($visitor_traffic, $shop);
					$this->session->set_userdata('mds_visitor_traffics', $visitor_traffic);
				}
			endif;
			
		endif;
	}







/*
	//increase user hit
	public function update_modesy_daily_traffics()
	{
		$members = $this->profile_model->modesy_members();
		$products = $this->modesy_products();
		if (!isset($_COOKIE['modesy_daily_traffic'])) :

			$expiry = time() + (86400 * 2);
			setcookie("modesy_daily_traffic", json_encode($expiry), $expiry, "/");

			foreach ($members as $member) {
				$this->set_targets_weekly_trends('user', $member->id);
			}
			foreach ($products as $product) {
				$this->set_targets_weekly_trends('product', $product->id);
			}
		else:
			// extract the expiry time
			$cookie = json_decode( $_COOKIE['modesy_daily_traffic'] );
			$time = date('Y-m-d H:i:s', $cookie);
			$expiry_date = date_difference($time, date('Y-m-d H:i:s'));
			if ($expiry_date < 2) {
				// Update expiry time
				$expiry = time() + (86400 * 2);
				setcookie("modesy_daily_traffic", json_encode($expiry), $expiry, "/");
				
				foreach ($members as $member) {
					$this->set_targets_weekly_trends('user', $member->id);
				}
				foreach ($products as $product) {
					$this->set_targets_weekly_trends('product', $product->id);
				}
			}

		endif;
	}
*/













	//get rss products by category
	public function get_rss_products_by_category($category_id)
	{
		$category_id = clean_number($category_id);
		$category_tree_ids = $this->category_model->get_category_tree_ids_string($category_id);
		if (empty($category_tree_ids)) {
			return array();
		}
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.status', 1);
		$this->db->where('products.visibility', 1);
		$this->db->where("products.category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_sold', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//get rss products by user
	public function get_rss_products_by_user($user_id)
	{
		$user_id = clean_number($user_id);
		$this->db->join('users', 'products.user_id = users.id');
		$this->db->select('products.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
		$this->db->where('users.banned', 0);
		$this->db->where('products.status', 1);
		$this->db->where('products.visibility', 1);
		$this->db->where('users.id', $user_id);
		$this->db->where('products.is_draft', 0);
		$this->db->where('products.is_sold', 0);
		$this->db->where('products.is_deleted', 0);
		if ($this->general_settings->vendor_verification_system == 1) {
			$this->db->where('users.role !=', 'member');
		}
		$this->db->order_by('products.created_at', 'DESC');
		$query = $this->db->get('products');
		return $query->result();
	}

	//set product as sold
	public function set_product_as_sold($product_id)
	{
		$product_id = clean_number($product_id);
		$product = $this->get_product_by_id($product_id);
		if (!empty($product)) {
			if (user()->id == $product->user_id) {
				if ($product->is_sold == 1) {
					$data = array(
						'is_sold' => 0
					);
				} else {
					$data = array(
						'is_sold' => 1
					);
				}
				$this->db->where('id', $product_id);
				return $this->db->update('products', $data);
			}
		}
		return false;
	}

	//set forsale as product
	public function set_forsale_as_product($product_id)
	{
		$product_id = clean_number($product_id);
		$product = $this->get_product_by_id($product_id);
		if (!empty($product)) {
			if (user()->id == $product->user_id) {
					$data = array(
						'for_sale' => 0
					);
				$this->db->where('id', $product_id);
				return $this->db->update('products', $data);
			}
		}
		return false;
	}

	//delete product
	public function delete_product($product_id)
	{
		$product_id = clean_number($product_id);
		$product = $this->get_product_by_id($product_id);
		if (!empty($product)) {
			$data = array(
				'is_deleted' => 1
			);
			$this->db->where('id', $product_id);
			return $this->db->update('products', $data);
		}
		return false;
	}

	/*
	*------------------------------------------------------------------------------------------
	* LICENSE KEYS
	*------------------------------------------------------------------------------------------
	*/

	//add license keys
	public function add_license_keys($product_id)
	{
		$license_keys = trim($this->input->post('license_keys', true));
		$allow_duplicate = $this->input->post('allow_duplicate', true);

		$license_keys_array = explode(",", $license_keys);
		if (!empty($license_keys_array)) {
			foreach ($license_keys_array as $license_key) {
				$license_key = trim($license_key);
				if (!empty($license_key)) {

					//check duplicate
					$add_key = true;
					if (empty($allow_duplicate)) {
						$row = $this->check_license_key($product_id, $license_key);
						if (!empty($row)) {
							$add_key = false;
						}
					}

					//add license key
					if ($add_key == true) {
						$data = array(
							'product_id' => $product_id,
							'license_key' => trim($license_key),
							'is_used' => 0
						);
						$this->db->insert('product_license_keys', $data);
					}

				}
			}
		}
	}

	//get license keys
	public function get_license_keys($product_id)
	{
		$product_id = clean_number($product_id);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('product_license_keys');
		return $query->result();
	}

	//get license key
	public function get_license_key($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('product_license_keys');
		return $query->row();
	}

	//get unused license key
	public function get_unused_license_key($product_id)
	{
		$product_id = clean_number($product_id);
		$this->db->where('product_id', $product_id);
		$this->db->where('is_used', 0);
		$query = $this->db->get('product_license_keys');
		return $query->row();
	}

	//check license key
	public function check_license_key($product_id, $license_key)
	{
		$product_id = clean_number($product_id);
		$this->db->where('license_key', $license_key);
		$this->db->where('product_id', $product_id);
		$query = $this->db->get('product_license_keys');
		return $query->row();
	}

	//set license key used
	public function set_license_key_used($id)
	{
		$id = clean_number($id);
		$data = array(
			'is_used' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('product_license_keys', $data);
	}

	//delete license key
	public function delete_license_key($id)
	{
		$id = clean_number($id);
		$license_key = $this->get_license_key($id);
		if (!empty($license_key)) {
			$this->db->where('id', $id);
			return $this->db->delete('product_license_keys');
		}
		return false;
	}

}
