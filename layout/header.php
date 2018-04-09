<?php include('./php/db.php'); ?>
<?php include('./php/session_start.php'); ?>
<?php include_once("php/get_user.php"); ?>



<!doctype html>
<html>
  <head>
  <?php include_once('head.php'); ?>
  </head>
  <body>
    <header>
      <?php include_once('navbar.php'); ?>
    </header>
    <main>

<script>
window.onblur = function () { document.title = 'Ooh don\'t go too far !'; }
window.onfocus = function () { document.title = 'Ooh you\'re back ❤'; }
</script>