<?php

// campo criar album
function campo_criar_album(){

// globals
global $idioma;
global $requeste;
global $idioma;

// id de campos
$idcampo[0] = md5("id_campo_nome_novo_album".data_atual());

// eventos
$eventos[0] = "onclick='criar_novo_album(\"$idcampo[0]\");'";
$eventos[1] = "onkeydown='if(event.keyCode == 13){criar_novo_album(\"$idcampo[0]\");}'";

// url a ser aberta
$url_abrir[0] = PAGINA_INICIAL."?$requeste[0]=$idioma[40]";

// imagem de sistema
$imagem_sistema[0] = retorne_imagem_servidor(4);

// numero de imagens
$numero_imagens = retorne_tamanho_resultado(retorne_numero_imagens_albuns());

// campo com todas as imagens
$campo_imagens_gerais = "
<div class='classe_album_usuario_gerais'>

<div class='classe_album_usuario_imagens_gerais'>
<a href='$url_abrir[0]' title='$nome_album'>$imagem_sistema[0]</a>
</div>

<div class='classe_album_usuario_numero'>
<a href='$url_abrir[0]' title='$nome_album'>$idioma[221]$numero_imagens</a>
</div>

</div>
";

// html
$html = "
<div class='classe_campo_criar_album'>

<div class='classe_campo_criar_album_nome'>
<input type='text' placeholder='$idioma[216]' id='$idcampo[0]' $eventos[1]>
</div>

<div class='classe_campo_criar_album_botao'>
<input type='button' value='$idioma[217]' $eventos[0]>
</div>

</div>

$campo_imagens_gerais

";

// retorno
return $html;

};

?>