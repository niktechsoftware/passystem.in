<style>
    .round {
  position: relative;
  width: 100px;
  height: 100px;
  margin: 20px 0;
  background: orange;
  border-radius: 8% / 55%;
  color: white;
}
.round:before {
  content: '';
  position: absolute;
  top: 10%;
  bottom: 11%;
  right: -5%;
  left: -5%;
  background: inherit;
  border-radius: 68% / 21%;
}
</style>

<div class="container">
<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Supporting Authority</h2></center>
</div>
<?php $this->db->where('id',$this->uri->segment(3));
$ddt = $this->db->get('bst_supporting')->row();
?>
<div style="background-color:lightblue">
    <div class="row">
        <div class="col-lg-12" style="margin-top:2%;margin-bottom:0%; text-align:center;">
            <center><img style=" width:300px; height:300px;" class="round "  data-u="image" src="<?php echo $this->config->item('asset_url');?>/images/people/<?php echo $ddt->image;?>"/></center>
            <br>
                <br><h5 style="margin-top:1%"><?php echo $ddt->name; ?></h5>
                  <h4 style="margin-top:1%;margin-bottom:2%;"><?php echo $ddt->msg;?></h4>
        </div>
        <!--<div class="col-lg-6">-->
          
        <!--</div>-->
        
    </div>
</div>
<a class="btn btn-info" href="<?php echo base_url();?>index.php/about_us_cont/support_author_view">Back</a>

</div>
