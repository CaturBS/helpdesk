<?php
echo $user;
setcookie('room_id', $room_id);
?>
<style>
.operatorChatRoom {
	border: 1px solid teal;
	width:13.5em;
	height: 17em;
	margin:0.4em;
	position: relative;
	overflow: auto;
}

.op_chat_content {
	position: absolute;
	top: 2.75em;
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
</style>
<div id="close_button_<?php echo $chat_id;?>" class="closeButton">x</div>
<input id="text_chat_<?php echo $chat_id;?>" type="text" style="margin: 0.2em;">
<div id="op_chat_content_<?php echo $chat_id;?>" class="op_chat_content"></div>
<script>
	function setEnvironment() {		
		var interval = setInterval(function(){
			$.ajax({
				url:"showChat/<?php echo $room_id?>"
			}).done(function(data){
				var obj = JSON.parse(data);
				var ocn = {"id":"297","timestamp":"2014-09-18 02:28:00","sender":"operator_2","message":"halo","id_chat_room":"14"};
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
		}, 1000);
		$("#close_button_<?php echo $chat_id;?>").click(function(){
			clearInterval(interval);
			$("#cd_<?php echo $chat_id;?>").remove();
		});
	}
	setEnvironment();

</script>