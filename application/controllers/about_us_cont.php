<?php 
class About_us_cont extends CI_Controller
{
    public function author_view()
    {
        // $data['headercss'] = 'headercss/contactcss';
		// $data['header'] = 'header/header';
		// $data['footer'] = 'footer/footer';
		// $data['footerjs'] = 'footerjs/contactjs';
		// $data['contend'] = 'pages/contact';
        // $this->load->view('body', $data);
        
        $data['pageTitle'] = 'Author View';
        $data['smallTitle'] = 'Author View';
        $data['mainPage'] = 'Author View';
        $data['subPage'] = 'Author View';
        $data['title'] = 'Author View';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/author_view';
       
        $this->load->view('body', $data);
    }
    public function support_author_view()
    {
        
        $data['pageTitle'] = 'Best Supporting Author';
        $data['smallTitle'] = 'Best Supporting Author';
        $data['mainPage'] = 'Best Supporting Author';
        $data['subPage'] = 'Best Supporting Author';
        $data['title'] = 'Best Supporting Author';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/support_author_view';
       
        $this->load->view('body', $data);
    }
    
     public function show_details()
    {
        
        $data['pageTitle'] = 'Details';
        $data['smallTitle'] = 'Details';
        $data['mainPage'] = 'Details';
        $data['subPage'] = 'Details';
        $data['title'] = 'Details';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/show_details';
       
        $this->load->view('body', $data);
    }
    
    public function topten_ach_view()
    {
        
        $data['pageTitle'] = 'Top Ten Achiever';
        $data['smallTitle'] = 'Top Ten Achiever';
        $data['mainPage'] = 'Top Ten Achiever';
        $data['subPage'] = 'Top Ten Achiever';
        $data['title'] = 'Top Ten Achiever View';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/topten_ach_view';
       
        $this->load->view('body', $data);
    }
    public function achiever_detail()
    {
        $this->db->where('username',$this->uri->segment(3));
        $data['sub_data'] = $this->db->get('customers')->row();
        $data['pageTitle'] = 'Achiever';
        $data['smallTitle'] = 'Achiever';
        $data['mainPage'] = 'Achiever';
        $data['subPage'] = 'Achiever';
        $data['title'] = 'Achiever View';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/achiever_detail';
       
        $this->load->view('body', $data);
    }
    
     public function see_rank_ach()
    {
        
        $data['pageTitle'] = 'Your Rank';
        $data['smallTitle'] = 'Your Rank  ';
        $data['mainPage'] = 'Your Rank';
        $data['subPage'] = 'Your Rank';
        $data['title'] = 'Your Rank';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/see_rank_ach';
       
        $this->load->view('body', $data);
    }
    
     public function best_ao()
    {
        
        $data['pageTitle'] = 'Best Advising Officer';
        $data['smallTitle'] = 'Best Advising Officer';
        $data['mainPage'] = 'Best Advising Officer';
        $data['subPage'] = 'Best Advising Officer';
        $data['title'] = 'Best Advising Officer';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/best_ao_v';
       
        $this->load->view('body', $data);
    }
    
//      public function ao_v()
//     {
        
//         $data['pageTitle'] = 'Advising Officer';
//         $data['smallTitle'] = 'Advising Officer';
//         $data['mainPage'] = 'Advising Officer';
//         $data['subPage'] = 'Advising Officer';
//         $data['title'] = 'Advising Officer';
//         $data['headercss'] = 'headercss/homecss';
// 		$data['header'] = 'header/header';
// 		$data['footer'] = 'footer/footer';
// 		$data['footerjs'] = 'footerjs/homejs';
// 		$data['contend'] = 'pages/ao_v';
       
//         $this->load->view('body', $data);
//     }
      public function top_emp()
    {
        
        $data['pageTitle'] = 'Top Ten Employee';
        $data['smallTitle'] = 'Top Ten Employee';
        $data['mainPage'] = 'Top Ten Employee';
        $data['subPage'] = 'Top Ten Employee';
        $data['title'] = 'Top Ten Employee';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/top_emp';
       
        $this->load->view('body', $data);
    }
    
       public function ao_v()
    {
        
        $data['pageTitle'] = 'Employee Details';
        $data['smallTitle'] = 'Employee Details';
        $data['mainPage'] = 'Employee Details';
        $data['subPage'] = 'Employee Details';
        $data['title'] = 'Employee Details';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/ao_v';
       
        $this->load->view('body', $data);
    }
    
       public function launch_pro()
    {
        
        $data['pageTitle'] = 'Launch Product';
        $data['smallTitle'] = 'Launch Product';
        $data['mainPage'] = 'Launch Product';
        $data['subPage'] = 'Launch Product';
        $data['title'] = 'Launch Product';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/launch_pro';
       
        $this->load->view('body', $data);
    }
        public function best_offer()
    {
        
        $data['pageTitle'] = 'Offer On Product';
        $data['smallTitle'] = 'Offer On Product';
        $data['mainPage'] = 'Offer On Product';
        $data['subPage'] = 'Offer On Product';
        $data['title'] = 'Offer On Product';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/best_offer';
       
        $this->load->view('body', $data);
    }
}
?>