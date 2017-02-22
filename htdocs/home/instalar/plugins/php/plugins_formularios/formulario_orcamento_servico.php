<?php

// formulario de orcamento
function formulario_orcamento_servico(){

// globals
global $idioma;
global $requeste;

// url do formulario
$url_formulario = PAGINA_ACOES;

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(37);

// campo com estados
$campo_estados = gerador_select_option(retorne_array_estados_pais(), null, "estado_contato", null, null);

// codigo html
$html = "
<div class='classe_div_formulario_contato'>
<form action='$url_formulario' method='post'>

<div class='classe_div_formulario_contato_div_1'>
$imagem_servidor[0]
</div>

<span>$idioma[62]</span>

<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='email_telefone_contato' placeholder='$idioma[117]' required>
</div>


<div class='classe_div_formulario_contato_div_2'>
<input type='text' name='cidade_contato' placeholder='$idioma[134]' required>
</div>


<div class='classe_div_formulario_contato_div_2'>
$campo_estados
</div>

<div class='classe_div_formulario_contato_div_2'>
<textarea cols='10' rows='5' name='mensagem_contato' placeholder='$idioma[63]' required></textarea>
</div>



<div class='classe_div_formulario_contato_div_2'>
<input type='submit' value='$idioma[119]' onclick=''>
</div>

<div class='classe_div_formulario_contato_div_2'>
<input type='hidden' name='$requeste[0]' value='30'>
</div>

</form>
</div>
";

// retorno
return $html;

};

?>