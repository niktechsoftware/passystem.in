<?php
class AdminController extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		//$this->load->model("teacherModel");
		$this->load->model("admin");
	
	}

	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($logtype !=1){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}
	
	
	
	function adminProfile(){
		$data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Admin Profile';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Edit or Update Profile';
		$data['title'] = 'Admin Profile';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'adminProfile';
		$this->load->view("includes/mainContent", $data);
	}
	
		 function verify_payment(){
	    $data['pageTitle'] = 'Verify Payment';
		$data['smallTitle'] = 'Verify Payment';
		$data['mainPage'] = 'Verify Payment';
		$data['subPage'] = 'Verify Payment';
		$data['title'] = 'Verify Payment';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/verify_payment';
		$this->load->view("includes/mainContent", $data);
	     
	}
	
	function checkbsid(){
	   $username =  $this->input->post("categoryd");
	   $type=  $this->input->post("demandc");
	   if($type==1){
	       $this->db->where("username",$username);
	      $branchf =  $this->db->get("branch");
	       if($branchf->num_rows()>0){
	           $bra=$branchf->row();
	           echo '<div class ="alert alert-info">'.$bra->b_name.'</div>';
	       }else{
	           echo '<div class ="alert alert-danger">Wrong Username</div>';
	       }
	   }else{
	        $this->db->where("username",$username);
	      $branchf =  $this->db->get("sub_branch");
	       if($branchf->num_rows()>0){
	           $bra=$branchf->row();
	           echo '<div class ="alert alert-info">'.$bra->bname.'</div>';
	       }else{
	           echo '<div class ="alert alert-danger">Wrong Username</div>';
	       }
	   }
	}
	
	
	function getaddemand(){
	   $type =  $this->input->post("type");
	   $username =  $this->input->post("username");
	   if($type==1){
	    
	     
	        $this->db->where("username",$username);
	        $branchf =  $this->db->get("branch");
	        if($branchf->num_rows()>0){
	          $branchid = $branchf->row()->id;
	         
	       $data['branchname']   =$branchf->row()->b_name;
	       $data['branchid']   =$branchid;
	    $data['pageTitle'] = 'Branch Overall Demand List';
		$data['smallTitle'] = 'Branch Demand List';
		$data['mainPage'] = 'Branch Demand';
		$data['subPage'] = 'Branch Demand List';
		$data['title'] = 'Branch Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Branch/overalldlbarnch';
		$this->load->view("includes/mainContent", $data);
	      }else{
	          echo "Some thing Is Wrong!!!!";
	      }
	   }else{
	       if($type ==2){
	            $this->db->where("username",$username);
	      $sranchf =  $this->db->get("sub_branch");
	       if($sranchf->num_rows()>0){
	         
	           $data['shopid'] =$sranchf->row()->id;
        $data['shopname'] =$sranchf->row()->bname;
        $data['pageTitle'] = 'Shop Overall Demand List';
		$data['smallTitle'] = 'Shop Overall Demand List';
		$data['mainPage'] = 'Shop Overall Demand List';
		$data['subPage'] = 'Shop Overall Demand List';
		$data['title'] = 'Shop Overall Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/shopdemandlist';
		$this->load->view("includes/mainContent", $data);
	       }else{
	            echo "Some thing Is Wrong!!!!";
	       }  
	           
	       }else{
	       $getallb =     $this->db->get("branch");
	       if($getallb->num_rows()>0){
	          $i=1; foreach ($getallb->result() as $d):
	                $datasub[$i] = $d->id;
	              $i++; endforeach;
	    $data['branchid']   =$datasub;
	    $data['branchname']   ="Admin Over All Demand List";
	    $data['pageTitle'] = 'Admin Overall Demand List';
		$data['smallTitle'] = 'Admin Demand List';
		$data['mainPage'] = 'Admin Demand';
		$data['subPage'] = 'Admin Demand List';
		$data['title'] = 'Admin Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/overalldlAdmin';
		$this->load->view("includes/mainContent", $data);
	       }
	           else{
	               echo "NO Branch is Available.||||";
	           }
	       }
	   }
	   
	}
	
	function admindemandList(){
	     $data['pageTitle'] = 'Admin Demand List';
		$data['smallTitle'] = 'Admin Demand ';
		$data['mainPage'] = 'Admin Demand';
		$data['subPage'] = 'Admin Demand';
		$data['title'] = 'Admin Demand';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/adminDem';
		$this->load->view("includes/mainContent", $data);
	}
	public function to_verify()
	{
	    $invoice_no = $this->input->post('invoice_no');
	    $username = $this->input->post('username');
	    
	    $this->db->where('invoice_no',$invoice_no);
	    $dd= $this->db->get('transfer_product_paydetail');
	    
	        if($dd->num_rows()>0)
	        {
	            //print_r($dd);
	           
	            $dt3 = $dd->row();
	            // print_r($dt3);
	            $this->db->where('username',$username);
	            $b = $this->db->get('m_balance')->row();
	            $blnc1 = $b->balance;
	            $p_amount= $dt3->paid_amount;
	           if($blnc1<0)
    	        {
        	         $blnc = $blnc1 + $p_amount;
    	        }
    	        else
    	        {
    	            if($blnc1<$p_amount)
    	             {
    	             $blnc =  $p_amount - $blnc1;
    	             }
    	            else
    	            {
    	                $blnc =  $blnc1 - $p_amount;
    	            }
	            }
    	         $val1 = array('balance'=> $blnc,
    	                        'date'=>date('Y-m-d')
    	                        );
    	         $this->db->where('username',$username);
    	         $up = $this->db->update('m_balance',$val1);
    	         if ($up)
    	         {
    	              $val3 = array('receiver_status'=>1
    	                        );
        	         $this->db->where('invoice_no',$invoice_no);
        	         $up2 = $this->db->update('transfer_product_paydetail',$val3);
        	         if($up2)
        	         {
        	            echo "Payment Successfully Done.";   
        	         }
        	         else
        	         {
        	             echo "Payment receive not Done.";
        	         }
    	             
    	         }
    	         else
    	         {
    	             echo "Balance not Update";
    	         } 
	        }
	        else
	        {
	            echo "Record not found.";
	        }
	        
	    //echo $invoice_no;
	}
		public function aid_card(){
		    
	        //$uri=$this->uri->segment(3);
	       // $data['uri'] = $uri;
	        $data['pageTitle'] = 'ID Card';
			$data['smallTitle'] = 'ID Card';
			$data['mainPage'] = 'ID Card';
			$data['subPage'] = 'ID Card';
			$data['title'] = 'ID Card';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'Admin/idcard';
			$this->load->view("includes/mainContent", $data);
	         }

	public function idcardd(){
	       //if($this->session->userdata("login_type")==1){
	        //$uri=$this->uri->segment(3);
	        $uri = $this->input->post('userid');
	        $data['uri'] = $uri;
	       //echo $uri;
	        $data['pageTitle'] = 'ID Card';
			$data['smallTitle'] = 'ID Card';
			$data['mainPage'] = 'ID Card';
			$data['subPage'] = 'ID Card';
			$data['title'] = 'ID Card';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Admin/one_id_card';
			$this->load->view("includes/mainContent", $data);
	         //}
	}
	function AO_assign(){
		$data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Assign AO';
		$data['mainPage'] = 'Assign AO ';
		$data['subPage'] = 'Assign AO';
		$data['title'] = 'Assign AO';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/AO_assign';
		$this->load->view("includes/mainContent", $data);
	}
	
		public function create_meeting(){
    
    		$data['pageTitle'] = 'Meetings';
    		$data['smallTitle'] = 'Meetings';
    		$data['mainPage'] = 'Meetings';
    		$data['subPage'] = 'Meetings';
    		$data['title'] = 'Meetings';
    		$data['headerCss'] = 'headerCss/stockCss';
    		$data['footerJs'] = 'footerJs/stockJs';
    		$data['mainContent'] = 'Subscriber/create_meeting';
    		$this->load->view("includes/mainContent", $data);
	}
	
	function assign_meeting(){
        $ao_id = $this->input->post('select_ao');
        $date = $this->input->post('date');
        $sub_id = $this->input->post('sub_id');
        $address = $this->input->post('address');
        $time = $this->input->post('time');
        $data = array(
            'date' => $date,
            'ao' => $ao_id,
            'place' => $address,
            'sponser_id' =>$sub_id,
            'timing'=> $time
        ); 
        $insert = $this->db->insert('meetings',$data);
        if($insert)
        {
            $this->db->limit(1);
            $this->db->order_by('id','desc');
            $mt_dt = $this->db->get('meetings')->row();
            $this->db->where('username',$sub_id);
            $sub_dddt= $this->db->get('customers')->row();
            $this->db->where('username',$ao_id);
            $chk= $this->db->get('employee');
            if($chk->num_rows()>0)
            {
                $mble= $chk->row()->mobile;
                // $msg= "Dear ".$chk->row()->name." you are assigned to show a plan at ".$insert->row()->timing." in ".$insert->row()->place." with the sponsor ".$sub_dddt->name.". Call 980787667 for more details. Have a nice day.";
                $msg= "Dear ".$chk->row()->name." you are assigned to show a plan at ".$mt_dt->timing." in ".$mt_dt->place." on ".$mt_dt->date." with the sponsor ".$sub_dddt->name.". Call 980787667 for more details. Have a nice day.";
                
                sms($mble,$msg);
            }
        }
      redirect(base_url().'index.php/adminController/create_meeting/5','refresh');
    }
    function pay_statuss()
    {
       $row_id = $this->input->post('row_id');
        $data = array(
            'adminpayment_receive' => 1,
        ); 
        $this->db->where('id',$row_id);
        $upd = $this->db->update('order_serial',$data);
        if($upd)
        {
            echo "verified!!!";
        }
        else
        {
            echo "Not verify.!!";
        }
    }
		function daybook(){
		$data['pageTitle'] = 'DayBook Section';
		$data['smallTitle'] = 'DayBook';
		$data['mainPage'] = 'DayBook';
		$data['subPage'] = 'DayBook';
		$data['title'] = 'DayBook';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'daybook';
		$this->load->view("includes/mainContent", $data);
	}
	
		function admin_pay_recieve()
		{
    		$data['pageTitle'] = 'Pay And Recieve';
    		$data['smallTitle'] = 'Pay And Recieve';
    		$data['mainPage'] = 'Pay And Recieve';
    		$data['subPage'] = 'Pay And Recieve';
    		$data['title'] = 'Pay And Recieve';
    		$data['headerCss'] = 'headerCss/stockCss';
    		$data['footerJs'] = 'footerJs/stockJs';
    		$data['mainContent'] = 'Admin/admin_pay_recieve';
    		$this->load->view("includes/mainContent", $data);
	    }
	
	
		function matching_day_book(){
		$data['pageTitle'] = 'DayBook Section';
		$data['smallTitle'] = 'DayBook';
		$data['mainPage'] = 'DayBook';
		$data['subPage'] = 'DayBook';
		$data['title'] = 'DayBook';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/matching_day_book';
		$this->load->view("includes/mainContent", $data);
	}
	
	public function matching_daybookdata()
	{
	    $from = $this->input->post('d1');
	    $to= $this->input->post('d1');
	    $this->db->where('');
	    $this->db->where();
	    $this->db->get();
	}
	
		function pvdaybook(){
		$data['pageTitle'] = 'Pv DayBook Section';
		$data['smallTitle'] = 'Pv DayBook';
		$data['mainPage'] = 'Pv DayBook';
		$data['subPage'] = 'Pv DayBook';
		$data['title'] = 'Pv DayBook';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'pvdaybook';
		$this->load->view("includes/mainContent", $data);
	}
	
	   function walletdayBook(){
        if((strlen($this->input->post("value2"))>0)) {
        $data['pageTitle'] = 'DayBook Section';
		$data['smallTitle'] = 'DayBook';
		$data['mainPage'] = 'DayBook';
		$data['subPage'] = 'DayBook';
		$data['title'] = 'DayBook';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'branchdaybookdetail';
		
        $data['dt1']=$this->input->post("sdate");
        $data['dt2']=$this->input->post("enddate");
        $data['select']=$this->input->post("value2");
        $data['condition']=$this->input->post("value1");
        $data['branchid']=$this->input->post('branchid');
        $data['dabit']=0;
        $data['cradit']=0; 
        $this->load->view("includes/mainContent", $data);
         }
       else{
        $data['pageTitle'] = 'DayBook Section';
		$data['smallTitle'] = 'DayBook';
		$data['mainPage'] = 'DayBook';
		$data['subPage'] = 'DayBook';
		$data['title'] = 'DayBook';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'daybookdetail';
        $data['dt1']=$this->input->post("sdate");
        $data['dt2']=$this->input->post("enddate");
        $data['condition']=$this->input->post("value1");
        $data['dabit']=0;
        $data['cradit']=0; 
        $this->load->view("includes/mainContent", $data);
         }
	 }
	
		public function cashback_approve(){
            $sb_id= $this->input->post('sbrow_id');
            $row_id = $this->input->post('row_id');
            $this->load->model('subscriber_m');
            $check = $this->subscriber_m->cashback_approve($row_id,$sb_id);
           if($check)
            { 
                echo "Request Accepted!!";
            }
            else
            {
               echo "Not Accepted";
            }
		}
	
	public function daybookdetail()
{
   $b=0;
	
		$condition  = $this->input->post("value1");
		$dt1        = $this->input->post("sdate");
		$dt2       = $this->input->post("enddate");
		if($condition=='Both'){

			// $school_code = $this->session->userdata("school_code");
                 $this->db->where('Date(pay_date)>=','$dt1');
                 $this->db->where('Date(pay_date)<=','$dt2');
			    $a =$this->db->get('day_book');
			   print_r($a);
			   //exit();
			$dabit = 0;
			$cradit =0;
			if($b > 0){
				$data['dt1']=$dt1;
				$data['dt2']=$dt2;
				$data['title'] = 'Day Book';
		        $data['headercss'] = 'list_css';
		        $data['header'] = 'header';
		        $data['sidemenu'] = 'sidemenu';
		        $data['contend'] = 'pages/daybooklist';
		        $data['customizer'] = 'customizer';
		        $data['footer'] = 'footer';
		        $data['footerjs'] = 'list_js';
				$data['condition'] = $condition;
				$data['a']=$a;
				$data['b']=$b;
				$data['dabit']=0;
				$data['cradit']=0;
				print_r($data);
			$this->load->view("base/body",$data);
			}
			else
				redirect("index.php/adminController/dayBook/9");
		}
}

	
		function adminsubscriberdemandList(){
		$data['pageTitle'] = 'Subscriber Demand List';
		$data['smallTitle'] = 'Subscriber Demand List';
		$data['mainPage'] = 'Subscriber Demand List';
		$data['subPage'] = 'Subscriber Demand List';
		$data['title'] = 'Subscriber Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/adminsubscriberdemandList';
		$this->load->view("includes/mainContent", $data);
	}
	
	public function adminedit(){
		$data['unm']= $this->uri->segment(3);
		$data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Admin Profile';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Edit or Update Profile';
		$data['title'] = 'Admin Profile';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'adminedit';
		$this->load->view("includes/mainContent", $data);
	}
	
	public function admineditval(){
		$unm= $this->uri->segment(3);
	// 	$photo_name1 = time().trim($_FILES['file']['name']);     
	// if(strlen($this->input->post('file'))>0)
	// {
	// 	$value['image']=$this->input->post('file');
	// } 
	// else{
	// $dt=$this->db->get("general_settings")->row();
	// $value['image']=$dt->image;
	
	// }
		//	$value['b_name']=$this->input->post('bname');
			$value['owner_name']=$this->input->post('name');
			$value['mobile_number']=$this->input->post('mobile');
			$value['institute_name']=$this->input->post('institute');
			$value['address_1']=$this->input->post('address');
			$value['city']=$this->input->post('city');
			$value['state']=$this->input->post('state');
			$value['pin']=$this->input->post('pin');
			$value['admin_username']=$this->input->post('usernm');
			$value['admin_password']=$this->input->post('password');
			$value['email1']=$this->input->post('email');
		//	$value['account_no']=$this->input->post('accno');
		
			// $this->load->library('upload');
			// $image_path = realpath(APPPATH . '../assets/images/gallery/');
	
			// 	$config['upload_path'] = $image_path;
			// 	$config['allowed_types'] = 'jpg|jpeg|png';
			// 	$config['max_size'] = '1024';
	
			// 	if (!empty($_FILES['file']['name'])) {
			// 			$config['file_name'] = $photo_name1;
			// 		 $this->upload->initialize($config);
			// 			$this->upload->do_upload('file');
			// 			$value['image']=$photo_name1;
			// 			}
	
			$this->db->where("admin_username",$unm);
			$dt=$this->db->update("general_settings",$value);
			if($dt){
				 ?><script >alert("Your Profile Is Updated.");</script><?php
				 redirect("adminController/adminprofile/","refresh");
			}
			else{
				 echo "something going wrong plz try agian later;" ;
			}
	
	}
	
		
	function updateAdminProfile(){
		$data = array(
				"school_name" => $this->input->post("your_school_name"),
				"principle_name" => $this->input->post("principle_name"),
				"language" => $this->input->post("language"),
				"attendence_type" => $this->input->post("attendance_type"),
				
				"wise_principle_name" => $this->input->post("wise_principle_name"),
				
				"registration_no" => $this->input->post("collage_registration_number"),
				
				
				"address1" => $this->input->post("address_1"),
				"address2" => $this->input->post("address_2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"nationalty" => $this->input->post("nationality"),
				
				"mobile_no" => $this->input->post("mobile_number"),
				"fax_no" => $this->input->post("fax_number"),
				"email1" => $this->input->post("email1"),
				"email2" => $this->input->post("email2")
		);
	//	print_r($data);
		if($this->adminModel->updateAdminProfile($data)):
			$loginData = array(
					"school_name" => $this->input->post("your_school_name"),
					"address1" => $this->input->post("address_1"),
					"address2" => $this->input->post("address_2"),
					"city" => $this->input->post("city"),
					"state" => $this->input->post("state"),
					"pin" => $this->input->post("pin"),
					
					"mobile_no" => $this->input->post("mobile_number"),
					"name" => $this->input->post("principle_name")
			);
			$this->session->set_userdata($loginData);
			echo '<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Done!</strong> Admin Profile successfully updated.
				</div>';
		else:
		echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Somthing goes wrong...!</strong> Contact site administator.
				</div>';
		endif;
	}
	
	function changeAdminPassword(){
		$old_password = $this->input->post("old_password");
		$password = $this->input->post("password");
		$cPassword = $this->input->post("cPassword");
	//	print_r($password);
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->where("admin_password",md5($old_password));
		$isPasswordMatched = $this->db->get("general_settings")->num_rows();
		if($cPassword != $password):
			echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Re-Password not matched...!</strong> Please correct it first.
				</div>';
		elseif((strlen($cPassword) <= 0) || (strlen($password) <= 0) || (strlen($old_password) <= 0)):
		echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Any field can not be blank...!</strong> Please correct it first.
				</div>';
		elseif($isPasswordMatched > 0):
			$data = array(
					"admin_password" => md5($password)
			);
			if($this->adminModel->updateAdminPassword($data)):
			echo '<div class="alert alert-success">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong>Done!</strong> Admin Password successfully updated.
					</div>';
			else:
			echo '<div class="alert alert-danger">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong>Somthing goes wrong...!</strong> Contact site administator.
					</div>';
			endif;
		else:
			echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Password not matched...!</strong> Please try again.
				</div>';
		endif;
	}
	
 function uploadAdminlogo(){
		$school_code = $this->session->userdata("school_code");
		$photo_name = time().trim($_FILES['logo']['name']);
		$photo_name = str_replace(' ', '_', $photo_name);
		$new_img = array(
				"logo"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/".$school_code."/images/empImage/" . $old_img, 0777);
		@unlink("assets/".$school_code."/images/empImage/" . $old_img);
		$this->db->where("id",$this->session->userdata("school_code"));
		$query = $this->db->update("school",$new_img);
		if($query){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			//$image_path = realpath(APPPATH . '../assets/'.$school_code.'/images/empImage');
			$asset_name = $this->db->get('upload_asset')->row()->asset_name;
			$image_path = $asset_name.$school_code.'/images/empImage';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1160';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['logo']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('logo')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("logo",$photo_name);
					redirect("index.php/adminController/adminProfile/true/updateInfo");
				}else{
					redirect("index.php/errorController");	
				}
			}
		}
	}
	
 function uploadAdminPicture(){
		
		$photo_name = time().trim($_FILES['logo']['name']);
		$school_code = $this->session->userdata("school_code");
		$photo_name = str_replace(' ', '_', $photo_name);
		$new_img = array(
				"ico_logo"=> $photo_name
		);
		
		$old_img = $this->input->post("old_img");
		@chmod("assets/".$school_code."/images/empImage/" . $old_img, 0777);
		@unlink("assets/".$school_code."/images/empImage/" . $old_img);
		
		$this->db->where("id",$this->session->userdata("school_code"));
		$query = $this->db->update("school",$new_img);
		if($query){
			
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			//$image_path = realpath(APPPATH . '../assets/'.$school_code.'/images/empImage');
			$asset_name = $this->db->get('upload_asset')->row()->asset_name;
			$image_path = $asset_name.$school_code.'/images/empImage';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1160';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['logo']['name'])) {
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload('logo')) {
					//echo "hhh";exit;
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					redirect("index.php/adminController/adminProfile/true/updateInfo");
				}else{
					redirect("index.php/errorController");	
				}
			}
		}
	}
	
	
	
	function smssetting(){
		$data['pageTitle'] = 'Mobile Message And Notice';
		$data['smallTitle'] = 'Sms Setting';
		$data['mainPage'] = 'SMS';
		$this->load->model("smsmodel");
		$row =	$this->smsmodel->getsmsseting();
		if($row){
		$data['row'] =$row;
		$data['adm'] = $row->s_reg;
		$data['fee_submit'] = $row->b_reg;
		$data['sb_reg1'] = $row->sb_reg;
		$data['purchase'] = $row->del_reg;
		$data['stu_attendance'] = $row->emp_reg;
		$data['$active1'] = $row->active;
		$data['parent_message'] = $row->all_b;
		$data['announcement'] = $row->all_sb;
		$data['greeting'] = $row->all_sub;
		$data['homework'] = $row->indivisual;
		$data['subPage'] = 'Mobile Message And Notice';
		$data['title'] = 'Mobile Message And Notice';
		$data['headerCss'] = 'headerCss/smsCss';
		$data['footerJs'] = 'footerJs/smsJs';
		$data['mainContent'] = 'Admin/smssetting';
		$this->load->view("includes/mainContent", $data);
		}else{
		$data['subPage'] = 'Mobile Message And Notice';
		$data['title'] = 'Mobile Message And Notice';
		$data['headerCss'] = 'headerCss/smsCss';
		$data['footerJs'] = 'footerJs/smsJs';
		$data['mainContent'] = 'error';
		$this->load->view("includes/mainContent", $data);
		}
	}

	function adminorderapprove(){
		$data['pageTitle'] = 'Admin Approvel';
		$data['smallTitle'] = 'Admin Approvel';
		$data['mainPage'] = 'Admin Approvel';
		$data['subPage'] = 'Admin Approvel';
		$data['title'] = 'Admin Approvel';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/adminorderapprove';
		$this->load->view("includes/mainContent", $data);
	}
	
	function cnfrm_amount(){
		$data['pageTitle'] = 'Admin confirm Amount';
		$data['smallTitle'] = 'Admin confirm Amount';
		$data['mainPage'] = 'Admin confirm Amount';
		$data['subPage'] = 'Admin confirm Amount';
		$data['title'] = 'Admin confirm Amount';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/cnfrm_amount';
		$this->load->view("includes/mainContent", $data);
	}
	
	public function branch_amount_detail()
	{
	    $branch_id = $this->input->post('b_id');
	    $this->db->where('district',$branch_id);
	    $data['sub_branch'] = $this->db->get('sub_branch');
	    $this->load->view('Admin/amt_detail',$data);
	     
	}
	public function update_orderserial()
	{
	    $order_no = $this->input->post('order_no');
	    $this->db->where('order_no',$order_no);
	    $val=array('adminpayment_receive'=>1);
	    $dd = $this->db->update('order_serial',$val);
	    if($dd)
	    {
	        echo "Payment Approved";
	    }
	    else
	    {
	        echo "Not Approved";
	    }
	   // $this->load->view('Admin/amt_detail',$data);
	     
	}
	function order_approvel(){
		$data['pageTitle'] = 'Order confirm ';
		$data['smallTitle'] = 'Order confirm ';
		$data['mainPage'] = 'Order confirm';
		$data['subPage'] = 'Order confirm';
		$data['title'] = 'Order confirm ';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/order_approvel';
		$this->load->view("includes/mainContent", $data);
	}
	
		function paidadminorderapprove(){
		$data['pageTitle'] = 'Admin Paid Order List';
		$data['smallTitle'] = 'Admin Paid Order List';
		$data['mainPage'] = 'Admin Paid Order List';
		$data['subPage'] = 'Admin Paid Order List';
		$data['title'] = 'Admin Paid Order List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/paidadminorderapprove';
		$this->load->view("includes/mainContent", $data);
	}
	
	function adminproductdeatil(){
		$data['invoice']=$this->uri->segment(3);
		$data['pageTitle'] = 'Admin Approvel';
		$data['smallTitle'] = 'Admin Approvel';
		$data['mainPage'] = 'Admin Approvel';
		$data['subPage'] = 'Admin Approvel';
		$data['title'] = 'Admin Approvel';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Admin/adminproductdeatil';
		$this->load->view("includes/mainContent", $data);
	}
	
     public function selectdelivery()
    {
       
        $this->db->where("emp_type",5);
        $deliveryboy=$this->db->get('employee');
        
        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
<option>Select Delivery Boy</option>
<?php 
       foreach($boy as $row)
       { ?>
<option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>">
  <?php echo  $row->name." [ ". $row->username. " ] ";?></option>

<?php }
        
    }
    else
    {?>
<option>--Select Delivery Boy--</option>
<option>--No Any Delivery Boy--</option>';
<?php         
    }
        
    
        
    }
		 function assigntodelivery()
    {
         $ordernu=$this->input->post('orderno');
         $debid=$this->input->post('id');
        $data=array(
          'status'=>1,
          'del_boy_id'=>$debid,
          );
      $this->db->where('order_no',$ordernu);
      $update=$this->db->update('order_serial', $data);
      
       $this->db->where("emp_type",5);
        $deliveryboy=$this->db->get('employee');

        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
</select class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;">
<?php 
       foreach($boy as $row)
       { ?>
<option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>">
  <?php echo  $row->name." [ ". $row->username. " ] ";?></option>

<?php } 
        
        
        ?>
</select>
<?php }
       $this->db->where('order_no',$ordernu);
       $sendsms=$this->db->get('order_serial')->row();
       
       $boyid=$sendsms->del_boy_id;
       $cus=$sendsms->cust_id;
       
        $this->db->where('id',$boyid);
       $delivery=$this->db->get('employee')->row();
       
       
       $this->db->where("id",$cus);
        $cust=$this->db->get("customers")->row();
       
        $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

           $msg = " Dear " . $delivery->name. " Please take the order of  . " . $cust->name. " [ ". $cust->username." ] " . " Please Check Your Dashboard For Further Deatil, Please visit passystem.in .Thank You .";

              $mobileno=$delivery->mobile;            
          sms($mobileno,$msg);
          
          $msg = " Dear ". $cust->name. " Please Check You  order status From Own Dashboard and Call this Number".$mobileno ." to Delivery Incharge for Further Details visit passystem.in ";

              $mobile=$cust->mobile;            
          sms($mobile,$msg);
          
       }
			  function assignagaindelivery()
			 {
					 $debid=$this->input->post('id');
						$ordernu=$this->input->post('orderno');
					 $data=array(
						 'del_boy_id'=>$debid,
						 );
				 $this->db->where('order_no',$ordernu);
				 $update=$this->db->update('order_serial', $data);
				 
					$this->db->where('order_no',$ordernu);
					$sendsms=$this->db->get('order_serial')->row();
					
					$boyid=$sendsms->del_boy_id;
					$cus=$sendsms->cust_id;
					
					 $this->db->where('id',$boyid);
					$delivery=$this->db->get('employee')->row();
					
					
					$this->db->where("id",$cus);
					 $cust=$this->db->get("customers")->row();
					
					 $sender = $this->db->get("sms_setting")->row();
						 $sende_Detail =$sender;
	 
							$msg = " Dear ". $delivery->name . " Please take the order of . " . $cust->name. " [ ". $cust->username." ] " ." Please Check Your Dashboard For Further Deatil, Please visit passystem.in.Thank You .";
	 
								 $mobileno=$delivery->mobile;            
						 sms($mobileno,$msg);
						 
						 $msg = " Dear " . $cust->name. " Your  order status  have been change Please check from Own Dashboard and Call this Number".$mobileno ." to Change  Delivery Incharge for Further Detail, Please visit passystem.in ";
	 
								 $mobile=$cust->mobile;            
						 sms($mobile,$msg);
				 
			 }
			 
       public function admincash()
          {
       //  $order=$this->input->post('orderno');
          $order=$this->uri->segment(3);

        $dataa=array(
         'ad_rec_pay'=>1,   
            
        );
         $this->db->where('status',1);
         $this->db->where('order_status',1); 
        $this->db->where('order_no',$order);
       $orderdrecive=$this->db->update('order_serial',$dataa);
        if($orderdrecive){
         $this->db->where('status',1);
         $this->db->where('order_status',1); 
         $this->db->where('order_no',$order);
       $orderdetail=$this->db->get('order_serial');
       
      if($orderdetail->num_rows()>0)
      {
        $dta=$orderdetail->row();
//          print_r($dta);
//  exit();
        $cust_unm=$dta->id;
        $invoice_no=$dta->invoice_no;
      // $this->db->select_sum('quantity');
         $this->db->select_sum('subtotal');
         $this->db->where('order_no',$dta->order_no);
         $this->db->where('cust_id',$dta->cust_username);
        // $this->db->where('date',$custusr->order_date);
         $dt1= $this->db->get("shopbill")->row();

        $this->db->where("id",$cust_unm);
        $dt=$this->db->get("customers")->row();
        $id=$dt->parentID;
        // $cid=$dt->username;

        $this->db->where("id",$id);
        $parentdt=$this->db->get("customers")->row();
        $cid=$parentdt->username;

        $amnt=$dt1->subtotal;

        $totamt= $amnt;
        $prcntamt= 2;
        $prcnt=$totamt * $prcntamt;
        $totprcnt =$prcnt/100 ;

        $this->db->where("cid",$dt->username);
        $pvdt= $this->db->get("pv")->row();
        $pvrp=$pvdt->rupee;
        $totropee=$totprcnt+$pvrp;

      
        $count=0;
        $sende_Detail = $this->db->get("sms_setting")->row();

        $msg = "Dear ".$cust_unm." Thanks For Shopping With passystem.in . Your CashBack Amount  Rs  ".$totropee." /- is Under Process. Thank You .";
         $mobileno =	$dt->mobile;
         
         sms($mobileno,$msg);
       
    //   $i=1;
    //   $this->load->model("registration1");
    //   $this->registration1->commision($i,$cid,$amnt);

       
       
       $username=$this->session->userdata("username");
       
       $op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username='$username'")->row();
           $balance = $op1->closing_balance;
           $close1 = $balance + $amnt;


           $bal = array(
            "closing_balance" => $close1

          );
          $this->db->where("login_username",$username);
          $this->db->where("opening_date",date('Y-m-d'));
          $this->db->update("opening_closing_balance",$bal);

        $daybookdetail=array
          (
      'paid_to' =>$username,
      'paid_by' =>$cust_unm,
      'reason' =>"COD Shopping",
      'dabit_cradit' =>1,
      'amount' =>$amnt,
      'closing_balance' =>$close1 ,
      'pay_date' =>date('Y-m-d'),
      'pay_mode' =>'Cash',
      'invoice_no'=>$invoice_no
       );
       $this->db->insert("day_book",$daybookdetail);
       
       redirect("welcome/sborder");
       
     }?>
<!--<button type="submit" class="btn btn-primary" id="paymentrecive<?php echo $i;?>">Admin P.R </button>-->
<?php  
 }

           
}


