<?php

// retorna o titulo amigavel de publicacao
function retorne_titulo_amigavel_publicacao($titulo){

// convertendo
$titulo = trim($titulo);
$titulo = converte_minusculo($titulo);
$titulo = str_replace(" ", "_", $titulo);
$titulo = str_replace("-", null, $titulo);
$titulo = remove_acentos($titulo);
$titulo = str_replace("__", "_", $titulo);

// retorno
return $titulo;

};

?>