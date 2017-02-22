<?php

// campo editar perfil alterar senha
function campo_edita_perfil_alterar_senha($dados){

// globals
global $idioma;

// separa dados
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];

// codigo html
$html = "
<div class='classe_div_campos_editar_perfil'>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_atual' placeholder='$idioma[151]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_nova' placeholder='$idioma[152]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='password' id='campo_altera_senha_confirma' placeholder='$idioma[153]'>
</div>

<div class='classe_div_campos_editar_perfil_salva'>
<input type='button' value='$idioma[57]' onclick='alterar_senha_usuario();'>
</div>

</div>
";

// adiciona o dialogo
$html = janela_mensagem_dialogo($idioma[150], $html, "dialogo_editar_perfil_usuario_senha");

// codigo html
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[150]' onclick='dialogo_editar_perfil_usuario_senha();'>$idioma[150]</a>
</div>
";

// retorno
return $html;

};

?>