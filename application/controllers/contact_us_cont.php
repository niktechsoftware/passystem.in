<?php 
class Contact_us_cont extends CI_Controller
{
    public function contact()
    {
		$data['title']='Contact Us';
		$data['headercss'] = 'headercss/contactcss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/contactjs';
		$data['contend'] = 'pages/contact_view';
		$this->load->view('body', $data);
	
    }
    public function id_card()
	{
		$data['title']='Id Card';
// 		$data['headercss'] = 'headercss/contactcss';
// 		$data['header'] = 'header/header';
// 		$data['footer'] = 'footer/footer';
// 		$data['footerjs'] = 'footerjs/contactjs';
		$data['contend'] = 'pages/id_card_view';
		$this->load->view('body', $data);
	}
	public function contact_value(){
	    $name = $this->input->post('name');
	    $email= $this->input->post('email');
	    $phone = $this->input->post('phone');
	    $message = $this->input->post('message');
	    $data = array (
	            "name"=> $name,
	            "email" => $email,
	            "phone" => $phone,
	            "message" => $message
	        );
	       $this->db->insert('contact',$data);
	       //print_r($insert);
	       redirect('contact_us_cont/contact',$data);
	}

}?>