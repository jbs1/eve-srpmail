function hull_table_refresh(){
	$.ajax({
		type: 'GET',
		url: 'ajax/get_contracts.php',
		beforeSend: function(){
			loader_start("Contracts",2);
			$('#hull_refresh_button').attr('disabled','disabled');
		},
		success: function(data){
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
						var row = $("table#hullsrp-table > tbody").append("<tr id="+item.contract_id+"><td>"+item.contract_id+"</td><td>"+mem[item.assignee_id]+"</td><td>"+item.date_issued+"</td><td>"+item.start_location_id+"</td><td>"+item.status+"</td></tr>");
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
	var contracts=receiver_contracts(item.assignee_id);
	$.ajax({
		type: 'GET',
		url: 'ajax/mailform.php',
		data: {"assignee":item.assignee_id,"contract_string":contracts[0],"textid":0},
		success: function(data){
			hide_hull_table();
			var form=$('div#hullsrp').append(data).find('form#hull_mail_form');
			form.submit(function(e) {
				e.preventDefault();
				form.find("button[type='submit']").attr('disabled','disabled');
				$.ajax({
					method: 'POST',
					url: 'ajax/sendmail.php',
					data: {'recv':$(this).find('#receiver').val(),'subj':$(this).find('#subject').val(),'body':$(this).find('#mail-body').val()},
					success: function(data){
						if(data["success"]){
							remove_hull_mailform(item);
							set_finished_contracts(contracts[1]);
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
			$('form#hull_mail_form').find('button#back').click(function() {
				remove_hull_mailform(item);
			});
		}
	})
}

function hide_hull_table(){
	$("table#hullsrp-table").hide(350);
	$("span#contracts-cached-date").hide(350);
	$("button#hull_refresh_button").hide(350);
	$("span#hull_helpblock").hide(350);
}

function remove_hull_mailform(item){
	$('form#hull_mail_form').remove();
	$("table#hullsrp-table").show(350);
	$("span#contracts-cached-date").show(350);
	$("button#hull_refresh_button").show(350);
	$("span#hull_helpblock").show(350);
	$('#'+item.contract_id).on('click',function(){
		$('#'+item.contract_id).off('click');
		hullsrp_ajax_mailform(item);
	});
}

function set_finished_contracts(ids){
	$.ajax({
		url: 'ajax/set_contracts_finished.php',
		type: 'GET',
		data: {"contractids": ids},
		complete: function(){
			mark_finished_contracts();
		}
	})
}

function mark_finished_contracts(){
	$.ajax({
		url: 'ajax/get_contracts_finished.php',
		type: 'GET',
		success: function(contracts){
			for(var i in contracts){
				$('table#hullsrp-table > tbody > tr#'+contracts[i]).addClass('success');
			}
		}
	})
}

function receiver_contracts(assignee){
	var contracts_string = '';
	var contractids = [];
	$("table#hullsrp-table > tbody > tr > td:nth-child(2)").each(function(x,element){
		if($(element).text()==mem[assignee]&&!$(element).parent().hasClass("success")){
			$.ajax({
				url: "ajax/get_station.php",
				data: {"station":$(element).parent().children("td:nth-child(4)").text()},
				async: false,
				success: function(station){
					contracts_string=contracts_string.concat("<url=contract:"+station.system_id+"//"+$(element).parent().children("td:nth-child(1)").text()+">Contract</url> @ ");
					contracts_string=contracts_string.concat("<url=showinfo:"+station.type_id+"//"+station.station_id+">"+station.name+"</url>\n");
					contractids.push(+($(element).parent().children("td:nth-child(1)").text()));
				}
			})
		};
	});

	return [contracts_string,contractids];
}
