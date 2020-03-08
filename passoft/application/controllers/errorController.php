<?php 
class ErrorController extends CI_Controller
{
    
    	public function __construct(){
		parent::__construct();
			$this->is_login();
		
	
	}
	
	
		function is_login(){
		$is_login = $this->session->userdata('is_login');
	
		if(($is_login != true)){
			
			redirect("index.php/homeController/index");
		}
	
	}
    public function index()
    {
        $data['pageTitle'] = 'Error Page';
		$data['smallTitle'] = 'Error Page';
		$data['mainPage'] = 'Error Page';
		$data['subPage'] = 'Error Page';
		$data['title'] = 'Error Page';
		$data['headerCss'] = 'headerCss/employeeProfileCss';
		$data['footerJs'] = 'footerJs/employeeProfileJs';
		$data['mainContent'] = 'imageserror';
		$this->load->view("includes/mainContent", $data);
    }
}