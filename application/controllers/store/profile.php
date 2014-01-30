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
		$store_id = 1;//ntar diganti ambil dari session
		$store = new Store_model();
		$store->store_type_id = $this->input->post('store_type');
		$store->name = $this->input->post('name');
		$store->address = $this->input->post('address');
		$store->id_kabkota = $this->input->post('id_kabkota');
		$store->slogan = $this->input->post('slogan');
		$store->site = $this->input->post('site');
		$store->desc = $this->input->post('desc');
		
		$socmed = array();
		
		$config['upload_path'] = './asset/photo/store/profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'profile_of_'.$store_id;
		$config['max_size']='50000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			$store->photo=$this->upload->data()['orig_name'];
			print "<pre>";
			print_r($this->upload->data());
			print "</pre>";
			$store->edit($this->input->post('store_id'));
			for($i=1;$i<=$store->count_socmed();$i++){
				if($this->input->post('socmed')[$i]!=""){
					$socmed[$i] = $this->input->post('socmed')[$i];
				}
			}
			$store->delete_store_socmed(1);
			foreach ($socmed as $key => $value) {
				echo $key." ";
				echo $value."<br/>";
				$store->socme_id = $key;
				$store->url = $value;
				$store->set_store_socmed(1);
			}
			redirect('store/profile/edit');
		}else{
			print "<pre>";
			print_r($this->upload->display_errors());
			print "</pre>";

		}
	}

	public function get_kabkota($id_provinsi){
		$store = new Store_model();
		$data = array();
		$data['kabkota'] = $store->kabkota($id_provinsi);
		echo json_encode($data['kabkota']);
	}
}
?>