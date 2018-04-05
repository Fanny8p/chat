<?php
$title = "Accueil";
$description = "Ma description";
?>

<?php include_once("php/db.php"); ?>
<?php include_once("layout/head.php"); ?>
<?php include_once("server.php"); ?>

<div class="header">
    <h2>Login</h2>
</div>
  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php" style="color:red">Sign up</a>
    </p>
  </form>


<?php include_once("layout/footer.php"); ?>