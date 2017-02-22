<?php

// salva o rodape
function salvar_rodape(){

// globals
global $pagina_href;

// tabela
$tabela = TABELA_RODAPE;

// data atual
$data = data_atual();

// dados de formularios
$campo_rodape_1 = htmlentities($_REQUEST["campo_rodape_1"]);
$campo_rodape_2 = htmlentities($_REQUEST["campo_rodape_2"]);
$campo_rodape_3 = htmlentities($_REQUEST["campo_rodape_3"]);

// query
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$campo_rodape_1', '$campo_rodape_2', '$campo_rodape_3', '$data');";

// salvando...
executador_querys($query);

// chama a pagina
chama_pagina_especifica($pagina_href[7]);

};

?>