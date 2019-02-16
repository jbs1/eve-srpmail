$(function (){
	if($("table#messagessrp-table > tbody >tr").length == 0){
		$('table#messagessrp-table').on('update-mem', function(e){
			$.each(mem,function(key, val){
				var row = $("table#messagessrp-table > tbody").append("<tr id="+key+"><td>"+val+"</td><td>"+key+"</td></tr>");
				row.css('cursor', 'pointer');
				row.children('#'+key).on('click',function(){
					row.children('#'+key).off('click');
					messagessrp_ajax_mailform(key);
				});
			})
			$('#messagessrp-table').searchable({
				searchField:'#messagessrp-search',
				clearOnLoad: true
			});
		})
	}
})




function messagessrp_ajax_mailform(key){
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"assignee":key,"textid":3},
		success: function(data){
			$("div#messagessrp-search-div").hide(350);
			$("table#messagessrp-table").hide(350);
			var form=$('div#messagessrp').append(data).find('form#messages_mail_form');
			form.submit(function(e) {
				e.preventDefault();
				form.find("button[type='submit']").attr('disabled','disabled');
				$.ajax({
					method: 'POST',
					url: 'ajax/sendmail.php',
					data: {'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':$(this).find('#mail-body').val()},
					success: function(data){
						if(data["success"]){
							var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
							alt.alert();
						}else{
							var alt=$('#art').append('<div class="alert alert-danger alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
							alt.alert();
						}
						$("form#messages_mail_form").remove();
						$("div#messagessrp-search-div").show(350);
						$("table#messagessrp-table").show(350);
						$('#'+key).on('click',function(){
							$('#'+key).off('click');
							messagessrp_ajax_mailform(key);
						});
					},
				})
			})
		},
		complete: function(){
			$('form#messages_mail_form').find('button#back').click(function() {
				$("form#messages_mail_form").remove();
				$("div#messagessrp-search-div").show(350);
				$("table#messagessrp-table").show(350);
				$('#'+key).on('click',function(){
					$('#'+key).off('click');
					messagessrp_ajax_mailform(key);
				});
			});
		}
	})
}
