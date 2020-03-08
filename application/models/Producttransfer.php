<?php

class Producttransfer extends CI_Model{

public function getbranchproduct($value){
            

          $this->db->where('branch_id',$value);	
     $query=$this->db->get("branch_wallet");
     return $query;

}

public function getshopproduct($value){
            

          $this->db->where('subbranch_id',$value);	
     $query=$this->db->get("subbranch_wallet");
     return $query;

}




}
?>