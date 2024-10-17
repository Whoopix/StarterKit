<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
           <meta name="keywords" content="<% SITE_KEYWORDS %>" />
	<meta name="description" content="<% SITE_DESCRIPTION %>" />
	<title><% SITE_NAME %> | <% PAGE_TITLE %></title>
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/bootstrap-grid.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/bootstrap-reboot.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/animate.min.css" media="all" />
     <!-- COPY ONLY SCRIPT MENU FROM HERE   <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css" media="all" /> --->
		<link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/colors/red.css" media="all" />
		<link rel="stylesheet" type="text/css" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/css/magnify.css" rel="stylesheet" type="text/css">

		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116667045-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116667045-2');
</script>

        <link rel="shortcut icon" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/images/fav-icon.png">
    </head>
    <body class="woocommerce-active single-product full-width normal" style="direction:rtl">

	
            <!-- .top-bar-v1 -->
		<? include "menu.php"; ?>
       
		<? 
		
		if($_SERVER['PHP_SELF'] == '/admin/resources/grapesjs-dev/index.php') {
			
			echo "<div>PAGE TEXT</div>";
		} else {
		
		//echo "2";
		
		PAGE_TEXT();
		}


		?>
	    
            <!-- #content -->
           <? include("footer.php"); ?>
		   <!-- .site-footer -->
        </div>
        <? include "social.php"; ?>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/tether.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/scrollup.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/pace.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/slick.min.js"></script>
        <script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/scripts.js"></script>
		
		<script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/js/website/cart.js"></script>
		<script type="text/javascript" src="https://<?=$_SERVER['SERVER_NAME'];?>/assets/js/jquery.magnify.js"></script>
		<script>
		$(document).ready(function() {
		  // Initiate magnification powers
		  $('.slick-track img').magnify();
		});
		</script>
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