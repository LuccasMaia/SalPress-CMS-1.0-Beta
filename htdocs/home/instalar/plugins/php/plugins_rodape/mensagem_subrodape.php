<?php

// mensagem de subrodape
function mensagem_subrodape(){

// globals
global $idioma;

// tabela
$tabela = TABELA_SUBRODAPE;

// query
$query = "select *from $tabela;";

// dados
$dados = retorne_dados_query($query);

// valida conteudo
if($dados["conteudo"] == null){

    // retorno nulo	
    return null;
	
};

// codigo html
$html = constroe_div_especial_1(html_entity_decode($dados["conteudo"]));

// retorno
return $html;

};

?>