<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sth = $dbh->prepare('SELECT * FROM chatroom WHERE id ='. $id);
	$sth->execute();
	$chatroom = $sth->fetch(PDO::FETCH_ASSOC);
} else {
	$chatroom = null;
}