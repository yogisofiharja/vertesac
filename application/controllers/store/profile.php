<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller {
	
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

	public function edit(){
		$store = new Store_model();
		$data = array();
		$data['profile'] = $store->get_store_profile(1);
		$data['store_socmed'] = $store->get_store_socmed(1);
		$data['store_type'] = $store->store_type();
		$data['provinsi'] = $store->provinsi();
		$this->load->view('store/profile_edit', $data);
	}

	public function update(){
		$store = new Store_model();
		$store->store_type_id = $this->input->post('store_type');
		$store->name = $this->input->post('name');
		$store->address = $this->input->post('address');
		$store->id_kabkota = $this->input->post('id_kabkota');
		$store->slogan = $this->input->post('slogan');
		$store->site = $this->input->post('site');
		$store->desc = $this->input->post('desc');
		$store->edit($this->input->post('store_id'));
		redirect('store/profile/edit');
	}

	public function get_kabkota($id_provinsi){
		$store = new Store_model();
		$data = array();
		$data['kabkota'] = $store->kabkota($id_provinsi);
		echo json_encode($data['kabkota']);
	}
}
?>