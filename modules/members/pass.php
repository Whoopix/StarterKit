<?php
	if($USER_LOGIN!=false)
		header("Location: ,members");

	$TEMP_PAGE_TITLE = "שכחתי סיסמה";
	$TEMP_INPAGE_TITLE = "שכחתי סיסמה";
	if($_GET["code"] && $_GET["email"]){
		function PAGE_TEXT(){
			global $GET_SITE_CONFIG_r;
			$Pemail=mysql_real_escape_string($_GET["email"]);
			$Pcode=mysql_real_escape_string($_GET["code"]);
			$check_e=mysql_query("SELECT * FROM `mod_members` WHERE `email`='$Pemail' AND `code`='$Pcode' AND `stat`=3");
			if(mysql_num_rows($check_e)>0){
						$check_r=mysql_fetch_array($check_e);
						$Pcode=gocode(8);
						$Ppass=gocode(8);
						mysql_query("UPDATE `mod_members` SET `code`='".$Pcode."',`pass`='".md5($Ppass)."',`stat`=1 WHERE `id`=".$check_r["id"]);
						$block=get_block(7);
						$link="http://".SITEDOMAIN."/".",members";
						$text=str_replace(
								array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{__NEWPASS__}","{_SITEDOMAIN_}"),
								array($Pemail,$Pcode,htmlspecialchars($check_r["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),$Ppass,SITEDOMAIN)
						,$block["text"]);
						$subject=str_replace(
								array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{__NEWPASS__}","{_SITEDOMAIN_}"),
								array($Pemail,$Pcode,htmlspecialchars($check_r["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),$Ppass,SITEDOMAIN)
							,$block["title"]);
						send_mail($Pemail,htmlspecialchars($GET_SITE_CONFIG_r[name])." < no-reply@".SITEDOMAIN.">",$subject,$text);//
							echo "<% BLOCK_20 %>";				
			}else
				header("Location: ,");


		}	
	}else{
		if($_POST["sub"]=="SUBTRUE"){
				function PAGE_TEXT(){
					global $GET_SITE_CONFIG_r;
					$Pemail=mysql_real_escape_string($_POST["email"]);
					$check_e=mysql_query("SELECT * FROM `mod_members` WHERE `email`='$Pemail'");
					if(mysql_num_rows($check_e)==0)
						echo "אימייל לא קיים במערכת";
					else{
						$check_r=mysql_fetch_array($check_e);
						
						$Pcode=gocode(8);
						mysql_query("UPDATE `mod_members` SET `code`='".$Pcode."',`stat`=3 WHERE `id`=".$check_r["id"]);
						$block=get_block(3);
						$link="http://".SITEDOMAIN."/".",members,pass"."&code=".$Pcode."&email=".$Pemail;
						$text=str_replace(
								array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{_SITEDOMAIN_}"),
								array($Pemail,$Pcode,htmlspecialchars($check_r["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),SITEDOMAIN)
							,$block["text"]);
						$subject=str_replace(
								array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{_SITEDOMAIN_}"),
								array($Pemail,$Pcode,htmlspecialchars($check_r["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),SITEDOMAIN)
							,$block["title"]);
						send_mail($Pemail,htmlspecialchars($GET_SITE_CONFIG_r[name])." <no-reply@".SITEDOMAIN.">",$subject,$text);//
							echo "<% BLOCK_5 %>";
			
						
							
					}
			}
		}else{
			function PAGE_TEXT(){
?>

<div class="container login-form">

<div class="panel panel-default">
		<div class="panel-body">
		<form  id="regform" action=",members,pass" method="post">
			
			
				<div class="input-group login-userinput">
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
					<input id="txtUser" type="text" class="form-control" name="email" placeholder="דואר אלקטרוני" value="">
				</div>
	
				<input type="hidden" name="sub" value="SUBTRUE">
				<button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i> שלח</button>
				
			</form>
		</div>
	</div>
				</div>
<?php			
			}		
		
		
		
		}
	}
	$TEMP_TEMPLATE = 2;

?>