<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
      <!-- Zero config.table start -->
     

      <div class="panel panel-white">
        <div class="panel-heading panel-red">
        <?php     
       $pcode =$this->uri->segment(3);
                            $this->db->where("id",$pcode);
                            $stckdt1= $this->db->get("stock_products")->row(); ?>
        <center>  <h5  class="text-bolde"><?php echo  $stckdt1->name;?></h5><h5 class="text-bolde">[Subscribers List]</h5></center>
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
                                        <a href="#" class="export-pdf" data-table="#subdemlist3">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-png" data-table="#subdemlist3">
                                            Save as PNG
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-csv" data-table="#subdemlist3">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#subdemlist3">
                                            Save as TXT
                                        </a>
                                    </li>
                                   <li>
                                        <a href="#" class="export-excel" data-table="#subdemlist3">
                                            Export to Excel
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#" class="export-doc" data-table="#subdemlist3">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#subdemlist3">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
          <div class=" table-responsive">
            <table id="subdemlist3" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Customer Name</th>
                  <th>Mobile Number</th>
                  <th>Company Name</th>
                  <th>Type Of Product</th>
                <!--   <th>Date of Demand</th> -->
                  <!-- <th> Password</th> -->

                </tr>
              </thead>
              <tbody>
                <?php 
                  
                 $this->db->where("product_code",$pcode);
                 $dt= $this->db->get("favourite_list");
                 if( $dt->num_rows()>0){
                    $i=1;
                  foreach($dt->result() as $row):?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php 
                  $this->db->where('id',$row->customer_id);
                          $row1=$this->db->get('customers')->row();

                          $this->db->where("id",$row->product_code);
                          $stckdt1= $this->db->get("stock_products")->row();
                   ?>
                  <td><a href="<?php echo base_url();?>subscriberController/showfavlist/<?php echo $row1->id;?>"><span style="color:#01a9ac;"><?php echo $row1->name. " [ ". $row1->username . " ] ";?></span></a></td>
                  <td><?php echo $row1->mobile;?></td>
              <!--     <td><?php echo  $stckdt1->name;?></td> -->
                  <td><?php echo  $stckdt1->company;?></td>
                  <td><?php echo  $stckdt1->p_type;?></td>
                 <!--  <td><?php echo $row->date;?></td> -->
                  <!-- <td><?php echo $row->password?></td> -->
                </tr>
                <?php  $i++;
                endforeach;
                   } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
</div>
</div>