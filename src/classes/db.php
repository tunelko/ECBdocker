<?php

    $lnk = mysql_connect("localhost", "tunelko", "dhWuSEKR7LCgibBt");
    $db = mysql_select_db('ecb', $lnk);

$mysql = new mysqli("localhost", "root");
echo "MySQL Server info: ".$mysql->host_info;

?>
