<?php
	
// campo editar o perfil
function campo_editar_perfil($dados){

// globals
global $idioma;

// valida usuario dono do perfil
if(retorne_usuario_dono_perfil() == false or retorne_usuario_logado() == false){
	
	// retorno nulo
	return null;
	
};

// campo edita
$campo_edita[0] = campo_edita_perfil_alterar_imagem($dados);
$campo_edita[1] = campo_edita_perfil_informacoes($dados);
$campo_edita[2] = campo_edita_perfil_alterar_senha($dados);
$campo_edita[3] = campo_edita_perfil_excluir_conta($dados);

// codigo html
$html = "
$campo_edita[0]
$campo_edita[1]
$campo_edita[2]
$campo_edita[3]
";

// adiciona o dialogo
$html = janela_mensagem_dialogo($idioma[132], $html, "dialogo_editar_perfil_usuario");

// codigo html
$html .= "
<div class='classe_div_campo_editar_perfil'>
<a href='#' title='$idioma[132]' onclick='dialogo_editar_perfil_usuario();'>$idioma[132]</a>
</div>
";

// retorno
return $html;

};
	
?>	