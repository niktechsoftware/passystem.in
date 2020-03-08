<!--css--->	
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
		list-style:none;
}
.pagination>li {
    display: inline;
}

.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}

.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
  
  
}





/*@media (max-width: 767px) {*/
/*    .portfolio>.clear:nth-child(6n)::before {*/
/*      content: '';*/
/*      display: table;*/
/*      clear: both;*/
/*    }*/
/*}*/
/*@media (min-width: 768px) and (max-width: 1199px) {*/
/*    .portfolio>.clear:nth-child(8n)::before {*/
/*      content: '';*/
/*      display: table;*/
/*      clear: both;*/
/*    }*/
/*}*/
/*@media (min-width: 1200px) {*/
/*    .portfolio>.clear:nth-child(12n)::before {  */
/*      content: '';*/
/*      display: table;*/
/*      clear: both;*/
/*    }*/
/*}*/

/*@media screen and (max-width: 575px) {*/
/*.portfolio {*/
/*    margin-left:1%;*/
/*    margin-right:1%;*/
    
/*  }*/
/*}*/

/*@media screen and (max-width: 575px) {*/
/*.media {*/
/*    width:180px;*/
/*    display: table;*/
/*    float:left;*/
/*  }*/
/*}*/

/*@media screen and (max-width: 360px) {*/
/*.portfolio {*/
/*    margin-left:1%;*/
/*    margin-right:1%;*/
    
/*  }*/
/*}*/

/*@media screen and (max-width: 375px) {*/
/*.media {*/
/*    width:160px;*/
/*    display: table;*/
/*    float:left;*/
/*  }*/
/*}*/

/*@media screen and (min-width: 360px) {*/
/*.portfolio {*/
/*    margin-left:1%;*/
/*    margin-right:1%;*/
    
/*  }*/
/*}*/

/*@media screen and (max-width: 360px) {*/
/*.media {*/
/*    width:300px;*/
/*    display: table;*/
/*    float:left;*/
/*  }*/
/*}*/

.panel-body {
    padding: 15px;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    box-shadow: 0 1px 1px rgba(0,0,0,0.05);
}

.panel-footer {
    padding: 10px 15px;
    background-color: lavenderblush;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}

 tr
 {
     float:left;
     width:20%;
	}

td
{
	 text-align:center;
	  margin:auto;
}





@media only screen and (max-width: 768px) {
	    tr{
	        float:left;
	        width:50%;
	    }
}




	</style>
	

	
	
	<!-- <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("pagination/search", $attr);?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="book_name" name="book_name" placeholder="Search for product .." type="text" value="<?php echo set_value('book_name'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "index.php/pagination/index"; ?>" class="btn btn-primary">Show All</a>
                </div>
            </div>
        <?php echo form_close(); ?>
        </div>
    </div> -->

<!--	<div class="container">-->
	
<!--  <div class="row text-center portfolio" style="margin-top:5%";>-->
      
<!--              <div class="">-->
<!--            <?php echo $pagination; ?>-->
<!--        </div>-->
      
      
<!--      <table id="product" style="width:100%">-->
<!--  <thead style="display:none;">-->
<!--				<tr>-->
<!--					<th>Name</th>-->
<!--				</tr>-->
<!--  </thead>-->
      
<!--      <tbody>-->
<!--  <?php for ($i = 0; $i < count($productlist); ++$i) { ?>-->
  
 

<!--    <div class="col-lg-3 col-sm-4 col-xs-6">-->
<!--         <tr style="text-align: -webkit-center;">-->
<!--      <td>-->
<!--        <div class="panel panel-default" style="margin-bottom:10%; border-color:rgb(242, 0, 137);">-->
<!--            <div class="panel-body ">-->
			
<!--                <a href="<?php echo base_url();?>index.php/auth/signin">-->
				    
<!--				<?php if ($productlist[$i]->file1){?>-->
<!--                    <img src="<?php echo base_url();?>passoft/assets/productimg/<?php  echo $productlist[$i]->file1;?>" style="height:150px; width:150px;" class="img-thumbnail img-responsive">-->
<!--				<?php }else{?>-->
<!--					<img src="<?php echo base_url();?>passoft/assets/productimg/noimage.png" class="img-thumbnail img-responsive">-->
<!--				<?php }?>-->
               
<!--			    </a>-->
<!--            </div>-->
<!--            <div class="panel-footer">-->
<!--		<span style="text-transform: uppercase">	<?php echo $productlist[$i]->company; ?></span><br/>-->
<!--			<span style="text-transform: capitalize"><?php echo $productlist[$i]->name; ?><span><br/>-->
<!--			<span style="text-transform: capitalize">Rs. <?php echo $productlist[$i]->selling_price; ?><span>-->
<!--            </div>  -->
<!--        </div> -->
        
        
<!--        </td>-->
<!--    </tr>-->
<!--    </div>-->
    
    
    
<!--    <div class="clear"></div> -->
    
    
<!--	<?php } ?>-->
	
<!--	</tbody>-->
<!--      </table>-->
    
<!--  </div>-->

 
  
<!--</div>-->






<div class="container">
	
  <div class="row text-center portfolio" style="margin-top:5%";>
      
      <table id="product" style="width:100%">
  <thead style="display:none;">
				<tr>
					<th>Name</th>
				</tr>
  </thead>
  
    <?php  
          $this->db->order_by('id','desc');
       $list = $this->db->get('stock_products');?>
       
  
      <tbody>
  <?php foreach($list->result() as $productlist):?>
  
 

    <div class="col-lg-3 col-sm-4 col-xs-6">
         <tr style="text-align: -webkit-center;">
      <td>
        <div class="panel panel-default" style="margin-bottom:10%; border-color:rgb(242, 0, 137);">
            <div class="panel-body ">
			
                <a href="<?php echo base_url();?>index.php/auth/signin">
				    
				<?php if ($productlist->file1){?>
                    <img src="<?php echo base_url();?>passoft/assets/productimg/<?php  echo $productlist->file1;?>" style="height:150px; width:150px;" class="img-thumbnail img-responsive">
				<?php }else{?>
					<img src="<?php echo base_url();?>passoft/assets/productimg/noimage.png" class="img-thumbnail img-responsive">
				<?php }?>
               
			    </a>
            </div>
            <div class="panel-footer">
		<span style="text-transform: uppercase">	<?php echo $productlist->company; ?></span><br/>
			<span style="text-transform: capitalize"><?php echo $productlist->name; ?><span><br/>
			<span style="text-transform: capitalize">Rs. <?php echo $productlist->selling_price; ?><span>
            </div>  
        </div> 
        
        
        </td>
    </tr>
    </div>
    
    
    
    <div class="clear"></div> 
    
    
	<?php endforeach;?>
	
	</tbody>
      </table>
    
  </div>

 
  
</div>








