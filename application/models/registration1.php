<?php 
	class Registration1 extends CI_Model{
		
	   public function checkjoinerid($tid,$pass){
			    
	    $this->db->where("username",$tid);
	      $this->db->where("password",$pass);
	    $this->db->where("status",1);
	    $rw= $this->db->get("customers");
	    return $rw;
  
}
     public function insert($tablename,$value){
    
    return $this->db->insert($tablename,$value)?$this->db->insert_id():false;

}
	}
?>