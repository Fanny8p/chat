<?php
$title = "Room";
$description = "Ma description";
?>

<?php include_once("layout/header.php"); ?>
<?php include_once("php/get_chatroom.php"); ?>

<br>
<br>

<div class="container">
  <div class="receive_message">
  <h1>Chatroom : <?php echo $chatroom['name']; ?></h1>
  <hr>

  <?php include_once('php/get_messages.php'); ?>

  <?php foreach($messages as $message){ ?>
    <p><?php echo $message ?></p>
    <hr>
  <?php } ?>

  </div>

<br>
<br>
<br>
<br>

  <div class="send_message">  
    <form id="messageForm" action="php/send_message.php" method="POST">
      <input id="message" name="message" type="text">
      <input id="send" type="submit" value="Send">
      <div id="serverRes"></div>
    </form>
  </div>
</div>

<br>
<br>
<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	function getMessages(){
		$.ajax({
		url:"php/refresh.php?id=<?php echo $chatroom_id ?>"
		})
		.done(function(response){
			$("#pouf").html(response);
		});
	}

	window.setInterval(getMessages, 500);
</script>

<?php include_once("layout/footer.php"); ?>
