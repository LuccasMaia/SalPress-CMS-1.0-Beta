<?php

// retorna os dados de publicacao via id post
function retorne_dados_publicacao_idpost($idpost){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where id='$idpost';";

// retorno
return retorne_dados_query($query);

};

?>