<?php
class Bag_model extends CI_Model{
	var $gender='';
	var $type='';
	var $name='';
	var $photo='';
	var $short_desc='';
	var $price='';
	var $bag_type_id='';
	
	function get_all_bag($page="1", $maxList){
		
		if($page ==0){
			$page = 1;
		}
		$page = $page - 1;
		$startNumber = $page * $maxList;
		$startNumber < 0 ? $startNumber =0: $startNumber = $startNumber;

		// $query = $this->db->get_where('store_photo', array('store_id'=>$store_id), $startNumber, $maxList);
		$query = $this->db->query("select * from bag_type limit $startNumber, $maxList");
		return $query->result();
	}

	function get_single($bag_type_id){
		$query = $this->db->get_where('bag_type', array('bag_type_id' => $bag_type_id));
		return $query->result()[0];
	}

	function get_bag_gallery($bag_type_id, $page="1", $maxList){
		if($page ==0){
			$page = 1;
		}
		$page = $page - 1;
		$startNumber = $page * $maxList;
		$startNumber < 0 ? $startNumber =0: $startNumber = $startNumber;

		$query = $this->db->get_where('bag_photo', array('bag_type_id'=>$bag_type_id), $startNumber, $maxList);
		
		return $query->result();
	}

	function save(){
/*		$data=array(
			'bag_type_id' => $this->bag_type_id,
			'gender' => $this->gender,
			'type' => $this->type,
			'photo' => $this->photo,
			'name' => $this->name,
			'short_desc' => $this->short_desc,
			'price' => $this->price
			);
		$this->db->set($data);
		$this->db->insert('bag_type');
		*/
		$this->db->query("INSERT INTO bag_type set bag_type_id='$this->bag_type_id',gender='$this->gender', type='$this->type', name='$this->name', short_desc='$this->short_desc', photo='$this->photo',price='$this->price'");	
		
	}

	function update($bag_type_id){
		$data=array(
			'gender' => $this->gender,
			'type' => $this->type,
			'name' => $this->name,
			'photo' => $this->photo,
			'short_desc' => $this->short_desc,
			'price' => $this->price
			);
		$this->db->where('bag_type_id', $bag_type_id);
		$this->db->update('bag_type', $data);
	}

	function delete($bag_type_id){
		$this->db->delete('bag_type',array('bag_type_id'=>$bag_type_id));		
	}

	function count_bag(){
		return $this->db->count_all('bag_type');
	}

	function get_last_id(){
		$query = $this->db->query("SELECT bag_type_id FROM bag_type ORDER BY bag_type_id DESC LIMIT 1;");
		return $query->result()[0];
	}
}
?>