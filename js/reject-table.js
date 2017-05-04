//save members in global js variable, session caching is done at the endpoint
$(function (){
	$('a[data-toggle="tab"][href="#reject"]').on('shown.bs.tab', function (e) {
		if($("table#rej-table > tbody >tr").length == 0){
			$.ajax({
				type: 'GET',
				url: 'ajax/corp-mem.php',
				success: function(data){
					$.each(data,function(key, val){
						var row = $("table#rej-table > tbody").append("<tr id="+key+"><td>"+val+"</td><td>"+key+"</td></tr>");
						row.css('cursor', 'pointer');
						row.children('#'+key).click(function () {
							$.ajax({
								type: 'GET',
								url: 'ajax/reject-form.php',
								data: {"assignee":key},
								success: function(data){
									$("div#reject-table").hide(350);
									var form=$('#reject').append(data).find('div#rjctfrm > form');
									form.submit(function(e) {
										e.preventDefault();
										var body =$(this).find('#intro-text').val()+$(this).find('#additional-text').val()+'<br><br>'+$(this).find('#end-text').val();
										$.ajax({
											method: 'POST',
											url: 'form/reject.php',
											data: {'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':body},
											success: function(data){
												console.log('Mail-ID',data);
												if(data["success"]){
													var alt=$('#art').append('<div class="alert alert-success" role="alert" >Mail Sent! Mail-ID:'.data["return"].'</div>')
													alt.alert();
												}else{
													var alt=$('#art').append('<div class="alert alert-danger" role="alert" >'.data["return"].'</div>')
													alt.alert();
												}
												$('div#rjctfrm').remove();
												$("div#reject-table").show(350);
											},
										})
									})
								},
								complete: function(){
									$('#reject').find('div#rjctfrm > form > button#back').click(function() {
										$('div#rjctfrm').remove();
										$("div#reject-table").show(350);
									});
								}
							})
						})
					})
				},
				complete: function(){
					$('#rej-table').searchable({
						searchField:'#reject-search',
						clearOnLoad: true
					});
				}
			})
		}
	})
})
