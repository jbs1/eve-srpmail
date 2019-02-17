//save members in global js variable, session caching is done at the endpoint
function hull_table_refresh(){
	$.ajax({
		type: 'GET',
		url: 'ajax/get_contracts.php',
		beforeSend: function(){
			loader_start("Contracts",2);
			$('#hull_refresh_button').attr('disabled','disabled');
		},
		success: function(data){
			console.log('Contracts',data);
			$("span#contracts-cached-date").html("Contracts cached until <strong>"+data[1]+"</strong>.");
			if(data[0].length > 0){
				$("table#hullsrp-table > tbody > tr#no_contracts").remove();
				$.each(data[0],function(i, item){
					var flag = 0;
					$("table#hullsrp-table > tbody > tr > td:first-child").each(function(){
						if($(this).text() == item.contract_id){
							flag = 1;
						}
					});
					if(flag==0){
						var row = $("table#hullsrp-table > tbody").append("<tr id="+item.contract_id+"><td>"+item.contract_id+"</td><td>"+mem[item.assignee_id]+"</td><td>"+item.date_issued+"</td><td>"+item.status+"</td></tr>");
						row.css('cursor', 'pointer');
						row.children('#'+item.contract_id).on('click',function(){
							row.children('#'+item.contract_id).off('click');
							hullsrp_ajax_mailform(item);
						});
					}
				})
			}
		},
		complete: function(data){
			mark_finished_contracts();
			loader_stop(2);
			$('#hull_refresh_button').delay(2100).queue(function() {$('#hull_refresh_button').removeAttr('disabled','disabled');$(this).dequeue();});
		}
	})
}

function hullsrp_ajax_mailform(item){
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"contractid":item.contract_id,"station":item.start_location_id,"assignee":item.assignee_id,"textid":0},
		success: function(data){
			$("table#hullsrp-table").hide(350);
			$("span#contracts-cached-date").hide(350);
			$("button#hull_refresh_button").hide(350);
			var form=$('div#hullsrp').append(data).find('form#hull_mail_form');
			form.submit(function(e) {
				e.preventDefault();
				form.find("button[type='submit']").attr('disabled','disabled');
				$.ajax({
					method: 'POST',
					url: 'ajax/sendmail.php',
					data: {'special':'contract','contractid':$(this).find('#contract').val(),'recv':$(this).find('#reciever').val(),'subj':$(this).find('#subject').val(),'body':$(this).find('#mail-body').val()},
					success: function(data){
						if(data["success"]){
							var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
							alt.alert();
						}else{
							var alt=$('#art').append('<div class="alert alert-danger alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
							alt.alert();
						}
						$('form#hull_mail_form').remove();
						$("button#hull_refresh_button").show(350);
						$("table#hullsrp-table").show(350);
						$("span#contracts-cached-date").show(350);
						$('#'+item.contract_id).on('click',function(){
							$('#'+item.contract_id).off('click');
							hullsrp_ajax_mailform(item);
						});
					},
					complete: function(){
						mark_finished_contracts();
					}
				})
			})
		},
		complete: function(){
			$('div#hullsrp').find('form#hull_mail_form > button#back').click(function() {
				$('form#hull_mail_form').remove();
				$("table#hullsrp-table").show(350);
				$("span#contracts-cached-date").show(350);
				$("button#hull_refresh_button").show(350);
				$('#'+item.contract_id).on('click',function(){
					$('#'+item.contract_id).off('click');
					hullsrp_ajax_mailform(item);
				});
			});
		}
	})
}

function mark_finished_contracts(){
	$.ajax({
		url: 'ajax/get_contracts_finished.php',
		type: 'GET',
		success: function(data){
			for(var i in data){
				$('table#hullsrp-table > tbody > tr#'+data[i]).addClass('success');
			}
		}
	})
}