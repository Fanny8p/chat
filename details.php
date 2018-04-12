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
        <h1 style="color: #00dfa8;"> Room <br> "<?php echo $chatroom['name']; ?>"</h1>
        <hr>
      </div>



      <form action="php/details_update.php" method="POST">
        <div class="form-group">
          <textarea class="form-control" aria-label="With textarea" placeholder="Chatroom's description" name="description" id="description" required><?php echo $chatroom['description']; ?></textarea>
          <input type="hidden" name="chatroom_id" value="<?php echo $chatroom['id']?>" required> 
        </div>

        <div class="form-group">
          <input class="btn btn-primary" type="submit">
        </div>
      </form>

      <div class="admin">
        <?php if($_SESSION['id'] === $chatroom['owner_id']) { ?>
        <hr>
        <h2>Delete the room</h2>
        <form action="php/delete_room.php" method="post">
          <input type="hidden" name="id" value="<?php echo $chatroom['id']; ?>">
          <button class="btn btn-round delete" type="submit">The End ➤</button>
        </form>
        <?php } ?>

      </div>
    </p>
  </div>
</div>
</div>

</body>
</html>