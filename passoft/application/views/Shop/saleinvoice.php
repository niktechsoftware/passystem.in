<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
  <title><?php echo $title ?></title>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css/animate.min.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.theme.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.transitions.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/DataTables/media/css/DT_bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/lightbox2/css/lightbox.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/theme-default.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
</head>

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.csss">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
<script>
function myFunction() {
  window.print();
}
</script>

<style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }
    
    
    #printcontent * {
      visibility: visible;
    }

    #printcontent {
      position: absolute;
      top: 40px;
      left: 30px;
    }
  }
  </style>
  
  <body>


<div  id="printcontent">
    <!-- Container-fluid starts -->
    <div class="container">
        <!-- Main content starts -->
        <div>
            <!-- Invoice card start -->
            <div class="card">
                <div class="row invoice-contact">
                    <div class="col-md-8">
                       <!--<center> <h2 class="text-primary">Order Invoice  </h2></center>-->
                        <div class="invoice-box row">
                            <div class="col-sm-12" style="padding:30px;">
                                <table >
                                    <tbody>
                                        <tr >
                                            <td>
                                                 <img src="<?php echo $this->config->item('asset_url')?>/images/logo.png"
                                             class="m-b-10" alt="Theme-Logo" style="max-height:110px;max-width:150px;">  </td>
                                        
                                            <td> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<font size="5">Progeny Alteration Of Subscribing System</font><br>

                                       &nbsp; &nbsp; &nbsp; &nbsp;<font size="3">W2/618, JUHI KALAN DAMODAR NAGAR BARRA ,</font>
                                                <br>
                                            <font size="3">  &nbsp; &nbsp;&nbsp; &nbsp;KANPUR NAGAR -208027,  Mobile : +91 7084175885</font>
                                             <br>
                                                &nbsp; &nbsp; &nbsp;&nbsp;<font size="3"> <span> Email :-<strong>passystem1@gmail.com</strong>, www.passystem.in </span></font>
                                                <br>
                                               <font size="3">  &nbsp; &nbsp;&nbsp; &nbsp;GST :       </font>
                                            </td>
                                        </tr>
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="card-block">
                    <div class="row invoive-info">
                        <div class="col-md-4 col-xs-12 invoice-client-info">
                            <h6>Client Information :</h6>
														<?php
													
													$id = $this->uri->segment(3);


													$this->db->where("bill_no",$id);
													$saletot=$this->db->get("product_saletotal")->row();
												
													$valid_id = $saletot->valid_id;

													$this->db->where("bill_no",$id);
													$rowb=$this->db->get("product_sale")->row();

												
													$category = $rowb->category;
													// $valid_id = $rowb->valid_id;
												//	$p_name = $rowb->p_name;

													
														$this->db->where("username",$valid_id);
														$custdetail=$this->db->get("customers")->row();
														
														// $sqlc=mysqli_query($this->db->conn_id,"select * from customers where username='$valid_id' ");
														// $custdetail=mysqli_fetch_object($sqlc);
														// print_r($sqlc);
																												?>
                            <h6 class="m-0">Name :<span class="text-primary text-uppercase"> <?php echo $custdetail->name;?></span></h6>
                            <h6 class="m-0 m-t-10">Address:<span class="text-primary text-uppercase"> <?php echo $custdetail->address;?></span></p>
                            <h6 class="m-0">Mobile Number:<span class="text-primary text-uppercase"> <?php echo $custdetail->mobile;?></span></p>
                          
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6>Order Information :</h6>
                             <table class="table table-responsive invoice-table invoice-order table-borderless">
                                <tbody>
                                    
                                    <tr>
                                        <th>Payment Status:</th>
                                        <td>
                                            <span class="label label-warning">Paid</span>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th>Subscriber Order Id :</th>
                                        <td>
                                         <span class="label label-danger"><?php//  echo $custusr->order_no; ;?></span>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6 class="m-b-20">Invoice Number : <span><?php echo $id;?></span></h6>
                             <?php 
                             $this->db->select_sum('item_quant');
                             $this->db->select_sum('sub_total');
                           //  $this->db->where('order_no',$custusr->order_no);
                             $this->db->where('bill_no',$id);
                            // $this->db->where('date',$custusr->order_date);
                             $dt1= $this->db->get("product_sale")->row();
                           ?>
                     <!--  <td><?php echo $dt1->quantity;?></td>
                      <td></td> -->
                            <h6 class="text-uppercase text-primary">Total Amount:
                                <span><?php echo $saletot->paid;?></span>
                            </h6>
                            
                             <h6 class="text-uppercase">Payment Mode:<span  class="text-uppercase text-primary">
                                 Cash</span>
                            </h6>
                            
                                  
                        </div>
                 
                       
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table  invoice-detail-table">
                                    <thead>
                                        <tr class="thead-default">
                                            <th style="width:5px;">S.No</th>
                                            <th>Description</th>
                                             <th>Size</th>
                                              <th>Product Code</th>
                                            <th>Quantity</th>
											<th>Unit Price</th>
                                            <th>Amount</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <?php 
                            $this->db->where("bill_no",$id);
							$productdt=$this->db->get("product_sale");
                             
                                  $i=1; foreach($productdt->result() as $data):?>
                                    <?php 
                                                      $this->db->where('id',$data->p_code);
                                                      $productdetail1=$this->db->get('stock_products');
                                                      
                                                      if($productdetail1->num_rows()>0){
                                                          
                                                      $productdetail=$productdetail1->row();
                                                         ?>
                                                         
                                         <tr class="text-uppercase">
                                            <td><?php echo $i;?></td>
                                            <td>


                                              
                                                <h6><?php echo $productdetail->name;?></h6>
                                                <p><?php  echo $productdetail->company ."[ ". $productdetail->p_type . " ] ";?></p>
                                            </td>
                                             <td><?php echo $productdetail->size; ?></td>
                                              <td><?php echo $productdetail->hsn; ?></td>
                                            <td><?php echo $data->item_quant; ?></td>
                                            <td><?php echo $data->pries_per_item; ?></td>
                                            <td><?php echo $data->sub_total; ?></td>
                                        </tr>
                                        
                                       <?php  $i++; }  endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-responsive invoice-table invoice-total">
                                <tbody>
                                    <tr>
                                        <th> Total Amount :</th>
                                        <td><?php echo $saletot->total;?></td>
                                    </tr>
																		<tr>
                                        <th> Paid Amount :</th>
                                        <td><?php echo $saletot->paid;?></td>
                                    </tr>
                                    <tr>
                                        <th>Taxes :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>Discount : [ <strong><?php echo $saletot->discount_name;?> ]</strong> </th>
                                        <td><?php echo $saletot->discount;?></td>
                                    </tr>
                                    <tr class="text-info">
                                        <td>
                                           
                                            <h5 class="text-primary">Total :</h5>
                                        </td>
                                        <td>
                                            
                                            <h5 class="text-primary"><?php echo $saletot->paid;?></h5>
                                        </td>
                                    </tr>
                                     
                                     <tr class="text-info">
                                       
                                        <td>
                                            <h2 class="text-primary"  ><font color="blue"> <?php echo $saletot->description;?></font></h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--<h6>Terms And Condition :</h6>-->
                            <!--<p>Pas System  </p>-->
                        </div>
                    </div>
                   
                </div>
            </div>
            
            <!-- Invoice card end -->
            
        </div>
    </div>
    <!-- Container ends -->
</div>

</body>
<div class="row text-center">
                <div class="col-sm-12 invoice-btn-group text-center">
                    <button type="button"
                        class="btn btn-primary btn-print-invoice m-b-20 m-r-20" onclick="myFunction()">Print</button>
                    <!-- <a href="<?php echo base_url();?>wallet/adminorderapprove" class="btn btn-danger m-b-20">Cancel</a> -->
                </div>
            </div>
            <br>
             <center>  <a href="<?php echo base_url();?>shopController/index"  class ="btn btn-info">Done</a></center>
</html>
