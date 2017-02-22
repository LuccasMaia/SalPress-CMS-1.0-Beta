<?php

// campo gerenciar bloco
function campo_gerenciar_bloco($dados, $idbloco){

// globals
global $titulo;
global $idioma;

// separa os dados
$id = $dados["id"];
$titulo = $dados["titulo"];
$sub_titulo = $dados["sub_titulo"];
$conteudo = $dados["conteudo"];

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(16);
$imagem_servidor[1] = retorne_imagem_servidor(17);

// id de dialogo
$id_dialogo[0] = md5("id_dialogo_excluir_bloco_$id".data_atual());
$id_dialogo[1] = md5("id_dialogo_editar_bloco_$id".data_atual());

// codigo html
$html = "
$idioma[211]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_bloco(\"$id\", \"$idbloco\");'>
";

// campo editar bloco
$campo_editar_bloco= janela_mensagem_dialogo($idioma[210], editar_blocos($dados), $id_dialogo[1]);

// codigo html
$html = janela_mensagem_dialogo($idioma[210], $html, $id_dialogo[0]);

// codigo html
$html = "
<div class='classe_campo_gerenciar_blocos'>

<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_excluir_bloco(\"$id_dialogo[0]\");'>
$imagem_servidor[0]
</div>

<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_editar_bloco(\"$id_dialogo[1]\");'>
$imagem_servidor[1]
</div>

</div>

$html
$campo_editar_bloco
";

// retorno
return $html;

};

?>