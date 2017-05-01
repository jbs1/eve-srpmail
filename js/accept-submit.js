function submit_a(){
	$(function (e){
		e.preventDefault()
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