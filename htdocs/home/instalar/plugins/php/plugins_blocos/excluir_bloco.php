<?php

// exclui bloco
function excluir_bloco(){

// dados de formulario
$id = remove_html($_REQUEST["id"]);

// valida id
if($id == null){

    // retorno nulo	
    return null;
	
};

// tabela
$tabela = TABELA_BLOCOS;

// query
$query = "delete from $tabela where id='$id';";

// query executa
query_executa($query);

};

?>