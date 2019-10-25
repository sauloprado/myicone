<?php require_once('../../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

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

// Filter
$tfi_listmural8 = new TFI_TableFilter($conn_myicone, "tfi_listmural8");
$tfi_listmural8->addColumn("mural.nome_mural", "STRING_TYPE", "nome_mural", "%");
$tfi_listmural8->addColumn("mural.cidade_estado_mural", "STRING_TYPE", "cidade_estado_mural", "%");
$tfi_listmural8->addColumn("mural.msg_mural", "STRING_TYPE", "msg_mural", "%");
$tfi_listmural8->addColumn("mural.email_mural", "STRING_TYPE", "email_mural", "%");
$tfi_listmural8->addColumn("mural.status_mural", "STRING_TYPE", "status_mural", "%");
$tfi_listmural8->Execute();

// Sorter
$tso_listmural8 = new TSO_TableSorter("rsmural1", "tso_listmural8");
$tso_listmural8->addColumn("mural.nome_mural");
$tso_listmural8->addColumn("mural.cidade_estado_mural");
$tso_listmural8->addColumn("mural.msg_mural");
$tso_listmural8->addColumn("mural.email_mural");
$tso_listmural8->addColumn("mural.status_mural");
$tso_listmural8->setDefault("mural.nome_mural DESC");
$tso_listmural8->Execute();

// Navigation
$nav_listmural8 = new NAV_Regular("nav_listmural8", "rsmural1", "../../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsmural1 = $_SESSION['max_rows_nav_listmural8'];
$pageNum_rsmural1 = 0;
if (isset($_GET['pageNum_rsmural1'])) {
  $pageNum_rsmural1 = $_GET['pageNum_rsmural1'];
}
$startRow_rsmural1 = $pageNum_rsmural1 * $maxRows_rsmural1;

// Defining List Recordset variable
$NXTFilter_rsmural1 = "1=1";
if (isset($_SESSION['filter_tfi_listmural8'])) {
  $NXTFilter_rsmural1 = $_SESSION['filter_tfi_listmural8'];
}
// Defining List Recordset variable
$NXTSort_rsmural1 = "mural.nome_mural DESC";
if (isset($_SESSION['sorter_tso_listmural8'])) {
  $NXTSort_rsmural1 = $_SESSION['sorter_tso_listmural8'];
}
mysql_select_db($database_myicone, $myicone);

$query_rsmural1 = "SELECT mural.nome_mural, mural.cidade_estado_mural, mural.msg_mural, mural.email_mural, mural.status_mural, mural.id_mural FROM mural WHERE {$NXTFilter_rsmural1} ORDER BY {$NXTSort_rsmural1}";
$query_limit_rsmural1 = sprintf("%s LIMIT %d, %d", $query_rsmural1, $startRow_rsmural1, $maxRows_rsmural1);
$rsmural1 = mysql_query($query_limit_rsmural1, $myicone) or die(mysql_error());
$row_rsmural1 = mysql_fetch_assoc($rsmural1);

if (isset($_GET['totalRows_rsmural1'])) {
  $totalRows_rsmural1 = $_GET['totalRows_rsmural1'];
} else {
  $all_rsmural1 = mysql_query($query_rsmural1);
  $totalRows_rsmural1 = mysql_num_rows($all_rsmural1);
}
$totalPages_rsmural1 = ceil($totalRows_rsmural1/$maxRows_rsmural1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listmural8->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerenciar</title>
<?php ?>
<link href="../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: false,
  duplicate_navigation: false,
  row_effects: false,
  show_as_buttons: false,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_nome_mural {width:140px; overflow:hidden;}
  .KT_col_cidade_estado_mural {width:140px; overflow:hidden;}
  .KT_col_msg_mural {width:140px; overflow:hidden;}
  .KT_col_email_mural {width:140px; overflow:hidden;}
  .KT_col_status_mural {width:140px; overflow:hidden;}
</style>
</head>

<body>
<p>&nbsp;</p>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><p><a href="index.php"><img src="../../pages/imagens/seta1.png" width="50" height="150" border="0" /></a></p>
      <p align="center">Voltar</p></td>
    <td align="center"><img src="topo.png" width="950" height="100" /><br />
      <br />      <br /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
<td>&nbsp;
  <div class="KT_tng" id="listmural8">
    <h1> Mural
      <?php
  $nav_listmural8->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
    </h1>
    <div class="KT_tnglist">
      <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
        <div class="KT_options"> <a href="<?php echo $nav_listmural8->getShowAllLink(); ?>"><?php echo NXT_getResource("Mostrar"); ?>
          <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listmural8'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listmural8']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("Todos"); ?>
            <?php } 
  // endif Conditional region1
?>
<?php echo NXT_getResource("Registros"); ?></a> &nbsp;
          &nbsp;
          <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listmural8'] == 1) {
?>
            <a href="<?php echo $tfi_listmural8->getResetFilterLink(); ?>"><?php echo NXT_getResource("Ocultar Filtro"); ?></a>
            <?php 
  // else Conditional region2
  } else { ?>
            <a href="<?php echo $tfi_listmural8->getShowFilterLink(); ?>"><?php echo NXT_getResource("Mostrar Filtro"); ?></a>
            <?php } 
  // endif Conditional region2
