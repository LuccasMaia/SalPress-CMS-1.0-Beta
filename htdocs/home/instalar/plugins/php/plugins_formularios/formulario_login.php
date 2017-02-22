<?php

// formulario de login
function formulario_login(){

// global
global $idioma;

// redireciona para o perfil
if(retorne_usuario_logado() == true){

    // retorno nulo
    return null;
	
};

// imagem de servidor
$imagem_servidor[0] = retorne_imagem_servidor(28);

// botao de cadastro
$botao_cadastro = "
<input type='button' value='$idioma[206]' onclick='cadastro_usuario();'>
";

// valida configuracao
if(CONFIG_PERMITE_CADASTRO == false and retorne_idusuario_administrador() != null){

    // botao de cadastro	
    $botao_cadastro = null;
	
};

// email de cookie
$email = retorne_email_cookie();

// url de index
$url_index = URL_INDEX_HOME;

// codigo html
$html = "
<div class='classe_div_formulario_login'>

<div class='classe_div_formulario_login_exibir_campos'>
<a href='$url_index' title='$idioma[14]'>$imagem_servidor[0]</a>
<span class='classe_div_formulario_login_span_grande'>$idioma[7]</span>
</div>

<div class='classe_div_formulario_login_campos' id='id_div_formulario_login_campos'>
<div class='classe_mensagem_login_cadastro' id='id_mensagem_login_cadastro'></div>
<div class='classe_div_formulario_login_entrada'>
<input type='text' id='id_email_login' placeholder='$idioma[5]' value='$email' onkeydown='if(event.keyCode == 13){logar_usuario();}'>
<input type='password' id='id_senha_login' placeholder='$idioma[6]' onkeydown='if(event.keyCode == 13){logar_usuario();}'>
</div>

<div class='classe_div_formulario_login_botoes'>
<input type='button' value='$idioma[4]' onclick='logar_usuario();'>
$botao_cadastro
</div>

<div class='classe_div_formulario_login_recupera_conta'>
<div>
<span>$idioma[158]</span>
</div>

<div class='classe_div_recuperar_senha'>
<input type='text' id='campo_email_recuperar_conta_usuario' placeholder='$idioma[159]' onkeydown='if(event.keyCode == 13){recuperar_conta_usuario();}'>
</div>

</div>
</div>

</div>
";

// retorno
return $html;

};

?>