
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- start: EXPORT DATA TABLE PANEL  -->
      <div class="panel panel-white">
      <div class="panel-heading panel-red">
          <h4 class="panel-title"> <span class="text-bold">Registered Favourite List</span></h4>
          <div class="panel-tools">
            <div class="dropdown">
              <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                <i class="fa fa-cog"></i>
              </a>
              <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                <li>
                  <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                </li>
                <li>
                  <a class="panel-refresh" href="#">
                    <i class="fa fa-refresh"></i> <span>Refresh</span>
                  </a>
                </li>
                <li>
                  <a class="panel-config" href="#panel-config" data-toggle="modal">
                    <i class="fa fa-wrench"></i> <span>Configurations</span>
                  </a>
                </li>
                <li>
                  <a class="panel-expand" href="#">
                    <i class="fa fa-expand"></i> <span>Fullscreen</span>
                  </a>
                </li>
              </ul>
            </div>
            <a class="btn btn-xs btn-link panel-close" href="#">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="panel-body">
                  <div class="alert btn-purple">
                      <button data-dismiss="alert" class="close"></button>
                    <h4 class="media-heading text-center">Welcome to Subcriber Favourite List </h4>
                    <p>Here you can see Perticular Subscriber Favourite. List<br>
                    </p> </div>
            <?php if($activeList->num_rows()>0 ){
          $row = $activeList->row();
?>
          <center><h5 style="color:#01a9ac;font-size:30px;"><?php echo $row->name;?> [Favourite List]</h5></center> 
          <div class="row">
            <div class="col-md-12 space20">
              <div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                  Export <i class="fa fa-angle-down"></i>
                </button>
                
                <ul class="dropdown-menu dropdown-light pull-right">
                  <li>
                    <a href="#" class="export-pdf" data-table="#fvlist" >
                      Save as PDF
                    </a>
                  </li>
                 
                  
                  <li>
                    <a href="#" class="export-excel" data-table="#fvlist" >
                      Export to Excel
                    </a>
                  </li>
                  <li>
                    <a href="#" class="export-doc" data-table="#fvlist" >
                    Export to Word
                  </a>
                  </li>
                 
                
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="sample-table-2">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                     <th>S. No.</th>
                   <th>Company</th>
                  <th>Product  Name</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th> Size</th>
                  <th> Image</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                //echo $username;
                     $this->db->where('customer_id',$row->id);
                 $dt= $this->db->get("favourite_list")->result();
                // print_r($dt);
                    $i=1;
                  foreach($dt as $row):?>
                <tr class="text-uppercase">
                  <td><?php echo $i;?></td>
                  <?php 
                          $this->db->where('id',$row->product_code);
                   $stproduct=$this->db->get('stock_products')->row(); 
                   ?>
                  <td><?php echo $stproduct->company;?></td>
                  <td><?php echo $stproduct->name;?></td>
                 <?php  if($stproduct->sub_category==0) { ?>
                  <td>Not Selected</td>
                  <td>Not Selected</td>
                 <?php       }
                     else{
                      $this->db->where('id', $stproduct->sub_category);
                      $subcate=$this->db->get('sub_category')->row();
                      if($subcate){ 
                      $subcate1=$subcate->name;
                      $this->db->where('id',$subcate->cat_id);
                       $cate=$this->db->get('category')->row();
                       
                      if($cate){$cate1=$cate->name;} ?>
                   
                  <td><?php echo $cate1;?></td>
                     <td><?php echo $subcate1;?></td><?php }  else{ ?>
                       <td><?php echo "not define"?></td>
                     <td><?php echo "not define";?></td>
                     <?php } }?>

                  <td><?php echo $stproduct->size;?></td>
                
                 <td> <?php if($stproduct->file1){?><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stproduct->file1; ?>" style="height:50px;width:100px;"> <?php } else { ?>
                   <img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $stproduct->file2; ?>" style="height:50px;width:100px;"><?php }?></td>
                   </tr>
                <?php  $i++;
                endforeach;
                   ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end: EXPORT DATA TABLE PANEL -->
    </div>
  <?php }?>
  </div>
  <!-- end: PAGE CONTENT-->
</div>