?>
        </div>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <thead>
            <tr class="KT_row_order">
              <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
              </th>
              <th id="nome_mural" class="KT_sorter KT_col_nome_mural <?php echo $tso_listmural8->getSortIcon('mural.nome_mural'); ?>"> <a href="<?php echo $tso_listmural8->getSortLink('mural.nome_mural'); ?>">Nome</a></th>
              <th id="cidade_estado_mural" class="KT_sorter KT_col_cidade_estado_mural <?php echo $tso_listmural8->getSortIcon('mural.cidade_estado_mural'); ?>"> <a href="<?php echo $tso_listmural8->getSortLink('mural.cidade_estado_mural'); ?>">Cidade/Estado</a></th>
              <th id="msg_mural" class="KT_sorter KT_col_msg_mural <?php echo $tso_listmural8->getSortIcon('mural.msg_mural'); ?>"> <a href="<?php echo $tso_listmural8->getSortLink('mural.msg_mural'); ?>">Comentário</a></th>
              <th id="email_mural" class="KT_sorter KT_col_email_mural <?php echo $tso_listmural8->getSortIcon('mural.email_mural'); ?>"> <a href="<?php echo $tso_listmural8->getSortLink('mural.email_mural'); ?>">Email</a></th>
              <th id="status_mural" class="KT_sorter KT_col_status_mural <?php echo $tso_listmural8->getSortIcon('mural.status_mural'); ?>"> <a href="<?php echo $tso_listmural8->getSortLink('mural.status_mural'); ?>">Status</a></th>
              <th>&nbsp;</th>
            </tr>
            <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listmural8'] == 1) {
?>
              <tr class="KT_row_filter">
                <td>&nbsp;</td>
                <td><input type="text" name="tfi_listmural8_nome_mural" id="tfi_listmural8_nome_mural" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmural8_nome_mural']); ?>" size="20" maxlength="20" /></td>
                <td><input type="text" name="tfi_listmural8_cidade_estado_mural" id="tfi_listmural8_cidade_estado_mural" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmural8_cidade_estado_mural']); ?>" size="20" maxlength="20" /></td>
                <td><input type="text" name="tfi_listmural8_msg_mural" id="tfi_listmural8_msg_mural" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmural8_msg_mural']); ?>" size="20" maxlength="100" /></td>
                <td><input type="text" name="tfi_listmural8_email_mural" id="tfi_listmural8_email_mural" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmural8_email_mural']); ?>" size="20" maxlength="200" /></td>
                <td><select name="tfi_listmural8_status_mural" id="tfi_listmural8_status_mural">
                  <option value="on" <?php if (!(strcmp("on", KT_escapeAttribute(@$_SESSION['tfi_listmural8_status_mural'])))) {echo "SELECTED";} ?>>Aceitar</option>
                  <option value="off" <?php if (!(strcmp("off", KT_escapeAttribute(@$_SESSION['tfi_listmural8_status_mural'])))) {echo "SELECTED";} ?>>Negar</option>
                </select></td>
                <td><input type="submit" name="tfi_listmural8" value="<?php echo NXT_getResource("Filtrar"); ?>" /></td>
              </tr>
              <?php } 
  // endif Conditional region3
?>
          </thead>
          <tbody>
            <?php if ($totalRows_rsmural1 == 0) { // Show if recordset empty ?>
              <tr>
                <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
              </tr>
              <?php } // Show if recordset empty ?>
            <?php if ($totalRows_rsmural1 > 0) { // Show if recordset not empty ?>
              <?php do { ?>
                <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                  <td><input type="checkbox" name="kt_pk_mural" class="id_checkbox" value="<?php echo $row_rsmural1['id_mural']; ?>" />
                    <input type="hidden" name="id_mural" class="id_field" value="<?php echo $row_rsmural1['id_mural']; ?>" /></td>
                  <td><div class="KT_col_nome_mural"><?php echo KT_FormatForList($row_rsmural1['nome_mural'], 20); ?></div></td>
                  <td><div class="KT_col_cidade_estado_mural"><?php echo KT_FormatForList($row_rsmural1['cidade_estado_mural'], 20); ?></div></td>
                  <td><div class="KT_col_msg_mural"><?php echo KT_FormatForList($row_rsmural1['msg_mural'], 20); ?></div></td>
                  <td><div class="KT_col_email_mural"><?php echo KT_FormatForList($row_rsmural1['email_mural'], 20); ?></div></td>
                  <td><div class="KT_col_status_mural"><?php echo KT_FormatForList($row_rsmural1['status_mural'], 20); ?></div></td>
                  <td><a class="KT_edit_link" href="permissao.php?id_mural=<?php echo $row_rsmural1['id_mural']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Editar"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Deletar"); ?></a></td>
                </tr>
                <?php } while ($row_rsmural1 = mysql_fetch_assoc($rsmural1)); ?>
              <?php } // Show if recordset not empty ?>
          </tbody>
        </table>
        <div class="KT_bottomnav">
          <div>
            <?php
            $nav_listmural8->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
          </div>
        </div>
        <div class="KT_bottombuttons">
          <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Editar"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Deletar"); ?></a></div>
          <span>&nbsp;</span>
          <select name="no_new" id="no_new">
            <option value="1">1</option>
            <option value="3">3</option>
            <option value="6">6</option>
          </select>
          <a class="KT_additem_op_link" href="permissao.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Adicionar Novo"); ?></a></div>
      </form>
    </div>
    <br class="clearfixplain" />
  </div>
  <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsmural1);
?>
