<?php

// retorna a categoria da publicacao
function retorne_categoria_publicacao($idpost){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where id='$idpost';";

// dados
$dados = retorne_dados_query($query);

// valida se categoria possui valor
if($dados["categoria_nome"] == null){
	
	// retorna a categoraia via request
	return retorne_categoria_request();
	
}else{
	
	// retorno
	return $dados["categoria_nome"];
	
};

};


?>