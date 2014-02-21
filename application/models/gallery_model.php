<?php
class Gallery_model extends CI_Model{
	var $photo = "";
	var $nama = "";

	function get_all_photo($store_id, $page="1", $maxList){
		
		if($page ==0){
			$page = 1;
		}
		$page = $page - 1;
		$startNumber = $page * $maxList;
		$startNumber < 0 ? $startNumber =0: $startNumber = $startNumber;

		// $query = $this->db->get_where('store_photo', array('store_id'=>$store_id), $startNumber, $maxList);
		$query = $this->db->query("select * from store_photo where store_id = $store_id limit $startNumber, $maxList");
		return $query->result();
	}	

	function count_photo($store_id){
		$query = $this->db->query("SELECT COUNT( photo_id ) as jumlah FROM  `store_photo` WHERE store_id =$store_id");
		return $query->result();
	}

	function save($store_id){
		$data = array(
			'store_id' => $store_id,
			'photo' => $this->photo,
			'nama' => $this->nama,
			'fl_active' => 1
		);
		$this->db->insert('store_photo', $data);
	}
}
?>