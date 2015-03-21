<?php
  $site = "Tunelkolab &rarrow;";
  require "header.php";
  User::logout();
  header("Location: index.php");
  die();
?>


