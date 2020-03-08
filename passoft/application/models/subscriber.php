<?php 
	class Subscriber extends CI_Model
	{
		function getActiveList($bid1){
		$this->db->where('district',$bid1);
		$this->db->where("status",1);
		$dt= $this->db->get("sub_branch");
		return $dt;
	}
	function getActiveListAd(){
	    $this->db->where('sub_branchid',$this->session->userdata("id"));
		$this->db->where('status',1);
		$dt= $this->db->get('customers');
		return $dt;
	}
	function getinActiveList(){
		$this->db->where('status',0);
		$dt= $this->db->get('customers');
		return $dt;
	}
	function subscriberid($cid,$pass){
		$this->db->where('username',$cid);
		$this->db->where('password',$pass);
		    $this->db->where("status",1);
		$query=$this->db->get('customers');
		
		if($query->num_rows()>0){
			$que= $query->row()->id;
			return $que;
		}
		
		
	}
	function checkjoinerid($tid)
	{
    $this->db->where("username",$tid);
     $this->db->or_where("id",$tid);
    $rw= $this->db->get("customers");
    return $rw;
    }
function aadhar($aadhar){
	 $this->db->where('adhar',$aadhar);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	      echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	    return $panno;
}
function pan($pan){
	 $this->db->where('pan',$pan);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate pan number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Valid Pan Number</p>";
	    }
	    return $panno;
}
function subbranchid($branchid){
	$this->db->where('district',$branchid);
	$sub=$this->db->get('sub_branch');
	if($sub->num_rows() > 0){
  ?>
<option  value="">-Select Sub Branch-</option>
<?php  foreach ($sub->result() as $row)
	 {?>
<option  value="<?php echo $row->id;?>"><?php echo $row->bname;?></option>
<?php }
  }
  else{?>
	  <option  value="">-Select Sub Branch-</option>
	 <option  value="">-NO Branch-</option>
<?php    }
return $sub;
}
function match_ao($ao){
	$this->db->where('username',$ao);
	$aoval=$this->db->get('customers')->row();
	 $this->db->where('username',$ao);
	 $this->db->where('emp_type',7);
	$aoval1=$this->db->get('employee')->row();
	if($aoval1||$aoval){
		echo "<p class='error' style='color:green;'>Corret!!</p>";
	}else{
	  echo "<p class='error' style='color:red;'>You can not use wrong User Id</p>";
 }
 return $aoval1;
}
function SubscriberView($subbranchid){
	$this->db->where('sub_branchid',$subbranchid);
	$stud=$this->db->get('customers');
	return $stud;
}
function custOD(){
	$this->db->where('district',$this->session->userdata('id'));
	$stud=$this->db->get('customers');
	return $stud;
}
function tactive($unm){
	$this->db->where("username",$unm);
  $row=$this->db->get("customers")->row();
 $status= $row->tstatus;
 if($status=="0"){
  $value['tstatus']="1";
   $value['pstatus']="0";
  $this->db->where("username",$unm);
  $dt=$this->db->update("customers",$value);
     if($dt){
        ?><script >alert("Subscriber Temporary Activated Successfully.");</script><?php
        redirect("subscriberController/subscActiveList/","refresh");
      $sender = $this->db->get("sms_setting")->row();
    $sende_Detail =$sender;
  $msg = "Dear ".$row->name." Your Activation fee 1000 have paid Successfully. Your Account is activated for trial. Login and Please update your Personal Detail in PAS System";
     $mobile =	$row->mobile;
    sms($mobile,$msg);
     }
     else{
        echo "something going wrong plz try agian later;" ;
     }
    }
    else{
      $value['tstatus']="0";
       $value['pstatus']="1";
      $this->db->where("username",$unm);
      $dt=$this->db->update("customers",$value);
         if($dt){
            ?><script >alert("Subscriber Permanent Activated Successfully.");</script><?php
            redirect("subscriberController/subscActiveList/","refresh");
         }
         else{
            echo "something going wrong plz try agian later;" ;
         }
    }
}
function subscriberDelete($id){
	$this->db->where('username', $id);
$query=$this->db->delete("customers");
return $query;
}
function otherDemandList($subId){
	 $this->db->where('sub_branchid',$subId);
      $query=$this->db->get('demand_list');
      return $query;
	}
	function persubscriber(){
	    $this->db->where('district',$this->session->userdata('id'));
	    $this->db->where('pstatus',1);
	  $dt=  $this->db->get('customers');
	  return $dt;
	    
	}
		function tempsubscriber(){
	    $this->db->where('district',$this->session->userdata('id'));
	    $this->db->where('tstatus',1);
	  $dt=  $this->db->get('customers');
	  return $dt;
	    
	}
}
?>