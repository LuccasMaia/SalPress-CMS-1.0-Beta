<?php

// retorna o idalbum via idpost
function retorne_idalbum_idpost($idpost){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where id='$idpost';";

// dados de query
$dados_query = retorne_dados_query($query);

// retorno
return $dados_query["idalbum"];

};

?>