<?php
class stock extends CI_Model{
	
	
	function insert_Category($stream){
		$db = array(
				"name" => $stream,
				
		);
		if(strlen($stream) > 1){
				
			$this->db->insert("category",$db);
		}
		$this->db->order_by("name", "asc");
		$query = $this->db->get("category");
		return $query;
		
	}
	
  public function checkjoinerid($tid){
	
    $this->db->where("username",$tid);
    $rw= $this->db->get("customers");
    return $rw;
  
 }
 
public function checkStockp($itemNo){
    
   $sid= $this->session->userdata("id");
    //  print_r($sid);
    //  exit;
	$this->db->where("subbranch_id",$sid);
	$this->db->where("sec",$itemNo);
//	$this->db->where("hsn",$itemNo);
	$req = $this->db->get("subbranch_wallet");
//   print_r($req);
	return $req;

}


	public function editstock($id){
			$this->db->where("id",$id);
			$data=$this->db->get("stock_products");
			if($data->num_rows()>0){
			$cat_id=$data->row()->sub_category;
	     	$dataarr=$data->row_array();
			$this->db->where("id",$cat_id);
			$subcat_name =$this->db->get("sub_category")->row()->name;
			$data['row'] =  $dataarr;
		   $data['catname']   = $subcat_name;
		   return $data;

	}

	 }
	public function getsubcat1($tid){
		$query = $this->db->query("SELECT DISTINCT * FROM sub_category WHERE  cat_id = '$tid' order by id");
			 return $query;
	 }


	function update_category($streamId,$streamName){

		$val = array(
				"name" => $streamName,
				
		);
		
		$this->db->where("id",$streamId);
		$query = $this->db->update("category",$val);
		return true;
	}

	function updatesub_category($streamId,$streamName){
	
		$val = array(
		    "name" => $streamName,
		    );
		
		$this->db->where("id",$streamId);
		$query = $this->db->update("sub_category",$val);
		return $query;
	}
	
	function delete_category($streamId){
		
		$this->db->where("cat_id",$streamId);
		$subCate=$this->db->get('sub_category');
		if($subCate->num_rows()>0){
				
			echo "<script>alert('you can not delete this stream because this stream is already used in class');</script>";
			return false;
		}
		
		else{
			$this->db->where("id",$streamId);
			$query = $this->db->delete("category");
			return $query;
	}
	}

	function insertsub_Category($subcatname,$catid){
		$db11 = array(
				"name" => $subcatname,
				"cat_id" => $catid
				
		);
		if(strlen($subcatname) > 1){
		// print_r(strlen($subcatname));
		// exit();
				
			$this->db->insert('sub_category',$db11);
		}
		$this->db->order_by("name", "asc");
		$query = $this->db->get("sub_category");
		return $query;
		
	}
	

	function deletesub_category($streamId){
	  
	        
			$this->db->where("id",$streamId);
			$query = $this->db->delete("sub_category");
			return $query;
           
	
	}
	
	
}