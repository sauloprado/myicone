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

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_myicone, "../../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../../");
  $deleteObj->setDbFieldName("icone_icone");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

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

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_myicone);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Make an insert transaction instance
$ins_criaricones = new tNG_multipleInsert($conn_myicone);
$tNGs->addTransaction($ins_criaricones);
// Register triggers
$ins_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_criaricones->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$ins_criaricones->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_criaricones->setTable("criaricones");
$ins_criaricones->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$ins_criaricones->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$ins_criaricones->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$ins_criaricones->setPrimaryKey("id_icone", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_criaricones = new tNG_multipleUpdate($conn_myicone);
$tNGs->addTransaction($upd_criaricones);
// Register triggers
$upd_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_criaricones->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$upd_criaricones->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_criaricones->setTable("criaricones");
$upd_criaricones->addColumn("site_icone", "STRING_TYPE", "POST", "site_icone");
$upd_criaricones->addColumn("icone_icone", "FILE_TYPE", "FILES", "icone_icone");
$upd_criaricones->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$upd_criaricones->setPrimaryKey("id_icone", "NUMERIC_TYPE", "GET", "id_icone");

// Make an instance of the transaction object
$del_criaricones = new tNG_multipleDelete($conn_myicone);
$tNGs->addTransaction($del_criaricones);
// Register triggers
$del_criaricones->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_criaricones->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../includes/nxt/back.php");
$del_criaricones->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_criaricones->setTable("criaricones");
$del_criaricones->setPrimaryKey("id_icone", "NUMERIC_TYPE", "GET", "id_icone");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);

// Get the transaction recordset
$rscriaricones = $tNGs->getRecordset("criaricones");
$row_rscriaricones = mysql_fetch_assoc($rscriaricones);
$totalRows_rscriaricones = mysql_num_rows($rscriaricones);
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
<?php echo $tNGs->displayValidationRules();?>
<script src="../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
</script>
</head>

<body>
<div align="center"><br />
  <br />
  <br />
</div>
<table border="0" align="center">
  <tr>
    <td width="600" valign="top" bgcolor="#FFFFFF"><img src="../topo.png" width="950" height="100" /></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center">
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1>
          <?php 
// Show IF Conditional region1 
if (@$_GET['id_icone'] == "") {
?>
            <?php echo NXT_getResource("Insert_FH"); ?>
            <?php 
// else Conditional region1
} else { ?>
            <?php echo NXT_getResource("Update_FH"); ?>
            <?php } 
// endif Conditional region1
?>
          Atualiza&ccedil;&atilde;o de Icone</h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rscriaricones > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="site_icone_<?php echo $cnt1; ?>">WebSite ou URL:</label></td>
                  <td><input type="text" name="site_icone_<?php echo $cnt1; ?>" id="site_icone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscriaricones['site_icone']); ?>" size="32" maxlength="150" />
                    <?php echo $tNGs->displayFieldHint("site_icone");?> <?php echo $tNGs->displayFieldError("criaricones", "site_icone", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="icone_icone_<?php echo $cnt1; ?>">Ícone ou LogoMarca:</label></td>
                  <td><input type="file" name="icone_icone_<?php echo $cnt1; ?>" id="icone_icone_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("criaricones", "icone_icone", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca_<?php echo $cnt1; ?>">Meta da busca:</label></td>
                  <td><textarea name="meta_busca_<?php echo $cnt1; ?>" id="meta_busca_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscriaricones['meta_busca']); ?></textarea>
                    <?php echo $tNGs->displayFieldHint("meta_busca");?> <?php echo $tNGs->displayFieldError("criaricones", "meta_busca", $cnt1); ?></td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_criaricones_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscriaricones['kt_pk_criaricones']); ?>" />
              <?php } while ($row_rscriaricones = mysql_fetch_assoc($rscriaricones)); ?>
            <div class="KT_bottombuttons">
              <div>
                <?php 
      // Show IF Conditional region1
      if (@$_GET['id_icone'] == "") {
      ?>
                  <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                  <?php 
      // else Conditional region1
      } else { ?>
                  <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                  <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
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
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>