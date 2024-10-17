<?php
$PUT_LEFT=false;


$get_prod_q=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_products` AS `p` 
													INNER JOIN `mod_products_list` AS `l` 
													ON `p`.`page_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`id`='".intval($get_id)."'")or die(mysql_error());
$gpq=mysql_fetch_array($get_prod_q);												
$TEMP_PAGE_TITLE  = $gpq["lang_title"];
$TEMP_INPAGE_TITLE = $gpq["lang_title"];
$TEMP_TEMPLATE = 5;

function PAGE_TEXT() {
	global $get_id,$lang,$gpq;
	
	?>
	<?
							$get_cat = mysql_query("SELECT * FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id WHERE mpcl.id = '".$gpq['cat_id']."'");
							$gccc = mysql_fetch_array($get_cat);
							
							?>
	
	
	     <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href=",products">קטלוג מוצרים</a>
							
								<? if($gccc['parent'] != '0'){
								
								$parent = mysql_query("SELECT * FROM `mod_products_categories` WHERE `page_id` = '".$gccc['parent']."' AND `lang_id` = '1'")or die(mysql_error());
								$get_parent = mysql_fetch_array($parent);

							?>
							  <span class="delimiter">
							<i class="tm tm-breadcrumbs-arrow-right"></i>
							 </span>
							<a href=",products,<?=$gccc['parent'];?>"><?=$get_parent['title'];?></a>
							<? } ?>
							
							
                            <span class="delimiter">
							
							
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><a href=",products,<?=$gccc['page_id']; ?>"><?=$gccc['title']; ?></a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><% PAGE_TITLE %>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="product product-type-simple">
                                    <div class="single-product-wrapper">
                                        <div class="product-images-wrapper thumb-count-4">
                                            <!--<span class="onsale">-
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>242.99</span>
                                            </span>
                                            <!-- .onsale -->
                                            <div style="direction:ltr;" id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
                                                <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                                        <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                                        <figure class="woocommerce-product-gallery__wrapper ">
														
														
														
														
														<?
														$i = 0;
														$get_pics = mysql_query("SELECT * FROM mod_gallery_pics_list WHERE gallery_id = '".$get_id."'");
														
														$count_pics = mysql_num_rows($get_pics);
														
														
															if($count_pics > 0){
														
														
										
														
														while ($gp = mysql_fetch_array($get_pics)){
														
														?>
														 <div data-thumb="files/products/<?=$gp['pic'];?>" class="woocommerce-product-gallery__image">
                                                                <a href="files/products/<?=$gp['pic'];?>" tabindex="<?if($i == '0'){?>0<?}else{?>-1<?}?>">
                                                                    <img width="600" height="600" src="files/products/<?=$gp['pic'];?>" class="attachment-shop_single size-shop_single <?if($i == 0){?>wp-post-image<?}?>" alt="">
                                                                </a>
                                                            </div>
														
														<? $i++; } 
														
														
															
														} else {
															
															?>
															
															<div data-thumb="files/products/<?=$gpq['pic2'];?>" class="woocommerce-product-gallery__image">
                                                                <a href="files/products/<?=$gpq['pic2'];?>" tabindex="<?if($i == '0'){?>0<?}else{?>-1<?}?>">
                                                                    <img width="600" height="600" src="files/products/<?=$gpq['pic2'];?>" class="attachment-shop_single size-shop_single <?if($i == 0){?>wp-post-image<?}?>" alt="">
                                                                </a>
                                                            </div>
														
															<?
														}








														?>
														
														
                                                       
															
															
															
															
															
															
															
															
                                                        </figure>
                                                    </div>
                                                    <!-- .woocommerce-product-gallery -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-images -->
                                                <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                                    <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
													
														
														<?
														
														
														
														
														$i = 0;
														$get_pics = mysql_query("SELECT * FROM mod_gallery_pics_list WHERE gallery_id = '".$get_id."'");
														$count_pics = mysql_num_rows($get_pics);
														
														if($count_pics > 0){
														
														
										
														
														
														while ($gp = mysql_fetch_array($get_pics)){
														
														?>
												
															<figure data-thumb="files/products/<?=$gp['pic'];?>" class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" src="files/products/<?=$gp['pic'];?>" class="attachment-shop_thumbnail size-shop_thumbnail <?if($i == 0){?>wp-post-image<?}?>" alt="">
                                                        </figure>
														
														<? $i++;}

														
														
														} else {
															
															?>
															
															
															<figure data-thumb="files/products/<?=$gpq['pic2'];?>" class="techmarket-wc-product-gallery__image">
                                                            <img width="180" height="180" src="files/products/<?=$gpq['pic2'];?>" class="attachment-shop_thumbnail size-shop_thumbnail <?if($i == 0){?>wp-post-image<?}?>" alt="">
                                                        </figure>
														
															<?
														}








														?>
														
														
													
                                                    </figure>
                                                    <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-thumbnails -->
                                            </div>
                                            <!-- .techmarket-single-product-gallery -->
                                        </div>
                                        <!-- .product-images-wrapper -->
                                        <div class="summary entry-summary">
                                            <div class="single-product-header">
                                                <h1 class="product_title entry-title">
												<?=$gpq['title'];?>
												
												
												</h1>
                                             
											 </div>
                                            <!-- .single-product-header -->
                                            <div class="single-product-meta">
											
											
											
											
                                                <div class="brand">
												
												<?
													
													$get_brand = mysql_query("SELECT * FROM mod_brands_list AS mbl INNER JOIN mod_brands AS mb ON mbl.id = mb.page_id WHERE mbl.id = '".$gpq['brand_id']."'");
													$gb = mysql_fetch_array($get_brand);
													
													?>
													
													
                                                    <a href=",brands,<?=$gb['page_id']?>">
													
													
                                                        <img alt="<?=$gb['title']?>" src="files/brands/<?=$gb['pic']?>">
                                                    </a>
                                                </div>
                                                <div class="cat-and-sku">
												
												
												<?
													
													$get_brand = mysql_query("SELECT * FROM mod_products_categories_list AS mbl INNER JOIN mod_brands AS mb ON mbl.id = mb.page_id WHERE mbl.id = '".$gpq['brand_id']."'");
													$gb = mysql_fetch_array($get_brand);
													
													?>
												
                                                    <span class="posted_in categories">
														<a href=",products,<?=$gccc['id']; ?>"><?=$gccc['title']; ?></a>
                                                    </span>
                                                


													<span class="sku_wrapper">
                                                        <span class="sku"><?=$gpq['makat_id'];?></span>
                                                    </span>
													
													
													
													
													
													
													
                                                </div>
												
												
												<div class="product-label">
                                                    <div class="ribbon label green-label">
                                                        <span>זמן אספקה: עד 14 ימי עסקים</span>
                                                    </div>
                                                </div>
                                               
											   
                                            </div>
                        
						
                                            <!-- .rating-and-sharing-wrapper -->
											<section>
                                            <div class="woocommerce-product-details__short-description">
                                                <?=$gpq['text'];?>
                                            </div>
											</section>
                                            <!-- .woocommerce-product-details__short-description -->
                                            <div class="product-actions-wrapper">
                                                <div class="product-actions">
                                                    <p class="price">
                                                        <del>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">
																<?if($gpq['price_sale'] != ''){?>
																
																₪</span><?=$gpq['price'];?></span>
																
																<?}?>
                                                        </del>
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">₪</span><?if($gpq['price_sale'] != ''){?><?=$gpq['price_sale'];?><?}else{?><?=$gpq['price'];?><?}?></span>
                                                        </ins>
                                                    </p>
                                                    <!-- .single-product-header -->
													
													
													
                                                    <form enctype="multipart/form-data" method="post" class="cart">
                                                        <div class="quantity">
                                                            <label for="quantity-input">כמות יחידות</label>
                                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" id="quantity" name="quantity" id="qty_<?=$gpq['page_id'];?>">
                                                        </div>
                                                        <!-- .quantity -->
                                                        <a class="single_add_to_cart_button button alt" value="185"  style="cursor:pointer;" onclick="cartAction('add','<?=$gpq['page_id'];?>')"  name="add-to-cart">הוסף לעגלת קניות</a>
                                                    </form>
													
													
													
                                                    
													
                                                </div>
                                                <!-- .product-actions -->
                                            </div>
                                            <!-- .product-actions-wrapper -->
                                        </div>
                                        <!-- .entry-summary -->
                                    </div>
                                    <!-- .single-product-wrapper -->
                         
						 <div class="woocommerce-tabs wc-tabs-wrapper">
                                        <ul role="tablist" class="nav tabs wc-tabs">
                                            <li class="nav-item accessories_tab">
                                                <a class="nav-link active" data-toggle="tab" role="tab" aria-controls="tab-accessories" href="#tab-accessories">מוצרים נוספים בקטגוריה</a>
                                            </li>
                                            <li class="nav-item description_tab">
                                                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-description" href="#tab-description">תיאור המוצר</a>
                                            </li>
                                            <li class="nav-item specification_tab">
                                                <a class="nav-link" data-toggle="tab" role="tab" aria-controls="tab-specification" href="#tab-specification">מפרט טכני</a>
                                            </li>
                                         
										 
                                        </ul>
                                        <!-- /.ec-tabs -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-accessories" role="tabpanel">
                                                <div class="accessories">
                                                    <div class="accessories-wrapper">
                                                        <div class="accessories-product columns-4 col-md-10">
														
														
														
														
														
														
														
														
														
														
														
														
														
														
                                                            <div class="products">
															
															
															
																<?
											
											//
											$get_cat_products = mysql_query("SELECT * FROM mod_products_list AS mpl INNER JOIN mod_products AS mp ON mpl.id = mp.page_id WHERE mpl.cat_id = '".$gccc['page_id']."' ORDER BY RAND() LIMIT 4 ")or die(mysql_error());
											while($gcp = mysql_fetch_array($get_cat_products)){
												
											$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gcp['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gcp['page_id'];
																	}
											
											
											?>
											
                                                                <div class="product">
                                                                    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=$link;?>">
                                                                        <div class="col-md-12" style="width:100%;height:200px;background-image:url('files/products/<?=$gcp['pic'];?>');background-position:center center; background-repeat:no-repeat; background-size:100%;"></div>
                                                                        <span class="price">
																		
																		<? if($gcp['price_sale'] != ''){ ?>
                                                                            <del>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">₪</span><?=$gcp['price']?></span>
                                                                            </del>
																			
																			
																			
                                                                            <ins>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">₪</span><?=$gcp['price_sale']?></span>
                                                                            </ins>
																			
																		<? } else { ?>
																		<ins>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">₪</span><?=$gcp['price']?></span>
                                                                            </ins>
																			
																		<? } ?>
                                                                        </span>
                                                                        <h2 class="woocommerce-loop-product__title"><?=$gcp['title'];?></h2>
                                                                    </a>
                                                                    <div class="checkbox accessory-checkbox">
                                                                       
                                                                    </div>
                                                                </div>
											
											<? } ?>
											
															
															
															
															
					
															
															
                                             
                                                            </div>
                                                            <!-- /.products -->
                                                        </div>
                                                        <!-- .row -->
                                                        <div class="accessories-product-total-price">
                                                            <div class="total-price">
                                                               
                                                                <!-- .total-price-html -->
                                                                <span>זקוק לעזרה? המומחים שלנו עומדים לרשותכם</span>
                                                            </div>
                                                            <!-- .total-price -->
                                                            <div class="accessories-add-all-to-cart">
                                                              <a href=",contact">  <button class="button btn btn-primary add-all-to-cart" type="button">בקש הצעה מותאמת אישית</button></a>
                                                            </div>
                                                            <!-- .accessories-add-all-to-cart -->
                                                        </div>
                                                        <!-- .accessories-product-total-price -->
                                                    </div>
                                                    <!-- .accessories-wrapper -->
                                                </div>
                                                <!-- .accessories -->
                                            </div>
                                            <div class="tab-pane panel wc-tab" id="tab-description" role="tabpanel">
                                                <h2>תיאור המוצר</h2>
                                              
													<?=$gpq['text'];?>

									
									
                                                <!-- .outer-wrap -->
                                            </div>
                                            <div class="tab-pane" id="tab-specification" role="tabpanel">
                                                <div class="tm-shop-attributes-detail like-column columns-3">
                                                    <h3 class="tm-attributes-title">מפרט טכני</h3>
                                         
													<?=$gpq['specs'];?>
											 
											 
                                                </div>
                                                <!-- /.tm-shop-attributes-detail -->
                                            </div>
                                           
										   </div>
                                    </div>
                                  
								  </div>
                                <!-- .product -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
     

<? /* ?>
	     <section class="section-landscape-products-carousel recently-viewed" id="recently-viewed" style="direction:ltr;">
                                        <header class="section-header" style="direction:rtl;">
                                            <h2 class="section-title">מוצרים שצפית בהם לאחרונה</h2>
                                            <nav class="custom-slick-nav"></nav>
                                        </header>
										
										  <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#recently-viewed .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                            <div class="container-fluid">
                                                <div class="woocommerce columns-5">
                                                    <div class="products">
										<?
										
										if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
											$ip = $_SERVER['HTTP_CLIENT_IP'];
										} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
											$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
										} else {
											$ip = $_SERVER['REMOTE_ADDR'];
										}
										$get_views_products = mysql_query("SELECT * FROM config_pageviews WHERE `ip` = '".$ip."' AND `url` LIKE '%show%' GROUP BY url ORDER BY time")or die (mysql_error());
										while ($gvp = mysql_fetch_array($get_views_products)){
										
										$page = str_replace("/,products,show_","",$gvp['url']);
										
										
										$get_product_details = mysql_query("SELECT * FROM mod_products_list WHERE `id` = '".$page."'");
										$gpd = mysql_fetch_array($get_product_details);
										
										
										
										
										
										
										
										
										
											$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gpd['id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gpd['id'];
																	}
										?>
										
										
                                      
                                                        <div class="landscape-product product" style="direction:rtl;text-align:right!important;">
                                                            <a class="woocommerce-LoopProduct-link" href="<?=$link;?>">
                                                                <div class="media">
                                                                    
<div class="col-md-3" style="width:30%;height:100px;background-image:url('files/products/<?=$gpd['pic'];?>');background-position:center center; background-repeat:no-repeat; background-size:100%;"></div>
<div style="clear:both;"></div>
																   <div class="media-body" style="direction:rtl;">
                                                                        <span class="price" style="direction:rtl;text-align:right!important;">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> <?=$gpd['price'];?>₪</span>
                                                                        </span>
                                                                        <!-- .price -->
                                                                        <h2 class="woocommerce-loop-product__title" 
																		style="direction:rtl;text-align:right!important;"><?=$gpd['title'];?></h2>
                                                                        <div class="techmarket-product-rating">
                                                                         
																		 
                                                                        </div>
                                                                        <!-- .techmarket-product-rating -->
                                                                    </div>
                                                                    <!-- .media-body -->
                                                                </div>
                                                                <!-- .media -->
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                        </div>
                                                        <!-- .landscape-product -->
                                                        
												
										
										
										<?  } ?>
										
												
                                                    </div>
                                                </div>
                                                <!-- .woocommerce -->
                                            </div>
                                            <!-- .container-fluid -->
                                        </div>
                                        <!-- .products-carousel -->
                                    </section>
									
									<? */ ?>
                                    <!-- .section-landscape-products-carousel -->
                                 			
									</div>
									</div>
	
	<?
}
?>