<?php
	if(!is_array($USER_LOGIN))
		header("Location: ,members");
	else{
		$TEMP_PAGE_TITLE = "כרטיסיות תמיכה";
		$TEMP_INPAGE_TITLE = "כרטיסיות תמיכה";

		function PAGE_TEXT() {
			global $USER_LOGIN;
			$order=true;
			//include	"inc/mem_menu.php";
			$orders_q=mysql_query("SELECT * FROM `mod_orders` WHERE `member`=".$USER_LOGIN["id"]." ORDER BY `id` DESC");
			
			
			
			
			?>
            
            
            		<table class="tickets">
            	<tr>
                <td style="background-color:#cccccc;" width="10" align="center">
                <b>
                   #ID</b>
                    </td>
                	<td style="background-color:#e7e7e7;width:100px;"><b>
                    תאריך פנייה
                   </b> </td>
                    <td style="background-color:#e7e7e7;"><b>
                    מהות הפנייה
                   </b> </td>

					<td style="background-color:#e7e7e7;"><b>
                    תשובה
                  </b>  
                    </td>
                </tr>
            
            
            <?
			
			
			
			
			
			while($orders_r=mysql_fetch_array($orders_q)){

			
?>


	
        	<tr>
            
            <td width="10" align="center">
                    <?= $orders_r['id']; ?>
                    </td>
                	<td>
                    <?= $orders_r['time']; ?>
                    </td>
                    <td>
                    <?= $orders_r['content']; ?>
                    </td>

					<td>
                    <?= $orders_r['faq']; ?>
                    </td>
                </tr>       


<?


			}
			?>
            
             </table>
            
            
            
            
            
            
            
            
            
            
            <?
		$q=mysql_query("SELECT `email` FROM `contact_config` WHERE `id`='1'");
		$r=mysql_fetch_array($q);
		
		
		
		$error=true;
		if($_POST["sub"]=="SUBTRUE"){
		$error=false;
		
		
		 
		 
		mysql_query("INSERT INTO `mod_orders`(`content`,`member`) VALUES ('{$_POST[name]}',".$USER_LOGIN["id"].")");
		
		
		$to = $r["email"];
		$subject = "כרטיסייה חדשה במערכת התמיכה | $_POST[name]";

		$mess = "
			<strong>מהות הפנייה: </strong> $_POST[name]<br>

			</div></body></html>
		";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "<html dir=\"rtl\">";
		$headers .= "<body>";
		$headers .= "<div dir='rtl' style='color: #000000; font-size: 10pt; font-family: Arial; text-align: right; diretion: rtl;'>";
		$headers .= "כרטיסייה חדשה באתרך: <br><br>";

		mail($to,$subject,$mess,$headers);
		
		
		
		
		echo "<meta HTTP-Equiv='Refresh' Content='3; URL=,members,orders' />";	
				
		}
		if($error){
		//echo "שגיאה";
		


?>

	<script type="text/javascript">
		$(document).ready(function(){		
				$('#contform').submit(function(){
					var error=false;
					var add='';
					$('#contform div.error').text('');
					$('#contform div.error').css(
						{top: -20+"px"}		
					);
					$('#contform input').removeClass("error");
					if($('#contform input[name=name]').val().replace(/[ ]*/,'')=="נושא הפנייה"){
						$('#contform input[name=name]').addClass("error");
						error=true;
						$('#contform div.error').text('אנא מלא את תוכן הכרטיסייה');
						
					}
					
					
					else{
						return true;
						
						
					}
					return false;
				});	
		});
	</script>


 <form action=",members,orders" id="contform" method="post">
 <br /><br />
			<div class="contact_title">
            
           <b>
            	פתח כרטיסייה חדשה
                </b>
                <br />
            <div class="error" style="color:red; text-align:center; font-size:12px; font-weight:bold; width:227px; padding-top:5px;"></div>
            </div>
           
            
            
            <div id="hideAfter">
            	<div class="input_style">
                <textarea style="width:680px;padding:2px 2px 2px 2px;resize:none;" rows="4" cols="25" name="name"  title="נושא הפנייה"></textarea>
				
	
				</div>
                <input type="hidden" name="sub" value="SUBTRUE" />
                <input class="page_menu_li_hover" value="פתח כרטיסייה" type="submit" style="margin-top:5px;border:0;color:white;font-size:12px;font-weight:bold; font-family:Arial, Helvetica, sans-serif; line-height:15px; text-align:center;float:left;" />
            </div>
        	</form>
            
            
            <? } ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            <?
			
			
		}
		$TEMP_TEMPLATE = 12;
	}
?>