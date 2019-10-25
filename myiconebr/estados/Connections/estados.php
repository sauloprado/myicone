<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_estados = "localhost";
$database_estados = "myicone";
$username_estados = "root";
$password_estados = "sapoboiazul";
$estados = mysql_pconnect($hostname_estados, $username_estados, $password_estados) or trigger_error(mysql_error(),E_USER_ERROR); 
?>