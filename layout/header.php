
<?php 
/*
$db = mysqli_connect('localhost', 'root', 'root', 'chat');

$name = "";
$errors = array(); 

// envoie nom de la room
if(!empty($_POST)){
$name = mysqli_real_escape_string($db, $_POST['name']);

if (empty($name)) {
  array_push($errors, "name is required");
}

if (count($errors) == 0) {
  $query = "INSERT INTO chatroom (name) 
  VALUES('$name')";
mysqli_query($db, $query) or die(mysqli_error ($db));
}
}
// on crée la requête SQL 

$sql = 'SELECT name FROM chatroom'; 

// on envoie la requête 

$req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 
*/
?> 


<?php include('./php/db.php'); ?>
<?php include('./php/session_start.php'); ?>


<!doctype html>
<html>
  <head>
  <?php include_once('head.php'); ?>
  </head>
  <body>
    <header>
      <?php include_once('navbar.php'); ?>
    </header>
    <main>