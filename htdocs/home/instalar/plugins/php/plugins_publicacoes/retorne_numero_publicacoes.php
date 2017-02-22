<?php

// retorna o numero de publicacoes
function retorne_numero_publicacoes(){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela;";
	
// retorno
return retorne_numero_linhas_query($query);

};

?>