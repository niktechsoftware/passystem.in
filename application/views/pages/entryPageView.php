<section class="login-page section-b-space">
<?php //$id= $this->uri->segment(3);
//$this->db->where('id',$id);
$row= $this->db->get('entry_table')->result();?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="text-center" style=" color: rgb(242, 0, 137); margin-top:5%;">Entry Page Registration</h3>
                <div class="theme-card" style="margin-top:40px;">
                 
                  <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Adviser Name</th>
                            <th>Visiter Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Present/Absent</th>
                            <th>FeedBack</th>
                            <th>Date Of Advising</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php
                        $i=1; 
                        foreach($row as $row1){?>
                            <tr>
                             <td><?php  echo $i;?></td>
                            <td><?php  echo $row1->name_of_ao;?></td>
                            <td><?php  echo $row1->visitor_name;?></td>
                            <td><?php  echo $row1->address;?></td>
                            <td><?php  echo $row1->contact_no;?></td>
                            <td><?php  echo $row1->prasent_absent;?></td>
                            <td><?php  echo $row1->feedback;?></td>
                            <td><?php  echo $row1->date_of_advising;?></td>
                            </tr>
                        <?php  $i++; } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S. No.</th>
                            <th>Adviser Name</th>
                            <th>Visiter Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Present/Absent</th>
                            <th>FeedBack</th>
                            <th>Date Of Advising</th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
               
            </div>
        </div>
    </div>

</section>
<!--Section ends-->
