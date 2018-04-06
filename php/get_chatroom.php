<?php
$id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM chatroom WHERE id ='. $id);
$sth->execute();
$chatroom = $sth->fetch(PDO::FETCH_ASSOC);