<?php require_once('../../Connections/myicone01.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_myicone01 = new KT_connection($myicone01, $database_myicone01);

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
  $uploadObj->setFolder("../../iconesbd/");
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

mysql_select_db($database_myicone01, $myicone01);
$query_icones = "SELECT * FROM criaricones";
$icones = mysql_query($query_icones, $myicone01) or die(mysql_error());
$row_icones = mysql_fetch_assoc($icones);
$totalRows_icones = mysql_num_rows($icones);

// Make an insert transaction instance
$ins_criaricones = new tNG_insert($conn_myicone01);
$tNGs->addTransaction($ins_criaricones);
// Register triggers
$ins_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_criaricones->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "iconeok.php");
$ins_criaricones->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones->setTable("criaricones");
$ins_criaricones->addColumn("nome_icone", "STRING_TYPE", "POST", "nome_icone");
$ins_criaricones->addColumn("categoria_icone", "STRING_TYPE", "POST", "categoria_icone");
$ins_criaricones->addColumn("descricao_icone", "STRING_TYPE", "POST", "descricao_icone");
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
}
-->
</style>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<p>&nbsp;</p>
<table width="900" border="0" align="center">
  <tr>
    <td><img src="../topo.png" width="950" height="100" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_icone">Nome_icone:</label></td>
            <td><input type="text" name="nome_icone" id="nome_icone" value="<?php echo KT_escapeAttribute($row_rscriaricones['nome_icone']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("nome_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "nome_icone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="categoria_icone">Categoria_icone:</label></td>
            <td><input type="text" name="categoria_icone" id="categoria_icone" value="<?php echo KT_escapeAttribute($row_rscriaricones['categoria_icone']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("categoria_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "categoria_icone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="descricao_icone">Descricao_icone:</label></td>
            <td><input type="text" name="descricao_icone" id="descricao_icone" value="<?php echo KT_escapeAttribute($row_rscriaricones['descricao_icone']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("descricao_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "descricao_icone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="site_icone">Site_icone:</label></td>
            <td><input type="text" name="site_icone" id="site_icone" value="<?php echo KT_escapeAttribute($row_rscriaricones['site_icone']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("site_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "site_icone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="icone_icone">Icone_icone:</label></td>
            <td><input type="file" name="icone_icone" id="icone_icone" size="32" />
              <?php echo $tNGs->displayFieldError("criaricones", "icone_icone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca">Meta_busca:</label></td>
            <td><textarea name="meta_busca" id="meta_busca" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscriaricones['meta_busca']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("meta_busca");?> <?php echo $tNGs->displayFieldError("criaricones", "meta_busca"); ?></td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Cadastrar Icone" /></td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><a href="../index.php">Voltar</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($icones);
?>
