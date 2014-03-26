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
			$pswd = $this->input->post('password');
			$pswd = $this->encrypt($pswd, "store_password");
			$result = $store->login($email, $pswd);

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
//redirect('welcome');
			}
		}else if($user_type == "admin"){

		}

	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('welcome');
	}

	function encrypt($text, $salt){
		return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}

	function decrypt($text, $key){
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
	}
}