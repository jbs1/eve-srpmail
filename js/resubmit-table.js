//save members in global js variable, session caching is done at the endpoint
$(function (){
	$('a[data-toggle="tab"][href="#resubmit"]').on('shown.bs.tab', function (e) {
		if($("table#resub-table > tbody >tr").length == 0){
			$.ajax({
				type: 'GET',
				url: 'ajax/corp-mem.php',
				success: function(data){
						$.each(data,function(key, val){
								var row = $("table#resub-table > tbody").append("<tr id="+key+"><td>"+val+"</td><td>"+key+"</td></tr>");
								row.css('cursor', 'pointer');
								// row.children('#'+item["@attributes"].contractID).click(function () {
								// 	$.ajax({
								// 		type: 'GET',
								// 		url: 'ajax/contract-form.php',
								// 		data: {"contid":item["@attributes"].contractID,"station":item["@attributes"].startStationID, "assignee":item["@attributes"].assigneeID},
								// 		success: function(data){
								// 			$("div#resubmit-table").hide(350);
								// 			var form=$('#accept').append(data).find('div#contrfrm > form');
								// 			form.submit(function(e) {
								// 				e.preventDefault();
								// 				var body =$(this).find('#intro-text').val()+$(this).find('#optional-text').val()+'<br><br>'+$(this).find('#end-text').val();
								// 				$.ajax({
								// 					method: 'POST',
								// 					url: 'form/accept.php',
								// 					data: {'cntr':$(this).find('#contract').val(),'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':body},
								// 					success: function(data){
								// 						console.log('Mail-ID',data);
								// 						$('div#contrfrm').remove();
								// 						$("div#resubmit-table").show(350);
								// 					},
								// 					complete: function(){
								// 						addfinish();
								// 					}
								// 				})
								// 			})
								// 		}
								// 	})
								// })

						})
				}
			})
		}
	})
})
