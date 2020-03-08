<?php
class dayBookControllers extends CI_Controller
{
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
	
	function fullDetail(){
		$expenditure_name = $this->uri->segment(3);
		 	$date1 = $this->uri->segment(4);
		 	$date2 = $this->uri->segment(5);
		 	
		 	$this->load->model("daybookModel");
		 	$da=$this->daybookModel->fulldetail($expenditure_name,$date1,$date2);
		 	$data['request']=$da->result();
		 	$data['pageTitle'] = 'Expenditure Report';
		 	$data['smallTitle'] = 'Expenditure Report';
		 	$data['mainPage'] = 'Expenditure';
		 	$data['subPage'] = 'Expenditure Report';
		 	$data['title'] = 'Expenditure Report';
		 	$data['headerCss'] = 'headerCss/feeCss';
		 	$data['footerJs'] = 'footerJs/feeJs';
		 	$data['mainContent'] = 'daybookcashper';
		 	$this->load->view("includes/mainContent", $data);
		 
	}
	
	function deleteCashPay(){
	    $school_code = $this->session->userdata("school_code");
		$di = $this->uri->segment(3);
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->where("receipt_no",$di);
		$this->db->delete("cash_payment");
		
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->where("invoice_no",$di);
		$drowd = $this->db->get("day_book")->row();
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND school_code='$school_code'")->row();
		$balance = $op1->closing_balance;
		$close1 = $balance + $drowd->amount;
		$bal = array(
				"closing_balance" => $close1
		);
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$this->db->update("opening_closing_balance",$bal);
		$dayBook = array(
				"paid_to" =>"Return",
				"paid_by" =>$this->session->userdata("username"),
				"reason" => "Wrong by Admin",
				"dabit_cradit" => 1,
				"amount" => $drowd->amount,
				"closing_balance" => $close1,
				"pay_date" => date('Y-m-d'),
				"pay_mode" => "wrong Cash by Admin",
				"school_code"=>$this->session->userdata("school_code")
		);
		$this->db->insert("day_book",$dayBook);
		
		$date1 = $this->uri->segment(4);
		$date2 = $this->uri->segment(5);
		$exname = $this->uri->segment(6);
		redirect("index.php/dayBookControllers/fullDetail/$exname/$date1/$date2");
	}
function daybook()
	{
	    $b=0;
		$school_code = $this->session->userdata("school_code");
		$condition  = $this->input->post("value1");
		$dt1        = $this->input->post("st_date");
		$dt2        = $this->input->post("end_date");
		$q          = $this->input->post("check_list");
		if($q=='Cash Payment'){
			$a = $this->db->query("select DISTINCT expenditure_name from cash_payment where date >= '$dt1' AND date <= '$dt2' AND school_code='$school_code'");
			
			$b = $a->num_rows();
			
			$dabit = 0;
			$cradit = 0;
			if($b > 0){
			    //	echo "rahul";
				$data['dt1']=$dt1;
				$data['dt2']=$dt2;
				$data['pageTitle'] = 'Day Book Report';
				$data['smallTitle'] = 'Day Book Report';
				$data['mainPage'] = 'Configuration';
				$data['subPage'] = 'Class, Section, Subject Stream';
				$data['condition'] = $condition;
				
				$this->load->model("configureClassModel");
				$result = $this->configureClassModel->getClassList();
				$data['classList'] = $result->result();
				$data['title'] = 'Configure Class/Section';
				$data['headerCss'] = 'headerCss/daybookCss';
				$data['footerJs'] = 'footerJs/daybookJs';
				$data['mainContent'] = 'dayBookcash';
				$data['a']=$a;
				$data['b']=$b;
				$data['dabit']=0;
				$data['cradit']=0;
				
				$this->load->view("includes/mainContent", $data);
			}
			else{
			    redirect("index.php/login/dayBook/9");
			}
		}
	
// 			if($b > 0){
// 				$data['dt1']=$dt1;
// 				$data['dt2']=$dt2;
// 				$data['pageTitle'] = 'Day Book Report';
// 				$data['smallTitle'] = 'Day Book Report';
// 				$data['mainPage'] = 'Configuration';
// 				$data['subPage'] = 'Class, Section, Subject Stream';
// 				$data['condition'] = $condition;
// 				$this->load->model("configureClassModel");
// 				$result = $this->configureClassModel->getClassList();
// 				$data['classList'] = $result->result();
// 				$data['title'] = 'Configure Class/Section';
// 				$data['headerCss'] = 'headerCss/daybookCss';
// 				$data['footerJs'] = 'footerJs/daybookJs';
// 				$data['mainContent'] = 'dayBook3';
// 				$data['feeDetail'] = $feeData;
// 				$data['a']=$a;
// 				$data['b']=$b;
// 				$data['dabit']=0;
// 				$data['cradit']=0;
// 				$this->load->view("includes/mainContent", $data);
// 			}
		
		if($q=='all'){
			$school_code = $this->session->userdata("school_code");
			$a = mysqli_query($this->db->conn_id,"select * from day_book where Date(pay_date) >= '$dt1' AND Date(pay_date) <= '$dt2'");
			$b = mysqli_num_rows($a);
			$dabit = 0;
			$cradit =0;
			if($b > 0){
				$data['dt1']=$dt1;
				$data['dt2']=$dt2;
				$data['pageTitle'] = 'Day Book Report';
				$data['smallTitle'] = 'Day Book Report';
				$data['mainPage'] = 'Configuration';
				$data['subPage'] = 'Class, Section, Subject Stream';
				$data['condition'] = $condition;
				$data['title'] = 'Configure Class/Section';
				$data['headerCss'] = 'headerCss/daybookCss';
				$data['footerJs'] = 'footerJs/daybookJs';
				$data['mainContent'] = 'dayBook2';
				$data['a']=$a;
				$data['b']=$b;
				$data['dabit']=0;
				$data['cradit']=0;
				$this->load->view("includes/mainContent", $data);
			}
			else
				redirect("index.php/login/dayBook/9");
		}
		
	}
	
	
	function checkBalance(){
	    $user = $this->session->userdata("username");
	  
		$scholer_no = $this->input->post('q1');

		$balance1 = $this->db->query("select closing_balance from opening_closing_balance where DATE(opening_date) = '".date('Y-m-d')."' AND login_username = '$user'")->row();
	
		$balance = $balance1->closing_balance;
		if($balance < $scholer_no){
			echo '<font color="#FF0000">There is not enough avilable. Avl bal : Rs.'.$balance.'/-</font>';
		}
		else{
			echo '<font color="#006600">Avilable bal : Rs.'.$balance.'/-</font>';
		}
	}
	function checkBalance1(){
	    $school_code = $this->session->userdata("school_code");
		$scholer_no = $this->input->post('q1');

		$balance1 = $this->db->query("select closing_balance from opening_closing_balance where DATE(opening_date) = '".date('Y-m-d')."' AND school_code='$school_code'")->row();
		// 	$this->db->where("DATE(opening_date)","2019-03-11");
		// 	$this->db->where("school_code",1);
		//	$balance1 =$this->db->get("opening_closing_balance")->row();
		$balance = $balance1->closing_balance;
		if($balance < $scholer_no){
			echo '<font color="#FF0000">There is not enough avilable. Avl bal : Rs.'.$balance.'/-</font>';
		}
		else{
			echo '<font color="#006600">Avilable bal : Rs.'.$balance.'/-</font>';
		}
	}
	function checkBalance3(){
	    $school_code = $this->session->userdata("school_code");
		$scholer_no = $this->input->post('q1');

		$balance1 = $this->db->query("select closing_balance from opening_closing_balance where DATE(opening_date) = '".date('Y-m-d')."' AND school_code='$school_code'")->row();
		// 	$this->db->where("DATE(opening_date)","2019-03-11");
		// 	$this->db->where("school_code",1);
		//	$balance1 =$this->db->get("opening_closing_balance")->row();
		$balance = $balance1->closing_balance;
		if($balance < $scholer_no){
			echo '<font color="#FF0000">There is not enough avilable. Avl bal : Rs.'.$balance.'/-</font>';
		}
		else{
			echo '<font color="#006600">Avilable bal : Rs.'.$balance.'/-</font>';
		}
	}
	function empValidId(){
		$school_code = $this->session->userdata("school_code");
		$stu_id = $this->input->post('q1');
		$streem1 = $this->db->query("select * from employee_info where username='$stu_id' AND school_code='$school_code' ");
		$no = $streem1->num_rows();
		if($no > 0){ 
			$streem = $streem1->row(); ?>
			<table>
		    	<tr>
		        	<td><font color="#006600"><?php echo $streem->name; ?></font></td>
		        </tr>
		    </table>
		<?php 
		}
		else{
		?><font color="#FF0000">Wrong Employee Id</font><?php
		}
	}
	
