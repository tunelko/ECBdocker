<?php
  $site = "Tunelko Lab [ECB]";
  require "header.php";
  if ((isset($_POST['username']) and isset($_POST['password']) and isset($_POST['password_again']))){
    if (strpos($_POST['username'], ':') ==TRUE ) {
        $error ="Invalid register, your user contains bad chars";
    } elseif ($_POST['password'] === $_POST['password_again']) {
        if (User::register($_POST['username'], $_POST['password'])){
        setcookie("auth", User::createcookie($_POST['username'], $_POST['password']));
        header( 'Location: /ecb/index.php' ) ;
        die();
      } else {
        $error = "Can't create user: this user exists";
      }
    }else {
      $error = "Passwords don't match";
    }
  }
?>


<div class="row">
  <div class="col-lg-12">
    <h1>Register</h1>
  </div>
  <div class="col-lg-8 col-offset-1">
      <?php if (isset($error)) { ?>
          <span class="text text-danger"><b><?php echo $error; ?></b></span>
      <?php } ?>

    <form action="/ecb/register.php" method="POST" class="form-horizontal">
      <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" name="username"  class="form-control"  autofocus="true">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password"  class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password (again):</label>
        <input type="password" name="password_again"  class="form-control">
      </div>
 

      <button type="submit" class="btn btn-default">Log in</button>
    </form>
  </div>
</div>



<?php


  require "footer.php";
?>

