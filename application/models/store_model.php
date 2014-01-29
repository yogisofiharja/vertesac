<?php
class Store_model extends CI_Model{
		//model for store administrator
	function get_store_profile($store_id){
		$q = $this->db->query("select s.*, sp.photo, count(p.store_id) as jumlah_promo from store s, promo p, store_photo sp where s.store_id=p.store_id and sp.store_id=s.store_id and s.store_id =" .$store_id);
		return $q->result();
	}

	function get_store_socmed($store_id){
		// $q = $this->db->get_where('store_socme',array('store_id'=>$store_id));
		$q = $this->db->query("select sm.name, sm.icon, ss.* from social_media sm, store_socme ss where sm.socme_id = ss.socme_id and ss.store_id = ".$store_id);
		return $q->result();
	}

		//end for store administrator 

		//model for landing page
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

	function get_empat(){
/*			$this->db->select('p.promo_id, p.subject, p.photo, p.disc, p.egg, s.name,st.name');
			$this->db->from('promo as p, store as s, store_type st');
			$this->db->where('p.store_id = s.store_id and s.store_type_id = st.store_type_id');
			$this->db->limit(4);
			return $this->db->get();*/

			return $this->db->query("select p.promo_id, p.subject, p.photo, p.disc, p.egg, s.name as store_name,st.name as store_type from promo p, store s, store_type st where p.store_id = s.store_id and s.store_type_id = st.store_type_id limit 4")->result();
			// return $this->db->get();			
		}
		//end model for landing page
	}
	?>