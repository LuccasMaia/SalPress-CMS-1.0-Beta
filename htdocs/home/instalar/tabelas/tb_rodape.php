<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "conteudo_1 text, ";
$campos .= "conteudo_2 text, ";
$campos .= "conteudo_3 text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_RODAPE;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>