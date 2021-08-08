<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{

	//input values
	public function input_values()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'message' => $this->input->post('message', true)
		);
		return $data;
	}

	//add contact message
	public function add_contact_message()
	{
		$data = $this->input_values();
		//send email
		if ($this->general_settings->send_email_contact_messages == 1) {
			$email_data = array(
				'email_type' => 'contact',
				'message_name' => $data['name'],
				'message_email' => $data['email'],
				'message_text' => $data['message']
			);
			$this->session->set_userdata('mds_send_email_data', json_encode($email_data));
		}

		$data["created_at"] = date('Y-m-d H:i:s');
		return $this->db->insert('contacts', $data);
	}


	//add shop report
	public function add_shop_report()
	{
        $data = array(
            'reporter_id' => $this->input->post('sender_id', true),
            'reported_shop_id' => $this->input->post('receiver_id', true),
            'subject' => $this->input->post('subject', true),
            'report' => $this->input->post('message', true),
            'created_at' => date("Y-m-d H:i:s")
        );
        if (!empty($data['report'])) {
            return $this->db->insert('shop_reports', $data);
        }
        return false;
	}

	
	//get contact messages
	public function get_contact_messages()
	{
		$query = $this->db->get('contacts');
		return $query->result();
	}

	//get unread contact messages count
	public function get_unread_contact_messages_count()
	{
		$this->db->where('is_admin_view', 0);
		$query = $this->db->get('contacts');
		return $query->num_rows();
	}


	//set contact message as read
	public function set_contact_message_read($id)
	{
		$data = array(
			'is_admin_view' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('contacts', $data);
	}



	//set report as read
	public function set_report_read($id)
	{
		$data = array(
			'is_admin_view' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('shop_reports', $data);
	}


	//get reports
	public function get_reports()
	{
		$query = $this->db->get('shop_reports');
		return $query->result();
	}


	//get reports
	public function get_report($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('shop_reports');
		return $query->result();
	}



	//get unread reports count
	public function get_unread_reports_count()
	{
		$this->db->where('is_admin_view', 0);
		$query = $this->db->get('shop_reports');
		return $query->num_rows();
	}



	//get forsale messages
	public function get_forsale_messages()
	{
        $this->db->where('status', 0);
        $query = $this->db->get('conversation_messages');
        return $query->result();
	}




	//get forsale messages count
	public function get_forsale_messages_count()
	{
        $this->db->where('status', 0);
        $query = $this->db->get('conversation_messages');
        return $query->num_rows();
	}


	//get contact message
	public function get_contact_message($id)
	{
		$id = clean_number($id);
		$this->db->where('id', $id);
		$query = $this->db->get('contacts');
		return $query->result();
	}

	//get last contact messages
	public function get_last_contact_messages()
	{
		$this->db->limit(5);
		$query = $this->db->get('contacts');
		return $query->result();
	}

	//delete contact message
	public function delete_contact_message($id)
	{
		$id = clean_number($id);
		$contact = $this->get_contact_message($id);

		if (!empty($contact)) {
			$this->db->where('id', $id);
			return $this->db->delete('contacts');
		}
		return false;
	}
}
