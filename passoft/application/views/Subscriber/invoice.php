 <div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Zero config.table start -->
            <div class="panel panel-white">
                <div class="panel-heading panel-red">
                <center>  <h5 class="panel-title"> Order List</h5></center>
                </div>
                <div class="panel-body">
                   <div class="dt-responsive table-responsive">
                      <table id="sample-table-2" class="table table-striped table-bordered nowrap">
                        <thead>
                          <tr style="background-color:#1ba593; color:white;">
                            <th>SNO</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Image</th>
                            <th>Size</th>
                            <th>Total Quantity</th>
                            <th>Total Amount</th>
                             <!--<th>Order status</th>-->
                            <!--<th>Payment Approve</th>-->
                            
                           <!--  <th>Activity</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $order_no = $this->uri->segment(3);
                                $this->db->where('order_no',$order_no);
                                $order_dt = $this->db->get('order_detail')->result();
                                
                                // $this->db->where();
                                // $this->db->get();
                                // $this->db->where('');
                                //     $this->db->get();
                                    $i=1; $totqua=0; $totAmount=0;
                                foreach($order_dt as $od_dt) { 
                                    if($od_dt->quantity>0) { 
                                        $this->db->where('id',$od_dt->p_code);
                                    $p_dt = $this->db->get('stock_products')->row();
                                        
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p_dt->name; ?></td>
                                <td><?php echo $p_dt->p_type; ?></td>
                                <td><?php if(strlen($p_dt->file1)>0){?><img src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $p_dt->file1;?>" style="max-height: 50px; max-width: 100px;"> <?php } elseif(strlen($p_dt->file2)>0) { ?><img class="zoom1" src="<?php echo $this->config->item('asset_url');?>/productimg/<?php echo $p_dt->file2;?>" style="max-height: 50px; max-width: 100px;"><?php } else { echo "N/A"; } ?></td>
                                <td><?php echo $p_dt->size; ?></td>
                                <td><?php $totqua=$od_dt->quantity+ $totqua ;echo $od_dt->quantity; ?></td>
                                <td><?php $totAmount += $od_dt->subtotal; echo $od_dt->subtotal; ?></td>
                                
                            </tr>
                        <?php    $i++; }
                           }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                              <td><strong>Total</strong></td>
                              <td><?php $id=$this->session->userdata("id");
                              $this->db->select_sum('quantity');
                              $this->db->select_sum('subtotal');
                              $this->db->where('cust_id',$id);
                              $v = $this->db->get('order_detail')->row();?>
                              </td>
                                <td></td>
                                <td></td>
                                <td style="color:red;"><strong><?php echo $totqua;?></strong></td>
                                <td style="color:red;"><strong><?php echo number_format($totAmount,2); ?></strong></td>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>