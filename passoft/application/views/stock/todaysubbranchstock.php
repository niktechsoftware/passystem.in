                               <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Zero config.table start -->
                                            <div class="panel panel-white">
                                   
                                                <div class="panel-heading panel-red">
                                                <center>  <h5 class="text-bold">Pending Order List</h5></center>
                                                </div>
                                                <div class="panel-body">
                                                        <div class="row">
                        <div class="col-md-12 space20">
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                    Export <i class="fa fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-light pull-right">
                                    <li>-->
                                        <a href="#" class="export-pdf" data-table="#sbstock">
                                            Save as PDF
                                        </a>
                                    </li>
                                 
                                    <li>
                                        <a href="#" class="export-csv" data-table="#sbstock">
                                            Save as CSV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-txt" data-table="#sbstock">
                                            Save as TXT
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-xml" data-table="#sbstock">
                                            Save as XML
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="export-excel" data-table="#sbstock">
                                            Export to Excel
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-doc" data-table="#sbstock">
                                            Export to Word
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="export-powerpoint" data-table="#sbstock">
                                            Export to PowerPoint
                                        </a>
                                    </li>

                            </div>
                        </div>
                    </div>
                   <div class=" table-responsive">
                  <table id="sbstock" class="table  table-bordered ">
                <thead>
                  <tr style="background-color:#1ba593; color:white;">
                    <th>#</th>
                   <th>SB Name</th>
                  <th>P.Name</th>
                  <th>C.Name</th>
                  <th> Type</th>
                   <th> Code</th>
                  <th>Price</th>
                  <th>Sale Qty</th>
                  <th>t Qty</th>
                  <th>T Rs.</th>
                   <th>Date</th>
                 
                  </tr>
                </thead>
    <tbody>
             

                 
            <?php $i=1; $t=0;
                 $date= Date('y-m-d');

            $this->db->where('subbranch_id',$this->session->userdata('id'));
           // $this->db->where('date',$date);
            $subbr=$this->db->get('subbranch_wallet');
           foreach($subbr->result() as $row):?>
              <tr>   <?php
                    $this->db->where('id',$row->p_code);
                   $pcode= $this->db->get('stock_products')->row();

                   $this->db->where('id',$row->subbranch_id);
                  $sbr= $this->db->get('sub_branch')->row();
                   ?>    
                   <td style="width:10px;"><?php echo $i;?></td>
                   <td style="width:50px;"><?php echo $sbr->bname;?></td>
                  <td style="width:50px;"><?php echo $pcode->name;?></td>
                  <td style="width:30px;"><?php echo $pcode->company;?></td>
                  <td style="width:50px;"><?php echo $pcode->p_type;?></td>
                  <td style="width:50px;"><?php echo $pcode->hsn;?></td>
                  <?php $rs= $row->sale_quantity*$pcode->selling_price;
                
                  ?>
                <td style="width:30px;"><?php echo $pcode->selling_price;?></td>
                  <td style="width:20px;"><?php echo $row->sale_quantity;?></td>
                  <td style="width:20px;"><?php echo $row->rec_quantity;?></td>
                  <td style="width:30px;"><?php $t=$t+$rs; echo $rs;?></td>
                  <td style="width:50px;"><?php echo $row->date;?></td>

                 
                   </tr>
               
                <?php $i++;  endforeach; ?>
               
              </tbody>

              </table>

            </div>
        </div>
         <center>  <a href="<?php echo base_url();?>shopController/index"  class ="btn btn-info">Done</a></center>
    </div>
    </div>
    </div>
    </div>


