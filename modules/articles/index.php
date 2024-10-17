<?php

if ($get_id) {


	$GET_PAGEINFO_q = mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_articles` AS `p` 
													INNER JOIN `mod_articles_list` AS `l` 
													ON `p`.`art_id`=`l`.`id` 
													WHERE `l`.`id`='".$get_id."' AND `p`.`lang_id`=".LANG."")or die(mysql_error());
	$GET_PAGEINFO_c = mysql_num_rows($GET_PAGEINFO_q);

	if ($GET_PAGEINFO_c > 0) {
		$GET_PAGEINFO_r = mysql_fetch_array($GET_PAGEINFO_q);
		$TEMP_PAGE_TITLE = htmlspecialchars($GET_PAGEINFO_r['lang_title']);
		$TEMP_INPAGE_TITLE = htmlspecialchars($GET_PAGEINFO_r['lang_title']);
		function PAGE_TEXT() { 
			global $GET_PAGEINFO_r, $get_id, $lang;
			
			?>
			
            <table border="0">
            <tr>
            <td valign="top">
            
          <?  echo $GET_PAGEINFO_r['text']; ?>
            
            </td>
            <td valign="top"  width="20%" align="center">
            <?  if ($GET_PAGEINFO_r['cert'] == '1') { ?>
            
            <img src="images/cert.png" />
            <? } ?>
            
            </td>
            </tr>
            </table>
            <br /><br />
            
            <table border="0" width="100%" cellpadding="5">
            
                      <?  if ($GET_PAGEINFO_r['block1'] == '0') { } else {?>
            	<tr>
                	<td class="block_a" colspan="5">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block1']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block1'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                 </tr>
                 
                 <tr>
                   <td height="5"></td>
                   </tr>
            <? } ?>
            
            
             <?  if ($GET_PAGEINFO_r['block2'] == '0') { } else {?>
            	<tr>
                	<td class="block_a" colspan="5">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block2']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block2'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                 </tr>
                 
                 <tr>
                   <td height="5"></td>
                   </tr>
            <? } ?>
            
            
            
            <tr>
            
             <?  if ($GET_PAGEINFO_r['block3'] == '0') { } else {?>
            	
                	<td class="block_b">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block3']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block3'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                <td width="5"></td>
                
            <? } ?>
            
             <?  if ($GET_PAGEINFO_r['block4'] == '0') { } else {?>
            	
                	<td class="block_b">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block4']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block4'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                  <td width="5"></td>
                
            <? } ?>
            
             <?  if ($GET_PAGEINFO_r['block5'] == '0') { } else {?>
            	
                	<td class="block_b">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block5']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block5'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                
            <? } ?>
                 </tr>
                 
                 
                 
                           <?  if ($GET_PAGEINFO_r['block6'] == '0') { } else {?>
                           
                           <tr>
                   <td height="5"></td>
                   </tr>
            	<tr>
                	<td class="block_a" colspan="5">
           
            <a href=",guide,<?=$GET_PAGEINFO_r['block6']; ?>
             ">
             <? 	$blocky = $GET_PAGEINFO_r['block6'];
			 		$blob = mysql_query ("SELECT * FROM mod_guide WHERE id = $blocky");
					$slob = mysql_fetch_array ($blob);
			 		
					echo $slob['title'];
			 
			 
			  ?>
             </a>
                </td>
                 </tr>
            <? } ?>
                 
                 
             </table>
                
            
            
            
           
            
            
            
            <?
		}
		$TEMP_TEMPLATE = 14;
		$TEMP_SITE_DESCRIPTION = $GET_PAGEINFO_r['desc'];
	}
	
} else {
	$TEMP_PAGE_TITLE = "קורסים מוזמנים לחברות";
	$TEMP_INPAGE_TITLE =  "קורסים מוזמנים לחברות";

	function PAGE_TEXT() { 
		global $lang;
					$GET_UPDATES=mysql_query("SELECT *,`p`.`title` AS `lang_title` FROM `mod_articles` AS `p` 
													INNER JOIN `mod_articles_list` AS `l` 
													ON `p`.`art_id`=`l`.`id` 
													WHERE `p`.`lang_id`=".LANG." ORDER BY `l`.`order`")or die(mysql_error());
					$i=0;
				
				
				
				?>
                <table border="0" width="100%" class="business_table">
                <tr>
                
                <td><% LANG_a1 %></td>
                <td><% LANG_a2 %></td>
                <td><% LANG_a3 %></td>
                <td><% LANG_a4 %></td>
                
                </tr>
                
                
                
                <?
					while($GET_UPDATESR = mysql_fetch_array($GET_UPDATES)) {
						if($GET_UPDATESR[faja] == 1){
						?>
                        
                        <tr>
                     <td colspan="4" style="padding-top:30px; color:#053c6f;"><b><? echo $GET_UPDATESR['lang_title'];?></b></td>
                     
                     </tr>
                        <?
						}
						elseif($GET_UPDATESR[faja] == 9999){
						?>
                             
                        
                     <tr>
                     <td><? echo $GET_UPDATESR['date'];?></td>
                     <td><? echo $GET_UPDATESR['group']; ?></td>
                     <td><? echo $GET_UPDATESR['time'];?></td>
                     <td><? echo $GET_UPDATESR['lang_title'];?></td>
                     </tr>
                        
                        
                        <?
						}
						else {
						
						
						?>
                        
                        
                        
                     <tr>
                     <td><? echo $GET_UPDATESR['date'];?></td>
                     <td><? echo $GET_UPDATESR['group']; ?></td>
                     <td><? echo $GET_UPDATESR['time'];?></td>
                     <td><a href=",articles,<? echo $GET_UPDATESR['id'];?>"><? echo $GET_UPDATESR['lang_title'];?></a></td>
                     </tr>
                        
                      
						<?
						}
						$i++;
					}
					
					
					?>
                    
                    </table>
                    <?
				
	}
	$TEMP_TEMPLATE = 2;

}
?>