<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "titulo text, ";
$campos .= "url_imagem text, ";
$campos .= "root_imagem text, ";
$campos .= "url_link text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_BLOCOS_TOPO;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>