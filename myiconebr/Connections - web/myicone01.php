<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myicone01 = "mysql.myicone.com.br";
$database_myicone01 = "myicone01";
$username_myicone01 = "myicone01";
$password_myicone01 = "sapoboiazul";
$myicone01 = mysql_pconnect($hostname_myicone01, $username_myicone01, $password_myicone01) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
