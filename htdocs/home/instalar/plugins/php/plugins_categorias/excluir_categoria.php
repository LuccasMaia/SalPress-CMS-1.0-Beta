<?php

// exclui uma categoria
function excluir_categoria(){

// tabela
$tabela = TABELA_CATEGORIAS;

// dados de formulario
$id = remove_html($_POST['id']);

// valida categoria e usuario administrador
if($id == null or retorne_usuario_administrador() == false){

    // retorno nulo
    return null;	
	
};

// query
$query = "delete from $tabela where id='$id';";

// executa query
query_executa($query);

};

?>