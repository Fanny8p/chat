<?php
$sth = $dbh->prepare("SELECT * FROM chatroom");
$sth->execute();
$chatrooms = $sth->fetchAll(PDO::FETCH_ASSOC);