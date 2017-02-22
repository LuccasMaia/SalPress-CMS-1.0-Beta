<?php

// retorna os dados de anuncio de postagem
function retorne_dados_anuncio_postagem(){

// tabela
$tabela = TABELA_ANUNCIO_POSTAGEM;

// query
$query = "select *from $tabela;";

// retorno
return retorne_dados_query($query);

};

?>