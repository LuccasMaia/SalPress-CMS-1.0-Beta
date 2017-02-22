<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "id_post text, ";
$campos .= "url_amigavel text";

// nome de tabela
$nome_tabela = TABELA_URL_AMIGAVEL_POSTAGEM;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>