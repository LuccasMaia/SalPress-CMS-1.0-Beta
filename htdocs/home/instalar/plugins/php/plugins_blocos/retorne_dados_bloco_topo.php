<?php

// retorna os dados de bloco de topo
function retorne_dados_bloco_topo($id){

// tabela
$tabela = TABELA_BLOCOS_TOPO;

// query
$query = "select *from $tabela where id='$id';";

// retorno
return retorne_dados_query($query);

};

?>