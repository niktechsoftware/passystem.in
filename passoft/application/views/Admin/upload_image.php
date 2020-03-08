 <div class="page-body">

   <div class="row">
     <div class="col-sm-12">
       <!-- Material tab card start -->
       <div class="panel panel-white">
         <div class="panel-heading panel-red">
           <h5 style="font-size:20px;" class="text-bold">Recently Launch & Best Offers Configuration</h5>

         </div>
         <div class="panel-body">
           <!-- Row start -->
           <div class="row m-b-30">
             <div class="col-lg-12 col-xl-12">

               <!-- Nav tabs -->
              
               <!-- Tab panes -->
               <div class="panel-body">

                 <div class="tab-pane active" id="home3" role="tabpanel">
                   <form method="post" action="<?php echo base_url();?>adminController/rlaunch" enctype="multipart/form-data">
                     
                     <div class="form-group  col-sm-6">
                       <input type="file" class="form-control text-uppercase"  id="categorynmae" name="category">
                         <span id="showcategory"></span>
                     </div>
                     <div class="row">
                       <div class="col-sm-6">
                       </div>
                       <div class="form-group col-sm-2">
                         <input type="submit" id="addcategory" class=" form-control btn-primary" value="Add">
                       </div>
                     </div>
                     </form>
                     <div class="panel panel-white">
                         <div class="panel-heading panel-red">Recently Launch Images</div>
                             <div class="panel-body">
                                    <div class="dt-responsive table-responsive" >
           

                         <table id="alt-pg-dt" class="table table-striped table-bordered nowrap" >
                              <thead >
                                <tr>
                                  <th >S.N</th>
                                   <th >Recently Launch Images</th>
                                    <th>Delete</th>
                                  
                                 </tr>
                              </thead>
                              <tbody>
             
                            <?php 
                           
                             $stckdt= $this->db->get("r_launch");
                             if($stckdt->num_rows()>0){
                             $i=1;
                             foreach($stckdt->result() as $data):
                              if(strlen($data->rlaunch)>0){
                              ?>
                              <tr class="text-uppercase text-center">
                                <td ><?php echo $i;?></td>
                                 <td ><img src="<?php echo $this->config->item('asset_url'). '/offerimg/' . $data->rlaunch; ?>"
                                                style="height:50px;width:100px;"></td>
                                  <td ><a href="<?php echo base_url();?>adminController/delete_rlaunch/<?php echo $data->id;?>"><i class="fa fa-trash-o" style="font-size:28px; color:green;"></i></a> </td>
                                </tr>
                                   <?php   $i++; } endforeach; } ?>
                                
                              </tbody>
                              
                            </table>
                            </div>
            
                           
                             
                         </div>
                     </div>
                 </div>
                 

               </div>
             </div>
             
           </div>

         </div>
         <!-- Row end -->


         <!-- Row end -->
       </div>
       
       
       
       
         <div class="panel panel-white">
         <div class="panel-heading panel-red">
           <h5 style="font-size:20px;" class="text-bold">Recently Launch & Best Offers Configuration</h5>

         </div>
         <div class="panel-body">
           <!-- Row start -->
           <div class="row m-b-30">
             <div class="col-lg-12 col-xl-12">

              
               <!-- Tab panes -->
               <div class="panel-body">

        
                 

                 <div class="tab-pane" id="profile3" role="tabpanel">
                   <form method="post" action="<?php echo base_url();?>adminController/rview" enctype="multipart/form-data" >
                     <div class="form-group row">
                         <div class="form-group  col-sm-3">
                       <input type="text" class="form-control text-uppercase"  id="categorynmae" name="offername">
                         <span id="showcategory"></span>
                     </div>
                       <div class="col-sm-3">
                      
                         <input type="file" class=" form-control text-uppercase " id="subcat" name="rview"
                           placeholder="Enter Your Sub Category">
                           <span id="category"></span>
                       </div>
                     </div>

                     <div class="form-group row">
                       <div class="col-sm-9">
                       </div>
                       <div class="form-group col-sm-2">
                         <input type="submit" class=" form-control btn-primary" value="submit">
                       </div>
                     </div>
                 </div>
                 </form>
                 
                      <div class="panel panel-white">
                         <div class="panel-heading panel-red">Offer Products Images</div>
                             <div class="panel-body">
                                    <div class="dt-responsive table-responsive" >
           

                         <table id="alt-pg-dt" class="table table-striped table-bordered nowrap" >
                              <thead >
                                <tr>
                                  <th >S.N</th>
                                    <th >SProduct Name</th>
                                   <th >Offer Products Images</th>
                                    <th>Delete</th>
                                  
                                 </tr>
                              </thead>
                              <tbody>
             
                            <?php 
                           
                             $stckdt= $this->db->get("r_launch");
                             if($stckdt->num_rows()>0){
                                 
                             $i=1;
                             foreach($stckdt->result() as $data):
                                 if(strlen($data->offer_image)>0){
                            
                              ?>
                              <tr class="text-uppercase text-center">
                                <td ><?php echo $i;?></td>
                                <td ><?php echo $data->offerimg_name;?></td>
                                 <td ><img src="<?php echo $this->config->item('asset_url'). '/offerimg/' . $data->offer_image; ?>"
                                                style="height:50px;width:100px;"></td>
                                  <td ><a href="<?php echo base_url();?>adminController/delete_rview/<?php echo $data->id;?>"><i class="fa fa-trash-o" style="font-size:28px; color:green;"></i></a> </td>
                                </tr>
                                   <?php   $i++; } endforeach; } ?>
                                
                              </tbody>
                              
                            </table>
                            </div>
            
                           
                             
                         </div>
                     </div>
               </div>
             </div>
             
           </div>

         </div>
         <!-- Row end -->


         <!-- Row end -->
       </div>
     </div>
     <!-- Material tab card end -->
   </div>
 </div>