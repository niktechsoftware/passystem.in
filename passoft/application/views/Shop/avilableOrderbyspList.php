                               <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                   
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold"> Order List Details</h5></center>
                                                </div>
                                               
                                                <div class="panel-body">
                                                  <div class="col-sm-12"> 
                                                  <div class="col-sm-6">
                                               <div class=" table-responsive">
                  <table id="pendingorder" class="table  table-bordered ">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>SNO</th>
                    <th>Username</th>
                   <th> Name</th>
                 
               
                  </tr>
                </thead>
                <tbody>
                    
                  <?php 
                       //print_r($orderdetails);
                   
                  $i=1;
                   if($type=='a'){
                        $this->db->where_in("district",$bid);
	     $bres =  $this->db->get("sub_branch");
                   }else {if($type=='b'){
                        $this->db->where("district",$bid);
	     $bres =  $this->db->get("sub_branch");
	     
                   }
                   }
	     
	     
	     
	     
	     
	     $p=0; $j=0;  $m =0; $k=0;  $avail =array();
	       $deid = array();
	       foreach($bres->result() as $sbd):
	           $o=0;
	           $shopid=$sbd->id;
	           $subid=$sbd->id;
	           $this->db->where("id",$sbd->id);
	          $subde =   $this->db->get("sub_branch")->row();
	          $this->db->where("reciver_usernm",$subde->username);
	          $this->db->where("status",0);
	          $this->db->where("sender_usernm",$this->session->userdata("username"));
	        $checkold =   $this->db->get("product_trans_detail");
	        if($checkold->num_rows()>0){
	            
	        }else{
	         
	       
	           
	           
	             $this->db->where("sub_branchid",$shopid);
                 $this->db->where("status",0);
                 $osd = $this->db->get("order_serial");
              $order=0;  if($osd->num_rows()>0){
                   $order=1;
                  $i=0; 
                  $ordernum=array();
                   foreach($osd->result() as $ods):
                        $ordernum[$i]=$ods->order_no;
                       $i++; endforeach;
                       
                       
                        $this->db->distinct();
                        $this->db->select('p_code');
                        $this->db->where_in("order_no",$ordernum);
                       $stckdt =  $this->db->get("order_detail");
                       
                 
                
                 
                 if($stckdt->num_rows()>0){
               $j=1; $p=0; foreach($stckdt->result() as $data):
                // echo $data->p_code."<br>";
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
                     $demandqu = $totquan->quantity-$branchqu;
                     
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
             if($demandqu > 0){
                if(($receiveb-$saleqb) < $demandqu){
                
                 $deid[$k]=$subid;
                 $k++; 
                 $o++;
                 $p=0;
                 echo $data->p_code."-".$receiveb,"<br>";
                break ;
                   }else{
                       $p++;
                   }
                     
                 } 
                 }
                   endforeach; }  
                  
              } 
              if(($o<1) && ($p>0)){
                  $avail[$m]=$subid ;
                  $m++;
              }}
              endforeach;
                   
               
               if( $this->uri->segment(3)==2){
                 $h=1;    foreach($deid as $row1){
                 $this->db->where("id",$row1);
                $bt =  $this->db->get("sub_branch")->row();
	            ?>
	          
                  <tr class="text-uppercase text-center">
                    <td><?php echo $h;?></td>
                    
              
               
                       <td><button id ="selectlid<?php echo $h;?>" value = "<?php echo $row1;?>" class="btn btn-success"><?php echo $bt->username;?></button></td>
                        <td><?php echo $bt->bname;?></td>
                        
                        
                  
                  </tr>
              
                <script>
                    $('#selectlid<?php echo $h;?>').click(function(){
                          var sid = $('#selectlid<?php echo $h;?>').val();
                        
                          alert(sid);
                          $.post("<?php echo site_url('shopController/findlessproductb')?>", { sid : sid }, function(data){ 
                         
                              $('#showdetails').html(data);
                          })
                        });
                        </script>
      <?php $h++; } }else{
       $h=1; foreach($avail as $row1){
                 $this->db->where("id",$row1);
                $bt =  $this->db->get("sub_branch")->row();?>
         <tr class="text-uppercase text-center">
                    <td><?php echo $h;?></td>
                    
              
               
                       <td><button id ="selectlid<?php echo $h;?>" value = "<?php echo $row1;?>" class="btn btn-success"><?php echo $bt->username;?></button></td>
                        <td><?php echo $bt->bname;?></td>
                        
                        
                  
                  </tr>
              
                <script>
                    $('#selectlid<?php echo $h;?>').click(function(){
                          var sid = $('#selectlid<?php echo $h;?>').val();
                        
                          alert(sid);
                          $.post("<?php echo site_url('index.php/branchController/branchavi')?>", { sid : sid }, function(data){ 
                         
                              $('#showdetails').html(data);
                          })
                        });
                        </script>
      
      
    <?php  $h++;} } ?>
                </tbody>

              </table>

            </div>
            
                                                   
                                                      </div>    
                                                         <div class="col-sm-6" id ="showdetails">
                                                            
                                                        </div>
                                                       
                   
        </div>
    
    </div>
    </div>
    </div>
    </div>
</div>

