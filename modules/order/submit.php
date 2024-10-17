<?
	$TEMP_PAGE_TITLE = "הזמנה";
	$TEMP_INPAGE_TITLE = "הזמנה";
	$TEMP_TEMPLATE = 2;
	$pro=array_keys((array)$_POST["order_prod"]);
	$pro=array_filter($pro,create_function('$var','return (intval($var)>0);'));
	$pro=array_unique($pro);
	$pro[]=0;
	$prods_q=mysql_query("SELECT * FROM `mod_products_list` AS `l` 
								WHERE `l`.`id` IN(".implode(",",$pro).")")or die(mysql_error());
	if($_POST["sub"]!="SUBTRUE"
	 || trim($_POST["fname"])==""
	 || trim($_POST["lname"])==""
	 || trim($_POST["email"])==""
	 || !preg_match("/^([a-zA-Z0-9]+)([a-zA-Z0-9\._\-]+)*@([a-zA-Z0-9])+([a-zA-Z0-9\-][a-zA-Z0-9]+)*(\.[a-zA-Z0-9]{2,3}){1,2}$/",$_POST["email"])
	 || mysql_num_rows($prods_q)==0)
		header("Location: /,cart");
	else{
		$Vfname=mysql_real_escape_string($_POST["fname"]);
		$Vlname=mysql_real_escape_string($_POST["fname"]);
		$Vemail=mysql_real_escape_string($_POST["email"]);
		$Vphone=mysql_real_escape_string($_POST["phone"]);
		$Vcell=mysql_real_escape_string($_POST["cell"]);
		$city_q=mysql_query("SELECT `l`.`zipcode`,`l`.`title` FROM `data_city_list` AS `l` 
										WHERE `l`.`id`=".intval($_POST["city"]))or die(mysql_error());
		$city_r=mysql_fetch_array($city_q);
		$Vcity=mysql_real_escape_string($city_r["title"]);
		$Vzip=mysql_real_escape_string($_POST["zip"]);
		$Vaddress=mysql_real_escape_string($_POST["address"]);
		$Vmember=$USER_LOGIN!=false?$USER_LOGIN["id"]:0;
		$prods=array();
		$total=0;
		while($prods_r=mysql_fetch_array($prods_q)){
			$q=intval($_POST["order_prod"][$prods_r["id"]]);
			$price=$prods_r["onsale"]>0?$prods_r["newprice"]:$prods_r["price"];
			$total+=$price*$q;
			$prods[]=$prods_r;
		}		
		mysql_query("INSERT INTO `mod_orders` (`member`,`fname`,`lname`,`email`,`phone`,`cell`,`city`,`zip`,`address`,`total`,`time`)
		VALUES 
		('".$Vmember."','".$Vfname."','".$Vlname."','".$Vemail."','".$Vphone."','".$Vcell."','".$Vcity."','".$Vzip."','".$Vaddress."','".$total."',".time().")")or die(mysql_error());
		$id=mysql_insert_id();
		foreach($prods AS $prods_r){
			mysql_query("INSERT INTO `mod_orders_pords` (`order_id`,`prod_id`,`quantity`,`archiv`,`date`)
			VALUES
			('".$id."','".$prods_r["id"]."','".intval($_POST["order_prod"][$prods_r["id"]])."','".mysql_real_escape_string(serialize($prods_r))."',CURRENT_DATE())")or die(mysql_error());
		}
		mysql_query("DELETE FROM `mod_cart` WHERE `hash`='".mysql_real_escape_string($_SESSION["cart"])."'")or die(mysql_error());
		$Pemail=$Vemail;
		$block=get_block(9);
		$text=str_replace(
			array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__FNAME__}","{__LNAME__}","{__SITENAME__}"),
			array($Pemail,$Pcode,htmlspecialchars($Vfname)." ".htmlspecialchars($Vlname),htmlspecialchars($Vfname),htmlspecialchars($Vlname),htmlspecialchars($GET_SITE_CONFIG_r[name]))
			,$block["text"]);
		$subject=str_replace(
			array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__FNAME__}","{__LNAME__}","{__SITENAME__}"),
			array($Pemail,$Pcode,htmlspecialchars($Vfname)." ".htmlspecialchars($Vlname),htmlspecialchars($Vfname),htmlspecialchars($Vlname),htmlspecialchars($GET_SITE_CONFIG_r[name]))
			,$block["title"]);
		send_mail($Pemail,htmlspecialchars($GET_SITE_CONFIG_r[name])." <no-reply@audio-club.co.il>",$subject,$text);//
			function PAGE_TEXT() {
				echo "<% BLOCK_8 %>";

			}	
	
	}
	
		
		


?>