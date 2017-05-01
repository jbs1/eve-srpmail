$(function (){
	$('#cont-table > tbody > tr').click(function () {
		$.ajax({
			type: 'GET',
			url: 'ajax/contract-form.php',
			success: function(data){
				$('#accept').html(data);
			}
		})
	})
});