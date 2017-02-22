<?php

// constroe campo criar categoria
function constroe_criar_categoria(){

// globals
global $idioma;

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(36);

// id de campos
$id_campo[0] = md5("campo_nome_nova_categoria".data_atual());
$id_campo[1] = md5("campo_lista_categorias".data_atual());

// eventos
$eventos[0] = "onclick='adiciona_categoria(\"$id_campo[0]\", \"$id_campo[1]\");'";
$eventos[1] = "onkeydown='if(event.keyCode == 13){adiciona_categoria(\"$id_campo[0]\", \"$id_campo[1]\");}'";

// categorias
$categorias = lista_categorias_administrar();

// codigo html
$html = "
<div class='classe_campo_criar_categoria'>

<div class='classe_campo_criar_categoria_imagem'>
$imagem_servidor[0]
</div>

<div class='classe_campo_criar_categoria_descreve'>$idioma[188]</div>

<div class='classe_campo_criar_categoria_nome'>
<input type='text' placeholder='$idioma[186]' id='$id_campo[0]' $eventos[1]>
</div>

<div class='classe_campo_criar_categoria_adicionar'>
<input type='button' value='$idioma[187]' $eventos[0]>
</div>

<div class='classe_campo_criar_categoria_categorias' id='$id_campo[1]'>$categorias</div>

</div>
";

// retorno
return $html;

};

?>