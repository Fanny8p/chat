<?php
$id = $_GET['id'];

$sth = $dbh->prepare("SELECT message.id, message.message, message.time, users.username FROM message JOIN users ON users.id = message.user_id WHERE chatroom_id = $id");
$sth->execute();
$messages = $sth->fetchAll(PDO::FETCH_ASSOC);