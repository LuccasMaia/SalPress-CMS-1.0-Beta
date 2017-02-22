<?php

// retorna o numero dee imagens em slideshow
function retorne_numero_imagens_slideshow(){

// tabela
$tabela = TABELA_SLIDESHOW;

// query
$query = "select *from $tabela;";

// retorno
return retorne_numero_linhas_query($query);

};

?>