<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- start: EXPORT DATA TABLE PANEL  -->
      <div class="panel panel-white">
        <div class="panel-heading panel-red">
          <h4 class="panel-title"> <span class="text-bold">Transfer Stock Product </span></h4>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6" id="senderpanel">
              <h6> SENDER </h6>
              <div class="card bg-c-yellow update-card">

                <div class="card-block">
                <?php if($this->session->userdata("login_type")== 1){ ?>
                  <select class="form-control" id="checkid" style="height:40px;">
                    <option value="">--Select---</option>
                    <option value="1">Admin</option>
                    <option value="2">Branch</option>
                    <option value="3">Shop</option>
                  </select>
                <?php } else{?>
                   <select class="form-control" id="checkid" style="height:40px;">
                   <option value="">--Select---</option>
                   <!-- <option value="1">Admin</option> -->
                   <option value="2">Branch</option>
                   <option value="3">Shop</option>
                 </select>
             <?php   }?>
                </div>
              </div>

              <div id="stud" class="col-sm-12">
                <h6> Select Branch </h6>
                <div class="card bg-c-yellow update-card">
                <?php if($this->session->userdata('login_type')==1){?>
                  <div class="card-block">
                    <?php $this->db->where('status',1);
                        $dt=$this->db->get("branch")->result();

                        ?>
                    <select class="form-control" id="checkid1" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>

                  </div>
                <?php }else{?>
                  <div class="card-block">
                    <?php 
                    $this->db->where('username',$this->session->userdata('username'));
                    $this->db->where('status',1);
                        $dt=$this->db->get("branch")->result();

                        ?>
                    <select class="form-control" id="checkid1" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>

                  </div>
                <?php } ?>
                </div>
              </div>

              <div id="emp" class="col-sm-12">
                <h6> Select Branch </h6>
                <div class="card bg-c-yellow update-card">
                <?php if($this->session->userdata('login_type')==1){?>
                  <div class="card-block">
                    <select class="form-control" id="branch" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>
                  </div>
                <?php }else {?>
                  <div class="card-block">
                  <select class="form-control" id="branch" style="height:40px;">
                    <option value="">--Select---</option>
                    <?php foreach($dt as $row):?>
                    <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                    <?php endforeach ;?>
                  </select>
                </div>
              <?php  }?>
                </div>

                <h6> Select Shop </h6>
                <div class="card bg-c-yellow update-card">
                  <div class="card-block">
                    <select class="form-control" id="sub_branch" style="height:40px;;">
                    </select>
                  </div>
                </div>


              </div>
            </div>


            <div class="col-md-6" id="receivererpanel">
              <h6> RECEIVER </h6>
              <div class="card bg-c-pink update-card">
                <div class="card-block">
                <?php if($this->session->userdata('login_type')==1){?>
                  <select class="form-control" id="sendcheckid" style="height:40px;">
                    <option value="">--Select---</option>
                    <option value="1">Admin</option>
                    <option value="2">Branch</option>
                    <option value="3">Shop</option>
                  </select>
                <?php }else{ ?>
                  <select class="form-control" id="sendcheckid" style="height:40px;">
                    <option value="">--Select---</option>
                    <!-- <option value="1">Admin</option> -->
                    <!-- <option value="2">Branch</option> -->
                    <option value="3">Shop</option>
                  </select>
              <?php  }?>
                </div>

              </div>

              <div id="studsend" class="col-sm-12">
                <h6> Select Branch </h6>
                <div class="card bg-c-pink update-card">
                <?php if($this->session->userdata('login_type')==1){?>
                  <div class="card-block">
                    <?php
                        $this->db->where('status',1);
                        $dt=$this->db->get("branch")->result();

                        ?>
                    <select class="form-control" id="checkid11" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>

                  </div>
                <?php }else {?>
                  <div class="card-block">
                    <?php
                    $this->db->where('status',1);
                    $this->db->where('username',$this->session->userdata('username'));
                        $dt=$this->db->get("branch")->result();

                        ?>
                    <select class="form-control" id="checkid11" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>

                  </div>
                <?php } ?>
                </div>
              </div>

              <div id="empsend" class="col-sm-12">
                <h6> Select Branch </h6>
                <div class="card bg-c-pink update-card">
                  <div class="card-block">
                    <select class="form-control" id="branch1" style="height:40px;">
                      <option value="">--Select---</option>
                      <?php foreach($dt as $row):?>
                      <option value="<?php echo $row->id;?>"><?php echo $row->b_name;?></option>
                      <?php endforeach ;?>
                    </select>
                  </div>
                </div>
                <h6> Select Shop </h6>
                <div class="card bg-c-pink update-card">
                  <div class="card-block">
                    <select class="form-control" id="sub_branch1" style="height:40px;">
                    </select>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-7" id="adminproduct">

              <div class="panel panel-yellow  table-striped">

                <table id="adminlist" class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:8px;">SNO</th>
                      <th style="width:8px;">P.Name</th>
                      <th style="width:8px;">P.Code</th>
                      <th style="width:8px;">Size</th>
                      <th style="width:8px;">Image</th>
                      <th style="width:8px;">Qt</th>
                      <th style="width:8px;">E.Qt.</th>
                      <th style="width:8px;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                 $this->db->where('quantity >',6);
                 $dt= $this->db->get("stock_products");
                 if($dt->num_rows()>0){ ?>
                    <?php  $i=1;
                  foreach($dt->result() as $row):?>
                    <tr class="text-uppercase">
                      <td style="width:8px;"><?php echo $i;?></td>
                      <td style="width:10px;"><?php echo $row->name?></td>
                      <td style="width:10px;"><?php echo $row->hsn?>
                        <input type="hidden" name="adp_code" id="adp_code<?php echo $i;?>" value="<?php echo $row->id;?>">
                      </td>
                       <td style="width:8px;color:black;"><?php echo $row->size?> </td>
                  <td style="width:8px;color:black;"><img src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1; ?>"
                                                style="height:50px;width:60px;" class="zoom1"> </td>

                      <td style="width:8px;"><?php echo $row->quantity?>
                        <input type="hidden" name="ad_quantity" id="ad_quantity<?php echo $i;?>"
                          value="<?php echo $row->quantity;?>">
                        <input type="hidden" name="sec" id="sec<?php echo $i;?>" value="<?php echo $row->sec;?>">
                      </td>
                      <td style="width:10px;"><input style="width:90px;" type="number" name="sendquantity"
                          id="sendquantity<?php echo $i;?>"></td>
                      <td><button type="sumbit" id="adminbutton<?php echo $i;?>" class="btn btn-danger">Send</button>
                        <button type="sumbit" id="showid<?php echo $i;?>" class="btn btn-success">Sent</button>
                      </td>

                      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                      <script>
                      $(document).ready(function() {
                        $('#showid<?php echo $i;?>').hide();
                        $("#adminbutton<?php echo $i;?>").click(function() {
                          var admin = $("#checkid").val();
                          var reciverchk = Number($("#sendcheckid").val());
                          var recivebranch = Number($("#checkid11").val());
                          var recisubbranch = Number($("#sub_branch1").val());
                          var sendquantity = $("#sendquantity<?php echo $i;?>").val();
                          var pcode = $("#adp_code<?php echo $i;?>").val();
                          var stockquantity = $("#ad_quantity<?php echo $i;?>").val();
                          var sec = $("#sec<?php echo $i;?>").val();
                          if (reciverchk == "") {

                            alert('Please select Receiver Side option');
                            $("#checkid").get(0).selectedIndex = 0;
                            if (reciverchk == 2) {
                              if (recivebranch == "") {

                                alert("please select branch");
                                $("#checkid").get(0).selectedIndex = 0;
                                document.getElementById("checkid")
                                  .disabled = true;
                              }
                            }
                            if (reciverchk == 3) {
                              if (recisubbranch == "") {

                                alert("please select Subbranch");
                                $("#checkid").get(0).selectedIndex = 0;
                                document.getElementById("checkid")
                                  .disabled = true;
                              }
                            }
                            $("#adminproduct").hide();
                          } else {
                            if (sec.length > 0) {
                              if (sendquantity != 0) {

                                $.post("<?php echo site_url('branchController/adminproductsend')?>", {
                                  admin: admin,
                                  reciverchk: reciverchk,
                                  recivebranch: recivebranch,
                                  recisubbranch: recisubbranch,
                                  sendquantity: sendquantity,
                                  pcode: pcode,
                                  stockquantity: stockquantity
                                }, function(data) {

                                  $("#sendproductdetail")
                                    .show();
                                  $("#sendproductdetail")
                                    .html(data);
                                  $("#adminbutton<?php echo $i;?>")
                                    .hide();
                                  $('#showid<?php echo $i;?>')
                                    .show();

                                });
                              } else {
                                alert("please fill the send Quantity");
                                $("#adminbutton<?php echo $i;?>")
                                  .hide();
                                $('#showid<?php echo $i;?>').hide();
                              }
                            } else {
                              alert(
                                "please Update this product with Sec Number");
                              $("#adminbutton<?php echo $i;?>").hide();
                              $('#showid<?php echo $i;?>').hide();

                            }

                          }
                        });

                        $("#sendquantity<?php echo $i;?>").keyup(function() {
                          var sendquantity = Number($(
                            "#sendquantity<?php  echo $i;?>").val());
                          var adquantity = Number($(
                            "#ad_quantity<?php  echo $i;?>").val());
                          if (sendquantity < adquantity && sendquantity > 0) {
                            $("#adminbutton<?php echo $i;?>").show();
                          } else {
                            alert(
                              'You Can Not Send less then zero and  More then Stock Product');
                            $("#adminbutton<?php echo $i;?>").hide();
                          }
                        });
                      });
                      </script>
                    </tr>
                    <?php  $i++;
                endforeach;
                   } ?>
                  </tbody>

                </table>
              </div>
            </div>


            <div class="col-md-5 panel panel-pink update-card" id="branchproduct1">
            </div>

            <div class="col-md-5 panel panel-pink update-card" id="subbranchproduct">
            </div>

            <div class="col-md-5 panel panel-yellow update-card" id="sendproductdetail">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>