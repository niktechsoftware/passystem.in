<div class="container">
<div style="background-color: antiquewhite;">
<center><h2 style="color:#f20089;margin:3%;">Best Supporting Authorities</h2></center>
</div>
<div class="table-responsive">
    <table id="bst" class="table table-border">
    <thead>
        <th>SNo</th>
        <th><div class="col-md-4" style="margin-left:3%">Best Supporting Authorities</div></th>
        <th><div class="col-md-8 ">View's</div></th>
    </thead>
    <tbody>
        <?php $bst = $this->db->get('bst_supporting')->result();
        $i =1;
        foreach($bst as $ddt)
        { ?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                <div style="margin-left:0%"> <a href="<?php echo base_url();?>index.php/about_us_cont/show_details/<?php echo $ddt->id;?>"><img src="<?php echo $this->config->item('asset_url');?>/images/people/<?php echo $ddt->image;?>" style="height:180px; width:150px;"></a><br>
                <br><h5><?php echo $ddt->name; ?></h5>
                </div>
            </td>
            <td><?php echo  $ddt->msg;?></td>
        </tr>
    <?php  $i++;  }
        ?>
    </tbody>
    
</table>
</div>

</div>
