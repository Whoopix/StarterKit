<?php
	if($USER_LOGIN!=false)
		header("Location: ,members");
	$TEMP_PAGE_TITLE = "התחברות";
	$TEMP_INPAGE_TITLE = "התחברות";
	$TEMP_TEMPLATE = 2;
	$error=true;
	$err="";
	if($_POST['sub'] == "SUBTRUE"){
		$I_pass=md5($_POST["pass"]);
		$I_email=mysql_escape_string($_POST["email"]);
		$LOG_q = mysql_query("SELECT * FROM `mod_members` WHERE `email` = '".$I_email."' AND `pass`='".$I_pass."'")or die(mysql_error());
		if(mysql_num_rows($LOG_q)>0){
			$error=false;
			$LOG_r = mysql_fetch_array($LOG_q);
			
			$_SESSION["user"]=intval($LOG_r["id"])."_".$LOG_r["pass"];
			
			if(intval($_POST["rem"])>0){
				setcookie("USER[id]",$LOG_r["id"],time()+60*60*24*31*12)or die();
				setcookie("USER[pass]",$LOG_r["pass"],time()+60*60*24*31*12)or die();
			}
			$USER_LOGIN=loggedIn();
			if($_POST["ret"])
				header("Location: /".$_POST["ret"]);
			else
				header("Location: /index.php"); 
	/*	if($USER_LOGIN == loggedIn()){ // DEBUG
		
		echo "<br>";
		echo $_SESSION["user"];
		echo "<br>";
		print_r($_COOKIE);

		echo "<br>";
		echo $LOG_r['email'];
		echo "<br>";
		echo "<hr>";
		echo $USER_LOGIN;
		
		}
 */
		}else{
			$err="הפרטים אשר הוזנו אינם נכונים";
		}
	}
	if($error){
		function PAGE_TEXT(){
			global $err;

		
?>
<? //include "user_box.php"; ?>

















  
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
                                                <span class="or-text">או</span>
                                                <div id="customer_login" class="u-columns col2-set">
                                                    <div class="u-column1 col-1">
                                                        <h2>התחברות</h2>
                                                        
														
                                                            <p class="before-login-text">
                                                              
															 <% BLOCK_7 %> 
															  <?
																
																echo "<div style=\"text-align:center;color:red;font-weight:bold;margin-top:30px;margin-bottom:30px;\">$err</div>";
																?>
															  
														 </p>	 <!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/he_IL/sdk.js#xfbml=1&version=v3.1&appId=279579572619866&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-login-button" data-width="" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>

<style>
.abcRioButtonLightBlue {
	width:100%!important;
}
</style>



														
													<meta name="google-signin-scope" content="profile email">
													<meta name="google-signin-client_id" content="263571625126-t1kabqh7obj774dv62b274r7eluk7php.apps.googleusercontent.com">
													<script src="https://apis.google.com/js/platform.js" async defer></script>

													<div class="g-signin2" data-width="500" data-onsuccess="onSignIn" data-theme="light" style="width:100%;"></div>
													<script>
													  function onSignIn(googleUser) {
														// Useful data for your client-side scripts:
														var profile = googleUser.getBasicProfile();
														
														// אז פה בעצם אפשר לפרסם את כל זה לקובץ PHP AJAX
														
														console.log("ID: " + profile.getId()); // Don't send this directly to your server!
														console.log('Full Name: ' + profile.getName());
														console.log('Given Name: ' + profile.getGivenName());
														console.log('Family Name: ' + profile.getFamilyName());
														console.log("Image URL: " + profile.getImageUrl());
														console.log("Email: " + profile.getEmail());

														// The ID token you need to pass to your backend:
														var id_token = googleUser.getAuthResponse().id_token;
														console.log("ID Token: " + id_token);
													  };
													</script>
															 
											 
															 
														
															  <p class="form-row form-row-wide">
															 	<button class="facebook-login-button login-button"
																	onclick="fbLogin()">Log in With Facebook</button>

																	<br/>

																	<button class="google-login-button login-button">Sign in with Google</button>
															 
															 </p> -->
															 <form id="realregform" action=",members" method="post" onsubmit="return onreg();" autocomplete="off" class="woocomerce-form woocommerce-form-login login">
														<input type="hidden" name="rem" value="1" />
                                                            <p class="form-row form-row-wide">
                                                                <label for="username">כתובת דוא"ל
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="text" class="input-text" name="email" id="username" value="" />
                                                            </p>
                                                            <p class="form-row form-row-wide">
                                                                <label for="password">סיסמה
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input class="input-text" type="password" name="pass" id="password" />
                                                            </p>
                                                            <p class="form-row">
																<input type="hidden" name="sub" value="SUBTRUE" />
                                                                <input class="woocommerce-Button button" type="submit" value="התחברות" name="login">
                                                                <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> זכור אותי
                                                                </label>
                                                            </p>
                                                            <p class="woocommerce-LostPassword lost_password">
                                                                <a href=",members,pass">שכחת סיסמה?</a>
                                                            </p>
                                                        </form>
                                                        <!-- .woocommerce-form-login -->
                                                    </div>
                                                    <!-- .col-1 -->
                                                    <div class="u-column2 col-2">
                                                        <h2>הרשמה</h2>
                                                     
                                                            <p class="before-register-text">
                                                                
																<% BLOCK_8 %>
																</p>
													
                                                          
																		 <div class="register-benefits">
                                                                <h3>הרשם היום לאתר ותוכל להנות ממגוון הטבות:</h3>
                                                                <ul>
                                                                    <li>קופונים והנחות לחברי מועדון</li>
                                                                    <li>עדכונים על מוצרים בולטים</li>
                                                                    <li>רכישה חוזרת באתר ללא צורך בהרשמה</li>
                                                                </ul>
                                                            </div>
															<br><br>
															
                                                            <p class="form-row">
                                                                <a href=",members,register" class="woocommerce-Button button" style="color:white;" >הרשמה</a>
                                                            </p>
                                                           
                                                
                                                        <!-- .register -->
                                                    </div>
                                                    <!-- .col-2 -->
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


	


	<!-- <label onclick="fbLogin()"
		   style="display: block; height: 40px; cursor: pointer;">
		<div class="fb-login-button"
			 style="pointer-events: none;"
			 data-width="360px"
			 data-max-rows="1"
			 data-size="large"
			 data-button-type="login_with"
			 data-show-faces="false"
			 data-auto-logout-link="false"
			 data-use-continue-as="false"></div>
    </label>

	<br/>

	<style> .g-signin2 > div { border-radius: 4px; } </style>
	<label style="display: block; height: 40px;">
		<div class="g-signin2"
			 data-width="360"
			 data-height="40"
			 data-longtitle="true"
			 data-onsuccess="onGoogleSignInSuccess"
			 data-onfailure="onGoogleSignInFailure"></div>
	</label> -->

	<style>
		.login-button {
			display: block;
			width: 100%;
			height: 40px;
			border-radius: 4px;
			border: none;
		}
		.login-button.facebook-login-button {
			background: #4267b2 url(/img/facebook-white-icon.svg) no-repeat center left 10px;
			background-size: 24px;
			color: #fff;
			font-size: 16px;
		    font-family: Helvetica, Arial, sans-serif;
		    letter-spacing: 0.25px;
		}
		.login-button.google-login-button {
			background: #fff url(/img/google-g-icon.svg) no-repeat center left 10px;
			box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
			color: #bfc1c7;
			font-size: 14px;
		    font-weight: 400;
		    font-family: Hind, sans-serif;
			transition: box-shadow .3s;
		}
		.login-button.google-login-button:hover {
			box-shadow: 0 0 3px 3px rgba(66,133,244,.3);
		}
	</style>


		
		
<script>
	function fbLogin() {
		return $.when()
		.then(function() {
			return $.Deferred(function(defer) {
				var params = {
					scope: 'public_profile,email',
					auth_type: 'rerequest'
				};
				FB.login(function(loginStatus) {
					(loginStatus.status === 'connected'? defer.resolve : defer.reject)(loginStatus);
				}, params);
			});
		})
		.fail(function(loginStatus) {
			console.log('User cancelled login dialog', loginStatus);
		})
		.then(function(loginStatus) {
			console.log('loginStatus after FB.login()', loginStatus);
			return $.ajax({
				type: 'POST',
				url: '/modules/members/facebook-login-handler.php',
				dataType: 'json',
				data: JSON.stringify({
					accessToken: loginStatus.authResponse.accessToken
				})
			})
			.then(
				function(resp) {
					afterSuccessfulSigninWithFbOrGoogle();
				},
				function(resp) {
					var data = JSON.parse(resp.responseText);

					console.log('Facebook login handler error', data);

					var promise = $.Deferred(function(defer) {
						FB.api('/me/permissions', 'delete', defer.resolve);
					})
					.then(function() {
						/*
							This is just to "refresh" the loginStatus state before the a possible next FB.login() call,
							since it otherwise wouldn't know whether the app has revoked itself from the user after a previous login attempt in which user declined email permission,
							and thus the FB.login()'s loginStatus will turn out 'connected' EVEN if the dialog was actually canclled...
						*/
						return $.Deferred(function(defer) {
							FB.getLoginStatus(defer.resolve, true);
						});
					});

					if (data.error.type === 'ERR_EMAIL_PERMISSION_DECLINED') {
						alert('WeFamily requires that you share your email address when signing in with Facebook. Please try again.');
					} else {
						alert("Couldn't sign-in with Facebook");
					}

					return promise.then(function() {
						return $.Deferred().rejectWith().fail(function(){});
					});
				}
			);
		});
	}

	function googleLogin(googleUser) {
		return $.ajax({
			type: 'POST',
			url: '/modules/members/google-login-handler.php',
			dataType: 'json',
			data: JSON.stringify({
				idToken: googleUser.getAuthResponse().id_token
			})
		})
		.then(
			function(data) {
				// This will prevent the automatic sign in that the google button does when rendered wherever the user will encounter it next time
				gapi.auth2.getAuthInstance().signOut().then(function() {
					afterSuccessfulSigninWithFbOrGoogle();
				});
			},
			function(error) {
				console.error('Google login handler error', error);
			}
		);
	}

	function afterSuccessfulSigninWithFbOrGoogle() {
		location.href = 'http://www.audio.digitalst.co.il';
	}



	document.addEventListener('DOMContentLoaded', function(event) {
		return $.when()
		.then(function() {
			return $.Deferred(function(defer) {
				gapi.load('auth2', defer.resolve);
			});
		})
		.then(function() {
			var auth2 = gapi.auth2.init({
				client_id: '263571625126-qfl7rd29j2drnogstmvqiq345plsrugj.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin'
			});
			auth2.attachClickHandler(
				document.querySelector('.google-login-button'),
				{},
				function(googleUser) {
					googleLogin(googleUser);
				},
				function(error) {
					console.log('Error attaching click handler to google button', error);
				}
			);
		});
	});
</script>



<?php
		}
	}

?>
