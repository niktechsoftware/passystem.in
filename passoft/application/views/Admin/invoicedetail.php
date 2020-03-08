<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

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
            <div class="panel">
                <div class="row invoice-contact">
                    <div class="col-md-8">
                       <!--<center> <h2 class="text-primary">Order Invoice  </h2></center>-->
                        <div class="invoice-box row">
                            <div class="col-sm-12" style="padding:30px;">
                                <table >
                                    <tbody>
                                        <tr >
                                            <td>
                                          <img src="<?php echo $this->config->item('asset_url')?>/images/newwlogo.png"
                                             class="m-b-10" alt="Theme-Logo" style="max-height:70px;max-width:100px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Name :-<strong>Pass System </strong> </td>

                                        </tr>
                                        <tr>
                                            <td> W2/618, JUHI KALAN DAMODAR NAGAR BARRA ,KANPUR NAGAR
                                                <br>
                                                208027
                                            </td>
                                        </tr>
                                        <tr>
                                    <td><span class="__cf_email__"
                                        data-cfemail="6206070f0d22050f030b0e4c010d0f">Email :-<strong>passystem1@gmail.com</strong></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>+91 7084175885</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row ">
                        <div class="col-md-4 col-xs-12 invoice-client-info">
                            <h6>Client Information :</h6>
                            <?php   $this->db->where('order_no',$orderno);
                                    $custusr=$this->db->get('order_serial')->row();

                                    $this->db->where('id',$custusr->cust_id);
                                   $custdetail=$this->db->get('customers')->row();
                               ?>
                            <h6 class="m-0">Name :<span class="text-primary text-uppercase"> <?php echo $custdetail->name;?></span></h6>
                            <h6 class="m-0 m-t-10">Address:<span class="text-primary text-uppercase"> <?php echo $custdetail->address;?></span></p>
                            <h6 class="m-0">Mobile Number:<span class="text-primary text-uppercase"> <?php echo $custdetail->mobile;?></span></p>
                          
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6>Order Information :</h6>
                             <table class="table table-responsive invoice-table invoice-order table-borderless">
                                <tbody>
                                    <tr><?php 
                                     $data=$custusr->order_date;
                                     $date=date_create($data);?>
                                        <th>Order Date:</th>
                                        <td><?php echo date_format($date,"M/d/Y");?>
                                    </td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Payment Status:</th>
                                        <td>
                                            <span class="label label-warning"><?php if($custusr->payment_mode=="cashondelivery" && $custusr->ad_rec_pay ==0){ echo " Pending"; } else { echo " Paid"; }?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Subscriber Order Id :</th>
                                        <td>
                                         <span class="label label-danger"><?php  echo $custusr->order_no; ;?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6 class="m-b-20">Invoice Number : <span><?php echo $custusr->invoice_no;?></span></h6>
                             <?php 
                             $this->db->select_sum('quantity');
                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$custusr->order_no);
                             $this->db->where('cust_id',$custusr->cust_id);
                             $this->db->where('date',$custusr->order_date);
                             $dt1= $this->db->get("order_detail")->row();
                           ?>
                     <!--  <td><?php echo $dt1->quantity;?></td>
                      <td></td> -->
                            <h6 class="text-uppercase text-primary">Total Amount:
                                <span><?php echo $custusr->total_amount;?></span>
                            </h6>
                            
                             <h6 class="text-uppercase">Payment Mode:<span  class="text-uppercase text-primary">
                             <?php if($custusr->payment_mode=="cashondelivery"){ echo "Cash On Delivery";} 
								  else if($custusr->payment_mode=="online Paytm"){ echo "Paytm Qr Code And  Transaction id ". $custusr->transaction_id;}
								 else if($custusr->payment_mode=="online Account"){ echo "Direct PasSystem Account And  Transaction id ". $custusr->transaction_id;}
								 else if($custusr->payment_mode=="online BankQr"){ echo "Direct PasSystem Bank Qr Code And  Transaction id ". $custusr->transaction_id;}
							     else if($custusr->payment_mode=="online GooglePay"){ echo "Google Pay Transaction And  Transaction id ". $custusr->transaction_id;}
							     else if($custusr->payment_mode=="online BhimUPI"){ echo "Bhim UPI Transaction And  Transaction id ". $custusr->transaction_id;}
							     else if($custusr->payment_mode=="online PhonePe"){ echo "PhonePe Transaction And  Transaction id ". $custusr->transaction_id;}
					           	?></span>
                            </h6>
                            <?php 
                                   if($custusr->payment_mode=="online Paytm"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }
							        else if($custusr->payment_mode=="online Account"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }
									 else if($custusr->payment_mode=="online BankQr"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }
							 	   else if($custusr->payment_mode=="online GooglePay"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }
							 	   else if($custusr->payment_mode=="online BhimUPI"){ ?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }
							 	   else if($custusr->payment_mode=="online PhonePe"){?><h4 class="text-uppercase">Transaction Id :<span  class="text-primary"><?php echo $custusr->transaction_id;?></span></h4> <?php }?>
              
                        </div>
                    <div class="col-md-4 col-sm-6"> 
                            <h6 class="m-b-20 ">Delivery Detail -<br><br> Address:-<span class="text-primary"><?php echo $custusr->deliver_address;?></span></h6>
                             <?php 
                              $this->db->where('cust_id',$custusr->cust_id);
                             $this->db->where('recipt_address',$custusr->deliver_address);
                             
                               $daddress1 = $this->db->get("delivery_address");
                             if($daddress1->num_rows>0){
                               $daddress  =$daddress1->row();
                           ?>
                            <h6 class="text-uppercase">Name :
                                <span class=" text-primary"><?php echo $daddress->recipt_name;?></span>
                            </h6>
                            <h6 class="text-uppercase ">Mobile Number :
                                <span class="text-primary"><?php echo $daddress->recipt_mobilnm;?></span>
                            </h6>
                             <?php } ?>
                        </div>
                        <?php 
                                    $this->db->where('order_no',$orderno);
                                    $delivery=$this->db->get('order_serial')->row();
                        
                        
                        if($delivery->del_boy_id>0){?>
                      <div class="col-md-4 col-sm-6"> 
                             <?php 
                              $this->db->where('id',$delivery->del_boy_id);
                              $daboy = $this->db->get("delivery_boy");
                             if($daboy->num_rows>0){
                               $daboy1=$daboy->row();
                           ?>
                           <h6 class="m-b-20 ">Delivery Incharge Detail -<br><br>Name:-<span class="text-primary text-uppercase"><?php echo  $daboy1->name;?></span></h6>
                            <h6 class="text-uppercase ">Mobile Number :
                                <span class="text-primary"><?php echo $daboy1->mobile;?></span>
                            </h6>
                             <?php } } ?>
                    
                       </div>
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div >
                                <table class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr class="thead-default">
                                            <th style="width:5px;">S.No</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <?php 
                            
                             $this->db->where('order_no',$custusr->order_no);
                             $row= $this->db->get("order_detail");
                                  $i=1; foreach($row->result() as $data):?>
                                         <tr class="text-uppercase">
                                            <td><?php echo $i;?></td>
                                            <td>

                                                <?php $this->db->where('id',$data->p_code);
                                                      $productdetail=$this->db->get('stock_products')->row();
                                                         ?>
                                                <h6><?php echo $productdetail->name;?></h6>
                                                <p><?php  echo $productdetail->company ."[ ". $productdetail->p_type . " ] ";?></p>
                                            </td>
                                            <td><?php echo $data->quantity; ?></td>
                                            <td><?php echo $productdetail->selling_price; ?></td>
                                            <td><?php echo $data->subtotal; ?></td>
                                        </tr>
                                        
                                       <?php  $i++;endforeach;?>
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
                                        <th>Sub Total :</th>
                                        <td><?php echo $custusr->total_amount;?></td>
                                    </tr>
                                    <tr>
                                        <th>Taxes :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr>
                                        <th>Discount :</th>
                                        <td>00.00</td>
                                    </tr>
                                    <tr class="text-info">
                                        <td>
                                            <hr />
                                            <h5 class="text-primary">Total :</h5>
                                        </td>
                                        <td>
                                            <hr />
                                            <h5 class="text-primary"><?php echo $custusr->total_amount;?></h5>
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
</html>
