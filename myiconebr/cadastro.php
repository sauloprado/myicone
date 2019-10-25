<?php require_once('Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("icone_icone");
  $uploadObj->setDbFieldName("icone_icone");
  $uploadObj->setFolder("cadastro/icones/");
  $uploadObj->setResize("true", 64, 64);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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

mysql_select_db($database_myicone, $myicone);
$query_cadastro = "SELECT * FROM criaricones";
$cadastro = mysql_query($query_cadastro, $myicone) or die(mysql_error());
$row_cadastro = mysql_fetch_assoc($cadastro);
$totalRows_cadastro = mysql_num_rows($cadastro);

// Make an insert transaction instance
$ins_criaricones = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones);
// Register triggers
$ins_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_criaricones->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "cadastrook.php");
$ins_criaricones->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones->setTable("criaricones");
$ins_criaricones->addColumn("nome_razao", "STRING_TYPE", "POST", "nome_razao");
$ins_criaricones->addColumn("nome_fantasia", "STRING_TYPE", "POST", "nome_fantasia");
$ins_criaricones->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$ins_criaricones->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$ins_criaricones->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_criaricones->addColumn("uf", "STRING_TYPE", "POST", "uf");
$ins_criaricones->addColumn("cep", "STRING_TYPE", "POST", "cep");
$ins_criaricones->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_criaricones->addColumn("telefone2", "STRING_TYPE", "POST", "telefone2");
$ins_criaricones->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_criaricones->addColumn("cnpj", "STRING_TYPE", "POST", "cnpj");
$ins_criaricones->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$ins_criaricones->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscriaricones = $tNGs->getRecordset("criaricones");
$row_rscriaricones = mysql_fetch_assoc($rscriaricones);
$totalRows_rscriaricones = mysql_num_rows($rscriaricones);

$colname_cadastro = "-1";
if (isset($_GET['cadastror'])) {
  $colname_cadastro = $_GET['cadastror'];
}
mysql_select_db($database_myicone, $myicone);
$query_cadastro = sprintf("SELECT * FROM criaricones WHERE nome_icone LIKE %s", GetSQLValueString("%" . $colname_cadastro . "%", "text"));
$cadastro = mysql_query($query_cadastro, $myicone) or die(mysql_error());
$row_cadastro = mysql_fetch_assoc($cadastro);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Myicone.com - Seja Bem Vindo ao Mundo dos &Iacute;cones!</title>
<link href="css/semborda.css" rel="stylesheet" type="text/css" />
<link href="file:///C|/apache2triad/htdocs/Educadora FM - A Sua Cara!.url" />

<link href="css/texto.css" rel="stylesheet" type="text/css" />
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
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<div align="center"><br />
  <br />
  <br />
</div>
<table border="0" align="center">
  <tr>
    <td width="600" valign="top" bgcolor="#FFFFFF"><div align="center">
      <p align="center"><img src="imagens/artetoposite.jpg" width="500" height="172" /><br />
        SEJA BEM VINDO<br /><!-- INICIO DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
      <!-- FIM DO CODIGO DO CONTADOR DE VISITAS 2W.COM.BR -->
AO MUNDO DOS &Iacute;CONES.<br />
      </p>
<p><span class="style1" style="cursor:hand; color:blue; text-decoration:none" onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.myicone.com');"> Fa&ccedil;a do Myicone sua p&aacute;gina inicial</span></p>
    </div></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center">
  <tr>
    <td><div align="center">
      <p><span class="emptyrow">&nbsp;
        <?php
	echo $tNGs->getErrorMsg();
