<?php

// constroe campo adicionar imagens de publicacao
function constroe_campo_adicionar_imagens_publicacao(){

// globals
global $idioma;
global $requeste;

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(33);

// html
$html = "

<div class='classe_div_publicar_imagens'>
<input type='hidden' name='$requeste[0]' value='3'>
<input type='file' name='fotos[]' id='elemento_file_campo_publicar' class='campo_file_upload' multiple onchange='visualizar_imagens_upload_postagem();'>

<div class='classe_div_publicar_imagens_div' onclick='seleciona_imagens_publicacao_usuario();'>
$imagem_servidor[0]
</div>

<div class='classe_div_imagens_pre_publicacao' id='div_imagens_pre_publicacao'></div>
</div>

";

// retorno
return $html;

};

?>