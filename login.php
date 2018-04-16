<?php
$title = "Home";
$description = "Ma description";
?>

<?php include_once("php/db.php"); ?>
<?php include_once("layout/head.php"); ?>
<?php include_once("server.php"); ?>

<body id="home"> 

  <section class="fdb-block" id="first">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
          <div class="fdb-box fdb-touch">
            <div class="row">
              <div class="col">
                <h1>Come back on<br><span>Link🗡Us</span></h1>
              </div>
            </div>
            <form method="post" action="login.php">
              <div style="color: #d43c3c;>"><?php include('errors.php'); ?></div>
              <div class="row mt-4">
                <div class="col">
                 <div class="input-group">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
               <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <div class="input-group">
                <button type="submit" class="btn" name="login_user">Submit</button>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <p class="text-left"><a href="register.php" style="color: white">Not yet a member ?</a></p>
            </div>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>
</section>

</body>

<?php include_once("layout/footer.php"); ?>