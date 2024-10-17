<?php
	if($USER_LOGIN!=false){
		unset($_SESSION["user"]);
		unset($_SESSION["login"]);
			setcookie("USER[id]","",-1);
			setcookie("USER[pass]","",-1);
		//header("Location: ,");
	$TEMP_PAGE_TITLE  = 'התנתקות מתשתמשים';
	$TEMP_PAGE_TITLE  = 'התנתקות מתשתמשים';
	$TEMP_TEMPLATE = 2;
		function PAGE_TEXT(){
			header("Location: /index.php");
			go(",",0);
		}
	}
	
?>