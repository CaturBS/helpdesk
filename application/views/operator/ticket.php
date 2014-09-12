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
	
	}
</style>
<div class="left-explorer">
	<ul>
		<li id="ticket-li">Tiket</li>
		<li id="addTicket-li">Tiket Baru</li>
		<li> <?php echo anchor("operator/ticket/add", "update");?></li>
	</ul>
</div>
<div id="right-explorer-tmp" class="right-explorer">
	<div id="list-ticket" class="exp2" style="position:absolute; left:0;top:50px;width: 300px;height:300px;border:1px solid #ccd;"></div>
	<div id="placeHolder" style="position:absolute; left:400px;top:50px;width: 300px;height:300px;border:1px solid #ccd;"></div>
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
</script>