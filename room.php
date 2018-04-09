<?php
$title = "Ma chatroom";
$description = "Ma description";
?>

<?php include_once("layout/header.php"); ?>

<?php include_once("php/get_messages.php"); ?>
<div class="container">
  <ul id="pouf">
  <?php foreach ($messages as $message) { ?>

<?php $emoji_replace = array(':)',':-)','(angry)',':3',":'(",':|',':(',':-(', ';)',';-)');
      $emoji_new = array('<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_angry.png"/>','<img src ="emojis/emo_cat.png"/>','<img src ="emojis/emo_cry.png"/>','<img src ="emojis/emo_noreaction.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_wink.png"/>','<img src ="emojis/emo_wink.png"/>');
      $message['message'] = str_replace($emoji_replace, $emoji_new, $message['message']); ?>


    <li>
      <p><?php echo $message['message']; ?></p>
      <small>écrit par <?php echo $message['username']; ?> a <?php echo $message['time']; ?></small>
      </li>
      <hr>
  <?php } ?>
  </ul>



  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>


    <form id="messageForm" method="post" action="php/send_message.php">
      <input id="message" name="message" type="text">
      <input id="chatroom_id" name="chatroom_id" type="hidden" value="<?php echo $_GET["id"]?>" >
      <input id="send" type="submit" value="Send">
      <div id="serverRes"></div>
    </form>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      function getMessages(){
        $.ajax({
        url:"php/refresh.php?id=<?php echo $chatroom_id ?>"
        })
        .done(function(response){
          $("#pouf").html(response);
        });
      }

      window.setInterval(getMessages, 500);
    </script>

  </body>
</html>