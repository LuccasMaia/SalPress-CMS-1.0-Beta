<?php

// query executa
function query_executa($query){

// valida a query
if($query == null){
	
	// retorno nulo
	return null;
	
};

// conecta-se ao servidor mysqli
plugin_conexao(true);

// retorno
return mysqli_query($_SESSION["CONEXAO_MYSQLI"], $query);

};

?>