	function cashPaymentDb(){
	    $this->load->model("smsmodel");
		$this->load->helper("sms");
	    $paydate=$this->input->post('paydate');
        $expenditure=$this->input->post('expenditure');
        $expenditurer=$this->input->post('expenditurer');
		$id_name = $this->input->post('id_name');
		$emp_id = $this->input->post('emp_id');
		$name = $this->input->post('name');
		$phone_no = $this->input->post('phone_no');
		$reason = $this->input->post('reason');
		$amount = $this->input->post('amount');
		$date = $this->input->post('paydate');
		
		// Calculat and update Invoice serial start
		
		$invoice12 = $this->db->count_all("day_book");
	//	$num1=$num1+1000;
		$invoice1=6000+$invoice12+1;
		$num1 = $school_code."I".$invoice1;
	
		if($id_name == 'other'):
			$nm = $name;
		else:
			$nm = $emp_id;
		endif;
		$user = $this->session->userdata("username");
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username='$user'")->row();
		$balance = $op1->closing_balance;
		
		$close1 = $balance - $amount;
			$bal = array(
				"closing_balance" => $close1
			);
			$this->db->where("login_username",$user);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
			
			$cashPayment = array(
					"expenditure_name"=>$expenditure,
					"exp_depart"=>$expenditurer,
					"id_name" =>$id_name,
					"valid_id" =>$emp_id,
					"name" => $name,
					"phone_no" => $phone_no,
					"reason" => $reason,
					"amount" => $amount,
					"date" => $paydate,
					"receipt_no" => $num1,
					"username"=>$user
			);
			
			$dayBook = array(
					"paid_to" =>$nm,
					"paid_by" =>$this->session->userdata("username"),
					"reason" => $reason,
					"dabit_cradit" => 0,
					"amount" => $amount,
					"closing_balance" => $close1,
					"pay_date" => date('Y-m-d'),
					"pay_mode" => "Cash",
					"invoice_no"=>$num1,
				
			);
			
			if($this->db->insert('cash_payment',$cashPayment) && $this->db->insert('day_book',$dayBook)):
			    
	     
		//	$msg = "Dear Sir/Ma'am ".$nm.", Cash Amount Rs " . $amount . "/- expend by .$user. for expenditure " . $expenditure . " from your Account.";
		//	sms($mobile->mobile_no,$msg);
		
				redirect("shopController/cashPayment/cash");
			else:
				echo "Please Try After Sometimes";
			endif;
		
	}
	
