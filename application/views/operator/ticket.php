<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/ticket.css'); ?>" type="text/css" />');
</script>
<div class="left-explorer">
	<ul>
		<li id="manaj-ticket-li">Manajemen Indeks Permasalahan</li>
		<li id="rekap-ticket-li">Rekap Indeks Permasalahan</li>
		<li id="addTicket-li">Tambah Tiket Indeks Permasalahan</li>
	</ul>
</div>
<div id="right-explorer-tmp" class="right-explorer">
	<div id="detail-ticket" class="detail-ticket" hidden="true">
		<div class="small-button" onclick="$('#detail-ticket').hide();" style="max-width: 1.5em;max-height: 1.5em;padding: 0.5em;">exit</div>
		<div id="detail-ticket-content"></div>
	</div>
	<div id="mt-button" class="big-button" style="left: 1em;">
		Manajemen Tiket Indeks Permasalahan
	</div>
	<div id="list-ticket" class="exp2" style="position:absolute; left:0;top:50px;width: 20em;height:300px;border:1px solid #ccd;"></div>	
	<div id="rt-button" class="big-button" style="left: 25em;">
		Rekap Grafik
	</div>
	<div style="position:absolute; left:25em;top:50px;width: 20em;height:300px;border:1px solid #ccd;">
		<div id="placeHolder" style="position:absolute; width: 100%;height: 100%;"></div>
	</div>
</div>
<script>
	$("#mt-button").click(function(){
        var url = site_url + "operator/ticket/manage";
        $(location).attr('href',url);
	});

	$("#rt-button").click(function(){
	    var url = site_url + "operator/rekap_ticket";
	    $(location).attr('href',url);
	});
	$("#manaj-ticket-li").click(function(){
        var url = site_url + "operator/ticket/manage";
        $(location).attr('href',url);
    });
	$("#rekap-ticket-li").click(function(){
        var url = site_url + "operator/rekap_ticket";
        $(location).attr('href',url);
    });
	$("#addTicket-li").click(function(){
        var url = site_url + "operator/ticket/add";
        $(location).attr('href',url);
    });

	$.ajax({
		url: site_url + "operator/rekap_ticket_service"
	}).done(function(dataReceive){
		var data1 = JSON.parse(dataReceive);
		//alert(data1[0]["label"]);
		
		//alert(JSON.stringify(data));
		$.plot('#placeHolder', data1, {
		    series: {
		        pie: {
		            show: true
		        }
		    }
		});
	});
	var data = [];
	data[0] = {
		label: "",
		data: 100
	}
	
	
	//alert(JSON.stringify(data));
	$.plot('#placeHolder', data, {
	    series: {
	        pie: {
	            show: true
	        }
	    },

	    grid: {
	        hoverable: true,
	        clickable: true
	    }
	});

	function viewTicket(id) {
		$("#detail-ticket-content").empty();
		$("#detail-ticket").show();
		$("#detail-ticket-content").load(site_url + "operator/detailTicket/" + id);
	}

	function editTicket(id) {
        var url = site_url + "operator/ticket/update/" + id;
        $(location).attr('href',url);
	}
	var ticketInterval = setInterval(function() {
		$.ajax({
			url: site_url + "operator/showTicket"
			}).done(function(data){
				var obj = JSON.parse(data);
				$("#list-ticket").empty();
				for (i in obj) {
					var div1 = $("<div id='tb_"+i+"' class='ticket-box'/>");
					var div2 = $("<div><b>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:"+obj[i]['user']+"</b></div>");
					div1.append(div2);
					var fontColor = "#4f4";
					if (obj[i]['status'] == "buka") {
						fontColor = "#f44";
					}
					var div3 = $("<div><b>Tanggal &nbsp;:"+obj[i]['tanggal_buka']+"</b></div>");
					div1.append(div3);
					var div4 = $("<span style='color:"+fontColor+";'>&nbsp;&nbsp;"+obj[i]['status']+"</span>");
					div3.append(div4);
					var div5 = $("<div style='font-size:1.1em;color:#224;'><b>"+obj[i]['instansi']+"</b></div>");
					div1.append(div5);
					var div6 = $("<div onclick='viewTicket(\""+obj[i]['id']+"\");' class='small-button' style='top:1em;'>Detail</div>");
					div1.append(div6);
					var div7 = $("<div onclick='editTicket(\""+obj[i]['id']+"\");' class='small-button' style='top:3em;'>Edit</div>");
					//div1.append(div7);
					$("#list-ticket").append(div1);
				}
				});
		},1000);
</script>