public function invoice()         
{
$data['invoice']=$this->uri->segment(3);
$data['pageTitle'] = 'Admin Approvel';
$data['smallTitle'] = 'Admin Approvel';
$data['mainPage'] = 'Admin Approvel';
$data['subPage'] = 'Admin Approvel';
$data['title'] = 'Admin Approvel';
$data['headerCss'] = 'headerCss/adminapprovelcss';
$data['footerJs'] = 'footerJs/producttransfer';
$data['mainContent'] = 'Admin/invoice';
$this->load->view("includes/mainContent", $data);

}
public function genrateinvoice()
           
{

$data['orderno'] =$this->uri->segment(3);
$data['title'] = 'Order Products List';    
$this->load->view("Admin/invoicedetail", $data);

}

public function offlinepaymentapproval()         
{

$data['pageTitle'] = 'Payment Approvel';
$data['smallTitle'] = 'Payment Approvel';
$data['mainPage'] = 'Payment Approvel';
$data['subPage'] = 'Payment Approvel';
$data['title'] = 'AdPaymentmin Approvel';
$data['headerCss'] = 'headerCss/adminapprovelcss';
$data['footerJs'] = 'footerJs/producttransfer';
$data['mainContent'] = 'Admin/offlinepaymentapproval';
$this->load->view("includes/mainContent", $data);


}
function getsubbranch() {

	$tid = $this->input->post("classv");
	
	$var = $this->admin->getsbranch($tid);
		if($var->num_rows() > 0){
		?>

<option value="">-Select Sub Branch-</option>

<?php
			foreach ($var->result() as $row)
			{?>

<option value="<?php echo $row->id;?>" class="text-uppercase"><?php echo $row->bname;?></option>

<?php }

		}
}
// function getdel_in() {

