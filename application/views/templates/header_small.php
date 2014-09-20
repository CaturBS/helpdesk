<?php 
    
    setcookie('site_url', site_url());
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
        <script type="text/javascript">
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
        </script>
        </head>
        <body>
        