<?php
class shopController extends CI_Controller{
    
    	public function __construct(){
		parent::__construct();
			$this->is_login();
			$this->load->model('shop');
			$this->load->model('branch');
			$this->load->model('subscriber');
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		if(!$is_login){
			redirect("index.php/homeController/index");
		}
		else{
			
			if($this->session->userdata("login_type")>4)
			{
				redirect("index.php/homeController/index");
			}
		}
	}
	
	function insertLock(){
	   
	   $data['lock_no']= $this->input->post("lock_no");
	     $data['password']= $this->input->post("Password");
	      $data['status']= $this->input->post("lstatus");
	      $data['updare_date']= date("Y-m-d");
	      $this->db->where("lock_no",$this->input->post("lock_no"));
	      $oldl = $this->db->get("lock_master");
	      if($oldl->num_rows()<1){
	      if($this->db->insert("lock_master",$data)){
	          redirect(base_url()."index.php/shopController/lockManage/success");
	      }else{
	          echo "Error";
	      }}
	      else{
	         
	         echo  'you can not create two lock with same number.||||';
	  //redirect(base_url()."index.php/adminController/lockManage");
	   }
	      
	}
	
		function sborder(){
		   $ub =  $this->uri->segment(3);
		   if($ub=='a'){
		        $subbid =array();
	      $getallb = $this->db->get("branch");
	     $f=0; foreach($getallb->result() as $bid):
	          $subbidb[$f]=$bid->id;
	        $f++;  
	        endforeach;
	         $this->db->where_in("district",$subbidb);
	     $bres =  $this->db->get("sub_branch");
	        foreach($bres->result() as $bd):
	            
	       
	     $f++; endforeach;
	     $data['shopid']=$subbid;
	      $msg="By Branch";
	        }else{ 
	            if($ub=='b')
	            {
		        $subbid =array();
	      $this->db->where("district",$this->session->userdata('id'));
	     $bres =  $this->db->get("sub_branch");
	     $f=0; foreach($bres->result() as $bd):
	       $this->db->where("id",$bd->id);
	          $subde =   $this->db->get("sub_branch")->row();
	          $this->db->where("reciver_usernm",$subde->username);
	          $this->db->where("status",0);
	          $this->db->where("sender_usernm",$this->session->userdata("username"));
	        $checkold =   $this->db->get("product_trans_detail");
	        if($checkold->num_rows()>0){
	            
	        }else{
	          $subbid[$f]=$bd->id;
	        }
	         
	     $f++; endforeach;
	      $data['branchid'] = $this->session->userdata('id');
	     $data['shopid']=$subbid;
	      $msg="of Shop";
	     
		   }else{
		      
		  $data['shopid']=  $this->session->userdata("id");
		       
		   $msg="By Subscriber";
		   }}
		   $data['msg']=$msg;
		   $data['ub']=$ub;
		  
		  $data['shopname']=  $this->session->userdata("your_school_name");
		$data['pageTitle'] = 'Over All Demand '.$msg;
		$data['smallTitle'] = 'All Demand '.$msg;
		$data['mainPage'] = 'All Demand '.$msg;
		$data['subPage'] = 'All Demand '.$msg;
		$data['title'] = 'All Demand '.$msg;
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/sborder';
		$this->load->view("includes/mainContent", $data);
	
	}
	
	function avaofb(){
	     $subbid =array();
	      $this->db->where("district",$this->session->userdata('id'));
	     $bres =  $this->db->get("sub_branch");
	     $f=0; 
	          $this->db->distinct();
	          $this->db->select("reciver_usernm");
	          $this->db->where("status",0);
	          $this->db->where("sender_usernm",$this->session->userdata("username"));
	        $checkold =   $this->db->get("product_trans_detail");
	        $data["shopusername"]=$checkold ;
	        $data['pageTitle'] = 'Branch Confirm Order';
		$data['smallTitle'] = 'Order Confirmed by Branch';
		$data['mainPage'] = 'Sent Order By Branch';
		$data['subPage'] = 'Ordet Confirm to Shop';
		$data['title'] = 'Order list';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'avaofb';
		$this->load->view("includes/mainContent", $data);
	       
	}
	
	function delLock(){
	   $lid =  $this->uri->segment("3");
	   $this->db->where("id",$lid);
	   if($this->db->delete("lock_master")){
	      redirect(base_url()."index.php/shopController/lockManage/success");
	      }else{
	          echo "Error";
	      }
	   
	}
	function updateLock(){
	   $lockid =  $this->input->post("lockid");
	   $data['lock_no']= $this->input->post("lock_no");
	     $data['password']= $this->input->post("Password");
	      $data['status']= $this->input->post("lstatus");
	      $data['updare_date']= date("Y-m-d");
	      $this->db->where("id",$lockid);
	     if($this->db->update("lock_master",$data)){
	          redirect(base_url()."index.php/shopController/lockManage/success");
	     }else{
	         echo "error";
	     }
	}
	
	
	function lockManage(){
	     if($this->uri->segment("3")){
	     $data["uriv"]=  $this->uri->segment("3");
	    }else{
	        $data["uriv"]=0;
	    }
	    $data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Admin Lcok Management';
		$data['mainPage'] = 'Admin Lock Management';
		$data['subPage'] = 'Edit or Lock';
		$data['title'] = 'Admin Lock Manage';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'lockManage';
		$this->load->view("includes/mainContent", $data);
	}
	
	function availableOrderList(){
	   $vo =  $this->uri->segment(3);
	  $type =  $this->uri->segment(4);
	 $subid=$this->session->userdata('id'); 
	  $data1['type']=$type;
	  if($type=='a'){
	     
	    if($vo==1){
	        $msg="Available Demand By Branch";
	    }else{
	        $msg="Demand By Branch";
	    }
	    $branch = $this->db->get("branch");
	    $bad=array();
	   $i=0; 
	   if($branch->num_rows()>0){
	   foreach($branch->result() as $br):
	        $bad[$i] = $br->id;
	        endforeach;
	   $data1['bid']=$bad;
	    $data1['pageTitle'] =  $msg.'';
		$data1['smallTitle'] = $msg;
		$data1['mainPage'] = $msg.'';
		$data1['subPage'] = $msg;
		$data1['title'] = $msg;
		$data1['headerCss'] = 'headerCss/sublistCss';
		$data1['footerJs'] = 'footerJs/sublistJs';
		$data1['mainContent'] = 'Shop/avilableOrderbyspList';
		$this->load->view("includes/mainContent", $data1);
	   }else{
	       echo "no Branch";
	   }
	      
	  }else{ if($type=='b'){
	     
	    $this->session->userdata("id");
	    if($vo==1){
	        $msg="Available Demand By Shop";
	    }else{
	        $msg="Demand By Shop";
	    }
	    
	   $data1['bid']=$this->session->userdata('id');
	    $data1['pageTitle'] =  $msg.'';
		$data1['smallTitle'] = $msg;
		$data1['mainPage'] = $msg.'';
		$data1['subPage'] = $msg;
		$data1['title'] = $msg;
		$data1['headerCss'] = 'headerCss/sublistCss';
		$data1['footerJs'] = 'footerJs/sublistJs';
		$data1['mainContent'] = 'Shop/avilableOrderbyspList';
		$this->load->view("includes/mainContent", $data1);
	     
	  }
	  else{
	      $subid=$this->session->userdata('id'); 
	      
	      if($vo!=3){
	    
	     $avaible = array();
                           $product = array();
                            $notavai = array();
                            $this->db->where('status',0);
                          
                                $this->db->where('sub_branchid',$subid);
                          
                       
                        $dt= $this->db->get("order_serial");
                        // print_r($dt);
                        if($dt->num_rows()>0){
                         $k=0; $jo=0;  foreach($dt->result() as $ty):
                          $ty->order_no;
                            $this->db->where("order_no",$ty->order_no);
                           $getod = $this->db->get("order_detail");
                            $i=0; $l=0;
                            if($getod->num_rows()>0){
                               foreach($getod->result() as $gt):
                                   $aqu =0;
                                            
                                            
                                                         $this->db->select("rec_quantity");
                                                        $this->db->select("sale_quantity");
                                                         $this->db->where("subbranch_id",$subid);
                                                  
                                           $this->db->where("p_code",$gt->p_code);
                                           $pdetails =  $this->db->get("subbranch_wallet");
                                           if($pdetails->num_rows()>0){
                                               $aqu = $pdetails->row()->rec_quantity-$pdetails->row()->sale_quantity;
                                           }
                                           else{
                                               $aqu=0;
                                           }
                                           if($aqu < $gt->quantity){
                                                $arv1='product'.$k.$l;
                                              $product[$arv1]=$gt->p_code;
                                               // $narv='naorder'.$k;
                                             $notavai[$jo] = $gt->order_no;
                                             $l++;   $i++;
                                           }else{
                                              
                                           }
                                    endforeach;  $jo++;
                                   
                            } 
                             if($i < 1 ){
                                             // $arv='order'.$k;
                                               $avaible[$k] = $ty->order_no;
                                               $k++;
                                               }
                            endforeach;
                        }else{
                            
                        }
                     if($vo ==1)  {
                         $msg = "Available Order List";
                          $data1['avaible']  =$avaible; 
       
                     }else{  if($vo ==2){
                          $msg = "Demand Order List By Sub";
                        
        $data1['product']  =$product; 
        $data1['avaible']  =$notavai; 
                     }}
	   }else{
	       $msg="Confirmed Order by Branch ";
	       $dfg=array();
	       
	       
	         if($type=='a'){
                                
                                                    }else{
                                                    if($type=='b'){
                                                      
                                                        $this->db->where_in('sub_branchid',$subbid);
                                                    }else{
                                                         $this->db->where('sub_branchid',$subid);
                                                    }}
	       
	       
	     
                       $this->db->where('status',1);
                        $dt= $this->db->get("order_serial");
                       $q=0; foreach($dt->result() as $rowg):
                            $dfg[$q] = $rowg->order_no;
                           $q++; endforeach;
	       $data1['avaible']  =$dfg;
	   }
	   
        $data1['subid']=$this->session->userdata('id');
	    $data1['pageTitle'] =  $msg.'';
		$data1['smallTitle'] = $msg.'scriber';
		$data1['mainPage'] = $msg.'';
		$data1['subPage'] = $msg;
		$data1['title'] = $msg;
		$data1['headerCss'] = 'headerCss/sublistCss';
		$data1['footerJs'] = 'footerJs/sublistJs';
		$data1['mainContent'] = 'Shop/avilableOrderList';
		$this->load->view("includes/mainContent", $data1);
	}
	  }
	      
	  }
	  
