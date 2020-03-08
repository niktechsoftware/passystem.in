<?php
class websiteController extends CI_Controller{

	function updateNotice(){
		$insertData=array(
				"category" => $this->input->post("category"),
				"subject" => $this->input->Post("sub"),
				"message" => $this->input->Post("msg"),
				"date" => date("y-m-d"),
			//	"time" =>date("h:i:s"),
				"school_code"=>$this->session->userdata("school_code")
		);
		$this->load->model("noticeModel");
	$var =	$this->noticeModel->insertNotice($insertData);
		if($var)
		{
			redirect("index.php/login/noticeAlert");
			
		}
		
	}
	
	function updateNotice1(){
		$id=$this->input->post("id");
		$insertData=array(
				"id"=>$id,
				"category" => $this->input->post("category"),
				"subject" => $this->input->Post("sub"),
				"message" => $this->input->Post("msg"),
				"date" => date("y-m-d H:i:s"),
			//	"time" =>date("h:i:s"),
				"school_code"=>$this->session->userdata("school_code")
		);
		$this->load->model("noticeModel");
		$var =	$this->noticeModel->updateNotice($insertData,$id);
		if($var)
		{
			redirect("index.php/login/noticeAlert");
				
		}
	}
	
	function saveGallery(){
		$photo_name = time().trim($_FILES['selectedStu']['name']);
		$vl = $this->input->post("category");
		$data=array(
				'name'=>$this->input->post("title"),
				'image'=>$photo_name,
				'date'=>date("Y-m-d"),
				'image_type'=>"Admin",
				'desc'=>$this->input->post("category"),
				"school_code"=>$this->session->userdata("school_code")
		);
		$query = $this->db->insert("gallery",$data);
		if($query){
			
				$this->load->library('upload');
				$image_path = realpath(APPPATH . '../assets/gal');
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
				$config['max_size'] = '2024';
				$config['file_name'] = $photo_name;
			
		}
		if (!empty($_FILES['selectedStu']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('selectedStu');
			redirect(base_url()."login/gallery/23");
		}
		else{
			echo "Somthing going wrong. Please Contact Site administrator";
		}
	}
	
		function deleteGallery(){

			$this->db->where("school_code",$this->session->userdata("school_code"));
				$this->db->where("sno",$this->uri->segment(3));
				if($this->db->delete("gallery")){
					redirect(base_url()."login/gallery");
				}
				else{
					echo "Somthing going wrong. Please Contact Site administrator";
				}
			}
}