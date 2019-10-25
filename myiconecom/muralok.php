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
$formValidation->addField("nome_mural", true, "text", "", "", "", "Necessário para envio.");
$formValidation->addField("cidade_estado_mural", true, "text", "", "", "", "Necessário para envio.");
$formValidation->addField("msg_mural", true, "text", "", "", "", "Necessário para envio.");
$tNGs->prepareValidation($formValidation);
// End trigger

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
$query_listar = "SELECT * FROM mural WHERE id_mural = id_mural ORDER BY status_mural ASC";
$listar = mysql_query($query_listar, $myicone) or die(mysql_error());
$row_listar = mysql_fetch_assoc($listar);
$totalRows_listar = mysql_num_rows($listar);mysql_select_db($database_myicone, $myicone);
$query_listar = "SELECT * FROM mural WHERE status_mural = 'on' ORDER BY id_mural DESC";
$listar = mysql_query($query_listar, $myicone) or die(mysql_error());
$row_listar = mysql_fetch_assoc($listar);
$totalRows_listar = mysql_num_rows($listar);

// Make an insert transaction instance
$ins_mural = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_mural);
// Register triggers
$ins_mural->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_mural->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_mural->registerTrigger("END", "Trigger_Default_Redirect", 99, "muralok.php");
// Add columns
$ins_mural->setTable("mural");
$ins_mural->addColumn("nome_mural", "STRING_TYPE", "POST", "nome_mural");
$ins_mural->addColumn("cidade_estado_mural", "STRING_TYPE", "POST", "cidade_estado_mural");
$ins_mural->addColumn("msg_mural", "STRING_TYPE", "POST", "msg_mural");
$ins_mural->addColumn("email_mural", "STRING_TYPE", "POST", "email_mural");
$ins_mural->setPrimaryKey("id_mural", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsmural = $tNGs->getRecordset("mural");
$row_rsmural = mysql_fetch_assoc($rsmural);
$totalRows_rsmural = mysql_num_rows($rsmural);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(imagens/bg.png);
	background-repeat: repeat-x;
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
.texto {
	color: #FFF;
}
.texto {
	text-align: center;
}
.centro {
	text-align: center;
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
<p>&nbsp;</p>
<br />
<table border="0" align="center">
  <tr>
    <td width="536"><div align="center"><img src="imagens/logonovocomentarios.jpg" width="500" height="172" /></div></td>
  </tr>
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_mural">Nome:</label></td>
            <td><input type="text" name="nome_mural" id="nome_mural" value="<?php echo KT_escapeAttribute($row_rsmural['nome_mural']); ?>" size="50" />
              <?php echo $tNGs->displayFieldHint("nome_mural");?> <?php echo $tNGs->displayFieldError("mural", "nome_mural"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cidade_estado_mural">Cidade/Estado:</label></td>
            <td><input type="text" name="cidade_estado_mural" id="cidade_estado_mural" value="<?php echo KT_escapeAttribute($row_rsmural['cidade_estado_mural']); ?>" size="50" />
            <?php echo $tNGs->displayFieldHint("cidade_estado_mural");?> <?php echo $tNGs->displayFieldError("mural", "cidade_estado_mural"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="msg_mural">Comentário:</label></td>
            <td><textarea name="msg_mural" id="msg_mural" cols="70" rows="5"><?php echo KT_escapeAttribute($row_rsmural['msg_mural']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("msg_mural");?> <?php echo $tNGs->displayFieldError("mural", "msg_mural"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="email_mural">Email:</label></td>
            <td><input type="text" name="email_mural" id="email_mural" value="<?php echo KT_escapeAttribute($row_rsmural['email_mural']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("email_mural");?> <?php echo $tNGs->displayFieldError("mural", "email_mural"); ?></td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><div align="left">
              <input type="submit" name="KT_Insert1" id="KT_Insert1" value="Enviar" />
            </div></td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><p class="centro">Coment&aacute;rio enviado com sucesso, </p>
    <p class="centro">Obrigado pela participa&ccedil;&atilde;o.</p>
    <p class="centro"><a href="index.php">voltar a p&aacute;gina inicial.</a></p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($listar);
?>
