<?php
$PUT_LEFT=false;
$TEMP_PAGE_TITLE  = 'קטלוג מוצרים';
$TEMP_INPAGE_TITLE = 'קטלוג מוצרים';
$TEMP_TEMPLATE = 2;
$get_id=$get_id?$get_id:0;

if($get_id!=0){	
	$GET_PRODCAT = mysql_query("SELECT `p`.`title`,`l`.`parent_id`,`l`.`id` FROM `mod_slides` AS `p` 
													INNER JOIN `mod_slides_list` AS `l` 
													ON `p`.`propic_id`=`l`.`id` 
													WHERE `l`.`id` = ".$get_id." AND `p`.`lang_id`=".LANG);
	if(mysql_num_rows($GET_PRODCAT)>0){
		$GET_PRODCAT_r=mysql_fetch_array($GET_PRODCAT);
		$TEMP_PAGE_TITLE  = $GET_PRODCAT_r["title"];
		$TEMP_INPAGE_TITLE = $GET_PRODCAT_r["title"];
		$FORMENU=$GET_PRODCAT_r["parent_id"]>0?$GET_PRODCAT_r["parent_id"]:$GET_PRODCAT_r["id"];
	}else{
		function PAGE_TEXT() {
			echo "\t\t\t\t<div style=\"text-align:center;\">\n";
				echo "\t\t\t\t\tקטגוריה לא קיימת\n";
			echo "\t\t\t\t</div>\n";
			return;
		}
	}
}
function rect_get_cats($id=0){
	$array=$id==0?array():array($id);
	$GET_LEVEL = mysql_query("SELECT `propic_id` FROM `mod_slides` AS `p` 
													INNER JOIN `mod_slides_list` AS `l` 
													ON `p`.`propic_id`=`l`.`id` 
													WHERE `l`.`parent_id` = ".$id." AND `p`.`lang_id`=".LANG);
	if(mysql_num_rows($GET_LEVEL)>0){
		while($r=mysql_fetch_array($GET_LEVEL)){
			$array= array_merge(rect_get_cats($r["propic_id"]),$array);
		}
	}
	return $array;
	
}
if(!function_exists("PAGE_TEXT")){
function PAGE_TEXT() {
	global $bis_s, $get_id, $get_page,$GET_T,$lang, $msg;
	echo $msg;
	
	$b=explode("_",$_GET["brands"]);
	array_pop($b);
	$b=is_array($b)?$b:array();
	$b=array_filter($b,create_function('$var','return (intval($var)>0);'));
	$b=array_unique($b);
	
	$Ppage=intval($_GET["page"])>0?intval($_GET["page"]):1;
	$InPage=12;
	$start=$InPage*$Ppage-$InPage;
	//$end=$InPage*$Ppage;
	$cats=rect_get_cats($get_id);
	

	

	$GET_LEVEL = mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_slides` AS `p` 
													INNER JOIN `mod_slides_list` AS `l` 
													ON `p`.`propic_id`=`l`.`id` 
													WHERE `l`.`parent_id` = ".$get_id." AND `p`.`lang_id`=".LANG);//"SELECT * FROM `mod_slides_list` WHERE `parent_id` = 0");
	$cats_array=array();
	while ($GET_L = mysql_fetch_array($GET_LEVEL)){
		$cats_array[]=array($GET_L['id'],$GET_L['lang_title']);
	}	
	
	if(count($cats_array)>0){
		echo "\t<div class=\"scats\"><b>תתי קטגוריה:</b> \n";
		echo "\t\t<a href=\",products,".$cats_array[0][0]."\">".$cats_array[0][1]."</a>";
		for($i=1;$i<count($cats_array);$i++){
			echo ",&nbsp;<a href=\",products,".$cats_array[$i][0]."\">".$cats_array[$i][1]."</a>";
		}
		echo "\n\t</div>\n";
	}
$brands=array();
$GET_BRAND_I = mysql_query("SELECT `brand_id` FROM `mod_products_list` WHERE `pic_id` IN(".implode(",",$cats).") GROUP BY `brand_id`");
while($GET_BRAND = mysql_fetch_array($GET_BRAND_I))
	$brands[]=$GET_BRAND["brand_id"];

if(count($brands)>0){
	$GET_BRAND_I = mysql_query("SELECT `title`,`brand_id` FROM `mod_brands` WHERE `lang_id`=".LANG." AND `brand_id` IN(".implode(",",$brands).")")or die(mysql_error());
	echo "\t<br /><div class=\"scats\">מיון מותגים:<a href=\"#\" id=\"checkall\">סמן</a>/<a href=\"#\"id=\"uncheckall\">בטל</a> הכל\n";
	echo "\t\t<table id=\"brands\">\n";
	echo "\t\t\t<tr>\n";
	$i=0;
	while($GET_BRAND = mysql_fetch_array($GET_BRAND_I)){
		
		if($i>0 && $i%5==0)
			echo "\t\t\t</tr>\n\t\t\t<tr>\n";
		//just_one(".$GET_BRAND["id"].");
			echo "\t\t\t\t<td><input type=\"checkbox\" ".(!in_array($GET_BRAND["brand_id"],$b)?"checked=\"checked\"":"")." value=\"".$GET_BRAND["brand_id"]."\" /><a href=\",products,".$get_id."\" >".$GET_BRAND["title"]."</a></td>\n";
		$i++;
	}
	for($x=0;$x<5-$i%5;$x++){
		echo "\t\t\t\t<td>&nbsp;</td>\n";
	}
	echo "\t\t\t</tr>\n";
	echo "\t\t\t<tr><td colspan=\"5\" style=\"text-align:left;\"><input type=\"button\" class=\"button\" id=\"filter\" href=\",products,".$get_id."\" value=\"סנן מוצרים\"></td></tr>\n";
	echo "\t\t</table>\n";
	echo "\t</div><br />\n";
}
$bd="";


													
													
if(count($b)>0)
	$bd=" AND `l`.`brand_id` NOT IN (".implode(",",$b).")";
$count_q=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_products` AS `p` 
													INNER JOIN `mod_products_list` AS `l` 
													ON `p`.`prod_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`pic_id` IN(".implode(",",$cats).") ".$bd." ORDER BY `l`.`pic_id`,`l`.`order`")or die(mysql_error());
$count=ceil(mysql_num_rows($count_q)/$InPage);
//echo "$start,$end";
if($count!=0){
	$GET_H_INFO1 = mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_products` AS `p` 
													INNER JOIN `mod_products_list` AS `l` 
													ON `p`.`prod_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`pic_id` IN(".implode(",",$cats).") ".$bd." ORDER BY `l`.`pic_id`,`l`.`order` LIMIT ".$start.",".$InPage) or die(mysql_error());

	do_num_pages($count,$Ppage,"products,".$get_id);
	echo "\t\t\t\t<div id=\"products\">\n";				
	while($GET_H1 = mysql_fetch_array($GET_H_INFO1)){
		if($GET_H1["pic1"]=="")
			$GET_H1["pic1"]="../../images/nopic.png";
	?>
					<div class="product">
						<div class="pic"><a href=",products,show_<?=$GET_H1["prod_id"];?>"><img src="http://audio-club.co.il/files/products/<?=$GET_H1["pic1"];?>" alt="" /></a></div>
						<div class="desc"><h4><a href=",products,show_<?=$GET_H1["prod_id"];?>"><?=$GET_H1["lang_title"];?></h4></a><?=$GET_H1["desc"];?></div>
						<div style="text-align:center;">
							<a href="" class="addtocart" rel="<?=$GET_H1["prod_id"];?>"><img src="images/addcart.png" alt="" /></a>
							<a href=",products,show_<?=$GET_H1["prod_id"];?>"><img src="images/readmore.png" alt="" /></a>
						</div>

					</div>
					<!--
		<div class="brand_<?=$GET_H1[brand];?>">
		<table class="product" cellpadding="0" cellspacing="0">
			<tr>
				<td class="img"><img src="<?=$pic;?>" alt="" /></td>
				<td class="info_page"><h2><?=$GET_H1[title]?></h2><?=$GET_H1[shortinfo]?></td>
				<td class="moreinfo"><a href=",prodinfo,<?=$GET_H1[id]?>"><img src="images/info.jpg" alt="" /></a></td>
				<td class="order">
					<form class="order" action="" method="post"><input type="hidden" name="id" value="<?=$GET_H1['id']?>" />
						<input type="hidden" name="addto" value="TOCART" />
						<input type="image" src="images/add_cart.jpg">
					</form>
				</td>
			</tr>
		</table>
		</div>
		-->
	<?
	}
	echo "\t\t\t\t</div>\n";		
	do_num_pages($count,$Ppage,"products,".$get_id);


}
}
}
?>