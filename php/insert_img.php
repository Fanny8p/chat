<?php
$errors = array();  
  // Create database connection
  $db = mysqli_connect("localhost", "root", "root", "chat");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    // picture file directory
    $target = "picture/".basename($picture);

    $sql = "INSERT INTO users (picture) VALUES ('$picture')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
      $msg = "picture uploaded successfully";
    }else{
      $msg = "Failed to upload picture";
    }
  }
  $result = mysqli_query($db, "SELECT picture FROM users");
?>