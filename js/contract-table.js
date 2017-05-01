//save members in global js variable, session caching is done at the endpoint
$(function (){
	$('a[data-toggle="tab"][href="#accept"]').on('shown.bs.tab', function (e) {
		$.ajax({
			type: 'GET',
			url: 'ajax/contracts.php',
			success: function(data){
				console.log('Contracts',data);
				$.each(data,function(i, item){
					var flag = 0;
					$("table#cont-table > tbody > tr > td:eq(0)").each(function(){
						if($(this).text() == item["@attributes"].contractID){
							flag = 1;
						}
					});
					if(flag==0){
						var row = $("table#cont-table > tbody").append("<tr id="+item["@attributes"].contractID+"><td>"+item["@attributes"].contractID+"</td><td>"+mem[item["@attributes"].assigneeID]+"</td><td>"+item["@attributes"].dateIssued+"</td><td>"+item["@attributes"].status+"</td></tr>")
						row.children('#'+item["@attributes"].contractID).click(function () {
							$.ajax({
								type: 'GET',
								url: 'ajax/contract-form.php',
								data: {"contid":item["@attributes"].contractID,"station":item["@attributes"].startStationID, "assignee":item["@attributes"].assigneeID},
								success: function(data){
									$("table#cont-table").hide(350);
									var form=$('#accept').append(data);
									form.children('.contrfrm > form').submit(function(event) {
										type: 'POST',
										url: 'form/accept.php'
										data: $(this).serialize(),
										success: function(data){
											$('#accept').append(data);
										}
									});


								}
							})
						})
					}
				});
			}
		})
	})
});