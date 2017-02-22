<?php

// constroe a imagem de perfil em miniatura
function constroe_imagem_perfil_miniatura($idusuario){

// dados de imagem
$dados_imagem = retorne_imagem_perfil_usuario($idusuario);

// dados do perfil
$dados_perfil = dados_perfil_usuario($idusuario);

// obtendo url de imagem
$url_imagem_perfil_miniatura = $dados_imagem["url_imagem_perfil_miniatura"];

// nome do usuario
$nome_usuario = $dados_perfil["nome"];

// codigo html
$html = "

<div class='classe_div_imagem_perfil_miniatura'>
<img src='$url_imagem_perfil_miniatura' title='$nome_usuario'>
</div>

";

// retorno
return $html;

};

?>