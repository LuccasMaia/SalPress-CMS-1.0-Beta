<?php

// recorta a imagem de usuario
function recorta_imagem_usuario(){

// global
global $pagina_href;

// imagem normal
$targ_w[0] = TAMANHO_ESCALA_IMG_PERFIL;
$targ_h[0] = (TAMANHO_ESCALA_IMG_PERFIL * 1.3);

// imagem de miniatura
$targ_w[1] = TAMANHO_ESCALA_IMG_PERFIL_MINIATURA;
$targ_h[1] = (TAMANHO_ESCALA_IMG_PERFIL_MINIATURA * 1.3);

// qualidade
$jpeg_quality = 100;

// criando nova imagem
$src[0] = remove_html($_REQUEST['imagem_grande_url']);
$img_r[0] = imagecreatefromjpeg($src[0]);
$dst_r[0] = ImageCreateTrueColor($targ_w[0], $targ_h[0]);
imagecopyresampled($dst_r[0], $img_r[0], 0, 0, $_POST['x'], $_POST['y'], $targ_w[0], $targ_h[0], $_POST['w'], $_POST['h']);

$src[1] = remove_html($_REQUEST['imagem_grande_url']);
$img_r[1] = imagecreatefromjpeg($src[1]);
$dst_r[1] = ImageCreateTrueColor($targ_w[1], $targ_h[1]);
imagecopyresampled($dst_r[1], $img_r[1], 1, 1, $_POST['x'], $_POST['y'], $targ_w[1], $targ_h[1], $_POST['w'], $_POST['h']);

// dados da imagem
$dados_imagem = dados_perfil_usuario(retorne_idusuario_logado());

// dados de retorno
$imagem_perfil = $dados_imagem['url_imagem_perfil_root'];
$imagem_perfil_miniatura = $dados_imagem['url_imagem_perfil_miniatura_root'];

// grava a nova imagem
imagejpeg($dst_r[0], $imagem_perfil);
imagejpeg($dst_r[1], $imagem_perfil_miniatura);

// chama a pagina inicial
chama_pagina_inicial();

};

?>
