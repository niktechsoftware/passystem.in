<?php
class InvoiceController extends CI_Controller{
    function __construct()
    {
        parent::__construct();
          $this->is_login();
        
        $school_code = $this->session->userdata("school_code");
        // print_r($school_code) ;
        // exit();
    }
    
    function is_login(){
        $is_login = $this->session->userdata('is_login');
        $is_lock = $this->session->userdata('is_lock');
        $logtype = $this->session->userdata('login_type');
       if(!$is_login){
            //echo $is_login;
            redirect("index.php/homeController/index");
        }
        elseif(!$is_lock){
            redirect("index.php/homeController/lockPage");
        }
    }
    
}  	