<?php 
//on recoit une url du type refresh.php?id=17&dernier=78

 $chatroom_id = $_GET["id"];
 $dernier = $_GET["dernier"];
 
 //afficher un message sur le tchat
include ("db.php");
 
// on crée la requête SQL 
$sql = "SELECT message.id, message.message, message.time, users.username FROM message JOIN users ON users.id = message.user_id WHERE chatroom_id=:chatroom_id AND message.id>:dernier";

$stmt= $dbh->prepare($sql);
$stmt->bindParam(":chatroom_id", $chatroom_id);
$stmt->bindParam(":dernier", $dernier);
$stmt->execute();

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// on fait une boucle qui va faire un tour pour chaque enregistrement 
foreach ($messages as $message) { ?>
  
  <?php $emoji_replace = array(':)',':-)','(angry)',':3',":'(",':|',':(',':-(', ';)',';-)');
        $emoji_new = array('<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_angry.png"/>','<img src ="emojis/emo_cat.png"/>','<img src ="emojis/emo_cry.png"/>','<img src ="emojis/emo_noreaction.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_wink.png"/>','<img src ="emojis/emo_wink.png"/>');
        $message['message'] = str_replace($emoji_replace, $emoji_new, $message['message']); ?>
  
  
  <li data-id="<?php echo $message['id']; ?>">
        <small>écrit par <?php echo $message['username']; ?> a <?php echo $message['time']; ?></small>
        <p><?php echo $message['message']; ?></p>
        </li>
        <hr>
    <?php }