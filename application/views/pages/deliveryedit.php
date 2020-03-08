<div class="page-body">
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header">
            <center>  <h5 style="color:#01a9ac;font-size:20px;">Delivery Boy Profile</h5></center>
            </div>
            <div class="card-block">
            <div class="dt-responsive">
           
            <?php $username = $this->session->userdata('username');

           // print_r($username); exit();
             $this->db->where('username',$username);
                $db = $this->db->get('delivery_boy')->row();
                ?>
                 <form method="post" action="<?php echo base_url()?>welcome/deliveryEditProfile/<?php echo $db->id;?>" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                    <div class="row">
                       
                        <div class="col-md-12">
                        <img width="150px" height="170px;" src="<?php echo base_url()?>assets/images/deliveryBoy/<?php echo $db->photo;?>">
                  <input type="file" name="photo" >
                        <!-- <input type="file" name="photo" photo> -->
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Username</label></div>
                            <div class="col-md-9">
                            <?php echo $db->username;?>
                            </div>
                           
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3"><label>Password</label></div>
                        <div class="col-md-9">
                        <input type="text" name="password" class="form-control" value="<?php echo $db->password;?>">
                        </div>
                       
                        </div>
                    </div>
              </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><label>Full Name</label></div>
                            <div class="col-md-9">
                            <input type="text" name="name" class="form-control" value="<?php echo $db->name;?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Father Name</label></div>
                            <div class="col-md-9">
                            <input type="text" name="fname" class="form-control" value="<?php echo $db->father_name;?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Address</label></div>
                            <div class="col-md-9">
                            <textarea name="address" class="form-control"><?php echo $db->address;?></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Mobile Number</label></div>
                            <div class="col-md-9">
                            <input type="number" name="mob_no" class="form-control" value="<?php echo $db->mobile;?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>AAdhar Number</label></div>
                            <div class="col-md-9">
                            <input type="number" name="aadhar" class="form-control" value="<?php echo $db->aadhar_no;?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Email</label></div>
                            <div class="col-md-9">
                            <input type="email" name="email" class="form-control" value="<?php echo $db->email;?>">
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Pincode</label></div>
                            <div class="col-md-9">
                            <input type="number" name="pincode" class="form-control" value="<?php echo $db->pincode;?>">
                            </div>
                           
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>State</label></div>
                            <div class="col-md-9">
                            <input type="text" name="state" class="form-control" value="<?php echo $db->state;?>">
                            </div>
                           
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                            <div class="col-md-3"><label>Country</label></div>
                            <div class="col-md-9">
                            <input type="text" name="country" class="form-control" value="<?php echo $db->country;?>">
                            </div>
                           
                        </div>
                </div>
                
              </div>
              </div>
              <div class="form-group">
                <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-block btn-primary">Update Profile</button>
                </div>
                </div>
              </div>
              </form>
        </div>
    </div>
    </div>
    </div>
    </div>

