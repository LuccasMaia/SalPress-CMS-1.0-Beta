<?php

// retorna o id de ultima publicacao
function retorne_id_ultima_publicacao(){

// tabela
$tabela = TABELA_PUBLICACOES;

// id de usuario logado
$idusuario = retorne_idusuario_logado();

// query
$query = "select *from $tabela where idusuario='$idusuario' order by id desc limit 1;";

// dados
$dados = retorne_dados_query($query);

// retorno
return $dados["id"];

};

?>