<?

// צריך לזהות לאיזה הזמנה זה שייך -- לפי סשן?
// בעתיד נעשה פה עוד קצת אבטחה עם הודעת אישור לפייפאל על הIPN

//update order status

 	$TEMP_PAGE_TITLE = "הזמנה";
	$TEMP_INPAGE_TITLE = "הזמנה";
	$TEMP_TEMPLATE = 6;
	
	function PAGE_TEXT(){
		
		
		

		
		
		// הוא כן פונה לשרת לפי הלוגים
		// זה לא הגולש פונה --- זה הרובטוט של פייפאל - אי אפשר להשתמש פה בשדה סשן - צריך להעביר את הנתונים איכשהו של הזיהוי הזמנה
		// ORDER ID FROM PAYPAL
		
		// צריך בכל מקרה ולידציה על הסכום
		
		// לשלוח גם אימייל אישור על ההזמנה בשלב זה תשלום כרטיס אשראי לא שולח ברמת פיימנט
			
		$get_payment_amount = mysql_query("SELECT total_price FROM mod_orders WHERE id = '".$_POST["custom"]."'");
		$gpa = mysql_fetch_array($get_payment_amount);
		
		
		
		
		
		
		
		
	
		
		
		
		
		
		
		  // assign posted variables to local variables, apply urldecode to them all at this point as well, makes things simpler later
                $payment_status = $_POST['payment_status'];//read the payment details and the account holder

                if($payment_status == 'Completed')
                {
                    //Do something
					
					// Update payment
					mysql_query("UPDATE `mod_orders` SET `status` = '1' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
		
					
					
					
					
					
					
					
					
		$get_order = mysql_query("SELECT * FROM mod_orders WHERE id = '".$_POST['custom']."'");
		$go = mysql_fetch_array($get_order);
		
		
		
		
					
		$fName = $go['fname'];
		$lName = $go['lname'];
		$Address1 = $go['address1'];
		$Address2 = $go['address2'];
		$Postcode = $go['postalcode'];
		$Phone = $go['phone'];
		$Email = $go['email'];
		//$Comments = $go['comments'];
		$Method = $go['method'];
					
		
		
		
		
		
		$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$go['cart_id']."");
		while($gi = mysql_fetch_array($get_items)){
		$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE mod_products.page_id = $gi[product_id] AND mod_products_list.cat_id = '61'");
		$gip = mysql_fetch_array($get_item_products);
			if($gip['cat_id'] == '61'){
			$giftcard_category = '61';
			$giftcard_price = $gip['price'];
			}
		}
	
	
	
	
	
		
		
		
	
	
		
			if($giftcard_category == '61'){ 
		

		

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
		
				mail($to_gift,$subject_gift,$mess,$headers)or die("not working!");
		
		

		
			
		}
		
		
	
			

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
		
				mail($to,$subject,$mess,$headers)or die("not working!");
			
		//Mail to admin
		
		
		$contact_email = mysql_query("SELECT * FROM contact_config WHERE id = '1'");
		$ce = mysql_fetch_array($contact_email);
	
				mail($ce['email'],$subject,$mess,$headers)or die("not working!");
		
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                }
                else if($payment_status == 'Denied' || $payment_status == 'Failed' || $payment_status == 'Refunded' || $payment_status == 'Reversed' || $payment_status == 'Voided')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '2' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
					
                }
                else if($payment_status == 'In-Progress' || $payment_status == 'Pending' || $payment_status == 'Processed')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '3' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
                }
                else if($payment_status == 'Canceled_Reversal')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '4' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
               
          
            } else {
				// Respons is either none of those
				// TRYING TO HACK
				mysql_query("UPDATE `mod_orders` SET `status` = '6' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
			}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		
		  //Build the data to post back to Paypal
    $postback = 'cmd=_notify-validate'; 

    // go through each of the posted vars and add them to the postback variable
    foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $postback .= "&$key=$value";
    }


    // build the header string to post back to PayPal system to validate
    $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($postback) . "\r\n\r\n";

    // Send to paypal or the sandbox depending on whether you're live or developing
    // comment out one of the following lines
    //$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);//open the connection
    $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
    // or use port 443 for an SSL connection
    //$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

    if (!$fp) 
    {
        // HTTP ERROR Failed to connect
        //error handling or email here
    }
    else // if we've connected OK
    {
        fputs ($fp, $header . $postback);//post the data back
        while (!feof($fp)) 
        {
            $response = fgets ($fp, 1024);

            if (strcmp ($response, "VERIFIED") == 0) //It's verified
            {
                // assign posted variables to local variables, apply urldecode to them all at this point as well, makes things simpler later
                $payment_status = $_POST['payment_status'];//read the payment details and the account holder

                if($payment_status == 'Completed')
                {
                    //Do something
					
					
					mysql_query("UPDATE `mod_orders` SET `status` = '1' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
					
                }
                else if($payment_status == 'Denied' || $payment_status == 'Failed' || $payment_status == 'Refunded' || $payment_status == 'Reversed' || $payment_status == 'Voided')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '2' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
					
                }
                else if($payment_status == 'In-Progress' || $payment_status == 'Pending' || $payment_status == 'Processed')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '3' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
                }
                else if($payment_status == 'Canceled_Reversal')
                {
                    //Do something
					mysql_query("UPDATE `mod_orders` SET `status` = '4' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
                }
            }
            else if (strcmp ($response, "INVALID") == 0) 
            { 
                //the Paypal response is INVALID, not VERIFIED
				
				mysql_query("UPDATE `mod_orders` SET `status` = '5' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
            } else {
				// Respons is either none of those
				mysql_query("UPDATE `mod_orders` SET `status` = '6' WHERE id = '".$_POST["custom"]."'")or die(mysql_error());
			}
        } //end of while
        fclose ($fp);
    }
		
		
		
		
		
		
	*/	
		
		
		
		
		
		
		
		
		
		
		/*
			
			
			
	
		


	
	$vrf = file_get_contents('https://www.paypal.com/cgi-bin/webscr?cmd=_notify-validate', false, stream_context_create(array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\nUser-Agent: MyAPP 1.0\r\n",
        'method'  => 'POST',
        'content' => http_build_query($_POST)
    )
)));

if ( $vrf == 'VERIFIED' ) {
	
	
	mysql_query("UPDATE `mod_orders` SET `status` = '1' WHERE `cart_id` = '".$_SESSION["cart"]."' AND `total_price` = '".$_POST['payment_amount']."'")or die(mysql_error());
   
    // process payment
	// לעשות דיבאגינג אחד אחד לכל המקרי אבטחה
	// טוב ---- אז ברמה הראשונה של וריפייד זה לא עובד
	// אבל כן נשלחת בקשה לשרת לפי הלוגים --- אז זה כן בסדר הבקשה של האינפוט בעמוד פיימנט
	
	//mysql_query("UPDATE `mod_orders` SET `status` = '1' WHERE `cart_id` = '".$_SESSION["cart"]."' AND `total_price` = '".$_POST['payment_amount']."'")or die(mysql_error());
	
	
	if($_POST['payment_status'] == 'Completed'){
		if($_POST['payment_amount'] == $gpa['total_price'] && $_POST['payment_currency'] == 'ILS'){
			
		
		
		
		echo "approved!";
		
		} else {
			echo "payment amount and/or payment currency not valid!";
			
		}
		
	}else {
		
		echo "payment not approved!";
	}
	
	
	
	
	
	
	
	
	// Check that txn_id has not been previously processed
    // Check that receiver_email is your Primary PayPal email
	
	
	
}

else {

echo "error! FUCK YOU IMMA KILL YOU! 1337";
}


	
	
	
	
	
}*/




			?>