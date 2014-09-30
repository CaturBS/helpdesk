<!doctype=html>
<?php 
    $this->load->helper('url');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.jscroll.js');?>"></script>
        <script>
            function convertSpecialChar(text) {
                var textTemp = "";
                for (var i = 0; i < text.length; i++) {
                    if (text.charAt(i) == '?') {
                        textTemp += "%3F";
                    } else if (text.charAt(i) == '!') {
                        textTemp += "%21";
                    } else {
                        textTemp += text.charAt(i);
                    };
                }
                return textTemp;
            }

        </script>
    </head>
    <body>
        <!-- <div id="autoScrollDiv" class="smallText" style="position: absolute; top: 32px;height:1.3em;padding:0.05em;margin-left:1.5em;">
            <input id="autoScroll" name="autoScroll" type="checkbox" checked="true">
            <label for="autoScroll">Scroll otomatis ke pesan terakhir</label>
        </div>-->
        <input id ="chatText" type="text" style="margin-left:1em;margin-top:0.2em;">
		<div id="loading" style="color:#8ac;position: absolute;top:0.2em;left:10px;z-index: 102;" hidden="true">loading</div>
		<button id="chatButton" style="margin-top:0.2em;">send</button>
<?php 
	if ($userLevel == "operator") {
?>
<button id="ticketButton" style="margin-top:0.2em;">+tiket</button>
<script type="text/javascript">
	$("#ticketButton").click(function(){
		 window.open(site_url + "/operator/add_ticket",  "MsgWindow", "dialog=yes, width=475, height=425");
		});
</script>
<?php
};
?>
        <div id="chatContent" class="chatContent" style="margin-top:0.5em;"><?php //echo $userLevel;?></div>


<button id="closeButton" style="
		position: absolute;height: 2em;width: 2em;		
		right: 7px;top:2px;">x</button>
<script>
    var autoScrollID = "autoScroll";
    var chatContentID = "chatContent";
    var chatTextID = "chatText";
    var chatButtonID = "chatButton";
    var closeButtonID = "closeButton";
    var loadingID = "loading";
    var scrollInterval = false;
    var autoScrollChat = false;
    /*$("#" + autoScrollID).attr("disabled", "true");
    setTimeout(function() {
    	$("#" + autoScrollID).removeAttr("disabled", "false");
    },3000);
    var iScroll = $("#" + chatContentID).scrollTop();
    function setAutoScroll(isOn) {
        if (isOn) {
            if (autoScrollChat == false) {
                scrollInterval = setInterval(function(){
                    iScroll += 1000;
                    $("#" + chatContentID).animate({
                        scrollTop: iScroll
                    },1000);                    
                }, 2000);
            }
        } else {
            if (autoScrollChat) {
                clearInterval(scrollInterval);
            }
        };
        autoScrollChat = isOn;
    }
    setAutoScroll(true);
        
    $("#" + autoScrollID).click(function(){
        var checked = $("#"+autoScrollID).is(':checked');
        setAutoScroll(checked);
    });*/
    var url1 = ('<?php echo site_url() . "/chatservices/showChatMessages/" . $room_id . "/" . $userLevel;?>');    
    var interval1 = setInterval(function(){
        $.ajax({
            url:url1
        }).done(function(data) {
            var obj =  JSON.parse(data);
            var textChat = "";
            for (var i = 0; i<obj.length;i++) {
                textChat += "<div class='messageBlock'>";
                textChat += "<div class='messageText'>" + obj[i].sender + ": " + obj[i].message +"</div>";
                textChat += "<div class='messageTime'>" + obj[i].timestamp +"</div>";
                textChat += "</div><br/>";
            };
            $("#" + chatContentID).html(textChat);
            //$("#autoScrollDiv").animate({opacity: 1}, 1000);
            //alert($("#" + chatContentID).height());
        });
    }, 1000);
    
    $("#" + chatButtonID).click(function(){
        $("#" + loadingID).show("fast");
        $.ajax({
            url:"<?php echo site_url() . "/chatservices/insertChatMessages/" . $sender . "/";?>"
                  + convertSpecialChar($("#" + chatTextID).val().toString())
                  + '/<?php echo $room_id . "/" . $userLevel;?>'
        }).done(function(data){
            $("#" + chatTextID).val('');
            $("#" + loadingID).hide("fast");
        });
    });
    $("#" + chatTextID).keypress(function(event){        
		if (event.which == 13) {
			$("#" + loadingID).show("fast");
			$.ajax({
	            url:"<?php echo site_url() . "/chatservices/insertChatMessages/" . $sender . "/";?>"
	                  + convertSpecialChar($("#" + chatTextID).val().toString())
	                  + '/<?php echo $room_id . "/" . $userLevel;?>'
	        }).done(function(data){
	            $("#" + chatTextID).val('');
	            $("#" + loadingID).hide("fast");
	        });
		}
	});
    $("#" + closeButtonID).click(function(){
        clearInterval(interval1);
        $("#chatDialog").hide();
    });
</script>
</body>
</html>