<?php

// campo gerenciar bloco de topo
function campo_gerenciar_bloco_topo($dados, $idbloco){

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

// id de dialogo
$id_dialogo = md5("id_dialogo_excluir_bloco_$id".data_atual());

// codigo html
$html = "
$idioma[211]
<br>
<br>
<input type='button' value='$idioma[101]' onclick='excluir_bloco_topo(\"$id\", \"$idbloco\");'>
";

// codigo html
$html = janela_mensagem_dialogo($idioma[210], $html, $id_dialogo);
 
// codigo html
$html = "
<div class='classe_campo_gerenciar_blocos'>

<div class='classe_campo_gerenciar_blocos_separa' onclick='dialogo_excluir_bloco(\"$id_dialogo\");'>
$imagem_servidor[0]
</div>

</div>

$html
";

// retorno
return $html;

};

?>