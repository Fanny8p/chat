<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"

<script>
	function getMessages(){
		$ajax({
		url:"test.php"
		})
		.done(function(response){
			$(#"pouf").html(response);
		});
	}

	window.setInterval(getMessage, 500);
		</script>