<?
		$TEMP_PAGE_TITLE = 'מפת אתר';
		$TEMP_INPAGE_TITLE = 'מפת אתר';
		$TEMP_TEMPLATE = 2;
		function PAGE_TEXT() { 
			
			
			echo "<ul>";
			
			$A = mysql_query ("SELECT * FROM `mod_menu` WHERE parent = 0 AND show_m = 1 ORDER BY 'order'");
			while($B = mysql_fetch_array($A)) {
			
				
				echo "<li><a style='font-weight:bold;' href='";
				echo $B['Link_Neto'];
				echo "'>";
				
				echo $B['title'];
				echo "</a>";
				
				
						$P = $B['id'];
						
						$SUB_A = mysql_query ("SELECT * FROM `mod_menu` WHERE parent = $P ORDER BY 'order'");
						while($SUB_B = mysql_fetch_array($SUB_A)) {
						
						echo "<li style='margin-right:20px;'><a href='";
						echo $SUB_B['Link_Neto'];
						
						echo "'>";
						echo $SUB_B['title'];
						echo "</a></li>";

						
						}
						
				echo "</li>";
			
			
			
			}
			
			echo "</ul>";
			
			
			
			
			
			echo "<ul>";
			echo "<li><a href=',guide' style='font-weight:bold;'>מדריך מחשוב ענן</a></li>";
			
			
			$A = mysql_query ("SELECT * FROM `mod_guide` ORDER BY 'order'");
			while($B = mysql_fetch_array($A)) {
			
			
			echo "<li style='margin-right:20px;'><a  href=',guide,";
			echo $B['id'];
			echo "'>";
			
			echo $B['title'];
			echo "</a></li>";
			
			
			
			}
			
			echo "</ul>";
			
			
			
			echo "<h3>חדשות ועדכונים</h3>";
			
			
			echo "<ul>";
			
			$A = mysql_query ("SELECT * FROM `mod_news` ORDER BY 'order'");
			while($B = mysql_fetch_array($A)) {
			
			
			echo "<li><a href=',news,";
			echo $B['id'];
			echo "'>";
			
			echo $B['title'];
			echo "</a></li>";
			
			
			
			}
			
			echo "</ul>";
			
	
		}
	
		
?>