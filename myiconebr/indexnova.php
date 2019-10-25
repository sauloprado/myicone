<?php require_once('Connections/myicone.php'); ?>
<?php
//MX Widgets3 include
require_once('includes/wdg/WDG.php');

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

$colname_busca = "-1";
if (isset($_POST['busca'])) {
  $colname_busca = $_POST['busca'];
}
mysql_select_db($database_myicone, $myicone);
$query_busca = sprintf("SELECT * FROM criaricones WHERE meta_busca LIKE %s ORDER BY meta_busca ASC", GetSQLValueString("%" . $colname_busca . "%", "text"));
$busca = mysql_query($query_busca, $myicone) or die(mysql_error());
$row_busca = mysql_fetch_assoc($busca);
$totalRows_busca = mysql_num_rows($busca);

$colname_busca = "-1";
if (isset($_GET['buscar'])) {
  $colname_busca = $_GET['buscar'];
}
mysql_select_db($database_myicone, $myicone);
$query_busca = sprintf("SELECT * FROM criaricones WHERE nome_icone LIKE %s", GetSQLValueString("%" . $colname_busca . "%", "text"));
$busca = mysql_query($query_busca, $myicone) or die(mysql_error());
$row_busca = mysql_fetch_assoc($busca);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Myicone.com - Seja Bem Vindo ao Mundo dos &Iacute;cones!</title>
<link href="css/semborda.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/apache2triad/htdocs/Educadora FM - A Sua Cara!.url" />

<link href="css/texto.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style>
@import url("file:///C|/apache2triad/htdocs/estilo/estilov1.css");

a {text-decoration:none;}
</style>
<style type="text/css">
<!--
body {
	background-image: url(imagens/bg.png);
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
<link href="css/games.css" rel="stylesheet" type="text/css" />
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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#apDiv11 {
	position:absolute;
	width:255px;
	height:189px;
	z-index:1;
	left: 6px;
	top: 48px;
}
-->
</style>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="includes/wdg/classes/DynamicInput.js"></script>
<?php
//begin JSRecordset
$jsObject_busca = new WDG_JsRecordset("busca");
echo $jsObject_busca->getOutput();
//end JSRecordset
?>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<br />
<br />
<br />
<br />
<table border="0" align="center">
  <tr>
    <td width="600" valign="top" bgcolor="#FFFFFF"><div align="center">
      <p align="center"><img src="imagens/logonovo.jpg" width="500" height="172" /><br />
        SEJA BEM VINDO<br /><!-- INICIO DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
      <!-- FIM DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
AO MUNDO DOS &Iacute;CONES.<br />
      </p>
<p><span class="style1" style="cursor:hand; color:blue; text-decoration:none" onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.myicone.com');"> Fa&ccedil;a do Myicone sua p&aacute;gina inicial</span></p>
    </div></td>
  </tr>
</table>
<br />
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><form id="form1" name="form1" method="post" action="resultado.php">
      <div align="center">Encontre seu &iacute;cone
        <span id="sprytextfield1">
        <label>
          <input name="busca" id="busca" size="40" wdg:recordset="busca" wdg:subtype="DynamicSearch" wdg:type="widget" wdg:displayfield="meta_busca" wdg:norec="10" wdg:defaultoptiontext="no" />
        </label>
</span>
<label>
  <input type="submit" name="buscar" id="buscar" value="Encontrar" />
        </label>
      <br />
      <br />
      Sistema de busca em teste, deixe seu <a href="mural.php">coment&aacute;rio</a>. <br />
      <br />
      </div>
    </form></td>
  </tr>
