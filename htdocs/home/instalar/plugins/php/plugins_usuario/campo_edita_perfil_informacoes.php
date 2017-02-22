<?php

// campo edita informacoes de perfil
function campo_edita_perfil_informacoes($dados){

// globals
global $idioma;

// separa dados
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];
$sobre = $dados['sobre'];

// codigo html
$html = "
<div class='classe_div_campos_editar_perfil'>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$nome' id='id_nome_perfil_salvar' placeholder='$idioma[91]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$endereco' id='id_endereco_perfil_salvar' placeholder='$idioma[133]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<textarea cols='50' rows='20' id='id_sobre_perfil_salvar' placeholder='$idioma[184]'>$sobre</textarea>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$cidade' id='id_cidade_perfil_salvar' placeholder='$idioma[134]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$estado' id='id_estado_perfil_salvar' placeholder='$idioma[135]'>
</div>

<div class='classe_div_campos_editar_perfil_separa'>
<input type='text' value='$telefone' id='id_telefone_perfil_salvar' placeholder='$idioma[136]'>
</div>

<div class='classe_div_campos_editar_perfil_salva'>
<input type='button' value='$idioma[57]' onclick='salvar_perfil_usuario();'>
</div>

</div>
";

// adiciona o dialogo
$html = janela_mensagem_dialogo($idioma[132], $html, "dialogo_editar_perfil_usuario_informacoes");

// codigo html
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[132]' onclick='dialogo_editar_perfil_usuario_informacoes();'>$idioma[132]</a>
</div>
";

// retorno
return $html;

};

?>