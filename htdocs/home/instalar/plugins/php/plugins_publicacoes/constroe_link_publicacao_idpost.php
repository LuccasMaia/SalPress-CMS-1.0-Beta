<?php

// constroe o link da publicacao por id de post
function constroe_link_publicacao_idpost($id, $titulo, $conteudo){

// globals
global $requeste;

// url de pagina inicial
$url_pagina_inicial = retorne_url_amigavel_publicacao(retorne_dados_publicacao_idpost($id), false);

// codigo html
$codigo_html .= "<a href='$url_pagina_inicial' title='$titulo'>$conteudo</a>";

// retorno
return $codigo_html;

};

?>