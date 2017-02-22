<?php

// salva o widget de postagem
function salvar_widget_postagem(){

// globals
global $pagina_href;

// tabela
$tabela = TABELA_WIDGET_POSTAGEM;

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