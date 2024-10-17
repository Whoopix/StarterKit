<?
	$TEMP_PAGE_TITLE = "הזמנה";
	$TEMP_INPAGE_TITLE = "הזמנה";
	$TEMP_TEMPLATE = 6;


		function PAGE_TEXT(){
			
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
                            הזמנה
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div class="content-area" id="primary">
                            <main class="site-main" id="main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                          






<!--
										  <div class="woocommerce-info">Returning customer? <a data-toggle="collapse" href="#login-form" aria-expanded="false" aria-controls="login-form" class="showlogin">Click here to login</a>
                                            </div>
                                            <div class="collapse" id="login-form">
                                                <form method="post" class="woocomerce-form woocommerce-form-login login">
                                                    <p class="before-login-text">
                                                        Vestibulum lacus magna, faucibus vitae dui eget, aliquam fringilla. In et commodo elit. Class aptent taciti sociosqu ad litora.
                                                    </p>
                                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                                    <p class="form-row form-row-first">
                                                        <label for="username">Username or email
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" id="username" name="username" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-last">
                                                        <label for="password">Password
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="password" id="password" name="password" class="input-text">
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p class="form-row">
                                                        <input type="submit" value="Login" name="login" class="button">
                                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                            <input type="checkbox" value="forever" id="rememberme" name="rememberme" class="woocommerce-form__input woocommerce-form__input-checkbox">
                                                            <span>Remember me</span>
                                                        </label>
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="#">Lost your password?</a>
                                                    </p>
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
                                            <!-- .collapse 
                                            <div class="woocommerce-info">Have a coupon? <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">Click here to enter your code</a>
                                            </div>
                                            <div class="collapse" id="checkoutCouponForm">
                                                <form method="post" class="checkout_coupon">
                                                    <p class="form-row form-row-first">
                                                        <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                                    </p>
                                                    <p class="form-row form-row-last">
                                                        <input type="submit" value="Apply coupon" name="apply_coupon" class="button">
                                                    </p>
                                                    <div class="clear"></div>
                                                </form>
                                            </div>
											
											
											
											
											
											-->
											
											
											
											
                                            <!-- .collapse -->
                                            <form action=",order,payment" id="1337F0rm" class="checkout woocommerce-checkout" method="post" name="checkout">
											
												
											
                                                <div id="customer_details" class="col2-set">
                                                    <div class="col-1">
											
									
											
											
										
										
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>פרטי המזמין</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                                        <label class="" for="billing_first_name">שם פרטי
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_last_name">שם משפחה
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                  
																  
																 <div class="clear"></div>
                                                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_address_1">כתובת
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="רחוב ומספר" id="billing_address_1" name="billing_address_1" class="input-text ">
                                                                    </p>
                                                                   
																   
                                                                    <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_city">עיר
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="" id="billing_city" name="billing_city" class="input-text ">
                                                                    </p>
                                                               
															   <p id="billing_postcode_field" class="form-row form-row-wide address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                                        <label class="" for="billing_postcode">מיקוד
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" required="required" value="" placeholder="" id="billing_postcode" name="billing_postcode" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="billing_phone">טלפון
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="tel" value=""  required="required" placeholder="" id="billing_phone" name="billing_phone" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_email">כתובת דוא"ל
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="email" value="" required="required"  placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                        </div>
                                                        <!-- .woocommerce-billing-fields 
                                                        <div class="woocommerce-account-fields">
                                                            <p class="form-row form-row-wide woocommerce-validated">
                                                                <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#createLogin" aria-controls="createLogin">
                                                                    <input type="checkbox" value="1" name="createaccount" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                                    <span>Create an account?</span>
                                                                </label>
                                                            </p>
                                                            <div class="create-account collapse" id="createLogin">
                                                                <p data-priority="" id="account_password_field" class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                                    <label class="" for="account_password">Account password
                                                                        <abbr title="required" class="required">*</abbr>
                                                                    </label>
                                                                    <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text ">
                                                                </p>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce-account-fields -->
														
														
														
														
														
														
														
																<? 
																
																// אם קיים מוצר מקטגורייה 61
																// פתח גיפטכארד שדות
																
																
																
												$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
												while($gi = mysql_fetch_array($get_items)){
												
												
												$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE mod_products.page_id = $gi[product_id] AND mod_products_list.cat_id = '61'");
												$gip = mysql_fetch_array($get_item_products);
												
												if($gip['cat_id'] == '61'){
												$giftcard_category = '61';
												}
												
												
												}
												
												
												//echo $_SESSION["cart"];
																
																
																
																if($giftcard_category == '61'){ ?>
											 
											 
											 
											 
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>פרטי שובר מתנה</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                                <div class="woocommerce-billing-fields__field-wrapper">
																 <!--
                                                                    <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_city"> בחר שובר מתנה (סכום)
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
																		
																		<select name="giftcard_type" class="input-text">
																		
																		<?
																		$get_giftcards_list = mysql_query("SELECT * FROM `mod_giftcards` ORDER BY `price` ASC")or die(mysql_error());
																		while ($ggl = mysql_fetch_array($get_giftcards_list)){
																		
																		?>
																		<option value="<?=$ggl['id'];?>"><?=$ggl['title'];?></option>
																		<? } ?>
																		</select>
                                                                        
                                                                    </p>-->
																
																
                                                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                                        <label class="" for="billing_first_name">שם מקבל שובר המתנה
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="" id="billing_first_name" name="giftcard_name" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_last_name">כתובת דוא"ל מקבל השובר
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="" required="required"  placeholder="" id="billing_last_name" name="giftcard_email" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                  
																  
																 <div class="clear"></div>
                                                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_address_1">הודעה למקבל השובר
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <textarea id="billing_address_1" name="giftcard_description" class="input-text "></textarea>
                                                                    </p>
                                                                   
																  
                                                               
												
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                        </div>
											 
											 
											 
											 
											 
											<? }else{} ?>
											
														
														
														
														
														
														
														
														
														
														
														
                                                    </div>
                                                    <!-- .col-1 -->
                                            
											<!-- .col-2 -->
                                                </div>
                                                <!-- .col2-set -->
                                                <h3 id="order_review_heading">ההזמנה שלך</h3>
                                                <div class="woocommerce-checkout-review-order" id="order_review">
                                                    <div class="order-review-wrapper">
                                                        <h3 class="order_review_heading">ההזמנה שלך</h3>
                                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name" style="text-align:right!important;">מוצר</th>
                                                                    <th class="product-total" style="text-align:left!important;">מחיר</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
															
															
																					
												<?
												$get_items = mysql_query("SELECT * FROM mod_cart WHERE session_id = ".$_SESSION["cart"]."");
												while($gi = mysql_fetch_array($get_items)){
												
												$get_item_products = mysql_query("SELECT * FROM mod_products INNER JOIN mod_products_list ON mod_products.page_id = mod_products_list.id WHERE page_id = $gi[product_id]");
												$gip = mysql_fetch_array($get_item_products);
												
												
												?>
                                                                <tr class="cart_item">
                                                                    <td class="product-name" style="text-align:right!important;">
                                                                        <strong class="product-quantity"><?=$gi['quantity'];?> ×</strong>
																		
																		 <a href=",products,show_<?=$gip['id'];?>" target="_blank">
																		<?=$gip['title'];?>
																		</a>
																		&nbsp;
                                                                    </td>
                                                                    <td class="product-total" style="text-align:left!important;">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₪</span><?  
																			
																			if($gip['price_sale'] != ''){
																			echo $gip['price_sale']*$gi['quantity'];
																			} else {
																				echo $gip['price']*$gi['quantity'];
																			}
																			
																			?></span>
                                                                    </td>
                                                                </tr>
																
													<? } ?>	
													
													
															
															
														
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th style="text-align:right!important;">סיכום ביניים</th>
                                                                    <td style="text-align:left!important;">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₪</span>
																			
																				
																			<?
																				

																		
																				echo $sum;
																			
																			?>
																			
																			
																			
																			</span>
                                                                    </td>
                                                                </tr>
																<tr class="cart-subtotal">
                                                                    <th style="text-align:right!important;">משלוח</th>
                                                                    <td style="text-align:left!important;">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₪</span>
																			
																		50
																			
																			
																			</span>
                                                                    </td>
                                                                </tr>
																
																<?
																$Get_Cupon = mysql_query("SELECT * FROM mod_cupons WHERE cupon_id = '".$_SESSION['coupon_code']."'");
																$GC = mysql_fetch_array($Get_Cupon);
																
																if($GC['id'] != ''){
																?>
																<tr class="cart-subtotal">
                                                                    <th style="text-align:right!important;">הנחת קופון</th>
                                                                    <td style="text-align:left!important;">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"></span>
																			
																		<?=$GC['discount']?>
																			
																			
																			</span>
                                                                    </td>
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
                                                                    <th style="text-align:right!important;">סך הכל</th>
                                                                    <td style="text-align:left!important;">
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">₪</span>
																				
																				
																				
																				
																			<? echo $total_price;
																					?>
																				
																				
																				
																				</span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
													
                                                        <!-- /.woocommerce-checkout-review-order-table -->
                                                        <div class="woocommerce-checkout-payment" id="payment">
                                                            <ul class="wc_payment_methods payment_methods methods">
                                                                <li class="wc_payment_method payment_method_bacs">
                                                                    <input type="radio" data-order_button_text="" checked="checked" value="1" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                                    <label for="payment_method_bacs">כרטיס אשראי </label>
                                                                    
                                                                </li>
                                                                <li class="wc_payment_method payment_method_cheque">
                                                                    <input type="radio" data-order_button_text="" value="2" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                                    <label for="payment_method_cheque">תשלום בהמחאות / מזומן </label>
                                                                    
                                                                </li>
                                                                <li class="wc_payment_method payment_method_cod">
                                                                    <input type="radio" data-order_button_text="" value="3" name="payment_method" class="input-radio" id="payment_method_cod">
                                                                    <label for="payment_method_cod">העברה בנקאית </label>
                                                                    
                                                                </li>
                                                            </ul>
                                                            <div class="form-row place-order">
                                                                <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                        <input type="checkbox" id="terms" value="SUBTRUE" required="required" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                                        <span>קראתי ואישרתי את  <a class="woocommerce-terms-and-conditions-link" href="Terms">תנאי השימוש וההזמנה</a></span>
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <input type="hidden" value="1" name="terms-field">
																	
																	
                                                                </p>
                                                                <input type="submit" id="13370rD3R" class="button wc-forward text-center" value="ביצוע הזמנה">
																</form>
																
																
                                                            </div>
                                                        </div>
                                                        <!-- /.woocommerce-checkout-payment -->
                                                    </div>
                                                    <!-- /.order-review-wrapper -->
                                                </div>
												<!--
												<button style="display:none;"
												class="g-recaptcha"
												data-sitekey="6LdBAVkUAAAAAO0MyyvFw_i7YzIcqqaeKzA_DvC0"
												data-callback="YourOnSubmitFn">
												Submit
												</button>-->
                                                <!-- .woocommerce-checkout-review-order -->
                                            </form>
                                            <!-- .woocommerce-checkout -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- #post-## -->
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

