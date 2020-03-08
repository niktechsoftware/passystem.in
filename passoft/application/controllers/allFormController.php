<?php
class AllFormController extends CI_Controller{
    
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
    
    
	function getCity(){
		$state = $this->input->post("state");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getCity($state);
		
			echo '<option value="">-City-</option>';
		foreach ($result->result() as $row):
			echo '<option value="'.$row->city.'">'.$row->city.'</option>';
		endforeach;
	}
	
	function getArea(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getArea($state,$city);
	
		echo '<option value="">-Area-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->area.'">'.$row->area.'</option>';
		endforeach;
	}
	
	function getPin(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$area = $this->input->post("area");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getPin($state,$city,$area);
		
		foreach ($result->result() as $row):
		echo $row->pin;
		endforeach;
	}
	
	function changeStatus()
	{
		$rowid  = $this->input->post("rowid");
		$tablename = $this->input->post("tablename");
		$currentstatus =$this->input->post("currentstatus");
		if($currentstatus==1)
		{
			$updateStatus=array("status"=>0);
		    $this->db->where("id",$rowid);
		    $this->db->update($tablename,$updateStatus);
		    echo "Inactivated";
		}
		else
		{
			$updateStatus=array("status"=>1);
			$this->db->where("id",$rowid);
			$this->db->update($tablename,$updateStatus);
			echo "Activated";
		} 
	}
}