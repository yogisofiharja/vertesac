<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bag extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function lists(){
		$bag = new Bag_model();
		$data = array();

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/bag/lists');
		$config['total_rows'] = $bag->count_bag()[0]->jumlah;
		$config['per_page'] = 8; 
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;

		$data['bag_list']= $bag->get_all_bag($page, $config['per_page']);
		$data['pages']=$this->pagination->create_links();
		$this->load->view('admin/bag', $data);
	}
	
	public function add_bag(){
		$this->load->view("admin/add_bag");
	}

	public function edit_bag($bag_type_id){
		$this->load->view("admin/edit_bag");	
	}

	public function save(){
		$bag = new Bag_model();
		$bag_type_id = $bag->get_last_id();
		$bag->name = $this->input->post('name');
		$bag->type = $this->input->post('type');
		$bag->gender = $this->input->post('gender');
		$bag->short_desc = $this->input->post('short_desc');
		$bag->price = $this->input->post('price');
		if($bag_type_id->bag_type_id < 10){
			$bag->bag_type_id = '00'.($bag_type_id->bag_type_id + 1);
		}else if($bag_type_id->bag_type_id > 9 && $bag_type_id->bag_type_id < 100){
			$bag->bag_type_id = '0'.($bag_type_id->bag_type_id + 1);
		}else{
			$bag->bag_type_id = $bag_type_id->bag_type_id + 1;
		}
		// $bag->save();
		redirect('admin/bag');
	}

	public function update($bag_type_id){
		$bag = new Bag_model();
		$bag->name = $this->input->post('name');
		$bag->type = $this->input->post('type');
		$bag->gender = $this->input->post('gender');
		$bag->short_desc = $this->input->post('short_desc');
		$bag->price = $this->input->post('price');

		/*if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
			// echo "foto ada";exit;
			exec("rm ./asset/photo/store/".$this->input->post('photo'));
			$config['upload_path'] = './asset/photo/store/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = 'photo_of_'.$store_id.'_'.$nomor.'_';
			$config['max_size']='50000';

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$gallery->photo=$this->upload->data()['file_name'];
				$gallery->update($photo_id);
				redirect('store/gallery/');
			}else{
				print "<pre>";
				print_r($this->upload->display_errors());
				print "</pre>";
			}
		}else{
			// echo "foto ga ada";exit;
			$gallery->update($photo_id);		
			redirect('store/gallery');
		}*/	
		redirect('admin/bag/edit_bag/'.$bag_type_id);	
	}
}