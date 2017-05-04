$(function (){
	if($("table#resub-table > tbody >tr").length == 0){
		$('table#resub-table').on('update-mem', function(e){
			$.each(mem,function(key, val){
				var row = $("table#resub-table > tbody").append("<tr id="+key+"><td>"+val+"</td><td>"+key+"</td></tr>");
				row.css('cursor', 'pointer');
				row.children('#'+key).click(function () {
					$.ajax({
						type: 'GET',
						url: 'ajax/resubmit-form.php',
						data: {"assignee":key},
						success: function(data){
							$("div#resubmit-table").hide(350);
							var form=$('#resubmit').append(data).find('div#rsmbfrm > form');
							form.submit(function(e) {
								e.preventDefault();
								var body =$(this).find('#intro-text').val()+$(this).find('#additional-text').val()+'<br><br>'+$(this).find('#end-text').val();
								$.ajax({
									method: 'POST',
									url: 'form/resubmit.php',
									data: {'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':body},
									success: function(data){
										if(data["success"]){
											var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
											alt.alert();
										}else{
											var alt=$('#art').append('<div class="alert alert-danger" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
											alt.alert();
										}
										$('div#rsmbfrm').remove();
										$("div#resubmit-table").show(350);
									},
								})
							})
						},
						complete: function(){
							$('#resubmit').find('div#rsmbfrm > form > button#back').click(function() {
								$('div#rsmbfrm').remove();
								$("div#resubmit-table").show(350);
							});
						}
					})
				})
			})
			$('#resub-table').searchable({
				searchField:'#resubmit-search',
				clearOnLoad: true
			});
		})
	}
})