	   function findlessproductb(){
	     $sid =   $this->input->post("sid");
	     ?>
	       <div class="row">
			<div class="col-md-12 space20">
				<div class="btn-group pull-right">
					<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
						Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu dropdown-light pull-right">
						<li>
							<a href="#" class="export-excel" data-table="#sample-table-2" >
								Export to Excel
							</a>
						</li>

						<li>
							<a href="#" class="export-csv" data-table="#sample-table-2" >
								Save as CSV
							</a>
						</li>
						<li>
							<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
								Export to Word
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	      <div class=" table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered ">
              <thead>
                <tr >
                  <th>#</th>
                  <th>Com. Name</th>
                  <th>P.Name</th>
                  <th>P. Code</th>
                   <th>Volume</th>
                     <th>Price</th>
                
                  <th>Req.</th>
                  
                 <th>Order Number</th>
                 
                  </tr>
              </thead>
              <tbody>
             
                <?php 
               
                 $subid =  $sid;
                 $shopid=$sid;
                 $ordernum=array();
               
                          $this->db->where("sub_branchid",$shopid);
                          $this->db->where("status",0);
                 $osd = $this->db->get("order_serial");
                 if($osd->num_rows()>0){
                  $i=0;  foreach($osd->result() as $ods):
                        $ordernum[$i]=$ods->order_no;
                       $i++; endforeach;
                        $this->db->distinct();
                        $this->db->select('p_code');
                        $this->db->where_in("order_no",$ordernum);
                       $stckdt =  $this->db->get("order_detail");
                       
                 
                
                 
                 if($stckdt->num_rows()>0){
               $j=1;  foreach($stckdt->result() as $data):
                 
                         $this->db->where("subbranch_id",$subid);
                          $this->db->where("p_code",$data->p_code);
                 $dt= $this->db->get("subbranch_wallet");
                  
             if($dt->num_rows()>0){
                
                      $receive=  $dt->row()->rec_quantity;
                $saleq = $dt->row()->sale_quantity;
                
             }else{
                 $receive=0;
                 $saleq=0;
             }
             
           
                  $rtty =0;
                 $total=$receive;
                 $this->db->select_sum("quantity");
                 $this->db->where("p_code",$data->p_code);
                 $this->db->where_in("order_no",$ordernum);
                    $totquan =  $this->db->get("order_detail")->row();
                 $branchqu = $receive-$saleq;
                 
                 if(($branchqu) < $totquan->quantity){
                     $demandqu = $totquan->quantity - $branchqu;
                     
                     $this->db->where("p_code",$data->p_code);
                     $this->db->where("branch_id",$this->session->userdata("id"));
                    $bqw =  $this->db->get("branch_wallet");
                     if($bqw->num_rows()>0){
                
                      $receiveb=  $bqw->row()->rec_quantity;
                $saleqb = $bqw->row()->sale_quantity;
                
             }else{
                 $receiveb=0;
                 $saleqb=0;
             }
                if(($receiveb-$saleqb) < $demandqu){
                    
                    $orgd = $demandqu-($receiveb-$saleqb);
                
                  $this->db->where("id",$data->p_code);
                  $stckdt1= $this->db->get("stock_products");
                 $stckdt2=$stckdt1->row();
                 
                  ?>
                  <tr >
                      
                    <td><?php echo $j;?></td>
                     <td><a href="#"><span ><?php echo $stckdt2->company;?></span></a></td>
                  <td>
                 <?php 
                  echo $stckdt2->name;
                  ?>
                 </td>
                  <td><?php echo $stckdt2->hsn;?></td>
                  <td><?php echo $stckdt2->size;?></td>
                         <td><?php echo $stckdt2->selling_price;?></td>
              
                  
                   
                  <td><a href="#"><span style="color:#01a9ac;font-size:20px;font-weight:1px;"><?php echo $orgd; ?></span></a>

                  <!-- 
                   <span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span> -->
                   </td>
                 
                   <td>
                  <?php   
                    $this->db->where("p_code",$data->p_code);
                    $this->db->where_in("order_no",$ordernum);
                    $onrdername  =  $this->db->get("order_detail");
                   foreach($onrdername->result() as $odname):
                   
                   echo $odname->order_no."<br>";
                   endforeach;
                   ?> </td>
                  
                  
                   </tr>
                    <?php  $j++; }} endforeach; }  
                   
                   }?>
              </tbody>
              
            </table>
              <script>
	TableExport.init();
	
</script>
          </div>
	    <?php
	     
	    
	   }
	
	function findlessproduct(){
	 $quantityd = array();
	    $product[0]=array();;
	    $orderno = $this->input->post("orderno");
	    $subid = $this->input->post("subid");
	     
	    $this->db->where("order_no",$orderno);
                           $getod = $this->db->get("order_detail");
                            if($getod->num_rows()>0){
                               
                               $i=0; $l=0; foreach($getod->result() as $gt):
                                   $aqu =0;
                                            $this->db->where("p_code",$gt->p_code);
                                            $this->db->where("subbranch_id",$subid);
                                           $pdetails =  $this->db->get("subbranch_wallet");
                                           if($pdetails->num_rows()>0){
                                               $aqu = $pdetails->row()->rec_quantity-$pdetails->row()->sale_quantity;
                                               //echo $pdetails->row()->rec_quantity;
                                           }
                                           else{
                                               $aqu=0;
                                           }
                                         
                                           if($aqu < $gt->quantity){
                                            
                                              $product[$l]=$gt->p_code;
                                            $quantityd[$gt->p_code]=$gt->quantity-$aqu;
                                             $l++;  $i++;
                                           }
                                    endforeach;
                            } 
                          
                            ?>
                            <div class="row">
			<div class="col-md-12 space20">
				<div class="btn-group pull-right">
					<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
						Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu dropdown-light pull-right">
						<li>
							<a href="#" class="export-excel" data-table="#sample-table-2" >
								Export to Excel
							</a>
						</li>

						<li>
							<a href="#" class="export-csv" data-table="#sample-table-2" >
								Save as CSV
							</a>
						</li>
						<li>
							<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
								Export to Word
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
                             <div class=" table-responsive">
                            <table id="sample-table-2" class="table table-striped table-hover">
                                <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product code</th>
                                             <th>Name</th>
                                              <th>Size</th>
                                               <th>Company</th>
                                            <th>Demand Quantity</th>
                                        </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i =1; foreach($product as $row):
                                    $this->db->where("id",$row);
                                  $prod =   $this->db->get("stock_products")->row();
                                    ?>
                                    <tr>
                                         <td><?php echo $i;?></td>
                                        <td><?php echo $prod->hsn;?></td>
                                         <td><?php echo $prod->name;?></td>
                                         <td><?php echo $prod->size;?></td>
                                          <td><?php echo $prod->company;?></td>
                                          <td><?php echo $quantityd[$row];?></td>
                                        
                                    </tr>
                                    <?php $i++; endforeach;?>
                                </tbody>
                            </table>
                          </div>  
                          <script>
	TableExport.init();
	
</script>
                            <?php
                            
                           
	}
	
	function orderConfirm(){
	   $oid = $this->input->post("oid");
	    $this->db->where("status",1);
	   $this->db->where("order_no",$oid);
	   $checkv = $this->db->get("order_serial");
	   if( $checkv->num_rows()<1){
	    $this->db->where('order_no',$oid);
        $dt= $this->db->get("order_detail");
        if($dt->num_rows()>0){
            foreach($dt->result() as $row):
                $this->db->where("subbranch_id",$this->session->userdata("id"));
                $this->db->where("p_code",$row->p_code);
               $oldq =  $this->db->get("subbranch_wallet");
               if($oldq->num_rows()>0){
                   $oldqu = $oldq->row();
                   $newq = array(
                       "sale_quantity" =>$oldqu->sale_quantity+$row->quantity
                       );
                       $this->db->where("id",$oldqu->id);
                       $this->db->update("subbranch_wallet",$newq);
                     
               }
                
                endforeach;
                
                $daa['status']=1;
                $this->db->where("order_no",$oid);
                $this->db->update("order_serial",$daa);
                
                 $this->db->where("order_no",$oid);
	   $checkv1 = $this->db->get("order_serial");
                $this->db->where("id",$checkv1->row()->cust_id);
                $getcd =  $this->db->get("customers")->row();
                $msg = "Dear ".$getcd->name." your order no ".$oid." has been accepted by the shop and we will confirmed you when your order will be shiped successfully.Thanks From PASS Team";
                sms($getcd->mobile,$msg);
              echo '<button class="btn btn-success" >Confirmed<button>';
        }
	   }else{
	      echo "9";
	   }
	}

