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
			loader_stop(1);
		}
	});

});


function get_charname(non_corp_char) {
	$.ajax({
		type: 'POST',
		url: 'ajax/get_charnames.php',
		data: {"charid":[non_corp_char]},
		success: function(data){
			mem = {...mem,...data};//concat global object
			$("td."+non_corp_char).html(mem[non_corp_char]);
		}
	});
};