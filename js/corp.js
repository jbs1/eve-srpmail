var mem;
$(function (){
	$.ajax({
		type: 'GET',
		url: 'ajax/corp-mem.php',
		beforeSend: function(){
			loader_start("Corp</br>Members",1);
		},
		success: function(data){
			mem = data;
		},
		complete: function(){
			$('table#messagessrp-table').trigger('update-mem');
			// $('table#isksrp-table').trigger('update-mem');
			loader_stop(1);
		}
	});

});