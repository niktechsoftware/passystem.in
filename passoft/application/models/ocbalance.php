<?php
class ocbalance extends CI_Model{
	
	function update_ocbalance($closing){
		$data=array(
				"closing_balance"=>$closing
		);
		$this->db->where("DATE(opening_date)",$date("Y-m-d"));
		$this->db->update("opening_closing_balance",$data);
		return true;
	}
	
	function insert_ocbalance($opening,$closing,$username){
		$cr_date = date('Y-m-d');
		$data=array(
				"opening_balance" => $opening,
				"closing_balance" => $closing,
				"login_username" => $username,
				"opening_date" => $cr_date,
				"closing_date" => $cr_date,
		);
		$this->db->insert('opening_closing_balance',$data);
		return true;
	}
	
}