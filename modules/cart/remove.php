<?php
require_once("../../config.php");





		
		$SQL = "DELETE FROM mod_cart WHERE `product_id`='".$_POST['product_id']."' AND `session_id` = '".$_SESSION["cart"]."'";
        $RUN_DEL = mysql_query($SQL)or die(mysql_error());
		
		echo $SQL;
		//echo $quantity;
		//echo $SQL;
		
	
	
	
	echo "";

?>
			<meta HTTP-Equiv='Refresh' Content='0; URL=/,cart' />
