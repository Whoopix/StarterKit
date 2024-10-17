<?php




if ($get_id) {


		$TAK=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_acde` AS `p` 
													INNER JOIN `mod_acde_list` AS `l` 
													ON `p`.`page_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`id`='".$get_id."' ORDER BY `l`.`order`")or die(mysql_error());
		$PAK = mysql_fetch_array($TAK);
		
		
		$A = mysql_query("SELECT * FROM `mod_acde_list` WHERE id = $get_id");
		$B = mysql_fetch_array($A);
		
		
	
		$TEMP_PAGE_TITLE = $PAK['lang_title'];
		$TEMP_INPAGE_TITLE = $PAK['lang_title'];


	function PAGE_TEXT() { 
		global $lang, $get_id, $B, $Z;
		
		
		
		$GET_UPDATES=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_acde` AS `p` 
													INNER JOIN `mod_acde_list` AS `l` 
													ON `p`.`page_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`faja`='".$get_id."' ORDER BY `l`.`order`")or die(mysql_error());
					$i=0;
					$P = mysql_query ("SELECT * FROM `mod_acde` WHERE page_id = $get_id");
					$Z = mysql_fetch_array($P);
					?>
        
    
    
                 
                     
				
		
					<?
						$GET_UPDATES=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_acde` AS `p` 
													INNER JOIN `mod_acde_list` AS `l` 
													ON `p`.`page_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." AND `l`.`faja`='".$get_id."' ORDER BY `l`.`order`")or die(mysql_error());
					$i=0;
				 
				 
				?>
				
				<?
				//slider
				
				if ($B['faja'] == '0') { } else {
				?>
				
				
				
				<div class="">
				
				
				
				
				
				
				
				
				     <!-- Portfolio Item Row -->
        <div class="row" style="margin-bottom:20px;">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
						 <li data-target="#carousel-example-generic" data-slide-to="3"></li>
						  <li data-target="#carousel-example-generic" data-slide-to="4"></li>
						   <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
					
					
                    <div class="carousel-inner">
                        
						<? if ($B['pic1'] == '') { } else { ?>
						<div class="item active">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic1']; ?>" alt="">
                        </div>
						<? } if ($B['pic2'] == ''){} else {  ?>
						
                        <div class="item">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic2']; ?>" alt="">
                        </div>
						
						<? } if ($B['pic3'] == '') { } else { ?>
                        <div class="item">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic3']; ?>" alt="">
                        </div>
						
						
						
						<? } if ($B['pic4'] == '') { } else { ?>
                        <div class="item">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic4']; ?>" alt="">
                        </div>
						
					
						
						<? } if ($B['pic5'] == '') { } else { ?>
                        <div class="item">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic5']; ?>" alt="">
                        </div>
						
						
						
						<? } if ($B['pic6'] == '') { } else { ?>
                        <div class="item">
                            <img style="border:3px solid white;outline:1px solid lightgray;" class="img-responsive" src="files/upload_news/<? echo $B['pic6']; ?>" alt="">
                        </div>
						
						<? } ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <H3>תיאור הפרויקט:</H3>
			   <?  echo $Z['desc']; ?>
			  
			  
			  <? if ($B['file'] == '') { } else {  ?>
			  <H3>מפרט טכני:</H3>
				<a href="files/upload_news/<? echo $B['file']; ?>" target="_blank"><? echo $B['file_name']; ?></a>
			<? } ?>
			  
			  
			  <H3>שיתוף ברשתות חברתיות:</H3>
			   <? $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
             

			<a href="https://twitter.com/share" style="float:right;width:40px;height:30px;line-height:30px;" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			
			
			 <div style="float:right;margin-right:10px;margin-left:10px;line-height:24px;" class="fb-share-button" data-href="<? echo $actual_link; ?>" data-layout="button_count"></div>
			

			<!-- ‫שים את התג הזה במקום שבו אתה רוצה ש-כפתור 1+ יוצג.‬‎ -->
				<div style="float:right;width:40px;height:30px;padding-top:4px;line-height:34px;" class="g-plusone" data-annotation="inline" data-width="300"></div>
			
			
			<!-- שים את התג הזה בתג הראש או בדיוק לפני סגירת תג הגוף. -->
			
				<script src="https://apis.google.com/js/platform.js" async defer>
				  {lang: 'iw'}
				</script>   
           
		   
                </ul>
            </div>

        </div>
        <!-- /.row -->

				
				
				
				
				
				</div>
				
				
				
				
				
				
				
				
				
				<?
				}
				?>
				
				
				
				
				
				 <H3>פרטים טכנים:</H3>
				<?  echo $Z['text']; ?>
				
            			<?
				//slider
				
				if ($B['faja'] == '0') { } else {
				?>
				
						<br><br>
						<h3>פרויקטים נוספים בקטגוריה:</h3>
						
						<div class="row">
						<?
						$more = mysql_query("SELECT * FROM mod_acde_list WHERE `faja` = '".$B['faja']."' order by RAND() LIMIT 4");
						while ($gmo = mysql_fetch_array($more)) {
						
						
						?>
						
						 <div class="col-md-3 img-portfolio">
                <a href=",solutions_products,<? echo $gmo['id']; ?>">
                    <img style="width:100%;height:150px;border:3px solid white;outline:1px solid lightgray;" class="img-responsive img-hover" src="files/upload_news/<? echo $gmo['pic']; ?>" alt="">
                </a>
            </div>
						<?
						}
						
						?>
	
	
        </div>
						
				<?
						}
						
						?>	  

					
					
					
					
					
					
					
                <?
		
					while($GET_UPDATESR = mysql_fetch_array($GET_UPDATES)) {
					
						?>
                  
				  
				  
				  
				  <div class="row" style="margin-top:30px;">
            <div class="col-md-7">
                            <?
					 $F1 = $GET_UPDATESR['id'];
					$F = mysql_query ("SELECT * FROM mod_seo WHERE `id` = $F1 and `lang_id` = ".LANG." AND `mod` = 'solutions'");
					$X = mysql_fetch_array($F);
	
	
	
if ($X['plink'] == '') { ?>
<a href=',solutions,<?=$GET_UPDATESR[id]?>'>
<? } else {	?>
<a href='<? echo $X['plink'];?>'>
<? 	} 	?>
                    <img class="img-responsive img-hover" src="files/upload_news/<? echo $GET_UPDATESR['pic'];?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                     <h3>
                <?  if ($X['plink'] == '') { ?>
<a href=',solutions,<?=$GET_UPDATESR[id]?>'>
<? } else {	?>
<a href='<? echo $X['plink'];?>'>
<? 	} 	?> 
				  <? echo $GET_UPDATESR['title']; ?></a>
                </h3>
               
                <?=$GET_UPDATESR[desc]?>
               
			   
			                   <?  if ($X['plink'] == '') { ?>
<a href=',solutions,<?=$GET_UPDATESR[id]?>' class="btn btn-primary">
<? } else {	?>
<a href='<? echo $X['plink'];?>' class="btn btn-primary">
<? 	} 	?> 
			   
			   צפה בפרויקט</a>
            </div>
        </div>
				  
				  
				
				
         
           
                
				
				
          
				  
				  
				  
					  
					  
					  
					  
					  
					  
					  
					  
						<?
						
						$i++;
					}
				?>
				
				
				
				
				
				
				
				
				 
				
				
				
				
				
                
				
                <?	
					
				
	}
	
	if ($B['faja'] == 0) {
	$TEMP_TEMPLATE = 16;
	}
	else {
	$TEMP_TEMPLATE = 19;
	
	?>
	 <?=$GET_UPDATESR[desc]?>
	<?
	}
	

} else {
$TEMP_TEMPLATE = 16;
		$TEMP_PAGE_TITLE = 'Solutions';
		$TEMP_INPAGE_TITLE = 'Solutions';
function PAGE_TEXT() { 
	

	?>
		<div class="row" style="margin-top:50px;font-family:'almoni-dl';text-align:center;">
	
	
	<?
	
	$gets = mysql_query("SELECT * FROM mod_acdep_list WHERE faja = '0' ORDER BY 'order' DESC");
	while ($gt = mysql_fetch_array($gets)) {
	
	$seog = mysql_query("SELECT * FROM mod_seo WHERE `mod` = 'solutions' AND `id` = '".$gt['id']."'");
	$seo = mysql_fetch_array($seog);
	
	?>
	 <div class="col-md-2 col-sm-4 col-xs-6">
			<a href="<? if ($seo['plink'] == '') { ?>
			,solutions,<? echo $gt['id']; } else { ?>
			/<? echo $seo['plink']; } ?>" class="iconlink">
			<img class="img-responsive customer-img" src="files/upload_news/<? echo $gt['pic'] ?>" alt="">
				
				<? echo $gt['title'] ?>
			</a>
            </div>
	
	<?
	}
	?>
          
		  
	
	
	
	
	
	
	
	
	</div>
	
	
	<?
	
	

}
	
}

?>