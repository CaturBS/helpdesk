<?php
echo $room_id;
setcookie('room_id', $room_id);
?>
<div id="close_button_<?php echo $chat_id;?>" class="closeButton">x</div>
<div id="op_chat_content_<?php echo $chat_id;?>" class="op_chat_content"></div>
<script>
	function setEnvironment() {		
		var interval = setInterval(function(){
			$.ajax({
				url:"showChat/<?php echo $room_id?>"
			}).done(function(data){
				$("#op_chat_content_<?php echo $chat_id;?>").html(data);
			});
		}, 1000);
		$("#close_button_<?php echo $chat_id;?>").click(function(){
			clearInterval(interval);
			$("#cd_<?php echo $chat_id;?>").remove();
		});
	}
	setEnvironment();

</script>