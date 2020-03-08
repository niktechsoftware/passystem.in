 <?php   $this->db->where("id",$id);
            $row= $this->db->get("stock_products")->row();
            $cat_id=$row->sub_category;
             ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Edit Product Area </h4>
			</div>
			<div class="panel-body">
            <div class="dt-responsive table-responsive">
            <form action="<?php echo base_url();?>stockController/edit/<?php echo $row->id ;?>" method="post"
            enctype="multipart/form-data">
              <table   id="edlist"  class="table table-striped table-bordered nowrap">
                <tr>
                  <td><strong>Product Name</strong></td>
                  <td><input type="text" name="name" class="text-uppercase" value="<?php echo $row->name;?>" style="width:250px;"></td>
                  
                  <th><strong>Company Name</strong></th>
                  <td><input type="text" name="company" class="text-uppercase" value="<?php echo $row->company;?>"></td>

                  <th><strong>Sub Category Name</strong></th>
                  <td><input type="text" name="sub_category" class="text-uppercase" value="<?php 
                  $this->db->where("id",$cat_id);
                  $x= $this->db->get("sub_category");
                  if($x->num_rows()>0){
                    $subcat_name =$x->row()->name;                  
                  if(strlen($subcat_name)>0) { 
                    echo $subcat_name; 
                    } 
                    else {                       
                      echo "N/A"; 
                      } 
                      }
                      else {                       
                        echo "N/A"; 
                        }  ?>" disabled=""></td>
                </tr>
                <tr>
                  <th><strong>Product Size</strong></th>
                  <td><input type="text" name="size" class="text-uppercase" value="<?php echo $row->size;?>"></td>
                  
                  <th><strong>Product Quantity</strong></th>
                  <td><input type="text" name="quantity" class="text-uppercase" value="<?php echo $row->quantity;?>" disabled=""/></td>
                  
                  <th><strong>Product Price</strong></th>
                  <td><input type="text" name="price" class="text-uppercase" value="<?php echo $row->selling_price;?>" disabled=""/></td>
                </tr>
                <tr>
                    <th><strong>Product Code HSN</strong></th>
                  <td><input type="text" name="hsn" class="text-uppercase" value="<?php echo $row->hsn;?>" disabled /></td>
                    <th><strong>Product Code SEC</strong></th>
                  <td><input type="text" name="sec" class="text-uppercase" value="<?php echo $row->sec;?>" disabled=""></td>
                  
                  <th><strong> Type of Product</strong></th>
                  <td><input type="text" name="ptype" class="text-uppercase" value="<?php echo $row->p_type;?>"></td>

                </tr>

                <tr>
                  <th><strong>Image-1</strong></th>
                  <td><?php if($row->file1==""){echo " file not uploaded.";} else{?><img
                      src="<?php echo $this->config->item('asset_url'). '/productimg/' . $row->file1;?>"
                      style="max-height: 100px; max-width: 100px;"><?php }  ?>
                    <br>

                    <input type="file"  name="file1">

                  </td>

                  <th><strong>Image-2</strong></th>
                  <td><?php if($row->file2==""){echo " file not uploaded.";} else{?><img
                      src="<?php echo  $this->config->item('asset_url'). '/productimg/' . $row->file2;?>"
                      style="max-height: 100px; max-width: 100px;"><?php } ?>
                    <br>
                    <input type="file" name="file2">
                  </td>
                  
                  <th><strong>offer Image</strong></th>
                  <td><?php if($row->file3==""){echo " file not uploaded.";} else{?>
                    <img src="<?php echo  $this->config->item('asset_url'). '/productimg/' . $row->file3;?>"
                      style="max-height: 100px; max-width: 100px;">
                    <?php } ?>
                    <br>

                    <input type="file" name="file3">
                  </td>

                </tr>
                  <th>&nbsp;</th>
                  <td><button type="submit"  class="btn btn-danger" style="margin-left:10px;">Update Product Details</button></td>
                  

                </tr>

              </table>
            </div>
            </form>
        </div>
			</div>
            </div>
            </div>
            </div>
            <!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
            <?php $cat = $this->db->get('category');?>
            <div class="row">
	            <div class="col-md-12">
            		<div class="panel">
            			<div class="panel-heading panel-blue border-light">
            				<h4 class="panel-title">Update Category And Subcategory</h4>
            			</div>
            			<div class="panel-body">
            			    <div class="row">
            			        <!--<form method="post" action="<?php echo base_url();?>stockController/change_cat/<?php echo $id;?>">-->
                			        <label style="margin-left:3%">Category : </label><select style="margin-left:3%" id="cat_id" name="cat_id">
                			            <option value="0">-Select Category-</option>
                			                <?php foreach($cat->result() as $ct_dt)
                			                { ?>
                			                    <option value="<?= $ct_dt->id;?>"><?= $ct_dt->name;?></option>
                			               <?php } ?>
                			        </select>
                			        <label style="margin-left:3%">Sub Category : </label><select style="margin-left:3%; width:250px;" id="sub_cat_id" name="sub_cat_id">
                			            <option value="0">-Select Category-</option>
                			               
                			        </select>
                			        <input type="button" value="Change" class="btn btn-success" id="but_c" name="but_c" style="margin-left:3%;"/>
            			        <!--</form>-->
            			    </div>
            			</div>
            		</div>
            	</div>
            </div>
            <script>
                $("#cat_id").change(function(){
                    var cat_id = $("#cat_id").val();
                    $.post("<?= site_url();?>stockController/get_sub_cat",{ cat_id:cat_id },function(data){
                        $("#sub_cat_id").html(data);
                    });
                    // alert(cat_id);
                });
                 $("#but_c").click(function(){
                    var sub_cat_id = $("#sub_cat_id").val();
                    var id = <?php echo $id;?>;
                    $.post("<?= site_url();?>stockController/change_cat",{ id:id, sub_cat_id:sub_cat_id },function(data){
                        alert(data);
                    });
                    // alert(cat_id);
                });
            </script>