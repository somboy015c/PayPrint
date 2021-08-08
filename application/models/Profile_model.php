<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    //update profile
    public function update_profile($data, $user_id)
    {
        $user_id = clean_number($user_id);
        $this->load->model('upload_model');
        $temp_path = $this->upload_model->upload_temp_image('file');
        if (!empty($temp_path)) {
            //delete old avatar
            delete_file_from_server(user()->avatar);
            $data["avatar"] = $this->upload_model->avatar_upload($temp_path);
            $this->upload_model->delete_temp_image($temp_path);
        }
        $this->session->set_userdata('modesy_user_old_email', user()->email);

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }



    
    //update shop settings
    public function update_shop_settings()
    {
        $user_id = user()->id;
        $data = array(
            'id' => $user_id,
        );
        $this->load->model('upload_model');


        $file_path = $this->upload_model->user_watermark_upload('watermark_image');
        if (!empty($file_path)) {
            //delete old watermarks
            delete_file_from_server(user()->watermark_image_large);
            delete_file_from_server(user()->watermark_image_mid);
            delete_file_from_server(user()->watermark_image_small);
            //upload new files
            $data['watermark_image_large'] = $file_path;
            $data['watermark_image_mid'] = $this->upload_model->user_resize_watermark($file_path, 300, 300);
            $data['watermark_image_small'] = $this->upload_model->user_resize_watermark($file_path, 100, 100);
        }

        $temp_path = $this->upload_model->upload_temp_image('file');
        if (!empty($temp_path)) {
            $fileinfo = @getimagesize($temp_path);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            if ($width == 1200 && $height == 410) {
                //delete old avatar
                delete_file_from_server(user()->banner);
                $data['banner'] = $this->upload_model->banner_upload($temp_path);
                $this->upload_model->delete_temp_image($temp_path);
            }else{
                $this->upload_model->delete_temp_image($temp_path);
                $this->session->set_flashdata('error', ("Banner size must be 1200 x 410"));
            }
        }

        $data['shop_name'] = remove_special_characters($this->input->post('shop_name', true));
        if (!empty($this->input->post('shop_name', true))) {
            $data['slug'] = remove_special_characters($this->input->post('shop_name', true));
        }
        $data['about_me'] = $this->input->post('about_me', true);
        $data['show_rss_feeds'] = $this->input->post('show_rss_feeds', true);
        $data['send_email_when_item_sold'] = $this->input->post('send_email_when_item_sold', true);

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }









    //delete mark
    public function delete_mark()
    {
        $user_id = $this->input->post('user_id', true);
        $user = get_user($user_id);
        //delete old watermarks
        delete_file_from_server($user->watermark_image_large);
        delete_file_from_server($user->watermark_image_mid);
        delete_file_from_server($user->watermark_image_small);
        //upload new files
        $data = array(
            'watermark_image_large' => '',
            'watermark_image_mid' => '',
            'watermark_image_small' => ''
        );
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }



    //delete banner
    public function delete_banner()
    {
        $user_id = $this->input->post('user_id', true);
        $user = get_user($user_id);
        //delete old watermarks
        delete_file_from_server($user->banner);
        delete_file_from_server($user->w_banner);
        //upload new files
        $data = array(
            'banner' => '',
            'w_banner' => ''
        );
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }






    //advertise yourself about post
    public function advertise_yourself_about()
    {
        $user_id = user()->id;
        $data = array(
            'shop_name' => remove_special_characters($this->input->post('shop_name', true)),
            'cv_about' => $this->input->post('about_yourself', true)
        );
        if (!empty($this->input->post('shop_name', true))) {
            $data['slug'] = remove_special_characters($this->input->post('shop_name', true));
        }

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }


    //advertise yourself banner post
    public function advertise_yourself_banner()
    {
        $user_id = user()->id;
        $this->load->model('upload_model');
        $temp_path = $this->upload_model->upload_temp_image('file');
        $fileinfo = @getimagesize($_FILES["file"]["tmp_name"]);
        $width = $fileinfo[0];
        $height = $fileinfo[1];
        if ($width == 1200 && $height == 410) {
            if (!empty($temp_path)) {
            //delete old avatar
            delete_file_from_server(user()->banner);
             $data = array(
            'w_banner' => $this->upload_model->banner_upload($temp_path)
            );
                $this->upload_model->delete_temp_image($temp_path);
            }
        }else{
            $this->session->set_flashdata('error', ("Banner size must be 1200 x 410"));
                redirect($this->agent->referrer());
        }
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    //advertise yourself watermark
    public function advertise_yourself_watermark()
    {
        $user_id = user()->id;
        $data = array(
            'id' => $user_id,
        );

        $this->load->model('upload_model');
        $file_path = $this->upload_model->user_watermark_upload('watermark_image');
        if (!empty($file_path)) {
            //delete old watermarks
            delete_file_from_server(user()->watermark_image_large);
            delete_file_from_server(user()->watermark_image_mid);
            delete_file_from_server(user()->watermark_image_small);
            //upload new files
            $data['watermark_image_large'] = $file_path;
            $data['watermark_image_mid'] = $this->upload_model->user_resize_watermark($file_path, 300, 300);
            $data['watermark_image_small'] = $this->upload_model->user_resize_watermark($file_path, 100, 100);
        }

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }


    //advertise yourself skills post
    public function advertise_yourself_skills()
    {
        $data = array(
            'branch' => $this->input->post('branch_name', true),
            'branch_country_id' => $this->input->post('country_id', true),
            'branch_state_id' => $this->input->post('state_id', true),
            'branch_city_id' => $this->input->post('city_id', true),
            'branch_address' => $this->input->post('address', true),
            'branch_zip' => $this->input->post('zip_code', true),
            'comp_id' => user()->id
        );
        return $this->db->insert('stattions', $data);
    }

    //advertise yourself work post
    public function advertise_yourself_works()
    {
        $this->load->model('upload_model');
        $temp_path = $this->upload_model->upload_temp_image('file');
        if (!empty($temp_path)) {
            $data = array(
            'work' => $this->upload_model->work_upload($temp_path),
            'user_id' => user()->id
        );
            $this->upload_model->delete_temp_image($temp_path);
        } else {
                $this->session->set_flashdata('error', ("Please select an image.!"));
                redirect($this->agent->referrer());
        };

        return $this->db->insert('user_cv_image', $data);
    }

    //get user skills
    public function get_user_skills($id)
    {
        $id = clean_number($id);
        $this->db->where('user_id', $id);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user_cv');
        return $query->result();
    }


    //get user branches
    public function user_branches($id)
    {
        $id = clean_number($id);
        $this->db->where('comp_id', $id);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('stattions');
        return $query->result();
    }


    //get user works
    public function get_user_works($id)
    {
        $id = clean_number($id);
        $this->db->where('user_id', $id);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user_cv_image');
        return $query->result();
    }


    //delete skill
    public function delete_user_station($station_id)
    {
        $station_id = $this->input->post('delete_station', true);
        $this->db->where('id', $station_id);
        return $this->db->delete('stattions');
        return false;
    }


    //delete work
    public function delete_user_work($work_id)
    {
        $work_id = $this->input->post('delete_work', true);
        $data = array(
                'is_deleted' => 1
            );
        $this->db->where('id', $work_id);
        return $this->db->update('user_cv_image', $data);
        return false;
    }

    //check email updated
    public function check_email_updated($user_id)
    {
        $user_id = clean_number($user_id);
        if ($this->general_settings->email_verification == 1) {
            $user = $this->auth_model->get_user($user_id);
            if (!empty($user)) {
                if (!empty($this->session->userdata('modesy_user_old_email')) && $this->session->userdata('modesy_user_old_email') != $user->email) {
                    //send confirm email
                    $this->load->model("email_model");
                    $this->email_model->send_email_activation($user->id);
                    $data = array(
                        'email_status' => 0
                    );

                    $this->db->where('id', $user->id);
                    return $this->db->update('users', $data);
                }
            }
            if (!empty($this->session->userdata('modesy_user_old_email'))) {
                $this->session->unset_userdata('modesy_user_old_email');
            }
        }

        return false;
    }

    //update contact informations
    public function update_contact_informations()
    {
        $user_id = user()->id;
        $data = array(
            'country_id' => $this->input->post('country_id', true),
            'state_id' => $this->input->post('state_id', true),
            'city_id' => $this->input->post('city_id', true),
            'address' => $this->input->post('address', true),
            'zip_code' => $this->input->post('zip_code', true),
            'phone_number' => $this->input->post('phone_number', true),
            'show_email' => $this->input->post('show_email', true),
            'show_phone' => $this->input->post('show_phone', true),
            'is_contact_info' => 1,
            'show_location' => $this->input->post('show_location', true)
        );

        if (empty($data['country_id']) || empty($data['state_id']) || empty($data['city_id']) || empty($data['address']) || empty($data['phone_number'])) {
            $this->session->set_flashdata('error', ("Please fill in all the required fields.!"));
            redirect($this->agent->referrer());
        }
        if (empty($data['show_email'])) {
            $data['show_email'] = 0;
        }
        if (empty($data['show_phone'])) {
            $data['show_phone'] = 0;
        }
        if (empty($data['show_location'])) {
            $data['show_location'] = 0;
        }

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    //update shipping address
    public function update_shipping_address()
    {
        $user_id = user()->id;
        $data = array(
            'shipping_first_name' => $this->input->post('shipping_first_name', true),
            'shipping_last_name' => $this->input->post('shipping_last_name', true),
            'shipping_email' => $this->input->post('shipping_email', true),
            'shipping_phone_number' => $this->input->post('shipping_phone_number', true),
            'shipping_address_1' => $this->input->post('shipping_address_1', true),
            'shipping_address_2' => $this->input->post('shipping_address_2', true),
            'shipping_country_id' => $this->input->post('shipping_country_id', true),
            'shipping_state' => $this->input->post('shipping_state', true),
            'shipping_city' => $this->input->post('shipping_city', true),
            'is_shipping_address' => 1,
            'shipping_zip_code' => $this->input->post('shipping_zip_code', true)
        );
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }


    //ad update visitor
    public function ad_update_visitor($status)
    {
        $loc = $this->session->userdata('modesy_visitor_default_location');
        $data = array(
            'created_at' => $loc['created_at'],
            'country_id' => $loc['country_id'],
            'state_id' => $loc['state_id'],
            'city_id' => $loc['city_id']
        );
        if ($status == 'new') {
            $this->db->insert('visitors', $data);
        } else {
            $cache = $this->session->userdata('modesy_visitor_default_location_cache');
            $this->db->where('city_id', $cache['city_id']);
            $this->db->where('created_at', $cache['created_at']);
            $this->db->update('visitors', $data);
            //update cache data
            $this->session->set_userdata('modesy_visitor_default_location_cache', $data);
        }
        $this->session->set_userdata('modesy_default_location', $loc['country_id']);
        $this->session->set_userdata('modesy_default_state', $loc['state_id']);
    }

    //update update social media
    public function update_social_media()
    {
        $user_id = user()->id;
        $data = array(
            'facebook_url' => $this->input->post('facebook_url', true),
            'twitter_url' => $this->input->post('twitter_url', true),
            'instagram_url' => $this->input->post('instagram_url', true),
            'pinterest_url' => $this->input->post('pinterest_url', true),
            'linkedin_url' => $this->input->post('linkedin_url', true),
            'vk_url' => $this->input->post('vk_url', true),
            'youtube_url' => $this->input->post('youtube_url', true)
        );

        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    //change password input values
    public function change_password_input_values()
    {
        $data = array(
            'old_password' => $this->input->post('old_password', true),
            'password' => $this->input->post('password', true),
            'password_confirm' => $this->input->post('password_confirm', true)
        );
        return $data;
    }

    //change password
    public function change_password($old_password_exists)
    {
        $this->load->library('bcrypt');

        $user = user();
        if (!empty($user)) {
            $data = $this->change_password_input_values();
            if ($old_password_exists == 1) {
                //password does not match stored password.
                if (!$this->bcrypt->check_password($data['old_password'], $user->password)) {
                    $this->session->set_flashdata('error', trans("msg_wrong_old_password"));
                    $this->session->set_flashdata('form_data', $this->change_password_input_values());
                    redirect($this->agent->referrer());
                }
            }

            $data = array(
                'password' => $this->bcrypt->hash_password($data['password'])
            );

            $this->db->where('id', $user->id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }

    //follow user
    public function follow_unfollow_user()
    {
        $data = array(
            'following_id' => $this->input->post('following_id', true),
            'follower_id' => $this->input->post('follower_id', true)
        );

        $follow = $this->get_follow($data["following_id"], $data["follower_id"]);
        if (empty($follow)) {
            //add follower
            $this->db->insert('followers', $data);
        } else {
            $this->db->where('id', $follow->id);
            $this->db->delete('followers');
        }
    }

    //get user shipping address
    public function get_user_shipping_address($user_id)
    {
        $user_id = clean_number($user_id);
        $std = new stdClass();
        $std->shipping_first_name = "";
        $std->shipping_last_name = "";
        $std->shipping_email = "";
        $std->shipping_phone_number = "";
        $std->shipping_address_1 = "";
        $std->shipping_address_2 = "";
        $std->shipping_country_id = "";
        $std->shipping_state = "";
        $std->shipping_city = "";
        $std->shipping_zip_code = "";

        if (empty($user_id)) {
            return $std;
        }

        $row = get_user($user_id);
        if (!empty($row)) {
            return $row;
        } else {
            return $std;
        }
    }


    //follow
    public function get_follow($following_id, $follower_id)
    {
        $following_id = clean_number($following_id);
        $follower_id = clean_number($follower_id);
        $this->db->where('following_id', $following_id);
        $this->db->where('follower_id', $follower_id);
        $query = $this->db->get('followers');
        return $query->row();
    }

    //is user follows
    public function is_user_follows($following_id, $follower_id)
    {
        $following_id = clean_number($following_id);
        $follower_id = clean_number($follower_id);
        $follow = $this->get_follow($following_id, $follower_id);
        if (empty($follow)) {
            return false;
        } else {
            return true;
        }
    }

     //get cv_about
    public function cv_about($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->where('states.country_id', $country_id);
        $this->db->order_by('states.name');
        $query = $this->db->get('states');
        return $query->result();
    }
    //get followers
    public function get_followers($following_id)
    {
        $following_id = clean_number($following_id);
        $this->db->join('users', 'followers.follower_id = users.id');
        $this->db->select('users.*');
        $this->db->where('following_id', $following_id);
        $query = $this->db->get('followers');
        return $query->result();
    }

    //get user traffics count
    public function get_user_traffics_count($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->where('target', 'user');
        $this->db->where('target_id', $user_id);
        $query = $this->db->get('traffics');
        return $query->num_rows();
    }


    //get followers count
    public function get_followers_count($following_id)
    {
        $following_id = clean_number($following_id);
        $this->db->join('users', 'followers.follower_id = users.id');
        $this->db->select('users.*');
        $this->db->where('following_id', $following_id);
        $query = $this->db->get('followers');
        return $query->num_rows();
    }

    //get following users
    public function get_following_users($follower_id)
    {
        $follower_id = clean_number($follower_id);
        $this->db->join('users', 'followers.following_id = users.id');
        $this->db->select('users.*');
        $this->db->where('follower_id', $follower_id);
        $query = $this->db->get('followers');
        return $query->result();
    }

    //get following users
    public function get_following_users_count($follower_id)
    {
        $follower_id = clean_number($follower_id);
        $this->db->join('users', 'followers.following_id = users.id');
        $this->db->select('users.*');
        $this->db->where('follower_id', $follower_id);
        $query = $this->db->get('followers');
        return $query->num_rows();
    }

    //trending members
    public function trending_members()
    {
        $this->build_query();
        $key = "trending_members";
        if ($this->default_location_id != 0) {
            $key = "trending_members_location_" . $this->default_location_id;
        }
        $trending_members = get_cached_data($key);
        if (empty($trending_members)) {
            $this->db->where('users.weekly_trend !=', 0);
            $this->db->where('users.role', 'vendor');
            $this->db->or_where('users.is_workshop', 1);
            $this->db->where('users.weekly_trend !=', 0);
            $this->db->order_by('users.weekly_trend', 'DESC');
            $query = $this->db->get('users');
            $trending_members = $query->result();
            set_cache_data($key, $trending_members);
        }
        return $trending_members;
    }




    //nearest members
    public function nearest_members($loc_id)
    {
        $this->db->where('users.city_id', $loc_id);
        $this->db->where('users.role', 'vendor');
        $this->db->or_where('users.is_workshop', 1);
        $this->db->where('users.city_id', $loc_id);
        $this->db->order_by('users.created_at', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }





    //top members
    public function top_members()
    {
        $members = $this->latest_rated_members();
        $users = array(); $count = 0;
        foreach ($members as $member) {
            $reviews = $this->user_review_model->get_user_rating($member->id);
            $review_count = $this->user_review_model->get_review_count($member->id);
            $userrole = $member->role; $userw = $member->is_workshop;
            if (($userrole == 'vendor' || ($userrole == 'member' && $userw == 1)) && $review_count > 0 && $reviews > 2){
                $users[$count] = $member; $count++;
            }
        }
        return $users;
    }


    //latest rated members
    public function latest_rated_members()
    {
        $this->build_query();
        $this->db->where('users.role !=', 'admin');
        $this->db->order_by('users.rated', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }


    //latest rated members
    public function filtered_latest_rated_members($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->order_by('users.rated', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }



    //latest shops
    public function latest_shops()
    {
        $category_id = '';
        $members = $this->get_searched_tc($category_id);
        $tc = array(); $count = 0;
        foreach ($members as $member) {
            $user_stations = $this->product_model->user_stations($member->id);
            foreach ($user_stations as $station) {
                if ($station->branch_state_id == $this->default_state_id) {
                    $tc[$count] = $member; $count++;
                }
            }
        }
        return $tc;
    }




    //members
    public function modesy_members()
    {
        $this->db->where('users.role !=', 'admin');
        $this->db->order_by('users.id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }





    //latest workshops
    public function latest_workshops()
    {
        $this->build_query();
        $this->db->where('users.role', 'member');
        $this->db->where('users.is_workshop', 1);
        $this->db->order_by('users.created_at', 'DESC');
        $this->db->limit(12);
        $query = $this->db->get('users');
        return $query->result();
    }



    //just for you data
    public function just_for_you_filtered_data($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->order_by('users.created_at', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    //just for you data
    public function just_for_you_data()
    {
        $this->build_query();
        $this->db->where('users.role !=', 'admin');
        $this->db->order_by('users.created_at');
        $query = $this->db->get('users');
        return $query->result();
    }


    //just for you
    public function just_for_you()
    {
        $just_for_you = $this->just_for_you_data();
        $jfy = array(); $count = 0;
        foreach ($just_for_you as $jst) {
            if (auth_check()) { $user_id = user()->id; } else { $user_id = 0; }
            if (($jst->role != 'member' || ($jst->role == 'member' && $jst->is_workshop == 1)) && (is_user_follows($jst->id, $user_id) || is_user_in_favorites($jst->id) == true)) { 
                $jfy[$count] = $jst; $count++;
            }
        }
        return $jfy;
    }

    //most visited
    public function most_visited()
    {
        $traff = array(); $traff_user = array(); $count = 0;
        $traffics = $this->session->userdata('mds_visitor_traffics');
        if (!empty($traffics)) {
            foreach ($traffics as $traffic) {
                $t_c = $traffic['shop_id'];
                $traff[$t_c] = $traffic['traffics'];
            }
        }
        arsort($traff);
        foreach ($traff as $key => $most) {
            if ($most > 2) {
                $role = get_user($key)->role; $user = get_user($key);
                if ($role == 'vendor' || ($role == 'member' && $user->is_workshop == 1)) {
                    $traff_user[$count] = get_user($key); $count++;
                }
            }
        }
        return $traff_user;
    }



    //search ads
    public function search_ads()
    {
        $this->build_query();
        $this->db->where('users.role', 'vendor');
        $query = $this->db->get('users');
        return $query->result();
    }


    //search shops
    public function search_shops($search)
    {
        $this->build_query();
        $search = remove_special_characters($search);
        $this->db->where('users.role', 'vendor');
        $this->db->like('users.username', $search);
        $this->db->or_like('users.shop_name', $search);
        $query = $this->db->get('users');
        return $query->result();
    }



    //search workshops
    public function search_workshops($search)
    {
        $this->build_query();
        $search = remove_special_characters($search);
        $this->db->where('users.role', 'member');
        $this->db->where('users.is_workshop', 1);
        $this->db->like('users.username', $search);
        $this->db->or_like('users.shop_name', $search);
        $query = $this->db->get('users');
        return $query->result();
    }

    //search members limited
    public function search_members_limited($search)
    {
        $this->build_query();
        $search = remove_special_characters($search);
        $this->db->like('users.shop_name', $search);
        $this->db->where('users.role', 'vendor');
        $this->db->limit(8);
        $query = $this->db->get('users');
        return $query->result();
    }























    //get paginated filtered works count
    public function get_paginated_filtered_stores_count($category_id)
    {
       $members = $this->get_searched_stores($category_id);
        $count = 0;
        foreach ($members as $member) {
            $user_stations = $this->product_model->user_stations($member->id);
            foreach ($user_stations as $station) {
                if ($station->branch_state_id == $this->default_state_id) {
                    $count++;
                }
            }
        }
        return $count;
    }

    //get paginated filtered works count
    public function get_paginated_filtered_trending_stores_count($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.weekly_trend !=', 0);
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    //get paginated filtered works count
    public function get_paginated_filtered_nearest_stores_count($category_id, $loc_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.city_id', $loc_id);
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    //get paginated filtered works count
    public function get_paginated_filtered_top_stores_count($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.rating >', 2);
        $query = $this->db->get('users');
        return $query->num_rows();
    }


    //get paginated filtered works count
    public function get_paginated_filtered_just_for_you_stores_count($category_id)
    {
        $this->filter_members($category_id);
        $just_for_you = $this->auth_model->get_users();
        $jfy = array(); $count = 0;
        foreach ($just_for_you as $jst) {
            if (!empty($jst)) {
                if (auth_check()) { $user_id = user()->id; } else { $user_id = 0; }
                if (is_user_follows($jst->id, $user_id) || is_user_in_favorites($jst->id) == true) { 
                    $jfy[$count] = $jst->id; $count++;
                }
            }
        }
        $condition=""; $count2 = 0;
        foreach ($jfy as $jf) {
            if (!empty($jf)) {
                $count2++; if ($count2 < count($jfy)) { $or = " OR "; }else{ $or = ""; }
                $condition .= 'id=' . $jf . $or;
            }
        }

        if (!empty($jfy)) {
            $this->filter_members($category_id);
            $this->db->where($condition);
            $query = $this->db->get('users');
            return $query->num_rows();
        }
        return 0;
    }

    //get paginated filtered works count
    public function get_paginated_filtered_most_visited_stores_count($category_id)
    {
        $this->filter_members($category_id);
        $users = $this->auth_model->get_users();

        $traff = array(); $traff_user = array(); $count = 0;
        $traffics = $this->session->userdata('mds_visitor_traffics');

        foreach ($users as $user) {
            if (!empty($traffics)) {
                foreach ($traffics as $traffic) {
                    if ($traffic['traffics'] > 2) {
                        if ($user->id ==  $traffic['shop_id']) {
                            $t_c = $traffic['shop_id'];
                            $traff[$t_c] = $traffic['traffics'];
                        }
                    }
                }
            }
        }
        arsort($traff); $condition="";
        if (!empty($traff)) {
            foreach ($traff as $key => $traf_id) {
                $count++; if ($count < count($traff)) { $or = " OR "; }else{ $or = ""; }
                $condition .= 'id=' . $key . $or;
            }
            $this->filter_members($category_id);
            $this->db->where($condition);
            $query = $this->db->get('users');
            return $query->num_rows();
        }
        return 0;
    }


    //get paginated filtered works count
    public function get_paginated_filtered_latest_shops_count($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role', 'vendor');
        $this->db->order_by('users.created_at', 'DESC');
        $query = $this->db->get('users');
        return $query->num_rows();
    }


    //get paginated filtered works count
    public function get_paginated_filtered_latest_workshops_count($category_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role', 'member');
        $this->db->where('users.is_workshop', 1);
        $query = $this->db->get('users');
        return $query->num_rows();
    }





    //get paginated filtered stores
    public function get_members($search)
    {
        $members = $this->get_searched_tc($search);
        $tc = array(); $count = 0;
        foreach ($members as $member) {
            $user_stations = $this->product_model->user_stations($member->id);
            foreach ($user_stations as $station) {
                if ($station->branch_state_id == $this->default_state_id) {
                    $tc[$count] = $member; $count++;
                }
            }
        }
        return $tc;
    }



    //get paginated filtered stores
    public function get_searched_tc($search)
    {
        $search = remove_special_characters($search);
        $this->db->like('users.username', $search);
        $this->db->or_like('users.shop_name', $search);
        $this->db->where('users.role', 'vendor');
        $query = $this->db->get('users');
        return $query->result();
    }


    //get paginated filtered stores
    public function get_paginated_filtered_trending_stores($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.weekly_trend !=', 0);
        $this->db->order_by('users.weekly_trend', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }

    //get paginated filtered stores
    public function get_paginated_filtered_nearest_stores($category_id, $per_page, $offset, $loc_id)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.city_id', $loc_id);
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }


    //get paginated filtered stores
    public function get_paginated_filtered_top_stores($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.rating >', 2);
        $this->db->order_by('users.rated', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }


    //get paginated filtered stores
    public function get_paginated_filtered_just_for_you_stores($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $just_for_you = $this->auth_model->get_users();
        $jfy = array(); $count = 0;
        foreach ($just_for_you as $jst) {
            if (!empty($jst)) {
                if (auth_check()) { $user_id = user()->id; } else { $user_id = 0; }
                if (is_user_follows($jst->id, $user_id) || is_user_in_favorites($jst->id) == true) { 
                    $jfy[$count] = $jst->id; $count++;
                }
            }
        }
        $condition=""; $count2 = 0;
        foreach ($jfy as $jf) {
            if (!empty($jf)) {
                $count2++; if ($count2 < count($jfy)) { $or = " OR "; }else{ $or = ""; }
                $condition .= 'id=' . $jf . $or;
            }
        }

        if (!empty($jfy)) {
            $this->filter_members($category_id);
            $this->db->where($condition);
            $this->db->limit($per_page, $offset);
            $query = $this->db->get('users');
            return $query->result();
        }
        return null;
    }


    //get paginated filtered stores
    public function get_paginated_filtered_most_visited_stores($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $users = $this->auth_model->get_users();

        $traff = array(); $traff_user = array(); $count = 0;
        $traffics = $this->session->userdata('mds_visitor_traffics');

        foreach ($users as $user) {
            if (!empty($traffics)) {
                foreach ($traffics as $traffic) {
                    if ($traffic['traffics'] > 2) {
                        if ($user->id ==  $traffic['shop_id']) {
                            $t_c = $traffic['shop_id'];
                            $traff[$t_c] = $traffic['traffics'];
                        }
                    }
                }
            }
        }
        arsort($traff); $condition="";
        if (!empty($traff)) {
            foreach ($traff as $key => $traf_id) {
                $count++; if ($count < count($traff)) { $or = " OR "; }else{ $or = ""; }
                $condition .= 'id=' . $key . $or;
            }
            $this->filter_members($category_id);
            $this->db->where($condition);
            $this->db->limit($per_page, $offset);
            $query = $this->db->get('users');
            return $query->result();
        }
        return Null;
    }


    //get paginated filtered stores
    public function get_paginated_filtered_latest_shops($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role', 'vendor');
        $this->db->order_by('users.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }


    //get paginated filtered stores
    public function get_paginated_filtered_latest_workshops($category_id, $per_page, $offset)
    {
        $this->filter_members($category_id);
        $this->db->where('users.role', 'member');
        $this->db->where('users.is_workshop', 1);
        $this->db->order_by('users.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }




    //check active shop advert
    public function check_active_shop_advert()
    {
        $users = $this->auth_model->get_users();
        if (!empty($users)) {
            foreach ($users as $user) {
                if (date_difference($user->advert_end_date, date('Y-m-d H:i:s')) < 1) {
                    $data = array(
                        'is_advert' => 0,
                    );
                    $this->db->where('id', $user->id);
                    $this->db->update('users', $data);
                }
            }
        }
    }



    //check active shop
    public function check_active_shop()
    {
        $users = $this->auth_model->get_vendors();
        if (!empty($users)) {
            foreach ($users as $user) {
                if (date_difference($user->shop_end_date, date('Y-m-d H:i:s')) < 1) {
                    $data = array(
                        'shop_due' => 1,
                    );
                    $this->db->where('id', $user->id);
                    $this->db->update('users', $data);
                }
            }
        }
    }




    //check active workshop
    public function check_active_workshop()
    {
        $users = $this->auth_model->get_workshops();
        if (!empty($users)) {
            foreach ($users as $user) {
                if (date_difference($user->workshop_end_date, date('Y-m-d H:i:s')) < 1) {
                    $data = array(
                        'workshop_due' => 1,
                    );
                    $this->db->where('id', $user->id);
                    $this->db->update('users', $data);
                }
            }
        }
    }





















    public function get_countries()
    {
        $this->db->order_by('countries.id');
        $query = $this->db->get('countries');
        return $query->result();
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
        $this->db->where('users.banned', 0);
    }





    //filter products
    public function filter_members($category_id)
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
                $this->db->where("users.id IN ($query)", NULL, FALSE);
            }
        } else {
            $this->build_query();
        }

        //add protuct filter options
        if (!empty($category_id)) {
            $category_tree_ids = $this->category_model->get_category_tree_ids_string($category_id);
            if (!empty($category_tree_ids)) {
                $this->db->where("users.shop_category_id IN (" . $category_tree_ids . ")", NULL, FALSE);
                $this->db->order_by('users.created_at', 'DESC');
            }
        }
        if (!empty($country)) {
            $this->db->where('users.country_id', $country);
        }
        if (!empty($state)) {
            $this->db->where('users.state_id', $state);
        }
        if (!empty($city)) {
            $this->db->where('users.city_id', $city);
        }
        if ($search != 'trending_stores' && $search != 'nearest_stores' && $search != 'top_stores' && $search != 'just_for_you' && $search != 'latest_shops' && $search != 'latest_workshops' && $search != 'most_visited') {
            $this->db->group_start();
            $this->db->like('users.username', $search);
            $this->db->or_like('users.shop_name', $search);
            $this->db->group_end();
            $this->db->order_by('users.created_at', 'DESC');
        }
        //sort products
        if (!empty($sort) && $sort == "Trending") {
            $this->db->order_by('users.weekly_trend', 'DESC');
        } elseif (!empty($sort) && $sort == "Top Rated") {
            $this->db->order_by('users.rated', 'DESC');
            $this->db->order_by('users.rating', 'DESC');
        } elseif (!empty($sort) && $sort == "most_recent") {
            $this->db->order_by('users.created_at', 'DESC');
        }

        // products type
        if (!empty($type) && $type == "Shops") {
            $this->db->where('users.role', 'vendor');
            $this->db->where('users.is_workshop', 0);
            $this->db->order_by('users.created_at');
        } elseif (!empty($type) && $type == "Workshops") {
            $this->db->where('users.role', 'member');
            $this->db->where('users.is_workshop', 1);
            $this->db->order_by('users.created_at', 'DESC');
        }
        $this->db->where('users.role !=', 'admin');
        $this->db->where('users.is_member', 1);

    }
}