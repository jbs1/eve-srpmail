var mem;
$(function (){
	$.ajax({
		type: 'GET',
		url: 'ajax/corp-mem.php',
		beforeSend: function(){
			loader_start("CORP</br>MEMBERS",1);
		},
		success: function(data){
			mem = data;
		},
		complete: function(){
			$('table#rej-table').trigger('update-mem');
			$('table#resub-table').trigger('update-mem');
			loader_stop(1);
		}
	});

});