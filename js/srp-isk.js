$(function (){
	if($("table#isksrp-table > tbody >tr").length == 0){
		$('table#isksrp-table').on('update-mem', function(e){
			$.each(mem,function(key, val){
				var row = $("table#isksrp-table > tbody").append("<tr id="+key+"><td>"+val+"</td><td>"+key+"</td></tr>");
				row.css('cursor', 'pointer');
				row.children('#'+key).click(function(){isksrp_ajax_mailform(key)})
			})
			$('#isksrp-table').searchable({
				searchField:'#isksrp-search',
				clearOnLoad: true
			});
		})
	}
})




function isksrp_ajax_mailform(key){
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"assignee":key,"textid":1},
		success: function(data){
			$("div#isksrp-search-div").hide(350);
			$("table#isksrp-table").hide(350);
			var form=$('div#isksrp').append(data).find('form#isk_mail_form');
			form.submit(function(e) {
				e.preventDefault();
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
						$("form#isk_mail_form").remove();
						$("div#isksrp-search-div").show(350);
						$("table#isksrp-table").show(350);
					},
				})
			})
		},
		complete: function(){
			$('form#isk_mail_form').find('button#back').click(function() {
				$("form#isk_mail_form").remove();
				$("div#isksrp-search-div").show(350);
				$("table#isksrp-table").show(350);
			});
		}
	})
}
