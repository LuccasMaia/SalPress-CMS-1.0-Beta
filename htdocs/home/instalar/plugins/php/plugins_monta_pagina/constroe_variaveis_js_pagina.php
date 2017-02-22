<?php

// constroe as variaveis javascript da pagina
function constroe_variaveis_js_pagina(){

// globals
global $requeste;

// url de pagina de acoes
$url_pagina_acoes = PAGINA_ACOES;

// href de pagina
$href_pagina = retorne_href_get();

// limit de chat de usuario
$limit_chat_usuario = LIMIT_MAX_NUM_USUARIOS_CHAT;

// limit de conversas de chat
$limit_chat_conversas = CONFIG_LIMIT_CONVERSAS_CHAT;

// termo de pesquisa
$termo_pesquisa = retorne_termo_pesquisa();

// largura atual do sistema de resolucao
$largura_atual_sistema = TAMANHO_RESOLUCAO_PADRAO;

// limit de query para exibir imagens de album
$limit_imagens_album = CONFIG_LIMIT_IMAGENS_ALBUM;

// contador de avanco de galeria de imagens de album
$contador_avanco_galeria_imagens_album += CONFIG_LIMIT_IMAGENS_ALBUM;

// categoria atual
$categoria_atual = retorne_categoria_request();

// url de servidor
$url_servidor = URL_SERVIDOR;

// limit de publicacoes
$limit_publicacoes = CONFIG_LIMIT_PUBLICACOES;

// tipo de post
$tipo_post = retorna_tipo_post_request();

// codigo html
$html = "<script>
var v_pagina_acoes = '$url_pagina_acoes';
\n
var v_contador_slideshow = 0;
\n
var v_slideshow_pausado = 0;
\n
var v_contador_avanco_publicacoes = 0;
\n
var v_href = '$href_pagina';
\n
var contador_avanco_chat = 0;
\n
var array_usuarios_chat = [];
\n
var v_limit_chat_usuario = $limit_chat_usuario;
\n
var v_limit_chat_conversas = $limit_chat_conversas;
\n
var contador_avanco_mensagens_chat = 0;
\n
var contador_avanco_historico_chat = 0;
\n
var $requeste[1] = '$termo_pesquisa';
\n
var v_largura_atual_sistema = $largura_atual_sistema;
\n
var v_contador_timer_paginacao = 0;
\n
var v_contador_avanco_galeria_imagens_album = $contador_avanco_galeria_imagens_album;
\n
var v_limit_imagens_album = $limit_imagens_album;
\n
var v_categoria_atual = \"$categoria_atual\";
\n
var v_idmenu_usando = null;
\n
var v_idsubmenu_usando = null;
\n
var v_url_servidor = \"$url_servidor\";
\n
var v_limit_publicacoes = $limit_publicacoes;
\n
var v_backup_publicacoes = null;
\n
var v_tipo_post = \"$tipo_post\";
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
\n
</script>";

// retorno
return $html;

};

?>