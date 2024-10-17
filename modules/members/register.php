<?php

	if($USER_LOGIN!=false)
		header("Location: ,members");

	$TEMP_PAGE_TITLE = "הרשמה";
	$TEMP_INPAGE_TITLE = "הרשמה";
	//$GLOBALS["members"]="alert('asd');";
		$error=true;
		$err="";
		if($_POST["sub"]=="SUBTRUE"){
			$error=false;
			$Pname=mysql_real_escape_string(htmlspecialchars($_POST["fname"]));
			$Pemail=mysql_real_escape_string(htmlspecialchars($_POST["email"]));
			$Pusername=mysql_real_escape_string(htmlspecialchars($_POST["username"]));
			$Pphone=mysql_real_escape_string($_POST["phone"]);
			$Pcell=mysql_real_escape_string($_POST["cell"]);

			$Pfname=mysql_real_escape_string(htmlspecialchars($_POST["fname"]));
			$Psex = $_POST['sex'];
	

			$check_e=mysql_query("SELECT * FROM `mod_members` WHERE `email`='$Pemail'");
			if(trim($Pname)==""){
				$error=true;
				$err= "אנא מלא שם";
			}elseif(!preg_match("/^([a-zA-Z0-9]+)([a-zA-Z0-9\._\-]+)*@([a-zA-Z0-9])+([a-zA-Z0-9\-][a-zA-Z0-9]+)*(\.[a-zA-Z0-9]{2,3}){1,2}$/",$Pemail)){
				$error=true;
				$err= "אימייל לא תקין";
			}elseif(mysql_num_rows($check_e)>0){
				$error=true;
				$err= "דואר אלקטרוני קיים";
			}elseif(trim($_POST["pass"]) ==""){
				$error=true;
				$err= "אנא הכנס סיסמה";
			}elseif($_POST["pass"] != $_POST["pass2"]){
				$error=true;
				$err= "סיסמה לא תואמת";
			}elseif($_POST["terms"]!=1){
				$error=true;
				$err= "אנא הסכם לתנאי השימוש";
			}
			if(!$error){
				

				
				$Pcode=gocode(8);
				$Ppass=md5($_POST["pass"]);
				mysql_query("INSERT INTO `mod_members`
					(`pic`,`sex`,`fname`,`username`,`email`,`pass`,`name`,`birthday`,`phone`,`cell`,`newsletter`,`code`,`stat`,`bday_year`,`bday_month`,`bday_day`) VALUES
					('$pic_url','$Psex','$Pfname','$Pusername','$Pemail','$Ppass','$Pname','none','$Pphone','$Pcell','$Pnewsletter','$Pcode' , 0,'".$_POST["bday_year"]."','".$_POST["bday_month"]."','".$_POST["bday_day"]."')")or die(mysql_error());
				
				
				
				
				$id=mysql_insert_id();
				$block=get_block(2);
				$link="http://www.".SITEDOMAIN."/".",members,email"."&code=".$Pcode."&email=".$Pemail;
				
				
				
				
				$text=str_replace(
					array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{_SITEDOMAIN_}"),
					array($Pemail,$Pcode,htmlspecialchars($_POST["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),SITEDOMAIN)
					,$block["text"]);
				
				
				$subject=str_replace(
					array("{__EMAIL__}","{__CODE__}","{__NAME__}","{__LINK__}","{__SITENAME__}","{_SITEDOMAIN_}"),
					array($Pemail,$Pcode,htmlspecialchars($_POST["name"]),$link,htmlspecialchars($GET_SITE_CONFIG_r[name]),SITEDOMAIN)
					,$block["title"]);
				send_mail($Pemail,htmlspecialchars($GET_SITE_CONFIG_r[name])." <no-reply@".SITEDOMAIN.">",$subject,$text);//
				
				
				
				
				function PAGE_TEXT() {
					//print_steps(2,2);
					
					?>
					
					
					
						
					
					
					
					
					
					
					<div class="container login-form" style="max-width:550px;">

	<div class="panel panel-default">
		<div class="panel-body">
					<% BLOCK_29 %>
					</div></div></div>
					
					
					<?php
				}
			}


		}
	if($error){
	function PAGE_TEXT() {
		global $error,$err;
		if($_POST["sub"]=="SUBTRUE"){
			//$_POST=ArrayClearHTML($_POST);
			$Vname=($_POST["name"]);
			$Vusername=($_POST["username"]);
			$Vfname=($_POST["fname"]);
			$Vcell=($_POST["cell"]);
			$Vsex=($_POST["sex"]);
		
			$Vpassword=($_POST["password"]);
			$Vpassword2=($_POST["password2"]);
			
			$Vemail=($_POST["email"]);
			
			
			
			$Vday=intval($_POST["bday_day"]);
			$Vmonth=intval($_POST["bday_month"]);
			$Vyear=intval($_POST["bday_year"]);
		}
		if($error){//
		
		?>
			<div id="error123" style="font-weight:bold;width:100%;text-align:center;height:30px;line-height:30px;color:red;">
			<?php

			echo $err;
?>

</div>


		<?
//			print_steps(2,1);

			?>

			<div style="clear:both;"></div>
		

       <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">אודיו קלאב</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>החשבון שלי
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="customer-login-form">
                                               
                                                <div id="customer_login" class="u-columns col2-set">
                                                    
                                                    <!-- .col-1 -->
                                                    <div class="u-column2 col-2">
                                                        <h2>הרשמה</h2>
                                                        <form class="register" method="post" action=",members,register">
                                                           
													
                                                            <p class="form-row form-row-wide">
                                                                <label for="reg_email">כתובת דוא"ל
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="email" value="" id="reg_email" name="email" class="woocommerce-Input woocommerce-Input--text input-text">
                                                            </p>
                                                            <p class="form-row form-row-wide">
                                                                <label for="reg_password">סיסמה
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="password" id="reg_password" name="pass" class="woocommerce-Input woocommerce-Input--text input-text">
                                                            </p>
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">אימות סיסמה
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="password" id="reg_password" name="pass2" class="woocommerce-Input woocommerce-Input--text input-text">
                                                            </p>
															
															
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">שם מלא
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" name="fname" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">עיר
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" name="city" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															
															
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">כתובת
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" name="address" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															 
															 
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">טלפון
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" name="phone" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															
															
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">אני מאשר/ת את תנאי השימוש באתר
                                                                    <span class="required">*</span>
                                                                </label>
                                                            <input type="checkbox" name="terms" value="1">
                                                             </p>
															
															
															
                                                            <p class="form-row">
															<input type="hidden" class="woocommerce-Button button" name="sub" value="SUBTRUE" />
                                                                <input type="submit" class="woocommerce-Button button" name="register" value="הרשמה" />
                                                            </p>
                                                           
                                                        </form>
                                                        <!-- .register -->
                                                    </div>
                                                    <!-- .col-2 -->
													<div class="u-column1 col-1">
                                                        <h2><% BLOCK_TITLE_8 %></h2>
                                                        
											
																		 <div class="register-benefits">
                                                                <h3>הרשם היום לאתר ותוכל להנות ממגוון הטבות:</h3>
                                                                <ul>
                                                                    <li>קופונים והנחות לחברי מועדון</li>
                                                                    <li>עדכונים על מוצרים בולטים</li>
                                                                    <li>רכישה חוזרת באתר ללא צורך בהרשמה</li>
                                                                </ul>
                                                            </div>
												<% BLOCK_8 %>
                                                    </div>
                                                </div>
                                                <!-- .col2-set -->
                                            </div>
                                            <!-- .customer-login-form -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
    
  </div>


	

					
					
					
					
					
					
					
					
					
					
					
					
					
	
	
	
	
	
	
	
	
	
	




	


	<!-- שדות חדשים


	<form id="realregform" action=",members,register" method="post" autocomplete="off">
	<table id="regform">







	<tr>
			<td>*כינוי:</td>
			<td><input class="bg" type="text" name="username" id="username" value="" />



			</td><td></td>
		</tr>


		<tr>
			<td>*שם פרטי:</td>
			<td><input class="bg" type="text" name="name" value="<?=$Vname;?>" /></td><td></td>
		</tr>



		<tr>
			<td>*שם משפחה:</td>
			<td><input class="bg" type="text" name="fname" value="<?=$Vname;?>" /></td><td></td>
		</tr>

			<tr>
			<td>*טלפון נייד:</td>
			<td><input class="bg" type="text" name="mobile" value="<?=$Vname;?>" /></td><td></td>
		</tr>

			<tr>
			<td>*מין:</td>
			<td></td><td></td>
		</tr>


			<tr>
			<td>*תמונה:</td>
			<td><input /></td><td></td>
		</tr>




		<tr>
			<td>*כתובת דוא"ל:</td>
			<td><input type="text" class="bg" name="email" value="<?=$Vemail;?>" /></td><td></td>
		</tr>
		<tr>
			<td>תאריך לידה:</td>
			<td>
				<div class="bith">
					<select class="year" name="year" >
						<?php for($i=date("Y")-1;$i>date("Y")-100;$i--){?><option value="<?=$i;?>"><?=$i;?></option><?}?>
					</select>
					<select class="month" name="month" >
						<?php for($i=1;$i<=12;$i++){?><option value="<?=$i;?>"><?=$i;?></option><?}?>
					</select>
					<select class="day" name="day" >
					<?php for($i=1;$i<=31;$i++){?><option value="<?=$i;?>"><?=$i;?></option><?}?>
					</select>
				</div>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>*סיסמה:</td>
			<td><input type="password" class="bg" name="pass" value="" /></td><td></td>
		</tr>
		<tr>
			<td>אימות סיסמה:</td>
			<td><input type="password" class="bg" name="pass2" value="" /></td>
			<td></td>
		</tr>

		<tr>
			<td colspan="2" valign="top" style="padding-top:15px;">
				<br />
				<input type="checkbox" name="newsletter" value="1" <?=($Vnewsletter==1)?" checked=\"checked\"":"";?>/>אני מאשר קבלת ניוזלטר מהאתר<br />
			</td>
			<td style="padding-top:15px;width:240px;text-align:left">
				<input type="hidden" name="sub" value="SUBTRUE" />
				<input type="image" src="images/send.png" value="שלח" alt="שלח" />
			</td>
		</tr>

	</table>
	</form> -->

<?/*


*/
	}
	}
	}
	$TEMP_TEMPLATE = 2;

?>
