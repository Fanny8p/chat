<?php
$sth = $dbh->prepare("SELECT * FROM users");
$sth->execute();
$users = $sth->fetchAll(PDO::FETCH_ASSOC);