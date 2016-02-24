<?php
setcookie('room_id', $room_id);
?>
<style>
.operatorChatRoom {
	border: 1px solid teal;
	width:14.25em;
	height: 17em;
	margin:0.25em;
	margin-left:0.75em;
	position: relative;
	overflow: auto;
}

.op_chat_content {
	position: absolute;
	top: 3em;
	bottom: 0.2em;
	overflow: auto;
	width:97.5%;
}

.msgBlock {
	margin-top: 0.25em;
}
.msgTime {
	font-size: 0.75em;
}
.chatTittle {
	width:100%;
	background-color: #9ce;
	height: 1.75em;
}
</style>
<div class="chatTittle"><?php echo $user;?></div>
<div id="close_button_<?php echo $chat_id;?>" class="closeButton">x</div>
<input id="text_chat_<?php echo $chat_id;?>" type="text" style="margin: 0.2em;">
<button id="chatButton_<?php echo $chat_id;?>">kirim</button>
<div id="op_chat_content_<?php echo $chat_id;?>" class="op_chat_content"></div>
<script>
	function setEnvironment() {		
	    var url1 = ('<?php echo site_url() . "chatservices/showChatMessages/" . $room_id . "/operator";?>');
		var interval = setInterval(function(){
			$.ajax({
				url:url1
			}).done(function(data){
				var obj = JSON.parse(data);
				$("#op_chat_content_<?php echo $chat_id;?>").html("");
				for (i in obj) {					 
					var msg = $('<div class="msgBlock"></div>');
					msg.html(obj[i]['sender'] + ': ' + obj[i]['message']);
					var msgTime = $('<div class="msgTime"></div>');
					msgTime.html(obj[i]['timestamp']);
					msg.append(msgTime);
					$("#op_chat_content_<?php echo $chat_id;?>").append(msg);
				}				
			});
			$.ajax({
				url:('<?php echo site_url() . "chatservices/updateReadMessageTime/" . $room_id . "/operator";?>')
				}).done(function(data){});
		}, 1000);
		$("#close_button_<?php echo $chat_id;?>").click(function(){
			clearInterval(interval);
			$("#cd_<?php echo $chat_id;?>").remove();
		});
		$("#chatButton_<?php echo $chat_id;?>").click(function(){
			$.ajax({
				url: site_url+"operator/insertChatMessages"+"\/<?php echo $room_id;?>"+
					"\/<?php echo $username;?>\/"+$("#text_chat_<?php echo $chat_id;?>").val()
				}).done(function(data){
					$("#text_chat_<?php echo $chat_id;?>").val("");
					});
		});
	}
	setEnvironment();

</script>