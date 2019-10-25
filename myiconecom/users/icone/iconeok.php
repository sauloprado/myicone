<?php require_once('../../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Start trigger
$formValidation1 = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation1);
// End trigger

// Start trigger
$formValidation2 = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation2);
// End trigger

// Start trigger
$formValidation3 = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation3);
// End trigger

// Start trigger
$formValidation4 = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation4);
// End trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("icone_icone");
  $uploadObj->setDbFieldName("icone_icone");
  $uploadObj->setFolder("../../");
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
$query_criar = "SELECT * FROM criaricones";
$criar = mysql_query($query_criar, $myicone) or die(mysql_error());
$row_criar = mysql_fetch_assoc($criar);
$totalRows_criar = mysql_num_rows($criar);

// Make an insert transaction instance
$ins_criaricones = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones);
// Register triggers
$ins_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_criaricones->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_criaricones->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones->setTable("criaricones");
$ins_criaricones->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones->addColumn("categoria_icone", "STRING_TYPE", "POST", "categoria_icone");
$ins_criaricones->addColumn("descricao_icone", "STRING_TYPE", "POST", "descricao_icone");
$ins_criaricones->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones->addColumn("visitas_cliques", "STRING_TYPE", "POST", "visitas_cliques");
$ins_criaricones->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_criaricones1 = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones1);
// Register triggers
$ins_criaricones1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert2");
$ins_criaricones1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$ins_criaricones1->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_criaricones1->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones1->setTable("criaricones");
$ins_criaricones1->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones1->addColumn("categoria_icone", "STRING_TYPE", "POST", "categoria_icone");
$ins_criaricones1->addColumn("descricao_icone", "STRING_TYPE", "POST", "descricao_icone");
$ins_criaricones1->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones1->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones1->addColumn("visitas_cliques", "STRING_TYPE", "POST", "visitas_cliques");
$ins_criaricones1->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_criaricones2 = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones2);
// Register triggers
$ins_criaricones2->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert3");
$ins_criaricones2->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation2);
$ins_criaricones2->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_criaricones2->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones2->setTable("criaricones");
$ins_criaricones2->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones2->addColumn("categoria_icone", "STRING_TYPE", "POST", "categoria_icone");
$ins_criaricones2->addColumn("descricao_icone", "STRING_TYPE", "POST", "descricao_icone");
$ins_criaricones2->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones2->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones2->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_criaricones3 = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones3);
// Register triggers
$ins_criaricones3->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert4");
$ins_criaricones3->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation3);
$ins_criaricones3->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_criaricones3->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones3->setTable("criaricones");
$ins_criaricones3->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones3->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones3->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones3->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$ins_criaricones3->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Make an insert transaction instance
$ins_criaricones4 = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_criaricones4);
// Register triggers
$ins_criaricones4->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert5");
$ins_criaricones4->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation4);
$ins_criaricones4->registerTrigger("END", "Trigger_Default_Redirect", 99, "iconeok.php");
$ins_criaricones4->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones4->setTable("criaricones");
$ins_criaricones4->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones4->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones4->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones4->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$ins_criaricones4->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscriaricones = $tNGs->getRecordset("criaricones");
$row_rscriaricones = mysql_fetch_assoc($rscriaricones);
$totalRows_rscriaricones = mysql_num_rows($rscriaricones);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Icones</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../../imagens/bg.png);
	background-repeat: repeat-x;
	text-align: center;
}
-->
</style>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
	color: #000;
}
a:visited {
	text-decoration: none;
	color: #000;
}
a:hover {
	text-decoration: none;
	color: #000;
}
a:active {
	text-decoration: none;
	color: #000;
}
#form1 .KT_tngtable {
	text-align: left;
}
-->
</style></head>

<body>
<p><br />
</p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><p><a href="../index2.php"><img src="../../pages/imagens/seta1.png" alt="" width="50" height="150" border="0" /></a></p></td>
        <td align="center"><img src="../topo.png" alt="" width="950" height="100" /><br />
          <br />          <br /></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<p align="center">Cadastrado com sucesso!<br />
</p>
<p><br />
<a href="../../index.php">Depois de cadastrado teste com uma busca, clicando aqui.</a></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($criar);
?>
