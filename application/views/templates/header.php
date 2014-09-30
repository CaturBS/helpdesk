<?php 
    $this->load->helper('url');
    setcookie('userName', $username);
    setcookie('userLevel', $userlevel);
    setcookie('site_url', site_url());
    setcookie('base_url', base_url());
?>
<!doctype=html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/anim.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/chat.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('js/jquery-ui-1.11.1/jquery-ui.min.css'); ?>"/>
        <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery-ui-1.11.1/jquery-ui.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.flot.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.flot.pie.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/interval-management.js'); ?>"></script>
        <script>
	        function getCookie(cname) {
	            var name = cname + "=";
	            var ca = document.cookie.split(';');
	            for(var i=0; i<ca.length; i++) {
	                var c = ca[i];
	                while (c.charAt(0)==' ') c = c.substring(1);
	                if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
	            }
	            return "";
	        }

	    	var site_url = getCookie('site_url').replace(/%3A/g, ":").replace(/%2F/g, "\/");
	    	var base_url = getCookie('base_url').replace(/%3A/g, ":").replace(/%2F/g, "\/");
	    	var userName = getCookie('userName');
	    	
            $(document).ready(function(){
                $( "#home_button" ).click(function(){
                    var url = site_url + "/home";
                    $(location).attr('href',url);
                });
                $( "#SKPD_button" ).click(function(){
                    var url = site_url + "/home/skpd";
                    $(location).attr('href',url);
                });
                $( "#operator_button" ).click(function(){
                    var url = site_url + "/operator";
                    $(location).attr('href',url);
                });
	    		var skpdHover = false;
	    		setInterval(function(){
		    		if (skpdHover) {
		    			$("#skpd-navbar").slideDown();
		    		} else {
		    			$("#skpd-navbar").slideUp();
		    		};      
                },500);
				$("#SKPD_button").hover(function() {
					skpdHover = true;
				}, function(){
					skpdHover = false;
				});
				$("#skpd-navbar").hover(function() {
					skpdHover = true;
				}, function(){
					skpdHover = false;
				});
            });
        </script>
        <title><?php echo $title;?></title>
    </head>
    <body>    	
    <?php if ($userlevel == "operator") {?>
	    	<div id="addTicketWrapper" 
		    		style="position:absolute;left:1.5em;top: 15.5em;z-index: 201;
		    		background-color: white;border: 1px solid #8ac;
		    		box-shadow: 0.25em 0.25em 0.25em #666;
		    		border-radius:0.25em;
	    		">
	    		<div id="addTicketDragger" style="background-color: #ace;height: 1.25em;cursor: move;"></div>
	    		<button id="addTicket" style="margin: 0.5em;">Add Ticket</button>    		
	    	</div>
	    	<script>
		    	$("#addTicket").click(function(){
		    		window.open(site_url + "/operator/add_ticket",  "MsgWindow", "dialog=yes, width=475, height=425");
	    		});
	    		$("#addTicketWrapper").draggable();
	    	</script><?php };?>
        <div id="content" class="content">
            <div class="header">
                <div style="position: absolute;right: 50px;top: 0;">
                    <?php
                    	echo '<div class="smallText">';
                        echo 'Welcome <b>' . $username;
                        echo '</b>, You have privileged as <b>' . $userlevel . '</b><br/>';
                        if ($userlevel == "guest") {
                            echo '<a href="' . site_url() . '/home/login">login</a>';
                        } else {
                            echo '<a href="' . site_url() . '/home/logout">logout</a>';
                            ?>
                    <script>	            
                    	var url = "<?php echo site_url("chatservices/updateLoginTime") . "/" . $username?>";                    	
                        setInterval(function(){ 
                            $.ajax({
                                url:url
                            });                            
                        },3000);
                    </script>  
                    <?php
                        };
                        echo "</div>";
                    ?>
                </div>
                <div class="nav-bar">
                    <?php
                        if ($page == "index") {
                            //
                        }
                    ?>
                    <div id="home_button" class="<?php echo ($page == "index"? "nav-button-selected":"nav-button");?>">Home</div>
                    <div id="SKPD_button" class="<?php echo ($page == "SKPD"? "nav-button-selected":"nav-button");?>" style="width:8em;">Layanan SKPD</div>
                    <div class="nav-button">FAQ</div>
                    <?php                        
                        if ($userlevel == "operator") {
                            ?>
                                <div  id="operator_button" class="<?php echo ($page == "operator"? "nav-button-selected":"nav-button");?>">Operator</div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="content-content">
                <div id="skpd-navbar" class="navbar2" hidden="true" style="width:11.6em;">
			    	<ul style="display: inline;">
			    	<?php 
			    		echo "<li class='navbar2-block'>" . anchor("", "Pendahuluan SKPD") . "</li>";
			    		echo "<li class='navbar2-block'>" . anchor("", "Dasar Teori SKPD") . "</li>";
			    		echo "<li class='navbar2-block'>" . anchor("", "Penutup SKPD") . "</li>";
			    	?>
			    	</ul>
		    	</div>
					<script type="text/javascript">
						//$("#skpd-navbar").position({left:$("#SKPD_button").position().left + 200});
			    	</script>