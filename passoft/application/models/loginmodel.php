<?php
class loginmodel extends CI_Model{
	
	function validate()
	{	
        $this->db->where("admin_username", $this->input->post("username"));
        $this->db->where("admin_password", md5($this->input->post("password")));
        $general = $this->db->get("general_settings");
        if($general->num_rows() >0){
			$res = $general->row();
			
        	$loginData = array(
        			"login_type" => "1",
        			"your_school_name" => $res->institute_name,
        			"address_1" => $res->address_1,
        			"address_2" => $res->address_2,
        			"city" => $res->city,
        			"state" => $res->state,
        				"id" 	=> $res->id,
        			"pin" => $res->pin,
        			"school_code"=>$res->id,
        			"mobile_number" => $res->mobile_number, 
        			"username" => $res->admin_username,
        			"name" => $res->owner_name,
        			"photo" => $res->ico_logo,
        			"logo" => $res->logo,
        			
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
        
        // check is it for employee
        $this->db->where("status",1);
        $this->db->where("username",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        $query = $this->db->get("branch");
       
        if($query->num_rows() >0){
        	$res = $query->row();
        	$general = $this->db->get("general_settings")->row();
        
        	$loginData = array(
        	    "your_school_name" => $res->b_name,
        			"login_type" => 2,
        			"address_1" => $res->district,
        				"id" 	=> $res->id,
        			"mobile_number" => $res->mobile,
        			"email" => $res->email_id,
        			"username" => $res->username,
        			"name" => $res->name,
        			"photo" => $res->image,
        			"logo" => $general->logo,
                    "branch_id"=>$res->id,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
	
        // check is it for student
        $this->db->where("status",1);
        $this->db->where("username",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        // $this->db->where("mobile", $this->input->post("mobile"));
        $query = $this->db->get("sub_branch");
      
       //print_r($res);exit;
        if($query->num_rows > 0){
        	 $res = $query->row();
        	 $general = $this->db->get("general_settings")->row();
        	 
			
        	$loginData = array(
        	    "your_school_name" => $res->bname,
        			"login_type" => 4,
        			"username" 	=> $res->username,
        			"id" 	=> $res->id,
        			"name" 		=> $res->ownername,
        			"address_1" => $res->address,
        			"city" => $res->city,
        			"district"=>$res->district,
        // 			"state" => $res->state,
        			"pin" => $res->pin,
        			"mobile_number" => $res->mob_no,
        			"email" => $res->email_id,
        			"photo" => $res->image,
        			"logo" => $general->logo,
        // 			"fsd" => $res->fsd,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
        	
		//	print_r($loginData);exit;
            return $loginData;
        }
        //code for customer login
        $this->db->where("status",1);
        $this->db->where("username",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        $query = $this->db->get("customers");
        if($query->num_rows > 0){
        	$res = $query->row();
        	$general = $this->db->get("general_settings")->row();
        	$loginData = array(
        			"your_school_name" => $general->institute_name,
					"login_type" => 5,
					"id"=>$res->id,
        			"username" 	=> $res->username,
        			"name" 		=> $res->name,
        			"address_1" => $res->address,
        		
        			"district"=>$res->district,
        			"state" => $res->state,
        			"pin" => $res->pin,
        			"mobile_number" => $res->mobile,
        			"email" => $res->email,
        			"photo" => $res->image,
        			"logo" => $general->logo,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
        	 
        	//	print_r($loginData);exit;
        	return $loginData;
        }
        ///code for employee
          //code for customer login
        $this->db->where("status",1);
        $this->db->where("username",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        $query = $this->db->get("employee");
        if($query->num_rows > 0){
        	$res = $query->row();
        	$general = $this->db->get("general_settings")->row();
        	$loginData = array(
        			"your_school_name" => $general->institute_name,
					"login_type" => 6,
					"id"=>$res->id,
        			"username" 	=> $res->username,
        			"name" 		=> $res->name,
        			"address_1" => $res->address,
        		
        			"district"=>$res->district,
        			"state" => $res->state,
        		
        			"emp_type"=>$res->emp_type,
        			"emp_subtype"=> $res->emp_subtype,
        			"mobile_number" => $res->mobile,
        			"email" => $res->email,
        			"photo" => $res->photo,
        			"logo" => $general->logo,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
        	 
        	//	print_r($loginData);exit;
        	return $loginData;
        }
    }
    
    function validateLock(){
    	$login_type = $this->input->post('logintype');
    	//echo $login_type;
    	//die();
    	if($login_type == 'admin'){

    		$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("admin_username", $this->input->post("username"));
    		$this->db->where("admin_password", md5($this->input->post("password")));
    		$result = $this->db->get('general_settings');
    		if($result->num_rows() > 0){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	elseif($login_type == "student"){

    		$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("status",1);
    		$this->db->where("username", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('student_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	else{

    		$this->db->where("school_code",$this->session->userdata("school_code"));
    		$this->db->where("status",1);
    		$this->db->where("username", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('employee_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    }
    
}