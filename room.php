<?php
$title = "Ma chatroom";
$description = "Ma description";
?>

<?php include_once("layout/header.php"); ?>

<br>
<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-8">
<?php include_once("php/get_messages.php"); ?>
  <ul id="pouf" class="message_box">
  <?php foreach ($messages as $message) { ?>

<?php $emoji_replace = array(':)',':-)','(angry)',':3',":'(",':|',':(',':-(', ';)',';-)');
      $emoji_new = array('<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_smile.png"/>','<img src ="emojis/emo_angry.png"/>','<img src ="emojis/emo_cat.png"/>','<img src ="emojis/emo_cry.png"/>','<img src ="emojis/emo_noreaction.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_sad.png"/>','<img src ="emojis/emo_wink.png"/>','<img src ="emojis/emo_wink.png"/>');
      $message['message'] = str_replace($emoji_replace, $emoji_new, $message['message']); ?>


    <li data-id="<?php echo $message['id']; ?>">
      <hr>
      <small>écrit par <?php echo $message['username']; ?> a <?php echo $message['time']; ?></small>
      <p><?php echo $message['message']; ?></p>
      </li>

  <?php } ?>
  </ul>

  <hr>
    <form id="messageForm" method="post" action="php/send_message.php">
      <input id="message" name="message" type="text">
      <input id="chatroom_id" name="chatroom_id" type="hidden" value="<?php echo $_GET["id"]?>" >
      <input id="send" type="submit" value="Send">
      <div id="serverRes"></div>
    </form>
      </div>

        <div class="col-12 col-md-6 col-lg-4">

        <aside>
          <div class="room_details">
          <h1>Room</h1>
          <h1 style="color: #00dfa8;">"<?php echo $chatroom['name']; ?>"</h1>
          <hr>
          </div>
          <p><?php echo $chatroom['description']; ?></p>
          <div class="member_owner">
          <img src="image/<?php echo $user['image']; ?>" class="rounded-circle" alt="Avatar de <?php echo $user['username']; ?>">
          <p><?php echo $_SESSION['username']; ?> -owner</p>
          </div>

          <div class="users_room">
          <h2>Members list</h2>
          <div class="users_image">
          <?php include ("php/get_users.php"); ?>
          <?php foreach($users as $user){ ?>
          <img class="rounded-circle" src="image/<?php echo $user['image']; ?>" style="width: 50px;">
          </div>
          <div class="users_caption">
          <p><?php echo $user['username']; ?></p>
          <?php } ?>
          </div>
          </div>
        </aside>

        </div>
  </div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      function getMessages(){
        var dernier=$("#pouf li").last().attr("data-id");
        $.ajax({
        url:"php/refresh.php?id=<?php echo $_GET["id"] ?>&dernier="+dernier
        })
        .done(function(response){
          $("#pouf").append(response);
          var objDiv = $('#pouf');
    if (objDiv.length > 0){
        objDiv[0].scrollTop = objDiv[0].scrollHeight;
    }
        });
      }

      window.setInterval(getMessages, 2000);
    </script>



  </body>
</html>