<?php

// converte o html em texto puro
function converte_html_texto($html){

// remove elementos
$html = html_entity_decode($html);
$html = strip_tags($html);
$html = acento_para_html($html);

// retorno
return $html;

};

?>