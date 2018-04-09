<?php
//ON DEMMARE LA SESSION
include('session_start.php');

//CONNECTION BDD
include('db.php');

//SELECT USER BY ID
include('get_auth_user.php');

//GET FORM VALUES
$pseudo = $_POST['name'];
$birthday = $_POST['birthday'];
$avatar = $_FILES['avatar']['name'];

//MOVE IMAGE TO SERVER FOLDER
move_uploaded_file($_FILES['avatar']['tmp_name'], "../image/$name");

//UPDATE USER INFORMATIONS
$stmt = $dbh->prepare('UPDATE users SET 
	username = :pseudo, 
	birthday = :birthday, 
	image = :avatar 
 WHERE id ='. $id);
$stmt->bindParam(":pseudo", 	$pseudo);
$stmt->bindParam(":birthday", 	$birthday); 
$stmt->bindParam(":avatar", 	$avatar);
$result = $stmt->execute();

//REDIRECT TO PROFIL
header('Location: ../user.php?id='. $user['id']);