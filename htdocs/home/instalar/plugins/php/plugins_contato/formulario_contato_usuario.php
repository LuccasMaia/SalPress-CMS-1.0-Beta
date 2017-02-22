<?php

// formulario de contato de usuario
function formulario_contato_usuario(){

// globals
global $idioma;
global $requeste;

// url do formulario
$url_formulario = PAGINA_ACOES;

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(32);

// codigo html
$html = "
<div class='classe_div_formulario_contato'>
<form action='$url_formulario' method='post'>

<div class='classe_div_formulario_contato_div_1'>
$imagem_servidor[0]
</div>

<span>$idioma[116]</span>

<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='email_telefone_contato' placeholder='$idioma[117]' required>
</div>

<div class='classe_div_formulario_contato_div_2'>
<textarea cols='10' rows='5' name='mensagem_contato' placeholder='$idioma[118]' required></textarea>
</div>

<div class='classe_div_formulario_contato_div_2'>
<input type='submit' value='$idioma[119]' onclick=''>
</div>

<div class='classe_div_formulario_contato_div_2'>
<input type='hidden' name='$requeste[0]' value='28'>
</div>

</form>
</div>
";

// retorno
return $html;

};

?>