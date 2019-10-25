<?php require_once('Connections/myicone.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mural (nome_mural, cidade_estado_mural, msg_mural) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['nome_mural'], "text"),
                       GetSQLValueString($_POST['cidade_estado_mural'], "text"),
                       GetSQLValueString($_POST['msg_mural'], "text"));

  mysql_select_db($database_myicone, $myicone);
  $Result1 = mysql_query($insertSQL, $myicone) or die(mysql_error());

  $insertGoTo = "mural.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_listar = 100;
$pageNum_listar = 0;
if (isset($_GET['pageNum_listar'])) {
  $pageNum_listar = $_GET['pageNum_listar'];
}
$startRow_listar = $pageNum_listar * $maxRows_listar;

mysql_select_db($database_myicone, $myicone);
$query_listar = "SELECT * FROM mural WHERE status_mural = 'on' ORDER BY id_mural DESC";
$query_limit_listar = sprintf("%s LIMIT %d, %d", $query_listar, $startRow_listar, $maxRows_listar);
$listar = mysql_query($query_limit_listar, $myicone) or die(mysql_error());
$row_listar = mysql_fetch_assoc($listar);

if (isset($_GET['totalRows_listar'])) {
  $totalRows_listar = $_GET['totalRows_listar'];
} else {
  $all_listar = mysql_query($query_listar);
  $totalRows_listar = mysql_num_rows($all_listar);
}
$totalPages_listar = ceil($totalRows_listar/$maxRows_listar)-1;

$queryString_listar = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_listar") == false && 
        stristr($param, "totalRows_listar") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_listar = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_listar = sprintf("&totalRows_listar=%d%s", $totalRows_listar, $queryString_listar);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Myicone - Coment&aacute;rios</title>
<style type="text/css">
<!--
.texto {
	color: #FFF;
}
-->
</style>
<style type="text/css">
<!--
body {
	background-image: url(imagens/bg.png);
	background-repeat: repeat-x;
}
.comentario {
	color: #FFF;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	text-align: center;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><img src="imagens/artetoposite.jpg" width="500" height="172"></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="users/index2.php">VOLTAR</a></div></td>
  </tr>
</table>
<br>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><p align="center"><img src="users/imagens/tabeladeprecos.png" width="904" height="1080"></p>
<p align="center">&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
</p>
</body>
</html>
<?php
mysql_free_result($listar);
?>