// 	$tid = $this->input->post("classv");
// 	echo $tid;
// }
public function remainingamount()
{
		 $data['branchid']=$this->input->post('branchid');
		$data['subbranchid']=$this->input->post('sbranchid');
		$data['enddate']=$this->input->post('enddate');
		$data['delivery']=$this->input->post('delivery');
		
		// $this->db->where('payment_mode',"cashondelivery");
		$this->db->where('del_boy_id',$this->input->post('delivery'));
		$this->db->where('order_date',$this->input->post('enddate'));
		$this->db->where('sub_branchid',$this->input->post('sbranchid'));
		$order=$this->db->get('order_serial');
		$data['odrdernum']=$order->num_rows();
		$data['oderdetail']=$order->result();
       //$data['footerJs'] = 'footerJs/producttransfer';
		$this->load->view('Admin/paymentdetail',$data);
	 
}
public function adminpayment()
     {
       
        $orderno=$this->input->post('orderno');
       
        $data=array(
         'ad_rec_pay'=>1,
         'adminpayment_receive'=>1,  
            );
           
            $this->db->where('order_no',$orderno);
            $upadte=$this->db->update('order_serial',$data);
            if($upadte)
            {?>
<script>
alert('Okk Your Order And Amount Are Succesfully matched!thanks');
</script>
<?php  
             redirect('adminController/paymentapproval','refresh');  
         }
            else
            {?>
<script>
alert('somthing wrong!please try after sometime');
</script>

<?php 
                redirect('adminController/paymentapproval','refresh');  
               
            }
         
         
		 }
		 public function paymentapproval()
		 {
				 

				$data['pageTitle'] = 'Transaction Payment';
				$data['smallTitle'] = 'Transaction Payment';
				$data['mainPage'] = 'Transaction Payment';
				$data['subPage'] = 'Transaction Payment';
				$data['title'] = 'Transaction Payment';
				$data['headerCss'] = 'headerCss/adminapprovelcss';
				$data['footerJs'] = 'footerJs/producttransfer';
				$data['mainContent'] = 'Admin/ad_trans_payment';
				$this->load->view("includes/mainContent", $data);

				 
		 }
		 public function matchtransectionid()
		 {
				 $transactionid=$this->input->post('transactionid');
				 $orderno=$this->input->post('orderno');
				 
					$this->db->where('transaction_id', $transactionid);
					$this->db->where('order_no',$orderno);
					$transaction=$this->db->get('order_serial');
					if($transaction->num_rows()==1)
					{
							 $transaction1=$transaction->row();
							 
							$this->db->where('id',$transaction1->cust_id);
				$cust=$this->db->get('customers')->row();
			?>
						 <div class="row">
								 <div class="col-md-2"></div>
									<div class="col-md-8">
					<h5>Subscriber Name And Order Amount</h5>
									<h4 class="text-primary">
									 <?php echo  $cust->name." ".$transaction1->total_amount;?>
									</h4>
					<?php  
					if($transaction1->del_boy_id>0){
					 $this->db->where('id',$transaction1->del_boy_id);
									$delivery=$this->db->get('delivery_boy')->row();?>
					<h5>Delivery Incharge Name</h5>
					<h4 class="text-primary">
									 <?php echo $delivery->name;?>
									</h4> 
					<?php }?>
									<button class="btn btn-success" type="sumbit">Confirm Transaction Id</button>
									</div> 
									 <div class="col-md-2"></div>
								 
						 </div>
						 </form>
					<?php                    
					}
					else
					{
						echo "Wrong Transaction id"; 
							
					}
	
		 }
		 public function adminpaymentcollect()
		 {  
				 
					$amt=$this->input->post('amt');
					$orderno=$this->input->post('order');
					$amount=$this->input->post('amount');
					 $deatil=$this->input->post('deatil');
							 $this->db->where('order_no',$orderno);
							 $orderdetail=$this->db->get('order_serial');
							 if($orderdetail->num_rows()>0){
							 $dta=$orderdetail->row();
							 $cust_unm=$dta->cust_id;
							 $invoice_no=$dta->invoice_no;
							 $this->db->where("id",$cust_unm);
							 $dt=$this->db->get("customers")->row();
							 $parentid=$dt->parentID;
							
							 $this->db->where("id",$parentid);
							 $parentdt=$this->db->get("customers");
							
							 
							 $amnt=$dta->total_amount;
							 $totamt=$amnt;
							 $prcntamt= 2;
							 $prcnt=$totamt * $prcntamt;
							 $totprcnt =$prcnt/100 ;
	 
					 $this->db->where("cid",$dt->id);
					 $pvdt= $this->db->get("pv")->row();
					 $pvrp=$pvdt->rupee;
					 $totropee=$totprcnt+$pvrp;
					 $pv= array(
					 'rupee'  =>$totropee
					 );
					$this->db->where("cid",$cust_unm);
					$pvupdate= $this->db->update("pv",$pv);
					
					 $count=0;
					 $sende_Detail = $this->db->get("sms_setting")->row();
					 $msg = "Dear Sir Thanks for Shopping With passystem.in . Your CashBack Amount is Rs - ".$totropee." /- Thank You .";
					 $mobileno = $dt->mobile;
			
					sms($mobileno,$msg);
					
				 $i=1;
				 if($parentdt->num_rows()>0){
					$cid=$parentdt->row()->username;
				 $this->admin->commision($i,$cid,$amnt,$orderno);
				 }
					$amt+=$amount;
				 $data=array(
						 'adminpayment_receive'=>1,
						 'detail'=>$deatil,
							 );
							 $this->db->where('order_no',$orderno);
							 $upadte=$this->db->update('order_serial',$data);
							 
								echo  $amt;
							 }
		 }

		
