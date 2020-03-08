
 

 <div class="page-body">

     <div class="row">
         <div class="col-sm-12">
             <!-- Material tab card start -->
             <div class="panel panel-pink">
                 <div class="panel-heading panel-red">
                 <center>  <h5 style="font-size:20px;" class="text-bold">Send Sms</h5></center>

                 </div>
                 <div class="panel-body">
                     <!-- Row start -->
                     <div class="row m-b-30">
                         <div class="col-lg-12 col-xl-12">
                            
                             <!-- Nav tabs -->
                             <ul class="nav nav-tabs md-tabs" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">All Branches</a>
                                     <div class="slide"></div>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">All Shops</a>
                                     <div class="slide"></div>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">All Subscribers</a>
                                     <div class="slide"></div>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Send Individual Notice</a>
                                     <div class="slide"></div>
                                 </li>
                                 
                             </ul>
                             <!-- Tab panes -->
                             <div class="tab-content panel-body">
                             
                                 <div class="tab-pane active" id="home3" role="tabpanel">
                                 <form method="post" action="<?php echo base_url();?>sms/branches">
                                 <div class="card text-uppercase">
                                 <center>  <span style="color:#01a9ac;font-size:20px;" >  here you can send sms for all branches</span></center>
                                 </div>
                                 <div class="row">
                                 <div class="form-group  col-sm-6">
                                 <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea1" rows="1"></textarea>
                                  </div>
                                  <div class="form-group  col-sm-6">
                                  <input type="text" id="totalCharacter1" class=" form-control validate" aria-required="true"
                                            name="lastName" required="" placeholder="Number Of Character" required>
                                    </div>
                                  </div>
                                 <div class="row">
                                 <div class="col-sm-9">
                                 </div>
                                 <div class="form-group col-sm-2">
                                 <input type="submit" class=" form-control btn-primary" value="submit">
                                     </div>
                                     </div>
                                     </form>
                                     </div>
                                     
                                    
                                 <div class="tab-pane" id="profile3" role="tabpanel">
                                 <form  method="post" action="<?php echo base_url();?>sms/shops">
                                 <div class="card text-uppercase" >
                              <center> <span style="color:#01a9ac;font-size:20px;" >  here you can send sms for all shops</span> </center>
                                 </div>
                                 <div class="form-group row">
                                       <div class="col-sm-6">
                                       <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea2" rows="1"></textarea>
                                   
                                       </div>
                                       
                                       <div class="col-sm-6 ">
                                     
                                       <input type="text" class="form-control validate" id="totalCharacter2" placeholder="Number Of Character"
                                         name="job" required="" required>
                                   </div>
                                 </div>

                                 <div class="form-group row">
                                 <div class="col-sm-9">
                                 </div>
                                 <div class="form-group col-sm-2">
                                 <input type="submit" class=" form-control btn-primary" value="submit">
                                     </div>
                                     </div>
                                   
                                   </form>
                                   </div>


                                   <div class="tab-pane" id="profile2" role="tabpanel">
                                 <form  method="post" action="<?php echo base_url();?>sms/subscribers">
                                 <div class="card text-uppercase">
                                 <center> <span style="color:#01a9ac;font-size:20px;" > here you can send sms for all consumers </span></center>
                                 </div>
                                 <div class="form-group row">
                                       <div class="col-sm-6">
                                       <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea3" rows="1"></textarea>
                                 
                                       </div>
                                       
                                       <div class="col-sm-6 ">
                                       <input type="text" class=" form-control validate" id="totalCharacter3" name="job"placeholder="Number Of Character"
                                         required="" required>
                                
                                        </div>
                                 </div>

                                 <div class="form-group row">
                                 <div class="col-sm-9">
                                 </div>
                                 <div class="form-group col-sm-2">
                                 <input type="submit" class=" form-control btn-primary" value="submit">
                                
                                      </div>
                                     </div>
                                   
                                   </form>
                                   </div>
                                   <div class="tab-pane" id="profile1" role="tabpanel">
                                 <form  method="post" action="<?php echo base_url();?>sms/notice">
                                 <div class="card text-uppercase">
                                 <center><span style="color:#01a9ac;font-size:20px;" >  here you can send indivisual notice for any person</span></center>
                                 </div>
                                 <div class="form-group row">
                                       <div class="col-sm-6">
                                       <textarea name="msg" class="form-control text-uppercase" placeholder="Enter Text" id="textArea4" rows="1"></textarea>
                                 
                                       </div>
                                       
                                       <div class="col-sm-6 ">
                                      
                                        <input type="text" class="form-control validate" id=""  name="mobile" placeholder="Enter Mobile Number" required="" required>
                                 
                                 <!-- <input type="text" class=" form-control " name="subcat" placeholder="Enter Your Sub Category"> -->
                                 </div>
                                 </div>

                                 <div class="form-group row">
                                 <div class="col-sm-6">
                                 <input type="text" class="form-control validate" id="totalCharacter4" placeholder="Number Of Character" name="job" required="" required>
                                   
                                 </div>
                                 <div class="col-sm-4">
                                    
                                 </div>
                                 <div class="form-group col-sm-2">
                                 <input type="submit" class=" form-control btn-primary" value="submit">
                                     </div>
                                     </div>
                                   
                                   </form>
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
   </div>