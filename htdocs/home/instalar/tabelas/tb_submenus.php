<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "idmenu text, ";
$campos .= "titulo_menu text, ";
$campos .= "link_menu text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_SUBMENUS;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>