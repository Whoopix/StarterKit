<?php

if($get_id == '1'){
	$TEMP_PAGE_TITLE  = 'קטלוג מוצרים';
	$TEMP_INPAGE_TITLE = 'קטלוג מוצרים';
} else {
	$TEMP_PAGE_TITLE  = 'קטלוג מוצרים';
	$TEMP_INPAGE_TITLE = 'קטלוג מוצרים';	
}

$TEMP_TEMPLATE = 4;



$get_cat_info = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `id` = '".$get_id."'");
$gci = mysql_fetch_array($get_cat_info);
$get_subs = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `parent` = '".$gci['parent']."'")or die(mysql_error());

$get_parent = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `id` = '".$gci['parent']."'");
$gpA = mysql_fetch_array($get_parent);





function Category_Menu(){
	global $gs, $get_subs, $get_id, $gpA, $gci;
	

	?>
	<div class="shop-side-bar" style="direction:rtl;"> 
              
              <!-- Categories -->
              <h6><a href=",categories,<?=$gpA['id'];?>"><?=$gpA['title'];?></a></h6>
              <div class="checkbox checkbox-primary">
                <ul>
				
				
				<? 
				while ($g_sub = mysql_fetch_array($get_subs)){
					
					
					?>
					 <li>
					
                   <a style="font-weight:bold;" href=",categories,<?=$g_sub['id']; ?>"> <?=$g_sub['title']; ?> </a>
                   
                  </li>
					
					
					<?
					$get_sub_sub = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `parent` = ".$g_sub['id']."");
					while ($gss = mysql_fetch_array($get_sub_sub)){
						
						
						
					
				?>
				  <li style="background-color:#fafafa; 
				  
				  <? if($gss['parent'] == $get_id){echo "display:block;";}else if($gss['parent'] == $gci['parent']){echo "display:block;";}else{echo "display:none;";} ?>
				  
				  ">
				  <a href=",categories,<?=$gss['id']; ?>"> <?=$gss['title']; ?> </a>
                   
                    
                  </li>
				<?
					}
				
				?>
				
				
				<?
				}
				?>
                 
                 
                </ul>
              </div>
              
      
            </div>
	
	<?
	
	
}



function PAGE_TEXT() {
	global $get_id, $lang, $gci, $get_subs, $get_cat_info;
	

	
	
	$get_subszx = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `parent` = '".$get_id."'")or die(mysql_error());

	
	
$SQL = "SELECT * FROM mod_products_list AS mpcl INNER JOIN mod_products AS mpc ON mpcl.id = mpc.page_id";
$SQL .=" WHERE";
if($_GET['brand'] != '') {
$SQL .= " mpcl.brand_id IN (".$_GET['brand'].") AND";
}

	$SQL .= " cat_id IN (";
	
	
	if($gci['parent'] == '0'){
	
			while ($gsX = mysql_fetch_array($get_subszx)){
				$SQL .= $gsX['id'];
				$SQL .= ",";
			}
	
	} else {
		
			while ($gs = mysql_fetch_array($get_subs)){
				$SQL .= $gs['id'];
				$SQL .= ",";
			}
			
		
	
	
	}
	
	
	
	$SQL .= $get_id.") ";

	
	//echo $SQL;

if ($_GET['From']){
$SQL .= " AND mpcl.price BETWEEN ".$_GET['From']." AND ".$_GET['To'];
}
if($_GET['order'] != ''){
$SQL .= " ORDER BY id DESC";
	
}


				if ($_GET['p'] != ''){
					$limit = " LIMIT ";
					if ($_GET['p'] == 1){
						$limit .= "0";
					} else {
						$limit .= 20*($_GET['p']-1);
					}
					$limit .= ", 20";
				} else {
					$limit = " LIMIT 0, 20".$_GET['limit']."";
				}

			//echo $SQL.$limit;

			
			
			
			$main = mysql_query($SQL.$limit);
			
			$count_res = mysql_num_rows($main);
			
				$get_cat = mysql_query("SELECT * FROM `mod_products_categories_list` WHERE `id` = '".$get_id."'");
				$gc = mysql_fetch_array($get_cat);
			?>
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
	
            <!-- Short List -->
            <div class="short-lst" style="direction:rtl;">
              <h2><?=$gc['title'];?></h2>
			  <p>מציג <?=$count_res;?> תוצאות בקטגוריה</p>
			  
			
            </div>
            
			
			<?
			$i = 0;
			while ($gp = mysql_fetch_array($main)){
				
				
				
				?>
				<? if (($i % 4) == 0){?>
				<div class="item-col-4" style="direction:rtl;"> 
				<?}?>
				
				 <div class="product">
                <article> 
				<a style="width:100%;" href=",products,<?=$gp['page_id'];?>">
				<div class="img-responsive" style="height:230px;width:100%;background-image:url('files/products/<?=$gp['pic'];?>');background-size:cover">  
				</div>
				
				</a>
                  
                  <!-- Content --> 
                  <span class="tag"><a href=",categories,<?=$gc['id'];?>"><?=$gc['title'];?></a></span> 
				  <a href=",products,<?=$gp['page_id'];?>" class="tittle"><?=$gp['title'];?></a> 
                  <!-- Reviews -->
                 <br><br>
				 <div class="price"><?=$gp['price'];?></div>
                  <a style="cursor:pointer;" onclick="cartAction('add','<?=$gp['page_id'];?>')" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
              </div>
              
				
				<?
				$i++;?>
				
				<? if (($i % 4) == 0){?>
				</div> 
				<?}?>
				<?
			}
				?>
	<div style="clear:both;"></div>

	<ul class="pagination" style="direction:rtl!important;right:0px;">

            
	
	<?php
	
	
	
	
	
	
	$BURL = "http://";
	$BURL .= $_SERVER["HTTP_HOST"];
	$BURL .= "/";
	$BURL .= $ext;
	$BURL .= ",categories,";
	$BURL .= $get_id;
	
	
	
	
				$pages_query = mysql_query($SQL)or die(mysql_error());
				$get_pages = mysql_num_rows($pages_query);


				if($_GET['p'] > 1){

					echo ' <li>';
					echo "<a aria-label='Previous' href='";
					
					echo $BURL.$URL;

				
					
					
				

					echo "&p=";
					echo ($_GET['p']-1);
					echo "'> <i style='padding-top:7px' class='fa fa-angle-left'></i> </a></li>";

				}




				for ($i = 1; $i <= (ceil($get_pages/20)); $i++) {



					echo '<li class=" ';
					if($_GET['p'] == $i){
						echo "active";
					}
					echo '">';
					echo "<a href='";
					

					echo $BURL.$URL;

					echo "&p=$i'>$i</a>";
					$max += $i;
					echo "</li>";
				}

				//echo $max;
				if($_GET['p'] < ($max - 1)){


					echo '<li>';
					echo "<a aria-label='Next' href='";
					
					
					echo $BURL.$URL;

				

					echo "&p=";
					if ($_GET['p'] < 1){
						echo '2';
					} else {
						echo ($_GET['p']+1);
					}
					echo "'> <i style='padding-top:7px' class='fa fa-angle-right'></i> </a></li>";


				}






?>
	
	
	
	
	
	  </ul>
	
	
	
	
	
	
	
	
	
<?	
}
?>