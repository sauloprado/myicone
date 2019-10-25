<?php require_once('../../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../../includes/common/KT_common.php');

// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../../includes/tfi/TFI.php');
require_once('../../includes/tso/TSO.php');
require_once('../../includes/nav/NAV.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_myicone, "../../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

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
$tfi_listcriaricones1 = new TFI_TableFilter($conn_myicone, "tfi_listcriaricones1");
$tfi_listcriaricones1->addColumn("criaricones.nome_icone", "STRING_TYPE", "nome_icone", "%");
$tfi_listcriaricones1->addColumn("criaricones.categoria_icone", "STRING_TYPE", "categoria_icone", "%");
$tfi_listcriaricones1->addColumn("criaricones.descricao_icone", "STRING_TYPE", "descricao_icone", "%");
$tfi_listcriaricones1->addColumn("criaricones.site_icone", "STRING_TYPE", "site_icone", "%");
$tfi_listcriaricones1->addColumn("criaricones.icone_icone", "FILE_TYPE", "icone_icone", "%");
$tfi_listcriaricones1->addColumn("criaricones.meta_busca", "STRING_TYPE", "meta_busca", "%");
$tfi_listcriaricones1->Execute();

// Sorter
$tso_listcriaricones1 = new TSO_TableSorter("rscriaricones1", "tso_listcriaricones1");
$tso_listcriaricones1->addColumn("criaricones.nome_icone");
$tso_listcriaricones1->addColumn("criaricones.categoria_icone");
$tso_listcriaricones1->addColumn("criaricones.descricao_icone");
$tso_listcriaricones1->addColumn("criaricones.site_icone");
$tso_listcriaricones1->addColumn("criaricones.icone_icone");
$tso_listcriaricones1->addColumn("criaricones.meta_busca");
$tso_listcriaricones1->setDefault("criaricones.nome_icone");
$tso_listcriaricones1->Execute();

// Navigation
$nav_listcriaricones1 = new NAV_Regular("nav_listcriaricones1", "rscriaricones1", "../../", $_SERVER['PHP_SELF'], 100);

//NeXTenesio3 Special List Recordset
$maxRows_rscriaricones1 = $_SESSION['max_rows_nav_listcriaricones1'];
$pageNum_rscriaricones1 = 0;
if (isset($_GET['pageNum_rscriaricones1'])) {
  $pageNum_rscriaricones1 = $_GET['pageNum_rscriaricones1'];
}
$startRow_rscriaricones1 = $pageNum_rscriaricones1 * $maxRows_rscriaricones1;

// Defining List Recordset variable
$NXTFilter_rscriaricones1 = "1=1";
if (isset($_SESSION['filter_tfi_listcriaricones1'])) {
  $NXTFilter_rscriaricones1 = $_SESSION['filter_tfi_listcriaricones1'];
}
// Defining List Recordset variable
$NXTSort_rscriaricones1 = "criaricones.nome_icone";
if (isset($_SESSION['sorter_tso_listcriaricones1'])) {
  $NXTSort_rscriaricones1 = $_SESSION['sorter_tso_listcriaricones1'];
}
mysql_select_db($database_myicone, $myicone);

$query_rscriaricones1 = "SELECT criaricones.nome_icone, criaricones.categoria_icone, criaricones.descricao_icone, criaricones.site_icone, criaricones.icone_icone, criaricones.meta_busca, criaricones.id_icone FROM criaricones WHERE {$NXTFilter_rscriaricones1} ORDER BY {$NXTSort_rscriaricones1}";
$query_limit_rscriaricones1 = sprintf("%s LIMIT %d, %d", $query_rscriaricones1, $startRow_rscriaricones1, $maxRows_rscriaricones1);
$rscriaricones1 = mysql_query($query_limit_rscriaricones1, $myicone) or die(mysql_error());
$row_rscriaricones1 = mysql_fetch_assoc($rscriaricones1);

if (isset($_GET['totalRows_rscriaricones1'])) {
  $totalRows_rscriaricones1 = $_GET['totalRows_rscriaricones1'];
} else {
  $all_rscriaricones1 = mysql_query($query_rscriaricones1);
  $totalRows_rscriaricones1 = mysql_num_rows($all_rscriaricones1);
}
$totalPages_rscriaricones1 = ceil($totalRows_rscriaricones1/$maxRows_rscriaricones1)-1;
//End NeXTenesio3 Special List Recordset

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

$nav_listcriaricones1->checkBoundries();
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
	text-align: center;
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
  .KT_col_nome_icone {width:140px; overflow:hidden;}
  .KT_col_categoria_icone {width:140px; overflow:hidden;}
  .KT_col_descricao_icone {width:140px; overflow:hidden;}
  .KT_col_site_icone {width:140px; overflow:hidden;}
  .KT_col_icone_icone {width:140px; overflow:hidden;}
  .KT_col_meta_busca {width:140px; overflow:hidden;}
#listcriaricones1 h1 {
	text-align: left;
}
</style>
</head>

<body>
<div align="center"><br />
  <br />
  <br />
</div>
<table border="0" align="center">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><a href="index.php"><img src="../../imagens/seta2.png" width="67" height="115" border="0" /></a></td>
    <td valign="top" bgcolor="#FFFFFF"><img src="../topo.png" width="950" height="100" /></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center">
  <tr>
    <td>&nbsp;
      <div class="KT_tng" id="listcriaricones1">
        <h1> Cadastro de &Iacute;cones.
          <?php
  $nav_listcriaricones1->Prepare();
  require("../../includes/nav/NAV_Text_Statistics.inc.php");
?>
        </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> <a href="<?php echo $nav_listcriaricones1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
              <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcriaricones1'] == 1) {
