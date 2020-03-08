<?php
class pagination extends CI_Controller {

    public function index()
    {
        // $config['base_url'] = site_url('pagination/index');
        // $config['total_rows'] = $this->db->count_all('stock_products');
        // $config['per_page'] = "24";
        // $config["uri_segment"] = 3;
        // $choice = $config["total_rows"]/$config["per_page"];

        // $config['full_tag_open'] = "<ul class='pagination'>";
        // $config['first_link'] = "First";
        // $config['last_link'] = "Last";
        // $config['full_tag_close'] ="</ul>";
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        // $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        // $config['next_tag_open'] = "<li>";
        // $config['next_tagl_close'] = "</li>";
        // $config['prev_tag_open'] = "<li>";
        // $config['prev_tagl_close'] = "</li>";
        // $config['first_tag_open'] = "<li>";
        // $config['first_tagl_close'] = "</li>";
        // $config['last_tag_open'] = "<li>";
        // $config['last_tagl_close'] = "</li>";

        // $this->pagination->initialize($config);

        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // $data['productlist'] = $this->pagination_model->get_products($config["per_page"], $data['page'], NULL);

        // $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Our Products';
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/homepage_pro';
		$this->load->view('body', $data);
    }

    function search()
    {
        // get search string
        $search = ($this->input->post("book_name"))? $this->input->post("book_name") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("pagination/search/$search");
        $config['total_rows'] = $this->pagination_model->get_products_count($search);
        $config['per_page'] = "24";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
    

        // integrate bootstrap pagination
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['first_link'] = "First";
        $config['last_link'] = "Last";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['productlist'] = $this->pagination_model->get_products($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        //Load view
        $data['headercss'] = 'headercss/homecss';
		$data['header'] = 'header/header';
		$data['footer'] = 'footer/footer';
		$data['footerjs'] = 'footerjs/homejs';
		$data['contend'] = 'pages/homepage_pro';
		$this->load->view('body', $data);
    }
}
?>