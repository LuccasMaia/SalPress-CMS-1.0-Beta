<?php

// retorna o limit de chat
function retorne_limit_chat(){

// dados de formulario
$avanco_contador = remove_html($_REQUEST['contador_avanco_chat']);

// contadores de avanco limit
$contador_inicio = $avanco_contador;
$contador_fim = $avanco_contador + LIMIT_MAX_NUM_USUARIOS_CHAT;

// limit
$limit = "limit $contador_inicio, $contador_fim";

// retorno
return $limit;

};

?>