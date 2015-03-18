<?php

$string = $_GET['dec'];
$iv = '12345678'; 
$passphrase = 'pntstrlb'; 

$encryptedString = decryptString($string, $passphrase, $iv); 
// Expect: 7DjnpOXG+FrUaOuc8x6vyrkk3atSiAf425ly5KpG7lOYgwouw2UATw== 

echo $encryptedString;

function encryptString($unencryptedText, $passphrase, $iv) { 
  $enc = mcrypt_encrypt(MCRYPT_DES, $passphrase, $unencryptedText, MCRYPT_MODE_ECB); 
  return base64_encode($enc); 
}

function decryptString($encryptedText, $passphrase, $iv) { 
  $dec = mcrypt_decrypt(MCRYPT_DES, $passphrase, base64_decode($encryptedText), MCRYPT_MODE_ECB); 
  return $dec; 
}



?>
