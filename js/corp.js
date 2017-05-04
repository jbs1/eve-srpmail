var mem;
$(function (){
	$.ajax({
		type: 'GET',
		url: 'ajax/corp-mem.php',
		success: function(data){
			mem = data;
		},
		complete: function(){
			$('table#rej-table').trigger('update-mem');
			$('table#resub-table').trigger('update-mem');
		}
	});
});