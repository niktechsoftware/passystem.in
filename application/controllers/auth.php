<?php 
class Auth extends CI_Controller {


	public function signupSubscriber()
	{
       $data['title'] = 'Subscriber Registration';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/signupSubscriber';
		$this->load->view('body', $data);
	}
	
		public function singupEmployee()
	{
	     $data['title'] = 'Employee Registration';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/employeeRegistrationJs';
		$data['contend'] = 'pages/employee';
		$this->load->view('body', $data);
	}
	
	function match_pan(){
	    $pan=$this->input->post('panVal');
	    $this->db->where('pan',$pan);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate pan number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Valid Pan Number</p>";
	    }
	}
	
		function match_pan1(){
	    $pan=$this->input->post('panVal');
	    $this->db->where('pan_no',$pan);
	    $panno=$this->db->get('sub_branch')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate pan number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Valid Pan Number</p>";
	    }
	}
	
		function match_pan2(){
	    $pan=$this->input->post('panVal');
	    $this->db->where('pan',$pan);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate pan number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Valid Pan Number</p>";
	    }
	}
	
	function match_adhar_subs(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('adhar',$aadhar);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	      echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
	
	public function match_ao()
	{
	    
	     $ao=$this->input->post('ao');
	    $this->db->where('username',$ao);
	    $aoval=$this->db->get('customers')->row();
	    //print_r($aoval);exit();
	   
	    
	     $this->db->where('username',$ao);
	     $this->db->where('emp_type',7);
	    $aoval1=$this->db->get('employee')->row();
	   if($aoval1||$aoval)
	   {
	   // if($aoval){
	         echo "<p class='error' style='color:green;'>Correct!!</p>";
	      
	      }else{
	        echo "<p class='error' style='color:red;'>You can not use wrong User Id</p>";
	   
	    }
	    
	    
	}
		function match_adhar_shop(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('adhar_no',$aadhar);
	    $panno=$this->db->get('sub_branch')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
		function match_adhar(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('aadhar_no',$aadhar);
	    $panno=$this->db->get('delivery_boy')->row();
	    if($panno){
	         echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
		function match_adhar_emp(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('aadhar_no',$aadhar);
	    $panno=$this->db->get('employee')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
    public function customer_value()
    {
        $this->db->where('adhar',$this->input->post('aadhar'));
        $check = $this->db->get('customers');
        if($check->num_rows()>0)
        {
            redirect("auth/signupSubscriber/6" ,"refresh");
        }
        else
        {
            $tid = $this->input->post("joinerid");
             $pass = $this->input->post("joinerpass");
            $this->load->model('registration1');
             $var = $this->registration1->checkjoinerid($tid,$pass);
             
            if($var->num_rows()>0){
             $rw1=$var->row();
            
          $this->db->where("parentID",$rw1->id);
          $data= $this->db->get("tree");
          
          if($data->num_rows()>19){ 
          ?>
            <script>
                alert('Sorry ! Your Account Can Not Be Procced');
            </script>
            
            <?php
            redirect("auth/signupSubscriber" ,"refresh");
            }
            else{
                  
            $dis= $this->input->post('district');
            $this->db->where("username",$tid);
            $joiner_id1 = $this->db->get("customers")->row();
            $joiner_idf=$joiner_id1->id;
            $joiner_idname  = $joiner_id1->name;
            $joiner_mob=$joiner_id1->mobile;
            $joiner_uname=$joiner_id1->username;
            $this->db->select_max('id');
            $this->db->from('customers');
            $maxid1=$this->db->get()->row()->id;
            
            //$rnj = rand(100,80000);
            $maxid=$maxid1+1;
          $sbb = $this->input->post('subbranch');
            $name=$this->input->post('usernm');
             $username = $maxid+200;
              $aoid=$this->input->post('ao');
                 $value['username']= "B".$dis."S".$sbb."C".$username;
                 $value['name']=$this->input->post('usernm');
                 $value['ao']=$this->input->post('ao');
                 $value['father_name']=$this->input->post('f_name');
                 $value['m_name']=$this->input->post('m_name');
                 $value['email']=$this->input->post('email');
                 $value['address']=$this->input->post('address');
                 $value['pr_address']=$this->input->post('pr_address');
                 $value['state']=$this->input->post('state');
                 $value['pin']=$this->input->post('pin');
                 $value['adhar']=$this->input->post('aadhar');
                 $value['dob']=$this->input->post('dob');
                 $value['pan']=$this->input->post('pan');
                 $value['district']=$this->input->post('district');
                 $value['mobile']=$this->input->post('mobile');
                 $value['amount']=$this->input->post('amount');
                 $value['gender']=$this->input->post('gender');
                 $value['nom1']=$this->input->post('nom1');
                 $value['nom2']=$this->input->post('nom2');
                 $value['nom_rel1']=$this->input->post('nom_rel1');
                 $value['nom_rel2']=$this->input->post('nom_rel2');
                 $value['nom_ad1']=$this->input->post('nom_ad1');
                 $value['nom_ad2']=$this->input->post('nom_ad2');
                 $value['password']=$this->input->post('password');
                 $value['sub_branchid']=$this->input->post('subbranch');
                 $value['parentID']=$joiner_idf;
                    $db= $this->input->post('tpstatus');
                    if($db == 't'){
                      $value['tstatus'] =1;
                      $value['pstatus']= 0;
                    }
                    else{
                      $value['tstatus'] =0;
                      $value['pstatus']= 1;
                    }
                 $value['created'] = date('Y-m-d H:s:i');
                 $value['status'] = 0;
                 
                 $get_id = $maxid;
                //  print_r($maxid);exit;
            $this->db->where("id",$maxid);
            $getrow = $this->db->get("customers");
            
        
          
            if($getrow->num_rows()<1){
                $pvrow=$get_id;
    
                          $pval = array(
                        'cid'     =>  $pvrow,
                        'pv'          => 0 ,
                        );
                        $r_pv=array(
                'emp_id'     => $this->input->post('ao'),
                 'pv'          =>  150,
                    );
                        $trval=array(
                        'CustomerID'=>$get_id,
                        'parentID'=>$joiner_idf,
                      //   'child'=>0
                            );
                            
                            $customers="customers";
                            $pv="pv";
                            $tree="tree";
                             $rpv="emp_pv";
                      $v1= $this->registration1->insert($customers,$value);
                       if($v1){
                          
                        //   print_r($v1);
                        //   exit();
             
              $this->db->where("id",$v1);
              $data= $this->db->get("customers")->row();
              
            //   if($data->tstatus==1){
                  
            //       $regpv = array(
                      
            //           'cust_id' => $v1,
            //           'pv' => 1000
                      
            //           );
                      
            //           $this->db->insert("register_pv",$regpv);
            //   }
            
              $msg1 = "Congratulation Dear ". $joiner_idname ." One Person is added in your Tree list";
            //   print_r($data);exit;
                //$count=0;
                $sender = $this->db->get("sms_setting")->row();
                $sende_Detail =$sender;
              $msg = "Congratulation Dear ".$name." Your Registration in passystem.in (Bussiness by technique with sharing) is under proccess. Your Username is  - ". $data->username ." and Password is - " . $data->password ." Please Contact Admin- 7394826066 for Activation.";
                 $mobile =	$this->input->post("mobile");
               $getsms= $this->db->get("sms")->row();
              
                sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
                sms($joiner_mob,$msg1,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
               
               
                       // if(($this->db->insert($pv,$pval))&& ($this->db->insert($tree,$trval)) && ($this->db->insert($rpv,$r_pv)))
                     if(($this->db->insert($pv,$pval)) && ($this->db->insert($tree,$trval)))
                           {
                            //   echo "raj";
                                redirect('auth/invoiceSubscriber/'.$data->id);               
                           }       
                           
                       }
         
            }
        }        
            }

        }
        
            
        }

    public function customervalue()
     {
//         $this->load->model('registration1');
//       $dis= $this->input->post('district');
//       // $dist=$dis+100;

//         $joinerusername = $this->input->post('joinerid');
//         $this->db->where("username",$joinerusername);
//         $joiner_id1 = $this->db->get("customers")->row();
//         $joiner_idf=$joiner_id1->id;
//         $joiner_idname  = $joiner_id1->name;
        
//         $this->db->select_max('id');
//         $this->db->from('customers');
//         $maxid=$this->db->get()->row()->id;
//         //$rnj = rand(100,80000);
//         $maxid=$maxid+1;
//          $username = $maxid+200;
//              $value['username']= "PSU".$dis."C".$username;
//              $value['name']=$this->input->post('usernm');
//              $value['father_name']=$this->input->post('f_name');
//              $value['email']=$this->input->post('email');
//              $value['address']=$this->input->post('address');
//              $value['state']=$this->input->post('state');
//              $value['pin']=$this->input->post('pin');
//              $value['adhar']=$this->input->post('aadhar');
//              $value['pan']=$this->input->post('pan');
//              $value['district']=$this->input->post('district');
//              $value['mobile']=$this->input->post('mobile');
//              $value['amount']=$this->input->post('amount');
//              	$db= $this->input->post('tpstatus');
//                 if($db == 't'){
//                   $value['tstatus'] =1;
//                   $value['pstatus']= 0;
//                 }
//                 else{
//                   $value['tstatus'] =0;
//                   $value['pstatus']= 1;
//                 }
//              $value['gender']=$this->input->post('gender');
//              $value['password']=$this->input->post('password');
//              $value['parentID']=$joiner_idf;
//             	//$db= $this->input->post('tpstatus');

//              $value['created'] = date('Y-m-d H:s:i');
//              $value['status'] = 0;
//              $get_id = $maxid;
//         $this->db->where("id",$maxid);
//         $getrow = $this->db->get("customers");
        
//         if($getrow->num_rows()<1){

//                       $pval = array(
//                     'cid'     =>   $get_id,
//                     'pv'          =>      0 ,
//                     );
                   
//                     $trval=array(
//                     'CustomerID'=>$get_id,
//                     'parentID'=>$joiner_idf,
//                   //   'child'=>0
//                         );
//                         $customers="customers";
//                         $pv="pv";
//                         $tree="tree";
                  
                   
//      if(($this->db->insert($pv,$pval))&&($this->db->insert($tree,$trval)))
//             {   
//      $cid= $this->registration1->insert($customers,$value);
//         if($cid){
//           $data['cust_id']=$cid;
//             $this->db->insert("cheque" ,$data);


           ?>
<!--             <script>alert('Your Registration  successfully');</script>-->
      <?php
//           $this->db->where("id",$cid);
//           $data= $this->db->get("customers")->row();
//             $count=0;
//             $sender = $this->db->get("sms_setting")->row();
//             $sende_Detail =$sender;
//             $msg = "Dear Sir Your Registration Successfully Complete. Your Username is  - ". $data->username ." and Password is - ". $data->password;
//             $mobile =	$this->input->post("mobile");
            
//             sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
//             // redirect('/customer/customerfee/'.$cid ,'refresh');
//             redirect(base_url().'index.php/auth/invoiceSubscriber/'.$data->id,'refresh');
//             //redirect('https://passystem.in/auth/singupSubscriber/','refresh');
            
            
//             }
//       }
//   }

     }
     public function track_order()
    {
        $data['title']='Track Your Order';
    	$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/track_order';
		$this->load->view('body', $data);
    }
    
    public function gps_order()
    {
        $data['orderid'] = $this->input->post('orderid');
        $data['title']='Track Your Order';
    	$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/gps_order';
		$this->load->view('body', $data);
    }
    public function invoiceSubscriber(){
        $data['title']='Subscriber Invoice';
    	$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/invoiceSubscriber';
		$this->load->view('body', $data);
    }

	public function signupShop()
	{
	     $data['title'] = 'Shop Registration';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/shopRegistrationJs';
		$data['contend'] = 'pages/signupShop';
		$this->load->view('body', $data);
	}
	public function subbranch_value(){
    $this->load->model('registration1');
     $this->db->select_max('id');
        $this->db->from('sub_branch');
        $maxid=$this->db->get()->row()->id;
       $dis= $this->input->post('district');
      // $dist=$dis+100;
        //$rnj = rand(100,80000);
        $f_name=$this->input->post('fname');
        $maxid=$maxid+1;
$username = $dis."S".$maxid;
     $value['username']= "PSH".$username;
    $value['bname']=$this->input->post('bname');
    $value['ownername']=$this->input->post('ownername');
    $value['address']=$this->input->post('address');
    $value['street']=$this->input->post('street');
    $value['pin']=$this->input->post('pin');
    $value['adhar_no']=$this->input->post('aadhar');
    $value['pan_no']=$this->input->post('pan');
    $value['city']=$this->input->post('city');
     $value['district']=$this->input->post('district');
    $value['mob_no']=$this->input->post('mobile');
    $value['gst_no']=$this->input->post('gst');
     $value['password']=$this->input->post('password');

    $tablename='sub_branch';
    
    $sb=$this->registration1->insert($tablename,$value);
    if($sb){
        
        $balance = array(
            "opening_balance" => "0.00",
            "closing_balance" => "0.00",
            "opening_date" => date("y-m-d"),
            "closing_date" => date("y-m-d"),
            "login_username"=> "PSH".$username
        );
        $this->db->insert('opening_closing_balance',$balance);
        
        ?>
<script>
alert("Your Shop Registration Successfully");
</script>
<?php
           $this->db->where("id",$sb);
           $data= $this->db->get("sub_branch")->row();
            $count=0;
            $sender = $this->db->get("sms_setting")->row();
            $sende_Detail =$sender;
            $msg = "Dear ".$data->ownername.", Your Sub Branch Registration is Under Process. Your Sub Branch Name is   ". $data->bname ." and  Username is ". $data->username . " and Password is -". $data->password ." Please Contact to Branch for Activation.";
            $mobile =	$this->input->post("mobile");
            
            sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
        // redirect('/branch/subbranch','refresh'); 
        redirect(base_url().'index.php/auth/shopInvoice/'.$data->id);
       //redirect('https://passysytrm.in/auth/signupShop','refresh');                                                      
    }
}
public function shopInvoice(){
         $data['title'] = 'Shop Registration Detail';
    	$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/shopInvoice';
		$this->load->view('body', $data);
}
	function checkjoinerid(){ 
        $tid = $this->input->post("cat");
         $pass = $this->input->post("pass");
        $this->load->model("registration1");
        $var['view'] = $this->registration1->checkjoinerid($tid,$pass);
        $this->load->view('ajax/subscriberSingUp',$var);
    }
	
		public function signin()
	{
	     $data['title'] = 'PAS System Login';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/signin';
		$this->load->view('body', $data);
	}

	public function employee_value(){
		$this->load->model('registration1');
		$emp_name = $this->input->post('e_name');
		$mobile = $this->input->post('mob_no');
		$email = $this->input->post('email');
		$state = $this->input->post('state');
		$pincode = $this->input->post('pincode');
		$father_name = $this->input->post('fname');
		$aadhar = $this->input->post('aadhar');
		$address = $this->input->post('address');
		$password = $this->input->post('password');
		$country = $this->input->post('country');
		$dob = $this->input->post('dob');
		$empid = $this->input->post('empid');
		$sub_category = $this->input->post('sub_category');
		$this->db->select_max('id');
		$this->db->from('employee');
		
		$maxid=$this->db->get()->row()->id;
		
		//$rnj = rand(100,80000);
		$maxid=$maxid+1;
		 $username = $maxid+200;
			if($empid==1){
                $username1= "PSUDR".$username;
            }else if($empid == 2){
                $username1= "PSUM".$username;
            }
            else if($empid == 3){
                $username1= "PSUSM".$username;
            }
            else if($empid == 4){
                $username1= "PSUCM".$username;
            }
            else if($empid == 5){
                $username1= "PSUDI".$username;
            }
            else if($empid == 6){
                $username1= "PSUCI".$username;
            }
            else if($empid == 8){
                $username1= "PSUVI".$username;
            }
            else if($sub_category == 1){
                $username1= "PSUAOS".$username;
            }
            else if($sub_category == 2){
                $username1= "PSUAOE".$username;
            }
            else if($sub_category == 3){
                $username1= "PSUAOC".$username;
            }else if($sub_category == 4){
                 $username1= "PSUAOST".$username;
            }
		$data = array(
			'name' => $emp_name,
			'father_name' => $father_name,
			'address' => $address,
			'mobile' => $mobile,
			'pincode' => $pincode,
			'state' => $state,
			'country' => $country,
			'emp_type'=>$empid,
			'emp_subtype'=>$sub_category,
			'email' => $email,
			'aadhar_no' => $aadhar,
			'dob' => $dob,
			'password'=> $password,
			'username' => $username1,
			'status' => 0,
			'created_date' => date('Y-m-d')
		); 

		 $tablename='employee';
    
    $sb=$this->registration1->insert($tablename,$data);
   // print_r($sb);exit();
    if($sb){
        
        $balance = array(
            "opening_balance" => "0.00",
            "closing_balance" => "0.00",
            "opening_date" => date("y-m-d"),
            "closing_date" => date("y-m-d"),
            "login_username"=> "PSUE".$username
        );
        $this->db->insert('opening_closing_balance',$balance);
        
                   $this->db->where("id",$sb);
           $data= $this->db->get("employee")->row();
            $emp_unm= $data->username;
        
        $empreg = array(
            
            'emp_id' => $emp_unm,
            'pv'=> 0
            
            );
        $this->db->insert("emp_pv" ,$empreg);
        
        ?>
<script>
alert("Dear, Employee your Registration in under Processing..");
</script>
<?php
                $this->db->where('id',$sb);
            $emprow = $this->db->get('employee')->row();
            
            
            $this->db->where('id',$emprow->emp_type);
            $typerow = $this->db->get('emp_type')->row();
            
             $this->db->where('id',$emprow->emp_subtype);
            $subtyperow = $this->db->get('emp_sub_type')->row();
      


                        $this->db->where("id",$sb);
           $data= $this->db->get("employee")->row();
            $count=0;
            $sender = $this->db->get("sms_setting")->row();
            $sende_Detail =$sender;
            
            
            if($subtyperow){
            
            $msg = "Dear ".$emp_name.", Your Registration for ".$subtyperow->sub_type." of ".$typerow->type." in under process, Your  Username is ". $data->username ." and Password is ". $data->password . ". Please Contact to Admin for Activation.";
            }else{
                
                 $msg = "Dear ".$emp_name.", Your Registration for ".$typerow->type." in under process, Your  Username is ". $data->username ." and Password is ". $data->password . ". Please Contact to Admin for Activation.";
            }
        
            sms($data->mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);


redirect(base_url().'index.php/auth/employeeInvoice/'.$maxid,'refresh');
	}
}
	public function employeeInvoice(){
	    $data['title'] = 'Employee Invoice';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/employeeInvoice';
		$this->load->view('body', $data);
	}
	public function singupDeliveryBoy()
	{
	    $data['title']='Delivery Boy Registration';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/dBoyRegistrationJs.php';
		$data['contend'] = 'pages/deliveryBoy';
		$this->load->view('body', $data);
	}
	public function deliverBoy_value(){
		$this->load->model('registration1');
		$develaryBoy_name = $this->input->post('d_name');
		$mobile = $this->input->post('mob_no');
		$email = $this->input->post('email');
		$state = $this->input->post('state');
		$pincode = $this->input->post('pincode');
		$father_name = $this->input->post('fname');
    $dob = $this->input->post('dob');
		$aadhar = $this->input->post('aadhar');
		$address = $this->input->post('address');
		$password = $this->input->post('password');
		$country = $this->input->post('country');
		$this->db->select_max('id');
		$this->db->from('delivery_boy');
		$maxid=$this->db->get()->row()->id;
		$maxid=$maxid+1;
		 $username = $maxid+200;
		$data = array(
			'name' => $develaryBoy_name,
			'father_name' => $father_name,
			'address' => $address,
			'mobile' => $mobile,
			'pincode' => $pincode,
			'state' => $state,
			'country' => $country,
			'email' => $email,
			'aadhar_no' => $aadhar,
      'dob' => $dob,
			'password'=> $password,
			'username' => "PSUD".$username,
			'status' => 0,
			'created_date' => date('Y-m-d')
		);
		 $tablename='delivery_boy';
    $sb=$this->registration1->insert($tablename,$data);
    if($sb){
        
        $balance = array(
            "opening_balance" => "0.00",
            "closing_balance" => "0.00",
            "opening_date" => date("y-m-d"),
            "closing_date" => date("y-m-d"),
            "login_username"=> "PSUD".$username
        );
        $this->db->insert('opening_closing_balance',$balance);
        
        ?>
<script>
alert("Your delivery_boy Registration Successfully");
</script>
<?php
           $this->db->where("id",$sb);
           $data= $this->db->get("delivery_boy")->row();
            $count=0;
            $sender = $this->db->get("sms_setting")->row();
            $sende_Detail =$sender;
            $msg = "Dear ".$develaryBoy_name." Your  Registration is Successful. Your  Username is -". $data->username ."and Password is -". $data->password . "Please Contact to Admin for Activation.";
            //$data->mobile =	$this->input->post("mobile");
            
            sms($data->mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);

redirect(base_url().'index.php/auth/deliverBoyInvoice/'.$maxid,'refresh');
	}
}
	public function deliverBoyInvoice(){
	    
	    $data['title'] = 'Invoice';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/InvoiceDelivry';
		$this->load->view('body', $data);
	}
	public function termCondition(){
	    $data['title'] = 'Terms & Conditions';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/termCondition';
		$this->load->view('body', $data);
	}
	
	public function subbranchid()
	
	{
	    $branchid=$this->input->post('branchid');
	    
	    
	    $this->db->where('district',$branchid);
	    $sub=$this->db->get('sub_branch');
	    if($sub->num_rows() > 0){
      ?>

<option style="color:#09b37d;" value="">-Select Sub Branch-</option>

<?php
        foreach ($sub->result() as $row)
        {?>

<option style="color:#09b37d;" value="<?php echo $row->id;?>"><?php echo $row->bname;?></option>

<?php }

      }
      else
      {?>
         
         <option style="color:#09b37d;" value="">-Select Sub Branch-</option>
        <option style="color:#09b37d;" value="">-NO Branch-</option>
 
 
          
   <?php    }
	    
	    
	    
	}
	
   function getsubtype() {

    $tid = $this->input->post("classv");
    $this->load->model("registration1");
    $var = $this->registration1->getsubtype($tid);
      if($var->num_rows() > 0){
      ?>

<option style="color:#09b37d;" value="">-Select Employee Sub Type-</option>

<?php
        foreach ($var->result() as $row)
        {?>

<option style="color:#09b37d;" value="<?php echo $row->id;?>"><?php echo $row->sub_type;?></option>

<?php }

      }
      else
      { ?>
       <option style="color:#09b37d;" value="">-Select Employee Sub Type-</option>
        <option style="color:#09b37d;" value="0">-NO Employee-</option>

          
    <?php  }
      
  }   
  
  
  function getsubtype1() {

    $tid = $this->input->post("classv");

   $query=$this->db->query("SELECT DISTINCT * FROM emp_sub_type WHERE emp_type = '$tid' order by id");
   
   
      if($query->num_rows() > 0){
      ?>

<option style="color:#09b37d;" value="" disable >Employee Sub Type</option>

<?php
        foreach ($query->result() as $row)
        {?>

<option style="color:#09b37d;" value="<?php echo $row->id;?>"><?php echo $row->sub_type;?></option>

<?php }

      }
      else
      { ?>
     
        <option style="color:#09b37d;" value="0">None</option>

          
    <?php  }
      
  }
	
	public function entryPage(){
        $data['title'] = 'Entry Page';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/entryJs';
		$data['contend'] = 'pages/entryPage';
		$this->load->view('body', $data);
    }
	function entry_value(){
        $ao_name = $this->input->post('ao_name');
        $date = $this->input->post('date');
        $visitor_name = $this->input->post('vname');
        $address = $this->input->post('address');
        $contact_no = $this->input->post('mob_no');
        $presentAbsent = $this->input->post('presentAbsent');
        $feedback = $this->input->post('feedback');
        $this->db->select_max('id');
		$this->db->from('entry_table');
		$maxid=$this->db->get()->row()->id;
		$maxid=$maxid+1;
		// $username = $maxid+200;
        $data = array(
            'date_of_advising' => $date,
            'name_of_ao' => $ao_name,
            'visitor_name' => $visitor_name,
            'address' => $address,
            'contact_no' => $contact_no,
            'prasent_absent' => $presentAbsent,
            'feedback' => $feedback,
            'created_date' => date('Y-m-d')
        ); 
        $insert = $this->db->insert('entry_table',$data);
      // $db =$this->db->get('entry_table')->row();
       redirect(base_url().'index.php/auth/entryPageView/'.$maxid,'refresh');
    }
    public function entryPageView(){
        $data['title'] = 'Entry Page View';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/entryJs';
		$data['contend'] = 'pages/entryPageView';
		$this->load->view('body', $data);
    }
    function complain(){
        $data['title'] = 'Complain Register Page';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/entryJs';
		$data['contend'] = 'pages/complain';
		$this->load->view('body', $data);
    }
	function complainSave()
	{
	    $this->db->where('username',$this->input->post('userid'));
	    $this->db->where('password',$this->input->post('pass'));
	    $cust_d = $this->db->get('customers');
	    if($cust_d->num_rows()>0)
	    {
	        $userid= $this->input->post('userid');
            $pass= $this->input->post('pass');
            $complain_msg= $this->input->post('complain_msg');
            $photo_name1 = time().trim($_FILES['image']['name']);
            $this->db->select_max('id');
    		$this->db->from('complain');
    		$maxid=$this->db->get()->row()->id;
            $maxid1=$maxid+1;
            $username = $maxid1;
            //$complin_id = "PASCOM"+$username;
            //print_r("PASCOM"+$maxid);exit();
            $data = array(
           'sub_ID'=>$userid,
           'complain_id'=> "PASCOM".$username,
           'message'=>$complain_msg,
           'upload'=>$photo_name1,
           'status'=>0,
           'created_date'=>date('Y-m-d')
             );
            $query=$this->db->insert('complain',$data);

            if($query)
            {
                 ////sms code start
                $sender = $this->db->get("sms_setting")->row();
                $sende_Detail =$sender;
                $msg = "Dear ".$cust_d->row()->name." Your Complain has been proceed in passystem.in .Please keep patience ,for a admin response ";
                // $mobile =  $this->input->post('contactno');
                $mobile = $cust_d->row()->mobile;
                $getsms= $this->db->get("sms")->row();
                //   if(($getsms->s_reg)==1){
                sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
                 //  }
               ////sms code end
               $this->load->library('upload');
               $image_path = realpath(APPPATH . '../assets/images/complain');
                   //$asset_name = $this->db->get('upload_asset')->row()->asset_name;
                 // $image_path = $asset_name.'/images/complain/';
               $config['upload_path'] = $image_path;
               $config['allowed_types'] = 'gif|jpg|jpeg|png|';
               $config['max_size'] = '50';
               $config['file_name'] = $photo_name1;
               if (!empty($_FILES['image']['name']))
               {
                   $this->upload->initialize($config);
                   $this->upload->do_upload('image');
               }
                redirect("auth/complain/1");
	        }
	    }
	    else
	    {
	        $this->db->where('username',$this->input->post('userid'));
	        $this->db->where('password',$this->input->post('pass'));
    	    $cust_d = $this->db->get('employee');
    	    if($cust_d->num_rows()>0)
    	    {
    	        $userid= $this->input->post('userid');
                $pass= $this->input->post('pass');
                $complain_msg= $this->input->post('complain_msg');
                $photo_name1 = time().trim($_FILES['image']['name']);
                $this->db->select_max('id');
        		$this->db->from('complain');
        		$maxid=$this->db->get()->row()->id;
                $maxid1=$maxid+1;
                $username = $maxid1;
                //$complin_id = "PASCOM"+$username;
                //print_r("PASCOM"+$maxid);exit();
                $data = array(
               'sub_ID'=>$userid,
               'complain_id'=> "PASCOM".$username,
               'message'=>$complain_msg,
               'upload'=>$photo_name1,
               'status'=>0,
               'created_date'=>date('Y-m-d')
                 );
                $query=$this->db->insert('complain',$data);
          
                if($query)
                {
                     ////sms code start
                    $sender = $this->db->get("sms_setting")->row();
                    $sende_Detail =$sender;
                    $msg = "Dear ".$cust_d->row()->name." Your Complain has been proceed in passystem.in .Please keep patience ,for a admin response ";
                    // $mobile =  $this->input->post('contactno');
                      $mobile = $cust_d->row()->mobile;
                    $getsms= $this->db->get("sms")->row();
                    //   if(($getsms->s_reg)==1){
                    sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
                     //  }
                   ////sms code end
                   $this->load->library('upload');
                   $image_path = realpath(APPPATH . '../assets/images/complain');
                       //$asset_name = $this->db->get('upload_asset')->row()->asset_name;
                     // $image_path = $asset_name.'/images/complain/';
                   $config['upload_path'] = $image_path;
                   $config['allowed_types'] = 'gif|jpg|jpeg|png|';
                   $config['max_size'] = '50';
                   $config['file_name'] = $photo_name1;
                   if (!empty($_FILES['image']['name']))
                   {
                       $this->upload->initialize($config);
                       $this->upload->do_upload('image');
                   }
                    redirect("auth/complain/1");
    	        }
    	    }
    	    else
    	    {
    	         redirect("auth/complain/2");
    	    }
	    }

    }
    public function match_subscriber(){
        //$itemData[]=array();
        $msg = '<div class="alert alert-info"><button data-dismiss="alert" class="close">&times;</button><strong>New Entry :) </strong></div>';
        $pmember_id= $this->input->post('p_id');
        //print_r($pmember_id);exit();
       $this->db->where('status',1);
        $this->db->where('username',$pmember_id);

        $v1=$this->db->get('customers');
                    if($v1->num_rows()>0){
                 $v=$v1->row();
        $itemData = array(
            "name" =>$v->name,
             "address" =>$v->address,
             "mobile" =>$v->mobile,
             "msg" => ""
    ); } 
    else{
        $itemData = array(
         "name" =>"",
          "address" =>"",
         "mobile" =>"",
         "msg" => $msg
        );

    }
    echo json_encode($itemData);
 }
     function viewcomplain(){
        $data['title'] = 'Complain View Page';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/entryJs';
		$data['contend'] = 'pages/viewcomplain';
		$this->load->view('body', $data);
    }
    function viewComplainDetail(){
        $pId= $this->input->post('pid');
       // print_r($pId);exit();
       $this->db->where('complain_id',$pId);
      $data['view']= $this->db->get('complain');
     // print_r($data->row());exit();
       $this->load->view('pages/viewComplainDetail',$data);
    }

}