	function index(){
	    $username = $this->session->userdata("username");
		$this->db->where("login_username",$username);
		$this->db->where("DATE(opening_date)",date("Y-m-d"));
		$checkopeningclo  = $this->db->get("opening_closing_balance");
		if($checkopeningclo->num_rows()>0){
			
		}else{
		    
			$clo1 = $this->db->query("select * from opening_closing_balance where login_username='$username' ORDER BY id DESC LIMIT 1");
			if($clo1->num_rows()>0){
				$clo =$clo1->row();
			$cl_date = $clo->closing_date;
			$cl_balance = $clo->closing_balance;
			$cr_date = date('Y-m-d');

			if($cl_date != $cr_date)
			{
				$this->ocbalance->insert_ocbalance($cl_balance,$cl_balance,$username);
			}
			}else{
				$this->ocbalance->insert_ocbalance(0,0,$username);
			}
		}
		$data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'Shop/dashboard';
		$this->load->view("includes/mainContent", $data);
	
	}
	
	public function shoptotal(){
		$data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'Shop/shoptotal';
		$this->load->view("includes/mainContent", $data);
	
	}
	
	public function shopfavouritelist()
{
    $data['pageTitle'] = 'Shop Demand List';
		$data['smallTitle'] = 'Shop Demand List';
		$data['mainPage'] = 'Shop Demand List';
		$data['subPage'] = 'Shop Demand List';
		$data['title'] = 'Shop Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/sbfavlist';
		$this->load->view("includes/mainContent", $data);
 


}
 public function showsbfavlist(){

        $data['username'] = $this->uri->segment(3);
        $data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/customersbfavlist';
		$this->load->view("includes/mainContent", $data);
   
  }
    public function sbdircpt(){
        $data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/gendelrcpt';
		$this->load->view("includes/mainContent", $data);       
  } 
  public function match_daybook(){
    $data['pageTitle'] = 'Shop Dashboard';
    $data['smallTitle'] = 'Overview of all Section';
    $data['mainPage'] = 'Shop Dashboard';
    $data['subPage'] = 'Shop dashboard';
    $data['title'] = 'PASS Dashboard';
    $data['headerCss'] = 'headerCss/sublistCss';
    $data['footerJs'] = 'footerJs/sublistJs';
    $data['mainContent'] = 'Shop/match_daybook';
    $this->load->view("includes/mainContent", $data);
     
} 
function datewisematch(){
	$data['pageTitle'] = 'Shop Dashboard';
	$data['smallTitle'] = 'Overview of all Section';
	$data['mainPage'] = 'Shop Dashboard';
	$data['subPage'] = 'Shop dashboard';
	$data['title'] = 'PASS Dashboard';
	$data['headerCss'] = 'headerCss/sublistCss';
	$data['footerJs'] = 'footerJs/sublistJs';
	$data['mainContent'] = 'Shop/datewiseMatch';
	$this->load->view("includes/mainContent", $data);
}

function dateWiseStatus(){
    $sdate = $this->input->post("sdate");
    $edate = $this->input->post("edate");
    if($this->session->userdata('login_type')==1)
    {
        $this->db->where('order_date >',$sdate);
        $this->db->where('order_date <',$edate);
        $this->db->where('ad_rec_pay',1);
        $this->db->where('adminpayment_receive',0);
        $od_ser= $this->db->get('order_serial');
    }
    elseif($this->session->userdata('login_type')==4)
    {
        $sub_id = $this->session->userdata('id');
        $this->db->where('order_date >',$sdate);
        $this->db->where('order_date <',$edate);
        $this->db->where('sub_branchid',$sub_id);
        $od_ser= $this->db->get('order_serial');
    }
    
    // if($this->input->post("sdate")){
    //   $sub_id = $this->session->userdata('id');
    //   $this->db->where('order_date >',$sdate);
    //   $this->db->where('order_date <',$edate);
    //              $this->db->where('sub_branchid',$sub_id);
    //              $od_ser= $this->db->get('order_serial');
    //             // print_r($od_ser);
    
    // } else { 

    //   $sub_id = $this->session->userdata('id');
    //   $this->db->where('order_date',$edate);
    //              $this->db->where('sub_branchid',$sub_id);
    //              $od_ser= $this->db->get('order_serial');
                
    // }
    $data['orderList'] =$od_ser;
    // print_r($od_ser);
    $this->load->view("Shop/datewiseMatchList",$data);

}
function matchStatus()
{
	$paymode = $this->input->post("paymode");
	$order = $this->input->post("order");
	
	$desc = $this->input->post("desc");
	$trans_id = $this->input->post("trans_id");
  $b_code   = $this->session->userdata("id");
      $billno   = $this->db->count_all("invoice_serial");
      $billno   = $billno + 1000;
      $bill_no  = $b_code."I".$billno;
     
      $this->db->where("order_no",$order);
     $chalv =  $this->db->get("order_detail");
     $this->db->where("order_no",$order);
     $osd=$this->db->get("order_serial")->row();
     
     $this->db->where("id",$osd->cust_id);
    $usernamec = $this->db->get("customers")->row()->username;
      if($chalv->num_rows()>0){
      	foreach($chalv->result() as $chl):
      	
      	$data = array(
      			"p_code" => $chl->p_code,
      			
      			"pries_per_item" => $chl->subtotal/$chl->quantity,
      			"item_quant" => $chl->quantity,
      			"sub_total" => $chl->subtotal,
      			"date"=> date("Y-m-d"),
      			"bill_no" =>$bill_no,
      			"subbranch_code"=>$this->session->userdata("id")
      	);
      	$p_code= $chl->p_code;
      	$this->db->where("p_code",$p_code);
      	$this->db->or_where("sec",$p_code);
      	$this->db->where("subbranch_id",$b_code);
      	$var=$this->db->get("subbranch_wallet");
      	if($var->num_rows() > 0){
      	$row=	$var->row();
      	$q = $row->rec_quantity;
      	$totsel = $row->sale_quantity;
      	
      	$data1 = array(
      			"rec_quantity" => ($q - $data["item_quant"]),
      			"sale_quantity" => ( $totsel + $data["item_quant"]),
      			"date" =>  date("y-m-d")
      	);
      	 
      	$this->db->where("p_code",$p_code);
      	$this->db->or_where("sec",$p_code);
      	$var=$this->db->update("subbranch_wallet",$data1);
      	}
      	
      	$tablename='product_sale';
      	// $this->load->model("registration1");
      	$var1= $this->shop->insert($tablename,$data);
      	//  print_r($var1);
      	endforeach;
      	$bal = array(
      	
      			"paid" => $osd->total_amount,
      			"total"=> $osd->total_amount,
      			"date"=> date("Y-m-d"),
      			"bill_no" =>$bill_no,
      			"valid_id" => $usernamec ,
      			 
      			"subbranch_code"=>$this->session->userdata("id")
      	);
      	$this->db->insert("product_saletotal",$bal);
      	
      	$invoiceData = array(
      			"invoice_no" => $bill_no,
      			"reason" => "Sale Invoice",
      			"invoice_date" => date("Y-m-d"),
      			"subbranch_id"=>$this->session->userdata("id")
      	);
      	$this->db->insert("invoice_serial",$invoiceData);
      	$username=$this->session->userdata("username");
      	$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
      	
      	//$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username='$username'")->row();
      	$balance = $op1->closing_balance;
      	$close1 = $balance + $osd->total_amount;
      	
      	$bal = array(
      			"closing_balance" => $close1
      	);
      	$this->db->where("login_username",$username);
      	$this->db->where("opening_date",date('Y-m-d'));
      	$this->db->update("opening_closing_balance",$bal);
      	$daybook=array(
      			"amount" =>$osd->total_amount,
      			"pay_date"=> date("Y-m-d"),
      			"reason" =>"From sale Stock",
      			"pay_mode"=>$paymode,
      			"dabit_cradit"=>"1",
      			"closing_balance" => $close1,
      			"paid_to" =>$this->session->userdata("username"),
      			"invoice_no" => $bill_no,
      			"paid_by"=> $usernamec
      	
      	);
      	$this->db->insert("day_book", $daybook);
      	
      	$this->db->where("username",$usernamec);
      	$data= $this->db->get("customers")->row();
      	 
      	$count=0;
      	$sender = $this->db->get("sms_setting")->row();
      	$sende_Detail =$sender;
      	$msg = "Dear Sir Thanks For Shopping With  Us. Your Shopping Amount is Rs - ".$osd->total_amount." /- Thank You.";
      	$mobileno = $data->mobile;
      	
      	sms($mobileno,$msg);
      	
      	$totamt= $osd->total_amount;
      	$prcntamt= 2;
      	$prcnt=$totamt * $prcntamt;
      	$totprcnt =$prcnt/100 ;
      
      	$this->db->where("cid",$data->id);
      	$pvresult = $this->db->get("pv");
      	if($pvresult->num_rows()>0){
      		$pv2=$pvresult->row()->rupee;
      	}else{
      		$pv2=0;
      	}
      	 
      	$newpv=$pv2+$totprcnt;
      	$pv1=array(
      			"rupee"=>$newpv
      	);
      	$this->db->where("cid",$data->id);
      	$uppv= $this->db->update("pv",$pv1);
      	$msg = "Dear Sir Thanks For Shopping With  Us. Your CashBack Amount is Rs - ".$totprcnt." /- Thank .";
      	$mobileno =$data->mobile;
      	
      	sms($mobileno,$msg);
      	
      	//$id=$dt->parentID;
      	////$this->db->where("id",$id);
      	//  $parentdt=$this->db->get("customers")->row();
      	//$cid=$parentdt->username;
      	
      	 
      	$i=1;
      	
      	$data3= $this->shop->commision($i,$usernamec,$totamt,$bill_no);
      }

  
      /////
	
	$updatedata = array(
		"transaction_id"=>	$trans_id,
			"detail"=>$desc,
			"ad_rec_pay"=>1,
			"payment_mode"=>$paymode
	);
	$this->db->where("order_no",$order);
	$this->db->update("order_serial",$updatedata);
	echo "Matched";
}
     public function gendelreciept()
         {
             // $data['branchid']=$this->input->post('branchid');
             $data['subbranchid']=$this->session->userdata("id");
             
            // $data['enddate']=$this->input->post('enddate');
             $data['delivery']=$this->input->post('delivery');
            
             // $this->db->where('payment_mode',"cashondelivery");
             $this->db->where('del_boy_id',$this->input->post('delivery'));
             $this->db->where('order_status',0);
             $this->db->where('sub_branchid',$this->session->userdata("id"));
             $order=$this->db->get('order_serial');
             $data['odrdernum']=$order->num_rows();
             $data['oderdetail']=$order->result();
            //   print_r($data1);
            //  exit();
             $this->load->view('Shop/digeneratereciept',$data);
            
         }
         public function invoce_d(){
             
        $data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/sublistCss';
		$data['footerJs'] = 'footerJs/sublistJs';
		$data['mainContent'] = 'Shop/invoice_d';
		$this->load->view("includes/mainContent", $data);
         }
         
         
         public function adminpaymentcollect(){  
      
       $amt=$this->input->post('amt');
       $orderno=$this->input->post('order');
       $amount=$this->input->post('amount');
        $deatil=$this->input->post('deatil');
            $this->db->where('order_no',$orderno);
            $orderdetail=$this->db->get('order_serial');
            if($orderdetail->num_rows()>0){
            $dta=$orderdetail->row();
            $cust_unm=$dta->cust_id;
            $invoice_no=$dta->invoice_no;
            $this->db->where("id",$cust_unm);
            $dt=$this->db->get("customers")->row();
            $cid=$dt->username;
            $amnt=$dta->total_amount;
            $totamt=$amnt;
            $prcntamt= 2;
            $prcnt=$totamt * $prcntamt;
            $totprcnt =$prcnt/100 ;

        $this->db->where("cid",$dt->username);
        $pvdt= $this->db->get("pv")->row();
        $pvrp=$pvdt->rupee;
        $totropee=$totprcnt+$pvrp;
        $pv= array(
        'rupee'  =>$totropee
        );
       $this->db->where("cid",$cust_unm);
       $pvupdate= $this->db->update("pv",$pv);
       
        $count=0;
        $sende_Detail = $this->db->get("sms_setting")->row();
        $msg = "Dear ". $dt->name ." Thanks for Shopping With passystem.in . Your CashBack Amount is Rs - ".$totropee." /- Thank You .";
        $mobileno = $dt->mobile;
   
       sms($mobileno,$msg);
       
      $i=1;
     
      $this->shop->commision($i,$cid,$amnt,$orderno);
     
       $amt+=$amount;
      $data=array(
          'adminpayment_receive'=>1,
          'detail'=>$deatil,
            );
            $this->db->where('order_no',$orderno);
            $upadte=$this->db->update('order_serial',$data);
            
             echo  $amt;
            }
  }

public function shopshowdemandlist()
{       $data['shopid'] =$this->session->userdata("id");
        $data['shopname'] =$this->session->userdata("your_school_name");
        $data['pageTitle'] = 'Shop Overall Demand List';
		$data['smallTitle'] = 'Shop Overall Demand List';
		$data['mainPage'] = 'Shop Overall Demand List';
		$data['subPage'] = 'Shop Overall Demand List';
		$data['title'] = 'Shop Overall Demand List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/shopdemandlist';
		$this->load->view("includes/mainContent", $data);
    
      

}

	
 