</table>
<br />
<table width="820" border="0" align="center">
  <tr>
    <td width="364"><a href="games.php"><img src="imagens/games.png" width="146" height="34" border="0" /></a></td>
    <td width="446"><div align="right"><a href="indicadores.php"><img src="imagens/indice.png" width="146" height="34" border="0" /></a></div></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center">
  <tr>
    <td valign="top"><img src="imagens/1.png" width="67" height="120" /></td>
    <td><table width="820" border="0" align="center">
      <tr align="center" valign="top">
        <td width="127"><a href="http://www.mercadolivre.com.br/" target="_blank"><img src="icones/mercadolivre.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td width="3"><div align="center"></div></td>
        <td width="112"><div align="center"><a href="http://www.unimed.com.br/pct/index.jsp?cd_canal=49146" target="_blank"><img src="icones/unimed.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="98"><div align="center"><a href="http://www.itau.com.br/" target="_blank"><img src="icones/itau.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="105"><div align="center"><a href="http://www.buscape.com.br/" target="_blank"><img src="icones/buscape.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="101"><div align="center"><a href="http://www.google.com.br/" target="_blank"><img src="icones/google.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="117"><div align="center"><a href="http://www.youtube.com/?gl=BR&amp;hl=pt" target="_blank"><img src="icones/youtube.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="118"><div align="center"><a href="https://www.google.com/accounts/ServiceLogin?service=orkut&amp;hl=pt-BR&amp;rm=false&amp;continue=http://www.orkut.com/RedirLogin?msg=0&amp;page=http://www.orkut.com.br/Home&amp;cd=BR&amp;passive=true&amp;skipvpage=true&amp;sendvemail=false" target="_blank"><img src="icones/orkut.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="94"><div align="center"><a href="http://br.msn.com/" target="_blank"><img src="icones/msn.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="118"><div align="center"><a href="http://www.terra.com.br/portal/" target="_blank"><img src="icones/terra.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td width="3"><div align="center"></div></td>
        <td width="101"><a href="http://www.facebook.com/" target="_blank"><img src="icones/facebook.jpg" alt="" width="64" height="64" border="0" /></a></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.mercadolivre.com.br/" target="_blank">Mercado Livre</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.unimed.com.br/pct/index.jsp?cd_canal=49146" target="_blank">Unimed</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.itau.com.br/" target="_blank">Ita&uacute;</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.buscape.com.br/" target="_blank">Buscap&eacute;</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.google.com.br/" target="_blank">Google</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.youtube.com/?gl=BR&amp;hl=pt" target="_blank">YouTube</a></td>
        <td>&nbsp;</td>
        <td><a href="https://www.google.com/accounts/ServiceLogin?service=orkut&amp;hl=pt-BR&amp;rm=false&amp;continue=http://www.orkut.com/RedirLogin?msg=0&amp;page=http://www.orkut.com.br/Home&amp;cd=BR&amp;passive=true&amp;skipvpage=true&amp;sendvemail=false" target="_blank">Orkut</a></td>
        <td>&nbsp;</td>
        <td><a href="http://br.msn.com/" target="_blank">MSN</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.terra.com.br/portal/" target="_blank">Terra</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.facebook.com/" target="_blank">Facebook</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.icamp.com.br" target="_blank"><img src="icones/icamp.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.embratel.com.br/" target="_blank"><img src="icones/embratel.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.bradesco.com.br/" target="_blank"><img src="icones/bradesco.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.americanas.com.br/" target="_blank"><img src="icones/americanas.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><a href="http://www.submarino.com.br/" target="_blank"><img src="icones/submarino.jpg" alt="" width="64" height="64" border="0" /></a><br /></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.cocacola.com.br/pt/index.html" target="_blank"><img src="icones/cocacola.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="https://www.google.com/accounts/ServiceLogin?service=mail&amp;passive=true&amp;rm=false&amp;continue=http%3A//mail.google.com/mail/?ui=html&amp;zy=l&amp;bsv=1eic6yu9oa4y3&amp;scc=1&amp;ltmpl=default&amp;ltmplcache=2" target="_blank"><img src="icones/gmail.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.telefonica.com.br/portal/site/residencial"><img src="icones/telefonica.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.globo.com/" target="_blank"><img src="icones/globo.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="https://www.blogger.com/start" target="_blank"><img src="icones/blogger.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
      </tr>
      <tr align="center">
        <td><p><a href="http://www.icamp.com.br" target="_blank">Icamp</a></p></td>
        <td>&nbsp;</td>
        <td><a href="http://www.embratel.com.br/" target="_blank">Embratel</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.bradesco.com.br/" target="_blank">Bradesco</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.americanas.com.br/" target="_blank"><span class="style32">Americanas</span></a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.submarino.com.br/" target="_blank">Submarino</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.cocacola.com.br/pt/index.html" target="_blank">Coca-Cola</a></td>
        <td>&nbsp;</td>
        <td><a href="https://www.google.com/accounts/ServiceLogin?service=mail&amp;passive=true&amp;rm=false&amp;continue=http%3A//mail.google.com/mail/?ui=html&amp;zy=l&amp;bsv=1eic6yu9oa4y3&amp;scc=1&amp;ltmpl=default&amp;ltmplcache=2" target="_blank">Gmail</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.telefonica.com.br/portal/site/residencial" target="_blank">Telef&ocirc;nica</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.globo.com/" target="_blank">Globo</a><a href="http://www.globo.com/" target="_blank"></a></td>
        <td>&nbsp;</td>
        <td><a href="https://www.blogger.com/start" target="_blank">Blogger</a></td>
      </tr>
      <tr align="center">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td height="3"><a href="http://webmail.itelefonica.com.br/" target="_blank"><img src="icones/itelefonica.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.pacall.com.br/" target="_blank"><img src="icones/pacall.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.tim.com.br/portal/site/PortalWeb/menuitem.06243559e24e67a19a132910703016a0?wfe_url_requested=/portal/site/PortalWeb" target="_blank"><img src="icones/tim.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.ig.com.br/" target="_blank"><img src="icones/ig.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://twitter.com/" target="_blank"><img src="icones/twitter.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.baixaki.com.br/" target="_blank"><img src="icones/BAIXAKI.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.redetv.com.br/portal/paniconatv/" target="_blank"><img src="icones/panico.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://br.yahoo.com/" target="_blank"><img src="icones/yahoo.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td height="3"><a href="http://www.oi.com.br/prehome2.html?referrer=undefined" target="_blank"><img src="icones/oi.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td height="3">&nbsp;</td>
        <td><a href="http://cade.search.yahoo.com/" target="_blank"><img src="icones/cade.jpg" alt="" width="64" height="64" border="0" /></a></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://webmail.itelefonica.com.br/" target="_blank">itelefonica</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.pacall.com.br/" target="_blank">Pacall</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.tim.com.br/portal/site/PortalWeb/menuitem.06243559e24e67a19a132910703016a0?wfe_url_requested=/portal/site/PortalWeb" target="_blank">TIM</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.ig.com.br/" target="_blank">IG</a></td>
        <td>&nbsp;</td>
        <td><a href="http://twitter.com/" target="_blank">Twitter</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.baixaki.com.br/" target="_blank">Baixaki</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.redetv.com.br/portal/paniconatv/" target="_blank">P&acirc;nico<br />
          na TV <br />
        </a></td>
        <td>&nbsp;</td>
        <td><a href="http://br.yahoo.com/" target="_blank">Yahoo</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.oi.com.br/prehome2.html?referrer=undefined" target="_blank">OI</a></td>
        <td>&nbsp;</td>
        <td><a href="http://cade.search.yahoo.com/" target="_blank">Cad&ecirc;</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://www.unibanco.com.br/vste/_exc/_hom/index.asp" target="_blank"><img src="icones/unibanco.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.aonde.com.br/" target="_blank"><img src="icones/aonde.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.superdownloads.com.br/" target="_blank"><img src="icones/sd.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><a href="http://www.anatel.gov.br/Portal/exibirPortalInternet.do" target="_blank"><img src="icones/anatel.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.bancoreal.com.br/" target="_blank"><img src="icones/bancoreal.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><a href="http://www.correios.com.br/" target="_blank"><img src="icones/correio.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.casasbahia.com.br/" target="_blank"><img src="icones/casasbahia.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.uol.com.br/" target="_blank"><img src="icones/uol.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><img src="icones/myspace.jpg" alt="" width="64" height="64" /><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.bol.uol.com.br/" target="_blank"><img src="icones/bol.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.unibanco.com.br/vste/_exc/_hom/index.asp" target="_blank">Unibanco</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.aonde.com.br/" target="_blank">Aonde</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.superdownloads.com.br/" target="_blank">SD</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.anatel.gov.br/Portal/exibirPortalInternet.do" target="_blank">Anatel</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.bancoreal.com.br/" target="_blank">Banco Real</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.correios.com.br/" target="_blank">Correios</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.casasbahia.com.br/" target="_blank">Casas Bahia</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.uol.com.br/" target="_blank">UOL</a></td>
        <td>&nbsp;</td>
        <td><a href="http://br.myspace.com/" target="_blank">MySpace</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.bol.uol.com.br/" target="_blank">BOL</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://www.polishop.com.br/a" target="_blank"><img src="icones/polishop.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.unianhanguera.edu.br/anhanguera/" target="_blank"><img src="icones/a.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.nike.com/nikeos/p/nike/language_select/" target="_blank"><img src="icones/nike.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><a href="http://capricho.abril.com.br/home/" target="_blank"><img src="icones4/capricho.jpg" alt="" width="64" height="63" border="0" /></a></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.detran.sp.gov.br/" target="_blank"><img src="icones/detran.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://enem.inep.gov.br/" target="_blank"><img src="icones/enem.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.nestle.com.br/site/home.aspx" target="_blank"><img src="icones/nestle.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.novositedogiraffas.com/" target="_blank"><img src="icones/giraffas.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.bb.com.br/portalbb/home23,116,116,1,1,1,1.bb" target="_blank"><img src="icones/bb.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.claro.com.br/portal/pre_home.jsp" target="_blank"><img src="icones/claro.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.polishop.com.br/a" target="_blank">POLISHOP</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.unianhanguera.edu.br/anhanguera/" target="_blank">Anhanguera</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.nike.com/nikeos/p/nike/language_select/" target="_blank">Nike</a></td>
        <td>&nbsp;</td>
        <td><a href="http://capricho.abril.com.br/home/" target="_blank">Capricho</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.detran.sp.gov.br/">Detran</a></td>
        <td>&nbsp;</td>
        <td><a href="http://enem.inep.gov.br/" target="_blank">Enem</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.nestle.com.br/site/home.aspx" target="_blank">Nestle</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.novositedogiraffas.com/" target="_blank">Giraffas</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.bb.com.br/portalbb/home23,116,116,1,1,1,1.bb" target="_blank">BB</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.claro.com.br/portal/pre_home.jsp" target="_blank">Claro</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://www.livrariasaraiva.com.br/" target="_blank"><img src="icones/saraiva.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.santander.com.br/portal/gsb/script/templates/GCMRequest.do?page=3340" target="_blank"><img src="icones/santander.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.extra.com.br/" target="_blank"><img src="icones/extra.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.habibs.com.br/" target="_blank"><img src="icones/habibs.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.kalunga.com.br/default.asp?cookie_test=1" target="_blank"><img src="icones/kalunga.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.kboing.com.br/" target="_blank"><img src="icones/Kboing.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://maps.google.com.br/" target="_blank"><img src="icones/googlemaps.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.mec.gov.br/" target="_blank"><img src="icones/mec.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://pt.wikipedia.org/wiki/P&aacute;gina_principal" target="_blank"><img src="icones/wikipedia.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.fiat.com.br/" target="_blank"><img src="icones/fiat.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.livrariasaraiva.com.br/" target="_blank">Saraiva</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.santander.com.br/portal/gsb/script/templates/GCMRequest.do?page=3340" target="_blank">Santander</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.extra.com.br/" target="_blank">Extra</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.habibs.com.br/" target="_blank">Habibs</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.kalunga.com.br/default.asp?cookie_test=1" target="_blank">Kalunga</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.kboing.com.br/" target="_blank">Kboing</a></td>
        <td>&nbsp;</td>
        <td><a href="http://maps.google.com.br/" target="_blank">Google Maps</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.mec.gov.br/" target="_blank">MEC</a></td>
        <td>&nbsp;</td>
        <td><a href="http://pt.wikipedia.org/wiki/P&aacute;gina_principal" target="_blank">Wikip&eacute;dia</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.fiat.com.br/" target="_blank">Fiat</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.carrefour.com.br/" target="_blank"><img src="icones/carrefour.jpg" alt="" width="64" height="64" border="0" /></a><br /></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.shoptime.com.br/" target="_blank"><img src="icones/shoptime.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.mcdonalds.com.br/" target="_blank"><img src="icones/mcdonalds.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.intel.com/?pt_BR_01" target="_blank"><img src="icones/intel.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.honda.com.br/Paginas/default.aspx" target="_blank"><img src="icones/honda.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><a href="http://br.altavista.com/" target="_blank"><img src="icones/altavista.jpg" alt="" width="64" height="64" border="0" /></a></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.cbf.com.br/php/home.php?e=0" target="_blank"><img src="icones/cbf.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.nasa.gov/" target="_blank"><img src="icones/nasa.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.volkswagen.de/br/pt.html"><img src="icones/wolkswagen.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.unicamp.br/unicamp/" target="_blank"><img src="icones/unicamp.jpg" alt="" width="64" height="64" border="0" /><br />
        </a></div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.google.com.br/images?hl=pt-BR&amp;source=imghp&amp;biw=1020&amp;bih=592&amp;q=carrefour&amp;gbv=2&amp;aq=f&amp;aqi=g10&amp;aql=&amp;oq=&amp;gs_rfai=" target="_blank">Carrefour</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.shoptime.com.br/" target="_blank">ShopTime</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.mcdonalds.com.br/" target="_blank">McDonalds</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.intel.com/?pt_BR_01" target="_blank">Intel</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.honda.com.br/Paginas/default.aspx" target="_blank">Honda</a></td>
        <td>&nbsp;</td>
        <td><a href="http://br.altavista.com/" target="_blank">Alta Vista</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.cbf.com.br/php/home.php?e=0" target="_blank">CBF</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.nasa.gov/" target="_blank">Nasa</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.volkswagen.de/br/pt.html" target="_blank">Wolkswagen</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.unicamp.br/unicamp/" target="_blank">Unicamp</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://quatrorodas.abril.com.br/QR2/" target="_blank"><img src="icones/quatrorodas.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.motorola.com/consumers/v/index.jsp?vgnextoid=89b9f083ded00210VgnVCM1000008406b00aRCRD" target="_blank"><img src="icones/motorola.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://convenio.cursoanglo.com.br/Home.aspx" target="_blank"><img src="icones/anglo.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://internet.boticario.com.br/portal/site/internetbr/" target="_blank"><img src="icones/oboticario.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.pontofrio.com.br/" target="_blank"><img src="icones/pontofrio.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.caixa.gov.br/" target="_blank"><img src="icones/caixa.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.sky.com.br/home/home/default.aspx" target="_blank"><img src="icones/sky.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.tigre.com.br/pt/index.php" target="_blank"><img src="icones/tigre.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.visa.com.br/go/principal.aspx"><img src="icones/visa.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.skype.com/intl/pt/home/" target="_blank"><img src="icones/skype.jpg" alt="" width="60" height="61" border="0" /></a><br />
        </div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://quatrorodas.abril.com.br/QR2/" target="_blank">4 Rodas</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.motorola.com/consumers/v/index.jsp?vgnextoid=89b9f083ded00210VgnVCM1000008406b00aRCRD" target="_blank">Motorola</a></td>
        <td>&nbsp;</td>
        <td><a href="http://convenio.cursoanglo.com.br/Home.aspx" target="_blank">Anglo</a></td>
        <td>&nbsp;</td>
        <td><a href="http://internet.boticario.com.br/portal/site/internetbr/" target="_blank">O Boticario</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.pontofrio.com.br/" target="_blank">Ponto Frio</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.caixa.gov.br/" target="_blank">Caixa</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.sky.com.br/home/home/default.aspx" target="_blank">SKY</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.tigre.com.br/pt/index.php" target="_blank">Tigre</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.visa.com.br/go/principal.aspx" target="_blank">Visa</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.skype.com/intl/pt/home/" target="_blank">Skype</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://www.sebrae.com.br/" target="_blank"><img src="icones/sebrae.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.tam.com.br/b2c/vgn/v/index.jsp?vgnextoid=97981ed526b72210VgnVCM1000003752070aRCRD" target="_blank"><img src="icones/tam.jpg" alt="" width="64" height="64" border="0" /></a></div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.dell.com.br/" target="_blank"><img src="icones/dell.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.receita.fazenda.gov.br/" target="_blank"><img src="icones/receita.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.tvseculo21.org.br/tv/" target="_blank"><img src="icones/seculo21.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.poupatempo.sp.gov.br/home/" target="_blank"><img src="icones/poupatempo.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.ford.com.br/" target="_blank"><img src="icones/ford.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.lge.com/br/index.jsp" target="_blank"><img src="icones/lg.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://netcombo.globo.com/static/html/virtuaehd/?utm_source=google_textads&amp;utm_medium=cpc&amp;utm_campaign=net_virtuaehd&amp;gclid=CP3kxvamkqMCFRkcswodOwwpsA" target="_blank"><img src="icones/net.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://rederecord.r7.com/" target="_blank"><img src="icones/record.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.sebrae.com.br/" target="_blank">Sebrae</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.tam.com.br/b2c/vgn/v/index.jsp?vgnextoid=97981ed526b72210VgnVCM1000003752070aRCRD" target="_blank">TAM</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.dell.com.br/" target="_blank">Dell</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.receita.fazenda.gov.br/" target="_blank">Receita</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.tvseculo21.org.br/tv/" target="_blank">S&eacute;culo 21</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.poupatempo.sp.gov.br/home/" target="_blank">Poupatempo</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.ford.com.br/" target="_blank">Ford</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.lge.com/br/index.jsp" target="_blank">LG</a></td>
        <td>&nbsp;</td>
        <td><a href="http://netcombo.globo.com/static/html/virtuaehd/?utm_source=google_textads&amp;utm_medium=cpc&amp;utm_campaign=net_virtuaehd&amp;gclid=CP3kxvamkqMCFRkcswodOwwpsA" target="_blank">Net Virtua</a></td>
        <td>&nbsp;</td>
        <td><a href="http://rederecord.r7.com/" target="_blank">TV Record</a></td>
      </tr>
      <tr align="center" valign="top">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr align="center" valign="top">
        <td><div align="center"><a href="http://www.sbt.com.br/homev10/" target="_blank"><img src="icones/sbt.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://veja.abril.com.br/" target="_blank"><img src="icones/veja.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.band.com.br/" target="_blank"><img src="icones/band.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.senai.br/br/home/index.aspx" target="_blank"><img src="icones/senai.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://revistapegn.globo.com/" target="_blank"><img src="icones/PEGN.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://oglobo.globo.com/" target="_blank"><img src="icones/oglobo.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.itautec.com.br/iPortal/pt-BR/a4cfb8fd-799b-4eec-a144-15e2c1522cf9.htm" target="_blank"><img src="icones/itautec.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://portalexame.abril.com.br/" target="_blank"><img src="icones/exame.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.estadao.com.br/" target="_blank"><img src="icones/estadao.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
        <td>&nbsp;</td>
        <td><div align="center"><a href="http://www.voegol.com.br/Paginas/home.aspx" target="_blank"><img src="icones/gol.jpg" alt="" width="64" height="64" border="0" /></a><br />
        </div></td>
      </tr>
      <tr align="center" valign="top">
        <td><a href="http://www.sbt.com.br/homev10/" target="_blank">sbt</a></td>
        <td>&nbsp;</td>
        <td><a href="http://veja.abril.com.br/" target="_blank">Veja</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.band.com.br/" target="_blank">Band</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.senai.br/br/home/index.aspx" target="_blank">SENAI</a></td>
        <td>&nbsp;</td>
        <td><a href="http://revistapegn.globo.com/" target="_blank">PEGN</a></td>
        <td>&nbsp;</td>
        <td><a href="http://oglobo.globo.com/" target="_blank">O Globo</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.itautec.com.br/iPortal/pt-BR/a4cfb8fd-799b-4eec-a144-15e2c1522cf9.htm" target="_blank">Itautec</a></td>
        <td>&nbsp;</td>
        <td><a href="http://portalexame.abril.com.br/" target="_blank">Exame</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.estadao.com.br/" target="_blank">Estad&atilde;o</a></td>
        <td>&nbsp;</td>
        <td><a href="http://www.voegol.com.br/Paginas/home.aspx" target="_blank">GOL</a></td>
      </tr>
    </table></td>
    <td valign="top"><a href="page2nova.php"><img src="imagens/seta1.png" width="67" height="117" border="0" /></a></td>
  </tr>
</table>
<p>&nbsp;</p>
<div align="left"></div>
<br />
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="mural.php"><img src="imagens/ctnovo.png" width="270" height="40" border="0" /></a></td>
    <td><div align="right"><a href="comunicado.php"><img src="imagens/cmnovo.png" width="270" height="40" border="0" /></a></div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<div align="center"><br />
  <br />
  </p>
<img src="http://contador.kinghost.com.br/contador.cgi?ft=1|df=myicone"></div>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($busca);
?>
