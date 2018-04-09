<?php
//ON DEMMARE LA SESSION
include('session_start.php');

//CONNECTION BDD
include('db.php');

//SELECT USER BY ID
include('get_auth_user.php');

//GET FORM VALUES
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$city = $_POST['city'];
$pseudo = $_POST['name'];
$avatar = $_FILES['avatar']['name'];


//MOVE IMAGE TO SERVER FOLDER
move_uploaded_file($_FILES['avatar']['tmp_name'], "../image/$name");

//UPDATE USER INFORMATIONS
$stmt = $dbh->prepare('UPDATE users SET  
	firstname = :firstname,
	lastaname = :lastaname, 
	birthday = :birthday,
	city = 	:city,  
	username = :pseudo,
	image = :avatar
 WHERE id ='. $id);
$stmt->bindParam(":firstname", 	$firstname); 
$stmt->bindParam(":lastname", 	$lastname); 
$stmt->bindParam(":birthday", 	$birthday);
$stmt->bindParam(":city", 		$city); 
$stmt->bindParam(":pseudo", 	$pseudo);
$stmt->bindParam(":avatar", 	$avatar);
$result = $stmt->execute();

//REDIRECT TO PROFIL
header('Location: ../user.php?id='. $user['id']);