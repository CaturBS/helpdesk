<?php 		
	$this->load->helper("url");
	if ($postSent == FALSE) {
?>
<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/form.css'); ?>" type="text/css" />');
$("#right-explorer-tmp").remove();
</script>
<h2>Tiket Baru</h2>
<form method="post" action="<?php echo site_url("operator/add_ticket/");?>">
	<div>
		<label for="user">Nama user</label>
		<input id="user" name="user" type="text" placeholder="Nama User">
	</div>
	<div>
		<label for="tanggal_buka">Tanggal</label>
		<input id="tanggal_buka" type="text" name="tanggal_buka" placeholder="Tanggal Pembukaan Tiket">
	</div>
	<div>
		<label for="tanggal_tutup">Tanggal ditutup</label>
		<input id="tanggal_tutup" type="text" name="tanggal_tutup" placeholder="Tanggal Penutupan Tiket">
	</div>
	<div>		
		<label for="status">Tutup tiket</label>
		<input id="status-cb" type="checkbox">		
		<input id="status-h" type="hidden" name="status" value="buka">
		<label id="label-status" for="status-cb" style="position: absolute; left:15em;color: #a33;"><b>buka</b></label>
	</div>
	<div>
		<label for="instansi">Instansi</label>
		<input id="instansi" type="text" name="instansi"  placeholder="Instansi">
	</div>
	<div>
		<label for="jenis_kasus">Jenis Kasus</label>
		<input id="jenis_kasus" type="text" name="jenis_kasus" placeholder="Jenis Kasus">
	</div>
	<div>
		<label for="level_penanganan">Level Penanganan</label>
		<input id="level_penanganan" type="text" name="level_penanganan" placeholder="Level Penanganan">
	</div>
	<div>
		<label for="deskripsi">Deskripsi</label>
		<input id="deskripsi" type="textarea" row="3" column="25" name="deskripsi"  placeholder="Deskripsi">
	</div>
	<br/>
	<div>		
		<input type="submit" name="submit" value="kirim">
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
	
	function populateAutoComplete(serv, elId) {
		$.ajax({
			url: site_url + "operator/" + serv
		}).done(
			function(output) {
				var obj = JSON.parse(output);
				$("#" + elId).autocomplete({
					source: obj
				});
			}
		);
	}

	populateAutoComplete("list_instansi_service", "instansi");
	populateAutoComplete("list_jenis_kasus_service", "jenis_kasus");
	populateAutoComplete("list_level_penanganan_service", "level_penanganan");
		
</script>
<?php 
	} else {
	echo "Data ditambahkan... Redirect ke update ticket<br/>";
	?>
<div id="loadingProg"></div>
<script type="text/javascript">
	var text = ".";
	setInterval(function(){
		if (text.length < 5) {
			text += ".";
		} else {
			text ="";
		};
		$("#loadingProg").text(text);
		},1000);	
</script>	
	<?php
}
?>