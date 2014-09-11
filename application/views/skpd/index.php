<ul class='ul-navbar'>
	<li id='li-skpd1'>SKPD 1</li>
	<li id='li-skpd2'>SKPD 2</li>
	<li id='li-skpd3'>SKPD 3</li>
	</ul>
<hr/>
<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/operator.css'); ?>" type="text/css" />');
$("#li-skpd1").click(function(){
    var url = "<?php echo site_url();?>" + "/skpd";
    $(location).attr('href',url);	
});
$("#li-skpd2").click(function(){
    var url = "<?php echo site_url();?>" + "/skpd";
    $(location).attr('href',url);	
});
$("#li-skpd3").click(function(){
    var url = "<?php echo site_url();?>" + "/skpd";
    $(location).attr('href',url);	
});
</script>