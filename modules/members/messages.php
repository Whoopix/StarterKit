<?php
	if(!is_array($USER_LOGIN)) {
		include "login.php";
	} else {
		//header("Location: ,members,messages");

	$TEMP_PAGE_TITLE = "הודעות פרטיות";
	$TEMP_INPAGE_TITLE = "הודעות פרטיות";

	
		function PAGE_TEXT(){
			global $USER_LOGIN;
			?>
			
					<?php
					
					// בעצם המקס שלו מביא את המקס של ההודעה האחרונה שנשלחה אליך
					// צריך לשלוף את האיידי של השיחה האחרונה בהתניה של אם נשלח או התקבל
					
					
					
					// עזוב עשה סידור בJS
			$sqlXX = "SELECT *,COUNT(mod_members_messages.id) AS ArangeTime, 
			
		
		
			
			MAX(mod_members_messages.time) AS firstID,
			
			(SELECT MAX(id) FROM mod_members_messages WHERE ((`member_to` = '".$USER_LOGIN["id"]."') OR (`member_id` = '".$USER_LOGIN["id"]."'))) AS DisplayFirst
			FROM mod_members_messages 
			
			INNER JOIN 
			
			mod_members ON ((mod_members_messages.member_id = mod_members.id) OR (mod_members_messages.member_to = mod_members.id))
			
			
			
			WHERE `member_to` = '".$USER_LOGIN["id"]."' OR `member_id` = '".$USER_LOGIN["id"]."'
			
			

			
			GROUP BY mod_members.id,mod_members_messages.member_id,mod_members_messages.member_to 
			
			ORDER BY mod_members_messages.id  DESC

			
			
			
			";
			
			
			
			
			
			
			
			
			$sql = "SELECT *,COUNT(mod_members_messages.id) AS ArangeTime, 
			
		
		
			
			MAX(mod_members_messages.time) AS firstID,
			
			(SELECT MAX(id) FROM mod_members_messages WHERE ((`member_to` = '".$USER_LOGIN["id"]."') OR (`member_id` = '".$USER_LOGIN["id"]."'))) AS DisplayFirst
			FROM mod_members_messages 
			
			INNER JOIN 
			
			mod_members ON ((mod_members_messages.member_id = mod_members.id AND mod_members_messages.member_to = '".$USER_LOGIN["id"]."') OR (mod_members_messages.member_to = mod_members.id AND mod_members_messages.member_id = '".$USER_LOGIN["id"]."'))
			
			
			
			WHERE `member_to` = '".$USER_LOGIN["id"]."' OR `member_id` = '".$USER_LOGIN["id"]."'
			
			

			
			GROUP BY mod_members.id
			
			ORDER BY mod_members_messages.id  DESC

			
			
			
			";
			
			
			
			$do = mysql_query($sql)or die (mysql_error());
			$lister = mysql_query($sql)or die (mysql_error());
		
		
			
			?>
			
			
			<?php //include "logs_box.php"; ?>
			
			
			<?php //include "msgs_box.php"; ?>
			
			
			
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
	<?php while ($lists = mysql_fetch_object($lister)){ ?>"<?php echo $lists->username; ?>",<?php } ?>
	 "Admin"
    ];
    $( ".listser" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
			
			
			
	<script>
	$(document).ready(function() {

	window.setInterval(function() {
  var elem = document.getElementById('data123');
  elem.scrollTop = elem.scrollHeight;
}, 5000);
	 });
							//JQUERY-UI
					
					
							  function AddMessage(member_id)
							  {
								 var member_to= $("#member_to").val();
								var text= $("#text").val();
								//var rating= $(".rating").val();
								
								var rating = {};
								$(".rating").each(function() {
									var parameterId = $(this).attr('parameter-id');
									var parameterValue = $(this).val();
									rating[parameterId] = parameterValue;
								});
								
								rating = JSON.stringify(rating);
								
								  jQuery.ajax({
								   type: "POST",
								   url: "modules/members/AddMessage.php",
								   data: 'text='+text+'&member_id='+member_id+'&member_to='+member_to,
								   cache: false,
								   success: function(response)
								   {
									//  alert("ההודעה נשלחה");
									  window.location.href = ',members,messages';
								   }
								 });
							 }
							 
							 
		
							$(function() {
							 $('.AddMessageUSR').on('submit', function(event) {
								 event.preventDefault();
								 
								 var $this = $(this);
								 var text = $this.find('textarea').val();
								 var from = $this.attr('data-from');
								 var to = $this.attr('data-to');
								 var username = $this.attr('data-username');
								 
								  jQuery.ajax({
								   type: "POST",
								   url: "modules/members/AddMessage.php",
								   data: 'text='+text+'&member_id='+from+'&member_to='+to,
								   cache: false,
								   success: function(response)
								   {
									var now = new Date();
									var html = "<div class='col-md-2'> <div class='profile_img'><img class='' src='files/user_pic/<?php echo $USER_LOGIN['pic']; ?>'></div><?php echo $USER_LOGIN['username']; ?></div><div class='col-md-10'><div class='message_div arrow_box myMSG'>"+text+"<br><br><b>"+response+"</b><br>	</div></div><div style='clear:both;'></div><br>";
									$(".messages"+to).append(html);
									
									$('#AddMessageUSR')[0].reset();
									 //alert("ההודעה נשלחה");
								   }
								 });
							 });
							});
	

					</script>
			
			
			

			
			
			
			
			<?php //echo $sql; ?>

			

			



<div class="col-md-3" style="position:relative!important;">
 <? if($_GET['msgid'] == '0'){ ?>
 
  <button class="tablink" onclick="update_url('/,members,messages?msgid=0');openCity(event, 'NewMsg')">הודעה חדשה</button>
 <? } ?>

  <?php
  $R = 1;
  	while ($go = mysql_fetch_array($do)){
		
		if($go['member_id'] == $USER_LOGIN["id"]){
			
			?>
			<button class="tablink <?php 
			if($_GET['msgid'] == $go['member_to']) {
				
				echo"red";
			
			
			}
			
			else if($R == 1) {
				echo"red";
				}
			
			
			
			?>" 
			
			style="<? if ($go['username'] == $USER_LOGIN['username']) { echo "display:none;"; }  ?>"
				onclick="update_url('/,members,messages?msgid=<?php echo $go['member_to']; ?>');openCity(event, '<?php echo $go['member_to']; ?>')">
			
			<?
			
		} else {
		
				
				?>
				<button class="tablink <?php 	if($_GET['msgid'] == $go['member_to']) {
				
				echo"red";
			
			
			}
			
			else if($R == 1) {
				echo"red";
				}
			
			
			 ?>" 
				
	
				
				
				style="<? if ($go['username'] == $USER_LOGIN['username']) { echo "display:none;"; }  ?>"
				onclick="update_url('/,members,messages?msgid=<?php echo $go['member_id']; ?>');openCity(event, '<?php echo $go['member_id']; ?>')">
					<? } ?>
				<b><?php echo $go['username']; ?></b>
				<br>
				<?php  $get_messagesA = mysql_query("SELECT * FROM mod_members_messages 
  INNER JOIN mod_members ON mod_members_messages.member_id = mod_members.id 
  
  
  WHERE (member_id = '".$go['member_id']."'
  AND member_to = '".$USER_LOGIN["id"]."') OR
  
  (member_id = '".$USER_LOGIN["id"]."'
  AND member_to = '".$go['member_to']."')
  
  
  ORDER BY mod_members_messages.id DESC LIMIT 1");
  while ($gmA = mysql_fetch_array($get_messagesA)){?>
  
  
  <?php echo $gmA['text'];?>
  
  <?}?>
				</button>
				
				<?php
			
			$R++;
	}
	?>		
  
</div>
<!--
  <style>
  div.msg_wrapper > div:first-child {
    display:block!important;
}
  </style>
  -->
<div class="col-md-9 msg_wrapper" id="">

  
  
  
  <? if($_GET['msgid'] == '0'){ ?>

  
    <div id="NewMsg" class="w3-container city" style="<?php if($_GET['msgid'] == 0) {echo"display:block";}else {echo "display:none";}?>">
    <h3>הודעה חדשה</h3>
   

<hr>


		
			<div class="message send">
			<form id="AddMessage">
			
			<?php
			
			
			$get_member = mysql_query("SELECT * FROM mod_members WHERE id = '".$_GET['userid']."'");
			$gmi=mysql_fetch_array($get_member);
			
			
			?>
			<input type="hidden" name="member_to" id="member_to" class="listser searchmember" value="<?=$gmi['id'];?>">
			
			<input type="text" placeholder="<?=$gmi['username'];?>" name="nonmatt" id="member_to" class="listser searchmember" value="<?=$gmi['username'];?>"><br>
			
			
			
				
				
				
					<input type="hidden" placeholder="נמען" name="member_id" value="<?php echo $USER_LOGIN["id"]; ?>"><br>
				
				
				
				
				
				
   	
  <div class="col-md-2 col-sm-2">
  <div class="profile_img">
	<img class="" src="files/user_pic/<?php echo $USER_LOGIN['pic']; ?>">
</div>
<?php echo $USER_LOGIN["username"]; ?>
</div>

<div class="col-md-10 col-sm-10">
<div class="message_div arrow_box <? echo "myMSG"; ?>" style="height:150px;">

<div class="col-md-12" style="padding:0px!important;">
								
								<textarea style="height:100px;width:100%;border:0px;" class="col-md-10 col-xs-8" id="text" name="text" placeholder="תוכן ההודעה"></textarea>
								</div>
		
		
	<div class="col-md-4 col-xs-12 col-sm-12" style="padding:0px!important;float:left;">
	<input class="addcommentbtn"  onclick="event.preventDefault(); AddMessage(<?php echo $USER_LOGIN["id"]; ?>); "  style="width:100%;border:0px;" type="submit" style="cursor:pointer;" value="שלח הודעה" >
								
								</div>

	
</div>
</div>
<div style="clear:both;"></div>
<br>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			
			</form>
			
			</div>
			
</hr>



   </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
				<input type="hidden" placeholder="שולח" name="member_id" value="<?php echo $USER_LOGIN["id"]; ?>">
			
			
   
		<? } ?>
   
   
   
   
   
  
    <?php
 
			
			$doMSG = mysql_query($sql);
			$countMSG = mysql_num_rows($doMSG);
  
  
  ?>
  
  
  <? if($countMSG < 1) { 
  
  if($_GET['msgid'] == ''){
  echo "<h4>אין הודעות חדשות</h4>"; 
  }
  
  
  
  } else { ?>  
  
  
  

  
  <?php 
  
  $i = 0;
  while ($goMSG = mysql_fetch_array($doMSG)){ ?>
  
  
  
  
  
  
  
  
    <?
  
  
  $InnerSQL = "
  SELECT * FROM mod_members_messages WHERE id = 
  
  
  ";
  
  ?>
  
  
  
  <?
	
	
	$SSS = mysql_query("SELECT * FROM `mod_members_messages` WHERE `id` = '".$goMSG['DisplayFirst']."'");
	$sxcs = mysql_fetch_array($SSS);
	
	
	
	?>
  
    <div id="<?php echo $goMSG['id']; ?>" class="w3-container city <?php echo $goMSG['id']; ?>" 
	style="
	<?php 
	
	if($_GET['msgid'] == $goMSG['member_id']) 
	
			{echo"display:block;";}
			
	else if($sxcs['member_id'] == $goMSG['id']){
		
		if($_GET['msgid'] != ''){
			echo"display:none;";
			
			
		} 
		
	} else if($_GET['msgid'] == $goMSG['member_to']){
			echo"display:block;";
	
	} else if($i == 0){
			echo"display:block;";
		
		
	} else if($goMSG['id'] == $goMSG['firstID']) {echo"display:block;";} else{ ?> 
	display:none;	
	
	
	<?php } ?>
	
	
	overflow-y:auto; height:600px;">

	<br><br>
	
	<script>
	var objDiv = document.getElementById("<?php echo $goMSG['id']; ?>");
	Div.scrollTop = objDiv.scrollHeight;
	</script>
	
	
  

	
	
    <div class="messages<?php echo $goMSG['id']; ?>">
  <?php
  
  $get_messages = mysql_query("SELECT * FROM mod_members_messages 
  INNER JOIN mod_members ON ((mod_members_messages.member_id = mod_members.id) OR (mod_members_messages.member_to = mod_members.id))
  
  
  WHERE ((`member_id` = '".$goMSG['member_id']."'
  AND `member_to` = '".$USER_LOGIN["id"]."') OR
  
  (`member_id` = '".$USER_LOGIN["id"]."'
  AND `member_to` = '".$goMSG['member_to']."'))
  
 
  ORDER BY mod_members_messages.id ASC");
  while ($gm = mysql_fetch_array($get_messages)){
	  
	  
	//  $get_profile_pic = mysql_query("SELECT * FROM ");
	//  $gmc = mysql_fetch_array($get_msg_content);
  
  ?>
  
  
  <div class="col-md-2 col-sm-2">
  
  <div class="profile_img ">
	<img class="" src="files/user_pic/<?php echo $gm['pic']; ?>">
</div>
<a href=",profile,<?php echo $gm['id']; ?>"><?php echo $gm['username']; ?></a>
</div>

<div class="col-md-10 col-sm-10">
<div class="message_div arrow_box <?if($gm['id'] == $USER_LOGIN["id"]){ echo "myMSG"; } else { echo "hisMSG"; }?>">


	
    <?php echo $gm['text']; ?>
	<br><br>
	<b>
	<?php echo $gm['time']; ?>
	</b><br>
	
</div>
</div>
<div style="clear:both;"></div>
<br>

  <?php $i++;
  
  } ?>
  
 
  

  </div>
  

  

<div style="clear:both;margin-bottom:20px;"></div>

  
 

			<div class="message send bottomdivweer" id="data123">
			
			
			
			

			
			<form id="AddMessageUSR" class="AddMessageUSR" data-username="<?php echo $USER_LOGIN["username"]; ?>" data-from="<?php echo $USER_LOGIN["id"]; ?>" data-to="<?php echo $goMSG['member_id']; ?>">
			
			
  <div class="col-md-2 col-sm-2">
  <div class="profile_img">
	<img class="" src="files/user_pic/<?php echo $USER_LOGIN['pic']; ?>">
</div>
<?php echo $USER_LOGIN["username"]; ?>
</div>

<div class="col-md-10 col-sm-10">
<div class="message_div arrow_box <? echo "myMSG"; ?>" style="height:150px;">

<div class="col-md-12" style="padding:0px!important;">
								
								<textarea style="height:100px;width:100%;border:0px;" class="col-md-10 col-xs-8" id="textUSR" name="text" placeholder="תוכן ההודעה"></textarea>
								</div>
		
		
	<div class="col-md-4 col-xs-12 col-sm-12" style="padding:0px!important;float:left;">
	<input class="addcommentbtn" style="width:100%;border:0px;" type="submit" style="cursor:pointer;" value="שלח הודעה" >
								
								</div>

	
</div>
</div>
<div style="clear:both;"></div>
<br>
				<input type="hidden" placeholder="שולח" name="member_id" value="<?php echo $USER_LOGIN["id"]; ?>">
			
			
			
			
				</form>
			
			
			
			
			
			
			
			
			
			
			
			
			

			
				
				

				
			</div>
						
   </div>

  <?php } ?>
  
    <? } ?>

  <div style="clear:both;margin-bottom:20px;"></div>

</div>



<script>
function update_url(url) {
    history.pushState(null, null, url);
}
</script>


<script>
function openCity(evt, cityName) {
	
	
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  
  

  
  
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
	 
	 

      tablinks[i].className = tablinks[i].className.replace(" red", ""); 
  }
  document.getElementById(cityName).style.display = "block";
  


  evt.currentTarget.className += " red";
  
  
}


  
  $(".tablink").click(function(){
    $(".tablink").removeClass("red");
	$(this).addClass("red");
});
  
  
  
</script>
			
			
			
			
<?php
			
	}
	$TEMP_TEMPLATE = 2;
	}
	
?>