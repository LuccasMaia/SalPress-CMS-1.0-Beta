<?php

// remove codificação html
function remove_html($html){

// adiciona codigo de scape
$html = addslashes($html);

// remove as tags html
$html = strip_tags($html);

// se for e-mail converte para minusculo
if(verifica_se_email_valido($html) == true){

    // converte para minusculo
    $html = converte_minusculo($html);

};

// retorna
return $html;

};


?>
