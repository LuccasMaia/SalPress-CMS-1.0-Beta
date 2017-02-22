<?php

// cria o anuncio de postagem
function criar_anuncio_postagem(){

// dados de formulario
$conteudo = htmlentities($_REQUEST['conteudo']);

// tabela
$tabela = TABELA_ANUNCIO_POSTAGEM;

// query
$query[] = "delete from $tabela;";
$query[] = "insert into $tabela values(\"$conteudo\");";

// salvando...
executador_querys($query);

};

?>