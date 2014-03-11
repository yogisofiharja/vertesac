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
		$config['total_rows'] = $bag->count_bag();
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
		$bag = new Bag_model();
		$data = array();
		$data['bag']= $bag->get_single($bag_type_id);
		$this->load->view("admin/edit_bag", $data);	
	}

	public function gallery($bag_type_id){
		$bag = new Bag_model();
		$data = array();
		$data['bag_gallery'] = $bag->get_bag_gallery($bag_type_id);
		$this->load->view("admin/gallery", $data);	
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
		//upload photo
		$config['upload_path'] = './asset/photo/bag/main/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'photo_'.$bag->bag_type_id;
		$config['max_size']='50000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			$bag->photo=$this->upload->data()['file_name'];
			$bag->save();
			redirect('admin/bag');
		}else{
			print "<pre>";
			print_r($this->upload->display_errors());
			print "</pre>";
		}
	}

	public function update($bag_type_id){
		$bag = new Bag_model();
		$bag->name = $this->input->post('name');
		$bag->type = $this->input->post('type');
		$bag->gender = $this->input->post('gender');
		$bag->short_desc = $this->input->post('short_desc');
		$bag->price = $this->input->post('price');
		$bag->update($bag_type_id);
		if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
			// echo "foto ada";exit;
			//exec("rm ./asset/photo/bag/main/".$this->input->post('photo'));
			$config['upload_path'] = './asset/photo/bag/main/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = 'photo_'.$bag_type_id;
			$config['max_size']='50000';

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$bag->photo=$this->upload->data()['file_name'];
				$bag->update($bag_type_id);
				redirect('admin/bag');
			}else{
				print "<pre>";
				print_r($this->upload->display_errors());
				print "</pre>";
			}
		}else{
			// echo "foto ga ada";exit;
			$bag->update($bag_type_id);		
			redirect('admin/bag');
		}	
		redirect('admin/bag/edit_bag/'.$bag_type_id);	
	}

	public function delete($bag_type_id){
		$bag = new Bag_model();
		//remove foto database and folder
		$bag->delete($bag_type_id);
		redirect('admin/bag');
	}
}