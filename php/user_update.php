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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$avatar = $_FILES['avatar']['name'];

//MOVE IMAGE TO SERVER FOLDER
move_uploaded_file($_FILES['avatar']['tmp_name'], "../image/$name");

//UPDATE USER INFORMATIONS
$stmt = $dbh->prepare('UPDATE users SET 
	username = :pseudo, 
	birthday = :birthday,
	firstname = :firstname,
	lastname = :lastname,	
	city = :city, 
	zipcode = :zipcode, 
	image = :avatar 
 WHERE id ='. $id);
$stmt->bindParam(":pseudo", 	$pseudo);
$stmt->bindParam(":birthday", 	$birthday); 
$stmt->bindParam(":firstname", 	$firstname);
$stmt->bindParam(":lastname", 	$lastname); 
$stmt->bindParam(":city", 	$city); 
$stmt->bindParam(":zipcode", 	$zipcode); 
$stmt->bindParam(":avatar", 	$avatar);
$result = $stmt->execute();

//REDIRECT TO PROFIL
header('Location: ../user.php?id='. $user['id']);