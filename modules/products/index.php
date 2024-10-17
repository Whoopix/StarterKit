<?php


$Get_Product = mysql_query("SELECT * FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id WHERE mpcl.id = '".$get_id."'")or die(mysql_error());
$GP = mysql_fetch_array($Get_Product);


$Get_Product1 = mysql_query("SELECT * FROM mod_products_categories WHERE page_id = '".$get_id."' AND lang_id = '1'")or die(mysql_error());
$GP1 = mysql_fetch_array($Get_Product1);


$TEMP_PAGE_TITLE  = $GP1['title'];
$TEMP_INPAGE_TITLE = $GP1['title'];
$TEMP_TEMPLATE = 4;


function Category_Menu() {
	
	
	
	
}


function PAGE_TEXT() {
	global $GP,$get_id, $LANG;
	
	
	
	$get_some = mysql_query("SELECT * FROM mod_products_categories_list WHERE id = '".$get_id."'");
	$gsssssss = mysql_fetch_object($get_some);
	$gsX = mysql_fetch_array($get_some);
	?>
	
 <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href=",products">קטלוג מוצרים</a>
							
							<? if($GP['parent'] != '0'){
								
								$parent = mysql_query("SELECT * FROM `mod_products_categories` WHERE `page_id` = '".$GP['parent']."' AND `lang_id` = '1'")or die(mysql_error());
								$get_parent = mysql_fetch_array($parent);

							?>
							  <span class="delimiter">
							<i class="tm tm-breadcrumbs-arrow-right"></i>
							 </span>
							<a href=",products,<?=$GP['parent'];?>"><?=$get_parent['title'];?></a>
							<? } ?>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><?=$GP['title'];?>
							
                        </nav>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
							
							   <div class="shop-archive-header">
                                    <div class="jumbotron" style="background-position:center center;background-size:cover;background-image:url('files/upload/<?=$gsssssss->pic;?>');">
                                      
                                        <div class="jumbotron-caption">
                                            <h3 class="jumbo-title" style="font-size:40px;font-weight:bold;"><?=$GP['title'];?></h3>
                                            <p class="jumbo-subtitle">
											
                                               <!-- text here -->
											   </a>
                                            </p>
                                        </div>
                                        <!-- .jumbotron-caption -->
                                    </div>
                                    <!-- .jumbotron -->
                                </div>
								
								
								
										<? 
									$get_sub_categories = mysql_query("SELECT *, mpcl.pic AS pic FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id WHERE mpcl.parent = '".$get_id."' AND mpc.lang_id = '1'")or die(mysql_error());
									$count_subs = mysql_num_rows($get_sub_categories);
									
									if($count_subs > 0){
									
								?>
								
								
								
								
								    <section class="section-product-categories">
								
								
						
								
                                    <header class="section-header">
                                        <h1 class="woocommerce-products-header__title page-title"><?=$GP['title'];?> - תת קטגוריות</h1>
                                    </header>
                                    <div class="woocommerce columns-5">
									 <div class="product-loop-categories">
									
								<? while($gsc = mysql_fetch_array($get_sub_categories)){ 
								$get_sub_products = mysql_query("SELECT * FROM mod_products_list WHERE cat_id = '".$gsc['page_id']."'")or die(mysql_error());
								$count_sub_products = mysql_num_rows($get_sub_products);
								
								?>
									
									
									<div class="product-category product first">
                                                <a href=",products,<?=$gsc['page_id'];?>">
												
												
												<div class="" style="width:100%; height:200px; background-image:url('files/upload/<?=$gsc['pic'];?>'); background-position:left;">
												
												</div>
                                                    
													
													
													
													
                                                    <h2 class="woocommerce-loop-category__title"> <b><?=$gsc['title'];?></b>
                                                        <div class="count">(<?=$count_sub_products;?>)</div>
                                                    </h2>
                                                </a>
                                            </div>
									
								<? } ?>
									
                                       
                                          


											
                                        </div>
                                        <!-- .product-loop-categories -->

										
                                    </div>
                                    <!-- .woocommerce -->
                                </section>
								
									<? } ?>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                                <!-- .shop-archive-header -->
								<?
								
								
								/// תצורת ריבועים
												
												
													
													$get_main_subs = mysql_query("SELECT * FROM mod_products_categories_list WHERE parent = '".$get_id."'");
													
													
													if($get_id == ''){
														
														
														$SQL = "
														SELECT * FROM mod_products_list AS mpl 
														INNER JOIN mod_products AS mp ON mpl.id = mp.page_id 
														";
														
														
														
													}else{
													
													
														$SQL = "
														SELECT * FROM mod_products_list AS mpl 
														INNER JOIN mod_products AS mp ON mpl.id = mp.page_id 
														WHERE ";
														
													
													if($GP['parent'] == '0'){
														$SQL .= " mpl.cat_id IN (";
													
													while($gsss = mysql_fetch_array($get_main_subs)){
													
														$SQL .= "".$gsss['id'].", ";
													
													}
													
														$SQL .= $get_id;
														$SQL .= ")";
														
													} else {	
														
														$SQL .= " mpl.cat_id = '".$get_id."'";
													}	
														
													if($_GET['brand'] != ''){
														
														
														
														$SQL .= " AND mpl.brand_id IN (";
														
													
															$brand = array_map(function($item) { 
																return mysql_real_escape_string($item); 
															}, $_GET['brand']);
															$SQL .= implode(", ", $brand);

														$SQL .= ")";
														
														
														
														
													}	
													// price settings	
													$price =  $_GET['from'];
													$arr = explode(' ',trim($price));
													
														
													if($_GET['from'] != ''){
														$SQL .= " AND mpl.price >= '".$arr[0]."'";
														
													}
													if($_GET['from'] != ''){
														$SQL .= " AND mpl.price <= '".$arr[2]."'";
														
													}
													
													
													$SQL .= " ORDER BY ";
													
													if($_GET['order'] == 'priceDown'){
														
														$SQL .= "mpl.price ASC";
														
													} else if($_GET['order'] == 'priceUp'){
														
														$SQL .= "mpl.price DESC";
														
													} else if($_GET['order'] == 'rating'){
														
														$SQL .= "mpl.rating ASC";
														
													} else if($_GET['order'] == 'date'){
														
														$SQL .= "mpl.date ASC";
														
													} else {
														
														$SQL .= "mpl.id DESC";
													}
													
													
													
													}
													
												
													
													
													
													/// pages
															if ($_GET['page'] != ''){
																$limit = " LIMIT ";

															if ($_GET['page'] == 1){
																$limit .= "0";
															} else {
																$limit .= 20*($_GET['page']-1);
															}
																$limit .= ",";
																$limit .= 20;
														}

														if ($_GET['page'] == ''){

																$limit = " LIMIT 0,20";




														}
													
													//echo $SQL.$limit;
													
												
												
											
								
													
												
												
												$get_products = mysql_query($SQL.$limit)or die(mysql_error());
								?>
								
								
								 <div class="shop-control-bar">
                                    <div class="handheld-sidebar-toggle">
                                        <button type="button" class="btn sidebar-toggler">
                                            <i class="fa fa-sliders"></i>
                                            <span>פילטרים</span>
                                        </button>
                                    </div>
                                    <!-- .handheld-sidebar-toggle -->
                                    <h1 class="woocommerce-products-header__title page-title"><?=$GP['title'];?></h1>
                                    <ul role="tablist" class="shop-view-switcher nav nav-tabs">
                              
                                        <li class="nav-item">
                                            <a href="#grid-extended" title="Grid Extended View" data-toggle="tab" class="nav-link ">
                                                <i class="tm tm-grid"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#list-view-large" title="List View Large" data-toggle="tab" class="nav-link ">
                                                <i class="tm tm-listing-large"></i>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                    <!-- .shop-view-switcher -->
                                    <form class="form-techmarket-wc-ppp" method="POST">
                                       <!-- <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">
                                            <option value="20">20 מוצרים לעמוד</option>
                                            <option value="50">50 מוצרים לעמוד</option>
                                            <option value="100">100 מוצרים לעמוד</option>
                                        </select> -->
                                        <input type="hidden" value="5" name="shop_columns">
                                        <input type="hidden" value="15" name="shop_per_page">
                                        <input type="hidden" value="right-sidebar" name="shop_layout">
                                    </form>
                                    <!-- .form-techmarket-wc-ppp -->
                                    <form method="get" class="woocommerce-ordering">
                                        <select class="orderby" name="orderby" onchange="if (this.value) window.location.href=this.value">
                                            <option value="/,products,<?=$get_id;?>?order=rating" <? if ($_GET['order']=='rating') {?>selected="selected"<?}?>>סדר לפי פופולריות</option>
                                            <option value="/,products,<?=$get_id;?>?order=priceUp" <? if ($_GET['order']=='priceUp') {?>selected="selected"<?}?>>סדר לפי מחיר עולה</option>
                                            <option value="/,products,<?=$get_id;?>?order=priceDown" <? if ($_GET['order']=='priceDown') {?>selected="selected"<?}?>>סדר לפי מחיר יורד</option>
                                            <option value="/,products,<?=$get_id;?>?order=date" <? if ($_GET['order']=='date') {?>selected="selected"<?}?>>סדר לפי תאריך הוספה</option>
                                           
                                        </select>
                                        <input type="hidden" value="5" name="shop_columns">
                                        <input type="hidden" value="15" name="shop_per_page">
                                        <input type="hidden" value="right-sidebar" name="shop_layout">
										
										
                                    </form>
									<div class="form-techmarket-wc-ppp">
                                   <nav class="woocommerce-pagination" style="padding-top:0px!important;padding-right:15px;">
                                        <ul class="page-numbers">
										
										
										
										
										
										
										
										
										
										
				<?php
				
			
				$pages_query = mysql_query($SQL)or die(mysql_error());
				$get_pages = mysql_num_rows($pages_query);


				if($_GET['page'] > 1){

					echo '<li class="prev page-numbers">';
					echo "<a href='";
					echo "/,products,";
					echo $get_id;

					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}
					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}
					
					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					echo "&page=";
					echo ($_GET['page']-1);
					echo "'><b>עמוד קודם</b></a></li>";

				}




				for ($i = 1; $i <= (ceil($get_pages/20)); $i++) {



					echo '<li class="">';
					
					
					
					 
					 if($_GET['page'] == $i){
						echo ' <span class="page-numbers current">';
					} else {
				
					echo "<a class='page-numbers' href='";
					echo "http://";

					echo $_SERVER[HTTP_HOST];
					echo "/,products,";
					echo $get_id;


					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}	

					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}					
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}




					echo "&page=$i'>";
					}
					echo "$i</a>";
					$max += $i;
					echo "</li>";
				}


				if($_GET['page'] < ($max + 1) / 20){


					echo '<li class="prev page-numbers">';
					echo "<a href='";
					echo "/,products,";
					echo $get_id;

					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}
					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					
					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					echo "&page=";
					if ($_GET['page'] < 1){
						echo '2';
					} else {
						echo ($_GET['page']+1);
					}
					echo "'><b>עמוד הבא</b></a></li>";


				}



				


