<?php
	
// campo editar perfil alterar senha
function campo_edita_perfil_excluir_conta($dados){

// globals
global $idioma;

// separa dados
$nome = $dados['nome'];
$url_imagem_perfil = $dados['url_imagem_perfil'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$estado = $dados['estado'];
$telefone = $dados['telefone'];

// valida usuario administrador
if(retorne_usuario_administrador() == true){
	
	// codigo html
	$html = "
	$idioma[155]
	";
	
	// retorno
	return mensagem_sistema($html);
	
};

// codigo html
$html = "
<input type='password' id='campo_senha_excluir_conta' placeholder='$idioma[151]'>
<br>
<br>
<input type='button' value='$idioma[98]' onclick='excluir_conta_usuario();'>
";

// adiciona o dialogo
$html = janela_mensagem_dialogo($idioma[154], $html, "dialogo_editar_perfil_excluir_conta");

// codigo html
$html .= "
<div class='classe_div_campo_editar_perfil_opcao'>
<a href='#' title='$idioma[154]' onclick='dialogo_editar_perfil_excluir_conta();'>$idioma[154]</a>
</div>
";

// retorno
return $html;

};
	
?>	