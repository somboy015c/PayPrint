<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earnings_admin_model extends CI_Model
{
    //filter earnings
    public function filter_earnings()
    {
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $data['q'] = str_replace("#", "", $data['q']);
            $this->db->where('earnings.order_number', $data['q']);
        }
    }

    //get earnings count
    public function get_earnings_count()
    {
        $this->filter_earnings();
        $query = $this->db->get('earnings');
        return $query->num_rows();
    }

    //get paginated earnings
    public function get_paginated_earnings($per_page, $offset)
    {
        $this->filter_earnings();
        $this->db->order_by('earnings.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('earnings');
        return $query->result();
    }

    //filter credit request
    public function filter_credit_request()
    {
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $this->db->join('users', 'wallet_transactions.user_id = users.id');
            $this->db->select('wallet_transactions.*, users.username as user_username, users.shop_name as shop_name, users.role as user_role, users.slug as user_slug');
            $this->db->where('users.username', $data['q']);
        }
    }

    //filter seller balances
    public function filter_seller_balances()
    {
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $this->db->where('users.username', $data['q']);
        }
    }

    //get users count
    public function get_users_count()
    {
        $this->filter_seller_balances();
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    //get paginated users
    public function get_paginated_users($per_page, $offset)
    {
        $this->filter_seller_balances();
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('users');
        return $query->result();
    }

    //get paginated users
    public function get_paginated_requests($per_page, $offset)
    {
        $this->filter_credit_request();
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('wallet_transactions');
        return $query->result();
    }


    //get wallet credit requests count
    public function get_wallet_requests_count()
    {
        $this->filter_credit_request();
        $query = $this->db->get('wallet_transactions');
        return $query->num_rows();
    }


    //get wallet credit requests count
    public function get_wallet_new_requests_count()
    {
        $this->db->where('payment_status', 'awaiting_payment');
        $query = $this->db->get('wallet_transactions');
        return $query->num_rows();
    }

    //delete earning
    public function delete_earning($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('earnings');
        $row = $query->row();

        if (!empty($row)) {
            $this->db->where('id', $id);
            return $this->db->delete('earnings');
        } else {
            return false;
        }
    }

    //filter payouts
    public function filter_payouts()
    {
        $data = array(
            'q' => $this->input->get('q', true)
        );
        $data['q'] = trim($data['q']);
        if (!empty($data['q'])) {
            $this->db->where('payouts.user_id', $data['q']);
        }
    }

    //get completed payouts count
    public function get_completed_payouts_count()
    {
        $this->filter_payouts();
        $this->db->where('payouts.status', 1);
        $query = $this->db->get('payouts');
        return $query->num_rows();
    }

    //get paginated completed payouts
    public function get_paginated_completed_payouts($per_page, $offset)
    {
        $this->filter_payouts();
        $this->db->where('payouts.status', 1);
        $this->db->order_by('payouts.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('payouts');
        return $query->result();
    }

    //get payout requests count
    public function get_payout_requests_count()
    {
        $this->filter_payouts();
        $this->db->where('payouts.status', 0);
        $query = $this->db->get('payouts');
        return $query->num_rows();
    }

    //get paginated payout requests
    public function get_paginated_payout_requests($per_page, $offset)
    {
        $this->filter_payouts();
        $this->db->where('payouts.status', 0);
        $this->db->order_by('payouts.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('payouts');
        return $query->result();
    }

    //add payout
    public function add_payout($user_id, $amount)
    {
        $user_id = clean_number($user_id);
        $data = array(
            'user_id' => $user_id,
            'payout_method' => $this->input->post('payout_method', true),
            'payout_from' => $this->input->post('payout_from', true),
            'amount' => $amount,
            'currency' => $this->payment_settings->default_product_currency,
            'status' => $this->input->post('status', true),
            'created_at' => date('Y-m-d H:i:s')
        );

        if ($data['status'] == 1) {
            if ($this->db->insert('payouts', $data)) {
                return $this->reduce_user_balance($user_id, $amount, $data['payout_from']);
            }
        } else {
            return $this->db->insert('payouts', $data);

        }
        return false;
    }

    //complete payout
    public function complete_payout($payout_id, $user_id, $amount)
    {
        $payout_id = clean_number($payout_id);
        $user_id = clean_number($user_id);
        $from = $this->input->post('payout_from', true);
        $data = array(
            'status' => 1
        );

        $this->db->where('id', $payout_id);
        $update = $this->db->update('payouts', $data);
        if ($update) {
            return $this->reduce_user_balance($user_id, $amount, $from);
        }

        return false;
    }

    //check user balance
    public function check_user_balance($user_id, $amount, $payout_from)
    {
        $user_id = clean_number($user_id);
        $user = $this->auth_model->get_user($user_id);
        if (!empty($user)) {
            if ($payout_from == "Wallet") { $balance = $user->wallet; }elseif ($payout_from == "Earnings") { $balance = $user->balance; }
            if ($balance >= $amount) {
                return true;
            }
        }
        return false;
    }

    //reduce user balance
    public function reduce_user_balance($user_id, $amount, $from)
    {
        $user_id = clean_number($user_id);
        $user = $this->auth_model->get_user($user_id);
        if (!empty($user)) {
            if ($from == 'Wallet') {
               $balance = $user->wallet - $amount;
                $data = array(
                    'wallet' => $balance
                );
            }elseif ($from == 'Earnings') {
               $balance = $user->balance - $amount;
                $data = array(
                    'balance' => $balance
                );
            }
            $this->db->where('id', $user_id);
            return $this->db->update('users', $data);
        }
        return false;
    }

    //update user balance
    public function update_seller_balance()
    {
        $user_id = $this->input->post('user_id', true);
        $user = $this->auth_model->get_user($user_id);
        if (!empty($user)) {
            $data = array(
                'number_of_sales' => $this->input->post('number_of_sales', true),
                'balance' => $this->input->post('balance', true),
                'wallet' => $this->input->post('wallet', true)
            );

            $data["balance"] = price_database_format($data["balance"]);
            $data["wallet"] = price_database_format($data["wallet"]);

            $this->db->where('id', $user_id);
            return $this->db->update('users', $data);
        }
        return false;
    }

    //approve credit
    public function approve_credit($user_id, $amount)
    {
        $method = $this->input->post('method', true);
        if ($method == 'earnings') {
           $data["balance"] = get_user($user_id)->balance - $amount;
        }
        $data["wallet"] = get_user($user_id)->wallet + $amount;

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);


        $dat = array(
            'payment_status' => 'payment_completed',
            'is_wallet_credit_req' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('wallet_transactions', $dat);
    }

    //update paypal payout settings
    public function update_paypal_payout_settings()
    {
        $data = array(
            'payout_paypal_enabled' => $this->input->post('payout_paypal_enabled', true),
            'min_payout_paypal' => $this->input->post('min_payout_paypal', true)
        );
        $data["min_payout_paypal"] = price_database_format($data["min_payout_paypal"]);
        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //update iban payout settings
    public function update_iban_payout_settings()
    {
        $data = array(
            'payout_iban_enabled' => $this->input->post('payout_iban_enabled', true),
            'min_payout_iban' => $this->input->post('min_payout_iban', true)
        );
        $data["min_payout_iban"] = price_database_format($data["min_payout_iban"]);
        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //update swift payout settings
    public function update_swift_payout_settings()
    {
        $data = array(
            'payout_swift_enabled' => $this->input->post('payout_swift_enabled', true),
            'min_payout_swift' => $this->input->post('min_payout_swift', true)
        );
        $data["min_payout_swift"] = price_database_format($data["min_payout_swift"]);
        $this->db->where('id', 1);
        return $this->db->update('payment_settings', $data);
    }

    //delete payout
    public function delete_payout($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('payouts');
        $row = $query->row();

        if (!empty($row)) {
            $this->db->where('id', $id);
            return $this->db->delete('payouts');
        } else {
            return false;
        }
    }
}