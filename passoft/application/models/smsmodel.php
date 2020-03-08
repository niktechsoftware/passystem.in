<?php
class Smsmodel extends CI_Model{
	function getsmsseting(){
		$row = $this->db->get("sms")->row();
		return $row;
	}
	/*function getsmssender($school_code){
		$this->db->where("school_code",$school_code);
		$val=$this->db->get("sms_setting");
		return $val;
	}
	
	function getAllFatherNumber($school_code){
		$this->db->distinct();
		$this->db->select('student_info.mobile');
		$this->db->from('student_info');
		$this->db->join('class_info','class_info.id=student_info.class_id');
		$this->db->where("class_info.school_code",$school_code);
		$this->db->where("student_info.status",1);
		$query=$this->db->get();
		return $query;
	}
	function getClassFatherNumber($school_code,$classid){
	
			$this->db->distinct();
			$this->db->select('student_info.mobile');
			$this->db->from('student_info');
			$this->db->join('class_info','class_info.id=student_info.class_id');
			$this->db->where("student_info.class_id",$classid);
			$this->db->where("student_info.status",1);
			$query=$this->db->get();
			
	
		return $query;
	}
	
	function getTransportFatherNumber($vid){
	
		$this->db->distinct();
		$this->db->where("v_id",$vid);
		$this->db->where("status",1);
		$query=$this->db->get('student_info');
		

	return $query;
}*/

}