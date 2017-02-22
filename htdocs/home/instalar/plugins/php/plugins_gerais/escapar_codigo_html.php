<?php

// escapar codigo html
function escapar_codigo_html($html){

// escapa e converte codigo html para entidades
$html = addslashes($html);
$html = htmlentities($html);

// retorno
return $html;

};

?>