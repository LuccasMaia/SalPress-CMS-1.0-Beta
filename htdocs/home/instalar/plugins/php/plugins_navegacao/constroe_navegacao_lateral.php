<?php

// constroe a navegacao lateral
function constroe_navegacao_lateral(){

// globals
global $idioma;
global $requeste;

// valida configuracao exibe menu lateral
if(CONFIG_EXIBE_MENUS_NAVEGACAO_LATERAL == false){

    // retorno nulo
    return null;
	
};

// url de pagina inicial
$url_pagina_inicial = PAGINA_INICIAL;

// tabela
$tabela = TABELA_CATEGORIAS;

// query
$query = "select *from $tabela order by id asc;";

// comando
$comando = comando_executa($query);

// numero de linhas
$numero_linhas = retorne_numero_linhas_comando($comando);

// contador
$contador = 0;

// construindo
for($contador == $contador; $contador <= $numero_linhas; $contador++){

// dados
$dados = retorne_dados_comando($comando);

// separa dados
$id = $dados['id'];
$categoria = $dados['categoria'];

// valida id
if($id != null){

	// numero de itens de categoria
	$numero_itens_categorias = retorne_tamanho_resultado(retorne_numero_itens_categoria($categoria));

	// codigo html
	$html .= "<a href='$url_pagina_inicial?$requeste[3]=$categoria' title='$categoria'>$categoria - $numero_itens_categorias</a>";

};

};

// codigo html
$html = "
<div class='classe_div_navegacao_lateral'>
<div class='classe_div_navegacao_lateral_titulo'>$idioma[185]</div>
$html
</div>";

// retorno
return $html;

};

?>