function submit_a(){
	$(function (){
		$(this).submit(function(e) {
			e.preventDefault();
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