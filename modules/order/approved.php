<?
	$TEMP_PAGE_TITLE = "הזמנה";
	$TEMP_INPAGE_TITLE = "הזמנה";
	$TEMP_TEMPLATE = 6;
	
	function PAGE_TEXT(){
		
		if($_SESSION["cart"] != ''){
		session_start();

		$_SESSION["cart"] = '';
		?>
		<meta http-equiv="refresh" content="0; url=/,order,approved">
		<?
		}
		
		?>
		
		<div style="margin:auto;width:100%;max-width:500px;text-align:center;margin-top:200px;margin-bottom:200px;">
		<h3><% BLOCK_TITLE_31 %></h3>
		<br>
		<% BLOCK_31 %>
		
		</div>

		
				
			<?
			}	
			?>