<?php
class branch extends CI_Model{
	
	function getMax(){
		$this->db->select_max('id');
		$this->db->from('branch');
		$maxid=$this->db->get();
		if($maxid->num_rows()>0){
			return $maxid->row()->id;
		}else{
			return 0; 
		}
	}
	
	function insert($data){
		$d = $this->db->insert("branch",$data);
		return $d;
	}
	
	function getActiveList(){
		$this->db->where("status",1);
		$dt= $this->db->get("branch");
		return $dt;
	}
	function full_profile($id){
		$this->db->where('id',$id);
		//$this->db->where("status",1);
		$dt= $this->db->get("branch");
		//print_r($dt);exit();
		return $dt;
	}
	function getInActiveList(){
		$this->db->where("status",0);
		$dt= $this->db->get("branch");
		return $dt;
	}
	function getValue(){
	    if($this->session->userdata("login_type")==1){
                $branch = $this->db->get('branch');
                return $branch;
	    }else{
	       $this->db->where('username',$this->session->userdata('username'));
                $branch = $this->db->get('branch');
                return $branch;
	    }
	}
	function getbranch(){
		$branch = $this->db->get('branch')->result();
		return $branch;
 }

	function branchid(){
		 $this->db->where('username',$this->session->userdata('username'));
                $branch = $this->db->get('branch')->row();
                $bid = $branch->id;
                return $bid;
	}
 function insertsub($tablename,$value){
    return $this->db->insert($tablename,$value)?$this->db->insert_id():false;

}
function checkjoinerid($tid){
    $this->db->where("username",$tid);
    $rw= $this->db->get("customers");
    return $rw;
}
public function getsbranch($tid){
	$query = $this->db->query("SELECT DISTINCT * FROM sub_branch WHERE  district = '$tid' order by id");
		 return $query;
 }
 public function getshopproduct($value){
            
	$this->db->where('rec_quantity >',0);
	$this->db->where('subbranch_id',$value);	
	$query=$this->db->get("subbranch_wallet");
	return $query;

}
public function getbranchproduct($value){
            
	$this->db->where('rec_quantity >',0);
	 $this->db->where('branch_id',$value);	
	$query=$this->db->get("branch_wallet");
	return $query;

}
function branch1()
{
	$branch= $this->db->get('branch');
	if($branch->num_rows()>0){
		foreach($branch->result() as $row){
			$bid = $row->id;
			return $bid;
		}
	}
	
}
function deleteBranch($id){
$this->db->where('id',$id);
$branch= $this->db->delete('branch');
return $branch;
}
}