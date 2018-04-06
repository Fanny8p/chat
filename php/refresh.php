<?php 
 $chatroom_id = $_GET["id"];
 
 //afficher un message sur le tchat
 $db = mysqli_connect('localhost', 'root', 'root', 'chat');
 
// on crée la requête SQL 
$sql = "SELECT message.message, message.time, users.username FROM message JOIN users ON users.id = message.user_id WHERE chatroom_id=$chatroom_id"; 

// on envoie la requête 
$req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 

// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysqli_fetch_assoc($req)) 
    { 
    // on affiche les informations de l'enregistrement en cours 
    echo'<div>'.$data['time'].'</div>'; 
    echo'<div>'.$data['username'].'</div>';
    echo'<div><b>'.$data['message'].'</b></div>';
    } 

?> 