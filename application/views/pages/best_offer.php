<!DOCTYPE html>
<html lang="en">
<head>
  <!--<title>Bootstrap Example</title>-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  /*border:1px;*/
  width: 80%;
  height:350px;
  background-color: antiquewhite;
}
</style>
<body>
<?php $this->db->where('id',$this->uri->segment(3));
 $data= $this->db->get("r_launch")->row();
?>
<div class="container">
    <div style="background-color: antiquewhite;"><center><h2 style="color:#f20089;margin:3%;">Best Offer Product Details</h2><center></div>  
    <center><div class="card">
                <div class="row">
                    <div class="col-md-5">
                          <div style="padding:30px;">
                            <img src="<?php echo $this->config->item('asset_url'). '/offerimg/' . $data->offer_image; ?>" style="height: 250px; width:100%;">
                          </div>
                    </div>
                    <div class="col-md-7" >
                        <label style="margin-top:30px; color: grey ">Product Details :</label>
                        <div style="text-align:center"><h4><?php echo $data->pro_details;?></h4></div>
                    </div>
                </div>
    </div></center>
</div>
</body>
</html>