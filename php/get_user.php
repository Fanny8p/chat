<?php
$id = $_SESSION['id'];
$sth = $dbh->prepare('SELECT * FROM users WHERE id ='. $id);
$sth->execute();
$user = $sth->fetch(PDO::FETCH_ASSOC);