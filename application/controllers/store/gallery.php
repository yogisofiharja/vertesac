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
		$config['per_page'] = 2; 
		$config['uri_segment'] = 4;
		
		$config['total_rows'] = $gallery->count_photo(1)[0]->jumlah;
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
}