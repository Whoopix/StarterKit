<?php
		$TEMP_PAGE_TITLE = "צור קשר";
		$TEMP_INPAGE_TITLE = "צור קשר";
		$q=mysql_query("SELECT `email`,`slide` FROM `contact_config` WHERE `id`='1'");
		$r=mysql_fetch_array($q);
		

		function PAGE_TEXT() {
			global $r;
			$error=true;
			if($_POST["sub"]=="SUBTRUE"){
				$error=false;
				
				$theurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				mysql_query("INSERT INTO `contact_leads` (`id`,`name`,`phone`,`email`,`subject`,`content`,`url`) VALUES ('','$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[subject]','$_POST[your_message]','$theurl')")or die(mysql_error());
				
		 	
		$from = $_POST["email"];	
		$to = $r["email"];
		$subject = "יצירת קשר מהאתר | $_POST[name]";
		
		// E-MAIL TEMPLATE
		
		$mess = "
		<h3 style='width:100%;text-align:center;'>יצירת קשר מהאתר | $_POST[name]</h3>
		<div style='margin:auto;background-color:#fafafa;border:1px solid #ffffff;outline:1px solid #f7f7f7; direction:rtl; width:500px;text-align:right;'>
			<strong>שם מלא: </strong> $_POST[name]<br>
			<strong>טלפון: </strong> $_POST[phone]<br>
			<strong>אימייל: </strong> $_POST[email]<br>
			<strong>דף פנייה: </strong> $theurl<br>

			<br><br>
			
			
			<b>הערות:</b>
			
			<br>$_POST[your_message]</div></body></html>
			
			</div>
		";
		
		$headers = "MIME-Version: 1.0\r\n";
		
		
		
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		
		$headers .= "<html dir=\"rtl\">";
		$headers .= "<body>";
		$headers .= "<div style='color: #000000; font-size: 10pt; font-family: Arial; text-align: right; diretion: rtl;'>";
		

		mail($to,$subject,$mess,$headers);

		echo "<font color='#990000'><i>$cont4</i></font>";
		
		// RESPONDE AFTER SEND
		?>   <div id="content" class="site-content" style="direction:rtl;">
                <div class="col-full">
                    <div class="row">


                                           
                                           
                                                    <h2 style="width:100%;" class="contact-page-title"><% BLOCK_3 %></h2>
                                                 <% BLOCK_1 %>
												
				 </div>		 </div>		 </div>		
		<meta HTTP-Equiv='Refresh' Content='3; URL=index.php' />
				
				
			<?	
			}
			
			
			
			if($error){
			echo "";
?>


   <div id="content" class="site-content" style="direction:rtl;">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">אודיו קלאב</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            צור קשר
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content" style="direction:ltr;">
                                        <div class="stretch-full-width-map" >
                                            <iframe height="514" allowfullscreen="" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13522.91466916517!2d34.7672978!3d32.0765868!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb715e272f86478ed!2z15DXldeT15nXlSDXp9ec15DXkQ!5e0!3m2!1siw!2sil!4v1524515406958"></iframe>
                                      
									  </div>
                                        <!-- .stretch-full-width-map -->
                                        <div class="row contact-info" style="direction:rtl;">
                                            <div class="col-md-9 left-col">
                                                <div class="text-block">
                                                    <h2 class="contact-page-title">שליחת הודעה בטופס</h2>
                                                 
												 </div>
                                                <div class="contact-form">
                                                    <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form class="wpcf7-form" method="post">
                                                            <div style="display: none;">
                                                                <input type="hidden" name="sub" value="SUBTRUE">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>שם מלא
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap first-name">
                                                                        <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="name">
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                                <div class="col-xs-12 col-md-6">
                                                                    <label>טלפון
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap last-name">
                                                                        <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="phone">
                                                                    </span>
                                                                </div>
                                                                <!-- .col -->
                                                            </div>
                                                            <!-- .form-group -->
                                                            <div class="form-group">
                                                                <label>דואר אלקטרוני</label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap subject">
                                                                    <input type="text" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="email">
                                                                </span>
                                                            </div>
                                                            <!-- .form-group -->
                                                            <div class="form-group">
                                                                <label>ההודעה שלך</label>
                                                                <br>
                                                                <span class="wpcf7-form-control-wrap your-message">
                                                                    <textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" name="your-message"></textarea>
                                                                </span>
                                                            </div>
                                                            <!-- .form-group-->
                                                            <div class="form-group clearfix">
                                                                <p>
                                                                    <input type="submit" value="שליחת הודעה" class="wpcf7-form-control wpcf7-submit" />
                                                                </p>
                                                            </div>
                                                            <!-- .form-group-->
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                        </form>
                                                        <!-- .wpcf7-form -->
                                                    </div>
                                                    <!-- .wpcf7 -->
                                                </div>
                                                <!-- .contact-form7 -->
                                            </div>
                                            <!-- .col -->
                                            <div class="col-md-3 store-info">
                                                <div class="text-block">
                                                    <h2 class="contact-page-title"><% BLOCK_TITLE_1 %></h2>
													
													
													
													
													
													
													
					
													
														<% BLOCK_1 %>
													
													
                                                    
                                                
												</div>
                                                <!-- .text-block -->
                                            </div>
                                            <!-- .col -->
                                        </div>
                                        <!-- .contact-info -->
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
            <!-- #content -->


<!--
They wanna see me fall
And i will never sell my soul
Im on some shit they aint never seen before
Dream chasin catching all my goals
--->
			
			

<?
			}
		}
		$TEMP_TEMPLATE = 3;

	
?>