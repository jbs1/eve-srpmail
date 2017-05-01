function submit_a(e){
	e.preventDefault();
	$(function (){
		$(this).submit(function() {
			$.ajax({
				method: 'POST',
				url: 'form/accept.php',
				data: $(this).serialize(),
				success: function(data){
					alert(data);
				}
			})
		})
	})
}