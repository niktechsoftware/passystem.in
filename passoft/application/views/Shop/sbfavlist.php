<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <center><h5 class="text-bold">Demand List By Subscriber</h5></center>
        </div>
         <div class="panel-body">
        <center><p style="color:#01a9ac;font-size:20px;align:justify;">In This Area You Can View All Subscribers Demand List .</br>
        On click View Demand List You Can View Perticular Subscriber Demand List</p></center>
        </div>
        <div class="panel-body">
             <div class="row">
                        <div class="col-md-12 space20">
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                    Export <i class="fa fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-light pull-right">
                                    <li>
                                        <a href="#" class="export-pdf" data-table="#shopfavlist">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-png" data-table="#shopfavlist">
                                            Save as PNG
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-csv" data-table="#shopfavlist">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#shopfavlist">
                                            Save as TXT
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-xml" data-table="#shopfavlist">
                                            Save as XML
                                        </a>
                                    </li>
                                 <li>
                                        <a href="#" class="export-excel" data-table="#shopfavlist">
                                            Export to Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-doc" data-table="#shopfavlist">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#shopfavlist">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
          <div class=" table-responsive">
            <table id="shopfavlist" class="table table-striped table-bordered nowrap">
              <thead>
                <tr style="background-color:#1ba593; color:white;">
                  <th>S.No.</th>
                  <th>Subscriber Name</th>
                  <th>Sub Branch Name</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                 <th>view Demand List</th>
                </tr>
              </thead>
              <tbody>
                <?php $gh=0;
                        $subid=$this->session->userdata('id');
                        $this->db->where('id',$subid);
                        $sub=$this->db->get('sub_branch')->row();
                        $sub1=$sub->district;
                        
                         $this->db->where('sub_branchid',$subid);
                         $this->db->where('district',$sub1);
                         $custdetail=$this->db->get('customers');
                        //  print_r($subid);
                         // print_r($sub1);
                         if($custdetail->num_rows()>0){

                          $i=1;

                       foreach($custdetail->result() as $custdetail1):
                          //   print_r($custdetail1);
                            // exit();
                      $this->db->distinct(); 
                      $this->db->select('customer_id');
                      $this->db->select('product_code');
                      $this->db->where('customer_id',$custdetail1->id);
                      $stckdt=$this->db->get("favourite_list");
                     if($stckdt->num_rows()>0){
                    $i=1;
                 $gh=0; foreach($stckdt->result() as $data):
                //echo $data->product_code;
                
                $this->db->where("subbranch_id",$this->session->userdata("id"));
                   $this->db->where_in("p_code",$data->product_code);
                 $dt= $this->db->get("subbranch_wallet");
                
              
                
                 if($dt->num_rows()>0){
                
                $receive=  $dt->row()->rec_quantity;
                $saleq = $dt->row()->sale_quantity;
             }else{
                 $receive=0;
                 $saleq=0;
             }
                 $total=$receive;
                 
                 if((($receive-$saleq)<2)){
                  $gh++;;
                 } 
                 
                 endforeach; } 
                 
                if($gh>0){  ?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php //if($row >0){ }else{}
                          
                   ?>
                  <td>
                      
                     
                     <span style="color:#01a9ac;"><?php echo $custdetail1->name. " [ ". $custdetail1->username . " ] ";?></span> 
                          </td>
                  <td><?php echo $custdetail1->name;?></td>
                  <td><?php  echo $custdetail1->mobile;?></td>
                  <td><?php echo $custdetail1->address;?></td> 
                    <td><a href="<?php echo base_url();?>shopController/showsbfavlist/<?php echo $custdetail1->id;?>" class="btn btn-info">View Demand List</a></td> 
                </tr>
                <?php  $i++;}
                endforeach;
                      }
                      
                    
                   ?>
              </tbody>
            </table>
          </div>
        </div>
      
   
      </div>
    </div>
  </div>
</div>