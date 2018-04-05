
<?php 

$db = mysqli_connect('localhost', 'root', 'root', 'chat');

$name = "";
$errors = array(); 

// envoie nom de la room
if(!empty($_POST)){
$name = mysqli_real_escape_string($db, $_POST['name']);

if (empty($name)) {
  array_push($errors, "name is required");
}

if (count($errors) == 0) {
  $query = "INSERT INTO chatroom (name) 
  VALUES('$name')";
mysqli_query($db, $query) or die(mysqli_error ($db));
}
}
// on crée la requête SQL 

$sql = 'SELECT name FROM chatroom'; 

// on envoie la requête 

$req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_error($db)); 

?> 
<div class="navbar">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
            <p><strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?></a>
  <?php

while($data = mysqli_fetch_assoc($req)) 

    { 

    // on affiche les informations de l'enregistrement en cours 

    echo'<a style="color:white; font-size: 1em;">'.$data['name'].'</a>'; 

    }
    ?>

      
     <form id="messageForm" method=post>
       <input id="name" name="name" type="text">
       <input id="send" type="submit" value="Send">
       <div id="serverRes"></div>
   
   </form>
   

</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()"><div style="color:tomato;"><i class="fas fa-bars"></i></i></div></span>

<!-- Boostrap -->
<ul class="nav nav-pills">
<li class="nav-item">
  <a style="color:white;" class="nav-link" href="#"></a>
</li>

    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">View members</a>
      <a class="dropdown-item" href="#">Add members to room</a>
      <a class="dropdown-item" href="#">Leave the room</a>
      <a class="dropdown-item" href="#">Account setting</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="index.php?logout='1" style="color:red;">logout</a>
    </div>
  </li>
</ul>
</div>