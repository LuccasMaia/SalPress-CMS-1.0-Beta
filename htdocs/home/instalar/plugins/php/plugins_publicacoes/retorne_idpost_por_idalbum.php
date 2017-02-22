<?php

// retorna o id de post de idalbum
function retorne_idpost_por_idalbum($idalbum){

// tabela
$tabela = TABELA_PUBLICACOES;

$query = "select *from $tabela where idalbum='$idalbum';";

// dados
$dados = retorne_dados_query($query);

// retorno
return $dados['id'];

};

?>