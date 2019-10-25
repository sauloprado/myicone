<?php require_once('../../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_mural = new tNG_multipleInsert($conn_myicone);
$tNGs->addTransaction($ins_mural);
// Register triggers
$ins_mural->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_mural->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_mural->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$ins_mural->setTable("mural");
$ins_mural->addColumn("nome_mural", "STRING_TYPE", "POST", "nome_mural");
$ins_mural->addColumn("cidade_estado_mural", "STRING_TYPE", "POST", "cidade_estado_mural");
$ins_mural->addColumn("email_mural", "STRING_TYPE", "POST", "email_mural");
$ins_mural->addColumn("msg_mural", "STRING_TYPE", "POST", "msg_mural");
$ins_mural->addColumn("status_mural", "STRING_TYPE", "POST", "status_mural");
$ins_mural->setPrimaryKey("id_mural", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_mural = new tNG_multipleUpdate($conn_myicone);
$tNGs->addTransaction($upd_mural);
// Register triggers
$upd_mural->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_mural->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_mural->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$upd_mural->setTable("mural");
$upd_mural->addColumn("nome_mural", "STRING_TYPE", "POST", "nome_mural");
$upd_mural->addColumn("cidade_estado_mural", "STRING_TYPE", "POST", "cidade_estado_mural");
$upd_mural->addColumn("email_mural", "STRING_TYPE", "POST", "email_mural");
$upd_mural->addColumn("msg_mural", "STRING_TYPE", "POST", "msg_mural");
$upd_mural->addColumn("status_mural", "STRING_TYPE", "POST", "status_mural");
$upd_mural->setPrimaryKey("id_mural", "NUMERIC_TYPE", "GET", "id_mural");

// Make an instance of the transaction object
$del_mural = new tNG_multipleDelete($conn_myicone);
$tNGs->addTransaction($del_mural);
// Register triggers
$del_mural->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_mural->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
// Add columns
$del_mural->setTable("mural");
$del_mural->setPrimaryKey("id_mural", "NUMERIC_TYPE", "GET", "id_mural");

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Permissao</title>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><p><a href="index.php"><img src="../../pages/imagens/seta1.png" width="50" height="150" border="0" /></a></p>
      <p align="center">Voltar</p></td>
    <td align="center"><img src="topo.png" width="950" height="100" /><br />
      <br />
      <br /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<table width="900" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><p>&nbsp;
        <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1>
          <?php 
// Show IF Conditional region1 
if (@$_GET['id_mural'] == "") {
?>
            <?php echo NXT_getResource("Insert_FH"); ?>
            <?php 
// else Conditional region1
} else { ?>
            <?php echo NXT_getResource("Update_FH"); ?>
            <?php } 
// endif Conditional region1
?>
          Mural </h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rsmural > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="nome_mural_<?php echo $cnt1; ?>">Nome:</label></td>
                  <td><input type="text" name="nome_mural_<?php echo $cnt1; ?>" id="nome_mural_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmural['nome_mural']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("nome_mural");?> <?php echo $tNGs->displayFieldError("mural", "nome_mural", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="cidade_estado_mural_<?php echo $cnt1; ?>">Cidade/Estado:</label></td>
                  <td><input type="text" name="cidade_estado_mural_<?php echo $cnt1; ?>" id="cidade_estado_mural_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmural['cidade_estado_mural']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("cidade_estado_mural");?> <?php echo $tNGs->displayFieldError("mural", "cidade_estado_mural", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="email_mural_<?php echo $cnt1; ?>">Email:</label></td>
                  <td><input type="text" name="email_mural_<?php echo $cnt1; ?>" id="email_mural_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmural['email_mural']); ?>" size="32" maxlength="200" />
                    <?php echo $tNGs->displayFieldHint("email_mural");?> <?php echo $tNGs->displayFieldError("mural", "email_mural", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="msg_mural_<?php echo $cnt1; ?>">Comentário:</label></td>
                  <td><textarea name="msg_mural_<?php echo $cnt1; ?>" cols="60" id="msg_mural_<?php echo $cnt1; ?>"><?php echo KT_escapeAttribute($row_rsmural['msg_mural']); ?></textarea>
                  <?php echo $tNGs->displayFieldHint("msg_mural");?> <?php echo $tNGs->displayFieldError("mural", "msg_mural", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="status_mural_<?php echo $cnt1; ?>">Status:</label></td>
                  <td><select name="status_mural_<?php echo $cnt1; ?>" id="status_mural_<?php echo $cnt1; ?>">
                    <option value="on" <?php if (!(strcmp("on", KT_escapeAttribute($row_rsmural['status_mural'])))) {echo "selected=\"selected\"";} ?>>ON</option>
                    <option value="off" <?php if (!(strcmp("off", KT_escapeAttribute($row_rsmural['status_mural'])))) {echo "selected=\"selected\"";} ?>>OFF</option>
                  </select>
                  <?php echo $tNGs->displayFieldError("mural", "status_mural", $cnt1); ?></td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_mural_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsmural['kt_pk_mural']); ?>" />
              <?php } while ($row_rsmural = mysql_fetch_assoc($rsmural)); ?>
            <div class="KT_bottombuttons">
              <div>
                <?php 
      // Show IF Conditional region1
      if (@$_GET['id_mural'] == "") {
      ?>
                  <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("inserir"); ?>" />
                  <?php 
      // else Conditional region1
      } else { ?>
                  <div class="KT_operations">
                    <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Inserir Novo"); ?>" onclick="nxt_form_insertasnew(this, 'id_mural')" />
                  </div>
                  <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Atualizar"); ?>" />
                  <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Deletar"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                  <?php }
      // endif Conditional region1
      ?>
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../includes/nxt/back.php')" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
      <p>&nbsp;</p>
      </p>
<p>&nbsp;</p>
<p></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>