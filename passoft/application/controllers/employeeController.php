<?php
	class EmployeeController extends CI_Controller{
		public function __construct(){
		parent::__construct();
			$this->is_login();
		$this->load->model("employee");
		$this->load->model("branch");
		$this->load->model("shop");
	}
		function is_login(){
		$is_login = $this->session->userdata('is_login');
	
		if(($is_login != true)){
			
			redirect("index.php/homeController/index");
		}
	}
	public function index(){
		if($this->session->userdata("login_type")>7)
		{
			redirect("index.php/homeController/index");
		}
		else if(($this->session->userdata("emp_type")==5)){
			$data['pageTitle'] = 'Delivery Dashboard';
			$data['smallTitle'] = 'Overview of all Section';
			$data['mainPage'] = 'Delivery Dashboard';
			$data['subPage'] = 'Delivery dashboard';
			$data['title'] = 'Delivery Dashboard';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'Employee/deliverydashboard';
			$this->load->view("includes/mainContent", $data);
		}	
		else if(($this->session->userdata("emp_type")==7)){
		    
			$data['pageTitle'] = 'Advising Officer Dashboard';
			$data['smallTitle'] = 'AO DashBoard';
			$data['mainPage'] = 'Advising Officer Dashboard';
			$data['subPage'] = 'Advising Officer dashboard';
			$data['title'] = 'Advising Officer Dashboard';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'Employee/ao_dashboard';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function order_details(){
		$data['pageTitle'] = 'Order Details';
		$data['smallTitle'] = 'Order Details';
		$data['mainPage'] = 'Order Details';
		$data['subPage'] = 'Order Details';
		$data['title'] = 'Order Details';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'Employee/order_details';
		$this->load->view("includes/mainContent", $data);
	}
	
		public function empwallet(){
	    $id= $this->session->userdata("id");
	   //$id= $this->session->userdata("username");
	    $this->db->where('emp_id',$id);
	    $emppv = $this->db->get('emp_pv');
	    $data ['emppv'] = $emppv;
		$data['pageTitle'] = 'Employee Wallet';
		$data['smallTitle'] = 'Employee Wallet';
		$data['mainPage'] = 'Employee Wallet';
		$data['subPage'] = 'Employee Wallet';
		$data['title'] = 'Employee Wallet';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'Employee/empwallet';
		$this->load->view("includes/mainContent", $data);
	}
	
	public function empid_card(){

	       $uri=$this->uri->segment(3);
	        $data['uri'] = $uri;
	        $data['pageTitle'] = 'ID Card';
			$data['smallTitle'] = 'ID Card';
			$data['mainPage'] = 'ID Card';
			$data['subPage'] = 'ID Card';
			$data['title'] = 'ID Card';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'idcard';
			$this->load->view("includes/mainContent", $data);
	 }
	public function id_card(){

	        $uri=$this->uri->segment(3);
	        $data['uri'] = $uri;
	        $data['pageTitle'] = 'ID Card';
			$data['smallTitle'] = 'ID Card';
			$data['mainPage'] = 'ID Card';
			$data['subPage'] = 'ID Card';
			$data['title'] = 'ID Card';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'icard';
			$this->load->view("includes/mainContent", $data);
	 }
	public function idcard(){
	       if($this->session->userdata("login_type")==1){
	             $uri=$this->uri->segment(3);
	        $data['uri'] = $uri;
// 	        $data['pageTitle'] = 'ID Card';
// 			$data['smallTitle'] = 'ID Card';
// 			$data['mainPage'] = 'ID Card';
// 			$data['subPage'] = 'ID Card';
// 			$data['title'] = 'ID Card';
// 			$data['headerCss'] = 'headerCss/dashboardCss';
// 			$data['footerJs'] = 'footerJs/subscriberJs';
		//	$data['mainContent'] = 'Subscriber/id_card';
			$this->load->view("Subscriber/id_card", $data);
	 }
	 else{
	        
			$username=$this->session->userdata("username");
			$this->db->where('username',$username);
			$emp= $this->db->get('employee');
			$data['sub_data'] = $emp;
			//$this->load->model('subscriber_m');
			//$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
// 			$data['pageTitle'] = 'ID Card';
// 			$data['smallTitle'] = 'ID Card';
// 			$data['mainPage'] = 'ID Card';
// 			$data['subPage'] = 'ID Card';
// 			$data['title'] = 'ID Card';
// 			$data['headerCss'] = 'headerCss/dashboardCss';
// 			$data['footerJs'] = 'footerJs/subscriberJs';
// 			$data['mainContent'] = 'Subscriber/id_card';
			$this->load->view("Subscriber/id_card", $data);
	 }
	}
	
	function meeting()
	{
	    $data['username']=$this->session->userdata("username");
		$data['pageTitle'] = 'Meeting List';
		$data['smallTitle'] = 'Meeting List';
		$data['mainPage'] = 'Meeting List';
		$data['subPage'] = 'Meeting List';
		$data['title'] = 'AO Meeting List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Employee/ao_meetinglist';
		$this->load->view("includes/mainContent", $data);
	}
	
		public function abcd(){
	 $this->load->helper('sms_helper');
	    $sender = $this->db->get("sms_setting");
	if($sender->num_rows()>0){
	$sende_Detail =$sender->row();
     $msg =	$this->input->post("msg");
	 $cc= $this->input->post('favorite');
		foreach($cc as $dd){
			 if($dd)
			 { 
			     sms($dd,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
			      }
			 else
			 { echo "not"; }
		}
		echo "Message Send Successfully.";	 
	}
	
	
	
	   }
	
	
	function aftermeeting()
	{
	    $data['username']=$this->session->userdata("username");
		$data['pageTitle'] = 'After Meeting List';
		$data['smallTitle'] = 'After Meeting List';
		$data['mainPage'] = 'After Meeting List';
		$data['subPage'] = 'After Meeting List';
		$data['title'] = 'AO Meeting List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Employee/after_meeting';
		$this->load->view("includes/mainContent", $data);
	}
	
		public function visitor_entry(){
	
			$username=$this->session->userdata("username");
// 			$this->load->model('subscriber_m');
// 			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'Visitor Entry Page';
			$data['smallTitle'] = 'Visitor Entry';
			$data['mainPage'] = 'Visitor Entry Page';
			$data['subPage'] = 'Visitor Entry';
			$data['title'] = 'Visitor Entry Page';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'Employee/entryPage';
			$this->load->view("includes/mainContent", $data);
    }
    
    function visitor_entry_value(){
        $ao_name = $this->session->userdata('username');
        // echo "$ao_name";
        // exit();
        $date = $this->input->post('date');
        $visitor_name = $this->input->post('vname');
        $address = $this->input->post('address');
        $contact_no = $this->input->post('contactno');
        $time = $this->input->post('time');
        $sub_id = $this->input->post('sub_id');
        $data = array(
            'date_of_advising' => $date,
            'ao' => $ao_name,
            'visitor_name' => $visitor_name,
            'address' => $address,
            'contact_no' => $contact_no,
            'created_date' => date('Y-m-d'),
            'subscriber_id' =>$sub_id,
            'meeting_time'=> $time
        ); 
        $insert = $this->db->insert('entry_table',$data);
      redirect(base_url().'index.php/employeeController/visitor_entry/5','refresh');
    }
	
	 function submit_fdb(){
        
        $row_id = $this->input->post('id');
        $msg = $this->input->post('msg');
        // $nxtdate = $this->input->post('nxtdate');
        $data = array(
            'feedback' => $msg,
            // 'nxt_meeting' => $nxtdate
        ); 
        $this->db->where('id',$row_id);
        $update = $this->db->update('entry_table',$data);
     if($update){
         echo "feedback submit successful";
     }
     else
     {
         echo "Not Submit";
     }
    }
	
	public function new_invoice(){
		$data['orderno'] =$this->uri->segment(3);
		$data['title'] = "Fee reciept invoice";
		$this->load->view("Employee/new_invoice",$data);
	}	
	public function genrateinvoice(){
	  
		$data['orderno'] =$this->uri->segment(3);
	   $data['title'] = 'Order Products List';    
	   $this->load->view("Employee/generateinvoicedetail", $data);

	   }
	public function empRegistration(){
		$data['empType'] = $this->employee->empType();
		if($this->session->userdata("login_type")== 1){
		$data['branch'] = $this->branch->getActiveList();}
		else if($this->session->userdata("login_type")== 2){
			$data['branch'] =$this->branch->getValue();
		}
		$data['pageTitle'] = ' New Employee Registration';
			$data['smallTitle'] = 'Employee Registration';
			$data['mainPage'] = 'Employee Registration';
			$data['subPage'] = 'Employee Registration';
			$data['title'] = 'Employee Registration';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/employeeJs';
			$data['mainContent'] = 'Employee/empRegistration';
			$this->load->view("includes/mainContent", $data);
}
function getsubtype(){
	$emptype= $this->input->post('emptype');
	$data['view'] =$this->employee->empSubType($emptype);
}
function subBranch(){
	$branch = $this->input->post('branch');
	$data['view1']=$this->shop->subbranch($branch);
}
function saveEmp(){
	$maxid=$this->employee->getMax();
		
	$maxid=$maxid+1;
	$username = $maxid+200;
	$name=$this->input->post('e_name');
	$mobile =$this->input->post('mobile');
	$empid= $this->input->post('emptype');
	$empsubid = $this->input->post('empSubType');
	$value['name']= $this->input->post('e_name');
	$value['father_name']= $this->input->post('fname');
	$value['mobile'] = $this->input->post('mobile');
	$value['email'] = $this->input->post('email');
	$value['dob'] = $this->input->post('dob');
	$value['address'] = $this->input->post('address');
	$value['state'] = $this->input->post('state');
	$value['pincode'] = $this->input->post('pincode');
	$value['country'] = $this->input->post('country');
	$value['aadhar_no'] = $this->input->post('aadhar');
	$value['emp_type'] = $this->input->post('emptype');
	$value['emp_subtype'] = $this->input->post('empSubType');
	$passw = $this->input->post('password');
	$value['password'] = $this->input->post('password');
	$value['created_date'] = date('Y-m-d');
	$value['district'] = $this->input->post('branch');
	$value['sub_branchid'] = $this->input->post('subbranch');
	if($empid==1){
		$username1='PSUDR'.$username;
		$value['username'] = $username1;
	}else if($empid==2){
		$username1='PSUM'.$username;
		$value['username'] = $username1;
	}
	else if($empid==3){
		$username1='PSUSM'.$username;
		$value['username'] = $username1;
	}
	else if($empid==4){
		$username1='PSUCM'.$username;
		$value['username'] = $username1;
	}
	else if($empid==5){
		$username1='PSUDI'.$username;
		$value['username'] = $username1;
	}
	else if($empid==6){
		$username1='PSUCI'.$username;
		$value['username'] = $username1;
	}
	else if($empid==8){
		$username1='PSUVI'.$username;
		$value['username'] = $username1;
	}
	else if($empsubid==1){
		$username1='PSUAOS'.$username;
		$value['username'] = $username1;
	}
	else if($empsubid==2){
		$username1='PSUAOE'.$username;
		$value['username'] = $username1;
	}
	else if($empsubid==3){
		$username1 = 'PSUAOC'.$username;
		$value['username'] =$username1;
	}
	else {
		$username1='PSUAOST'.$username;
		$value['username'] = $username1;
	}
$query =$this->employee->saveEmp($value); 
if($query)
{
   $msg = "Dear ". $name . " Your Employee Registration in PASS is Successfully Registered. Your Username is ".$username1."and Password is ".$passw.".Please Wait For Activation.Best Regards from  Pass Admin";
	$mobile = $this->input->post('mobile');
		sms($mobile,$msg); ?>
		
		<script>
		    window.location.href="<?php echo base_url();?>employeeController/empRegistration/5";
		</script>
   redirect(base_url().'employeeController/empRegistration/5');
		  //   // redirect('https://passystem.in/auth/signupShop','refresh');
	<?php  }else{?>
			<script>
		    window.location.href="<?php echo base_url();?>employeeController/empRegistration/5";
		</script>
<?php
// 		 redirect(base_url().'employeeController/error');
	  }
}

	function top10Employee()
	{
		$d = $this->employee->top10Employee();
		$data['d'] = $d;
		$data['pageTitle'] = 'Employee top 10 List';
		$data['smallTitle'] = 'top 10 List';
		$data['mainPage'] = 'Top 10 List';
		$data['subPage'] = 'Top 10';
		$data['title'] = 'Top 10 List of Employees';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Employee/top10Employee';
		$this->load->view("includes/mainContent", $data);
	}
	public function changeRank()
	{
	    $desc = $this->input->post('desc');
		$rank = $this->input->post('rank');
		$user = $this->input->post('user');
		$d = $this->employee->changeRank($rank,$user,$desc);
		echo '<button class="btn btn-success" >Saved<button>';
	}
	function deleteEmp(){
	    $id= $this->uri->segment(3);
	   $emp= $this->employee->deleteemp($id);
	   if($emp){
	      redirect('employeeController/top10Employee');
	   }
	}
function empActiveList(){
	if($this->session->userdata("login_type")== 1){
		$data['activeList'] = $this->branch->getActiveList();}
		else if($this->session->userdata("login_type")== 2){
			$data['activeList'] =$this->branch->getValue();
		}
	//$data['activeList']=$dt;
	$data['pageTitle'] = 'Active Employee List';
	$data['smallTitle'] = 'Active Employee List';
	$data['mainPage'] = 'Active Employee List';
	$data['subPage'] = 'Active Employee List ';
	$data['title'] = 'Active Employee  List';
	$data['headerCss'] = 'headerCss/branchListCss';
	$data['footerJs'] = 'footerJs/branchListJs';
	$data['mainContent'] = 'Employee/empActiveList';
	$this->load->view("includes/mainContent", $data);
}
function emplist(){
	 $subbranch = $this->input->post('empsubbranch');
	 $data['view'] = $this->employee->empSubbranch($subbranch);
	 $this->load->view('Employee/emplist',$data);
}
function deliveryboy(){
	$subbranch = $this->input->post('empsubbranch');
	 $data['view'] = $this->employee->empSubbranch1($subbranch);
	 $this->load->view('Employee/deliveryBoy',$data);
}
function empInactiveList(){
	if($this->session->userdata("login_type")== 1){
		$data['activeList'] = $this->branch->getActiveList();}
		else if($this->session->userdata("login_type")== 2){
			$data['activeList'] =$this->branch->getValue();
		}
	//$data['activeList']=$dt;
	$data['pageTitle'] = 'Employee Inactive List';
	$data['smallTitle'] = 'Registered Employee Inactive List';
	$data['mainPage'] = 'Inactive Employee List';
	$data['subPage'] = 'Employee List Inactive';
	$data['title'] = 'Employee Inactive List';
	$data['headerCss'] = 'headerCss/branchListCss';
	$data['footerJs'] = 'footerJs/branchListJs';
	$data['mainContent'] = 'Employee/empInactiveList';
	$this->load->view("includes/mainContent", $data);
}
function subBranch1(){
	$branch = $this->input->post('branch');
	$data['view1']=$this->shop->subbranch($branch);
}
function emplist1(){
	$subbranch = $this->input->post('empsubbranch');
	$data['view'] = $this->employee->empInactiveList($subbranch);
	$this->load->view('Employee/emplist1',$data);
}
function empfull_profile(){
    if($this->session->userdata('login_type')==6){
        $id= $this->session->userdata('id');
    }else{
	echo $id=$this->uri->segment(3);
}
	$data['view'] = $this->employee->employeeDetail($id);
	$data['pageTitle'] = 'Employee FullProfile';
	$data['smallTitle'] = 'Registered Employee Full Profile';
	$data['mainPage'] = 'Employee Full Profile';
	$data['subPage'] = 'Employee Full Profile';
	$data['title'] = 'Employee Full Profile';
	$data['headerCss'] = 'headerCss/branchListCss';
	$data['footerJs'] = 'footerJs/employeeJs';
	$data['mainContent'] = 'Employee/empfull_profile';
	$this->load->view("includes/mainContent", $data);
}
function updateEmp(){
	$eid=$this->uri->segment(3);
	$value['name']= $this->input->post('e_name');
	$value['father_name'] =$this->input->post('fname');
	$value['username'] =  $this->input->post('Username');
	$value['mobile'] = $this->input->post('mobile');
	$value['email'] = $this->input->post('email');
	$value['dob'] = $this->input->post('dob');
	$value['address'] = $this->input->post('address');
	$value['state'] = $this->input->post('state');
	$value['pincode'] = $this->input->post('pincode');
	$value['country'] = $this->input->post('country');
	$value['aadhar_no'] = $this->input->post('aadhar');
	$value['emp_type'] = $this->input->post('empType');
	$value['emp_subtype'] = $this->input->post('empsubType');
	$value['district'] = $this->input->post('district');
	$value['sub_branchid'] = $this->input->post('subBranch');
	$value['bank_name'] = $this->input->post('bank_name');
	$value['branch_name'] = $this->input->post('branch_name');
	$value['account_no'] = $this->input->post('acc_no');
	$value['password'] = $this->input->post('password');
	$value['ifsc_code'] = $this->input->post('ifsc');
	$photo1= time().trim($_FILES['image']['name']);
	
 $photo_name1 = time().trim($_FILES['image']['name']);     
        
		// if($query)
		// {
			$this->load->library('upload');
			//$image_path = realpath(APPPATH . '../assets/images/branch');
			$asset_name = $this->db->get('upload_asset')->row()->asset_name;
		//	print_r($asset_name);exit();
            $image_path = $asset_name.'/images/employee';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|';
			$config['max_size'] = '50';
			$config['file_name'] = $photo_name1;
		//}
		if (!empty($_FILES['image']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
			$value['photo'] = $photo_name1;
			
		}
		$this->db->where('id',$eid);
		$query=$this->db->update('employee',$value);
		redirect('employeeController/empfull_profile/0');
	}
function deliveryInchargeList(){
	if($this->session->userdata("login_type")== 1){
		$data['activeList'] = $this->branch->getActiveList();
	}else if($this->session->userdata("login_type")== 2){
			$data['activeList'] =$this->branch->getValue();
	}
	//$data['activeList']=$dt;
	$data['pageTitle'] = 'Delivery Incharge List';
	$data['smallTitle'] = 'Registered Delivery Incharge List';
	$data['mainPage'] = 'Delivery Incharge List';
	$data['subPage'] = 'Delivery Incharge List';
	$data['title'] = 'Delivery Incharge List';
	$data['headerCss'] = 'headerCss/stockCss';
	$data['footerJs'] = 'footerJs/stockJs';
	$data['mainContent'] = 'Employee/deliveryInchargeList';
	$this->load->view("includes/mainContent", $data);
}
    function deliveryOrderList(){
        $id=$this->session->userdata('id');
        $data['view'] =$this->employee->deliveryOrder($id);
    $data['pageTitle'] = 'Delivery Order List';
	$data['smallTitle'] = 'Delivery Order List';
	$data['mainPage'] = 'Delivery Order List';
	$data['subPage'] = 'Delivery Order List';
	$data['title'] = 'Delivery Order List';
	$data['headerCss'] = 'headerCss/branchListCss';
	$data['footerJs'] = 'footerJs/employeeListJs';
	$data['mainContent'] = 'Employee/deliveryOrderList';
	$this->load->view("includes/mainContent", $data);
}
function deliverypayment(){
      $id=$this->session->userdata('id');
        $data['view'] =$this->employee->deliveryOrder($id);
    $data['pageTitle'] = 'Delivery Payment Area';
	$data['smallTitle'] = 'Delivery Payment Area';
	$data['mainPage'] = 'Delivery Payment Area';
	$data['subPage'] = 'Delivery Payment Area';
	$data['title'] = 'Delivery Payment Area';
	$data['headerCss'] = 'headerCss/branchListCss';
	$data['footerJs'] = 'footerJs/employeeListJs';
	$data['mainContent'] = 'Employee/deliverypayment';
	$this->load->view("includes/mainContent", $data);
}
//  public function collectpayment(){
//         $id=$this->uri->segment(3);
//         $trancationId = $this->input->post('transactionid');
// 		// print_r($trancationId);
// 		// exit();
//         $order_id = $this->input->post('orderid');
//         $deliveryIncharge = $id;
//         $date= date('Y-m-d');
//         $data = array(
//                 'delIncharge_id'=>$deliveryIncharge,
//                 'order_id' => $order_id,
//                 'transation_id' => $trancationId,
//                 'date' =>$date
//             );
// 		   $th= $this->db->insert('delivery_transation',$data);

//           redirect('employeeController/index','refresh');
// 	}
	public function collectpayment(){
        $id=$this->uri->segment(3);
        $trancationId = $this->input->post('transactionid');
		// print_r($trancationId);
		// exit();
        $order_id = $this->input->post('orderid');
        $deliveryIncharge = $id;
        $date= date('Y-m-d');
        $data = array(
				'transaction_id' => $trancationId,
				'order_status'=>1,
                'delivery_date' =>$date
			);
			$this->db->where('order_no', $order_id);
		   $th= $this->db->update('order_serial',$data);
		   
          redirect('employeeController/index','refresh');
    }
    public function match_adhar_emp(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('aadhar_no',$aadhar);
	    $panno=$this->db->get('employee')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
	}
	
	
	