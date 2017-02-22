<?php

// edita a mensagem de subrodape
function editar_mensagem_subrodape(){

// globals
global $idioma;

// tabela
$tabela = TABELA_SUBRODAPE;

// query
$query = "select *from $tabela;";

// dados
$dados = retorne_dados_query($query);

// id de campo
$idcampo[0] = md5("campo_editar_mensagem_subrodape".data_atual());

// campo editor
$campo_editor = constroe_campo_ckeditor($dados["conteudo"], null, $idcampo[0]);

// codigo html
$html = "
<div class='classe_editar_mensagem_subrodape'>

<div class='classe_editar_mensagem_subrodape_editor'>
$campo_editor
</div>

<div class='classe_editar_mensagem_subrodape_salvar'>
<input type='button' value='$idioma[57]' onclick='salvar_subrodape(\"$idcampo[0]\");'>
</div>

</div>
";

// retorno
return $html;

};

?>