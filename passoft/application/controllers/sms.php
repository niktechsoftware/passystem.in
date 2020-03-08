<?php


class Sms extends CI_Controller {
    	
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
	

public function index(){

		$data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Admin Profile';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Edit or Update Profile';
		$data['title'] = 'Admin Profile';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'Admin/sms';
		$this->load->view("includes/mainContent", $data);


}

function countChar4(){
	$var= $this->input->post("totalc");
	$varchar=strlen($var);
	echo $varchar;
	}

	function countChar1(){
	$var= $this->input->post("totalc");
	$varchar=strlen($var);
	echo $varchar;
	}

	function countChar2(){
	$var= $this->input->post("totalc");
	$varchar=strlen($var);
	echo $varchar;
	}

 function countChar3(){
	$var= $this->input->post("totalc");
	$varchar=strlen($var);
	echo $varchar;
 }

	function branches(){
		$smscount=0;
	$count=0;
	$sender = $this->db->get("sms_setting");
	if($sender->num_rows()>0){
	$sende_Detail =$sender->row();
	echo $msg =	$this->input->post("msg");
		$data=$this->db->get("branch");
		//print_r($data->result());exit();
		foreach($data->result() as $dt){
			 sms($dt->mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
		}
			 redirect("sms");
	}
	
}
	function shops(){
	$smscount=0;
	$count=0;
	$sender = $this->db->get("sms_setting");
	if($sender->num_rows()>0){
	$sende_Detail =$sender->row();
	echo $msg =	$this->input->post("msg");
		$data=$this->db->get("sub_branch");
		//print_r($data->result());exit();
		foreach($data->result() as $dt){
			 sms($dt->mob_no,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
		}
			 redirect("sms");
	}
	
	
}

function subscribers(){
	$smscount=0;
	$count=0;
	$sender = $this->db->get("sms_setting");
	if($sender->num_rows()>0){
	$sende_Detail =$sender->row();
	echo $msg =	$this->input->post("msg");
		$data=$this->db->get("customers");
		//print_r($data->result());exit();
		foreach($data->result() as $dt){
			 sms($dt->mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
		}
			 redirect("sms");
	}
	
}
function notice(){
		
	$count=0;
	$sender = $this->db->get("sms_setting")->row();
	$sende_Detail =$sender;
	$msg =	$this->input->post("msg");
	$mobile =	$this->input->post("mobile");
	
	sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
	
	redirect("sms");
}




}
?>