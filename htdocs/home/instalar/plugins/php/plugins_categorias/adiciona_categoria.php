<?php

// adiciona nova categoria
function adiciona_categoria(){

// tabela
$tabela = TABELA_CATEGORIAS;

// data atual
$data = data_atual();

// dados de formulario
$categoria = remove_html($_POST['campo_categoria']);

// valida categoria e usuario administrador
if($categoria == null or retorne_usuario_administrador() == false){

    // retorno nulo
    return null;	
	
};

// query
$query = "select *from $tabela where categoria='$categoria';";

// valida se categoria ja existe
if(retorne_numero_linhas_query($query) == 0){

    // query
    $query = "insert into $tabela values(null, '$categoria', null, '$data');";

    // executa query
    query_executa($query);
	
};

// retorno
return lista_categorias_administrar();

};

?>