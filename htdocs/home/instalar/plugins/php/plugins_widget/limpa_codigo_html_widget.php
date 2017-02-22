<?php

// limpa codigo html de widget
function limpa_codigo_html_widget($conteudo){

// converte entidades para codigo html
$conteudo = html_entity_decode($conteudo);

// converte entidades em codigo html
$conteudo = str_replace("<?php", null, $conteudo);
$conteudo = str_replace("?>", null, $conteudo);
$conteudo = str_replace("<?", null, $conteudo);
$conteudo = str_replace("?>", null, $conteudo);
$conteudo = str_replace("<%", null, $conteudo);
$conteudo = str_replace("%>", null, $conteudo);
$conteudo = str_replace("'", "\"", $conteudo);

// retorno
return $conteudo;

};

?>