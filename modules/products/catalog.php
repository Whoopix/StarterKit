<?php

if($get_id == '1'){
	$TEMP_PAGE_TITLE  = 'קטלוג מוצרים';
	$TEMP_INPAGE_TITLE = 'קטלוג מוצרים';
} else {
	$TEMP_PAGE_TITLE  = 'קטלוג מוצרים';
	$TEMP_INPAGE_TITLE = 'קטלוג מוצרים';	
}

$TEMP_TEMPLATE = 4;

//PRICE
//BRANDS
//SUB CATEGORIES

//--- order by:
// PRICE, DATE  

// LIMIT (PAGES) + dynamic jquery on change


// צריך להביא את התת -תת קטגוריות - יעני רמה 3


$get_subs = mysql_query("SELECT * FROM mod_products_categories_list WHERE parent = ".$get_id."");


$SQL = "SELECT * FROM mod_products_list AS mpcl INNER JOIN mod_products AS mpc ON mpcl.id = mpc.page_id";
$SQL .="WHERE";
$SQL .= " mpcl.brand_id IN (".$_GET['brand'].") ";

if($get_id != '1'){
	$SQL .= "AND cat_id IN (";
	while ($gs = mysql_fetch_array($get_subs)){
		$SQL .= $gs['id'];
		$SQL .= ",";
	}
	$SQL .= $get_id.") ";
}

if ($_GET['From']){
$SQL .= " AND mpcl.price BETWEEN ".$_GET['From']." AND ".$_GET['To'];
}
if($_GET['order'] != ''){
$SQL .= " ORDER BY id DESC";
	
}


				if ($_GET['page'] != ''){
					$limit = " LIMIT ";
					if ($_GET['page'] == 1){
						$limit .= "0";
					} else {
						$limit .= 20*($_GET['page']-1);
					}
					$limit .= ", 20";
				} else {
					$limit = " LIMIT 0, ".$_GET['limit']."";
				}


				
				

function Category_Menu(){
	global $gs;
	
	?>
	<div class="shop-side-bar"> 
              
              <!-- Categories -->
              <h6>Categories</h6>
              <div class="checkbox checkbox-primary">
                <ul>
				
				
				<? 
				while ($g_sub = mysql_fetch_array($get_subs)){
					
					
					?>
					 <li>
                    <input id="cate<?=$g_sub['id']; ?>" class="styled" type="checkbox">
                    <label for="cate<?=$g_sub['id']; ?>"> <?=$g_sub['title']; ?> </label>
                  </li>
					
					
					<?
					$get_sub_sub = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `parent` = ".$g_sub['id']."");
					while ($gss = mysql_fetch_array($get_sub_sub)){
					
				?>
				  <li>
                    <input id="cate<?=$gss['id']; ?>" class="styled" type="checkbox">
                    <label for="cate<?=$gss['id']; ?>"> <?=$gss['title']; ?> </label>
                  </li>
				<?
					}
				
				?>
				
				
				<?
				}
				?>
                 
                 
                </ul>
              </div>
              
              <!-- Categories -->
              <h6>Price</h6>
              <!-- PRICE -->
              <div class="cost-price-content">
                <div id="price-range" class="price-range noUi-target noUi-ltr noUi-horizontal noUi-background"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 4%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 94%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
                <span id="price-min" class="price-min">$40.00</span> <span id="price-max" class="price-max">$940.00</span> <a href="#." class="btn-round">Filter</a> </div>
              
              <!-- Featured Brands -->
              <h6>Featured Brands</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <input id="brand1" class="styled" type="checkbox">
                    <label for="brand1"> Apple <span>(217)</span> </label>
                  </li>
                  <li>
                    <input id="brand2" class="styled" type="checkbox">
                    <label for="brand2"> Acer <span>(79)</span> </label>
                  </li>
                  <li>
                    <input id="brand3" class="styled" type="checkbox">
                    <label for="brand3"> Asus <span>(283)</span> </label>
                  </li>
                  <li>
                    <input id="brand4" class="styled" type="checkbox">
                    <label for="brand4">Samsung <span>(116)</span> </label>
                  </li>
                  <li>
                    <input id="brand5" class="styled" type="checkbox">
                    <label for="brand5"> LG <span>(29)</span> </label>
                  </li>
                  <li>
                    <input id="brand6" class="styled" type="checkbox">
                    <label for="brand6"> Electrolux <span>(179)</span> </label>
                  </li>
                  <li>
                    <input id="brand7" class="styled" type="checkbox">
                    <label for="brand7"> Toshiba <span>(38)</span> </label>
                  </li>
                  <li>
                    <input id="brand8" class="styled" type="checkbox">
                    <label for="brand8"> Sharp <span>(205)</span> </label>
                  </li>
                  <li>
                    <input id="brand9" class="styled" type="checkbox">
                    <label for="brand9"> Sony <span>(35)</span> </label>
                  </li>
                  <li>
                    <input id="brand10" class="styled" type="checkbox">
                    <label for="brand10"> HTC <span>(59)</span> </label>
                  </li>
                  <li>
                    <input id="brand11" class="styled" type="checkbox">
                    <label for="brand11"> Lenovo <span>(68)</span> </label>
                  </li>
                  <li>
                    <input id="brand12" class="styled" type="checkbox">
                    <label for="brand12">Sanyo  (19) </label>
                  </li>
                </ul>
              </div>
              
              <!-- Rating -->
              <h6>Rating</h6>
              <div class="rating">
                <ul>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> <span>(218)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(178)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(79)</span></a></li>
                  <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(188)</span></a></li>
                </ul>
              </div>
              
              <!-- Colors -->
              <h6>Size</h6>
              <div class="sizes"> <a href="#.">S</a> <a href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a> </div>
              
              <!-- Colors -->
              <h6>Colors</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  <li>
                    <input id="colr1" class="styled" type="checkbox">
                    <label for="colr1"> Red <span>(217)</span> </label>
                  </li>
                  <li>
                    <input id="colr2" class="styled" type="checkbox">
                    <label for="colr2"> Yellow <span> (179) </span> </label>
                  </li>
                  <li>
                    <input id="colr3" class="styled" type="checkbox">
                    <label for="colr3"> Black <span>(79)</span> </label>
                  </li>
                  <li>
                    <input id="colr4" class="styled" type="checkbox">
                    <label for="colr4">Blue <span>(283) </span></label>
                  </li>
                  <li>
                    <input id="colr5" class="styled" type="checkbox">
                    <label for="colr5"> Grey <span> (116)</span> </label>
                  </li>
                  <li>
                    <input id="colr6" class="styled" type="checkbox">
                    <label for="colr6"> Pink<span> (29) </span></label>
                  </li>
                  <li>
                    <input id="colr7" class="styled" type="checkbox">
                    <label for="colr7"> White <span> (38)</span> </label>
                  </li>
                  <li>
                    <input id="colr8" class="styled" type="checkbox">
                    <label for="colr8">Green <span>(205)</span></label>
                  </li>
                </ul>
              </div>
            </div>
	
	<?
	
	
}



function PAGE_TEXT() {
	global $get_id, $lang;
	
}
?>