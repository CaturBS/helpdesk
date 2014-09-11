<?php 
echo "Halaman chat operator";
?>
<div class="operatorChatBrowser">
<label for="selectOrder">Urutkan berdasar: </label>
<select name="selectOrder">
	<option>Abjad</option>
	<option>Status Online</option>
</select>
<div class="list-users"><div id="list-users" class="ul-users"></div></div>
<div id="operatorChatArea" class="operatorChatArea"><ul id="ul-OpChatArea"></ul></div>
<script type="text/javascript">	
	//$('head').append('<link rel="stylesheet" href="<?php //echo base_url('css/operator.css'); ?>" type="text/css" />');
	var chatDialogID = 0;
	function createChatArea(roomID) {
		var url = 'chatWith\/' + roomID + "\/" + chatDialogID;
		var elementID = "cd_" + chatDialogID;
		var element = $("<li id=\""+elementID+"\"/>");
		chatDialogID++;
		element.prop("class", "operatorChatRoom");
		element.load(url);
		$("#ul-OpChatArea").append(element);
	}
	setInterval(function(){
		$.ajax({
			url:"list_user_service"
		}).done(function(data) {
				var obj = JSON.parse(data);
				$("#list-users").empty();
				for (i in obj) {
					var room_id = obj[i].room_id;
					var element = $("<div class=\"li-users\" onclick=\"createChatArea(\'"+room_id+"\');\"/>");					
					element.html(obj[i].name);	
					var element2 = $("<div/>");
					element2.prop("class", "balloon");
					element.append(element2);
					element2.html(obj[i].unread_messages);
					var element3 = $("<div style='margin-left:2em;'/>");
					if (obj[i].online == "online") {
						element3.prop("class", "dotOnline");
					} else {
						element3.prop("class", "dotOffline");
					};
					element2.append(element3);
					$("#list-users").append(element);
				}
			})
	},1000);	
</script>
</div>