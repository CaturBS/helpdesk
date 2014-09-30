<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/ticket.css'); ?>" type="text/css" />');
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/report-ticket.css'); ?>" type="text/css" />');
</script>
<div class="left-explorer">
	<ul>
		<li id="manaj-ticket-li">Manajemen Tiket</li>
		<li id="rekap-ticket-li">Rekap Tiket</li>
		<li id="addTicket-li">Tambah Tiket</li>
	</ul>
</div>
<script>
	$("#manaj-ticket-li").click(function(){
        var url = site_url + "/operator/ticket/manage";
        $(location).attr('href',url);
    });
	$("#rekap-ticket-li").click(function(){
        var url = site_url + "/operator/rekap_ticket";
        $(location).attr('href',url);
    });
	$("#addTicket-li").click(function(){
        var url = site_url + "/operator/ticket/add";
        $(location).attr('href',url);
    });
</script>

<div class="right-explorer">
	<ul class="pie-box">
		<li id="pieInstansi" class="pie-selected">Instansi</li>
		<li id="pieJenisKasus" class="pie-unselected">Jenis Kasus</li>
		<li id="pieLevelPenanganan" class="pie-unselected">Level Penanganan</li>
		<li id="label-pie" class="label-pie">Instansi</li>
	</ul>
	<div id="placeHolder" style="left:1em;top:4em;width: 50em;height:25em;border:1px solid #ccd;font-size:0.9em;padding:0.2em;">
	</div>
	<img id="imgLoading" alt="" src="<?php echo base_url("images/ajax_loader_blue_128.gif")?>" style="position: absolute;top:10em;left: 10em;">
</div>

<script type="text/javascript">
function setSelectedPie(pieId){
	$("#" + pieId).removeClass("pie-unselected").addClass("pie-selected");
	$(".pie-box li").not(".label-pie").not("#" + pieId).removeClass("pie-selected").addClass("pie-unselected");
};
$("#pieInstansi").click(function(){
	if ($("#pieInstansi").hasClass("pie-unselected")) {
		setSelectedPie("pieInstansi");
		$("#label-pie").text("Instansi");
		showChart(site_url + "/operator/rekap_ticket_service/instansi");
	};
});
$("#pieJenisKasus").click(function(){
	if ($("#pieJenisKasus").hasClass("pie-unselected")) {
		setSelectedPie("pieJenisKasus");
		$("#label-pie").text("Jenis Kasus");
		showChart(site_url + "/operator/rekap_ticket_service/jenis_kasus");
	};
});
$("#pieLevelPenanganan").click(function(){
	if ($("#pieLevelPenanganan").hasClass("pie-unselected")) {
		setSelectedPie("pieLevelPenanganan");
		$("#label-pie").text("Level Penanganan");
		showChart(site_url + "/operator/rekap_ticket_service/level_penanganan");
	};
});

function showChart(url) {
	$("#placeHolder").empty();
	$("#imgLoading").show();	
	$.ajax({
		url: url
	}).done(function(dataReceive){
		var data1 = JSON.parse(dataReceive);
		//alert(JSON.stringify(data));
		$.plot('#placeHolder', data1, {
		    series: {
		        pie: {
		            show: true,
				    label: {
		                show: true,
		                radius:4/6,
		                formatter: function(label, series){
			                return "data =" + series['data'];
						}
				    }
		        }
		    },
		    legend: {show:true},
		    grid: {
		        hoverable: true,
		        clickable: true
		    }
		});
		$("#imgLoading").hide();
	});
}

showChart(site_url + "/operator/rekap_ticket_service/instansi");
</script>