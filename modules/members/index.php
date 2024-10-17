<?php
	if(!is_array($USER_LOGIN))
		include "login.php";
	else{
		$TEMP_PAGE_TITLE = "פרופיל";
		$TEMP_INPAGE_TITLE = "פרופיל";

		$error=true;
		if($_POST["sub"]=="SUBTRUE"){
			$error=false;
			$Pname=mysql_real_escape_string(htmlspecialchars($_POST["name"]));
			$Pemail=mysql_real_escape_string(htmlspecialchars($_POST["email"]));
			$Pusername=mysql_real_escape_string(htmlspecialchars($_POST["username"]));
			$Pphone=mysql_real_escape_string($_POST["phone"]);
			$Pcell=mysql_real_escape_string($_POST["cell"]);
$Pfname=mysql_real_escape_string(htmlspecialchars($_POST["fname"]));
$Psex=$_POST["sex"];

//simple pic upload





				$for_pic=mysql_query("SELECT * FROM `mod_members` WHERE `id`='".$USER_LOGIN["id"]."'");
				$for_pic_array=mysql_fetch_array($for_pic);
					
					
				if($_FILES['pic']['size'] > 0)
				{
					 //file upload

      $errors= array();
      $file_name = $_FILES['pic']['name'];
      $file_size =$_FILES['pic']['size'];
      $file_tmp =$_FILES['pic']['tmp_name'];
      $file_type=$_FILES['pic']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['pic']['name'])));
      $expensions= array("jpeg","jpg","png");
