<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Promo extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$promo = new Promo_model();
		$data = array();		
		$data['promo'] = $promo->get_all_promo(1);
		$this->load->view('store/promo', $data);
	}


}
?>