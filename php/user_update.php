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

//UPDATE USER INFORMATIONS
$PDOStatement = $dbh->prepare("UPDATE users SET pseudo = :pseudo, birthday = :birthday, avatar = :avatar WHERE id ='. $id");
$PDOStatement->bindParam(":pseudo", $pseudo);
$PDOStatement->bindParam(":birthday", $birthday); 
$PDOStatement->bindParam(":avatar", $avatar);

$PDOStatement->execute(); // Cette méthode retourne true ou false, indiquant si la requête a exécuté.

//REDIRECT TO PROFIL -->
header('Location: ../user.php?id='. $user['id']);
