function loader_start (text,id){
	$('tr#row_loader').append('<td id="td_loader_'+id+'"><div id="loader_'+id+'" class="loader"></div></td>');
	$('tr#row_text').append('<td id="td_loader_text_'+id+'" class="loader-text">'+text+'</td>');
}

function loader_stop (id){
	$('#loader_'+id).css({
		"border-color": '#14B61B',
		animation: 'none'
	});
	$('#td_loader_text_'+id).css('color', '#14B61B');
	$('#td_loader_'+id).delay(2000).queue(function(){$(this).remove()});
	$('#td_loader_text_'+id).delay(2000).queue(function(){$(this).remove()});
}