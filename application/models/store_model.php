<?php
class Store_model extends CI_Model{

	var $store_type_id='';
	var $name='';
	var $email='';
	var $pswd='';
	var $address='';
	var $id_kabkota='';
	var $egg='';
	var $slogan='';
	var $desc='';
	var $site='';
	var $rating='';
	var $socme_id='';
	var $url='';
	var $filename='';

	//store login procces
	function login($email, $pswd){
		$this->db->select('store_id, email, pswd');
		$this->db->from('store');
		$this->db->where('email', $email);
		$this->db->where('pswd', $pswd);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	//model for store administrator
	function get_store_profile($store_id){
		$q = $this->db->query("select 
			s . *,
			sp . *,
			spp.filename,
			st.name as store_type,
			k.nama as kabupaten,
			pr.nama as provinsi,
			count(p.store_id) as jumlah_promo
			from
			provinsi pr,
			kabkota k,store s
			left join promo p on s.store_id = p.store_id
			left join store_gal_photo sp on s.store_id = sp.store_id
			left join store_type st on s.store_type_id = st.store_type_id
			left join store_prf_photo spp on s.store_id = spp.store_id
			where
			s.id_kabkota = k.id_kabkota
			and k.id_provinsi = pr.id_provinsi
			and spp.fl_setprofile=1
			and s.store_id =".$store_id);
		return $q->result();
	}

	function get_store_socmed($store_id){
		// $q = $this->db->get_where('store_socme',array('store_id'=>$store_id));
		$q = $this->db->query("select sm.*, ss.url, ss.store_id from social_media sm left join store_socme ss on sm.socme_id = ss.socme_id and ss.store_id = ".$store_id);
		return $q->result();
	}
	function delete_store_socmed($store_id){
		$this->db->delete('store_socme', array('store_id' => $store_id));
	}

	function set_store_socmed($store_id){
		$data=array(
			'store_id' => $store_id,
			'socme_id' => $this->socme_id,
			'url' => $this->url
			);
		$this->db->insert('store_socme', $data);
	}

	function set_profile_photo($store_id){
		$this->db->query("update store_prf_photo 
			set 
			fl_setprofile = NULL
			where
			 fl_setprofile = 1 and store_id = ".$store_id);

		$data=array(
			'store_id' => $store_id,
			'filename' => $this->filename,
			'fl_setprofile' => 1
			);
		$this->db->insert("store_prf_photo", $data);
	}

	function count_socmed(){
		return $this->db->count_all("social_media");
	}

	//maafkan ini nyempil dari tabel store_type
	function store_type(){
		$q = $this->db->get('store_type');
		return $q->result();
	}

	function provinsi(){
		$q = $this->db->get('provinsi');
		return $q->result();	
	}

	function kabkota($id_provinsi){
/*		$this->db->select('id_kabkota, nama');
		$this->db->from('kabkota');
		$this->db->where('id_provinsi', $id_provinsi);
		$query = $this->db->get();*/
		$query = $this->db->query("select id_kabkota, nama from kabkota where id_provinsi = ".$id_provinsi);
		return $query->result();
	}

	function edit($store_id){
		$data = array(
			'store_type_id'=> $this->store_type_id,
			'name'=> $this->name,
			'address'=> $this->address,
			'id_kabkota'=> $this->id_kabkota,
			'slogan'=> $this->slogan,
			'description'=> $this->desc,
			'site'=> $this->site
			// 'photo'=> $this->photo

			);
		$this->db->where('store_id', $store_id);
		$this->db->update('store', $data);
	}
		//end for store administrator 

		//model for landing page
	// function get_all($page, $per_page, $condition){
	function get_all(){
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
			$query = "select p.promo_id, p.subject, p.photo, p.disc, p.egg, s.name as store_name,st.name as store_type from promo p, store s, store_type st where p.store_id = s.store_id and s.store_type_id = st.store_type_id limit 4";
			return $this->db->query($query)->result();
			// return $this->db->get();			
		}
		//end model for landing page
	}
	?>