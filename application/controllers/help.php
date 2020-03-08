<?php 
class Help extends CI_Controller
{
     public function create_fv()
    {
        
        $data['pageTitle'] = 'Help And Tutorial';
        $data['smallTitle'] = 'Help And Tutorial';
        $data['mainPage'] = 'Help And Tutorial';
        $data['subPage'] = 'Help And Tutorial';
        $data['title'] = 'Help And Tutorial';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/help_fv';
       
        $this->load->view('body', $data);
    }
     public function create_ph()
    {
        
        $data['pageTitle'] = 'Help And Tutorial';
        $data['smallTitle'] = 'Help And Tutorial';
        $data['mainPage'] = 'Help And Tutorial';
        $data['subPage'] = 'Help And Tutorial';
        $data['title'] = 'Help And Tutorial';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/help_ph';
       
        $this->load->view('body', $data);
    }
     public function create_py()
    {
        
        $data['pageTitle'] = 'Help And Tutorial';
        $data['smallTitle'] = 'Help And Tutorial';
        $data['mainPage'] = 'Help And Tutorial';
        $data['subPage'] = 'Help And Tutorial';
        $data['title'] = 'Help And Tutorial';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/help_py';
       
        $this->load->view('body', $data);
    }
}
?>