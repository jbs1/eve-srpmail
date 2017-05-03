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
						$("table#cont-table > tbody > tr > td:eq(0)").each(function(){
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
											var body =$(this).find('#intro-text').val()+$(this).find('#optional-text').val()+'<br><br>'+$(this).find('#end-text').val();
											$.ajax({
												method: 'POST',
												url: 'form/accept.php',
												data: {'cntr':$(this).find('#contract').val(),'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':body},
												success: function(data){
													console.log('Mail-ID',data);
													$('div#contrfrm').remove();
													$("div#contract-table").show(350);
												},
												complete: function(){
													addfinish();
												}
											})
										})
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
						$("#contracts-time-cached").text(data);
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
				$('table#cont-table > tbody > tr#'+data).addClass('success');
			}
		}
	})
}