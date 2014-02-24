<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function lists(){
		$store_id = 1;
		$gallery = new Gallery_model();	
		$data = array();

		$this->load->library('pagination');
		$config['base_url'] = base_url('store/gallery/lists');
		$config['total_rows'] = $gallery->count_photo(1)[0]->jumlah;
		$config['per_page'] = 8; 
		$config['use_page_numbers'] = TRUE;
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$data['photo']=$gallery->get_all_photo($store_id, $page, $config['per_page']);	
		$data['pages'] = $this->pagination->create_links(); 
		$this->load->view('store/gallery', $data);
	}

	public function save(){
		$store_id = 1;
		$gallery = new Gallery_model();
		$gallery->nama = $this->input->post('nama');
		$nomor = rand(500, 15000);
		$config['upload_path'] = './asset/photo/store/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'photo_of_'.$store_id.'_'.$nomor.'_';
		$config['max_size']='50000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			$gallery->photo=$this->upload->data()['file_name'];
			$gallery->save($store_id);
			redirect('store/gallery');
		}else{
			print "<pre>";
			print_r($this->upload->display_errors());
			print "</pre>";
		}
	}

	public function delete($photo_id){
		$gallery = new Gallery_model();
		$photo = array();
		$photo= $gallery->get_single_photo($photo_id);
		exec("rm ./asset/photo/store/".$photo[0]->photo);
		$gallery->delete($photo_id);
		redirect('store/gallery');
	}
	public function update(){
		$gallery = new Gallery_model();
		$store_id = 1;
		$nomor = rand(500, 15000);
		$photo_id = $this->input->post('photo_id');
		$gallery->nama = $this->input->post('nama');
		if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
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
		}
	}
}