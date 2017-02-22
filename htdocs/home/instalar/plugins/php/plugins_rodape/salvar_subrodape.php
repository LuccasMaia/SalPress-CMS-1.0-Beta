<?php

// salva o rodape
function salvar_subrodape(){

// globals
global $pagina_href;

// tabela
$tabela = TABELA_SUBRODAPE;

// data atual
$data = data_atual();

// dados de formularios
$conteudo = htmlentities($_REQUEST["conteudo"]);

// query
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data');";

// salvando...
executador_querys($query);

};

?>