?>
                <?php echo $_SESSION['default_max_rows_nav_listcriaricones1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listcriaricones1'] == 1) {
?>
                <a href="<?php echo $tfi_listcriaricones1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                <?php 
  // else Conditional region2
  } else { ?>
                <a href="<?php echo $tfi_listcriaricones1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                <?php } 
  // endif Conditional region2
?>
            </div>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <thead>
                <tr class="KT_row_order">
                  <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                  </th>
                  <th id="nome_icone" class="KT_sorter KT_col_nome_icone <?php echo $tso_listcriaricones1->getSortIcon('criaricones.nome_icone'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.nome_icone'); ?>">Nome do Ícone</a></th>
                  <th id="categoria_icone" class="KT_sorter KT_col_categoria_icone <?php echo $tso_listcriaricones1->getSortIcon('criaricones.categoria_icone'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.categoria_icone'); ?>">Categoria_icone</a></th>
                  <th id="descricao_icone" class="KT_sorter KT_col_descricao_icone <?php echo $tso_listcriaricones1->getSortIcon('criaricones.descricao_icone'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.descricao_icone'); ?>">Descricao_icone</a></th>
                  <th id="site_icone" class="KT_sorter KT_col_site_icone <?php echo $tso_listcriaricones1->getSortIcon('criaricones.site_icone'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.site_icone'); ?>">WebSite ou URL</a></th>
                  <th id="icone_icone" class="KT_sorter KT_col_icone_icone <?php echo $tso_listcriaricones1->getSortIcon('criaricones.icone_icone'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.icone_icone'); ?>">Ícone ou LogoMarca</a></th>
                  <th id="meta_busca" class="KT_sorter KT_col_meta_busca <?php echo $tso_listcriaricones1->getSortIcon('criaricones.meta_busca'); ?>"> <a href="<?php echo $tso_listcriaricones1->getSortLink('criaricones.meta_busca'); ?>">Meta da busca</a></th>
                  <th>&nbsp;</th>
                </tr>
                <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcriaricones1'] == 1) {
?>
                  <tr class="KT_row_filter">
                    <td>&nbsp;</td>
                    <td><input type="text" name="tfi_listcriaricones1_nome_icone" id="tfi_listcriaricones1_nome_icone" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_nome_icone']); ?>" size="20" maxlength="150" /></td>
                    <td><input type="text" name="tfi_listcriaricones1_categoria_icone" id="tfi_listcriaricones1_categoria_icone" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_categoria_icone']); ?>" size="20" maxlength="50" /></td>
                    <td><input type="text" name="tfi_listcriaricones1_descricao_icone" id="tfi_listcriaricones1_descricao_icone" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_descricao_icone']); ?>" size="20" maxlength="150" /></td>
                    <td><input type="text" name="tfi_listcriaricones1_site_icone" id="tfi_listcriaricones1_site_icone" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_site_icone']); ?>" size="20" maxlength="150" /></td>
                    <td><input type="text" name="tfi_listcriaricones1_icone_icone" id="tfi_listcriaricones1_icone_icone" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_icone_icone']); ?>" size="20" maxlength="100" /></td>
                    <td><input type="text" name="tfi_listcriaricones1_meta_busca" id="tfi_listcriaricones1_meta_busca" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcriaricones1_meta_busca']); ?>" size="20" maxlength="255" /></td>
                    <td><input type="submit" name="tfi_listcriaricones1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
                  </tr>
                  <?php } 
  // endif Conditional region3
?>
              </thead>
              <tbody>
                <?php if ($totalRows_rscriaricones1 == 0) { // Show if recordset empty ?>
                  <tr>
                    <td colspan="8"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                  </tr>
                  <?php } // Show if recordset empty ?>
                <?php if ($totalRows_rscriaricones1 > 0) { // Show if recordset not empty ?>
                  <?php do { ?>
                    <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                      <td><input type="checkbox" name="kt_pk_criaricones" class="id_checkbox" value="<?php echo $row_rscriaricones1['id_icone']; ?>" />
                        <input type="hidden" name="id_icone" class="id_field" value="<?php echo $row_rscriaricones1['id_icone']; ?>" /></td>
                      <td><div class="KT_col_nome_icone"><?php echo KT_FormatForList($row_rscriaricones1['nome_icone'], 20); ?></div></td>
                      <td><div class="KT_col_categoria_icone"><?php echo KT_FormatForList($row_rscriaricones1['categoria_icone'], 20); ?></div></td>
                      <td><div class="KT_col_descricao_icone"><?php echo KT_FormatForList($row_rscriaricones1['descricao_icone'], 20); ?></div></td>
                      <td><div class="KT_col_site_icone"><?php echo KT_FormatForList($row_rscriaricones1['site_icone'], 20); ?></div></td>
                      <td><div class="KT_col_icone_icone"><?php echo KT_FormatForList($row_rscriaricones1['icone_icone'], 20); ?></div></td>
                      <td><div class="KT_col_meta_busca"><?php echo KT_FormatForList($row_rscriaricones1['meta_busca'], 20); ?></div></td>
                      <td><a class="KT_edit_link" href="dados.php?id_icone=<?php echo $row_rscriaricones1['id_icone']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
                    </tr>
                    <?php } while ($row_rscriaricones1 = mysql_fetch_assoc($rscriaricones1)); ?>
                  <?php } // Show if recordset not empty ?>
              </tbody>
            </table>
            <div class="KT_bottomnav">
              <div>
                <?php
            $nav_listcriaricones1->Prepare();
            require("../../includes/nav/NAV_Text_Navigation.inc.php");
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
              <a class="KT_additem_op_link" href="dados.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rscriaricones1);
?>
