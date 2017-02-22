<?php

// campos de tabela
$query = array();
$campos = null;
$campos .= "conteudo text";

// nome de tabela
$nome_tabela = TABELA_ANUNCIO_POSTAGEM;

// query
$query[] = "create table $nome_tabela($campos);";

// cria a tabela
executador_querys($query);

?>