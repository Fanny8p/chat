<?php include("layout/head.php"); ?>
<?php include('server.php') ?>
    
</head>
<body id="home"> 

<section class="fdb-block" id="first">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
        <div class="fdb-box fdb-touch" id="register">
          <div class="row">
            <div class="col">
              <h1>Register</h1>
            </div>
          </div>
           <form method="post" action="register.php">
    <?php include('errors.php'); ?>
          <div class="row mt-4">
            <div class="col">
               <div class="input-group">
                <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username">
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
               <div class="input-group">
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">
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
                  <button type="submit" class="btn" name="reg_user">Register</button>
                 </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <p class="text-left"><a href="login.php" style="color: white">Already a member ?</a></p>
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