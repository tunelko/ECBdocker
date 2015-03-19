<?php 
  require 'classes/db.php';
  require 'classes/phpfix.php';
  require 'classes/user.php';
  if (isset($_COOKIE['auth'])){
    $user = User::getuserfromcookie($_COOKIE['auth']);
    $plaintext = User::getPlainText($_COOKIE['auth'], 'tunelko');
  }
?>
<!-- tunelko Lab --> 
<html>
    <head>
        <title>[tunelko Lab] ECB</title>
        <link rel="stylesheet" media="screen" href="/ecb/css/bootstrap.css" />
        <link rel="stylesheet" media="screen" href="/ecb/css/tunelko.css" />
    </head>
    <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">tunelko lab [ECB]</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
                 <?php if (!isset($user)) { ?>
                  <li><a href="/ecb/login.php">Login</a></li>
                  <li><a href="/ecb/register.php">Register</a></li>
                <?php } else { ?>
                  <li><a href="/ecb/logout.php">log out</a></li>
                <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>      
<div class="container">
        <div class="body-content">
