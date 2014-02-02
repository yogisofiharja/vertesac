<?php
class Promo_model extends CI_Model{
	var $subject = '';
	var $desc = '';
	var $photo = '';
	var $disc = '';
	var $egg = '';
	var $start_time = '';
	var $end_time = '';
	var $promo_code = '';


	function get_recent_promo($store_id){
		$query = $this->db->get_where('promo', array('store_id'=>$store_id), 8);
		return $query->result();
	}

	function get_all_promo($store_id){
		$query = $this->db->get_where('promo', array('store_id'=>$store_id));
		return $query->result();
	}

	function save($store_id){
		$data = array(
			'promo_code' => $this->promo_code,
			'store_id' => $store_id,
			'subject' => $this->subject,
			'desc' => $this->desc,
			'photo' => $this->photo,
			'disc' => $this->disc,
			'egg' => $this->egg,
			'start_time' => $this->start_time,
			'end_time' => $this->end_time
		);
		$this->db->insert('promo', $data);
	}

	function update($store_id, $promo_code){
		if($this->photo){
			$data = array(
				'subject' => $this->subject,
				'desc' => $this->desc,
				'disc' => $this->disc,
				'egg' => $this->egg,
				'start_time' => $this->start_time,
				'end_time' => $this->end_time,
				'photo' => $this->photo
			);	
			$array= array('store_id'=>$store_id, 'promo_code'=>$promo_code);
			$this->db->where($array);
			$this->db->update('promo', $data);
		}else{
			$data = array(
				'subject' => $this->subject,
				'desc' => $this->desc,
				'disc' => $this->disc,
				'egg' => $this->egg,
				'start_time' => $this->start_time,
				'end_time' => $this->end_time
			);	
			$array= array('store_id'=>$store_id, 'promo_code'=>$promo_code);
			$this->db->where($array);
			$this->db->update('promo', $data);
		}
	}

	function get_promo_detail($store_id, $promo_code){
		$query = $this->db->get_where('promo', array('store_id'=>$store_id, 'promo_code'=>$promo_code));
		return $query->result();	
	}
}
?>