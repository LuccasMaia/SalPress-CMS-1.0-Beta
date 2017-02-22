<?php

// exclui bloco de topo
function excluir_bloco_topo(){

// dados de formulario
$id = remove_html($_REQUEST["id"]);

// valida id
if($id == null){

    // retorno nulo	
    return null;
	
};

// dados
$dados = retorne_dados_bloco_topo($id);
	
// exclui a imagem antiga
exclui_arquivo_unico($dados["root_imagem"]);
	
// tabela
$tabela = TABELA_BLOCOS_TOPO;

// query
$query = "delete from $tabela where id='$id';";

// query executa
query_executa($query);

};

?>