<?php

// carrega o recurso ckeditor
function ckeditor(){

// arquivos a rerem carregados
$arquivo_carregar[0] = "<script type='text/javascript' src='".PASTA_RECURSOS."ckeditor/ckeditor.js'></script>";

// codigo html
$html = "
$arquivo_carregar[0]
";

// retorno
return $html;

};

?>