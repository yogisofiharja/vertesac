<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Store extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$store = new Store_model();
		$data = array();
		$data['store'] = $store->get_all();
		$this->load->view('admin/store', $data);
	}

}