<?php 
    $this->load->helper('url');
    $this->load->helper('cookie');
    $cookie = array(
    	'userName'=>$username,
    	'userLevel'=>$userlevel,
    	'site_url'=>site_url(),
    	'base_url'=>base_url()
    );
    $this->input->set_cookie('userName', $username);
    $this->input->set_cookie('userLevel', $userlevel);
    $this->input->set_cookie('site_url', site_url());
    $this->input->set_cookie('base_url', base_url());
    
    function navigasiBar() {
    	
    }
?>
<!doctype=html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/anim.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/chat.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('js/jquery-ui-1.11.1/jquery-ui.min.css'); ?>"/>
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery-ui-1.11.1/jquery-ui.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.flot.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.flot.pie.min.js');?>"></script>
        <script src="<?php echo base_url('js/jquery.printElement.min.js');?>"></script>
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

	    	var site_url = "<?php echo site_url();?>";//getCookie('site_url').replace(/%3A/g, ":").replace(/%2F/g, "\/");
	    	var base_url = "<?php echo base_url();?>";//getCookie('base_url').replace(/%3A/g, ":").replace(/%2F/g, "\/");

            function navTo() {
                //
            }
            $(document).ready(function(){
                $( "#home_button" ).click(function(){
                    var url = site_url + "home";
                    $(location).attr('href',url);
                });
                $( "#tutorialButton" ).click(function(){
                    var url = site_url + "tutorial";
                    $(location).attr('href',url);
                });
                $( "#operator_button" ).click(function(){
                    var url = site_url + "operator";
                    $(location).attr('href',url);
                });
                $( "#komunikasi_button" ).click(function(){
                    var url = site_url + "komunikasi";
                    $(location).attr('href',url);
                });
	    		var skpdHover = false;
	    		var skpdHoverActive = false;
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
				
				$('#content-content').click(function(evt){
					$("#loginForm").slideup('fast');
				});
            });
        </script>
        <title><?php echo $title;?></title>
    </head>
    <body>
            <div class="header">
            	<div class="header-top">
	            	<span><img alt="" src="<?php echo site_url('images/logo.png');?>" style="width: 3em;height: 3em;left:8em;position: absolute;"/></span>
	            	<div style="position: absolute; left:0;font-family: 'Lobster', cursive;font-size: 1.3em;left:10em;top:0;">
	            		Help Desk SKPD
	            	</div>
	                <div style="position: absolute;right: 120px;top: 0;width: 12em;">
	                	<div class="smallText">
	                    <?php
	                        echo '<b>' . $username;
	                        echo '</b><br/><b> (' . $userlevel . ')</b>';?>
                        
	                    	<ul>
	                    		<li>
	                    			<img alt="" id="userButton" alt="" src="<?php echo site_url('images/dropdown.png');?>" class="smallIcon" style="cursor:pointer;">
	                    			<ul id="loginForm" hidden="true" class="loginBox">
	                    				<li><?php echo '<a href="' . site_url() . 'home/">profil</a>';?></li>
	                    				<li>
		                    				<?php 
						                        if ($userlevel == "guest") {
						                            echo '<a href="' . site_url() . 'home/login">login</a>';
						                        } else {
						                            echo '<a href="' . site_url() . 'home/logout">logout</a>';
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
						                    ?>
	                    				</li>
	                    			</ul>
	                    		</li>
	                    	</ul>											
	                    </div>		                    	
	                    <script type="text/javascript">
	                    	var userSlideDown = false;
							$("#userButton").click(function(evt){
								if (userSlideDown) {
									$("#loginForm").slideUp('fast');
								} else {
									$("#loginForm").slideDown('fast');
								};
								userSlideDown = !userSlideDown;																						
							});
	                    </script>
	                </div>
                </div>
                <div class="nav-bar">
                    <ul>
                    <?php 
                    if ($userlevel == 'member' || $userlevel == 'guest') {
                    ?>
                    <li id="home_button" class="<?php echo ($page == "index"? "nav-button-selected":"nav-button");?>">Home</li>
                    <?php };?>
                    <li id="tutorialButton" class="<?php echo ($page == "tutorial"? "nav-button-selected":"nav-button");?>">Tutorial</li>
                    <li id="komunikasi_button" class="<?php echo ($page == "komunikasi"? "nav-button-selected":"nav-button");?>" style="width:8em;">Hubungi Kami 
                    </li>
                    <li id="faq_button" class="<?php echo ($page == "faq"? "nav-button-selected":"nav-button");?>" style="width:8em;">FAQ 
                    </li>
                </div>
            </div>
        <div id="content" class="content">
            <div class="content-content">                
					<script type="text/javascript">
						//$("#skpd-navbar").position({left:$("#SKPD_button").position().left + 200});
			    	</script>