<?php

class User {

function urlsafe_b64encode($string) {
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
}

function urlsafe_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}

  function logout() {
    setcookie("auth", NULL ,time()-10);  
  }
  function createcookie($user, $password) {
//    $string = $user.":".$password .":is_admin:False:is_fake:True:has_unicorns:True";
    $string = $user.":".$password ;
    $passphrase = 'tunelko';
    return encryptString($string, $passphrase); 

  } 
function getPlainText($string, $passphrase){ 
	return decryptString($string, $passphrase); 
}
  function getuserfromcookie($auth) {
    $passphrase = 'tunelko';
    $data = decryptString($auth, $passphrase);
    list($user, $password) = explode(":", $data);
    $sql = "SELECT * FROM users where login=\"";
    $sql.= mysql_real_escape_string($user);
    $sql.= "\"";
    $result = mysql_query($sql);
    if ($result) {
      $row = mysql_fetch_assoc($result);
      return $row['login'];
    }
    else {
      return NULL;
    }
  }
  function login($user, $password) {
    $sql = "SELECT * FROM users where login=\"";
    $sql.= mysql_real_escape_string($user);
    $sql.= "\" and password=md5(\"seedthepass";
    $sql.= mysql_real_escape_string($password);
    $sql.= "\")";
    $result = mysql_query($sql);
    if ($result) {
      $row = mysql_fetch_assoc($result);
      if ($user === $row['login']) {
        return TRUE;
      }
    }
    //else 
      //echo mysql_error();
    return FALSE;
    //die("invalid username/password");
  }
  function register($user, $password) {
    $user=trim($user);
    if ($user === 'tunelko')
      return FALSE;

    $sql = "INSERT INTO  users (login,password) values (\"";
    $sql.= mysql_real_escape_string($user);
    $sql.= "\", md5(\"seedthepass";
    $sql.= mysql_real_escape_string($password);
    $sql.= "\"))";
    $result = mysql_query($sql);
    if ($result) {
      return TRUE;
    }
    else 
      echo mysql_error();
    return FALSE;
    //die("invalid username/password");
  }
}

function encryptString($unencryptedText, $passphrase) { 
  $enc = mcrypt_encrypt(MCRYPT_DES, $passphrase, $unencryptedText, MCRYPT_MODE_ECB); 
  return base64_encode($enc); 
}

function decryptString($encryptedText, $passphrase) { 
  $dec = mcrypt_decrypt(MCRYPT_DES, $passphrase, base64_decode($encryptedText), MCRYPT_MODE_ECB); 
  return $dec; 
}


?>
