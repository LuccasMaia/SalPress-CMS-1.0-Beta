<?php

// retorna a url da publicacao
function retorne_url_publicacao($id){

// globals
global $requeste;

// url de pagina inicial
$url_pagina_inicial = URL_INDEX_HOME;

// codigo html
$html = "$url_pagina_inicial?$requeste[4]=$id";

// retorno
return $html;

};

?>