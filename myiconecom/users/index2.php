<?php require_once('../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_myicone, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_myicone);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Myicone.com - Seja Bem Vindo ao Mundo dos &Iacute;cones!</title>
<link href="../css/semborda.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/apache2triad/htdocs/Educadora FM - A Sua Cara!.url" />

<link href="../css/texto.css" rel="stylesheet" type="text/css" />
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
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style>
@import url("file:///C|/apache2triad/htdocs/estilo/estilov1.css");

a {text-decoration:none;}
</style>
<style type="text/css">
<!--
body {
	background-image: url(../imagens/bg.png);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
body,td,th {
	font-family: Verdana;
	font-size: 10px;
	text-align: center;
	color: #000;
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
	color: #000;
}
a:hover {
	text-decoration: underline;
	color: #000;
}
a:active {
	text-decoration: none;
	color: #000;
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
<link href="../css/games.css" rel="stylesheet" type="text/css" />
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
.texto {
	font-size: 10px;
}
-->
</style>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
</head>

<body>
<div align="center"><br />
  <br />
  <br />
</div>
<table border="0" align="center">
  <tr>
    <td width="600" valign="top" bgcolor="#FFFFFF"><img src="topo.png" width="950" height="100" /></td>
  </tr>
</table>
<br />
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right">
      <?php
	echo $tNGs->getErrorMsg();
?>
    <a href="<?php echo $logoutTransaction->getLogoutLink(); ?>">Sair do Painel<br />
    <br />
    </a></div></td>
  </tr>
  <tr>
    <td bgcolor="#000000"><br /></td>
  </tr>
</table>
<br />
<br />
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200"><a href="icone/index.php"><img src="../imagens/admin/novoicone.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="contato/index.php"><img src="../imagens/admin/contato.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="100"><p><a href="mural/index.php"><img src="../imagens/admin/comentario.png" alt="" width="64" height="64" border="0" /></a></p></td>
    <td width="100"><a href="http://webmail.myicone.com/tupi/"><img src="contato/email.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="https://painel.kinghost.net/login.php"><img src="icone/kinghost.jpg" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="http://www.myicone.com/estados/"><img src="br.png" alt="" width="69" height="48" border="0" /></a></td>
    <td width="200"><a href="icone/gerenciar.php"><img src="imagens/bancodedados.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="../valores.php"><img src="imagens/valores.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="../indexnova.php"><img src="../imagens/oculos.png" alt="" width="64" height="64" border="0" /></a></td>
    <td width="200"><a href="../cadastro/index.php"><img src="../imagens/colaboradores.png" alt="" width="64" height="64" border="0" /></a></td>
  </tr>
  <tr class="texto">
    <td width="200" valign="top">&Iacute;CONES</td>
    <td width="200" valign="top">CONTATO</td>
    <td width="100" valign="top">COMENT&Aacute;RIOS</td>
    <td width="100" valign="top"><a href="http://webmail.myicone.com/tupi/">EMAIL DE CONTATO</a></td>
    <td width="200" valign="top"><a href="https://painel.kinghost.net/login.php">PAINEL DE CONTROLE KINGHOST</a></td>
    <td width="200" valign="top"><a href="http://www.myicone.com/estados/">ESTADOS</a></td>
    <td width="200" valign="top"><a href="icone/gerenciar.php">BASE DE DADOS DE &Iacute;CONES</a></td>
    <td width="200" valign="top"><a href="../valores.php">VALORES</a></td>
    <td width="200" valign="top"><a href="../indexnova.php">NOVO SITE</a></td>
    <td width="200" valign="top">CADASTRO</td>
  </tr>
  <tr>
    <td height="111" colspan="10" valign="top"><p><a href="../cadastro/index.php"></a></p>      <p><a href="http://www.myicone.com" target="_blank"><img src="imagens/package_toys.png" alt="" width="64" height="64" border="0" /></a><br />
      <br />
      MY&Iacute;CONE.COM      <br />
    </p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="10" bgcolor="#000000">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <td><div align="center"><img src="../imagens/admin/maos.png" width="72" height="72" /></div></td>
</tr>
<tr>
  <td><br />
    ADMINISTRADOR - Douglas Negri<br />    <br /></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>