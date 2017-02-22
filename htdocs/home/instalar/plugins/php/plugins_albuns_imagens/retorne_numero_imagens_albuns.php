<?php

// retorna o numero de imagens em albuns
function retorne_numero_imagens_albuns(){

// tabela
$tabela = TABELA_IMAGENS_ALBUM;

// query
$query = "select *from $tabela;";

// retorno
return retorne_numero_linhas_query($query);

};

?>