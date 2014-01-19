<?php
class Contact_model extends CI_Model{
	var $name='';
	var $email='';
	var $message='';
	
	function save(){
		$data=array(
			'name' => $this->name,
			'email' => $this->email,
			'message' => $this->message
			);
		$this->db->insert('contact_us', $data);
	}
}
?>