
	<div>
		<center><h2>Transaction Details:</h2></center>
	</div>
	<div>
		<center><h2><?php echo $_POST["STATUS"] == "TXN_SUCCESS" ? "Transaction Status is Success" : "Transaction Status is Failure"; ?></h2></center>
	</div>
	
	<?php if (isset($_POST) && count($_POST)>0 ): ?>  
        <table style="width:75%; margin:auto; border:1px solid black; margin-bottom:30px;">
            <tr>
              <th style="border:1px solid black;"><?php echo "ORDER_ID" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["ORDERID"]; ?></td>
            </tr>
            
            <tr>
              <th style="border:1px solid black;"><?php echo "TXN_ID" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["TXNID"]; ?></td>
            </tr>
                    <tr>
              <th style="border:1px solid black;"><?php echo "TXN_AMOUNT" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["TXNAMOUNT"]; ?></td>
            </tr>
            <tr>
              <th style="border:1px solid black;"><?php echo "STATUS" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["STATUS"]; ?></td>
            </tr>
                    <tr>
              <th style="border:1px solid black;"><?php echo "RESP_MSG" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["RESPMSG"]; ?></td>
            </tr>
                    <tr>
              <th style="border:1px solid black;"><?php echo "CURRENCY" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["CURRENCY"]; ?></td>
            </tr>
            <tr>
              <th style="border:1px solid black;"><?php echo "BANK_TXN_ID" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo $_POST["BANKTXNID"]; ?></td>
            </tr>
                    <tr>
              <th style="border:1px solid black;"><?php echo "BANK_NAME" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo (isset($_POST["BANKNAME"])?$_POST["BANKNAME"]:""); ?></td>
            </tr>
            <tr>
              <th style="border:1px solid black;"><?php echo "TXN_DATE_TIME" ?></th>
              <td style="border:1px solid black; text-align:center;"><?php echo (isset($_POST["TXNDATE"])?$_POST["TXNDATE"]:date("Y-m-d H:i:s")); ?></td>
            </tr>
        </table>
        <center>
            <?php if($_POST["STATUS"] == "TXN_SUCCESS"): ?>
                <a href="<?= $successURI ?>" style="background-color:#4CAF50 ;border:none;color:white;padding:13px 30px;text-align:center;text-decoration:none;font-size:30px; ">GENERATE RECIEPT</a> 
            <?php else: ?>
                <a href="<?= $failURI ?>" style="background-color:#4CAF50 ;border:none;color:white;padding:13px 30px;text-align:center;text-decoration:none;font-size:30px; ">BACK</a> 
            <?php endif; ?>
        </center>
            
    <?php endif; ?>

