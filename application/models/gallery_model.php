<?php
class Gallery_model extends CI_Model{
	var $filename = "";

	function get_all_photo($store_id, $page="1", $maxList){
		
		if($page ==0){
			$page = 1;
		}
		$page = $page - 1;
		$startNumber = $page * $maxList;
		$startNumber < 0 ? $startNumber =0: $startNumber = $startNumber;

		// $query = $this->db->get_where('store_gal_photo', array('store_id'=>$store_id), $startNumber, $maxList);
		$query = $this->db->query("select * from store_gal_photo where store_id = $store_id limit $startNumber, $maxList");
		return $query->result();
	}	

	function get_single_photo($photo_id){
		return $this->db->get_where('store_gal_photo', array('photo_id'=>$photo_id))->result();
	}

	function count_photo($store_id){
		$query = $this->db->query("SELECT COUNT( photo_id ) as jumlah FROM  `store_gal_photo` WHERE store_id =$store_id");
		return $query->result();
	}

	function save($store_id){
		$data = array(
			'store_id' => $store_id,
			'filename' => $this->filename
		);
		$this->db->insert('store_gal_photo', $data);
	}
	
	function delete($photo_id){
		$this->db->delete('store_gal_photo',array('photo_id'=>$photo_id));
	}

	function update($photo_id){
		if($this->photo){
			$data = array(
				'filename'=>$this->filename
			);
			$array = array('photo_id'=>$photo_id);
			$this->db->where($array);
			$this->db->update('store_gal_photo', $data);
		}else{
			$data = array(
				'nama'=>$this->nama				
			);
			$array = array('photo_id'=>$photo_id);
			$this->db->where($array);
			$this->db->update('store_gal_photo', $data);
		}
	}
}
?>