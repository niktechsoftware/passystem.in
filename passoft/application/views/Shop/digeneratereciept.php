 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
         <?php //$this->load->view('headerCss/sublistCss');?>
     <div class="table-responsive">
           <div class="row">
                        <div class="col-md-12 space20">
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                    Export <i class="fa fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-light pull-right">
                                    <li>
                                        <a href="#" class="export-pdf" data-table="#sample-table-2">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-png" data-table="#sample-table-2">
                                            Save as PNG
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-csv" data-table="#sample-table-2">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#sample-table-2">
                                            Save as TXT
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-xml" data-table="#sample-table-2">
                                            Save as XML
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-sql" data-table="#sample-table-2">
                                            Save as SQL
                                        </a>


                                        <a href="#" class="export-json" data-table="#sample-table-2">
                                            Save as JSON
                                        </a>
                                    <li>
                                        <a href="#" class="export-excel" data-table="#sample-table-2">
                                            Export to Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-doc" data-table="#sample-table-2">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#sample-table-2">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
              <table id="sample-table-2" class="table table-striped " >
               <thead>
              <tr style="background-color:#1ba593; color:white;">
                    <th>S.No</th>
                    <th>Order Num</th>
                    <th>Sub.N</th>
                    <th>Sub.U.N</th>
                    <th>Payment Mode</th>
                    <th>Total Amount</th>
                    <th>Deatils</th>
                    <th>Amount Recieve</th>
              </tr>
                </thead>
                <tbody>
                  <?php if($odrdernum>0){
                  
                  $i=1;foreach($oderdetail as $row): ?>
                  <tr class="text-uppercase text-black">
                    <td><?php echo $i;?></td> 
                    <td><?php echo $row->order_no;?></td>
                    <?php 
                     $id=$this->session->userdata("id");
                            $this->db->where("sub_branchid",$id);
                       $this->db->where('id',$row->del_boy_id);
                       $deliveryboy=$this->db->get('employee')->row();
                       
                             $this->db->select_sum('subtotal');
                             $this->db->where('order_no',$row->order_no);
                             $this->db->where('cust_id',$row->cust_id);
                            // $this->db->where('date',$custusr->order_date);
                             $dt1= $this->db->get("shopbill")->row();
                     
                       $this->db->where('id',$row->cust_id);
                       $customer=$this->db->get('customers')->row();
                    ?>
                    <td><?php echo $customer->name;?></td> 
                    <td><?php echo $customer->username;?></td> 
                    <td><?php echo $row->payment_mode;?></td>
                    <td><input type="text"  id="amount<?php echo $i;?>" value="<?php echo $dt1->subtotal;?>" class="form-control" readonly style="width:90px;height:30px;"> </td>
                    <td><?php if($row->adminpayment_receive ==0){?><input type="text" class="form-control" id="detail<?php echo $i;?>" style="width:190px;height:40px;" ><?php }else{ echo $row->detail; }?></td>
                    
                     <td><?php if($row->adminpayment_receive ==0){?><button id="reciveamount<?php echo $i;?>" class="btn btn-primary">Approve</button>
                    <button id="recivedamount1<?php echo $i;?>" class="btn btn-success">Approved</button>
                    <input type="hidden" id="order<?php echo $i;?>" value="<?php echo $row->order_no;?>">
                    <?php } else{ ?><button id="recivedamount<?php echo $i;?>" class="btn btn-success">Amount Approved</button><?php }?></td>
                   
                    </tr>
                    <script>
              $(document).ready(function(){
              $('#recivedamount1<?php echo $i;?>').hide();
              $('#confirmamounttopay').hide();
               $("#reciveamount<?php echo $i;?>").hide();
              $("#reciveamount<?php echo $i;?>").click(function(){
              var order=$("#order<?php echo $i;?>").val();
              var amount=$("#amount<?php echo $i;?>").val();
              var deatil =$('#detail<?php echo $i;?>').val();
              var amt=  $('#amountpaid').val();
              if(deatil!=""){
             $.post("<?php echo site_url("shopController/adminpaymentcollect")?>",{order:order,amount:amount,amt:amt,deatil:deatil},function(data){
                // alert(data);
                $('#showamountrecieve').html(data);
                $('#amountpaid').val(data);
                if($('#amountpaid').val()>0)
                {
                   $('#confirmamounttopay').show();  
                }
               $('#reciveamount<?php echo $i;?>').hide();
             $('#recivedamount1<?php echo $i;?>').show();
                  });
              }
            });
            
             $("#detail<?php echo $i;?>").keyup(function(){
                var deatil =$('#detail<?php echo $i;?>').val();  
                 if(deatil.length>4){
              $("#reciveamount<?php echo $i;?>").show() 
                 }
                 else
                 {
                      $("#reciveamount<?php echo $i;?>").hide() 
                 }
            
         });  
              });  
         </script>
                    <?php $i++;endforeach;?>
                </tbody>
              </table>
              </div>
             
                 
          
                <?php } ?>
                
 <?php //$this->load->view('footerJs/sublistJs');?>
  


       
   