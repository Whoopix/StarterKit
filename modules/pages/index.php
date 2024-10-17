<?php

if ($get_id) {
	$GET_PAGEINFO_y = mysql_query("SELECT * FROM `mod_seo` WHERE id='".$get_id."' AND lang_id=".LANG);
	$sss= mysql_fetch_array($GET_PAGEINFO_y);
	$GET_PAGEINFO_q = mysql_query("SELECT L.*,T.`access`,T.`template`,T.`slide` FROM `mod_pages` L,`mod_pages_list` T WHERE T.`id`=L.`page_id` AND L.`page_id` = $get_id AND L.`lang_id`=".LANG) or die(mysql_error());
	$GET_PAGEINFO_c = mysql_num_rows($GET_PAGEINFO_q);
	if ($GET_PAGEINFO_c > 0) {
		$GET_PAGEINFO_r = mysql_fetch_array($GET_PAGEINFO_q);
		$TEMP_PAGE_TITLE = htmlspecialchars($sss['ptitle']);
		$TEMP_INPAGE_TITLE = htmlspecialchars($GET_PAGEINFO_r['title']);
		if (!do_no_access($GET_PAGEINFO_r["access"]))
		{
			function PAGE_TEXT() { 
				global $GET_PAGEINFO_r;
				echo "<meta HTTP-Equiv='Refresh' Content='0; URL=,members,login' />"; 
			}
			$TEMP_TEMPLATE = 2;
		} else {
			$dinLogo = ($GET_PAGEINFO_r['pic']) ? '/files/bn/' . $GET_PAGEINFO_r['pic'] : '';
			$xsd =  "<a href = \"./,pages,print_{$get_id}\"><% LANG_PRINTABLE %></a>";
			function PAGE_TEXT() { 
				global $GET_PAGEINFO_r,$lang,$get_id,$get_img;
			
			
			$get_img = $GET_PAGEINFO_r['pic']; 
				echo $GET_PAGEINFO_r['text']; 
				
				
			}
			$TEMP_TEMPLATE = $GET_PAGEINFO_r[template];
		}
	}

	else {
		$TEMP_PAGE_TITLE = "עמוד לא קיים";
		$TEMP_INPAGE_TITLE = "עמוד לא קיים - 404 - Page not found";
		function PAGE_TEXT() { 
				
			echo"<% BLOCK_11 %>"; 
		}
		$TEMP_TEMPLATE = 2;

	}
}
?>