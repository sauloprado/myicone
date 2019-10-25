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

$maxRows_busca = 100;
$pageNum_busca = 0;
if (isset($_GET['pageNum_busca'])) {
  $pageNum_busca = $_GET['pageNum_busca'];
}
$startRow_busca = $pageNum_busca * $maxRows_busca;

$colname_busca = "-1";
if (isset($_POST['busca'])) {
  $colname_busca = $_POST['busca'];
}
mysql_select_db($database_myicone, $myicone);
$query_busca = sprintf("SELECT * FROM criaricones WHERE meta_busca LIKE %s ORDER BY meta_busca ASC", GetSQLValueString("%" . $colname_busca . "%", "text"));
$query_limit_busca = sprintf("%s LIMIT %d, %d", $query_busca, $startRow_busca, $maxRows_busca);
$busca = mysql_query($query_limit_busca, $myicone) or die(mysql_error());
$row_busca = mysql_fetch_assoc($busca);

if (isset($_GET['totalRows_busca'])) {
  $totalRows_busca = $_GET['totalRows_busca'];
} else {
  $all_busca = mysql_query($query_busca);
  $totalRows_busca = mysql_num_rows($all_busca);
}
$totalPages_busca = ceil($totalRows_busca/$maxRows_busca)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Myicone.com - Seja Bem Vindo ao Mundo dos &Iacute;cones!</title>
<link href="../../css/semborda.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/apache2triad/htdocs/Educadora FM - A Sua Cara!.url" />

<link href="../../css/texto.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//-->
</script>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style>
@import url("file:///C|/apache2triad/htdocs/estilo/estilov1.css");

a {text-decoration:none;}
</style>
<style type="text/css">
<!--
body {
	background-image: url(../../imagens/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Verdana;
	font-size: 12px;
}
#apDiv1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 836px;
	top: 11px;
}
#apDiv2 {
	position:absolute;
	width:200px;
	height:81px;
	z-index:2;
	left: 877px;
	top: 22px;
}
.style1 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<style type="text/css">
<!--
#apDiv3 {
	position:absolute;
	width:265px;
	height:115px;
	z-index:3;
	left: 29px;
	top: 46px;
}
-->
</style>
<style type="text/css">
<!--
#apDiv4 {
	position:absolute;
	width:209px;
	height:515px;
	z-index:1;
	left: 122px;
	top: -20px;
}
#apDiv5 {	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 855px;
	top: 17px;
}
#apDiv6 {	position:absolute;
	width:256px;
	height:479px;
	z-index:1;
	left: 24px;
	top: 50px;
}
#apDiv7 {
	position:absolute;
	width:318px;
	height:115px;
	z-index:1;
	left: 222px;
	top: 27px;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #336699;
}
a:hover {
	text-decoration: none;
	color: #336699;
}
a:active {
	text-decoration: none;
	color: #336699;
}
.style32 {font-size: 12px}
#apDiv8 {
	position:absolute;
	width:111px;
	height:60px;
	z-index:1;
	left: 40px;
	top: 250px;
}
-->
</style>
<link href="../../css/games.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#apDiv9 {
	position:absolute;
	left:112px;
	top:326px;
	width:0px;
	height:2px;
	z-index:1;
}
#apDiv10 {
	position:absolute;
	left:910px;
	top:50px;
	width:65px;
	height:82px;
	z-index:1;
}
-->
</style>
</head>

<body>
<div align="center"><br />
  <br />
  <br />
</div>
<table border="0" align="center">
  <tr>
    <td width="600" valign="top" bgcolor="#FFFFFF"><div align="center">
      <p align="center"><a href="http://www.myicone.com"><img src="../../imagens/logonovo.jpg" width="500" height="172" border="0" /></a><br />
        SEJA BEM VINDO<br /><!-- INICIO DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
      <!-- FIM DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
AO MUNDO DOS &Iacute;CONES.<br />
      </p>
<p><span class="style1" style="cursor:hand; color:blue; text-decoration:none" onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.myicone.com');"> Fa&ccedil;a do Myicone sua p&aacute;gina inicial</span></p>
    </div></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <div align="center">Encontre seu &iacute;cone
        <label>
          <input name="busca" type="text" id="busca" size="40" />
        </label>
        <label>
          <input type="submit" name="buscar" id="buscar" value="Encontrar" />
        </label>
      </div>
    </form></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center">
  <tr>
    <td><div align="right"><a href="../../page2.php"><img src="../../imagens/direita.png" width="24" height="24" border="0" /></a></div></td>
  </tr>
</table>
<table width="820" border="0" align="center">
  <tr>
    <td width="364"><a href="../../games.php" target="_self"><img src="../../imagens/jogosbotao.jpg" width="146" height="36" border="0" /></a></td>
    <td width="446"><div align="right"><a href="../../indicadores.php"><img src="../../imagens/indicadoresbotao.jpg" width="146" height="36" border="0" /></a></div></td>
  </tr>
</table>
<br />
<table border="0" align="center" cellpadding="4" cellspacing="4">
  <tr>
    <td><div align="center">
      <?php if ($totalRows_busca > 0) { // Show if recordset not empty ?>
        <table border="0" cellpadding="4" cellspacing="4">
          <tr>
            <?php
do { // horizontal looper version 3
?>
              <td><p align="center"><a href="<?php echo $row_busca['../../site_icone']; ?>" target="_blank"><img src="iconesbd/<?php echo $row_busca['icone_icone']; ?>" width="64" height="64" border="0" /></a></p>
                <p align="center"><a href="<?php echo $row_busca['../../site_icone']; ?>"><?php echo $row_busca['nome_icone']; ?></a></p></td>
              <?php
$row_busca = mysql_fetch_assoc($busca);
    if (!isset($nested_busca)) {
      $nested_busca= 1;
    }
    if (isset($row_busca) && is_array($row_busca) && $nested_busca++ % 10==0) {
      echo "</tr><tr>";
    }
  } while ($row_busca); //end horizontal looper version 3
?>
          </tr>
        </table>
        <?php } // Show if recordset not empty ?>
    </div></td>
  </tr>
</table>
<?php if ($totalRows_busca == 0) { // Show if recordset empty ?>
  <p align="center">Icone n&atilde;o cadastrado!</p>
  <?php } // Show if recordset empty ?>
<p>&nbsp;</p>
<div align="left"></div>
<br />
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="../../mural.php"><img src="../../imagens/ct.jpg" width="270" height="40" border="0" /></a></td>
    <td><div align="right"><a href="../../comunicado.php"><img src="../../imagens/cm.jpg" width="270" height="40" border="0" /></a></div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<div align="center"><br />
  <br />
  </p>
<img src="http://contador.kinghost.com.br/contador.cgi?ft=1|df=myicone"></div>
<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($busca);
?>
