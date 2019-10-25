<?php require_once('../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

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
$tfi_listcadastrojr5 = new TFI_TableFilter($conn_myicone, "tfi_listcadastrojr5");
$tfi_listcadastrojr5->addColumn("cadastrojr.cnpj", "STRING_TYPE", "cnpj", "%");
$tfi_listcadastrojr5->addColumn("cadastrojr.website", "STRING_TYPE", "website", "%");
$tfi_listcadastrojr5->addColumn("cadastrojr.icone_imagem", "STRING_TYPE", "icone_imagem", "%");
$tfi_listcadastrojr5->Execute();

// Sorter
$tso_listcadastrojr5 = new TSO_TableSorter("rscadastrojr1", "tso_listcadastrojr5");
$tso_listcadastrojr5->addColumn("cadastrojr.cnpj");
$tso_listcadastrojr5->addColumn("cadastrojr.website");
$tso_listcadastrojr5->addColumn("cadastrojr.icone_imagem");
$tso_listcadastrojr5->setDefault("cadastrojr.cnpj");
$tso_listcadastrojr5->Execute();

// Navigation
$nav_listcadastrojr5 = new NAV_Regular("nav_listcadastrojr5", "rscadastrojr1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rscadastrojr1 = $_SESSION['max_rows_nav_listcadastrojr5'];
$pageNum_rscadastrojr1 = 0;
if (isset($_GET['pageNum_rscadastrojr1'])) {
  $pageNum_rscadastrojr1 = $_GET['pageNum_rscadastrojr1'];
}
$startRow_rscadastrojr1 = $pageNum_rscadastrojr1 * $maxRows_rscadastrojr1;

// Defining List Recordset variable
$NXTFilter_rscadastrojr1 = "1=1";
if (isset($_SESSION['filter_tfi_listcadastrojr5'])) {
  $NXTFilter_rscadastrojr1 = $_SESSION['filter_tfi_listcadastrojr5'];
}
// Defining List Recordset variable
$NXTSort_rscadastrojr1 = "cadastrojr.cnpj";
if (isset($_SESSION['sorter_tso_listcadastrojr5'])) {
  $NXTSort_rscadastrojr1 = $_SESSION['sorter_tso_listcadastrojr5'];
}
mysql_select_db($database_myicone, $myicone);

$query_rscadastrojr1 = "SELECT cadastrojr.cnpj, cadastrojr.website, cadastrojr.icone_imagem, cadastrojr.id FROM cadastrojr WHERE {$NXTFilter_rscadastrojr1} ORDER BY {$NXTSort_rscadastrojr1}";
$query_limit_rscadastrojr1 = sprintf("%s LIMIT %d, %d", $query_rscadastrojr1, $startRow_rscadastrojr1, $maxRows_rscadastrojr1);
$rscadastrojr1 = mysql_query($query_limit_rscadastrojr1, $myicone) or die(mysql_error());
$row_rscadastrojr1 = mysql_fetch_assoc($rscadastrojr1);

if (isset($_GET['totalRows_rscadastrojr1'])) {
  $totalRows_rscadastrojr1 = $_GET['totalRows_rscadastrojr1'];
} else {
  $all_rscadastrojr1 = mysql_query($query_rscadastrojr1);
  $totalRows_rscadastrojr1 = mysql_num_rows($all_rscadastrojr1);
}
$totalPages_rscadastrojr1 = ceil($totalRows_rscadastrojr1/$maxRows_rscadastrojr1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcadastrojr5->checkBoundries();
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
-->
</style>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
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
  .KT_col_cnpj {width:140px; overflow:hidden;}
  .KT_col_website {width:140px; overflow:hidden;}
  .KT_col_icone_imagem {width:140px; overflow:hidden;}
.body {
	text-align: center;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" align="center">
  <tr>
    <td><a href="index.php"><img src="imagens/home.png" width="67" height="115" border="0" /></a></td>
    <td><img src="imagens/cadastroefetuado.png" width="600" height="100" /></td>
    <td><a href="../users/index2.php"><img src="imagens/painel.png" width="67" height="115" border="0" /></a></td>
  </tr>
</table>
<br />
<table border="0" align="center">
  <tr>
    <td>&nbsp;
      <div class="KT_tng" id="listcadastrojr5">
        <h1> Cadastros de Pessoa Jur&iacute;dica
          <?php
  $nav_listcadastrojr5->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
        </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> <a href="<?php echo $nav_listcadastrojr5->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
              <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcadastrojr5'] == 1) {
?>
                <?php echo $_SESSION['default_max_rows_nav_listcadastrojr5']; ?>
                <?php 
  // else Conditional region1
  } else { ?>
                <?php echo NXT_getResource("all"); ?>
                <?php } 
  // endif Conditional region1
?>
<?php echo NXT_getResource("records"); ?></a> &nbsp;
              &nbsp;
              <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listcadastrojr5'] == 1) {
?>
                <a href="<?php echo $tfi_listcadastrojr5->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                <?php 
  // else Conditional region2
  } else { ?>
                <a href="<?php echo $tfi_listcadastrojr5->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                <?php } 
  // endif Conditional region2
?>
            </div>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <thead>
                <tr class="KT_row_order">
                  <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                  </th>
                  <th id="cnpj" class="KT_sorter KT_col_cnpj <?php echo $tso_listcadastrojr5->getSortIcon('cadastrojr.cnpj'); ?>"> <a href="<?php echo $tso_listcadastrojr5->getSortLink('cadastrojr.cnpj'); ?>">Cnpj</a></th>
                  <th id="website" class="KT_sorter KT_col_website <?php echo $tso_listcadastrojr5->getSortIcon('cadastrojr.website'); ?>"> <a href="<?php echo $tso_listcadastrojr5->getSortLink('cadastrojr.website'); ?>">Website</a></th>
                  <th id="icone_imagem" class="KT_sorter KT_col_icone_imagem <?php echo $tso_listcadastrojr5->getSortIcon('cadastrojr.icone_imagem'); ?>"> <a href="<?php echo $tso_listcadastrojr5->getSortLink('cadastrojr.icone_imagem'); ?>">Ícone</a></th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcadastrojr5'] == 1) {
?>
                  <tr class="KT_row_filter">
                    <td>&nbsp;</td>
                    <td><input type="text" name="tfi_listcadastrojr5_cnpj" id="tfi_listcadastrojr5_cnpj" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcadastrojr5_cnpj']); ?>" size="20" maxlength="255" /></td>
                    <td><input type="text" name="tfi_listcadastrojr5_website" id="tfi_listcadastrojr5_website" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcadastrojr5_website']); ?>" size="20" maxlength="255" /></td>
                    <td><input type="text" name="tfi_listcadastrojr5_icone_imagem" id="tfi_listcadastrojr5_icone_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcadastrojr5_icone_imagem']); ?>" size="20" maxlength="255" /></td>
                    <td><input type="submit" name="tfi_listcadastrojr5" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                  </tr>
                  <?php } 
  // endif Conditional region3
?>
              </thead>
              <tbody>
                <?php if ($totalRows_rscadastrojr1 == 0) { // Show if recordset empty ?>
                  <tr>
                    <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                  </tr>
                  <?php } // Show if recordset empty ?>
                <?php if ($totalRows_rscadastrojr1 > 0) { // Show if recordset not empty ?>
                  <?php do { ?>
                    <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                      <td><input type="checkbox" name="kt_pk_cadastrojr" class="id_checkbox" value="<?php echo $row_rscadastrojr1['id']; ?>" />
                        <input type="hidden" name="id" class="id_field" value="<?php echo $row_rscadastrojr1['id']; ?>" /></td>
                      <td><div class="KT_col_cnpj"><?php echo KT_FormatForList($row_rscadastrojr1['cnpj'], 20); ?></div></td>
                      <td><div class="KT_col_website"><?php echo KT_FormatForList($row_rscadastrojr1['website'], 20); ?></div></td>
                      <td><div class="KT_col_icone_imagem"><?php echo KT_FormatForList($row_rscadastrojr1['icone_imagem'], 20); ?></div></td>
                      <td><a class="KT_edit_link" href="cadastrosupdate.php?id=<?php echo $row_rscadastrojr1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
                    </tr>
                    <?php } while ($row_rscadastrojr1 = mysql_fetch_assoc($rscadastrojr1)); ?>
                  <?php } // Show if recordset not empty ?>
              </tbody>
            </table>
            <div class="KT_bottomnav">
              <div>
                <?php
            $nav_listcadastrojr5->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
              </div>
            </div>
            <div class="KT_bottombuttons">
              <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></div>
              <span>&nbsp;</span>
              <select name="no_new" id="no_new">
                <option value="1">1</option>
                <option value="3">3</option>
                <option value="6">6</option>
              </select>
              <a class="KT_additem_op_link" href="cadastrosupdate.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
          </form>
        </div>
        <div align="center"><br class="clearfixplain" />
        </div>
      </div>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rscadastrojr1);
?>
