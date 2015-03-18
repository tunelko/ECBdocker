<?php
  $site = "Tunelkolab &rarrow;";
  require "header.php";
  User::logout();
  header("Location: /ecb/index.php");
  die();
?>