?>
      </span>
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="nome_razao">Nome da Empresa / Raz&atilde;o Social:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="nome_razao" id="nome_razao" value="<?php echo KT_escapeAttribute($row_rscriaricones['nome_razao']); ?>" size="80" />              
              <?php echo $tNGs->displayFieldHint("nome_razao");?> <?php echo $tNGs->displayFieldError("criaricones", "nome_razao"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="nome_fantasia">Nome / Nome Fantasia:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo KT_escapeAttribute($row_rscriaricones['nome_fantasia']); ?>" size="80" />              
              <?php echo $tNGs->displayFieldHint("nome_fantasia");?> <?php echo $tNGs->displayFieldError("criaricones", "nome_fantasia"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="endereco">Endereco:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="endereco" id="endereco" value="<?php echo KT_escapeAttribute($row_rscriaricones['endereco']); ?>" size="80" />              
              <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("criaricones", "endereco"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="bairro">Bairro:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="bairro" id="bairro" value="<?php echo KT_escapeAttribute($row_rscriaricones['bairro']); ?>" size="60" />              
              <?php echo $tNGs->displayFieldHint("bairro");?> <?php echo $tNGs->displayFieldError("criaricones", "bairro"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="cidade">Cidade:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="cidade" id="cidade" value="<?php echo KT_escapeAttribute($row_rscriaricones['cidade']); ?>" size="60" />              
              <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("criaricones", "cidade"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="uf">Uf:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input name="uf" type="text" id="uf" value="<?php echo KT_escapeAttribute($row_rscriaricones['uf']); ?>" size="10" maxlength="2" />              
              <?php echo $tNGs->displayFieldHint("uf");?> <?php echo $tNGs->displayFieldError("criaricones", "uf"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="cep">Cep:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="cep" id="cep" value="<?php echo KT_escapeAttribute($row_rscriaricones['cep']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("cep");?> <?php echo $tNGs->displayFieldError("criaricones", "cep"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="telefone">Telefone:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="telefone" id="telefone" value="<?php echo KT_escapeAttribute($row_rscriaricones['telefone']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("criaricones", "telefone"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="telefone2">Telefone2:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="telefone2" id="telefone2" value="<?php echo KT_escapeAttribute($row_rscriaricones['telefone2']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("telefone2");?> <?php echo $tNGs->displayFieldError("criaricones", "telefone2"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="email">Email:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="email" id="email" value="<?php echo KT_escapeAttribute($row_rscriaricones['email']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("criaricones", "email"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="cnpj">Cnpj:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="cnpj" id="cnpj" value="<?php echo KT_escapeAttribute($row_rscriaricones['cnpj']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("cnpj");?> <?php echo $tNGs->displayFieldError("criaricones", "cnpj"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="site_icone">WebSite ou URL:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="text" name="site_icone" id="site_icone" value="<?php echo KT_escapeAttribute($row_rscriaricones['site_icone']); ?>" size="32" />              
              <?php echo $tNGs->displayFieldHint("site_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "site_icone"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
              <label for="icone_icone">Ícone ou LogoMarca:</label>
              </span></td>
            <td>
              <span class="emptyrow">
              <input type="file" name="icone_icone" id="icone_icone" size="32" />              
              <?php echo $tNGs->displayFieldError("criaricones", "icone_icone"); ?></span></td>
          </tr>
          <tr>
            <td class="KT_th">
              <span class="emptyrow">
                <label for="meta_busca">Meta da busca:</label>
              </span></td>
            <td>
              <span class="emptyrow">
                <textarea name="meta_busca" id="meta_busca" cols="70" rows="5"><?php echo KT_escapeAttribute($row_rscriaricones['meta_busca']); ?></textarea>              
              <?php echo $tNGs->displayFieldHint("meta_busca");?> <?php echo $tNGs->displayFieldError("criaricones", "meta_busca"); ?></span></td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><div align="left"> <span class="emptyrow"><br />
    <input type="submit" name="KT_Insert1" id="KT_Insert1" value="Efetuar Cadastro" />
    <label>
      <input type="reset" name="Reset" id="button" value="Limpar Dados" />
      </label>
    <br />
    </span></div></td>
          </tr>
        </table>
      </form></div>
      <div align="left"></div></td>
  </tr>
</table>
<p><br />
</p>
<table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="mural.php"><img src="imagens/ct.jpg" width="270" height="40" border="0" /></a></td>
    <td><div align="right"><a href="comunicado.php"><img src="imagens/cm.jpg" width="270" height="40" border="0" /></a></div></td>
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
mysql_free_result($cadastro);
?>
