<?php 	
	setcookie('page', $page);
?>
<script>
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/ticketWindow.css'); ?>" type="text/css" />');
$("#right-explorer-tmp").remove();
</script>
<div class="right-explorer">
	<div class="ticketExplorer">
		<button id="browse-left" style="position:absolute;left:0.5em;top:0.25em;">&lt;</button>
		<div id="label-explorer" class="label-explorer">Daftar Tiket</div>
		<button id="browse-right" style="position:absolute;right:0.5em;top:0.25em;">&gt;</button>
		<ul id="li-explorer"><li>tes</li></ul>
		<img id="loading-li-explorer" alt="" src="<?php echo base_url("/images/ajax_loader_blue_128.gif");?>" style="position: absolute;top:5em;left:3em;" hidden>
	</div>

	<div id="detail-ticket" class="detail-ticket">
		<!-- <div class="small-button" onclick="$('#detail-ticket').hide();">x</div> -->
		<div id="detail-ticket-content"></div>
	</div>
</div>

<style>
	.browse-button {
		cursor:pointer;
		position: absolute;
		border: 1px solid #88c;
		width:1.3em;
		height: 1.3em;
		padding:0.1em;
		padding-left:0.5em;
		border-radius:0.35em;
		margin:0.2em;
	}
	
	.label-explorer {
		position: absolute;
		border: 1px solid #bbe;
		width:13em;
		left:3em;
		top:0.35em;
	}
	.ticketExplorer {
		position:absolute;
		left:0;
		top:2.5%;
		left:1%;
		width: 20em;
		height:92.5%;
		border:1px solid #ccd;		
	}
	
	.detail-ticket {
		position:absolute;
		left:0;
		top:2.5%;
		left:42.5%;
		width: 50%;
		height:82.5%;
		border:1px solid #ccd;	
		padding:0.5em;		
	}
	
	.ticketExplorer ul {
		position:relative;
		height: 90%;
		top:10%;
		border:1px solid #ccd;
		margin:0.2em;
	}
	
	.ticketExplorer ul li{
		position:relative;
		min-height: 3em;
		min-width: 5em;
		border:1px solid #8bd;
		margin: 0.5em;
		display: block;
		margin-left: -2em;
		list-style-type: none;
		font-size:0.8em;
		padding:0.5em;
		box-shadow: 0.1em 0.1em 0.1em #468;
	}
	
	.detail-ticket-content {
		padding:0.75em;	
	}
	
	.detail-ticket div{
		margin:0.5em;
	}
	.ticketExplorer ul li div{
		margin:0.2em;
		}
</style>
<script>	
	
	function loadURLtoEl(url, elID) {
		return $('<img src="pic_mountain.jpg" alt="Loading" style="margin:3em;">');
	}
	function viewTicketDetails(id) {
		$("#detail-ticket-content").empty();
		$("#detail-ticket").show();
		$("#detail-ticket-content").load(site_url + "operator/detailTicket/" + id);
	}
	function editTicketDetails(id) {
		$("#detail-ticket-content").html('');
		//$("#detail-ticket").show();
		/*$.ajax({
			url: site_url + "/operator/edit_ticket/" + id
			}).done(function(data){
				$("#detail-ticket-content").html(data);
				});*/
		$("#detail-ticket-content").load(site_url + "operator/edit_ticket/" + id);
	}
	var banyakTiket = 0; 
	var offsetPage = 0;
	function labelLiExplorer() {
		$("#label-explorer").html("Daftar Tiket. &nbsp;&nbsp;" + (offsetPage + 1) + "/" + Math.ceil(banyakTiket/4));
	}
	$.ajax({
		url: site_url + "operator/ticketCount"
		}).done(function(data){
			banyakTiket = parseInt(data);
			labelLiExplorer();
			});
	function fetchLiExplorer(obj){		
		$("#li-explorer").empty();
		for (i in obj) {
			var liObj = $("<li></li>");
			var fontColor = "#3a3";
			if (obj[i]['status'] == "buka") {
				fontColor = "#a33";
			}
			var liText = "<div>User: &nbsp;" +obj[i].user+ "<div>";
			liText += "<div>Tanggal: &nbsp;"+obj[i].tanggal_buka;
			liText += "&nbsp;&nbsp;&nbsp;<span style='color:"+fontColor+";'>"+obj[i]['status']+"</span></div>";
			liText += "<div style='font-size:1.1em;color:#224;width:17em;border:'><b>"+obj[i]['instansi']+"</b></div>";
			liText += "<div onclick='viewTicketDetails(\""+obj[i]['id']+"\");' class='small-button' style='top:0.2em;'>Detail</div>";
			liText += "<div onclick='editTicketDetails(\""+obj[i]['id']+"\");' class='small-button' style='top:2.2em;'>Edit</div>";
			liObj.html(liText);
			$("#li-explorer").append(liObj);
		}
	};
	$("#browse-left").click(function(){		
			if (offsetPage >= 1) {
				$("#loading-li-explorer").show();	
				$("#li-explorer").empty();
				offsetPage -= 1;
				$.ajax({
					url: site_url + "operator/showTicket/4/" + (offsetPage * 4)
					}).done(function(data){
						var obj = JSON.parse(data);
						fetchLiExplorer(obj);
						$("#loading-li-explorer").hide();
					});		
				labelLiExplorer();				
			}
		});
	$("#browse-right").click(function(){		
		if (offsetPage < Math.ceil(banyakTiket/4) - 1) {
			offsetPage += 1;
			$("#loading-li-explorer").show();	
			$("#li-explorer").empty();
			$.ajax({
				url: site_url + "operator/showTicket/4/" + (offsetPage * 4)
				}).done(function(data){
					var obj = JSON.parse(data);
					if (obj.length != 0) {
						fetchLiExplorer(obj);
						labelLiExplorer();
					}
					$("#loading-li-explorer").hide();
				});
		}
		});
	$.ajax({
		url: site_url + "operator/showTicket/4/0"
		}).done(function(data){
			//var stext = {"id":"7","user":"ahmad","tanggal_buka":"2014-09-13","tanggal_tutup":"0000-00-00","status":"buka","organisasi":"Dinas Perumahan dan Permukiman","jenis_kasus":"Perangkat lunak dan OS","level_penanganan":"Servis Lapangan","deskripsi":"dfssa"};			
			var obj = JSON.parse(data);
			fetchLiExplorer(obj);
			$("#loading-li-explorer").hide();
			});
</script>