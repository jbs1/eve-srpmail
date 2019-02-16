function isk_table_refresh(){
	$.ajax({
		type: 'GET',
		url: 'ajax/get_payments.php',
		beforeSend: function(){
			loader_start("Payments",3);
		},
		success: function(data){
			console.log('Payments',data);
			$("span#payments-cached-date").html("Payments cached until <strong>"+data[1]+"</strong>.");
			if(data[0].length > 0){
				$("table#isksrp-table > tbody > tr#no_payments").remove();
				$.each(data[0],function(i, item){
					var flag = 0;
					$("table#isksrp-table > tbody > tr > td:first-child").each(function(){
						if($(this).text() == item.id){
							flag = 1;
						}
					});
					if(flag==0){
						var row = $("table#isksrp-table > tbody").append("<tr id="+item.id+"><td>"+item.id+"</td><td>"+mem[item.second_party_id]+"</td><td>"+item.date+"</td><td>"+item.reason+"</td></tr>");
						row.css('cursor', 'pointer');
						row.children('#'+item.id).on('click',function(){
							row.children('#'+item.id).off('click');
							isksrp_ajax_mailform(item);});
					}
				})
			}
		},
		complete: function(data){
			mark_finished_payments();
			loader_stop(3);
		}
	})
}


function isksrp_ajax_mailform(item){
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"assignee":item.second_party_id,"paymentid":item.id,"reason":item.reason,"value":item.amount*(-1)/1000000,"textid":1},
		success: function(data){
			$("table#isksrp-table").hide(350);
			$("span#payments-cached-date").hide(350);
			$("button#isk_refresh_button").hide(350);
			var form=$('div#isksrp').append(data).find('form#isk_mail_form');
			form.submit(function(e) {
				e.preventDefault();
				form.find("button[type='submit']").attr('disabled','disabled');
				$.ajax({
					method: 'POST',
					url: 'ajax/sendmail.php',
					data: {'special':'isk','paymentid':$(this).find('#payment').val(),'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':$(this).find('#mail-body').val()},
					success: function(data){
						if(data["success"]){
							var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
							alt.alert();
						}else{
							var alt=$('#art').append('<div class="alert alert-danger alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
							alt.alert();
						}
						$("form#isk_mail_form").remove();
						$("table#isksrp-table").show(350);
						$("span#payments-cached-date").show(350);
						$("button#isk_refresh_button").show(350);
						$('#'+item.id).on('click',function(){
							$('#'+item.id).off('click');
							isksrp_ajax_mailform(item);
						});
					},
				})
			})
		},
		complete: function(){
			$('form#isk_mail_form').find('button#back').click(function() {
				$("form#isk_mail_form").remove();
				$("table#isksrp-table").show(350);
				$("span#payments-cached-date").show(350);
				$("button#isk_refresh_button").show(350);
				$('#'+item.id).on('click',function(){
					$('#'+item.id).off('click');
					isksrp_ajax_mailform(item);
				});
			});
		}
	})
}


function mark_finished_payments(){
	$.ajax({
		url: 'ajax/get_payments_finished.php',
		type: 'GET',
		success: function(data){
			for(var i in data){
				$('table#isksrp-table > tbody > tr#'+data[i]).addClass('success');
			}
		}
	})
}