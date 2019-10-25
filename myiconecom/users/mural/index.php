<?php require_once('../../Connections/myicone.php'); ?>
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

mysql_select_db($database_myicone, $myicone);
$query_listar = "SELECT * FROM mural ORDER BY id_mural DESC";
$listar = mysql_query($query_listar, $myicone) or die(mysql_error());
$row_listar = mysql_fetch_assoc($listar);
$totalRows_listar = mysql_num_rows($listar);

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Coment&aacute;rios</title>
<style type="text/css">
<!--
body {
	background-image: url(../../imagens/bg.png);
	background-repeat: repeat-x;
	text-align: center;
}
.comentario {
	color: #FFF;
}
a:link {
	color: #000;
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
	color: #000;
}
a:hover {
	text-decoration: none;
	color: #000;
}
a:active {
	text-decoration: underline;
	color: #000;
}
.comentario {
	text-align: center;
}
.texto {
	color: #FFF;
}
-->
</style></head>

<body>
<p align="center">&nbsp;</p>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><p><a href="../index2.php"><img src="../../imagens/seta2.png" width="67" height="115" border="0" /></a></p>
    <p align="center">&nbsp;</p></td>
    <td align="center"><img src="topo.png" width="950" height="100" /><br />
      <br />
      Total de Coment&aacute;rios - <?php echo $totalRows_listar ?><br />
      &quot;Classificado sempre pelo &uacute;ltimo coment&aacute;rio&quot;  <br /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<p><a href="gerenciar.php">Gerenciar Coment&aacute;rios</a> (Postar ou Permanecer Desligado)</p>
<?php do { ?>
  <table width="600" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td width="153" align="left" bgcolor="#009900" class="texto">Nome</td>
      <td width="747" align="left" bgcolor="#CCCCCC"><?php echo $row_listar['nome_mural']; ?></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#009900" class="texto">Cidade/Estado</td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_listar['cidade_estado_mural']; ?></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#009900" class="texto">Coment&aacute;rio</td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_listar['msg_mural']; ?></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#009900" class="texto">Email</td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_listar['email_mural']; ?></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#009900" class="texto">Status</td>
      <td align="left" bgcolor="#CCCCCC"><?php echo $row_listar['status_mural']; ?></td>
    </tr>
    <tr>
      <td align="left" bgcolor="#009900" class="texto">&nbsp;</td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
  </table>
  <br />
  <br />
<?php } while ($row_listar = mysql_fetch_assoc($listar)); ?>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($listar);
?>
