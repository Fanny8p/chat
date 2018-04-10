<?php
$title = "Details";
$description = "Details of chatroom";
?>

<?php include_once("layout/header.php");?>

<!--ON RECUPERE LA CHATROOM-->
<?php include_once("php/get_chatroom.php");?>


  <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" href="room.php?id=<?php echo $chatroom['id']; ?>"><i style="color: #00dfa8" class="fas fa-times"></i></a>
  </li>
  </ul>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-6 text-center">
        <div class="head_details">
          <h1>Room</h1>
          <h1 style="color: #00dfa8;">"<?php echo $chatroom['name']; ?>"</h1>
          <hr>
        </div>
  			<textarea class="form-control" aria-label="With textarea" value="<?php echo $chatroom['description']; ?>" placeholder="Chatroom's description" name="description" id="description" required></textarea>
    
        <p class="text-h3 mt-5">    
          <div class="form-group">
            <input class="btn btn-primary" type="submit">
          </div>
        </p>

<hr>
  <h2>Delette the room</h2>
    <p class="text-h3 mt-5">    
      <div class="form-group">
        <?php if($_SESSION['id'] === $chatroom['owner_id']) { ?>
        <form action="php/delete_room.php" method="post">
          <input type="hidden" name="id" value="<?php echo $chatroom['id']; ?>">
          <button type="submit">Delette</button>
        </form>
        <?php } ?>

      </div>
    </p>
      </div>
    </div>
  </div>

</body>
</html>