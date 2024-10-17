<?
	$TEMP_PAGE_TITLE = "הזמנה";
	$TEMP_INPAGE_TITLE = "הזמנה";
	
	
	
	//ROBOTS Security
	$validation_for_robots = $_POST['1337s3cur17y'];
	
	if($validation_for_robots != '1337t34mw1llfu'){
		
		//echo "OOOPS seems like you are trying to hack CMS8 - Well too bad, a team of highly skilled developers is after you mr IP ".$_SERVER['REMOTE_ADDR'];
		echo "1337";
		//echo "<br>";
		//echo $_POST['1337s3cur17y'];
	}else{
	
	
	
		$TEMP_TEMPLATE = 6;
	
	
		$sitename = mysql_query("SELECT * FROM config_site WHERE id = '2'");
				$sn = mysql_fetch_array($sitename);
	
		$sum = 0;
		$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
		while($gi = mysql_fetch_array($get_items)){
		$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
		$gip = mysql_fetch_array($get_item_products);
	
	
		if($gip['price_sale'] != ''){
				$sum += $gip['price_sale']*$gi['quantity'];
				} else {
				$sum += $gip['price']*$gi['quantity'];
				}
		}		
		$Get_Cupon = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_SESSION['coupon_code']."'");
		$GC = mysql_fetch_array($Get_Cupon);	
	
		$shipping = number_format(50);
	


	$sum = 0;
																				$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
																				while($gi = mysql_fetch_array($get_items)){
																				
																				$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
																				$gip = mysql_fetch_array($get_item_products);
																				
																				if($gip['price_sale'] != '0'){
																				$sum += $gip['price_sale']*$gi['quantity'];
																				} else {
																				$sum += $gip['price']*$gi['quantity'];
																					
																				}
																				
																				
																				
																				
																				}


	if($USER_LOGIN){ $member_discount = 0.9; } else { $member_discount = 1.0; }
		
		 if($GC['id'] != ''){
			$cupon = $GC['discount'];
			 } else {
				 $cupon = 0;
				 
				 }
				$total_price =  ((($sum)-$cupon)*$member_discount)+50;
					
	
	
	
	if($_POST['terms'] == 'SUBTRUE'){
		
		
		$get_order_new = mysql_query("SELECT * FROM mod_orders ORDER BY id DESC LIMIT 1");
		$gon = mysql_fetch_array($get_order_new);
		
		
		
		
		$_SESSION["order_session"] = ($gon['id']+1);
		
		
		$contact_email = mysql_query("SELECT * FROM contact_config WHERE id = '1'");
		$ce = mysql_fetch_array($contact_email);
		
		
	
		
		
		
		$from = $ce['email'];//.$_SERVER['REQUEST_URI'];	
		
		
		$fName = $_POST['billing_first_name'];
		$lName = $_POST['billing_last_name'];
		$Address1 = $_POST['billing_address_1'];
		$Address2 = $_POST['billing_city'];
		$Postcode = $_POST['billing_postcode'];
		$Phone = $_POST['billing_phone'];
		$Email = $_POST['billing_email'];
		$Comments = $_POST['comments'];
		$Method = $_POST['payment_method'];
		// Insert lead
		/*
		mysql_query("INSERT INTO contact_leads
		
		(`id`,`name`,`phone`,`email`,`subject`,`content`,`url`)
		VALUES 
		('','".$fName." ".$lName."','".$Phone."','".$Email."','הזמנה מהאתר','".$Content."',',order,payment')
		
		")or die(mysql_error());
		*/
		
		// Get member / lead_id
		
		if($USER_LOGIN){
			
			$gi = $USER_LOGIN['id'];
		} else {
			/*
			$get_it = mysql_query("SELECT * FROM `contact_leads` ORDER BY `id` DESC LIMIT 1")or die(mysql_error());
			$gp1 = mysql_fetch_array($get_it);
			$gi = $gp1['id'];
			*/
			$gi = '0';
		}
		
		// Insert order 

		mysql_query("INSERT INTO mod_orders 
		(`id`,`member`,`email`,`fname`,`lname`,`address1`,`address2`,`postalcode`,`phone`,`date`,`method`,`cart_id`,`total_price`,`order_session`) 
		VALUES 
		('','$gi','$Email','$fName','$lName','$Address1','$Address2','$Postcode','$Phone','".date("Y-m-d")."','$Method','".$_SESSION["cart"]."','".$total_price."','".$_SESSION["order_session"]."')")or die(mysql_error());
		
		
		
		
		// Insert items mod_orders_prods 

		
		$get_order = mysql_query("SELECT * FROM mod_orders ORDER BY id DESC LIMIT 1");
		$go = mysql_fetch_array($get_order);
			
		$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
			while($gi = mysql_fetch_array($get_items)){
			
			mysql_query("INSERT INTO `mod_orders_pords`
		(`id`,`order_id`,`prod_id`,`quantity`,`date`) 
		VALUES 
		('','".$go['id']."','".$gi['product_id']."','".$gi['quantity']."','".date("Y-m-d")."')
		
		")or die(mysql_error());
			
			}
			
			
			// בעתיד לחשוב מה יקרה אם הוא רוצה לקנות יותר מגיפטכארד אחד
			
		// Insert giftcard if exist 
		
		$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
		while($gi = mysql_fetch_array($get_items)){
		$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE mod_products.page_id = $gi[product_id] AND mod_products_list.cat_id = '61'");
		$gip = mysql_fetch_array($get_item_products);
			if($gip['cat_id'] == '61'){
			$giftcard_category = '61';
			$giftcard_price = $gip['price'];
			}
		}
		
		
		
		if($giftcard_category == '61'){ 
		
		
		$generate_code = substr(sha1(mt_rand()),17,6);
		$reciver_name = $_POST['giftcard_name'];
		$reciver_email = $_POST['giftcard_email'];
		$giftcard_description = $_POST['giftcard_description'];
		$giftcard_price = $giftcard_price;
		
		
		// VALIDATE CUPON USED
		
		
		$Validate_cupon = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_SESSION['coupon_code']."'");
		$V = mysql_num_rows($Validate_cupon);
		
		if($V > 0){
			
			
			mysql_query("UPDATE `mod_giftcards` SET `used` = '1' WHERE `code` = '".$_SESSION['coupon_code']."'");
			
			
		} else {
			
			//echo "nada";
		}

		// VALIDATE CUPON USED end
		
		
		
		
		
		
		
		
		
		mysql_query("INSERT INTO `mod_giftcards` (`id`,`code`,`reciver_name`,`reciver_email`,`description`,`price`,`discount_amount`,`used`) VALUES ('','$generate_code','$reciver_name','$reciver_email','$giftcard_description','$giftcard_price','','0')")or die(mysql_error());
		
		
		mysql_query("INSERT INTO `mod_cupons` (`id`,`cupon_id`,`discount`) VALUES ('','$generate_code','$giftcard_price')")or die(mysql_error());
		

		// Send Pretty email to reciver of the gift:
		$from_gift = $Email;
		$to_gift = $reciver_email;
		$subject_gift = "קיבלת שובר מתנה מ".$sn['name']." | ".$reciver_name;
		
		
		$mess = "<div style='width:100%;background-color:#fafafa;font-family:arial;direction:rtl;'>
<div style='width:70%;background-color:#ffffff;margin:auto;'>
			<center>
		<a href='http://www.audio-club.co.il/' target='_blank'><img src='http://www.audio-club.co.il/images/logo.png' style='border:0px;'></a>
		</center>
		<br>
	
		<div style='width:100%;background-image:url(https://www.audio-club.co.il/assets/images/banner/3-3.jpg);background-size:100%;background-position:center;text-align:center;font-size:32px;color:black;padding-top:150px;padding-bottom:150px;
		
		-webkit-box-shadow: 0px 0px 25px -5px rgba(230,230,230,1);
-moz-box-shadow: 0px 0px 25px -5px rgba(230,230,230,1);
box-shadow: 0px 0px 25px -5px rgba(230,230,230,1);
		border:1px solid #fefefe;'>
			קיבלת שובר מתנה!
		</div>
		<div style='clear:both;'></div>
		
		<div style='margin-top:50px;text-align:justify;direction:rtl;padding:40px;font-size:18px;'>
		
		שולח השובר: 

	";
		
		$mess .= $fName;
		$mess .= "		
		</div>
		
		
		
		
		<div style='text-align:justify;direction:rtl;padding:40px;'>
		
		";
		
		$mess .= $giftcard_description;
		$mess .= "
		
		</div>
	
		<div style='clear:both;'></div>
		<div style='line-height:70px;width:400px;margin:auto;height:70px;background-color:#0d6f42;margin-top:50px;border-radius:5px;text-align:center;color:white;font-weight:bold;text-decoration:none;'>
		קוד שובר מתנה לשימוש באתר: 
		
		";
		
		$mess .= $generate_code;
		$mess .= "	
		
		</div>
		<div style='clear:both;'></div>
		<div style='line-height:70px;width:400px;margin:auto;height:70px;margin-top:50px;text-align:center;font-weight:bold;text-decoration:none;'>
		
		על סך:
		";
		
		$mess .= $giftcard_price;
		$mess .= "
		ש'ח
		</div>
		
		
			<div style='clear:both;'></div>
		<div style='line-height:70px;width:100%;margin:auto;height:70px;margin-top:50px;text-align:center;font-weight:bold;text-decoration:none;'>
		<a href='' style='color:#0d6f42;'>
		לשימוש בשובר היכנס לאתר שלנו והוסף מוצר מבוקש לעגלת הקניות
		</a>
		</div>
		</div>
	</div>";
	
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=utf-8\r\n";
				$headers .= "From:".$from;

				
				
				
		// MAIL TO giftcard reciver
		if($_POST['payment_method'] == '1'){}else{
				mail($to_gift,$subject_gift,$mess,$headers)or die("not working!");
		}	
		

		
			
		}
		
		
		// send mail 
		$get_order = mysql_query("SELECT * FROM mod_orders ORDER BY id DESC LIMIT 1");
		$go = mysql_fetch_array($get_order);
		
		
		
		
		// get contact email
		
		$to = $Email;
		$subject = "הזמנה מספר | ".$go[id];
		
		
		
		
		
		
		
		
		// E-MAIL TEMPLATE
		
		$mess = "
				<br><br>
			<center>
		<a href='http://www.audio-club.co.il/' target='_blank'><img src='http://www.audio-club.co.il/images/logo.png' style='border:0px;'></a>
		</center>
		<br>
		<div style='font-family:Arial;padding:30px;'>
		<div style='text-align:right;color:white;font-weight:bold;width:100%;height:65px;line-height:65px;background-color:#0d6f42;border-left:5px;border-color:#0f834d;'><span style='padding-right:30px;'>הזמנתך התקבלה בהצלחה</span></div>

		<div style='width:25%;float:right;margin-top:40px;text-align:right;'>
		<b>מספר הזמנה:</b>
		".$go[id]."
		</div>
		<div style='width:25%;float:right;margin-top:40px;text-align:right;'>
		<b>שיטת תשלום:</b>
		אשראי
		</div>
		<div style='width:25%;float:right;margin-top:40px;text-align:right;'>
		<b>סכום הזמנה:</b>
		";
		$mess .= $total_price;
		$mess .= "
		</div>
		<div style='width:25%;float:right;margin-top:40px;text-align:right;'>
		<b>תאריך:</b>
		".date("Y-m-d")."
		</div>
		<div style='clear:both;'></div>
		<div style='padding-top:50px;text-align:right;font-weight:bold;font-size:22px;direction:rtl;'>
		פרטי ההזמנה:
		<hr>
		</div>


		<div style=''>
		<table style='width:100%;border:1px solid lightgray;border-bottom:3px solid lightgray;margin-top:50px;'>
			<tr style='background-color:#fafafa;'>
				<td align='right' style='border-top:1px solid lightgray;height:50px;'>
				<strong>שם המוצר</strong>
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong>כמות יחידות</strong>
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong>מחיר לפריט</strong>
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong>מחיר כולל</strong>
				</td>
			</tr>
				
		";

		// Products Cart
				
		$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
					while($gi = mysql_fetch_array($get_items)){
					
					$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
					$gip = mysql_fetch_array($get_item_products);
					
		$mess .= "
				<tr style=''>
				<td align='right' style='border-top:1px solid lightgray;height:50px;'>
				<strong></strong> ".$gip['title']."
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong></strong> ".$gi['quantity']."
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong></strong> 
				
				";
				if($gip['price_sale'] != ''){
				$mess .= $gip['price_sale'];
				} else {
				$mess .= $gip['price'];
				}
				$mess .= "₪
				
				</td>
				<td align='right' style='border-top:1px solid lightgray;'>
				<strong></strong> ";
				
				if($gip['price_sale'] != ''){
				$mess .= $gip['price_sale'] * $gi['quantity'];
				} else {
				$mess .= $gip['price'] * $gi['quantity'];
				}
				$mess .= "₪
				</td>
			</tr>
			
			";
																
					 } 
			
													

			$mess .= "
			
		</table>
		</div>
		<div style='clear:both;'></div>
		<div style='line-height:70px;width:400px;margin:auto;height:70px;background-color:#0d6f42;margin-top:50px;border-radius:5px;text-align:center;'><a target='_blank' style='color:white;font-weight:bold;text-decoration:none;' href='http://www.audio-club.co.il/,contact'>מעקב אחרי ההזמנה שלך</a></div>


		<div style='margin-top:50px;text-align:justify;direction:rtl;'>
		<hr>";

		$get_block_1 = mysql_query("SELECT * FROM mod_blocks WHERE page_id = '1'");
		$gb1 = mysql_fetch_array($get_block_1);
		$mess .= $gb1['text'];
		$mess .= "
		</div>
		<div style=''></div>
		</div>";

		// SEND PDF - NEED TO ADD:

				
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=utf-8\r\n";
				$headers .= "From:".$from;

				
				
				
		// MAIL TO CLIENT
		if($_POST['payment_method'] == '1'){}else{
				mail($to,$subject,$mess,$headers)or die("not working!");
		}	
		//Mail to admin
		
		if($_POST['payment_method'] == '1'){}else{
				mail($ce['email'],$subject,$mess,$headers)or die("not working!");
		}	
				
		// MAKE PDF 
		
		
		
		
		
		
		// Update Cart
	
		mysql_query("UPDATE `mod_cart` SET `member_id` = '".$gi."' WHERE `session_id` = '".$_SESSION["cart"]."'")or die(mysql_error());
		
	
		//echo $gi;
		
	} else {
		
		echo "Debug Error!";
		
	}
	
	
	
	
	
	
	
	function PAGE_TEXT() {
		global $fName,$lName,$Address1,$Address2,$Postcode,$Phone,$Email,$Comments,$gi,$GC,$total_price,$USER_LOGIN;
			
			// Get order DATA 
			
			
			$get_order = mysql_query("SELECT * FROM mod_orders ORDER BY id DESC LIMIT 1");
			$go = mysql_fetch_array($get_order);
			
			
			
			
			
			
				?>
				
			
				
				
				      <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">עמוד הבית</a>
                            <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                            <a href=",order">הזמנה</a>
                            <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>ההזמנה התקבלה
                        </nav>
                        <!-- .woocommerce-breadcrumb -->

                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">

                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                        
										
										
										
										
										
										
										
										
										
												
												
												
												
                                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                                    <li class="woocommerce-order-overview__order order">
                                                        מספר הזמנה
														
														
														<strong><?=$go['id'];?></strong>
                                                    </li>
													
													
													

                                                    <li class="woocommerce-order-overview__date date">
                                                        
														מועד הזמנה
														
														<strong><?=$go['time'];?></strong>
                                                    </li>

                                                    
                                                    <li class="woocommerce-order-overview__total total">
                                                        
														סכום הזמנה
														
																
																
																							

																				
														
														<strong><span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">₪</span>
														<? echo $total_price; ?></span></strong>
                                                    </li>

                                                    <li class="woocommerce-order-overview__payment-method method">
                                                            שיטת תשלום:
															
															<strong><?
																
																if($_POST['payment_method'] == '1'){
																	
																	echo "כרטיס אשראי";
																}
																
																?></strong>
                                                    </li>
                                                    
                                                </ul>
                                                <!-- .woocommerce-order-overview -->

                                            
                                                <section class="woocommerce-order-details">
                                                    <h2 class="woocommerce-order-details__title">פרטי הזמנה</h2>

                                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                        <thead>
                                                            <tr>
                                                                <th class="woocommerce-table__product-name product-name">שם מוצר</th>
                                                                <th class="woocommerce-table__product-table product-total">מחיר</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
														
														
														
														
														
														
															
															
															
															
															
															
																								<?
			$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
			while($gi = mysql_fetch_array($get_items)){
			
			$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
			$gip = mysql_fetch_array($get_item_products);
			
			
			?>
                                                               
                                                            <tr class="woocommerce-table__line-item order_item">

                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="single-product-fullwidth.html"><?=$gip['title'];?></a> 
                                                                    <strong class="product-quantity">× <?=$gi['quantity'];?></strong>
                                                                </td>

                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₪</span>
																	
																	<?
																	if($gip['price_sale'] != ''){
																		echo $gip['price_sale'] * $gi['quantity'];
																		
																	} else {
																		echo $gip['price'] * $gi['quantity'];
																		
																	}
																	?>
																	
																	
																	</span>  
                                                                </td>

                                                            </tr>

															
														
																
			<? } ?>	
                                                            
															

                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th scope="row">עלות הזמנה</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₪</span><? echo ($sum)-$GC['discount']; ?></span></td>
                                                            </tr>
															<? if($GC['discount'] != ''){ ?>
															<tr>
                                                                <th scope="row">הנחת קופון</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₪</span><? echo $GC['discount']; ?></span></td>
                                                            </tr>
															
															<? } ?>
                                                            <tr>
                                                                <th scope="row">משלוח</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₪</span><?=$shipping;?></span>&nbsp;<small class="shipped_via">משלוח רגיל</small></td>
                                                            </tr>
															
															
														
															
															
																<?
																
																// מועדון חברים
																// לשלוף אחוז הנחה מהאדמין בשלב יותר מאוחר
																
																
																if($USER_LOGIN){
																		
																		$members_discount = 10;
																		?>
																	 <tr>
                                                                <th scope="row">הנחת חברי מועדן</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">%</span><?=$shipping;?></span>&nbsp;<small class="shipped_via"><?=$members_discount;?></small></td>
                                                            </tr>
																<? } ?>
																
																
																
																
																
															
                                                            <tr>
                                                                <th scope="row">שיטת תשלום</th>
                                                                <td><?
																
																if($go['method'] == '1'){
																	
																	echo "כרטיס אשראי";
																}
																
																?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">סך הכל:</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₪</span><? echo $total_price; ?></span></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
													
											

													
											<?
				
				if($_POST['payment_method'] == '1'){?>
				
				
				
				
				
												<?
												// Get payment paypal email
												$get_paypal_email = mysql_query("SELECT * FROM contact_config WHERE id = '1'");
												$gpe = mysql_fetch_array($get_paypal_email);
												
												
												?>
					   
					   	
													<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
													
														<input type='hidden' name='custom' value='<?=$go['id'];?>'>
															<input type="hidden" name="landing_page" value="Billing">
															
																<input type="hidden" name="lc" value="he_IL">
																<input type="hidden" name="charset" value="utf-8">


															<input type="hidden" value="_cart" name="cmd">
															<input type="hidden" name="upload" value="1">
															
															<!--
															<input type="hidden" name="cmd" value="_xclick">

															-->
															
															<input type="hidden" name="business" value="<?=$gpe['email_paypal'];?>">
															<input type="hidden" name="currency_code" value="ILS">
															
															<!-- זה מחזיר את התשובה לשרת עם האישור תשלום 
															
															מספר 2 בווליו זה מעביר בפוסט
															מספר 1 זה מעביר בגט - דרך ה URL
															
															-->
															<input type='hidden' name='rm' value='2'>
															
															
															<?
															$get_order_url = "https://".$_SERVER['HTTP_HOST'];
															/*
															<input type="hidden" name="return" value="<?=$get_order_url;?>/,order,approved?payment_id=<?=$_SESSION["cart"]?>">
															*/
															
															?>
															
															<input type="hidden" name="return" value="<?=$get_order_url;?>/,order,approved">
															
															<input name="notify_url" value="<?=$get_order_url;?>/,order,payed" type="hidden">



															<!-- END-->
															
															
															
															<?
									$i = 1;							
			$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
			while($gi = mysql_fetch_array($get_items)){
			
			$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
			$gip = mysql_fetch_array($get_item_products);
			
			
		
															?>
															
																
																		
																		<?
																		if($gip['price_sale'] != '0'){
																				$Pprice = $gip['price_sale'];
																				} else {
																				$Pprice = $gip['price'];
																					
																				}
																		
																		
																		
																		
																		?>
																		
														

															<input type="hidden" name="item_name_<?=$i;?>" value="<?=$gip['title'];?>">
															<input type="hidden" name="amount_<?=$i;?>" value="<?=$Pprice;?>">
																		
															<input type="hidden" name="quantity_<?=$i;?>" value="<?=$gi['quantity'];?>">
															<!-- לשנות את המחיר משלוח אחרי זה לדיפולט שדה בדיבי 50 וגם לקחת מהמחיר משלוח של המוצר -->
															<input type="hidden" name="shipping_<?=$i;?>" value="<?=$gi['shipping'];?>">

															<?
															$i++;
															
															}
															?>
															
															<?
																$Get_Cupon = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_SESSION['coupon_code']."'");
																$GC = mysql_fetch_array($Get_Cupon);
																
																if($GC['id'] != ''){
																?>
													
															<input id="discount_amount_cart" name="discount_amount_cart" type="hidden" value="<?=$GC['discount']?>.00">
															
																<? } ?>
															
															
															
																	<?
																
															
																if($USER_LOGIN){
																		
																		$members_discount = 10;
																		?>
																<input id="discount_rate_cart" name="discount_rate_cart " type="hidden" value="<?=$members_discount?>.00">
																<? } ?>
																

														
															
															
															
															<input style="width:100%;" type="submit" border="0" name="submit" value="שלם באמצעות כרטיס אשראי">
													</form>
													
					   
					   
					   
					   
					   
					   
					   <!--
				       <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
					   
							שים לב! 
					   התשלום באמצעות Paypal אינו דורש הרשמה - ניתן לבחור באפשרות תשלום אורח בכרטיס אשראי
					   
					   </p>
						-->
										
				
				
				
				
				
				<?    } else { 	?>
				
										
										
										
                      <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">ההזמנה בוצעה - פרטי חשבון בנק להעברה</p>

												
												
					<?}?>							
								
													
												
													
										
													
													
													
													
													
                                                    <!-- .woocommerce-table -->
                                                </section>
                                                <!-- .woocommerce-order-details -->

                                        
                                            </div>
                                            <!-- .woocommerce-order -->
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
            <!-- #content -->

				
				
			<?
			}	
			?>
			
			<?
			} //END Security
			
			?>