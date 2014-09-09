<div id="chat_dialog"></div>
<?php  
    if ($userlevel == "user") {?>
    <div id="mainChat" class="mainChatBox">
        <div class="wrapper">
            <b>Operator</b>
            <div id="admin-status" class="wrapper"></div>
        </div>
    </div>
    <script>
        $("#chat_dialog").dialog({
            autoOpen: false,
            width: 350,
            height: 500,
            modal: true,
            open: function() {
            }
        });
        function chatWith(operator) { 
            $("#chat_dialog").load('<?php echo site_url() . "/chatBox/chatWithOperator/";?>' +
                    operator);
            $("#chat_dialog").dialog({
                title: operator
            });
            $("#chat_dialog").dialog("open");
        }
        setInterval(function(){
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/showOperators/";?>'
            }).done(function(output){                
                var obj =  JSON.parse(output);
                var text = "<ul>";
                for (i in obj) {
                    text +="<li>" + obj[i].name+ "&nbsp;";
                    if (obj[i].last_activity_diff < 180) {
                        text += "<button onclick='chatWith(\"" + obj[i].name+ "\")'><b>ONLINE</b></button>";
                    } else {
                        text += "<button onclick='chatWith(\"" + obj[i].name+ "\")'>OFFLINE</button>";
                    };
                    text += "</li>";
                };
                text += "</ul>";
                $("#admin-status").html(text);
            });
        },1000);
    </script>

    <?php
    } else if ($userlevel == "operator") {?>
    <div id="mainChat" class="mainChatBox">
        <div class="wrapper">
            <b>Daftar User</b>
            <div id="admin-status" class="wrapper"></div>
        </div>
    </div>
    <script>
        $("#chat_dialog").dialog({
            autoOpen: false,
            width: 350,
            height: 500,
            modal: true,
            show:  {
                effect: "blind",
                duration: 1000
            },
            hide:  {
                effect: "blind",
                duration: 1000
            },
        });
        function chatWith(user) { 
            $("#chat_dialog").load('<?php echo site_url() . "/chatBox/chatWithUser/";?>' +
                    user);
            $("#chat_dialog").dialog({
                title: user
            });
            $("#chat_dialog").dialog("open");
        }
        
        function listUser() {
            
        }
        
        function searchUser() {
            
        }
        
        setInterval(function(){
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/showUsers/" . $username;?>'
            }).done(function(output){           
                var obj =  JSON.parse(output);
                var text = "<ul>";
                for (i in obj) {
                    text +="<li>" + obj[i].user+ "&nbsp;";
                    if (obj[i].last_activity_diff < 180) {
                        text += "<button onclick='chatWith(\"" + obj[i].user+ "\")'><b>chat</b></button>&nbsp;"+obj[i].last_activity_diff+" detik";
                    } else {
                        text += "<button onclick='chatWith(\"" + obj[i].user+ "\")'>chat</button>&nbsp;> 3 menit";
                    };
                    text += "</li>";
                };
                text += "</ul>";
                $("#admin-status").html(text);
            });
        }, 1000);
    </script>
    
    <?php
        
    }
    ?>