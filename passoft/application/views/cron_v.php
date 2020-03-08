<?php 
// class School_cron extends CI_controller
// {
   
// $dbhost="208.91.198.93";
// $dbuser="schoodhe_school";
// $dbpass="Rahul!123singh";
// $dbhost="localhost";
// $dbuser="root";
// $dbpass="";

$dbhost="localhost";
$dbuser="passy8kw_pass";
$dbpass="Kailash@123";

$con=mysqli_connect($dbhost,$dbuser,$dbpass);
$con1=mysqli_select_db($con,'passy8kw_pass');        
    if($con1)
    {
        $query1="select * from pv";
        $res=mysqli_query($con,$query1);
        // print_r($res);
        $i=1;
        while($dt=mysqli_fetch_array($res))
        {
          $query2= "select  cust_id,sum(total_amount) as total from order_serial where cust_id='".$dt['cid']."';";
          $dft = mysqli_query($con,$query2);
        //   print_r($dft);
          while($dr=mysqli_fetch_array($dft))
          {
              $query3="select * from customers where id='".$dt['cid']."';";
              $asa = mysqli_query($con,$query3);
            //   print_r($asa);
            //   echo "<br>";
            while($dx=mysqli_fetch_array($asa))
            {
                $dk= $dx['created'];
               $joiny= date("y",strtotime($dk));
                $cy= date("y",strtotime(date("y-m-d")));
               if($cy==$joiny)
               {
                    $joinm= date("m",strtotime($dk));
                    $cm= date("m",strtotime(date("y-m-d")));
                   $av = $cm - $joinm;
                //   echo $dx['username']."=>".$av."<br>";
                 if($av>0)
                 {
                        if($dr['total']/$av>=2000)
                        {
                            $rs=$dt['pv']*90/100;
                            $total=$rs+$dt['rupee'];
                
                            // echo $dt['cid']."&nbsp;&nbsp;&nbsp;=>&nbsp; pv in rs=>&nbsp;".$rs."&nbsp; total balance=>&nbsp;".$total."<br>";
                            $query3="select * from customers where id ='".$dt['cid']."'AND pstatus='1'";
                            $mb=mysqli_query($con,$query3);
                               
                                        //   print_r($mb);
                                        while($mbb=mysqli_fetch_array($mb))
                                        {
                                          // echo $i."&nbsp;".$dt['cid']."=>&nbsp;".$mbb['mobile']."<br>";  
                                               //echo $i."=>".$total."=>&nbsp;".$rs."<br>";
                                                // echo "Dear Passystem Subscriber&nbsp;[".$mbb['name']."], Your monthly pv &nbsp;".$dt['pv']."&nbsp; has changed into &nbsp; ".$rs."&nbsp; rupees. Your previous balance was Rs.&nbsp;".$dt['rupee']."&nbsp; And Now your total balance is Rs.&nbsp;".$total."<br><br>";
                                                // $number ="8382829593";
                                                $query6 = "update pv set pv='0' , rupee='".$total."' where cid='".$dt['cid']."'";
                                                $chk= mysqli_query($con,$query6);
                                                if($chk)
                                                {
                                                    	$msg = "Dear Passystem Subscriber [".$mbb['name']."], Your monthly pv ".$dt['pv']." has been changed into ".$rs." rupees. Your previous balance was Rs. ".$dt['rupee']." And Now your total balance is Rs. ".$total.""; 
                                						//echo  $msg;
                                					     $mbb['mobile'];
                                					    $url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=PASS&password=pass12&msisdn=".$mbb['mobile']."&sid=PASYSM&msg=".urlencode($msg)."&fl=0&gwid=2";
                                					    //	$url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=niktecht&password=123@niktech&msisdn=8382829593&sid=".$dta2['sender_id']."&msg=".urlencode($msg)."&fl=0&gwid=2";
                                	                    $ch = curl_init();
                                            			curl_setopt($ch,CURLOPT_URL,$url);
                                            			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                                            			$output=curl_exec($ch);
                                            			curl_close($ch);
                                            				echo "ok1";
                                                }
                                                else
                                                {
                                                    echo "update not done";
                                                }
                        					
                                        }
                                    
                        }
                        else
                        {
                            
                        } 
                 }
               
               }
               else
               {
                   $y = $cy - $joiny;
                   $ym = $y*12;
                    $joinm= date("m",strtotime($dk));
                    $cm= date("m",strtotime(date("y-m-d")));
                    $adm = $cm+$ym;
                    $av = $adm - $joinm;
                    if($av>0)
                    {
                            if($dr['total']/$av>=2000)
                            {
                                $rs=$dt['pv']*90/100;
                                $total=$rs+$dt['rupee'];
                    
                                // echo $dt['cid']."&nbsp;&nbsp;&nbsp;=>&nbsp; pv in rs=>&nbsp;".$rs."&nbsp; total balance=>&nbsp;".$total."<br>";
                                $query3="select * from customers where id ='".$dt['cid']."'AND pstatus='1'";
                                $mb=mysqli_query($con,$query3);
                                 //   print_r($mb);
                                         while($mbb=mysqli_fetch_array($mb))
                                            {
                                               // echo $i."&nbsp;".$dt['cid']."=>&nbsp;".$mbb['mobile']."<br>";  
                                               //echo $i."=>".$total."=>&nbsp;".$rs."<br>";
                                                // echo "Dear Passystem Subscriber&nbsp;[".$mbb['name']."], Your monthly pv &nbsp;".$dt['pv']."&nbsp; has changed into &nbsp; ".$rs."&nbsp; rupees. Your previous balance was Rs.&nbsp;".$dt['rupee']."&nbsp; And Now your total balance is Rs.&nbsp;".$total."<br><br>";
                                                // $number ="8382829593";
                        					  $query6 = "update pv set pv='0' , rupee='".$total."' where cid='".$dt['cid']."'";
                                                $chk= mysqli_query($con,$query6);
                                                if($chk)
                                                {
                                                    	$msg = "Dear Passystem Subscriber [".$mbb['name']."], Your monthly pv ".$dt['pv']." has been changed into ".$rs." rupees. Your previous balance was Rs. ".$dt['rupee']." And Now your total balance is Rs. ".$total.""; 
                                						//echo  $msg;
                                					     $mbb['mobile'];
                                					   $url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=PASS&password=pass12&msisdn=".$mbb['mobile']."&sid=PASYSM&msg=".urlencode($msg)."&fl=0&gwid=2";
                                					    //	$url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=niktecht&password=123@niktech&msisdn=8382829593&sid=".$dta2['sender_id']."&msg=".urlencode($msg)."&fl=0&gwid=2";
                                	                    $ch = curl_init();
                                            			curl_setopt($ch,CURLOPT_URL,$url);
                                            			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                                            			$output=curl_exec($ch);
                                            			curl_close($ch);
                                            			echo "ok2";
                                                }
                                                else
                                                {
                                                    echo "update not done";
                                                }
                                            }
                               
                            }
                            else
                            {
                                
                            } 
                    }
                //   echo $dx['username']."=>".$av."<br>";
              
               }
                
            }
            //   echo $dr['cust_id']."=>".$dr['total']."<br>";
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
