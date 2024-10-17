<?php


$word = mysql_real_escape_string($_GET["word"]);

if($_GET['cat_id'] == '0'){
	$cat_id = "";
	
} else {
	
	$cat_id = " AND mpl.cat_id = '".$_GET['cat_id']."'";
}
$TEMP_PAGE_TITLE  = '<% LANG_search %>';
$TEMP_INPAGE_TITLE = '<% LANG_search_results %> "'.$word.'"';
$TEMP_TEMPLATE = 2;
$SQL = "SELECT * FROM mod_products AS mp INNER JOIN mod_products_list AS mpl ON mp.`page_id` = mpl.`id` WHERE 
((mp.`title` LIKE '%".$word."%') OR (mp.`text` LIKE '%".$word."%') OR (mp.`id` LIKE '%".$word."%')".$cat_id.")";
//echo $SQL;

























	
													$get_main_subs = mysql_query("SELECT * FROM mod_products_categories_list WHERE parent = '".$get_id."'");
														$SQL = "
														SELECT * FROM mod_products_list AS mpl 
														INNER JOIN mod_products AS mp ON mpl.id = mp.page_id 
														WHERE ((mp.`title` LIKE '%".$word."%') OR (mp.`text` LIKE '%".$word."%') OR (mp.`id` LIKE '%".$word."%')) AND";
														
													
													if($_GET['cat_id'] == '0'){
													$SQL .= " mpl.cat_id != '".$_GET['cat_id']."'";
													} else if  ($_GET['cat_id'] > '0'){
														
													$SQL .= " mpl.cat_id = '".$_GET['cat_id']."'";
													}	else {
														
														$SQL .= " mpl.cat_id != '".$_GET['cat_id']."'";
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
														
														$SQL .= "mpl.price DESC";
														
													} else if($_GET['order'] == 'priceUp'){
														
														$SQL .= "mpl.price ASC";
														
													} else if($_GET['order'] == 'rating'){
														
														$SQL .= "mpl.rating ASC";
														
													} else if($_GET['order'] == 'date'){
														
														$SQL .= "mpl.date ASC";
														
													} else {
														
														$SQL .= "mpl.order ASC";
													}
													
													
											//	echo $SQL;
													
													
													
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



function PAGE_TEXT() {
	global $get_products,$SQL;
	
	
	
	?>
	
	
	
	
	
	
	        <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.php">עמוד הבית</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
						<a href=",search?word=<?=$_GET['word'];?>">חיפוש <?=$_GET['word'];?></a>
                           
						   
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="shop-control-bar">
                                    <div class="handheld-sidebar-toggle">
                                        <button type="button" class="btn sidebar-toggler">
                                            <i class="fa fa-sliders"></i>
                                            <span>סינונים</span>
                                        </button>
                                    </div>
                                    <!-- .handheld-sidebar-toggle -->
                                    <h1 class="woocommerce-products-header__title page-title">חיפוש <?=$_GET['word'];?></h1>
                                   
                                    
									
                                    <!-- .form-techmarket-wc-ppp -->
                                   <form method="get" class="woocommerce-ordering">
								   <?
								   
								   $URL = "";
								   
								   ?>
                                        <select class="orderby" name="orderby" onchange="if (this.value) window.location.href=this.value">
                                            <option value="/,search?word=<?=$_GET['word'];?>&order=rating">סדר לפי פופולריות</option>
                                            <option value="/,search?word=<?=$_GET['word'];?>&order=priceUp">סדר לפי מחיר עולה</option>
                                            <option selected=",search?word=<?=$_GET['word'];?>&order=priceDown" value="3">סדר לפי מחיר יורד</option>
                                            <option value=",search?word=<?=$_GET['word'];?>&order=date">סדר לפי תאריך הוספה</option>
                                           
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
					echo "/,search?word=".$_GET['word']."";
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
					echo "/,search?word=".$_GET['word']."";
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
					echo "/,search?word=".$_GET['word']."";
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
                                    <div id="grid" class="tab-pane active" role="tabpanel">
                                        <div class="woocommerce columns-7">
                                            <div class="products">
											
											
											
											
											
											
											
											
											
											
											
											
											
											
	<?
	
	$i = 0;
	while ($gp = mysql_fetch_array($get_products)) {
		
			
													$get_plink = mysql_query("SELECT * FROM mod_seo WHERE id = '".$gp['page_id']."' AND `mod` = 'products' AND `act` = 'show'");
																	$gpX = mysql_fetch_array($get_plink);
																	if($gpX['plink'] != ''){
																		$link = $gpX['plink'];
																	}else{
																		$link = ',products,show_'.$gp['page_id'];
																	}
		?>
		
			
		
											
                                                <div class="product first">
                                           
										   
										   
                                                    <!-- .yith-wcwl-add-to-wishlist -->
                                                    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=$link;?>">
                                                        <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="files/products/<?=$gp['pic'];?>">
                                                        <span class="price">
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">₪</span>
																
																<?=$gp['price'];?>
																
																
															</span>
                                                        </span>
                                                        <h2 class="woocommerce-loop-product__title"><?=$gp['title'];?></h2>
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                    <div class="hover-area">
                                                        <a class="button" style="cursor:pointer;" onclick="cartAction('add','<?=$gp['page_id'];?>')">הוספה לעגלת קניות</a>
                                                    
                                                    </div>
                                                    <!-- .hover-area -->
                                                </div>
                                                <!-- .product -->
												
												
				
				<?
				$i++;?>
				
				
		
		<?
		
		
	}
	
?>
											
												
												
												
												
												
												
												
												
												
										
										
                                            </div>
                                            <!-- .products -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .tab-pane -->
                                </div>
                                <!-- .tab-content -->
                                <div class="shop-control-bar-bottom">
                                 
								 
                                    <!-- .form-techmarket-wc-ppp -->
                                    <p class="woocommerce-result-count">
                                        מספר תוצאות <?=$get_pages;?>
                                    </p>
                                    <!-- .woocommerce-result-count -->
                                    <nav class="woocommerce-pagination">
                                        <ul class="page-numbers">
                                            							
										
										
													
				<?php
				
			
				$pages_query = mysql_query($SQL)or die(mysql_error());
				$get_pages = mysql_num_rows($pages_query);


				if($_GET['page'] > 1){

					echo '<li class="prev page-numbers">';
					echo "<a href='";
					echo "/,search?word=".$_GET['word']."";
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
					echo "/,search?word=".$_GET['word']."";
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
					echo "/,search?word=".$_GET['word']."";
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