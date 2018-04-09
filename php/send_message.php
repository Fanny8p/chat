
<?php
session_start();
 $chatroom_id = $_POST["chatroom_id"];
 $user_id = $_SESSION["user_id"];
    // initializing variables
$message = "";
$time    = "";
$errors = array(); 
// connect to the database
include("db.php");

if(!empty($_POST)){
// SEND IN THE DB

  $message = $_POST['message'];
  $time = date("Y-m-d H:i");
  if (empty($message)) {
    array_push($errors, "message is required");
  }
 
  if (count($errors) == 0) {
    $query = "INSERT INTO message (message,time,chatroom_id,user_id) 
 VALUES(:message, :time , :chatroom_id , :user_id)";
 
    $stmt= $dbh->prepare($query);
    $stmt->bindParam(":message", $message);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":chatroom_id", $chatroom_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
}
}

header('Location: ../room.php?id='. $chatroom_id);
?>