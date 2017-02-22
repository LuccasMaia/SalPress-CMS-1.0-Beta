<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "categoria text, ";
$campos .= "cor text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_CATEGORIAS;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>