<?php

// constroe editor de rodape
function constroe_editar_rodape(){

// globals
global $idioma;
global $requeste;

// valida usuario administrador
if(retorne_usuario_administrador() == false){

	// retorno nulo
	return null;	
	
};

// tabela
$tabela = TABELA_RODAPE;

// query
$query = "select *from $tabela;";

// dados de query
$dados = retorne_dados_query($query);

// separa os dados
$conteudo_1 = $dados["conteudo_1"];
$conteudo_2 = $dados["conteudo_2"];
$conteudo_3 = $dados["conteudo_3"];

// campos com editores
$campo_editor[0] = constroe_campo_ckeditor($conteudo_1, "campo_rodape_1", null);
$campo_editor[1] = constroe_campo_ckeditor($conteudo_2, "campo_rodape_2", null);
$campo_editor[2] = constroe_campo_ckeditor($conteudo_3, "campo_rodape_3", null);

// url de formulario
$url_formulario = PAGINA_ACOES;

// codigo html
$html = "
<form action='$url_formulario' method='post'>
<div class='classe_div_campo_editar_rodape'>$campo_editor[0]</div>
<div class='classe_div_campo_editar_rodape'>$campo_editor[1]</div>
<div class='classe_div_campo_editar_rodape'>$campo_editor[2]</div>
<div class='classe_div_campo_editar_rodape_salvar'>
<input type='submit' value='$idioma[57]'>
<input type='hidden' name='$requeste[0]' value='15'>
</div>
</form>
";

// retorno
return $html;

};

?>