  function saleInvoice(){
		$data['title'] = "Fee reciept invoice";
		$this->load->view("Shop/saleinvoice",$data);
  
  
  }

	
		function sbpaidorder(){
		$data['pageTitle'] = 'Shop Paid Orders';
		$data['smallTitle'] = 'Shop Paid Orders';
		$data['mainPage'] = 'Shop Paid Orders';
		$data['subPage'] = 'Shop Paid Orders';
		$data['title'] = 'Shop Paid Orders';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/branchListJs';
		$data['mainContent'] = 'Shop/sbpaidorder';
		$this->load->view("includes/mainContent", $data);
	
	}
	 public function adminproductdeatil(){
	 $data['invoice']=$this->uri->segment(3);
      	$data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/adminorderproducts';
		$this->load->view("includes/mainContent", $data);
       

      }
   
      public function transferproductlist(){
	    $uri =$this->uri->segment(3);
	    if($uri==3){
	     $data['invoice']=$uri;
      	$data['pageTitle'] = 'Total transfer Product List ';
		$data['smallTitle'] = 'Total transfer Product List';
		$data['mainPage'] = 'Total transfer Product List';
		$data['subPage'] = 'Total transfer Product List';
		$data['title'] = 'Total transfer Product List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/transferproductlist';
		$this->load->view("includes/mainContent", $data);
	    }
	    else{
	         $data['invoice']=$uri;
      	$data['pageTitle'] = 'Today transfer Product List ';
		$data['smallTitle'] = 'Today transfer Product List';
		$data['mainPage'] = 'Today transfer Product List';
		$data['subPage'] = 'Today transfer Product List';
		$data['title'] = 'Today transfer Product List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/transferproductlist';
		$this->load->view("includes/mainContent", $data);
	    }
	        
	    

      }
        public function recieveproductlist(){
	   $data['invoice']=$this->uri->segment(3);
      	$data['pageTitle'] = 'Received Product List';
		$data['smallTitle'] = ' Received Product List';
		$data['mainPage'] = ' Received Product List';
		$data['subPage'] = ' Received Product List';
		$data['title'] = ' Received Product List';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/recieveproductlist';
		$this->load->view("includes/mainContent", $data);
       

      }
      
         public function admincash()
          {
       //  $order=$this->input->post('orderno');
          $order=$this->uri->segment(3);

        $dataa=array(
         'ad_rec_pay'=>1,   
            
        );
         $this->db->where('status',1);
         $this->db->where('order_status',1); 
        $this->db->where('order_no',$order);
       $orderdrecive=$this->db->update('order_serial',$dataa);
        if($orderdrecive){
         $this->db->where('status',1);
         $this->db->where('order_status',1); 
         $this->db->where('order_no',$order);
       $orderdetail=$this->db->get('order_serial');
       
      if($orderdetail->num_rows()>0)
      {
        $dta=$orderdetail->row();
//          print_r($dta);
//  exit();
        $cust_unm=$dta->cust_id;
      
        $invoice_no=$dta->invoice_no;
       
         $this->db->where('order_no',$dta->order_no);
         $this->db->where('cust_id',$dta->cust_id);
         $dt2= $this->db->get("shopbill");
       
         
        if($dt2->num_rows()>0){
              $this->db->select_sum('subtotal');
         $this->db->from("shopbill");
         $this->db->where('order_no',$dta->order_no);
         $this->db->where('cust_id',$dta->cust_id);
         $dt1= $this->db->get();
       
         
            $amnt=$dt1->row()->subtotal;
           // echo "bbbb";
        }else{
              $this->db->where('order_no',$dta->order_no);
              $this->db->where("cust_id",$cust_unm);
                $dt9=$this->db->get("order_serial")->row();
               // echo "hhh";
                $amnt=$dt9->total_amount;
                
        }
        $this->db->where("id",$cust_unm);
        $dt=$this->db->get("customers")->row();
        $id=$dt->parentID;
        // $cid=$dt->username;

        $this->db->where("id",$id);
        $parentdt=$this->db->get("customers")->row();
        $cid=$parentdt->username;

        

        $totamt= $amnt;
        $prcntamt= 2;
        $prcnt=$totamt * $prcntamt;
        $totprcnt =$prcnt/100 ;

        $this->db->where("cid",$dt->id);
        $pvdt= $this->db->get("pv")->row();
        $pvrp=$pvdt->rupee;
        $totropee=$totprcnt+$pvrp;

      
        $count=0;
        $sende_Detail = $this->db->get("sms_setting")->row();

        $msg = "Dear ".$dt->username." Thanks For Shopping With passystem.in . Your CashBack Amount  Rs  ".$totropee." /- is Under Process. Thank You .";
         $mobileno =	$dt->mobile;
         
         sms($mobileno,$msg);
       
    //   $i=1;
    //   $this->load->model("registration1");
    //   $this->registration1->commision($i,$cid,$amnt);

       
       
       $username=$this->session->userdata("username");
       
       $op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username='$username'")->row();
           $balance = $op1->closing_balance;
           $close1 = $balance + $amnt;


           $bal = array(
            "closing_balance" => $close1

          );
          $this->db->where("login_username",$username);
          $this->db->where("opening_date",date('Y-m-d'));
          $this->db->update("opening_closing_balance",$bal);

        $daybookdetail=array
          (
      'paid_to' =>$username,
      'paid_by' =>$dt->username,
      'reason' =>"COD Shopping",
      'dabit_cradit' =>1,
      'amount' =>$amnt,
      'closing_balance' =>$close1 ,
      'pay_date' =>date('Y-m-d'),
      'pay_mode' =>'Cash',
      'invoice_no'=>$invoice_no
       );
       $this->db->insert("day_book",$daybookdetail);
       
       redirect("shopController/sborder");
       
     }?>
      <!--<button type="submit" class="btn btn-primary" id="paymentrecive<?php echo $i;?>">Admin P.R </button>-->
    <?php  
 }

           
}

