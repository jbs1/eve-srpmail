//save members in global js variable, session caching is done at the endpoint
$(function (){
	$('a[data-toggle="tab"][href="#accept"]').on('shown.bs.tab', function (e) {
		$.ajax({
			type: 'GET',
			url: 'ajax/contracts.php',
			success: function(data){
				console.log('Contracts',data);
				if(data.length == 0){
					if($("table#cont-table > tbody > tr").length == 0){
					$("table#cont-table > tbody").append("<tr id=\"empty\" class=\"warning\"><td colspan=4> No contracts avialable! </td></tr>");
					};
				} else {
					$("table#cont-table > tbody > tr#empty").remove();
					$.each(data,function(i, item){
						var flag = 0;
						$("table#cont-table > tbody > tr > td:first-child").each(function(){
							if($(this).text() == item["@attributes"].contractID){
								flag = 1;
							}
						});
						if(flag==0){
							var row = $("table#cont-table > tbody").append("<tr id="+item["@attributes"].contractID+"><td>"+item["@attributes"].contractID+"</td><td>"+mem[item["@attributes"].assigneeID]+"</td><td>"+item["@attributes"].dateIssued+"</td><td>"+item["@attributes"].status+"</td></tr>");
							row.css('cursor', 'pointer');
							row.children('#'+item["@attributes"].contractID).click(function () {
								$.ajax({
									type: 'GET',
									url: 'ajax/contract-form.php',
									data: {"contid":item["@attributes"].contractID,"station":item["@attributes"].startStationID, "assignee":item["@attributes"].assigneeID},
									success: function(data){
										$("div#contract-table").hide(350);
										var form=$('#accept').append(data).find('div#contrfrm > form');
										form.submit(function(e) {
											e.preventDefault();
											var body =$(this).find('#intro-text').val()+$(this).find('#additional-text').val()+'<br><br>'+$(this).find('#end-text').val();
											$.ajax({
												method: 'POST',
												url: 'form/accept.php',
												data: {'cntr':$(this).find('#contract').val(),'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':body},
												success: function(data){
													if(data["success"]){
														var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
														alt.alert();
													}else{
														var alt=$('#art').append('<div class="alert alert-danger" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
														alt.alert();
													}
													$('div#contrfrm').remove();
													$("div#contract-table").show(350);
												},
												complete: function(){
													addfinish();
												}
											})
										})
									},
									complete: function(){
										$('#accept').find('div#contrfrm > form > button#back').click(function() {
											$('div#contrfrm').remove();
											$("div#contract-table").show(350);
										});
									}
								})
							})
						}
					})
				}
			},
			complete: function(){
				addfinish();
				$.ajax({
					url: 'ajax/contracts-cached.php',
					type: 'GET',
					success: function(data){
						var d = new Date();
						d.setTime(d.getTime() + data*1000);
						$("#contracts-time-cached-sec").text(data);
						$("#contracts-time-cached-time").text(d.getHours()+":"+d.getMinutes()+":"+d.getSeconds()+" local time");
					}
				})
			}
		})
	})
})



function addfinish(){
	$.ajax({
		url: 'ajax/contracts-finished.php',
		type: 'GET',
		success: function(data){
			for(var i in data){
				$('table#cont-table > tbody > tr#'+data[i]).addClass('success');
			}
		}
	})
}