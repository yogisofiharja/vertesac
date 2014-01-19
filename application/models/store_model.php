<?php
	class Store_model extends CI_Model{
		function get_all($page, $per_page, $condition){
			$q = $this->db->get('store');
			// $this->load->library('pagination');
			// $config['base_url'] = base_url('dashboard/report/?');
			// $config['per_page'] = 10; 
			// $config['uri_segment'] = 3;
			// $config['use_page_numbers'] = TRUE;
			// $config['page_query_string'] = TRUE;
			// $this->pagination->initialize($config); 
			return $q->result();
		}

		function get_by($key, $value){
			$q = $this->db->get_where('store', array($key=>$value));
			return $q->result();
		}

		function get_4(){
			$q = $this->db->get('store')->limit(4);
			return $q->result();
		}


	}
?>