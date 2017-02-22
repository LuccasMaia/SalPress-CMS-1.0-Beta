<?php

// carregar depois que a pagina estiver carregada
function scripts_js_carregar_onload(){

// codigo html
$html .= "
\n
<script>
";

// valida numero de imagens
if(retorne_numero_imagens_slideshow() != 0){
	
	// funcoes a serem carregadas
	$html .= "
	\n
	carregar_slideshow();
	\n
	";
	
};

// valida usuario logado
if(retorne_usuario_logado() == true){
	
	// codigo html
	$html .= "
	\n
    constroe_lista_usuarios_chat();
    \n
	";
	
};

$html .= "
detecta_resolucao_pagina();
\n
</script>
\n
";

// retorno
return $html;

};

?>