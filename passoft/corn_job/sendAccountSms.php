<?php 
// class School_cron extends CI_controller
// {
   
// $dbhost="208.91.198.93";
// $dbuser="schoodhe_school";
// $dbpass="Rahul!123singh";
$dbhost="localhost";
$dbuser="passy8kw_pass";
$dbpass="Kailash@123";

$con=mysqli_connect($dbhost,$dbuser,$dbpass);
$con1=mysqli_select_db($con,'passy8kw_pass');        
    if($con1)
    {
        $query1="select * from pv";
        $res=mysqli_query($con,$query1);
        //print_r($res);
        $i=1;
        while($dt=mysqli_fetch_array($res))
        {
            $rs=$dt['pv']*90/100;
            $total=$rs+$dt['rupee'];

            //echo $dt['cid']."&nbsp;&nbsp;&nbsp;=>&nbsp; pv in rs=>&nbsp;".$rs."&nbsp; total balance=>&nbsp;".$total."<br>";
            $query2="select * from customers where username='".$dt['cid']."'AND pstatus='1'";
            $mb=mysqli_query($con,$query2);
           
            while($mbb=mysqli_fetch_array($mb))
            {
               // echo $i."&nbsp;".$dt['cid']."=>&nbsp;".$mbb['mobile']."<br>";  
               //echo $i."=>".$total."=>&nbsp;".$rs."<br>";
                echo "Dear Passystem Subscriber&nbsp;[".$mbb['name']."], Your monthly pv &nbsp;".$dt['pv']."&nbsp; has changed into &nbsp; ".$rs."&nbsp; rupees. Your previous balance was Rs.&nbsp;".$dt['rupee']."&nbsp; And Now your total balance is Rs.&nbsp;".$total."<br><br>";
            }
            $i++; 
            
            
        }
       // echo $total."<br>";
        //echo $rs;
    }
    else
    {
        echo "not";
    }
 ?>
