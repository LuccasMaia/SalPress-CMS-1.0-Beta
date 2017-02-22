<?php

// retorna os dados de widget de postagem
function retorne_dados_widget_postagem($modo){

// modo false não converte para html_entity_decode
// modo true converte para html_entity_decode

// tabela
$tabela = TABELA_WIDGET_POSTAGEM;

// query
$query = "select *from $tabela;";

// dados de query
$dados = retorne_dados_query($query);

// valida modo
if($modo == true){
	
	// retorno
	return html_entity_decode($dados["conteudo"]);
	
}else{
	
	// retorno
	return $dados["conteudo"];

};

};

?>