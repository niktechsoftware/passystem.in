<?php
class SubscriberController extends CI_Controller{
    
	public function __construct(){
		parent::__construct();
		$this->is_login();
	$this->load->model('subscriber');
	$this->load->model('branch');
	$this->load->model('shop');
	}
	public function is_login(){
		
		$is_login = $this->session->userdata('is_login');
		if(!$is_login){
			redirect("index.php/homeController/index");
		}
		else{
			
			if($this->session->userdata("login_type")>5)
			{
				redirect("index.php/homeController/index");
			}
			
		}
	
	}
	public function index(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$data['pageTitle'] = 'Subscriber Dashboard';
			$data['smallTitle'] = 'Overview of all Section';
			$data['mainPage'] = 'Subscriber Dashboard';
			$data['subPage'] = 'Subscriber dashboard';
			$data['title'] = 'Subscriber Dashboard';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'Subscriber/dashboard';
			$this->load->view("includes/mainContent", $data);
		}	
	}
public function profile(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			
			$data['pageTitle'] = 'Subscriber Profile';
			$data['smallTitle'] = 'Profile';
			$data['mainPage'] = 'Subscriber Profile';
			$data['subPage'] = 'Subscriber Profile';
			$data['title'] = 'Subscriber Profile';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'Subscriber/profile';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function cash_back_request(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");
			$this->load->model('subscriber_m');
			$data['cashback']=$this->subscriber_m->cash_back($id);
			
			$data['pageTitle'] = 'CashBack Request';
			$data['smallTitle'] = 'CashBack Request';
			$data['mainPage'] = 'CashBack Request';
			$data['subPage'] = 'CashBack Request';
			$data['title'] = 'CashBack Request';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/cash_back_request';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function cashback_demand(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");
			$this->load->model('subscriber_m');
			$data['cashback']=$this->subscriber_m->cash_back($id);
			
			$data['pageTitle'] = 'Cashback Demand';
			$data['smallTitle'] = 'Cashback Demand';
			$data['mainPage'] = 'Cashback Demand';
			$data['subPage'] = 'Cashback Demand';
			$data['title'] = 'Cashback Demand';
			$data['headerCss'] = 'headerCss/sublistCss';
			$data['footerJs'] = 'footerJs/sublistJs';
			$data['mainContent'] = 'Subscriber/cashback_demand';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	
		public function cashback_request(){
		    $username=$this->session->userdata("username");
            $req_cb = $this->input->post('amt');
            $this->load->model('subscriber_m');
            $check = $this->subscriber_m->cashback_request($username,$req_cb);
           if($check)
            { 
                echo "Your Request Successfully submit.!!";
            }
            else
            {
               echo "Not Submitted";
            }
		}
	
	
	public function editProfile(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'Edit Profile';
			$data['smallTitle'] = 'Edit Profile';
			$data['mainPage'] = 'Edit Profile';
			$data['subPage'] = 'Edit Profile';
			$data['title'] = 'Edit Profile';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'Subscriber/editprofile';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	
	public function change_status()
	{
	    $id= $this->session->userdata('id');
	    $this->load->model('subscriber_m');
	    $check= $this->subscriber_m->change_status($id);
	    if($check)
	    {
	        redirect("index.php/subscriberController/index/5");
	    }
	    else
	    {
	        redirect("index.php/subscriberController/index/6");
	    }
	}
	
	public function active_inactive()
	{
	    $username = $this->input->post("username");
	    $this->db->where('username',$username);
	    $ddt = $this->db->get('customers')->row();
	    if($ddt->status==1)
	    {
	        $v = array('status'=> 0);
	        $this->db->where('username',$username);
	        $this->db->update('customers',$v);
	    }
	    else
	    {
	        $v = array('status'=> 1);
	        $this->db->where('username',$username);
	        $c = $this->db->update('customers',$v);
	    
	    if(strlen($ddt->ao)>1)
	        {
	            $this->db->where('username',$ddt->ao);
	            $v = $this->db->get('customers');
	            if($v->num_rows()>0)
	            {
	               //
	               $this->db->where("paid_by",$username);
	               $this->db->where("paid_to",$ddt->ao);
	               $pvdata=$this->db->get("pvday_book");
	               if($pvdata->num_rows()>0){
	                   
	               }
	               else{
	                $this->db->where("cid",$v->row()->id);
	               $oldpv =  $this->db->get("pv")->row()->pv;
	               // print_r($oldpv);
	               // exit();
	               $newpv=$oldpv+150;
	                $value=array( 'pv'=>$newpv);
	                  $this->db->where("cid",$v->row()->id);
	                $this->db->update('pv', $value);
	                
	                  $pvdaybook=array(
                    "paid_to"=>$ddt->ao,
                    "paid_by"=>$username, 
                     "reason"=>"sub. active pv",
                     "dabit_cradit"=>0,
                      "pv"=>150,
                      //"order_no"=>$orderno,
                        "pay_date"=>Date('y-m-d')
    
              );
           //  $this->db->where("cid",$parentdt->id);
              $uppv=$this->db->insert("pvday_book",$pvdaybook);
              
	                 
     $msg = "Congratulation Dear ".$v->row()->name." Your  150 PV has been added in your Account.";
     $mobile =	$v->row()->mobile;
     $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
     sms($mobile,$msg);
             }
	               }
	            }
	            else
	            { 
	                
	                $this->db->where("paid_by",$username);
	               $this->db->where("paid_to",$ddt->ao);
	               $pvdata=$this->db->get("pvday_book");
	               if($pvdata->num_rows()>0){
	                   
	               }
	               else{
	                 $this->db->where("username",$ddt->ao);
	               //$row =  $this->db->get("employee")->row()->pv;
	               $row =  $this->db->get("employee")->row();
	                 $this->db->where("emp_id",$row->id); //
	               $oldpv =  $this->db->get("emp_pv")->row()->pv;
	               $newpv=$oldpv+150;
	                $value=array( 'pv'=>$newpv);
	                 $this->db->where("emp_id",$row->id);
	                $this->db->update('emp_pv', $value);
	                
	                  $pvdaybook=array(
                    "paid_to"=>$ddt->ao,
                    "paid_by"=>$username, 
                     "reason"=>"sub. active pv",
                     "dabit_cradit"=>0,
                      "pv"=>150,
                      //"order_no"=>$orderno,
                        "pay_date"=>Date('y-m-d')
    
              );
           //  $this->db->where("cid",$parentdt->id);
              $uppv=$this->db->insert("pvday_book",$pvdaybook);
              
	          
	                 $msg = "Congratulation Dear ".$row->name." Your 150 PV has been added in your Account.";
    
	                 $mobile =	$row->mobile;
	                 $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
     sms($mobile,$msg);
             }
	            } }
	            
	        }
	        if($ddt->tstatus==1)
	        {   $this->db->where("cust_id",$ddt->id);
	             $rdt=$this->db->get('register_pv');
	             if($rdt->num_rows()>0){
	           
	        } 
	        else{
	             $value1=array('cust_id'=>$ddt->id, 'pv'=>'1000');
	            $this->db->insert('register_pv', $value1);
	             $msg = "Congratulation Dear ".$ddt->name." Your Account has been Activated Successfully and 1000 PV has been added in your Account.";
    
	                 $mobile =	$ddt->mobile;
	                 $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
     sms($mobile,$msg);
             }
	            
	        }
	        }
	    }
	    
	}
	
	public function invoice(){
    	if($this->session->userdata("login_type")>5)
    	{
    		redirect("index.php/homeController/index");
    	}
    	else
    	{
    		//$id=$this->session->userdata("id");
    // 		$this->load->model('subscriber_m');
    // 		$data['fv_data']=$this->subscriber_m->my_Fvlist($id);
    // 		$data['p_data']=$this->subscriber_m->create_fvlist();
    		$data['pageTitle'] = 'My Invoice';
    		$data['smallTitle'] = 'My Invoice';
    		$data['mainPage'] = 'My Invoice';
    		$data['subPage'] = 'My Invoice';
    		$data['title'] = 'My Invoice';
    		$data['headerCss'] = 'headerCss/sublistCss';
    		$data['footerJs'] = 'footerJs/sublistJs';
    		$data['mainContent'] = 'Subscriber/invoice';
    		$this->load->view("includes/mainContent", $data);
		}	
	}
	
	
	
	public function new_invoice(){
    	
    		//$id=$this->session->userdata("id");
    		// $this->load->model('subscriber_m');
    		// $data['fv_data']=$this->subscriber_m->my_Fvlist($id);
			// $data['p_data']=$this->subscriber_m->create_fvlist();
			$data['orderno'] =$this->uri->segment(3);
			$data['title'] = "Fee reciept invoice";
			$this->load->view("Subscriber/new_invoice",$data);
		}	
		public function genrateinvoice(){
          
			$data['orderno'] =$this->uri->segment(3);
		   $data['title'] = 'Order Products List';    
		   $this->load->view("Subscriber/generateinvoicedetail", $data);
 
		   }
	
	public function update_profile(){
		$username=$this->session->userdata("username");
		$up_data=array( 
			"name" => $this->input->post('name'),
			"father_name" => $this->input->post('father_name'),
			"mobile" => $this->input->post('mobile'),
			"email" => $this->input->post('email'),
			"address" => $this->input->post('address'),
			"pin" => $this->input->post('pin'),
			"district" => $this->input->post('district'),
			"state" => $this->input->post('state'),
			"adhar" => $this->input->post('adhar'),
			"pan" => $this->input->post('pan'),
			"gender" => $this->input->post('gender'),
			"amount" => $this->input->post('amount'),
			"nom1" => $this->input->post('nom1'),
			"nom_ad1" => $this->input->post('nom_ad1'),
			"nom_rel1" => $this->input->post('nom_rel1'),
			"nom2" => $this->input->post('nom2'),
			"nom_ad2" => $this->input->post('nom_ad2'),
			"nom_rel2" => $this->input->post('nom_rel2'),
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
			"bank_name" => $this->input->post('bank_name'),
			"account_no" => $this->input->post('account_no'),
			"ifsc" => $this->input->post('ifsc')
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			// "" => $this->input->post(''),
			);
			$this->load->model('subscriber_m');
			$check=$this->subscriber_m->update($up_data,$username);
			if($check)
			{
				redirect("index.php/subscriberController/profile/1");
			}
			else
			{
				redirect("index.php/subscriberController/profile/2");
			}

	}
    public function get_product()
    {
        $this->db->where('sub_category',$this->input->post('subcat_id'));
        $stdata['custdata'] = $this->db->get('stock_products');
        $this->load->view('Subscriber/stock_listp',$stdata);
        // print_r($stdata);
    }
	public function create_fv(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");

			$this->load->model('subscriber_m');
			$data['p_data']=$this->subscriber_m->create_fvlist();
			$data['fv_data']=$this->subscriber_m->check_fvlist($id);
			$data['id']= $id;

			//print_r($p_data);
			//exit();
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'Create Favourite List';
			$data['smallTitle'] = 'Create Favourite List';
			$data['mainPage'] = 'Create Favourite List';
			$data['subPage'] = 'Create Favourite List';
			$data['title'] = 'Create Favourite List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/create_fv';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	
	public function new_create_fv(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");

			$this->load->model('subscriber_m');
			$data['p_data']=$this->subscriber_m->create_fvlist();
			$data['fv_data']=$this->subscriber_m->check_fvlist($id);
			$data['id']= $id;

			//print_r($p_data);
			//exit();
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'Create Favourite List';
			$data['smallTitle'] = 'Create Favourite List';
			$data['mainPage'] = 'Create Favourite List';
			$data['subPage'] = 'Create Favourite List';
			$data['title'] = 'Create Favourite List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/new_create_fv';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	
		public function demand_prolist(){
		$username=$this->session->userdata("username");
		$id=$this->session->userdata("id");
		$this->db->where('id',$id);
		$sb_data= $this->db->get('customers')->row();
		$img_name = $_FILES['image']['name'];
		$img_pd = time().str_replace(' ','',$img_name);
		$date= date('Y-m-d');
		$in_data=array( 
			
			"company_name" => $this->input->post('company'),
			"product_name" => $this->input->post('productname'),
			"typeof_product" => $this->input->post('type'),
			"size" => $this->input->post('size'),
			"price" => $this->input->post('price'),
			"customer_id" => $id,
			"sub_branchid" => $sb_data->sub_branchid,
			"date" => $date,
			"file_1" => $img_pd,
// 			"" => $this->input->post(''),
// 			"" => $this->input->post(''),
			);
// 			print_r($in_data);
// 			exit;
			$this->load->model('subscriber_m');
			$check=$this->subscriber_m->add_demand_product($in_data,$username,$id,$img_pd);
			if($check)
			{ 
			 //   echo "other demand submitted successfully.";
				redirect("index.php/subscriberController/new_create_fv/5");
			}
			else
			{
			 //   echo "Not Added";
				redirect("index.php/subscriberController/new_create_fv/6");
			}

	}

	public function my_fvlist(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");
			$this->load->model('subscriber_m');
			$data['fv_data']=$this->subscriber_m->my_Fvlist($id);
			$data['p_data']=$this->subscriber_m->create_fvlist();
			$data['pageTitle'] = 'My Favourite List';
			$data['smallTitle'] = 'My Favourite List';
			$data['mainPage'] = 'My Favourite List';
			$data['subPage'] = 'My Favourite List';
			$data['title'] = 'My Favourite List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/my_fvlist';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function my_phlist(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$id=$this->session->userdata("id");
			$data['id']= $id;
			$this->load->model('subscriber_m');
			
			$data['fv_data']=$this->subscriber_m->my_Phlist($id);
			$data['p_data']=$this->subscriber_m->create_fvlist();
			$data['p_wallet']=$this->subscriber_m->check_product_wallet($id);
			$data['pageTitle'] = 'My Purchase List';
			$data['smallTitle'] = 'My Purchase List';
			$data['mainPage'] = 'My Purchase List';
			$data['subPage'] = 'My Purchase List';
			$data['title'] = 'My Purchase List';
	    	$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/my_phlist';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	
	public function subscriber_order()
	{
	 
          $payment=$this->input->post('selectforpayment');
       $transaction=$this->input->post('transactionid');
       $id= $this->session->userdata('id');
       
          if(strlen($payment)>2){
          if($payment=="cod")
          {
         $address=$this->input->post('checkaddress');
        if($address>0){
         $this->db->where('id',$address);
         $deli=$this->db->get('delivery_address')->row();
        
      $this->db->where('cust_usr', $id);
      $purlist=$this->db->get('purchase_list');

       $this->db->select_sum('price');
       $this->db->where('cust_usr',$id);
       $dt1= $this->db->get("purchase_list")->row();

     if($dt1->price>=1999){
     $username=$this->session->userdata('username');
    $this->db->where('username',$username);
    $custdetail=$this->db->get('customers')->row();
        $date=Date("y-m-d");
    $dt=date("dmy",strtotime($date));
     $order_no = $this->db->count_all("order_serial");
     $order_no1=1000+$order_no;
     $order_number =$dt.$custdetail->id."O".$order_no1;
      foreach ($purlist->result() as $value)
      { 
         
         $insert=array(
            'cust_id'=>$id,
            'p_code' =>$value->pt_code,
             'quantity'=>$value->qyt,
             'subtotal'=>$value->price, 
             'date'=>date('Y-m-d'),
             'order_no'=>$order_number, 
             );

          $inserted=$this->db->insert('order_detail', $insert); 
          }
       
          $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

           $msg = "Dear ".$custdetail->name. " Thanks For Shopping With passystem.in .Your Order is Under Process And Your Shopping Amount is " . $dt1->price . " Thank You.";

              $mobileno=$custdetail->mobile;            
          sms($mobileno,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);

          $invoice = $this->db->count_all("invoice_serial");
         $invoice1=1000+$invoice;
       $invoice_number = $dt.$custdetail->id."I".$invoice1;

        $invoiceDetail = array(
        "invoice_no" => $invoice_number,
        "reason" => "Subscriber Shopping",
        "invoice_date" =>date('Y-m-d h:i:s'),
        "subbranch_id"=> $custdetail->sub_branchid,
    );
    $inscin=$this->db->insert("invoice_serial",$invoiceDetail);

        $orderDetail = array(
        "order_no" => $order_number,
        "invoice_no" =>$invoice_number,
        "order_date" =>date('Y-m-d'),
        "cust_id"=>$id,
        "sub_branchid"=>$custdetail->sub_branchid,
        "payment_mode"=>"cashondelivery",
		"total_amount"=>$dt1->price,
		"deliver_address"=>$deli->recipt_address,
		'transaction_id'=>0,
    );
   $ordinst=$this->db->insert("order_serial",$orderDetail);
         

        if($ordinst &&  $inscin){   
      $this->db->where('cust_usr',$id);
      $purdelete=$this->db->delete('purchase_list');
      if($purdelete){
          ?><script>
      alert("Thanks for Order. Please check Your Dashboard !!");
      window.location.href="<?php echo base_url();?>subscriberController/index";
      </script>
     <?php
    //   redirect('subscriberController/index','refresh'); 
      }
      }
     }
    else
       {?>
      <script>
      alert("Your COD Total Product Amount must be Greater Then 1999");
      window.location.href="<?php echo base_url();?>subscriberController/my_bill";
      </script>
     <?php   //redirect('subscriberController/my_bill','refresh');   
       }
      }
     else
    {?>
      <script>
      alert("Please Select Your Address");
       window.location.href="<?php echo base_url();?>subscriberController/my_bill";
      </script>
     <?php  // redirect('subscriberController/my_bill','refresh');   
        }


     }
         else
         {
       $address=$this->input->post('checkaddress');
       if(strlen($transaction)>5)
       {
        if($address>0){
         $this->db->where('id',$address);
         $deli=$this->db->get('delivery_address')->row();
        
      $this->db->where('cust_usr',$id);
      $purlist=$this->db->get('purchase_list');

       $this->db->select_sum('price');
       $this->db->where('cust_usr',$id);
       $dt1= $this->db->get("purchase_list")->row();

     if($dt1->price>=1999){
     $username=$this->session->userdata('username');
    $this->db->where('username',$username);
    $custdetail=$this->db->get('customers')->row();
    $date=Date("y-m-d");
    $dt=date("dmy",strtotime($date));
     $order_no = $this->db->count_all("order_serial");
     $order_no1=1000+$order_no;
     $order_number = $dt.$custdetail->id."O".$order_no1;
      foreach ($purlist->result() as $value)
      { 
         
         $insert=array(
            'cust_id'=>$id,
            'p_code' =>$value->pt_code,
             'quantity'=>$value->qyt,
             'subtotal'=>$value->price, 
             'date'=>date('Y-m-d'),
             'order_no'=>$order_number, 
             );

          $inserted=$this->db->insert('order_detail', $insert); 
          
          }
      
          $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

           $msg = " Dear ". $custdetail->name. " Thanks For Shopping With passystem.in . Your Order is Under Process And Your  Payment Type " . $payment . " and Shopping Amount is " . $dt1->price  . " and transaction id ( ". $transaction." ) And Check Your Dashboard For Further Order Details Thank You";

              $mobileno=$custdetail->mobile;            
          sms($mobileno,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);

          $invoice = $this->db->count_all("invoice_serial");
         $invoice1=1000+$invoice;
       $invoice_number = $dt.$custdetail->id."I".$invoice1;

        $invoiceDetail = array(
        "invoice_no" => $invoice_number,
        "reason" => "Subscriber Shopping",
        "invoice_date" =>date('Y-m-d h:i:s'),
        "subbranch_id"=> $custdetail->sub_branchid,
    );
    $inscin=$this->db->insert("invoice_serial",$invoiceDetail);

        $orderDetail = array(
        "order_no" => $order_number,
        "invoice_no" =>$invoice_number,
        "order_date" =>date('Y-m-d'),
        "cust_id"=>$id,
        "sub_branchid"=>$custdetail->sub_branchid,
        'payment_mode'=>"online ".$payment,
        "total_amount"=>$dt1->price,
        "deliver_address"=>$deli->recipt_address,
        'transaction_id'=>$transaction,
    );
   $ordinst=$this->db->insert("order_serial",$orderDetail);
         
    if($ordinst &&  $inscin){   
      $this->db->where('cust_usr',$id);
      $purdelete=$this->db->delete('purchase_list');
      }

     }
    else
       {?>
      <script>
      alert("Your COD Total Product Amount must be Greater then 1999");
       window.location.href="<?php echo base_url();?>subscriberController/my_bill";
      </script>
     <?php   //redirect('subscriberController/my_bill','refresh');   
       }
      }
     else
    {?>
      <script>
      alert("Please Select Your Address");
       window.location.href="<?php echo base_url();?>subscriberController/my_bill";
      </script>
     <?php   //redirect('subscriberController/my_bill','refresh');   
       }
     }
     else
     {?>
      <script>
      alert("Please fill  Your Vaild transection id");
       window.location.href="<?php echo base_url();?>subscriberController/my_bill";
      </script>
     <?php   //redirect('subscriberController/my_bill','refresh');
     }
     ?><script>
      alert("Thanks for Order. Please check Your Dashboard!!");
       window.location.href="<?php echo base_url();?>subscriberController/index";
      </script>
     <?php   //redirect('subscriberController/index','refresh');
      }
      
          }
          else
          {?>
           <script>
      alert("Please select Payment Option");
       window.location.href="<?php echo base_url();?>subscriberController/my_bill";
        </script>   
              
        <?php  
        
            //   redirect('subscriberController/my_bill','refresh');
          }


	}
	
	public function addtocart_data(){
		$id=$this->session->userdata("id");
		$p_id=$this->input->post('id');
		// echo $p_id;
		//  exit;
		$this->load->model('subscriber_m');
		$check= $this->subscriber_m->addtocart_data($id,$p_id);
		if($check)
		{
			echo $check;
		}
		else
		{
			echo "0";
		}

	}
	public function my_bill(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$customer_id=$this->session->userdata("id");
			$this->load->model('subscriber_m');
			$data['ph_data']=$this->subscriber_m->my_bill($customer_id);
			$data['p_data']=$this->subscriber_m->create_fvlist();
			$data['id'] = $customer_id; 
			$data['pageTitle'] = 'My Bill ';
			$data['smallTitle'] = 'My Bill';
			$data['mainPage'] = 'My Bill';
			$data['subPage'] = 'My Bill';
			$data['title'] = 'My Bill';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/my_bill';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function updateItemQty(){
	
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('tqty');
	    $pri = $this->input->post('pri');
	    $pcode = $this->input->post('code');
       $subbranchid=$this->input->post('subbranchid');
       
       $this->db->where('subbranch_id',$subbranchid);
    	$this->db->where('p_code',$pcode);
        $stpro=$this->db->get('subbranch_wallet')->row();
        $st=$stpro->rec_quantity-$stpro->sale_quantity;
	   if($st>$qty){
	       
			  $data = array(
	           'qyt'=> $qty,
             'price'=> $pri*$qty ,
		    	);
            $this->db->where('id',$rowid);
			$updateee =$this->db->update('purchase_list',$data);
			if($updateee && $stpro)
			 {
			/* $this->db->select_sum('price');
           $this->db->where('cust_usr',$this->session->userdata('id'));*/
         $dt1= $this->input->post("subtotal");
            echo   $dt1+$pri;
			 }
		   }
		  else
		  {
		      echo "001";
		  }
	}
	
    public function removeaddress()
     {
       $id=$this->input->post('rowid');
       
            $this->db->where('id',$id);
       $dlete=$this->db->delete('delivery_address');
        if($dlete)
        {
        echo "Address rempove Sucessfully ";
        
        }
        
        
     }

	public function removeItemQty(){
	
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('tqty');
	    $pri = ($this->input->post('pri'));
	    $pcode = $this->input->post('code');
	   if($qty>0){
	       
			  $data = array(
	           'qyt'=> $qty,
             'price'=> $pri*$qty ,
		    	);
            $this->db->where('id',$rowid);
			$updateee =$this->db->update('purchase_list',$data);
			if($updateee)
			 {
		/*	 $this->db->select_sum('price');
           $this->db->where('cust_usr',$this->session->userdata('id'));*/
           $dt1= $this->input->post("subtotal");
            echo   $dt1-$pri;
			  }
		   }
		  else
		  {?>
		<?php  
		 /* $this->db->select_sum('price');
           $this->db->where('cust_usr',$this->session->userdata('id'));*/
            $dt1= $this->input->post("subtotal");
            echo   $dt1-$pri;
			    
		  }
	}
	
	public function removeItem(){
		    
		$rowid=$this->input->post('rowid');
	   // Remove item from cart
			 $this->db->where('id',$rowid);
	   $remove = $this->db->delete("purchase_list");
	   if($remove)
	   {
		   echo "item Deleted";
		   
		   
	   }
   }

	public function saveaddress()
    { 

	$altnm=$this->input->post('alertphone');
	if(strlen($altnm>0))
	{
    $data=array( 
     'cust_id'=>$this->session->userdata('id'),
     'recipt_name'=>$this->input->post('name'),
     'recipt_address'=>$this->input->post('address'),
     'recipt_city'=>$this->input->post('city'),
     'recipt_mobilnm'=>$this->input->post('phonenumber'),
		 'recipt_email'=>$this->input->post('email'),
		 'alertnate_mn'=>$altnm,
     );
     
    $insert= $this->db->insert('delivery_address',$data);
    if($insert)
    { ?>
    <script>
        alert('Your Address Save Successfully');
        window.location.href = "<?php echo base_url();?>subscriberController/my_bill";
    </script>
    <?php 
      redirect("subscriberController/my_bill","refresh");   
		}
	}
	else
	{
	
		$data=array( 
			'cust_id'=>$this->session->userdata('id'),
			'recipt_name'=>$this->input->post('name'),
			'recipt_address'=>$this->input->post('address'),
			'recipt_city'=>$this->input->post('city'),
			'recipt_mobilnm'=>$this->input->post('phonenumber'),
			'recipt_email'=>$this->input->post('email'),
			'alertnate_mn'=>$this->input->post('phonenumber'),
			);
			
		 $insert=$this->db->insert('delivery_address',$data);
		 if($insert)
		 { ?>
			<script>
					alert('Your Address Save Successfully');
					window.location.href = "<?php echo base_url();?>subscriberController/my_bill";
			</script>
			 <?php  
// 			redirect("subscriberController/my_bill","refresh");   
		 }

	}
    
    
}
	public function tree(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'Upline / Downline';
			$data['smallTitle'] = 'Upline / Downline';
			$data['mainPage'] = 'Upline / Downline';
			$data['subPage'] = 'Upline / Downline';
			$data['title'] = 'Upline / Downline';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'Subscriber/tree';

			if(isset($_GET['find'])):
				$currentUsername = $this->input->get('find');
					$this->db->where('username', $currentUsername);
				$currentCustomerDetail = $this->db->get('customers')->row();
				$currentCustomerID = $currentCustomerDetail->id;
			elseif(isset($_POST['username'])):
				$currentUsername = $this->input->post('username');
				$this->db->where('username', $currentUsername);
				$currentCustomerDetail = $this->db->get('customers')->row();
				$currentCustomerID = $currentCustomerDetail->id;
			else:
				$currentCustomerID =  $this->session->userdata('id');
			endif;
			
			$parenDetail = null;
			$secondParenDetail = null;
			$allChildDetails = [];
			
				$this->db->where('id', $currentCustomerID);
			$customerResult1 = $this->db->get('customers');
			
					if($customerResult1->num_rows()>0) {
							 $customerResult =$customerResult1->row();
							 if($customerResult->parentID!=null){
							 
			
				$parentID = $customerResult->parentID;
				$this->db->where('id', $parentID);
				$parenDetail = $this->db->get('customers')->row();
	
				if($parenDetail){
					$secondParentID = $parenDetail->parentID;
	
					$this->db->where('id', $secondParentID);
					$secondParenDetail = $this->db->get('customers')->row();
			}
	
				$this->db->where('parentID', $currentCustomerID);
				$allChildIDs = $this->db->get('tree')->result();
	
				foreach($allChildIDs as $currentValue):
					$this->db->where('id', $currentValue->CustomerID);
					$tempChildCustomer = $this->db->get('customers')->row();
					array_push($allChildDetails, $tempChildCustomer);
				endforeach;
			
	} 
}
	else{
				$parenDetail = null;
			$secondParenDetail = null;
			$allChildDetails = [];
	}
		
			$data['customerResult'] = $customerResult;
			$data['parenDetail'] = $parenDetail;
			$data['secondParenDetail'] = $secondParenDetail;
			$data['allChildDetails'] = $allChildDetails;
	
			$this->load->view("includes/mainContent", $data);
		}
	

			
		}	
    	public function id_card(){
	        
	       $uri=$this->uri->segment(3);
	        $data['uri'] = $uri;
	        $data['pageTitle'] = 'ID Card';
			$data['smallTitle'] = 'ID Card';
			$data['mainPage'] = 'ID Card';
			$data['subPage'] = 'ID Card';
			$data['title'] = 'ID Card';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'icard';
			$this->load->view("includes/mainContent", $data);
	         }

	public function idcard(){
	         if($this->session->userdata("login_type")==1){
	       $uri=$this->uri->segment(3);
	        $data['uri'] = $uri;
// 	        $data['pageTitle'] = 'ID Card';
// 			$data['smallTitle'] = 'ID Card';
// 			$data['mainPage'] = 'ID Card';
// 			$data['subPage'] = 'ID Card';
// 			$data['title'] = 'ID Card';
// 			$data['headerCss'] = 'headerCss/dashboardCss';
// 			$data['footerJs'] = 'footerJs/subscriberJs';
			//$data['mainContent'] = 'Subscriber/id_card';
			$this->load->view("Subscriber/id_card", $data);
	         }
	         else{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
// 			$data['pageTitle'] = 'ID Card';
// 			$data['smallTitle'] = 'ID Card';
// 			$data['mainPage'] = 'ID Card';
// 			$data['subPage'] = 'ID Card';
// 			$data['title'] = 'ID Card';
// 			$data['headerCss'] = 'headerCss/dashboardCss';
// 			$data['footerJs'] = 'footerJs/subscriberJs';
// 			$data['mainContent'] = 'Subscriber/id_card';
			$this->load->view("Subscriber/id_card", $data);
	         }
			
	}
	public function kyc(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'My Purchase List';
			$data['username'] = $username;
			$data['smallTitle'] = 'Submission Of KYC';
			$data['mainPage'] = 'Submission Of KYC';
			$data['subPage'] = 'Submission Of KYC';
			$data['title'] = 'Submission Of KYC';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'Subscriber/kyc';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function wallet(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username= $this->session->userdata("username");
			$this->load->model('subscriber_m');
			
			$rtn_val= $this->subscriber_m->subscriber_wallet($username);
			$data['total_pv'] = $rtn_val['total_pv'];	
			$data['cashback'] = $rtn_val['cashback'];
			$data['pageTitle'] = 'My Wallet';
			$data['smallTitle'] = 'My Wallet';
			$data['mainPage'] = 'My Wallet';
			$data['subPage'] = 'My Wallet';
			$data['title'] = 'My Wallet';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/wallet';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function order_details(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{
			$username=$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_data']=$this->subscriber_m->subscriber_profile($username);
			$data['pageTitle'] = 'My Order List';
			$data['smallTitle'] = 'My Order List';
			$data['mainPage'] = 'My Order List';
			$data['subPage'] = 'My Order List';
			$data['title'] = 'My Order List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Subscriber/order_details';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function feedback(){
		if($this->session->userdata("login_type")>5)
		{
			redirect("index.php/homeController/index");
		}
		else
		{

			$username =$this->session->userdata("username");
			$this->load->model('subscriber_m');
			$data['sub_fd']=$this->subscriber_m->lastfeedback($username);
			$data['pageTitle'] = 'My View';
			$data['smallTitle'] = 'My View';
			$data['username'] = $username;
			$data['mainPage'] = 'My View ';
			$data['subPage'] = 'My View ';
			$data['title'] = 'My View';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/subscriberJs';
			$data['mainContent'] = 'Subscriber/feedback';
			$this->load->view("includes/mainContent", $data);
		}	
	}
	public function insertfeedback(){

// 		$username=$this->uri->segment(3);
        $username=$this->session->userdata('username');
		$usermsg=array( 
		"cus_username"=>$username,
		"viewmsg" => $this->input->post('feedback'));
		//$username=$this->session->userdata("username");
		$this->load->model('subscriber_m');
		$check=$this->subscriber_m->insertfeedback($username,$usermsg);
		if($check)
		{
			redirect("index.php/subscriberController/feedback/5");
		}
	}
	
// 		public function updatefeedback(){

// 		$username=$this->uri->segment(3);
// 		$usermsg=array( 
// 		"cus_username"=>$username,
// 		"viewmsg" => $this->input->post('feedback'));
// 		//$username=$this->session->userdata("username");
// 		$this->load->model('subscriber_m');
// 		$check=$this->subscriber_m->insertfeedback($username,$usermsg);
// 		if($check)
// 		{
// 			redirect("index.php/subscriberController/feedback/5");
// 		}
// 	}
	
	public function uploadimg(){
		$username=$this->session->userdata("username");
		$img_ad1 = time().trim($_FILES['ad1']['name']);
		$img_ad2 = time().trim($_FILES['ad2']['name']);
		$img_pan = time().trim($_FILES['pan']['name']);
		//print_r($img_ad1); echo "<br>";
		$this->load->model('subscriber_m');
		$data['sub_fd']=$this->subscriber_m->upload_img($img_ad1,$img_ad2,$img_pan,$username);
		
	}
	public function uploadProfile_img(){
		$username=$this->session->userdata("username");
		$image = time().trim($_FILES['upload_img']['name']);
		// $img_ad2 = time().trim($_FILES['ad2']['name']);
		// $img_pan = time().trim($_FILES['pan']['name']);
		//print_r($img_ad1); echo "<br>";
		$this->load->model('subscriber_m');
		$data=$this->subscriber_m->uploadProfile_img($image,$username);
		if($data){
			redirect("index.php/subscriberController/profile/5");
		}
		else {
			redirect("index.php/subscriberController/feedback/6");
		}
	}


	
	public function insert_in_fvlist()
	{
		$customer_id=$this->session->userdata('id');
		$prow_id= $this->input->post('id');
		
		$this->load->model('subscriber_m');
		$count= $this->subscriber_m->insert_in_fvlist($prow_id,$customer_id);
		echo $count;
	}
	public function delete_in_fvlist()
	{
		$customer_id=$this->session->userdata('id');
		$prow_id= $this->input->post('id');
		$this->load->model('subscriber_m');
		$count= $this->subscriber_m->delete_in_fvlist($prow_id,$customer_id);
		echo $count;
	}
	
	 function subscriberReg(){
	   
		$data['pageTitle'] = ' Subscriber Registration';
		$data['smallTitle'] = 'Subscriber Registration';
		$data['mainPage'] = 'Add Subscriber Area';
		$data['subPage'] = 'New Subscriber Registration';
		$data['title'] = 'Add Subscriber Area';
		$data['headerCss'] = 'headerCss/subscribercss';
		$data['footerJs'] = 'footerJs/subscriberJs';
		$data['mainContent'] = 'Subscriber/SubscriberReg';
		$this->load->view("includes/mainContent", $data);
	   }

	function checkjoinerid(){
			$cid = $this->input->post("cat");
				$pass = $this->input->post("pass");
			$tid = $this->subscriber->subscriberid($cid,$pass);
			//print_r($tid);exit();
			$bid= $this->session->userdata('id');
			$this->db->where("id",$tid);
		$query=$this->db->get('customers');
		  	$data['view1'] = $this->branch->getValue();
		  $data['view'] = $query;
		  //print_r($data);exit();
        $this->load->view('Subscriber/customerregister',$data);
		 
}
function match_adhar_subs(){
	   // $aadhar=$this->input->post('adhar');
    //   $aadha_no['data']=$this->subscriber->aadhar($aadhar);
    //   ........
       $aadhar=$this->input->post('adhar');
	    $this->db->where('adhar',$aadhar);
	    $panno=$this->db->get('customers')->row();
	    if($panno){
	      echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
      
    
	}
	function match_pan(){
	    $pan=$this->input->post('panVal');
	   $pan_no['data']= $this->subscriber->pan($pan);
	   
	}
public function subbranchid(){
     $branchid=$this->input->post('branchid');
      $view['data'] = $this->subscriber->subbranchid($branchid);
	}
	
	public function customer_value(){
		$this->db->where("adhar",$this->input->post('aadhar'));
	$checkaadhar =	$this->db->get("customers");
	if($checkaadhar->num_rows()>0){ ?>
	    <script>
	     window.location.href = '<?php echo base_url();?>subscriberController/subscriberReg/6';
	     </script>
// 		redirect("subscriberController/subscriberReg/6" ,"refresh");
    <?php
	}else{
			
	$cid = $this->input->post("joinerid");
	$pass = $this->input->post("joinerpass");
	$tid = $this->subscriber->subscriberid($cid,$pass);
	$var = $this->subscriber->checkjoinerid($tid);
	
     if($var->num_rows()>0){
      
      $rw1=$var->row();
    $this->db->where("parentID",$rw1->id);
    $data= $this->db->get("tree");
    if($data->num_rows()>=20){ ?>
     <script>
         alert('Sorry Your Account Can Not Procced');
          window.location.href = '<?php echo base_url();?>subscriberController/subscriberReg';
     </script>
     
     <?php
    //   redirect("subscriberController/subscriberReg" ,"refresh");
        }
         
         else{
         $dis= $this->input->post('district');
         $joinerusername = $this->input->post('joinerid');
         $this->db->where("username",$joinerusername);
         $joiner_id1 = $this->db->get("customers")->row();
         $joiner_idf=$joiner_id1->id;
         $joiner_idname  = $joiner_id1->name;
         $this->db->select_max('id');
         $this->db->from('customers');
         $maxid1=$this->db->get()->row()->id;
         $maxid=$maxid1+1;
        $sbb= $this->input->post('subbranch');
      $username = $maxid+200;
      $c_name = $this->input->post('usernm');
      $value['username']= "B".$dis."S".$sbb."C".$username;
      $value['name']=$this->input->post('usernm');
      $value['father_name']=$this->input->post('f_name');
      $value['ao'] = $this->input->post('ao');
      $value['email']=$this->input->post('email');
      $value['address']=$this->input->post('address');
      $value['state']=$this->input->post('state');
      $value['pin']=$this->input->post('pin');
      $value['dob'] = $this->input->post('dob');
      $value['adhar']=$this->input->post('aadhar');
      $value['pan']=$this->input->post('pan');
      $value['m_name']= $this->input->post('m_name');
      $value['pr_address'] = $this->input->post('pr_address');
      $value['sub_branchid']=$this->input->post('subbranch');
        $db= $this->input->post('tpstatus');
         if($db == 't'){
           $value['tstatus'] =1;
           $value['pstatus']= 0;
         }
         else{
           $value['tstatus'] =0;
           $value['pstatus']= 1;
         }
      $value['district']=$this->input->post('district');
      $value['mobile']=$this->input->post('mobile');
      $value['amount']=$this->input->post('amount');
      $value['gender']=$this->input->post('gender');
      $value['password']=$this->input->post('password');
      $value['parentID']=$joiner_idf;
      $value['created'] = date('Y-m-d H:s:i');
      $value['status'] = 0;
      $get_id = $maxid;
     // print_r($get_id);exit();
     $this->db->where("id",$maxid);
     $getrow = $this->db->get("customers");
     //print_r($getrow);exit();
     if($getrow->num_rows()<1){
       // $getrow1= $getrow->row();
        $pvrow=$get_id;
              
            $r_pv=array(
            'emp_id'     => $this->input->post('ao'),
             'pv'          =>  150,
                );
            
                 $customers="customers";
                 $pv="pv";
                 $tree="tree";
				 $rpv="emp_pv";
				 $adhr=$this->input->post('aadhar');
					
						$cid=$this->branch->insertsub($customers,$value);
						if($cid){ ?>
							<script>alert('Your Registration  successfully');</script>
					<?php
				
				 $pval = array(
             'cid' => $cid,
             'pv' => 0 ,
             );
             
              $trval=array(
             'CustomerID'=>$cid,
             'parentID'=>$joiner_idf,
           //   'child'=>0
                 );
						$this->db->where("id",$cid);
						$data= $this->db->get("customers")->row();
							$count=0;
							$sender = $this->db->get("sms_setting")->row();
							$sende_Detail =$sender;
							$msg = "Dear ".$data->name." Your Registration is under processing. Your Username is  - ". $data->username ." and Password is - ". $data->password." Please call Customer Care for Activation";
							$mobile =	$this->input->post("mobile");
							sms($mobile,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
						}
					  //  if(($this->db->insert($pv,$pval))&& ($this->db->insert($tree,$trval))&& ($this->db->insert($rpv,$r_pv))){
					  if(($this->db->insert($pv,$pval)) && ($this->db->insert($tree,$trval))){
					      ?>
					      <script>
					           window.location.href = '<?php echo base_url();?>subscriberController/subscriberReg';
					      </script>
					      <?php
								//  redirect("subscriberController/subscriberReg", "refresh");
							}
					
				 
                 
                 }

  // }
}
}

	}


}
public function match_ao(){
     $ao=$this->input->post('ao');
   $aoval1['data'] = $this->subscriber->match_ao($ao);
   
}
/*function subscriberactiveList(){
  $bid = $this->branch->getValue();
  $bid1= $bid->row()->id;
  $dt = $this->subscriber->getActiveList($bid1);
  $data['activeList']=$dt;
  $data['pageTitle'] = ' Active Subscriber List';
  $data['smallTitle'] = 'Active Subscriber List';
  $data['mainPage'] = 'Subscriber List';
  $data['subPage'] = 'Active Subscriber List';
  $data['title'] = 'Subscriber Dashboard';
  $data['headerCss'] = 'headerCss/dashboardCss';
  $data['footerJs'] = 'footerJs/dashboardJs';
  $data['mainContent'] = 'Subscriber/subscriberactiveList';
  $this->load->view("includes/mainContent", $data);

}
function shop_subscriberactiveList(){
	if($this->session->userdata('login_type') == '4'){
		$this->db->where('username',$this->session->userdata('username'));
		$dt= $this->db->get("sub_branch");
	}else{
		$bid = $this->shop->getValue();
		$bid1= $bid->row()->id;
		$dt = $this->subscriber->getActiveList($bid1);
	}
  
  $data['activeList']=$dt;
  $data['pageTitle'] = ' Active Subscriber List';
  $data['smallTitle'] = 'Active Subscriber List';
  $data['mainPage'] = 'Subscriber List';
  $data['subPage'] = 'Active Subscriber List';
  $data['title'] = 'Subscriber Dashboard';
  $data['headerCss'] = 'headerCss/dashboardCss';
  $data['footerJs'] = 'footerJs/dashboardJs';
  $data['mainContent'] = 'Subscriber/subscriberactiveList';
  $this->load->view("includes/mainContent", $data);

}*/
public function sbranchSub(){
  $subbranchid= $this->input->post('subbranchid');
  $data['view'] = $this->subscriber->SubscriberView($subbranchid);
  $this->load->view('Subscriber/customerList',$data);
}
public function adminsbranchSub(){
  
	$subbranch['view'] = $this->input->post('subbranchid');
	$data['footerJs'] = 'footerJs/dashboardJs';
	 $this->load->view('Subscriber/subscriberDemandList1',$subbranch);
}

public function subscriberDemandList1(){
	$subbranch['view'] = $this->input->post('subBranch');
	$data['footerJs'] = 'footerJs/dashboardJs';
	 $this->load->view('Subscriber/subscriberDemandList1',$subbranch);
}
public function tactive(){
  $unm= $this->uri->segment(3);
  $data['view'] = $this->subscriber->tactive($unm);

}
public function delete_branch(){
  $id= $this->uri->segment(3);
  $data['view'] = $this->subscriber->SubscriberDelete($id);
  redirect("subscriberController/subscriberactiveList","refresh");
}
public function subscriberfull_profile(){
   $tid = $this->uri->segment(3);
  $data['view'] = $this->subscriber->checkjoinerid($tid);
  $data['bid']= $this->branch->getValue();
  $data['pageTitle'] = 'Subscriber Full Profile ';
  $data['smallTitle'] = 'Subscriber Full Profile';
  $data['mainPage'] = 'Subscriber Full Profile';
  $data['subPage'] = 'Subscriber Full Profile';
  $data['title'] = 'Subscriber Full profile';
  $data['headerCss'] = 'headerCss/dashboardCss';
  $data['footerJs'] = 'footerJs/dashboardJs';
  $data['mainContent'] = 'Subscriber/subscriberfull_profile';
  $this->load->view("includes/mainContent", $data);

}
function updateSubscriber(){
   $id= $this->uri->segment(3);

   $value['password'] =$this->input->post('password');
  $value['name']= $this->input->post('name');
  $value['father_name'] =$this->input->post('father_name');
  $value['m_name'] =$this->input->post('m_name');
  $value['dob'] = $this->input->post('dob');
  $value['mobile'] = $this->input->post('mob_no');
  $value['email'] = $this->input->post('email');
  $value['address'] = $this->input->post('address');
  $value['state'] = $this->input->post('state');
  $value['pin'] =$this->input->post('pin');
  $value['pr_address']= $this->input->post('p_address');
  $value['pan'] = $this->input->post('pan_no');
  $value['nom1'] = $this->input->post('nom1');
  $value['nom_ad1']= $this->input->post('nom_ad1');
  $value['nom_rel1'] = $this->input->post('nom_rel1');
  $value['nom2'] = $this->input->post('nom2');
  $value['nom_ad2'] = $this->input->post('nom_ad2');
  $value['nom_rel2'] = $this->input->post('nom_rel2');
  $value['gender'] = $this->input->post('gender');
  $value['bank_name'] =$this->input->post('bank_name');
  $value['account_no'] = $this->input->post('account_no');
  $value['branch_name'] = $this->input->post('branch_name');
  $value['parentID'] = $this->input->post('joinerId');
  $value['ifsc'] = $this->input->post('ifsc');
  $value['updated'] = date('Y-m-d');
   $photo_name1 = time().trim($_FILES['image']['name']);  
			// if($query)
		// {
			$this->load->library('upload');
			//$image_path = realpath(APPPATH . '../assets/images/branch');
			$asset_name = $this->db->get('upload_asset')->row()->asset_name;
		//	print_r($asset_name);exit();
            $image_path = $asset_name.'/images/subscriber';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|';
			$config['max_size'] = '5120';
			$config['file_name'] = $photo_name1;
		//}
		if (!empty($_FILES['image']['name'])) {
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
			$value['image'] = $photo_name1;
			
		}
		$this->db->where('id',$id);
		$query=$this->db->update('customers',$value);
	redirect('index.php/subscriberController/subscriberfull_profile/'.$id);
	}
	//	}

//}

public function subscriberdemandList(){
  $bid = $this->branch->getValue();
  $bid1= $bid->row()->id;
  $dt = $this->subscriber->getActiveList($bid1);
  $data['activeList']=$dt;
  $data['pageTitle'] = 'Shops Demand List ';
  $data['smallTitle'] = 'Shops Demand List';
  $data['mainPage'] = 'Shops Demand List';
  $data['subPage'] = 'Shops Demand List';
  $data['title'] = 'Shops Demand List';
  $data['headerCss'] = 'headerCss/listCss';
  $data['footerJs'] = 'footerJs/listJs';
  $data['mainContent'] = 'Subscriber/subscriberdemandList';
  $this->load->view("includes/mainContent", $data);
}
public function nameofperson(){
        $data['pageTitle'] = 'Payment Approvel';
        $data['smallTitle'] = 'Payment Approvel';
        $data['mainPage'] = 'Payment Approvel';
        $data['subPage'] = 'Payment Approvel';
        $data['title'] = 'Paymentm Approvel';
        $data['headerCss'] = 'headerCss/adminapprovelcss';
        $data['footerJs'] = 'footerJs/producttransfer';
        $data['mainContent'] = 'Subscriber/nameofperson';
        $this->load->view("includes/mainContent", $data);
 }

 public function subscriberOtherDemandList(){

    if($this->session->userdata("login_type")==1)
    {
        $dt = $this->db->get('demand_list');
    }
    elseif($this->session->userdata("login_type")==2)
    {
          $discrictd= $this->session->userdata("branch_id");
                $this->db->distinct();
                $this->db->select("id");
                $this->db->where("district",$discrictd);
                $getbranch = $this->db->get("sub_branch");
               
                if($getbranch->num_rows()>0){
                $getcode = $getbranch->result();
                $i=1;
               
                foreach($getcode as $row):
                    $datasub[$i] = $row->id;
                    //echo $row->id;
                   $i++; endforeach;
                   
                   
               $this->db->where_in("sub_branchid",$datasub);
        $dt = $this->db->get('demand_list');
       
       
                }
    }
    elseif($this->session->userdata("login_type")==4)
    {
        $id = $this->session->userdata("id");
        $this->db->where('sub_branchid',$id);
        $dt = $this->db->get('demand_list');
    }

  $data['activeList']=$dt;
  $data['pageTitle'] = 'Subscriber Other Demand List ';
  $data['smallTitle'] = 'Subscriber Other Demand List';
  $data['mainPage'] = 'Subscriber Other Demand List';
  $data['subPage'] = 'Subscriber Other Demand List';
  $data['title'] = 'Subscriber Other Demand List';
  $data['headerCss'] = 'headerCss/stockCss';
  $data['footerJs'] = 'footerJs/stockJs';
  $data['mainContent'] = 'Subscriber/subscriberOtherDemandList';
  $this->load->view("includes/mainContent", $data);

}
 function showfavlist(){
 	 $custuname = $this->uri->segment(3);
 	 $dt= $this->subscriber->checkjoinerid($custuname);
 $data['activeList']=$dt; 
 $data['pageTitle'] = 'Subscriber Favourite List ';
  $data['smallTitle'] = 'Subscriber Favourite List';
  $data['mainPage'] = 'Subscriber Favourite List';
  $data['subPage'] = 'Subscriber Favourite List';
  $data['title'] = 'Subscriber Favourite List';
  $data['headerCss'] = 'headerCss/stockCss';
  $data['footerJs'] = 'footerJs/stockJs';
  $data['mainContent'] = 'Subscriber/subscriberFavouriteList';
  $this->load->view("includes/mainContent", $data);
 }
 function subsciberActiveList(){
 $dt = $this->subscriber->getActiveListAd();
 $data['activeList']=$dt;
 $data['pageTitle'] = 'Subscriber Active List ';
  $data['smallTitle'] = 'Subscriber Active List';
  $data['mainPage'] = 'Subscriber Active List';
  $data['subPage'] = 'Subscriber Active List';
  $data['title'] = 'Subscriber Active List';
  $data['headerCss'] = 'headerCss/stockCss';
  $data['footerJs'] = 'footerJs/stockJs';
  $data['mainContent'] = 'Subscriber/subsciberActiveList';
  $this->load->view("includes/mainContent", $data);
 }
//  function subsciberInactiveList(){
//  	$dt = $this->subscriber->getinActiveList();
// 	$data['activeList']=$dt;
//  	$data['pageTitle'] = 'Subscriber Inactive List ';
//   $data['smallTitle'] = 'Subscriber Inactive List';
//   $data['mainPage'] = 'Subscriber Inactive List';
//   $data['subPage'] = 'Subscriber Inactive List';
//   $data['title'] = 'Subscriber Inactive List';
//   $data['headerCss'] = 'headerCss/branchListCss';
//   $data['footerJs'] = 'footerJs/subscriberListJs';
//   $data['mainContent'] = 'Subscriber/subsciberInactiveList';
//   $this->load->view("includes/mainContent", $data);
//  }

function getsubbranch() {
	$tid = $this->input->post("classv");
    $this->db->where("district",$tid);
$var=$this->db->get("sub_branch");
		if($var->num_rows() > 0){
		?>
<option value="">-Select Sub Branch-</option>
<?php
			foreach ($var->result() as $row)
			{?>
<option value="<?php echo $row->id;?>" class="text-uppercase"><?php echo $row->bname;?></option>
<?php }
		}
}
function subscActiveList(){
    $dt = $this->subscriber->getinActiveList();
	$data['activeList']=$dt;
 	$data['pageTitle'] = 'Subscriber Active List ';
  $data['smallTitle'] = 'Subscriber Active List';
  $data['mainPage'] = 'Subscriber Active List';
  $data['subPage'] = 'Subscriber Active List';
  $data['title'] = 'Subscriber Active List';
  $data['headerCss'] = 'headerCss/stockCss';
  $data['footerJs'] = 'footerJs/stockJs';
  $data['mainContent'] = 'Subscriber/subscActiveList';
  $this->load->view("includes/mainContent", $data);
}
function perSubscriber(){
    $dt = $this->subscriber->persubscriber();
	$data['activeList']=$dt;
 	$data['pageTitle'] = 'Subscriber Permanent Subscriber List ';
  $data['smallTitle'] = 'Subscriber Permanent Subscriber List';
  $data['mainPage'] = 'Subscriber Permanent Subscriber List';
  $data['subPage'] = 'Subscriber Permanent Subscriber List';
  $data['title'] = 'Subscriber Permanent Subscriber List';
  $data['headerCss'] = 'headerCss/branchListCss';
  $data['footerJs'] = 'footerJs/subscriberListJs';
  $data['mainContent'] = 'Subscriber/perSubscriber';
  $this->load->view("includes/mainContent", $data);
}
function tempSubscriber(){
     $dt = $this->subscriber->tempsubscriber();
	$data['activeList']=$dt;
 	$data['pageTitle'] = 'Subscriber Temporary Subscriber List ';
  $data['smallTitle'] = 'Subscriber Temporary Subscriber List';
  $data['mainPage'] = 'Subscriber Temporary Subscriber List';
  $data['subPage'] = 'Subscriber Temporary Subscriber List';
  $data['title'] = 'Subscriber Temporary Subscriber List';
  $data['headerCss'] = 'headerCss/branchListCss';
  $data['footerJs'] = 'footerJs/subscriberListJs';
  $data['mainContent'] = 'Subscriber/tempSubscriber';
  $this->load->view("includes/mainContent", $data);
}
//////customer activation code start
  public function active_customer(){
          $unm= $this->uri->segment(3);
          $this->db->where("username",$unm);
          $row=$this->db->get("customers")->row();
         $status= $row->status;
         $tstatus=$row->tstatus;
         $pstatus=$row->pstatus;
         if($status==0){
         if($status==0 && $tstatus==1){
          $value['status']="1";
          $this->db->where("cust_id",$row->id);
          $row1=$this->db->get("register_pv");
          if($row1->num_rows()>0) {}
          else{
               $pvdata['cust_id']=$row->id;
                $pvdata['pv']=1000.00;
             $dt1=$this->db->insert("register_pv",$pvdata);
           if($dt1) {
           $sender = $this->db->get("sms_setting")->row();
             $sende_Detail =$sender;
             $msg = "Congratulation Dear ".$row->name." Your Account has been Activated Successfully and 1000 PV has been added in your Account.";
             $mobile =	$row->mobile;
             $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
            sms($mobile,$msg);
             }
            }
               $this->db->where('cid',$row->ao);
               $ao1=$this->db->get('pv');
               if($ao1->num_rows()>0){
                  $custao= $ao1->row();
                  $balan=array(
                      'pv'=>$custao->pv+150.00,
                      );
                     $this->db->where('cid',$row->ao);
              $ao=$this->db->update('pv',$balan);
              $this->db->where('username', $row->ao);
              $aorow=$this->db->get('customers')->row();
                $message="Congratulation Dear ".$aorow->name." One person ".$row->name." is added by your advising So you got  150 PV Cashback and Joiner id of this Person is ".$row->username." ";
                  $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                     sms($aorow->mobile);
              } }
              else{
                  $this->db->where('emp_id',$row->ao);
              $ao1=$this->db->get('emp_pv');
              if($ao1->num_rows()>0){
                  $empao= $ao1->row();
                  $balan=array(
                      'pv'=>$empao->pv+150.00,
                      );
                     $this->db->where('emp_id',$row->ao);
              $ao=$this->db->update('emp_pv',$balan);
                $this->db->where('username',$row->ao);
              $aorow=$this->db->get('employee')->row();
                $message="Congratulation Dear ".$aorow->name." One person ".$row->name." is added by your advising So you got 150PV Cashback after Activating Subscriber and Joiner id of this Person is ".$row->username." ";
                     $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                     sms($aorow->mobile,$message);
              } } else{
                  echo "Employee Id Not Found";
              }    
              }
              $this->db->where("username",$unm);
            $dt=$this->db->update("customers",$value);?>
           ?><script >alert("Subscriber  Activated Successfully.");</script><?php
            redirect("subscriberController/subscActiveList/","refresh");
          }
            $sender = $this->db->get("sms_setting")->row();
             $sende_Detail =$sender;
             $ao=$row->ao;
            $this->db->where('username',$ao);
            $cusao=$this->db->get('customers');
            if($cusao->num_rows()>0) {
                $cuname=$cusao->row()->name;
                $mob=$cusao->row()->mobile;
                $message="Dear Advising Officer ".$cuname." the Registration of your advising Subscriber ".$row->name." has been Activated Succesfully So 150 PV has been added in your Account.";
                 $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                sms($mob,$message); 
             }
                $mm=$row->mobile;
                $unme=$row->name;
                 $msge="Dear Subscriber ".$unme." your Subscriber ".$row->name." has been Succesfully Added in your tree.";
                   $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mm,$msge);
             }
            ?><script >alert("Subscriber  Activated Successfully.");</script><?php
                redirect("subscriberController/customer_Inactive/","refresh");
            }
              $this->db->where('username',$ao);
            $emp=$this->db->get('employee');
            if($emp->num_rows()>0) {
                $emp=$emp->row()->name;
                $mob=$emp->row()->mobile;
                $message="Dear Advising Officer ".$emp." the Registration of your advising Subscriber ".$row->name." has been Activated Succesfully. So 150 PV has been added in your Account.";
                 $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mob,$message); }
            $mm=$row->mobile;
                $unme=$row->name;
                 $msge="Dear Subscriber ".$unme." your Subscriber ".$row->name." has been Succesfully Added in your tree.";
                   $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mm,$msge); }
            ?><script >alert("Subscriber  Activated Successfully.");</script><?php
                redirect("subscriberController/customer_list/","refresh");
            }
         } 
         elseif($status==0 && $pstatus==1){
                 $value['status']="1";
                  $this->db->where("username",$unm);
                  $dt=$this->db->update("customers",$value);
             if($dt){
              $sender_Detail = $this->db->get("sms_setting")->row();
             $ao=$row->ao;
            $this->db->where('username',$row->username);
            $cusao=$this->db->get('customers');
            if($cusao->num_rows()>0) {   
                $cuname=$cusao->row()->name;
                $mob=$cusao->row()->mobile;
                $message="Dear Advising Officer ".$cuname." the Registration of your advising Subscriber ".$row->name." has been Activated Succesfully So 150 PV has been added in your Account.";
                  $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mob,$message); }
                  $this->db->where('id',$row->parentID);
            $pid=$this->db->get('customers');
                $mm=$row->mobile;
                $unme=$row->name;
                 $msge="Dear Subscriber ".$unme." your Subscriber ".$row->name." has been Succesfully Added in your tree.";
                   $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mm,$msge);
             }
                 ?><script >alert("Subscriber  Activated Successfully.");</script><?php
            redirect("subscriberController/customer_Inactive/","refresh");
            }
              $this->db->where('username',$ao);
            $emp=$this->db->get('employee');
            if($emp->num_rows()>0){
                $emp=$emp->row()->name;
                $mob=$emp->row()->mobile;
                $message="Dear Advising Officer ".$emp." the Registration of your advising Subscriber ".$row->name." has been Activated Succesfully. So 150 PV has been added in your Account.";
                  $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mob,$message);
             }
                $mm=$row->mobile;
                $unme=$row->name;
                 $msge="Dear Subscriber ".$unme." your Subscriber ".$row->name." has been Succesfully Added in your tree.";
                   $smsdt=$this->db->get("sms")->row();
             if($smsdt->active==1){
                 sms($mm,$msge);
             }
                 ?><script >alert("Subscriber Activated Successfully.");</script><?php
            redirect("subscriberController/customer_Inactive/","refresh");
            }  
             } else{
                echo "something going wrong plz try agian later;" ;
             }
            } 
         }
            else{
              $value['status']="0";

              $this->db->where("username",$unm);
              $dt=$this->db->update("customers",$value);
                 if($dt){
                    ?><script >alert("Subscriber  Inactivated Successfully.");</script><?php
                    redirect("subscriberController/subscActiveList/","refresh");
                 }
                 else{
                    echo "something going wrong plz try agian later;" ;
                 }
            }
            ?><script >alert("Subscriber  activated Successfully.");</script><?php
                    redirect("subscriberController/subscActiveList/","refresh");

        }


}


