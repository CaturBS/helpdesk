<!doctype=html>
<?php 
    $this->load->helper('url');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
<div id="chatContent_<?php echo $room_id;?>" class="chatContent"><?php //echo $room_id;?></div>
<input id ="chatText_<?php echo $room_id;?>" type="text">
<button id="chatButton_<?php echo $room_id;?>">send</button>
<script>
    var url = ('<?php echo site_url() . "/chatservices/showChatMessages/" . $room_id;?>');
    var interval1 = setInterval(function(){
        $.ajax({
            url:url
        }).done(function(data) {
            var obj =  JSON.parse(data);
            var textChat = "";
            for (var i = 0; i<obj.length;i++) {
                textChat += "<div class='messageBlock'>";
                textChat += "<div class='messageText'>" + obj[i].sender + ": " + obj[i].message +"</div>";
                textChat += "<div class='messageTime'>" + obj[i].timestamp +"</div>";
                textChat += "</div><br/>";
            };
            $("#chatContent_<?php echo $room_id;?>").html(textChat);
        });
    }, 1000);
    var chatIntervalLength = chatInterval.length;
    chatInterval[chatIntervalLength] = interval1;
    $("#chatButton_<?php echo $room_id;?>").click(function(){
        $.ajax({
            url:"<?php echo site_url() . "/chatservices/insertChatMessages/" . $sender . "/";?>"
                  + $("#chatText_<?php echo $room_id;?>").val().toString() + '/' + <?php echo $room_id;?>
        }).done(function(data){
            $("#chatText_<?php echo $room_id;?>").val('');
        });  
    });
</script>
</body>
</html>