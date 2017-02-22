<?php

// constroe o campo de publicacao
function constroe_campo_publicar(){

// globals
global $idioma;
global $requeste;

// url de formulario
$url_formulario = PAGINA_ACOES;

// campo ckeditor
$campo_ckeditor = constroe_campo_ckeditor(null, "conteudo", null);

// campo com categorias
$campo_categorias = campo_categorias_select(null, null);

// campo adiciona imagens
$campo_adiciona_imagens = constroe_campo_adicionar_imagens_publicacao();

// campo tipo de publicacao
$campo_tipo_publicacao = constroe_campo_tipo_publicacao(null);

// codigo html
$codigo_html = "
<div class='classe_div_campo_publicar'>

<form action='$url_formulario' method='post' enctype='multipart/form-data'>


<div class='classe_opcoes_publicar'>
$campo_categorias
$campo_tipo_publicacao
$campo_adiciona_imagens
</div>


<div class='classe_div_campo_publicar_principal'>
<div class='classe_div_campo_publicar_titulo'>
<input type='text' name='titulo' placeholder='$idioma[43]'>
</div>

<div class='classe_div_campo_publicar_conteudo'>
$campo_ckeditor
</div>

<div class='classe_div_campo_publicar_opcoes'>
<input type='submit' value='$idioma[45]'>
</div>
</div>


</form>
</div>

";

// retorno
return $codigo_html;

};

?>