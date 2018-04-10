<?php
include ('db.php');
//Tu recuperes l'id de la chatroom
$id = $_POST["id"];
//Requete SQL pour supprimer la chatroom dans la base
$sth = $dbh->prepare("DELETE FROM chatroom WHERE id = :id");
$sth->bindParam(":id",$id);
$sth->execute();

/*REDIRECT*/
header('Location: ../index.php?id='. $user['id']);