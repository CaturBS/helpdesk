<?php
	echo "<ul class='ul-navbar'>";
	echo "<li id='li-chat'>Chat</li>";
	echo "<li id='li-sms'>SMS</li>";
	echo "<li id='li-skpd'>Indeks Permasalahan</li>";
	echo "</ul>";
?>
<br/>
<hr/>
<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/operator.css'); ?>" type="text/css" />');
$("#li-chat").click(function(){
    var url = "<?php echo site_url();?>" + "operator/chat";
    $(location).attr('href',url);	
});
$("#li-sms").click(function(){
    var url = "<?php echo site_url();?>" + "operator/sms";
    $(location).attr('href',url);	
});
$("#li-skpd").click(function(){
    var url = "<?php echo site_url();?>" + "operator/ticket";
    $(location).attr('href',url);	
});
</script>