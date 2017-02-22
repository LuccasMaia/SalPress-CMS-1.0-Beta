<?php

// salva o widget
function salva_widget_topo(){

// conteudo
$conteudo = limpa_codigo_html_widget(htmlentities($_REQUEST['conteudo']));

// tabela
$tabela = TABELA_WIDGET_TOPO;

// data atual
$data_atual = data_atual();

// querys
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$conteudo', '$data_atual');";

// executa querys
executador_querys($query);

};

?>