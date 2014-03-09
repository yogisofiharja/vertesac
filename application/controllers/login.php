<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function process(){
		$user_type = $this->input->post('user_type');

		if($user_type == 'user'){

		}else if($user_type == 'store'){
			$store = new Store_model();
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$result = $store->login($email, $password);

			if($result){
				$sess_array = array();
				foreach ($result as $row) {
					$sess_array = array(
						'store_id' => $row->store_id,
						'email' => $row->email,
						'user_type' => "store"
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
				// print_r($this->session->userdata('logged_in')['store_id']);
				redirect('store');
			}else{
				$this->session->set_flashdata('status', "error");
				redirect('welcome');
			}
		}else if($user_type == "admin"){

		}

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
   		redirect('welcome');
	}
}