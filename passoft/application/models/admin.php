<?php
class admin extends CI_Model{
	
	
	/*function insert($data){
		$d = $this->db->insert("branch",$data);
		return $d;
	}*/
	public function getsbranch($tid){
    $query = $this->db->query("SELECT DISTINCT * FROM sub_branch WHERE  district = '$tid' order by id");
       return $query;
   }
   
   
	 public function commision($i,$cid,$totamt,$orderno){
    // print_r($cid);
    $this->db->where("username",$cid);
    $dt=$this->db->get("customers");
    if($dt->num_rows()>0){
    $dt1= $dt->row();
  //  print_r($dt1);
   // exit();
  $id=$dt1->parentID;
  //$parenusernm=$dt1->username;
  $this->db->where("id" ,$dt1->parentID);
  $parentdtnm = $this->db->get("customers");
  if($parentdtnm->num_rows()>0){
    $parentdt=$parentdtnm->row();
  $pusernm=$parentdt->username;
  $this->db->where("id",$i);
  $comid1=$this->db->get("commission");
  $comid=$comid1->num_rows();

  foreach($comid1->result() as $comm):
    $prcntamt=$comm->com_percentage; 
    $prcnt=$totamt * $prcntamt;
    $totprcnt =$prcnt/100 ;
    $mobile=$parentdt->mobile;
    $this->db->where("cid",$parentdt->id);
    $pvresult=$this->db->get("pv")->row();
    $pv2=$pvresult->pv;
    
    $newpv=$pv2+$totprcnt;
   //  print_r($pvresult);
   
   // print_r($newpv);
  //  exit();
    $pv1=array(
    "pv"=>$newpv
    );
    $this->db->where("cid",$parentdt->id);
    $uppv=$this->db->update("pv",$pv1);
    
      $pvdaybook=array(
    "paid_to"=>$pusernm,
      "paid_by"=> "admin", 
      "reason"=>"pv",
        "dabit_cradit"=>0,
          "pv"=>$totprcnt,
        "order_no" => $orderno,
            "pay_date"=>Date('y-m-d')
    
    );
  //  $this->db->where("cid",$parentdt->id);
    $uppv=$this->db->insert("pvday_book",$pvdaybook);
    $count=0;
    $sender = $this->db->get("sms_setting")->row();
    $sende_Detail =$sender;
    $msg = "Dear Sir Your CashBack  is  - ".$totprcnt." Pv /- Thank You .";


    sms($mobile,$msg);
  //  print_r($pvresult);
//   echo $pusernm;
//   echo $totprcnt;
//   exit();
    $i++;
    $this->commision($i,$pusernm,$totamt,$orderno);
 

    endforeach;
    }
  }
  else{
    echo "no Parent ID Found.";
  }

  
}
    function complain()
    {
     $query= $this->db->get('complain');
     return $query;
    }
    // function add_rank($rank,$username)
    // {
    //     $this->db->where('username',$username);
    //     $ad = $this->db->get('rank_emp');
    //     if($ad->num_rows()>0)
    //     {
    //         redirect('adminController/upload/505');   
    //     }
    //     else
    //     {
            
    //     }
    // }
}