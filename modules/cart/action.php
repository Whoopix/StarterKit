<?php
require_once("../../config.php");



// PARAMETERS:

	$product_id = $_POST['id'];
	$quantity = $_POST['quantity'];

	if($_POST['member_id'] == ''){
		
		$member_id = '0';

	} else {
		
		$member_id = $_POST["member_id"];

	}

// Create session id

	if($_SESSION["cart"] != ''){ // CHECK IF EXIST session_id

		//$sess_id = mysql_query("SELECT `session_id` FROM `mod_cart` WHERE `session_id` = '".$_SESSION["cart"]."'")or die(mysql_error());	
		$session_id = $_SESSION["cart"];	
		
	} else { // IF not EXIST CREATE session_id

		$session_id =  time()+(1337*7+5*770);
		
		session_start();
		$_SESSION["cart"] = $session_id;

	}



	
mysql_query("INSERT INTO mod_cart (id, product_id, quantity, session_id, member_id, date) VALUES ('','$product_id','$quantity','$session_id','$member_id', CURRENT_DATE())")or die(mysql_error());	







echo $session_id;
echo "<----->";
echo $_SESSION["cart"];

?>


<?php /*
session_start();
require_once("../../config.php");




$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByid = mysql_query("SELECT * FROM mod_products_list WHERE id='" . $_POST["id"] . "'");
			$itemArray = array($productByid[0]["id"]=>array('title'=>$productByid[0]["title"], 'id'=>$productByid[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByid[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByid[0]["id"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByid[0]["id"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
} */
?>