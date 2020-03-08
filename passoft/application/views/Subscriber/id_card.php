<!--<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<html>
<head>
<!--===pcode for html to canvas==-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
<!--<script src="<?php echo base_url();?>assest/js/html2canvas.min.js"></script>-->
<!--<script src="Scripts/jquer_latest_2.11_.min.js" type="text/javascript"></script>-->
<script src="Scripts/html2canvas.js" type="text/javascript"></script>
<!--===end pcode==-->
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

  <title>ID Card</title>
  
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
  <link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css'
    media="print" />
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>
  <style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }

    #printcontent * {
      visibility: visible;
    }

    #printcontent {
      position: absolute;
      top: 40px;
      left: 30px;
    }
  }
  
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
  
  
  .button2 {
  background-color: #008CBA; 
  color: white; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #4CAF50;
  color: white;
  border: 2px solid #4CAF50;
}
  
  </style>

</head>

<body>
<div id="html-content-holder">  
    <div id="printcontent">
            <div id="page-wrap">
              <div class="row">
                <div class="col-sm-12">
                    <?php if(($this->session->userdata("login_type")==1)){
                       $uri = $this->uri->segment(3);
                       //$a= $this->session->userdata('username');
                        $this->db->where('username',$uri);
                        $data1= $this->db->get('customers');
                        if($data1->num_rows()>0)
                        {
                          $data = $data1->row();
                        }
                        else
                        {
                          $this->db->where('username',$uri);
                          $data2= $this->db->get('employee');
                          if($data2->num_rows()>0)
                          {
                            $data = $data2->row();
                          }   
                          else
                          {
                            echo "Username Not Valid";
                          }
                        }
                    }
                    elseif(($this->session->userdata("login_type")==5)){
                    
                        $a= $this->session->userdata('username');
                        //echo $a;
                        $this->db->where('username',$a);
                        $data= $this->db->get('customers')->row();
                    // print_r($data);
                    }
                    else{
                        $a= $this->session->userdata('username');
                        $this->db->where('username',$a);
                        $data= $this->db->get('employee')->row();
                    // print_r($data); 
                        
                    }
                    
                    ?>
         
                    <div class="row" >
                        <div class="col-md-6">
                             
                            <div class="container"  style="background-image:url('<?php echo $this->config->item('asset_url');?>/images/id.jpg'); background-size:cover; margin-top:3%; background-color:#e9ecef; height:420px; width:350px;" >
                                
                                <div style="padding-top:18px;padding-left:20px;padding-right:20px;">
                                    <center><img src="<?php echo $this->config->item('asset_url');?>/images/pas_new.png" style="padding-top:20px; width:100px; height:80px;"></center>
                                    <center><p style="font-size:24px; padding-top: 10px; color:#f20089;">PAS System</p></center>
                                    <?php if($this->session->userdata("login_type")== 1)
                                    {
                                        $this->db->where('username',$uri);
                                        $ph= $this->db->get('employee');
                                        if($ph->num_rows()>0)
                                        {
                                            if(strlen($ph->row()->photo)>0)
                                            { ?>
                                               <center><img class="zoom1" style="margin-top:3%; " src="<?php echo $this->config->item('asset_url');?>/images/employee/<?php echo $ph->row()->photo; ?>" width="100px" height="100px"></center>
                                            <?php }
                                            else
                                            { ?>
                                                <center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/userlogo.png" width="100px" height="100px"></center>
                                            <?php }
                                        }
                                        else
                                        {
                                            if(strlen($data->image)>0)
                                            { ?>
                                               <center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/subscriber/<?php echo $data->image; ?>" width="100px" height="100px"></center>
                                        <?php    }
                                            else
                                            { ?>
                                                <center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/userlogo.png" width="100px" height="100px"></center>
                                        <?php    }
                                        }
                                    }
                                    elseif(($this->session->userdata("login_type")== 5)) {?>
                                        <?php if(strlen($data->image)>0) { ?><center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/subscriber/<?php echo $data->image; ?>" width="100px" height="100px"></center>
                                 <?php   } else { ?>
                                        <center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/userlogo.png" width="100px" height="100px"></center>
                                  <?php  } } 
                                   elseif(($this->session->userdata("login_type")== 6)) {?>
                                        <?php if(strlen($data->photo)>0) { ?><center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/employee/<?php echo $data->photo; ?>" width="100px" height="100px"></center>
                                 <?php   } else { ?>
                                        <center><img class="zoom1" style="margin-top:4%; " src="<?php echo $this->config->item('asset_url');?>/images/userlogo.png" width="100px" height="100px"></center>
                                  <?php  } } ?>
                                    <center><label style="font-size:18px; margin-top:4%;"><b><?php echo $data->name;?></b><b></label></center>
                                    <center><label style="font-size:18px;" ><b><?php 
                                    if(($this->session->userdata("login_type")==5)){
                                    echo "Subscriber";
                                    }
                                    elseif(($this->session->userdata("login_type")==6))
                                    {
                                        $d=$data->emp_type;
                                        $this->db->where('id',$d);
                                        $dt=$this->db->get('emp_type')->row();
                                        echo $dt->type;
                                    }
                                    elseif($this->session->userdata("login_type")==1)
                                    {
                                        $this->db->where('username',$uri);
                                        $data2= $this->db->get('employee');
                                        if($data2->num_rows()>0)
                                        {
                                            $this->db->where('id',$data2->row()->emp_type);
                                            $dt=$this->db->get('emp_type');
                                            if($dt->num_rows()>0)
                                            {
                                                echo $dt->row()->type; 
                                            }
                                            else
                                            {
                                                echo "N/A";
                                            }
                                        }
                                        else
                                        {
                                             echo "Subscriber";
                                        }
                                    }
                    
                                    ?></b></label></center>
                                </div>
                                <!--<hr>-->
                                <div style="padding:10px;">
                                    <center><label style="font-size:12px;">ID No. -<?php echo $data->username;?></label></center>
                                    <center><label style="font-size:12px;color:black">Email: <?php echo $data->email;?></label></center>
                                    <center><label style="font-size:12px;">Phone No. +91<?php echo $data->mobile;?></label></center>
                                </div>
                                <!--<hr>-->
                                <div style="float:right; padding-right: 40px;">
                                   <label>Authority's Sign</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container" style=" background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%) ;background-size:cover; margin-top:3%;  height:420px; width:350px;" >
                       
                                <div style="padding-top:40px;padding-left:20px;padding-right:20px;">
                                    <!--<center><p style="font-size:18px; padding: 40px; color:#f20089;">Name</p></center>-->
                                    <div style="padding:40px">
                                        <center><p style="margin-top:6%; font-size:16px;">NAME :- <?php echo $data->name;?></p></center>
                                        <center><p style="margin-top:6%; font-size:16px;">Post :- <?php 
                                    if(($this->session->userdata("login_type")==5)){
                                    echo "Subscriber";
                                    }
                                    elseif(($this->session->userdata("login_type")==6))
                                    {
                                        $d=$data->emp_type;
                                        $this->db->where('id',$d);
                                        $dt=$this->db->get('emp_type')->row();
                                        echo $dt->type;
                                    }
                                    elseif($this->session->userdata("login_type")==1)
                                    {
                                        $this->db->where('username',$uri);
                                        $data2= $this->db->get('employee');
                                        if($data2->num_rows()>0)
                                        {
                                            $this->db->where('id',$data2->row()->emp_type);
                                            $dt=$this->db->get('emp_type');
                                            if($dt->num_rows()>0)
                                            {
                                                echo $dt->row()->type; 
                                            }
                                            else
                                            {
                                                echo "N/A";
                                            }
                                        }
                                        else
                                        {
                                             echo "Subscriber";
                                        }
                                    }
                    
                                    ?></p></center>
                                        <center><p style="margin-top:6%; font-size:16px;">Joining Date :- 
                                        <?php if($this->session->userdata("login_type")==1) 
                                        {
                                            $this->db->where('username',$uri);
                                            $data2= $this->db->get('employee');
                                            if($data2->num_rows()>0)
                                            {
                                                echo $data2->row()->created_date; ?></p></center> <?php
                                            }
                                            else
                                            {
                                                $this->db->where('username',$uri);
                                                $data2= $this->db->get('customers');
                                                if($data2->num_rows()>0)
                                                {
                                                    echo date("d-m-y",strtotime($data2->row()->created)); ?></p></center> <?php
                                                }
                                                else
                                                {
                                                     echo "N/A"; ?></p></center> <?php
                                                }
                                            }
                                        }
                                        else
                                        {
                                         if($this->session->userdata("login_type")==5){ echo $data->created; } else { echo $data->created_date; }?></p></center>   
                                        <?php } ?>
                                        <!--<center><p style="margin-top:6%; font-size:16px;">Expire Date :-</p></center>-->
                                        <center><p style="margin-top:6%; font-size:16px;">UserID :- <?php echo $data->username;?></p></center>
                                         <center><p style="margin-top:6%; font-size:16px;">Blood Group :-</p></center>
                                        
                                    </div>
                                    <div><center><p style="font-size:10px;">Visit passystem.in </p></center></div>
                                </div>
                                <!--<hr>-->
                                <!--<div style="padding:20px;">-->
                                <!--    <div><center><label style="font-size:13px;" >Email: passystem1@gmail.com</label></center></div>-->
                                <!--    <div><center><label style="font-size:13px;">Phone No. +917394826066</label></center></div>-->
                                <!--</div>-->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="invoice-buttons" style="text-align:center;">
        <button class="button button2" type="button"  onclick="window.print();">
          <i class="fa fa-print padding-right-sm"></i> Print
        </button>
        <a class="invoice-buttons" style="font-size:16px;" id="btn-Convert-Html2Image" href="#">Download</a>
    </div>
  <!--<input id="btn-Preview-Image" type="button" value="Preview"/>-->
    <!--<a id="btn-Convert-Html2Image" href="#">Download</a>-->
    <!--<br/>-->
    <!--<h3>Preview :</h3>-->
    <!--<div id="previewImage">-->
    <!--</div>-->
            <script>
                $(document).ready(function(){
                
                	
                var element = $("#html-content-holder"); // global variable
                var getCanvas; // global variable
                 
                    // $("#btn-Preview-Image").click(function () {
                    //      html2canvas(element, {
                    //      onrendered: function (canvas) {
                    //             // $("#previewImage").append(canvas);
                    //             getCanvas = canvas;
                    //          }
                    //      });
                    // });
                
                	$("#btn-Convert-Html2Image").click(function () {
                	     html2canvas(element, {
                         onrendered: function (canvas) {
                                // $("#previewImage").append(canvas);
                                getCanvas = canvas;
                             }
                         });
                    var imgageData = getCanvas.toDataURL("image/jpeg");
                    // Now browser starts downloading it instead of just showing it
                    var newData = imgageData.replace(/^data:image\/jpeg/, "data:application/octet-stream");
                    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.jpeg").attr("href", newData);
                	});
                
                });
                
            </script>
 </body>
</html>
