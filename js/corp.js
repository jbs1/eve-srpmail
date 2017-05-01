var mem;
$(function (){
	$.ajax({
		type: 'GET',
		url: 'ajax/corp-mem.php',
		success: function(data){
			mem = data;
		}
	});
});