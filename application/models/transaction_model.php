<?php
class Transaction_model extends CI_Model{
	function get_all($store_id, $page="1", $maxList){
		
		if($page ==0){
			$page = 1;
		}
		$page = $page - 1;
		$startNumber = $page * $maxList;
		$startNumber < 0 ? $startNumber =0: $startNumber = $startNumber;
		$query = $this->db->query("select  m.name, m.member_id, t.time, t.transaction_id, p.subject,td.qty
from 
	transaction t,
	member m, 
	transaction_detail td,
	promo p

	where m.member_id=t.member_id and t.transaction_id=td.transaction_id and p.promo_id=td.promo_id and t.store_id=$store_id group by t.transaction_id limit $startNumber, $maxList");
		return $query->result();
	}
	function count_all($store_id){
		$query = $this->db->query("SELECT COUNT( td.transaction_id ) as jumlah FROM  transaction_detail td, transaction t WHERE t.transaction_id = td.transaction_id and  t.store_id =$store_id");
		return $query->result();
	}
}
?>