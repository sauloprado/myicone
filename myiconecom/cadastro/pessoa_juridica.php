<?php require_once('../Connections/myicone.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("icone_imagem");
  $uploadObj->setDbFieldName("icone_imagem");
  $uploadObj->setFolder("../cadastro/icones/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_cadastrojr = new tNG_insert($conn_myicone);
$tNGs->addTransaction($ins_cadastrojr);
// Register triggers
$ins_cadastrojr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_cadastrojr->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_cadastrojr->registerTrigger("END", "Trigger_Default_Redirect", 99, "cadastrook.php");
$ins_cadastrojr->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
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
$ins_cadastrojr->addColumn("icone_imagem", "FILE_TYPE", "FILES", "icone_imagem");
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
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" align="center">
  <tr>
    <td><div align="center"><a href="index.php"><img src="imagens/topo.png" width="600" height="100" border="0" /></a></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><img src="imagens/cjr.png" width="305" height="52" /></div></td>
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
            <td class="KT_th"><label for="nome_razao">Razão Social:</label></td>
            <td><input type="text" name="nome_razao" id="nome_razao" value="<?php echo KT_escapeAttribute($row_rscadastrojr['nome_razao']); ?>" size="100" />
            <?php echo $tNGs->displayFieldHint("nome_razao");?> <?php echo $tNGs->displayFieldError("cadastrojr", "nome_razao"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="nome_fantasia">Nome Fantasia:</label></td>
            <td><input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo KT_escapeAttribute($row_rscadastrojr['nome_fantasia']); ?>" size="100" />
            <?php echo $tNGs->displayFieldHint("nome_fantasia");?> <?php echo $tNGs->displayFieldError("cadastrojr", "nome_fantasia"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cnpj">Cnpj:</label></td>
            <td><input type="text" name="cnpj" id="cnpj" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cnpj']); ?>" size="60" />
            <?php echo $tNGs->displayFieldHint("cnpj");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cnpj"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="endereco">Endereco:</label></td>
            <td><input type="text" name="endereco" id="endereco" value="<?php echo KT_escapeAttribute($row_rscadastrojr['endereco']); ?>" size="100" />
            <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("cadastrojr", "endereco"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="bairro">Bairro:</label></td>
            <td><input type="text" name="bairro" id="bairro" value="<?php echo KT_escapeAttribute($row_rscadastrojr['bairro']); ?>" size="60" />
            <?php echo $tNGs->displayFieldHint("bairro");?> <?php echo $tNGs->displayFieldError("cadastrojr", "bairro"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cep">Cep:</label></td>
            <td><input type="text" name="cep" id="cep" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cep']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("cep");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cep"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="estado">Estado:</label></td>
            <td><select name="estado" id="estado">
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
              <?php echo $tNGs->displayFieldError("cadastrojr", "estado"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cidade">Cidade:</label></td>
            <td><input type="text" name="cidade" id="cidade" value="<?php echo KT_escapeAttribute($row_rscadastrojr['cidade']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("cadastrojr", "cidade"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="telefone">Telefone:</label></td>
            <td><input type="text" name="telefone" id="telefone" value="<?php echo KT_escapeAttribute($row_rscadastrojr['telefone']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("telefone");?> <?php echo $tNGs->displayFieldError("cadastrojr", "telefone"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="telefone2">Telefone2:</label></td>
            <td><input type="text" name="telefone2" id="telefone2" value="<?php echo KT_escapeAttribute($row_rscadastrojr['telefone2']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("telefone2");?> <?php echo $tNGs->displayFieldError("cadastrojr", "telefone2"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="email">Email:</label></td>
            <td><input type="text" name="email" id="email" value="<?php echo KT_escapeAttribute($row_rscadastrojr['email']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("cadastrojr", "email"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="website">Website:</label></td>
            <td><input type="text" name="website" id="website" value="<?php echo KT_escapeAttribute($row_rscadastrojr['website']); ?>" size="60" />
            <?php echo $tNGs->displayFieldHint("website");?> <?php echo $tNGs->displayFieldError("cadastrojr", "website"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="icone_imagem">Ícone:</label></td>
            <td><input type="file" name="icone_imagem" id="icone_imagem" size="32" />
              <?php echo $tNGs->displayFieldError("cadastrojr", "icone_imagem"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca">Busca:</label></td>
            <td><textarea name="meta_busca" id="meta_busca" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca1">Busca 2:</label></td>
            <td><textarea name="meta_busca1" id="meta_busca1" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca1']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca1");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca1"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca2">Busca 3:</label></td>
            <td><textarea name="meta_busca2" id="meta_busca2" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca2']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca2");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca2"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca3">Busca 4:</label></td>
            <td><textarea name="meta_busca3" id="meta_busca3" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca3']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca3");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca3"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca4">Busca 5:</label></td>
            <td><textarea name="meta_busca4" id="meta_busca4" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca4']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca4");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca4"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca5">Busca 6:</label></td>
            <td><textarea name="meta_busca5" id="meta_busca5" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca5']); ?></textarea>
            <?php echo $tNGs->displayFieldHint("meta_busca5");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca5"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="meta_busca6">Busca 7:</label></td>
            <td><textarea name="meta_busca6" id="meta_busca6" cols="50" rows="2"><?php echo KT_escapeAttribute($row_rscadastrojr['meta_busca6']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("meta_busca6");?> <?php echo $tNGs->displayFieldError("cadastrojr", "meta_busca6"); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="outras_opcoes">Outras Opções:</label></td>
            <td><textarea name="outras_opcoes" id="outras_opcoes" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rscadastrojr['outras_opcoes']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("outras_opcoes");?> <?php echo $tNGs->displayFieldError("cadastrojr", "outras_opcoes"); ?></td>
          </tr>
          <tr>
            <td class="KT_th">&nbsp;</td>
            <td><label>
              <textarea name="textarea" cols="80" rows="5" readonly="readonly" id="textarea">AUTORIZAÇÃO

AUTORIZO o uso de minha imagem em todo e qualquer material para ser utilizada à divulgação ao público em geral. A presente autorização é concedida a título gratuito, abrangendo o uso da imagem acima mencionada em todo território nacional e no exterior, das seguintes formas: somente para  o uso  da busca no site www.myicone.com , mídia eletrônica.
A atualização dos dados em caso de mudança de logotipo fica a critério do anunciante ficando a www.myicone.com , isenta desta responsabilidade.
Informamos que  caso haja interesse em incluir o  logotipo ou ícone dento do site,  www.myicone.com  , esta propaganda terá seu valor a ser pago não fazendo parte dest e cadastro de inclusão gratuita .  
Por esta ser a expressão da minha vontade declaro que autorizo o uso acima descrito sem que nada haja a ser reclamado a título de direitos conexos à minha imagem ou a qualquer outro, e assino a presente autorização .
OBS :  Caso não haja interesse em manter a continuidade ou o cancelamento  entrar em contato através de e-mail : contato@myicone.com  , não havendo nenhuma despesa a ser reclamada entre  as partes.
Declaro estar ciente.

              </textarea>
            </label></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Li">Li, e estou de acordo com<br />
os termos de uso do produto.</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rscadastrojr['Li']),"Y"))) {echo "checked";} ?> type="checkbox" name="Li" id="Li" value="Y" />
              <?php echo $tNGs->displayFieldError("cadastrojr", "Li"); ?></td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Cadastrar" /></td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>