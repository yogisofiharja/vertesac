<?php
class Promo_model extends CI_Model{
	function get_recent_promo($store_id){
		$query = $this->db->get_where('promo', array('store_id'=>$store_id), 8);
		return $query->result();
	}
}
?>