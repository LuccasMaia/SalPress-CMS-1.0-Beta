<?php

// retorne os dados sobre site
function retorne_dados_sobre_site(){

// tabela
$tabela = TABELA_SOBRE_SITE;

// query
$query = "select *from $tabela;";

// retorno
return retorne_dados_query($query);

};

?>