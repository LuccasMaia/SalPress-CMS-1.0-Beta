<?php

// constroe campo adicionar url em slideshow
function constroe_campo_adicionar_url_slideshow($dados){

// globals
global $idioma;

// separa dados
$id = $dados['id'];
$url = $dados['url'];

// valida id
if($id == null){
	
	// retorno nulo
	return null;
	
};

// funcoes
$funcao[0] = "atualizar_descricao_imagem_slideshow($id);";

// eventos
$evento[0] = "onclick='$funcao[0]'";

// html
$html = "
<div class='classe_url_slideshow'>

<div class='classe_url_slideshow_separa_1'>
<input type='text' id='id_campo_url_imagem_slideshow' value='$url' placeholder='$idioma[87]'>
</div>

<div class='classe_url_slideshow_separa_2'>
<input type='button' value='$idioma[57]' $evento[0]>
</div>

</div>
";

// retorno
return $html;

};

?>