<?php

// retorna o numero de itens de categoria
function retorne_numero_itens_categoria($categoria){

// tabela
$tabela = TABELA_PUBLICACOES;

// query
$query = "select *from $tabela where categoria_nome='$categoria';";

// retorno
return retorne_numero_linhas_query($query);

};

?>