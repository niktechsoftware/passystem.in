<?php

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->is_login();
		
	}

	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		
		if(($logtype ==1) || ($logtype ==2) || ($logtype ==4) || ($logtype ==5) || ($logtype == 6)){
		if($logtype ==2){
			redirect("branchController/index");
		}
		if($logtype ==4){
			redirect("shopController/index");
		
		}
		if($logtype ==5){
			redirect("subscriberController/index");
		}
		if($logtype == 6){
			redirect("employeeController/index");
		}
		}
		else{
		    	redirect("homeController/index");
		}
		
		if(!$is_login){
			//echo $is_login;
			redirect("homeController/index");
		}
		elseif(!$is_lock){
			redirect("homeController/lockPage");
		}
	}

	function index(){
		$username = $this->session->userdata("username");
		$this->db->where("login_username",$username);
		$this->db->where("DATE(opening_date)",date("Y-m-d"));
		$checkopeningclo  = $this->db->get("opening_closing_balance");
		if($checkopeningclo->num_rows()>0){
			
		}else{
		    
			$clo1 = $this->db->query("select * from opening_closing_balance where login_username='$username' ORDER BY id DESC LIMIT 1");
			if($clo1->num_rows()>0){
				$clo =$clo1->row();
			$cl_date = $clo->closing_date;
			$cl_balance = $clo->closing_balance;
			$cr_date = date('Y-m-d');

			if($cl_date != $cr_date)
			{
				$this->ocbalance->insert_ocbalance($cl_balance,$cl_balance,$username);
			}
			}else{
				$this->ocbalance->insert_ocbalance(0,0,$username);
			}
		}
		
		$data['pageTitle'] = 'Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';

		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'Admin/dashboard';
		$this->load->view("includes/mainContent", $data);

	}
	
	
}
?>