public function subcriberlist()         
  {

        $data['pageTitle'] = 'Subscriber List';
        $data['smallTitle'] = 'Subscriber List';
        $data['mainPage'] = 'Subscriber List';
        $data['subPage'] = 'Subscriber List';
        $data['title'] = 'Subscriber List';
        $data['headerCss'] = 'headerCss/sublistCss';
        $data['footerJs'] = 'footerJs/branchListJs';
        $data['mainContent'] = 'Admin/subcriberlist';
        $this->load->view("includes/mainContent", $data);


   }
public function inactivesubcriberlist(){
          $data['pageTitle'] = 'Subscriber List';
        $data['smallTitle'] = 'Subscriber List';
        $data['mainPage'] = 'Subscriber List';
        $data['subPage'] = 'Subscriber List';
        $data['title'] = 'Subscriber List';
        $data['headerCss'] = 'headerCss/branchListCss';
        $data['footerJs'] = 'footerJs/branchListJs';
        $data['mainContent'] = 'Admin/inactivesubcriberlist';
        $this->load->view("includes/mainContent", $data);
}


public function showotherlist(){
          $data['pageTitle'] = 'Other List';
        $data['smallTitle'] = 'Other List';
        $data['mainPage'] = 'Other List';
        $data['subPage'] = 'Other List';
        $data['title'] = 'Other List';
        $data['headerCss'] = 'headerCss/branchListCss';
        $data['footerJs'] = 'footerJs/branchListJs';
        $data['mainContent'] = 'Admin/showotherlist';
        $this->load->view("includes/mainContent", $data);
}
 public function nameofperson(){
        $data['pageTitle'] = 'Admin';
        $data['smallTitle'] = 'Admin';
        $data['mainPage'] = 'Admin';
        $data['subPage'] = 'Admin';
        $data['title'] = 'Admin';
        $data['headerCss'] = 'headerCss/branchListCss';
        $data['footerJs'] = 'footerJs/branchListJs';
        $data['mainContent'] = 'Admin/nameofperson';
        $this->load->view("includes/mainContent", $data);
 }
 public function upload_image(){
     
      $data['pageTitle'] = 'Upload Offer/Recently Launch';
        $data['smallTitle'] = 'Upload Offer/Recently Launch';
        $data['mainPage'] = 'Upload Offer/Recently Launch';
        $data['subPage'] = 'Upload Offer/Recently Launch';
        $data['title'] = 'Upload Offer/Recently Launch';
        $data['headerCss'] = 'headerCss/branchListCss';
        $data['footerJs'] = 'footerJs/branchListJs';
        $data['mainContent'] = 'Admin/upload_image';
        $this->load->view("includes/mainContent", $data);
 }
 
 public function upload_ad(){
     
      $data['pageTitle'] = 'Upload';
        $data['smallTitle'] = 'Upload';
        $data['mainPage'] = 'Upload  ';
        $data['subPage'] = 'Upload  ';
        $data['title'] = 'Upload  ';
        $data['headerCss'] = 'headerCss/stockCss';
        $data['footerJs'] = 'footerJs/stockJs';
        $data['mainContent'] = 'Admin/best_support';
        $this->load->view("includes/mainContent", $data);
 }
 
  public function best_support(){
     $value['name'] = $this->input->post('name');
     $value['msg'] = $this->input->post('msg');
     $img = $_FILES['photo']['name'];
    
     $photo_name1 = time().trim($img);
    	$asset_name=$this->db->get("upload_asset")->row()->asset_name;
				$image_path=$asset_name.'/images/people';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5120';

   
    if (!empty($_FILES['photo']['name'])) {
           $config['file_name'] = $photo_name1;
           $this->upload->initialize($config);
         $f1=    $this->upload->do_upload('photo');
            $value['image']=$photo_name1;
           

    
      $dt= $this->db->insert("bst_supporting",$value);

     if($dt){
         
         redirect("adminController/upload_ad/5");
     }
    else{
           echo "sorry your network is slow plz try again later . ";
        }
    }
    //  $this->input->post('image');
    //   $data['pageTitle'] = 'Upload Best Support';
    //     $data['smallTitle'] = 'Upload Best Support';
    //     $data['mainPage'] = 'Upload Best Support';
    //     $data['subPage'] = 'Upload Best Support';
    //     $data['title'] = 'Upload Best Support';
    //     $data['headerCss'] = 'headerCss/branchListCss';
    //     $data['footerJs'] = 'footerJs/branchListJs';
    //     $data['mainContent'] = 'Admin/best_support';
    //     $this->load->view("includes/mainContent", $data);
 }
 
  public function dlet_bst()
  {
     $this->db->where('id',$this->input->post("id"));
     $chk = $this->db->delete('bst_supporting');
     if($chk)
     {
         echo "View Deleted.";
     }
     else
     {
         echo "View Not Deleted.";
     }
  }
 
 public function rank_employee(){
     
      $data['pageTitle'] = 'Rank Employee';
        $data['smallTitle'] = 'Rank Employee';
        $data['mainPage'] = 'Rank Employee';
        $data['subPage'] = 'Rank Employee';
        $data['title'] = 'Rank Employee';
        $data['headerCss'] = 'headerCss/stockCss';
        $data['footerJs'] = 'footerJs/stockJs';
        $data['mainContent'] = 'Admin/rank_employee';
        $this->load->view("includes/mainContent", $data);
 }
 
 public function add_rank(){
     
    $rank = $this->input->post('rank');
    $username = $this->input->post('empid');
    
    $this->db->where('username',$username);
    $ad = $this->db->get('rank_emp');
    if($ad->num_rows()>0)
    {
        redirect('adminController/rank_employee/1');
    }
    else
    {
        $this->db->where('username',$username);
         $this->db->where('status','1');
        $emp = $this->db->get('employee');
        if($emp->num_rows()>0)
        {
            $dval = array(
                    'username' => $username
                    );
                    $this->db->where('rank',$rank);
            $chk = $this->db->update('rank_emp',$dval);
            if($chk)
            {
                 redirect('adminController/rank_employee/2'); 
            }
            else
            {
                 redirect('adminController/rank_employee/3');
            }
        }
        else
        {
             redirect('adminController/rank_employee/4'); 
        }
    }
 }
 
   public function rank_dlt()
   {
         $username = $this->input->post('username');
         $val = array('username' => '');
         $this->db->where('username',$username);
         $chk = $this->db->update('rank_emp',$val);
         if($chk)
         {
             echo "Rank Deleted.";
         }
         else
         {
             echo "Rank not Delete.";
         }
   }
 
  public function rlaunch(){
     $fname = $_FILES['category']['name'];
      $photo_name1 = time().str_replace(' ','_',$fname);
    	$asset_name=$this->db->get("upload_asset")->row()->asset_name;
				$image_path=$asset_name.'/offerimg';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '1024';

   
    if (!empty($_FILES['category']['name'])) {
           $config['file_name'] = $photo_name1;
           $this->upload->initialize($config);
         $f1=    $this->upload->do_upload('category');
            $value['rlaunch']=$photo_name1;
           

    
      $dt= $this->db->insert("r_launch",$value);

     if($dt){?>
<script>
alert("your Recently Launch Image is added");
window.location.href="<?php echo base_url();?>adminController/upload_image";
</script><?php
        //  redirect("adminController/upload_image" ,"refresh");
     }
    else{
           echo "sorry your network is slow plz try again later . ";
        }
    }

}
 public function delete_rlaunch(){
    $launchid= $this->uri->segment(3);
     $this->db->where("id",$launchid);
     $true=$this->db->delete("r_launch");
   
    if ($true) {
    ?>
<script>
alert("your Recently Launch Image is deleted");
window.location.href="<?php echo base_url();?>adminController/upload_image";
</script><?php
        //  redirect("adminController/upload_image" ,"refresh");
     }
    else{
           echo "sorry your network is slow plz try again later . ";
        }
    

}
function complain(){
	$dt = $this->admin->complain();
	$data['activeList']=$dt;
	$data['pageTitle'] = 'Complain View';
	$data['smallTitle'] = 'Complain View';
	$data['mainPage'] = 'Complain View';
	$data['subPage'] = 'Complain View';
	$data['title'] = 'Complain View';
	$data['headerCss'] = 'headerCss/stockCss';
	$data['footerJs'] = 'footerJs/stockJs';
	$data['mainContent'] = 'Admin/complain';
	$this->load->view("includes/mainContent", $data);
}
function viewSolution(){
	$id= $this->uri->segment(3);
	$this->db->where('id',$id);
	$data['view']=$this->db->get('complain')->row();

	$data['pageTitle'] = 'Complain View';
	$data['smallTitle'] = 'Complain View';
	$data['mainPage'] = 'Complain View';
	$data['subPage'] = 'Complain View';
	$data['title'] = 'Complain View';

	$data['headerCss'] = 'headerCss/stockCss';
	$data['footerJs'] = 'footerJs/stockJs';
	$data['mainContent'] = 'Admin/complainSolution';
	$this->load->view("includes/mainContent", $data);
	//$this->load->view('Admin/complainSolution',$data);
}
function complainSolution(){
	$cId= $this->input->post('c_id');
	$solution= $this->input->post('solution');

	$data = array(
		'status'=>1,
		'solution'=>$solution,
			'update_date'=>date('Y-m-d'),
	);

	$this->db->where('complain_id',$cId);
	$v=$this->db->update('complain',$data);
	if($v){
	   
	    $this->db->where('complain_id',$cId);
	    $dd = $this->db->get('complain')->row();
	    
	     $this->db->where('username',$dd->sub_ID);
	    $subd = $this->db->get('customers')->row();
	    $msg = "Dear ".$subd->name." your complain [".$cId."] solution is : ".$solution;
	    sms($subd->mobile,$msg); ?>
		<!--<script>alert("Your Solution Succesfully submited");</script>-->
		<?php redirect('adminController/complain/0');

	}
}

 public function rview(){
     $fname = $_FILES['rview']['name'];
      $photo_name1 = time().str_replace(' ','_',$fname);
     	$asset_name=$this->db->get("upload_asset")->row()->asset_name;
				$image_path=$asset_name.'/offerimg';

        $config['upload_path'] = $image_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '1024';

   
    if (!empty($_FILES['rview']['name'])) {
           $config['file_name'] = $photo_name1;
           $this->upload->initialize($config);
         $f1=    $this->upload->do_upload('rview');
            $value['offer_image']=$photo_name1;
           
     $value['offerimg_name']=$this->input->post("offername");
     // $this->load->model('registration1');
      
    //  $tablename='r_launch';
      $dt= $this->db->insert("r_launch",$value);

     if($dt){?>
<script>
alert("your Recently View Image is added");
window.location.href="<?php echo base_url();?>adminController/upload_image";
</script><?php
        //  redirect("adminController/upload_image" ,"refresh");
     }
    else{
           echo "sorry your network is slow plz try again later . ";
        }
    }

}
public function delete_rview(){
    $launchid= $this->uri->segment(3);
     $this->db->where("id",$launchid);
     $true=$this->db->delete("r_launch");
   
    if ($true) {
    ?>
<script>
alert("your Recently View Image is deleted");
window.location.href="<?php echo base_url();?>adminController/upload_image";
</script><?php
        //  redirect("adminController/upload_image" ,"refresh");
     }
    else{
           echo "sorry your network is slow plz try again later . ";
        }
    

    }
    
    public function export_test()
    {
        $data['pageTitle'] = 'Rank Employee';
        $data['smallTitle'] = 'Rank Employee';
        $data['mainPage'] = 'Rank Employee';
        $data['subPage'] = 'Rank Employee';
        $data['title'] = 'Rank Employee';
        $data['headerCss'] = 'headerCss/stockCss';
        $data['footerJs'] = 'footerJs/stockJs';
        $data['mainContent'] = 'export_test';
        $this->load->view("includes/mainContent", $data);
 }

}