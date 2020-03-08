<?php 
class Welcome extends CI_Controller {


	public function index()
	{
//         $data['title'] = 'PAS System';
// 		$data['headercss'] = 'headercss/homecss';
// 		$data['header'] = 'header/header';
// 		$data['footer'] = 'footer/footer';
// 		$data['footerjs'] = 'footerjs/homejs';
// 		$data['contend'] = 'pages/homepage';
// 		$this->load->view('body', $data);
		
// 		.........
		$data['title'] = 'PAS System';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/homepage';
		$this->load->view('body', $data);
	}

	public function contact()
	{
	     $data['title'] = 'Contact Us';
		$data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/contact';
		$this->load->view('body', $data);
	}
}

