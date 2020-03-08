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
          <div class=" table-responsive">
            <table id="subdemlist" class="table table-striped table-bordered nowrap">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Subscriber Name</th>
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