?>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
									
											
											
											
                                        </ul>
                                        <!-- .page-numbers -->
                                    </nav>
								  </div>
                                    <!-- .techmarket-advanced-pagination -->
                                </div>
                                <!-- .shop-control-bar -->
                                <div class="tab-content">
                                    <div id="grid-extended" class="tab-pane active" role="tabpanel">
                                        <div class="woocommerce columns-5">
                                            <div class="products">
											
											
											
											
											
											
																		
								
												
												
												<?
												$i = 1;
												while ($gpX = mysql_fetch_array($get_products)){
													
													
													
													$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gpX['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gp = mysql_fetch_array($get_plink);
																	if($gp['plink'] != ''){
																		$link = $gp['plink'];
																	}else{
																		$link = ',products,show_'.$gpX['page_id'];
																	}
													?>
													
													
									
									
											
											
											
											
											
											
                                                <div class="product<?if($i % 1 == 0){?> first<?}?><?if($i % 5 == 0){?> last<?}?>">
                                                   
                                                    <!-- .yith-wcwl-add-to-wishlist -->
                                                    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=$link;?>">
                                                     
													 
														
														                        
<div class="col-md-12" style="width:100%;height:200px;background-image:url('files/products/<?=$gpX['pic'];?>');background-position:center center; background-repeat:no-repeat; background-size:contain;"></div>
													
														
														<span class="price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">₪</span><?=$gpX['price'];?></span>
                                                        </span>
														<section>
                                                        <h2 class="woocommerce-loop-product__title"><?=$gpX['title'];?></h2>
														</section>
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="hover-area">
                                                        <a class="button" style="cursor:pointer;" onclick="cartAction('add','<?=$gpX['page_id'];?>')">הוספה לעגלת קניות</a>
                                                        <a class="add-to-compare-link" href="compare.html">הוספה לרשימת השוואה</a>
                                                    </div>
                                                    <!-- .hover-area -->
                                                </div>
													
													
													
													<?
													$i++;
												}
												
												
												
												?>
												
												
											
											
											
											
											
                                            </div>
                                            <!-- .products -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                  
								  <div id="list-view-large" class="tab-pane" role="tabpanel">
                                        <div class="woocommerce columns-1">
										           <div class="products">
											
											
											
											
											
											
																		
								
												
												
												<?///תצורת רשימה
												$get_products = mysql_query($SQL.$limit)or die(mysql_error());
												$i = 1;
												while ($gpX = mysql_fetch_array($get_products)){
													?>
													
													
												     <div class="product list-view-large  ">
                                                    <div class="media">
                                                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="files/products/<?=$gpX['pic'];?>">
                                                        <div class="media-body">
                                                            <div class="product-info">
                                                          
                                                                <!-- .woocommerce-LoopProduct-link -->
																
																<?
																$get_brand = mysql_query("SELECT * FROM mod_brands_list AS mbl INNER JOIN mod_brands AS mb ON mbl.id = mb.page_id WHERE mbl.id = '".$gpX['brand_id']."'");
																$gb = mysql_fetch_array($get_brand);
																
																?>
                                                                <div class="brand">
                                                                    <a href=",brands,<?=$gb['page_id'];?>">
                                                                        <img alt="galaxy" src="files/brands/<?=$gb['pic'];?>">
                                                                    </a>
                                                                </div>
                                                                <!-- .brand -->
                                                                <div class="woocommerce-product-details__short-description">
																<h3>
																<?=$gpX['title'];?>
																</h3>
																<div style="height:300px;overflow:hidden;">
																<section>
                                                                    <?//=$gpX['text'];?>
																</section>
																</div>
																
																
                                                                </div>
                                                                <!-- .woocommerce-product-details__short-description -->
                                                                
                                                            </div>
                                                            <!-- .product-info -->
                                                            <div class="product-actions">
                                                              
                                                                <span class="price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₪</span><?=$gpX['price'];?></span>
                                                                </span>
                                                                <!-- .price -->
                                                                <a class="button add_to_cart_button" href="cart.html">הוסף לעגלת קניות</a>
                                                                <a class="add-to-compare-link" href="compare.html">הוספה לרשימת השוואה</a>
                                                            </div>
                                                            <!-- .product-actions -->
                                                        </div>
                                                        <!-- .media-body -->
                                                    </div>
                                                    <!-- .media -->
                                                </div>
                                                <!-- .product -->
                                                
												
												
												
												
												
												
												
												
													
													
													<?
													$i++;
												}
												
												
												
												?>
												
												
											
											
											
											
											
                                            </div>
                                            <!-- .products -->
								  
                                </div>
                                <!-- .tab-content -->
                                
												
												
						
						
                                <!-- .section-product-categories -->
                                
								
                            </main>
                            <!-- #main -->
							
							   <div class="shop-control-bar-bottom">
                                   
								   
                                    <!-- .form-techmarket-wc-ppp -->
                                    <p class="woocommerce-result-count">
									
									
									
									<?=$get_pages;?>
									מוצרים בקטגוריה
                                      
                                    </p>
                                    <!-- .woocommerce-result-count -->
                                    <nav class="woocommerce-pagination">
                                        <ul class="page-numbers">
                                       							
										
										
										
				<?php
				
			
				$pages_query = mysql_query($SQL)or die(mysql_error());
				$get_pages = mysql_num_rows($pages_query);


				if($_GET['page'] > 1){

					echo '<li class="class="prev page-numbers"">';
					echo "<a href='";
					echo "/,products,";
					echo $get_id;

					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}
					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}
					
					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					echo "&page=";
					echo ($_GET['page']-1);
					echo "'><b>עמוד קודם</b></a></li>";

				}




				for ($i = 1; $i <= (ceil($get_pages/20)); $i++) {



					echo '<li class="">';
					
					
					
					 
					 if($_GET['page'] == $i){
						echo ' <span class="page-numbers current">';
					} else {
				
					echo "<a class='page-numbers' href='";
					echo "http://";

					echo $_SERVER[HTTP_HOST];
					echo "/,products,";
					echo $get_id;


					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}	

					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}					
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}




					echo "&page=$i'>";
					}
					echo "$i</a>";
					$max += $i;
					echo "</li>";
				}


				if($_GET['page'] < ($max + 1) / 20){


					echo '<li class="prev page-numbers">';
					echo "<a href='";
					echo "/,products,";
					echo $get_id;

					if($_GET['order'] != ''){
						echo "?";
						echo "order=";
						echo $_GET['order'];
					}
					if($_GET['From'] != ''){
						echo "&From=";
						echo $_GET['From'];
					}
					if($_GET['To'] != ''){
						echo "&To=";
						echo $_GET['To'];
					}
					if($_GET['rating'] != ''){
						echo "&rating=";
						echo $_GET['rating'];
					}
					
					if($_GET['price'] != ''){
						echo "&price=";
						echo $_GET['price'];
					}
					if($_GET['voters'] != ''){
						echo "&voters=";
						echo $_GET['voters'];
					}

					echo "&page=";
					if ($_GET['page'] < 1){
						echo '2';
					} else {
						echo ($_GET['page']+1);
					}
					echo "'><b>עמוד הבא</b></a></li>";


				}



				


