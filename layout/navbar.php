<nav class="navbar">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
      <li>
          <?php  if (isset($_SESSION['username'])) : ?>
                  <a href="user.php?id=<?php echo $_SESSION['user_id']; ?>">
                    <img class="nav_profil_img" src="image/<?php echo $user['image']; ?>" style="width:100%; display:; block;">
                    <strong><?php echo $_SESSION['username']; ?></strong>
                  </a>
          <?php endif ?>
      <li>

  <?php include('./php/insert_chatroom.php'); ?>
  <?php include('./php/get_chatrooms.php'); ?>
  <?php foreach($chatrooms as $chatroom){ ?>
      <li>
        <a href="room.php?id=<?php echo $chatroom['id']; ?>" style="color:white; font-size: 1em;"><?php echo $chatroom['name']; ?></a>
      </li>
    <?php } ?>

    </ul>
      <hr>

      <form class="input_room" id="messageForm" method=post>
        <input id="name" name="name" type="text">
        <input id="send" type="submit" value="Send">
        <div id="serverRes"></div>
      </form>
</div>
<!-- Use any element to open the sidenav -->
<span onclick="openNav()"><div style="color:#528bff;"><i class="fas fa-bars"></i></i></div></span>


  <!-- Boostrap -->
  <ul class="nav nav-pills">
    <li class="nav-item">
      <?php include('./php/get_chatroom.php'); ?>
      <a style="color:#00dfa8; font-weight: 800;" class="nav-link" href="details.php?id=<?php echo $chatroom['id']; ?>"><?php echo $chatroom['name']; ?><i style="padding-left: 5px" class="fas fa-info-circle"></i></a>
    </li>
    <li class="nav-item">
      <a style="color:#818181;" class="nav-link" href="index.php">Accueil</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Add members to room</a>
        <a class="dropdown-item" href="#">Leave the room</a>
        <a class="dropdown-item" href="#">Account setting</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="index.php?logout='1" style="color:white;">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>