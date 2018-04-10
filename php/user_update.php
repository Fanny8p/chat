<?php
//ON DEMMARE LA SESSION
include('session_start.php');

//CONNECTION BDD
include('db.php');

//SELECT USER BY ID
include('get_auth_user.php');

//GET FORM VALUES
$avatar = $_FILES['avatar']['name'];
$pseudo = htmlspecialchars($_POST['name']);
$birthday = htmlspecialchars($_POST['birthday']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$city = htmlspecialchars($_POST['city']);
$zipcode = htmlspecialchars($_POST['zipcode']);


//MOVE IMAGE TO SERVER FOLDER
move_uploaded_file($_FILES['avatar']['tmp_name'], "../image/$avatar");

//UPDATE USER INFORMATIONS
$stmt = $dbh->prepare('UPDATE users SET 
	image = :avatar, 
	username = :pseudo, 
	birthday = :birthday,
	firstname = :firstname,
	lastname = :lastname,	
	city = :city, 
	zipcode = :zipcode 

 WHERE id ='. $id);
$stmt->bindParam(":avatar", 	$avatar);
$stmt->bindParam(":pseudo", 	$pseudo);
$stmt->bindParam(":birthday", 	$birthday); 
$stmt->bindParam(":firstname", 	$firstname);
$stmt->bindParam(":lastname", 	$lastname); 
$stmt->bindParam(":city", 	$city); 
$stmt->bindParam(":zipcode", 	$zipcode); 

$result = $stmt->execute();

//REDIRECT TO PROFIL
header('Location: ../user.php?id='. $user['id']);