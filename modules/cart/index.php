<?php
$TEMP_PAGE_TITLE  = 'עגלת קניות';
$TEMP_INPAGE_TITLE = 'עגלת קניות';
$TEMP_TEMPLATE = 2;



function PAGE_TEXT() {
global $USER_LOGIN;


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
				
				
	?>



 <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">עמוד הבית</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-left"></i>
                            </span>
                            עגלת קניות
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="cart-wrapper">
                                                <form method="post" action="modules/cart/update.php" class="woocommerce-cart-form">
                                                    <table class="shop_table shop_table_responsive cart">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">מוצר</th>
                                                                <th class="product-price">מחיר</th>
                                                                <th class="product-quantity">כמות יחידות</th>
                                                                <th class="product-subtotal">סה"כ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
														
														
														
														
														
												<?
			$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
			while($gi = mysql_fetch_array($get_items)){
			
			$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
			$gip = mysql_fetch_array($get_item_products);
			
			
			?>

			

                                                            <tr class="pid<?=$gip['id'];?>">
                                                                <td class="product-remove">
                                                                    <a class="remove" href="#">×</a>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href=",products,show_<?=$gip['id'];?>" target="_blank">
                                                                        <img width="180" height="180" alt="" class="wp-post-image" src="single-product-fullwidth.html">
                                                                    </a>
                                                                </td>
                                                                <td data-title="" class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href=",products,show_<?=$gip['id'];?>">
                                                                            <img width="180" height="180" alt="" class="wp-post-image" src="files/products/<?=$gip['pic'];?>">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href=",products,show_<?=$gip['id'];?>" target="_blank"><b><!--ID(<?=$gip['id'];?>)</b>--> <?=$gip['title'];?></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-title="" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₪</span>
																		
																		
																		
																		<?
																		if($gip['price_sale'] != '0'){
																				echo $gip['price_sale'];
																				} else {
																				echo $gip['price'];
																					
																				}
																		
																		?>
																		
																		
																	
                                                                    </span>
                                                                </td>
                                                                <td class="product-quantity" data-title="">
                                                                    <div class="quantity">
                                                                        <label for="quantity-input-1">כמות יחידות</label>
                                                                        <input id="quantity-input-1" type="number" name="qty<?=$gip['id'];?>" value="<?=$gi['quantity'];?>" class="input-text qty text" size="4">
                                                                    </div>
                                                                </td>
                                                                <td data-title="" class="product-subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₪</span><? 
																		
																		
																		
																				if($gip['price_sale'] != '0'){
																				
																				echo $gip['price_sale']*$gi['quantity'];
																				} else {
																				echo $gip['price']*$gi['quantity'];
																					
																				}
																		




																		?>
                                                                    </span>
																	
																	
                                                                    <a data-product_id="<?=$gip['id'];?>" title="הסר מעגלת הקניות"  class="remove" style="cursor:pointer;font-weight:bold;color:red;">×</a>
																	
																	
																	
                                                                </td>
                                                            </tr>
			
			
			
			
			
			
			
			
			
			
			
			
			<? } ?>
					
														
														
														
														
														
														<tr>
                                                                <td class="actions" colspan="6">
                                                                    <div class="coupon">
                                                                        <label for="coupon_code">קוד קופון / שובר מתנה:</label>
                                                                        <input type="text" placeholder="קוד קופון / שובר מתנה" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                                        <input type="submit" value="שלח קופון" name="apply_coupon" class="button">
                                                                    </div>
																	
																	
																	
																	
																	
																	
																	
                                                                    <input type="submit" value="עדכן כמות מוצרים" name="update_cart" class="button">
																	
																	
																	
																	<!--
																	
																	
																	בעצם מבחינת לוגיקה:
																	לוקח את האינפוט של הכמות מהטבלה
																	
																	לעשות פה אג'קס שמעדכן את ה
																	QTY_ID
																	של המוצר
																	-->
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
                                                                </td>
                                                            </tr>
														
														
														
														
														
														
													
													
                                                        </tbody>
                                                    </table>
													
                                                    <!-- .shop_table shop_table_responsive -->
                                                </form>
                                                <!-- .woocommerce-cart-form -->
                                                <div class="cart-collaterals">
                                                    <div class="cart_totals">
                                                        <h2>סיכום עגלת קניות</h2>
                                                        <table class="shop_table shop_table_responsive">
                                                            <tbody>
                                                                <tr class="cart-subtotal">
                                                                    <th>סכום ביניים</th>
                                                                    <td data-title="Subtotal">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₪</span>
																			
																			<!--  -->
																			
																			<?
																				

																		
																				echo $sum;
																			
																			?>
																			
																			
																			
																			
																			</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="shipping">
                                                                    <th>משלוח</th>
                                                                    <td data-title="Shipping">50 ש"ח אחיד</td>
                                                                </tr>
																
																<?
																$Get_Cupon = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_SESSION['coupon_code']."'");
																$GC = mysql_fetch_array($Get_Cupon);
																
																if($GC['id'] != ''){
																?>
																 <tr class="shipping">
                                                                    <th>הנחת קופון</th>
                                                                    <td data-title="Shipping"><?=$GC['discount']?></td>
                                                                </tr>
																<? } ?>
																
																
																
																
																<?
																
																// מועדון חברים
																// לשלוף אחוז הנחה מהאדמין בשלב יותר מאוחר
																
																
																if($USER_LOGIN){
																		
																		$members_discount = 10;
																		?>
																 <tr class="members">
                                                                    <th>הנחת מועדון חברים</th>
                                                                    <td data-title="Shipping"><?=$members_discount;?>%</td>
                                                                </tr>
																<? } ?>
																
																
																
																
																
																
																
                                                                <tr class="order-total">
                                                                    <th> סך הכל </th>
                                                                    <td data-title="Total">
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol"> ₪</span>
																				<? echo $total_price
																					?>
																				
																				
																				</span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- .shop_table shop_table_responsive -->
                                                        <div class="wc-proceed-to-checkout">
                                                           <!-- <form class="woocommerce-shipping-calculator" method="post" action="#">
                                                                <p>
                                                                    <a class="shipping-calculator-button" data-toggle="collapse" href="#shipping-form" aria-expanded="false" aria-controls="shipping-form">Calculate shipping</a>
                                                                </p>
                                                                <div class="collapse" id="shipping-form">
                                                                    <div class="shipping-calculator-form">
                                                                        <p id="calc_shipping_country_field" class="form-row form-row-wide">
                                                                            <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                                                <option value="">Select a country…</option>
                                                                                <option value="AX">Åland Islands</option>
                                                                                <option value="AF">Afghanistan</option>
                                                                                <option value="AL">Albania</option>
                                                                                <option value="DZ">Algeria</option>
                                                                                <option value="AS">American Samoa</option>
                                                                                <option value="AD">Andorra</option>
                                                                                <option value="AO">Angola</option>
                                                                                <option value="AI">Anguilla</option>
                                                                                <option value="AQ">Antarctica</option>
                                                                                <option value="AG">Antigua and Barbuda</option>
                                                                                <option value="AR">Argentina</option>
                                                                                <option value="AM">Armenia</option>
                                                                                <option value="AW">Aruba</option>
                                                                                <option value="AU">Australia</option>
                                                                                <option value="AT">Austria</option>
                                                                                <option value="AZ">Azerbaijan</option>
                                                                            </select>
                                                                        </p>
                                                                        <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
                                                                            <span>
                                                                                <select id="calc_shipping_state" name="calc_shipping_state">
                                                                                    <option value="">Select an option…</option>
                                                                                    <option value="AP">Andhra Pradesh</option>
                                                                                    <option value="AR">Arunachal Pradesh</option>
                                                                                    <option value="AS">Assam</option>
                                                                                    <option value="BR">Bihar</option>
                                                                                    <option value="CT">Chhattisgarh</option>
                                                                                    <option value="GA">Goa</option>
                                                                                    <option value="GJ">Gujarat</option>
                                                                                    <option value="HR">Haryana</option>
                                                                                    <option value="HP">Himachal Pradesh</option>
                                                                                    <option value="JK">Jammu and Kashmir</option>
                                                                                    <option value="JH">Jharkhand</option>
                                                                                    <option value="KA">Karnataka</option>
                                                                                    <option value="KL">Kerala</option>
                                                                                    <option value="MP">Madhya Pradesh</option>
                                                                                    <option value="MH">Maharashtra</option>
                                                                                    <option value="MN">Manipur</option>
                                                                                    <option value="ML">Meghalaya</option>
                                                                                    <option value="MZ">Mizoram</option>
                                                                                    <option value="NL">Nagaland</option>
                                                                                    <option value="OR">Orissa</option>
                                                                                    <option value="PB">Punjab</option>
                                                                                    <option value="RJ">Rajasthan</option>
                                                                                    <option value="SK">Sikkim</option>
                                                                                    <option value="TN">Tamil Nadu</option>
                                                                                    <option value="TS">Telangana</option>
                                                                                    <option value="TR">Tripura</option>
                                                                                    <option value="UK">Uttarakhand</option>
                                                                                    <option value="UP">Uttar Pradesh</option>
                                                                                    <option value="WB">West Bengal</option>
                                                                                    <option value="AN">Andaman and Nicobar Islands</option>
                                                                                    <option value="CH">Chandigarh</option>
                                                                                    <option value="DN">Dadra and Nagar Haveli</option>
                                                                                    <option value="DD">Daman and Diu</option>
                                                                                    <option value="DL">Delhi</option>
                                                                                    <option value="LD">Lakshadeep</option>
                                                                                    <option value="PY">Pondicherry (Puducherry)</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                                                            <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / ZIP" value="" class="input-text">
                                                                        </p>
                                                                        <p>
                                                                            <button class="button" value="1" name="calc_shipping" type="submit">עדכן הזמנה</button>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- .wc-proceed-to-checkout -->
                                                            <a class="checkout-button button alt wc-forward" href=",order">
				המשך להזמנה</a>
                                                            <a class="back-to-shopping" href="index.php">המשך לעיין באתר</a>
                                                        </div>
                                                        <!-- .wc-proceed-to-checkout -->
                                                    </div>
                                                    <!-- .cart_totals -->
                                                </div>
                                                <!-- .cart-collaterals -->
                                            </div>
                                            <!-- .cart-wrapper -->
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
          










		  


	
  <?php
}
?>

