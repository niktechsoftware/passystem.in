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
                <div class="card-block">
                    <div class="row invoive-info">
                         <div class="col-md-4 col-sm-6">
                            <h6 class="m-b-20">Invoice Number : <span class="text-primary" style="font-size:30px;"><?php echo $invoice;?></span></h6>
                             <?php 
                           //  $this->db->select_sum('quantity');
                           //  $this->db->select_sum('subtotal');
                             $this->db->where('invoice_number',$invoice);
                            
                             $dt1= $this->db->get("product_trans_detail")->row();
                             
                           ?>
                      lock no = <?php echo $dt1->lock_no; ?><br>
                      Assign Delivery Incharge :<?php $this->db->where("id",$dt1->del_boy);
                     $empd = $this->db->get("employee")->row();echo $empd->name;?>
                        </div>
                       <div class="col-md-4 col-sm-6"> 
                       <?php 
                            if($this->session->userdata('login_type')==1)
                           { 
                                $this->db->where('admin_username',$this->session->userdata('username'));
                             $admindt=$this->db->get('general_settings');
                                 $name=$admindt->row()->owner_name;
                                  $mobile=$admindt->row()->mobile_number;
                           ?>
                               <h6 class="m-b-20 ">Sender Detail -<br><br> Username:-<span class="text-primary"><?php echo $this->session->userdata('username');?></span></h6>
                                <h6 class="text-uppercase">Name :
                                <span class=" text-primary"><?php echo $name;?></span>
                                 </h6>
                           <?php }
                           elseif($this->session->userdata('login_type')==2)
                           {
                               $this->db->where('username',$this->session->userdata('username'));
                             $branchdt=$this->db->get('branch');
                                 $name=$branchdt->row()->b_name;
                                  $mobile=$branchdt->row()->mobile;
                           ?>
                                <h6 class="m-b-20 ">Sender Detail -<br><br> Username:-<span class="text-primary"><?php echo $this->session->userdata('username');?></span></h6>
                                <h6 class="text-uppercase">Branch Name :
                                   <span class=" text-primary"><?php echo $name;?></span>
                                </h6>
                                <h6 class="text-uppercase">Branch Owner Name :
                                   <span class=" text-primary"><?php echo $branchdt->row()->name;?></span>
                                </h6>
                          <?php }
                           elseif($this->session->userdata('login_type')==4)
                           { 
                                 $this->db->where('username',$this->session->userdata('username'));
                             $sbranchdt=$this->db->get('sub_branch');
                                 $name=$sbranchdt->row()->bname;
                                  $mobile=$sbranchdt->row()->mob_no;
                           ?>
                                <h6 class="m-b-20 ">Sender Detail -<br><br> Username:-<span class="text-primary"><?php echo $this->session->userdata('username');?></span></h6>   
                                <h6 class="text-uppercase">Shop Name :
                                    <span class=" text-primary"><?php echo $name;?></span>
                                </h6>
                                <h6 class="text-uppercase">Shop Owner Name :
                                   <span class=" text-primary"><?php echo $sbranchdt->row()->ownername;?></span>
                                </h6>
                          <?php }
                       ?>
                            
                            <h6 class="text-uppercase ">Mobile Number :
                                <span class="text-primary"><?php echo $mobile;?></span>
                            </h6>
                           
                        </div>
                      
                       
                    <div class="col-md-4 col-sm-6"> 
                            <h6 class="m-b-20 ">Reciever Detail -<br><br> Username:-<span class="text-primary"><?php echo $dt1->reciver_usernm;?></span></h6>
                               <?php 
                              $this->db->where('admin_username',$dt1->reciver_usernm);
                             $admindt1=$this->db->get('general_settings');
                             if($admindt1->num_rows()>0){
                                 $name1=$admindt1->row()->owner_name;
                                  $mobile1=$admindt1->row()->mobile_number;
                                  ?>
                                   <h6 class="text-uppercase">Name :
                                <span class=" text-primary"><?php echo $name1;?></span>
                            </h6>
                          <?php   }
                          else{
                              $this->db->where('username',$dt1->reciver_usernm);
                             $branchdt1=$this->db->get('branch');
                             if($branchdt1->num_rows()>0){
                                 $name1=$branchdt1->row()->b_name;
                                  $mobile1=$branchdt1->row()->mobile; ?>
                                   <h6 class="text-uppercase">Branch Name :
                                <span class=" text-primary"><?php echo $name1;?></span>
                            </h6>
                             <h6 class="text-uppercase">Branch Owner Name :
                                <span class=" text-primary"><?php echo $branchdt1->row()->name;?></span>
                            </h6>
                          <?php   } 
                             else{
                              $this->db->where('username',$dt1->reciver_usernm);
                             $sbranchdt1=$this->db->get('sub_branch');
                             if($sbranchdt1->num_rows()>0){
                                 $name1=$sbranchdt1->row()->bname;
                                  $mobile1=$sbranchdt1->row()->mob_no; ?>
                                   <h6 class="text-uppercase">Name :
                                <span class=" text-primary"><?php echo $name1;?></span>
                            </h6>
                             <h6 class="text-uppercase">Name :
                                <span class=" text-primary"><?php echo $sbranchdt1->row()->ownername;?></span>
                            </h6>
                          <?php   }
                             }
                          }
                           ?>
                             
                            <h6 class="text-uppercase ">Mobile Number :
                                <span class="text-primary"><?php echo $mobile1;?></span>
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
                                            <th>Nos.</th>
                                            <th>Rate(Rs.)</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                             <?php 
                            
                            $this->db->where('invoice_number',$invoice);
                             $row= $this->db->get("product_trans_detail");
                                  $i=1; $total=0; foreach($row->result() as $data):?>
                                         <tr class="text-uppercase">
                                            <td><?php echo $i;?></td>
                                            <td>

                                                <?php
                                                
                                                $this->db->where('id',$data->p_code);
                                                // $this->db->or_where('sec',$data->p_code);
                                                      $productdetail=$this->db->get('stock_products')->row();
                                                     $amount= $productdetail->selling_price *$data->quantity;
                                                         ?>
                                                <h6><?php echo $productdetail->name;?></h6>
                                                <p><?php  echo $productdetail->company ."[ ". $productdetail->p_type . " ] ";?></p>
                                            </td>
                                            <td><?php echo $productdetail->size; ?></td>
                                            <td><?php echo $data->quantity; ?></td>
                                            <td><?php echo $productdetail->selling_price; ?></td>
                                            <td><?php echo $amount ; ?></td>
                                            <?php $total =$total + $amount;?>
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
                                        <td><?php echo $total;?></td>
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
                                            <h5 class="text-primary"><?php echo $total;?></h5>
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
