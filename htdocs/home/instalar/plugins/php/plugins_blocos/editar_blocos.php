<?php

// campo editar blocos
function editar_blocos($dados){

// globals
global $idioma;

// separa os dados
$id = $dados["id"];
$titulo = $dados["titulo"];
$sub_titulo = $dados["sub_titulo"];
$conteudo = $dados["conteudo"];

// ids de campos
$idcampo[0] = md5("id_campo_edita_blocos_titulo".data_atual().$id);
$idcampo[1] = md5("id_campo_edita_blocos_subtitulo".data_atual().$id);
$idcampo[2] = md5("id_campo_edita_blocos_conteudo".data_atual().$id);

// eventos
$eventos[0] = "onclick='adicionar_bloco(\"$idcampo[0]\", \"$idcampo[1]\", \"$idcampo[2]\", \"$id\");'";

// campo editar
$campo_editar = constroe_campo_ckeditor($conteudo, null, $idcampo[2]);

// valida id
if($id == null){
	
	// texto de botao
	$texto_botao = $idioma[209];
	
}else{
	
	// texto de botao
	$texto_botao = $idioma[215];
	
};

// codigo html
$html = "
<div class='classe_campo_edita_blocos'>

<div class='classe_campo_edita_blocos_titulo'>
<input type='text' placeholder='$idioma[207]' id='$idcampo[0]' value='$titulo'>
</div>

<div class='classe_campo_edita_blocos_subtitulo'>
<input type='text' placeholder='$idioma[208]' id='$idcampo[1]' value='$sub_titulo'>
</div>

<div class='classe_campo_edita_blocos_conteudo'>
$campo_editar
</div>

<div class='classe_campo_edita_blocos_salvar'>
<input type='button' value='$texto_botao' $eventos[0]>
</div>

</div>

";

// retorno
return $html;

};

?>