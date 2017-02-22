<?php

// campo gerencia as imagens do album
function campo_gerenciar_imagens_album(){

// globals
global $idioma;

// valida usuario administrador
if(retorne_usuario_administrador() == false){
	
	// retorno nulo
    return null;
	
};

// id de campo para carregar as imagens da galeria
$id_campo_carregar = md5("id_carregar_galeria_imagens_".data_atual());

// imagens de album
$imagens_album = carregar_imagens_galeria();

// campo carregar imagens
$campo_carregar_imagens = "
<div class='classe_div_carregar_galeria_imagens' id='$id_campo_carregar'>$imagens_album</div>
";

// campo de upload de imagens
$campo_upload_imagens = constroe_formulario_barra_progresso(PAGINA_ACOES, "id_formulario_upload_imagens_album_gerencia", "fotos[]", 8, true, 1);

// id de album
$idalbum = retorne_idalbum_post();

// codigo html
$html = "

$campo_upload_imagens
$campo_carregar_imagens
<div class='classe_div_campo_gerenciar_imagens_album_img' onclick='carregar_imagens_galeria(\"$id_campo_carregar\", \"$idalbum\");'>
$idioma[180]
</div>

";

// retorno
return $html;

};

?>