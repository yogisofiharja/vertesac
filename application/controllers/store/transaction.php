<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Transaction extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$is_logged_in = $this->session->userdata('logged_in');
        if($is_logged_in && $is_logged_in['user_type']!='store'){
            redirect('');
        }
	}

	public function lists(){
		$store_id=$this->session->userdata('logged_in')['store_id'];
		$transaction = new Transaction_model();
		$data=array();

		$this->load->library('pagination');
		$config['base_url'] = base_url('store/transaction/lists');
		$config['total_rows'] = $transaction->count_all($store_id)[0]->jumlah;
		$config['per_page'] = 8; 
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 4;
		// print_r($config);exit;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$data['transaction'] = $transaction->get_all($store_id, $page, $config['per_page']);
		$data['pages'] = $this->pagination->create_links(); 
		$this->load->view('store/transaction', $data);
	}
}