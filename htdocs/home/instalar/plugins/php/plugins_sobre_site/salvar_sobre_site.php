<?php

// salva sobre o site
function salvar_sobre_site(){

// globals
global $pagina_href;

// dados do formulario
$nome = remove_html($_REQUEST["nome"]);
$descricao = remove_html($_REQUEST["descricao"]);
$palavras = remove_html($_REQUEST["palavras"]);
$autor = remove_html($_REQUEST["autor"]);
$email_contato = remove_html($_REQUEST["email_contato"]);
$copyright = remove_html($_REQUEST["copyright"]);

// data
$data = data_atual();

// tabela
$tabela = TABELA_SOBRE_SITE;

// querys
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values('$nome', '$descricao', '$palavras', '$autor', '$email_contato', '$copyright', '$data');";

// salvando...
executador_querys($query);

// redireciona
chama_pagina_especifica($pagina_href[30]);

};

?>