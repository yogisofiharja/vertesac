<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Store extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$store = new Store_model();
		$promo = new Promo_model();
		$data = array();
		$data['profile'] = $store->get_store_profile(1);
		$data['store_socmed'] = $store->get_store_socmed(1);
		$data['recent_promo'] = $promo->get_recent_promo(1);
		$this->load->view('store/index', $data);
	}
}
?>