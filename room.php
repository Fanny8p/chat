<?php
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
    $stmt= $dbh->prepare($query);
    VALUES('$message', '$time' , '$chatroom_id')";
    $query = "INSERT INTO message (message,time,chatroom_id) 
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

// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysqli_fetch_assoc($req)) 
    { 
    // on affiche les informations de l'enregistrement en cours 
    echo'<div>'.$data['time'].'</div>'; 
    echo'<div><b>'.$data['username'].'</b></div>';
    echo'<div><b>'.$data['message'].'</b></div>';
   
    } 

?> 

  <form id="messageForm" method=post>
    <input id="message" name="message" type="text">
    <input id="send" type="submit" value="Send">
    <div id="serverRes"></div>

</form>

<?php include_once("layout/footer.php"); ?>
