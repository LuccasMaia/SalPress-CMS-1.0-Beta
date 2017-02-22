<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "id int not null auto_increment primary key, ";
$campos .= "idusuario text, ";
$campos .= "titulo text, ";
$campos .= "conteudo text, ";
$campos .= "idalbum text, ";
$campos .= "categoria_nome text, ";
$campos .= "categoria_id text, ";
$campos .= "tipo_post text, ";
$campos .= "data text";

// nome de tabela
$nome_tabela = TABELA_PUBLICACOES;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>