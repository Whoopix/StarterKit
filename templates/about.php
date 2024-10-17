<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="">
    <head>
        <meta charset="UTF-8">
		<script src="https://apis.google.com/js/platform.js" async defer></script>

		<meta name="google-signin-client_id" content="263571625126-cleb2b6g93v2draqe5mu1i91n0qjlt17.apps.googleusercontent.com">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
           <meta name="keywords" content="<% SITE_KEYWORDS %>" />
	<meta name="description" content="<% SITE_DESCRIPTION %>" />
	<title><% SITE_NAME %> | <% PAGE_TITLE %></title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-grid.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
     <!-- COPY ONLY SCRIPT MENU FROM HERE   <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css" media="all" /> --->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/red.css" media="all" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116667045-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116667045-2');
</script>

		
        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>
  <body class="page home page-template-default">
        <div id="page" class="hfeed site" style="direction:rtl;">
	
            <!-- .top-bar-v1 -->
		<? include "menu.php"; ?>
       <div class="col-full" style="direction:rtl;">
		
		<? 
		
		if($_SERVER['PHP_SELF'] == '/admin/resources/grapesjs-dev/index.php') {
			
			echo "<div>PAGE TEXT</div>";
		} else {
		
		//echo "2";
		?>
		
		<div class="row">
		<div class="col-md-12">
		<?
		PAGE_TEXT();
		?>
		</div>
		
		</div>
		
		<?
		}


		?>
		</div>
            <!-- #content -->
          <? include "footer.php"; ?>        <!-- .site-footer -->
        </div>
		</div>
        <? include "social.php"; ?>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/scrollup.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="assets/js/pace.min.js"></script>
        <script type="text/javascript" src="assets/js/slick.min.js"></script>
        <script type="text/javascript" src="assets/js/scripts.js"></script>
		
		<script type="text/javascript" src="js/website/cart.js"></script>
		<script type="text/javascript">
																		jQuery('.remove').click(function(){
																			var $row = $(this).parent().parent();
																			var product_id = jQuery(this).attr("data-product_id");
																			console.log(product_id);
																			jQuery.ajax({
																				type: 'POST',
																				dataType: 'json',
																				url: "modules/cart/remove.php",
																				data: { 
																						action: "product_remove", 
																						product_id: product_id
																				},
																				success: function(){
																					
																					
																					 

																				}
																				
																			});
																			window.location.href=window.location.href;
																		});
																	</script>
        
    </body>
</html>