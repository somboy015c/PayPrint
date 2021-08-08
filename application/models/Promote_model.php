<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promote_model extends CI_Model
{
    //execute promote payment
    public function execute_promote_payment($data_transaction)
    {
        $promoted_plan = $this->session->userdata('modesy_selected_promoted_plan');
        $data = array(
            'payment_method' => $data_transaction["payment_method"],
            'payment_id' => $data_transaction["payment_id"],
            'user_id' => user()->id,
            'product_id' => $promoted_plan->product_id,
            'currency' => $data_transaction["currency"],
            'payment_amount' => $data_transaction["payment_amount"],
            'payment_status' => $data_transaction["payment_status"],
            'purchased_plan' => $promoted_plan->purchased_plan,
            'day_count' => $promoted_plan->day_count,
            'ip_address' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('promoted_transactions', $data);
    }


    //execute advert payment
    public function execute_wallet_payment($data_transaction)
    {
        $wallet_plan = $this->session->userdata('modesy_selected_promoted_plan');
        $data = array(
            'payment_method' => $data_transaction["payment_method"],
            'payment_id' => $data_transaction["payment_id"],
            'user_id' => $wallet_plan->product_id,
            'currency' => $data_transaction["currency"],
            'payment_amount' => $data_transaction["payment_amount"],
            'payment_status' => $data_transaction["payment_status"],
            'ip_address' => 0,
            'is_wallet_credit_req' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('wallet_transactions', $data);

        
        $user = user();
        if (!empty($user)) {
            $da['wallet'] = $user->wallet + $wallet_plan->total_amount;
            $this->db->where('id', $user->id);
            $this->db->update('users', $da);
        }
    }






    //execute advert payment
    public function execute_advert_payment($data_transaction)
    {
        $advert_plan = $this->session->userdata('modesy_selected_promoted_plan');
        $date = date('Y-m-d H:i:s');
        $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $advert_plan->day_count . ' days'));
        if (strpos($advert_plan->product_id, 'p') != false){
            $advert_target = 'product';
            $advert_plan->product_id = substr($advert_plan->product_id, 0, -1);
        }else{

            if (strpos($advert_plan->product_id, 'e') != false) {
                $advert_target = 'External';
            }else{
                if (get_user($advert_plan->product_id)->role == 'member') {
                   $advert_target = 'work';
                }else{
                    $advert_target = 'store';
                }
            }
            
            
        }
        $data = array(
            'payment_method' => $data_transaction["payment_method"],
            'payment_id' => $data_transaction["payment_id"],
            'target_id' => $advert_plan->product_id,
            'currency' => $data_transaction["currency"],
            'payment_amount' => $data_transaction["payment_amount"],
            'payment_status' => $data_transaction["payment_status"],
            'advert_target' => $advert_target,
            'purchased_plan' => $advert_plan->purchased_plan,
            'day_count' => $advert_plan->day_count,
            'ip_address' => 0,
            'created_at' => $date,
            'advert_start_date' => $date,
            'advert_end_date' => $end_date,
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        
        $this->db->where('created_at', user()->advert_cache);
        $this->db->update('user_advert', $data);
    }


    //execute store payment
    public function execute_store_payment($data_transaction)
    {
        $store_plan = $this->session->userdata('modesy_selected_promoted_plan');
        if ($user->is_member == 1) {
            $status = 'Approved';
        } else {
            $status = 'Processing';
        }
        $data = array(
            'payment_method' => $data_transaction["payment_method"],
            'payment_id' => $data_transaction["payment_id"],
            'user_id' => $store_plan->product_id,
            'currency' => $data_transaction["currency"],
            'payment_amount' => $data_transaction["payment_amount"],
            'payment_status' => $data_transaction["payment_status"],
            'purchased_plan' => $store_plan->purchased_plan,
            'day_count' => $store_plan->day_count,
            'ip_address' => 0,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('store_transaction', $data);
        $user = get_user($store_plan->product_id);


        if (!empty($user)) {
           $date = date('Y-m-d H:i:s'); $shop_req_days = $store_plan->day_count; $shop_plan = $store_plan->purchased_plan;
            if (strpos($store_plan->purchased_plan, 'asic') != false || strpos($store_plan->purchased_plan, 'remium') != false || strpos($store_plan->purchased_plan, 'ltimate') != false) {
                $days_left = date_difference($user->workshop_end_date, date('Y-m-d H:i:s')); if ($days_left <= 0) { $days_left = 0; } $days_added =  $shop_req_days + $days_left; $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $days_added . ' days'));
                if ($user->is_workshop != 1) {
                    $da['is_active_workshop_request'] = 1;
                    $da['is_active_shop_request'] = 0;
                } else {
                    //approve request
                    $da['is_active_workshop_request'] = 0;
                    $da['is_active_shop_request'] = 0;
                    $da['role'] = "member";
                    $da['is_workshop'] = 1;
                    $da['workshop_due'] = 0;
                    $da['workshop_req_days'] = $shop_req_days + $days_left;
                    $da['workshop_start_date'] = $date;
                    $da['workshop_end_date'] = $end_date;
                    $da['workshop_plan'] = $shop_plan;
                }
            } else {
                $days_left = date_difference($user->shop_end_date, date('Y-m-d H:i:s')); if ($days_left <= 0) { $days_left = 0; } $days_added =  $shop_req_days + $days_left; $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $days_added . ' days'));
                if ($user->role == 'member') {
                    $da['is_active_shop_request'] = 1;
                    $da['is_active_workshop_request'] = 0;
                } else {
                    //approve request
                    $da['is_active_workshop_request'] = 0;
                    $da['is_active_shop_request'] = 0;
                    $da['role'] = "vendor";
                    $da['is_workshop'] = 0;
                    $da['shop_due'] = 0;
                    $da['shop_req_days'] = $shop_req_days + $days_left;
                    $da['shop_start_date'] = $date;
                    $da['shop_end_date'] = $end_date;
                    $da['shop_plan'] = $shop_plan;
                }
            }
            $da['shop_cache'] = $date;

            $this->db->where('id', $user->id);
            return $this->db->update('users', $da);
        }
    }

    //execute promote payment direct
    public function execute_promote_payment_direct($promoted_plan)
    {
        $mthd = $this->input->post('payment_method', true);
        if ($mthd == 'bank_transfer') {
            $payment_status = 'awaiting_payment';
        }else{
            $payment_status = 'payment_completed';
        }
        $data = array(
            'payment_method' => $this->input->post('payment_method', true),
            'payment_id' => $this->input->post('payment_id', true),
            'user_id' => user()->id,
            'product_id' => $promoted_plan->product_id,
            'currency' => $this->payment_settings->promoted_products_payment_currency,
            'payment_amount' => price_format_decimal($promoted_plan->total_amount),
            'payment_status' => $payment_status,
            'purchased_plan' => $promoted_plan->purchased_plan,
            'day_count' => $promoted_plan->day_count,
            'ip_address' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('promoted_transactions', $data);

        if ($mthd == 'bank_transfer') {
           $product = $this->product_model->get_product_by_id($promoted_plan->product_id);
            if (!empty($product)) {
                $re['is_promotion_request'] = 1;
                $this->db->where('id', $promoted_plan->product_id);
                $this->db->update('products', $re);
            }
        }
        
        $user = user();
        if (!empty($user) && $mthd != 'bank_transfer') {
            if ($mthd == 'earnings') {
                $da['balance'] = $user->balance - $promoted_plan->total_amount;
            }elseif ($mthd == 'wallet') {
                $da['wallet'] = $user->wallet - $promoted_plan->total_amount;
            }

            $this->db->where('id', $user->id);
            return $this->db->update('users', $da);
        }
    }


    //execute advert payment direct
    public function execute_wallet_payment_direct($wallet_plan)
    {
        $mthd = $this->input->post('payment_method', true);
        $date = date('Y-m-d H:i:s');
        if ($mthd == 'bank_transfer') {
            $payment_status = 'awaiting_payment';
            $is_wallet_credit_req = 1;
        }else{
            $payment_status = 'payment_completed';
            $is_wallet_credit_req = 0;
        }
        $data = array(
            'user_id' => $wallet_plan->product_id,
            'payment_method' => $this->input->post('payment_method', true),
            'payment_id' => $this->input->post('payment_id', true),
            'currency' => $this->payment_settings->promoted_products_payment_currency,
            'payment_amount' => price_format_decimal($wallet_plan->total_amount),
            'payment_status' => $payment_status,
            'ip_address' => 0,
            'is_wallet_credit_req' => $is_wallet_credit_req,
            'created_at' => $date
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('wallet_transactions', $data);

        
        $user = user();
        if (!empty($user) && $mthd != 'bank_transfer') {
            $da['balance'] = $user->balance - $wallet_plan->total_amount;
            $da['wallet'] = $user->wallet + $wallet_plan->total_amount;
            $this->db->where('id', $user->id);
            $this->db->update('users', $da);
        }
    }





    //execute advert payment direct
    public function execute_advert_payment_direct($advert_plan)
    {
        $mthd = $this->input->post('payment_method', true);
        $date = date('Y-m-d H:i:s');
        if (strpos($advert_plan->product_id, 'p') != false){
            $advert_target = 'product';
            $advert_plan->product_id = substr($advert_plan->product_id, 0, -1);
        }else{
           

            if (strpos($advert_plan->product_id, 'e') != false) {
                $advert_target = 'External';
            }else{
                if (get_user($advert_plan->product_id)->role == 'member') {
                   $advert_target = 'work';
                }else{
                    $advert_target = 'store';
                }
            }
            
            
            
        }
        if ($mthd == 'bank_transfer') {
            $payment_status = 'awaiting_payment';
        }else{
            $payment_status = 'payment_completed';
            $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $advert_plan->day_count . ' days'));
        }
        $data = array(
            'payment_method' => $this->input->post('payment_method', true),
            'payment_id' => $this->input->post('payment_id', true),
            'target_id' => $advert_plan->product_id,
            'currency' => $this->payment_settings->promoted_products_payment_currency,
            'payment_amount' => price_format_decimal($advert_plan->total_amount),
            'payment_status' => $payment_status,
            'advert_target' => $advert_target,
            'purchased_plan' => $advert_plan->purchased_plan,
            'day_count' => $advert_plan->day_count,
            'ip_address' => 0,
            'created_at' => $date,
            'advert_start_date' => $date,
            'advert_end_date' => $end_date,
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->where('created_at', user()->advert_cache);
        $this->db->update('user_advert', $data);

        


        
        $user = user();
        if (!empty($user) && $mthd != 'bank_transfer') {
            if ($mthd == 'earnings') {
                $da['balance'] = $user->balance - $advert_plan->total_amount;
            }elseif ($mthd == 'wallet') {
                $da['wallet'] = $user->wallet - $advert_plan->total_amount;
            }

            $this->db->where('id', $user->id);
            $this->db->update('users', $da);
        }

        if ($mthd == 'bank_transfer') {
            if ($advert_target == 'product'){
                $re['is_advert_request'] = 1;
                $this->db->where('id', $advert_plan->product_id);
                $this->db->update('products', $re);
            } elseif ($advert_target == 'work' || $advert_target == 'store'){
                $re['is_advert_request'] = 1;
                $this->db->where('id', $advert_plan->product_id);
                $this->db->update('users', $re);
            }
        }
        if ($advert_target == 'product') { $advert_plan->product_id = $advert_plan->product_id . 'p'; }
    }



    //execute store payment direct
    public function execute_store_payment_direct($store_plan)
    {
        $mthd = $this->input->post('payment_method', true);
        if ($mthd == 'bank_transfer') {
            $payment_status = 'awaiting_payment';
        }else{
            $payment_status = 'payment_completed';
        }
        if (($user->is_workshop == 1 && $mthd != 'bank_transfer') || ($user->role != "member" && $mthd != 'bank_transfer')) {
            $status = 'Approved';
        } else {
            $status = 'Processing';
        }
        $data = array(
            'payment_method' => $this->input->post('payment_method', true),
            'payment_id' => $this->input->post('payment_id', true),
            'user_id' => $store_plan->product_id,
            'currency' => $this->payment_settings->promoted_products_payment_currency,
            'payment_amount' => price_format_decimal($store_plan->total_amount),
            'payment_status' => $payment_status,
            'purchased_plan' => $store_plan->purchased_plan,
            'day_count' => $store_plan->day_count,
            'ip_address' => 0,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        );
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        $this->db->insert('store_plan_transaction', $data);

        $user = get_user($store_plan->product_id);


        if (!empty($user)) {
            if ($mthd == 'earnings') {
                $da['balance'] = $user->balance - $store_plan->total_amount;
            }elseif ($mthd == 'wallet') {
                $da['wallet'] = $user->wallet - $store_plan->total_amount;
            }
            $date = date('Y-m-d H:i:s'); $shop_req_days = $store_plan->day_count; $shop_plan = $store_plan->purchased_plan; 
            if (strpos($store_plan->purchased_plan, 'asic') != false || strpos($store_plan->purchased_plan, 'remium') != false || strpos($store_plan->purchased_plan, 'ltimate') != false) {
                 $days_left = date_difference($user->workshop_end_date, date('Y-m-d H:i:s')); if ($days_left <= 0) { $days_left = 0; } $days_added =  $shop_req_days + $days_left; $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $days_added . ' days'));
                if ($user->is_workshop != 1 || ($user->is_workshop == 1 && $mthd == 'bank_transfer')) {
                    $da['is_active_workshop_request'] = 1;
                    $da['is_active_shop_request'] = 0;
                } else {
                    //approve request
                    $da['is_active_workshop_request'] = 0;
                    $da['is_active_shop_request'] = 0;
                    $da['role'] = "member";
                    $da['is_workshop'] = 1;
                    $da['workshop_due'] = 0;
                    $da['workshop_req_days'] = $shop_req_days + $days_left;
                    $da['workshop_start_date'] = $date;
                    $da['workshop_end_date'] = $end_date;
                    $da['workshop_plan'] = $shop_plan;
                }
            } else {
                 $days_left = date_difference($user->shop_end_date, date('Y-m-d H:i:s')); if ($days_left <= 0) { $days_left = 0; } $days_added =  $shop_req_days + $days_left; $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $days_added . ' days'));
                if ($user->role == 'member' || ($user->role != 'member' && $mthd == 'bank_transfer')) {
                    $da['is_active_shop_request'] = 1;
                    $da['is_active_workshop_request'] = 0;
                } else {
                    //approve request
                    $da['is_active_workshop_request'] = 0;
                    $da['is_active_shop_request'] = 0;
                    $da['role'] = "vendor";
                    $da['is_workshop'] = 0;
                    $da['shop_due'] = 0;
                    $da['shop_req_days'] = $shop_req_days + $days_left;
                    $da['shop_start_date'] = $date;
                    $da['shop_end_date'] = $end_date;
                    $da['shop_plan'] = $shop_plan;
                }
            }
            $da['shop_cache'] = $date;

            $this->db->where('id', $user->id);
            return $this->db->update('users', $da);
        }
    }
    //add to promoted products
    public function add_to_promoted_products($promoted_plan)
    {
        $product = $this->product_model->get_product_by_id($promoted_plan->product_id);
        if (!empty($product)) {
            //set dates
            $date = date('Y-m-d H:i:s');
            $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $promoted_plan->day_count . ' days'));
            $data = array(
                'promote_plan' => $promoted_plan->purchased_plan,
                'promote_day' => $promoted_plan->day_count,
                'is_promoted' => 1,
                'promote_start_date' => $date,
                'promote_end_date' => $end_date
            );
            $this->db->where('id', $promoted_plan->product_id);
            return $this->db->update('products', $data);
        }
        return false;
    }

    //add to Advertisement
    public function add_to_advertisement($advert)
    {
        if (strpos($advert->product_id, 'p') != false) {
            $advert->product_id = substr($advert->product_id, 0, -1);
            $product = $this->product_model->get_product_by_id($advert->product_id);
             if (!empty($product)) {
                //set dates
                $date = date('Y-m-d H:i:s');
                $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $advert->day_count . ' days'));
                $data = array(
                    'advert_plan' => $advert->purchased_plan,
                    'advert_day' => $advert->day_count,
                    'advert_start_date' => $date,
                    'is_advert' => 1,
                    'advert_end_date' => $end_date
                );
                $this->db->where('id', $advert->product_id);
                return $this->db->update('products', $data);
            }
        }else{
            $user = get_user($advert->product_id);
             if (!empty($user)) {
                //set dates
                $date = date('Y-m-d H:i:s');
                $end_date = date('Y-m-d H:i:s', strtotime($date . ' + ' . $advert->day_count . ' days'));
                $data = array(
                    'advert_plan' => $advert->purchased_plan,
                    'advert_day' => $advert->day_count,
                    'advert_start_date' => $date,
                    'is_advert' => 1,
                    'advert_end_date' => $end_date
                );
                $this->db->where('id', $user->id);
                return $this->db->update('users', $data);
            }
        }
        
       
        return false;
    }

}
