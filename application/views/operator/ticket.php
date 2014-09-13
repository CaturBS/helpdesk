<style>
	.left-explorer {
		position: absolute;
		bottom: 1em;
		top:3em;
		width:10em;
		border: 1px solid #8bd;
	}
	
	.left-explorer ul {
		margin-left: -1em;
	}
	.left-explorer ul li{
		diplay: block;
		text-decoration: none;
		border: 1px solid #8bd;
		list-style-type: none;
		margin-left: 0;
		margin-right: 1em;
		cursor: pointer;
		color:#b68;
		font-size: 0.8em;
	}
	
	.left-explorer ul li:HOVER{
		background-color: #e8ebed;
	}
	.left-explorer ul li a{
		text-decoration: none;
		width:100%;
		color:#b68;
	}
	
	.right-explorer {
		position: absolute;
		bottom: 1em;
		top:3em;
		left: 12.5em;
		width:50em;
		border: 1px solid #8bd;	
	}
	
	.exp2 {
		margin-left:1em;
	}
	
	.ticket-box {
		cursor: pointer;
		width: 90%;
		min-height: 2em;
		font-size: 0.8em;
		border: 1px solid #ace;
		border-radius: 0.35em;
		margin:2.5%;
	}
	.big-button{
		position: absolute;
		top:1em;
		cursor: pointer;
		box-shadow:0.1em 0.1em 0.1em #8bd;
		border: 1px solid #abe;
		width: 20em;
	    background: -moz-linear-gradient(top, #fff 0%, #efeffe 40%, #fff 100%);
	    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fff), color-stop(40%,#efeffe), color-stop(100%,#fff)); /* Chrome,Safari4+ */
	    background: -webkit-linear-gradient(top, #fff 0%,#efeffe 40%,#fff 100%); /* Chrome10+,Safari5.1+ */
	    background: -o-linear-gradient(top, #fff 0%,#efeffe 40%,#fff 100%); /* Opera 11.10+ */
	    background: -ms-linear-gradient(top, #fff 0%,#efeffe 40%,#fff 100%); /* IE10+ */
	    background: linear-gradient(to bottom, #fff 0%,#efeffe 40%,#fff 100%); /* W3C */
	}
	.big-button:HOVER{
	    background: -moz-linear-gradient(top, #fff 0%, #f8f8fe 40%, #fff 100%);
	    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fff), color-stop(40%,#f8f8fe), color-stop(100%,#fff)); /* Chrome,Safari4+ */
	    background: -webkit-linear-gradient(top, #fff 0%,#f8f8fe 40%,#fff 100%); /* Chrome10+,Safari5.1+ */
	    background: -o-linear-gradient(top, #fff 0%,#f8f8fe 40%,#fff 100%); /* Opera 11.10+ */
	    background: -ms-linear-gradient(top, #fff 0%,#f8f8fe 40%,#fff 100%); /* IE10+ */
	    background: linear-gradient(to bottom, #fff 0%,#f8f8fe 40%,#fff 100%); /* W3C */
		box-shadow:0.1em 0.1em 0.1em #db8;
	}
	.big-button:ACTIVE {		
		box-shadow:0.05em 0.05em 0.05em #db8;
	}
}
</style>
<div class="left-explorer">
	<ul>
		<li id="ticket-li">Tiket</li>
		<li id="addTicket-li">Tambah Tiket</li>
		<li> <?php echo anchor("operator/ticket/add", "update");?></li>
	</ul>
</div>
<div id="right-explorer-tmp" class="right-explorer">
	<div class="big-button" style="left: 1em;">
		Manajemen Tiket
	</div>
	<div id="list-ticket" class="exp2" style="position:absolute; left:0;top:50px;width: 20em;height:300px;border:1px solid #ccd;"></div>	
	<div class="big-button" style="left: 25em;">
		Rekap Grafik
	</div>
	<div id="placeHolder" style="position:absolute; left:25em;top:50px;width: 20em;height:300px;border:1px solid #ccd;"></div>
</div>
<script>

	$("#ticket-li").click(function(){
        var url = site_url + "/operator/ticket/";
        $(location).attr('href',url);
    });
	$("#addTicket-li").click(function(){
        var url = site_url + "/operator/ticket/add";
        $(location).attr('href',url);
    });
	var data = [];
	
	data[0] = {
		label: "Dinas",
		data: 31
	}


	data[1] = {
		label: "Dinas Tata Ruang",
		data: 3
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

	var ticketInterval = setInterval(function() {
		$.ajax({
			url: site_url + "/operator/showTicket"
			}).done(function(data){
				var obj = JSON.parse(data);
				$("#list-ticket").empty();
				for (i in obj) {
					var div1 = $("<div id='chat_"+i+"' class='ticket-box'/>");
					var div2 = $("<div>"+obj[i]['id']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['user']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['tanggal_buka']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['tanggal_tutup']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['status']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['organisasi']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['jenis_kasus']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['level_penanganan']+"</div>");
					div1.append(div2);
					var div2 = $("<div>"+obj[i]['deskripsi']+"</div>");
					div1.append(div2);
					$("#list-ticket").append(div1);
				}
				});
		},1000);
</script>