<?php 	
	setcookie('page', $page);
?>
<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/form.css'); ?>" type="text/css" />');
</script>
<form action="" method="post">
	<div>
		<label for="user">Nama user</label>
		<input id="user" name="user" type="text" value="<?php echo $dataForm['user'];?>">
	</div>
	<div>
		<label for="tanggal_buka">Tanggal</label>
		<input id="tanggal_buka" type="text" name="tanggal_buka" value="<?php echo $dataForm['tanggal_buka'];?>">
	</div>
	<div>
		<label for="tanggal_tutup">Tanggal ditutup</label>
		<input id="tanggal_tutup" type="text" name="tanggal_buka" value="<?php echo $dataForm['tanggal_tutup'];?>">
	</div>
	<div>
		<label for="status">Tutup tiket</label>
		<?php 
			if ($dataForm['status'] != "tutup") {			
		?>
		<input id="status-cb" type="checkbox">		
		<input id="status-h" type="hidden" name="status" value="buka">
		<label id="label-status" for="status-cb" style="position: absolute; left:15em;color: #a33;"><b>open</b></label>
		<?php 
		} else {
?>
		<input id="status-cb" type="checkbox" checked="checked">		
		<input id="status-h" type="hidden" name="status" value="tutup">
		<label id="label-status" for="status-cb" style="position: absolute; left:15em;color: #3a3;"><b>closed</b></label>
		<?php 
		};
		?>		
	</div>
	<div>
		<label for="organisasi">Organisasi</label>
		<input id="organisasi" type="text" name="organisasi">
	</div>
	<div>
		<input type="hidden" name="create-update" value="<?php echo $create_update;?>">
		<input type="submit" value="update">
	</div>
</form>
<script>
	$("#tanggal_buka").datepicker({dateFormat: "yy-mm-dd"});
	$("#tanggal_tutup").datepicker({dateFormat: "yy-mm-dd"});
	var currentTime = new Date();
	var month = (currentTime.getMonth() + 1).toString();
	if (month.length == 1) {
		month = "0" + month;
	};
	var day = currentTime.getDate();
	var year = currentTime.getFullYear();
	$("#status-cb").click(function(){
		$("#status-h").val($("#status-cb").is(":checked")?"tutup":"buka");
		if ($("#status-cb").is(":checked")) {
			$("#tanggal_tutup").val(year + "-" + month + "-" + day);
			$("#label-status").html("<b>closed</b>");
			$("#label-status").css("color", "#3a3");
		} else {
			$("#tanggal_tutup").val("");
			$("#label-status").html("<b>open</b>");
			$("#label-status").css("color", "#a33");
		}
	});
	$.ajax({
		url: site_url + "/operator/list_organisasi_service"
	}).done(
		function(output) {
			var obj = JSON.parse(output);
			$("#organisasi").autocomplete({
				source: obj
			});
		}
	);
		
</script>
<?php
?>