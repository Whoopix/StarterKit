<?php
require_once("../../config.php");


		$Get_Cart = mysql_query("SELECT * FROM mod_cart WHERE session_id = '".$_SESSION["cart"]."'");
		while ($gc = mysql_fetch_array($Get_Cart)){
		$pro_id = $gc['product_id'];
        $quantity = $_POST['qty' . $pro_id];
		$SQL = "UPDATE mod_cart SET `quantity` = '$quantity' WHERE `product_id`='".$gc['product_id']."' AND `session_id` = '".$_SESSION["cart"]."'";
        $run_qty = mysql_query($SQL)or die(mysql_error());
		
		
		//echo $quantity;
		//echo $SQL;
		
		}
    
	
	
	if($_POST['coupon_code'] != ''){
		
		$Validate = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_POST['coupon_code']."'");
		$V = mysql_num_rows($Validate);
		
		if($V > 0){
			$_SESSION['coupon_code'] = $_POST['coupon_code'];
			
		} else {
			
			echo "nada";
		}
		
	}
	
	
	echo "";

?>
			<meta HTTP-Equiv='Refresh' Content='0; URL=/,cart' />
