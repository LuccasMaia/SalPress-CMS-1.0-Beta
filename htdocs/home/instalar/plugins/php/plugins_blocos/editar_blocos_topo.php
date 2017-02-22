<?php

// campo edita blocos de topo
function editar_blocos_topo($dados){

// globals
global $idioma;
global $requeste;

// url de formulario
$url_formulario = PAGINA_ACOES;

// separa os dados
$id = $dados["id"];
$titulo = $dados["titulo"];
$conteudo = $dados["conteudo"];
$url_imagem = $dados["url_imagem"];
$url_link = $dados["url_link"];

//id de campos
$idcampo[0] = md5("id_campo_ckeditor_bloco_topo_conteudo_$id");
$idcampo[1] = md5("id_campo_upload_imagem_file");
$idcampo[2] = md5("id_campo_upload_imagem_exibe");

// valida id
if($id == null){
	
	// texto de botao
	$texto_botao = $idioma[209];
	
}else{
	
	// texto de botao
	$texto_botao = $idioma[215];
	
};

// campo upload
$campo_upload = "
<div class='classe_campo_upload_imagem_bloco_topo'>
<input type='file' name='foto' id='$idcampo[1]'>
</div>
";

// valida id
if($id != null and $url_imagem != null){
	
	$campo_upload .= "
	<div class='classe_div_imagem_bloco_topo_editar'>
	<img src='$url_imagem' title='$titulo'>
	</div>
	";
};

// codigo html
$html = "
<div class='classe_campo_add_bloco_topo'>
<form action='$url_formulario' method='post' enctype='multipart/form-data'>

<input type='hidden' name='$requeste[0]' value='19'>
<input type='hidden' name='$requeste[7]' value='$id'>

<div class='classe_campo_add_bloco_topo_div'>
<input type='text' placeholder='$idioma[43]' name='titulo' value='$titulo'>
</div>

<div class='classe_campo_add_bloco_topo_div'>
<input type='text' name='url_link' value='$url_link' placeholder='$idioma[228]'>
</div>

<div class='classe_campo_add_bloco_topo_div'>
$campo_upload
</div>

<div class='classe_campo_add_bloco_topo_div'>
<input type='submit' value='$texto_botao'>
</div>

</form>
</div>
";

// retorno
return $html;

};

?>