       public function shoporderprocced()
          {
           $data['orderno'] =$this->uri->segment(3);   
           
          	$data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'Shop/shoporderprocced';
		$this->load->view("includes/mainContent", $data);
            
         }
         public function generatebillinvoice(){ 
       
     $order_number=$this->input->post('ordernumber');
    $invoice_number=$this->input->post('invoicenumber');
    
    $this->db->where('order_no',$order_number);
    $upadte=$this->db->get('order_serial')->row();
    $data1=array(
       
        'shop_order'=>"1",
    );
        
     $this->db->where('order_no',$order_number);
    $up=$this->db->update('order_serial',$data1);
    
    
     $data['order_no']= $order_number;
    $data['invoice_no']= $invoice_number;
    	$data['pageTitle'] = 'Shop Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Shop Dashboard';
		$data['subPage'] = 'Shop dashboard';
		$data['title'] = 'PASS Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'Shop/codinvoice';
		$this->load->view("includes/mainContent", $data);
		
   
   
 
   }
   public function selectdelivery()
    {
        $id= $this->session->userdata("id");
        $aa= array(     'sub_branchid'=>$id,
                        'emp_type'=>'5',
                        'status'=>'1'
                 );
         $this->db->where($aa);
        $deliveryboy=$this->db->get('employee');
        
        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
     <option>Select Delivery incharge</option> 
      <?php 
       foreach($boy as $row)
       { ?> 
  <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>"><?php echo  $row->name." [ ". $row->username. " ] ";?></option>     
            
      <?php }
        
    }
    else
    {?>
      <option>--Select Delivery incharge--</option> 
        <option>--No Any Delivery incharge--</option>';     
<?php         
    }
        
    
        
    }
     public function selectdelivery1()
    {
        
        $aa= array(    
                        'emp_type'=>'5',
                        'status'=>'1'
                 );
         $this->db->where($aa);
        $deliveryboy=$this->db->get('employee');
        // print_r($deliveryboy);
        // exit();
        if($deliveryboy->num_rows()>0)
        { 
      $boy=$deliveryboy->result();
      ?>
     <option>Select Delivery incharge</option> 
      <?php 
       foreach($boy as $row)
       { ?> 
  <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>"><?php echo  $row->name." [ ". $row->username. " ] ";?></option>     
            
      <?php }
        
    }
    else
    {?>
      <option>--Select Delivery incharge--</option> 
        <option>--No Any Delivery incharge--</option>';     
<?php         
    }
        
    
        
    }
    
    public function assigntodelivery()
    {
         $ordernu=$this->input->post('orderno');
         $debid=$this->input->post('id');
        $data=array(
          'status'=>1,
          'del_boy_id'=>$debid,
          );
      $this->db->where('order_no',$ordernu);
       $this->db->where('shop_order',1);
      $update=$this->db->update('order_serial', $data);
      
          $this->db->where("emp_type",5);
        $deliveryboy=$this->db->get('employee');

        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
   </select class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;">
      <?php 
       foreach($boy as $row)
       { ?> 
       <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>"><?php echo  $row->name." [ ". $row->username. " ] ";?></option>     
            
        <?php } 
        
        
        ?>
        </select>
    <?php }
       $this->db->where('order_no',$ordernu);
       $sendsms=$this->db->get('order_serial')->row();

       $this->db->where('id',$sendsms->sub_branchid);
       $sub_branch= $this->db->get('sub_branch')->row();
       
       $boyid=$sendsms->del_boy_id;
       $cus=$sendsms->cust_id;
       
        $this->db->where('id',$boyid);
       $delivery=$this->db->get('employee')->row();
       
       
       $this->db->where("id",$cus);
        $cust=$this->db->get("customers")->row();
       
        $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

          //  $msg = " Dear " . $delivery->name. " Please take the order of  . " . $cust->name. " [ ". $cust->username." ] " . " Please Check Your Dashboard For Further Deatil, Please visit passystem.in .Thank You .";
              $msg = " Dear " . $delivery->name. " Please collect order number  ".$ordernu." from  " .$sub_branch->bname. " [ " .$sub_branch->address." ]   And deliver to " . $cust->name. " [ ". $cust->username." ]  " . " Please check your dashboard for any further deatil, And visit https://www.passystem.in/passoft/login";
              $mobileno=$delivery->mobile;            
              sms($mobileno,$msg);
          
              $msg = " Dear  ". $cust->name. "  Your order deliver soon for any further details call to order Delivery Incharge mobile Number  ".$mobileno . "  [ ". $delivery->name." ]  and  Please Check You order status in Subscriber Dashboard https://www.passystem.in/passoft/login . PAS System";

              $mobile=$cust->mobile;            
               sms($mobile,$msg);
          
       }
    
    public function assignagaindelivery()
    {
        $debid=$this->input->post('id');
         $ordernu=$this->input->post('orderno');
        $data=array(
            'status'=>1,
          'del_boy_id'=>$debid,
          );
      $this->db->where('order_no',$ordernu);
       $this->db->where('shop_order',1);
      $update=$this->db->update('order_serial', $data);
      
       $this->db->where('order_no',$ordernu);
       $sendsms=$this->db->get('order_serial')->row();
       
       $boyid=$sendsms->del_boy_id;
       $cus=$sendsms->cust_id;
       
        $this->db->where('id',$boyid);
       $delivery=$this->db->get('employee')->row();
       
       
       $this->db->where("id",$cus);
        $cust=$this->db->get("customers")->row();
       
        $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

           $msg = " Dear ". $delivery->name . " Please take the order of . " . $cust->name. " [ ". $cust->username." ] " ." Please Check Your Dashboard For Further Deatil, Please visit passystem.in.Thank You .";

              $mobileno=$delivery->mobile;            
          sms($mobileno,$msg);
          
          $msg = " Dear " . $cust->name. " Your  order status  have been change Please check from Own Dashboard and Call this Number".$mobileno ." to Change  Delivery Incharge for Further Detail, Please visit passystem.in ";

              $mobile=$cust->mobile;            
          sms($mobile,$msg);
      
    }
    
    
     public function assigntodeliveryproduct()
    {
         $ordernu=$this->input->post('orderno');
         $debid=$this->input->post('id');
        $data=array(
        //   'status'=>1,
          'del_boy'=>$debid,
          );
      $this->db->where('invoice_no',$ordernu);
       
      $update=$this->db->update('assignproduct',$data);
      
          $this->db->where("emp_type",5);
        $deliveryboy=$this->db->get('employee');

        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
   </select class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;">
      <?php 
       foreach($boy as $row)
       { ?> 
       <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>"><?php echo  $row->name." [ ". $row->username. " ] ";?></option>     
            
        <?php } 
        
        
        ?>
        </select>
    <?php }
       $this->db->where('invoice_no',$ordernu);
       $sendsms=$this->db->get('assignproduct')->row();

      
       
       $boyid=$sendsms->del_boy;
      
       
        $this->db->where('id',$boyid);
       $delivery=$this->db->get('employee')->row();
       
        $this->db->where('invoice_number',$ordernu);
       $pdata=$this->db->get(' product_trans_detail')->row();
       
      
       
        $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

          //  $msg = " Dear " . $delivery->name. " Please take the order of  . " . $cust->name. " [ ". $cust->username." ] " . " Please Check Your Dashboard For Further Deatil, Please visit passystem.in .Thank You .";
              $msg = " Dear " . $delivery->name. " Please collect Invoice number  ".$ordernu." collect from  " .$pdata->sender_usernm."   And deliver to " . $pdata->reciver_usernm.  " Please check your dashboard for any further deatil, And visit https://www.passystem.in/passoft/login";
              $mobileno=$delivery->mobile;            
              sms($mobileno,$msg);
          
             
          
       }
    
     public function assignagaindeliveryproduct()
    {
         $ordernu=$this->input->post('orderno');
         $debid=$this->input->post('id');
        //  print_r($debid);
        //  exit();
        $data=array(
        //   'status'=>1,
          'del_boy'=>$debid,
          );
      $this->db->where('invoice_no',$ordernu);
       
      $update=$this->db->update('assignproduct',$data);
      
          $this->db->where("emp_type",5);
        $deliveryboy=$this->db->get('employee');

        if($deliveryboy->num_rows()>0)
        {
      $boy=$deliveryboy->result();
      ?>
   </select class="form-control" style="max-height:30px;max-width:150px;margin-left:-12px;">
      <?php 
       foreach($boy as $row)
       { ?> 
       <option class="text-uppercase" style="color:#01a9ac" value="<?php echo $row->id;?>"><?php echo  $row->name." [ ". $row->username. " ] ";?></option>     
            
        <?php } 
        
        
        ?>
        </select>
    <?php }
       $this->db->where('invoice_no',$ordernu);
       $sendsms=$this->db->get('assignproduct')->row();

      
       
       $boyid=$sendsms->del_boy;
      
       
        $this->db->where('id',$boyid);
       $delivery=$this->db->get('employee')->row();
       
        $this->db->where('invoice_number',$ordernu);
       $pdata=$this->db->get(' product_trans_detail')->row();
       
      
       
        $sender = $this->db->get("sms_setting")->row();
          $sende_Detail =$sender;

          //  $msg = " Dear " . $delivery->name. " Please take the order of  . " . $cust->name. " [ ". $cust->username." ] " . " Please Check Your Dashboard For Further Deatil, Please visit passystem.in .Thank You .";
              $msg = " Dear " . $delivery->name. " Please collect Invoice number  ".$ordernu." collect from  " .$pdata->sender_usernm."   And deliver to " . $pdata->reciver_usernm.  " Please check your dashboard for any further deatil, And visit https://www.passystem.in/passoft/login";
              $mobileno=$delivery->mobile;            
              sms($mobileno,$msg);
          
             
          
       }
    
    
      public function shappaymentrecieve()

          {
            $ordernumber=$this->uri->segment('3');
            
            $this->db->where('order_no', $ordernumber);
            $data1=$this->db->get('order_serial')->row();
            
            $data=array(
                'ad_rec_pay'=>'1',
                );  
                
             $this->db->where('order_no',$ordernumber);
             $upda=$this->db->update('order_serial', $data);
             if($upda)
             {
              
         $this->db->where('status',1);
         $this->db->where('order_status',1); 
         $this->db->where('order_no',$ordernumber);
       $orderdetail=$this->db->get('order_serial');
       
      if($orderdetail->num_rows()>0)
      {
        $dta=$orderdetail->row();
        $cust_unm=$dta->cust_id;
        
          $this->db->where("id",$cust_unm);
        $dt=$this->db->get("customers")->row();
         $amnt=$dta->total_amount;

        $totamt= $amnt;
        $prcntamt= 2;
        $prcnt=$totamt * $prcntamt;
        $totprcnt =$prcnt/100 ;

        $this->db->where("cid",$dt->id);
        $pvdt= $this->db->get("pv")->row();
        $pvrp=$pvdt->rupee;
        $totropee=$totprcnt+$pvrp;
        
      
          $count=0;
        $sende_Detail = $this->db->get("sms_setting")->row();

        $msg = "Dear ".$dt->name." Thanks For Shopping With passystem.in . Your CashBack Amount Rs  ".$totropee." is Under Process. Thank You .";
         $mobileno =	$dt->mobile;
         
         sms($mobileno,$msg);
       
        redirect('shopController/sborder','refresh');        
                 
             }
                 
             }
             else
             {
                echo "Something wrong Please try After sometime";
                
               redirect('shopController/sborder','refresh');   
             }
        
              
          }
