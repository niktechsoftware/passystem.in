<?php //echo $orderid;
 $this->db->where('order_no', $orderid);
 $ord = $this->db->get('order_serial');
 if($ord->num_rows()>0)
 {
     $od_data = $ord->row();
 ?>
<div class="container">
    <div style="background-color: antiquewhite;">
        <center><h2 style="color:#f20089;margin:3%;">Your Order Details</h2></center>
    </div>
    <table class="table table-border">
        <thead>
            <th>Order No.</th>
            <th>Customer Name</th>
            <th>Delivery Incharge</th>
            <th>DI Mobile No.</th>
            <th></th>
        </thead>
        <tbody>
            <td><?php echo $od_data->order_no; ?></td>
            <td>
                <?php
                $this->db->where('id', $od_data->cust_id);
                $cust = $this->db->get('customers');
                if($cust->num_rows()>0)
                {
                    if(strlen($cust->row()->name)>0)
                    {
                        echo $cust->row()->name;
                    }
                    else
                    {
                        echo "N/A";
                    }
                }
                else
                {
                    echo "Data not found";
                }
                ?>
            </td>
            <!--<td>-->
                <?php
                    $this->db->where('id', $od_data->del_boy_id);
                    $emp = $this->db->get('employee');
                    if($emp->num_rows()>0)
                    { ?>
                        <td><?php if(strlen($emp->row()->mobile)>0) { echo $emp->row()->mobile; } else { echo "N/A"; } ?></td>
                        <td><?php if(strlen($emp->row()->mobile)>0) { echo $emp->row()->mobile; } else { echo "N/A"; } ?></td>
                <?php    }
                    else
                    { ?>
                        
                         <td>Delivery Incharge not Assign</td>
                         <td>Delivery Incharge not Assign</td>
                    <?php }
                    ?>
            <!--</td>-->
            <!--<td><?php //if(strlen($emp->row()->mobile)>0) { echo $emp->row()->mobile; } else { echo "N/A"; } ?></td>-->
            <!--<th></th>-->
        </tbody>
    </table>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3572.9999378289344!2d80.30688585061264!3d26.42347858725871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c47c2dae8d919%3A0xcc14b94b87a71c50!2sPAS%20System!5e0!3m2!1sen!2sin!4v1571733970683!5m2!1sen!2sin" width="80%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>
<?php }
else
{
    redirect('auth/track_order/5');
}
?>