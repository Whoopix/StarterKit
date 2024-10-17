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
<!-- Global site tag (gtag.js) - Google Analytics -->

		
        <link rel="shortcut icon" href="https://<?=$_SERVER['SERVER_NAME'];?>/assets/images/fav-icon.png">
		
		
	
	
		
		
    </head>
    <body class="woocommerce-active page-template-template-homepage-v1 can-uppercase" style="direction:rtl">

	
            <!-- .top-bar-v1 -->
		<? include "menu.php"; ?>
            <!-- ============================================================= Header End ============================================================= -->
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <div id="primary" class="content-area" style="direction:ltr;">
                            <main id="main" class="site-main">
							
							
							
							 <div class="home-v1-slider home-slider">
							
							<?
						/// להכניס את הלופים לפונקציות - שפולטות קלט שרק נקלט בעמוד הויזואלי ואם הוא בעורך טמפלייטים הוא נותן איזה טקסט - כדי שבעורך גרייפס זה יוצג כבלוק בלי כל המוצרים
								
								
							$get_slides = mysql_query("SELECT * FROM mod_pre_list AS mpl INNER JOIN mod_pre AS mp ON mpl.id = mp.page_id GROUP BY mpl.id ORDER BY mpl.order ASC");
							while($gets = mysql_fetch_array($get_slides)){
								
								$get_pic = mysql_query("SELECT * FROM mod_pre_list WHERE id = ".$gets['page_id']."");
								$gp = mysql_fetch_array($get_pic);
							
							?>
							
							
							
							
                               
                                    <div class="slider-1" style="position:absolute!important; background-image: url('files/upload/<?=$gp['pic'];?>');">
                                       
									   
                                        <div class="caption">
                                            <div class="title"><?=$gets['title'];?></div>
                                            <div class="sub-title">
											<?=$gets['text'];?>
											</div>
                                            <!--<div class="button">פרטים נוספים
                                                <i class="tm tm-long-arrow-right"></i>
                                            </div>-->
                                            <!--<div class="bottom-caption">Free shipping on US Terority</div>-->
                                        </div>
                                    </div>
                                    <!-- .slider-1 -->
							
							
							
							
							
							
							<?
							
							}
							?>
							
							
							
									
									
									
									
									
									
									
									
                                </div>
                                <!-- .home-v1-slider -->
								
								
								
								
								
                                <div class="features-list">
                                    <div class="features">
                                        <div class="feature">
                                            <div class="media">
                                               <i class="feature-icon d-flex mr-3 tm tm-free-return"></i>
                                                <div class="media-body feature-text">
                                                    <h5 class="mt-0"><b><% BLOCK_TITLE_9 %></b></h5>
                                                    <span><% BLOCK_9 %></span>
                                                </div>
												 
                                            </div>
                                        </div>
                                        <!-- .feature -->
                                        <div class="feature">
                                            <div class="media">
                                                <i class="feature-icon d-flex mr-3 tm tm-free-delivery"></i>
                                                <div class="media-body feature-text">
                                                    <h5 class="mt-0"><b><% BLOCK_TITLE_10 %></b></h5>
                                                    <span><% BLOCK_10 %></span>
													
                                                </div>
                                            </div>
											
                                            <!-- .media -->
                                        </div>
                                        <!-- .feature -->
                                        <div class="feature">
                                            <div class="media">
                                                <i class="feature-icon d-flex mr-3 tm tm-safe-payments"></i>
                                                <div class="media-body feature-text">
                                                    <h5 class="mt-0"><b><% BLOCK_TITLE_11 %></b></h5>
                                                    <span><% BLOCK_11 %></span>
                                                </div>
												
                                            </div>
                                            <!-- .media -->
                                        </div>
                                        <!-- .feature -->
                                        <div class="feature">
                                            <div class="media">
                                                <i class="feature-icon d-flex mr-3 tm tm-feedback"></i>
                                                <div class="media-body feature-text">
                                                    <h5 class="mt-0"><b><% BLOCK_TITLE_27 %></b></h5>
                                                    <span><% BLOCK_27 %></span>
                                                </div>
												
                                            </div>
                                            <!-- .media -->
                                        </div>
                                        <!-- .feature -->
                                        <div class="feature">
                                            <div class="media">
                                                <i class="feature-icon d-flex mr-3 tm tm-best-brands"></i>
                                                <div class="media-body feature-text">
                                                    <h5 class="mt-0"><b><% BLOCK_TITLE_28 %></b></h5>
                                                    <span><% BLOCK_28 %></span>
                                                </div>
                                            </div>
                                            <!-- .media -->
                                        </div>
                                        <!-- .feature -->
                                    </div>
                                    <!-- .features -->
                                </div>
                                <!-- /.features list -->
                                <div class="section-deals-carousel-and-products-carousel-tabs row">
                                    <section class="column-1 deals-carousel" id="sale-with-timer-carousel" >
                                        <div class="deals-carousel-inner-block">
                                            <header class="section-header" style="direction:rtl;">
                                                <h2 class="section-title">
                                                   מוצר השבוע</h2>
                                              
											  
                                            </header>
                                            <!-- /.section-header -->
                                            <div class="sale-products-with-timer-carousel deals-carousel-v1">
                                                <div class="products-carousel">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce columns-1">
                                                            <div style="height:400px!important;" class="products" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sale-with-timer-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}}]}">
                                                                
																
																
																
																
																
																
																
																
																
																
																
																
																<?
																
																$get_promoted_products = mysql_query("SELECT * FROM mod_products_list  WHERE promoted = '2'  LIMIT 20")or die(mysql_error());
																while($gpp = mysql_fetch_array($get_promoted_products)){
																	
																	$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gpp['id']."' AND lang_id = '1' AND mod = 'products'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gpp['id'];
																	}
																	
																
																?>
																
																<div class="sale-product-with-timer product"  style="direction:rtl;">
                                                                    <a class="woocommerce-LoopProduct-link" href="<?=$link;?>">
                                                                        <div class="sale-product-with-timer-header">
                                                                            <div class="price-and-title">
                                                                                <span class="price">
                                                                                    <ins>
                                                                                        <span class="woocommerce-Price-amount amount">
                                                                                            <span class="woocommerce-Price-currencySymbol">₪</span><?=$gpp['price'];?></span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="woocommerce-Price-amount amount">
                                                                                            <span class="woocommerce-Price-currencySymbol">₪</span><?=$gpp['price_sale'];?></span>
                                                                                    </del>
                                                                                </span>
                                                                                <!-- /.price -->
                                                                                <h2 class="woocommerce-loop-product__title"><?=$gpp['title'];?></h2>
                                                                            </div>
                                                                            <!-- /.price-and-title -->
                                                                            <div class="sale-label-outer">
                                                                                <div class="sale-saved-label">
                                                                                    <span class="saved-label-text">מחיר</span>
                                                                                    <span class="saved-label-amount">
                                                                                        <span class="woocommerce-Price-amount amount">
                                                                                            <span class="woocommerce-Price-currencySymbol"></span>מבצע</span>
                                                                                    </span>
                                                                                </div>
                                                                                <!-- /.sale-saved-label -->
                                                                            </div>
                                                                            <!-- /.sale-label-outer -->
                                                                        </div>
                                                                        <!-- /.sale-product-with-timer-header -->
																		
																		
																		
                                                                        <img width="224" height="197" alt="" class="wp-post-image" src="https://<?=$_SERVER['SERVER_NAME'];?>/files/products/<?=$gpp['pic'];?>">
                                                                       
																	  
																	  
                                                                        <!-- /.deal-countdown-timer -->
                                                                    </a>
                                                                    <!-- /.woocommerce-LoopProduct-link -->
                                                                </div>
																
																
																
																<?
																
																}
																
																?>
																
																
																
																
																
																
																
																
																
																
                                                            </div>
                                                            <!-- /.products -->
                                                        </div>
                                                        <!-- /.woocommerce -->
                                                    </div>
                                                    <!-- /.container-fluid -->
                                                </div>
                                                <!-- /.slick-list -->
                                            </div>
                                            <!-- /.sale-products-with-timer-carousel -->
                                            <footer class="section-footer" style="">
                                                <nav class="custom-slick-pagination">
                                                    <a class="slider-prev left" href="#" data-target="#sale-with-timer-carousel .products">
                                                        <i class="tm tm-arrow-left"></i>מוצר קודם</a>
                                                    <a class="slider-next right" href="#" data-target="#sale-with-timer-carousel .products">מוצר הבא<i class="tm tm-arrow-right"></i></a>
                                                </nav>
                                            </footer>
                                            <!-- /.section-footer -->
                                        </div>
                                        <!-- /.deals-carousel-inner-block -->
                                    </section>
                                    <!-- /.deals-carousel -->
                                    <section class="column-2 section-products-carousel-tabs tab-carousel-1" >
                                        <div class="section-products-carousel-tabs-wrap">
                                        
										
                                            <!-- .section-header -->
                                            <div class="tab-content">
                                                <div id="tab-59f89f0881f930" class="tab-pane active" role="tabpanel">
                                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:5,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1023,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2}},{&quot;breakpoint&quot;:1169,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3}}]}">
                                                        <div class="container-fluid">
                                                            <div class="woocommerce">
                                                                <div class="products">
                                                                    
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																			
																<?
																
																$get_promoted_products = mysql_query("SELECT *, mp.page_id AS page_id FROM mod_products_list AS mpl INNER JOIN mod_products AS mp ON mpl.id = mp.page_id WHERE mpl.promoted = '1' LIMIT 20")or die(mysql_error());
																while($gpp = mysql_fetch_array($get_promoted_products)){
																	
																	$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gpp['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gpp['page_id'];
																	}
																	

																
																?>
																
																	
																	
																	<div class="product">
                                                                        
																		
                                                                        <a href="<?=$link;?>" class="woocommerce-LoopProduct-link">
                                                                         <? 

																		$get_discount = mysql_query("SELECT * FROM mod_discounts WHERE discount_category = '".$gpp['cat_id']."'");
																		$gd = mysql_fetch_array($get_discount);
																		$gdX = mysql_num_rows($get_discount);
																		
																		if($gdX > 0){
																		 ?>
																		   <span class="onsale" style="z-index:999999;">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">%</span> <?=$gd['discount_amount'];?> הנחה</span>
                                                                        </span>
																		
																		<? } ?>




 <div class="col-md-12" style="width:100%;height:200px;background-image:url('files/products/<?=$gpp['pic'];?>');background-position:center center; background-repeat:no-repeat; background-size:contain;"></div>
                                                                       

																		  <span class="price">
                                                                                <ins>
                                                                                    <span class="amount"> </span>
                                                                                </ins>
                                                                                <span class="amount"> 
																				<?
																				
																				if($gpp['price_sale'] != ''){
																				echo $gpp['price_sale'];
																				} else {
																				echo $gpp['price'];
																					
																				}
																				
																				?>
																				
																				₪
																				
																				</span>
                                                                            </span>
                                                                            <!-- /.price -->
                                                                            <h2 class="woocommerce-loop-product__title"><?=$gpp['title'];?></h2>
                                                                        </a>
                                                                        <div class="hover-area">
																	
                                                                            <a class="button add_to_cart_button" style="cursor:pointer;" onclick="cartAction('add','<?=$gpp['page_id'];?>')" rel="nofollow">הוספה לסל קניות</a>
                                                                         <!--   <a class="add-to-compare-link" style="cursor:pointer;" onclick="compareAction('add','<?=$gpp['page_id'];?>')">הוספה לרשימת השוואה</a> -->
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.product-outer -->
																	
																	
																	
																	
																<? } ?>
																	
																	
																	
																	
																	
			
			
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce -->
                                                        </div>
                                                        <!-- .container-fluid -->
                                                    </div>
                                                    <!-- .products-carousel -->
                                                </div>
                           
						   
                                            </div>
                                            <!-- .tab-content -->
                                        </div>
                                        <!-- .section-products-carousel-tabs-wrap -->
                                    </section>
                                    <!-- .section-products-carousel-tabs -->
                                </div>
                      
					  <!-- .section-categories-carousel -->
                                <section style="background-size: cover; background-position: center center; background-image: url( assets/images/main-bg.jpg ); height: 853px;" class="section-landscape-full-product-cards-carousel">
                                    <div class="col-full">
                                       <!-- <header class="section-header">
                                            <h2 class="section-title">
                                                מוצרים
                                            </h2>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="row">
                                            <div class="landscape-full-product-cards-carousel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:1,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce columns-2">
                                                            <div class="products">
															
															
															
															<?
															
															
															$get_332 = mysql_query("SELECT *,mp.page_id AS page_id FROM mod_products_list AS mpl INNER JOIN mod_products AS mp ON mpl.id = mp.page_id WHERE mpl.promoted = '3' LIMIT 8");
															while($g332 = mysql_fetch_array($get_332)){
																
																
																
																	$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$g332['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$g332['page_id'];
																	}
																	
															?>
															
															
															
                                                                <div class="landscape-product-card product">
                                                                    <div class="media">
                                                                       
																	   
                                                                        <a class="woocommerce-LoopProduct-link" href="<?=$link;?>">
                                                                           
<div class="col-md-12" style="width:100%;height:200px;background-image:url('files/products/<?=$g332['pic'];?>');background-position:center center; background-repeat:no-repeat; background-size:contain;"></div>
																		   
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <a class="woocommerce-LoopProduct-link " href="<?=$link;?>">
                                                                                <span class="price">
																				
																				<?



																				if($g332['price_sale'] != ''){
																					?>
																					 <ins>
                                                                                        <span class="amount"> <?=$g332['price_sale'];?> ₪</span>
                                                                                    </ins>
                                                                                    <del>
                                                                                        <span class="amount"><?=$g332['price'];?> ₪</span>
                                                                                    </del>
																					<?
																				
																				} else {
																					
																					?>
																					 <ins>
                                                                                        <span class="amount"> <?=$g332['price'];?> ₪</span>
                                                                                    </ins>
                                                                                    
																					<?
																					
																				}
																				
																				?>
																				
																				
																				
                                                                                   
                                                                                </span>
                                                                                <!-- .price -->
                                                                                <h2 class="woocommerce-loop-product__title"><?=$g332['title'];?></h2>
                                                                              
																			  
                                                                               
																			   
                                                                            </a>
                                                                            <div class="hover-area">
                                                                                <a class="button add_to_cart_button" style="cursor:pointer;" onclick="cartAction('add','<?=$g332['page_id'];?>')" >הוסף לעגלת קניות</a>
                                                                               
                                                                            </div>
                                                                            <!-- .hover-area -->
                                                                        </div>
                                                                        <!-- .media-body -->
                                                                    </div>
                                                                    <!-- .media -->
                                                                </div>
                                                                <!-- .woocommerce-LoopProduct-link -->
															
															<? } ?>
															
															
															
															
															
															
															
															
															
                                                            </div>
                                                            <!-- .products -->
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .slick-dots -->
                                            </div>
                                            <!-- .landscape-full-product-cards-carousel -->
                                        </div>
                                        <!-- .row -->
                                    </div>
                                    <!-- .col-full -->
                                </section>
                                <!-- .slick-dots -->
                                <section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                      
									  
                                        <!-- .section-header -->
                                        <div class="tab-content">
										
										
										
										
										
										
										
										
										
										
										
										
										
										
								
											
											       <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
														
														 <div class="products">
													
														
														
														<?
														
														
														$get_this_products = mysql_query("SELECT *,mp.page_id AS page_id FROM mod_products_list AS mpl INNER JOIN mod_products AS mp ON mpl.id = mp.page_id WHERE mpl.promoted = '4' LIMIT 14 ")or die(mysql_error());
														while($gtp = mysql_fetch_array($get_this_products)){
															
															
																$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gtp['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gtp['page_id'];
																	}
														
														
														?>
														
														
														
                                                           
                                                                <div class="product">
                                                                   
                                                                    <a href="<?=$link;?>" class="woocommerce-LoopProduct-link">
                                                                        <img src="https://<?=$_SERVER['SERVER_NAME'];?>/files/products/<?=$gtp['pic'];?>" width="224" height="197" class="wp-post-image" alt="">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> <?=$gtp['price'];?>
																			
																			₪
																			
																			</span>
																			
																			
																			
                                                                        </span>
                                                                        <!-- /.price -->
                                                                        <h2 class="woocommerce-loop-product__title"><?=$gtp['title'];?></h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" style="cursor:pointer;" onclick="cartAction('add','<?=$gtp['page_id'];?>')" rel="nofollow">הוספה לעגלת קניות</a>
                                                                      
                                                                    </div>
                                                                </div>
                                                                <!-- /.product-outer -->
																
																
																
														<? } ?>
																
																
																
																
																
																
                                                            </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>
                                            <!-- .tab-pane -->
                                    
										
										
										</div>
                                        <!-- .tab-content -->
                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section>
                                <!-- .section-products-carousel-tabs -->
                                <div class="banners">
                                    <div class="row">
                                        <div class="banner banner-long text-in-right">
                                            <a href=",members,login">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-2.jpg ); height: 259px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">
                                                                <strong>הצטרף עכשיו</strong> למועדון החברים של Stereosys.</h3>
                                                        </div>
                                                        <!-- /.banner-info -->
                                                        <span class="banner-action button">הצטרף</span>
                                                    </div>
                                                    <!-- /.caption -->
                                                </div>
                                                <!-- /.banner-bg -->
                                            </a>
                                        </div>
                                        <!-- /.banner -->
                                        <div class="banner banner-short text-in-left">
                                            <a href=",order,track">
                                                <div style="background-size: cover; background-position: center center; background-image: url( assets/images/banner/3-3.jpg ); height: 259px;" class="banner-bg">
                                                    <div class="caption">
                                                        <div class="banner-info">
                                                            <h3 class="title">
                                                                <strong>שובר מתנה</strong>
                                                                <br> רכוש שובר מתנה לאהובים עליך</h3>
                                                        </div>
                                                        <!-- /.banner-info -->
                                                       
                                                       <a href=",products,61"><span class="banner-action button">לרכישת שובר</span></a>
                                                    </div>
                                                    <!-- /.caption -->
                                                </div>
                                                <!-- /.banner-bg -->
                                            </a>
                                        </div>
                                        <!-- /.banner -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.banners -->

								<!-- /.product-carousel-with-banners -->
                          
						  <section class="brands-carousel">
                                    <h2 class="sr-only">המותגים שלנו</h2>
                                    <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands" data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <div class="brands">
										
										
										<?
										
										$get_pre_logos = mysql_query("SELECT * FROM mod_brands_list WHERE pic != ''");
										while ($gpl = mysql_fetch_array($get_pre_logos)){
										
										$filename1 = $gpl['pic'];
										
										if(!file_exists('files/brands/'.$filename1)){
											
											
											$bpic = 'nopic.jpg';
										}else{
											
											$bpic = $filename1;
											
											
										
										
										
										
										?>
										
										   <div class="item">
                                                <a href=",brands,<?=$gpl['id'];?>">
                                                    <figure>
                                                        <figcaption class="text-overlay">
                                                            <div class="info">
                                                                <h4><?=$gpl['title'];?></h4>
                                                            </div>
                                                            <!-- /.info -->
                                                        </figcaption>
                                                        <img width="145" class="img-responsive desaturate" style="height:100px" alt="<?=$gpl['title'];?>" src="https://<?=$_SERVER['SERVER_NAME'];?>/files/brands/<?=$bpic;?>">
                                                    </figure>
                                                </a>
                                            </div>
                                            <!-- .item -->
										
										
										<? }} ?>
										
										
										
                                        </div>
                                    </div>
                                    <!-- .col-full -->
                                </section>
                                <!-- .brands-carousel -->
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
          <? include("footer.php"); ?>
        </div>
        
		<style>
		@media only screen and (min-width: 900px) {
		.floating_window {
			position:fixed;
			top:50%;
			right:50%;
			z-index:9999999999;
			margin-right:-325px;
			margin-top:-200px;
			height:400px;
			max-width:650px;
			width:100%;
			background-image:url('images/floating/background-1.jpg');
		}
		}@media only screen and (max-width: 900px) {
				.floating_window {
			position:fixed;
			top:50%;
			
			z-index:9999999999;
			
			margin-top:-200px;
			height:400px;
			max-width:650px;
			width:100%;
			background-image:url('images/floating/background-1.jpg');
		}
		}
		</style>
		
		<? if($_SESSION['floating_window'] == 1){} else{ ?>
		<div class="floating_window" style="display:none;-webkit-box-shadow: 0px 0px 138px -40px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 138px -40px rgba(0,0,0,0.75);
box-shadow: 0px 0px 138px -40px rgba(0,0,0,0.75);">
			<div style="text-align:center;padding:100px;color:white;">
			
			<% BLOCK_30 %>
			<a style="cursor:pointer;font-weight:bold;color:red;" onclick='$(".floating_window").fadeOut(300, function() { $(this).remove(); });' class="notificationClose ">סגור</a>
			
			</div>
		</div>
		<? } ?>
		
		
		<?
			// ADD SESSION
			
			$_SESSION['floating_window'] = 1;
			
			?>
		
		
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
		
		
		<script>
		$(window).load(function(){
		  setTimeout(function(){ $('.floating_window').fadeIn() }, 15000);
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