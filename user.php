<?php
$title = "My Profile";
$description = "Define our profile";
?>

<?php include_once("layout/header.php"); ?>


<!--ON RECUPERE L UTILISATEUR-->
<?php include_once("php/get_user.php"); ?>

<div class="container">
		
	
	<h1>Page d'edition</h1>
	
	<br>
	<br>

	<form action="php/user_update.php" method="POST" enctype="multipart/form-data" style="max-width: 600px; width: 100%; margin: auto;">

		<div class="form-group">
			<label for="input_image"></label>
			<button id="change_avatar">
				<img src="image/<?php echo $user['image']; ?>" alt="Avatar de <?php echo $user['username']; ?>" style="width:200px">
			</button>
		    <input type="file" name="avatar" id="input_image" style="display: none">
		</div>

		<div class="form-group">
			<label for="name">Pseudo</label>
			<input type="text" class="form-control" value="<?php echo $user['username']; ?>" name="name" id="name" required>
		</div>

		<div class="form-group">
			<label for="first-name">First Name</label>
			<input type="text" class="form-control" value="<?php echo $user['firstname']; ?>" placeholder="firstname" name="firstname" id="first-name" required>
		</div>

		<div class="form-group">
			<label for="lastname">Last Name</label>
			<input type="text" class="form-control" value="<?php echo $user['lastname']; ?>" placeholder="lastname" name="lastname" id="lastname" required>
		</div>

		<div class="form-group">
			<label for="birthday">Date de naissance</label>
			<input type="date" class="form-control" value="<?php echo $user['birthday']; ?>" placeholder="birthday" name="birthday" id="birthday">
		</div>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" class="form-control" value="<?php echo $user['city']; ?>" placeholder="city" name="city" id="city">
		</div>

		<div class="form-group">
			<label>ZIP Code</label>
			<input type="text" pattern="[0-9]{5}" class="form-control" value="<?php echo $user['zipcode']; ?>" placeholder="zipcode" name="zipcode" id="zipcode">
		</div>


		<div class="form-group">
		    <input class="btn btn-primary" type="submit">
		</div>

	</form> 

</div>


<script>
	$(document).ready(function(){
		//ON SIMULE UN CLICK SUR L'INPUT FILE
		$('#change_avatar').on('click', function(e){
			e.preventDefault();
			$('#input_image').click();
		});

		//ON RECUPERE LE FICHIER TEMP ET L'AFFICHE
		$('#input_image').on('change', function(e){
			$path = window.URL.createObjectURL(this.files[0]);
			$('#change_avatar img').attr('src', $path);
		});
	});
</script>


</body>
</html>