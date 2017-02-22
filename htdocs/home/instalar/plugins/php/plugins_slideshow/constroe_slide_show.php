<?php

// constroe o slideshow
function constroe_slide_show(){

// globals
global $idioma;

// valida pagina sair
if(retorne_href_get() == $idioma[4]){
	
	// retorno nulo
	return null;
	
};

// valida numero de imagens
if(retorne_numero_imagens_slideshow() == 0){
	
	// retorno nulo
	return null;
	
};

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// classe de div
	$classe_div[0] = "classe_div_slide_show_comentario_admin";

}else{
	
	// classe de div
	$classe_div[0] = "classe_div_slide_show_comentario";
	
};

// imagens de sistema
$imagem_sistema[0] = retorne_imagem_servidor(2);
$imagem_sistema[1] = retorne_imagem_servidor(3);

// campo de paginacao
$campo_paginar = "
<div class='classe_paginar_slideshow'>

<div class='classe_paginar_slideshow_volta' onclick='avanca_slideshow(2);'>
$imagem_sistema[0]
</div>

<div class='classe_paginar_slideshow_avanca' onclick='avanca_slideshow(1);'>
$imagem_sistema[1]
</div>

</div>
";

// codigo html
$html = "
<div class='classe_principal_slideshow'>
<div class='classe_div_slide_show'>
<div class='classe_div_slide_show_imagem' id='id_div_slide_show_imagem' onclick='pausar_slideshow(1);'></div>

<div class='$classe_div[0]'>
<div class='classe_div_slide_show_comentario_div_2' id='id_div_slide_show_comentario' onclick='pausar_slideshow(1);'></div>
</div>

</div>
$campo_paginar
</div>
";

//retorno
return $html;

};

?>