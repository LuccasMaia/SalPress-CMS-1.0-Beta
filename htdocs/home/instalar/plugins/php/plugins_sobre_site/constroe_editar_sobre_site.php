<?php

// constroe o editar sobre site
function constroe_editar_sobre_site(){

// globals
global $idioma;
global $requeste;

// url de formulario
$url_formulario = PAGINA_ACOES;

// dados de sobre site
$dados = retorne_dados_sobre_site();

// separa os dados
$nome = $dados["nome"];
$descricao = $dados["descricao"];
$palavras = $dados["palavras"];
$autor = $dados["autor"];
$email_contato = $dados["email_contato"];
$copyright = $dados["copyright"];

//  html
$html = "
<div class='classe_campo_editar_sobre_site'>
<form action='$url_formulario' method='post'>

<input type='hidden' name='$requeste[0]' value='59'>

<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='nome' placeholder='$idioma[0]'>$nome</textarea>
</div>

<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='descricao' placeholder='$idioma[1]'>$descricao</textarea>
</div>

<div class='classe_campo_editar_sobre_site_separa'>
<textarea cols='10' rows='10' name='palavras' placeholder='$idioma[8]'>$palavras</textarea>
</div>

<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$autor' name='autor' placeholder='$idioma[9]'>
</div>

<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$email_contato' name='email_contato' placeholder='$idioma[16]'>
</div>

<div class='classe_campo_editar_sobre_site_separa'>
<input type='text' value='$copyright' name='copyright' placeholder='$idioma[121]'>
</div>

<div class='classe_campo_editar_sobre_site_salvar'>
<input type='submit' value='$idioma[57]'>
</div>

</form>
</div>
";

// retorno
return $html;

};

?>