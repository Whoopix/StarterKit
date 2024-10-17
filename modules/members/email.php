<?php
	if($USER_LOGIN!=false){
		header("Location: ,members");
		die();
	}
	$TEMP_PAGE_TITLE = "אישור מייל";
	$TEMP_INPAGE_TITLE = "אישור מייל";
	$TEMP_TEMPLATE = 2;
	$error=true;
	$q=mysql_query("SELECT `id`,`pass` FROM `mod_members` WHERE `email`='".mysql_escape_string($_GET["email"])."' AND `code`='".mysql_escape_string($_GET["code"])."'");
	if(mysql_num_rows($q)>0){
		$r=mysql_fetch_array($q);
		$_SESSION["user"]=intval($r["id"])."_".$r["pass"];
		mysql_query("UPDATE `mod_members` SET `code`='".gocode(8)."',`stat`=1 WHERE `id`=".$r["id"]);
		header("Location: /,members,login");
	}else
		header("Location: /,members,login");
	
	function PAGE_TEXT(){
		
	}
	$TEMP_TEMPLATE = 2;

?>