$random = md5(uniqid("") . time());
	  
	   
      if(in_array($file_ext,$expensions)=== false){
        // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		 $error=true;
				$err="סיומת תמונה לא חוקית - ניתן להעלות רק קבצים בפורמט PNG או JPG";
      }
      
      if($file_size > 2097152){
		  $error=true;
		   $err="גודל הקובץ המירבי הוא 2MB";
        // $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
		  
         move_uploaded_file($file_tmp,"files/user_pic/".$random.$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

	  
         move_uploaded_file($file_tmp,"files/user_pic/".$random.$file_name);
        
		$pic_url = $random.$file_name;
   

//end file upload

				}

				elseif ($for_pic_array['pic'] == NULL) {
					
					
					
					if ($_POST['sex'] == '1'){
					function pic($dir = 'files/random_user/male')
							{
								$files = glob($dir . '/*.*');
								$file = array_rand($files);
								return $files[$file];
							}
							$pic_url = pic();
					} elseif ($_POST['sex'] == '2'){
						
						function pic($dir = 'files/random_user/female')
							{
								$files = glob($dir . '/*.*');
								$file = array_rand($files);
								return $files[$file];
							}
							$pic_url = pic();
						
					}

					
					
					// SELECT RANDOM IMG IF MALE / FEMALE
					
				} else {
					$pic_url = $for_pic_array['pic'];
					
					
				}

				//pic upload end

			$Pcell=strip($_POST["cell"],false,true);
			$Pnewsletter=intval($_POST["newsletter"]);
			$check_e=mysql_query("SELECT * FROM `mod_members` WHERE `email`='$Pemail'");
			/*if(md5($_POST["oldpass"])!=$USER_LOGIN["pass"]){
				$error=true;
				$err="סיסמה ישנה אינה נכונה";
			}else*/if(trim($Pname)==""){
				$error=true;
				$err="אנא מלא שם";
			}elseif(trim($Pemail) != "" && !preg_match("/^([a-zA-Z0-9]+)([a-zA-Z0-9\._\-]+)*@([a-zA-Z0-9])+([a-zA-Z0-9\-][a-zA-Z0-9]+)*(\.[a-zA-Z0-9]{2,3}){1,2}$/",$Pemail)){
				$error=true;
				$err="כתובת דוא\"ל לא חוקית";
			}elseif(trim($Pemail) != "" &&mysql_num_rows($check_e)>0 && $Pemail!=$USER_LOGIN["email"]){
					$error=true;
					$err="כתובת דוא\"ל קיימת במערכת";
			}elseif(trim($_POST["pass"]) !="" && $_POST["pass"] != $_POST["pass2"]){
				$error=true;
				$err="סיסמאות חדשות לא תואמות";
			}
			if(!$error){
				$err="<div class='col-md-12' style='text-align:center'>הפרטים עודכנו</div>";
				$Ppass=md5($_POST["pass"]);
				mysql_query("UPDATE `mod_members` SET
					".(trim($Pemail) != ""?"`email`='$Pemail',":"").(trim($_POST["pass"]) !=""?"`pass`='$Ppass',":"")."`name`='$Pname',`fname`='$Pfname',`sex`='$Psex',`pic`='$pic_url',
					`bday_year` = '".$_POST['bday_year']."',
					`bday_month` = '".$_POST['bday_month']."',
					`bday_day` = '".$_POST['bday_day']."',
					`birthday`='none',`phone`='$Pphone',`cell`='$Pcell',`username`='$Pusername' WHERE `id`=".$USER_LOGIN["id"])or die(mysql_error());
				if(trim($_POST["pass"]) !=""){
					if(isset($_SESSION["user"]) && $_SESSION["user"]!=null){
						$_SESSION["user"]=intval($USER_LOGIN["id"])."_".$Ppass;
					}
					if(isset($_COOKIE["USER"])){
						setcookie("USER[pass]",$Ppass,time()+60*60*24*31*12)or die();
					}
				}
					/*function PAGE_TEXT() {
				//	echo "<% BLOCK_3 %>";
				}*/
			}


		}
//	if($error){
	function PAGE_TEXT() {
		global $error,$err;
		$USER_LOGIN=loggedIn();
		$order=false;
		$Vfname=strip($USER_LOGIN["fname"]);
		$Vphone=strip($USER_LOGIN["phone"]);
		$Vemail=strip($USER_LOGIN["email"]);
		$Vcity=strip($USER_LOGIN["city"]);
		$Vaddress=strip($USER_LOGIN["address"]);

		$Vsex=strip($USER_LOGIN["sex"]);
		$Vday=intval($USER_LOGIN["bday_day"]);
		$Vmonth=intval($USER_LOGIN["bday_month"]);
		$Vyear=intval($USER_LOGIN["bday_year"]);
			
			
			
		$Vcell=strip($USER_LOGIN["cell"]);
		$Vnewsletter=strip($USER_LOGIN["newsletter"]);
		
		
		?>
			<div id="error123" style="font-weight:bold;width:100%;text-align:center;height:30px;line-height:30px;color:red;">
		<?
			echo $err;
			//print_r($_FILES);
?>


</div>





























	<div style="clear:both;"></div>
	<div class="container login-form" style="max-width:550px;width:100%;">


	
	
	
	
	
	
	
	
	
	
	
	          <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="customer-login-form">
                                           
                                                    <!-- .col-1 -->
                                                    <div style="width:100%;">
                                                        <h2>עריכת פרופיל</h2>
                                                       <form id="realregform" action=",members" method="post" autocomplete="off" enctype="multipart/form-data"  onSubmit="return validate();">
                                                           
													
                                                            <p class="form-row form-row-wide">
                                                                <label for="reg_email">כתובת דוא"ל
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="email" value="<?=$Vemail;?>" id="reg_email" name="email" class="woocommerce-Input woocommerce-Input--text input-text">
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
                                                             <input type="text" value="<?=$Vfname;?>" id="reg_email" name="fname" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">עיר
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" value="<?=$Vcity;?>" name="city" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															
															
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">כתובת
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" id="reg_email" value="<?=$Vaddress;?>" name="address" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															 
															 
															 <p class="form-row form-row-wide">
                                                                <label for="reg_password">טלפון
                                                                    <span class="required">*</span>
                                                                </label>
                                                             <input type="text" value="<?=$Vphone;?>" id="reg_email" name="phone" class="woocommerce-Input woocommerce-Input--text input-text">
                                                             </p>
															
															
															
															
															
                                                            <p class="form-row">
															<input type="hidden" class="woocommerce-Button button" name="sub" value="SUBTRUE" />
                                                                <input type="submit" class="woocommerce-Button button" name="register" value="עריכת פרטים" />
                                                            </p>
                                                           
                                                        </form>
                                                        <!-- .register -->
                                                    </div>
                                                    <!-- .col-2 -->
										
										
                                                </div>
                                                <!-- .col2-set -->
                                         
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
	
	
	
	
	
	
	



<?php
//	}
	//}
	}
		$TEMP_TEMPLATE = 2;
	}
?>
