<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends Home_Core_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->comment_limit = 6;
		$this->blog_paginate_per_page = 12;
		$this->product_paginate_per_page = 18;
		$this->promoted_products_limit = $this->general_settings->index_promoted_products_count;
	}


	/**
	 * Index
	 */
	public function index()
	{
		get_method();
		$this->load->view('index');
	}

	/**
	 * Contact
	 */
	public function contact()
	{
		get_method();
		$data['title'] = trans("contact");
		$data['description'] = trans("contact") . " - " . $this->app_name;
		$data['keywords'] = trans("contact") . "," . $this->app_name;
		$this->load->view('partials/_header', $data);
		$this->load->view('contact', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Contact Page Post
	 */
	public function contact_post()
	{
		post_method();
		//validate inputs
		$this->form_validation->set_rules('name', trans("name"), 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('email', trans("email_address"), 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('message', trans("message"), 'required|xss_clean|max_length[5000]');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('form_data', $this->contact_model->input_values());
			redirect($this->agent->referrer());
		} else {
			if (!$this->recaptcha_verify_request()) {
				$this->session->set_flashdata('form_data', $this->contact_model->input_values());
				$this->session->set_flashdata('error', trans("msg_recaptcha"));
				redirect($this->agent->referrer());
			} else {
				if ($this->contact_model->add_contact_message()) {
					$this->session->set_flashdata('success', trans("msg_contact_success"));
					redirect($this->agent->referrer());
				} else {
					$this->session->set_flashdata('form_data', $this->contact_model->input_values());
					$this->session->set_flashdata('error', trans("msg_contact_error"));
					redirect($this->agent->referrer());
				}
			}

		}
	}
/**
	 * send report
	 */
	public function send_report()
	{
		post_method();
		//validate inputs
		if ($this->contact_model->add_shop_report()) {
			$this->session->set_flashdata('success', ("Your report has been successfully sent!"));
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', ("failed to send message, please try again!"));
			redirect($this->agent->referrer());
		}
	}

	/**
	 * Dynamic Page by Name Slug
	 */
	public function any($slug)
	{
		get_method();
		$slug = decode_slug($slug);
		//index page
		if (empty($slug)) {
			redirect(lang_base_url());
		}

		$data['page'] = $this->page_model->get_page($slug);
		//if exists
		if (!empty($data['page'])) {
			if ($data['page']->visibility == 0) {
				$this->error_404();
			} else {
				$data['title'] = $data['page']->title;
				$data['description'] = $data['page']->description;
				$data['keywords'] = $data['page']->keywords;

				$this->load->view('partials/_header', $data);
				$this->load->view('page', $data);
				$this->load->view('partials/_footer');
			}
		} else {
			//check category
			$category = $this->category_model->get_category_by_slug($slug);
			if (!empty($category)) {
				$this->category($category);
			} else {
				$this->product($slug);
			}
		}
	}

	/**
	 * Products
	 */
	public function products()
	{
		get_method();
		$search = '';
		$data['search'] = '';
		$data['search_type'] = $this->input->get('drls', TRUE);
		$data['type'] = $this->input->get('type', TRUE);
		
		// search String translations
		$data['heading'] = 'Transport&nbsp;Services';

		$data['title'] = ($data['heading']);
		$data['description'] = ($data['heading']) . " - " . $this->app_name;
		$data['keywords'] = ($data['heading']) . "," . $this->app_name;
		//get paginated posts
		if ($data['search_type'] != "product" && $data['search_type'] != "Tc" && $data['search_type'] != "alltc") {
			redirect(lang_base_url());
		}
		$link = lang_base_url() . 'products';
		


		if ($search == 'latest_products') {
			$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_latest_products_count(null), $this->product_paginate_per_page);
			$data['products'] = $this->product_model->get_paginated_filtered_latest_products(null, $pagination['per_page'], $pagination['offset']);
		} else {
			$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_latest_products_count(null), $this->product_paginate_per_page);
			$data['products'] = $this->product_model->get_paginated_filtered_latest_products(null, $pagination['per_page'], $pagination['offset']);
		}

		


		$data["categories"] = $this->category_model->get_parent_categories();
		$data["subcategories"] = $this->category_model->get_subcategories_by_parent_id(12);
		$data['show_location_filter'] = false;
		if (!empty($data['products'])) {
			foreach ($data['products'] as $item) {
				if ($item->product_type == 'physical') {
					$data['show_location_filter'] = true;
					break;
				}
			}
		}

		$this->load->view('partials/_header', $data);
		$this->load->view('product/products', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Category
	 */
	public function category($category)
	{
		if (empty($category)) {
			redirect($this->agent->referrer());
		}
		$data["category"] = $category;
		$data['title'] = !empty($data["category"]->title_meta_tag) ? $data["category"]->title_meta_tag : $data["category"]->name;
		$data['description'] = $data["category"]->description;
		$data['keywords'] = $data["category"]->keywords;
		$data['search_type'] = $this->input->get('drls', TRUE);
		$data['sort'] = $this->input->get('sort', TRUE);
		$data['type'] = $this->input->get('type', TRUE);
		$data['country'] = $this->input->get('country', TRUE);
		$data['state'] = $this->input->get('state', TRUE);
		$data['city'] = $this->input->get('city', TRUE);
		$data['condition'] = $this->input->get('condition', TRUE);
		$search = trim($this->input->get('search', TRUE));
		if (!empty($search) && $search != "promoted_products" && $search != "product_for_sales" && $search != "top_products" && $search != "trending_products" && $search != "latest_products" && $search != "promoted_works" && $search != "top_works" && $search != "trending_works" && $search != "latest_works") {
			$data['filter_search'] = $search;
		}
		$data["categories"] = $this->category_model->get_subcategories_by_parent_id($data["category"]->id);
			
		$data["subcategory"] = $category;
		$data["subcategories"] = $this->category_model->get_subcategories_by_parent_id(12);
		if (empty($data["categories"])) {
			$data["categories"] = $this->category_model->get_subcategories_by_parent_id($data["category"]->parent_id);
		}

		//get paginated posts
		$link = generate_category_url($data["category"]);
		if ($data['search_type'] == "product"){
			if ($search == 'promoted_products') {
				$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_promoted_products_count($data["category"]->id), $this->product_paginate_per_page);
				$data['products'] = $this->product_model->get_paginated_filtered_promoted_products($data["category"]->id, $pagination['per_page'], $pagination['offset']);
			} elseif ($search == 'latest_products') {
				$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_latest_products_count($data["category"]->id), $this->product_paginate_per_page);
				$data['products'] = $this->product_model->get_paginated_filtered_latest_products($data["category"]->id, $pagination['per_page'], $pagination['offset']);
			} else {
				$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_products_count($data["category"]->id), $this->product_paginate_per_page);
				$data['products'] = $this->product_model->get_paginated_filtered_products($data["category"]->id, $pagination['per_page'], $pagination['offset']);
			}
		}  else {
			$pagination = $this->paginate($link, $this->product_model->get_paginated_filtered_products_count($data["category"]->id), $this->product_paginate_per_page);
			$data['products'] = $this->product_model->get_paginated_filtered_products($data["category"]->id, $pagination['per_page'], $pagination['offset']);
		}

		if ($category->name == 'Services' || $category->parent_id == 12) {
			$data['show_location_filter'] = true;
			$data["parent_category"] = null;
		} else {
			$data['show_location_filter'] = false;
			if (!empty($data['products'])) {
				foreach ($data['products'] as $item) {
					if ($item->product_type == 'physical') {
						$data['show_location_filter'] = true;
						break;
					}
				}
			}
			if ($data["category"]->parent_id == 0) {
				$data["parent_category"] = null;
			} else {
				$data["parent_category"] = $this->category_model->get_category_joined($data["category"]->parent_id);
			}
		}



		$this->load->view('partials/_header', $data);
		$this->load->view('product/products', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * SubCategory
	 */
	public function subcategory($parent_slug, $slug)
	{
		get_method();
		$slug = decode_slug($slug);
		$category = $this->category_model->get_category_by_slug($slug);
		if (!empty($category)) {
			$this->category($category);
		} else {
			$this->error_404();
		}
	}

	/**
	 * Product
	 */
	public function product($slug)
	{
		get_method();
		$slug = decode_slug($slug);
		$this->review_limit = 5;
		$this->comment_limit = 5;

		$data["product"] = $this->product_model->get_product_by_slug($slug);
		if (empty($data['product'])) {
			$this->error_404();
		} else {
			if ($data['product']->status == 0 || $data['product']->visibility == 0) {
				if (!auth_check()) {
					redirect(lang_base_url());
				}
				if ($data['product']->user_id != user()->id && user()->role != "admin") {
					redirect(lang_base_url());
				}
			}

			$data["category"] = $this->category_model->get_category_joined($data["product"]->category_id);

			//images
			$data["product_images"] = $this->file_model->get_product_images($data["product"]->id);

			//related products
			$key = "related_products_" . $data["product"]->id;
			if (empty($data["product"]->post_type) && $data["product"]->for_sale != 1) {
				$data["related_products"] = get_cached_data($key);
				if (empty($data["related_products"])) {
					$data["related_products"] = $this->product_model->get_related_products($data["product"]);
					set_cache_data($key, $data["related_products"]);
				}
			} elseif (empty($data["product"]->post_type) && $data["product"]->for_sale == 1) {
				$data["related_products"] = get_cached_data($key);
				if (empty($data["related_products"])) {
					$data["related_products"] = $this->product_model->get_related_sales($data["product"]);
					set_cache_data($key, $data["related_products"]);
				}
			} elseif (!empty($data["product"]->post_type)) {
				$data["related_products"] = get_cached_data($key);
				if (empty($data["related_products"])) {
					$data["related_products"] = $this->product_model->get_related_works($data["product"]);
					set_cache_data($key, $data["related_products"]);
				}
			}

			$data["user"] = $this->auth_model->get_user($data["product"]->user_id);

			//user products
			$key = 'more_products_by_user_' . $data["user"]->id . 'cache';
			if (empty($data["product"]->post_type)) {
				$data['user_products'] = get_cached_data($key);
				if (empty($data['user_products'])) {
					$data["user_products"] = $this->product_model->get_user_products($data["user"]->slug, 3, $data["product"]->id);
					set_cache_data($key, $data['user_products']);
				}
			} else {
				$data['user_products'] = get_cached_data($key);
				if (empty($data['user_products'])) {
					$data["user_products"] = $this->product_model->get_user_pworks($data["user"]->slug, 4, $data["product"]->id);
					set_cache_data($key, $data['user_products']);
				}
			}

			$data['review_count'] = $this->review_model->get_review_count($data["product"]->id);
			$data['reviews'] = $this->review_model->get_limited_reviews($data["product"]->id, $this->review_limit);
			$data['review_limit'] = $this->review_limit;

			$data['comment_count'] = $this->comment_model->get_product_comment_count($data["product"]->id);
			$data['comments'] = $this->comment_model->get_comments($data["product"]->id, $this->comment_limit);
			$data['comment_limit'] = $this->comment_limit;
			$data["custom_fields"] = $this->field_model->generate_custom_fields_array($data["product"]->category_id, $data["product"]->id);
			$data["half_width_product_variations"] = $this->variation_model->get_half_width_product_variations($data["product"]->id, $this->selected_lang->id);
			$data["full_width_product_variations"] = $this->variation_model->get_full_width_product_variations($data["product"]->id, $this->selected_lang->id);

			$data["video"] = $this->file_model->get_product_video($data["product"]->id);
			$data["audio"] = $this->file_model->get_product_audio($data["product"]->id);

			$data["digital_sale"] = null;
			if ($data["product"]->product_type == 'digital' && $this->auth_check) {
				$data["digital_sale"] = get_digital_sale_by_buyer_id($this->auth_user->id, $data["product"]->id);
			}
			//og tags
			$data['show_og_tags'] = true;
			$data['og_title'] = $data['product']->title;
			$description_text = trim(html_escape(strip_tags($data['product']->description)));
			$data['og_description'] = character_limiter($description_text, 200, "");
			$data['og_type'] = "article";
			$data['og_url'] = lang_base_url() . $data['product']->slug;
			$data['og_image'] = get_product_image($data['product']->id, 'image_default');
			$data['og_width'] = "750";
			$data['og_height'] = "500";
			if (!empty($data['user'])) {
				$data['og_creator'] = $data['user']->username;
				$data['og_author'] = $data['user']->username;
			} else {
				$data['og_creator'] = "";
				$data['og_author'] = "";
			}
			$data['og_published_time'] = $data['product']->created_at;
			$data['og_modified_time'] = $data['product']->created_at;

			$data['title'] = $data['product']->title;
			$data['description'] = character_limiter($description_text, 200, "");
			$data['keywords'] = generate_product_keywords($data['product']->title);

			$this->load->view('partials/_header', $data);
			$this->load->view('product/details/product', $data);
			$this->load->view('partials/_footer');
			//increase hit
			$this->product_model->increase_product_hit($data["product"]);
		}
	}

	/**
	 * Load More Promoted Products
	 */
	public function load_more_promoted_products()
	{
		$data["limit"] = $this->input->post("limit", true);
		$data["new_limit"] = $data["limit"] + $this->promoted_products_limit;
		$data["promoted_products"] = $this->product_model->get_promoted_products_home();
		$this->load->view('product/_promoted_product_item_response', $data);
	}

	/**
	 * Search
	 */
	public function search()
	{
		get_method();
		$search = trim($this->input->get('search', TRUE));
		$search_type = $this->input->get('search_type', TRUE);
		$search = remove_special_characters($search);

		if (empty($search)) {
			redirect(lang_base_url());
		}

		if ($search_type == 'product' || $search_type == 'Handwork') {
			redirect(lang_base_url() . 'products?search=' . $search . '&drls=' . $search_type);
		} else {
			redirect(lang_base_url() . 'members?search=' . $search . '&drls=' . $search_type);
		}
	}

	/**
	 * Members
	 */
	public function members()
	{
		get_method();
		$search = trim($this->input->get('search', TRUE));
		$search = remove_special_characters($search);
		$search = trim($this->input->get('search', TRUE));
		$data['my_location_id'] = $this->default_location_id;

		$data['search'] = $search;
		$data['search_type'] = $this->input->get('drls', TRUE);
		$data['sort'] = $this->input->get('sort', TRUE);
		$data['type'] = $this->input->get('type', TRUE);
		$data['country'] = $this->input->get('country', TRUE);
		$data['state'] = $this->input->get('state', TRUE);
		$data['city'] = $this->input->get('city', TRUE);
		$data['condition'] = $this->input->get('condition', TRUE);
		$data["category"] = $this->input->get('ytc', TRUE);
		$data["category"] = $this->category_model->get_category($data["category"]);
		// search String translations
		
		$loc = $this->session->userdata('modesy_visitor_default_location');
		$data['heading'] = 'Bus&nbsp;Stations';$category_id ='';
		$data['members'] = $this->profile_model->get_members($search);

		$data['title'] = $search . " - " . ($data['heading']);
		$data['description'] = $search . " - " . ($data['heading']) . " - " . $this->app_name;
		$data['keywords'] = $search . ", " . ($data['heading']) . "," . $this->app_name;
		$data['filter_search'] = $search;

		$this->load->view('partials/_header', $data);
		$this->load->view('members', $data);
		$this->load->view('partials/_footer');
	}



	/*
	*-------------------------------------------------------------------------------------------------
	* BLOG PAGES
	*-------------------------------------------------------------------------------------------------
	*/

	/**
	 * Blog
	 */
	public function blog()
	{
		get_method();
		$data['title'] = trans("blog");
		$data['description'] = trans("blog") . " - " . $this->app_name;
		$data['keywords'] = trans("blog") . "," . $this->app_name;
		$data["active_category"] = "all";
		$key = "blog_posts_count_lang_" . $this->selected_lang->id;
		$blog_posts_count = get_cached_data($key);
		if (empty($blog_posts_count)) {
			$blog_posts_count = $this->blog_model->get_posts_count();
			set_cache_data($key, $blog_posts_count);
		}
		//set pagination
		$pagination = $this->paginate(lang_base_url() . 'blog', $blog_posts_count, $this->blog_paginate_per_page);
		$key = 'blog_posts_lang_' . $this->selected_lang->id . '_page_' . $pagination['current_page'];
		$data['posts'] = get_cached_data($key);
		if (empty($data['posts'])) {
			$data['posts'] = $this->blog_model->get_paginated_posts($pagination['per_page'], $pagination['offset']);
			set_cache_data($key, $data['posts']);
		}

		$this->load->view('partials/_header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Blog Category
	 */
	public function blog_category($slug)
	{
		get_method();
		$slug = decode_slug($slug);
		$data["category"] = $this->blog_category_model->get_category_by_slug($slug);

		if (empty($data["category"])) {
			redirect(lang_base_url() . "blog");
		}

		$data['title'] = $data["category"]->name;
		$data['description'] = $data["category"]->description;
		$data['keywords'] = $data["category"]->keywords;
		$data["active_category"] = $slug;
		$key = "blog_category_" . $data["category"]->id . "_posts_count_lang_" . $this->selected_lang->id;
		$blog_posts_count = get_cached_data($key);
		if (empty($blog_posts_count)) {
			$blog_posts_count = count($this->blog_model->get_posts_by_category($data["category"]->id));
			set_cache_data($key, $blog_posts_count);
		}

		//set pagination
		$pagination = $this->paginate(lang_base_url() . 'blog/' . $data["category"]->slug, $blog_posts_count, $this->blog_paginate_per_page);
		$key = 'blog_category_' . $data["category"]->id . 'posts_lang_' . $this->selected_lang->id . '_page_' . $pagination['current_page'];
		$data['posts'] = get_cached_data($key);
		if (empty($data['posts'])) {
			$data['posts'] = $this->blog_model->get_paginated_category_posts($pagination['per_page'], $pagination['offset'], $data["category"]->id);
			set_cache_data($key, $data['posts']);
		}

		$this->load->view('partials/_header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Tag
	 */
	public function tag($slug)
	{
		get_method();
		$slug = decode_slug($slug);
		$data['tag'] = $this->tag_model->get_post_tag($slug);

		if (empty($data['tag'])) {
			redirect(lang_base_url() . "blog");
		}

		$data['title'] = $data['tag']->tag;
		$data['description'] = trans("tag") . ": " . $data['tag']->tag . " - " . $this->app_name;
		$data['keywords'] = trans("tag") . "," . $data['tag']->tag . "," . $this->app_name;
		//get paginated posts
		$pagination = $this->paginate(lang_base_url() . 'blog/tag/' . $data['tag']->tag_slug, $this->blog_model->get_paginated_tag_posts_count($data['tag']->tag_slug), $this->blog_paginate_per_page);
		$data['posts'] = $this->blog_model->get_paginated_tag_posts($pagination['per_page'], $pagination['offset'], $data['tag']->tag_slug);
		$this->load->view('partials/_header', $data);
		$this->load->view('blog/tag', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Post
	 */
	public function post($category_slug, $slug)
	{
		get_method();
		$slug = decode_slug($slug);
		$data["post"] = $this->blog_model->get_post_by_slug($slug);

		if (empty($data["post"])) {
			redirect(lang_base_url() . "blog");
		}

		$data['title'] = $data["post"]->title;
		$data['description'] = $data["post"]->summary;
		$data['keywords'] = $data["post"]->keywords;

		$data['related_posts'] = $this->blog_model->get_related_posts($data['post']->category_id, $data["post"]->id);
		$data['latest_posts'] = $this->blog_model->get_latest_posts(3);
		$data['random_tags'] = $this->tag_model->get_random_post_tags();
		$data['post_tags'] = $this->tag_model->get_post_tags($data["post"]->id);
		$data['comments'] = $this->comment_model->get_blog_comments($data["post"]->id, $this->comment_limit);
		$data['comment_limit'] = $this->comment_limit;
		$data['post_user'] = $this->auth_model->get_user($data['post']->user_id);
		$data["category"] = $this->blog_category_model->get_category($data['post']->category_id);
		//og tags
		$data['show_og_tags'] = true;
		$data['og_title'] = $data['post']->title;
		$data['og_description'] = $data['post']->summary;
		$data['og_type'] = "article";
		$data['og_url'] = lang_base_url() . "blog/" . $data['post']->category_slug . "/" . $data['post']->slug;
		$data['og_image'] = get_blog_image_url($data['post'], 'image_default');
		$data['og_width'] = "750";
		$data['og_height'] = "500";
		if (!empty($data['post_user'])) {
			$data['og_creator'] = $data['post_user']->username;
			$data['og_author'] = $data['post_user']->username;
		} else {
			$data['og_creator'] = "";
			$data['og_author'] = "";
		}
		$data['og_published_time'] = $data['post']->created_at;
		$data['og_modified_time'] = $data['post']->created_at;
		$data['og_tags'] = $data['post_tags'];

		$this->load->view('partials/_header', $data);
		$this->load->view('blog/post', $data);
		$this->load->view('partials/_footer');
	}

	/**
	 * Guest Favorites
	 */
	public function guest_favorites()
	{
		$data['favorites'] = $this->session->userdata('mds_guest_favorites');
		$data['title'] = trans("favorites");
		$data['description'] = trans("favorites") . " - " . $this->app_name;
		$data['keywords'] = trans("favorites") . "," . $this->app_name;

			
		$this->load->view('partials/_header', $data);
		$this->load->view('guest_favorites', $data);
		$this->load->view('partials/_footer');
	}


	/**
	 * Unsubscribe
	 */
	public function unsubscribe()
	{
		$data['title'] = trans("unsubscribe");
		$data['description'] = trans("unsubscribe");
		$data['keywords'] = trans("unsubscribe");

		$token = $this->input->get("token");
		$token = remove_special_characters($token);
		$subscriber = $this->newsletter_model->get_subscriber_by_token($token);

		if (empty($subscriber)) {
			redirect(lang_base_url());
		}
		$this->newsletter_model->unsubscribe_email($subscriber->email);

		$this->load->view('partials/_header', $data);
		$this->load->view('unsubscribe');
		$this->load->view('partials/_footer');
	}

	/**
	 * Add to Subscribers
	 */
	public function add_to_subscribers()
	{
		//input values
		$email = $this->input->post('email', true);

		if ($email) {
			//check if email exists
			if (empty($this->newsletter_model->get_subscriber($email))) {
				//addd
				if ($this->newsletter_model->add_to_subscribers($email)) {
					$this->session->set_flashdata('news_success', trans("msg_newsletter_success"));
				}
			} else {
				$this->session->set_flashdata('news_error', trans("msg_newsletter_error"));
			}
		}
		redirect($this->agent->referrer() . "#newsletter");
	}

	/**
	 * Add Comment
	 */
	public function add_comment_post()
	{
		if ($this->general_settings->blog_comments != 1) {
			exit();
		}
		$post_id = $this->input->post('post_id', true);
		$limit = $this->input->post('limit', true);
		if (auth_check()) {
			$this->comment_model->add_blog_comment();
		} else {
			if ($this->recaptcha_verify_request()) {
				$this->comment_model->add_blog_comment();
			}
		}

		$data["comments"] = $this->comment_model->get_blog_comments($post_id, $limit);
		$data["comment_post_id"] = $post_id;
		$data['comment_limit'] = $limit;

		$this->load->view("blog/_blog_comments", $data);
	}

	/**
	 * Delete Comment
	 */
	public function delete_comment_post()
	{
		$comment_id = $this->input->post('comment_id', true);
		$post_id = $this->input->post('post_id', true);
		$limit = $this->input->post('limit', true);

		$comment = $this->comment_model->get_blog_comment($comment_id);
		if (auth_check() && !empty($comment)) {
			if (user()->role == "admin" || user()->id == $comment->user_id) {
				$this->comment_model->delete_blog_comment($comment_id);
			}
		}

		$data["comments"] = $this->comment_model->get_blog_comments($post_id, $limit);
		$data["comment_post_id"] = $post_id;
		$data['comment_limit'] = $limit;

		$this->load->view("blog/_blog_comments", $data);
	}

	/**
	 * Load Comment
	 */
	public function load_more_comment()
	{
		$post_id = $this->input->post('post_id', true);
		$limit = $this->input->post('limit', true);
		$new_limit = $limit + $this->comment_limit;

		$data["comments"] = $this->comment_model->get_blog_comments($post_id, $new_limit);
		$data["comment_post_id"] = $post_id;
		$data['comment_limit'] = $new_limit;

		$this->load->view("blog/_blog_comments", $data);
	}

	//set site language
	public function set_site_language()
	{
		$lang_id = $this->input->post('lang_id', true);
		$this->session->set_userdata("modesy_selected_lang", $lang_id);
	}

	public function cookies_warning()
	{
		setcookie('modesy_cookies_warning', '1', time() + (86400 * 10), "/"); //10 days
	}

	public function set_default_location()
	{
		$location_id = $this->input->post('location_id', true);
		$loc = $this->session->userdata('modesy_visitor_default_location');
		if ($location_id == "all") {
			if (!empty($this->session->userdata('modesy_default_location'))) {
				$this->session->unset_userdata('modesy_default_location');
			}
		} else {
			$this->session->set_userdata('modesy_default_location', $location_id);
			$this->session->unset_userdata('modesy_default_state');
		}
		if ($this->session->userdata('modesy_default_location') != $loc['country_id']) {
			setcookie("modesy_distant_location", '1', time() + 3600, "/");
		}
	}
	public function set_default_state()
	{
		$loc = $this->session->userdata('modesy_visitor_default_location');
		$location_id = $this->input->post('location_id', true);
		if ($location_id == "all") {
			if (!empty($this->session->userdata('modesy_default_state'))) {
				$this->session->unset_userdata('modesy_default_state');
			}
		} else {
			$this->session->set_userdata('modesy_default_state', $location_id);
		}
		if ($this->session->userdata('modesy_default_state') != $loc['state_id']) {
			setcookie("modesy_distant_location", '1', time() + 3600, "/");
		}
	}

	public function set_visitor_default_location()
	{/*
		$this->session->unset_userdata('modesy_visitor_default_location');*/
		$country_id = $this->input->post('country_id', true);
		$state_id = $this->input->post('state_id', true);
		$city_id = $this->input->post('city_id', true);
		$date = date('Y-m-d H:i:s');
		$data = array(
			'created_at' => $date,
			'country_id' => $country_id,
			'state_id' => $state_id,
			'city_id' => $city_id
		);
		if (empty($this->session->userdata('modesy_visitor_default_location'))) {
			$this->session->set_userdata('modesy_visitor_default_location', $data);
        	$this->session->set_userdata('modesy_visitor_default_location_cache', $data);
			$this->profile_model->ad_update_visitor('new');
		} else {
			$this->session->set_userdata('modesy_visitor_default_location', $data);
			$this->profile_model->ad_update_visitor('old');
		}
		redirect($this->agent->referrer());
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

	//get cities
	public function get_cities()
	{
		$state_id = $this->input->post('state_id', true);
		$cities = $this->location_model->get_cities_by_state($state_id);
		foreach ($cities as $item) {
			echo '<option value="' . $item->id . '">' . $item->name . '</option>';
		}
	}


	public function error_404()
	{
		$data['title'] = "Error 404";
		$data['description'] = "Error 404";
		$data['keywords'] = "error,404";

		$this->load->view('partials/_header', $data);
		$this->load->view('errors/error_404');
		$this->load->view('partials/_footer');
	}
}
