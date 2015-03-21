<?php
  $site = "[Tunelko Lab] ECB Challenge";
  require "header.php";
?>

<div class="row">
  <div class="col-lg-12">
    <h1>ECB Crypto Challenge</h1>
 <?php if (isset($user)) { ?>
      <?php  if ($user === 'tunelko' ) { ?>
      <span class="text text-success">
      <?php 
		echo '<h2>Here is your flag: "challenge_is_ecbtivamente_breakable:)"';
} else { ?> 
      <span class="text text-warning">
      <?php } ?>
        <h4>OK: You are currently logged in as <?php echo $user; ?>!</h4>
      </span>
	<p>And your cookie in plaintext is: <strong><?php echo $plaintext; ?> </strong>
  <?php } else { ?>

      <p>Are you registered? If not, you can <a href="/ecb/register.php">register</a> here.</p>
      <p>Yes? Ok , try to <a href="login.php">login</a></p>
  <?php } ?>
      <p>This challenge is about ECB encryption. Read <a href="http://en.wikipedia.org/wiki/Block_cipher_mode_of_operation#Electronic_Codebook_.28ECB.29">about it</a>. </p>
      <p>The 'primary' objective of this challenge is to find a way to <strong>login as tunelko</strong>. </p>
      <p>TO-DO: The 'bonus' objective of this challenge is try to elevate privileges to <strong>admin</strong>. </p>
      <p>To-DO: Remember, don't remove tunelko's unicorns !. </p>
 
  </div>
</div>



<?php


  require "footer.php";
?>

