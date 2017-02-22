<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "nome text, ";
$campos .= "descricao text, ";
$campos .= "palavras text, ";
$campos .= "autor text, ";
$campos .= "email_contato text, ";
$campos .= "copyright text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_SOBRE_SITE;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>