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


    <li>
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
          //description

 <br>
  <br>
  <br>
  <br>
  <br>

          //liste des utilisateurs
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
        });
      }

      window.setInterval(getMessages, 2000);
    </script>

    <script>
      $('#your_div_id').scrollTop($('#your_div_id')[0].scrollHeight);
    </script>

  </body>
</html>