<?php

// salva a descricao de imagem de publicacao
function salvar_descricao_imagem_publicacao(){

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// dados de formulario
$conteudo = remove_html($_REQUEST['conteudo']);
$id = remove_html($_REQUEST['id']);

// query
$query = "update $tabela set conteudo='$conteudo' where id='$id';";

// comando
comando_executa($query);

};

?>