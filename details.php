<?php
$title = "Details";
$description = "Details of chatroom";
?>

<?php include_once("layout/header.php");?>

<!--ON RECUPERE LA CHATROOM-->
<?php include_once("php/get_chatroom.php");?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-6 text-center">
        <h1>Chatroom : <?php echo $chatroom['name']; ?></h1>
  			<textarea class="form-control" aria-label="With textarea" value="<?php echo $chatroom['description']; ?>" placeholder="Chatroom's description" name="description" id="description" required></textarea>
        <p class="text-h3 mt-5">		
        	<div class="form-group">
		    <input class="btn btn-primary" type="submit">
			</div>
		</p>
      </div>
    </div>
  </div>

</body>
</html>