?>
			
                                        </ul>
                                        <!-- .page-numbers -->
                                    </nav>
                                    <!-- .woocommerce-pagination -->
                                </div>
                                <!-- .shop-control-bar-bottom -->
                           
                        </div>
                        <!-- #primary -->
                     


     <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                        
                            <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
                                <span class="gamma widget-title">סינונים בקטגוריה</span>
								
						
								  <form action=",products,<?=$get_id?>" method="GET">
					
                                <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2" style="text-align:center;">
                                    <p>
                                        <span class="gamma widget-title">סנן ע"פ מחיר</span>
                                        <div class="price_slider_amount">
                                            <input id="amount" type="text" placeholder="Min price" data-min="10" data-max="100000" value="33" name="from" style="display: none;">
                                      
                                        </div>
                                        <div id="slider-range" class="price_slider"></div>
                                </div>
                                <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-2">
                                    <span class="gamma widget-title">סנן ע"פ מותג</span>
                                    <ul>
									
									
									
									<?
									// brands filtering
									
									$get_products_brands = mysql_query("SELECT * FROM mod_products_list WHERE cat_id = '".$get_id."'");
									
									
									$SQL = "SELECT * FROM mod_brands_list AS mbl INNER JOIN mod_brands AS mb ON mbl.id = mb.page_id WHERE mb.lang_id = '1' AND mbl.id IN (";
									
									$i = 0;
									while($gpb = mysql_fetch_array($get_products_brands)){
										
										$SQL .= $gpb['brand_id'];
										$SQL .= ", ";
										$i++;
									}
									
									$SQL .= "1010101010)";
									
									
									
									$get_brands = mysql_query($SQL);
									while($gb = mysql_fetch_array($get_brands)){
										
										$count = mysql_query("SELECT * FROM mod_products_list AS mbl INNER JOIN mod_products AS mb ON mbl.id = mb.page_id WHERE mbl.brand_id = '".$gb['page_id']."' AND mb.lang_id = '1' AND mbl.cat_id = '".$get_id."'");
										$c = mysql_num_rows($count);
									
									
									
									// NEED TO DO IF GET = CHECKED
									
									
									?>
							
									
                                      
                                        <li class="wc-layered-nav-term ">
										
												<input type="checkbox" id="squaredTwo" <?= isset($_GET['brand']) && in_array($gb['page_id'], $_GET['brand'])? 'checked' : '' ?> name="brand[]" value="<?=$gb['page_id'];?>" style=""> 
												<label for="squaredTwo"><?=$gb['title'];?> (<?=$c;?>)</label>
													
                                        </li>
										
										
										<? } ?>
										
                                        
                                    </ul>
                                </div>
                                <!-- .woocommerce widget_layered_nav -->
                              
							  <button class="button" style="width:100%;" type="submit">סנן מוצרים</button> 
                            </div>
								
								</form>
								
								   <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories" id="techmarket_product_categories_widget-2">
                                <ul class="product-categories ">
                                    <li class="product_cat">
                                       
									   
                                        <ul>
										
								
										<?
										
										
										
											
										$get_categories = mysql_query("SELECT * FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id WHERE mpcl.parent = '0' ORDER BY mpcl.order ASC");	
											
										
										
										
										while($gc = mysql_fetch_array($get_categories)){
											
											
											
										?>
											
											
											
                                            <li class="cat-item">
                                                <a style="<? if($get_id == $gc['page_id']){echo "color:red;";} ?>" href=",products,<?=$gc['page_id']; ?>">
                                               <b><?=$gc['title']; ?></b></a>
                                           </li>
											
											<? 
											if($gc['page_id'] == $GP['parent']){
												
												
													$get_subs = mysql_query("SELECT * FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id 
													WHERE mpcl.parent = '".$GP['parent']."' ORDER BY mpcl.order ASC"); 
													
													
													while($gs = mysql_fetch_array($get_subs)){
													?>
													
													<li class="cat-item">
														<a style="<? if($get_id == $gs['page_id']){echo "color:red;";} ?>" href=",products,<?=$gs['page_id']; ?>">
															<span class="child-indicator">
																<i class="fa fa-angle-right"></i>
															</span><?=$gs['title']; ?></a>
													</li>
													<?
													
													}
											}else if ($gc['page_id'] == $GP['page_id']){
												
												
													$get_subs = mysql_query("SELECT * FROM mod_products_categories_list AS mpcl INNER JOIN mod_products_categories AS mpc ON mpcl.id = mpc.page_id 
													WHERE mpcl.parent = '".$GP['page_id']."' ORDER BY mpcl.order ASC"); 
													
													while($gs = mysql_fetch_array($get_subs)){
													?>
													
													<li class="cat-item">
														<a style="<? if($get_id == $gs['page_id']){echo "color:red;";} ?>" href=",products,<?=$gs['page_id']; ?>">
															<span class="child-indicator">
																<i class="fa fa-angle-right"></i>
															</span><?=$gs['title']; ?></a>
													</li>
													<?
													
													}
												
												
											}
											?>
									
									
									 
									<?
									
										}
									
									?>
									
									
									
									
									
									
									
									
									
									
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        
								
								
								
								
					
                  
				  
                            <!-- .widget_techmarket_products_carousel_widget -->
                        </div>
                        <!-- #secondary -->
                    </div>
                   


					 </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- #content -->
      
	
	
	
	
	
	<? } ?>