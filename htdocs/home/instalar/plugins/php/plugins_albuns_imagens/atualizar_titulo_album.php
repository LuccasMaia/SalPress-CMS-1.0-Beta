<?php

// atualiza o titulo de album
function atualizar_titulo_album(){

// nome de album
$nome_album = remove_html($_REQUEST["nome_album"]);

// id de album
$idalbum = retorne_idalbum_post();

// tabela
$tabela = TABELA_ALBUNS;

// query
$query = "update $tabela set nome_album='$nome_album' where id='$idalbum';";

// executa a query
comando_executa($query);

};

?>