<?php

// constroe o campo ckeditor
function constroe_campo_ckeditor($conteudo, $nome, $idcampo){

// id de campo
if($idcampo == null){
	
	// id de campo
    $idcampo = md5("campo_ckeditor_".$nome.retorne_idcampo_md5());

};

// valida nome de campo
if($nome == null){
	
	// id de campo
    $nome = md5("nome_ckeditor_".retorne_idcampo_md5());
	
};

// altura do ckeditor
$altura_ckeditor = CONFIG_ALTURA_CKEDITOR;

// codigo html
$codigo_html = "

<textarea cols='10' rows='10' placeholder='$idioma[44]' id='$idcampo' name='$nome'>$conteudo</textarea>

<script>
CKEDITOR.replace('$idcampo',{
	
    height: $altura_ckeditor

});

</script>

";

// retorno
return $codigo_html;

};

?>