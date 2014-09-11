<?php
if ($dataLogin != NULL) {
    if ($dataLogin['success']) {
        echo 'Login sukses<br/>redirect...';
        ?>
        <script>
        	var element = $('<div class="loginFlash"/>');
        	var text = "Selamat datang, " + getCookie("userName") + 
        	"<br/>Anda login sebagai " + getCookie("userLevel");
        	element.html(text);
        	$('body').append(element);
        	element.animate({
            	left: "13em"
            	}, 800, function() {
                	setTimeout(function(){
                    	element.fadeOut(500, function(){
                        	element.remove();
                        	setTimeout(function(){
                                var url = "<?php echo site_url($prevPage);?>";
                                $(location).attr('href',url);
                            	},1500);
                        	});
                    	},1500);
            	});
        </script>
        <?php         
    } else {
        echo 'login gagal <br/>';
        ?>
        
<form class="loginForm" method="post" action="<?php echo site_url('home/login') . "/" . $prevPage?>">
    <input type="text" id="username" name="username" value='' placeholder="Nama User"><br/>
    <input type="password" id="password" name="password" value='' placeholder="Password"><br/>
    <input type="submit" value="Login">
</form>
        <?php 
    };
} else {
?>
<form class="loginForm" method="post" action="<?php echo site_url('home/login') . "/" . $prevPage?>">
    <input type="text" id="username" name="username" value='' placeholder="Nama User"><br/>
    <input type="password" id="password" name="password" value='' placeholder="Password"><br/>
    <input type="submit" value="Login">
</form>

<?php } ?>
<script type="text/javascript">
    $("#username").value('');
    $("#password").value('');
</script>