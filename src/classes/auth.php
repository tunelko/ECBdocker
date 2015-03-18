<?php
  session_start();
  require('../classes/db.php'); 
  require('../classes/user.php'); 

  if (isset($_POST["user"]) and isset($_POST["password"]) )
    if (User::login($_POST["user"],$_POST["password"]))  
      $_SESSION["tunelko"] = User::SITE;

  if (!isset($_SESSION["tunelko"] ) or $_SESSION["tunelko"] != User::SITE) {
    header( 'Location: /ecb/login.php' ) ;
    die();
  }
  
?>
