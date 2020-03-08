<?php
class shop extends CI_Model{
	function getSubBranchMax(){
		$this->db->select_max('id');
		$this->db->from('sub_branch');
		$maxid=$this->db->get();
		if($maxid->num_rows()>0){
			return $maxid->row()->id;
		}else{
			return 0;
		}
	}
	function getValue(){
		$this->db->where('username',$this->session->userdata('username'));
		$sbranch = $this->db->get('branch');
	//	print_r($this->session->userdata('username'));
		return $sbranch;
	}
	
	function shopBranchid(){
		
		$this->db->where('username',$this->session->userdata('username'));
		$branch = $this->db->get('branch')->row();
		$bid = $branch->id;
		return $bid;
	}
	function getSubBranch(){
		$this->db->where('status',1);
		$query=$this->db->get('sub_branch');
		return $query;
	}

	function panCard($pan){
	
		$this->db->where('pan_no',$pan);
		$panno=$this->db->get('sub_branch')->row();
	}
	function insertsub($tablename,$value){
		return $this->db->insert($tablename,$value)?$this->db->insert_id():false;
	
	}
	function activeSbranch($bid){
		$this->db->where("status",1);
		$this->db->where('district',$bid);
		$query=$this->db->get('sub_branch');
		return $query;
	}
	function sbranchinActiveList($bid){
		$this->db->where("status",0);
		$this->db->where('district',$bid);
		$dt= $this->db->get("sub_branch");
		return $dt;
	}
	function sbranchinActiveListadmin(){
		$this->db->where("status",0);
	//	$this->db->where('district',$bid);
		$dt= $this->db->get("sub_branch");
		return $dt;
	}
	function getsBranchValue($susername){
		$this->db->where('id',$susername);
		$query = $this->db->get('sub_branch');
		return $query;

}
 function insert($tablename,$value){
    
    return $this->db->insert($tablename,$value)?$this->db->insert_id():false;

}
	
	function subbranch($branch){
		$query=$this->db->query("SELECT DISTINCT * FROM `sub_branch` WHERE `district` = '$branch' AND `status` = 1  order by id");
		
  if($query->num_rows() > 0){ ?>
	<option value="" disable >Sub Branch Name</option>
	<?php
	foreach ($query->result() as $row)
	{?>
	<option value="<?php echo $row->id;?>"><?php echo $row->bname;?></option>
	<?php }
  }
  else
  { ?>
	<option value="0">None</option>
<?php  }
 return $query;

	}
	public function fetchBranch()
	{
		$branch = $this->db->select(['id','b_name']);
		$branch = $this->db->get('branch');
		return $branch->result();

	}

	function orderList($subbranch_id){
	   
	
		//  $this->db->where('order_date',$d);
			$this->db->where('sub_branchid',$subbranch_id);
// 		$this->db->where('order_status',0);
// 		$this->db->or_where('status',1);
// 		$this->db->or_where('status',0);
// 		  $this->db->where('ad_rec_pay',0);
		$subbr = $this->db->get('order_serial');
		return $subbr;
	}
	function orderSerial($susername){
		
		return $dt;
	}

	
 public function commision($i,$cid,$totamt,$orderno){
    // print_r($cid);
    $this->db->where("username",$cid);
    $dt=$this->db->get("customers");
    if($dt->num_rows()>0){
    $dt1= $dt->row();
 
  $id=$dt1->parentID;
  if($dt1->parentID>0){
  //$parenusernm=$dt1->username;
  $this->db->where("id" ,$dt1->parentID);
  $parentdtnm = $this->db->get("customers");
  if($parentdtnm->num_rows()>0){
    $parentdt=$parentdtnm->row();
  $pusernm=$parentdt->username;
  $this->db->where("id",$i);
  $comid1=$this->db->get("commission");
  $comid=$comid1->num_rows();

  foreach($comid1->result() as $com):
    $prcntamt=$com->com_percentage; 
    $prcnt=$totamt * $prcntamt;
    $totprcnt =$prcnt/100 ;
    $mobile=$parentdt->mobile;
    $this->db->where("cid",$parentdt->id);
    $pvresult=$this->db->get("pv")->row();
    $pv2=$pvresult->pv;
    
    $newpv=$pv2+$totprcnt;
  
    $pv1=array(
    "pv"=>$newpv
    );
    $this->db->where("cid",$parentdt->id);
    $uppv=$this->db->update("pv",$pv1);
    $username=$this->session->userdata("username");
      $pvdaybook=array(
    "paid_to"=>$pusernm,
      "paid_by"=>$username, 
      "reason"=>"pv",
        "dabit_cradit"=>0,
          "pv"=>$totprcnt,
          "order_no"=>$orderno,
            "pay_date"=>Date('y-m-d')
    
    );
  //  $this->db->where("cid",$parentdt->id);
    $uppv=$this->db->insert("pvday_book",$pvdaybook);
    $count=0;
    $sender = $this->db->get("sms_setting")->row();
    $sende_Detail =$sender;
    $msg = "Dear Sir Your CashBack  is  - ".$totprcnt." Pv /- Thank You .login for more details https://www.passystem.in/.";
        sms($mobile,$msg);
        $i++;
    $this->commision($i,$pusernm,$totamt,$orderno);
    endforeach;
    }}
    return true;
  }
  else{
    return true;
  }

  return true;
}

}