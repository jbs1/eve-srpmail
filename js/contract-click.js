$(function (){
	$('table#cont-table > tbody > tr').click(function () {
		console.log("bla");
		$.ajax({
			type: 'GET',
			url: 'ajax/contract-form.php',
			success: function(data){
				$('#accept').html(data);
			}
		})
	})
});