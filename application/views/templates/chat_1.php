<?php  
    if ($userlevel == "user") {?>
    <div id="chatBox" class="chatBox">
        <div id="chatBoxDragger" class="chatBoxDragger"></div>
        <div  id="contentLoader" style="position: absolute;top: 55px;left: 20px;z-index: 101;background-color: white;width: 200px;height: 50px;">             
            <div style="margin: 30px;">
                <div style="position: absolute;left: 50px;z-index: 102;">Load .... </div>
                <div id="warningGradientOuterBarG">
                <div id="warningGradientFrontBarG" class="warningGradientAnimationG">
                    <?php
                        for ($i = 0; $i <6; $i++) {
                            echo '<div class="warningGradientBarLineG"></div>';
                        };
                    ?>                    
                </div>
                </div>
            </div>
        </div>
        <div id="chatContent" class="chatContent" hidden="true">      
            
        </div>
        <div id="form-chat" class="form-chat" hidden="true">
            <input type="text" id="chatText">
            <button id="chatButton">send</button>
            <button id="exitChat">exit</button>
        </div>
        <div id="admin-status" class="chatContent">
            <b>Operator yang sedang online</b>
        </div>
    </div>
    <script>
        $("#chatBox").draggable({
            handle: "#chatBoxDragger",
            stop: function(event, ui) {
                var docHeight = $(document).height();
                var docWidth = $(document).width();
                var uiTop = ui.position.top;
                var uiLeft = ui.position.left;
                if (uiTop + 320 > docHeight) {
                    $("#chatBox").animate({top: (docHeight - 320) + "px"});
                }else if (uiTop < 0) {
                    $("#chatBox").animate({top: "10px"});
                };
                if (uiLeft + 270 > docWidth) {
                    $("#chatBox").animate({left: (docWidth - 270) + "px"});
                } else if (uiLeft < 0) {
                    $("#chatBox").animate({left: "10px"});
                }
                //$("#chatBoxDragger").text("Chat");
            }
        });
        var operator_chat = "";
        var room_id = -1;
        $("#exitChat").click(function(){
            $("#admin-status").fadeIn('slow');
            $("#chatContent").fadeOut('slow');
            $("#form-chat").fadeOut('slow');
            $("#chatBoxDragger").text("");
            $("#contentLoader").show();
        });
        var chatDialogId = 0;
        function showChatRoom(operator) {            
            var operator_chat = operator;
            //$("#admin-status").fadeOut('slow');
            //$("#chatContent").fadeIn('slow');
            //$("#form-chat").fadeIn('slow');
            //$("#contentLoader").show();
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/startRoomAsUser/";?>' + operator_chat
            }).done(function(data) {
                //$("#contentLoader").hide();
                var obj =  JSON.parse(data);
                //$("#chatBoxDragger").text("chat dengan: " + obj.admin);
                room_id = obj.id;
                var dynamicDialog = $('<div id="ChDialog_'+chatDialogId+'">\
                <div id="ChatContent_'+chatDialogId+'" class="chatContent" >Chat '+obj.id+'</P>\
                </div>');
                chatDialogId++;
                dynamicDialog.dialog({ 
                    title: operator,
                    modal: true,
                    height: 400,
                    open: function() {
                        $.ajax({
                            url:'<?php echo site_url() . "/chatBox";?>'
                        }).done(function(data){                            
                            alert("#ChatContent_"+chatDialogId);
                            $("#ChatContent_"+chatDialogId).text("data");
                        });                        
                    }
                });
            });
        }
        
        function callChatDialog(operator) {
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/createChatDialog/";?>' + operator_chat
            }).done(function(data){
                var obj = JSON.parse(data);
                $("#content").append(obj.content);                
            });
        }

        $("#chatButton").click(function(){
            $.ajax({
                url:"<?php echo site_url() . "/chatservices/insertChatMessages/" . $username . "/";?>" +
                        + ' ' + $("#chatText").val().toString() + '/' + room_id
            });  
        });
        var connectedAdmin = "";
        setInterval(function(){                
            if (($("#admin-status").is(':visible'))) {
                $.ajax({
                    url:'<?php echo site_url() . "/chatservices/showoperators";?>'
                }).done(function(data) {
                    $("#contentLoader").hide();
                    var obj =  JSON.parse(data);
                    var text = "<b>Operator yang sedang online</b><br/><ul>";
                    for(var i in obj) {
                        text = text + "<li style='margin:3px;'>" +
                                "&nbsp;<button onclick=\"showChatRoom(\'" +
                                obj[i].name+
                                "\');\">" + obj[i].name + "</button></li>";                            
                    };
                    text = text + "</ul>";
                    if (obj.length == 0) {
                        text += "Tidak ada operator yang online";
                    }
                    $("#admin-status").html(text);
                });
            } else {
                $.ajax({
                    url:'<?php echo site_url() . "/chatservices/showChatMessages/";?>' + room_id
                }).done(function(data) {
                    $("#contentLoader").hide();
                    var obj =  JSON.parse(data);
                    var textChat = "";
                    for (var i = 0; i<obj.length;i++) {
                        textChat = textChat + obj[i].sender + ": " + obj[i].message +"<br/>";
                    };
                    $("#chatContent").html(textChat);
                });
            };
        }, 3000);
    </script>

    <?php
    } else if ($userlevel == "operator") {
        ?>
    <div id="operatorChatBox" class="operatorChatBox">
        <div id="chatBoxDragger" class="chatBoxDragger"></div>
        <div id="operatorChatBoxContent" class="operatorChatBoxContent">
            Daftar user chat....
            
        </div>
    </div>
    <script>
        
        $("#operatorChatBox").draggable({
            handle: "#chatBoxDragger",
            stop: function(event, ui) {
                var docHeight = $(document).height();
                var docWidth = $(document).width();
                var uiTop = ui.position.top;
                var uiLeft = ui.position.left;
                if (uiTop + 320 > docHeight) {
                    $("#operatorChatBox").animate({top: (docHeight - 320) + "px"});
                }else if (uiTop < 0) {
                    $("#operatorChatBox").animate({top: "10px"});
                };
                if (uiLeft + 270 > docWidth) {
                    $("#operatorChatBox").animate({left: (docWidth - 270) + "px"});
                } else if (uiLeft < 0) {
                    $("#operatorChatBox").animate({left: "10px"});
                }
                //$("#chatBoxDragger").text("Chat");
            }
        });
        
        setInterval(function (){
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/showUsersInChat/" . $username;?>'
            }).done(function(data) {
                var obj = JSON.parse(data);
                var text = "Daftar User yang sedang chat dengan anda...";
                if (obj.length > 0) {
                    text += "<ul>"
                    for(var i in obj) {
                        text = text + "<li style='margin:3px;'>" +
                                "&nbsp;<button>" + obj[i].user + "</button></li>";                            
                    };
                    text = text + "</ul>";
                } else {
                    text += "<br/><br/>Tidak ada user yang sedang chat dengan anda.."
                }
                $("#operatorChatBoxContent").html(text);
            });
        }, 2000);
    </script>
    <?php
    }
    ?>