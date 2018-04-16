<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sth = $dbh->prepare('SELECT users.username, users.image, chatroom.* FROM chatroom join users on chatroom.owner_id=users.id WHERE chatroom.id ='. $id);
	$sth->execute();
	$chatroom = $sth->fetch(PDO::FETCH_ASSOC);
} else {
	$chatroom = null;
}