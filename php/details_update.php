<?php
//ON DEMMARE LA SESSION
include('session_start.php');

//CONNECTION BDD
include('db.php');

//GET FORM VALUES
$description = $_POST['description'];
$id = $_POST['chatroom_id'];

//UPDATE CHATROOMS INFORMATIONS
$stmt = $dbh->prepare('UPDATE chatroom SET 
	description = :description
	WHERE id = '. $id);
$stmt->bindParam(":description", 	$description);
$result = $stmt->execute();

//REDIRECT TO PROFIL
header('Location: ../details.php?id='. $id);