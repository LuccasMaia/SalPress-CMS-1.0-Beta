<?php

// carrega os recursos de cabecalho
function carrega_recursos_cabecalho(){

// codigo html
$html .= fancybox();
$html .= jcrop();
$html .= ckeditor();

// retorno
return $html;

};

?>