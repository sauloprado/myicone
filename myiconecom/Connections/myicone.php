<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myicone = "localhost";
$database_myicone = "myicone";
$username_myicone = "root";
$password_myicone = "sapoboiazul";
$myicone = mysql_pconnect($hostname_myicone, $username_myicone, $password_myicone) or trigger_error(mysql_error(),E_USER_ERROR); 
?>