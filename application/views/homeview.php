<script>
	$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/pages/home.css'); ?>" type="text/css" />');
	function redrct(url){
	    var url = site_url + url;
	    $(location).attr('href',url);
	}
</script>
<div>
	Help desk Sistem Keputusan Perencanaan Daerah dan Jaringan WAN Pemerintah Kota Medan
</div>
	<img alt="" src="<?php echo site_url('images/tutorial.png');?>" class="icon tutorialIcon" onclick="redrct('tutorial');">
	<img alt="" src="<?php echo site_url('images/communication.png');?>" class="icon chatIcon" onclick="redrct('komunikasi');">
	