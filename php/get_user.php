<?php
$id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM users WHERE id ='. $id);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);