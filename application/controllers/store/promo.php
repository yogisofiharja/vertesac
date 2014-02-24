<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promo extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function lists(){
		
		$promo = new Promo_model();
		$data = array();

		$this->load->library('pagination');
		$config['base_url'] = base_url('store/promo/lists');
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = 5; 
		$config['uri_segment'] = 4;
		// $config['use_page_numbers'] = TRUE;
		// $config['page_query_string'] = TRUE;
		$config['total_rows'] = $promo->count_promo(1)[0]->jumlah;
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$data['promo'] = $promo->get_all_promo(1, $page, $config['per_page']);
		// $data['promo'] = $promo->get_all(1);
		$data['pages'] = $this->pagination->create_links(); 
		$this->load->view('store/promo', $data);
	}

	public function save(){
		$store_id = 1;//ntar ambil dari session
		$promo = new Promo_model();
		$promo->subject = $this->input->post('subject');
		// $promo->photo = $this->input->post('file');
		$promo->desc = $this->input->post('desc');
		$promo->disc = $this->input->post('disc');
		$promo->egg = $this->input->post('egg');
		$promo->start_time = date("Y-m-d",strtotime($this->input->post('start_time')));
		$promo->end_time = date("Y-m-d",strtotime($this->input->post('end_time')));
		$promo->promo_code = rand(1, 1500);

		$config['upload_path'] = './asset/photo/promo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = 'promo_of_'.$store_id.'_'.$promo->promo_code.'_';
		$config['max_size']='50000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('file')){
			$promo->photo=$this->upload->data()['file_name'];
			$promo->save($store_id);
			redirect('store/promo');
		}else{
			print "<pre>";
			print_r($this->upload->display_errors());
			print "</pre>";
		}

	}
	public function edit($promo_code){
		$store_id = 1; //ntar ambil dari session
		$promo = new Promo_model();
		$data['promo'] = $promo->get_promo_detail($store_id, $promo_code);
		$this->load->view('store/promo_edit', $data);
		/*print "<pre>";
		print_r($data);
		print "</pre>";	*/
	}

	public function update(){
		$store_id = 1;//ntar ambil dari session
		$promo = new Promo_model();
		$promo->subject = $this->input->post('subject');
		// $promo->photo = $this->input->post('file');
		$promo->desc = $this->input->post('keterangan');
		$promo->disc = $this->input->post('discount');
		$promo->egg = $this->input->post('egg');
		$promo->start_time = date("Y-m-d",strtotime($this->input->post('start_time')));
		$promo->end_time = date("Y-m-d",strtotime($this->input->post('end_time')));

		if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
			// echo "foto ada";exit;
			exec("rm ./asset/photo/promo/".$this->input->post('photo'));
			$config['upload_path'] = './asset/photo/promo/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = 'promo_of_'.$store_id.'_'.$promo->promo_code.'_';
			$config['max_size']='50000';

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$promo->photo=$this->upload->data()['file_name'];
				$promo->update($store_id, $this->input->post('promo_code'));
				redirect('store/promo/edit/'.$this->input->post('promo_code'));
			}else{
				print "<pre>";
				print_r($this->upload->display_errors());
				print "</pre>";
			}
		}else{
			// echo "foto ga ada";exit;
			$promo->update($store_id, $this->input->post('promo_code'));		
			redirect('store/promo/edit/'.$this->input->post('promo_code'));
		}
	}

}
?>