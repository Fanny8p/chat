<?php
$title = "Details";
$description = "Details of chatroom";
?>

<?php include_once("layout/header.php");?>

<!--ON RECUPERE LA CHATROOM-->
<?php include_once("php/get_chatroom.php");?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-6 text-center">
        <div class="head_details">
          <h1>Room</h1>
          <h1 style="color: #00dfa8;">"<?php echo $chatroom['name']; ?>"</h1>
          <hr>
        </div>
  			<p><?php echo $chatroom['description']; ?></p>
        <div class="member_owner">
          <img src="image/<?php echo $user['image']; ?>" class="rounded-circle" alt="Avatar de <?php echo $user['username']; ?>">
          <p><?php echo $_SESSION['username']; ?> - admin?</p>
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
<!--         <p class="text-h3 mt-5">    
  <div class="form-group">
            <input class="btn btn-primary" type="submit">
          </div>
        </p> -->
        </div>
    </div>
  </div>
</div>

</body>
</html>