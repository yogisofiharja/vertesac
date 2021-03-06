<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Profile extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$is_logged_in = $this->session->userdata('logged_in');
		if(!$is_logged_in && $is_logged_in['user_type']!="store"){
            redirect('');
        }
	}

	public function index(){
		$store_id=$this->session->userdata('logged_in')['store_id'];
		/*print_r($this->session->userdata('logged_in'));
		print_r($store_id);exit;*/
		$store = new Store_model();
		$promo = new Promo_model();
		$data = array();
		$data['profile'] = $store->get_store_profile($store_id);
		$data['store_socmed'] = $store->get_store_socmed($store_id);
		$data['recent_promo'] = $promo->get_recent_promo($store_id);
		$this->load->view('store/index', $data);
	}

	public function edit(){
		$store_id=$this->session->userdata('logged_in')['store_id'];
		$store = new Store_model();
		$data = array();
		$data['profile'] = $store->get_store_profile($store_id);
		$data['store_socmed'] = $store->get_store_socmed($store_id);
		$data['store_type'] = $store->store_type();
		$data['provinsi'] = $store->provinsi();
		$this->load->view('store/profile_edit', $data);
	}

	public function update(){
		$store_id=$this->session->userdata('logged_in')['store_id'];
		$store = new Store_model();
		$store->store_type_id = $this->input->post('store_type');
		$store->name = $this->input->post('name');
		$store->address = $this->input->post('address');
		$store->id_kabkota = $this->input->post('id_kabkota');
		$store->slogan = $this->input->post('slogan');
		$store->site = $this->input->post('site');
		$store->desc = $this->input->post('desc');
		$store->edit($store_id);
		
		$socmed = array();
		if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
			//hapus foto lama
			// exec("rm ./asset/photo/store/profile/".$this->input->post('photo'));

			$config['upload_path'] = './media/images/store/profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = 'profile_of_'.$store_id.'_';
			$config['max_size']='50000';

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$store->filename=$this->upload->data()['file_name'];
				/*print "<pre>";
				print_r($this->upload->data());
				print "</pre>";
				echo $store->photo;*/
				$store->set_profile_photo($store_id);
				for($i=1;$i<=$store->count_socmed();$i++){
					if($this->input->post('socmed')[$i]!=""){
						$socmed[$i] = $this->input->post('socmed')[$i];
					}
				}
				$store->delete_store_socmed($store_id);
				foreach ($socmed as $key => $value) {

					$store->socme_id = $key;
					$store->url = $value;
					$store->set_store_socmed($store_id);
				}
				redirect('store/profile/edit');
			}else{
				print "<pre>";
				print_r($this->upload->display_errors());
				print "</pre>";

			}
		}else{
			$store->photo = $this->input->post('photo');
			$store->edit($this->input->post('store_id'));
			for($i=1;$i<=$store->count_socmed();$i++){
				if($this->input->post('socmed')[$i]!=""){
					$socmed[$i] = $this->input->post('socmed')[$i];
				}
			}
			$store->delete_store_socmed($store_id);
			foreach ($socmed as $key => $value) {

				$store->socme_id = $key;
				$store->url = $value;
				$store->set_store_socmed($store_id);
			}
			redirect('store/profile/edit');
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