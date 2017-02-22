<?php

// retorne dados de query
function retorne_dados_query($query){

// comando
$comando = comando_executa($query);

// dados
$dados = @mysqli_fetch_array($comando, MYSQLI_ASSOC);

// retorno
return $dados;

};

?>