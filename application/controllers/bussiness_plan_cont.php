<?php 
class Bussiness_plan_cont extends CI_Controller
{
    public function subscriber()
    {
        $data['title'] = 'Subscribe Pages PAS System';
        $data['headercss'] = 'headercss/contactcss';
        $data['header'] = 'header/header';
        $data['footer'] = 'footer/footer';
        $data['footerjs'] = 'footerjs/contactjs';
        $data['contend'] = 'pages/subscriber_view';
        $this->load->view('body', $data);
    }
    public function aboutpass()
    {
        $data['title'] = 'About PAS System';
		$data['headercss'] = 'headercss/contactcss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/contactjs';
		$data['contend'] = 'pages/aboutpass_view';
		$this->load->view('body', $data);
	
    }
    public function cashback()
    {
		$data['title'] = 'Cashback PAS System';
		$data['headercss'] = 'headercss/contactcss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/contactjs';
		$data['contend'] = 'pages/cashback_view';
		$this->load->view('body', $data);
	
    }
    public function chaining_sys()
    {
            $data['title'] = 'Sharing PAS System';
            $data['headercss'] = 'headercss/contactcss';
            $data['header'] = 'header/header';
            $data['footer'] = 'footer/footer';
            $data['footerjs'] = 'footerjs/contactjs';
            $data['contend'] = 'pages/chaining_sys_view';
            $this->load->view('body', $data);
    }
}
?>