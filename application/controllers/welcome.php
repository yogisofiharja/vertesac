<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
    }
	public function index()
	{
        $store = new Store_model();
		$data = array();
		$data['stores'] = $store->get_empat();
		$this->load->view('index', $data); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */