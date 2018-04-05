<?php
$name = "";
$errors = array(); 

if(!empty($_POST)){
$name = $_POST['name'];

if (empty($name)) {
  array_push($errors, "name is required");
}

if (count($errors) == 0) {
  $query = "INSERT INTO chatroom (name) 
  VALUES('$name')";
$stmt= $dbh->prepare($query);
$stmt->execute();
}
}
