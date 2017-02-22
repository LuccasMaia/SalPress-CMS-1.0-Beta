<?php

// campo gerencia o album
function campo_gerenciar_album($id, $idcampo){

// globals
global $idioma;

// imagem de sistema
$imagem_sistema[0] = retorne_imagem_servidor(16);

// id de dialogo
$id_dialogo[0] = md5("id_dialogo_excluir_album_$id");

// eventos
$eventos[0] = "onclick='excluir_album_imagem(\"$id\", \"$idcampo\");'";
$eventos[1] = "onclick='dialogo_excluir_album(\"$id_dialogo[0]\");'";

// html
$html = "
$idioma[219]
<br>
<br>
<input type='button' value='$idioma[101]' $eventos[0]>
";

// adiciona dialogo
$html = janela_mensagem_dialogo($idioma[220], $html, $id_dialogo[0]);

// html
$html = "
<div class='classe_campo_gerencia_album_imagem'>
<div class='classe_campo_gerencia_album_imagem_separa' $eventos[1]>$imagem_sistema[0]</div>
</div>
$html
";

// retorno
return $html;

};

?>