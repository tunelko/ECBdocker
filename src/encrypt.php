<?php

$string = $_GET['enc'];
$iv = '12345678'; 
$passphrase = 'tunelkoisn00b'; 

$encryptedString = encryptString($string, $passphrase, $iv); 
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
