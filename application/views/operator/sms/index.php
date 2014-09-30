<script type="text/javascript">
$('head').append('<link rel="stylesheet" href="<?php echo base_url('css/sms.css'); ?>" type="text/css" />');
</script>
<div class="leftExplorer">
	<ul id="smsUL" class="ulExplorer"></ul>
</div>
<div id="smsDetails" class="rightExplorer">
	<div class="sendSMSBox">
		Kirim SMS<br/>
		<input type="text" id="sendNumber">
		<textarea id="sendMessage"></textarea>
		<button id="sendButton">Kirim</button>
		<div id="sendStatus"></div>
	</div>
	<ul id="smsDetailsUL" class="ulDetailsExplorer"></ul>
</div>
<script type="text/javascript">
	$("#sendButton").click(function(){
		$.post(site_url+"/operator/sendSMS",{
				receiverNumber:$("#sendNumber").val(),
				message:$("#sendMessage").val()
			}, function(data,status){
				$("#sendStatus").text(status);
				});
		});
	var gSender = "";
	var gSender1 = "";
	var gNumb = "";
	var firstRead = false;
	function smsList(){
		$.ajax({
			url: site_url + '/operator/listSMSNumber'
		}).done(function(data){
			$("#smsUL").empty();
			var obj = JSON.parse(data);
			var numb = 0;
			for (var i in obj) {
				var sender = obj[i]['sender'];
				var sender1 = sender;
				var textClass="";
				if (sender_selected == obj[i]['sender']) {
					textClass='class=\"phoneNumberSelected\"';
				}
				if (sender.charAt(0) == '+') {
					sender1 = sender.substring(1, sender.length);
				};
				if (i==0 && firstRead == false) {
					gSender = sender;
					gSender1 = sender1;
					gNumb = numb;
					firstRead = true;
				}
				var li1 = $('<li onclick=\'readSMS(\"' + sender1+
						'\", \"'+obj[i]['sender']+'\", \"li_'+numb+'\");\' id="li_'+numb+'" '+textClass+'>'+
						'<div class="phoneNumber">' + sender+ '</div>' +
						'<div class="balloon">' + obj[i]['count']+ '</div>' +
						'<div class="smsDate">' + obj[i]['last_date']+ '</div>' +
						'</li>');
				$("#smsUL").append(li1);			
				numb++;
			}		
		});
	};
	smsList();
	var sender_selected="";
	function readSMS(sender, sender1, numb) {
		if (sender != "") {
			gSender = sender;
			gSender1 = sender1;
			gNumb = numb;
		};
		sender_selected = sender1;
		$("#sendNumber").val(sender1);
		$("#smsUL li").removeClass("phoneNumberSelected");
		$("#"+numb).addClass("phoneNumberSelected");		
		$.ajax({
			url: site_url + '/operator/listSMSBySender/' + sender
			}).done(function(data){
				$("#smsDetailsUL").empty();
				var obj = JSON.parse(data);
				var element1 = $('<li class="smsDetailTitle">'+obj[0].sender+'</li>');
				$("#smsDetailsUL").append(element1);
				for (i in obj) {
					var data1 = obj[i];
					var classText = 'class=\"smsMessageFrom\"';
					if (obj[i].from_gateway == "1") {
						classText = 'class=\"smsMessageTo\"';
					};
					var kirim = "terkirim";
					if (obj[i]['from_gateway']==0) {
						kirim = "diterima";
					}
					var element = $('<li '+classText+'>'+obj[i].text+'<div class="smsDate" style="margin-left:15em;">'
							+obj[i].date+'</div>'+
							'<div class="sentReceive">' + kirim + '</div>' +
							'</li>');
					$("#smsDetailsUL").append(element);
				}
			});
	}
	setInterval(function(){	
		smsList();
	},2000);
	setInterval(function() {
		if (gSender != "") {
			readSMS(gSender, gSender1, gNumb);
		};
	},2000);
</script>