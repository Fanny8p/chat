<?php
//SELECT USER BY ID
include('get_auth_user.php');

$name = "";
$errors = array();
$owner_id = $_SESSION["user_id"];

if(!empty($_POST)){
$name = $_POST['name'];

if (empty($name)) {
  array_push($errors, "name is required");
}

if (count($errors) == 0) {
  $query = "INSERT INTO chatroom (name, owner_id)
  VALUES(:name, :owner_id)";
$stmt= $dbh->prepare($query);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":owner_id", $owner_id);
$stmt->execute();
}
}
