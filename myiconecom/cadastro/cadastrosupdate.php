<?php require_once('../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_myicone = new KT_connection($myicone, $database_myicone);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("website", true, "text", "", "", "", "Digite o website.");
$formValidation->addField("icone_imagem", true, "", "", "", "", "Insira sua imagem que será seu ícone.");
$formValidation->addField("meta_busca", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("meta_busca1", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("meta_busca2", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("meta_busca3", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("meta_busca4", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("meta_busca6", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$formValidation->addField("outras_opcoes", true, "text", "", "", "", "Digite as palavras que serão usadas no motor de busca.");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_cadastrojr = new tNG_multipleInsert($conn_myicone);
$tNGs->addTransaction($ins_cadastrojr);
// Register triggers
$ins_cadastrojr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_cadastrojr->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_cadastrojr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_cadastrojr->setTable("cadastrojr");
$ins_cadastrojr->addColumn("nome_razao", "STRING_TYPE", "POST", "nome_razao");
$ins_cadastrojr->addColumn("nome_fantasia", "STRING_TYPE", "POST", "nome_fantasia");
$ins_cadastrojr->addColumn("cnpj", "STRING_TYPE", "POST", "cnpj");
$ins_cadastrojr->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$ins_cadastrojr->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$ins_cadastrojr->addColumn("cep", "STRING_TYPE", "POST", "cep");
$ins_cadastrojr->addColumn("estado", "STRING_TYPE", "POST", "estado");
$ins_cadastrojr->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_cadastrojr->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$ins_cadastrojr->addColumn("telefone2", "STRING_TYPE", "POST", "telefone2");
$ins_cadastrojr->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_cadastrojr->addColumn("website", "STRING_TYPE", "POST", "website");
$ins_cadastrojr->addColumn("icone_imagem", "STRING_TYPE", "POST", "icone_imagem");
$ins_cadastrojr->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$ins_cadastrojr->addColumn("meta_busca1", "STRING_TYPE", "POST", "meta_busca1");
$ins_cadastrojr->addColumn("meta_busca2", "STRING_TYPE", "POST", "meta_busca2");
$ins_cadastrojr->addColumn("meta_busca3", "STRING_TYPE", "POST", "meta_busca3");
$ins_cadastrojr->addColumn("meta_busca4", "STRING_TYPE", "POST", "meta_busca4");
$ins_cadastrojr->addColumn("meta_busca5", "STRING_TYPE", "POST", "meta_busca5");
$ins_cadastrojr->addColumn("meta_busca6", "STRING_TYPE", "POST", "meta_busca6");
$ins_cadastrojr->addColumn("outras_opcoes", "STRING_TYPE", "POST", "outras_opcoes");
$ins_cadastrojr->addColumn("Li", "CHECKBOX_YN_TYPE", "POST", "Li", "N");
$ins_cadastrojr->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_cadastrojr = new tNG_multipleUpdate($conn_myicone);
$tNGs->addTransaction($upd_cadastrojr);
// Register triggers
$upd_cadastrojr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_cadastrojr->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_cadastrojr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_cadastrojr->setTable("cadastrojr");
$upd_cadastrojr->addColumn("nome_razao", "STRING_TYPE", "POST", "nome_razao");
$upd_cadastrojr->addColumn("nome_fantasia", "STRING_TYPE", "POST", "nome_fantasia");
$upd_cadastrojr->addColumn("cnpj", "STRING_TYPE", "POST", "cnpj");
$upd_cadastrojr->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$upd_cadastrojr->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$upd_cadastrojr->addColumn("cep", "STRING_TYPE", "POST", "cep");
$upd_cadastrojr->addColumn("estado", "STRING_TYPE", "POST", "estado");
$upd_cadastrojr->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_cadastrojr->addColumn("telefone", "STRING_TYPE", "POST", "telefone");
$upd_cadastrojr->addColumn("telefone2", "STRING_TYPE", "POST", "telefone2");
$upd_cadastrojr->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_cadastrojr->addColumn("website", "STRING_TYPE", "POST", "website");
$upd_cadastrojr->addColumn("icone_imagem", "STRING_TYPE", "POST", "icone_imagem");
$upd_cadastrojr->addColumn("meta_busca", "STRING_TYPE", "POST", "meta_busca");
$upd_cadastrojr->addColumn("meta_busca1", "STRING_TYPE", "POST", "meta_busca1");
$upd_cadastrojr->addColumn("meta_busca2", "STRING_TYPE", "POST", "meta_busca2");
$upd_cadastrojr->addColumn("meta_busca3", "STRING_TYPE", "POST", "meta_busca3");
$upd_cadastrojr->addColumn("meta_busca4", "STRING_TYPE", "POST", "meta_busca4");
$upd_cadastrojr->addColumn("meta_busca5", "STRING_TYPE", "POST", "meta_busca5");
$upd_cadastrojr->addColumn("meta_busca6", "STRING_TYPE", "POST", "meta_busca6");
$upd_cadastrojr->addColumn("outras_opcoes", "STRING_TYPE", "POST", "outras_opcoes");
$upd_cadastrojr->addColumn("Li", "CHECKBOX_YN_TYPE", "POST", "Li");
$upd_cadastrojr->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_cadastrojr = new tNG_multipleDelete($conn_myicone);
$tNGs->addTransaction($del_cadastrojr);
// Register triggers
$del_cadastrojr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_cadastrojr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_cadastrojr->setTable("cadastrojr");
$del_cadastrojr->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscadastrojr = $tNGs->getRecordset("cadastrojr");
$row_rscadastrojr = mysql_fetch_assoc($rscadastrojr);
$totalRows_rscadastrojr = mysql_num_rows($rscadastrojr);
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
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: false,
  show_as_grid: false,
  merge_down_value: false
}
</script>
</head>

<body>
<p>&nbsp;</p>
<br />
<table border="0" align="center">
  <tr>
    <td><img src="imagens/atualizardados.png" width="600" height="100" /></td>
  </tr>
</table>
<br />
<table border="0" align="center">
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1>
          <?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
            <?php echo NXT_getResource("Insert_FH"); ?>
            <?php 
// else Conditional region1
} else { ?>
            <?php echo NXT_getResource("Update_FH"); ?>
            <?php } 
// endif Conditional region1
?>
          Dados Cadastro Pessoa Jur&iacute;dica</h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rscadastrojr > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="nome_razao_<?php echo $cnt1; ?>">Razão Social:</label></td>
                  <td><input type="text" name="nome_razao_<?php echo $cnt1; ?>" id="nome_razao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['nome_razao']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("nome_razao");?> <?php echo $tNGs->displayFieldError("cadastrojr", "nome_razao", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="nome_fantasia_<?php echo $cnt1; ?>">Nome Fantasia:</label></td>
                  <td><input type="text" name="nome_fantasia_<?php echo $cnt1; ?>" id="nome_fantasia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['nome_fantasia']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("nome_fantasia");?> <?php echo $tNGs->displayFieldError("cadastrojr", "nome_fantasia", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="cnpj_<?php echo $cnt1; ?>">Cnpj:</label></td>
                  <td><input type="text" name="cnpj_<?php echo $cnt1; ?>" id="cnpj_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cnpj']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("cnpj");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cnpj", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="endereco_<?php echo $cnt1; ?>">Endereco:</label></td>
                  <td><input type="text" name="endereco_<?php echo $cnt1; ?>" id="endereco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['endereco']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("cadastrojr", "endereco", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="bairro_<?php echo $cnt1; ?>">Bairro:</label></td>
                  <td><input type="text" name="bairro_<?php echo $cnt1; ?>" id="bairro_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['bairro']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("bairro");?> <?php echo $tNGs->displayFieldError("cadastrojr", "bairro", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="cep_<?php echo $cnt1; ?>">Cep:</label></td>
                  <td><input type="text" name="cep_<?php echo $cnt1; ?>" id="cep_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cep']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("cep");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cep", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="estado_<?php echo $cnt1; ?>">Estado:</label></td>
                  <td><select name="estado_<?php echo $cnt1; ?>" id="estado_<?php echo $cnt1; ?>">
                    <option value="" >Selecione o estado</option>
                    <option value="Acre" <?php if (!(strcmp("Acre", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Acre</option>
                    <option value="Alagoas" <?php if (!(strcmp("Alagoas", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Alagoas</option>
                    <option value="Amap&aacute;" <?php if (!(strcmp("Amapá", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Amapá</option>
                    <option value="Amazonas" <?php if (!(strcmp("Amazonas", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Amazonas</option>
                    <option value="Bahia" <?php if (!(strcmp("Bahia", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Bahia</option>
                    <option value="Ceara" <?php if (!(strcmp("Ceara", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Ceara</option>
                    <option value="Distrito Federal" <?php if (!(strcmp("Distrito Federal", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Distrito Federal</option>
                    <option value="Goais" <?php if (!(strcmp("Goais", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Goais</option>
                    <option value="Espirito Santo" <?php if (!(strcmp("Espirito Santo", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Espirito Santo</option>
                    <option value="Maranh&atilde;o" <?php if (!(strcmp("Maranhão", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Maranhão</option>
                    <option value="Mato Grosso" <?php if (!(strcmp("Mato Grosso", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Mato Grosso</option>
                    <option value="Matro Grosso do Sul" <?php if (!(strcmp("Matro Grosso do Sul", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Matro Grosso do Sul</option>
                    <option value="Minas Gerais" <?php if (!(strcmp("Minas Gerais", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Minas Gerais</option>
                    <option value="Para" <?php if (!(strcmp("Para", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Para</option>
                    <option value="Paraiba" <?php if (!(strcmp("Paraiba", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Paraiba</option>
                    <option value="Parana" <?php if (!(strcmp("Parana", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Parana</option>
                    <option value="Pernambuco" <?php if (!(strcmp("Pernambuco", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Pernambuco</option>
                    <option value="Piaui" <?php if (!(strcmp("Piaui", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Piaui</option>
                    <option value="Rio de Janeiro" <?php if (!(strcmp("Rio de Janeiro", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Rio de Janeiro</option>
                    <option value="Rio Grandeo do Norte" <?php if (!(strcmp("Rio Grandeo do Norte", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Rio Grandeo do Norte</option>
                    <option value="Rio Grande do Sul" <?php if (!(strcmp("Rio Grande do Sul", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Rio Grande do Sul</option>
                    <option value="Rond&ocirc;nia" <?php if (!(strcmp("Rondônia", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Rondônia</option>
                    <option value="Ror&acirc;ima" <?php if (!(strcmp("Rorâima", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Rorâima</option>
                    <option value="S&atilde;o Paulo" <?php if (!(strcmp("São Paulo", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>São Paulo</option>
                    <option value="Santa Catarina" <?php if (!(strcmp("Santa Catarina", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Santa Catarina</option>
                    <option value="Sergipe" <?php if (!(strcmp("Sergipe", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Sergipe</option>
                    <option value="Tocantins" <?php if (!(strcmp("Tocantins", KT_escapeAttribute($row_rscadastrojr['estado'])))) {echo "SELECTED";} ?>>Tocantins</option>
                  </select>
                    <?php echo $tNGs->displayFieldError("cadastrojr", "estado", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
                  <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cidade']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cidade", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="telefone_<?php echo $cnt1; ?>">Telefone:</label></td>
                  <td><input type="text" name="telefone_<?php echo $cnt1; ?>" id="telefone_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['telefone']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("cadastrojr", "telefone", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="telefone2_<?php echo $cnt1; ?>">Telefone2:</label></td>
                  <td><input type="text" name="telefone2_<?php echo $cnt1; ?>" id="telefone2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['telefone2']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("telefone2");?> <?php echo $tNGs->displayFieldError("cadastrojr", "telefone2", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
                  <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['email']); ?>" size="20" maxlength="20" />
                    <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("cadastrojr", "email", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="website_<?php echo $cnt1; ?>">Website:</label></td>
                  <td><input type="text" name="website_<?php echo $cnt1; ?>" id="website_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['website']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("website");?> <?php echo $tNGs->displayFieldError("cadastrojr", "website", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="icone_imagem_<?php echo $cnt1; ?>">Ícone:</label></td>
                  <td><input type="text" name="icone_imagem_<?php echo $cnt1; ?>" id="icone_imagem_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['icone_imagem']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("icone_imagem");?> <?php echo $tNGs->displayFieldError("cadastrojr", "icone_imagem", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca_<?php echo $cnt1; ?>">Busca:</label></td>
                  <td><input type="text" name="meta_busca_<?php echo $cnt1; ?>" id="meta_busca_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca1_<?php echo $cnt1; ?>">Busca 2:</label></td>
                  <td><input type="text" name="meta_busca1_<?php echo $cnt1; ?>" id="meta_busca1_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca1']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca1");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca1", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca2_<?php echo $cnt1; ?>">Busca 3:</label></td>
                  <td><input type="text" name="meta_busca2_<?php echo $cnt1; ?>" id="meta_busca2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca2']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca2");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca2", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca3_<?php echo $cnt1; ?>">Busca 4:</label></td>
                  <td><input type="text" name="meta_busca3_<?php echo $cnt1; ?>" id="meta_busca3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca3']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca3");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca3", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca4_<?php echo $cnt1; ?>">Busca 5:</label></td>
                  <td><input type="text" name="meta_busca4_<?php echo $cnt1; ?>" id="meta_busca4_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca4']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca4");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca4", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca5_<?php echo $cnt1; ?>">Busca 6:</label></td>
                  <td><input type="text" name="meta_busca5_<?php echo $cnt1; ?>" id="meta_busca5_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca5']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca5");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca5", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="meta_busca6_<?php echo $cnt1; ?>">Busca 7:</label></td>
                  <td><input type="text" name="meta_busca6_<?php echo $cnt1; ?>" id="meta_busca6_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca6']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("meta_busca6");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca6", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="outras_opcoes_<?php echo $cnt1; ?>">Outras Opções:</label></td>
                  <td><input type="text" name="outras_opcoes_<?php echo $cnt1; ?>" id="outras_opcoes_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscadastrojr['outras_opcoes']); ?>" size="32" maxlength="255" />
                    <?php echo $tNGs->displayFieldHint("outras_opcoes");?> <?php echo $tNGs->displayFieldError("cadastrojr", "outras_opcoes", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="Li_<?php echo $cnt1; ?>">Li, e estou de acordo com os termos de uso do produto.:</label></td>
                  <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rscadastrojr['Li']),"Y"))) {echo "checked";} ?> type="checkbox" name="Li_<?php echo $cnt1; ?>" id="Li_<?php echo $cnt1; ?>" value="Y" />
                    <?php echo $tNGs->displayFieldError("cadastrojr", "Li", $cnt1); ?></td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_cadastrojr_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscadastrojr['kt_pk_cadastrojr']); ?>" />
              <?php } while ($row_rscadastrojr = mysql_fetch_assoc($rscadastrojr)); ?>
            <div class="KT_bottombuttons">
              <div>
                <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
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
                <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
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