<div id="chatDialog" class="chatDialog" hidden="true">
    <div id="chatDialogDragger" class="chatDialogDragger"></div>
    <div id="chatDialogContent"></div>
</div>
<script>
	function createChatDialog(url) {
		$("#chatDialogContent").load(url);
		$("#chatDialog").show();
	}
</script>
<?php
    if ($userlevel == "user") {?>
    <div id="mainChat" class="mainChatBox">
        <div class="chatDialogDragger">
            Operator
            <button id="min-button" class="min-button" style="position: absolute;right: 10px;top:5px;">-</button>
        </div>
        <div id="wrapper" class="wrapper">
            <div id="admin-status" class="wrapper"></div>
        </div>
    </div>
    <script>
	    $("#min-button").click(function(){
	        if($("#min-button").text() == "-") {
	            $("#mainChat").animate({height:"35px"});
	            $("#min-button").text("+");
	            $("#wrapper").hide();
	        } else {
	            $("#mainChat").animate({height:"300px"});
	            $("#min-button").text("-");
	            $("#wrapper").show();
	        }
	    });
        function chatWith(operator) { 
            var url = '<?php echo site_url() . "/chatBox/chatWithOperator/";?>' + operator + "/";
            //url = "http://localhost";
        	createChatDialog(url);
            /* $("#chatDialogContent").load('<?php// echo site_url() . "/chatBox/chatWithOperator/";?>' +
                    operator);
            $("#chatDialog").show();*/
        }
        setInterval(function(){
            $.ajax({
                url:'<?php echo site_url() . "/chatservices/showOperators/";?>'
            }).done(function(output){                                
                var obj =  JSON.parse(output);
                var text = "";
                for (i in obj) {
                    var classDot = "dotOffline";
                    if (obj[i].last_login_diff < 4) {
						classDot = "dotOnline";
                    };                    
                    text +="<div class='smallBox' onclick='chatWith(\"" + obj[i].name+ "\");'><b>" + obj[i].name+ "</b>&nbsp;";
                    text += "<div class=\""+ classDot+"\"></div>";
                    text += "<div class=\"balloon\"><div class=\"arrow\"></div><b>" + obj[i].unread_message+"</b></div>";                    
                    text += "</div>";
                };
                $("#admin-status").html(text);
            });
        },1000);
    </script>

    <?php
    } else if ($userlevel == "operator") {?>
    <div id="mainChat" class="mainChatBox">
        <div class="chatDialogDragger">
            Daftar User
            <button id="min-button" class="min-button" style="position: absolute;right: 10px;top:5px;">-</button>
        </div>
        <div class="wrapper">
            <div id="admin-status"></div>
        </div>
    </div>
    <script>
        $("#min-button").click(function(){
            if($("#min-button").text() == "-") {
                $("#mainChat").animate({height:"35px"});
                $("#min-button").text("+");
                $("#wrapper").hide();
            } else {
                $("#mainChat").animate({height:"300px"});
                $("#min-button").text("-");
                $("#wrapper").show();
            }
        });
        function chatWith(user) { 
            var url = '<?php echo site_url() . "/chatBox/chatWithUser/";?>' + user;
        	createChatDialog(url);
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
                var text = "";
                for (i in obj) {
                    var classDot = "dotOffline";
                    if (obj[i].last_login_diff < 4) {
						classDot = "dotOnline";
                    };
                    text +="<div class='smallBox' onclick='chatWith(\"" + obj[i].user+"\")'><b>" + obj[i].user+ "</b>&nbsp;";
                    text +="<div class='"+ classDot+"'></div>";
                    text += "<div class='balloon'><div class='arrow'></div><b>" + obj[i].unread_message+"</b></div>";                    
                    text += "</div>";
                };
                $("#admin-status").html(text);
            });
        }, 1000);
    </script>
    
    <?php
        
    }
    ?>