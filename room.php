<?php
ini_set("display_errors",1);
session_start();
$title = "";
$description = "Ma description";
var_dump($_SESSION);
?>

<?php include_once("layout/header.php"); ?>
<?php

 $chatroom_id = $_GET["id"];
 $user_id = $_SESSION["user_id"];
    // initializing variables
$message = "";
$time    = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'chat');

if(!empty($_POST)){
// SEND IN THE DB

  $message = $_POST['message'];
  $time = date("Y-m-d H:i");
  if (empty($message)) {
  	array_push($errors, "message is required");
  }
 
  if (count($errors) == 0) {
    $query = "INSERT INTO message (message,time,chatroom_id,user_id) 
 
    VALUES('$message', '$time' , '$chatroom_id' , '$user_id')";
 
    $stmt= $dbh->prepare($query);
    $stmt->execute();
}
}
?>

<?php 
 //afficher un message sur le tchat

// on crée la requête SQL 
$sql = "SELECT message.message, message.time, users.username FROM message JOIN users ON users.id = message.user_id WHERE chatroom_id=$chatroom_id"; 

// on envoie la requête 
$req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
?>
<div id=pouf>
<?php
// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysqli_fetch_assoc($req)) 
    { $emoji_replace = array(':)',':-)','(angry)',':3',":'(",':|',':(',':-(', ';)',';-)');
      $emoji_new = array('<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_angry.png"/>','<img src ="emojis/emo_cat.png"/>','<img src ="emojis/emo_cry.png"/>','<img src ="emojis/emo_noreaction.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_wink.png"/>','<img src ="emojis/emo_wink.png"/>');
      $data['message'] = str_replace($emoji_replace, $emoji_new, $data['message']);
    // on affiche les informations de l'enregistrement en cours 
    echo'<div>'.$data['time'].'</div>'; 
    echo'<div>'.$data['username'].'</div>';
    echo'<div><b>'.$data['message'].'</b></div>';
    } 

?> 
</div>
  <form id="messageForm" method=post>
    <input id="message" name="message" type="text">
    <input id="send" type="submit" value="Send">
    <div id="serverRes"></div>
  </form>


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