public function invoice(){
      $data['orderno'] =$this->uri->segment(3);
		$data['title'] = "Fee reciept invoice";
		$this->load->view("Shop/generateinvoice",$data);
 }
   public function genrateinvoice(){
          
           $data['orderno'] =$this->uri->segment(3);
          $data['title'] = 'Order Products List';    
          $this->load->view("Shop/generateinvoicedetail", $data);

          }

   public function custgenratecodinvoice()
           {
           $data['order_no'] =$this->uri->segment(3);
           $data['invoice_no'] =$this->uri->segment(4);
          $data['title'] = 'Order Products List';    
          // $data['dist']  =$this->cart->destroy();
          $this->load->view("Shop/custgenratecodinvoice", $data);

          }
	
	public function saveSubBranch(){
		$maxid=$this->shop->getSubBranchMax();
		
		$maxid=$maxid+1;
		$dis= $this->input->post('district');
		
	//	$bid= $this->shop->shopbranchid();
		$name = $this->input->post('ownername');
		$sbname= $this->input->post('bname');
		$username = $dis."S".$maxid;
		$susername="PSH".$username;
		$pass=$this->input->post('password');
		$value['username']= "PSH".$username;
		$value['bname']=$this->input->post('bname');
		$value['ownername']=$this->input->post('ownername');
		$value['address']=$this->input->post('address');
		$value['street']=$this->input->post('street');
		$value['pin']=$this->input->post('pin');
		$value['adhar_no']=$this->input->post('adhar_no');
		$value['pan_no']=$this->input->post('pan_no');
		$value['city']=$this->input->post('city');
		$value['district']=$this->input->post('district');
		$value['mob_no']=$this->input->post('mob_no');
		$value['gst_no']=$this->input->post('gst_no');
		$value['password']=$this->input->post('password');
		$value['email_id'] = $this->input->post('email');
		$value['bank_name'] = $this->input->post('bank_name');
		$value['account_no'] =$this->input->post('acc_no');
		$value['branch_name'] = $this->input->post('branch_name');
		$value['ifsc'] = $this->input->post('ifsc');
		$value['image'] = time().trim($_FILES['image']['name']);
		$value['status']= 0;
		$photo_name1=time().trim($_FILES['image']['name']);
		$tablename='sub_branch';
		$sb=$this->shop->insertsub($tablename,$value);
		if($sb)
		{ 
		          $open['opening_balance']=0.00;
		          $open['closing_balance']=0.00;
		          $open['login_username']="PSH".$username;
		          $open['opening_date']=date("y-m-d");
		          $open['closing_date']=date("y-m-d");
		          $this->db->insert("opening_closing_balance",$open);
		          
		          $mbal['username']="PSH".$username;
		          $mbal['balance']=0.00;
		          $mbal['date']=date("y-m-d");

		          $this->db->insert("m_balance",$mbal);
		          
		          
			$this->load->library('upload');
			//$image_path = realpath(APPPATH . '../assets/images/branch');
			$asset_name = $this->db->get('upload_asset')->row()->asset_name;
			//print_r($asset_name);exit();
			$image_path = $asset_name.'/images/subbranch';
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|';
			$config['max_size'] = '5120';
			$config['file_name'] = $photo_name1;
	
			if (!empty($_FILES['image']['name'])) {
				$this->upload->initialize($config);
				$this->upload->do_upload('image');
				//redirect(base_url().'index.php');
					
			}
			$msg = "Dear ". $name . " Your Shop Registration in PASS is Successfully Registered. Your Shop Name is " .$sbname . " and Your Username is ".$susername."and Password is ".$pass.".Please Wait For Activation.Best Regards from  Pass Admin";
			$mobile = $this->input->post('mob_no');
			sms($mobile,$msg);
			//echo $msg;
			?>
			<script>
			    window.location.href = '<?php echo base_url();?>shopController/subBranchReg/5';
			</script>
			<?php 
// 			redirect('shopController/subBranchReg/5');
			//   // redirect('https://passystem.in/auth/signupShop','refresh');
			        }else{?>
			        <script>
			    window.location.href = '<?php echo base_url();?>shopController/error';
			</script>
			<?php
			
			         //  redirect('shopController/error');
			        }
		}
		
		public function subBranchList(){
			if($this->session->userdata('login_type') == '1'){
				$data['view'] = $this->shop->getSubBranch();
				//$data['view'] = $this->branch->getActiveList();
				//$data['view1'] = $this->shop->getValue();
			}else if($this->session->userdata('login_type') == '2'){
      $bid= $this->shop->shopBranchid();
			$data['view1'] = $this->branch->getValue();
      $data['view'] = $this->shop->activeSbranch($bid);
		}
			$data['pageTitle'] = 'Active Shop  List';
			$data['smallTitle'] = ' Active Shop List';
			$data['mainPage'] = 'Active Shop List';
			$data['subPage'] = 'Active Shop List';
			$data['title'] = 'Active Shop  List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Shop/subbranchListActive';
			$this->load->view("includes/mainContent", $data);
		}
		function subBranchInactiveList(){
			if($this->session->userdata('login_type') == '1'){
        $bid = $this->branch->branch1();
        $dt = $this->shop->sbranchinActiveListadmin();
				//$data['view1'] = $this->shop->getValue();
			}else if($this->session->userdata('login_type') == '2'){
			$bid= $this->shop->shopBranchid();
      $data['view'] = $this->branch->getValue();
      $dt = $this->shop->sbranchinActiveList($bid);
		}
			//$bid= $this->shop->shopBranchid();
			//$dt = $this->shop->sbranchinActiveList($bid);
		//	$data['view'] = $this->shop->getValue();
			$data['activeList']=$dt;
			$data['pageTitle'] = ' Inactive Shop List';
			$data['smallTitle'] = 'Inactive Shop  List';
			$data['mainPage'] = 'Inactive Shop List';
			$data['subPage'] = 'Inactive Shop List ';
			$data['title'] = 'Inactive Shop  List';
			$data['headerCss'] = 'headerCss/stockCss';
			$data['footerJs'] = 'footerJs/stockJs';
			$data['mainContent'] = 'Shop/sbranchListinActive';
			$this->load->view("includes/mainContent", $data);
		}
		function sbranchfull_profile(){
      if($this->session->userdata('login_type')== 4){
        $susername= $this->session->userdata('id');
       // print_r($susername);exit();
      }else{
        $susername= $this->uri->segment(3);
      }
		
			$data['view'] = $this->shop->getsBranchValue($susername);
			$data['bid']= $this->branch->getValue();
			$data['pageTitle'] = 'Shop Full Profile';
			$data['smallTitle'] = ' Shop Profile';
			$data['mainPage'] = 'Shop Profile';
			$data['subPage'] = 'Shop Profile';
			$data['title'] = 'Shop Profile';
			$data['headerCss'] = 'headerCss/branchListCss';
			$data['footerJs'] = 'footerJs/branchListJs';
			$data['mainContent'] = 'Shop/sbranchfull_profile';
			$this->load->view("includes/mainContent", $data);
		}
		function UpdateSubBranch(){
			$subBranchid = $this->uri->segment(3);
			$value['ownername']= $this->input->post('ownername');
			$value['address'] = $this->input->post('address');
			$value['city'] = $this->input->post('city');
			$value['email_id'] = $this->input->post('email');
			$value['bank_name'] = $this->input->post('bank_name');
			$value['account_no'] = $this->input->post('acc_no');
			$value['branch_name'] = $this->input->post('branch_name');
			$value['ifsc'] = $this->input->post('ifsc');
			$value['street'] =$this->input->post('street');
			$value['password'] = $this->input->post('password');
			$photo_name1 =  time().trim($_FILES['image']['name']);
			//if($query)
			$this->load->library('upload');
				//$image_path = realpath(APPPATH . '../assets/images/branch');
				$asset_name = $this->db->get('upload_asset')->row()->asset_name;
			//	print_r($asset_name);exit();
				$image_path = $asset_name.'/images/subbranch';
				$config['upload_path'] = $image_path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|';
				$config['max_size'] = '50';
				$config['file_name'] = $photo_name1;
			//}
			if (!empty($_FILES['image']['name'])) {
				$this->upload->initialize($config);
				$this->upload->do_upload('image');
				$value['image'] = $photo_name1;
				//redirect(base_url().'index.php');
				
			}
			$this->db->where('id',$subBranchid);
			$query=$this->db->update('sub_branch',$value);
			redirect('index.php/shopController/sbranchfull_profile/'.$subBranchid.'/5');
		}
		public function subBranchReg(){
			$data['bid']= $this->branch->getValue();
		//	print_r($data);exit();
			$data['pageTitle'] = ' Shop Registration';
			$data['smallTitle'] = 'Shop Registration';
			$data['mainPage'] = 'Add Shop Area';
			$data['subPage'] = 'New Shop Registration';
			$data['title'] = 'Add Shop Area';
			$data['headerCss'] = 'headerCss/branchCss';
			$data['footerJs'] = 'footerJs/subbranchJs';
			$data['mainContent'] = 'Shop/subbrachRegistration'; 
			$this->load->view("includes/mainContent", $data);
		} 
			function match_adhar_shop(){
	    $aadhar=$this->input->post('adhar');
	    $this->db->where('aadhar_no',$aadhar);
	    $panno=$this->db->get('sub_branch')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate Aadhar Number!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	    
	}
	function match_name_shop(){
	     $aadhar=$this->input->post('adhar');
	    $this->db->where('bname',$aadhar);
	    $panno=$this->db->get('sub_branch')->row();
	    if($panno){
	        echo "<p class='error' style='color:red;'>You can not use duplicate Sub Branch Name!!</p>";
	    }else{
	       echo "<p class='error' style='color:green;'>Correct</p>";
	    }
	}
		function dayBook(){
		$data['msg']="";
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Account Management';
		$data['mainPage'] = 'Account Management';
		$data['subPage'] = 'Account Management';
		$data['title'] = 'Account Management';
		$data['headerCss'] = 'headerCss/daybookCss';
		$data['footerJs'] = 'footerJs/daybookJs';
		$data['mainContent'] = 'Shop/dayBook';
		$this->load->view("includes/mainContent", $data);
	}
	function cashPayment(){
		$data['pageTitle'] = 'Accounting';
		$data['smallTitle'] = 'Transaction';
		$data['mainPage'] = 'Transaction';
		$data['subPage'] = 'Cash Payment';
		$data['title'] = 'cashPayment';
		$data['headerCss'] = 'headerCss/transectionCss';
		$data['footerJs'] = 'footerJs/transactionJs';
		$data['mainContent'] = 'Shop/cashPayment';
		$this->load->view("includes/mainContent", $data);
	}

	public function fetchBranch()
	{
		$this->load->model('shop');
		$data = $this->shop->fetchBranch();
		echo json_encode($data);
	}
	function shopOrderDetail(){
		$bid = $this->shop->shopBranchid();
		$data['activeList'] = $this->shop->activeSbranch($bid);
	//	print_r($data);exit();
		$data['pageTitle'] = 'Branch Order Detail';
		$data['smallTitle'] = 'Branch Order Detail';
		$data['mainPage'] = 'Branch Order Detail ';
		$data['subPage'] = 'Branch Order Detail';
		$data['title'] = 'Branch Order Detail';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/branchOrderDeatil';
		$this->load->view("includes/mainContent", $data);
	}
	function orderdetail(){
		$subBranch = $this->input->post('subBranch');
		//print_r($subBranch);exit();
		if($subBranch == 'all'){
			//$subBranch = $this->branch->getValue();
			$data['customer']= $this->subscriber->custOD();
		}else{
		$data['customer']= $this->subscriber->SubscriberView($subBranch);
	}
		$this->load->view('Shop/ordedetail',$data);
	}

	public function branchproductdeatil(){
	     $data['invoice']=$this->uri->segment(3);
	     	$data['pageTitle'] = 'Branch Order Detail';
		$data['smallTitle'] = 'Branch Order Detail';
		$data['mainPage'] = 'Branch Order Detail ';
		$data['subPage'] = 'Branch Order Detail';
		$data['title'] = 'Branch Order Detail';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/branchprodDeatil';
		$this->load->view("includes/mainContent", $data);
	     
	}

	public function assignproduct(){
	    $data['invoice']=$this->uri->segment(3);
	    $data['pageTitle'] = 'Assign Product Invoice';
		$data['smallTitle'] = 'Assign Product Invoice';
		$data['mainPage'] = 'Assign Product Invoice ';
		$data['subPage'] = 'Assign Product Invoice';
		$data['title'] = 'Assign Product Invoice';
		$data['headerCss'] = 'headerCss/branchListCss';
		$data['footerJs'] = 'footerJs/shopJs';
		$data['mainContent'] = 'Shop/assignproduct';
		$this->load->view("includes/mainContent", $data);
	     
	}
	public function pay_and_receive(){
	   //  $data['invoice']=$this->uri->segment(3);
	     	$data['pageTitle'] = 'Product Receive And Pay';
		$data['smallTitle'] = 'Product Receive And Pay';
		$data['mainPage'] = 'Product Receive And Pay ';
		$data['subPage'] = 'Product Receive And Pay';
		$data['title'] = 'Product Receive And Pay';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJs';
		$data['mainContent'] = 'Shop/pay_and_receive';
		$this->load->view("includes/mainContent", $data);
	     
	}
	
	public function pay_order()
 	{ 
 	   
        //username:username,p_mode:p_mode,p_amount:p_amount,trans_id:trans_id,blnc:blnc
	    $username= $this->input->post('username');
	    $p_mode=$this->input->post('p_mode');
	    $p_amount=$this->input->post('p_amount');
	    $ord_amount=$this->input->post('ord_amount');
	   $trans_id =$this->input->post('trans_id');
	   $blnc1=$this->input->post('blnc');
	   $invoice_no=$this->input->post('invoice_no');
	   //echo "<br>".$username,"<br>".$p_mode,"<br>".$p_amount,"<br>".$trans_id,"<br>".$blnc,"<br>".$invoice_no;
	  
	  $this->db->where('invoice_no',$invoice_no);
	  $tpp = $this->db->get('transfer_product_paydetail');
	  if($tpp->num_rows()>0)
	  {
	    echo "Allready Verified";   
	  }
	  else
	  {
	       if($this->input->post('p_mode')=='balance')
	       {
	          // echo $p_amount,"<br>".$ord_amount;
	            $val = array('username'=>$username,
	                'invoice_no' => $invoice_no,
	                'paid_amount' => $ord_amount,
	                'order_amount' => $ord_amount,
	                'payment_mode'=> '55',       // 55 is code for balance in pay_mode table
	                'transaction_id'=> 'balance',
	                'date'=> date('Y-m-d'),
	                'sender_status'=>1
            	     ); 
            	$insrt = $this->db->insert('transfer_product_paydetail',$val);   
	       }
 	       else
 	       {
 	        $val = array('username'=>$username,
	                'invoice_no' => $invoice_no,
	                'paid_amount' => $p_amount,
	                'order_amount' => $ord_amount,
	                'payment_mode'=> $p_mode,
	                'transaction_id'=> $trans_id,
	                'date'=> date('Y-m-d'),
	                'sender_status'=>1
            	     ); 
    	     $insrt = $this->db->insert('transfer_product_paydetail',$val);
    	       
 	       }
 	       if($insrt)
    	     {
	         echo "Wait For Your Payment Request.";
	       //   if($blnc1<0)
    	   //     {
        // 	         $blnc = $blnc1 + $p_amount;
    	   //     }
    	   //     else
    	   //     {
    	   //         if($blnc1<$p_amount)
    	   //          {
    	   //          $blnc =  $p_amount - $blnc1;
    	   //          }
    	   //         else
    	   //         {
    	   //             $blnc =  $blnc1 - $p_amount;
    	   //         }
		      //  }
	       //  $val1 = array('balance'=> $blnc,
	       //                 'date'=>date('Y-m-d')
	       //                 );
	       //  $this->db->where('username',$username);
	       //  $up = $this->db->update('m_balance',$val1);
	       //  if ($up)
	       //  {
	       //   echo "Payment Successfully Done.";   
	       //  }
	       //  else
	       //  {
	       //      echo "Balance not Update";
	       //  }
	     }
	     else
	     {
	         echo "Payment Not Complete.";
	     }
	     	//redirect('index.php/shopController/pay_and_receive/5'); 
	  }
	  
	}

	  public function saleStock(){
   $dt=date("dmy",strtotime(date("y-m-d")));
      $b_code   = $this->session->userdata("id");
      $billno   = $this->db->count_all("invoice_serial");
      $billno   = $billno + 1000;
      $bill_no  = $dt.$b_code."I".$billno;
      $utt=$this->input->post("usernam");

//  print_r($utt);
//  exit();
  for($i=1; $i<=15;$i++)
  {
    if(strlen($this->input->post("item_name$i"))>0)
    {
    $data = array(
        "p_code" => $this->input->post("item_no$i"),
        "p_name" => $this->input->post("item_name$i"),
        "pries_per_item" => $this->input->post("item_price$i"),
        "item_quant" => $this->input->post("item_quantity$i"),
        "sub_total" => $this->input->post("sub_total$i"),
        "category" => $this->input->post("item_catid$i"),
        
        "date"=> date("Y-m-d"),
        "bill_no" =>$bill_no,
        "subbranch_code"=>$this->session->userdata("id")
      );
          $tablename='product_sale';
         // $this->load->model("registration1");
          $var1= $this->shop->insert($tablename,$data);
        //  print_r($var1);
         // exit();
    }

}
     $bal = array(
            
             "paid" => $this->input->post("paid"),
             "total"=> $this->input->post("tt"),     
             "date"=> date("Y-m-d"),
              "bill_no" =>$bill_no,
              "valid_id" => $this->input->post("usernam"),
             
              "subbranch_code"=>$this->session->userdata("id")
           );
              $this->db->insert("product_saletotal",$bal);
    // print_r($var1);
    // exit();
      if($var1):
        $invoiceData = array(
          "invoice_no" => $bill_no,
          "reason" => "Sale Invoice",
          "invoice_date" => date("Y-m-d"),
          "subbranch_id"=>$this->session->userdata("id")
        );
          $this->db->insert("invoice_serial",$invoiceData);
        
            $this->db->where("id",$var1);
            $dt3=$this->db->get("product_sale")->row();
          //    print_r($dt3);
            //               print_r($var1);
                         // exit();
            $this->db->where("bill_no",$bill_no);
            $data5=$this->db->get("product_saletotal")->row();
            // print_r($data5);
            // exit();
            $p_code= $dt3->p_code;
            $this->db->where("p_code",$p_code);
            $this->db->or_where("sec",$p_code);
            $this->db->where("subbranch_id",$b_code);
            $var=$this->db->get("subbranch_wallet");
        if($var->num_rows() > 0):
          foreach ($var->result() as $row):
            $q = $row->rec_quantity;
            $totsel = $row->sale_quantity;

            $data1 = array(
              "rec_quantity" => ($q - $data["item_quant"]),
              "sale_quantity" => ( $totsel + $data["item_quant"]),
              "date" =>  date("y-m-d")
            );
           
           $this->db->where("p_code",$p_code);
            $this->db->or_where("sec",$p_code);
           $var=$this->db->update("subbranch_wallet",$data1);
          endforeach;

           $pamt= $this->input->post('paid');
         
           $username=$this->session->userdata("username");
          $op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
          
           //$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username='$username'")->row();
           $balance = $op1->closing_balance;
           $close1 = $balance + $pamt;

           $bal = array(
            "closing_balance" => $close1
          );
          $this->db->where("login_username",$username);
          $this->db->where("opening_date",date('Y-m-d'));
          $this->db->update("opening_closing_balance",$bal);

        //   $op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."' AND login_username= 'admin'")->row();
        //   $balance = $op1->closing_balance;
        //   $close2 = $balance + $pamt;

        //   $closebal = array(
        //   "closing_balance" => $close2
        //  );
          
        //   $this->db->where("login_username","admin");
        //   $this->db->where("opening_date",date('Y-m-d'));
        //   $this->db->update("opening_closing_balance",$closebal);
        
        //  $bill_no=$this->input->post('invoice_no');	
          $daybook=array(
           "amount" =>$pamt,
           "pay_date"=> date("Y-m-d"),
           "reason" =>"From sale Stock",
           "pay_mode"=>"Cash",
           "dabit_cradit"=>"1",
           "closing_balance" => $close1,
           "paid_to" =>$this->session->userdata("username"),
           "invoice_no" => $bill_no,
           "paid_by"=> $this->input->post("usernam")
        
       );
       $this->db->insert("day_book", $daybook);
 


           ?>
             <script>
            alert('Product Sell successfully');
            </script>;
            <?php  
          
                      $this->db->where("username",$utt);
                      $data= $this->db->get("customers")->row();
                     
                      $count=0;
                      $sender = $this->db->get("sms_setting")->row();
                      $sende_Detail =$sender;
                      $msg = "Dear Sir Thanks For Shopping With  Us. Your Shopping Amount is Rs - ".$this->input->post("tt")." /- Thank You .";
                      $mobileno =	$data->mobile;
                      
                    sms($mobileno,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
                      
                     $totamt= $this->input->post("tt");
                     $prcntamt= 2;
                     $prcnt=$totamt * $prcntamt;
                     $totprcnt =$prcnt/100 ;
                    $this->db->where("username",$utt);
                      $dt2=$this->db->get("customers")->row();
                     
                     $this->db->where("cid",$dt2->id);
                  $pvresult = $this->db->get("pv");
                  if($pvresult->num_rows()>0){
                       $pv2=$pvresult->row()->rupee; 
                  }else{
                       $pv2=0; 
                  }
                  
                    $newpv=$pv2+$totprcnt;
                    $pv1=array(
                    "rupee"=>$newpv
                    );
                    $this->db->where("cid",$dt2->id);
                     $uppv= $this->db->update("pv",$pv1);
                     $msg = "Dear Sir Thanks For Shopping With  Us. Your CashBack Amount is Rs - ".$totprcnt." /- Thank You .";
                      $mobileno =$data->mobile;
                      
                     sms($mobileno,$msg,$sende_Detail->uname,$sende_Detail->password,$sende_Detail->sender_id);
                
                       //$id=$dt->parentID;
                     ////$this->db->where("id",$id);
                     //  $parentdt=$this->db->get("customers")->row();
                    //$cid=$parentdt->username;

                     
                    $i=1;
                
                   $data3= $this->shop->commision($i,$utt,$totamt,$bill_no);
                   
                   if($data3){ ?>
                       <script>
                           window.location.href="<?php echo base_url();?>shopController/saleInvoice/<?php echo $bill_no;?>";
                       </script>
                        <!--redirect('shopController/saleInvoice/'.$bill_no);-->
                  <?php  }
                   //print_r($data3);
                   
                   
        endif;
      endif;
     

}

  function sbranchOrderlist(){
    if($this->session->userdata("login_type")== 1){
    $data['activeList'] = $this->branch->getActiveList();
  }else if($this->session->userdata("login_type")== 2){
      $data['activeList'] =$this->branch->getValue();
  }
    $data['pageTitle'] = 'Shop Order Detail';
    $data['smallTitle'] = 'Shoph Order Detail';
    $data['mainPage'] = 'Shop Order Detail ';
    $data['subPage'] = 'Shop Order Detail';
    $data['title'] = 'Shop Order Detail';
    $data['headerCss'] = 'headerCss/sublistCss';
    $data['footerJs'] = 'footerJs/stockJs';
    $data['mainContent'] = 'Shop/subBranchOrderList';
    $this->load->view("includes/mainContent", $data);
  }
  function branchorderList(){
		$branch = $this->input->post('branchid');
		//print_r($branch);exit();
  $data['view1']=$this->shop->subbranch($branch);
	}
	function branchorderder(){
	 $branchOrder = $this->input->post('subBranchid');
	 $data['subid']= $this->input->post('subBranchid');
// 	 $data['footerJs'] = 'footerJs/dashboardJs';
     $data['footerJs'] = 'footerJs/stockJs';
	 $data['view'] = $this->shop->orderList($branchOrder);
	 $this->load->view('Shop/orderList',$data);
	}
	function invoiceDetail(){
	//	$susername= $this->uri->segment(3);
		$data['view'] = $this->uri->segment(3);
		$data['pageTitle'] = 'Shop Order Detail';
    $data['smallTitle'] = 'Shop Order Detail';
    $data['mainPage'] = 'Shop Order Detail ';
    $data['subPage'] = 'Shop Order Detail';
    $data['title'] = 'Shop Order Detail';
    $data['headerCss'] = 'headerCss/sublistCss';
    $data['footerJs'] = 'footerJs/sublistJs';
    $data['mainContent'] = 'Shop/InvoiceDetail';
    $this->load->view("includes/mainContent", $data);
	}
	  public function deleteorder(){
          $data['invoice']=$this->uri->segment(3);
          redirect('shopController/sbranchOrderlist','refresh');

         }
         public function dlete_shop()
         {
            $row_id = $this->input->post('rowid');  
            $this->db->where('id',$row_id);
           $chk = $this->db->delete('sub_branch');
           if($chk)
           {
               echo "Shop Deleted";
           }
           else
           {
               echo "Shop Not Deleted";
           }
         }
}


