<?php

// retorna os dados da categoria
function retorne_dados_categoria($id){

// tabela
$tabela = TABELA_CATEGORIAS;

// query
$query = "select *from $tabela where id='$id';";

// retorno
return retorne_dados_query($query);

};

?>