	function invoiceCashPayment(){
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Cash Payment';
		$data['mainPage'] = 'Cash Payment';
		$data['subPage'] = 'Cash Invoice';
		
		$data['title'] = 'Accounts Cash Payment';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/transactionJs';
		$data['mainContent'] = 'invoiceCashPayment';
		$this->load->view("includes/mainContent", $data);
	}
	
	function bankTransactionDb(){
		$id_name = $this->input->post('id_name');
		$bank_name = $this->input->post('bank_name');
		$account_no = $this->input->post('account_no');
		$amount = $this->input->post('amount');
		$chequeTran_no = $this->input->post('chequeTranNum');
		$remark = $this->input->post('remark');
		$date = date('Y-m-d');
		$school_code=$this->session->userdata('school_code');
		$num11 = $this->db->count_all("invoice_serial");
		$n1=1000+$num11;
		$num1 = $school_code."I".$n1;
		$invoice = array(
				"invoice_no" =>$num1,
				"reason" => "Bank Transaction",
				"invoice_date" => date('Y-m-d'),
				"school_code"=>$this->session->userdata("school_code")
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND school_code='$school_code'")->row();
		$balance = $op1->closing_balance;
		
		if($id_name == 'deposite')
		{
			
			if($balance < $amount){
				redirect("login/cashPayment/bank/balanceFalse");
			}
			else{
				$close1 = $balance - $amount;
				$bal = array(
					"closing_balance" => $close1
				);
				$this->db->where("school_code",$this->session->userdata("school_code"));
				$this->db->where("opening_date",date('Y-m-d'));
				$this->db->update("opening_closing_balance",$bal);
				
				$cashPayment = array(
					"id_name" =>$id_name,
					"bank_name" =>$bank_name,
					"account_no" => $account_no,
					"amount" => $amount,
					"date" => date('Y-m-d'),
					"receipt_no" => $num1,
					"chequeTran_no"=>$chequeTran_no,
					"remark"=>$remark,
						"school_code"=>$this->session->userdata("school_code")
				);
				
				$dayBook = array(
						"paid_to" =>$id_name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Diposit To Bank",
						"dabit_cradit" => "Debit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"invoice_no" => $num1,
						"pay_mode" => "Cash",
						"school_code"=>$this->session->userdata("school_code")
				);
				
				if($this->db->insert('bank_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
					redirect("index.php/login/cashPayment/bank/bankTrue");
				else:
					redirect("index.php/login/cashPayment/bank/bankFalse");
				endif;
			}
		}
		elseif($id_name == 'receive'){
			$close1 = $balance + $amount;
				$bal = array(
					"closing_balance" => $close1
						
				);
				$this->db->where("school_code",$this->session->userdata("school_code"));
				$this->db->where("opening_date",date('Y-m-d'));
				$this->db->update("opening_closing_balance",$bal);
				
				$cashPayment = array(
					"id_name" =>$id_name,
					"bank_name" =>$bank_name,
					"account_no" => $account_no,
					"amount" => $amount,
					"date" => date('Y-m-d'),
					"receipt_no" => $num1,
					"chequeTran_no"=>$chequeTran_no,
					"remark"=>$remark,
						"school_code"=>$this->session->userdata("school_code")
				);
				
				$dayBook = array(
						"paid_to" =>$id_name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Receive From Bank",
						"dabit_cradit" => "Credit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"invoice_no" => $num1,
						"pay_mode" => "Cash",
						"school_code"=>$this->session->userdata("school_code")
				);
				
				if($this->db->insert('bank_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
					redirect("index.php/login/cashPayment/bankTrue");
				else:
					redirect("index.php/login/cashPayment/bankFalse");
				endif;
		}
	}
	function expenditure_depart(){
		$expenditure_name = $this->input->post("expenditure_name");
		
		$this->db->where("expenditure_name",$expenditure_name);
		$rt = $this->db->get("expenditure");
		?> 
		
		<option value="">-Department-</option>
		<?php 
		if($rt->num_rows()>0){
			foreach($rt->result() as $row):
			?>  <option value="<?php echo $row->exp_depart;?>"><?php echo $row->exp_depart;?> </option>
			 <?php  endforeach;}
			
		
	}
	function directorTransaction(){
		$action_transaction = $this->input->post('action_transaction');
		$amount = $this->input->post('amount');
		$name = $this->input->post('name');
		$disc = $this->input->post('disc');
		$date = date('Y-m-d');
		$this->db->where("school_code",$this->session->userdata("school_code"));
		$num1 = $this->db->count_all("invoice_serial");
		$num1=$num1+1000;
		$invoice = array(
				"invoice_no" =>$num1,
				"reason" => "Director Transaction",
				"invoice_date" => date('Y-m-d'),
				"school_code"=>$this->session->userdata("school_code")
		);
		$this->db->insert("invoice_serial",$invoice);
       $school_code=$this->session->userdata("school_code");
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where  opening_date='".date('Y-m-d')."' AND school_code='$school_code'")->row();
		$balance = $op1->closing_balance;
		
				
		
		
			if($action_transaction == 'Diposited'):
			if($balance < $amount){
				redirect("login/cashPayment/director/balanceFalse");
			}
				$close1 = $balance - $amount;
				$cashPayment = array(
						"transaction_mode" =>"Cash Diposit",
						"action" =>$action_transaction,
						"applicant_name" => $name,
						"amount" => $amount,
						"reason"=>$disc,
						"date" => date('Y-m-d'),
						"receipt_no" => $num1,
						"school_code"=>$this->session->userdata("school_code")
				);
				$dayBook = array(
						"paid_to" =>$name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Diposti to Director",
						"dabit_cradit" => "Debit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"invoice_no" => $num1, 
						"pay_mode" => "Cash",
						"school_code"=>$this->session->userdata("school_code")
				);
			else:
				$close1 = $balance + $amount;
				$cashPayment = array(
						"transaction_mode" =>"Cash Recieve",
						"action" =>$action_transaction,
						"applicant_name" => $name,
						"amount" => $amount,
						"reason"=>$disc,
						"date" => date('Y-m-d'),
						"receipt_no" => $num1,
						"school_code"=>$this->session->userdata("school_code")
				);
				$dayBook = array(
						"paid_to" =>$name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Recieve From Director",
						"dabit_cradit" => "Credit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"invoice_no" => $num1,
						"pay_mode" => "Cash",
						"school_code"=>$this->session->userdata("school_code")
				);
			endif;
			$bal = array(
					"closing_balance" => $close1
			);
			$this->db->where("school_code",$this->session->userdata("school_code"));
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
	
					
			if($this->db->insert('director_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
			redirect("index.php/login/cashPayment/director/directorTrue");
			else:
			redirect("index.php/login/cashPayment/director/directorFalse");
			endif;
		
	}
	
	function transactionDetail(){		
		$seg3 = $this->uri->segment(3);
		$seg4 = $this->uri->segment(4);
		
		$data['pageTitle'] = 'Transaction Detail';
		if(($seg3 == "bank") && ($seg4 == "deposit")):
			$data['smallTitle'] = 'Bank Deposit';
			$data['mainPage'] = 'Bank Transation';
			$data['subPage'] = 'Bank Deposit Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "bank") && ($seg4 == "withdrwal")):
			$data['smallTitle'] = 'Bank Withdrwal';
			$data['mainPage'] = 'Bank Transation';
			$data['subPage'] = 'Bank Withdrwal Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "director") && ($seg4 == "deposit")):
			$data['smallTitle'] = 'Withdrwal from Director';
			$data['mainPage'] = 'Withdrwal from Director';
			$data['subPage'] = 'Withdrwal from Director Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "director") && ($seg4 == "withdrwal")):
			$data['smallTitle'] = 'Received from Director';
			$data['mainPage'] = 'Received from Director';
			$data['subPage'] = 'Received from Director Detail';
			$data['title'] = 'Transaction Detail';
		endif;
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/daybookJs';
		$data['mainContent'] = 'transactionDetail';
		$this->load->view("includes/mainContent", $data);
	}

}

