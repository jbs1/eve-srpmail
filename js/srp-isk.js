function isk_table_refresh(){
	$.ajax({
		type: 'GET',
		url: 'ajax/get_payments.php',
		beforeSend: function(){
			loader_start("Payments",3);
			$('#isk_refresh_button').attr('disabled','disabled');
		},
		success: function(data){
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
						var row = $("table#isksrp-table > tbody").append("<tr id="+item.id+"><td>"+item.id+"</td><td>"+mem[item.second_party_id]+"</td><td>"+item.date+"</td><td>"+item.amount+"</td><td>"+item.reason+"</td></tr>");
						row.css('cursor', 'pointer');
						row.children('#'+item.id).on('click',function(){
							row.children('#'+item.id).off('click');
							isksrp_ajax_mailform(item);
						});
					}
				})
			}
		},
		complete: function(data){
			mark_finished_payments();
			loader_stop(3);
			$('#isk_refresh_button').delay(2100).queue(function() {$('#isk_refresh_button').removeAttr('disabled','disabled');$(this).dequeue();});
		}
	})
}

function isksrp_ajax_mailform(item){
	var payments=receiver_payments(item.second_party_id);
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"assignee":item.second_party_id,"payment_string":payments[0],"textid":1},
		success: function(data){
			hide_isk_table();
			var form=$('div#isksrp').append(data).find('form#isk_mail_form');
			form.submit(function(e) {
				e.preventDefault();
				form.find("button[type='submit']").attr('disabled','disabled');
				$.ajax({
					method: 'POST',
					url: 'ajax/sendmail.php',
					data: {'recv':$(this).find('#receiver').val(),'subj':$(this).find('#subject').val(),'body':$(this).find('#mail-body').val()},
					success: function(data){
						if(data["success"]){
							remove_isk_mailform(item);
							set_finished_payments(payments[1]);
							var alt=$('#art').append('<div class="alert alert-success alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Mail Sent! Mail-ID:'+data["return"]+'</div>')
							alt.alert();
						}else{
							var alt=$('#art').append('<div class="alert alert-danger alert-dismissable" role="alert" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+data["return"]+'</div>')
							alt.alert();
							form.find("button[type='submit']").removeAttr('disabled');
						}
					},
					complete: function(){
						window.setTimeout(function(){
							$('#art > .alert:first-child').alert('close');
						},10000);
					}
				})
			})
		},
		complete: function(){
			$('form#isk_mail_form').find('button#back').click(function() {
				remove_isk_mailform(item);
			});
		}
	})
}

function hide_isk_table(){
	$("table#isksrp-table").hide(350);
	$("span#payments-cached-date").hide(350);
	$("button#isk_refresh_button").hide(350);
	$("span#isk_helpblock").hide(350);
}

function remove_isk_mailform(item){
	$("form#isk_mail_form").remove();
	$("table#isksrp-table").show(350);
	$("span#payments-cached-date").show(350);
	$("button#isk_refresh_button").show(350);
	$("span#isk_helpblock").show(350);
	$('#'+item.id).on('click',function(){
		$('#'+item.id).off('click');
		isksrp_ajax_mailform(item);
	});
}

function set_finished_payments(ids){
	$.ajax({
		url: 'ajax/set_payments_finished.php',
		type: 'GET',
		data: {"paymentids": ids},
		complete: function(){
			mark_finished_payments();
		}
	})
}

function mark_finished_payments(){
	$.ajax({
		url: 'ajax/get_payments_finished.php',
		type: 'GET',
		success: function(payments){
			for(var id in payments){
				$('table#isksrp-table > tbody > tr#'+payments[id]).addClass('success');
			}
		}
	})
}

function receiver_payments(assignee){
	var payments_string = '';
	var paymentids = [];
	$("table#isksrp-table > tbody > tr > td:nth-child(2)").each(function(){
		if($(this).text()==mem[assignee]&&!$(this).parent().hasClass("success")){
			if($(this).parent().children("td:nth-child(5)")!=''){
				payments_string=payments_string.concat($(this).parent().children("td:nth-child(5)").text()+": ");
			} else {
				payments_string=payments_string.concat("[Payment reason not recorded]: ");
			}
			var iskvalue = +($(this).parent().children("td:nth-child(4)").text())*(-1)/1000000;
			payments_string=payments_string.concat(iskvalue.toString()+" Million\n");
			paymentids.push(+($(this).parent().children("td:nth-child(1)").text()));
		};
	});
	return [payments_string,paymentids];
}